<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\GambarProduct;
class SitesProductController extends Controller
{
    public function index(){

        $data = Product::orderBy('id','desc')->get();
        return view('triwikrama-sites.sites_product', ['product' => $data]);
    }
}
