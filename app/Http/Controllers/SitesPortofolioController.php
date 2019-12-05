<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portofolio;
class SitesPortofolioController extends Controller
{
    public function index(){

        $data = Portofolio::all();
        return view('triwikrama-sites.sites_portofolio', ['portofolio' => $data]);
    }
}
