@extends('layouts.app')
@section('content')
<div class="container mt-5">
  <div class="row"> 
 <div class="col-sm-6">
 <form action="{{ route('country.store') }}" method="POST">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Country Name</label>
    <input type="text" class="form-control"  name="country_name" id="exampleInputEmail1" aria-describedby="emailHelp">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Counter Code</label>
    <input type="number" class="form-control" name="country_code" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        </div>
      </div>
</div>  
@endsection 