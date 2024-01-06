@extends('layouts.app')

@section('content')
    <h1>Add Sponsor</h1>

    <form action="{{ route('sponsors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" name="logo" class="form-control-file">
        </div>

        <div class="form-group">
            <label for="suma">Suma:</label>
            <input type="number" name="suma" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Add Sponsor</button>
    </form>
@endsection
