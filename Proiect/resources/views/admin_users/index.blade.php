<!-- resources/views/admin_users/index.blade.php -->
@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="../../css/custom.css">
@endpush
@section('content')
    <div>
        <h1>Utilizatori Admin</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nume</th>
                    <th>Email</th>
                    <th>Rol</th>
                    @auth
                    @if(auth()->user()->getRole() === 'admin')
                    <th>Acțiuni</th>
                    @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        @auth
                        @if(auth()->user()->getRole() === 'admin')
                        <td>
                            <form action="{{ route('admin_users.toggle_role', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Schimbă Rolul</button>
                            </form>
                        </td>
                        @endif
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
