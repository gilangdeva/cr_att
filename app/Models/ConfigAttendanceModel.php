<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigAttendanceModel extends Model
{
    use HasFactory;

    protected $table = 'CF002';
    protected $primaryKey = 'att_config_id';

    protected $fillable = [
        'check_in_before', 'status', 'creator', 'pic'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
