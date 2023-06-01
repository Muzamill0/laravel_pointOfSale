@extends('layout.main')

@section('title', 'Admin | categorys')

@section('content')
    <div class="container">
        <div class="col-md-12 card p-3">
            <div class="row mb-3">
                <div class="col-6">
                    <h4 class=" mt-3">Add Catogory</h4>
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
            <form action="{{ route('category.create') }}" method="POST" class="card p-3">
                @csrf

                <div class="col-md-12">
                    <label for="name" class="mt-2">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Enter your name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3 ">
            </form>
        </div>
    </div>

</div>




@endsection
