
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>@yield('title')</title>
  <!-- loader-->
  <link href="{{ url('assets/css/pace.min.css') }}" rel="stylesheet"/>
  <script src="{{ url('assets/js/pace.min.js') }}"></script>
  <!--favicon-->
  <link rel="icon" href="{{ url('assets/images/favicon.ico') }}" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="{{ url('assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="{{ url('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="{{ url('assets/css/animate.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="{{ url('assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="{{ url('assets/css/sidebar-menu.css') }}" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="{{ url('assets/css/app-style.css') }}" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="#">
       <img src="{{ url('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Onion Cafe</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">Onion Fitur</li>
      <li>
        <a href="{{ route('dashboard') }}">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="{{ route('menu.index') }}">
          <i class="zmdi zmdi-invert-colors"></i> <span>Menu</span>
        </a>
      </li>

      <li>
        <a href="{{ route('reservasi.index') }}">
          <i class="zmdi zmdi-card-travel"></i> <span>Reservasi</span>
        </a>
      </li>

      <li>
        <a href="{{ route('order.create') }}">
          <i class="zmdi zmdi-card-travel"></i> <span>Pemesanan</span>
        </a>
      </li>

      {{-- <li>
        <a href="{{ route('payments.pay') }}">
          <i class="zmdi zmdi-card-travel"></i><span>Pembayaran</span>
        </a>
      </li> --}}
      

    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Masukan Pencarian">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <i class="icon-user mt-3 user-title"> {{ auth()->user()->name }}</i>
            <p class="icon-envelope mt-3 user-subtitle "> {{ auth()->user()->email }}</p>
            <p class="user-subtitle">{{ auth()->user()->role }}</p>
            </div>
           </div>
          </a>
        </li>
        {{-- <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
        <li class="dropdown-divider"></li> --}}
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="dropdown-item">
            <i class="icon-power"> Logout</i>
          </x-dropdown-link>
        </form>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
<div class="content-wrapper">
    @yield('content')
</div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('assets/js/jquery.min.js') }}"></script>
  <script src="{{ url('assets/js/popper.min.js') }}"></script>
  <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
	
 <!-- simplebar js -->
  <script src="{{ url('assets/plugins/simplebar/js/simplebar.js') }}"></script>
  <!-- sidebar-menu js -->
  <script src="{{ url('assets/js/sidebar-menu.js') }}"></script>
  <!-- loader scripts -->
  <script src="{{ url('assets/js/jquery.loading-indicator.js') }}"></script>
  <!-- Custom scripts -->
  <script src="{{ url('assets/js/app-script.js') }}"></script>
  <!-- Chart js -->
  
  <script src="{{ url('assets/plugins/Chart.js/Chart.min.js') }}"></script>
 
  <!-- Index js -->
  <script src="{{ url('assets/js/index.js') }}"></script>

  
</body>
</html>
