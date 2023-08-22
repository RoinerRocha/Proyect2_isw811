<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!DOCTYPE html>
<html>
    
<head>
    <title>Registration Page</title>
	<link rel="stylesheet" type="text/css" href="assets/register.css">
</head>
<body>
    <form method="POST" action="{{ route('register') }}" class="container register">
        @csrf
        <div>
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="assets/images/Liu_Kang.png" alt=""/>
                    <h3>Welcome</h3>
                    <input href="{{ route('home') }}" type="submit" name="" value="Login"/><br/>
                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Register your User</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"  name="name"  value="{{ old('name') }}" placeholder="Name *" required autocomplete="name" autofocus />
                                        @error('name')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username"  value="{{ old('username') }}" placeholder="Username *" required autocomplete="name" autofocus />
                                        @error('username')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password"  placeholder="Password *" required autocomplete="new-password" />
                                        @error('password')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Confirm Password *" required autocomplete="new-password" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" placeholder="Your Email *" required autocomplete="email" />
                                        @error('email')
                                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btnRegister"  value="Register">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
