@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Selamat Datang di Dashboard Jual Beli Mobil</h2>

    <div class="row">
        <!-- Card untuk Jual Mobil -->
        <div class="col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Jual Mobil">
                <div class="card-body">
                    <h5 class="card-title">Jual Mobil Anda</h5>
                    <p class="card-text">Ingin menjual mobil Anda? Klik tombol di bawah ini untuk memulai dan daftarkan mobil Anda dengan mudah!</p>
                    <a href="{{ route('jual-mobil.create') }}" class="btn btn-success w-100">Mulai Menjual Mobil</a>
                </div>
            </div>
        </div>

        <!-- Card untuk Beli Mobil -->
        <div class="col-md-6 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="https://via.placeholder.com/300" class="card-img-top" alt="Beli Mobil">
                <div class="card-body">
                    <h5 class="card-title">Beli Mobil Impian Anda</h5>
                    <p class="card-text">Temukan mobil yang sesuai dengan kebutuhan Anda di sini. Klik tombol di bawah ini untuk melihat daftar mobil yang dijual.</p>
                    <a href="{{ route('beli-mobil.index') }}" class="btn btn-primary w-100">Lihat Mobil Dijual</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
