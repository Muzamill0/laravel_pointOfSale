@extends('layout.main')

@section('title', 'Admin | Users')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('customers.products') }}" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>

                </div>

                @if (session()->has('success'))
                    <div class="alert alert-warning mt-2" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @elseif(session()->has('failed'))
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ session()->get('failed') }}
                    </div>
                @endif
                <div class="col-12">
                    <div class="card-body">
                        <h3>Product Details</h3>
                        <img src="{{ asset('uploads/' . $sale->product->image) }}" width="600" alt="product-image">


                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price Per Unit</th>
                                    <th scope="col">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $sale->product->name }} </td>
                                    <td>{{ $sale->product->description }} </td>
                                    <td>{{ $sale->quantity }} </td>
                                    <td>{{ $sale->product->sale_price }} </td>
                                    <td>{{ $sale->total_price }} </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>

                <div class="col-12">
                    <div class="card-body">
                        <h3>Customer Details</h3>

                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $sale->customer->name }} </td>
                                    <td>{{ $sale->customer->email }} </td>
                                    <td>{{ $sale->customer->contact }} </td>
                                    <td>{{ $sale->customer->address }} </td>
                                    <td>
                                        <a class="btn btn-danger"
                                            href="{{ route('customer.product.delete', $sale) }}">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>

        </div>
        </div>
    </main>


@endsection
