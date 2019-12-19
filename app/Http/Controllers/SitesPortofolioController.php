<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Portofolio;
use App\TipeAplikasiPortofolio;
use App\GambarPortofolio;
class SitesPortofolioController extends Controller
{
    public function index(){

        $data = Portofolio::take(8)->orderBy('portofolio_highlight','desc')->orderBy('id','desc')->get();
        return view('triwikrama-sites.sites_portofolio', ['portofolio' => $data]);
    }

    public function show($id){        
        if(request()->ajax())
        {
        
            $output = "";
            $ambilFoto = GambarPortofolio::where('portofolio_id',$id)->get();
            $total_row = $ambilFoto->count();
            foreach($ambilFoto as $foto)
            {
                $output .='<div class="item"><img src="/resizedImages/'. $foto->gambar_website .'" alt=""></div>';
            }
            $data= Portofolio::all()->find($id);
            return response()->json(['data' => $data, 'ambilFoto' =>$output, 'jumlah' =>$total_row]);
        }        
    }

    public function more_data(Request $request)
    {
        if($request->ajax()){
            $skip=$request->skip;
            $take=4;
            $portofolio=Portofolio::skip($skip)->take($take)->get();
            return response()->json($portofolio);
        }else{
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function filter(Request $request, $status = ""){
        $output = "";
        if($status == "semua"){
            $data = \DB::table('portofolio')->orderBy('id','asc')->take(8)->get();
        } else{                
            $data = \DB::table('portofolio');
        }
        foreach($data as $dataFilter){

                $output .= '<div class="col-md-3 col-sm-4 col-xs-12 p-col list mt-5">
                            <a href="#" id="show" data-id="'. $dataFilter->id .'">';
                                if($dataFilter->platform == "Mobile Application"){
                                    $output .= '<div class="portfolio-mobile">';
                                        $output .= '<img src="{{ URL::to("/") }}/resizedImages/{{ '.$dataFilter->gambar_mobile->take(1).' }}" alt="">';
                                    $output .= '</div>';
                                } else{
                                    $output .= '<div class="portfolio-item">';
                                        $output .= '<img src="{{ URL::to("/") }}/resizedImages/{{ '.$dataFilter->gambar_website->take(1).' }}" alt="">';
                                    $output .= '</div>';
                                }
                $output .= '</a>';                
                $output .= '<span class="mt-4">'. $dataFilter->nama_aplikasi .'</span>';            
                $output .= '</div>';                  
        }

        return Response::json($data);          
    }
}
