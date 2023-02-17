<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Models\ConfigWebsiteModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use File;
use Crypt;
use Redirect;
use DateTime;
use Intervention\Image\ImageManagerStatic as Image;

class ConfigWebsiteController extends Controller
{
    private $dimensions = [100, 200, 300];

    public function index(){
        return view('church.config.website');
    }

    public function inputconfigweb(Request $request)
    {
        // Mendapatkan file yang diunggah
        $iconFile = $request->file('icon');
        $logoFile = $request->file('logo');

        // Menyimpan file ke dalam storage
        $iconPath = $iconFile->store('public/assets/images');
        $logoPath = $logoFile->store('public/assets/images');

        if ($iconPath <> '') {
            $this->validate($request, [
                'icon' => 'image|mimes:jpg,png,jpeg'
            ]);
        $file = $iconPath;
        // create filename with merging the timestamp and unique ID
        $name_icon = Carbon::now()->timestamp . '_' . uniqid() . '.'. pathinfo($file, PATHINFO_EXTENSION);
        }

        if ($logoPath <> '') {
            $this->validate($request, [
                'logo' => 'image|mimes:jpg,png,jpeg'
            ]);
        $file = $logoPath;
        // create filename with merging the timestamp and unique ID
        $name_logo = Carbon::now()->timestamp . '_' . uniqid() . '.'. pathinfo($file, PATHINFO_EXTENSION);
        }


        // Mendapatkan URL untuk file yang disimpan
        $iconUrl = $name_icon;
        $logoUrl = $name_logo;

        $id             = DB::select("SELECT config_id FROM vid_cf001_key");
        $sys_name       = $request->sys_name;
        $sys_surname    = $request->sys_surname;
        $footname       = $request->footname;
        $sys_desc       = $request->sys_desc;
        $xuser          = 1;

        ConfigWebsiteModel::insert([
            [
                'config_id'       => $id[0]->config_id,
                'sys_name'        => $sys_name,
                'sys_surname'     => $sys_surname,
                'foot_name'       => $footname,
                'sys_desc'        => $sys_desc,
                'icon'            => $iconUrl,
                'logo'            => $logoUrl,
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
                'sys_name', // Change this field when on conflict
                'sys_surname',
                'footname',
                'icon_url',
                'logo_url',
                'sys_desc',
                'pic'
            ]
        );

        ConfigWebsiteModel::where('config_id','<>', $id[0]->config_id)
            ->update(['status' => 0, 'pic' => $xuser]);

        return Redirect('/config/web');

    }
}
