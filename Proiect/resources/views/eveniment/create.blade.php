@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Adaugă Eveniment Nou</h1>
        
        <form action="{{ route('eveniment.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="nume" class="form-label">Nume:</label>
                <input type="text" name="nume" id="nume" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="descriere" class="form-label">Descriere:</label>
                <textarea name="descriere" id="descriere" class="form-control" required></textarea>
            </div>
            
            <div class="mb-3">
                <label for="adresa" class="form-label">Adresă:</label>
                <input type="text" name="adresa" id="adresa" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="data" class="form-label">Data:</label>
                <input type="date" name="data" id="data" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telefon" class="form-label">Telefon:</label>
                <input type="text" name="telefon" id="telefon" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="parteneri" class="form-label">Parteneri:</label>
                <select name="parteneri" id="parteneri" class="form-control" >
                    @foreach($parteneri as $partener)
                        <option value="{{ $partener->nume }}">{{ $partener->nume }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="sponsori" class="form-label">Sponsori:</label>
                <select name="sponsori" id="sponsori" class="form-control" >
                    @foreach($sponsori as $sponsor)
                        <option value="{{ $sponsor->nume }}">{{ $sponsor->nume }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Other fields and options can be added as needed -->

            <button type="submit" class="btn btn-primary">Adaugă Eveniment</button>
        </form>
    </div>
@endsection
