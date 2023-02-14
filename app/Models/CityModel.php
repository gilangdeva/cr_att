<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;

    protected $table = 'MT004';
    protected $primaryKey = 'city_id';
    
    protected $fillable = [
        'city_name','state_id','creator', 'pic'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
