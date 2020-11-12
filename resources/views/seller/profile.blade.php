@extends('layout')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
                    <form method="POST" action="/profile/update">
                        @csrf
                        <div class="row">
                            <div class="col-md-offset-2 col-md-8">
                                <div class="panel">
                                    <div class="panel-heading custom-header-panel">
                                        <h3 class="panel-title roboto">Profile setting</h3>
                                    </div>
                                   <div class="panel-body">



                            <div class="form-group">

                                <label class="col-sm-4 control-label" for="fullname" readonly> Your Fullname :  <span class="required"> *</span></label>
                                <div class="col-sm-8">
                                   <input class="form-control" type="text" name="fullname" id="fullname" value="" placeholder="{{ Auth::user()->fullname }}" readonly>
                                </div>
                            </div>
                       

                        <div class="form-group">
                                <label class="col-sm-4 control-label" for="email">New Email :  <span class="requerido"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="" oninvalid="this.setCustomValidity('Champe required')" oninput="setCustomValidity('')"  maxlength="70">
                                   @error('email')
                           <p class="text-danger">{{ $message }}.</p>
                            @enderror
                                </div>

                                <br>


                        <div class="form-group">
                                <label class="col-sm-4 control-label" for="exampleInputPassword1"> New Password :  <span class="required"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" id="password" value="" oninvalid="this.setCustomValidity('champ required')" oninput="setCustomValidity('')" required="" maxlength="70">
                                   @error('password')
                     
                             <p class="text-danger">{{ $message }}.</p>
                            @enderror
                                </div>
                            </div>

                        <div class="form-group">
                                <label class="col-sm-4 control-label" for="exampleInputPassword1"> Confirm Password :  <span class="required"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password_confirmation" id="password-confirm" value="" oninvalid="this.setCustomValidity('champ required')" oninput="setCustomValidity('')" required="" maxlength="70">
                                    @error('password_confirmation')
                           <p class="text-danger">{{ $message }}.</p>
                            @enderror
                                </div>
                            </div>
                           
         
   
                                  
                            </div>
                            <!--Fin datos personales-->
                            <div class="form-group text-center">
                                <button type="submit" id="submit_btn" class="btn btn-orange-md roboto">Save</button>
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