<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Model;

class LoanTransaction extends Model
{
    use FilterTrait;

    public $fillable = [
        'id',
        'user_id',
        'user_loan_id',
        'momentum_id',
        'encoded_key',
        'type',
        'principal_balance',
        'interest_paid',
        'balance',
        'amount',
        'creationDate',
        'deleted_at'
    ];

    protected $exactFilters = [ 'type' ];
    protected $scopeFilters = [
        'createdBefore',
        'search'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('type', 'LIKE', "%$search%");
    }

    public function scopecreatedBefore($query, $date)
    {
        return $query->where('creation_date', '<=', Carbon::parse($date));
    }

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
