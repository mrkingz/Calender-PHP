@php
    $isNew =  $page == 'new';
    $text = $isNew ? 'New Schedule' : $view . ' Schedules';
@endphp
<div class="row mb-0 pb-0">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between mb-1 flex-wrap">
            <strong class="px-1 pt-1"> {{ ucFirst($text) }}</strong>
            @if (! $isNew )
                <div class="d-flex schedule-option">
                    <a id="schedule-type" class="nav-link btn btn-light px-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-chevron-down mx-"></i>
                    </a>
                    <div style="min-width: 8rem;" class="dropdown-menu dropdown-menu-right py-0 size-11" aria-labelledby="navbarDropdown">
                        {{--  <a class="dropdown-item px-3" href="{{ route('view.all') }}">
                            {{ __('All schedules') }}
                        </a>
                         <div class="dropdown-divider my-0"></div>  --}}
                        <a class="dropdown-item px-3" href="{{ route('view.completed') }}">
                            {{ __('Completed schedules') }}
                        </a>
                        <div class="dropdown-divider my-0"></div>
                        <a class="dropdown-item px-3" href="{{ route('view.pending') }}">
                            {{ __('Pending schedules') }}
                        </a>
                    </div>
                </div> 
            @endif
        </div>         
    </div>
</div>
<hr class="mt-0 mb-2"/>