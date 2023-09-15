<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CoachController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Social login plus general login
Route::get('login/{provider}', [SocialController::class, 'redirect']);
Route::get('login/{provider}/callback', [SocialController::class, 'callback']);

// View routes
Route::get('/privacy-policy', function () {return view('privacy-policy');});
Route::get('/terms-conditions', function () {return view('term-condition');});
Route::get('/cookies-policy', function () {return view('cookie-policy');});
Route::get('/contact-us', function () {return view('contact_us');});

// Home Controller APIs
Route::post('question', [HomeController::class, 'question']);
Route::post('userCheck', [HomeController::class, 'check_mob']);
Route::get('/otp', [HomeController::class, 'send_otp']);
Route::get('/sendInvoice', [HomeController::class, 'sendInvoice']);
Route::get('/createPlan', [HomeController::class, 'createPlan']);
Route::post('/receiveWebhook', [HomeController::class, 'receiveWebhook']);

// User Controller APIs
Route::post('login_other', [UserController::class, 'login_other']);
Route::post('/login_with_otp', [UserController::class, 'login_with_otp']);
Route::post('/forget_otp_verify', [UserController::class, 'forget_otp_verify']);
Route::post('/forget_otp_verified', [UserController::class, 'forget_otp_verified']);
Route::post('/otp_verified', [UserController::class, 'otp_verified']);
Route::get('/ajax/generateOrder', [UserController::class, 'generateOrder']);
Route::get('/ajax/verifyOrder', [UserController::class, 'verifyOrder']);
Route::get('/price_data/{base_val}/{tier}/{discount}', [UserController::class, 'price_data']);
Route::get('/testimonials', [UserController::class, 'testimonials']);
Route::get('/testimonial_story', [UserController::class, 'testimonial_story']);
Route::get('ajax/autocomplete', [UserController::class, 'autocomplete']);
Route::post('/sendMail', [UserController::class, 'sendMail']);
Route::get('/recipes', [UserController::class, 'recipes']);


// Coach Controller APIs
Route::get('/premium_coaches', [CoachController::class, 'premium_coaches']);
Route::get('/premium_coach_profile_details/{profile_url}', [CoachController::class, 'premium_coach_profile_details']);
Route::get('/premium_coach_certificates/{profile_url}', [CoachController::class, 'premium_coach_certificates']);
Route::get('/premium_coach_transformations/{profile_url}', [CoachController::class, 'premium_coach_transformations']);

// Authenticated User Controller APIs
Route::middleware('auth:api')->group(function () {
    Route::prefix('user/')->group(function () {
        Route::post('/mob_available', [UserController::class, 'mob_available']);
        Route::post('/mob_available_password_set', [UserController::class, 'mob_available_password_set']);
        Route::post('/buddy_mob_check', [UserController::class, 'buddy_mob_check']);
        Route::get('/profile', [UserController::class, 'get_user_profile']);
        Route::post('/change_password', [UserController::class, 'change_password']);
        Route::post('/change_password_outside', [UserController::class, 'change_password_outside']);
        Route::post('/change_country', [UserController::class, 'change_country']);
        Route::post('/get_city', [UserController::class, 'get_city']);
        Route::post('/get_country', [UserController::class, 'get_country']);
        Route::post('/logout', [UserController::class, 'logout']);
        Route::put('/profile_update/{user_id}', [UserController::class, 'update_user_profile']);
        Route::get('/dashboard', [UserController::class, 'dashboard']);
        Route::get('/generic_after_login', [UserController::class, 'generic_after_login']);
        Route::post('/question_filled', [UserController::class, 'question_filled']);
        Route::post('/renew_question_view', [UserController::class, 'renew_question_view']);
        Route::post('/partner_profile_filled', [UserController::class, 'partner_profile_filled']);
        Route::post('/future_question_date_select', [UserController::class, 'future_question_date_select']);
        Route::post('/pause_plan', [UserController::class, 'pause_plan']);
        Route::post('/cancel_future_pause', [UserController::class, 'cancel_future_pause']);
        Route::post('/cancel_pause', [UserController::class, 'cancel_pause']);
        Route::post('/save_profile', [UserController::class, 'save_profile']);
        Route::post('/save_GSTDetails', [UserController::class, 'save_GSTDetails']);
        Route::post('/new_question_ans_submit', [UserController::class, 'new_question_ans_submit']);
        Route::post('/renewal_question_ans_submit', [UserController::class, 'renewal_question_ans_submit']);
        Route::post('/partner_email', [UserController::class, 'partner_email']);
        Route::post('/partner_data', [UserController::class, 'partner_data']);
        Route::post('/referal_code_check', [UserController::class, 'referal_code_check']);
        Route::post('/referal_code_apply', [UserController::class, 'referal_code_apply']);
        Route::post('/cancel_referal', [UserController::class, 'cancel_referal']);
        Route::post('/user_coach_assignment', [UserController::class, 'user_coach_assignment']);
        Route::post('/activate_plan', [UserController::class, 'activate_plan']);
        Route::get('/sendNotification', [UserController::class, 'sendFailedTxnNotification']);
        Route::post('/feedback_insert', [UserController::class, 'feedback_insert']);
        Route::post('/intro_call_feedback', [UserController::class, 'intro_call_feedback']);
        Route::post('/real_time_insert', [UserController::class, 'real_time_insert']);
    });
});
