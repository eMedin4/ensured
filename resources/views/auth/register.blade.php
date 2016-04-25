@extends('layouts.board')

@section('title', 'Regístrate')

@section('bodyclass', 'registerpage')

@section('main')



        <h1 class="sub-line"> Regístrate </h1>

        <div class="auth-form">

            @if (Session::get('message'))
                <div class="info info-error mb20">
                    <i class="fa fa-frown"></i>
                    <h2>Uups...</h2>
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('postregister') }}">
            {!! csrf_field() !!}

                <div class="form-group pb10">
                    <label for="name">Nombre de usuario</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}">
                </div>

                <div class="form-group pb10">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}">
                </div>

                <div class="form-group pb10">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn">Regístrate</button>
                </div>

            </form>
        </div>


@endsection

