<?php

namespace App\Http\Controllers;

use App\Models\Monthlyfoods;
use Illuminate\Http\Request;

class MonthlyfoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monthlyfoods = Monthlyfoods::latest()->get();
        if (count($monthlyfoods)) {
        return view('monthlyfood.index',compact('monthlyfoods'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }else
        {

            return view('monthlyfood.create');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('monthlyfood.create');
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

        Monthlyfoods::create( [
            'amount' => $request->amount,
            
            'date' => $request->date,
            
            'year' => $request->year,
            'month' => $request->month,
            'users_id' => auth()->user()->id,
          ]);
       
        return redirect()->route('monthlyfood.index')
                        ->with('success','Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monthlyfoods  $monthlyfoods
     * @return \Illuminate\Http\Response
     */
    public function show(Monthlyfoods $monthlyfood)
    {
        return view('monthlyfood.show',compact('monthlyfood'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monthlyfoods  $monthlyfoods
     * @return \Illuminate\Http\Response
     */
    public function edit(Monthlyfoods $monthlyfood)
    {
        return view('monthlyfood.edit',compact('monthlyfood'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monthlyfoods  $monthlyfoods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monthlyfoods $monthlyfood)
    {
        $request->validate([
            'amount' => 'required|max:20|min:2',
         'date' => 'required',
            
        ]);
      
        $monthlyfood->update($request->all());
       
      
        return redirect()->route('monthlyfood.index')
                        ->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monthlyfoods  $monthlyfoods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monthlyfoods $monthlyfood)
    {
        $monthlyfood->delete();
       
        return redirect()->route('monthlyfood.index')
                        ->with('success','Data deleted successfully');
    }
}
