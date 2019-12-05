<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
class SitesClientController extends Controller
{
    public function index(){

        $data = Client::all();
        return view('triwikrama-sites.sites_client', ['client' => $data]);
    }
}
