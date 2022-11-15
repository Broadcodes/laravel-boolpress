@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-6 mb-4 p-4 border">
            <a href="{{ route('admin.posts.create') }}"><h2>Aggiungi nuovo</h2></a>
        </div>
    </div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-12">
                <a href="{{ route('admin.posts.show', $post->id) }}"><h3>{{$post->title}}</h3></a>
            </div>
        @endforeach
    </div>
@endsection
