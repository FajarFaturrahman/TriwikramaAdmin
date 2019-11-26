<?php

namespace App\Http\Controllers;
use Validator;
use App\Product;
use App\GambarProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data['product'] = Product::where('nama_product','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data = Product::paginate(5);
        }
        return view('product',['product' => $data] );
    }
    
    public function store(Request $request)
    {
        $rules = array(
            'nama_product'      => 'required',
            'deskripsi'         => 'required',
            'gambar_product'    => 'required',
            'gambar_product.*'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }else{        
        
            $data = new Product;
            $data->nama_product     = $request->nama_product;
            $data->deskripsi             = $request->deskripsi;
            
            $data->save();
            
            if($request->hasFile('gambar_product'))
            {
                foreach($request->file('gambar_product') as $image)
                {
                    $form = new GambarProduct();
                    $name = $image->getClientOriginalName();
                    $image->move(public_path().'/images/', $name);
                    $datagambar = $name;
                    $form->product_id = $data->id;
                    $form->gambar_product=$datagambar;
                    $form->save();
                }
            }
            
            return response()->json($data);                        
            
        }

        
    }

    public function edit($id){
        if(request()->ajax())
        {
            $output = "";
            $ambilFoto = GambarProduct::where('product_id',$id)->get();
            foreach($ambilFoto as $foto){
                $output .= '<div  id="img_thumbnail_'. $foto->id .'"><img src="/images/'. $foto->gambar_product .'" width="120" class="img-thumbnail"/><a href="#" id="delete_image" class="btn btn-danger ml-1" data-id="'. $foto->id .'">delete</a></div>';
            }
            $data = Product::all()->find($id);
            return response()->json(['data' => $data, 'ambilFoto' =>$output]);
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

            $image_name = $request->hidden_image;
            if($request->hasFile('gambar_product'))
            {
                foreach($request->file('gambar_product') as $image)
                {
                    $form = new GambarProduct();
                    $image_name = $image->getClientOriginalName();
                    $image->move(public_path().'/images/', $image_name);
                    $datagambar = $image_name;
                    $form->product_id = $data->id;
                    $form->gambar_product=$datagambar;
                    $form->save();
                }
            }

            return response()->json($data);
        }
    }

    public function destroy($id){
        $product = Product::where('id', $id)->delete();

        return response()->json(['success' => 'Record has been deleted successfully']);
    }

    public function destroyImage($id){
        $datagambar = GambarProduct::where('id', $id)->delete();

        return response()->json(['success' => 'Record has been deleted successfully']);
    }

    public function show($id){
        $data = \DB::table('product')->find($id);

        return response()->json($data);
    }
}
