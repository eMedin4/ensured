<?php

namespace Ensured\Http\Controllers;

use Auth;
use URL;
use Socialite;
use Ensured\Entities\User;
use Ensured\Entities\Social;
use Ensured\Entities\Collection;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function getLogin(Request $request)
    {

        if (URL::previous() != 'http://localhost/ensured/public/entrar' && URL::previous() != 'http://localhost/ensured/public/registro') {
            $request->session()->put('preurl', URL::previous());
        }

        return view('auth.login');
    }

    public function postLogin(Request $request)
    {

        $this->validate($request, [
            'user' => 'required',
            'password' => 'required'
        ]);

        $user = $request->input('user');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if (Auth::attempt(['name' => $user, 'password'  => $password], $remember)) {
            return redirect($request->session()->get('preurl'));
        }
        return back()->with('message', 'Usuario o contraseña no válidos');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function getRegister(Request $request)
    {

        if (URL::previous() != 'http://localhost/ensured/public/entrar' && URL::previous() != 'http://localhost/ensured/public/registro') {
            $request->session()->put('preurl', URL::previous());
        }

        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:20|unique:users',
            'email' => 'required|email|min:5|max:255|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        Auth::login($user);

        $collection = New Collection();
        $collection->title = 'favoritos';
        $collection->user_id = Auth::user()->id;
        $collection->save();


        return redirect($request->session()->get('preurl'));

    }

    public function showProfile($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        $title = "Perfil";
        return view('pages.profile', compact('user', 'title'));    
    }


    public function redirectToProvider($provider=null)
    {
        if(!config('services.' . $provider)) abort('404');
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider=null)
    {

        $user = Socialite::driver($provider)->user();

        if($user) {


            if ($the_user = Social::where('uid_provider', $user->id)->first()) {
                Auth::loginUsingId($the_user->user_id);
            } else {
                $this->newUserFromSocial($user, $provider);
            }

            return redirect()->route('main');

        } else {
            return 'algo fue mal';
        }
    }

    public function newUserFromSocial($user, $provider)
    {
        $new_user = New User;
        $new_user->name = $user->name;
        $new_user->email = $user->email;
        $new_user->avatar = $user->avatar;
        $new_user->social = 1;
        $new_user->save();
        
        $social = New Social;
        $social->user_id = $new_user->id;
        $social->provider = $provider;
        $social->uid_provider = $user->id;
        $social->save();

        $collection = New Collection();
        $collection->title = 'favoritos';
        $collection->user_id = $new_user->id;
        $collection->save();

        Auth::login($new_user);
    }


}

