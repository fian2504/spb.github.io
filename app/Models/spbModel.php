<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

use phpDocumentor\Reflection\Types\This;

class SpbModel extends Model
{
    public function kegiatan()
    {
        return $this->hasMany(KegiatanModel::class, 'spb_id');
    }

    // kepada
    public function kepada_rekanan(){
        return $this->belongsTo(RekananModel::class,'kepada', 'id');
    }

    // penerima
    public function penerima_pejabat(){
        return $this->belongsTo(PejabatModel::class,'penerima', 'id');
    }

    // pengesahan1
    public function pengesahan1_pejabat(){
        return $this->belongsTo(PejabatModel::class,'pengesahan1', 'id');
    }

    // pengesahan2
    public function pengesahan2_pejabat(){
        return $this->belongsTo(PejabatModel::class,'pengesahan2', 'id');
    }

    public function tgl_pengiriman()
    {
        return Carbon::parse($this->attributes['tgl_pengiriman'])
        ->translatedFormat('l, d MMMM Y');
        // return Carbon::parse( $spb->tgl_pengiriman )->translatedFormat('l, d F Y')
    }
}
