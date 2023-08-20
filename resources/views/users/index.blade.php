@extends('layout.application')

@section('title', 'All users')

@section('content')
    <div class="row py-5">
        <div class="col-md-6">
            <h2>All Users</h2>
        </div>
        <div class="col-md-6">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
        </div>
    </div>
    <table class="table table-secondary">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">created At</th>
            <th scope="col">updated At</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-success">View</a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">edit</a>
{{--                    <button onclick="delete_user({{ $user->id }})" class="btn btn-warning">delete</button>--}}
                    <form class="d-inline" method="post" action="{{ route('users.destroy', $user->id) }}">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger"> Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        const delete_user = function ($id) {
            // confirm to delete user

            // delete user call endpoint
        }

    </script>

@endsection
