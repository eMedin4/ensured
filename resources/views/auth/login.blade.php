@extends('layouts.master')

@section('title', 'Entra con tu usuario')

@section('bodyclass', 'loginpage')

@section('content')

<div class="content content-limit">

    <div class="limit p40">

        <h1 class="sub-line"> Entra con tu usuario </h1>

        <div class="auth-form">

            @if (Session::get('message'))
                <div class="info info-error mb20">
                    <i class="fa fa-frown"></i>
                    <h2>Uups...</h2>
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('postlogin') }}">
            {!! csrf_field() !!}

                <div class="form-group pb10">
                    <label for="user">Nombre de usuario o email</label>
                    <input type="text" name="user" id="user" value="{{ old('user') }}">
                </div>

                <div class="form-group pb10">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="form-group pb15">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="label-checkbox">Recuérdame</label>
                </div>

                <div class="form-group pb10">
                    <button type="submit" class="btn">Entra</button>
                </div>

                <div class="h5">
                    <a class="btn btn-link" href="{{ url('/password/reset') }}">¿Has olvidado tu contraseña?</a>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection
