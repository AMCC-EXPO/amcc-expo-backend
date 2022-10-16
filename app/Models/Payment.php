<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'payment_method_id',
        'amount',
        'status',
    ];

    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class);
    }
}
