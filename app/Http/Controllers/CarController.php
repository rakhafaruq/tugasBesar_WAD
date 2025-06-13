<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all(); 
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'merk' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        Car::create($validated);

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambahkan!');
    }

    public function edit($id)
    {

        $car = Car::findOrFail($id);
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'merk' => 'required|string|max:255',
            'tipe' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $car = Car::findOrFail($id);

        $car->update($validated);

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil dihapus!');
    }
}
