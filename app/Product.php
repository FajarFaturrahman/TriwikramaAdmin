<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="product";
    protected $fillable = ['nama_product', 'deskripsi'];

    public function gambarProduct()
    {
        return $this->hasMany('App\GambarProduct');
    }

}
