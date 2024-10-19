<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_number',
        'account_name',
        'bank_name',
        'reference',
        'airtel_money_steps',
        'mtn_money_steps'
    ];

    protected $appends = ['airtel_money', 'mtn_mobile_money'];

    public function getAirtelMoneyAttribute()
    {
        return explode(',', $this->airtel_money_steps);
    }

    public function getMtnMobileMoneyAttribute()
    {
        return explode(',', $this->mtn_mobile_money);
    }
}
