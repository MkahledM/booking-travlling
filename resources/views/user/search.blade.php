
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
   
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
   
    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   
    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
   
    <!-- Font Awesome Icon Library -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <style>
    .checked {
      color: orange;
    }
    </style>
    <body >
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
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
        </div>
    </nav>
<!--end nav-->

<div class="container my-5 d-flex justify-content-around">
  <div class="row">
  <div class="col-md-6 col-sm-12 col-lg-12" style="width:100%;">
{{-- @dd($data) --}}
{{-- @dd($data) --}}
@foreach ($data as $item)
@foreach ($item as $item2)

<div class="card " >
<img src="img/{{$item2->name_img}}" class="card-img-top" style="width:100%; height:200px;">
<div class="col-lg-12" style="width:100%;">
  <h4 >{{$item2->name}}</h4>

  <p>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star"></span>
  </p>

  <h5>{{$item2->location}}</h5>
  <h5><b>Price : </b>EGP {{$item2->price}}</h4>
  <a
  href="{{route ('hotel.show',[$item2->id])}}"
   class="btn btn-info py-md-2 px-md-4 font-weight-semi-bold"
  style="width:100%;">
    Details</a>
</div>
</div>
@endforeach
@endforeach
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
              <p>Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et</p>
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
              <p>Dolor clita stet nonumy clita diam vero, et et ipsum diam labore</p>
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
