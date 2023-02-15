<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\DistrictModel;

class MTDistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function districtGetAPI($id){
        $source = 'https://www.emsifa.com/api-wilayah-indonesia/api/districts/';
        $format = '.json';
        
        $response = Http::get($source.base64_decode($id).$format);
        $row_c = count(json_decode($response, true));

        for ($i=0; $i<$row_c; $i++){
            $dist_id    = $response[$i]['id'];
            $dist_name  = $response[$i]['name'];
            $city_id    = $response[$i]['regency_id'];
            $xuser      = 13;
            
            // Add Current Session ID to Input Creator & PIC
            
            // Eloquent Insert Data
            DistrictModel::upsert([
                [
                    'district_id'   => $dist_id, 
                    'district_name' => $dist_name, 
                    'city_id'       => $city_id, 
                    'creator'       => $xuser, 
                    'pic'           => $xuser
                ],
            ],
                [
                    'district_id' // Protected Primary Key
                ], [
                    'district_name', // Change this field when on conflict
                    'city_id', 
                    'pic'
                ]
            );
        }
    }
}
