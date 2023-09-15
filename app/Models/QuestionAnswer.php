<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'question_answer';
    protected $fillable = [
        'answer', 'type', 'username', 'created_at', 'updated_at', 'status'
    ];
}
