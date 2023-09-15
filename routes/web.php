<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CronController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/success-stories', function () {
//     return view('success');
// });

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});
Route::get('/terms-conditions', function () {
    return view('term-condition');
});
Route::get('/cookies-policy', function () {
    return view('cookie-policy');
});
Route::get('/contact-us', function () {
    return view('contact_us');
});
Route::get('/payments', function () {
    return view('payments');
});

Route::get('/question', 'HomeController@question');
Route::get('/live-workouts', 'HomeController@live_workouts');
Route::get('/aboutus', 'HomeController@about');
Route::get('/recipes', 'HomeController@explore');
Route::get('/recipes_login', 'HomeController@explore_after_login');
Route::get('/landing_page', 'HomeController@new_web');

Route::get('/createSubscription', 'HomeController@createSubscription');
Route::get('/createPlan', 'HomeController@createPlan');

Route::get('/ajax/generateOrder', 'HomeController@generateOrder');
Route::get('/ajax/verifyOrder', 'HomeController@verifyOrder');
Route::post('/ajax/emailCheck', 'HomeController@emailCheck');
Route::post('/ajax/sign_up_record', 'HomeController@sign_up_record');

Route::get('/', 'HomeController@index');
Route::post('/receiveWebhook', 'HomeController@receiveWebhook');

Route::get('/success-stories', 'SuccessController@index');
Route::get('/testimonial_story', 'HomeController@testimonial_story');

// Route::get('/api/mail', 'HomeController@sendEmail');
// Route::post('/api/mail', 'HomeController@sendemail');

Route::post('/sendmail', 'HomeController@sendmail');

Route::get('/sendInvoice', 'HomeController@sendInvoice');
Route::get('/sendNotification', 'HomeController@sendWhatsAppMessage');
Route::get('/sendSubscriptionInvoice', 'HomeController@sendSubscriptionInvoice');

Route::get('/apiGetURL', 'HomeController@apiGetURL');
Route::post('/apiPostURL', 'HomeController@apiPostURL');

Route::get('ajax/autocomplete', 'HomeController@autocomplete');

/*Socail login plus general login*/
Route::get('login/{provider}', 'SocialController@redirect');
Route::get('login/{provider}/callback', 'SocialController@callback');

Route::get('testsendmail', 'HomeController@testsendmail');

Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/zoom_list', 'HomeController@zoom_list');
Route::post('/otp', 'HomeController@send_otp');
Route::post('/userCheck', 'HomeController@check_mob');
Route::post('/logout', 'HomeController@logout');
Route::post('/get_city', 'HomeController@get_city');
Route::post('/get_country', 'HomeController@get_country');
Route::post('/change_country', 'HomeController@change_country');
Route::post('/mob_available', 'HomeController@mob_available');
Route::post('/login_other', 'HomeController@login_other');
Route::post('/otp_verified', 'HomeController@otp_verified');
Route::get('/livezy-trek', 'HomeController@trek');
Route::post('/saveUser', 'HomeController@saveUser');
Route::post('/saveGstDetails', 'HomeController@saveGstDetails');
Route::post('/question_filled', 'HomeController@question_filled');
Route::post('/partner_data', 'HomeController@partner_data');
Route::post('/pause_plan', 'HomeController@pause_plan');
Route::post('/cancel_pause', 'HomeController@cancel_pause');
Route::post('/question_submit', 'HomeController@question_submit');
Route::post('/renewal_question_submit', 'HomeController@renewal_question_submit');

Route::post('/generate_signature', 'HomeController@generate_signature');
Route::post('/change_paswwd', 'HomeController@change_paswwd');
Route::post('/change_paswwd_outside', 'HomeController@change_paswwd_outside');
Route::post('/forget_otp_verified', 'HomeController@forget_otp_verified');
Route::post('/forget_otp_verify', 'HomeController@forget_otp_verify');
Route::post('/mob_available_password_set', 'HomeController@mob_available_password_set');
Route::post('/login_with_otp', 'HomeController@login_with_otp');
Route::post('/cancel_future_pause', 'HomeController@cancel_future_pause');
Route::post('/referal_code_apply', 'HomeController@referal_code_apply');
Route::post('/cancel_referal', 'HomeController@cancel_referal');
Route::post('/partner_profile_filled', 'HomeController@partner_profile_filled');
Route::post('/partner_email', 'HomeController@partner_email');
Route::post('/renew_question_view', 'HomeController@renew_question_view');
Route::post('/feedback_update_live_sess', 'HomeController@feedback_update_live_sess');
Route::post('/join_session', 'HomeController@join_session');
Route::post('/feedback_insert', 'HomeController@feedback_insert');
Route::post('/feedback_insert_intro', 'HomeController@feedback_insert_intro');
Route::post('/real_time_insert', 'HomeController@real_time_insert');
Route::post('/future_question_date_select', 'HomeController@future_question_date_select');
Route::post('/activate_plan', 'HomeController@activate_plan');
Route::post('/add_extra_premium_plan', 'HomeController@add_extra_premium_plan');
Route::post('/mob_available_partner', 'HomeController@mob_available_partner');
Route::get('/timezone', 'HomeController@timezone');
Route::get('/mobile', 'HomeController@mobile');
Route::get('/mobile-dashboard', 'HomeController@mobile_dashboard');
Route::get('/sso', 'HomeController@sso');

// One time intro message to the members
Route::get('/notify_user/{mobile}/{template_name}', 'NotificationController@sendWhatsAppNotification');
Route::get('/meet-the-team', 'HomeController@meet_the_team');
Route::post('/user-coach-assignment', 'HomeController@user_coach_assignment');

/* --------------------- Admin Dashboard Route  ----------------------------------- */

Route::get('/admin-dashboard', [AdminController::class, 'admin']);
Route::get('/view-question', [AdminController::class, 'admin_question_view']);
Route::post('/membership_extend', [AdminController::class, 'membership_extend']);
Route::post('/pause_user_admin', [AdminController::class, 'pause_user_admin']);
Route::get('/uploadS3', [AdminController::class, 'uploadS3']);
Route::post('/get_user_data', [AdminController::class, 'get_user_data']);
Route::post('/deactivate_user', [AdminController::class, 'deactivate_user']);
Route::post('/create_user_admin', [AdminController::class, 'create_user_admin']);
Route::get('/plan_update_temp', [AdminController::class, 'plan_update_temp']);
Route::get('/admin', [AdminController::class, 'admin_dashboard']);
Route::post('/admin_login', [AdminController::class, 'admin_login']);
Route::post('/join_session_admin', [AdminController::class, 'join_session_admin']);
Route::post('/switch_admin_role', [AdminController::class, 'switch_admin_role']);
Route::post('/assign_voucher', [AdminController::class, 'assign_voucher']);
Route::post('/deactivate_voucher', [AdminController::class, 'deactivate_voucher']);
Route::post('/liv_sess_analytics', [AdminController::class, 'liv_sess_analytics']);
Route::post('/coach_retension', [AdminController::class, 'coach_analytics_retension']);
Route::post('/financeSale', [AdminController::class, 'financeSale']);
Route::get('/finance_analytics', [AdminController::class, 'finance_analytics']);
Route::post('/status_check_assign', [AdminController::class, 'status_check_assign']);
Route::post('/plan_link_update', [AdminController::class, 'plan_link_update']);
Route::get('/coach_assigned', [AdminController::class, 'coach_assigned']);
Route::post('/user_status', [AdminController::class, 'user_status_update_admin']);
Route::post('/transform_update', [AdminController::class, 'transform_status']);
Route::post('/get-transform', [AdminController::class, 'get_transform']);
Route::post('/notif_archive', [AdminController::class, 'notif_archive']);
Route::post('/create_live_session', [AdminController::class, 'create_live_session']);
Route::post('/team_create', [AdminController::class, 'team_create']);
Route::post('/user_team_assign', [AdminController::class, 'user_team_assign']);
Route::post('/get-notification', [AdminController::class, 'get_notification']);
Route::post('/get_archive_notif', [AdminController::class, 'get_archive_notif']);
Route::post('/session_update_url', [AdminController::class, 'session_update_url']);
Route::post('/cancel_session', [AdminController::class, 'cancel_session']);
Route::post('/update_session', [AdminController::class, 'update_session']);
Route::post('/session_booking', [AdminController::class, 'session_booking']);
Route::post('/cancel_user_live_session', [AdminController::class, 'cancel_user_live_session']);
Route::get('/general', [AdminController::class, 'general_email']);
Route::post('/admin_logout', [AdminController::class, 'admin_logout']);
Route::post('/live_user_data', [AdminController::class, 'live_user_data']);
Route::post('/live_user_plan_detail', [AdminController::class, 'live_user_plan_detail']);
Route::post('/referal_code_check', [AdminController::class, 'referal_code_check']);
Route::post('/change_start_date_user', [AdminController::class, 'change_start_date_user']);
Route::post('/plan_start_date_change', [AdminController::class, 'plan_start_date_change']);
Route::get('/send_email_to_members', [AdminController::class, 'send_email_to_members']);
Route::get('/admin-assign-coach/{id}/{val}', [AdminController::class, 'admin_assign_coach']);
Route::get('/reset-existing-coach/{id}', [AdminController::class, 'reset_existing_coach']);
Route::get('/continue-same-coach/{id}', [AdminController::class, 'continue_same_coach']);
Route::get('/intro_message', [AdminController::class, 'send_intro_message']);
Route::get('/saveCurrencyValues', [AdminController::class, 'saveCurrencyValues']);
Route::get('/e/{token}', [AdminController::class, 'invoiceView']);
Route::get('/s/{token}', [AdminController::class, 'subscriptionView']);
Route::get('/excel_read_question', [AdminController::class, 'excel_read_question']);
Route::get('/test_pdf', [AdminController::class, 'test_pdf']);
Route::resource('admin-dashboard/payment_reports', 'PaymentReportController');

// Routes for Coach CRUD
Route::post('/add-coach', [AdminController::class, 'add_coach']);
Route::post('/update-coach', [AdminController::class, 'update_coach']);
Route::delete('/delete-coach', [AdminController::class, 'delete_coach']);
Route::get('/get-all-coaches', [AdminController::class, 'get_all_coaches']);
Route::get('/change-coach-status/{id}/{status}', [AdminController::class, 'change_coach_status']);
Route::get('/get-coach/{id}', [AdminController::class, 'get_coach']);
Route::get('/get_coach_tier/{coach_name}/{team}', [AdminController::class, 'get_coach_tier']);
Route::get('/edit-coach/{id}', [AdminController::class, 'edit_coach']);
Route::get('/popularity/{name}', [AdminController::class, 'popularity']);
Route::get('/profile/{name}', [AdminController::class, 'get_coach_profile']);
Route::post('/add-transformation-data', [AdminController::class, 'add_transformation_data']);
Route::post('/add-certification-data', [AdminController::class, 'add_certification_data']);

// Routes for new paid members page & dashboard
Route::get('admin-dashboard/paid_members', [AdminController::class, 'paid_members']);
Route::get('admin-dashboard/new_members', [AdminController::class, 'new_members']);
Route::get('admin-dashboard/all_users', [AdminController::class, 'all_users']);
Route::get('admin-dashboard/live_session', [AdminController::class, 'live_session']);
Route::get('admin-dashboard/zoom_live_session', [AdminController::class, 'zoom_live_session']);
Route::get('admin-dashboard/notifications', [AdminController::class, 'notifications']);
Route::get('admin-dashboard/transform', [AdminController::class, 'transform']);
Route::get('admin-dashboard/admin_analytics', [AdminController::class, 'admin_analytics']);
Route::get('admin-dashboard/team_details', [AdminController::class, 'team_details']);
Route::get('admin-dashboard/voucher_details', [AdminController::class, 'voucher_details']);
Route::get('admin-dashboard/coach_details', [AdminController::class, 'coach_details']);
Route::post('/admin-dashboard/user_status', [AdminController::class, 'user_status_update_admin']);
Route::post('/admin-dashboard/status_check_assign', [AdminController::class, 'status_check_assign']);
Route::post('/admin-dashboard/plan_link_update', [AdminController::class, 'plan_link_update']);
Route::post('/admin-dashboard/user_team_assign', [AdminController::class, 'user_team_assign']);
Route::post('/admin-dashboard/get_user_data_paid_members', [AdminController::class, 'get_user_data_paid_members']);
Route::post('/admin-dashboard/create_user_admin', [AdminController::class, 'create_user_admin']);
Route::post('/admin-dashboard/deactivate_user', [AdminController::class, 'deactivate_user']);
Route::post('/admin-dashboard/live_user_plan_detail', [AdminController::class, 'live_user_plan_detail']);
Route::post('/admin-dashboard/live_user_plan_detail_paid_members', [AdminController::class, 'live_user_plan_detail_paid_members']);
Route::post('/admin-dashboard/membership_extend_paid_members', [AdminController::class, 'membership_extend']);
Route::post('/admin-dashboard/live_user_data', [AdminController::class, 'live_user_data']);
Route::post('/admin-dashboard/pause_user_admin', [AdminController::class, 'pause_user_admin']);
Route::post('/admin-dashboard/change_start_date_user', [AdminController::class, 'change_start_date_user']);
Route::post('/admin-dashboard/plan_start_date_change', [AdminController::class, 'plan_start_date_change']);
Route::post('/admin-dashboard/switch_admin_role', [AdminController::class, 'switch_admin_role']);
Route::post('/admin-dashboard/admin_logout', [AdminController::class, 'admin_logout']);

// Routes Added by Furkan for Ajax Calls
Route::get('admin-dashboard/get_renewal_data', [AdminController::class, 'get_renewal_data']);
Route::get('admin-dashboard/get_all_user_data', [AdminController::class, 'get_all_user_data']);
Route::get('admin-dashboard/get_liveses_feedback_data', [AdminController::class, 'get_liveses_feedback_data']);
Route::get('admin-dashboard/get_paid_member_data', [AdminController::class, 'get_paid_member_data']);
Route::get('admin-dashboard/get_new_member_data', [AdminController::class, 'get_new_member_data']);
Route::get('admin-dashboard/get_all_members_data', [AdminController::class, 'get_all_members_data']);
Route::get('admin-dashboard/get_renewed_member_data', [AdminController::class, 'get_renewed_member_data']);
Route::get('admin-dashboard/get_future_member_data', [AdminController::class, 'get_future_member_data']);
Route::get('admin-dashboard/get_team_coach_data', [AdminController::class, 'get_team_coach_data']);
Route::get('admin-dashboard/get_head_coach_data', [AdminController::class, 'get_head_coach_data']);
Route::get('admin-dashboard/get_team_head_coach_details', [AdminController::class, 'get_team_head_coach_details']);
Route::get('admin-dashboard/get_coach_voucher', [AdminController::class, 'get_coach_voucher']);
Route::get('admin-dashboard/get_team_assign_count', [AdminController::class, 'get_team_assign_count']);
Route::get('admin-dashboard/get_notifications_count', [AdminController::class, 'get_notifications_count']);
Route::post('admin-dashboard/transform_update', [AdminController::class, 'transform_status']);
Route::post('admin-dashboard/get_users_data_for_payment', [AdminController::class, 'get_users_data_for_payment']);
Route::post('admin-dashboard/create_payment_admin', [AdminController::class, 'create_payment_admin']);
Route::get('admin-dashboard/get_retension_data', [AdminController::class, 'get_retension_data']);
Route::get('admin-dashboard/get_finance_data', [AdminController::class, 'get_finance_data']);
Route::get('admin-dashboard/get_coach_details_data', [AdminController::class, 'get_coach_details_data']);
Route::get('admin-dashboard/get_coach_firstName', [AdminController::class, 'get_coach_firstName']);
Route::get('admin-dashboard/get_notification_data', [AdminController::class, 'get_notification_data']);
Route::get('admin-dashboard/get_notification_archive_data', [AdminController::class, 'get_notification_archive_data']);

// Routes for Cron operations
Route::get('/cron_pause', [CronController::class, 'cron_pause_start_cancel']);
Route::get('/cron_question_alert', [CronController::class, 'cron_for_question_alert']);
Route::get('/cron_questionaire_start', [CronController::class, 'cron_questionaire_start']);
Route::get('/cron_renewal', [CronController::class, 'cron_renewal']);
Route::get('/cron_renewal_reminder', [CronController::class, 'cron_renewal_reminder']);
Route::get('/cron_live_session', [CronController::class, 'cron_live_session']);
Route::get('/cron_for_question_alert', [CronController::class, 'cron_for_question_alert']);
Route::get('/cron_currency', [CronController::class, 'cron_currency']);

// Testing Routes for Dev
Route::get('/admin_test', [AdminController::class, 'admin_test']);
Route::get('/test1', 'HomeController@testing');
Route::get('/test2', 'HomeController@test2');
Route::get('/test3', 'HomeController@test3');
