<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanModel extends Model
{
    public function spbmodel()
    {
        return $this->belongsTo(SpbModel::class);
    }
}
