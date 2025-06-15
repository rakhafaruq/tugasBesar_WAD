@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
        /* Full screen background */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            background-image: url('{{ asset('storage/images/background.jpg') }}'); /* Replace with your own background image */
            background-size: cover;
            background-position: center;
        }

        /* Sidebar style */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            height: 100vh;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
<div class="container-fluid" >
    <h2 class="text-center text-white mb-5">Selamat Datang di Dashboard Jual Beli Mobil</h2>

    <div class="row">
        <!-- Card untuk Jual Mobil -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg border-0 rounded" style="background-color: rgba(255, 255, 255, 0.8);">
                <!-- Gambar Mobil (Background) -->
                <div class="card-img-top" style="background-image: url('{{ asset('storage/images/dashboard1.jpeg') }}'); height: 200px; background-size: cover; background-position: center; border-radius: 10px;"></div>
                <div class="card-body text-center">
                    <h5 class="card-title">Jual Mobil Anda</h5>
                    <p class="card-text">Ingin menjual mobil Anda? Klik tombol di bawah ini untuk memulai dan daftarkan mobil Anda dengan mudah!</p>
                    <a href="{{ route('jual-mobil.create') }}" class="btn btn-success w-100">Mulai Menjual Mobil</a>
                </div>
            </div>
        </div>

        <!-- Card untuk Beli Mobil -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg border-0 rounded" style="background-color: rgba(255, 255, 255, 0.8);">
                <!-- Gambar Mobil (Background) -->
                <div class="card-img-top" style="background-image: url('storage/images/dashboard2.jpeg'); height: 200px; background-size: cover; background-position: center; border-radius: 10px;"></div>
                <div class="card-body text-center">
                    <h5 class="card-title">Beli Mobil Impian Anda</h5>
                    <p class="card-text">Temukan mobil yang sesuai dengan kebutuhan Anda di sini. Klik tombol di bawah ini untuk melihat daftar mobil yang dijual.</p>
                    <a href="{{ route('beli-mobil.index') }}" class="btn btn-primary w-100">Lihat Mobil Dijual</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    // Menyiapkan data untuk grafik
    var mobilData = @json($mobilByTipe);
    var tipeMobil = @json($tipeMobil);

    var labels = tipeMobil.map(function(tipe) {
        return tipe.name; // Mengambil nama tipe mobil
    });

    var data = mobilData.map(function(mobil) {
        return mobil.total; // Mengambil jumlah mobil berdasarkan tipe
    });

    var ctx = document.getElementById('mobilChart').getContext('2d');
    var mobilChart = new Chart(ctx, {
        type: 'bar', // Jenis grafik bar
        data: {
            labels: labels, // Nama tipe mobil
            datasets: [{
                label: 'Jumlah Mobil',
                data: data, // Data jumlah mobil per tipe
                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna grafik
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endpush
