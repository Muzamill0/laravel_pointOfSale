@extends('layout.main')

@section('title', 'Admin | Users')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-6">
                <h4>Products</h4>
            </div>
            <div class="col-6 text-end">
                @role('admin|manager')
                <a class=" btn btn-primary" href="{{ route('product.create') }}"> Add Product</a>
                @endrole
            </div>
        </div>
    </div>
    <table class="table mt-3" id="table">
        <thead>
            @if (count($products) > 0)
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price Per Unit</th>
                    <th scope="col">Action</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
            @foreach ($product->suppliers as $supplier )
                    <td>{{ $supplier->product->categories->name }}</td>
                    <td>{{ $supplier->product->name }}</td>
                    <td>{{ $supplier->product->quantity }}</td>
                    <td>{{ $supplier->product->sale_price }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('product.show', $supplier) }}">Details</a>
                        @role('admin|staff')
                        <a class="btn btn-secondary" href="{{ route('customer.product.create', $supplier) }}">Sale Product</a>
                        @endrole
                    </td>
                        @endforeach
                </tr>
            @endforeach
        </tbody>
    @else
        <p>No Products Found</p>

        @endif
    </table>
</div>


@endsection
