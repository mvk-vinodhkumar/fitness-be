<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoughtPackage extends Model
{
    use HasFactory;

    protected $table = 'bought_package';
    public $timestamps = false;
}
