<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LokAgen;

class LokAgenController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $result = LokAgen::where('nama_agen', 'like', '%' . $keyword . '%')
            ->orWhere('kabupaten', 'like', '%' . $keyword . '%')
            ->orWhere('alamat', 'like', '%' . $keyword . '%')
            ->orWhere('no_whatsapp', 'like', '%' . $keyword . '%')
            ->get();

        $data = $result->map(function ($agen) {
            return [
                'value' => $agen->nama_agen,
                'nama_agen' => $agen->nama_agen,
                'provinsi' => $agen->provinsi,
                'kabupaten' => $agen->kabupaten,
                'kecamatan' => $agen->kecamatan,
                'kelurahan' => $agen->kelurahan,
                'alamat' => $agen->alamat,
                'no_whatsapp' => $agen->no_whatsapp
            ];
        });

        return response()->json($data);
    }
}

