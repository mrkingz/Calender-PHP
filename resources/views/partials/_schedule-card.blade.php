<div class="outter-wrap bg-ligh p-1" style="background-color: #fff">
    <div class="outter-wrap dotted-border p-1">
        <span class="bold">{{ __('Title') }}</span>
        <hr class="my-1 dotted-border">
        <div class="inner-wra dotted-borde mt-1 p-2">
            {{ $schedule->title }}
        </div>
    </div>
    <hr class="my-1 hide">
    <div class="d-flex justify-content-between pb-0 p-1 mt-2">
        <div>
            <span class="bold" style="color:#17a2b8;">Due date:</span> 
            <span class="size-12">{{ $schedule->formatedDate() }} <span style="font-size:20px">&VerticalBar;</span> {{ $schedule->formatedTime() }}</span>
        </div>
        <div>
            {{--  <a class="btn btn-outline-dark btn-sm" href="{{ route('single', $schedule->id) }}">{{ __('View') }} </a>  --}}
            <a id="schedule-type" class="nav-link btn btn-light px-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="fa fa-chevron-down mx-"></i>
            </a>
            <div style="min-width: 8rem;" class="dropdown-menu dropdown-menu-right py-0 size-11" aria-labelledby="navbarDropdown">
                <a class="dropdown-item px-3" href="{{ route('single', $schedule->id) }}">
                    <i class="fa fa-eye mr-1"></i> {{ __('More details') }}
                </a>
                <div class="dropdown-divider my-0"></div>
                @if (! $schedule->isCompleted())
                    <a class="dropdown-item px-3" href="">
                        <i class="fa fa-check mr-1"></i> {{ __('Mark as completed') }}
                    </a>
                    <div class="dropdown-divider my-0"></div>
                @endif
                {{--  <button class="dropdown-item px-3" style="color: darkred" data-toggle="modal" data-target=".target-modal" value="{{ $schedule->id }}">
                    <i class="fa fa-trash mr-1"></i> {{ __('Delete') }}
                </button>  --}}
            </div>                                        
        </div>
    </div>
</div>
<hr class="my-2" />