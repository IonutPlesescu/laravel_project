@extends('layouts.app')

@section('content')
    <h1>Sponsor Details</h1>

    <a href="{{ route('sponsors.index') }}" class="btn btn-primary">Back to Sponsors</a>

    <table class="table mt-3">
        <tbody>
            <tr>
                <th>ID:</th>
                <td>{{ $sponsor->id }}</td>
            </tr>
            <tr>
                <th>Nume:</th>
                <td>{{ $sponsor->nume }}</td>
            </tr>
            <tr>
                <th>Logo:</th>
                <td>
                    @if($sponsor->logo)
                        <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo" height="50">
                    @else
                        No Logo
                    @endif
                </td>
            </tr>
            <tr>
                <th>Suma:</th>
                <td>{{ $sponsor->suma }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $sponsor->email }}</td>
            </tr>
            <!-- Add more fields as needed -->
        </tbody>
    </table>
@endsection
