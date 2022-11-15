@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12 p-1 border border-dark">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
            <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
        </div>
    </div>
@endsection
