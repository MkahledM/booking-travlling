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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

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
                          <p>Show Plasces</p>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="/custplace" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Edit Plasces</p>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Place</h4>
                </div>
                <div class="card-body">
                   <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('place.store')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                    <label for="exampleInputEmail1" class="form-label">Name</label>
                                    <input type="text"  name="name" class="@error('name') is-invalid @enderror form-control" >
                                    @error('name')
                                    <div class="alert alert-danger mt-1 mb-1">Enter Your Name Correct</div>
                                    @enderror

                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Price</label>
                                <input type="text"  name="price" class="@error('price') is-invalid @enderror form-control">
                                @error('price')
                                <div class="alert alert-danger mt-1 mb-1">Enter Your Price</div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <input type="text"  name="description" class="@error('description') is-invalid @enderror form-control" >
                                @error('description')
                                <div class="alert alert-danger mt-1 mb-1">Enter Your Description</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Location</label>
                                <input type="text"  name="location" class="@error('location') is-invalid @enderror form-control"  >
                                @error('location')
                                <div class="alert alert-danger mt-1 mb-1">Please Enter Your Location</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">rate</label>
                                <input type="text"  name="rate" class="@error('rate') is-invalid @enderror form-control"  >
                                @error('rate')
                                <div class="alert alert-danger mt-1 mb-1">Please Enter Your rate</div>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Image</label>
                                <input type="file"  name="name_img" placeholder="Choose file..." class="@error('file') is-invalid @enderror form-control"  >
                                @error('name_img')
                                <div class="alert alert-danger mt-1 mb-1">Pleace Enter Your Image</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                            <a href="/custplace" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                   </div>
                    </div>
                </div>
            </div>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

{{-- <div class="container">
    <form action="{{route('place.store')}}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text"  name="name" class="@error('name') is-invalid @enderror form-control">
          @error('name')
          <div class="alert alert-danger mt-1 mb-1">Enter Your Name Correct</div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="text"  name="price" class="@error('price') is-invalid @enderror form-control">
            @error('price')
            <div class="alert alert-danger mt-1 mb-1">Enter Your Price</div>
            @enderror
            </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input type="text"  name="description" class="@error('description') is-invalid @enderror form-control">
            @error('description')
            <div class="alert alert-danger mt-1 mb-1">Enter Your Description</div>
            @enderror
            </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Location</label>
            <input type="text"  name="location" class="@error('location') is-invalid @enderror form-control">
            @error('location')
            <div class="alert alert-danger mt-1 mb-1">Please Enter Your Location</div>
            @enderror
            </div>


          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            <input type="file"  name="name_img" placeholder="Choose file..." class="@error('file') is-invalid @enderror form-control">
            @error('name_img')
            <div class="alert alert-danger mt-1 mb-1">Pleace Enter Your Image</div>
            @enderror
            </div>


        <button type="submit" class="btn btn-info">Submit</button>

      </form>
     </div> --}}
