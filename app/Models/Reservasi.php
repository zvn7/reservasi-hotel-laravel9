<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $fillable = [
        'id',
        'id_karyawan',
        'id_pengunjung',
        'id_kamar',
        'tanggal_checkin',
        'tanggal_checkout',
        'lama_hari',
        'harga_kamar',
        'total_harga',
        'status_pembayaran',
    ];


}
