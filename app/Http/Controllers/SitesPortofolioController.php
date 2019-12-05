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
            
            // $ambilFoto = GambarPortofolio::where('product_id',$id)->get();
            $data= Portofolio::all()->find($id);
            return response()->json($data);
    }
}
