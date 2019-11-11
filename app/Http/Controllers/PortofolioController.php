<?php

namespace App\Http\Controllers;
use App\Portofolio;
use App\Client;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{    
    public function index()
    {
        $data['portofolio'] = \DB::table('portofolio')->join('client', 'portofolio.id_client', '=', 'client.id')->get();
        return view('portofolio.portofolio', $data);
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
    	];
		$this->validate($request,$rule);

    	$input = $request->all();
    	// unset($input['_token']);
        // $status = \DB::table('t_kantor')->insert($input);

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
    		return redirect('/portofolio')->with('success', 'Data berhasil ditambahkan');
    	}else{
    		return redirect('/portofolio/create')->with('error', 'Data gagal ditambahkan');
    	}
    }

    public function show($id)
    {
        $data['portofolio'] = \DB::table('portofolio')->find($id);
        return view('portofolio.detailPortofolio', $data);
    }

    public function edit(Request $request, $id)
    {
        $client = Client::All();        
        
        $data['portofolio'] = \DB::table('portofolio')->find($id);
        return view('portofolio.addPortofolio', $data)->with('client', $client);;
    }

    public function update(Request $request,$id)
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
    	];
		$this->validate($request,$rule);

    	$input = $request->all();
    	// unset($input['_token']);
        // $status = \DB::table('t_kantor')->insert($input);

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

