<?php

namespace App\Http\Controllers;
use Validator;
use App\Inbox;

use Illuminate\Http\Request;

class SitesContactUsController extends Controller
{
    public function index(){
        $data = Inbox::all();
        return view('triwikrama-sites.sites_contactUs', $data);
    }

    public function store(Request $request){
        $rules = array(
            'pengirim'      => 'required',
            'email'         => 'required',
            'pesan'    => 'required',
        );

        $error = Validator::make($request->all(), $rules);

        $data = new Inbox;
        $data->pengirim = $request->name;
        $data->email    = $request->email;
        $data->pesan    = $request->message;
        $data->save();

        return redirect(url()->previous());
    }


}
