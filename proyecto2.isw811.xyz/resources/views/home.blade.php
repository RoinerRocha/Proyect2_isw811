<!doctype html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.9.1/dist/cdn.min.js"></script>
<head>
    <title>Main Page</title>
	<link rel="stylesheet" type="text/css" href="assets/main.css">
</head>
<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse navbar-ex1-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav">
          <a class="nav-link navlogo text-center" href="index.php">
            <img src="assets/images/logo.png">
          </a>
          @auth
          <li class="nav-item dropdown_list">
            <a href="#" class="nav-link dropdown_link">
              <span class="textside">Publicaciones Instantáneas</span>
              <img src="./assets/down.svg" class="dropdown_arrow">
              <input type="checkbox" class="dropdown_check">
            </a>
              <div class="dropdown_content">
                  <ul class="dropdown_sub">
                      <li class="dropdown_li">
                        <a href="{{ route('LoginTwitter') }}" class="dropdown_anchor">twitter</a>
                      </li>
                      <li class="dropdown_li">
                        <a href="{{ route('LinkedInLoginView') }}" class="dropdown_anchor">LinkedIn</a>
                      </li>
                      <li class="dropdown_li">
                        <a href="#" class="dropdown_anchor">Reddit</a>
                      </li>
                  </ul>
              </div>
          </li>

          <li class="nav-item dropdown_list">
            <a href="#" class="nav-link dropdown_link">
              <span class="textside">Publicaciones En Cola</span>
              <img src="./assets/down.svg" class="dropdown_arrow">
              <input type="checkbox" class="dropdown_check">
            </a>
              <div class="dropdown_content">
                  <ul class="dropdown_sub">
                      <li class="dropdown_li">
                        <a href="#" class="dropdown_anchor">twitter</a>
                      </li>
                      <li class="dropdown_li">
                        <a href="#" class="dropdown_anchor">LinkedIn</a>
                      </li>
                      <li class="dropdown_li">
                        <a href="#" class="dropdown_anchor">Reddit</a>
                      </li>
                  </ul>
              </div>
          </li>

          <li class="nav-item dropdown_list">
            <a href="#" class="nav-link dropdown_link">
              <span class="textside">Publicaciones Programadas</span>
              <img src="./assets/down.svg" class="dropdown_arrow">
              <input type="checkbox" class="dropdown_check">
            </a>
              <div class="dropdown_content">
                  <ul class="dropdown_sub">
                      <li class="dropdown_li">
                        <a href="{{ route('ScheduledPost') }}" class="dropdown_anchor">twitter</a>
                      </li>
                      <li class="dropdown_li">
                        <a href="#" class="dropdown_anchor">LinkedIn</a>
                      </li>
                      <li class="dropdown_li">
                        <a href="#" class="dropdown_anchor">Reddit</a>
                      </li>
                  </ul>
              </div>
          </li>
          @else
          <li class="nav-item dropdown_list">
            <a href="#" class="nav-link dropdown_link">
              <span class="textside">Publicaciones Instantáneas</span>
              <img src="./assets/down.svg" class="dropdown_arrow">
              <input type="checkbox" class="dropdown_check">
            </a>
          </li>

          <li class="nav-item dropdown_list">
            <a href="#" class="nav-link dropdown_link">
              <span class="textside">Publicaciones En Cola</span>
              <img src="./assets/down.svg" class="dropdown_arrow">
              <input type="checkbox" class="dropdown_check">
            </a>
          </li>

          <li class="nav-item dropdown_list">
            <a href="#" class="nav-link dropdown_link">
              <span class="textside">Publicaciones Programadas</span>
              <img src="./assets/down.svg" class="dropdown_arrow">
              <input type="checkbox" class="dropdown_check">
            </a>
          </li>
          @endauth
      </ul>
      
      
      <ul class="navbar-nav2 ml-auto">
        @if (Route::has('login'))
          <div>
            @auth
              <span class="text-name">Bienvenido, {{ auth()->user()->username }}!</span>
              
              <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6 logout">
                @csrf
                  <button type="submit">Log Out</button>
              </form>
            @else
              <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
              @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
              @endif
            @endauth
          </div>
        @endif  
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">

      <!-- Icon Cards-->
        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
            <div class="inforide">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4 col-4 rideone">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/1245px-Logo_of_Twitter.svg.png">
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                    <h4>Twitter</h4>
                    <h2>Disponible</h2>
                </div>
              </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
              <div class="inforide">
                <div class="row">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridetwo">
                      <img src="https://blog.waalaxy.com/wp-content/uploads/2021/01/linkedin-3.png">
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                      <h4>LinkedIn</h4>
                      <h2>Disponible</h2>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-12 mb-2 mt-4">
              <div class="inforide">
                <div class="row">
                  <div class="col-lg-3 col-md-4 col-sm-4 col-4 ridethree">
                      <img src="https://cdn.freebiesupply.com/logos/large/2x/reddit-2-logo-png-transparent.png">
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-8 col-8 fontsty">
                      <h4>Reddit</h4>
                      <h2>Disponible</h2>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</body>
