<!-- resources/views/parteneri/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Editare Partener</h1>
    <form action="{{ route('parteneri.update', $parteneri->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" class="form-control" value="{{ $parteneri->nume }}" required>
        </div>
        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="text" name="logo" class="form-control" value="{{ $parteneri->logo }}">
        </div>
        <div class="form-group">
            <label for="tip_partener">Tip Partener:</label>
            <input type="text" name="tip_partener" class="form-control" value="{{ $parteneri->tip_partener }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" value="{{ $parteneri->email }}">
        </div>
        <button type="submit" class="btn btn-warning">Actualizeaza Partener</button>
    </form>
@endsection
