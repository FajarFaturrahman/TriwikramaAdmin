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
        $request->validate([            
            'nama_client' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' .$image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'nama_client' => $request->nama_client,
            'gambar_client' => $new_name
        );

            Client::create($form_data);
            return redirect('client')->with('success', 'Data berhasil di Tambah');
            return response()->json(['success'=>'Berhasil']);

            return response()->json(['error'=>$validator->errors()->all()]);
    }
}

