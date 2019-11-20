<?php

namespace App\Http\Controllers;
use App\Portofolio;
use App\Client;
use App\GambarPortofolio;
use App\GambarMobilePortofolio;
use Validator,Redirect,Response,File,DB;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{    
    public function index(Request $request)
    {   
        if($request->has('cari')){
            $data['portofolio'] = Portofolio::where('nama_aplikasi','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data = Portofolio::all();
        }                
        return view('portofolio.portofolio',['portofolio' => $data] );
    }

    public function create()
    {
        $client = Client::All();
    	return view('portofolio.addPortofolio')->with('client', $client);
    }

    public function store(Request $request)
    {            

        $rule = [
            'nama_aplikasi' => 'required|string',
            'tipe_website' => 'required',
            'platform' => '',
    		'domain_portofolio' => 'required',
            'status' => 'required',
            'description' => 'required',
            'id_client' => 'required',
            'tanggal_dibuat' => 'required',
            'gambar_website' => 'required',
            'gambar_website.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'gambar_mobile'  => 'required',
            // 'gambar_mobile.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	];
		$this->validate($request,$rule);

    	$input = $request->all();    	

        $portofolio = new Portofolio;
        $portofolio->nama_aplikasi      =   $input['nama_aplikasi'];
        $portofolio->tipe_website       =   $input['tipe_website'];
        $portofolio->platform           =   $input['platform'];
        $portofolio->domain_portofolio  =   $input['domain_portofolio'];
        $portofolio->status             =   $input['status'];
        $portofolio->description        =   $input['description'];
        $portofolio->id_client          =   $input['id_client'];
        $portofolio->tanggal_dibuat     =   $input['tanggal_dibuat'];        

        $status = $portofolio->save();

    	if ($status) {
                                        
            if($request->hasFile('gambar_website'))
            {                
                foreach($request->file('gambar_website') as $imageWebsite)
                {                    
                    $gambarPort = new GambarPortofolio();
                    $nameImage = $imageWebsite->getClientOriginalName();
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
                            $nameImageMobile = $imageMobile->getClientOriginalName();
                            $imageMobile->move(public_path().'/images/', $nameImageMobile);
                            $dataImage = $nameImageMobile;
                            $gambarMobilePort->portofolio_id = $portofolio->id;
                            $gambarMobilePort->gambar_mobile = $dataImage;
                            $gambarMobilePort->save();
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
        $client = Client::All();        
        
        $data = Portofolio::all()->find($id);
        return view('portofolio.addPortofolio', ['portofolio' => $data])->with('client', $client);
    }

    public function update(Request $request,$id)
    {
        $imageName = $request->hidden_image;
        $rule = [
            'nama_aplikasi' => 'required|string',
            'tipe_website' => 'required',
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
        $portofolio->nama_aplikasi      =   $input['nama_aplikasi'];
        $portofolio->tipe_website       =   $input['tipe_website'];
        $portofolio->platform           =   $input['platform'];
        $portofolio->domain_portofolio  =   $input['domain_portofolio'];
        $portofolio->status             =   $input['status'];
        $portofolio->description        =   $input['description'];
        $portofolio->id_client          =   $input['id_client'];
        $portofolio->tanggal_dibuat     =   $input['tanggal_dibuat'];        

        $status = $portofolio->update();

    	if ($status) {

            if($request->hasFile('gambar_website'))
            {                
                foreach($request->file('gambar_website') as $imageWebsite)
                {                    
                    $gambarPort = new GambarPortofolio();
                    $nameImage = $imageWebsite->getClientOriginalName();
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
                            $nameImageMobile = $imageMobile->getClientOriginalName();
                            $imageMobile->move(public_path().'/images/', $nameImageMobile);
                            $dataImage = $nameImageMobile;
                            $gambarMobilePort->portofolio_id = $portofolio->id;
                            $gambarMobilePort->gambar_mobile = $dataImage;
                            $gambarMobilePort->save();
                        }                            
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
}

