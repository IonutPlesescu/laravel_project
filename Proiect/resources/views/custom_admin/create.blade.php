@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Create CustomAdmin</h1>

        <form action="{{ route('custom_admins.store') }}" method="post">
            @csrf

            <!-- Add your form fields here -->
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="parola" class="form-label">Parola:</label>
                <input type="password" name="parola" id="parola" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="numar_de_telefon" class="form-label">Phone Number:</label>
                <input type="text" name="numar_de_telefon" id="numar_de_telefon" class="form-control" required>
            </div>

            <!-- Add other fields and options as needed -->

            <button type="submit" class="btn btn-primary">Create CustomAdmin</button>
        </form>
    </div>
@endsection
