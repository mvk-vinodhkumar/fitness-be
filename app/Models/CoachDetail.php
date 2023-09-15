<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachDetail extends Model
{
    protected $guarded = [];
    protected $table = 'coach_details';
    protected $fillable = [
        'id',
        'coach_id',
        'designation',
        'coach_tier',
        'slots',
        'display_order',
        'cert_short',
        'instagram',
        'experience',
        'clients_trained',
        'popularity',
        'active_clients',
        'about_coach',
        'focus_areas',
        'img_profile',
        'img_banner'
    ];
}
