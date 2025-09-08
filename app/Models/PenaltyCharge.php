<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenaltyCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id','amount','reason','applied_at'
    ];

    protected $casts = [
        'applied_at' => 'datetime',
    ];
}
