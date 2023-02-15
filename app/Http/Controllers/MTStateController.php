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

    public function stateGetAPI(){
        $source = 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces';
        $format = '.json';

        $response = Http::get($source.$format);
        $row_c = count(json_decode($response, true));

        for ($i=0; $i<$row_c; $i++){
            $state_id    = $response[$i]['id'];
            $state_name  = $response[$i]['name'];
            $xuser      = 2;

            // Add Current Session ID to Input Creator & PIC

            // Eloquent Insert Data
            StateModel::upsert([
                [
                    'state_id'          => $state_id,
                    'state_name'        => ucwords(strtolower($state_name)),
                    'creator'           => $xuser,
                    'pic'               => $xuser
                ],
            ],
                [
                    'state_id' // Protected Primary Key
                ], [
                    'state_name', // Change this field when on conflict
                    'pic'
                ]
            );
        }
    }
}
