<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserDevice extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'int_udid',
        'device_type',
        'device_token',
        'is_login'
    ];
}
