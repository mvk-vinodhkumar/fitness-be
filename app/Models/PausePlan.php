<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PausePlan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'pause_plan';
    protected $fillable = [
        'username', 'start_date', 'end_date', 'days', 'cancel_date', 'day_availed', 'created_admin',
        'created_at', 'updated_at', 'status'
    ];
}
