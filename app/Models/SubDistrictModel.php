<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrictModel extends Model
{
    use HasFactory;

    protected $table = 'MT006';
    protected $primaryKey = 'sub_district_id';

    protected $fillable = [
        'sub_district_name','distric_id','creator', 'pic'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
