@extends('layout')
@section('content')

<form method="post" action="{{ route('seller.updateActivation', $activation->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="country_name">Subs Status:</label>
              <input type="text" class="form-control" name="is_active" value="{{ $activation->is_active }}"/>
          </div>
       
          <button type="submit" class="btn btn-primary">Update Data</button>
      </form>

@endsection