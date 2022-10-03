@extends('layouts.app')
@section('content')
<div class="container mt-5">
  <div class="row"> 
        <div class="col-lg-6 text-end">
          <a class="btn btn-primary" href="{{ route('country.index') }}">Add new Country</a>
          <a class="btn btn-primary" href="{{ route('state.index') }}">Add new States</a>  
          <a class="btn btn-primary" href="{{ route('city.index') }}">Add new Cities</a> 
          <a class="btn btn-primary" href="{{ route('product.index') }}">Add Product</a>
        </div>
      </div>
</div>  
@endsection