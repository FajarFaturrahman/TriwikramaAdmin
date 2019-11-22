<?php

namespace App\Http\Controllers;
use Validator;
use App\Client;
use Illuminate\Http\Request;

class clientController extends Controller
{    
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data['client'] = Client::where('nama_client','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data['client'] = \DB::table('client')->paginate(12);            
        }        
        return view('client', $data);
    }
    
    public function store(Request $request)
    {
        $rules = array(
            'nama_client'   => 'required',
            'gambar_client' => 'required|mimes:jpeg,jpg,png|max:2048',
        );

        $error  = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{

        $image = $request->file('gambar_client');

        $new_name = rand(). '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images'), $new_name);
        
        $data = new Client;
            $data->nama_client                  = $request->nama_client;
            $data->gambar_client                = $new_name;
            
            $data->save ();
            return response()->json($data);        
        }    
    }

    public function edit($id){
        if(request()->ajax())
        {
            $data = Client::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request){
        $image_name = $request->hidden_image;
        $image = $request->file('gambar_client');
        if($image != '')
        {
            $rules = array(
                'nama_client'   => 'required',
                'gambar_client' => 'required|mimes:jpeg,jpg,png|max:2048',
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $rules = array(
                'nama_client'    =>  'required',                
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        
                $data = Client::find($request->hidden_id);
                $data->nama_client     = $request->nama_client;
                $data->gambar_client   = $image_name;
            
                $data->save ();
                return response()->json($data);        
    }

    public function destroy($id)
    {
        $client = Client::where('id',$id)->delete();
   
        return response()->json([
            'success' => 'Record has been deleted successfully'
        ]);
    }

}

