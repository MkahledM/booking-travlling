<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <base href="{{URL::to('/')}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{URL::to('admin/home')}}" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
    {{-- @dd("mostafa") --}}
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
      {{ Auth::user()->name }}
  </a>
    <a class="nav-link"href="{{ route('logout') }}"  onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">{{ __('logout') }}</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
      @csrf
  </form>
    @endguest
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('admin/home')}}" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Travel Booking</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{URL::to('admin/home')}}" class="d-block">Welcome  {{Auth::user()->name}}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="/role-register" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Users
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/placeadmin" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Places
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/placeadmin" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Show Places</p>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="/custplace" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Edit Places</p>
                      </a>
                    </li>
                </ul>
              </li>




              <li class="nav-item">
                <a  href="{{route('admin.index')}}" class="nav-link">
                  <i class="nav-icon fas fa-expand-arrows-alt"></i>
                  <p>
                    Hotel
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('admin.index')}}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Show Hotel</p>
                        </a>
                      </li>
                <li class="nav-item">
                    <a href="/custhotel" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Edit Hotel</p>
                    </a>
                  </li>
              </ul>
              </li>
          <li class="nav-item">
            <a href="/contactadmin" class="nav-link">
              <i class="nav-icon fas fa-file mr-2"></i>
              <p>
                Comments
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="container">
    </div>
        <div class="container my-5 d-flex justify-content-around">
            <div class="row">

                @foreach ($data1 as $item)
                <div class="col-md-4 col-sm-4 lg-12 mb-5 ">
            <div class="card border-0 shadow p-3 mb-5 bg-body rounded" style="width:100%; ">
                <img src="img/{{$item->name_img}}" class="card-img-top" style="width:100%; height:200px;">
                <div class="card-body" >
                  <h4 class="card-title">{{$item->name}}</h4>
                  <p class="card-text">
                    <span class="fa fa-star checked"></span>
                    <span>{{$item->rate}}</span>
                  </p>
                  <h5>{{$item->location}}</h5>
                  <h5><b>Price : </b>EGP {{$item->price}}</h4>


                </div>
            </div>
            </div>
            @endforeach

            </div>
            </div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
