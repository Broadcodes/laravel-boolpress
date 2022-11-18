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
            @php
                $index = 1;
            @endphp

            @foreach ($users as $user)
                <tr>
                    <td class="border border-dark px-4 py-1">{{ $index }}</td>
                    <td class="border border-dark px-4 py-1">{{ $user->name }}</td>
                    <td class="border border-dark px-4 py-1">{{ $user->email }}</td>
                    <td class="border border-dark px-4 py-1"><a class="text-decoration-none"
                            href="{{ route('admin.users.edit', $user->id) }}">Modifica</a></td>
                    <td class="border border-dark px-4 py-1">
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="border-0 bg-light text-primary" type="submit" value="Elimina">
                        </form>
                    </td>

                    @php
                        $index++;
                    @endphp
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
