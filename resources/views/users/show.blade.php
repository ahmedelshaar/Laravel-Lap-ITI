@extends('layout.application')

@section('title', 'Create User')

@section('content')
    <h2>view User # {{ $user->id }}</h2>
    <div class="mb-3">
        <label for="Name" class="form-label">Name</label>
        <input type="text" class="form-control" id="Name" placeholder="enter your name" name="name"
               value="{{ $user->name }}" disabled>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
               placeholder="enter your email" value="{{ $user->email }}" disabled>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Created At</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="email"
               placeholder="enter your email" value="{{ $user->created_at }}" disabled>
    </div>

    <table class="table table-responsive">
        <thead>
        <th>id</th>
        <th>title</th>
        <th>created_at</th>
        </thead>
        <tbody>
        @foreach($user->blogs as $blog)
            <tr>
                <td>{{$blog->id}}</td>
                <td>{{$blog->title}}</td>
                <td>{{$blog->created_at}}</td>
            </tr>
        @endforeach
        <tr>

        </tr>
        </tbody>
    </table>
@endsection
