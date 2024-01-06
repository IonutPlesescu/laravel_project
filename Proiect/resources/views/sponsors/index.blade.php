@extends('layouts.app')

@section('content')
    <h1>Sponsors</h1>

    <a href="{{ route('sponsors.create') }}" class="btn btn-primary">Add Sponsor</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nume</th>
                <th>Logo</th>
                <th>Suma</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sponsors as $sponsor)
                <tr>
                    <td>{{ $sponsor->id }}</td>
                    <td>{{ $sponsor->nume }}</td>
                    <td>
                        @if($sponsor->logo)
                            <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Logo" height="50">
                        @else
                            No Logo
                        @endif
                    </td>
                    <td>{{ $sponsor->suma }}</td>
                    <td>{{ $sponsor->email }}</td>
                    <td>
                        <a href="{{ route('sponsors.show', $sponsor->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('sponsors.edit', $sponsor->id) }}" class="btn btn-warning">Edit</a>
                        
                        <!-- Delete Form -->
                        <form action="{{ route('sponsors.destroy', $sponsor->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this sponsor?')">Delete</button>
                        </form>
                        <!-- End Delete Form -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
