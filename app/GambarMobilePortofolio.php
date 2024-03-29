<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarMobilePortofolio extends Model
{
    protected $table = 'gambar_mobile_portofolio';
    protected $fillable = ['gambar_mobile'];

    public function portofolio()
    {
        return $this->belongsTo('App\Portofolio');
    }
}
