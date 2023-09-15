<?php

namespace App\Http\Controllers;
use App\Testimonial;
use Illuminate\Http\Request;

class SuccessController extends Controller
{
  public function index(Request $request) {
   $testimonials = Testimonial::where('status',1)->orderBy('display_order','asc')->paginate(9);

   return view('success',  ['testimonials' => $testimonials]);
  }
}
