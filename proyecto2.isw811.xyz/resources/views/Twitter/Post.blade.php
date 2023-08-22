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
    <form method="POST" action="{{ route('media_twitter_post') }}" class="container register">
        @csrf
        <div>
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="assets/images/Twitter.png" alt=""/>
                    <h3>Welcome</h3>
                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Post yout Tweet</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input id="message" type="text" class="form-control @error('message') is-invalid @enderror"  name="message"  value="{{ old('message') }}" placeholder="message *" required autocomplete="message" autofocus />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btnRegister"  value="Register">Postear</button>
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