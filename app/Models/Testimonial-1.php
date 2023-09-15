<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Storage;
use Carbon\Carbon;

class Testimonial extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'testimonials';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['id','name','image_url','status','display_order','show_in_homepage','designation','details','created_at','updated_at'];
    // protected $hidden = [];
    // protected $dates = [];
    // public function setImageurlAttribute($value) {
    //
    //   }

    public function getImageUrlAttribute($value)
    {
      $resource=str_replace('https://ralfitness.s3.ap-south-1.amazonaws.com/','',urldecode($value));

      if (Storage::disk('s3')->has($resource)) {
          $data = Storage::disk('s3')->temporaryUrl(
            $resource, Carbon::now()->addSeconds(200)
          );
        }
        else {
          $data=$value;
        }

        return $data;
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
