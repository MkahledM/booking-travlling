
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


<div class="container my-5 d-flex justify-content-around">
  <div class="row">
   
  <form action="{{route('book.store')}}" method="POST">
    @csrf


     <table class="table"  >

      <tbody>

        <tr>
          <td> <div class="mb-3">
            <img src="../img/{{$data->name_img}}" width="200px" height="200px">
            </div></td>

          <tr><td> <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$data->name}}" readonly>
          </div></td></tr>
          <tr><td><div class="mb-3">
            <select  name="room" id="types" onchange="change()" >
                @foreach($types as $type)
             <option  value="{{$type}}" ><br><br>{{$type}}</option>
           @endforeach
           </select>

                     <select name="price"  id="single" class="pr">
                @foreach($srooms as $room)
             <option value="{{$room->price}}"  id="val1"><br><br>{{$room->price}}</option>
           @endforeach
           </select>

           <select  name="price" id="double"   style="display:none;">
                @foreach($drooms as $room)
             <option value="{{$room->price}}"  id="val1"><br><br>{{$room->price}}</option>
           @endforeach
           </select>
          </div>
          <div class="mb-3">

            <input type="hidden" class="form-control" name="name_img"  value="{{$data->name_img}}">
            </div></td></tr>
            <tr>
          <td>
            {{-- <form name=booking> --}}
            <div class="mb-3">
              <form name=booking> 
              <label for="exampleInputEmail1" class="form-label">Arive</label>
              <input type="date"  id="val3" name="arive" onBlur=validate(this)    class=" form-control" >
                          
              <p id=message> </p>
            </form >
            </div>
          {{-- </form > --}}
          </td></tr>
          <tr>
          <td>
            {{-- <form name=booking1> --}}
            <div class="mb-3">
                

              <label for="exampleInputEmail1" class="form-label">leave</label>
              <input type="date"  id="val4"  name="leave"   class=" form-control" required >
              <p id='message2' style="color: red" > </p>
            </div>
          </td>
        </tr>
        <tr>
          <td>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">days</label>
              <input type="hidden"  id="m"   class="form-control"   name="days" >

           <span id="result"  class="form-control" onmousemove="totalday()" name="days"></span>
          </div>
        </td>
      </tr>
      <tr>
          <td>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">total</label>
              <input type="hidden"  id="x"   class="form-control"   name="total" >

            <span   id="tr"   class="form-control" onmousemove="total()" name="total" value="" readonly></span></td>
            </div>
            <td>
            </tr>
            <tr><td> <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"></label><br><br>
               <button type="submit" class="btn btn-danger" >Submit</button>
              </div></td>
        </tr>


      </tbody>
    </table>


  </form>
</div>

</div>


</div>


  <script>
    function total(){
      // if(select_id == "single"){
        num1 = document.getElementById("result").innerHTML;
num2 = document.getElementById("single").value;
     c=document.getElementById("tr").innerHTML = num1 * num2
    document.getElementById("x").value = c
// }
// else {
//   num1 = document.getElementById("result").innerHTML;
// num2 = document.getElementById("double").value;
//      c=document.getElementById("tr").innerHTML = num1 * num2
//     document.getElementById("x").value = c
// }




    }


    function totalday(){
        let date1 = new Date (document.getElementById("val3").value);
  let date2 = new Date (document.getElementById("val4").value);
if(date1.getTime() && date2.getTime()){

if(date2.getTime() < date1.getTime()){
 document.getElementById('message2').innerHTML='select correct date'
}else{

  let x = date2.getTime() - date1.getTime();
  let z = x/(1000*3600*24);
 d= document.getElementById("result").innerHTML=z;
  document.getElementById("m").value=d;}

}

}
function change(){
var select_id = document.getElementById("types").value;
var s = document.getElementById("single");
var d = document.getElementById("double");
if(select_id == "single"){
s.style.display = "block";
d.style.display = "none";
}else {
    d.style.display = "block";
s.style.display = "none";
}
}
function validate(formfield) {
var today=new Date();
var lastBookingDate=new Date();
var bookingDate = new Date(formfield.value);
lastBookingDate.setDate(today.getDate() +366);
if (!bookingDate.valueOf()){
  formfield.style.background='red';
  document.getElementById('message').style.color='red';

  document.getElementById('message').innerHTML = 'That is not a valid date.'
  formfield.style.background='red';
} else if (bookingDate < today ){
  formfield.style.background='red';
  document.getElementById('message').style.color='red';
  document.getElementById('message').innerHTML = 'That is in the past.'
} else if (bookingDate > lastBookingDate){
  formfield.style.background='red';
  document.getElementById('message').style.color='red';

  document.getElementById('message').innerHTML = 'That is too far ahead.'
} else {
  formfield.style.background='none';
  document.getElementById('message').innerHTML = "OK, your arive will be on: " + bookingDate.toDateString();
}
}
function validate2(formfield) {
var today=new Date();
var lastBookingDate=new Date();
var bookingDate = new Date(formfield.value);
lastBookingDate.setDate(today.getDate() +366);
if (!bookingDate.valueOf()){
  formfield.style.background='red';
  document.getElementById('message1').innerHTML = 'That is not a valid date.'
  formfield.style.background='red';
} else if (bookingDate < today ){
  formfield.style.background='red';
  document.getElementById('message1').innerHTML = 'That is in the past.'
} else if (bookingDate > lastBookingDate){
  formfield.style.background='red';
  document.getElementById('message1').innerHTML = 'That is too far ahead.'
} else {
  formfield.style.background='none';
  document.getElementById('message1').innerHTML = "OK, your booking will be on: " + bookingDate.toDateString();
}
}
// function date(){

// var today = new Date();
// var date1 = today.getDate()+"/"+(today.getMonth()+1)+"/"+today.getFullYear();
//  document.getElementById("val3").value;

// if( document.getElementById("val3").value = date1){
  
// }else{
//   alert('insert correct date')
// }

  




    </script>
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

