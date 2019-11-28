<?php

namespace App\Http\Controllers;
use Validator;
use App\Client;
use App\Portofolio;
use Image;
use Illuminate\Http\Request;

class clientController extends Controller
{    
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data = Client::where('nama_client','LIKE','%'.$request->cari.'%')->paginate(12);
        }else{
            $data = Client::paginate(12);
        }
        return view('client',['client' => $data] );
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


            $image = $request->file('image');
            $nameImage = $request->file('image')->getClientOriginalName();
            $thumbImage = Image::make($image->getRealPath())->resize(100, 100);
            $thumbPath = public_path() . '/thumbnail_images/' . $nameImage;
            $thumbImage = Image::make($thumbImage)->save($thumbPath);
        
            $data = new Client;
            $data->nama_client                  = $request->nama_client;
            $data->gambar_client                = $new_name;
            
            $data->save ();
            return response()->json($data);        
        }    
    }

    public function showPortofolio($id)
    {
        $ambilPortofolio = Portofolio::where('id_client', $id)->paginate(5);
        $data = Client::all()->find($id);
        return view('portofolio.portofolio', ['portofolio' => $ambilPortofolio, 'client' => $data]);
    }

    public function edit($id){
        if(request()->ajax())
        {
            $output = "";
            $ambilPortofolio = Portofolio::where('id_client', $id)->get();
            foreach($ambilPortofolio as $port){
                $output .= '<div class="d-inline-flex ml-2" id="portofolio_'. $port->id .'"><p class="rounded p-1 ml-2" style="background-color:#EFF2F4;">'. $port->nama_aplikasi.'</p></div>';                
            }

            $data = Client::all()->find($id);
            return response()->json(['data' => $data, 'ambilPortofolio' => $output]);
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

