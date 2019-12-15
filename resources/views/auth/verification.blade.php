
@extends('layouts.app')

@section('title', ' | Verification')

@section('content-header', 'Verification')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-4 col-sm-12 auth-container">
            @include('partials._content-header')
            <hr class="mt-0 mb-2" />
            <div class="outter-wrap mb-0">
                @alert(['type' => 'info'])
                    @slot('content')
                        We would like to verify your phone number
                        Please enter the code sent to 
                        <strong >
                            {{
                                __(substr_replace(Auth::user()->phone, "***", 7) . Auth::user()->phone[strlen(Auth::user()->phone) - 1])
                            }}
                        </strong>
                        <br>
                        <hr class="mb-1 mt-1">
                        <span style="color: darkred"><strong>Attention:</strong>
                        <br> Code expires after {{ config('app.expires') }} minutes</span><br>
                            If not received after {{ config('app.expires') }} minutes, resend below
                    @endslot
                @endalert
                <div class="inner-wrap mt-1">
                    @alert(['type' => 'success', 'classes' => 'center hide m-1'])
                        @slot('content')
                            <div class="message size-11"></div>
                        @endslot
                    @endalert
                    <form class="form pb-0" method="POST" action="{{ route('verification') }}" aria-label="{{ __('Confirm phone number') }}">
                        @csrf
                        <div class="form-group">
                            <label for="code" class="col-form-label">{{ __('Verification code') }}</label>
                            <input id="code" type="code" class="form-control form-control-sm {{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" placeholder="Verification code" required autofocus>
                            @if ($errors->has('code'))
                                <span class="invalid-feedback" role="alert">
                                    {{ $errors->first('code') }}
                                </span>
                            @endif                   
                        </div>
                        <hr>
                        <div class="form-group d-flex justify-content-between mb-0">
                            <button type="submit" class="btn btn-dark">
                            {{ __('Next') }}
                            </button>  
                            <button class="btn btn-link resend right" onClick="resend(event)">
                                {{ __('Resend code') }}
                            </button>                                               
                        </div>
                        <hr>
                    </form>
                    <form class="mb-2 mr-3" method="POST" action="{{ route('logout') }}" aria-label="{{ __('Postpone confirmation') }}">
                        @csrf
                        <div class="form-group no-scrolls">    
                            <button type="submit" class="btn btn-link later right size-12">
                                {{ __('Verify later') }}
                            </button> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        const resend = function(event) {
            event.preventDefault();

            const _elem = $(event.target);
            _elem.addClass('wait');
            let message, alertClass;

            $.ajax({
                url: "{{ route('resend', ['id' => Auth::id()]) }}",
                type: 'PUT',
                data: { _token: "{{ Session::token() }}" },
                success: function(response) {
                    message = response.message;
                    alertClass = response.success ? 'alert-success' : 'alert-danger';
                }
            }).done(function(){
                $.when($('.message').html(message ? message : 'Error occured, could not send new code!')).done(function() {
                    $($('.message').parents('.alert')).removeClass('hide alert-sucess alert-danger').addClass(alertClass ? alertClass : 'alert-danger').show();   
                    _elem.removeClass('wait');                       
                });
            });
        }
    </script>
    @include('partials._footer')
</div>
@endsection

