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
       
     
        return view('coins',compact('dataArray'));
    }
}
