<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">

            @guest
            @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @endif


            @else
            <li class="dropdown header-profile">
                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">

                    <div class="header-info ms-3">
                        <span class="font-w600 ">Hi , {{ Auth::user()->name }}<b>


                            </b></span>
                        <small class="text-end font-w400">{{ Auth::user()->email }}</small>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <a href="app-profile.html" class="dropdown-item ai-icon">
                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="ms-2">Profile </span>
                    </a>
                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span class="ms-2">Inbox </span>
                    </a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                            <polyline points="16 17 21 12 16 7"></polyline>
                            <line x1="21" y1="12" x2="9" y2="12"></line>
                        </svg>
                        <span>
                            {{ __('Logout') }}
                        </span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>
            @endguest
            @if (Auth::user()->is_admin == 1)

            <li><a class="has-arrow ai-icon" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Trang Ch???</span>
                </a>


            </li>
            <li><a class="has-arrow ai-icon" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Qu???n L?? Nh??n Vi??n</span>
                </a>
                <ul aria-expanded="false">
                
                    <li><a href="{{route('CheckUser.index')}}">Danh S??ch</a></li>

                </ul>

            </li>

            @endif

            @if (Auth::user()->level == 2)

            <li><a class="has-arrow ai-icon" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Trang kho</span>
                </a>


            </li>

            @endif


            @if (Auth::user()->level == 3)

            <li><a class="has-arrow ai-icon" aria-expanded="false">
                    <i class="flaticon-025-dashboard"> S???n Ph???m</i>
                    <span class="nav-text"> </span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('addproduct')}}"> Th??m </a></li>
                    <li><a href="{{route('indexproduct')}}">Danh S??ch</a></li>

                </ul>

            </li>

          
            <li>
                <a href="" class="has-arrow ai-icon" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Kho</span>
                </a>
                <ul aria-expanded="false" class="mm-collapse mm-show">
                    <li><a href="{{ route('thukho') }}">Danh s??ch nh???p kho</a></li>

                </ul>
            </li>

            @endif




        </ul>
        <div class="copyright">

        </div>
    </div>
</div>
