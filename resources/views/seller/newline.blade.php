@extends('layout')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">

        <form action="" method="post" action="{{ action('Seller\DashboardController@SendFormApi') }}">

            @csrf

            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="panel">
                        <div class="panel-heading custom-header-panel">
                            <h3 class="panel-title roboto">New Line</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Lines Number :  <span class="requerido"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="nbr" id="nbr" value="" oninvalid="this.setCustomValidity('Field required')" oninput="setCustomValidity('')" required="" maxlength="70">
                                    <!-- Error -->
                                    @if ($errors->has('nbr'))
                                    <div class="error">
                                        <span style="color: red;">{{ $errors->first('nbr') }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <script>
                                function myFunction(){
                                 var x = document.getElementById("mySelect").value;
                                 console.log(x);
                                 document.getElementById("total").innerHTML = x;
                                 console.log("dfdfdfd");

                                 if(x=="6"){total.innerHTML="24HOURS";}else if(x=="6"){total.innerHTML="48HOURS";}else if(x=="3"){total.innerHTML="03MONTHS";}else if(x=="4"){total.innerHTML="06MONTHS";}else if(x=="5"){total.innerHTML="12MONTHS";}}</script>
                            <div class="form-group">
                                <label for="country" class="col-sm-4 control-label">Package to assigne<span class="requerido"> *</span></label>
                                <div class="col-sm-8">
                                    <select id="mySelect" name="mySelect" class="form-control" required="" onchange="myFunction()">
                                <option value="" disabled="" selected="">Select your pack</option>
                                
                                @foreach ($packages as $package)
                                <option value="{{ $package->xtreamui_id }}">{{ $package->name }}</option>
                                @endforeach
                                    </select>
                                    @if ($errors->has('mySelect'))
                                    <div class="error">
                                        <span style="color: red;">{{ $errors->first('mySelect') }}</span>
                                    </div>
                                    @endif
                                 </div>
                            </div><br>
                            <table class="table">
                              <tbody>
                         
                                <tr>
                                  <th scope="row">Payment type :</th>
                                  <td>Credit</td>

                                </tr>
                                <tr>
                                  <th scope="row">Max connections :</th>
                                  <td>1 connection</td>

                                </tr>
                                <tr>
                                  <th  scope="row">Package type :</th>
                                  <td id ="total"></td>
                                </tr>
                                <tr>
                                  <th scope="row">Created by :</th>
                                  <td>{{ Auth::user()->fullname }}</td>

                                </tr>
                              </tbody>
                            </table>
                            
                                  
                            </div>
                            <!--Fin datos personales-->
                            <div class="form-group text-center">
                                <button type="submit" id="submit_btn" class="btn btn-orange-md roboto">Generate</button>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </form> <!-- Fint form -->  
    </div>
</div>
<!-- Tab panes -->


  </div>
</div>



@endsection