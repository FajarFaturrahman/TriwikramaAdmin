<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Inbox;
class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data['message'] = Inbox::where('pengirim','LIKE','%'.$request->cari.'%')
                        ->orWhere('email','LIKE','%'.$request->cari.'%')
                        ->paginate(8);        
        }else{
            $data['message'] = \DB::table('inbox')->orderBy('id','desc')->paginate(8);  
        }                    
         return view('inbox', $data);
    }

    public function filter(Request $request, $status = ""){
            $filter = $request->filter;
            $filter = $status;
            $output = "";
            if($status != ""){
                $data = Inbox::where('status', $status)->get();
            } else{
                $data = \DB::table('inbox')->orderBy('id','desc')->get();
            }
            foreach($data as $dataFilter){

                $output .= '<div class="row justify-content-center mt-2" id="message_id_'. $dataFilter->id .'"><div class="rounded-left" id="left-box"></div><div class="card col-md-11 rounded-right" id="inboxCard"><div class="card-body"><div class="row"><div class="col-md-10"><p class="my-auto"><strong>'. $dataFilter->pengirim .'</strong></p><p class="my-auto">'. $dataFilter->email .'</p></div><div class="col-md-2"><div class="row float-right"><a class="btn btn-light mr-3 mt-1 rounded-circle" id="show-message" data-id="'. $dataFilter->id .'"><img class="img-fluid mx-auto my-auto" src="/img/IconTriwikramaAppAdmin/read.png" alt="" width="20px" heigth="20px"></a><a class="btn btn-danger mt-1 rounded-circle" id="delete-message" data-id="'. $dataFilter->id .'"><img class="img-fluid mx-auto my-auto" src="/img/IconTriwikramaAppAdmin/white/rubbish-bin2.png" alt="" width="20px" heigth="20px"></a></div></div></div></div></div></div>';
            
            }

            return Response::json($output);          
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \DB::table('inbox')->find($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \DB::table('inbox')->where('id',$id)->delete();
   
        return response()->json(['success' => 'Record has been deleted successfully!']);
    }
}
