<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_id', 'phone', 'address', 'id_document_path', 'emergency_contact_name', 'emergency_contact_phone'
    ];
}
