<?php

namespace App\Http\Controllers;
use App\Portofolio;
use App\Client;
use App\TipeAplikasiPortofolio;
use App\GambarPortofolio;
use App\GambarMobilePortofolio;
use Validator,Redirect,Response,File,DB;

use Image;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{    
    public function index(Request $request)
    {   
        if($request->has('cari')){
            $data = Portofolio::where('nama_aplikasi','LIKE','%'.$request->cari.'%')->paginate(5);
            $data->appends(['cari' => $request->cari]);
        }else{
            $data = Portofolio::orderBy('portofolio_highlight','desc')->orderBy('id','desc')->paginate(5);
        }                
        return view('portofolio.portofolio',['portofolio' => $data] );
    }

    public function create()
    {
        $client = Client::All();
    	return view('portofolio.createPortofolio')->with('client', $client);
    }

    public function store(Request $request)
    {            

        $rule = [
            'nama_aplikasi' => 'required|string',
            
            'platform' => '',
    		'domain_portofolio' => 'required',
            'status' => 'required',
            'description' => 'required',
            'id_client' => 'required',
            'tanggal_dibuat' => 'required',
            'portofolio_highlight' => '',
            // 'gambar_website' => 'required',
            // 'gambar_website.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            // 'gambar_mobile'  => 'required',
            // 'gambar_mobile.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	];
		$this->validate($request,$rule);

    	$input = $request->all();    	

        $portofolio = new Portofolio;
        $portofolio->nama_aplikasi              =   $input['nama_aplikasi'];        
        $portofolio->platform                   =   $input['platform'];
        $portofolio->domain_portofolio          =   $input['domain_portofolio'];
        $portofolio->status                     =   $input['status'];
        $portofolio->description                =   $input['description'];
        $portofolio->id_client                  =   $input['id_client'];
        $portofolio->tanggal_dibuat             =   $input['tanggal_dibuat'];        
        $portofolio->portofolio_highlight       =   $request->has('portofolio_highlight');              

        $status = $portofolio->save();

    	if ($status) {
            if($request->has('tipe_website')){

                $types = $request->input('tipe_website', false);
                foreach($types as $tipeWebsite)
                {                    
                    $tipePort = new TipeAplikasiPortofolio();
                                                            
                    $tipePort->tipe_website = $tipeWebsite;
                    $tipePort->portofolio_id = $portofolio->id;                   
                    $berhasil = $tipePort->save();
                }

                if($berhasil){
                    if($request->hasFile('gambar_website'))
                    {                
                        foreach($request->file('gambar_website') as $imageWebsite)
                        {                    
                            $gambarPort = new GambarPortofolio();
                            $nameImage = rand() . '.' . $imageWebsite->getClientOriginalExtension();

                            $thumbImage = Image::make($imageWebsite->getRealPath())->resize(null, 400, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $thumbPath = public_path() . '/resizedImages/' . $nameImage;
                            $thumbImage2 = Image::make($thumbImage)->save($thumbPath);

                            $imageWebsite->move(public_path().'/images/', $nameImage);

                            $dataImage = $nameImage;
                            $gambarPort->portofolio_id = $portofolio->id;
                            $gambarPort->gambar_website = $dataImage;
                            $success = $gambarPort->save();
                        }
                        
                        if($success){

                            if($request->hasFile('gambar_mobile'))
                            {                
                                foreach($request->file('gambar_mobile') as $imageMobile)
                                {                    
                                    $gambarMobilePort = new GambarMobilePortofolio();
                                    $nameImageMobile = rand() . '.' . $imageMobile->getClientOriginalExtension();

                                    $thumbImage = Image::make($imageMobile->getRealPath())->resize(null, 400, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                    $thumbPath = public_path() . '/resizedImages/' . $nameImageMobile;
                                    $thumbImage2 = Image::make($thumbImage)->save($thumbPath);
                                                                                            
                            
                                    $imageMobile->move(public_path().'/images/', $nameImageMobile);
                                    $dataImage = $nameImageMobile;
                                    $gambarMobilePort->portofolio_id = $portofolio->id;
                                    $gambarMobilePort->gambar_mobile = $dataImage;
                                    $gambarMobilePort->save();
                                }                            
                            }
                        }
                    }else{
                        if($request->hasFile('gambar_mobile'))
                        {                
                            foreach($request->file('gambar_mobile') as $imageMobile)
                            {                    
                                $gambarMobilePort = new GambarMobilePortofolio();
                                $nameImageMobile = rand() . '.' . $imageMobile->getClientOriginalExtension();
        
                                $thumbImage = Image::make($imageMobile->getRealPath())->resize(null, 400, function ($constraint) {
                                    $constraint->aspectRatio();
                                });
                                $thumbPath = public_path() . '/resizedImages/' . $nameImageMobile;
                                $thumbImage2 = Image::make($thumbImage)->save($thumbPath);
        
                                $imageMobile->move(public_path().'/images/', $nameImageMobile);
                                $dataImage = $nameImageMobile;
                                $gambarMobilePort->portofolio_id = $portofolio->id;
                                $gambarMobilePort->gambar_mobile = $dataImage;
                                $gambarMobilePort->save();
                            }                            
                        }
                    }
                }
            }
                return redirect('/portofolio')->with('success', 'Data berhasil ditambahkan');
    	}else{
    		return redirect('/portofolio/create')->with('error', 'Data gagal ditambahkan');
    	}
    }

    public function show($id)
    {        
        $data = Portofolio::all()->find($id);
        return view('portofolio.detailPortofolio', ['portofolio' => $data]);
    }

    public function edit(Request $request, $id)
    {
        $ambilFoto = GambarPortofolio::where('portofolio_id',$id)->get();
        $ambilFotoMobile = GambarMobilePortofolio::where('portofolio_id',$id)->get();
        $ambilTipe = TipeAplikasiPortofolio::where('portofolio_id',$id)->get();
        $client = Client::All();        
        
        $data = Portofolio::all()->find($id);
        return view('portofolio.addPortofolio', ['portofolio' => $data, 'ambilFoto' => $ambilFoto, 'ambilFotoMobile' => $ambilFotoMobile, 'ambilTipe' => $ambilTipe])->with('client', $client);
    }    

    public function update(Request $request,$id)
    {
        $imageName = $request->hidden_image;
        $rule = [
            'nama_aplikasi' => 'required|string',            
            'platform' => '',
    		'domain_portofolio' => 'required',
            'status' => 'required',
            'description' => 'required',
            'id_client' => 'required',
            'tanggal_dibuat' => 'required',
    	];
		$this->validate($request,$rule);

    	$input = $request->all();    	

        $portofolio = Portofolio::find($id);
        $portofolio->nama_aplikasi              =   $input['nama_aplikasi'];        
        $portofolio->platform                   =   $input['platform'];
        $portofolio->domain_portofolio          =   $input['domain_portofolio'];
        $portofolio->status                     =   $input['status'];
        $portofolio->description                =   $input['description'];
        $portofolio->id_client                  =   $input['id_client'];
        $portofolio->tanggal_dibuat             =   $input['tanggal_dibuat'];
        $portofolio->portofolio_highlight       =   $request->has('portofolio_highlight');              

        $status = $portofolio->update();

    	if ($status) {
            if($request->has('tipe_website')){

                $types = $request->input('tipe_website', false);
                foreach($types as $tipeWebsite)
                {                    
                    $tipePort = new TipeAplikasiPortofolio();
                                                            
                    $tipePort->tipe_website = $tipeWebsite;
                    $tipePort->portofolio_id = $portofolio->id;                   
                    $berhasil = $tipePort->save();
                }

                if($berhasil){    
                    if($request->hasFile('gambar_website'))
                    {                
                        foreach($request->file('gambar_website') as $imageWebsite)
                        {                    
                            $gambarPort = new GambarPortofolio();
                            $nameImage = rand() . '.' . $imageWebsite->getClientOriginalExtension();
    
                            $thumbImage = Image::make($imageWebsite->getRealPath())->resize(null, 400, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $thumbPath = public_path() . '/resizedImages/' . $nameImage;
                            $thumbImage2 = Image::make($thumbImage)->save($thumbPath);
    
                            $imageWebsite->move(public_path().'/images/', $nameImage);
                            $dataImage = $nameImage;
                            $gambarPort->portofolio_id = $portofolio->id;
                            $gambarPort->gambar_website = $dataImage;
                            $success = $gambarPort->save();
                        }
                        
                        if($success){
    
                            if($request->hasFile('gambar_mobile'))
                            {                
                                foreach($request->file('gambar_mobile') as $imageMobile)
                                {                    
                                    $gambarMobilePort = new GambarMobilePortofolio();
                                    $nameImageMobile = rand() . '.' . $imageMobile->getClientOriginalExtension();
    
                                    $thumbImage = Image::make($imageMobile->getRealPath())->resize(null, 400, function ($constraint) {
                                        $constraint->aspectRatio();
                                    });
                                    $thumbPath = public_path() . '/resizedImages/' . $nameImageMobile;
                                    $thumbImage2 = Image::make($thumbImage)->save($thumbPath);
    
                                    $imageMobile->move(public_path().'/images/', $nameImageMobile);
                                    $dataImage = $nameImageMobile;
                                    $gambarMobilePort->portofolio_id = $portofolio->id;
                                    $gambarMobilePort->gambar_mobile = $dataImage;
                                    $gambarMobilePort->save();
                                }                            
                            }
                        }
                    }
                }

            }else{
                if($request->hasFile('gambar_mobile'))
                    {                
                        foreach($request->file('gambar_mobile') as $imageMobile)
                        {                    
                            $gambarMobilePort = new GambarMobilePortofolio();
                            $nameImageMobile = rand() . '.' . $imageMobile->getClientOriginalExtension();

                            $thumbImage = Image::make($imageMobile->getRealPath())->resize(null, 400, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                            $thumbPath = public_path() . '/resizedImages/' . $nameImageMobile;
                            $thumbImage2 = Image::make($thumbImage)->save($thumbPath);

                            $imageMobile->move(public_path().'/images/', $nameImageMobile);
                            $dataImage = $nameImageMobile;
                            $gambarMobilePort->portofolio_id = $portofolio->id;
                            $gambarMobilePort->gambar_mobile = $dataImage;
                            $gambarMobilePort->save();
                        }                            
                    }
            }
            
    		return redirect('/portofolio')->with('success', 'Data berhasil ditambahkan');
    	}else{
    		return redirect('/portofolio/create')->with('error', 'Data gagal ditambahkan');
    	}
    }

    public function destroy($id)
    {
        $portofolio = Portofolio::find($id);
        $status = $portofolio->delete();

        if($status){
            return redirect('/portofolio')->with('success','Data Berhasil di hapus');
        }else{
            return redirect('/portofolio/detailPortofolio')->with('error','Data gagal dihapus');
        }
    }

    public function delete_image(Request $request,$id){
        
        $gambarWebsite = GambarPortofolio::find($id);                 
        $status = $gambarWebsite->delete();
        
    

        return redirect(url()->previous());
    }

    public function delete_image2(Request $request,$id){
            
        $gambarMobile = GambarMobilePortofolio::find($id);            
        $status = $gambarMobile->delete();
    

        return redirect(url()->previous());
    }
}






