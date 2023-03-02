<?php

namespace App\Models;

use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory;
    use FilterTrait;

    public $fillable = [
        'image',
        'created_by',
        'updated_by'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function imageUrl()
    {
        if (!empty($this->image)) {
            return asset(Storage::disk('banner')->url($this->image));
        }

        return null;
    }

    public static function boot()
    {
        parent::boot();


        static::creating(function ($user) {
            $user->created_by = auth()->id() ?? null;
        });
    }
}
