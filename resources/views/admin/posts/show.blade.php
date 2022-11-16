@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12 p-1 border border-dark">

            <h2>{{ $post->title }}</h2>

            @if ($post->category)
                <p>{{ $post->category->name }}</p>
            @else
                <p>Nessuna categoria</p>
            @endif

            <p>{{ $post->description }}</p>

            <div class="tags">
                <h4>Tags:</h4>
                @foreach ($post->tags as $tag)
                    <div class="p-3">
                        <h5>{{$tag->name}}</h5>
                    </div>
                @endforeach
            </div>

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
