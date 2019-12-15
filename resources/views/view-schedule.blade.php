@extends('home')

@section('page-content')
    @schedules(['url' => url()->previous(), 'btn_text' => 'My Schedules'])
        @slot('content')
            <div class="schedules p-2">
                <div class="inner-wrap  p-1">
                <div class="inner-wrap  p-2" style="background: #fff">
                    <div>
                        <span class="bold px-1">{{ __('Title') }}</span>
                        <hr class="my-1">
                        <div class="inner-wra dotted-borde px-2" style="background: #fff">
                            {{ $schedule->title }}
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="bold px-1">{{ __('Due date') }}</span >
                        <hr class="my-1">
                        <div class=" px-2" style="background: #fff">
                            {{ $schedule->formatedDate() }} <span style="font-size:20px">&VerticalBar;</span> {{ $schedule->formatedTime() }}
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="bold px-1">{{ __('Note') }}</span >
                        <hr class="my-1">
                        <div class="inner-wra dotted-borde py-1" style="background: #fff">
                            @if ($schedule->hasNote())
                                <div class="bg-light p-2" style="border-radius: 3px"> {{ $schedule->note->note }} </div>
                            @else 
                            <div class="p-2 size-12" style="color: rgb(216, 13, 13);"> {{ __('There is no note for this schedule...') }} </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-2">
                        <span class="bold px-1">{{ __('Reminder settings') }}</span >
                        <hr class="my-1">
                        <div class="inner-wra dotted-borde py-1" style="background: #fff">
                            @if ($schedule->hasReminderSettings())
                                <div class="bg-light p-2" style="border-radius: 3px;"> 
                                    <strong style="color: #17a2b8">Notification channel: </strong>{{ $schedule->reminder->getChannel() }}</br>
                                    <strong style="color: #17a2b8">Reminder date: </strong> {{ $schedule->reminder->formatedDate() }} <span style="font-size:20px">&VerticalBar;</span> {{ $schedule->reminder->formatedTime() }}
                                </div>
                            @else 
                                <div class="p-2 size-12" style="color: rgb(216, 13, 13);"> {{ __('There is no reminder settings for this schedule...') }} </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endslot
    @endschedules

    {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".target-modal">Small modal</button>  --}}

    {{--  <div class="modal fade target-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            ...
            </div>
        </div>
    </div>  --}}
@endsection