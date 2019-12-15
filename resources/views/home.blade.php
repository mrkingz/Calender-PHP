@extends('layouts.app')

@section('content-header', 'Schedules')

@section('content')

    @section('navbar')
        @include('partials._navbar')
    @endsection
    <div class="container" style="margin-top:50px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row no-gutters">
                    @yield('filters')
                    <div class="col-lg-8 col-md-8 col-sm-12 mt-2">
                        <div class="mx-1"> 
                            @yield('page-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="min-height: 100px"></div>
    </div>
@endsection
