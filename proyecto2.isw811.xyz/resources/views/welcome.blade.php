<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
    <title>Main Page</title>
	<link rel="stylesheet" type="text/css" href="assets/main.css">
</head>
<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
     <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav">

          <a class="nav-link navlogo text-center" href="index.php">
            <img src="assets/images/logo.png">
          </a>

        <li class="nav-item">
          <a class="nav-link sidefrst" href="index.php">
            <span class="textside">  Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link sidesecnd" href="employee.php">
            <span class="textside">  Employee</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidesthrd" href="clients.php">
            <span class="textside">  Clients</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidesforth" href="job.php">
            <span class="textside">  Jobs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidesfifth" href="quotation.php">
            <span class="textside">  Quotation</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link sidesix" href="service.php">
            <span class="textside">  Services</span>
          </a>
        </li>
      </ul>
      
      <ul class="navbar-nav2 ml-auto">
      @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
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
</html>
