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
      <body   onmousemove="total()">
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
              
              {{-- <a id="navbarDropdown" class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a> --}}

              <a class="nav-link"href="{{ route('profile-settings') }}">
                {{ __('MY Profile') }}
              </a>


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
   <br><br><br><br>

<!-- Navbar End -->

                                <div class="container">
                                    <div class="row justify-content-center ">
                                        <table class="table">
                                            <tr> 
                                                <th colspan="4" class="text-center"><img src="../img/profile.jpg" style="width: 150px;"></th>
                                                <td></td>
                                            </tr>

                                            <tr>
                                                <th>Name:</th>
                                                <td>{{ Auth::user()->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email:</th>
                                                <td>{{ Auth::user()->email }}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone:</th>
                                                <td>{{ Auth::user()->phone }}</td>
                                            </tr>
                                            <tr>
                                                <th>Address:</th>
                                                <td>{{ Auth::user()->address }}</td>
                                            </tr>

                                            {{-- <form action="{{route('book.show2', [$data->id])}}" method="POST"> --}}
                                                @csrf
                                            {{-- <tr>
                                                <th>Booking:</th>
                                                <td><button class="btn btn-info">Your Booking</button></td>
                                            </tr> --}}
                                            </form>
                                       </table>
                        </div>
                    </div>
      </body>
