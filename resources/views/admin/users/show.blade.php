@extends('layouts.dashboard')

@section('content')
    <h4 class="my-5">Dati utente</h4>

    <h5 class="my-1">Nome: {{$user->name}}</h5>
    <h5 class="my-1">Email: {{$user->email}}</h5>

    <div class="my-3">
        <a href="{{ route('admin.users.edit', $user->id) }}">Modifica</a>
    </div>
@endsection
