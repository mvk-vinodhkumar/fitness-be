<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachCertification extends Model
{
    protected $guarded = [];
    protected $table = 'coach_certificates';
    protected $fillable = [
        'id',
        'coach_id',
        'cert_name',
        'cert_image',
        'status'
    ];
}
