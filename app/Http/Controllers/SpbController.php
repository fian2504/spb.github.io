<?php

namespace App\Http\Controllers;

use App\Models\spbModel;
use App\Models\PejabatModel;
use App\Models\RekananModel;
use Illuminate\Http\Request;

class SpbController extends Controller
{




    // public function __construct()
    // {
    //     $this->PejabatModel= new PejabatModel();
    // }

    public function index()
    {
        $rekanan = RekananModel::all();
        $pejabat = PejabatModel::all();
        $spb = spbModel::all();

        return view('form.spb', ['pejabat'=>$pejabat,'spb'=>$spb, 'rekanan'=>$rekanan]);
    }
}
