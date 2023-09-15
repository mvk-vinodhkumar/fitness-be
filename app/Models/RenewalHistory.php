<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenewalHistory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'renewal_history';

    protected $fillable = [
        'username', 'previous_plan', 'previous_plan_id', 'current_plan', 'current_plan_id', 'previous_plan_start_date', 'previous_plan_end_date', 'cureent_plan_start_date', 'created_at', 'updated_at', 'status', 'previous_team', 'previous_head_coach', 'previous_sub_coach'
    ];
}
