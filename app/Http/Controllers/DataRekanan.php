<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekananModel;

class DataRekanan extends Controller
{
    public function index(){

        // $rekanan = RekananModel::paginate(10);
        $rekanan = RekananModel::all();
        return view('data.rekanan',['rekanan' => $rekanan]);
    }

    public function add()
    {
        return view('data.tambahRekanan');
    }

    public function store(Request $request)
    {
        $rekanan = new RekananModel();
        $rekanan->nama_rekanan = $request->nama_rekanan;
        $rekanan->alamat=$request->alamat;
        $rekanan->npwp=$request->npwp;
        $rekanan->owner=$request->owner;
        $rekanan->save();
        return redirect('/rekanan');

    }

    public function edit($id){
        $rekanan = RekananModel::where('id_rekanan',$id)->get();

        if(!$rekanan)
            abort(404);
        return view('data.editRekanan',['rekanan' => $rekanan]);

    }

    public function destroy($id){
        $rekanan = RekananModel::where('id_rekanan', $id);
        $rekanan->delete();
        return redirect('/rekanan');

    }
}
