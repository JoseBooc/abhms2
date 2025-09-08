<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','room_id','start_date','end_date','rent_amount','status','advance_paid','deposit_paid','deposit_balance','notes'
    ];

    public const STATUS_ACTIVE = 'active';
    public const STATUS_TERMINATED = 'terminated';
    public const STATUS_PENDING = 'pending';
}
