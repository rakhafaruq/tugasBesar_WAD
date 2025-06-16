@extends('layouts.app')

@section('title', 'Jual Mobil')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h4>Tambah Mobil untuk Dijual</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('jual-mobil.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <div class="mb-3">
                                <label for="merk" class="form-label">Merk Mobil</label>
                                <input type="text" class="form-control" name="merk" id="merk" required>
                            </div>

                            <div class="mb-3">
                                <label for="tipe_id" class="form-label">Tipe Mobil</label>
                                <select name="tipe_id" id="tipe_id" class="form-control" required>
                                    <option value="">Pilih Tipe Mobil</option>
                                    @foreach ($tipeMobil as $tipe)
                                        <option value="{{ $tipe->id }}">{{ $tipe->name }}</option> <!-- Menampilkan nama tipe mobil -->
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tahun" class="form-label">Tahun Mobil</label>
                                <input type="number" class="form-control" name="tahun" id="tahun" required>
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga Mobil</label>
                                <input type="number" class="form-control" name="harga" id="harga" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Foto Mobil</label>
                                <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*">
                                <small class="form-text text-muted">Pilih foto PNG atau JPG dengan ukuran maksimal 2MB.</small>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-plus-circle"></i> Tambah Mobil
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
