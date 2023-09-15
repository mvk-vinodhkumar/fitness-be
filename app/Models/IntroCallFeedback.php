<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroCallFeedback extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'intro_call_feedback';
    protected $fillable = [
        'username', 'comment', 'star', 'status'
    ];
}
