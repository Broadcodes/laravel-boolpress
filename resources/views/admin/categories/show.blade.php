@extends('layouts.dashboard')

@section('content')
    <div class="m-5">
        <h3>Post presenti nella categoria "{{ $category->name }}"</h3>

        <div class="m-5">

            @if (count($posts) > 0)
                @foreach ($posts as $post)
                    <a href="{{ route('admin.posts.show', $post->id) }}">
                        <h4>{{ $post->title }}</h4>
                    </a>
                @endforeach
            @else
                <h4>Nessun post presente per questa categoria</h4>
            @endif


        </div>

    </div>
@endsection
