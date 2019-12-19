<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = "portofolio";
    protected $fillable = ['nama_aplikasi', 'platform', 'domain_portofolio', 'status', 'description', 'id_client', 'tanggal_dibuat'];

    public function gambarWeb()
    {
        return $this->hasMany('App\GambarPortofolio', 'portofolio_id', 'id');
    }

    public function gambarMobile(){
        return $this->hasMany('App\GambarMobilePortofolio', 'portofolio_id', 'id');
    }

    public function tipeAplikasi(){
        return $this->hasMany('App\TipeAplikasiPortofolio', 'portofolio_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
