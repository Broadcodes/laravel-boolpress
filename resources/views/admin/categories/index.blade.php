@extends('layouts.dashboard')

@section('content')
    <h3>Categorie:</h3>

    <div class="m-5">
        @foreach ($categories as $category)
            <a href="{{ route('admin.categories.show', $category->id) }}"><h4>{{ $category->name }}</h4></a>
        @endforeach
    </div>
@endsection
