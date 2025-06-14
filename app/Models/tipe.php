<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipe extends Model
{
    use HasFactory;

    protected $table = 'tipes';
    protected $fillable = ['name'];

    public function cars()
    {
        return $this->hasMany(Car::class, 'tipe_id');
    }
}
