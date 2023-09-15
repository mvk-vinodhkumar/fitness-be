<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoughtPremiumPlan extends Model
{
    use HasFactory;

    protected $table = 'bought_premium_plan';
    public $timestamps = false;
}
