<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement',
        'price',
        'date_start',
        'date_end',
        'opening_hours',
        'closing_hours',
        'payment_is_open',
        'cs_number',
        'link_group',
        'initial_registration_number',
    ];

    protected $casts = [
        'payment_is_open' => 'boolean',
    ];
}
