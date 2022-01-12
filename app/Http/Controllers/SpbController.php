<?php

namespace App\Http\Controllers;

use App\Models\spbModel;
use App\Models\PejabatModel;
use App\Models\RekananModel;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
// use PDF;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;



class SpbController extends Controller
{
    public function index()
    {
        $rekanan = RekananModel::all();
        $pejabat = PejabatModel::all();
        $spb = spbModel::latest()->first();
        if ($spb) {
            $split = explode('/',$spb->no_surat);
            $no_terakhir = (int)$split[0] + 1;
        }else{
            $no_terakhir = 1;
        }
        $date = Carbon::now();
        // dd($date->translatedFormat('Y'));
        return view('form.spb', ['pejabat'=>$pejabat,'no_terakhir'=>$no_terakhir, 'rekanan'=>$rekanan, 'date'=>$date]);
    }

    public function pb1($id)
    {
        $pejabat = PejabatModel::findOrFail($id);
        return response()->json($pejabat);
    }

    public function setAlamat($id)
    {
        $rekanan = RekananModel::findOrFail($id);
        return response()->json($rekanan);
    }

    public function new_db_spb(Request $request)
    {
        // dd($request);
        $no_surat = "{$request->nomor}/{$request->sp}/{$request->tki}/{$request->tgl_surat}/{$request->thn_surat}";

        $request->validate([
            'rekanan_nama' => 'required|integer',
            'tgl_pengiriman' => 'required',
            'keperluan' => 'required',
            'tgl_pembuatan' => 'required',
            'penerima_nama' => 'required',
            'pengesahan1' => 'required',
            'pengesahan2' => 'required',
        ]);

        $spb = new SpbModel();
        $spb->no_surat = $no_surat;
        $spb->kepada = $request->rekanan_nama;
        $spb->tgl_pengiriman = $request->tgl_pengiriman;
        $spb->keperluan = $request->keperluan;
        $spb->tgl_pembuatan = $request->tgl_pembuatan;
        $spb->penerima = $request->penerima_nama;
        $spb->pengesahan1 = $request->pengesahan1;
        $spb->pengesahan2 = $request->pengesahan2;
        $spb->save();

        $count = count($request->kgtn);
        for ($i = 0; $i < $count;)
        {
            $kegiatan = new KegiatanModel();
            $kegiatan->kegiatan = $request->kgtn[$i];
            $kegiatan->value  = $request->vlm[$i];
            $kegiatan->satuan = $request->satuan[$i];
            $kegiatan->harga = $request->hrg[$i];
            $kegiatan->spb_id = $spb->id;
            $kegiatan->save();
            $i++;
        }

        return redirect('/db_spb')->with('info','Data Berhasil di Tambahkan');
    }


    // DB SPB

    public function db_spb()
    {
        $spb = SpbModel::get();

        return view('data.db_spb', compact('spb'));
    }

    public function edit_db_spb($id)
    {
        $spb = spbModel::findOrFail($id);
        $rekanan = RekananModel::all();
        $pejabat = PejabatModel::all();
        return view ('data.edit_db_spb', ['spb' => $spb, 'rekanan' => $rekanan, 'pejabat' => $pejabat]);
    }

    public function print($id)
    {
        $spb = SpbModel::findOrFail($id);
        // $pdf = PDF::loadView('data.print', ['spb' => $spb]);
        // return $pdf;
        return view('data.print',['spb' => $spb]);
    }
}
