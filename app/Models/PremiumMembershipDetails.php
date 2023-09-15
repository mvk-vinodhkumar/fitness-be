<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumMembershipDetails extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'premium_plan_details';
    protected $fillable = [
        'type', 'total_member', 'is_subscription', 'duration', 'pause', 'count_subscription', 'is_active', 'is_live'
    ];
}
