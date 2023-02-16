<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ConfigAttendanceModel;

class ConfigAttendanceController extends Controller
{
    public function index(){
        $cfg = ConfigAttendanceModel::where('status', '=', 1)->first();

        return view('church.config.attendance', [
            'data' => $cfg
        ]);
    }

    public function insertConfigAttendance(Request $request){
        $id           = DB::select("SELECT att_config_id FROM vid_cf002_key");
        $check_in_val = $request->check_in_before;
        $xuser        = 1;

        ConfigAttendanceModel::insert([
            [
                'att_config_id'   => $id[0]->att_config_id,
                'check_in_before' => $check_in_val,
                'status'          => 1,
                'creator'         => $xuser,
                'created_at'      => date('Y-m-d H:i:s', strtotime('+0 hours')),
                'pic'             => $xuser,
                'updated_at'      => date('Y-m-d H:i:s', strtotime('+0 hours'))
            ],
        ],
            [
                'att_config_id' // Protected Primary Key
            ], [
                'check_in_before', // Change this field when on conflict
                'pic'
            ]
        );

        ConfigAttendanceModel::where('att_config_id','<>', $id[0]->att_config_id)
            ->update(['status' => 0, 'pic' => $xuser]);

        return Redirect('/config/att');
    }
}
