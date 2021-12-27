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
    public function edit($id)
    {
        $rekanan = PejabatModel::where('id_pejabat',$id)->get();
        return view('data.editPejabat');
    }
    public function destroy($id){

       PejabatModel::where('id_pejabat',$id)->delete;
       return redirect('/pejabat');
    }
}
