<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingLiveSession extends Model
{
    use HasFactory;

    protected $table = 'booking_live_session';
    public $timestamps = false;
}
