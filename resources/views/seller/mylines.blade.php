@extends('layout')
@section('content')

<div class="container">
<div class="row">
    <div class="col-md-12">
            @csrf
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="panel">
                        <div class="panel-heading custom-header-panel">
                            <h3 class="panel-title roboto">Lines generated :</h3>
                        </div>
                       
                        <?php 
                          $a=count($datasending);
                          $b=intval($nombre);
                          $c=$b-$a;
                          if($b>=$a){
                          ?>
                          <br><div class="alert alert-dark" role="alert">
                              <h5> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{$c}} lines Not created for credit reason .</h5>
                            </div>

                          <?php
                          }
                          if(isset($datasending) && !empty($datasending)){
                        ?> 
                               <div class="panel-body"><br>
                              <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col" style="width: 20%;" >Lines</th>
                                      <th scope="col">Username</th>
                                      <th scope="col">Password</th>
                                      <th scope="col">ActiveCode</th>
                                      <th scope="col">Message</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                   
                                    <?php
                                      $i=0;
                                      foreach ($datasending as $results) {
                                       $i+=1;
                                    ?>
                                      <tr>
                                        <th scope="row">{{$i}}</th>
                                        <td>{{$results[0]}}</td>
                                        <td>{{$results[1]}}</td>
                                        <td>---</td>
                                        <td>{{$results[2]}}</td>
                                      </tr>
                                    <?php  
                                      }
                                      ?>
                                  </tbody>
                                </table>
                            </div>
                         <?php
                          }else{
                             ?>
                             <h1><span class="label label-info">Empty data...!</span></h1>
                          <?php
                          }
                         ?>
                            <!--Fin datos personales-->
                            <div class="form-group text-center">
                                <button type="submit" id="submit_btn" class="btn btn-orange-md roboto">Copy all</button>
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