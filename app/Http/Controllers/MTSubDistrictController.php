<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\SubDistrictModel;

class MTSubDistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function subDistrictGetAPI($id){
        $source = 'https://www.emsifa.com/api-wilayah-indonesia/api/villages/';
        $format = '.json';

        $response = Http::get($source.base64_decode($id).$format);
        $row_c = count(json_decode($response, true));

        for ($i=0; $i<$row_c; $i++){
            $subd_id    = $response[$i]['id'];
            $subd_name  = $response[$i]['name'];
            $dist_id    = $response[$i]['district_id'];
            $xuser      = 1;
            
            // Add Current Session ID to Input Creator & PIC
            
            // Eloquent Insert Data
            SubDistrictModel::upsert([
                [
                    'sub_district_id'       => $subd_id, 
                    'sub_district_name' => $subd_name, 
                    'district_id'       => $dist_id, 
                    'creator'           => $xuser, 
                    'pic'               => $xuser
                ],
            ],
                [
                    'sub_district_id' // Protected Primary Key
                ], [
                    'sub_district_name', // Change this field when on conflict
                    'district_id', 
                    'pic'
                ]
            );
        }
    }
}
