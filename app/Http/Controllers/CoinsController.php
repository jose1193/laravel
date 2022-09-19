<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/** IMPORT CLASS SQL TABLE APIS **/
use App\Models\Apis;
/** END IMPORT CLASS SQL TABLE APIS **/

class CoinsController extends Controller
{
    public function index()
    {
         $apiss = Apis::select('urlapi')->orderBy('urlapi', 'desc')->limit(1)->get();
               
        
        $api = 'https://www.dolarsi.com/api/api.php?type=valoresprincipales'; /** <-- SQL TABLE Apis, FOREACH **/
        
        $response = Http::get($api); // <-- API COINS
        $dataArray=$response->json();
       
        $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
     
        return view('coins',compact('dataArray','dataArray2','apiss'));
    }
}
