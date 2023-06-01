@extends('layout.main')

@section('title', 'Admin | categorys')

@section('content')
    <div class="container">
        <div class="col-md-12 card p-3">
            <div class="row mb-3">
                <div class="col-6">
                    <h4 class="">Edit Product And Supplier</h4>
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
            <form action="{{ route('product.edit', $supplier) }}" method="POST" class="card p-3" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <h4>Product Details</h4>
                        <div class="col-md-12">
                            <label for="name" class="mt-2">Name</label>
                            <input class="form-control" type="text" id="name" name="name"
                                value="{{ old('name') ? old('name') : $supplier->product->name }}" placeholder="Enter product name">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="mt-2">Description</label>
                            <input class="form-control" type="text" id="description" name="description"
                                value="{{ old('description') ? old('description') : $supplier->product->description}}" placeholder="Enter product description">
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="quantity" class="mt-2">Quantity</label>
                            <input class="form-control" type="number" id="quantity" name="quantity"
                                value="{{ old('quantity') ? old('quantity') : $supplier->product->quantity }}" placeholder="Enter product quantity">
                            @error('quantity')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="price" class="mt-2">Price Per Unit</label>
                            <input class="form-control" type="number" id="price" name="price"
                            value="{{ old('price') ? old('price') : $supplier->product->cost_price }}" placeholder="Enter product price">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="mt-2">Product Image</label>
                            <input class="form-control" type="file" id="image" name="image"
                                placeholder="Enter Product image">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="col-6">
                        <h4>Suppler Details</h4>
                        <div class="col-md-12">
                            <label for="s_name" class="mt-2">Supplier Name</label>
                            <input class="form-control" type="text" id="s_name" name="s_name"
                                value="{{ old('s_name') ? old('s_name') : $supplier->name }}" placeholder="Enter supplier name">
                            @error('s_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="s_email" class="mt-2">Supplier Email</label>
                            <input class="form-control" type="text" id="s_email" name="s_email"
                                value="{{ old('s_email') ? old('s_email') : $supplier->email  }}" placeholder="Enter supplier email">
                            @error('s_email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="s_contact" class="mt-2">Supplier Contact</label>
                            <input class="form-control" type="text" id="s_contact" name="s_contact"
                                value="{{ old('s_contact') ? old('s_contact') : $supplier->contact  }}" placeholder="Enter supplier contact">
                            @error('s_contact')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="s_address" class="mt-2">Supplier Address</label>
                            <input class="form-control" type="text" id="s_address" name="s_address"
                                value="{{ old('s_address') ? old('s_address') : $supplier->address  }}" placeholder="Enter supplier address">
                            @error('s_address')
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
