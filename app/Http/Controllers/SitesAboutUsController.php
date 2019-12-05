<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitesAboutUsController extends Controller
{
    public function index(){
        return view('triwikrama-sites.sites_aboutUs');
    }
}
