<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;
    protected $table = 'kamar';
    protected $fillable = [
        'nomor_kamar',
        'tipe_kamar',
        'harga',
        'ketersediaan'
    ];

    public function getKamar()
    {
        $kamar = Kamar::all();
        return $kamar;
    }
}
