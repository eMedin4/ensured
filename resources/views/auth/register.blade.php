@extends('layouts.master')

@section('title', 'Entra con tu usuario')

@section('bodyclass', 'registerpage')

@section('content')

<div class="content content-limit">

    <div class="limit p40">

        <h1 class="big-title"> Regístrate </h1>

        <form method="POST" action="{{ route('postregister') }}">
        {!! csrf_field() !!}

            <div class="form-group">
                <label for="name">Nombre de usuario</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="form-group">
                <button type="submit" class="btn">Regístrate</button>
            </div>

        </form>
    </div>
</div>

@endsection

