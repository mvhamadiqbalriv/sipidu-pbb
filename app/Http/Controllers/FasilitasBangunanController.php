<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas_bangunan;
use App\Models\Objek_pajak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class FasilitasBangunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['list'] = Objek_pajak::all();

        return view('fasilitas_bangunan.tambah', $data);
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
        }else{
            return abort(404);die;
        }

        return view('fasilitas_bangunan.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = ['objek_pajak_id' => 'required'];

        $arr = [
            'i_bangunan_lain',
            'i_kamar',
            'i_ruangan_lain',
            'ii_penumpang',
            'ii_barang',
            'iii_lebar_kurang',
            'iii_lebar_lebih',
            'iv_batako',
            'iv_bata',
            'iv_beton_pracetak',
            'iv_besi',
            'iv_brc',
            'v_hydrant',
            'v_sprinkler',
            'v_alarm',
            'v_intercom',
            'vi_ganset',
            'vii_pabx',
            'viii_sumur_artesis',
            'ix_sistem_air_panas',
            'x_penangkal_petir',
            'xi_sistem_pengolahan_limbah',
            'xii_sistem_tata_suara',
            'xiii_video_intercom',
            'xiv_reservoir',
            'xv_matv',
            'xv_cctv',
            'xvi_plester',
            'xvi_pelapis',
            'xvii_ringan',
            'xvii_sedang',
            'xvii_keras',
            'xviii_dengan_beton_liat',
            'xviii_dengan_aspal',
            'xviii_dengan_tanah_liat',
            'xviii_tanpa_beton_liat',
            'xviii_tanpa_aspal',
            'xviii_tanpa_tanah_liat'
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

        $request->validate($validation);

        $new = Fasilitas_bangunan::create([
            'objek_pajak_id' => $request->post('objek_pajak_id'),
            'i_bangunan_lain_satuan' => $satuanArr['i_bangunan_lain_satuan'],
            'i_bangunan_lain_harga' => $hargaArr['i_bangunan_lain_harga'],
            'i_bangunan_lain_total' => $totalArr['i_bangunan_lain_total'],
            'i_kamar_satuan' => $satuanArr['i_kamar_satuan'],
            'i_kamar_harga' => $hargaArr['i_kamar_harga'],
            'i_kamar_total' => $totalArr['i_kamar_total'],
            'i_ruangan_lain_satuan' => $satuanArr['i_ruangan_lain_satuan'],
            'i_ruangan_lain_harga' => $hargaArr['i_ruangan_lain_harga'],
            'i_ruangan_lain_total' => $totalArr['i_ruangan_lain_total'],
            'ii_penumpang_satuan' => $satuanArr['ii_penumpang_satuan'],
            'ii_penumpang_harga' => $hargaArr['ii_penumpang_harga'],
            'ii_penumpang_total' => $totalArr['ii_penumpang_total'],
            'ii_barang_satuan' => $satuanArr['ii_barang_satuan'],
            'ii_barang_harga' => $hargaArr['ii_barang_harga'],
            'ii_barang_total' => $totalArr['ii_barang_total'],
            'iii_lebar_kurang_satuan' => $satuanArr['iii_lebar_kurang_satuan'],
            'iii_lebar_kurang_harga' => $hargaArr['iii_lebar_kurang_harga'],
            'iii_lebar_kurang_total' => $totalArr['iii_lebar_kurang_total'],
            'iii_lebar_lebih_satuan' => $satuanArr['iii_lebar_lebih_satuan'],
            'iii_lebar_lebih_harga' => $hargaArr['iii_lebar_lebih_harga'],
            'iii_lebar_lebih_total' => $totalArr['iii_lebar_lebih_total'],
            'iv_batako_satuan' => $satuanArr['iv_batako_satuan'],
            'iv_batako_harga' => $hargaArr['iv_batako_harga'],
            'iv_batako_total' => $totalArr['iv_batako_total'],
            'iv_bata_satuan' => $satuanArr['iv_bata_satuan'],
            'iv_bata_harga' => $hargaArr['iv_bata_harga'],
            'iv_bata_total' => $totalArr['iv_bata_total'],
            'iv_beton_pracetak_satuan' => $satuanArr['iv_beton_pracetak_satuan'],
            'iv_beton_pracetak_harga' => $hargaArr['iv_beton_pracetak_harga'],
            'iv_beton_pracetak_total' => $totalArr['iv_beton_pracetak_total'],
            'iv_besi_satuan' => $satuanArr['iv_besi_satuan'],
            'iv_besi_harga' => $hargaArr['iv_besi_harga'],
            'iv_besi_total' => $totalArr['iv_besi_total'],
            'iv_brc_satuan' => $satuanArr['iv_brc_satuan'],
            'iv_brc_harga' => $hargaArr['iv_brc_harga'],
            'iv_brc_total' => $totalArr['iv_brc_total'],
            'v_hydrant_satuan' => $satuanArr['v_hydrant_satuan'],
            'v_hydrant_harga' => $hargaArr['v_hydrant_harga'],
            'v_hydrant_total' => $totalArr['v_hydrant_total'],
            'v_sprinkler_satuan' => $satuanArr['v_sprinkler_satuan'],
            'v_sprinkler_harga' => $hargaArr['v_sprinkler_harga'],
            'v_sprinkler_total' => $totalArr['v_sprinkler_total'],
            'v_alarm_satuan' => $satuanArr['v_alarm_satuan'],
            'v_alarm_harga' => $hargaArr['v_alarm_harga'],
            'v_alarm_total' => $totalArr['v_alarm_total'],
            'v_intercom_satuan' => $satuanArr['v_intercom_satuan'],
            'v_intercom_harga' => $hargaArr['v_intercom_harga'],
            'v_intercom_total' => $totalArr['v_intercom_total'],
            'vi_ganset_satuan' => $satuanArr['vi_ganset_satuan'],
            'vi_ganset_harga' => $hargaArr['vi_ganset_harga'],
            'vi_ganset_total' => $totalArr['vi_ganset_total'],
            'vii_pabx_satuan' => $satuanArr['vii_pabx_satuan'],
            'vii_pabx_harga' => $hargaArr['vii_pabx_harga'],
            'vii_pabx_total' => $totalArr['vii_pabx_total'],
            'viii_sumur_artesis_satuan' => $satuanArr['viii_sumur_artesis_satuan'],
            'viii_sumur_artesis_harga' => $hargaArr['viii_sumur_artesis_harga'],
            'viii_sumur_artesis_total' => $totalArr['viii_sumur_artesis_total'],
            'ix_sistem_air_panas_satuan' => $satuanArr['ix_sistem_air_panas_satuan'],
            'ix_sistem_air_panas_harga' => $hargaArr['ix_sistem_air_panas_harga'],
            'ix_sistem_air_panas_total' => $totalArr['ix_sistem_air_panas_total'],
            'x_penangkal_petir_satuan' => $satuanArr['x_penangkal_petir_satuan'],
            'x_penangkal_petir_harga' => $hargaArr['x_penangkal_petir_harga'],
            'x_penangkal_petir_total' => $totalArr['x_penangkal_petir_total'],
            'xi_sistem_pengolahan_limbah_satuan' => $satuanArr['xi_sistem_pengolahan_limbah_satuan'],
            'xi_sistem_pengolahan_limbah_harga' => $hargaArr['xi_sistem_pengolahan_limbah_harga'],
            'xi_sistem_pengolahan_limbah_total' => $totalArr['xi_sistem_pengolahan_limbah_total'],
            'xii_sistem_tata_suara_satuan' => $satuanArr['xii_sistem_tata_suara_satuan'],
            'xii_sistem_tata_suara_harga' => $hargaArr['xii_sistem_tata_suara_harga'],
            'xii_sistem_tata_suara_total' => $totalArr['xii_sistem_tata_suara_total'],
            'xiii_video_intercom_satuan' => $satuanArr['xiii_video_intercom_satuan'],
            'xiii_video_intercom_harga' => $hargaArr['xiii_video_intercom_harga'],
            'xiii_video_intercom_total' => $totalArr['xiii_video_intercom_total'],
            'xiv_reservoir_satuan' => $satuanArr['xiv_reservoir_satuan'],
            'xiv_reservoir_harga' => $hargaArr['xiv_reservoir_harga'],
            'xiv_reservoir_total' => $totalArr['xiv_reservoir_total'],
            'xv_matv_satuan' => $satuanArr['xv_matv_satuan'],
            'xv_matv_harga' => $hargaArr['xv_matv_harga'],
            'xv_matv_total' => $totalArr['xv_matv_total'],
            'xv_cctv_satuan' => $satuanArr['xv_cctv_satuan'],
            'xv_cctv_harga' => $hargaArr['xv_cctv_harga'],
            'xv_cctv_total' => $totalArr['xv_cctv_total'],
            'xvi_plester_satuan' => $satuanArr['xvi_plester_satuan'],
            'xvi_plester_harga' => $hargaArr['xvi_plester_harga'],
            'xvi_plester_total' => $totalArr['xvi_plester_total'],
            'xvi_pelapis_satuan' => $satuanArr['xvi_pelapis_satuan'],
            'xvi_pelapis_harga' => $hargaArr['xvi_pelapis_harga'],
            'xvi_pelapis_total' => $totalArr['xvi_pelapis_total'],
            'xvii_ringan_satuan' => $satuanArr['xvii_ringan_satuan'],
            'xvii_ringan_harga' => $hargaArr['xvii_ringan_harga'],
            'xvii_ringan_total' => $totalArr['xvii_ringan_total'],
            'xvii_sedang_satuan' => $satuanArr['xvii_sedang_satuan'],
            'xvii_sedang_harga' => $hargaArr['xvii_sedang_harga'],
            'xvii_sedang_total' => $totalArr['xvii_sedang_total'],
            'xvii_keras_satuan' => $satuanArr['xvii_keras_satuan'],
            'xvii_keras_harga' => $hargaArr['xvii_keras_harga'],
            'xvii_keras_total' => $totalArr['xvii_keras_total'],
            'xviii_dengan_beton_liat_satuan' => $satuanArr['xviii_dengan_beton_liat_satuan'],
            'xviii_dengan_beton_liat_harga' => $hargaArr['xviii_dengan_beton_liat_harga'],
            'xviii_dengan_beton_liat_total' => $totalArr['xviii_dengan_beton_liat_total'],
            'xviii_dengan_aspal_satuan' => $satuanArr['xviii_dengan_aspal_satuan'],
            'xviii_dengan_aspal_harga' => $hargaArr['xviii_dengan_aspal_harga'],
            'xviii_dengan_aspal_total' => $totalArr['xviii_dengan_aspal_total'],
            'xviii_dengan_tanah_liat_satuan' => $satuanArr['xviii_dengan_tanah_liat_satuan'],
            'xviii_dengan_tanah_liat_harga' => $hargaArr['xviii_dengan_tanah_liat_harga'],
            'xviii_dengan_tanah_liat_total' => $totalArr['xviii_dengan_tanah_liat_total'],
            'xviii_tanpa_beton_liat_satuan' => $satuanArr['xviii_tanpa_beton_liat_satuan'],
            'xviii_tanpa_beton_liat_harga' => $hargaArr['xviii_tanpa_beton_liat_harga'],
            'xviii_tanpa_beton_liat_total' => $totalArr['xviii_tanpa_beton_liat_total'],
            'xviii_tanpa_aspal_satuan' => $satuanArr['xviii_tanpa_aspal_satuan'],
            'xviii_tanpa_aspal_harga' => $hargaArr['xviii_tanpa_aspal_harga'],
            'xviii_tanpa_aspal_total' => $totalArr['xviii_tanpa_aspal_total'],
            'xviii_tanpa_tanah_liat_satuan' => $satuanArr['xviii_tanpa_tanah_liat_satuan'],
            'xviii_tanpa_tanah_liat_harga' => $hargaArr['xviii_tanpa_tanah_liat_harga'],
            'xviii_tanpa_tanah_liat_total' => $totalArr['xviii_tanpa_tanah_liat_total'],
            'jumlah_fasilitas' => array_sum($totalArr),
            'creator_id' => Auth::user()->id
        ]);

        if ($new->save()) {
            return redirect(route('objek-pajak.show', $request->post('objek_pajak_id')))->with('success', 'Formulir Fasilitas Bangunan berhasil ditambahkan!');
        }else{
            return redirect(route('objek-pajak.show', $request->post('objek_pajak_id')))->with('error', 'Formulir Fasilitas Bangunan gagal ditambahkan!');
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
    public function edit(Request $request, $id)
    {
        if (!empty($request->get('id'))) {
            $data['detail'] = Fasilitas_bangunan::findOrFail($id);
            $data['objek_pajak'] = Objek_pajak::findOrFail($request->id);
        }else{
            return abort(404);die;
        }

        return view('fasilitas_bangunan.ubah', $data);
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
        $validation = ['objek_pajak_id' => 'required'];

        $arr = [
            'i_bangunan_lain',
            'i_kamar',
            'i_ruangan_lain',
            'ii_penumpang',
            'ii_barang',
            'iii_lebar_kurang',
            'iii_lebar_lebih',
            'iv_batako',
            'iv_bata',
            'iv_beton_pracetak',
            'iv_besi',
            'iv_brc',
            'v_hydrant',
            'v_sprinkler',
            'v_alarm',
            'v_intercom',
            'vi_ganset',
            'vii_pabx',
            'viii_sumur_artesis',
            'ix_sistem_air_panas',
            'x_penangkal_petir',
            'xi_sistem_pengolahan_limbah',
            'xii_sistem_tata_suara',
            'xiii_video_intercom',
            'xiv_reservoir',
            'xv_matv',
            'xv_cctv',
            'xvi_plester',
            'xvi_pelapis',
            'xvii_ringan',
            'xvii_sedang',
            'xvii_keras',
            'xviii_dengan_beton_liat',
            'xviii_dengan_aspal',
            'xviii_dengan_tanah_liat',
            'xviii_tanpa_beton_liat',
            'xviii_tanpa_aspal',
            'xviii_tanpa_tanah_liat'
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

        $request->validate($validation);

        $update = Fasilitas_bangunan::findOrFail($id);
        $update->objek_pajak_id = $request->post('objek_pajak_id');
        $update->i_bangunan_lain_satuan = $satuanArr['i_bangunan_lain_satuan'];
        $update->i_bangunan_lain_harga = $hargaArr['i_bangunan_lain_harga'];
        $update->i_bangunan_lain_total = $totalArr['i_bangunan_lain_total'];
        $update->i_kamar_satuan = $satuanArr['i_kamar_satuan'];
        $update->i_kamar_harga = $hargaArr['i_kamar_harga'];
        $update->i_kamar_total = $totalArr['i_kamar_total'];
        $update->i_ruangan_lain_satuan = $satuanArr['i_ruangan_lain_satuan'];
        $update->i_ruangan_lain_harga = $hargaArr['i_ruangan_lain_harga'];
        $update->i_ruangan_lain_total = $totalArr['i_ruangan_lain_total'];
        $update->ii_penumpang_satuan = $satuanArr['ii_penumpang_satuan'];
        $update->ii_penumpang_harga = $hargaArr['ii_penumpang_harga'];
        $update->ii_penumpang_total = $totalArr['ii_penumpang_total'];
        $update->ii_barang_satuan = $satuanArr['ii_barang_satuan'];
        $update->ii_barang_harga = $hargaArr['ii_barang_harga'];
        $update->ii_barang_total = $totalArr['ii_barang_total'];
        $update->iii_lebar_kurang_satuan = $satuanArr['iii_lebar_kurang_satuan'];
        $update->iii_lebar_kurang_harga = $hargaArr['iii_lebar_kurang_harga'];
        $update->iii_lebar_kurang_total = $totalArr['iii_lebar_kurang_total'];
        $update->iii_lebar_lebih_satuan = $satuanArr['iii_lebar_lebih_satuan'];
        $update->iii_lebar_lebih_harga = $hargaArr['iii_lebar_lebih_harga'];
        $update->iii_lebar_lebih_total = $totalArr['iii_lebar_lebih_total'];
        $update->iv_batako_satuan = $satuanArr['iv_batako_satuan'];
        $update->iv_batako_harga = $hargaArr['iv_batako_harga'];
        $update->iv_batako_total = $totalArr['iv_batako_total'];
        $update->iv_bata_satuan = $satuanArr['iv_bata_satuan'];
        $update->iv_bata_harga = $hargaArr['iv_bata_harga'];
        $update->iv_bata_total = $totalArr['iv_bata_total'];
        $update->iv_beton_pracetak_satuan = $satuanArr['iv_beton_pracetak_satuan'];
        $update->iv_beton_pracetak_harga = $hargaArr['iv_beton_pracetak_harga'];
        $update->iv_beton_pracetak_total = $totalArr['iv_beton_pracetak_total'];
        $update->iv_besi_satuan = $satuanArr['iv_besi_satuan'];
        $update->iv_besi_harga = $hargaArr['iv_besi_harga'];
        $update->iv_besi_total = $totalArr['iv_besi_total'];
        $update->iv_brc_satuan = $satuanArr['iv_brc_satuan'];
        $update->iv_brc_harga = $hargaArr['iv_brc_harga'];
        $update->iv_brc_total = $totalArr['iv_brc_total'];
        $update->v_hydrant_satuan = $satuanArr['v_hydrant_satuan'];
        $update->v_hydrant_harga = $hargaArr['v_hydrant_harga'];
        $update->v_hydrant_total = $totalArr['v_hydrant_total'];
        $update->v_sprinkler_satuan = $satuanArr['v_sprinkler_satuan'];
        $update->v_sprinkler_harga = $hargaArr['v_sprinkler_harga'];
        $update->v_sprinkler_total = $totalArr['v_sprinkler_total'];
        $update->v_alarm_satuan = $satuanArr['v_alarm_satuan'];
        $update->v_alarm_harga = $hargaArr['v_alarm_harga'];
        $update->v_alarm_total = $totalArr['v_alarm_total'];
        $update->v_intercom_satuan = $satuanArr['v_intercom_satuan'];
        $update->v_intercom_harga = $hargaArr['v_intercom_harga'];
        $update->v_intercom_total = $totalArr['v_intercom_total'];
        $update->vi_ganset_satuan = $satuanArr['vi_ganset_satuan'];
        $update->vi_ganset_harga = $hargaArr['vi_ganset_harga'];
        $update->vi_ganset_total = $totalArr['vi_ganset_total'];
        $update->vii_pabx_satuan = $satuanArr['vii_pabx_satuan'];
        $update->vii_pabx_harga = $hargaArr['vii_pabx_harga'];
        $update->vii_pabx_total = $totalArr['vii_pabx_total'];
        $update->viii_sumur_artesis_satuan = $satuanArr['viii_sumur_artesis_satuan'];
        $update->viii_sumur_artesis_harga = $hargaArr['viii_sumur_artesis_harga'];
        $update->viii_sumur_artesis_total = $totalArr['viii_sumur_artesis_total'];
        $update->ix_sistem_air_panas_satuan = $satuanArr['ix_sistem_air_panas_satuan'];
        $update->ix_sistem_air_panas_harga = $hargaArr['ix_sistem_air_panas_harga'];
        $update->ix_sistem_air_panas_total = $totalArr['ix_sistem_air_panas_total'];
        $update->x_penangkal_petir_satuan = $satuanArr['x_penangkal_petir_satuan'];
        $update->x_penangkal_petir_harga = $hargaArr['x_penangkal_petir_harga'];
        $update->x_penangkal_petir_total = $totalArr['x_penangkal_petir_total'];
        $update->xi_sistem_pengolahan_limbah_satuan = $satuanArr['xi_sistem_pengolahan_limbah_satuan'];
        $update->xi_sistem_pengolahan_limbah_harga = $hargaArr['xi_sistem_pengolahan_limbah_harga'];
        $update->xi_sistem_pengolahan_limbah_total = $totalArr['xi_sistem_pengolahan_limbah_total'];
        $update->xii_sistem_tata_suara_satuan = $satuanArr['xii_sistem_tata_suara_satuan'];
        $update->xii_sistem_tata_suara_harga = $hargaArr['xii_sistem_tata_suara_harga'];
        $update->xii_sistem_tata_suara_total = $totalArr['xii_sistem_tata_suara_total'];
        $update->xiii_video_intercom_satuan = $satuanArr['xiii_video_intercom_satuan'];
        $update->xiii_video_intercom_harga = $hargaArr['xiii_video_intercom_harga'];
        $update->xiii_video_intercom_total = $totalArr['xiii_video_intercom_total'];
        $update->xiv_reservoir_satuan = $satuanArr['xiv_reservoir_satuan'];
        $update->xiv_reservoir_harga = $hargaArr['xiv_reservoir_harga'];
        $update->xiv_reservoir_total = $totalArr['xiv_reservoir_total'];
        $update->xv_matv_satuan = $satuanArr['xv_matv_satuan'];
        $update->xv_matv_harga = $hargaArr['xv_matv_harga'];
        $update->xv_matv_total = $totalArr['xv_matv_total'];
        $update->xv_cctv_satuan = $satuanArr['xv_cctv_satuan'];
        $update->xv_cctv_harga = $hargaArr['xv_cctv_harga'];
        $update->xv_cctv_total = $totalArr['xv_cctv_total'];
        $update->xvi_plester_satuan = $satuanArr['xvi_plester_satuan'];
        $update->xvi_plester_harga = $hargaArr['xvi_plester_harga'];
        $update->xvi_plester_total = $totalArr['xvi_plester_total'];
        $update->xvi_pelapis_satuan = $satuanArr['xvi_pelapis_satuan'];
        $update->xvi_pelapis_harga = $hargaArr['xvi_pelapis_harga'];
        $update->xvi_pelapis_total = $totalArr['xvi_pelapis_total'];
        $update->xvii_ringan_satuan = $satuanArr['xvii_ringan_satuan'];
        $update->xvii_ringan_harga = $hargaArr['xvii_ringan_harga'];
        $update->xvii_ringan_total = $totalArr['xvii_ringan_total'];
        $update->xvii_sedang_satuan = $satuanArr['xvii_sedang_satuan'];
        $update->xvii_sedang_harga = $hargaArr['xvii_sedang_harga'];
        $update->xvii_sedang_total = $totalArr['xvii_sedang_total'];
        $update->xvii_keras_satuan = $satuanArr['xvii_keras_satuan'];
        $update->xvii_keras_harga = $hargaArr['xvii_keras_harga'];
        $update->xvii_keras_total = $totalArr['xvii_keras_total'];
        $update->xviii_dengan_beton_liat_satuan = $satuanArr['xviii_dengan_beton_liat_satuan'];
        $update->xviii_dengan_beton_liat_harga = $hargaArr['xviii_dengan_beton_liat_harga'];
        $update->xviii_dengan_beton_liat_total = $totalArr['xviii_dengan_beton_liat_total'];
        $update->xviii_dengan_aspal_satuan = $satuanArr['xviii_dengan_aspal_satuan'];
        $update->xviii_dengan_aspal_harga = $hargaArr['xviii_dengan_aspal_harga'];
        $update->xviii_dengan_aspal_total = $totalArr['xviii_dengan_aspal_total'];
        $update->xviii_dengan_tanah_liat_satuan = $satuanArr['xviii_dengan_tanah_liat_satuan'];
        $update->xviii_dengan_tanah_liat_harga = $hargaArr['xviii_dengan_tanah_liat_harga'];
        $update->xviii_dengan_tanah_liat_total = $totalArr['xviii_dengan_tanah_liat_total'];
        $update->xviii_tanpa_beton_liat_satuan = $satuanArr['xviii_tanpa_beton_liat_satuan'];
        $update->xviii_tanpa_beton_liat_harga = $hargaArr['xviii_tanpa_beton_liat_harga'];
        $update->xviii_tanpa_beton_liat_total = $totalArr['xviii_tanpa_beton_liat_total'];
        $update->xviii_tanpa_aspal_satuan = $satuanArr['xviii_tanpa_aspal_satuan'];
        $update->xviii_tanpa_aspal_harga = $hargaArr['xviii_tanpa_aspal_harga'];
        $update->xviii_tanpa_aspal_total = $totalArr['xviii_tanpa_aspal_total'];
        $update->xviii_tanpa_tanah_liat_satuan = $satuanArr['xviii_tanpa_tanah_liat_satuan'];
        $update->xviii_tanpa_tanah_liat_harga = $hargaArr['xviii_tanpa_tanah_liat_harga'];
        $update->xviii_tanpa_tanah_liat_total = $totalArr['xviii_tanpa_tanah_liat_total'];
        $update->jumlah_fasilitas = array_sum($totalArr);
        $update->updator_id = Auth::user()->id;

        if ($update->save()) {
            return redirect(route('objek-pajak.show', $request->post('objek_pajak_id')))->with('success', 'Formulir Fasilitas Bangunan berhasil diperbaharui!');
        }else{
            return redirect(route('objek-pajak.show', $request->post('objek_pajak_id')))->with('error', 'Formulir Fasilitas Bangunan gagal diperbaharui!');
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

    public function fasilitasBangunanDelete(Request $request)
    {
        $delete = Fasilitas_bangunan::findOrFail($request->id);
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
