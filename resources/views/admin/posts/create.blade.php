@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-6">
            <form action="{{ route('admin.posts.store') }}" method="POST">
                @csrf
                <div class="m-2">
                    <label for="title">Titolo</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="m-2">
                    <label for="description">Descrizione</label>
                    <input type="text" name="description" id="description">
                </div>
                <div class="m-2">
                    <input type="submit" value="Aggiungi">
                </div>
            </form>
        </div>
    </div>
@endsection
