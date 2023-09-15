<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
  Route::crud('subscriptioncapture', 'SubscriptionCaptureCrudController');
  Route::crud('payments', 'PaymentCrudController');
  Route::crud('subscriptions', 'SubscriptionCrudController');
  Route::crud('mails', 'MailCrudController');
  Route::crud('term', 'TermCrudController');
  Route::crud('recipesVideos', 'RecipesVideoCrudController');
  Route::crud('testimonial', 'TestimonialCrudController');
  Route::get('/dashboard', function () {
	  return redirect('/admin/testimonial');
  });
}); // this should be the absolute last line of this file
