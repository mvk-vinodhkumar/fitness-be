<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberExtension extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'member_extension';
    protected $fillable = [
        'username', 'code', 'code_used_by', 'no_of_days', 'type', 'status'
    ];
}
