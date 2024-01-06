<!-- resources/views/parteneri/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Parteneri</h1>
    <a href="{{ route('parteneri.create') }}" class="btn btn-primary">Adauga Partener</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nume</th>
                <th>Logo</th>
                <th>Tip Partener</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parteneri as $partener)
                <tr>
                    <td>{{ $partener->id }}</td>
                    <td>{{ $partener->nume }}</td>
                    <td>{{ $partener->logo }}</td>
                    <td>{{ $partener->tip_partener }}</td>
                    <td>{{ $partener->email }}</td>
                    <td>
                        <a href="{{ route('parteneri.show', $partener->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('parteneri.edit', $partener->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('parteneri.destroy', $partener->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this partener?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
