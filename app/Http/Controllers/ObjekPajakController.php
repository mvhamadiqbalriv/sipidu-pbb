<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
use App\Models\Fasilitas_bangunan;
use App\Models\Objek_pajak;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Jbp;

class ObjekPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(function($request,$next){
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }

    public function index()
    {
        $data['list'] = Objek_pajak::all();

        return view('objek_pajak.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kecamatan'] = District::where('regency_id', '=', 3211)->get();
        return view('objek_pajak.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nop' => 'required',
            'jenis_penggunaan' => 'required',
            'wajib_pajak' => 'required',
            'alamat_objek_pajak' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'luas_bangunan' => 'required',
            'jumlah_lantai_basemen' => 'required',
        ]);

        $total_luas_bangunan = ($request->post('luas_bangunan') + ($request->post('luas_basemen') ?? 0));

        $new = Objek_pajak::create([
            'nop' => $request->post('nop'),
            'jenis_penggunaan' => $request->post('jenis_penggunaan'),
            'wajib_pajak' => $request->post('wajib_pajak'),
            'alamat_objek_pajak' => $request->post('alamat_objek_pajak'),
            'district_id' => $request->post('district_id'),
            'village_id' => $request->post('village_id'),
            'nomor_bangunan' => $request->post('nomor_bangunan'),
            'tahun_dibangun' => $request->post('tahun_dibangun'),
            'luas_bangunan' => $request->post('luas_bangunan'),
            'luas_basemen' => $request->post('luas_basemen'),
            'total_luas_bangunan' => $total_luas_bangunan,
            'jumlah_lantai_bangunan' => $request->post('jumlah_lantai_bangunan'),
            'jumlah_lantai_basemen' => $request->post('jumlah_lantai_basemen'),
            'creator_id' => Auth::user()->id
        ]);

        if ($new->save()) {
            return redirect('/objek-pajak')->with('success', 'Objek pajak berhasil ditambahkan!');
        }else{
            return redirect('/objek-pajak')->with('error', 'Objek pajak gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['detail'] = Objek_pajak::findOrFail($id);
        $data['fasilitas_bangunan'] = Fasilitas_bangunan::where('objek_pajak_id', $id)->get();
        $data['jbp'] = Jbp::where('objek_pajak_id', $id)->get();

        return view('objek_pajak.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['kecamatan'] = District::where('regency_id', '=', 3211)->get();
        $data['detail'] = Objek_pajak::findOrFail($id);
        $data['desa'] = Village::where('district_id', '=', $data['detail']->district_id)->get();

        return view('objek_pajak.ubah', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nop' => 'required',
            'jenis_penggunaan' => 'required',
            'wajib_pajak' => 'required',
            'alamat_objek_pajak' => 'required',
            'district_id' => 'required',
            'village_id' => 'required',
            'luas_bangunan' => 'required',
            'jumlah_lantai_basemen' => 'required',
        ]);

        $total_luas_bangunan = ($request->post('luas_bangunan') + ($request->post('luas_basemen') ?? 0));

        $update = Objek_pajak::findOrFail($id);

        $update->nop = $request->post('nop');
        $update->jenis_penggunaan = $request->post('jenis_penggunaan');
        $update->wajib_pajak = $request->post('wajib_pajak');
        $update->alamat_objek_pajak = $request->post('alamat_objek_pajak');
        $update->district_id = $request->post('district_id');
        $update->village_id = $request->post('village_id');
        $update->nomor_bangunan = $request->post('nomor_bangunan');
        $update->tahun_dibangun = $request->post('tahun_dibangun');
        $update->luas_bangunan = $request->post('luas_bangunan');
        $update->luas_basemen = $request->post('luas_basemen');
        $update->total_luas_bangunan = $total_luas_bangunan;
        $update->jumlah_lantai_bangunan = $request->post('jumlah_lantai_bangunan');
        $update->jumlah_lantai_basemen = $request->post('jumlah_lantai_basemen');
        $update->updator_id = Auth::user()->id;

        if ($update->save()) {
            return redirect('/objek-pajak')->with('success', 'Objek pajak berhasil diperbaharui!');
        }else{
            return redirect('/objek-pajak')->with('error', 'Objek pajak gagal diperbaharui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function objekPajakDelete(Request $request)
    {
        $delete = Objek_pajak::findOrFail($request->id);
        if ($delete->delete()) {
            return response()->json([
                'status' => 'Success',
                'data' => $delete,
            ], 200);
        }else{
            return response()->json([
                'status' => 'Error'
            ], 404);
        }
    }
}
