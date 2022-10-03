@extends('layouts.app')
@section('content')
<div class="container mt-5">
  <div class="row"> 
        <div class="col-lg-6 text-end">
        @if ($message = Session::get('success'))
                <div class="alert alert-success mb-4">
                    <p class="mb-0">{{ $message }}</p>
                </div>
                @endif
          <a class="btn btn-primary" href="{{ route('city.create') }}">Add new city</a> 
        </div>
        <table class="table table-bordered mt-5">
    <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Country Name</th>
      <th scope="col">State Name</th>
      <th scope="col">City Name</th>
      <th scope="col">City Code</th>
      <th scope="col">Action</th>
      
     
    </tr>
  </thead>
  <tbody>
    @foreach($cities as $city)
    <tr>
      <td>{{++$i}}</td>
      <td>{{$city->Country->country_name}}</td>
      <td>{{$city->State->state_name}}</td>
      <td>{{$city->city_name}}</td>
      <td>{{$city->city_code}}</td> 
      <td><a href="{{ route('city.edit',$city->id) }}" class="btn btn-success">Edit</a></td>   
    </tr>
@endforeach
  </tbody>
</table>
  
      </div>
</div>  
@endsection