<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GambarProduct extends Model
{
    protected $table = 'gambar_product';
    protected $fillable = ['gambar_product'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
