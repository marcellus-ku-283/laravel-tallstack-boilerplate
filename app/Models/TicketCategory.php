<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketCategory extends Model
{
    use HasFactory;
    use FilterTrait;

    public $fillable = [
        'name',
        'status'
    ];

    public $casts = [
        'status' => 'bool'
    ];

    public $exactFilters = [
        'name'
    ];

    public $scopeFilters = [
        'search'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'LIKE', "%$search%");
    }

    public function scopeName($query, $name)
    {
        return $query->where('name', $name);
    }
}
