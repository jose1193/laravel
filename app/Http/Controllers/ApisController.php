<?php

namespace App\Http\Controllers;

use App\Models\Apis;
use Illuminate\Http\Request;

use DB;
class ApisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser=auth()->user()->id;
        $apisurl =DB::table('apis')
        ->join('users', 'users.id', '=', 'apis.iduser')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'apis.*','users.name')
       ->get();

       if (count($apisurl)) { //CONDICION SI LA CONSULTA ES VALIDA O EXISTENTE  
       
      
        return view('apisurl.index',compact('apisurl'))
                ->with('i', (request()->input('page', 1) - 1) * 5);

       }
       else
       {
        return view('apisurl.create');
    }
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apisurl.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameapi' => 'required|max:100|min:6',
            'urlapi' => 'required|max:150|min:6|unique:apis',
            'country' => 'required|max:20|min:3',
            'flag' => 'required|max:150|min:6',
            'provider' => 'required|max:20|min:3',
            'iduser' => 'required',
            
        ]);
      
        Apis::create($request->all());
       
        return redirect()->route('apisurl.index')
                        ->with('success','Api created successfully.');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apis  $apisurl
     * @return \Illuminate\Http\Response
     */
    public function show(Apis $apisurl)
    {
        return view('apisurl.show',compact('apisurl'));
    }
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apis  $apisurl
     * @return \Illuminate\Http\Response
     */
    public function edit(Apis $apisurl)
    {
        return view('apisurl.edit',compact('apisurl')); // <-- variable $Apis a consultar
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apis  $Api
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apis $apisurl)
    {
        $request->validate([
            'nameapi' => 'required|max:100|min:6',
            'urlapi' => 'required|max:150|min:6',
            'country' => 'required|max:20|min:3',
            'flag' => 'required|max:150|min:6',
            'provider' => 'required|max:20|min:3',
            'iduser' => 'required',
           
        ]);
      
        $apisurl->update($request->all());
      
        return redirect()->route('apisurl.index')
                        ->with('success','Api updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apis  $apisurl
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apis $apisurl)
    {
        $apisurl->delete();
       
        return redirect()->route('apisurl.index')
                        ->with('success','Api deleted successfully');
    }
}
