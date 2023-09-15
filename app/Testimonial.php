<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Carbon\Carbon;

class Testimonial extends Model
{
  protected $guarded = [];
  protected $table = 'testimonials';
  protected $fillable = [
       'id','name','designation','details','image_url','status','display_adder','created_at','updated_at'
  ];

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
}
