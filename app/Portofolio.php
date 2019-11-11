<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = "portofolio";
    protected $fillable = ['nama_aplikasi', 'tipe_website', 'platform', 'domain_portofolio', 'status', 'description', 'id_client', 'tanggal_dibuat'];
}
