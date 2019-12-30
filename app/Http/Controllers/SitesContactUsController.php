<?php

namespace App\Http\Controllers;
use Validator;
use App\Inbox;
use App\Rules\Captcha;
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
            'g-recaptcha-response' => 'required|captcha',
        );

        $error = Validator::make($request->all(), $rules);

        $token = $request->input('g-recaptcha-response');

        if(strlen($token) > 0){
            $data = new Inbox;
            $data->pengirim = $request->name;
            $data->email    = $request->email;
            $data->pesan    = $request->message;
            $data->save();

            return redirect(url()->previous());
        }else{
            return redirect('/contact' )->with('error', 'Please submit the recaptcha to submit the form');
        }

        

        
    }


}
