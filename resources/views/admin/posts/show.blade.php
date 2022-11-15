@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12 p-1 border border-dark">

            <h2>{{ $post->title }}</h2>
            <p>{{ $post->category }}</p>
            <p>{{ $post->description }}</p>
            <div class="d-flex">
                <a href="{{ route('admin.posts.edit', $post->id) }}">Edit</a>
                <form class="ml-2" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Cancella">
                </form>
            </div>
        </div>
    </div>
@endsection
