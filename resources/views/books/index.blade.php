

 <!DOCTYPE html>
 <html lang="en">

 <head>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
     <meta charset="utf-8">
     <title>Tourism</title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport">
     <meta content="Free HTML Templates" name="keywords">
     <meta content="Free HTML Templates" name="description">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <!-- Favicon -->
     <link href="../img/favicon.ico" rel="icon">

     <!-- Google Web Fonts -->
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

     <!-- Font Awesome -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

     <!-- Libraries Stylesheet -->
     <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

     <!-- Customized Bootstrap Stylesheet -->
     <link href="/css/style.css" rel="stylesheet">

     <!-- Font Awesome Icon Library -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <style>
     .checked {
       color: orange;
     }
     </style>
 <body>
     <!-- Navbar Start -->

             <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
                 <a href="index.html" class="navbar-brand">
                     <h1 class="m-0 text-white"><span class="text-info">Travel Booking</h1>
                 </a>
                 <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                     <div class="navbar-nav ml-auto py-0">
                        <a href="/start" class="nav-item nav-link active text-info">Home</a>
                         <a href="/hotel" class="nav-item nav-link">Hotels</a>
                         <a href="/place" class="nav-item nav-link">Places</a>
                         <a href="/book" class="nav-item nav-link">booking</a>
                         <a href="/contact" class="nav-item nav-link">Contact</a>
                     </div>
                 <ul class="navbar-nav ms-auto">
                  <!-- Authentication Links -->
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
                  <a id="navbarDropdown" class="nav-link " href="{{ route('profile-settings') }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                  <a class="nav-link"href="{{ route('logout') }}"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">{{ __('logout') }}</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                      {{-- <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }}
                          </a>

                          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">

                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>
                          </div>
                      </li> --}}
                  @endguest
              </ul>
            </div>
             </nav>

     <!-- Navbar End -->


<div class="container my-5 d-flex justify-content-around">

  <div class="row">
    <div class='col col-sm-12 col-md-6 col-lg-12'>

    @if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

     <table class="table"  >
      <tbody>
        @foreach ($data as $item)
       
          <td> <div class="mb-3">
            <img src="../img/{{$item->name_img}}" width="200px" height="200px">
            </div></td>
       
          <td> <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$item->name}}" readonly>
          </div></td>
       
          <td> <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">room</label>
            <input type="text" class="form-control" name="price" id="val1" value="{{$item->room}}" readonly>

            </div>
          </td>
       
          <td> <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">arive</label>
            <input type="text" class="form-control" name="arive" id="val1" value="{{$item->arive}}" readonly>

            </div>
          </td>
       

          <td> <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">leave</label>
            <input type="text" class="form-control" name="leave"  value="{{$item->leave}}" readonly>

            </div>
          </td>
       

          <td> <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">days</label>
            <input type="text" class="form-control" name="price"  value="{{$item->days}}" readonly>

            </div>
          </td>
        

          <td> <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">total price</label>
            <input type="text" class="form-control" name="price" id="val1" value="{{$item->total}}" readonly>

            </div>
          </td>
        

          <td> <div class="mb-3">
            <form action="{{route('book.destroy',[$item->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-danger mt-4 ">x</button>
            </form>
            </div>
          </td>
          {{-- <td> <div class="mb-3">
            
              <a href="{{route('book.edit',[$item->id])}}" class="btn btn-danger mt-4 ">edit</a>
            
            </div>
          </td> --}}

        </tr>
        @endforeach
        <tr>
          <td>
            <div class="mb-3">
              <form action="/send-mail" method="GET">
                @csrf
                <button type="submit" class="btn btn-danger mt-4 ">confirm</button>
              </form>
              <br>
              <a href="/payment" class="btn btn-info py-md-2 px-md-4 font-weight-semi-bold">Pay with PayPal</a>
              </div>
          </td>
        </tr>
      </tbody>
    </table>
</div>
    
  </div>
</div>
</div>


  >


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-info back-to-top"><i class="fa fa-angle-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>

