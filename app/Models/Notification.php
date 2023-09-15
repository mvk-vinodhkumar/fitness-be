<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'notification';
    protected $fillable = [
        'notification_type', 'username', 'team_name', 'description', 'created_type', 'created_by',
        'created_at', 'updated_at', 'updated_by', 'status'
    ];
}
