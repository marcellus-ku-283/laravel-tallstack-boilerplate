<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOTP extends Model
{
    use HasFactory;

    public $table = 'user_otps';

    public $fillable = [
        'user_id',
        'phone',
        'code',
        'code_for',
        'used_at',
        'expired_at',
        'created_at',
        'created_at'
    ];

    public $casts = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp',
        'used_at' => 'timestamp',
        'expired_at' => 'timestamp',
    ];


}
