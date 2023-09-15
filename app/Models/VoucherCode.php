<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherCode extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'voucher_code';
    protected $fillable = [
        'code', 'coach_id', 'extension_day', 'start_date', 'end_date', 'reuse', 'total_count', 'type', 'member_type', 'status'
    ];
}
