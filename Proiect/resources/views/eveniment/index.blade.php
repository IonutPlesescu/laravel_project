<!-- resources/views/eveniment/index.blade.php -->
@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="../../css/custom.css">
@endpush

@section('content')
    <div>
        <h1>Evenimente</h1>
        @auth
            @if(auth()->user()->getRole() === 'admin')
                <a href="{{ route('eveniment.create') }}" class="btn btn-primary">Adaugă Eveniment</a>
            @endif
        @endauth

        <table class="table">
            <thead>
                <tr>
                    <th>Nume</th>
                    <th>Data</th>
                    <th>Locație</th>
                    <th>Parteneri</th>
                    <th>Sponsori</th>
                    
                    @auth
                        @if(auth()->user()->getRole() === 'admin')
                            <th>Acțiuni</th>
                        @endif
                    @endauth
                    <!-- <th>Cumpără Bilete</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->nume }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->data)->format('Y-m-d') }}</td>

                        <td>{{ $event->adresa }}</td>
                        <td>{{ $event->parteneri }}</td>
                        <td>{{ $event->sponsori }}</td>
                       
                      
                        @auth
                            @if(auth()->user()->getRole() === 'admin')
                                <td>
                                    <a href="{{ route('eveniment.show', $event->id) }}" class="btn btn-info">Detalii</a>
                                    <a href="{{ route('eveniment.edit', $event->id) }}" class="btn btn-warning">Editează</a>
                                    <form action="{{ route('eveniment.destroy', $event->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sigur vrei să ștergi acest eveniment?')">Șterge</button>
                                    </form>
                                    <form action="{{ route('cos.adauga', $event->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Adaugă în Coș</button>
                                    </form>

                                </td>
                            @endif
                        @endauth
                       
                        <!-- <td>
                            <a href="{{ route('evenimente.cumpara-bilete', $event->id) }}" class="btn btn-success">Cumpără Bilete</a>
                        </td> -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
