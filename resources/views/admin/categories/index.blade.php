@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-6 mb-4 p-4 border">
            <a href="{{ route('admin.categories.create') }}">
                <h2>Aggiungi una nuova categoria</h2>
            </a>
        </div>
    </div>

    <h3>Categorie:</h3>

    <div class="m-5">
        @foreach ($categories as $category)
            <div class="d-flex my-2">
                <form class="mr-3" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="X" class="rounded-circle border-danger text-danger">
                </form>
                <a href="{{ route('admin.categories.show', $category->id) }}">
                    <h4>{{ $category->name }}</h4>
                </a>
                <a class="mx-4" href="{{ route('admin.categories.edit', $category->id) }}">[Modifica]</a>
            </div>
        @endforeach
    </div>
@endsection
