<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href=" {{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet" />
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <div class="logo simple-text logo-normal">
      <img src="{{ asset('assets/img/logo.png') }}" width="25" heigth="20">
          <span class="font">ReTrack</span>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{ route('home') }}">
              <img class="nav-icon" src="{{ asset('assets/img/dashboard.png') }}" width="25" heigth="25">
              <p class="p1">Dashboard</p>
            </a>
          </li>
          <li>
            <a href="{{ route('agenda') }}">
              <img class="nav-icon" src="{{ asset('assets/img/agenda.png') }}" width="25" heigth="25">
              <p class="p2">Agenda</p>
            </a>
          </li>
          <li>
            <a href="{{ route('maps') }}">
              <img class="nav-icon" src="{{ asset('assets/img/maps.png') }}" width="25" heigth="30">
              <p class="p3">Maps</p>
            </a>
          </li>
          <li>
            <a href="{{ route('case_entry') }}">
              <img class="nav-icon" src="{{ asset('assets/img/laporan.png') }}" width="25" heigth="30">
              <p class="p5">Report</p>
            </a>
          </li>
          
        <div class="dropdown-submenu">
          <ul>
            <li>
              <a href="">
                <img class="nav-icon" src="{{ asset('assets/img/data.png') }}" width="25" heigth="30">
                  <p class="p6">Data</p>
              </a>
              <ul>
                <li><a href=" {{ route('car') }}"><p>Car Data</p></a></li>
                <li><a href=" {{ route('police') }}"><p>Police Data</p></a></li>
                <li><a href=" {{ route('role') }}"><p>Role Data</p></a></li>
                <li><a href=" {{ route('location') }}"><p>Location Data</p></a></li>
                <li><a href=" {{ route('category') }}"><p>Category Data</p></a></li>
              </ul>  
            </li>    
          </ul>
        </div>

          <li>
            <a href="{{ route('history') }}">
              <img class="nav-icon" src="{{ asset('assets/img/riwayat.png') }}" width="25" heigth="30">
              <p class="p7">History</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="font-admin">
            @yield('name')
            </a>     
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="font-admin">Admin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link">
                  <img src="{{ asset('assets/img/police-icon.png') }}" width="30" heigth="35">
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg">
        
      </div>
      <div class="content">
          @yield('content')
      </div>
    </div>
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/now-ui-dashboard.min.js?v=1.3.0') }}" type="text/javascript"></script>
  <!-- <script src="../assets/demo/demo.js"></script> -->
</body>
