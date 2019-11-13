<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarPortofolio extends Model
{
    protected $table = 'gambar_portofolio';
    protected $fillable = ['gambar_website', 'gambar_mobile'];
}
