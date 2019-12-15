
@extends('layouts.app')

@section('title', ' | Reset Password')
@section('content-header', 'Reset Password')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-4 col-sm-12 auth-container">
            @include('partials._content-header')
            <hr class="mt-0 mb-2" />
            <div class="outter-wrap">
                @alert(['type' => session('status') ? 'success' : 'info', 'classes' => 'center'])
                    @slot('content')
                        @if (!session('status'))
                            Enter the email address you registered with <br>
                            A password reset link will be sent to you
                        @else
                            {{ session('status') }}
                        @endif
                    @endslot
                @endalert
                <div class="inner-wrap mt-1">
                    <form class="form" method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
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
                        <hr>
                        <div class="form-group d-flex justify-content-between mb-0">
                            <button type="submit" class="btn btn-dark">
                            {{ __('Next') }}
                            </button> 
                            <a class="btn btn-link login size-11" href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>                       
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('partials._footer')
</div>
@endsection

