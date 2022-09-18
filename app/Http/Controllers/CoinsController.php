<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class CoinsController extends Controller
{
    public function index()
    {

        $response = Http::get('https://www.dolarsi.com/api/api.php?type=valoresprincipales'); // <-- API COINS
        $dataArray=$response->json();
       
        $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');
        $dataArray2=$response2->json();
     
        return view('coins',compact('dataArray','dataArray2'));
    }
}
