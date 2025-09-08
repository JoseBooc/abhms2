<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id','amount','paid_at','method','reference','receipt_path'
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];
}
