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
                            <a href="{{ route('products') }}" class="btn btn-outline-primary">Back</a>
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
                        <img src="{{ asset('uploads/' . $supplier->product->image) }}" width="600" alt="product-image">


                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Cost Per Unit</th>
                                    <th scope="col">Sale Per unit</th>
                                    <th scope="col">Total Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $supplier->product->name }} </td>
                                    <td>{{ $supplier->product->description }} </td>
                                    <td>{{ $supplier->product->quantity }} </td>
                                    <td>{{ $supplier->product->cost_price }} </td>
                                    <td>{{ $supplier->product->sale_price }} </td>
                                    <td>{{ $supplier->product->total_price }} </td>
                                </tr>
                            </tbody>
                        </table>


                    </div>
                </div>

                <div class="col-12">
                    <div class="card-body">
                        <h3>Supplier Details</h3>

                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Address</th>
                                    @role('admin|manager')
                                        <th scope="col">Action</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $supplier->name }} </td>
                                    <td>{{ $supplier->email }} </td>
                                    <td>{{ $supplier->contact }} </td>
                                    <td>{{ $supplier->address }} </td>
                                    <td>
                                        @role('admin|manager')
                                            <a class="btn btn-warning" href="{{ route('product.edit', $supplier) }}">Edit</a>
                                        @endrole

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
