@extends('layouts.dashboard')

@section('content')
    <div class="m-5">
        <h3>Post presenti nella categoria "{{ $category->name }}"</h3>

        <div class="m-5">
            @foreach ($posts as $post)
                <a href="{{ route('admin.posts.show', $post->id)}}"><h4>{{ $post->title }}</h4></a>
            @endforeach
        </div>

    </div>
@endsection
