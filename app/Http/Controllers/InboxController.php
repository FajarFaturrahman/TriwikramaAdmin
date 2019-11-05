<?php

namespace App\Http\Controllers;
use App\Inbox;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index(){
        $data['inbox'] = \DB::table('inbox')->get();
        return view('inbox', $data);
    }


}
