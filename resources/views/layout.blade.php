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
    <link rel="stylesheet" href="{{ asset('css/ticket.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example').DataTable( {
        "scrollX": true
          } );
          } );</script>

    </head>
      <body>

<div class="wrapper d-flex align-items-stretch">
<nav id="sidebar" class="active">
<h1><a href="/seller_dashboard" class="logo"><img src="/img/logo.png" alt="URHDIPTV logo"></a></h1>
<ul class="list-unstyled components mb-5">
<li class="active">
<a href="/newline"><span class="fa fa-plus-square-o"></span>Create New</a>
</li>
<li>
   
<a href="/lines/{{ Auth::user()->id }}"><span class="fa fa-user"></span> Lines</a>
</li>

<li>
<a href="/api"><span class="fa fa-cogs"></span> Api</a>
</li>
<li>
<a href="{{ url('tickets') }}"><span class="fa fa-paper-plane"></span> Tickets</a>
</li>
<li>
<a href="#"><span class="fa fa-shield" ></span> Activation</a>
</li>
</ul>
<div class="footer">
<p>
Copyright &copy;<script type="c2e39225edbc203267afca61-text/javascript">document.write(new Date().getFullYear());</script> All rights reserved | This system is made with <i class="fa fa-heart" aria-hidden="true"></i>
 by <a href="https://www.urhdiptv.com/" target="_blank" style="color:black;">URhdiptv developers</a>
</p>
</div>
</nav>

<div id="content" class="p-4 p-md-5">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<button type="button" id="sidebarCollapse" class="btn btn-primary">
<i class="fa fa-bars"></i>
<span class="sr-only">Toggle Menu</span>
</button>
<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<i class="fa fa-bars"></i>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
<ul class="nav navbar-nav ml-auto">


</li>
<li class="nav-item">
<a class="nav-link" href="/profile" style="color: black;">You are login as : <i class="fa fa-user-circle" aria-hidden="true"  style="color: red"></i>
{{ Auth::user()->fullname }}</a>
</li>

<li class="nav-item">
<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i>{{ __('Logout') }}

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form></a>
</li>

</ul>
</div>
</div>
</nav>

    <div id="app">
        @include('flash-message')
        @yield('content')
    </div>
<style type="text/css">.custom-header-panel{background-color: #ff7c3e !important;border-color: #ff7c3e !important;color: white;}.no-margin-form-group {margin: 0 !important;}.requerido {color: red;}.btn-orange-md {background: #FF791F !important;border-bottom: 3px solid #ae4d13 !important;color: white;}.btn-orange-md:hover {background: #d86016 !important;color: white !important;}</style>
     
    </body>
</div>
</div>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

    </html>