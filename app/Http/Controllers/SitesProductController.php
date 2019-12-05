<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\GambarProduct;
class SitesProductController extends Controller
{
    public function index(){

        $data = Product::all();
        return view('triwikrama-sites.sites_product', ['product' => $data]);
    }

    public function show($id)
    {
        $output = '';
        $data = Product::find($id);
        $image = GambarProduct::where('product_id', $id)->get();

        foreach($image->take(1) as $row){
            $output .= '<div class="col-sm col-img">
                            <img src="/images/'. $row->gambar_product .'" width="300"/>
                        </div>';
        }

        return response()->json(["data" => $data, "gambar" => $output]);
    }
}
