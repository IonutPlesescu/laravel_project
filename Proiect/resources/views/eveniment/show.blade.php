<!-- resources/views/eveniment/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div>
        <h1 class="mb-4">Detalii Eveniment</h1>
        <div>
            
            <p><strong>Nume:</strong> {{ $event->nume }}</p>
            <p><strong>Descriere:</strong> {{ $event->descriere }}</p>
            <p><strong>Adresa:</strong> {{ $event->adresa }}</p>
            <p><strong>Data:</strong> {{ $event->data }}</p>
            <p><strong>Telefon:</strong> {{ $event->telefon }}</p>
            <p><strong>Email:</strong> {{ $event->email }}</p>
        </div>

        <a href="{{ route('eveniment.index') }}" class="btn btn-primary mt-3">Înapoi la Evenimente</a>
    </div>
@endsection
