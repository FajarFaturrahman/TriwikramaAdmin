<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipeAplikasiPortofolio extends Model
{
    protected $table = 'tipe_aplikasi_portofolio';
    protected $fillable = ['tipe_website','portofolio_id'];

    public function portofolio()
    {
        return $this->belongsTo('App\Portofolio');
    }

}
