@extends('layouts.app')
@section('content')
<div class="container mt-5">
  <div class="row"> 
 <div class="col-sm-6">
 <form action="{{ route('city.update',$city->id)}}" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
  <label class="form-label" for="cars">Country Name:</label>
  <select class="form-control" name="country_id" id="cars">
    <option selected disabled>Choose a country</option>
    @foreach($countries as $country)
    <option value="{{ $country->id }}" {{ $country->id == $city->country_id ? 'selected':'' }}>{{$country->country_name}}</option>
  @endforeach
  </select>
  @if ($errors->has('country_id'))       
          <span class="error" style="color:red;">{{ $errors->first('country_id') }}</span>    
   @endif
  </div>
  <div class="mb-3">
  <label class="form-label" for="cars">State Name:</label>
  <select class="form-control" name="state_id" id="cars">
    <option selected disabled>Choose a state</option>
    @foreach($states as $state)
    <option value="{{ $state->id }}"{{ $state->id == $city->state_id ? 'selected':'' }}>{{$state->state_name}}</option>
  @endforeach
  </select>
  @if ($errors->has('state_id'))       
          <span class="error" style="color:red;">{{ $errors->first('state_id') }}</span>    
   @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">City Name</label>
    <input type="text" class="form-control" value="{{ $city->city_name}}" name="city_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    @if ($errors->has('city_name'))       
          <span class="error" style="color:red;">{{ $errors->first('city_name') }}</span>    
   @endif
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">City Code</label>
    <input type="number" class="form-control" value="{{ $city->city_code}}" name="city_code" id="exampleInputPassword1">
    @if ($errors->has('city_code'))       
          <span class="error" style="color:red;">{{ $errors->first('city_code') }}</span>    
   @endif
  </div>


  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
      </div>
</div>  
@endsection 