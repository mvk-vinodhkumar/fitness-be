<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'membership_details';
    protected $fillable = [
        'name', 'type', 'total_member', 'is_subscription', 'price', 'duration', 'pause', 'count_subscription', 'price_type', 'is_active', 'is_live'
    ];
}
