<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Notifications\VerifyMailNotification;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;
    use HasApiTokens;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;

    public $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'status',
        'password',
        'social_id',
        'social_type',
        'deleted_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'displayStatus'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getShortName()
    {
        $name = $this->name;
        $nameArr = explode(' ', $name);
        $result = '';
        foreach ($nameArr as $word) {
            $result .= substr($word, 0, 1);
        }
        return str()->upper($result);
    }

    public function getDisplayStatusAttribute()
    {
        return str()->ucfirst(str()->replace('_', ' ', $this->status));
    }

    public function getProfileUrl($avatar = '')
    {
        if (empty($avatar)) return null;

        return asset(Storage::url($avatar));
    }

    public function createdBy()
    {
        return $this->hasOne(User::class, 'created_by', 'id');
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('name', "LIKE", "%$search%")
            ->orWhere('email', "LIKE", "%$search%");
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->created_by = auth()->id() ?? null;
        });
    }
}
