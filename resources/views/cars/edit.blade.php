@extends('layouts.app')

@section('title', 'Edit Mobil')

@section('content')
    <h1>Edit Mobil</h1>
    <form action="{{ route('cars.update', $car->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" class="form-control" name="merk" id="merk" value="{{ $car->merk }}" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <input type="text" class="form-control" name="tipe" id="tipe" value="{{ $car->tipe }}" required>
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" name="tahun" id="tahun" value="{{ $car->tahun }}" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" value="{{ $car->harga }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
@endsection
