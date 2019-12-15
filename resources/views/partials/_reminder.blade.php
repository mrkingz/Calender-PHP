<div class="reminder-wrap mb-1">
    <hr class="mt-0 mb-1">
    <div class="row">
        <div class="col-lg-12">
            <div class="outter-wrap reminder-setting dotted-border">
                <div class="row">
                    <div class="col-lg-12 pt-2">
                        <div class="mx-2"><strong class="size-12"> {{ __('Select schedule reminder channel below:') }} </strong></div>
                        <hr class="mt-1 mx-2 dotted-border"/>
                        <div class="form-group mx-3 mb-2 options">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="sms" name="channel"  value="1">
                                <label class="form-check-label" for="sms">{{ __('Send SMS notification only') }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="email" name="channel"  value="2">
                                <label class="form-check-label" for="email">{{ __('Send e-mail notification only') }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="both" name="channel"  value="3" checked>
                                <label class="form-check-label" for="both">{{ __('Send SMS and e-mail notification') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="inner-wrap dotted-border mt-1 pb-1">
                <div class="row">
                    <div class="col-lg-12 px-4 pt-2">
                        <strong class="size-12"> {{ __('Reminder date and time') }} </strong>
                        <hr class="mt-1 dotted-border"/>
                        <div class="row form-group">
                            <div class="col-lg-6">
                                <label class="m-0" for="reminder-date"><i class="fa fa-calendar"></i> {{ __('Date') }}</label>
                                <input id="reminder-date" type="text" placeholder="Date e.g. yyyy-mm-dd" class="form-control form-control-sm {{ $errors->has('reminder_date') ? ' is-invalid' : '' }}" name="reminder_date" value="{{ old('reminder_date') }}">
                                @if ($errors->has('reminder_date'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('reminder_date') }}
                                    </span>
                                @endif  
                            </div>
                            <div class="col-lg-6">
                                <label class="m-0" for="reminder-time"><i class="fa fa-clock-o"></i> {{ __('Time') }}</label>
                                <input id="reminder-time" type="text" placeholder="Time e.g. 12:30:00" class="form-control form-control-sm {{ $errors->has('reminder_time') ? ' is-invalid' : '' }}" name="reminder_time" value="{{ old('reminder_time') }}">
                                @if ($errors->has('reminder_time'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('reminder_time') }}
                                    </span>
                                @endif  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>