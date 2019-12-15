@extends('home')

@section('filters')
    <div class="col-lg-4 col-md-4 col-sm-12 mt-2 before">
        <div class="p-2 mx-1 bg-light">
            mmmm
        </div>
    </div>
@endsection

@section('page-content')
    @schedules(['url' => route('view.pending'), 'btn_text' => 'My Schedules'])
        @slot('content')
            <div class="schedules px-2 pt-3">
                @include('partials._schedule-header')
                <div class="row">
                    <div class="col-lg-12">
                        @if(session('error') || session('success'))
                            @alert(['type' => 'success'])
                                @slot('content')
                                {{ session('error') ?? session('success') }}
                                @endslot
                            @endalert
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form mb-2 px-4 inner-wrap" action="{{ route('store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="mb-0" for="title" class="col-form-label"><i class="fa fa-tags"></i> {{ __('Title') }}</label>
                                <input id="title" type="title" class="form-control form-control-sm {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" placeholder="Title" autocomplete="off" autofocus>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('title') }}
                                    </span>
                                @endif   
                            </div>

                            <div class="form-group mb-0">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-0" for="date"> <i class="fa fa-calendar"></i> {{ __('Date')}}</label>
                                            <input id="date" type="text" placeholder="Date e.g. yyyy-mm-dd" class="form-control form-control-sm {{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}">
                                            @if ($errors->has('date'))
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $errors->first('date') }}
                                                </span>
                                            @endif                                         
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="mb-0" for="time"><i class="fa fa-clock-o"></i> {{ __('Time') }}</label>
                                            <input id="time" type="text" placeholder="Time e.g. 12:30:00" class="form-control form-control-sm {{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ old('time') }}">
                                            @if ($errors->has('time'))
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $errors->first('time') }}
                                                </span>
                                            @endif                                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="m-0" for="note"><i class="fa fa-sticky-note-o"></i> {{ __('Note (Optional)') }}</label>
                                <div class="form-control editable-div {{ $errors->has('note') ? ' is-invalid' : '' }}" id="note" contentEditable="true" placeholder="Any note? Enter it here..."></div>
                                @if ($errors->has('note'))
                                    <span class="invalid-feedback" role="alert">
                                        {{ $errors->first('note') }}
                                    </span>
                                @endif 
                                <input type="hidden" name="note" value=""> 
                            </div>
                            <hr>
                            <div class="form-group">
                                <label class="m-0" for="reminder"><i class="fa fa-cog"></i> {{ __('Reminder settings') }}</label>
                                <div id="reminder" class="inner-wrap reminder px-1 pt-1 m-0">
                                    <div class="form-check reminder-check">
                                        <input id="reminder-toggler" class="form-check-input ml-1" style="margin-top:5px" type="checkbox" name="reminder" value="0" checked>
                                        <label class="form-check-label ml-4" for="reminder-toggler">Set reminder</label>
                                        @include('partials._reminder')
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <button type="submit" onclick="onSubmit(event);" class="btn btn-dark mr-1 btn-sm">
                                    {{ __('Save') }}
                                </button> 
                                <button type="reset" class="btn btn-outline-info btn-sm">
                                    {{ __('Reset') }}
                                </button> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                onSubmit = function(e) {
                    $('input[name="note"]').val($('#note').html());
                    $('form').submit();
                }
            </script>
        @endslot
    @endschedules
@endsection