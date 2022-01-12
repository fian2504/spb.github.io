<?php

namespace App\Http\Controllers;

use App\Models\spbModel;
use App\Models\PejabatModel;
use App\Models\RekananModel;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;

class SpbController extends Controller
{
    public function index()
    {
        $rekanan = RekananModel::all();
        $pejabat = PejabatModel::all();
        $spb = spbModel::all();

        return view('form.spb', ['pejabat'=>$pejabat,'spb'=>$spb, 'rekanan'=>$rekanan]);
    }

    public function pb1($id)
    {
        $pejabat = PejabatModel::find($id)->get();
        return response()->json($pejabat);
    }

    public function setAlamat($id)
    {
        $rekanan = RekananModel::find($id)->get();
        return response()->json($rekanan);
    }

    public function new_db_spb(Request $request)
    {
        // dd($request);

        $no_surat = "{$request->nomor}/{$request->sp}/{$request->tki}/{$request->tgl_surat}/{$request->thn_surat}";
        $spb = new SpbModel();
        $spb->no_surat = $no_surat;
        $spb->kepada = $request->rekanan_nama;
        $spb->penerima = $request->penerima_nama;
        $spb->tgl_pengiriman = $request->tgl_pengiriman;
        $spb->tgl_pembuatan = $request->tgl_pengiriman;
        $spb->pengesahan1 = $request->pengesahan1;
        $spb->pengesahan2 = $request->pengesahan2;
        $spb->save();

        $count = count($request->kgtn);
        for ($i = 0; $i < $count;)
        {
            $kegiatan = new KegiatanModel();
            $kegiatan->kegiatan = $request->kgtn[$i];
            $kegiatan->value  = $request->vlm[$i];
            $kegiatan->harga = $request->hrg[$i];
            // $kegiatan->total = $request->ttl[$i];
            $kegiatan->spb_id = $spb->id;
            $kegiatan->save();
            $i++;
        }

        return redirect('/db_spb')->with('info','Data Berhasil di Tambahkan');
        // if( $count > 0){
        //     foreach($count as $key){
        //         $kegiatan->kegiatan = $request->kgtn[$key];
        //         $kegiatan->value  = $request->vlm[$key];
        //         $kegiatan->harga = $request->hrg[$key];
        //         $kegiatan->spb_id = $spb->id;
        //         $kegiatan->Save();
        //     }
        // }



        // foreach ($request as $sku){
        //     // Code Here
        //     $kegiatan->kegiatan =
        //     $kegiatan->value  =
        //     $kegiatan->harga =
        //     $kegiatan->spb_id = $spb->id;
        // }
        // $kegiatan->save();
    }

    public function db_spb()
    {

        return view('data.db_spb');
    }
}
