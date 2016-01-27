@extends('layouts.master')

@section('content')

@include('includes.header')

<div>Login</div>

<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

    {!! csrf_field() !!}

    <div class="prueba{{ $errors->has('email') ? ' has-error' : '' }}"></div>
    <label>E-Mail Address</label>
    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

    <div class="prueba{{ $errors->has('password') ? ' has-error' : '' }}"></div>
    <label>Password</label>
    <input type="password" class="form-control" name="password">
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif

    <label>
        <input type="checkbox" name="remember"> Remember Me
    </label>

    <button type="submit" class="btn btn-primary">
        <i class="fa fa-btn fa-sign-in"></i>Login
    </button>

    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
    </form>
@endsection
