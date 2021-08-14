<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas_bangunan;
use App\Models\Objek_pajak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Jbp;
use PDF;

class JbpController extends Controller
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

        return view('jbp.form-jbp', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!empty($request->get('id'))) {
            $data['objek_pajak'] = Objek_pajak::findOrFail($request->id);
            $data['fasilitas_bangunan'] = Fasilitas_bangunan::where('objek_pajak_id', $request->id)->get();
        }else{
            return abort(404);die;
        }

        return view('jbp.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = [
            'objek_pajak_id' => 'required',
            'fasilitas_bangunan_id' => 'required',
        ];

        $objek_pajak = Objek_pajak::findOrFail($request->objek_pajak_id);
        $fasilitas_bangunan = Fasilitas_bangunan::findOrFail($request->fasilitas_bangunan_id);

        $arr = [
            'i_struktur_utama',
            'i_basemen',
            'iia_struktur_utama',
            'iib_batu',
            'iic_dua_lantai',
            'iid_dua_lantai',
            'iie_dua_lantai',
            'iif_penutup_atap',
            'iig_dua_lantai',
            'iig_dua_lantai',
            'iih_super_struktur',
            'iih_basemen',
            'iii_super_struktur',
            'iii_basemen',
            'v_daya_listrik',
            'v_ac_split',
            'v_ac_window',
            'v_ac_floor',
        ];

        $satuanArr = array();
        $hargaArr = array();
        $totalArr = array();

        foreach ($arr as $key => $value) {
            $satuan = $value . '_satuan';
            $harga = $value . '_harga';
            $total = $value . '_total';

            if ($request->post($harga)) {
                $validation[$satuan] = 'required';
                $hargaArr[$harga] = $request->post($harga);
            }else{
                $hargaArr[$harga] = 0;
            }

            if ($request->post($satuan)) {
                $validation[$harga] = 'required';
                $satuanArr[$satuan] = $request->post($satuan);
            }else{
                $satuanArr[$satuan] = 0;
            }

            if (!empty($request->post($satuan)) && !empty($request->post($harga))) {
                $totalArr[$total] = $request->post($satuan) * $request->post($harga);
            }else{
                $totalArr[$total] = 0;
            }
        }

        $nilai_sebelum_disusutkan_arr = array(
            $totalArr['i_struktur_utama_total'],
            $totalArr['i_basemen_total'],
            $totalArr['iia_struktur_utama_total'],
            $totalArr['iib_batu_total'],
            $totalArr['iic_dua_lantai_total'],
            $totalArr['iid_dua_lantai_total'],
            $totalArr['iie_dua_lantai_total'],
            $totalArr['iif_penutup_atap_total'],
            $totalArr['iig_dua_lantai_total'],
            $totalArr['iih_super_struktur_total'],
            $totalArr['iih_basemen_total'],
            $totalArr['iii_super_struktur_total'],
            $totalArr['iii_basemen_total'],
            $fasilitas_bangunan->jumlah_fasilitas
        );

        $nilai_sebelum_disusutkan = array_sum($nilai_sebelum_disusutkan_arr);

        if (!empty($request->post('iv_nilai_penyusutan_satuan'))) {
            $nilai_penyusutan = ($request->post('iv_nilai_penyusutan_satuan') / 100 ) * $nilai_sebelum_disusutkan;
        }else{
            $nilai_penyusutan = 0;
        }

        $nilai_setelah_disusutkan = $nilai_sebelum_disusutkan - $nilai_penyusutan;

        $nilai_bangunan_arr = array(
            $totalArr['v_daya_listrik_total'],
            $totalArr['v_ac_split_total'],
            $totalArr['v_ac_window_total'],
            $totalArr['v_ac_floor_total'],
            $nilai_setelah_disusutkan
        );

        $nilai_bangunan = array_sum($nilai_bangunan_arr);

        $request->validate($validation);

        $new = Jbp::create([
            'objek_pajak_id' => $request->post('objek_pajak_id'),
            'fasilitas_bangunan_id' => $request->post('objek_pajak_id'),
            'i_struktur_utama_satuan' => $satuanArr['i_struktur_utama_satuan'],
            'i_struktur_utama_harga' => $hargaArr['i_struktur_utama_harga'],
            'i_struktur_utama_total' => $totalArr['i_struktur_utama_total'],
            'i_basemen_satuan' => $satuanArr['i_basemen_satuan'],
            'i_basemen_harga' => $hargaArr['i_basemen_harga'],
            'i_basemen_total' => $totalArr['i_basemen_total'],
            'iia_struktur_utama_satuan' => $satuanArr['iia_struktur_utama_satuan'],
            'iia_struktur_utama_harga' => $hargaArr['iia_struktur_utama_harga'],
            'iia_struktur_utama_total' => $totalArr['iia_struktur_utama_total'],
            'iib_batu_satuan' => $satuanArr['iib_batu_satuan'],
            'iib_batu_harga' => $hargaArr['iib_batu_harga'],
            'iib_batu_total' => $totalArr['iib_batu_total'],
            'iic_dua_lantai_satuan' => $satuanArr['iic_dua_lantai_satuan'],
            'iic_dua_lantai_harga' => $hargaArr['iic_dua_lantai_harga'],
            'iic_dua_lantai_total' => $totalArr['iic_dua_lantai_total'],
            'iid_dua_lantai_satuan' => $satuanArr['iid_dua_lantai_satuan'],
            'iid_dua_lantai_harga' => $hargaArr['iid_dua_lantai_harga'],
            'iid_dua_lantai_total' => $totalArr['iid_dua_lantai_total'],
            'iie_dua_lantai_satuan' => $satuanArr['iie_dua_lantai_satuan'],
            'iie_dua_lantai_harga' => $hargaArr['iie_dua_lantai_harga'],
            'iie_dua_lantai_total' => $totalArr['iie_dua_lantai_total'],
            'iif_penutup_atap_satuan' => $satuanArr['iif_penutup_atap_satuan'],
            'iif_penutup_atap_harga' => $hargaArr['iif_penutup_atap_harga'],
            'iif_penutup_atap_total' => $totalArr['iif_penutup_atap_total'],
            'iig_dua_lantai_satuan' => $satuanArr['iig_dua_lantai_satuan'],
            'iig_dua_lantai_harga' => $hargaArr['iig_dua_lantai_harga'],
            'iig_dua_lantai_total' => $totalArr['iig_dua_lantai_total'],
            'iih_super_struktur_satuan' => $satuanArr['iih_super_struktur_satuan'],
            'iih_super_struktur_harga' => $hargaArr['iih_super_struktur_harga'],
            'iih_super_struktur_total' => $totalArr['iih_super_struktur_total'],
            'iih_basemen_satuan' => $satuanArr['iih_basemen_satuan'],
            'iih_basemen_harga' => $hargaArr['iih_basemen_harga'],
            'iih_basemen_total' => $totalArr['iih_basemen_total'],
            'iii_super_struktur_satuan' => $satuanArr['iii_super_struktur_satuan'],
            'iii_super_struktur_harga' => $hargaArr['iii_super_struktur_harga'],
            'iii_super_struktur_total' => $totalArr['iii_super_struktur_total'],
            'iii_basemen_satuan' => $satuanArr['iii_basemen_satuan'],
            'iii_basemen_harga' => $hargaArr['iii_basemen_harga'],
            'iii_basemen_total' => $totalArr['iii_basemen_total'],
            'iii_fasilitas_pendukung' => $fasilitas_bangunan->jumlah_fasilitas,
            'iii_nilai_sebelum_disusutkan' => $nilai_sebelum_disusutkan,
            'iv_nilai_penyusutan_satuan' => $request->post('iv_nilai_penyusutan_satuan') ?? 0,
            'iv_nilai_penyusutan_harga' => $nilai_sebelum_disusutkan,
            'iv_nilai_penyusutan_total' => $nilai_penyusutan,
            'iv_nilai_setelah_disusutkan' => $nilai_setelah_disusutkan,
            'v_daya_listrik_satuan' => $satuanArr['v_daya_listrik_satuan'],
            'v_daya_listrik_harga' => $hargaArr['v_daya_listrik_harga'],
            'v_daya_listrik_total' => $totalArr['v_daya_listrik_total'],
            'v_ac_split_satuan' => $satuanArr['v_ac_split_satuan'],
            'v_ac_split_harga' => $hargaArr['v_ac_split_harga'],
            'v_ac_split_total' => $totalArr['v_ac_split_total'],
            'v_ac_window_satuan' => $satuanArr['v_ac_window_satuan'],
            'v_ac_window_harga' => $hargaArr['v_ac_window_harga'],
            'v_ac_window_total' => $totalArr['v_ac_window_total'],
            'v_ac_floor_satuan' => $satuanArr['v_ac_floor_satuan'],
            'v_ac_floor_harga' => $hargaArr['v_ac_floor_harga'],
            'v_ac_floor_total' => $totalArr['v_ac_floor_total'],
            'nilai_bangunan' => $nilai_bangunan,
            'nilai_bangunan_m2' => $nilai_bangunan / $objek_pajak->total_luas_bangunan,
            'creator_id' => Auth::user()->id
        ]);

        if ($new->save()) {
            return redirect(route('objek-pajak.show', $request->post('objek_pajak_id')))->with('success', 'Formulir JBP berhasil ditambahkan!');
        }else{
            return redirect(route('objek-pajak.show', $request->post('objek_pajak_id')))->with('error', 'Formulir JBP gagal ditambahkan!');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function jbpDelete(Request $request)
    {
        $delete = Jbp::findOrFail($request->id);
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

    public function createPdf($id)
    {
        $data['detail'] = Jbp::findOrFail($id);

        $pdf = PDF::loadView('pdf.jbp', $data);

        return $pdf->download('jbp_'.time().'.pdf');
    }

    public function pdf($id){
        $data['detail'] = Jbp::findOrFail($id);
        return view('pdf.jbp', $data);
    }
}
