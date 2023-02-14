<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MTCityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cityGetAPI($id){
        $source = 'https://www.emsifa.com/api-wilayah-indonesia/api/regencies/';
        $format = '.json';

        $response = Http::get($source.base64_decode($id).$format);

        // Insert Into City Table
        
        return $response;
    }
}
