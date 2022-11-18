@extends('layouts.dashboard')

@section('content')
    <h3>Utenti registrati:</h3>

    <table class="mt-5">
        <thead>
            <tr>
                <th class="px-4 py-1 border border-dark">ID</th>
                <th class="px-4 py-1 border border-dark">Nome</th>
                <th class="px-4 py-1 border border-dark">Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @foreach ($users as $user)
                    <td class="border border-dark px-4 py-1">{{ $user->id }}</td>
                    <td class="border border-dark px-4 py-1">{{ $user->name }}</td>
                    <td class="border border-dark px-4 py-1">{{ $user->email }}</td>
                    <td class="border border-dark px-4 py-1"><a class="text-decoration-none" href="{{ route('admin.users.edit', $user->id) }}">Edit</a></td>
                    <td class="border border-dark px-4 py-1">
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="border-0 bg-light text-primary" type="submit" value="Remove">
                        </form>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
@endsection
