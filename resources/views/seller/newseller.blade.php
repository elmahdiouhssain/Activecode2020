
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
    $('#example').DataTable( {
        "scrollX": true
          } );
          } );</script>

    </head>
     <body>	
     	<div class="container">
     		
     		<div class="row">
<style type="text/css">@media(min-width: 768px) {
  .field-label-responsive {
    padding-top: .5rem;
    text-align: right;
  }
}</style>
<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="/request_account">
    	@csrf
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6"><br>
                <h2>Request activecode account </h2>
                <p>By sending a request to getting UHRIDPTV active code panel ,  we will review it and w'll contact you as soon possible. </p>
                
                <hr>


                <div id="app">
				        @include('flash-message')
				        @yield('content')
				    </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="fullname">Fullname</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                        <input type="text" name="fullname" class="form-control" id="fullname"
                               placeholder="John Doe" required autofocus>
                    		</div>
                    		@if ($errors->has('fullname'))
                            <span style="color: red;">{{ $errors->first('fullname') }}</span>
                            @endif
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">E-Mail Address</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                        <input type="text" name="email" class="form-control" id="email"
                               placeholder="you@example.com" required autofocus>
                    </div>
                    @if ($errors->has('email'))
                                        <span style="color: red;">{{ $errors->first('email') }}</span>
                                    @endif
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password" required>
                    </div>
                    @if ($errors->has('password'))
                                        <span style="color: red;">{{ $errors->first('password') }}</span>
                                    @endif
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password-confirm">Confirm Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-repeat"></i>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control"
                               id="password-confirm" placeholder="Password" required autocomplete="password">
                    </div>
                    @if ($errors->has('password-confirmation'))
                                        <span style="color: red;">{{ $errors->first('password-confirmation') }}</span>
                                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="inputstate">Credit</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                           <i class="fa fa-money" aria-hidden="true"></i>

                        </div>
					    <select class="form-control" id="inputstate">
					      <option>10codes</option>
					      <option>20codes</option>
					      <option>30codes</option>
					      <option>40codes</option>
					      <option>50codes</option>
					    </select>
					    
                    </div>
                            @if ($errors->has('inputstate'))
                            <span style="color: red;">{{ $errors->first('inputstate') }}</span>
                            @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="comment">Comment</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                        <div class="input-group-addon" style="width: 2.6rem">
                            <i class="fa fa-edit"></i>
                        </div>
					    <textarea class="form-control" id="comment" name="comment" placeholder="..." rows="3"></textarea>
                    </div>
                    @if ($errors->has('comment'))
                                    <div class="error">
                                        <span style="color: red;">{{ $errors->first('comment') }}</span>
                                    </div>
                                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <center>
                <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i> Request</button></center><br>
                <p>If you have already an account just access by using the buttong bellow :</p>
                <a href="/login" class="btn btn-info"><i class="fa fa-user-circle" aria-hidden="true" ></i> Login</a>
            </div>
        </div>
    </form>
</div>
</body>
