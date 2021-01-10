@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="" style="margin: 30px 0;">
    <h1 class="page-title">Login</h1>

    <div class="container my-container">
        
        @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action={{ url('/login') }}>
            {{ csrf_field() }}
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember Me</label>
            </div>

            <button type="submit" class="btn btn-primary" style="cursor: pointer">Login</button>

            <label>Don't have an account?</label>
            <a href={{ url('/register') }}>Register here</a>
        </form>

    </div>
</div>

@endsection