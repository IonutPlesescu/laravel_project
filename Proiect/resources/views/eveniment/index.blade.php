<!-- resources/views/eveniment/index.blade.php -->
@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="../../css/custom.css">
@endpush

@section('content')
    <div>
        <h1>Evenimente</h1>

        @if(Cookie::get('logged_user'))
            <a href="{{ route('eveniment.create') }}" class="btn btn-primary">Adaugă Eveniment</a>
        @endif
        <div class="container">
            <div class="row" style="display: flex; flex-wrap:wrap; flex-direction:row; align-items:center; margin-left:20px;">
                <div class="col-md-4 mb-4">
                    <!-- Adaugă imaginea în stânga -->
                    <div class="text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/ro/7/72/Concertul_afis.jpg" alt="Concertul Afis" class="img-fluid mb-3" style="max-width: 100%;">
                    </div>
                </div>

                @foreach($events as $event)
                    <div class="col-md-4 mb-4">
                        
                        <div class="card">
                            <div style="margin: auto !important; text-align:center;" class="card-body">
                                <h5 class="card-title">{{ $event->nume }}</h5>
                                <p class="card-text">
                                    <strong>Data:</strong> {{ \Carbon\Carbon::parse($event->data)->format('Y-m-d') }}<br>
                                    <strong>Locație:</strong> {{ $event->adresa }}<br>
                                    <strong>Parteneri:</strong> {{ $event->parteneri }}<br>
                                    <strong>Sponsori:</strong> {{ $event->sponsori }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('eveniment.show', $event->id) }}" style="margin:5px;" class="btn btn-sm btn-info">Detalii</a>
                                        <a href="{{ route('eveniment.edit', $event->id) }}" class="btn btn-sm btn-warning">Editează</a>
                                        @if(Cookie::has('logged_user'))
                                            <form action="{{ route('eveniment.destroy', $event->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Sigur vrei să ștergi acest eveniment?')">Șterge</button>
                                            </form>
                                        @endif
                                    </div>
                                    <form action="{{ route('cos.adauga', $event->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary">Cumpără acum</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr> <!-- Adaugă o linie între evenimente -->
        </div>
    </div>
@endsection
