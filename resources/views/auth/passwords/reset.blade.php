@extends('layouts.app')

@section('title', ' | Reset Password')

@section('content-header', 'Reset Password')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-4 col-sm-12 auth-container">
            @include('partials._content-header')
            <hr class="mt-0 mb-2" />
            <div class="outter-wrap pb-0">
                <form class="form inner-wrap mb-1" method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Register') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="email" class="col-form-label">{{ __('Email address') }}</label>
                        <input id="email" type="email" class="form-control form-control-sm{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" placeholder="Email address" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('email') }}
                            </span>
                        @endif                   
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control form-control-sm {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('password') }}
                            </span>
                        @endif                   
                    </div>  
                    <div class="form-group">
                        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control form-control-sm " name="password_confirmation" placeholder="Confirm password" required>
                    </div>                  
                    <hr>
                    <div class="form-group flex mb-0">
                        <button type="submit" class="btn btn-dark">
                        {{ __('Reset Password') }}
                        </button> 
                        <a class="btn btn-link login size-12" href="{{ route('login') }}">
                            {{ __('Login') }}
                        </a>                       
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('partials._footer')
</div>

