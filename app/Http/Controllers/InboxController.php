<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view('inbox',$data);
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

    public function search(Request $request)
    {
        if($request->ajax())
        {           
           $query = $request->search;
           if($query != '')
           {
                $data = DB::table('inbox')
                ->where('pengirim', 'like', '%'.$query.'%')
                ->get();
           }
           else
           {
            $data = DB::table('inbox')              
              ->get();
           }                                           

            echo json_encode($data);
        }          
    }
}
