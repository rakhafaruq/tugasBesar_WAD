@extends('layouts.app')

@section('title', 'Daftar Mobil')

@section('content')
    <h1>Daftar Mobil</h1>
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Tambah Mobil Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Tahun</th>
                <th>Harga</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
            <tr>
                <td>{{ $car->merk }}</td>
                <td>{{ $car->tipe }}</td>
                <td>{{ $car->tahun }}</td>
                <td>{{ $car->harga }}</td>
                <td>
                    <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
