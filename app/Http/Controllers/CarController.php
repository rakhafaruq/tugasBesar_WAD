<?php

namespace App\Http\Controllers;

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

        return view('cars.index', compact('cars'));
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
    ]);

        Car::create([
        'merk' => $validated['merk'],
        'tipe_id' => $validated['tipe_id'],
        'tahun' => $validated['tahun'],
        'harga' => $validated['harga'],
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
        ]);

        $car = Car::findOrFail($id);

        $car->update($validated);

        return redirect()->route('jual-mobil.index')->with('success', 'Mobil berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);

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
