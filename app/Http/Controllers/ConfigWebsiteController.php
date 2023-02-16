<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigWebsiteModel;
use Illuminate\Support\Facades\DB;

class ConfigWebsiteController extends Controller
{
    public function index(){
        return view('church.config.website');
    }

    public function inputconfigweb(Request $request)
    {

        $id_config = DB::select('SELECT config_id FROM vid_cf001_key');

        // $validatedData = $request->validate([
        //     'sys_name'      => 'required',
        //     'sys_surname'   => 'required',
        //     'footname'      => 'required',
        //     'description'   => 'required',
        //     // 'icon'          => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     // 'logo'          => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $iconName = time().'.'.$request->icon->extension();
        // $request->icon->move(public_path('images'), $iconName);

        // $logoName = time().'.'.$request->logo->extension();
        // $request->logo->move(public_path('images'), $logoName);

        $websiteConfig = new ConfigWebsiteModel;
        $websiteConfig->config_id   = $request->config_id;
        $websiteConfig->sys_name    = $request->sys_name;
        $websiteConfig->sys_surname = $request->sys_surname;
        $websiteConfig->footname    = $request->footname;
        $websiteConfig->description = $request->description;

        // $websiteConfig->icon        = $iconName;
        // $websiteConfig->logo        = $logoName;
        $websiteConfig->save();

    }
}
