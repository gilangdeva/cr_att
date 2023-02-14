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
            $data = new CityModel();
            $data->city_id = $response[$i]['id'];
            $data->city_name = $response[$i]['name'];
            $data->state_id = $response[$i]['province_id'];
            // Add Current Session ID to Input Creator & PIC
            $data->save();
        }      
    }
}
