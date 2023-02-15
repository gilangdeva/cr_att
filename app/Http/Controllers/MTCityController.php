<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\CityModel;

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
        $row_c = count(json_decode($response, true));

        for ($i=0; $i<$row_c; $i++){
            $city_id    = $response[$i]['id'];
            $city_name  = $response[$i]['name'];
            $state_id   = $response[$i]['province_id'];
            $xuser      = 1;
            
            // Add Current Session ID to Input Creator & PIC
            
            // Eloquent Insert Data
            CityModel::upsert([
                [
                    'city_id'   => $city_id, 
                    'city_name' => ucwords(strtolower($city_name)), 
                    'state_id'  => $state_id, 
                    'creator'   => $xuser, 
                    'pic'       => $xuser
                ],
            ],
                [
                    'city_id' // Protected Primary Key
                ], [
                    'city_name', // Change this field when on conflict
                    'state_id', 
                    'pic'
                ]
            );
        }
    }
}
