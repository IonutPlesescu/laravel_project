<!-- resources/views/eveniment/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4 text-white">Detalii Eveniment</h1>
        <div class="card text-center">
            <div class="card-body">
            <div class="text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/ro/7/72/Concertul_afis.jpg" alt="Concertul Afis" class="img-fluid mb-3" style="max-width: 100%; text-align:center; margin:auto;">
                    </div>
                <h3 class="card-title text-white">{{ $event->nume }}</h3>
                <div class="details">
                    <div class="detail-item">
                        <h5 style="color: white;"><strong>Descriere:</strong></h5>
                        <p>{{ $event->descriere }}</p>
                    </div>
                    <div class="detail-item">
                        <h5 style="color: white;"><strong>Adresa:</strong></h5>
                        <p>{{ $event->adresa }}</p>
                    </div>
                    <div class="detail-item">
                        <h5 style="color: white;"><strong>Data:</strong></h5>
                        <p>{{ $event->data }}</p>
                    </div>
                    <div class="detail-item">
                        <h5 style="color: white;"><strong>Telefon:</strong></h5>
                        <p>{{ $event->telefon }}</p>
                    </div>
                    <div class="detail-item">
                        <h5 style="color: white;"><strong>Email:</strong></h5>
                        <p>{{ $event->email }}</p>
                    </div>
                    <div class="detail-item">
                        <h5 style="color: white;"><strong>Parteneri:</strong></h5>
                        <p>{{ $event->parteneri }}</p>
                    </div>
                    <div class="detail-item">
                        <h5 style="color: white;"><strong>Sponsori:</strong></h5>
                        <p>{{ $event->sponsori }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin:auto;">
        <a href="{{ route('eveniment.index') }}" class="btn btn-primary mt-3 d-flex justify-content-center">Înapoi la Evenimente</a>
        </div>
</div>
@endsection
