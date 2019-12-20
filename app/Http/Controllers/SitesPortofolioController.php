<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Portofolio;
use App\TipeAplikasiPortofolio;
use App\GambarPortofolio;
use App\GambarMobilePortofolio;
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
            $output2 = "";
            $output3 = "";
            $output4 = "";
            $ambilFoto = GambarPortofolio::where('portofolio_id',$id)->get();
            $tipeApp = TipeAplikasiPortofolio::where('portofolio_id',$id)->get();
            $ambilFotoMobile = GambarMobilePortofolio::where('portofolio_id',$id)->get();
            $total_row = $ambilFoto->count();
            $total_row2 = $ambilFotoMobile->count();
            foreach($ambilFoto as $foto)
            {
                $output .='<div class="item"><img src="/resizedImages/'. $foto->gambar_website .'" alt=""></div>';
            }

            foreach($ambilFotoMobile as $fotoMobile)
            {
                $output2 .='<div class="item"><img src="/resizedImages/'. $fotoMobile->gambar_mobile .'" alt=""></div>';
            }

            foreach($ambilFotoMobile->take(1) as $fotomr)
            {
                $output4 .='<img src="/resizedImages/'. $fotomr->gambar_mobile .'" alt="">';
            }

            foreach($tipeApp as $tipeAplikasi)
            {
                $output3 .='<p class="ml-3">' . $tipeAplikasi->tipe_website. '</p>';
            }
            $data= Portofolio::all()->find($id);
            return response()->json(['data' => $data, 'ambilFoto' =>$output, 'jumlah' =>$total_row, 'jumlah2' =>$total_row2, 'ambilFotoMobile' =>$output2, 'fotomr' =>$output4,'tipeApp' =>$output3]);
        }        
    }

    public function more_data(Request $request)
    {
        if($request->ajax()){
            $skip=$request->skip;
            $take=4;
            $portofolio=Portofolio::skip($skip)->take($take)->orderBy('portofolio_highlight','desc')->orderBy('id','desc')->get();
            return response()->json($portofolio);
        }else{
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function filter(Request $request, $status = ""){
        $output = "";
        if($status == "semua"){
            $data = \DB::table('portofolio')->orderBy('id','asc')->get();
        } else{                
            $data = \DB::table('portofolio')
            ->leftJoin('gambar_portofolio', 'gambar_portofolio.portofolio_id', '=', 'portofolio.id')
            ->leftJoin('gambar_mobile_portofolio', 'gambar_mobile_portofolio.portofolio_id', '=', 'portofolio.id')
            ->leftJoin('tipe_aplikasi_portofolio', 'tipe_aplikasi_portofolio.portofolio_id', '=', 'portofolio.id')
            ->select('portofolio.id', 'portofolio.nama_aplikasi', 'portofolio.platform', 'gambar_portofolio.gambar_website', 'gambar_mobile_portofolio.gambar_mobile', 'tipe_aplikasi_portofolio.tipe_website')
            ->where(['tipe_aplikasi_portofolio.tipe_website' => $status])
            ->groupBy('portofolio.nama_aplikasi')
            ->get();


        }
        foreach($data as $dataFilter){

                $output .= '<div class="p-col list mt-5 mr-3">';
                            if($dataFilter->platform == "Mobile Application"){
                                $output .= '<a href="#" id="show2" data-id="'. $dataFilter->id .'">';
                                    $output .= '<div class="portfolio-mobile">';
                                        $output .= '<img src="http://127.0.0.1:8000/resizedImages/'.$dataFilter->gambar_mobile.'" alt="">';
                                    $output .= '</div>';
                                $output .= '</a>';
                            }elseif($dataFilter->platform == "Responsive Web Application"){
                                $output .= '<a href="#" id="show" data-id="'. $dataFilter->id .'">';
                                    $output .= '<div class="portfolio-item">';
                                        $output .= '<img src="http://127.0.0.1:8000/resizedImages/'.$dataFilter->gambar_website.'" alt="">';
                                    $output .= '</div>';
                                $output .= '</a>';
                            }else{
                                $output .= '<a href="#" id="show" data-id="'. $dataFilter->id .'">';
                                    $output .= '<div class="portfolio-item">';
                                        $output .= '<img src="http://127.0.0.1:8000/resizedImages/'.$dataFilter->gambar_website.'" alt="">';
                                    $output .= '</div>';
                                $output .= '</a>';
                            }
                    $output .= '</a>';                
                    $output .= '<span class="mt-4">'. $dataFilter->nama_aplikasi .'</span>';            
                $output .= '</div>';                  
        }

        return Response::json($output);          
    }
}
