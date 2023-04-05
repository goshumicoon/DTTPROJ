<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quality_control extends Model
{
    use HasFactory;
    protected $fillable = ['id','unit_qc','witel','nik_naker','wo_project','jenis_temuan','segmentasi_temuan','segmentasi_alpro','observasi_temuan','cerita_temuan','rekomendasi_perbaikan','tanggal_input','eviden_temuan_negative'];
}
