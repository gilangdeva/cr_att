<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigWebsiteModel extends Model
{
    use HasFactory;

    protected $table = 'CF001';
    protected $primaryKey = 'config_id';

    protected $fillable = [
        'sys_name', 'sys_surname', 'sys_desc', 'icon', 'logo', 'foot_name', 'status', 'creator', 'pic'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
