<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigAttendanceController extends Controller
{
    public function index(){
        return view('church.config.attendance');
    }
}
