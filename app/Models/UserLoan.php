<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Model;

class UserLoan extends Model
{
    use FilterTrait;

    public $fillable = [
        'user_id',
        'momentum_id',
        'loan_name',
        'account_state',
        'interest_balance',
        'interest_due',
        'interest_paid',
        'interest_rate',
        'loan_amount',
        'principal_balance',
        'principal_due',
        'principal_paid',
        'repayment_installments',
        'creationDate',
        'deleted_at'
    ];
    protected $exactFilters = [
        'loanName'
    ];
    protected $scopeFilters = [
        'createdBefore',
        'search'
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('loan_name', 'LIKE', "%$search%");
    }

    public function scopeLoanName($query, $loanName)
    {
        return $query->whereLoanName($loanName);
    }

    public function scopecreatedBefore($query, $date)
    {
        return $query->where('creation_date', '<=', Carbon::parse($date));
    }

    public function transactions()
    {
        return $this->hasMany(LoanTransaction::class, 'user_loan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();
    }
}
