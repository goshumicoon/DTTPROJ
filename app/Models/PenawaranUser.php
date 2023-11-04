<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenawaranUser extends Model
{
    use HasFactory;
    protected $table = 'penawaran_user';

    protected $fillable = [
        'nama',
        'email',
        'nomor_hp',
        'pesan',
    ];
}
