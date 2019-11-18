<?php

namespace App\Http\Controllers;
use Validator;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data['product'] = Product::where('nama_product','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data['product'] = \DB::table('product')->get();            
        }        
        return view('product', $data);
    }
    
    public function store(Request $request)
    {
        $rules = array(
            'nama_product'  => 'required',
            'deskripsi'     => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{        
        
            $data = new Product;
            $data->nama_product     = $request->nama_product;
            $data->deskripsi             = $request->deskripsi;
            
            $data->save ();
            return response()->json($data);
        }
    }

    public function edit($id){
        if(request()->ajax())
        {
            $data = Product::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    public function update(Request $request)
    {
        $rules = array(
            'nama_product'  => 'required',
            'deskripsi'     => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{        
        
            $data = Product::find($request->hidden_id);
            $data->nama_product     = $request->nama_product;
            $data->deskripsi        = $request->deskripsi;
            
            $data->save ();
            return response()->json($data);
        }
    }

    public function destroy($id){
        $product = Product::where('id', $id)->delete();

        return response()->json(['success' => 'Record has been deleted successfully']);
    }
}
