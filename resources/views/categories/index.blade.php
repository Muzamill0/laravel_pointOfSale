@extends('layout.main')

@section('title', 'Admin | Users')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-6">
                <h4>Categories</h4>
            </div>
            <div class="col-6 text-end">
                @role('admin|manager')
                <a class=" btn btn-primary" href="{{ route('category.create') }}"><i class="fas fa-user-plus"></i> Add Category</a>
                @endrole
            </div>
        </div>
    </div>
    <table class="table mt-3" id="table">
        <thead>
            @if (count($categories) > 0)
                <tr>
                    <th scope="col">S:no</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td scope="row"> {{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        @role('admin|manager')
                        <a class="btn btn-warning" href="{{ route('category.edit', $category) }}">Edit</a>
                        @endrole
                        <a class="btn btn-success" href="{{ route('category.products', $category) }}">Products</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    @else
        <p>No Categories Found</p>

        @endif
    </table>
</div>


@endsection
