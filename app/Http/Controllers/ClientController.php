<?php

namespace App\Http\Controllers;
use Validator;
use App\Client;
use Illuminate\Http\Request;

class clientController extends Controller
{    
    public function index()
    {
        $data['client'] = \DB::table('client')->get();
        return view('client', $data);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_client' => 'required',
            'gambar_client' => 'required|image|mimes:jpeg,png,jpg,giv,svg|max:2048',
        ]);


        if($validator->passes()){
            $input= $request->all();
            $input['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('gambar'), $input['gambar']);

            Client::create($input);
            return response()->json(['success'=>'Berhasil']);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
}

