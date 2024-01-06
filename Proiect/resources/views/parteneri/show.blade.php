<!-- resources/views/parteneri/show.blade.php -->

@extends('layouts.app')

@section('content')

    <h1>Detalii Partener</h1>

    <p><strong>ID:</strong> {{ $partener->id }}</p>
    <p><strong>Nume:</strong> {{ $partener->nume ?? 'N/A' }}</p>
    <p><strong>Logo:</strong> {{ $partener->logo ?? 'N/A' }}</p>
    <p><strong>Tip Partener:</strong> {{ $partener->tip_partener ?? 'N/A' }}</p>
    <p><strong>Email:</strong> {{ $partener->email ?? 'N/A' }}</p>

    <a href="{{ route('parteneri.index') }}" class="btn btn-primary">Inapoi la Lista Parteneri</a>

@endsection
