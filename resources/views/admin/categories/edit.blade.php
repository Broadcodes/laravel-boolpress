@extends('layouts.dashboard')

@section('content')
    <div class="m-5">
        <h3>Modifica della categoria "{{$category->name}}"</h3>

        <form class="m-5" action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Nome categoria:</label>
            <input @error('name') class="is-invalid border border-danger" @enderror type="text" name="name" id="name">
            <input type="submit" value="Modifica">
            @error('name')
                {{ $message }}
            @enderror
        </form>

    </div>
@endsection
