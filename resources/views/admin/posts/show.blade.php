@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12 p-1 border border-dark">
            <h2>{{ $posts->title }}</h2>
            <p>{{ $posts->description }}</p>
            <a href="{{ route('admin.posts.edit', $posts->id) }}">Edit</a>
        </div>
    </div>
@endsection
