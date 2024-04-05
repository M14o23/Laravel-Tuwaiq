<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
    
  </head>
<body dir="{{(session()->get('locale')=='ar' ? 'rtl' : 'ltr')}}">
    <div id="app">
       <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light text-white" style="background-color: rgb(74, 95, 201);">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->
      <button
        data-mdb-collapse-init
        class="navbar-toggler"
        type="button"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <!-- Navbar brand -->
        <a class="navbar-brand mt-2 mt-lg-0 text-white " href="#">
          <img
            src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp"
            height="15"
            alt="MDB Logo"
            loading="lazy"
          />
        </a>
        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('index')}}">{{__('message.Dashboard')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">{{__('message.Team')}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Projects</a>
          </li>
        </ul>
        <!-- Left links -->
      </div>
      <!-- Collapsible wrapper -->
  
      <!-- Right elements -->
      <div class="d-flex align-items-center">
        <!-- Icon -->
        <a class="text-reset me-3" href="#">
          <i class="fas fa-shopping-cart"></i>
          
          
        </a>
        <li class="nav-item dropdown p-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
           @if(session()->get('locale')=='ar')
           <img src="\assest\ar.png" class="" width="30" height="30"  alt="">
           @else
           <img src="\assest\en.png" class="" width="30" height="30"  alt="">
          @endif
          </a>
          <ul class="dropdown-menu ">
            <li><a class="dropdown-item text-center" href="{{ url('language/ar') }}">العربية   <img src="\assest\ar.png" class="" width="30" height="30"  alt="">  </a></li>
            <li><a class="dropdown-item text-center" href="{{ url('language/en') }}">English <img src="\assest\en.png" class="" width="30" height="30"  alt=""> </a></li>
            
          </ul>
          
        </li>
        
  
        <!-- Notifications -->
        <div class="dropdown">
          
            
          
          <li class="nav-item dropdown p-3">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="badge rounded-pill badge-notification bg-danger">{{ session('count') }}</span>
                <i class="bi bi-cart-check"></i>
            </a>
            <ul class="dropdown-menu">
               
                <li><a class="dropdown-item text-center" href="#">Checkout</a></li>
            </ul>
        </li>
        
          
        </div>
        
        <!-- Avatar -->
        <div class="dropdown">
          <a
            data-mdb-dropdown-init
            class="dropdown-toggle d-flex align-items-center hidden-arrow"
            href="#"
            id="navbarDropdownMenuAvatar"
            role="button"
            aria-expanded="false"
          >
            <img
              src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp"
              class="rounded-circle"
              height="25"
              alt="Black and White Portrait of a Man"
              loading="lazy"
            />
          </a>
          <ul
            class="dropdown-menu dropdown-menu-end"
            aria-labelledby="navbarDropdownMenuAvatar"
          >
            <li>
              <a class="dropdown-item" href="#">My profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Settings</a>
            </li>
            <li>
              <a class="dropdown-item" href="#">Logout</a>
            </li>
          </ul>
        </div>
      </div>
      <!-- Right elements -->
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
