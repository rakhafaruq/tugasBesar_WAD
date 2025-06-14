@extends('layouts.app')

@section('title', 'Daftar Mobil untuk Dibeli')

@section('content')
    <div class="container mt-4">
        <h3>Daftar Mobil untuk Dibeli</h3>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Tipe</th>
                    <th>Tahun</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->merk }}</td>
                        <td>{{ $car->tipe->name }}</td>
                        <td>{{ $car->tahun }}</td>
                        <td>{{ number_format($car->harga, 2) }}</td>
                        <td>
                            <a href="{{ route('beli-mobil.show', $car->id) }}" class="btn btn-info">Lihat Detail</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
