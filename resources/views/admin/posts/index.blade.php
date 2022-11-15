@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-6 mb-4 p-4 border">
            <a href="{{ route('admin.posts.create') }}"><h2>Aggiungi nuovo</h2></a>
        </div>
    </div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-12 d-flex">
                <form class="mr-2" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="X" class="rounded-circle border-danger text-danger">
                </form>
                <a href="{{ route('admin.posts.show', $post->id) }}"><h3>{{$post->title}}</h3></a>
            </div>
        @endforeach
    </div>
@endsection
