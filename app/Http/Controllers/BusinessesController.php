<?php

namespace App\Http\Controllers;

use App\Models\Businesses;
use Illuminate\Http\Request;
use DB;

class BusinessesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $businesses = Businesses::latest()->get();
        if (count($businesses)) {
        return view('businesses.index',compact('businesses'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        else {
            return view('businesses.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('businesses.create');
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
            'businessname' => 'required|unique:businesses|max:20|min:3',
           
        ]);
      
        Businesses::create([
            'businessname' => $request->businessname,
            
            'user_id' => auth()->user()->id,
            
          ]);
       
        return redirect()->route('businesses.index')
                        ->with('success','Business created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Businesses  $businesses
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Businesses $businesses)
    {
        $id=$request->id;
        $businesses =DB::table('businesses')
       ->where('id', $id)//<-- $var query
       ->get();
        return view('businesses.show',compact('businesses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Businesses  $businesses
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Businesses $businesses)
    {
        $id=$request->id;
        $businesses =DB::table('businesses')
       ->where('id', $id)//<-- $var query
       ->get(); 
        return view('businesses.edit',compact('businesses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Businesses  $businesses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Businesses $businesses)
    {
        $request->validate([
            'businessname' => 'required|unique:businesses|max:20|min:3',
           
        ]);
        $businesses = Businesses::find($request->id);
        $businesses->update([
            'businessname' => $request->businessname,
           ]);
       
      
        return redirect()->route('businesses.index')
                        ->with('success','Business updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Businesses  $businesses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Businesses $businesses)
    {
        $businesses = Businesses::find($request->id)->delete();
       
        return redirect()->route('businesses.index')
                        ->with('success','Business deleted successfully');
    }
}
