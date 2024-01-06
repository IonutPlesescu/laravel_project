@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">CustomAdmins</h1>

        <div class="mb-3">
            <a href="{{ route('custom_admins.create') }}" class="btn btn-success">Create CustomAdmin</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customAdmins as $customAdmin)
                    <tr>
                        <td>{{ $customAdmin->id }}</td>
                        <td>{{ $customAdmin->username }}</td>
                        <td>{{ $customAdmin->email }}</td>
                        <td>{{ $customAdmin->numar_de_telefon }}</td>
                        <td>
                            <a href="{{ route('custom_admins.show', $customAdmin->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('custom_admins.edit', $customAdmin->id) }}" class="btn btn-warning">Edit</a>
                            <a>
                            <!-- Delete button -->
<form action="{{ route('custom_admins.destroy', $customAdmin->id) }}" method="POST" class="d-inline">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this CustomAdmin?')">Delete</button>
</form>

                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
