<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitesHomeController extends Controller
{
    public function index(){
        return view('triwikrama-sites.sites_home');
    }
}
