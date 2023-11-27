<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Onirban</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald:wght@400;500;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/all.min.css">
    <link rel="stylesheet" href="{{asset('contents/admin')}}/css/style.css">

    <link rel="stylesheet" href="{{asset('contents/website')}}/css/style.css">
    <!-- <link rel="stylesheet" href="{{asset('contents/website')}}/css/dashcss.css">
    <link rel="stylesheet" href="{{asset('contents/website')}}/css/responsive.css"> -->

    <link rel="stylesheet" href="{{asset('contents/website')}}/js/style.js">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="min-height: 60px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/userdashboard')}}">ONIRBAN BANGLADESH</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            @if (!empty(Auth::user()->photo))
                            <div class="profile-pic">
                                <img src="{{ asset('contents/admin/uploads/' . Auth::user()->photo) }}"
                                    alt="Profile Picture">
                            </div>
                            @else
                            <div class="profile-pic">
                                <img src="{{ asset('contents/admin/images/avatar.png') }}" alt="Profile Picture">
                            </div>
                            @endif

                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item text-capitalize" 
                                href="{{url('/userdashboard')}}"><i class="fas fa-user-shield"></i>
                                    Welcome </span> {{Auth::user()->name}} </a>
                            </li>
                            <li><a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"><i
                                        class="fas fa-sign-out-alt"></i> Logout</a></li>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
                @else
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{Route('login')}}">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{Route('register')}}">Register</a>
                    </li>
                </ul>
                @endauth
            </div>
        </div>
    </nav>

    @yield('contents')

    <footer class="footer">
        <div class="container-fluid footer_part">
            <div class="row" style="background-color:black;">
                <div class="col-md-2"></div>
                <div class="col-md-10 copyright">
                    <p >Copyright &copy; 2023 | All rights reserved by Onirban Bangladesh Technologies | Development By
                        <a href="#" style="color: #007bff;">Marwa Khanom Nurtaj.</a>
                    </p>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </footer>

</body>

</html>