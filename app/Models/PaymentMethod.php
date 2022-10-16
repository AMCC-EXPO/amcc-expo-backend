<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class PaymentMethod extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'receiver_name',
        'receiver_number',
        'fee',
        'icon',
        'is_ots',
        'is_active',
    ];

    protected $casts = [
        'is_ots' => 'boolean',
        'is_active' => 'boolean',
    ];
}
