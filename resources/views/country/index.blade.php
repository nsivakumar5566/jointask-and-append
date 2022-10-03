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
          <a class="btn btn-primary" href="{{ route('country.create') }}">Add new Country</a> 
        </div>

  <table class="table table-bordered mt-5">
  <thead>
    <tr>
      <th scope="col">S.NO</th>
      <th scope="col">Country Name</th>
      <th scope="col">Country Code</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($data as $key)
    <tr>
      <td>{{++$i}}</td>
      <td>{{$key->country_name}}</td>
      <td>{{$key->country_code}}</td>    
    </tr>
@endforeach
  </tbody>
</table>
      </div>
</div>  
@endsection