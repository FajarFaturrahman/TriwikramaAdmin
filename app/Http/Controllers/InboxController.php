<?php

namespace App\Http\Controllers;
use App\Inbox;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    public function index(){
        $data['message'] = Inbox::orderBy('id','asc')->paginate(8);  
        return view('inbox',$data);
    }

    public function edit($id){

        $where = array('id' => $id);
        $message  = Inbox::where($where)->first();
 
        return Response::json($message);
    }

    public function destroy($id){

        $message = Inbox::where('id',$id)->delete();
   
        return Response::json($message);

    }


}
