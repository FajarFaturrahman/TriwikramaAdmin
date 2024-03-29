<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{    
    protected $table = 'client';
    protected $fillable = ['nama_client', 'gambar_client'];

    public function selectPortofolio()
    {
        return $this->hasMany('App\Portofolio');
    }
}
