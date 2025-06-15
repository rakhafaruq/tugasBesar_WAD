@extends('layouts.app')

@section('title', 'Edit Mobil')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Mobil</h1>

        <!-- Form untuk Update Mobil -->
        <form action="{{ route('jual-mobil.update', $car->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Merk Mobil -->
            <div class="mb-3">
                <label for="merk" class="form-label">Merk Mobil</label>
                <input type="text" class="form-control" name="merk" id="merk" value="{{ old('merk', $car->merk) }}" required>
            </div>

            <!-- Tipe Mobil -->
            <div class="mb-3">
                <label for="tipe_id" class="form-label">Tipe Mobil</label>
                <select name="tipe_id" class="form-control" required>
                    <option value="">Pilih Tipe Mobil</option>
                    @foreach ($tipeMobil as $tipe)
                        <option value="{{ $tipe->id }}" {{ old('tipe_id', $car->tipe_id) == $tipe->id ? 'selected' : '' }}>
                            {{ $tipe->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tahun Mobil -->
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun Mobil</label>
                <input type="number" class="form-control" name="tahun" id="tahun" value="{{ old('tahun', $car->tahun) }}" required>
            </div>

            <!-- Harga Mobil -->
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Mobil</label>
                <input type="number" class="form-control" name="harga" id="harga" value="{{ old('harga', $car->harga) }}" required>
            </div>

            <!-- Gambar Mobil (Opsional) -->
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Mobil</label>
                <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-warning w-100">Update Mobil</button>
        </form>
    </div>
@endsection
