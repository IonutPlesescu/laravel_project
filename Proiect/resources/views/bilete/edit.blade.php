@extends('layouts.app')

@section('content')
    <h1>Editare Bilet</h1>

    <form action="{{ route('bilete.update', $bilet->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tip">Tip:</label>
            <input type="text" name="tip" class="form-control" value="{{ $bilet->tip }}" required>
        </div>

        <div class="form-group">
            <label for="pret">Pret:</label>
            <input type="number" name="pret" class="form-control" value="{{ $bilet->pret }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="disponibilitate">Disponibilitate:</label>
            <input type="number" name="disponibilitate" class="form-control" value="{{ $bilet->disponibilitate }}" required>
        </div>

        <div class="form-group">
            <label for="id_eveniment">ID Eveniment:</label>
            <input type="number" name="id_eveniment" class="form-control" value="{{ $bilet->id_eveniment }}" required>
        </div>

        <div class="form-group">
            <label for="id_user">ID User:</label>
            <input type="number" name="id_user" class="form-control" value="{{ $bilet->id_user }}">
        </div>

        <!-- You can add more input fields as needed -->

        <button type="submit" class="btn btn-warning">Actualizeaza Bilet</button>
    </form>
@endsection
