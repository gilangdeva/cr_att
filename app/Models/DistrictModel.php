<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictModel extends Model
{
    use HasFactory;

    protected $table = 'MT005';
    protected $primaryKey = 'district_id';

    protected $fillable = [
        'district_name', 'state_id', 'creator', 'pic'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
