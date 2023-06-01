@extends('layout.main')

@section('title', 'Admin | Users')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-6">
                <h4>Reports</h4>
            </div>
        </div>
    </div>
    <table class="table mt-3" id="table">
        <thead>
            @if (count($purchases) > 0)
                <tr>
                    <th>S no:</th>
                    <th scope="col">Category</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($purchases as $purchase)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $purchase->product->categories->name }}</td>
                <td>{{ $purchase->product->name }}</td>
                <td>{{ $purchase->suppliers->name }}</td>
                <td>{{ $purchase->quantity }}</td>
                <td>{{ $purchase->created_at->format('d-m-Y') }}</td>
                @if ($purchase->action )
                <td>{{ $purchase->action }}</td>
                @else
                <td>No Action</td>
            @endif
                <td>
                    <a class="btn btn-warning" href="{{ route('purchase.show', $purchase) }}">Details</a>
                    <a class="btn btn-danger" href="{{ route('purchase.delete', $purchase) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    @else
        <p>No Reports Found</p>

        @endif
    </table>
</div>


@endsection
