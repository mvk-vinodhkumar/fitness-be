<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FutureDateMembers extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'future_date_member';
    protected $fillable = [
        'username', 'created_at', 'updated_at', 'status'
    ];
}
