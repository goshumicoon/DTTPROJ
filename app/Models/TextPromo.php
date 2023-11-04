<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextPromo extends Model
{
    use HasFactory;
    protected $table = 'text_promo'; // Nama tabel sesuai dengan yang Anda buat

    protected $fillable = [
        'text_prom', // Kolom teks promosi
    ];
}
