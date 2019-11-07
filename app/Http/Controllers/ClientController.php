<?php

namespace App\Http\Controllers;
use App\Client;
use Illuminate\Http\Request;

class clientController extends Controller
{    
    public function index()
    {
        $data['client'] = \DB::table('client')->get();
        return view('client', $data);
    }

    public function store(Request $request){
                
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
    }

    public function edit($id){
        $data['client'] = \DB::table('client')->find($id);
        return view('client', $data);
    }

    public function update(Request $request, $id){
        
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != ''){
            $request->validate([
                'nama_client' => 'required',
                'gambar_client' => 'required|mimes:jpeg,jpg,png|max:2048',
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);

        }else{
            $request->validate([
                'nama_client' => 'required',
            ]);
        }

        $form_data = array(
            'nama_client' => $request->nama_client,
            'gambar_client' => $image_name
        );

        Client::whereId($id)->update($form_data);

        return redirect('client')->with('success', 'Data Berhasil diubah');
    }

    public function destroy(Request $request, $id){
        $client = Client::find($id);
        $client->delete();

        return redirect()->route('client')
                        ->with('success','Product deleted successfully');
    }


    
}

