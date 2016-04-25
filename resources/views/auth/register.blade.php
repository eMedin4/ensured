@extends('layouts.center')
@section('title', 'Entra con tu usuario')
@section('bodyclass', 'loginpage')

@section('main')

    <h1 class="account-title">iFiTHAPPENS</h1>

    <div class="account-text">
        <span>Regístrate con tu cuenta</span>
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

    <div class="account-text">
        <span>O con tu email</span>
        <div class="back-line"></div>
    </div>

    @if (Session::get('message'))
        <div class="info info-error mb20">
            <i class="fa fa-frown"></i>
            <h2>Uups...</h2>
            <p>{{ Session::get('message') }}</p>
        </div>
    @endif

    <form method="POST" action="{{ route('postregister') }}">
        {!! csrf_field() !!}

        <div class="account-flex pb10">
            <div><input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Nombre de usuario"></div>
            <div><input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="email"></div>
        </div>
        <div class="account-flex">
            <div><input type="password" name="password" id="password" placeholder="Contraseña"></div>
            <div><button type="submit" class="btn account-btn">Regístrate con tu <strong>email</strong></button></div>
        </div>
    </form>


@endsection

