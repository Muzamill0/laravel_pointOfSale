@extends('layout.main')

@section('title', 'Admin | Users')

@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3>Report Details</h3>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('purchases') }}" class="btn btn-outline-primary">Back</a>
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
                        {{-- <img src="{{ asset('uploads/' . ) }}" width="600" alt="product-image"> --}}


                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Cost Per Unit</th>
                                    <th scope="col">Sale Per unit</th>
                                    <th scope="col">Total Cost </th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $purchase->product->name }}</td>
                                    <td>{{ $purchase->product->description }}</td>
                                    <td>{{ $purchase->quantity }}</td>
                                    <td>{{ $purchase->product->cost_price }}</td>
                                    <td>{{ $purchase->product->sale_price }}</td>
                                    <td>{{ $purchase->total_price }}</td>
                                    <td>{{ $purchase->created_at->format('d-m-Y') }}</td>
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $purchase->suppliers->name }} </td>
                                    <td>{{ $purchase->suppliers->email }} </td>
                                    <td>{{ $purchase->suppliers->contact }} </td>
                                    <td>{{ $purchase->suppliers->address }} </td>
                                    <td>
                                        <a class="btn btn-danger"
                                            href="{{ route('purchase.delete', $purchase) }}">Delete Report</a>

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
