<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachTransformation extends Model
{
    protected $guarded = [];
    protected $table = 'coach_transformations';
    protected $fillable = [
        'id',
        'coach_id',
        'image',
        'client_name',
        'status',
        'testimonials'
    ];
}