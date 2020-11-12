

<!DOCTYPE html>
<html>
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ActiveCode | URHDIPTV</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example').DataTable( {"scrollX": true} );} );</script>

    <link rel="stylesheet" href="{{ asset('css/style_login.css') }}">

    </head>
         <body>
                <div class="main">
                      <section class="sign-in">
                      <div class="container">
                      <div class="signin-content">
                      <div class="signin-image">
                      <figure><img src="https://i.pinimg.com/originals/9e/b5/82/9eb582587e03230dda926650a1b9756d.png" alt="sing up image"></figure>
                
                      </div>
                      <div class="signin-form">
                      <h2 class="form-title">Login</h2>
                      <form method="POST" class="register-form" id="login-form">
                        @csrf
                      <div class="form-group">
                      <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="form-group">
                      <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                      </div>
                      <div class="form-group">
                     <a href="#" class="signup-image-link">Forget password</a>
                      </div>
                      <div class="form-group form-button">
                      <input type="submit" name="signin" id="signin" class="btn btn-primary" value="Log in" />
                      <a href="/request_account" name="signin" id="signin" class="btn btn-info"><i class="fa fa-user-plus" aria-hidden="true" ></i> Request Account</a>


                      </div>
                      </form>
                      <div class="social-login">
                      <span class="social-label">Or login with</span>
                      <ul class="socials">
                      <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                      <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                      <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                      </ul>
                      </div>
                      </div>
                      </div>
                      </div>
                      </section>
                      </div>
                  </body></div>
