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
                <div class="m-2 pt-3 pb-3 d-flex">
                    <label class="mr-2" for="categories">Categoria</label>
                    <select @error('categories')
                        class="is-invalid border border-danger"
                    @enderror name="categories" id="categories">
                        <option value="">Seleziona</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"{{ $category->id == old('category_id', $post->category_id) ? 'selected' : ''}}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('categories')
                        <h5 class="text-danger ml-4">{{ $message }}</h5>
                    @enderror
                </div>



                @if ($errors->any())
                    <div class="m-2 pt-3 pb-3">
                        <div @error('tags') class="is-invalid" @enderror>
                            <label>Tags:</label>
                            @foreach ($tags as $tag)
                                <input {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}} type="checkbox" name="tags[]" value="{{$tag->id}}">
                                <label>{{$tag->name}}</label>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="m-2 pt-3 pb-3">
                        <div @error('tags') class="is-invalid" @enderror>
                            <label>Tags:</label>
                            @foreach ($tags as $tag)
                                <input {{$post->tags->contains($tag) ? 'checked' : ''}} type="checkbox" name="tags[]" value="{{$tag->id}}">
                                <label>{{$tag->name}}</label>
                            @endforeach
                        </div>
                    </div>
                @endif



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
