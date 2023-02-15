<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateModel extends Model
{
    use HasFactory;

    protected $table = 'MT003';
    protected $primaryKey = 'state_id';

    protected $fillable = [
        'state_name','creator', 'pic'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
