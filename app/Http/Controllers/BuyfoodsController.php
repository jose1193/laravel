<?php

namespace App\Http\Controllers;

use App\Models\Buyfoods;
use App\Models\Monthlyfoods;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- Join Tables Query
use PDF;
use Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class BuyfoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) //RECIBIR VARIABLE POR PARAMETROS CON REQUEST
    {
        $id=$request->id; //CONSULTA RECIBIDA POR PARAMETROS CON REQUEST
        $buyfoods = DB::table('buyfoods')
        ->join('monthlyfoods', 'monthlyfoods.id', '=', 'buyfoods.idbudgetfood')
        ->where('buyfoods.idbudgetfood',$id)//<-- $var query
        ->select( 'buyfoods.*', 'monthlyfoods.amount','monthlyfoods.total_market','monthlyfoods.date')
       ->get();
       $sum=  DB::table('buyfoods')->where('idbudgetfood',$id)->select('buyfoods.*')->sum('price');
             
       $sum2=  DB::table('buyfoods')->where('idbudgetfood',$id)->select('buyfoods.*')->sum('total');
      
       $totalbudget = Monthlyfoods::find($id);
       
        if (count($buyfoods)) { //CONDICION SI LA CONSULTA ES VALIDA O EXISTENTE  
       
       return view('foods.index',compact('buyfoods','sum','sum2','id','totalbudget'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);

        } 
        
        else { //CONDICION SI LA CONSULTA NO ES VALIDA O NO EXISTE , REDIRECCION A OTRA VISTA
           
            $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
        return view('foods.create',compact('dataArray2','id'));
        
    }

       
    }

     // Generate PDF
     public function downloadPdf(Request $request) {
        
        $id=$request->id; //CONSULTA RECIBIDA POR PARAMETROS CON REQUEST
        $datenow=$request->datenow;
        $iduser=$request->iduser;
        
        // retreive all records from db
        $buyfoods =DB::table('buyfoods')
        ->join('monthlyfoods', 'monthlyfoods.id', '=', 'buyfoods.idbudgetfood')
        ->where('buyfoods.idbudgetfood',$id)//<-- $var query
       ->select( 'buyfoods.*', 'monthlyfoods.amount','monthlyfoods.total_market','monthlyfoods.date')
       ->get();
       
       $sum=  DB::table('buyfoods')->where('idbudgetfood',$id)->select('buyfoods.*')->sum('price');
             
       $sum2=  DB::table('buyfoods')->where('idbudgetfood',$id)->select('buyfoods.*')->sum('total');
       
       
       $user = DB::table('users')->where('id', $iduser)->first();
       $email=$user->email;
       
        // share data to view
        view()->share('foods.pdf',$buyfoods);
     
        $pdf = PDF::loadView('foods.pdf', ['buyfoods' => $buyfoods,
        'sum' => $sum, 'sum2' => $sum2, 'user' => $user ]);
              
        $fileName = 'budget-foods'.'-'.$user->name .'-'.$user->lastname. '-'.$datenow. '.' . 'pdf' ;
       
        // Send Email
        Mail::send('foods.pdf', ['buyfoods' => $buyfoods,
        'sum' => $sum, 'sum2' => $sum2, 'user' => $user ],
         function($message)use($buyfoods, $pdf,$fileName,$email ) {
            $message->to($email,$email)
                    ->subject('Web App - '.$fileName)
                    ->attachData($pdf->output(), $fileName);
        });

         // download PDF file with download method
        return $pdf->download($fileName);
        
      }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id=$request->id; //CONSULTA RECIBIDA POR PARAMETROS CON REQUEST
        $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
        return view('foods.create',compact('dataArray2','id'));
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
            'unitquantity' => 'required|max:30|min:1',
            'price' => 'required|max:30|min:1', 
            'total' => 'required|max:30|min:1', 
            'dollar' => 'required|max:30|min:1',
            'date' => 'required|max:30|min:3',
            'idbudgetfood' => 'required|max:30|min:1',
            'description' => 'required|max:30|min:3',
        ]);
       
      
       $monthlyfoods =  Monthlyfoods::find($request->idbudgetfood);
       $sum2=  DB::table('buyfoods')->where('idbudgetfood',$request->idbudgetfood)->select('buyfoods.*')->sum('total');
      
       $sumbudget= $sum2+Str::replace(',', '', $request->total);
       if($sumbudget > $monthlyfoods->total_market){
       
        return redirect()->route('foods.index',['id' => $request->idbudgetfood]) //VARIABLE CONSULTA POR PARAMETROS CON REQUEST
        ->with('error','This expense exceeded the total Budget limit.'); 
                    }
                    else
                    {

                        Buyfoods::create(
                            [
                                'unitquantity' => $request->unitquantity,
                                'price' => $request->price,
                                'total' => Str::replace(',', '', $request->total),
                                'dollar' => $request->dollar,
                                'date' => $request->date,
                                'idbudgetfood' => $request->idbudgetfood,
                                'description' => $request->description,
                              ]);
                       
             return redirect()->route('foods.index',['id' => $request->idbudgetfood]) //VARIABLE CONSULTA POR PARAMETROS CON REQUEST
                                        ->with('success','Data created successfully.'); 
                    }
                
    }
  

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buyfoods  $buyfoods
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Buyfoods $food)
    {
        $id=$request->id; //CONSULTA RECIBIDA POR PARAMETROS CON REQUEST
        return view('foods.show',compact('food','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buyfoods  $buyfoods
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Buyfoods $food)
    {
        $id = $request->id;
        $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
        return view('foods.edit',compact('food','dataArray2','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buyfoods  $buyfoods
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buyfoods $food)
    {
        $request->validate([
            'unitquantity' => 'required|max:30|min:1',
            'price' => 'required|max:30|min:1',
            'total' => 'required|max:30|min:1',
            'dollar' => 'required|max:30|min:1',
            'date' => 'required|max:30|min:3',
            'idbudgetfood' => 'required|max:30|min:1',
            'description' => 'required|max:30|min:3',
        ]);
      
        $food->update( [
            'unitquantity' => $request->unitquantity,
            'price' => $request->price,
            'total' => Str::replace(',', '', $request->total),
            'dollar' => $request->dollar,
            'date' => $request->date,
            'idbudgetfood' => $request->idbudgetfood,
            'description' => $request->description,
          ]);
      
        return redirect()->route('foods.index',['id' => $request->idbudgetfood]) //VARIABLE CONSULTA POR PARAMETROS CON REQUEST
                        ->with('success','Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buyfoods  $buyfoods
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Buyfoods $food)
    {
        $id = $request->id;
        $food->delete();
       
        return redirect()->route('foods.index', ['id' => $id])
                        ->with('success','Data deleted successfully');
    }

}
