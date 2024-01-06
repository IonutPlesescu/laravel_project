<!-- resources/views/eveniment/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div>
        <h1>Editare Eveniment</h1>
       
        <form action="{{ route('eveniment.update', ['id' => $eveniment->id]) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Adaugă câmpul ascuns pentru ID --}}
            <input type="hidden" name="id" value="{{ $eveniment->id }}">

            {{-- Adaugă câmpurile pentru editare aici --}}
            <div class="form-group">
                <label for="nume">Nume:</label>
                <input type="text" name="nume" value="{{ $eveniment->nume }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="descriere">Descriere:</label>
                <textarea name="descriere" class="form-control">{{ $eveniment->descriere }}</textarea>
            </div>

            <div class="form-group">
                <label for="adresa">Adresa:</label>
                <input type="text" name="adresa" value="{{ $eveniment->adresa }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="adresa">Pret:</label>
                <input type="text" name="pret" value="{{ $eveniment->pret }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" name="data" value="{{ $eveniment->data }}" class="form-control">
            </div>
            
           

            <button type="submit" class="btn btn-primary">Actualizează Eveniment</button>
        </form>
    </div>
@endsection
