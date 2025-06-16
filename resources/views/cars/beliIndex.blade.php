@extends('layouts.app')

@section('title', 'Daftar Mobil untuk Dibeli')

@section('content')
<style>
    #tipe_id, input[name="search"] {
    width: 220px;
    font-size: 0.9rem;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Agar tampilan lebih rapi dan menarik */
.form-group {
    margin-top: 20px;
}

/* Styling untuk card */
.card {
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

/* Animasi hover untuk card */
.card:hover {
    transform: translateY(-5px);
}

/* Menambahkan space dan properti agar lebih rapi */
.card-body {
    padding: 15px;
}

/* Styling untuk label */
.form-group label {
    font-size: 0.9rem;
}

/* Warna tombol */
.btn-info {
    background-color: #17a2b8;
    border: none;
}

/* Penyesuaian untuk responsivitas */
@media (max-width: 768px) {
    .d-flex {
        flex-direction: column;
    }

    .form-group {
        margin-bottom: 15px;
    }
}
</style>


    <div class="container mt-5">
        <h3 class="text-center mb-4">Daftar Mobil untuk Dibeli</h3>
        <!-- Form Filter Tipe Mobil -->
        <div class="d-flex justify-content-between mb-4">
            <div class="form-group">
                <select name="tipe_id" id="tipe_id" class="form-control" onchange="window.location.href=this.value">
                    <option value="">Semua Tipe</option>
                    @foreach ($tipeMobil as $tipe)
                        <option value="{{ route('beli-mobil.index', ['tipe_id' => $tipe->id]) }}" {{ request('tipe_id') == $tipe->id ? 'selected' : '' }}>
                            {{ $tipe->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <form action="{{ route('beli-mobil.index') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control" placeholder="Cari mobil..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary ms-2">Cari</button>
                </form>
            </div>

        </div>

        <div class="row">
            @foreach ($cars as $car)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 rounded" style="background-image: url('{{ $car->gambar }}'); background-size: cover; background-position: center; height: 300px;">
                        <div class="card-body d-flex flex-column justify-content-end" style="background-color: rgba(0, 0, 0, 0.5);">
                            <h5 class="card-title text-white">{{ $car->merk }}</h5>
                            <a href="{{ route('beli-mobil.show', $car->id) }}" class="btn btn-dark">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
