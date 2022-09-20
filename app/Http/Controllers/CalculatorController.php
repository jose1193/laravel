<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http; // <-- guzzle query api
use Illuminate\Http\Request;


class CalculatorController extends Controller
{
    public function index()
    {
        
       
        $response2 = Http::get('https://api.bluelytics.com.ar/v2/latest');// <-- API COINS
        $dataArray2=$response2->json();
     
        return view('calculator',compact('dataArray2'));
    }
}