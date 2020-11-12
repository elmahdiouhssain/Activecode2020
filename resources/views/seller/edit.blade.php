@extends('layout')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">

        <form id="candidatedata" class="form-horizontal" method="POST" role="form" action="">


            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="panel">
                        <div class="panel-heading custom-header-panel">
                            <h3 class="panel-title roboto">Edit Subscription</h3>
                        </div>
                        <div class="panel-body">

                        	<div class="form-group">
                                <label class="col-sm-4 control-label" for="name">Main server url :  <span class="requerido"> *</span></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" value="" oninvalid="this.setCustomValidity('Campo requerido')" oninput="setCustomValidity('')" required="" maxlength="70">
                                </div>

                     
                            <table class="table">
								  <tbody>
								    <tr>
								      <th scope="row">Main server : </th>
								      <td>www.test.com:80000</td>

								    </tr>
								    <tr>
								      <th scope="row">Api key :</th>
								      <td>XeiOoez95d5zf</td>

								    </tr>
								    <tr>
								      <th scope="row">Api Status</th>
								      <td style="color:green;"><b>Connected</b></td>

								    </tr>
								    <tr>
								      <th scope="row">Total Credit :</th>
								      <td>100 </td>
								    </tr>
								    <tr>
								      <th scope="row">Last Check :</th>
								      <td>10/10/2020</td>
								    </tr>
								  </tbody>
								</table>
         
   
                                  
                            </div>
                            <!--Fin datos personales-->
                            <div class="form-group text-center">
                                <button type="submit" id="submit_btn" class="btn btn-orange-md roboto">Edit & Check</button>
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