@extends('layouts.center')
@section('title', 'Entra con tu usuario')
@section('bodyclass', 'loginpage')

@section('main')

    <h1 class="account-title">iFiTHAPPENS</h1>

    <div class="account-text">
        <span>Entra con tu cuenta</span>
        <div class="back-line"></div>
    </div>

    <div class="account-flex">
        <div><a class="social-btn facebook" href="{{ route('social.login', ['facebook']) }}">
            <i class="fa fa-facebook"></i>
            <span>Entra con <strong>Facebook</strong></span>
        </a></div>

        <div><a class="social-btn google" href="{{ route('social.login', ['google']) }}">
            <i class="fa fa-google"></i>
            <span>Entra con <strong>Google</strong></span>
        </a></div>
    </div>

<!--     <div class="account-flex pb40">
        <div><a class="social-btn instagram" href="{{ route('social.login', ['instagram']) }}">
            <i class="fa fa-social-instagram"></i>
            <span>Entra con <strong>Instagram</strong></span>
        </a></div>

        <div><a class="social-btn twitter" href="{{ route('social.login', ['twitter']) }}">
            <i class="fa fa-twitter"></i>
            <span>Entra con <strong>Twitter</strong></span>
        </a></div>
    </div> -->

    <div class="account-text">
        <span>O con tu email</span>
        <div class="back-line"></div>
    </div>

    @if (Session::get('message'))
        <div class="info info-error info-error-auth">
            <i class="fa fa-frown-o"></i>
            <h2>Uups...</h2>
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('postlogin') }}">
        {!! csrf_field() !!}
        <div class="account-flex pb10">
            <div><input type="text" name="user" id="user" value="{{ old('user') }}" placeholder="Usuario o email"></div>
            <div><input type="password" name="password" id="password" placeholder="Contraseña"></div>
        </div>
        <div class="account-flex">
            <div><button type="submit" class="btn account-btn">Entra con tu <strong>email</strong></button></div>
        </div>
    </form>

@endsection
