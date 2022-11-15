@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="m-2">
                    <div class="d-flex">
                        <label class="mr-2" for="title">Titolo</label>
                        <input @error('title')
                            class="is-invalid border border-danger"
                        @enderror type="text" name="title" id="title" value="{{ old('title', $post->title) }}">
                        @error('title')
                            <h5 class="text-danger ml-4">{{ $message }}</h5>
                        @enderror
                    </div>
                </div>
                <div class="m-2">
                    <div class="d-flex">
                        <label class="mr-2" for="description">Descrizione</label>
                        <input @error('description')
                            class="is-invalid border border-danger"
                        @enderror type="text" name="description" id="description" value="{{ old('description', $post->description) }}">
                        @error('description')
                            <h5 class="text-danger ml-4">{{ $message }}</h5>
                        @enderror
                    </div>
                </div>
                <div class="m-2">
                    <input type="submit" value="Modifica">
                </div>
            </form>
        </div>
    </div>
@endsection
