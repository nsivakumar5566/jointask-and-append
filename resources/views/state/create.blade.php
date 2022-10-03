@extends('layouts.app')
@section('content')
<div class="container mt-5">
  <div class="row"> 
 <div class="col-sm-6">
 <form action="{{ route('state.store')}}" method="POST">
    @csrf
  <div class="mb-3">
  <label class="form-label" for="cars">Country Name:</label>
  <select class="form-control" name="country_id" id="cars">
    <option selected disabled>Choose a country</option>
    @foreach($countries as $country)
    <option value="{{ $country->id }}">{{$country->country_name}}</option>
  @endforeach
  </select>
  @if ($errors->has('country_id'))       
          <span class="error" style="color:red;">{{ $errors->first('country_id') }}</span>    
   @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">State Name</label>
    <input type="text" class="form-control"  name="state_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    @if ($errors->has('state_name'))       
          <span class="error" style="color:red;">{{ $errors->first('state_name') }}</span>    
   @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">State Code</label>
    <input type="number" class="form-control" name="state_code" id="exampleInputPassword1">
    @if ($errors->has('state_code'))       
          <span class="error" style="color:red;">{{ $errors->first('state_code') }}</span>    
   @endif
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
      </div>
</div>  
@endsection 