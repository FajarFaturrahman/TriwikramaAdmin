<?php

namespace App\Http\Controllers;
use Validator;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data['product'] = \DB::table('product')->get();
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
        }

        $form_data = array(
            'nama_product'      => $request->nama_product,
            'deskripsi'         => $request->deskripsi
        );

        Product::create($form_data);
        return response()->json(['success' => 'Data Berhasil Ditambah']);
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
        }

        $form_data = array(
            'nama_product'      => $request->nama_product,
            'deskripsi'         => $request->deskripsi
        );

        Product::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data Berhasil Di Update']);
    }

    public function destroy($id){
        $product = Product::where('id', $id)->delete();

        return response()->json(['success' => 'Record has been deleted successfully']);
    }
}
