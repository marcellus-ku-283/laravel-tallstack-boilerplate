<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSecurityQuestionAnswer extends Model
{
    public $fillable = [
        'user_id',
        'question_id',
        'answer',
        'created_at',
        'updated_at'
    ];
}
