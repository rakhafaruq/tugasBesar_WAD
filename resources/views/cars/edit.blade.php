@extends('layouts.app')

@section('title', 'Edit Mobil')

@section('content')
   <div class="container mt-5">
        <!-- Card untuk form Edit Mobil -->
        <div class="card shadow-lg rounded">
            <div class="card-header text-center">
                <h3>Edit Mobil</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('jual-mobil.update', $car->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Input Merk Mobil -->
                    <div class="mb-3">
                        <label for="merk" class="form-label">Merk Mobil</label>
                        <input type="text" class="form-control" name="merk" id="merk" value="{{ $car->merk }}" required>
                    </div>

                    <!-- Input Tipe Mobil -->
                    <div class="mb-3">
                        <label for="tipe_id" class="form-label">Tipe Mobil</label>
                        <select name="tipe_id" class="form-select" id="tipe_id" required>
                            <option value="">Pilih Tipe Mobil</option>
                            @foreach ($tipeMobil as $tipe)
                                <option value="{{ $tipe->id }}" {{ $car->tipe_id == $tipe->id ? 'selected' : '' }}>
                                    {{ $tipe->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Input Tahun Mobil -->
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun Mobil</label>
                        <input type="number" class="form-control" name="tahun" id="tahun" value="{{ $car->tahun }}" required>
                    </div>

                    <!-- Input Harga Mobil -->
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Mobil</label>
                        <input type="text" class="form-control" name="harga" id="harga" value="{{ number_format($car->harga, 2) }}" required>
                    </div>

                    <!-- Input Gambar Mobil -->
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Mobil</label>
                        <input type="file" class="form-control" name="gambar" id="gambar">
                        <small class="form-text text-muted">Pilih gambar baru jika Anda ingin mengganti gambar mobil.</small>
                    </div>

                    <!-- Tombol Update Mobil -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-warning w-100">Update Mobil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
