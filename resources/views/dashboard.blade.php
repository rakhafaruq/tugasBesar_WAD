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

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        #mobilChart {
            width: 50%;
            height: 300px;
        }

        .card-body {
            padding: 20px;
        }

    </style>
<div class="container-fluid" >
    <h2 class="text-center text-white mb-5">Selamat Datang di Dashboard Jual Beli Mobil</h2>

    <div class="row d-flex">
        <!-- Card untuk Jual Mobil -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg border-0 rounded" style="background-color: rgba(255, 255, 255, 0.14);">
                <!-- Gambar Mobil (Background) -->
                <!-- <div class="card-img-top" style="background-image: url('{{ asset('storage/images/dashboard1.jpeg') }}'); height: 200px; background-size: cover; background-position: center; border-radius: 10px;"></div> -->
                <div class="card-body text-white text-center">
                    <h5 class="card-title">Jual Mobil Anda</h5>
                    <p class="card-text">Ingin menjual mobil Anda? Klik tombol di bawah ini untuk memulai dan daftarkan mobil Anda dengan mudah!</p>
                    <a href="{{ route('jual-mobil.create') }}" class="btn btn-primary w-100">Mulai Menjual Mobil</a>
                </div>
            </div>
        </div>

        <!-- Card untuk Beli Mobil -->
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg border-0 rounded" style="background-color: rgba(255, 255, 255, 0.14);">
                <!-- Gambar Mobil (Background) -->
                <!-- <div class="card-img-top" style="background-image: url('storage/images/dashboard2.jpeg'); height: 200px; background-size: cover; background-position: center; border-radius: 10px;"></div> -->
                <div class="card-body text-white text-center">
                    <h5 class="card-title ">Beli Mobil Impian Anda</h5>
                    <p class="card-text">Temukan mobil yang sesuai dengan kebutuhan Anda di sini. Klik tombol di bawah ini untuk melihat daftar mobil yang dijual.</p>
                    <a href="{{ route('beli-mobil.index') }}" class="btn btn-primary w-100">Lihat Mobil Dijual</a>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="card shadow-lg border-0 rounded" style="background-color: rgba(255, 255, 255, 0.66);">
            <div class="card-body text-center">
                <!-- Canvas untuk grafik -->
                <canvas id="mobilChart"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    console.log(mobilData);  // Cek struktur data mobilByTipe
    console.log(tipeMobil);  // Cek struktur data tipeMobil


    var ctx = document.getElementById('mobilChart').getContext('2d');
    var mobilChart = new Chart(ctx, {
        type: 'bar', // Menggunakan Bar Chart
        data: {
            labels: labels,  // Label tipe mobil
            datasets: [{
                label: 'Jumlah Mobil',
                data: data,  // Data jumlah mobil per tipe
                backgroundColor: 'rgba(54, 163, 235, 0.61)', // Warna grafik
                borderColor: 'rgba(54, 162, 235, 1)',  // Warna border
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,  // Membuat grafik responsif
            maintainAspectRatio: false,  // Membuat grafik sesuai ukuran container
            scales: {
                y: {
                    beginAtZero: true  // Memulai sumbu Y dari nol
                }
            }
        }
    });
</script>
@endpush