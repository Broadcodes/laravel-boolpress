@extends('layouts.dashboard')

@section('content')
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-12">
                <a href="{{ route('admin.posts.show', $post->id) }}"><h3>{{$post->title}}</h3></a>
            </div>
        @endforeach
    </div>
@endsection
