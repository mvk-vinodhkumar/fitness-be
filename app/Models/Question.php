<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'question';
    protected $fillable = [
        'question_desc', 'gender', 'type', 'option', 'required', 'section'
    ];
}
