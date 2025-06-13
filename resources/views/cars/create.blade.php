@extends('layouts.app')

@section('title', 'Tambah Mobil')

@section('content')
    <h1>Tambah Mobil Baru</h1>
    <form action="{{ route('cars.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" class="form-control" name="merk" id="merk" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label">Tipe</label>
            <input type="text" class="form-control" name="tipe" id="tipe" required>
        </div>

        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" name="tahun" id="tahun" required>
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
