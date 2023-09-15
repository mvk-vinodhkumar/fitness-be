<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    protected $guarded  = [];
    protected $table    = 'coach';
    public $timestamps  = false;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'profile_url',
        'team',
        'mob_number',
        'email_id',
        'password',
        'gender',
        'specialist',
        'coach_whatsapp',
        'is_assign',
        'role',
        'status'
    ];
}
