<?php

namespace App\Http\Controllers;

use App\Models\Sendmarkets;
use App\Models\Monthlyfoods;
use App\Models\Emails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- Join Tables Query
use Mail;
use PDF;

class SendmarketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser=auth()->user()->id;
        $sendmarkets = DB::table('sendmarkets')
        
        ->join('monthlyfoods', 'monthlyfoods.id', '=', 'sendmarkets.idmonthlymarket')
        ->join('users', 'users.id', '=', 'sendmarkets.users_id')
        ->where('users.id', $iduser)//<-- $var query
        ->select( 'sendmarkets.*', 
        'monthlyfoods.amount','monthlyfoods.date')
       
       ->get();

        if (count($sendmarkets)) { //CONDICION SI LA CONSULTA ES VALIDA O EXISTENTE  
        
        return view('sendmarket.index',compact('sendmarkets'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        else {
            $emails =DB::table('emails')
        ->join('users', 'users.id', '=', 'emails.iduser')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'emails.*', 'users.id','users.name')
       ->get();

        $monthlyfoods =DB::table('monthlyfoods')
        ->join('users', 'users.id', '=', 'monthlyfoods.users_id')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'monthlyfoods.*')
       ->get();
        return view('sendmarket.create',compact('emails','monthlyfoods'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emails =DB::table('emails')
        ->join('users', 'users.id', '=', 'emails.iduser')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'emails.*', 'users.id','users.name')
       ->get();

        $monthlyfoods =DB::table('monthlyfoods')
        ->join('users', 'users.id', '=', 'monthlyfoods.users_id')
        ->where('users.id', $iduser)//<-- $var query
       ->select( 'monthlyfoods.*')
       ->get();
        return view('sendmarket.create',compact('emails','monthlyfoods'));
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
            'idmonthlymarket' => 'required',
            'email' => 'required',
            'date' => 'required',
            'users_id' => 'required',
        ]);

        $data = $request->all();
        foreach ($data['email'] as $index => $dataNumber) {
            Sendmarkets::create([
               
                'idmonthlymarket' => $data['idmonthlymarket'],
                'email' => $data['email'][$index],
                'date' => $data['date'],
                'users_id' => $data['users_id'],
               
            ]);

           
           
        }
       
        
  $id=$request->idmonthlymarket; //CONSULTA RECIBIDA POR PARAMETROS CON REQUEST
  $datenow=$request->datenow;
  $iduser=auth()->user()->id;
  
  // retreive all records from db
  $sendmarkets =DB::table('sendmarkets')
  ->join('monthlyfoods', 'monthlyfoods.id', '=', 'sendmarkets.idmonthlymarket')
  ->where('sendmarkets.idmonthlymarket',$id)//<-- $var query
 ->select( 'sendmarkets.*', 'monthlyfoods.amount','monthlyfoods.date')
 ->get();
 
 $sum=  DB::table('monthlyfoods')->where('id',$id)->select('monthlyfoods.*')->sum('amount');
       

 
 
 $user = DB::table('users')->where('id', $iduser)->first();
  // share data to view
  view()->share('sendmarket.pdf',$sendmarkets);


// Email to users

  $pdf = PDF::loadView('sendmarket.pdf', ['sendmarkets' => $sendmarkets,
  'sum' => $sum, 'user' => $user ]);
        
  $fileName = 'Monthly-Market'.'-'.$user->name .'-'.$user->lastname. '-'.$datenow. '.' . 'pdf' ;
  
  // sending mail to users.
  $email=$request->email; //variable con emails array seleccionados
  // Send Email

  Mail::send('sendmarket.pdf', ['sendmarkets' => $sendmarkets,
  'sum' => $sum,  'user' => $user ],
   function($message)use($sendmarkets, $pdf,$fileName,$email ) {
      $message->to($email,$email)
              ->subject('Web App - '.$fileName)
              ->attachData($pdf->output(), $fileName);
  });
// end sending mail to users.

        
        return redirect()->route('sendmarket.index')
                        ->with('success','Data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sendmarkets  $sendmarkets
     * @return \Illuminate\Http\Response
     */
    public function show(Sendmarkets $sendmarket)
    {
        
        return view('sendmarket.show',compact('sendmarket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sendmarkets  $sendmarket
     * @return \Illuminate\Http\Response
     */
    public function edit(Sendmarkets $sendmarket)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sendmarkets  $sendmarket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sendmarkets $sendmarket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sendmarket  $sendmarket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sendmarkets $sendmarket)
    {
        $sendmarket->delete();
       
        return redirect()->route('sendmarket.index')
                        ->with('success','Data deleted successfully');
    }
}

