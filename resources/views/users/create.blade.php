@extends('layout.main')

@section('title', 'Admin | Users')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-6">
                    <h4 class=" mt-3">Add User</h4>
                </div>
                <div class="col-6 text-end">
                    <a class=" btn btn-primary mt-3" href="{{ route('users') }}"><i class="fas fa-arrow-left"></i> Back</a>
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
            <form action="{{ route('create.user') }}" method="POST" class=" p-3">
                @csrf
                <div class="col-md-12">
                    <label for="name" class="mt-2 ">Name</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}"
                        placeholder="Enter your name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="email" class="mt-2 ">Email</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}"
                        placeholder="Enter your Email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="password" class="mt-2 ">Password</label>
                    <input class="form-control" type="password" id="password" name="password"
                        placeholder="Enter your Password">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-md-12">
                    <label for="role">Role</label>
                    <select name="role" id="role"
                        class="form-select @error('role') is-invalid @enderror">
                        <option value="" selected hidden disabled>Select a role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ old('role') == $role->id ? 'selected' : '' }}>{{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>

</div>

@endsection
