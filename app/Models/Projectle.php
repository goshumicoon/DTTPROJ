<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projectle extends Model
{
    use HasFactory;
    protected $fillable = ['NAMA_PROJECT','DISTRIBUSI','ODP_LABEL','ODP_INDEX','KAP_ODP','STATUS_PROJECT','KETERANGAN'];
}
