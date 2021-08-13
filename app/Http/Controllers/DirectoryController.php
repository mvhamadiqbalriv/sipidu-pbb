<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\Fasilitas_bangunan;
use App\Models\Jbp;

class DirectoryController extends Controller
{
    public function village(Request $request)
    {
        $desa = Village::where('district_id', $request->get('id'))
            ->pluck('name', 'id');
    
        return response()->json($desa);
    }

    public function fasilitasBangunan(Request $request)
    {
        $fasilitasBangunan = Fasilitas_bangunan::where('objek_pajak_id', $request->get('id'))
            ->pluck('jumlah_fasilitas', 'id');
    
        return response()->json($fasilitasBangunan);
    }

    public function fasilitasBangunanById(Request $request)
    {
        $fasilitasBangunan = Fasilitas_bangunan::findOrFail($request->post('id'));
    
        return response()->json($fasilitasBangunan);
    }

    public function jbpById(Request $request)
    {
        $jbp = Jbp::findOrFail($request->post('id'));
    
        return response()->json($jbp);
    }
}
