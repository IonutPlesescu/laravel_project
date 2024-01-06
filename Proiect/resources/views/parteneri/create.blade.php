<!-- resources/views/parteneri/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Adauga Partener</h1>
    <form action="{{ route('parteneri.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="text" name="logo" class="form-control">
        </div>
        <div class="form-group">
            <label for="tip_partener">Tip Partener:</label>
            <input type="text" name="tip_partener" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Adauga Partener</button>
    </form>
@endsection
