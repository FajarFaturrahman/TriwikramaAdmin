<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portofolio;
use App\GambarPortofolio;
class SitesPortofolioController extends Controller
{
    public function index(){

        $data = Portofolio::all();
        return view('triwikrama-sites.sites_portofolio', ['portofolio' => $data]);
    }

    public function show($id){        
        if(request()->ajax())
        {
        
            $output = "";
            $ambilFoto = GambarPortofolio::where('portofolio_id',$id)->get();
            foreach($ambilFoto as $foto)
            {
                $output .='<div class="item"><img src="/resizedImages/'. $foto->gambar_website .'" alt=""></div>';
            }
            $data= Portofolio::all()->find($id);
            return response()->json(['data' => $data, 'ambilFoto' =>$output]);
        }        
    }
}
