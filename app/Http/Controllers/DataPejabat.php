<?php

namespace App\Http\Controllers;

use App\Models\PejabatModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DataPejabat extends Controller
{
    public function index()
    {
        $pejabat = PejabatModel::all();
        return view('data.pejabat',['pejabat'=>$pejabat]);
    }

    public function add()
    {

        return view('data.tambahPejabat');
    }

    public function edit($id)
    {

        $data = PejabatModel::find($id);
        if ($data == null )abort(404);

        return view('data.editPejabat', compact('data'));
    }

    public function store(Request $request) //update
    {
        $pejabat = new PejabatModel();
        $pejabat->nip = $request->nip;
        $pejabat->nama_pejabat = $request->nama_pejabat;
        $pejabat->jabatan = $request->jabatan;
        $pejabat->save();
        return redirect('/pejabat')->with('info','Data Berhasil di Tambahkan');

    }

    public function update(Request $request , $id)
    {
        $pejabat = PejabatModel::find($id);
        $pejabat->nip = $request->nip;
        $pejabat->nama_pejabat = $request->nama_pejabat;
        $pejabat->jabatan = $request->jabatan;
        $pejabat->save();
        return redirect('/pejabat')->with('success','Data Pejabat Berhasil di update');

    }

    public function destroy($id){

        $pejabat = PejabatModel::find($id);
        if ($pejabat == null )abort(404);

        $pejabat->delete();
        return redirect('/pejabat')->with('warning','Data Berhasil di Hapus');
    }

}
