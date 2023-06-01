@extends('layout.main')

@section('title', 'Edit | User')

@section('content')
<div class="container ">
    <div class="col-md-12">
        <div class="row mb-3">
            <div class="col-6">
                <h4 class=" mt-3">Edit Category</h4>
            </div>
            <div class="col-6 text-end">
                <a class=" btn btn-primary mt-3" href="{{ route('categories') }}"><i class="fas fa-arrow-left"></i> Back</a>
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
        <form action="{{ route('category.edit', $category) }}" method="POST" class="bg-dark p-3">
            @csrf

            <div class="col-md-12">
                <label for="name" class="mt-2 text-white">Name</label>
                <input class="form-control" type="text" id="name" name="name"
                    value="{{ old('name') ? old('name') : $category->name }}" placeholder="Enter your name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <input type="submit" name="submit" value="Update" class="btn btn-primary mt-3">
        </form>
    </div>
</div>
@endsection
