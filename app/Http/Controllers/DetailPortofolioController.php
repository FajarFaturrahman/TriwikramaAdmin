<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPortofolioController extends Controller
{
    public function index(){
        return view('detailPortofolio');
    }
}
