@extends('layouts.app')

@section('title', ' | Registeration')

@section('content-header', 'Registeration')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-4 col-sm-12 auth-container">
            @include('partials._content-header')
            <hr class="mt-0 mb-2" />
            <div class="outter-wrap">
                <form class="form inner-wrap" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">{{ __('Full name') }}</label>
                        <input id="name" type="text" class="form-control form-control-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Full name" required autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('name') }}
                            </span>
                        @endif                   
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-form-label">{{ __('Email address') }}</label>
                        <input id="email" type="email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('email') }}
                            </span>
                        @endif                   
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-form-label">{{ __('Phone') }}</label>
                        <input id="phone" type="text" class="form-control form-control-sm {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" placeholder="Phone number" required>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                {{ $errors->first('phone') }}
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
                    <div class="form-group d-flex justify-content-between mb-0">
                        <button type="submit" class="btn btn-dark">
                        {{ __('Register') }}
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
@endsection
