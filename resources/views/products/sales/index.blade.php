@extends('layout.main')

@section('title', 'Admin | Users')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-6">
                    <h4>Sales Report</h4>
                </div>
                <div class="col-6 text-end">
                </div>
            </div>
        </div>
        <table class="table mt-3" id="table">
            <thead>
                @if (count($sales) > 0)
                    <tr>
                        <th scope="col">S No:</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $sale->product->name}}</td>
                        <td>{{ $sale->customer->name}}</td>
                        <td>{{ $sale->quantity}}</td>
                        <td>{{ $sale->total_price}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('customer.product.show', $sale) }}">Details</a>
                            <a class="btn btn-danger"
                            href="{{ route('customer.product.delete', $sale) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        @else
            <p>No Sales Found</p>

            @endif
        </table>
    </div>


@endsection
