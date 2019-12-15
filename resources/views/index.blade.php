
@extends('layouts.app')

@section('title', ' | Login')

@section('content-header', 'Login')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-12 auth-container">
            @include('partials._content-header')
            <hr class="mt-0 mb-2" />
            <div class="outter-wrap">
                @if(session('info') || session('error') || session('success'))
                    @php 
                        $type;
                        if(session('error'))
                            $type = 'danger';
                        else
                            $type = session('info') ? 'info' : 'success';
                    @endphp
                    @alert(['type' => $type, 'classes' => 'center mb-1'])
                        @slot('content')
                            {{ session('info') ?? session('error') ?? session('success') }}
                        @endslot
                    @endalert
                @endif
                <div class="inner-wrap m-0">
                    <form class="form" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ __('Email address') }}</label>
                            <input id="email" type="email" class="form-control form-control-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email address" required autofocus>
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
                        <div class="form-group mb-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}/> 
                                <label class="form-check-label" id="remember" for="remember"> {{ __('Remember me') }} </label>
                            </div>
                        </div>
                        <hr class="mt-0">
                        <div class="form-group d-flex justify-content-between mt-0">
                            <button type="submit" class="btn btn-dark">
                                {{ __('Login') }}
                            </button> 
                            <a class="btn btn-link recovery" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>                  
                        </div>
                        <hr>
                        <div class="form-group no-scrolls mb-0">
                            <span class="mb-0 right size-11">
                              {{ __("Don't have account?") }}<a href="{{ route('register') }}" class="btn btn-link register ml-1">Register</a>
                            </span>                       
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials._footer')
</div>
@endsection
