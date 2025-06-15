<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute; 

class Car extends Model
{
    use HasFactory;
    
    protected $table = 'cars';

    protected $fillable = [
        'merk', 
        'tipe_id', 
        'tahun', 
        'harga',
        'gambar'
    ];

    public function tipe()
    {
        return $this->belongsTo(tipe::class, 'tipe_id');
    }

    protected function gambar(): Attribute
    {
        return Attribute::make(
            // Method untuk mendapatkan URL gambar
            get: fn ($value) => $value ? asset('storage/' . $value) : null, // Menghasilkan URL gambar atau null jika tidak ada
        );
    }
}
