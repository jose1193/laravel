<?php

namespace App\Http\Controllers;

use App\Models\Monthlyfood;
use Illuminate\Http\Request;

class MonthlyfoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monthlyfood = Monthlyfood::latest()->get();
      
        return view('market.index',compact('monthlyfood'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('market.create');
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
            'amount' => 'required|max:20|min:2',
         'date' => 'required',
            
        ]);

        Monthlyfood::create( [
            'amount' => $request->amount,
            
            'date' => $request->date,
            
            'year' => $request->year,
            'month' => $request->month,
            'users_id' => auth()->user()->id,
          ]);
       
        return redirect()->route('market.index')
                        ->with('success','Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monthlyfood  $monthlyfood
     * @return \Illuminate\Http\Response
     */
    public function show(Monthlyfood $monthlyfood)
    {
        return view('market.show',compact('monthlyfood'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monthlyfood  $monthlyfood
     * @return \Illuminate\Http\Response
     */
    public function edit(Monthlyfood $monthlyfood)
    {
        return view('market.edit',compact('monthlyfood'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monthlyfood  $monthlyfood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monthlyfood $monthlyfood)
    {
        $request->validate([
            'amount' => 'required|max:20|min:2',
         'date' => 'required',
            
        ]);
      
        $monthlyfood->update($request->all());
       
      
        return redirect()->route('market.index')
                        ->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monthlyfood  $monthlyfood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monthlyfood $monthlyfood)
    {
        $monthlyfood->delete();
       
        return redirect()->route('market.index')
                        ->with('success','Data deleted successfully');
    }
}
