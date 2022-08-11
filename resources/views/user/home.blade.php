<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Travel</title>
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

</style>
<body>
    <!--End Header-->
    <div class="container-fluid nav-bar p-0 text-center">
        <div class="container-fluid p-0 mb-5">
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav ml-auto py-0">
                <a href="/start" class="nav-item nav-link active text-info">Home</a>
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
          <li>
          <a class="nav-link" id="navbarDropdown"  href="{{ route('profile-settings') }}" role="button" aria-haspopup="true"  v-pre>
            {{ Auth::user()->name }}
          </a>
          </li>

          <a class="nav-link"href="{{ route('logout') }}"
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">{{ __('logout') }}
          </a>

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
 <div class="container-fluid p-0 mb-5 ">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
           <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="img-fluid" src="img/mm.jpg " style="width: 100%; height:700px">
                    <div class="carousel-caption d-flex align-items-center justify-content-center ">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <div class="container-lg p-0">

                              <br>

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

                        <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>

    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center pb-1">
                <div class="col-lg-5">
                    <img class="img-thumbnail p-3" src="img/Holy Family Hotel.jpg" alt="">
                </div>
                <div class="col-lg-7 mt-5 mt-lg-0">
                    <small class="bg-danger text-white text-uppercase font-weight-bold px-1">Who We Are</small>
                    <h1 class="mt-2 mb-4">Holy Family Hotel</h1>
                    <p class="mb-4">Welcome to Holy Family Hotel, your Bethlehem “home away from home.” Holy Family Hotel aims to make your visit as relaxing and enjoyable as possible, which is why so many guests continue to come back year after year.</p>
                    <a href="/hotel" class="btn btn-info py-md-2 px-md-4 font-weight-semi-bold">show More Hotels</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100">
          <img src="img/Queen Isis Floating Hotel 5.jpg" class="card-img-top" >
          <div class="card-body">
          <a href="/hotel">  <h3 class="card-title">Queen Isis</h3> </a>
            <p class="card-text"></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="img/Pioneer 5.jpg" class="card-img-top" >
          <div class="card-body">
          <a href="/hotel">  <h3 class="card-title">Pioneer Hotel</h3> </a>
            <p class="card-text"></p>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="img/MG Nefertiti8.jpg" class="card-img-top" >
          <div class="card-body">
            <a href="/hotel">  <h3 class="card-title">MG Nefertiti</h3> </a>
          </div>
        </div>
      </div>
    </div>
    </div>

    <br><br>

                <div class="container-fluid py-5">
                    <div class="container">
                        <div class="row align-items-center pb-1">
                            <div class="col-lg-5">
                                <img class="img-thumbnail p-3" src="img/mall6.jpg" alt="">
                            </div>
                            <div class="col-lg-7 mt-5 mt-lg-0">
                                <small class="bg-danger text-white text-uppercase font-weight-bold px-1">Who We Are</small>
                                <h1 class="mt-2 mb-4">Mallawi Museum</h1>
                                <p class="mb-4">Mallawi Museum is a museum of Egyptian antiquities in Mallawi, Minya Governorate, Upper Egypt.
                                    The museum was established in 1963 to house finds from local excavations and held an important collection of ancient Egyptian artifacts until it was looted in August 2013.[1][2] Over 1000 pieces were stolen or destroyed in the looting but around half of those have since been recovered.</p>
                                <a href="/place" class="btn btn-info py-md-2 px-md-4 font-weight-semi-bold">Show More Places</a>
                            </div>
                        </div>
                    </div>
                </div>
      <br>

      <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100">
              <img src="img/Hermopolis.jpg" class="card-img-top">
              <div class="card-body">
              <a href="/place">  <h3 class="card-title">Hermopolis</h3> </a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="img/Mallawi Museum4.jpg" class="card-img-top" >
              <div class="card-body">
              <a href="/place">  <h3 class="card-title">Mallawi Museum</h3> </a>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card h-100">
              <img src="img/Tell El-Amarna.jpg" class="card-img-top" >
              <div class="card-body">
                <a href="/place">  <h3 class="card-title">Tell El-Amarna</h3> </a>
              </div>
            </div>
          </div>
        </div>
        </div>

    <!-- About End -->
    <div class="container-fluid pt-5">
      <div class="container">
          <div class="row">
              <div class="col-lg-4 mb-5">
                  <small class="bg-danger text-white text-uppercase font-weight-bold px-1">What clients say</small>
                  <h1 class="mt-2 mb-3">Clients Say About Our Services</h1>
                  <h4 class="font-weight-normal text-muted mb-4"> </h4>
              </div>
              @foreach ($data as $item)
                      <div class="testimonial-item">
                          <div class="testimonial-text position-relative border mb-4" style="padding: 25px 30px;">
                            {{-- <h5 class="card-text"> {{$item->hotel->name}}</h5> --}}
                            <p>{{$item->text}}</p>
                          </div>
                          <div class="d-flex align-items-center">
                              <div class="pl-4">
                                  {{-- <h6 class="font-weight-bold">{{$item->user->name}}</h6> --}}
                                  <i class="text-muted"></i>
                              </div>
                          </div>
                      </div>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>


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
