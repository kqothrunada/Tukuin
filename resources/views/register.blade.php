@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div style="margin: 30px 0;">
    <h1 class="page-title">Register</h1>
    
    <div class="container my-container">
        @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action={{ url('/register') }}>
            {{ csrf_field() }}
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control input-lg" id="address" name="address">
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number">
            </div>

            <div class="form-group">
                <label for="role">Register as: </label>
                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" name="role" value="Member" id="member">
                    <label class="custom-control-label" for="member">Regular Member</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" name="role" value="Seller" id="seller">
                    <label class="custom-control-label" for="seller">Seller</label>
                </div>
            </div>

            <button style="cursor: pointer" type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>

@endsection