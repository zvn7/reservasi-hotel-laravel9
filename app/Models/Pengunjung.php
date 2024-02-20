<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    protected $table = 'pengunjung';
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'alamat',
        'email',
        'telepon',
    ];

    public function getPengunjung()
    {
        $pengunjung = Pengunjung::all();
        return $pengunjung;
    }

}
