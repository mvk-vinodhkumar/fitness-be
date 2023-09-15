<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Backpack\CRUD\app\Models\Traits\CrudTrait;

class Payment extends Model
{
    // use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'payments';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = [
        'invoice_no',
        'razor_pay_id',
        'currency_type',
        'invoice','amount','taxable_amount','cgst','sgst','igst',
        'plan',
        'name',
        'mobile',
        'email',
        'membership_status',
        'status',
        'response_from_razor_pay',
        'token',
        'street',
        'city',
        'pincode',
        'country',
        'state'
    ];
    // protected $hidden = [];
    // protected $dates = [];



    public function getAmount()
    {
        return $this->currency_type .' ' .$this->amount;
    }

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
