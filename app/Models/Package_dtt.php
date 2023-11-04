<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_dtt extends Model
{
    use HasFactory;
    protected $table = 'package_dtt';

    protected $fillable = [
        'nama_package',
        'program_hari',
        'tanggal_mulai',
        'list_hotel',
        'maskapai',
        'harga',
        'path_gambar_pamflet'
        // Atribut lainnya yang perlu diisi secara masal
    ];
}
