<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ijin extends Model
{
    public function perusahaan()
    {
        return $this->belongsTo('App\Perusahaan','perusahaan_id');
    }
}
