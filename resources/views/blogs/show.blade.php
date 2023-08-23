@extends('layout.application')

@section('content')

    <div class="mb-3">
        <h3>Title</h3>
        <h4>{{ $blog->title }}</h4>
    </div>
    <div class="mb-3">
        <h3>slug</h3>
        <h4>{{ $blog->slug }}</h4>
    </div>
    <div class="mb-3">
        <h3>content</h3>
        <h4>{{ $blog->body }}</h4>
    </div>
    <div class="mb-3">
        <h3>Created By</h3>
        <h4>{{ $blog->user->name }}</h4>
    </div>


@endsection
