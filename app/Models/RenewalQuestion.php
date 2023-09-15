<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenewalQuestion extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'renewal_question';
    protected $fillable = [
        'question_desc', 'gender', 'type', 'option', 'required', 'section'
    ];
}
