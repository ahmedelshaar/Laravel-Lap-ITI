@extends('layout.application')

@section('title', 'Create User')

@section('content')
    <h2>Edit User #{{$user->id}}</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" placeholder="enter your name" name="name" value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}" name="email" placeholder="enter your email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="enter your password">
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
@endsection
