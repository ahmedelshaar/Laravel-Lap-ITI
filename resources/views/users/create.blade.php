@extends('layout.application')

@section('title', 'Create User')

@section('content')
    <h2>Create User</h2>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Name" placeholder="enter your name" name="name"
                   value="{{ old('name') }}">
            @if($errors->has('name'))
                <div class="text-danger">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                   placeholder="enter your email" value="{{ old('email') }}">
            @if($errors->has('email'))
                <div class="text-danger">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="enter your password">
            @if($errors->has('password'))
                <div class="text-danger">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
@endsection
