@extends('layouts.app')

@section('content')
    <h1>Detalii Bilet</h1>

    <a href="{{ route('bilete.index') }}" class="btn btn-primary">Inapoi la Lista Bilete</a>

    <table class="table mt-3">
        <tbody>
            <tr>
                <th>ID:</th>
                <td>{{ $bilet->id }}</td>
            </tr>
            <tr>
                <th>Tip:</th>
                <td>{{ $bilet->tip }}</td>
            </tr>
            <tr>
                <th>Pret:</th>
                <td>{{ $bilet->pret }}</td>
            </tr>
            <tr>
                <th>Disponibilitate:</th>
                <td>{{ $bilet->disponibilitate }}</td>
            </tr>
            <tr>
                <th>ID Eveniment:</th>
                <td>{{ $bilet->id_eveniment }}</td>
            </tr>
            <tr>
                <th>ID User:</th>
                <td>{{ $bilet->id_user }}</td>
            </tr>
            <tr>
                <th>Created At:</th>
                <td>{{ $bilet->created_at }}</td>
            </tr>
            <tr>
                <th>Updated At:</th>
                <td>{{ $bilet->updated_at }}</td>
            </tr>
            <!-- You can add more fields as needed -->
        </tbody>
    </table>
@endsection
