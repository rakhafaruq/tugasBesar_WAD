<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\tipe;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $cars = Car::where('merk', 'like', "%{$search}%")->get();
        } else {
            $cars = Car::all();
        }
        $tipeMobil = Tipe::all();
        return view('cars.index', compact('cars', 'tipeMobil'));
    }

    public function dashboardData()
    {
        // Mengambil data jumlah mobil per tipe untuk grafik
        $mobilByTipe = Car::select('tipe_id', \DB::raw('count(*) as total'))->groupBy('tipe_id')->get();

        // Mengambil semua tipe mobil untuk grafik
        $tipeMobil = Tipe::all();

        // Mengirim data ke view dashboard
        return view('dashboard', compact('mobilByTipe', 'tipeMobil'));
    }

    public function create()
    {
        $tipeMobil = tipe::all(); // Ambil semua tipe mobil dari tabel tipe
        return view('cars.create', compact('tipeMobil')); // Kirim data tipe mobil ke view
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
        'merk' => 'required|string|max:255',
        'tipe_id' => 'required|exists:tipes,id', // Pastikan tipe mobil valid
        'tahun' => 'required|integer',
        'harga' => 'required|numeric',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
        // Menyimpan gambar di folder public/images dan mendapatkan pathnya
            $gambarPath = $request->file('gambar')->store('images', 'public');
        } else {
            $gambarPath = null; // Tidak ada gambar yang diupload
        }
        
        Car::create([
        'merk' => $validated['merk'],
        'tipe_id' => $validated['tipe_id'],
        'tahun' => $validated['tahun'],
        'harga' => $validated['harga'],
        'gambar' => $gambarPath,
    ]);
        
        return redirect()->route('jual-mobil.index')->with('success', 'Mobil berhasil ditambahkan!');
    }

    public function edit($id)
    {

        $car = Car::findOrFail($id);
        $tipeMobil = Tipe::all();
        return view('cars.edit', compact('car', 'tipeMobil'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'merk' => 'required|string|max:255',
            'tipe_id' => 'required|exists:tipes,id', // Validasi tipe mobil yang dipilih
            'tahun' => 'required|integer',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $car = Car::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Jika ada gambar baru, hapus gambar lama dari storage
            if ($car->gambar) {
                Storage::delete('public/' . $car->gambar);
            }
            // Simpan gambar baru
            $gambarPath = $request->file('gambar')->store('images', 'public');
            $car->gambar = $gambarPath; // Update gambar jika ada gambar baru
        }

        $car->update([
            'merk' => $validated['merk'],
            'tipe_id' => $validated['tipe_id'],
            'tahun' => $validated['tahun'],
            'harga' => $validated['harga'],
        ]);

        return redirect()->route('jual-mobil.index')->with('success', 'Mobil berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        if ($car->gambar) {
            Storage::delete('public/' . $car->gambar);
        }

        $car->delete();

        return redirect()->route('jual-mobil.index')->with('success', 'Mobil berhasil dihapus!');
    }

    public function beliIndex()
    {
        $cars = Car::all();
        return view('cars.beliIndex', compact('cars'));
    }

    public function beliShow($id)
    {
        $car = Car::findOrFail($id);
        return view('cars.beliShow', compact('car'));
    }
}
