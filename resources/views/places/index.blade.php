@csrf

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tourism</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
     <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
.header-top ul li {
    display: inline-block;
    margin: 5px;
}

.header-top a:hover{
    text-decoration: underline;
}

.checked {
  color: orange;
}

.card:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2);
}
</style>
<body>

    <!--End Header-->
    <div class="container-fluid nav-bar p-0 text-center">
        <div class="container-fluid p-0 mb-5">
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto py-0">
                <a href="/start" class="nav-item nav-link active">Home</a>
                <a href="/place" class="nav-item nav-link">Places</a>
                <a href="/hotel" class="nav-item nav-link">hotel</a>
                <a href="/book" class="nav-item nav-link">booking</a>
                <a href="/contact" class="nav-item nav-link">contact us</a>
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
                @endguest
            </ul>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
    <!-- Carousel Start -->
 <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
           <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-fluid" src="img/mm.jpg " style="width: 100%; height:700px">
                    <div class="carousel-caption d-flex align-items-center justify-content-center ">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <div class="container-lg p-0">

                            <h1 class="text-white text-uppercase mb-md-3 text-center">Travel Booking</h1>
                            <br>
                            <div class="text-center  mb-md-3">
                                <a class="btn btn-outline-info rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://twitter.com/"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-info rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-info rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-outline-info rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://instagram.com/"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-outline-info rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="https://google.com/"><i class="fab fa-google-plus-g"></i></a>
                            </div>
                            <br>
                            <div class="text-center  mb-md-3">
                                <form class="container " method="GET" action="">
                                  @csrf
                                  <input type="search"
                                  class="form-control my-2 my-lg-0"
                                  name="search" id="search"
                                  placeholder="Search by place name"
                                  value="{{ $search }}"
                                  style="
                                  width: 30%;
                                  margin-left: 260px;
                                  align-items: center;">
                                  <button class="btn btn-info" type="submit" style="margin-top: 10px;
                                  margin-right: 10px;">Search</button>
                                  <a href="/place" >
                                    <button class="btn btn-info" type="button" style="margin-top: 10px;
                                  margin-right: 10px;">Reset</button>
                                  </a>
                                </form>
                              </div>
                        <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Start -->
    <br>
    <div class="container">
        <h1 class="m-0 text-white display-4 text-center text-danger">places</h1>
    </div>
        <div class="container justify-center">
            <div class="row">

                @foreach ($data as $item)
                <div class="col-md-4 col-sm-4 lg-12 mb-5 ">
            <div class="card border-0 shadow p-3 mb-5 bg-body rounded" style="width:100%; ">
                <img src="img/{{$item->name_img}}" class="card-img-top" style="width:100%; height:200px;">
                <div class="card-body" >
                  <h4 class="card-title">{{$item->name}}</h4>
                  <h5>{{$item->location}}</h5>
                <a
                  href="{{route ('place.show',[$item->id])}}"
                   class="btn btn-info "
                  style="width:100%;">
                    Details
                </a>

                </div>
            </div>
            </div>
            @endforeach

            </div>
            </div>


<!-- About End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 pt-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="index.html" class="navbar-brand">
                    <h1 class="m-0 mt-n2 text-white"><span class="text-info">Travel Booking</h1>
                </a>
                <p>The best tourist site in Minya</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-info rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-info rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-info rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-info rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="font-weight-bold text-info mb-4">Quick Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-info mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-info mr-2"></i>Places</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-info mr-2"></i>Services</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-info mr-2"></i>Receving</a>
                    <a class="text-white" href="#"><i class="fa fa-angle-right text-info mr-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="font-weight-bold text-info mb-4">Popular Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-info mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-info mr-2"></i>Places</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-info mr-2"></i>Services</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-info mr-2"></i>Receving</a>
                    <a class="text-white" href="#"><i class="fa fa-angle-right text-info mr-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="font-weight-bold text-info mb-4">Get In Touch</h5>
                <p><i class="fa fa-map-marker-alt text-info mr-2"></i>tal el amrna - el minia</p>
                <p><i class="fa fa-phone-alt text-info mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope text-info mr-2"></i>info@example.com</p>
            </div>
        </div>
    </div>
 
    <!-- Footer End -->

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


