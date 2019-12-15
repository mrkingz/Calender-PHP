
<header class="navbar-border fixed-top">
    <div class="container">
        <div class="title mt-3">
            <div class="d-flex justify-content-between">
                <nav class="d-flex">
                    <div class="mr-2">
                        <a id="menu" href="#" class="btn btn-light btn-sm pb-0 px-1 btn-link" role="button" data-offset="0,3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="nav-menu"></span>
                        </a>
                        <div class="dropdown-menu py-0 size-11" data-offset="10,20" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item py-2" href="{{ route('view.pending') }}">
                                <i class="fa fa-calendar-check-o"></i> {{ __('Schedules') }}
                            </a>
                            <!-- <div class="dropdown-divider my-0"></div>
                            <a class="dropdown-item py-2" href="">
                                <i class="fa fa-list"></i> {{ __('My schedules') }}
                            </a>   -->
                            <div class="dropdown-divider my-0"></div>
                            <a class="dropdown-item py-2" href="">
                                <i class="fa fa-group"></i> {{ __('Groups') }}
                            </a>                 
                        </div>
                    </div>
                    <div>
                        <a class="navbar-brand brand-name pt-1 mx-0 mb-0 pb-0" href="{{ route('view.pending') }}">
                            {{ config('app.name', '') }}
                        </a>
                        <span class="bar"> | </span>
                        <span class="page">@yield('content-header')</span>
                    </div>
                </nav>
                <nav class="nav-item dropdown p-0 m-0 d-flex" >
                    <div>
                        <a id="notification" href="" class="btn btn-light mr-1 nav-link" data-offset="5,3">
                            <i class="fa fa-bell"></i> <span class="badge badge-danger"></span>
                        </a>
                    </div>
                    <div>
                        <a id="user" class="btn btn-light nav-link"  href="#" role="button" data-toggle="dropdown" data-offset="1,3" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user-circle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right py-0" aria-labelledby="navbarDropdown">
                            <div class="dropdown-header p-2 bg-light border-bottom" style="font-weight: normal">
                                <img src="{{ asset('storage/avatar.png') }}" height="50px" width="50px" alt="" class="rounded-circle border border-light mr-2"> {{ Auth::user()->name }}
                            </div>
                            <a class="dropdown-item py-2 px-3" href=""><i class="fa fa-user-circle"></i> {{ __('Account') }}</a>

                            <a class="dropdown-item py-2 px-3" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>