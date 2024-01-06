@extends('layouts.app')

@section('content')
    <h1>Bilete</h1>
    <a href="{{ route('bilete.create') }}" class="btn btn-primary">Adauga Bilet</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tip</th>
                <th>Pret</th>
                <th>Disponibilitate</th>
                <th>ID Eveniment</th>
                <th>ID User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bilete as $bilet)
                <tr>
                    <td>{{ $bilet->id }}</td>
                    <td>{{ $bilet->tip }}</td>
                    <td>{{ $bilet->pret }}</td>
                    <td>{{ $bilet->disponibilitate }}</td>
                    <td>{{ $bilet->id_eveniment }}</td>
                    <td>{{ $bilet->id_user }}</td>
                    <td>
                        <a href="{{ route('bilete.show', $bilet->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('bilete.edit', $bilet->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('bilete.destroy', $bilet->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Sigur stergi biletul?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
