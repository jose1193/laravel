<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Monthlyfoods;
use Illuminate\Http\Request;
use DataTables;// import DATATABLES
use Illuminate\Support\Str;
use DB;
class MonthlyfoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser=auth()->user()->id;
        $monthlyfoods =DB::table('monthlyfoods')
        ->join('users', 'users.id', '=', 'monthlyfoods.users_id')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'monthlyfoods.*')
       ->get();
       $sum=  DB::table('monthlyfoods')->where('users_id',$iduser)->select('monthlyfoods.*')->sum('amount');
             
       $sum2=  DB::table('monthlyfoods')->where('users_id',$iduser)->select('monthbudgets.*')->sum('total_market');
        if (count($monthlyfoods)) {
        return view('monthlyfood.index',compact('monthlyfoods','sum','sum2'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }else
        {

            $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
            $dataArray2=$response2->json();
            return view('monthlyfood.create',compact('dataArray2'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
        return view('monthlyfood.create',compact('dataArray2'));
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
            'dollar_rate' => $request->dollar_rate,
            'total_market' => Str::replace(',', '', $request->total_market)
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
         
            
        ]);
      
        $monthlyfood->update([
            'amount' => $request->amount,
            
            
            'users_id' => auth()->user()->id,
            'dollar_rate' => $request->dollar_rate,
            'total_market' => Str::replace(',', '', $request->total_market)
          ]);
       
      
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
