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
    <form method="POST" action="/register" class="container register">
        @csrf
        <div>
            <div class="row">
                <div class="col-md-3 register-left">
                    <img src="assets/images/Liu_Kang.png" alt=""/>
                    <h3>Welcome</h3>
                    <input type="submit" name="" value="Login"/><br/>
                </div>
                <div class="col-md-9 register-right">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">Register your User</h3>
                            <div class="row register-form">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input class="form-control" for="name" type="text" name="name" id="name" placeholder="Name *" required />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" for="username" type="text" name="username" id="username" placeholder="Username *" required />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" for="password" type="password" name="password" id="password" placeholder="Password *" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input  class="form-control" for="email" type="email" name="email" id="email" placeholder="Your Email *" required />
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