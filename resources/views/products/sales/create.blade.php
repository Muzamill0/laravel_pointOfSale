@extends('layout.main')

@section('title', 'Admin | categorys')

@section('content')
    <div class="container">
        <div class="col-md-12 card p-3">
            <div class="row mb-3">
                <div class="col-6">
                    <h4 class="">Add Product And Supplier</h4>
                </div>
                <div class="col-6 text-end">
                    <a class=" btn btn-primary" href="{{ route('products') }}"><i class="fas fa-arrow-left"></i> Back</a>
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
            <form action="{{ route('customer.product.create', $supplier) }}" method="POST" class="card p-3">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <h4>Product Details</h4>
                        <div class="col-md-12">
                            <label for="name" class="mt-2">Name</label>
                            <input class="form-control" type="text" id="name" name="name"
                                value="{{ $supplier->product->name }}" placeholder="Enter product name" disabled>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="mt-2">Description</label>
                            <input class="form-control" type="text" id="description" name="description"
                                value="{{ $supplier->product->description }} " disabled>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="quantity" class="mt-2">Quantity</label>
                            <input class="form-control" type="number" id="quantity" name="quantity" value="1"
                                placeholder="Enter product quantity" oninput="getPrice()">
                            @error('quantity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="price" class="mt-2">Price Per Unit</label>
                            <input class="form-control" type="number" id="price" name="price"
                                value="{{ $supplier->product->sale_price }}" placeholder="Enter product price">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="col-6">
                        <h4>Customer Details</h4>
                        <div class="col-md-12">
                            <label for="c_name" class="mt-2">Customer Name</label>
                            <input class="form-control" type="text" id="c_name" name="c_name"
                                value="{{ old('c_name') }}" placeholder="Enter customer name">
                            @error('c_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="c_email" class="mt-2">Customer Email</label>
                            <input class="form-control" type="text" id="c_email" name="c_email"
                                value="{{ old('c_email') }}" placeholder="Enter customer email">
                            @error('c_email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="c_contact" class="mt-2">Customer Contact</label>
                            <input class="form-control" type="number" id="c_contact" name="c_contact"
                                value="{{ old('c_contact') }}" placeholder="Enter customer contact">
                            @error('c_contact')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="c_address" class="mt-2">Customer Address</label>
                            <input class="form-control" type="text" id="c_address" name="c_address"
                                value="{{ old('c_address') }}" placeholder="Enter customer address">
                            @error('c_address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>

                <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3 ">
            </form>
        </div>
    </div>
    </div>






@endsection
<script>
    function getPrice() {
        const quantity = document.getElementById('quantity').value;
        const perUnitPrice = document.getElementById('price');


        const totalPrice = quantity * perUnitPrice.value;
        perUnitPrice.value = totalPrice;

    }
</script>
