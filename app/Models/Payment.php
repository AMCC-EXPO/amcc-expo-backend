<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Payment extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $fillable = [
        'member_id',
        'payment_method_id',
        'amount',
        'payment_due',
        'status',
        'hash',
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

}
