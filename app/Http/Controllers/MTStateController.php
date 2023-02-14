<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\StateModel;

class MTStateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function stateGetAPI($id){
        $source = 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces';
        $format = '.json';

        $response = Http::get($source.base64_decode($id).$format);
        $row_c = count(json_decode($response, true));

        for ($i=0; $i<$row_c; $i++){
            $data = new StateModel();
            $data->state_id = $response[$i]['id'];
            $data->state_name = $response[$i]['name'];
            // Add Current Session ID to Input Creator & PIC
            $data->save();
        }      
    }
}
