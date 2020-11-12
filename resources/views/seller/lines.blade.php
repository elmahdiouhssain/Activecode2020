@extends('layout')
@section('content')

<div class="panel panel-dark">
  <div class="panel-heading"><h2 class="mb-4">Manage Lines</h2></div>
  <div class="panel-body">
  	<p>All subcriptions related to your account with customers details , you can get m3u url and editing all data  .</p>
  </div>



  	<table id="example" class="display" style="width:100%">

		<thead>
		<tr>
		<th>Active code</th>
		<th>Username</th>
		<th>Password</th>
		<th>Package</th>
		<th>Status</th>
		<th>M3U</th>
		<th>Created at</th>
		<th>Setting</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($activations as $activation)
		<tr>
		<td>{{ $activation->active_code }}</td>
		<td>{{ $activation->username }}</td>
		<td>{{ $activation->password }}</td>
		<?php
			$getdata = DB::select('select * from packages where xtreamui_id='.$activation->package);	
		?>
		<td>{{ $getdata[0]->name }}</td>
		@if (($activation->is_active) === 1)
		<td><den style="color: green;"><i class="fa fa-circle" aria-hidden="true"></i> Active</den></td>
		@else
		<td><den style="color: red;"><i class="fa fa-circle" aria-hidden="true"></i> Inactive</den></td>
		@endif
		<td><i class="fa fa-download" aria-hidden="true"></i><a href="{{ $activation->m3u }}" target="__blank"> Download</a></td>
		<td>{{ $activation->created_at }}</td>
		<td>
		@if (($activation->is_active) === 1)
		<a class="btn btn-danger btn-sm" href="{{route('lines.disable',$activation->id)}}" role="button" onclick="return confirm('Are You Sure You Wanna disable it ?')"><i class="fa fa-stop-circle-o" aria-hidden="true"></i> Disable</a>
		@else
		<a class="btn btn-success btn-sm" href="#" role="button" onclick="return confirm('Are You Sure You Wanna Enable it ?')"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Enable</a>
		@endif
		
		</td>
		</tr>
		@endforeach
		</tbody>
		</table>  

	
		</div>
		@endsection