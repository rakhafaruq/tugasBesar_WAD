@extends('layouts.app')

@section('title', 'Detail Mobil untuk Dibeli')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center mb-4">Detail Mobil untuk Dibeli</h3>

        <div class="row">
            <div class="col-md-4">
                <!-- Gambar Mobil -->
                <div class="card mb-4">
                    <img src="{{ $car->gambar }}" class="card-img-top" alt="Gambar Mobil" style="height: 300px; object-fit: cover;">
                </div>
            </div>

            <div class="col-md-8">
                <!-- Card untuk Detail Mobil -->
                <div class="card shadow-lg rounded">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->merk }} - {{ $car->tipe->name }}</h5>
                        <p class="card-text">
                            <strong>Tahun:</strong> {{ $car->tahun }} <br>
                            <strong>Harga:</strong> Rp {{ number_format($car->harga, 2) }} <br>
                        </p>

                        <!-- List Detail Mobil -->
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item"><strong>Merk:</strong> {{ $car->merk }}</li>
                            <li class="list-group-item"><strong>Tipe:</strong> {{ $car->tipe->name }}</li>
                            <li class="list-group-item"><strong>Tahun:</strong> {{ $car->tahun }}</li>
                            <li class="list-group-item"><strong>Harga:</strong> Rp {{ number_format($car->harga, 2) }}</li>
                        </ul>

                        <!-- Tombol Kembali -->
                        <a href="{{ route('beli-mobil.index') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
