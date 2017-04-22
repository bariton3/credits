<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $table = 'credits';
    protected $appends = ['principal_payment','interest_payment'];

    protected $hidden = [
    ];

    /**
     * Get principal_payment.
     *
     * @return float
     */
    public function getPrincipalPaymentAttribute()
    {
        return round($this->loan_amount / $this->number_of_months, 2);
    }

    /**
     * Get interest_payment.
     *
     * @return float
     */
    public function getInterestPaymentAttribute()
    {
        return round($this->loan_amount * ($this->interest_rate_per_year / (12 * 100)), 2);
    }
}
