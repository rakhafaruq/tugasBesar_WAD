@extends('layouts.app')

@section('title', 'Daftar Mobil untuk Dibeli')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center mb-4">Daftar Mobil untuk Dibeli</h3>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($cars as $car)
                <div class="col">
                    <div class="card shadow-sm border-0 rounded">
                        <!-- Gambar Mobil -->
                        <img src="{{ $car->gambar }}" class="card-img-top" alt="Gambar {{ $car->merk }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $car->merk }}</h5>
                            <p class="card-text">
                                <strong>Tipe:</strong> {{ $car->tipe->name }} <br>
                                <strong>Tahun:</strong> {{ $car->tahun }} <br>
                                <strong>Harga:</strong> Rp {{ number_format($car->harga, 2) }}
                            </p>
                            <a href="{{ route('beli-mobil.show', $car->id) }}" class="btn btn-info w-100">
                                <i class="bi bi-eye"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
