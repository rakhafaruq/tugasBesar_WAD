<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    protected $table = 'cars';

    protected $fillable = [
        'merk', 
        'tipe_id', 
        'tahun', 
        'harga',
    ];

    public function tipe()
    {
        return $this->belongsTo(tipe::class, 'tipe_id');
    }
}
