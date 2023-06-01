@extends('layout.main')

@section('title', 'Admin | Users')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-6">
                <h4>{{ $category->name }} Products</h4>
            </div>
            <div class="col-6 text-end">
                <a class=" btn btn-outline-primary" href="{{ route('categories') }}"> Back</a>
                @role('admin')
                <a class=" btn btn-primary" href="{{ route('category.product.create', $category) }}"> Add Product</a>
                @endrole
            </div>
        </div>
    </div>
    <table class="table mt-3" id="table">
        <thead>
            @if (count($products) > 0)
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price Per Unit</th>
                    <th scope="col">Action</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            @foreach ($product->suppliers as $supplier )
            <tr>
                    <td>{{ $supplier->product->name }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->product->quantity }}</td>
                    <td>{{ $supplier->product->sale_price }} Rs</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('category.product.show', $supplier) }}">Details</a>
                    </td>
                </tr>
                @endforeach
            @endforeach
        </tbody>
    @else
        <p>No Products Found</p>

        @endif
    </table>
</div>


@endsection
