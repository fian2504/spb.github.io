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

    public function store(Request $request)
    {
        $pejabat = new PejabatModel();
        $pejabat->nip = $request->nip;
        $pejabat->nama_pejabat = $request->nama_pejabat;
        $pejabat->jabatan = $request->jabatan;
        $pejabat->save();
        return redirect('/pejabat');

    }

    public function edit($id)
    {
        $pejabat = PejabatModel::where('id_pejabat',$id)->get();

        return view('data.editPejabat', compact('pejabat'));
    }

    public function destroy($id){

        $pejabat = PejabatModel::where('id_pejabat', $id);
        $pejabat->delete();
        return redirect('/pejabat');
    }

}
