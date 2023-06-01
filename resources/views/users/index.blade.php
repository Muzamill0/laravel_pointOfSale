@extends('layout.main')

@section('title', 'Admin | Users')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-6">
                <h4>Users</h4>
            </div>
            <div class="col-6 text-end">
                <a class=" btn btn-primary" href="{{ route('create.user') }}"><i class="fas fa-user-plus"></i> Add User</a>
            </div>
        </div>
    </div>
    <table class="table table-hover mt-3" id="table">
        <thead>
            @if (count($users) > 0)
                <tr>
                    <th scope="col">S no:</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td scope="row"> {{ $loop->iteration}}</td>
                    <td scope="row"> {{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @foreach ($user->roles as $role )
                    <td>{{ $role->name }}</td>
                    @endforeach
                    <td>
                        <a class="btn btn-warning" href="{{ route('edit.user', $user->id) }}">Edit</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal" onclick="deleteUser({{ $user->id }})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    @else
        <p>No User Found</p>

        @endif
    </table>
</div>

<!--delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete User?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure?
                <form action="" method="POST" id="form">
                    @csrf
                    <input type="submit" value="Delete" class="btn btn-danger mt-3">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteUser(id) {
        let form = document.getElementById('form');
        let route = "{{ route('delete.user', ':id') }}";
        route = route.replace(':id', id)

        form.setAttribute('action', route)

    }
</script>

@endsection
