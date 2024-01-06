@extends('layouts.app')

@section('content')
    <h1>Adauga Bilet</h1>
    <form action="{{ route('bilete.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tip">Tip:</label>
            <input type="text" name="tip" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pret">Pret:</label>
            <input type="number" name="pret" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="disponibilitate">Disponibilitate:</label>
            <input type="number" name="disponibilitate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_eveniment">ID Eveniment:</label>
            <input type="number" name="id_eveniment" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="id_user">ID User:</label>
            <input type="number" name="id_user" class="form-control">
        </div>
        <!-- You can add more fields as needed -->

        <button type="submit" class="btn btn-success">Adauga Bilet</button>
    </form>
@endsection
