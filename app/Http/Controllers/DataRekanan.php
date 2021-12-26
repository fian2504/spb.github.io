<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekananModel;

class DataRekanan extends Controller
{
    public function index(){

        $rekanan = RekananModel::paginate(10);
        return view('data.rekanan',['rekanan' => $rekanan]);
    }

    public function edit($id){
        $rekanan = RekananModel::where('id_rekanan',$id)->get();

        if(!$rekanan)
            abort(404);
        return view('data.editRekanan',['rekanan' => $rekanan]);

    }
}
