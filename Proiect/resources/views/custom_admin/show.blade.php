@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">CustomAdmin Details</h1>

        <div>
            <h2>ID: {{ $customAdmin->id }}</h2>
            <p>Username: {{ $customAdmin->username }}</p>
            <p>Email: {{ $customAdmin->email }}</p>
            <p>Phone Number: {{ $customAdmin->numar_de_telefon }}</p>

            <!-- Add other details as needed -->

            <div class="mt-3">
                <a href="{{ route('custom_admins.index') }}" class="btn btn-primary">Back to List</a>
            </div>
        </div>
    </div>
@endsection
