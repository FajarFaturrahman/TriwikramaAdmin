<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientController extends Controller
{    
    public function index()
    {
        return view('client');
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'nama_client' => 'required',
            'gambar_client' => 'required|image',
        ]);

        $gambar = $request->file('gambar_client');

    }
}
