<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
class SitesClientController extends Controller
{
    public function index(){

        $data = Client::take(12)->orderBy('client_highlight','desc')->orderBy('id','desc')->get();
        return view('triwikrama-sites.sites_client', ['client' => $data]);
    }

    function more_data(Request $request){
        if($request->ajax()){
            $skip=$request->skip;
            $take=6;
            $client=Client::skip($skip)->take($take)->orderBy('client_highlight','desc')->orderBy('id','desc')->get();
            return response()->json($client);
        }else{
            return response()->json('Direct Access Not Allowed!!');
        }
    }
}
