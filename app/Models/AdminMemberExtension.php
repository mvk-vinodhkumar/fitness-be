<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMemberExtension extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'membership_extend_admin';
    protected $fillable = [
        'username', 'days', 'comments', 'previous_end_date', 'end_date', 'update_time', 'created_at', 'updated_at','status'
    ];
}
