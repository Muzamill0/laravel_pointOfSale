@extends('layout.main')

@section('title',' Admin | Dashboard');

@section('content');

<div class="container-fluid p-0">


    <h1 class="h3 mb-3"><strong>Welcome</strong> to Online sale managment</h1>

    @if (count($products) > 0)
    @foreach ($products as $product)
        
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Low Stock</strong> in {{ $product->categories->name }} Products  ({{ $product->name }}) 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endforeach
@endif

</div>
@endsection
