<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamCoach extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'team_coach';
    protected $fillable = [
        'team_name', 'assign_coach', 'service_hour', 'whatsapp', 'status'
    ];
}
