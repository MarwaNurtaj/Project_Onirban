@auth
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>
        <div class="container-fluid header_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-7"></div>
                <div class="col-md-3 top_right_menu text-end">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle top_right_btn text-capitalize" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if (!empty(Auth::user()->photo))
                            <img src="{{ asset('contents/admin/uploads/' . Auth::user()->photo) }}" class="img-fluid "
                                alt="Profile Picture">
                            @else
                            <img src="{{ asset('contents/admin/images/avatar.png') }}" class="img-fluid "
                                alt="Profile Picture">
                            @endif

                            {{Auth::user()->name}}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('dashboard/user/view/' . Auth::user()->user_slug) }}"><i class="fas fa-user-tie"></i> View Your Profile</a></li>
                            <li><a class="dropdown-item" href="{{ url('dashboard/user/edit/' . Auth::user()->user_slug) }}"><i class="fas fa-user-tie"></i> Edit Your Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                                        class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </header>

    <section>
        <div class="container-fluid content_part">
            <div class="row">
                <div class="col-md-2 sidebar_part">
                    <div class="user_part">
                        @if (!empty(Auth::user()->photo))
                        <img src="{{ asset('contents/admin/uploads/' . Auth::user()->photo) }}" alt="Profile Picture">
                        @else
                        <img src="{{ asset('contents/admin/images/avatar.png') }}" class="img200" alt="Profile Picture">
                        @endif
                        <h5 class="text-capitalize">{{Auth::user()->name}}</h5>
                        <p><i class="fas fa-circle"></i> Online</p>
                    </div>
                    <div class="menu">
                        <ul>
                            <li><a href="{{url('dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>

                            <li><a href="{{url('dashboard/user')}}"><i class="fas fa-toggle-on"></i> Active Users</a>
                            </li>
                            <li><a href="{{url('dashboard/user/inactiveUser')}}"><i class="fas fa-toggle-off"></i>
                                    Deactivated Users</a></li>
                            <!-- <li><a href="{{url('dashboard/user/search')}}"><i class="fas fa-search"></i>
                                    Search Users</a></li> -->
                            <li><a href="{{url('dashboard/role')}}"><i class="fas fa-question-circle"></i> User
                                    Roles</a></li>
                            <li><a href="{{url('dashboard/user/notVerifiedUser')}}"><i class="fas fa-user-circle"></i>
                                    Not Verified Users</a></li>
                            <li><a href="{{ url('admin/user/pdf')}}"><i class="fas fa-file"></i> Reports</a></li>
                            <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                                        class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-md-10 content">
                    <div class="row">
                        <div class="col-md-12 breadcumb_part">
                            <div class="bread">
                                <ul>
                                    <li><a href=""><i class="fas fa-home"></i>Home</a></li>
                                    <li><a href=""><i class="fas fa-angle-double-right"></i>Dashboard</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @yield('page')

                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container-fluid footer_part">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10 copyright">
                    <p>Copyright &copy; 2023 | All rights reserved by Onirban Bangladesh Technologies | Development By
                        <a href="#">Marwa Khanom Nurtaj.</a>
                    </p>
                </div>
                <div class="clr"></div>
            </div>
        </div>
    </footer>


    <script src="{{asset('contents/admin')}}/js/jquery-3.6.0.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('contents/admin')}}/js/custom.js"></script>
</body>

</html>

@endauth