@extends('layout.application')

@section('content')
    <form action="{{ route('blogs.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            @if($errors->has('title'))
                <div class="text-danger">
                    {{ $errors->first('title') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}">
            @if($errors->has('slug'))
                <div class="text-danger">
                    {{ $errors->first('slug') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Content</label>
            <textarea rows="8" class="form-control" name="body">{{old('body')}}</textarea>
            @if($errors->has('body'))
                <div class="text-danger">
                    {{ $errors->first('body') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">User</label>
            <select name="user_id" class="form-select">
                @foreach($users as $user)
                    <option value="{{ $user->id }}"
                            @if(old('user_id') == $user->id) selected @endif>{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-success">Submit</button>
        </div>


    </form>

@endsection
