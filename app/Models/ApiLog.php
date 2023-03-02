<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    use HasFactory;

    public $fillable = [
        'source_ip',
        'url',
        'request_payload',
        'response_payload',
        'status_code',
        'created_at',
        'updated_at'
    ];

    public $casts = [
        'request_payload' => 'array',
        'response_payload' => 'array'
    ];
}
