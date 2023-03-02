<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    use FilterTrait;

    public $fillable = [
        'uuid',
        'user_id',
        'subject',
        'message',
        'status'
    ];

    private $exactFilters = [
        'status'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('subject', 'LIKE', "%$search%")
            ->orWhere('message', 'LIKE', "%$search%");
    }

    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
