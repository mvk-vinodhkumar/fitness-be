<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','mob_no','is_renewed','team','head_coach','admin_assign_coach','image', 'provider', 'provider_id', 'password','username','street','state','pincode','short_country_name','country','city','plan','member_type','user_status','pause_day_availed','total_pause_day','plan_id','is_buddy','is_subscription','partner_detailed_filed','gender','is_buddy','buddy_username','total_workday','referal_action','referal_code','flag','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
