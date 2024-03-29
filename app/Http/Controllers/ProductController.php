<?php

namespace App\Http\Controllers;
use Validator;
use App\Product;
use App\GambarProduct;

use Image;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data = Product::where('nama_product','LIKE','%'.$request->cari.'%')->paginate(5);
            $data->appends(['cari' => $request->cari]);
        }else{
            $data = Product::orderBy('id','desc')->paginate(5);
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
                    $name = rand() . '.' . $image->getClientOriginalExtension();

                    $thumbImage = Image::make($image->getRealPath())->resize(225,150);
                    $thumbPath = public_path() . '/resizedImages/' . $name;
                    $thumbImage2 = Image::make($thumbImage)->save($thumbPath);

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
                $output .= '<div id="img_thumbnail_'. $foto->id .'" class="mt-2">
                                <div class="row">
                                    <div class="mr-2" style="padding: 4px; background: #EFF2F4; border-radius: 4px;">
                                        <img src="/images/'. $foto->gambar_product .'" width="40"/>
                                    </div>
                                    <span class="mt-3 ml-2">'. $foto->gambar_product .'</span>
                                    <a href="#" style="width: 20px; height: 20px; padding: 6px;" id="delete_image" data-id="'. $foto->id .'">
                                        <img src="/img/IconTriwikramaAppAdmin/red/close-cross (1).png" class="ml-3" width="10px"/>
                                    </a>
                                </div>
                                <hr>
                            </div>';
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
            'gambar_product.*'  => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
                    $image_name = rand() . '.' . $image->getClientOriginalExtension();
                    
                    $thumbImage = Image::make($image->getRealPath())->resize(225,150);
                    $thumbPath = public_path() . '/resizedImages/' . $image_name;
                    $thumbImage2 = Image::make($thumbImage)->save($thumbPath);

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
