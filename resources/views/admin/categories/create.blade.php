@extends('layouts.dashboard')

@section('content')
    <div class="m-5">
        <h3>Aggiungi una nuova categoria</h3>

        <form class="m-5" action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <label for="name">Nome categoria:</label>
            <input type="text" name="name" id="name">
            <input type="submit" value="Aggiungi">

        </form>

    </div>
@endsection
