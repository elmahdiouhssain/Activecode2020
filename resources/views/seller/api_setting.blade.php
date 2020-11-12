@extends('layout')
@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">

            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="panel">
                        <div class="panel-heading custom-header-panel">
                            <h3 class="panel-title roboto">Api Connection Status : </h3>
                        </div>
                        <div class="panel-body">

                                <table class="table">
                                  <tbody>
                                    <tr>
                                      <th scope="row">Main server : </th>
                                      <td><i class="fa fa-server" aria-hidden="true"></i> {{$urlt}}</td>

                                    </tr>
                                    <tr>
                                      <th scope="row">Api key :</th>
                                      <td><i class="fa fa-key" aria-hidden="true"></i> {{$key}}</td>

                                    </tr>
                                    <tr>
                                      <th scope="row">Api Status</th>
                                       <?php
                                        if($result=="success"){
                                        ?>
                                      <td style="color:green;"><b><i class="fa fa-check-circle-o" aria-hidden="true"></i> {{$result}}</b></td>
                                      <?php
                                        }else
                                        {?>
                                        <td style="color:red;"><b><i class="fa fa-times-circle" aria-hidden="true"></i> Error connection !</b></td>
                                        <?php
                                        }
                                        ?>

                                    </tr>
                                    <tr>
                                      <th scope="row">Total Credit :</th>
                                      <td><i class="fa fa-circle" aria-hidden="true"></i> {{$credits}} </td>
                                    </tr>
                                    <tr>
                                     <th scope="row">Last Check :</th>
                                   <td><i class="fa fa-calendar" aria-hidden="true"></i> <script type="text/javascript">var today = new Date();var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();var dateTime = date+' '+time;document.write(today);</script></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <center><button onClick="window.location.reload()" id="submit_btn" class="btn btn-orange-md roboto"><i class="fa fa-refresh" aria-hidden="true"></i> Reload Api</button></center>
                                  
                            </div>
                            <!--Fin datos personales-->
                 
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