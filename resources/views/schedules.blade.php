@extends('home')

@section('filters')
    <div class="col-lg-4 col-md-4 col-sm-12 mt-2 before">
        <div class="p-2 mx-1 bg-light">
            mmmm
        </div>
    </div>
@endsection

@section('page-content')
    @schedules(['url' => route('new'), 'btn_text' => 'New Schedule'])
        @slot('content')
            <div class="schedules p-2">
                 @include('partials._schedule-header')
                <div class="row mb-0">
                    <div class="col-lg-12">
                        <div class="inner-wrap p-1 card-line mb-1">
                            @each('partials._schedule-card', $schedules, 'schedule', 'partials._no-schedule')
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        @endslot
    @endschedules
    <div class="mt-2">
        {{ $schedules->links() }}
    </div>

    {{--  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".target-modal">Small modal</button>  --}}

    {{--  <div class="modal fade target-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            ...
            </div>
        </div>
    </div>  --}}
@endsection