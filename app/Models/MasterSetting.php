<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterSetting extends Model
{
    use HasFactory;
    use FilterTrait;

    public $fillable = [
        'label',
        'type',
        'value',
        'display_type'
    ];

    public function scopeDisplayType($query, $displayType)
    {
        return $query->where('display_type', $displayType);
    }
}
