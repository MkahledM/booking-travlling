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
.rating-css div{
    color: #ffe400;
    font-size:30px;
    font-family:sans-serif;
    font-weigth:800;
    /* text-align:center; */
    text-transform:uppercase;
    padding:10px 0;
}
.rating-css input{
    display: none;
}
.rating-css input + label{
    font-size: 30px;
    text-shadow: 1px 1px 0 #8f8420;
    cursor: pointer;
}
.rating-css input:checked + label ~ label{
    color: #b4afaf;
}
.rating-css label:active{
    transform:  scale(0.8);
    transition: 0.3s ease;
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

     <!-- Navbar End -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
        <form action="{{url('/add.rating')}}" method="post">
            @csrf
            <input type="hidden" name="hotel_id" value={{$data->id}}>
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Rate {{$data->name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="rating-css">
                    <div class="star-icon">
                        <input type="radio" value="1" name="product_raing" checked id="rating1">
                        <label for="rating1" class="fa fa-star"></label>
                        <input type="radio" value="2" name="product_raing"  id="rating2">
                        <label for="rating2" class="fa fa-star"></label>
                        <input type="radio" value="3" name="product_raing"  id="rating3">
                        <label for="rating3" class="fa fa-star"></label>
                        <input type="radio" value="3" name="product_raing"  id="rating4">
                        <label for="rating4" class="fa fa-star"></label>
                        <input type="radio" value="5" name="product_raing"  id="rating5">
                        <label for="rating5" class="fa fa-star"></label>
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
    
          </div>
        </div>
      </div>




     <div class="container ">
     <div class="">
    <h1 class="m-0 text-white display-4 text-center"><span class="text-danger">{{$data->name}} Hotel</span></h1>
    </div>


     <div id="map" style="width: 100%; height: 400px;" class="mt-5">
        <script>

            var map = L.map('map').setView([30, 31], 13);

            var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var marker = L.marker([30, 31]).addTo(map)
                .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup();

           


            var popup = L.popup()
                .setLatLng([30, 31])
                .setContent('I am in Minya.')
                .openOn(map);

            function onMapClick(e) {
                popup
                    .setLatLng(e.latlng)
                    .setContent('You clicked the map at ' + e.latlng.toString())
                    .openOn(map);
            }

            map.on('click', onMapClick);

        </script>
            </div>



            <br><br>


         <div class="row">
             <div class="card-body">


                     <img src="../img/{{$data->name_img}}" width="300px" height="300px" >
                     {{-- <img src="../img/{{$data->name_img}}" class="img-fluid rounded-start" >
                     <img src="../img/{{$data->name_img}}" class="img-fluid rounded-start" > --}}
                     <h3> Name: </h3><p class="card-text">{{$data->name}}</p>
                     <a href="" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-star"></i></a>

             <h3> Location: </h3><p class="card-text">{{$data->location}}</p>

              <h3> Description: </h3><p class="card-text">{{$data->description}}</p>



              <a href="{{route('book.show', [$data->id])}}" class="btn btn-danger" style="width:50%;">Book Room</a>

             </div>
         </div>


        </div>

        <div class="border p-5">
            <h3 class="font-weight-bold mb-4">Leave a comment</h3>

            <form action="{{route('comment.store')}}"

             method="POST">
                @csrf
                 <div class="form-group">
                    <input type="hidden" class="form-control" name="hotel_id" value="{{$data->id}}">
                </div>
                <div class="form-group">
                <input type="hidden" class="form-control" name="user_id" value="{{$data->id}}">
                </div>
                <div class="form-group">
                    <label for="comment">Comment *</label>
                    <textarea name="text" id="comment" cols="30" rows="5" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-0">
                    <input type="submit" value="Leave Comment" class="btn btn-info font-weight-semi-bold py-2 px-3">
                </div>
                {{--@dd(data) --}}
              </form>





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
