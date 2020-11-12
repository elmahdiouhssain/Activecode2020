@extends('layout')
@section('content')

<style type="text/css">.my-card
{
    position:absolute;
    left:40%;
    top:-20px;
    border-radius:50%;
}</style>

<div class="jumbotron">
<div class="row w-100">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-ravelry" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Total Code</h4></div>
       
                <div class="text-info text-center mt-2"><h1>{{ $act->activations_count }}</h1></div>
      
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-television" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Active Codes</h4></div>
                <div class="text-success text-center mt-2"><h1>{{ $actives->isactive }} <i class="fa fa-play-circle" style="color: green;" aria-hidden="true"></i></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-power-off" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Inactive Codes</h4></div>
                <div class="text-danger text-center mt-2"><h1>{{ $inactives->inactive }} <i class="fa fa-stop-circle" style="color: red;" aria-hidden="true"></i></h1></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-inbox" aria-hidden="true"></span></div>
                
                <div class="text-warning text-center mt-3"><h4>Tickets</h4></div>
    
                <div class="text-warning text-center mt-2"><h1>{{ $ticket->tickets_count }}</h1></div>
             
          
            </div>
        </div>
     </div>
</div>



<center>
<h4>Notice : For our resellers , just share the apk file with your clients to connect with their IPTV subscriptions .</h4><br>
<a href="/" target=__blank><img src="{{ asset('img/apk.jpg') }}"></a><br><br>


<p class="lead">Welcome to URHDIPTV active code system panel , today you can sell your iptv subscription only using the active code system without searching for m3U file or login credentials .</p>
<p class="lead">Our reseller system offer an interactive connection betwee your Reseller account and website if you want that , all you need is to put the api key with main server url to get connection and manage your subscription very easy without risking with your customers databases.</p>
<p class="lead">Our system work with an active code application by us to faciliate utilisation for our clients , so please to use our services , you need to download our apk file for andoid app .</p>
</center>
@endsection