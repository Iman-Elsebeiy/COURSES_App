<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href={{asset("authen/vendor/bootstrap/css/bootstrap.min.css")}}>
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href={{asset("authen/vendor/font-awesome/css/font-awesome.min.css")}}>
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href={{asset("authen/css/font.css")}}>
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href={{asset("authen/https://fonts.googleapis.com/css?family=Muli:300,400,700")}}>
    <!-- theme stylesheet-->
    <link rel="stylesheet" href={{asset("authen/css/style.default.css")}} id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href={{asset("authen/css/custom.css")}}>
    <!-- Favicon-->
    <link rel="shortcut icon" href={{asset("authen/img/favicon.ico")}}>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>Login Form</h1>
                  </div>
                  <p> login here</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form action={{route('admin.login')}} method="post" class="form-validate">
                    @csrf
                    <div class="form-group">
                      <input id="email" type="email" name="email" required data-msg="Please enter your username" class="input-material">
                      <label for="email" class="label-material">email</label>
                       <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="form-group">
                      <input id="password" type="password" name="password" required data-msg="Please enter your password" class="input-material">
                      <label for="password" class="label-material">Password</label>
                      <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div><button  id="login" type="submit"  class="btn btn-primary">Login</button>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="#" class="forgot-pass">Forgot Password?</a><br><small>Do not have an account? </small><a href="register.html" class="signup">Signup</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
         <p>2018 &copy; Your company. Download From <a target="_blank" href={{asset("authen/https://templateshub.net")}}>Templates Hub</a>.</p>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src={{asset("authen/vendor/jquery/jquery.min.js")}}></script>
    <script src={{asset("authen/vendor/popper.js/umd/popper.min.js")}}> </script>
    <script src={{asset("authen/vendor/bootstrap/js/bootstrap.min.js")}}></script>
    <script src={{asset("authen/vendor/jquery.cookie/jquery.cookie.js")}}> </script>
    <script src={{asset("authen/vendor/chart.js/Chart.min.js")}}></script>
    <script src={{asset("authen/vendor/jquery-validation/jquery.validate.min.js")}}></script>
    <script src={{asset("authen/js/front.js")}}></script>
  </body>
</html>