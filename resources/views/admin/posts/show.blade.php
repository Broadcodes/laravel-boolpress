@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-12 p-1 border border-dark">

            <h2>{{ $post->title }}</h2>

            @if ($post->category)
                <p>Categoria: {{ $post->category->name }}</p>
            @else
                <p>Nessuna categoria</p>
            @endif

            <p>Descrizione: {{ $post->description }}</p>

            <div class="tags">
                <div class="d-flex">
                    <p>Tags:</p>
                    @foreach ($post->tags as $tag)
                        <p class="mx-2">{{ $tag->name }}</p>
                    @endforeach
                </div>

            </div>

            <div class="d-flex">
                <a href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
                <form class="ml-2" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Cancella">
                </form>
            </div>
        </div>
    </div>
@endsection
