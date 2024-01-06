@extends('layouts.app')

@section('content')
    <h1>Edit Sponsor</h1>

    <form action="{{ route('sponsors.update', $sponsor->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" class="form-control" value="{{ $sponsor->nume }}" required>
        </div>

        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" name="logo" class="form-control-file">
            @if($sponsor->logo)
                <img src="{{ asset('storage/' . $sponsor->logo) }}" alt="Current Logo" height="50">
            @else
                <p>No Current Logo</p>
            @endif
        </div>

        <div class="form-group">
            <label for="suma">Suma:</label>
            <input type="number" name="suma" class="form-control" value="{{ $sponsor->suma }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $sponsor->email }}">
        </div>

        <button type="submit" class="btn btn-warning">Update Sponsor</button>
    </form>
@endsection
