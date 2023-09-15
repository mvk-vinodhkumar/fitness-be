<?php
namespace App\Http\Controllers;

use App\Http\Controllers\CoachController;
use App\CurrencyValues;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\RecipesVideo;
use App\Models\SubscriptionCapture;
use App\Testimonial;
use App\Models\Mail;
use App\Models\Order;
use App\Models\Misc;
use App\Models\Coach;
use App\Models\CoachDetail;
use App\Models\CoachTransformation;
use App\Models\CoachCertification;
use App\Models\User;
use App\Models\MemberExtension;
use App\Models\FutureDateMembers;
use App\Models\PausePlan;
use App\Models\MembershipDetails;
use App\Models\RenewalHistory;
use App\Models\Notification;
use App\Models\TeamCoach;

use Config;
use DateTime;
use DateTimeZone;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Zoom;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
//use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;
$_ENV['2FKEY'] = 'b268a8fb-651f-11eb-8153-0200cd936042';


class Homecontroller extends Controller
{
    public function __construct()
    {
        $this->no_data_message = 'No Data Found';
        $this->success_message_saved = 'Data saved successfully';
        $this->success_message_store = 'Data stored successfully';
        $this->success_message_get = 'Data retrieved successfully';
        $this->success_message_deleted = 'Document deleted successfully';
        $this->success_message_list = 'All data listed successfully';
        $this->success_message_status = 'Status updated successfully';
    }

    // this function is totally used for development purpose
    public function timezone()
    {
        Log::info('timezone');
        //date_default_timezone_set("UTC");  this is used for setting default time zone
        $ip = $_SERVER['REMOTE_ADDR']; //User ip detection
        //getting the geo data from google api call
        $google_ip = $this->get_country_city($ip);
        $user_time_zone = data_get($google_ip, 'timezone.name');
        //cookie set
        if (!isset($_COOKIE['user_time_zone'])) {
            setcookie("user_time_zone", $user_time_zone, time() + 7 * 24 * 60 * 60 * 1000, "/");
        } else {
            if ($_COOKIE['user_time_zone'] !== $user_time_zone)
                setcookie("user_time_zone", $user_time_zone, time() + 7 * 24 * 60 * 60 * 1000, "/");
        }
        // $store_date='2021-09-16 06:00:00';
        // $str_str=strtotime($store_date);
        // $date_utc=date('Y-m-d H:i:s');
        // $str_utc=strtotime($date_utc);
        // date_default_timezone_set($user_time_zone);
        // $date_ind= date('Y-m-d H:i:s');
        // $str_ind=strtotime($date_ind);
        // $diff_zone=$str_utc-$str_ind;
        // $user_time=$str_str+$diff_zone;
        // echo $user_time.'<br>';
        // echo date('h:i:a',$user_time);
        $today_book_date_now = date('Y-m-d H:i:s');
        $date = new DateTime($today_book_date_now, new DateTimeZone('Asia/Kolkata'));
        echo $date->format('Y-m-d H:i:sP') . "\n";
        $date->setTimezone(new DateTimeZone($user_time_zone));
        echo $date->format('Y-m-d H:i:A') . "\n";
    }

    //generic function for timezone detection using ip of user
    public function user_timezone()
    {
        Log::info('user_timezone');
        $ip = "111.92.80.111";  // $_SERVER['REMOTE_ADDR'];
        $google_ip = $this->get_country_city($ip);
        $user_time_zone = data_get($google_ip, 'timezone.name');
        $_COOKIE['user_time_zone'] = $user_time_zone;
        setcookie("user_time_zone", $user_time_zone, time() + 7 * 24 * 60 * 60 * 1000, "/");
        if (!isset($_COOKIE['user_time_zone'])) {
            setcookie("user_time_zone", $user_time_zone, time() + 7 * 24 * 60 * 60 * 1000, "/");
        } else {
            if ($_COOKIE['user_time_zone'] !== $user_time_zone)
                setcookie("user_time_zone", $user_time_zone, time() + 7 * 24 * 60 * 60 * 1000, "/");
        }
    }

    public function get_country_city($ip)
    {
        Log::info('get_country_city');

        if(isset($_COOKIE['ip_data']) && !empty($_COOKIE['ip_data'])) {
            // echo "<script>console.log('Inside the if condition');</script>";
            // Return the cached data
            $cookie_data = $_COOKIE['ip_data'];
            $ipdata = json_decode(decrypt($cookie_data), true);
        } else {
            // echo "<script>console.log('Inside the else condition');</script>";
            // Validate input IP
            if(!filter_var($ip, FILTER_VALIDATE_IP)) {
                throw new Exception('Invalid IP address!');
            }

            $api_key = config('app.api_key');
            $url     = "https://ipgeolocation.abstractapi.com/v1/?api_key=".$api_key."&ip_address=".$ip;

            // Fetch the data from the API
            $client   = new \GuzzleHttp\Client();
            $response = $client->request('GET', $url, ['verify' => false]);

            // Options for setting cookie
            $options = array(
                'expires'  => time() + (7 * 24 * 60 * 60), // set expiration time to 7 days from now
                'path'     => '/',
                'secure'   => false, // send cookie over both HTTP and HTTPS
                'httponly' => true, // prevent JavaScript from accessing the cookie
                'samesite' => 'Lax' // restrict cookie to same site requests
            );

            $ipdata = json_decode($response->getBody(), true);
            if($ipdata !== null) {
                // echo "<script>console.log('IP data is not null');</script>";
                // Set cookies for caching
                $encrypted_data = encrypt(json_encode($ipdata));
                setcookie('ip_data', $encrypted_data,  $options['expires'], $options['path'], $options['secure'], $options['httponly'], $options['samesite']);
            }
        }
        return $ipdata;
    }

    // This function is used for loding and setting basic data to each user
    public function generic_index()
    {
        Log::info('generic_index');
        $misc_mod = new Misc();
        $membership_details = $misc_mod->get_membership_details();
        $ip = $_SERVER['REMOTE_ADDR'];
        Log::info("Logs from Generic Index (Remote Address) ".$ip);
        $base_currency_vlue = 1;
        $country_data = $this->get_country_city($ip);
        Log::info("Logs from IP Geolocation. State:".$country_data['region']. " & Country:" .$country_data['country']);
        // $_COOKIE['ralcurncy']='';
        // if(!isset($_COOKIE['ralcountry'])){
        // cookie('ralstate', $country_data['country'], $minutes);
        setcookie("ralcountry", $country_data['country'], time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("ralstate", $country_data['region'], time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("s_c_nane", strtolower($country_data['country_code']), time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("city", $country_data['city'], time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("ralcurncy", strtolower(data_get($country_data, 'currency.currency_code')), time() + 7 * 24 * 60 * 60 * 1000, "/");
        // setcookie("ral_currency", strtolower(data_get($country_data, 'currency.currency_code')), time() + 7 * 24 * 60 * 60 * 1000, "/");
        $_COOKIE['ralcurncy'] = strtolower(data_get($country_data, 'currency.currency_code'));
        // $_COOKIE['base_value']=strtolower(data_get($country_data, 'currency.currency_code'));
        setcookie("currency_icon", "₹", time() + 7 * 24 * 60 * 60 * 1000, "/");
        // setcookie("base_value", $country_data->geoplugin_currencySymbol_UTF8, time() + 7 * 24 * 60 * 60 * 1000, "/");
        $currency_data = $this->get_currency_exchange(strtolower(data_get($country_data, 'currency.currency_code')));
        if (!$currency_data['success']) {
            $currency_icon = '₹';
            // $currency_data['rates']=1;
            $currency_data['rates']['INR'] = 1;
            $ralcurncy = 'INR';
            //$country_data->currency->currency_code = 'INR';
            //$country_data->geoplugin_currencySymbol_UTF8 = '₹';
        }
        // echo '<pre>';
        // print_r($currency_data);
        // die();
        //                 Array
        //     (
        //         [success] => 1
        //         [timestamp] => 1632581957
        //         [base] => EUR
        //         [date] => 2021-09-25
        //         [rates] => Array
        //             (
        //                 [INR] => 86.783297
        //             )
        //     )
        $exchange_calculation = $currency_data['rates'][strtoupper($ralcurncy)] / $currency_data['rates']['INR'];
        setcookie("base_value", round($exchange_calculation, 3), time() + 7 * 24 * 60 * 60 * 1000, "/");
        $base_currency_vlue = round($exchange_calculation, 3);
        $_COOKIE['base_value'] = round($exchange_calculation, 3);
        $_COOKIE['currency_icon'] = '₹';
        $_COOKIE['s_c_nane'] = strtolower($country_data['country_code']);
        $_COOKIE['city'] = $country_data['city'];

        $prices = array();
        if (0) {
            $currency = $_COOKIE['ralcurncy'];
            $currency_icon = '&#36;';
            $base_val = CurrencyValues::orderBy('id', 'desc')->first();
            if ($_COOKIE['ralcurncy'] == 'usd') {
                $base_val = $base_val['usd'];
                $prices['six_months_plan_id'] = 'plan_Dah2pTGpuC1nuG';
                $prices['twelve_months_plan_id'] = 'plan_Dah4SQA7WbsWzK';
                $prices['six_months_couple_offer_plan_id'] = 'plan_DahTN9iwonR9vQ';
                $prices['twelve_months_couple_offer_plan_id'] = 'plan_DahTN9iwonR9vQ';
            } elseif ($_COOKIE['ralcurncy'] == 'aud') {
                $base_val = $base_val['aud'];
                $prices['six_months_plan_id'] = 'plan_Dah4yjcL3HW2Iu';
                $prices['twelve_months_plan_id'] = 'plan_Dah5gGaYbwSrBB';
                $prices['six_months_couple_offer_plan_id'] = 'plan_DahTzxxOk8wDph';
            }
        } else {
            //INR
            $currency = 'inr';
            // setcookie("ralcountry", $currency, time() + 7 * 24 * 60 * 60 * 1000, "/");
            $base_val = $base_currency_vlue;
            $currency_icon = isset($_COOKIE['currency_icon']) ? $_COOKIE['currency_icon'] : '₹';
            // setcookie("ralcountry", $currency_icon, time() + 7 * 24 * 60 * 60 * 1000, "/");
            // setcookie("ralcurncy", 'inr', time() + 7 * 24 * 60 * 60 * 1000, "/");
            $prices['six_months_plan_id'] = 'plan_Dagz4KViTUZxqS';
            $prices['twelve_months_plan_id'] = 'plan_Dagzc5fEk28bD5';
            $prices['six_months_couple_offer_plan_id'] = 'plan_DahSnlHNhOxa1H';
            $prices['twelve_months_couple_offer_plan_id'] = 'plan_DahTN9iwonR9vQ';
        }

        $prices['three_months_fixed'] = round($base_val * Config::get('prices.plus.three_months_fixed'));
        $prices['three_months_offer'] = round($base_val * Config::get('prices.plus.three_months_fixed'));
        $prices['six_months_fixed'] = round($base_val * Config::get('prices.plus.six_months_fixed'));
        $prices['six_months_offer'] = round($base_val * Config::get('prices.plus.six_months_fixed'));
        $prices['twelve_months_fixed'] = round($base_val * Config::get('prices.plus.twelve_months_fixed'));
        $prices['twelve_months_offer'] = round($base_val * Config::get('prices.plus.twelve_months_fixed'));

        $prices['three_months_couple_fixed'] = round($base_val * Config::get('prices.plus.three_months_couple_fixed'));
        $prices['three_months_couple_offer'] = round($base_val * Config::get('prices.plus.three_months_couple_fixed'));
        $prices['six_months_couple_fixed'] = round($base_val * Config::get('prices.plus.six_months_couple_fixed'));
        $prices['six_months_couple_offer'] = round($base_val * Config::get('prices.plus.six_months_couple_fixed'));
        $prices['twelve_months_couple_fixed'] = round($base_val * Config::get('prices.plus.twelve_months_couple_fixed'));
        $prices['twelve_months_couple_offer'] = round($base_val * Config::get('prices.plus.twelve_months_couple_fixed'));

        $prices['one_months_live_workout'] = round($base_val * Config::get('prices.plus.one_months_live_workout'));
        $prices['one_months_live_workout_offer'] = round($base_val * Config::get('prices.plus.one_months_live_workout_offer'));
        $prices['three_months_live_workout'] = round($base_val * Config::get('prices.plus.three_months_live_workout'));
        $prices['three_months_live_workout_offer'] = round($base_val * Config::get('prices.plus.three_months_live_workout_offer'));

        $testimonials = Testimonial::where('status', 1)->where('show_in_homepage', 1)->orderBy('display_order', 'asc')->limit(4)->get();
        $location['city'] = isset($_COOKIE['city']) ? $_COOKIE['city'] : 'Bangalore';
        // $location['country'] = isset($_COOKIE['s_c_nane']) ? $_COOKIE['s_c_nane'] : 'Bangalore';
        if(!empty($_COOKIE['s_c_nane'])) {
            $location['country'] = $_COOKIE['s_c_nane'];
        } else {
            $location['country'] = 'in';
        }
        // dd($location['country']);
        $data_customize = [
            'testimonials' => $testimonials,
            'prices' => $prices,
            'membership_details' => $membership_details,
            'currency' => $currency,
            'currency_icon' => $currency_icon,
            'location' => $location,
        ];
        return $data_customize;
    }

    public function generic_after_login()
    {
        $prices         = array();
        $prices['max_renewal_date_expired'] = 1; // This is set to 1, when the client's max_renewal_date is expired or reached
        $testimonials   = Testimonial::where('status', 1)->where('show_in_homepage', 1)->orderBy('display_order', 'asc')->limit(4)->get();
        $whatsppNumber  = '';
        $user_data      = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        // echo type_of($user_data);
        if ($user_data == Null) {
            Session::flush();
            return redirect('/');
            die();
        }
        // if (isset($_COOKIE['s_c_nane']) ? $_COOKIE['s_c_nane'] : 'in' != $user_data->short_country_name) {
            $this->common_change_country($user_data->country, $user_data->short_country_name, $user_data->city);
        // }
        $misc_mod               = new Misc();
        $future_date_selected   = $misc_mod->future_questionaire(Session::get('username'));
        $user_package_data      = $misc_mod->package_data(Session::get('username'));
        $premium_package_data   = $misc_mod->premium_package_data(Session::get('username'));

        $future_question        = false;
        if ($future_date_selected) {
            $future_question    = true;
        }
        $id_p = 0;
        if ($user_data->plan_id < 8)
            $id_p = 8;
        $plan_current = $misc_mod->get_plan_details($user_data->plan_id + $id_p);
        $user_data['buddy_pop_up'] = 0;
        if ($user_data->is_buddy) {
            $total_buddy_user           = explode(',', $user_data->buddy_username);
            $total_buddy_user_count     = count($total_buddy_user);
            $result_plan                = $misc_mod->get_plan_details($user_data->plan_id);
            $user_data['buddy_pop_up']  = $result_plan[0]->total_member - $total_buddy_user_count;
        }
        $misc_mod_model         = new Misc();
        $live_sessionData       = $misc_mod_model->live_session_data_view_user();
        $user_book_live_sess    = $misc_mod_model->live_session_booking_data_user(Session::get('username'));
        $liv_sess_date          = $misc_mod_model->live_session_distinct_date();
        $upcoming_pause         = $misc_mod_model->pause_details_today($user_data->username, $user_data->plan_end_date);
        $frezze_dashboard       = $misc_mod_model->is_user_on_pause($user_data->username);
        $pause_on_data          = [];

        $res = $misc_mod_model->pause_on_data($user_data->username);
        if ($res) {
            $pause_on_data      = $misc_mod_model->pause_on_data($user_data->username);
        }
        $get_whats_app          = $misc_mod_model->whats_app($user_data->head_coach);
        if ($get_whats_app)
            $whatsppNumber      = $get_whats_app[0]->coach_whatsapp;

        $not_frezze_dashboard   = $misc_mod_model->is_user_on_pause_remove($user_data->username);
        $pause_plan = 0;

        if (sizeof($frezze_dashboard) >= 1) {
            if ($user_data->user_status == 8) {
                $pause_plan = 1;
                $user_status_update_on_pause = [
                    'user_status' => 9
                ];
                $users_update               = User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_status_update_on_pause);
                $up_futur_pause             = $misc_mod_model->data_pause_update(Session::get('username'), $frezze_dashboard[0]->start_date, $frezze_dashboard[0]->end_date, 2, $frezze_dashboard[0]->days);
                if ($user_data->is_buddy) {
                    $users_update_buddy     = User::where(['status' => 1, 'username' => $user_data->buddy_username])->limit(1)->update($user_status_update_on_pause);
                    $up_futur_pause         = $misc_mod_model->data_pause_update($user_data->buddy_username, $frezze_dashboard[0]->start_date, $frezze_dashboard[0]->end_date, 2, $frezze_dashboard[0]->days);
                }
            }
        }
        if (sizeof($not_frezze_dashboard) >= 1) {
            if ($user_data->user_status == 9) {
                $pause_plan = 0;
                $user_status_update_on_pause = [
                    'user_status' => 8
                ];
                $users_update   = User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_status_update_on_pause);
                $up_futur_pause = $misc_mod_model->data_pause_update(Session::get('username'), $not_frezze_dashboard[0]->start_date, $not_frezze_dashboard[0]->end_date, 3, $not_frezze_dashboard[0]->days);
                if ($user_data->is_buddy) {
                    $users_update_buddy  =   User::where(['status' => 1, 'username' => $user_data->buddy_username])->limit(1)->update($user_status_update_on_pause);
                    $up_futur_pause = $misc_mod_model->data_pause_update($user_data->buddy_username, $not_frezze_dashboard[0]->start_date, $not_frezze_dashboard[0]->end_date, 3, $not_frezze_dashboard[0]->days);
                }
            }
        }
        $user_workday = [];
        if ($user_data->user_status == 8 || $user_data->user_status == 9) {
            $misc_mod = new Misc();
            $user_pause_day_availed = $user_data->pause_day_availed;
            $user_plan_end_date = strtotime($user_data->plan_end_date);
            $curr_date = strtotime(date('Y-m-d'));
            $exsist_diff = $user_plan_end_date - $curr_date;
            $exsist_diff = round($exsist_diff / (60 * 60 * 24));
            $user_plan_left_day = $exsist_diff; //-$user_pause_day_availed
            $user_plan_total_day = $user_data->total_workday;
            // $referal_day=$misc_mod->total_referal_day_user(Session::get('username'));
            // if(sizeof($referal_day))
            //     $user_plan_total_day=$user_plan_total_day+$referal_day[0]->total_day;
            $user_complete_percentage = $user_plan_left_day / $user_plan_total_day;
            $user_workday['user_plan_left_day'] = $user_plan_left_day > 0 ? $user_plan_left_day : 0;
            $user_workday['user_plan_total_day'] = $user_plan_total_day;
            $user_workday['user_complete_percentage'] = $user_complete_percentage > 0 ? $user_complete_percentage * 100 : 0;
            $user_workday['user_complete_day'] = $user_plan_total_day - $user_plan_left_day;
        }
        $result_plan = $misc_mod_model->get_plan_details($user_data->plan_id);
        $currency = 'inr';
        //$currency = $_COOKIE['ralcurncy'];
        $base_val = isset($_COOKIE['base_value']) ? $_COOKIE['base_value'] : 1;
        // $currency_icon='₹';
        $currency_icon = isset($_COOKIE['currency_icon']) ? $_COOKIE['currency_icon'] : '₹';
        // setcookie("ralcurncy", 'inr', time() + 7 * 24 * 60 * 60 * 1000, "/");
        $prices['six_months_plan_id'] = 'plan_Dagz4KViTUZxqS';
        $prices['twelve_months_plan_id'] = 'plan_Dagzc5fEk28bD5';
        $prices['six_months_couple_offer_plan_id'] = 'plan_DahSnlHNhOxa1H';

        $prices['three_months_fixed'] = round($base_val * Config::get('prices.plus.three_months_fixed'));
        $prices['three_months_offer'] = round($base_val * Config::get('prices.plus.three_months_fixed'));
        $prices['six_months_fixed'] = round($base_val * Config::get('prices.plus.six_months_fixed'));
        $prices['six_months_offer'] = round($base_val * Config::get('prices.plus.six_months_fixed'));
        $prices['twelve_months_fixed'] = round($base_val * Config::get('prices.plus.twelve_months_fixed'));
        $prices['twelve_months_offer'] = round($base_val * Config::get('prices.plus.twelve_months_fixed'));

        $prices['three_months_couple_fixed'] = round($base_val * Config::get('prices.plus.three_months_couple_fixed'));
        $prices['three_months_couple_offer'] = round($base_val * Config::get('prices.plus.three_months_couple_fixed'));
        $prices['six_months_couple_fixed'] = round($base_val * Config::get('prices.plus.six_months_couple_fixed'));
        $prices['six_months_couple_offer'] = round($base_val * Config::get('prices.plus.six_months_couple_fixed'));
        $prices['twelve_months_couple_fixed'] = round($base_val * Config::get('prices.plus.twelve_months_couple_fixed'));
        $prices['twelve_months_couple_offer'] = round($base_val * Config::get('prices.plus.twelve_months_couple_fixed'));

        $prices['one_months_live_workout'] = round($base_val * Config::get('prices.plus.one_months_live_workout'));
        $prices['one_months_live_workout_offer'] = round($base_val * Config::get('prices.plus.one_months_live_workout_offer'));
        $prices['three_months_live_workout'] = round($base_val * Config::get('prices.plus.three_months_live_workout'));
        $prices['three_months_live_workout_offer'] = round($base_val * Config::get('prices.plus.three_months_live_workout_offer'));

        $count_existing_plan = $user_data->plan ? explode(' ', $user_data->plan)[0] : 0;
        $get_plan_price = $misc_mod->get_plan_price($user_data->member_type, $count_existing_plan);
        $exsiting_plan_renewal_price = 0;
        if (sizeof($get_plan_price) != 0) {
            if (sizeof($get_plan_price) == 1) {
                $exsiting_plan_renewal_price = $get_plan_price[0]->price; //1
            } else {
                $exsiting_plan_renewal_price = $get_plan_price[1]->price; //1
            }
        }
        $session_offer = ['extension' => false];
        Session::put($session_offer);
        $pop_up = false;
        $current_date = date('Y-m-d');
        // $current_date = '2022-12-30'; // for testing, choose a future date
        $normal_extend_day = '90 days';
        // if ($current_date <= '2021-11-09' && $current_date >= '2021-10-28') {
        //     $normal_extend_day = '180 days';
        // }

        $plan_end_date_renewal = date('Y-m-d', strtotime($user_data->plan_end_date . ' + ' . $normal_extend_day));
        // dd($plan_end_date_renewal);
        // if (($plan_end_date_renewal >= $current_date || $plan_end_date_renewal >= '2021-10-28') && $user_data->user_status > 1) {
        if ($plan_end_date_renewal >= $current_date && $user_data->user_status > 1) {

            if(($user_data->team == 'Team Vinit' && $user_data->head_coach == 'Vinit') || ($user_data->team == 'Team Gaurav' && $user_data->head_coach == 'Rahul')) {

                // Individual Renewal Plan Prices
                $prices['three_months_fixed'] = round($base_val * 16300);
                $prices['three_months_offer'] = round($base_val * 13040);

                $prices['six_months_fixed'] = round($base_val * 27000);
                $prices['six_months_offer'] = round($base_val * 21600);

                $prices['twelve_months_fixed'] = round($base_val * 48000);
                $prices['twelve_months_offer'] = round($base_val * 38400);

                // Buddy Renewal Plan Prices
                $prices['three_months_couple_fixed'] = round($base_val * 31000);
                $prices['three_months_couple_offer'] = round($base_val * 24800);

                $prices['six_months_couple_fixed'] = round($base_val * 51000);
                $prices['six_months_couple_offer'] = round($base_val * 40800);

                $prices['twelve_months_couple_fixed'] = round($base_val * 86000);
                $prices['twelve_months_couple_offer'] = round($base_val * 68800);

                // Live Session Renewal Plans
                $prices['one_months_live_workout'] = round($base_val*3500);
                $prices['one_months_live_workout_offer'] = round($base_val*2499);

                $prices['three_months_live_workout'] = round($base_val*9000);
                $prices['three_months_live_workout_offer'] = round($base_val*5999);

            } elseif($user_data->team == 'Team Gaurav' && $user_data->head_coach == 'Gaurav') {

                // Individual Renewal Plan Prices
                $prices['three_months_fixed'] = round($base_val * 14800);
                $prices['three_months_offer'] = round($base_val * 11840);

                $prices['six_months_fixed'] = round($base_val * 24000);
                $prices['six_months_offer'] = round($base_val * 19200);

                $prices['twelve_months_fixed'] = round($base_val * 44000);
                $prices['twelve_months_offer'] = round($base_val * 35200);

                // Buddy Renewal Plan Prices
                $prices['three_months_couple_fixed'] = round($base_val * 27000);
                $prices['three_months_couple_offer'] = round($base_val * 21600);

                $prices['six_months_couple_fixed'] = round($base_val * 46000);
                $prices['six_months_couple_offer'] = round($base_val * 36800);

                $prices['twelve_months_couple_fixed'] = round($base_val * 77000);
                $prices['twelve_months_couple_offer'] = round($base_val * 61600);

                // Live Session Renewal Plans
                $prices['one_months_live_workout'] = round($base_val*3500);
                $prices['one_months_live_workout_offer'] = round($base_val*2499);

                $prices['three_months_live_workout'] = round($base_val*9000);
                $prices['three_months_live_workout_offer'] = round($base_val*5999);

            } else {

                // Individual Renewal Plan Prices
                $prices['three_months_fixed'] = round($base_val * 12500);
                $prices['three_months_offer'] = round($base_val * 10625);

                $prices['six_months_fixed'] = round($base_val * 22000);
                $prices['six_months_offer'] = round($base_val * 18700);

                $prices['twelve_months_fixed'] = round($base_val * 40000);
                $prices['twelve_months_offer'] = round($base_val * 34000);

                // Buddy Renewal Plan Prices
                $prices['three_months_couple_fixed'] = round($base_val * 23000);
                $prices['three_months_couple_offer'] = round($base_val * 19550);

                $prices['six_months_couple_fixed'] = round($base_val * 42000);
                $prices['six_months_couple_offer'] = round($base_val * 35700);

                $prices['twelve_months_couple_fixed'] = round($base_val * 60000);
                $prices['twelve_months_couple_offer'] = round($base_val * 51000);

                // Live Session Renewal Plans
                $prices['one_months_live_workout'] = round($base_val*3500);
                $prices['one_months_live_workout_offer'] = round($base_val*2499);//1799 - chnged by furkan
                $prices['three_months_live_workout'] = round($base_val*9000);
                $prices['three_months_live_workout_offer'] = round($base_val*5999);//4999 - chnged by furkan
            }

        }

        $location['country'] = 'in';
        $location['city'] = 'Bangalore';
        $coach_data = $misc_mod_model->coach_data();
        $plus_coach_data = $misc_mod_model->plus_coach_data();
        // dd($prices);
        $data_customize = [
            'prices' => $prices,
            'testimonials' => $testimonials,
            'currency' => $currency,
            'currency_icon' => $currency_icon,
            'location' => $location,
            'users' => $user_data,
            'current_pause_plan' => $frezze_dashboard,
            'pause_plan' => $pause_plan,
            'user_workday' => $user_workday,
            'whatsapp_no' => $whatsppNumber,
            'live_session_data' => $live_sessionData,
            'liv_sess_date' => $liv_sess_date,
            'user_book_live_sess' => $user_book_live_sess,
            'answer' => [],
            'plan_current' => $plan_current,
            'upcoming_pause' => $upcoming_pause,
            'pause_on_data' => $pause_on_data,
            'future_question' => $future_question,
            'user_package_data' => $user_package_data,
            'premium_package_data' => $premium_package_data,
            'exsiting_plan_renewal_price' => $exsiting_plan_renewal_price,
            'pop_up' => $pop_up,
            'coach_data' => $coach_data,
            'plus_coach_data' => $plus_coach_data
        ];
        // dd($data_customize);
        return $data_customize;
    }

    public function index(Request $request)
    {
        //dd($request);
        // print_r($_SERVER['HTTP_USER_AGENT']);die();
        $agent = isset($_SERVER['HTTP_USER_AGENT']) ? strtolower($_SERVER['HTTP_USER_AGENT']) : '';
        $isMob = is_numeric(strpos($agent, "mobile"));
        if ($isMob) {
            return redirect('/mobile');
        }
        // isset($_COOKIE['ralcurncy']) && ($_COOKIE['ralcurncy'] != 'inr'
        if (session()->get('role') == 'user' && session()->has('role')) {
            // $misc_mod = new Misc();
            // $getMob = $misc_mod->mobile_number_exsist($_POST['mob_no']);
            return redirect('/dashboard');
        }
        $get_data = $this->generic_index();
        $misc_model = new Misc();
        $coach_data = $misc_model->coach_data();
        $coach_assigned = false;
        $username = Session::get('username');
        $get_data = $this->generic_index();
        if($username > 0) {
            $check_for_coach = User::selectRaw('head_coach')->where('username', $username)->get();
            if (!empty($check_for_coach[0]->head_coach)) {
                $coach_assigned = true;
            }
        }
        return view('home', [
            'testimonials' => $get_data['testimonials'],
            'prices' => $get_data['prices'],
            'membership_details' => $get_data['membership_details'],
            'currency' => $get_data['currency'],
            'currency_icon' => $get_data['currency_icon'],
            'location' => $get_data['location'],
            'coach_data' => $coach_data,
            'coach_assigned' => $coach_assigned,
        ]);
    }

    public function new_web()
    {
        $get_data = $this->generic_index();
        return view('landing_page', [
            'testimonials' => $get_data['testimonials'],
            'prices' => $get_data['prices'],
            'membership_details' => $get_data['membership_details'],
            'currency' => $get_data['currency'],
            'currency_icon' => $get_data['currency_icon'],
            'location' => $get_data['location'],
        ]);
    }

    public function check_session()
    {
        //checking only for user and it is reusable function
        if (Session::get('role') == 'user' && Session::has('role')) {
            return true;
        } else {
            return false;
        }
    }

    public function dashboard()
    {
        if ($this->check_session()) {
            //calling timezone detection for user
            $user_data = User::where(['status' => 1, 'username' => Session::get('username')])->first();
            $coachDetail = null;
            if($user_data->head_coach != null) {
                $head_coach = Coach::where(['first_name' => $user_data->head_coach, 'team' =>   $user_data->team])->first();
                $coachDetail = CoachDetail::where('coach_id','=',$head_coach->id)->first();
            }
            if($user_data->head_coach == null) {
                $head_coach = null;
            }
            if ($user_data == Null) {
                Session::flush();
                return redirect('/');
            }
            $this->user_timezone();
            $isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
            if ($isMob) {
                return redirect('/mobile-dashboard');
            }
            $coach_assigned = false;
            $username = Session::get('username');
            if($username > 0) {
                $check_for_coach = User::selectRaw('head_coach')->where('username', $username)->get();
                // check for the coach assigned and plan not expired
                if (!empty($check_for_coach[0]->head_coach && $user_data->user_status != 11)) {
                    $coach_assigned = true;
                }
            }
            $get_data = $this->generic_after_login();
            // dd($get_data['premium_package_data']); exit;
            if (!isset($get_data['prices']))
                return redirect('/');
            return view('user_login', [
                'prices' => $get_data['prices'],
                'testimonials' => $get_data['testimonials'],
                'currency' => $get_data['currency'],
                'currency_icon' => $get_data['currency_icon'],
                'location' => $get_data['location'],
                'users' => $get_data['users'],
                'current_pause_plan' => $get_data['current_pause_plan'],
                'pause_plan' => $get_data['pause_plan'],
                'user_workday' => $get_data['user_workday'],
                'whatsapp_no' => $get_data['whatsapp_no'],
                'live_session_data' => $get_data['live_session_data'],
                'liv_sess_date' => $get_data['liv_sess_date'],
                'user_book_live_sess' => $get_data['user_book_live_sess'],
                'answer' => [],
                'plan_current' => $get_data['plan_current'],
                'upcoming_pause' => $get_data['upcoming_pause'],
                'pause_on_data' => $get_data['pause_on_data'],
                'user_package_data' => $get_data['user_package_data'],
                'premium_package_data' => $get_data['premium_package_data'],
                'future_question' => $get_data['future_question'],
                'exsiting_plan_renewal_price' => $get_data['exsiting_plan_renewal_price'],
                'pop_up' => $get_data['pop_up'],
                'coach_data' => $get_data['coach_data'],
                'plus_coach_data' => $get_data['plus_coach_data'],
                'coachDetail' => $coachDetail,
                'coach_assigned' => $coach_assigned,
                'existing_coach' => $head_coach
            ]);
        } else {
            return redirect('/');
        }
    }

    public function partner_profile_filled()
    {
        $user_data = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $status = true;
        if ($user_data->is_buddy) {
            $user_partner_data = User::where(['status' => 1, 'username' => $user_data->buddy_username])->first();
            if ($user_partner_data->is_profile_filled)
                $status = true;
            else
                echo $status = false;
        }
        echo $status;
    }

    public function question_filled()
    {
        $this->user_timezone();
        $misc_mod = new Misc();
        $users       =   User::where(['status' => 1, 'username' => Session::get('username')])->first();
        //For live session questionaire condition
        if ($users->member_type == 'Live Session') {
            $newDate = date("Y-m-d", strtotime($_POST['start_date']));
            $current_date = date('Y-m-d');
            if ($newDate == $current_date) {
                $username = Session::get('username');
                $referal_day = $misc_mod->total_referal_day_user($username);
                $user_plan_total_day = $users->total_workday;
                if (sizeof($referal_day)) {
                    $user_plan_total_day = $user_plan_total_day + $referal_day[0]->total_day;
                    $misc_mod->total_referal_day_update_status($username);
                }
                $current_date = date('Y-m-d');
                $user_stauts = [
                    'plan_start_date' => $current_date,
                    'plan_end_date' => date('Y-m-d', strtotime($current_date . ' + ' . $user_plan_total_day . ' days')),
                    'user_status' => 8,
                    'total_workday' => $user_plan_total_day
                ];
                $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_stauts);
                $mailData = array(
                    'to_email' => $users->email,
                    //            'to_email'=>'girish@six30labs.io',
                    'subject' => 'Liv Ezy - Your membership is now active',
                    'username' => $users->name,
                    'body' => 'Your Liv Ezy membership is now active. You\'ve joined thousands of others who are discovering the value that fitness adds to their lifestyles.',
                    'sub_text' => 'Here\'s to the beginning of something special.',
                    'user_cred' => $users->mob_no,
                    'password' => $users->username
                );
                $mail = \Illuminate\Support\Facades\Mail::send('emails.custom_email', ['data' => $mailData], function ($message) use ($mailData) {
                    $message->to($mailData['to_email']);
                    $message->subject($mailData['subject']);
                    //$message->bcc('admin@livezy.com');
                    $message->bcc('sahu4ever@gmail.com');
                    $message->setPriority(\Swift_Message::PRIORITY_HIGH);
                });
            } else {
                $user_stauts = [
                    'user_status' => 4,
                    'questionaire_start_date' => $newDate,
                ];
                $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_stauts);
            }
        } else {
            //For individual/buddy   questionaire condition
            if (isset($_POST['start_date'])) {
                $newDate = date("Y-m-d", strtotime($_POST['start_date']));
                $user_stauts = [
                    'user_status' => 3,
                    'questionaire_start_date' => $newDate,
                ];
                $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_stauts);
                if ($users->is_buddy) {
                    $buddy_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($user_stauts);
                }
            }
            if ($users->gender == 'Non-Binary')
                $users->gender = 'Male';
            $result = $misc_mod->get_question($users->gender);
            $view_file = 'question';
            $isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
            if ($isMob) {
                $view_file = 'mobile/mobile_question';
            }
            $returnHTML = view($view_file, ['data' => $result, 'gender' => $users->gender])->render(); // or method that you prefere to return data + RENDER is the key here
            if ($misc_mod->get_answer(Session::get('username'))) {
                $result = $misc_mod->get_question_renewal($users->gender, $users->username);
                $returnHTML = view('renewal_question', ['data' => $result, 'gender' => $users->gender])->render(); // or method that you prefere to return data + RENDER is the key here
            }
            return response()->json(array('success' => true, 'html' => $returnHTML));
        }
    }

    public function renew_question_view()
    {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $misc_mod = new Misc();
        $user_data = User::where(['status' => 1, 'username' => $username])->first();
        //$users = User::where(['status'=>1,'username' => Session::get('username')])->first();
        $gender = $user_data->gender;
        if ($gender == 'Non-Binary')
            $gender = 'Male';
        $result = $misc_mod->get_question_renewal('',$username);
        $fill_result = [];
        if ($misc_mod->get_answer_by_id($id))
            $fill_result = $misc_mod->get_answer_by_id($id);
        $returnHTML = view('renewal_question_view', ['data' => $result, 'gender' => $gender, 'answer' => $fill_result])->render(); // or method that you prefere to return data + RENDER is the key here
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function question_submit()
    {
        Log::info('question_submit by ' . Session::get('username'));
        $question_answer = $_POST['answer'];
        $users = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $ques_plan_update = [
            'user_status'          => 4,
            'eating_habbit'        => json_decode($question_answer, true)[2],
            // 'service_hour'      => json_decode($question_answer, true)[25],
            'question_submit_date' => date('Y-m-d')
        ];
        $question_insert = [
            'username'   => $users->username,
            'answer'     => $question_answer,
            'type'       => 'new',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $misc_mod = new Misc();
        $result_insert = $misc_mod->question_answer_insert($question_insert, $users->username);
        $users_update = User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($ques_plan_update);

        // Whatsapp notification
        $mobile_no     = $users->mob_no;
        $name          = $users->name;
        $template_name = "online_questionnaire_received_1";
        if ($mobile_no) {
            app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
        }
        echo true;
    }

    public function renewal_question_submit()
    {
        $question_answer = $_POST['answer'];
        $users       =   User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $ques_plan_update = [
            'user_status' => 4,
            'question_submit_date' => date('Y-m-d')
        ];
        $question_insert = [
            'username' => Session::get('username'),
            'answer' => $question_answer,
            'type' => 'renew',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $misc_mod = new Misc();
        $user_id = Session::get('username');
        $result_insert = $misc_mod->question_answer_insert($question_insert, $user_id);
        $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($ques_plan_update);
        // echo json_encode(json_decode($question_answer,true));
        echo true;
    }

    public function change_paswwd()
    {
        $c_password = $_POST['password'];
        $password_update = [
            'password' => bcrypt($c_password)
        ];
        $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($password_update);
        echo true;
    }

    public function change_paswwd_outside()
    {
        $c_password = $_POST['password'];
        $mob_no = $_POST['mob_no'];
        $password_update = [
            'password' => bcrypt($c_password)
        ];
        $users_update  =   User::where(['status' => 1, 'mob_no' => $mob_no])->limit(1)->update($password_update);
        echo true;
    }

    public function pause_plan()
    {
        $pause_start = strtotime($_POST['pause_start_date']);
        $pause_end = strtotime($_POST['pause_end_date']);
        $psd = $_POST['pause_start_date'];
        $ped = $_POST['pause_end_date'];
        $datediff = ($pause_end - $pause_start);
        $datediff = round($datediff / (60 * 60 * 24)) + 1;
        $users       =   User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $balance_pause = $users->total_pause_day - $users->pause_day_availed;
        $misc_mod = new Misc();
        $pause_data = $misc_mod->pause_details($users->username, $users->buddy_username);
        $exsist_diff = 15;
        $pause_status = 1;
        if ($pause_data) {
            $p = 0;
            if (sizeof($pause_data) > 0)
                $p = sizeof($pause_data) - 1;
            $exsist_pause_end_date = strtotime($pause_data[$p]->cancel_date);
            $exsist_pause_start_date = strtotime($pause_data[$p]->start_date);
            $exsist_diff = $pause_start - $exsist_pause_end_date;
            $exsist_diff = round($exsist_diff / (60 * 60 * 24));
            if ($exsist_diff < 0) {
                $exsist_diff = $exsist_pause_start_date - $pause_start;
                $exsist_diff = round($exsist_diff / (60 * 60 * 24));
            }
        }
        if ($pause_end < strtotime($users->plan_end_date)) {
            if ($datediff < 8 && $datediff > 2) {
                if ($exsist_diff > 14) {
                    if ($balance_pause >= $datediff) {
                        $pause_plan_update = [
                            'pause_day_availed' => $users->pause_day_availed + $datediff,
                            'plan_end_date' => date('Y-m-d', strtotime($users->plan_end_date . ' + ' . $datediff . ' days'))
                        ];
                        $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($pause_plan_update);
                        $pause_data_insert = [
                            'username' => Session::get('username'),
                            'start_date' => $psd,
                            'end_date' => $ped,
                            'cancel_date' => $ped,
                            'days' => $datediff,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                        ];
                        $misc_mod->data_pause_insert($pause_data_insert);
                        if ($users->is_buddy) {
                            $buddy_users_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                            $pause_data_insert_buddy = [
                                'username' => $users->buddy_username,
                                'start_date' => $psd,
                                'end_date' => $ped,
                                'cancel_date' => $ped,
                                'days' => $datediff,
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s')
                            ];
                            $misc_mod->data_pause_insert($pause_data_insert_buddy);
                        }
                    } else {
                        $pause_status = 'You have insufficient pause days';
                        if ($balance_pause == 0) {
                            $pause_status = 'You have exhausted all your pause days';
                        }
                    }
                } else {
                    $pause_status = '<b>Please Note: </b>The minimum number of days between 2 pauses should be at least 14 days';
                }
            } else {
                $pause_status = '<b>Please Note: </b>The minimum pause period is 3 days and the maximum pause period is 7 days';
            }
        } else {
            $pause_status = 'You cannot pause post your membership expiration date';
        }
        echo $pause_status;
    }

    public function cancel_pause()
    {
        $users       =   User::where(['status' => 1, 'username' => Session::get('username')])->first();
        //echo date('Y-m-d', strtotime($users->plan_end_date. ' + 90 days'));
        $misc_mod = new Misc();
        $pause_data = $misc_mod->running_pause_details(Session::get('username'), $users->buddy_username);
        $exsist_pause_start_date = strtotime($pause_data[0]->end_date);
        $curr_date = strtotime(date('Y-m-d'));
        $exsist_diff = $curr_date - $exsist_pause_start_date;
        $exsist_diff = round($exsist_diff / (60 * 60 * 24));
        $pause_data_day = $pause_data[0]->days;
        //
        $extend_date = $curr_date - strtotime($pause_data[0]->start_date);
        $extend_date = round($extend_date / (60 * 60 * 24)) + 1;
        if ($exsist_diff <= 3) {
            $pause_data_day = $pause_data_day - 3;
            $pause_plan_update = [
                'pause_day_availed' => $users->pause_day_availed - $pause_data_day,
                'user_status' => 8,
                'plan_end_date' => date('Y-m-d', strtotime($users->plan_end_date . ' -' . $extend_date . ' days'))
            ];
            //'plan_end_date'=>date('Y-m-d', strtotime($users->plan_end_date. ' +'.$extend_date.' days'))
            $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($pause_plan_update);
            $up_futur_pause = $misc_mod->data_pause_update(Session::get('username'), $pause_data[0]->start_date, $pause_data[0]->end_date, 3, $exsist_diff);
            $d_cal = $pause_data[0]->days + $exsist_diff + 1;
            $mailData = [
                'to_email' => $users->email,
                'subject' => 'Liv Ezy - Membership Resumed',
                'name' => $users->name,
                'days' => $d_cal ? $d_cal : 1,
                'voilation' => 1,
                'start_from' => date('d/m/Y', strtotime($pause_data[0]->start_date)),
                'end_to' => date('d/m/Y', strtotime($pause_data[0]->end_date)),
                'resume_date' => date('d/m/Y', strtotime($pause_data[0]->end_date . ' + 1 days'))
            ];
            $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_cancel', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                $message->subject($mailData['subject']);
                //$message->bcc('admin@livezy.com');
                $message->bcc('artisan.here@gmail.com');
            });
            if ($users->is_buddy) {
                $users_buddy_data       =   User::where(['status' => 1, 'username' => $users->buddy_username])->first();
                $up_futur_pause = $misc_mod->data_pause_update($users->buddy_username, $pause_data[0]->start_date, $pause_data[0]->end_date, 3, $exsist_diff);
                $users_update_buddy  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                $mailData = [
                    'to_email' => $users_buddy_data->email,
                    'subject' => 'Liv Ezy - Membership Resumed',
                    'name' => $users_buddy_data->name,
                    'days' => $d_cal ? $d_cal : 1,
                    'voilation' => 1,
                    'start_from' => date('d/m/Y', strtotime($pause_data[0]->start_date)),
                    'end_to' => date('d/m/Y', strtotime($pause_data[0]->end_date)),
                    'resume_date' => date('d/m/Y', strtotime($pause_data[0]->end_date . ' + 1 days'))
                ];
                $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_cancel', ['data' => $mailData], function ($message) use ($mailData) {
                    $message->to($mailData['to_email']);
                    $message->subject($mailData['subject']);
                    //$message->bcc('admin@livezy.com');
                    $message->bcc('artisan.here@gmail.com');
                });
            }
        } else {
            $pause_data_day = $pause_data_day - $exsist_diff;
            $pause_plan_update = [
                'pause_day_availed' => $users->pause_day_availed - $pause_data_day,
                'user_status' => 8,
                'plan_end_date' => date('Y-m-d', strtotime($users->plan_end_date . ' -' . $extend_date . ' days'))
            ];
            //'plan_end_date'=>date('Y-m-d', strtotime($users->plan_end_date. ' +'.$extend_date.' days'))
            $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($pause_plan_update);
            $up_futur_pause = $misc_mod->data_pause_update(Session::get('username'), $pause_data[0]->start_date, $pause_data[0]->end_date, 3, $exsist_diff);
            $mailData = [
                'to_email' => $users->email,
                'subject' => 'Liv Ezy - Membership Resumed',
                'name' => $users->name,
                'days' => $pause_data[0]->days,
                'voilation' => 0,
                'start_from' => date('d/m/Y', strtotime($pause_data[0]->start_date)),
                'end_to' => date('d/m/Y', strtotime($pause_data[0]->end_date)),
                'resume_date' => date('d/m/Y', strtotime($pause_data[0]->end_date . ' + 1 days'))
            ];
            $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_cancel', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                $message->subject($mailData['subject']);
                //$message->bcc('admin@livezy.com');
                $message->bcc('artisan.here@gmail.com');
            });
            if ($users->is_buddy) {
                $users_buddy_data       =   User::where(['status' => 1, 'username' => $users->buddy_username])->first();
                $users_update_buddy  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                $up_futur_pause = $misc_mod->data_pause_update($users->buddy_username, $pause_data[0]->start_date, $pause_data[0]->end_date, 3, $exsist_diff);
                $mailData = [
                    'to_email' => $users_buddy_data->email,
                    'subject' => 'Liv Ezy - Membership Resumed',
                    'name' => $users_buddy_data->name,
                    'days' => $pause_data[0]->days,
                    'voilation' => 0,
                    'start_from' => date('d/m/Y', strtotime($pause_data[0]->start_date)),
                    'end_to' => date('d/m/Y', strtotime($pause_data[0]->end_date)),
                    'resume_date' => date('d/m/Y', strtotime($pause_data[0]->end_date . ' + 1 days'))
                ];
                $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_cancel', ['data' => $mailData], function ($message) use ($mailData) {
                    $message->to($mailData['to_email']);
                    $message->subject($mailData['subject']);
                    //$message->bcc('admin@livezy.com');
                    $message->bcc('artisan.here@gmail.com');
                });
            }
        }
        echo true;
    }

    public function cancel_future_pause()
    {
        if ($_POST) {
            $users       =   User::where(['status' => 1, 'username' => Session::get('username')])->first();
            $misc_mod = new Misc();
            $u_id = $_POST['data']['username'];
            $s_d = $_POST['data']['start_date'];
            $e_d = $_POST['data']['end_date'];
            $pause_day = $_POST['data']['pause_day'];
            $u_e = date('Y-m-d', strtotime('-' . (int)$pause_day . ' day', strtotime($users->plan_end_date)));
            //$upcoming_pause=$misc_mod->pause_details_today($user_data->username,$user_data->plan_end_date);
            $f_e_d = $misc_mod->pause_details_today($users->username, 'true');
            $upcoming_future_con = $misc_mod->restrication_future_pause(Session::get('username'), $f_e_d[sizeof($f_e_d) - 1]->end_date);
            $e_d_u = $upcoming_future_con[0]->end_date;
            $status = 1;
            if ($e_d == $e_d_u) {
                $pause_plan_update = [
                    'pause_day_availed' => $users->pause_day_availed - (int)$pause_day,
                    'plan_end_date' => date('Y-m-d', strtotime('-' . (int)$pause_day . ' day', strtotime($users->plan_end_date)))
                ];
                $up_futur_pause = $misc_mod->data_pause_update($u_id, $s_d, $e_d, 0, (int)$pause_day);
                $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($pause_plan_update);
                if ($users->is_buddy) {
                    $up_futur_pause = $misc_mod->data_pause_update($users->buddy_username, $s_d, $e_d, 0, (int)$pause_day);
                    $users_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                }
            } else {
                if (strtotime($e_d_u) >= strtotime($u_e)) {
                    $status = 'You can not cancel this pause as one of your pause upcoming pause days is conflicting with your membership expiration. In order to proceed with this, you will first need to cancel that upcoming pause';
                } else {
                    $pause_plan_update = [
                        'pause_day_availed' => $users->pause_day_availed - (int)$pause_day,
                        'plan_end_date' => date('Y-m-d', strtotime('-' . (int)$pause_day . ' day', strtotime($users->plan_end_date)))
                    ];
                    $up_futur_pause = $misc_mod->data_pause_update($u_id, $s_d, $e_d, 0, (int)$pause_day);
                    $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($pause_plan_update);
                    if ($users->is_buddy) {
                        $up_futur_pause = $misc_mod->data_pause_update($users->buddy_username, $s_d, $e_d, 0, (int)$pause_day);
                        $users_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                    }
                }
            }

            echo $status;
        }
    }

    public function cancel_referal()
    {
        $users       =   User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $referal_action = [
            'referal_action' => 1
        ];
        $users_update  =   User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($referal_action);
        if ($users->is_buddy) {
            $users_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($referal_action);
        }
        echo true;
    }

    public function referal_code_check()
    {
        $referal_code = $_POST['r_code'];
        $member_type = $_POST['member_type'];
        $r_code_exist =  User::where(['referal_code' => $referal_code])
                                ->where('user_status', '<', 10)
                                ->where('user_status', '>', 7)
                                ->first();
        // log::info('r_code_exist: '.$r_code_exist);
        $admin = false;
        $ad_vc = '';
        $extend_day = 0;
        if ($r_code_exist) {
            if ($r_code_exist->member_type != 'Live Session')
                $extend_day = 14;
            else
                $extend_day = 7;
            if (Session::get('extension')) {
                $extend_day = 15;
                if ($r_code_exist->member_type != 'Live Session')
                    $extend_day = 30;
            }
        } elseif (!$r_code_exist) {
            $misc_mod = new Misc();
            if ($misc_mod->admin_code($referal_code)) {
                $ad_vc = $misc_mod->admin_code($referal_code);
                if (strpos($member_type, 'live') === false)
                    $extend_day = 14;
                else
                    $extend_day = 0;
            }
        }
        if ($extend_day)
            return $extend_day;
        else
            echo false;
    }
    public function referal_code_apply()
    {
        log::info('referal_code_apply: '.$_POST['r_code'].' --------- username: '.Session::get('username'));
        $referal_code   = $_POST['r_code'];
        $users          = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        //$r_code_exist   = User::where(['referal_code' => $referal_code,'user_status' => 2])->first();
        // $r_code_exist =  User::where(['referal_code' => $referal_code])
        //                         ->where('user_status', '<', 10)
        //                         ->where('user_status', '>', 7)->first();
        $whereCondition = [
            ['referal_code','=',$referal_code],
            ['user_status','>', 7],
            ['user_status','<', 10]
        ];
        $r_code_exist =  User::where($whereCondition)->first();

        $admin = false;
        $ad_vc = '';
        $extend_day = 7;
        if ($r_code_exist) {
            if ($r_code_exist->member_type != 'Live Session')
                $extend_day = 14;
            if (Session::get('extension')) {
                $extend_day = 15;
                if ($r_code_exist->member_type != 'Live Session')
                    $extend_day = 30;
            }
        } elseif (!$r_code_exist) {
            $misc_mod = new Misc();
            if ($misc_mod->admin_code($referal_code)) {
                $ad_vc = $misc_mod->admin_code($referal_code);
                $admin = true;
            }
        }
        if ($admin) {
            Log::info('Is Coach referal: '.json_encode($ad_vc). ' Username: '.$users->username);
            Log::info('-------------------------------------------------------');
            $misc_mod = new Misc();
            if ($users->member_type != 'Live Session') {
                $extend_day = 14;
                if (Session::get('extension')) {
                    $extend_day = 30;
                }
                // Get user's bought plan's total workdays
                $plan_workdays = $users->total_workday;
                $referal_data_insert = [
                    'username' => $ad_vc[0] ? $ad_vc[0]->coach_id : Session::get('username'),
                    // 'username' => Session::get('username'),
                    'code' => $referal_code,
                    'code_used_by' => Session::get('username'),
                    'no_of_days' => $extend_day,
                    'type' => 'Admin'
                ];
                $refer_pop_up = [
                    // add the extension of days to the user's total workdays.
                    'total_workday'=> $plan_workdays + $extend_day,
                    'referal_action' => 1,
                    'refered_by' => $ad_vc[0] ? $ad_vc[0]->coach_id : Session::get('username'),
                    'refered_type' => 'Admin'
                ];
                $misc_mod->data_referal_insert($referal_data_insert);
                $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($refer_pop_up);
                if ($users->is_buddy) {
                    $referal_data_insert['username'] = $users->buddy_username;
                    $misc_mod->data_referal_insert($referal_data_insert);
                    $users_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($refer_pop_up);
                }
                echo $extend_day;
            } else {
                echo false;
            }
        }

        // dd($r_code_exist);

        if ($r_code_exist) {
            $misc_mod = new Misc();
            $refer_plan_total_day = $r_code_exist->total_workday;
            // $referal_day=$misc_mod->total_referal_day_user(Session::get('username'));
            // if(sizeof($referal_day)){
            //     $refer_plan_total_day=$refer_plan_total_day+$referal_day[0]->total_day;
            //     $misc_mod->total_referal_day_update_status(Session::get('username'));
            // }
            $referal_add_expiration_day = [
                'plan_end_date' => date('Y-m-d', strtotime($r_code_exist->plan_end_date . ' + ' . $extend_day . ' days')),
                'total_workday' => $refer_plan_total_day + $extend_day
            ];
            $referal_data_insert = [
                'username' => Session::get('username'),
                'code' => $referal_code,
                'code_used_by' => Session::get('username'),
                'no_of_days' => $extend_day
            ];
            if ($r_code_exist->member_type == 'Live Session') {
                $referal_add_expiration_day = [
                    'plan_end_date' => date('Y-m-d', strtotime($r_code_exist->plan_end_date . ' + ' . $extend_day . ' days')),
                    'total_workday' => $refer_plan_total_day + $extend_day
                ];
                $referal_data_insert = [
                    'username' => Session::get('username'),
                    'code' => $referal_code,
                    'code_used_by' => Session::get('username'),
                    'no_of_days' => $extend_day
                ];
            }
            // Get user's bought plan's total workdays
            $plan_workdays = $users->total_workday;
            // $refer_pop_up=['referal_action'=>1];
            $refer_pop_up = [
                // add the extension of days to the user's total workdays.
                'total_workday'=> $plan_workdays + $extend_day,
                'referal_action' => 1,
                'refered_by' => $r_code_exist->username,
                'refered_type' => 'User'
            ];
            $misc_mod->data_referal_insert($referal_data_insert);
            $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($refer_pop_up);
            if ($users->is_buddy) {
                $referal_data_insert['username'] = $users->buddy_username;
                $misc_mod->data_referal_insert($referal_data_insert);
                $users_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($refer_pop_up);
            }
            $users_update_refered  =   User::where(['status' => 1, 'username' => $r_code_exist->username])->limit(1)->update($referal_add_expiration_day);
            $referal_data_insert['username'] = $r_code_exist->username;
            $misc_mod->data_referal_insert($referal_data_insert);
            $misc_mod->total_referal_day_update_status($referal_data_insert['username']);
            if ($r_code_exist->is_buddy) {
                $users_update_refered  =   User::where(['status' => 1, 'username' => $r_code_exist->buddy_username])->limit(1)->update($referal_add_expiration_day);
                $referal_data_insert['username'] = $r_code_exist->buddy_username;
                $misc_mod->data_referal_insert($referal_data_insert);
                $misc_mod->total_referal_day_update_status($referal_data_insert['username']);
            }
            echo $extend_day;
        } else {
            echo false;
        }
    }
    public function sendmail(Request $request)
    {
        // $this->validate($request, [
        //     'g-recaptcha-response' => 'required|captcha',
        // ]);
        $mail = new Mail;
        $mail->name = $_POST['full_name'];
        $mail->contact = $_POST['contact'];
        $mail->email = $_POST['email'];
        $mail->body = $_POST['message'];
        $mail->save();
        $msg = "Following are the details from Website Contact Form\n";
        // the message
        $msg = $msg . "Full Name: " . $_POST['full_name'] . "\n";
        $msg = $msg . "Email: " . $_POST['email'] . "\n";
        $msg = $msg . "Contact : " . $_POST['contact'] . "\n";
        $msg = $msg . "Message : " . $_POST['message'] . "\n";
        //        $headers = 'From:' . $_POST['email'];
        //        mail('support@ralfitness.in', "Contact Form details from Website", $msg, $headers);

        $mailData = array(
            //'to_email'=>'support@livezy.com',
            'to_email'  => 'artisan.here@gmail.com',
            'to_name'   => '',
            'full_name' => $_POST['full_name'],
            'email'     => $_POST['email'],
            'contact'   => $_POST['contact'],
            'message'   => $_POST['message'],
            'body_content' => $msg,
            'subject'   => '"Contact Form details from Website',
        );
        $mail = \Illuminate\Support\Facades\Mail::send('emails.custom_message', ['data' => $mailData], function ($message) use ($mailData) {
            $message->to($mailData['to_email']);
            $message->subject($mailData['subject']);
        });
        echo "Email Sent : \n";
        echo "Thankyou for contacting us, we will get back you soon \n";
    }

    public function apiGetURL()
    {
        //        $url = DB::table('jd')->where('data', null)->first();
        //
        //        DB::table('jd')->where('url', $url->url)->update([
        //            'data' => 1
        //        ]);
        //        echo $url->url;
    }

    public function apiPostURL(Request $request)
    {
        //        $url = DB::table('jd')->where('url', $request['url'])->first();
        //        if ($url) {
        //            $url = DB::table('jd')->where('data', null)->first();
        //            DB::table('jd')->where('url', $request['url'])->update([
        //                'data' => $request['city']
        //            ]);
        //        } else {
        //            $url = DB::table('jd')->where('data', null)->first();
        //            DB::table('jd')->insert([
        //                'url' => $request['url'],
        //                'data' => $request['city']
        //            ]);
        //        }
        //
        //
        //        $url = DB::table('jd')->where('data', null)->first();
        //        echo $url->url;
    }

    public function generateRandomString($length = 6)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public function activate_plan()
    {
        $whereCondition = ['status' => 1, 'username' => Session::get('username')];
        $users = User::where($whereCondition)->first();
        Log::info('User Details Before plan update - admin_assign_coach: '. $users->admin_assign_coach);
        if ($users) {
            $plan_id = $_POST['plan_id'];
            $id = $_POST['id'];
            $admin_assign_coach = $_POST['admin_assign_coach'];
            $misc_mod = new Misc();
            if($admin_assign_coach == 1) {      // For LivEzy Plus
                $plan_id_details = $misc_mod->get_plan_details($plan_id);
            } else {                            // For LivEzy Premium
                $plan_id_details = $misc_mod->get_premium_plan_details($plan_id);
                $coach_details   = $misc_mod->premium_package_data(Session::get('username'));
            }
            $plan_id_details = $plan_id_details[0];

            $previous_plan = [
                'username'                 => $users->username,
                'previous_plan'            => $users->plan . ' ' . $users->member_type,
                'previous_plan_id'         => $users->plan_id,
                'previous_team'            => $users->team,
                'previous_head_coach'      => $users->head_coach,
                'previous_sub_coach'       => $users->sub_coach,
                'current_plan'             => ucfirst($plan_id_details->type),
                'current_plan_id'          => $plan_id,
                'previous_plan_start_date' => $users->plan_start_date,
                'previous_plan_end_date'   => $users->plan_end_date
            ];
            $misc_mod->renewal_data_previous($previous_plan);
            Log::info('Previous Plan data added to renewal_history: '.json_encode($previous_plan));

            $plan_update = [
                'member_type'             => ucfirst($plan_id_details->type),
                'email'                   => $users->email,
                'plan'                    => ucfirst($plan_id_details->duration),
                'plan_id'                 => $plan_id,
                'is_subscription'         => 0,
                'is_buddy'                => ucfirst($plan_id_details->type) == 'Buddy' ? 1 : 0,
                'total_pause_day'         => $plan_id_details->pause,
                'partner_detailed_filed'  => 0,
                'pause_day_availed'       => 0,
                'plan_start_date'         => NULL,
                'plan_end_date'           => NULL,
                'questionaire_start_date' => NULL,
                'question_submit_date'    => NULL,
                'updated_at'              => date('Y-m-d H:i:s'),
                'total_workday'           => $plan_id_details->count_subscription * 30,
                'referal_code'            => $users->referal_code ? $users->referal_code : $this->generateRandomString(),
                'user_status'             => 2,
                'is_renewed'              => 1,
                'admin_assign_coach'      => $admin_assign_coach == 1 ? 1 : 0
            ];

            // Add Coach details of premium plan to the $plan_update array
            if(isset($coach_details)) {
                $plan_update += [
                    'team'       => $coach_details[0]->team,
                    'head_coach' => $coach_details[0]->first_name
                ];
                // Update coach slot to reduce by 1
                $coachController = new CoachController();
                $coachController->update_coach_slots($coach_details[0]->coach_det_id);
            }
            // Update the user's plan details
            $user_update = User::where($whereCondition)->limit(1)->update($plan_update);
            // Get user details after the plan update
            $user_data = User::where($whereCondition)->first();
            Log::info('User Details After plan update - admin_assign_coach: '. $user_data->admin_assign_coach);

            // If premium user activates plus plan then coach details set null. where $users->admin_assign_coach checks for admin_assign_coach before plan update and $user_data->admin_assign_coach checks for admin_assign_coach after plan update
            if($users->admin_assign_coach == 0 && $user_data->admin_assign_coach == 1) {
                $team_coach = [
                    'team'       => NULL,
                    'head_coach' => NULL
                ];
                User::where($whereCondition)->limit(1)->update($team_coach);
            }

            $session_data_ex = [
                'member_type'           => $users->member_type,
                'plan'                  => $users->plan,
                'plan_id'               => $users->plan_id,
                'user_status'           => $users->user_status
            ];
            Session::put($session_data_ex);
            if($admin_assign_coach == 1) {
                Log::info("From package_bought_update");
                $misc_mod->package_bought_update($users->username, $id);
            } else {
                Log::info("From premium_package_bought_update");
                $misc_mod->premium_package_bought_update($users->username, $id);
            }

            //to send invoice
            $mailData = array(
                'to_email' => $users->email,
                'subject' => 'Liv Ezy - Welcome back!',
                'user_name' => $users->name ? $users->name : '',
                'plan_details' => $plan_id_details->duration . ' Plan ' . $plan_id_details->type
            );
            $mail = \Illuminate\Support\Facades\Mail::send('emails.renew_bought_plan', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                // $message->bcc('admin@livezy.com');
                $message->bcc('artisan.here@gmail.com');
                $message->subject($mailData['subject']);
            });
            echo true;
        } else {
            echo false;
        }
    }

    public function sendWhatsAppMessage()
    {
        Log::info('sendWhatsAppMessage');

        $user = User::where(['status' => 1, 'username' => Session::get('username')])->first();

        Log::info('WhatsApp Notification sent to '.$user->username.' on failed transaction');

        // $url        = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/?expand[]=card';
        // $client     = new \GuzzleHttp\Client();
        // $response   = $client->get($url, [
        //     'auth'  => [
        //         'rzp_test_z0o2WJAmSQOwLW',
        //         'pgn6CBqAcMkLm7gBBIHTMgtb'
        //     ]
        // ]);
        // $result     = json_decode($response->getBody(), 1);
        // Log::info($result);
        // $user = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        // // Whatsapp notification
        // if($result['status'] === 'failed') {
            $mobile_no      = $user->mob_no;
            $name           = $user->name;
            $template_name  = "failed_payment";
            if ($mobile_no) {
                app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
            }
        //}
    }

    public function sendInvoice()
    {
        Log::info('sendInvoice');
        Log::info('XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX');
        $misc_mod = new Misc();

        $payment_id     = $_GET['plan_id'];
        $plan_id        = $_GET['member_plan_id'];
        $des_plan       = $_GET['desc'];
        $coach_det_id   = $_GET['coach_det_id'];
        $url            = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/?expand[]=card';
        $client         = new \GuzzleHttp\Client();
        $response       = $client->get($url, [
            'auth'      => [
                'rzp_test_z0o2WJAmSQOwLW',
                'pgn6CBqAcMkLm7gBBIHTMgtb'
            ]
        ]);
        $result         = json_decode($response->getBody(), 1);
        Log::info('invoice');
        Log::info($result);
        $membership_status = 1;
        $whereCondition = ['status' => 1, 'username' => Session::get('username')];
        $users = User::where($whereCondition)->first();

        Log::info('User Details Before plan update - admin_assign_coach: '. $users->admin_assign_coach);
        if ($users->user_status == 11) {
            $membership_status = 2;
        } elseif ($users->user_status >= 2 && $users->user_status < 11) {
            $membership_status = 3;
        }

        $gst_state     = $users->state == 'Karnataka' ? true : false;
        $plan_amount   = $result['amount']/100;
        $t_payment     = $plan_amount/1.18;
        $gst_tax       = ($t_payment*18)/100;
        $product_price = round($t_payment);
        $cgst = $gst_tax/2;
        $c_s_gst='-';
        $gst='-';
        if($gst_state){
            $c_s_gst = round($gst_tax/2);
        }else{
            $gst = round($gst_tax);
        }

        $result_ind = $misc_mod->last_invoice_id();
        $inv_no     = $result_ind[0]->id+1;
        $inv_no     = 'LE/'.$inv_no.'/';
        if(date('m')<04) {
            $inv_no = $inv_no.''.(date('y')-1).'-'.date('y');
        }
        else {
            $inv_no = $inv_no.''.date('y').'-'.''.(date('y')+1);
        }

        $payment = array(
            'invoice'                 => $payment_id . '.pdf',
            'invoice_no'              => $inv_no,
            'created_at'              => date('Y-m-d H:i:s'),
            'updated_at'              => date('Y-m-d H:i:s'),
            'razor_pay_id'            => $payment_id,
            'currency_type'           => $result['currency'],
            'taxable_amount'          => round($t_payment),
            'amount'                  => $result['amount']/100,
            'cgst'                    => $c_s_gst == 0 ? '-' : $c_s_gst,
            'sgst'                    => $c_s_gst == 0 ? '-' : $c_s_gst,
            'igst'                    => $gst == 0 ? '-' : $gst,
            'plan'                    => $result['description'],
            'mobile'                  => $result['contact'],
            'email'                   => $result['email'],
            'head_coach'              => $users->head_coach ? $users->head_coach : 'NA',
            'membership_status'       => $membership_status,
            //'country'               => isset($_COOKIE['ralcountry']) ? $_COOKIE['ralcountry'] : 'NA',
            //'state'                 => isset($_COOKIE['ralstate']) ? $_COOKIE['ralstate'] : 'NA',
            'status'                  => 'CONFIRMED',
            'response_from_razor_pay' => $response->getBody(),
            // Update the user details from user table - for GST details
            'name'                    => $users->name ? $users->name : '',
            'street'                  => $users->street,
            'city'                    => $users->city,
            'pincode'                 => $users->pincode,
            'state'                   => $users->state,
            'country'                 => $users->country
        );

        $payment_id         = Payment::create($payment);
        $payment_id->token  = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 30);
        $payment_id->save();

        if($users->admin_assign_coach == 1) {      // For LivEzy Plus
            $plan_id_details = $misc_mod->get_plan_details($plan_id);
        } else {                                   // For LivEzy Premium
            $plan_id_details = $misc_mod->get_premium_plan_details($plan_id);
        }
        $plan_id_details    = $plan_id_details[0];
        $plan_update = [
            'member_type'       => ucfirst($plan_id_details->type),
            'email'             => $users->email,
            'mob_no'            => $users->mob_no,
            'plan'              => ucfirst($plan_id_details->duration),
            'plan_id'           => $plan_id,
            'is_subscription'   => 0,
            'is_buddy'          => ucfirst($plan_id_details->type) == 'Buddy' ? 1 : 0,
            'total_pause_day'   => $plan_id_details->pause,
            'pause_day_availed' => 0,
            'total_workday'     => $plan_id_details->count_subscription * 30,
            'referal_code'      => $this->generateRandomString(),
            'user_status'       => 2
        ];
        if (isset($_COOKIE["is_renewal"]) && $users->user_status == 11) {
            Log::info('is_renewal 1 & user_status 11');
            $plan_update = [
                'member_type'             => ucfirst($plan_id_details->type),
                'plan'                    => ucfirst($plan_id_details->duration),
                'plan_id'                 => $plan_id,
                'is_subscription'         => 0,
                'is_buddy'                => ucfirst($plan_id_details->type) == 'Buddy' ? 1 : 0,
                'total_pause_day'         => $plan_id_details->pause,
                'partner_detailed_filed'  => 0,
                'pause_day_availed'       => 0,
                'plan_start_date'         => Null,
                'plan_end_date'           => NULL,
                'questionaire_start_date' => NULL,
                'question_submit_date'    => NULL,
                'updated_at'              => date('y-m-d'),
                'total_workday'           => $plan_id_details->count_subscription * 30,
                'user_status'             => 2,
                'is_renewed'              => 1
            ];
            $previous_plan = [
                'username'                 => Session::get('username'),
                'previous_plan'            => $users->plan . ' ' . $users->member_type,
                'previous_plan_id'         => $users->plan_id,
                'previous_team'            => $users->team,
                'previous_head_coach'      => $users->head_coach,
                'previous_sub_coach'       => $users->sub_coach,
                'current_plan'             => ucfirst($plan_id_details->type),
                'current_plan_id'          => $plan_id,
                'previous_plan_start_date' => $users->plan_start_date
            ];
            $misc_mod->renewal_data_previous($previous_plan);
            // Log::info('renewal_data_previous from sendInvoice: '.json_encode($previous_plan));
            setcookie('is_renewal', time() - 3600);
            // Whatsapp notification
            $mobile_no      = $users->mob_no;
            $name           = $users->name;
            $template_name  = "renewal_1";
            if ($mobile_no) {
                app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
            }
        }

        if ($users->user_status == 1 || $users->user_status == 11) {
            Log::info('new/renew_bought_plan');
            $current_status     =   $users->user_status;
            $users_update       =   User::where($whereCondition)->limit(1)->update($plan_update);
            // For getting user details after the update of plan etc
            $user_data          =   User::where($whereCondition)->first();
            Log::info('User Details After plan update - admin_assign_coach: '. $user_data->admin_assign_coach);

            // If premium user purchases plus plan then coach details set null. where $users->admin_assign_coach checks for admin_assign_coach before plan update and $user_data->admin_assign_coach checks for admin_assign_coach after plan update
            // check for admin_assigns_coach or user
            if(isset($_COOKIE["admin_assigns_coach"]) && $users->admin_assign_coach == 0) {
                Log::info('User premium to plus');
                $data = [
                    'team'               => NULL,
                    'head_coach'         => NULL,
                    'admin_assign_coach' => 1
                ];
                User::where($whereCondition)->limit(1)->update($data);
            }
            $session_data_ex    = [
                'member_type'   => $user_data->member_type,
                'plan'          => $user_data->plan,
                'plan_id'       => $user_data->plan_id,
                'user_status'   => $user_data->user_status
            ];
            Session::put($session_data_ex);
            if ($current_status == 11) {
                $mail_template  = 'emails.renew_bought_plan';
                $subject        = 'Liv Ezy - Welcome back!';
            }
            if ($current_status == 1) {
                Log::info('active_plan_bought');
                // Whatsapp notification
                $mobile_no      = $user_data->mob_no;
                $name           = $user_data->name;
                $template_name  = "post_purchase_1";
                if ($mobile_no) {
                    app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
                }

                $b_data = [
                    'username'  => $user_data->username,
                    'plan_id'   => $plan_id
                ];
                // add to table bought_package if user buys plus plan
                if($user_data->admin_assign_coach == 1) {
                    Log::info('sendInvoice - admin_assign_coach : '.$user_data->admin_assign_coach .' add plus plan');
                    $p_bought = $misc_mod->package_bought($b_data);
                    Log::info('updated to bought_package table in DB');
                } else {
                    Log::info('sendInvoice - user_assign_coach : '.$user_data->admin_assign_coach .' add premium plan');
                    $b_data += [
                        'coach_det_id' => $coach_det_id
                    ];
                    $p_bought = $misc_mod->premium_package_bought($b_data);
                }

                $new_user_mail  = 'emails.active_plan_bought';
                $subject        = 'Liv Ezy - Thank You For Choosing Us!';

                $mailData = array(
                    'to_email'  => $user_data->email ? $user_data->email : $result['email'],
                    'subject'   => $subject
                );
                $mail = \Illuminate\Support\Facades\Mail::send($new_user_mail, ['data' => $mailData], function ($message) use ($mailData) {
                    $message->to($mailData['to_email']);
                    $message->bcc('artisan.here@gmail.com');
                    $message->subject($mailData['subject']);
                });

                $mail_template  = 'emails.invoice';
                $subject        = 'Liv Ezy - Liv Ezy receipt';
            }
        }
        else {
            Log::info('Inside Else - adding extra plans for existing member!');
            // If user buys Premium plan
            if(isset($_COOKIE['user_assigns_coach'])) {
                Log::info('Adding extra plan to bought_premium_plan - LivEzy Premium');
                if($coach_det_id) {
                    Log::info('Coach Details is true, Coach Details ID:' . $coach_det_id);
                    $plan_data = [
                        'username'     => $users->username,
                        'coach_det_id' => $coach_det_id,
                        'plan_id'      => $plan_id,
                        'purchased_at' => date('Y-m-d H:i:s'),
                        'updated_at'   => date('Y-m-d H:i:s'),
                        'status'       => 0
                    ];
                    $misc_mod->premium_package_bought($plan_data);
                } else {
                    Log::info('Coach Details not found, for id:' . $coach_det_id);
                    return "Coach Details not found!";
                }

            } else {
                Log::info('Adding extra plan to bought_package - LivEzy Plus');
                $b_data=[
                    'username' => $users->username,
                    'plan_id'  => $plan_id,
                    'status'   => 0
                ];
                $misc_mod->package_bought($b_data);
            }
            $mail_template = 'emails.active_plan_bought';
            $subject = 'Liv Ezy - Liv Ezy receipt';
        }
        //to send invoice
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html($payment, $inv_no, $des_plan, $gst_state));
        $pdf_invoice    = $pdf->stream();
        file_put_contents('invoices/' . $payment['razor_pay_id'] . '.pdf', $pdf_invoice);

        Log::info('mail_template: '.$mail_template);
        // to send invoice
        $mailData = array(
            'to_email'      => $users->email ? $users->email : $result['email'],
            'subject'       => $subject,
            'url'           => 'https://livezy.com/e/' . $payment_id->token,
            'pay'           => $payment['razor_pay_id'] . '.pdf',
            'user_name'     => $users->name ? $users->name : '',
            'plan_details'  => $plan_id_details->duration . ' Plan ' . $plan_id_details->type
        );

        $mail = \Illuminate\Support\Facades\Mail::send($mail_template, ['data' => $mailData], function ($message) use ($mailData) {
            $message->to($mailData['to_email']);
            $message->bcc('artisan.here@gmail.com');
            $message->subject($mailData['subject']);
            $message->attach('invoices/' . $mailData['pay']);
        });

        return response()->json(['response' => true, 'message' => "Invoice generated successfully", 'status' => 200], 200);
    }

    public function zoom_list()
    {
        // $zoom = new Zoom();
        $user = Zoom::meeting()->create('RVifYkswTmqbbjKu9di0bQ', 2);
        echo '<pre>';
        print_r($user);
        //  return view('zoom.index');
    }

    public function generate_signature($api_key = '6jT9oA_oRE6lgcyQkNybcQ', $api_secret = 'Y1rgnUSwgycRBzRPagJZPWpgqj7FQPst6Sjc', $meeting_number = '82884068376', $role = '0')
    {
        //Set the timezone to UTC
        date_default_timezone_set("UTC");
        $time = time() * 1000 - 30000; //time in milliseconds (or close enough)
        $data = base64_encode($api_key . $meeting_number . $time . $role);
        $hash = hash_hmac('sha256', $data, $api_secret, true);
        $_sig = $api_key . "." . $meeting_number . "." . $time . "." . $role . "." . base64_encode($hash);
        //return signature, url safe base64 encoded
        echo rtrim(strtr(base64_encode($_sig), '+/', '-_'), '=');
    }

    public function sso()
    {
        $get_data = $this->generic_index();
        $mob = '+' . trim($_GET['mob_num']);
        $pass = $_GET['pass'];
        $misc_mod = new Misc();
        $result = $misc_mod->sso_user_exsit($mob, $pass);
        if (count($result) > 0) {
            $users       =   User::where(['status' => 1, 'mob_no' => $mob, 'status' => 1])->first();
            $session_data_ex = [
                'username'      => $users->username,
                'name'          => $users->name,
                'email'         => $users->email,
                'image'         => $users->image,
                'mob_no'        => $users->mob_no,
                'plan'          => $users->plan,
                'member_type'   => $users->member_type,
                'user_status'   => $users->user_status,
                'role'          => 'user'
            ];
            Session::put($session_data_ex);
            $session_data = ['enter_basic_details' => true];
            Session::put($session_data);
            return redirect('/');
        } else {
            return redirect('/');
        }
    }

    public function moneyFormatIndia($num)
    {
        setlocale(LC_MONETARY, 'en_IN');

        $explrestunits = "";

        if (strlen($num) > 3) {

            $lastthree = substr($num, strlen($num) - 3, strlen($num));

            $restunits = substr($num, 0, strlen($num) - 3); // extracts the last three digits

            $restunits = (strlen($restunits) % 2 == 1) ? "0" . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.

            $expunit = str_split($restunits, 2);

            for ($i = 0; $i < sizeof($expunit); $i++) {

                // creates each of the 2's group and adds a comma to the end

                if ($i == 0) {

                    $explrestunits .= (int)$expunit[$i] . ","; // if is first value , convert into integer

                } else {

                    $explrestunits .= $expunit[$i] . ",";
                }
            }

            $thecash = $explrestunits . $lastthree;
        } else {

            $thecash = $num;
        }

        return $thecash; // writes the final format where $currency is the currency symbol.

    }

    public function numberToWords($number)
    {
        $ones = array(
            0 => 'Zero',
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
            4 => 'Four',
            5 => 'Five',
            6 => 'Six',
            7 => 'Seven',
            8 => 'Eight',
            9 => 'Nine',
            10 => 'Ten',
            11 => 'Eleven',
            12 => 'Twelve',
            13 => 'Thirteen',
            14 => 'Fourteen',
            15 => 'Fifteen',
            16 => 'Sixteen',
            17 => 'Seventeen',
            18 => 'Eighteen',
            19 => 'Nineteen'
        );

        $tens = array(
            2 => 'Twenty',
            3 => 'Thirty',
            4 => 'Forty',
            5 => 'Fifty',
            6 => 'Sixty',
            7 => 'Seventy',
            8 => 'Eighty',
            9 => 'Ninety'
        );

        $number = number_format($number, 2, '.', '');
        $amount_parts = explode('.', $number);
        $rupees = intval($amount_parts[0]);
        $paise = intval($amount_parts[1]);

        $rupees_in_words = '';
        if ($rupees > 0) {
            if ($rupees >= 10000000) {
                $crores = floor($rupees / 10000000);
                $rupees -= $crores * 10000000;
                $rupees_in_words .= $this->numberToWords($crores) . ' Crore ';
            }

            if ($rupees >= 100000) {
                $lakhs = floor($rupees / 100000);
                $rupees -= $lakhs * 100000;
                $rupees_in_words .= $this->numberToWords($lakhs) . ' Lakh ';
            }

            if ($rupees >= 1000) {
                $thousands = floor($rupees / 1000);
                $rupees -= $thousands * 1000;
                $rupees_in_words .= $this->numberToWords($thousands) . ' Thousand ';
            }

            if ($rupees >= 100) {
                $hundreds = floor($rupees / 100);
                $rupees -= $hundreds * 100;
                $rupees_in_words .= $ones[$hundreds] . ' Hundred ';
            }

            if ($rupees > 0) {
                if ($rupees >= 20) {
                    $tens_digit = floor($rupees / 10);
                    $rupees -= $tens_digit * 10;
                    $rupees_in_words .= $tens[$tens_digit] . ' ';
                }

                $rupees_in_words .= $ones[$rupees];
            }
        }

        $paise_in_words = '';
        if ($paise > 0) {
            if ($paise >= 20) {
                $tens_digit = floor($paise / 10);
                $paise -= $tens_digit * 10;
                $paise_in_words .= $tens[$tens_digit] . ' ';
            }

            $paise_in_words .= $ones[$paise];
        }

        $result = $rupees_in_words;

        if ($paise > 0) {
            $result .= ' and ' . trim($paise_in_words) . ' Paise';
        }

        return $result;
    }

    public function convert_customer_data_to_html($payment,$inv_no,$des_plan,$gst_state)
    {
        Log::info('convert_customer_data_to_html');
        $contact_wa = Config::get('app.contact_whatsapp');
        $amount_in_words = $this->numberToWords($payment['amount']);

        $t_payment     = $payment['amount']/1.18;
        $gst_tax       = ($t_payment*18)/100;
        $product_price = $t_payment;
        $product_price = round($product_price);
        $cgst          = $gst_tax/2;
        $c_s_gst       = '-';
        $gst           = '-';
        if($gst_state == 'true'){
            $c_s_gst = round($gst_tax/2);
        }else{
            $gst = round($gst_tax);
        }

        $output = '<html>
        <head>
            <style>
                .top-image {
                    width: 100% !important;
                }
                .head-text {
                    color: #187FDE !important;
                }

                .table-primary {
                    --bs-table-bg: #187FDE !important;
                }

                /* Custom CSS for Table */

                table {
                    border-collapse: collapse;
                    width: 100%;
                    border: 1px solid #ddd;
                }

                th, td {
                    padding: 5px;
                    text-align: center;
                    border-bottom: 1px solid #ddd;
                    border: 1px solid #ddd;
                }

                th{
                    background-color: #2F5496;
                    color:#fff;
                }

                .text-center{
                    text-align:center;
                }

                .blue{
                    background-color: #2F5496;
                    color:#fff;
                }

                .white{
                    background-color: #fff !important;
                    color:#000 !important;
                }

                .table-div {
                    width:100%;
                }

                .gray{
                    background-color: #D9E2F3;
                }

                .content-flex::after {
                    content: "";
                    display: table;
                    clear: both;
                }

                .content {
                    float: left;
                }

                .content1 {
                    width: 70%;
                }

                .content2 {
                    width: 30%;
                }

                h4 {
                    margin-bottom:0px !important;
                }

                .footer {
                    margin-top: 1rem;
                    border-top: 1px solid #187FDE;
                }

                .fw-semibold {
                    font-weight:600;
                }

            </style>
        </head>
            <body>
                <div class="container m-auto">
                    <div class="logo">
                        <a href="https://www.livezy.com"><img class="top-image" src="https://livezy.com/fitness/images/invoice_header.png" style="line-height: 1;width: 100%;" alt="Liv Ezy"></a>
                    </div>

                    <div class="main-content">
                        <h4 class="head-text">LIV EZY ONLINE FITNESS PRIVATE LIMITED</h4>
                        <p class="fs-6">
                            3rd Floor, #2346, Siri Sambhavi, 17th Cross Road, <br/>
                            1st Sector, HSR Layout, Bengaluru – 560 102 <br/>
                            GSTN: 29AAECL4972F1Z8 <br />
                            <span class="fw-semibold">E-Mail: </span> support@livezy.com <br />
                            <span class="fw-semibold">Mobile: </span> '.$contact_wa.'
                        </p>

                        <div style="width:100%;">
                            <div class="content-flex">
                                <h4 class="text-left">Bill To,</h4>
                                <div class="content content1">
                                    <p class="fs-6">'.$payment['name'].'<br/>
                                        '.$payment['street'].'<br />
                                        '.$payment['city']." ".$payment['state'].'<br />
                                        '.$payment['country'].' – '.$payment['pincode'].'<br/><br />
                                        <span class="fw-semibold">E-Mail: </span>'.$payment['email'].'<br/>
                                        <span class="fw-semibold">Mobile: </span>'.$payment['mobile'].'
                                    </p>
                                </div>

                                <div class="content content2">
                                    <p class="fs-6">
                                        Invoice Date: '.date('j M Y', strtotime($payment['created_at'])).'<br/>
                                        Invoice No.: '.$inv_no.'
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="table-div mt-4">
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-white">S.No: </th>
                                        <th scope="col" class="text-white">Particulars</th>
                                        <th scope="col" class="text-white">HSN</th>
                                        <th scope="col" class="text-white">Amount (INR)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <th scope="row" class="white">01.</th>
                                        <td>'.ucwords($des_plan).'</td>
                                        <td>999723</td>
                                        <td>'.round($t_payment).'</td>
                                    </tr>

                                    <tr class="table-secondary gray">
                                        <th scope="row" class="gray"></th>
                                        <td>Sub-total</td>
                                        <td></td>
                                        <td><b>'.round($t_payment).'</b></td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="white"></th>
                                        <td></td>
                                        <td>CGST @ 9%</td>
                                        <td>'.$c_s_gst.'</td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="white"></th>
                                        <td></td>
                                        <td>SGST @ 9%</td>
                                        <td>'.$c_s_gst.'</td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="white"></th>
                                        <td></td>
                                        <td>IGST @18%</td>
                                        <td>'.$gst.'</td>
                                    </tr>

                                    <tr class="table-primary blue">
                                        <td colspan="3" class="text-white text-center"><b>Total</b></td>
                                        <td class="text-white"><b>'.$payment['amount'].'</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="final-content mt-4">
                            <p>
                                <span class="fw-semibold">In Words : </span>'.$amount_in_words.' Rupees<br/>
                            </p>
                            <p class="fw-semibold text-center fst-italic" style="margin-top:60px; font-style:italic; font-weight:700;">This is an electronically generated invoice, hence does not require a signature</p>
                        </div>

                        <div class="footer mt-5 border-top">
                            <p class="text-center head-text fs-6 pt-3">
                                3rd Floor, #2346, Siri Sambhavi, 17th Cross Road, <br/>
                                1st Sector, HSR Layout, Bengaluru – 560 102 <br/>
                                CIN: U74999KA2021PTC143576 <br/>
                                www.livezy.com
                            </p>
                        </div>
                    </div>

                    <img style="width:100%" src="https://livezy.com/fitness/images/invoice_footer.png"/>
                </div>
            </body>
        </html>';

        return $output;
    }

    public function receiveWebhook(Request $request)
    {
        Log::info('xxxxxxxxxxxxxxxxxxxxxxx');
        Log::info($request);
        if ($request['event'] == 'subscription.charged') {
            $payment = array(
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'razor_pay_id' => $request['payload']['payment']['entity']['id'],
                'currency_type' => $request['payload']['payment']['entity']['currency'],
                'amount' => $request['payload']['payment']['entity']['amount'] / 100,
                'plan' => $request['payload']['subscription']['entity']['plan_id'],
                'email' => $request['payload']['payment']['entity']['email'],
                'mobile' => $request['payload']['payment']['entity']['contact'],
                'country' => isset($request['payload']['payment']['entity']['notes']['country']) ? $request['payload']['payment']['entity']['notes']['country'] : '',
                'state' => isset($request['payload']['payment']['entity']['notes']['state']) ? $request['payload']['payment']['entity']['notes']['state'] : '',
                'subscription_id' => $request['payload']['subscription']['entity']['plan_id'],
                'status' => 'CAPTURED',
                'response_from_razor_pay' => json_encode($request),
                'token' => substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 30)
            );
            $payment_id = SubscriptionCapture::create($payment);
            //to send invoice
            $mailData = array(
                'to_email' => $payment['email'],
                'subject' => 'Ral Fitness - Thank You For Choosing Us!',
                'url' => 'https://livezy.com/s/' . $payment_id->token,
            );
            $mail = \Illuminate\Support\Facades\Mail::send('emails.invoice', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                $message->bcc('raldsouza.fitness@gmail.com');
                $message->subject($mailData['subject']);
            });
        }
    }

    public function sendSubscriptionInvoice()
    {
        Log::info('sendSubscriptionInvoice');
        $payment_id = $_GET['plan_id'];
        $plan_id = $_GET['member_plan_id'];
        $des_plan = $_GET['desc'];
        $coach_det_id   = $_GET['coach_det_id'];

        $url = 'https://api.razorpay.com/v1/payments/' . $payment_id . '/?expand[]=card';
        $client = new \GuzzleHttp\Client();
        $response = $client->get($url, [
            'auth' => [
                'rzp_test_z0o2WJAmSQOwLW',
                'pgn6CBqAcMkLm7gBBIHTMgtb'
            ]
        ]);
        $result = json_decode($response->getBody(), 1);

        $payment = array(
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'razor_pay_id' => $payment_id,
            'currency_type' => $result['currency'],
            'amount' => $result['amount'] / 100,
            'plan' => $result['plan_details'] . ' - ' . $_GET['plan_price'],
            'mobile' => $result['contact'],
            'email' => $result['email'],
            'country' => $result['notes']['country'],
            'state' => $result['notes']['state'],
            'subscription_id' => $_GET['subscription_id'],
            'status' => 'CONFIRMED',
            'response_from_razor_pay' => $response->getBody(),
        );
        $payment_id = Subscription::create($payment);
        $payment_id->token = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 30);
        $payment_id->save();

        $user = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $misc_mod = new Misc();
        if($user->admin_assign_coach == 1) {      // For LivEzy Plus
            $plan_id_details = $misc_mod->get_plan_details($plan_id);
        } else {                                  // For LivEzy Premium
            $plan_id_details = $misc_mod->get_premium_plan_details($plan_id);
        }
        $plan_id_details = $plan_id_details[0];
        $plan_update = [
            'member_type' => ucfirst($plan_id_details->type),
            'email' => $users->email,
            'plan' => ucfirst($plan_id_details->duration),
            'plan_id' => $plan_id,
            'is_subscription' => 0,
            'is_buddy' => ucfirst($plan_id_details->type) == 'Buddy' ? 1 : 0,
            'total_pause_day' => $plan_id_details->pause,
            'pause_day_availed' => 0,
            'total_workday' => $plan_id_details->count_subscription * 30,
            'referal_code' => $this->generateRandomString(),
            'user_status' => 2
        ];
        if (isset($_COOKIE["is_renewal"])) {
            $plan_update = [
                'member_type' => ucfirst($plan_id_details->type),
                'plan' => ucfirst($plan_id_details->duration),
                'plan_id' => $plan_id,
                'is_subscription' => 0,
                'is_buddy' => ucfirst($plan_id_details->type) == 'Buddy' ? 1 : 0,
                'total_pause_day' => $plan_id_details->pause,
                'partner_detailed_filed' => 0,
                'pause_day_availed' => 0,
                'plan_start_date' => Null,
                'plan_end_date' => NULL,
                'questionaire_start_date' => NULL,
                'question_submit_date' => NULL,
                'updated_at' => date('y-m-d'),
                'total_workday' => $plan_id_details->count_subscription * 30,
                'user_status' => 2
            ];
            $previous_plan = [
                'username' => Session::get('username'),
                'previous_plan' => $users->plan,
                'previous_plan_id' => $users->plan_id,
                'previous_team' => $users->team,
                'previous_head_coach' => $users->head_coach,
                'previous_sub_coach' => $users->sub_coach,
                'current_plan' => ucfirst($plan_id_details->type),
                'current_plan_id' => $plan_id,
                'previous_plan_start_date' => $users->plan_start_date
            ];
            $misc_mod = new Misc();
            $misc_mod->renewal_data_previous($previous_plan);
            setcookie('is_renewal', time() - 3600);
        }
        $users_update       =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($plan_update);
        $users       =   User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $session_data_ex = [
            'member_type' => $users->member_type,
            'plan'        => $users->plan,
            'plan_id'     => $users->plan_id,
            'user_status' => $users->user_status
        ];
        Session::put($session_data_ex);
        $result_ind = $misc_mod->last_invoice_id();
        $inv_no = $result_ind[0]->id + 1;
        $inv_no = 'LE/' . $inv_no . '/';
        if (date('m') < 04)
            $inv_no = $inv_no . '' . (date('y') - 1) . '-' . date('y');
        else
            $inv_no = $inv_no . '' . date('y') . '-' . '' . (date('y') + 1);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html($payment, $inv_no, $des_plan));
        $pdf_invoice = $pdf->stream();
        file_put_contents('insta_img/' . $payment['razor_pay_id'] . '.pdf', $pdf_invoice);
        //        //to send wlecome notification
        $mailData = array(
            'to_email' => $payment['email'],
            // 'to_email'=>'girish@six30labs.io',
            'subject' => 'Liv Ezy - Thank You For Choosing Us!',
            'url' => 'https://livezy.com/s/' . $payment_id->token,
            'pay' => $payment['razor_pay_id'],
        );
        $mail = \Illuminate\Support\Facades\Mail::send('emails.invoice', ['data' => $mailData], function ($message) use ($mailData) {
            $message->to($mailData['to_email']);
            //$message->bcc('pay@livezy.com');
            $message->bcc('artisan.here@gmail.com');
            $message->subject($mailData['subject']);
            $message->attach('insta_img/' . $mailData['pay'] . '.pdf');
        });
        if ($mail)
            unlink('insta_img/' . $payment['razor_pay_id'] . '.pdf');
    }
    public function explore()
    {
        if (isset($_GET['q']) && $_GET['q'] > 0) {
            $videos = RecipesVideo::where('id', $_GET['q'])->orderBy('id', 'desc')->get();
        } else {
            $videos = RecipesVideo::where('status', 1)->orderBy('id', 'desc')->get();
        }
        return view('explore', \compact('videos'));
    }

    public function live_workouts() {

        $get_data = $this->generic_index();
        return view('live_workouts',[
            'currency' => $get_data['currency'],
            'currency_icon' => $get_data['currency_icon']
        ]);

    }

    public function about() {

        return view('about');

    }

    public function explore_after_login()
    {
        if (isset($_GET['q']) && $_GET['q'] > 0) {
            $videos = RecipesVideo::where('id', $_GET['q'])->orderBy('id', 'desc')->get();
        } else {
            $videos = RecipesVideo::where('status', 1)->orderBy('id', 'desc')->get();
        }
        return view('explore_login', \compact('videos'));
    }

    public function autocomplete()
    {
        $videos = RecipesVideo::where('status', 1)
            ->where('title', 'like', '%' . $_GET['q'] . '%')
            ->orderBy('id', 'desc')
            ->pluck('title', 'id')
            ->toArray();
        return response()->json(['message' => $this->message_success_get, 'data' => $videos, 'count' => count($videos),'status' => 200], 200);
    }
    public function generateOrder(Request $request)
    {
        $api = new Api('rzp_test_z0o2WJAmSQOwLW', 'pgn6CBqAcMkLm7gBBIHTMgtb');
        $data = $api->order->create(
            array(
                'receipt' => '123',
                'amount' => $request['amount'],
                'payment_capture' => 1,
                'currency' => $request['currency']
            )
        );
        $data = $data->toArray();
        $order = new Order();
        $order->order_id = $data['id'];
        $order->save();
        return Response()->json([
            'data' => $data,
            'status' => 200,
            'message' => 'Status',
        ]);
    }

    public function verifyOrder(Request $request)
    {
        $api = new Api('rzp_test_z0o2WJAmSQOwLW', 'pgn6CBqAcMkLm7gBBIHTMgtb');
        $order = Order::where('order_id', $request->razorpay_order_id)->first();
        $order->payment_id = $request->razorpay_payment_id;
        if ($order) {
            try {
                $attributes = array(
                    'razorpay_order_id' => $request->razorpay_order_id,
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature' => $request->razorpay_signature
                );
                $data  = $api->utility->verifyPaymentSignature($attributes);
                $order->status = 2;
                $order->save();
                return Response()->json([
                    'data' => $request->razorpay_payment_id,
                    'status' => 200,
                    'message' => 'Status',
                ]);
            } catch (\Exception $e) {
            }
        }
        $order->save();
        $response = 'failure';
        $error = 'Razorpay Error : ' . $e->getMessage();
        return Response()->json([
            'data' => null,
            'status' => 500,
            'message' => Error,
        ]);
    }

    public  function createPlan(Request $request)
    {
        $api = new Api('rzp_test_z0o2WJAmSQOwLW', 'pgn6CBqAcMkLm7gBBIHTMgtb');
        $plan = $api->plan->create(
            array(
                'period'   => 'monthly',
                'interval' => 1,
                'item'     => array(
                    'name'        => $request['count'] . ' Months ' . $request['desc'] . ' Package',
                    'description' => 'Description for the weekly 1 plan',
                    'amount'      => $request['amount'],
                    'currency'    => $request['currency']
                )
            )
        );
        return Response()->json([
            'data'    => $plan->id,
            'status'  => 200,
            'message' => 'Status'
        ]);
    }

    public function createSubscription()
    {
        Log::info('createSubscription');
        $ch = curl_init();
        $key = 'rzp_test_z0o2WJAmSQOwLW';
        $secret = 'pgn6CBqAcMkLm7gBBIHTMgtb';
        $url = "https://$key:$secret@api.razorpay.com/v1/subscriptions";
        $plan_id = $_GET['plan_id'];
        $total_count = $_GET['count'];
        $start_at = time() + 3600;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "plan_id=$plan_id&start_at=$start_at&total_count=$total_count&customer_notify=1");
        $ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $curlresponse = curl_exec($ch); // execute
        if (curl_errno($ch))
            echo 'curl error : ' . curl_error($ch);
        if (empty($ret)) {
            curl_close($ch); // close cURL handler
            echo print_r($ch);
        } else {
            $info = curl_getinfo($ch);
            curl_close($ch); // close cURL handler
            $v = json_decode($curlresponse, 1)['id'];
            //    echo $curlresponse;
            echo $v;
        }
    }
    /* public function send_otp()
    {
        $key = $_ENV['2FKEY'];
        $mob_no = $_POST['mob_no'];
        $template_name = 'Mobile Number Verification';
        $url = 'https://2factor.in/API/V1/' . $key . "/" . "SMS/" . $mob_no . "/" . "AUTOGEN/" . $template_name;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));
        $response = curl_exec($curl);
        echo $response;
    } */
    public function send_otp()
    {
        $key = $_ENV['2FKEY'];
        $mob_no = $_POST['mob_no'];
        $template_name = 'Mobile Number Verification';
        $url = 'https://2factor.in/API/V1/' . $key . "/" . "SMS/" . $mob_no . "/" . "AUTOGEN/" . $template_name;

        $response = Http::get($url);
        $responseBody = $response->getBody();
        echo $responseBody;

        // $statusCode = $response->status();
        // $responseBody = json_decode($response->getBody(), true);
    }
    public function check_mob()
    {
        $mob_no = $_POST['mob_no'];
        $users       =   User::where(['status' => 1, 'mob_no' => $mob_no])->first();
        if ($users)
            return true;
        else
            return false;
    }
    public function logout()
    {
        Session::flush();
        // Added by furkan to prevent server reponse code 302
        //return redirect('/');
        return response()->json(['success' => true]);
    }
    public function common_change_country($country, $short_country_name, $city_country)
    {
        $ralcountry = $country;
        $s_c_nane = $short_country_name;
        $city = $city_country;
        $misc_mod = new Misc();
        $result = $misc_mod->get_country_currency($ralcountry);
        $ralcurncy = $result ? $result[0]->code : 'INR';
        $currency_icon = $result ? $result[0]->symbol : '₹';
        $currency_data = $this->get_currency_exchange(strtolower($ralcurncy));
        if (!$currency_data['success']) {
            $currency_icon = '₹';
            // $currency_data['rates']=1;
            $currency_data['rates']['INR'] = 1;
            $ralcurncy = 'INR';
            // $country_data->geoplugin_currencyCode='INR';
            // $country_data->geoplugin_currencySymbol_UTF8='₹';
        }
        setcookie("ralcountry", $ralcountry, time() + 7 * 24 * 60 * 60 * 1000, "/");
        // setcookie("ralstate", $country_data['region'], time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("s_c_nane", strtolower($s_c_nane), time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("city", $city, time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("ralcurncy", strtolower($ralcurncy), time() + 7 * 24 * 60 * 60 * 1000, "/");
        // setcookie("ral_currency", strtolower(data_get($country_data, 'currency.currency_code')), time() + 7 * 24 * 60 * 60 * 1000, "/");
        // $_COOKIE['ralcurncy']=strtolower(data_get($country_data, 'currency.currency_code'));
        // $_COOKIE['base_value']=strtolower(data_get($country_data, 'currency.currency_code'));
        setcookie("currency_icon", $currency_icon, time() + 7 * 24 * 60 * 60 * 1000, "/");
        // setcookie("base_value", $country_data->geoplugin_currencySymbol_UTF8, time() + 7 * 24 * 60 * 60 * 1000, "/");

        $exchange_calculation = $currency_data['rates'][strtoupper($ralcurncy)] / $currency_data['rates']['INR'];
        setcookie("base_value", round($exchange_calculation, 3), time() + 7 * 24 * 60 * 60 * 1000, "/");
        $_COOKIE['ralcurncy'] = strtolower($ralcurncy);
        $_COOKIE['base_value'] = round($exchange_calculation, 3);
        $_COOKIE['currency_icon'] = $currency_icon;
    }
    public function change_country()
    {
        if (Session::get('username')) {
            $users_update       =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($_POST);
            $ralcountry = $_POST['country'];
            $s_c_nane = $_POST['short_country_name'];
            $city = $_POST['city'];
            $misc_mod = new Misc();
            $currency_icon = '₹';
            // $currency_data['rates']=1;
            // $currency_data['rates']['INR']=1;
            $ralcurncy = 'INR';
            $result = $misc_mod->get_country_currency($ralcountry);
            if ($result) {
                $ralcurncy = $result[0]->code;
                $currency_icon = $result[0]->symbol;
            }

            setcookie("ralcountry", $ralcountry, time() + 7 * 24 * 60 * 60 * 1000, "/");
            // setcookie("ralstate", $country_data['region'], time() + 7 * 24 * 60 * 60 * 1000, "/");
            setcookie("s_c_nane", strtolower($s_c_nane), time() + 7 * 24 * 60 * 60 * 1000, "/");
            setcookie("city", $city, time() + 7 * 24 * 60 * 60 * 1000, "/");
            setcookie("ralcurncy", strtolower($ralcurncy), time() + 7 * 24 * 60 * 60 * 1000, "/");
            // setcookie("ral_currency", strtolower(data_get($country_data, 'currency.currency_code')), time() + 7 * 24 * 60 * 60 * 1000, "/");
            // $_COOKIE['ralcurncy']=strtolower(data_get($country_data, 'currency.currency_code'));
            // $_COOKIE['base_value']=strtolower(data_get($country_data, 'currency.currency_code'));
            setcookie("currency_icon", $currency_icon, time() + 7 * 24 * 60 * 60 * 1000, "/");
            // setcookie("base_value", $country_data->geoplugin_currencySymbol_UTF8, time() + 7 * 24 * 60 * 60 * 1000, "/");
            $currency_data = $this->get_currency_exchange(strtolower($ralcurncy));
            if (!$currency_data['success']) {
                $currency_icon = '₹';
                // $currency_data['rates']=1;
                $currency_data['rates']['INR'] = 1;
                $ralcurncy = 'INR';
                // $country_data->geoplugin_currencyCode='INR';
                // $country_data->geoplugin_currencySymbol_UTF8='₹';
            }
            $exchange_calculation = $currency_data['rates'][strtoupper($ralcurncy)] / $currency_data['rates']['INR'];
            setcookie("base_value", round($exchange_calculation, 3), time() + 7 * 24 * 60 * 60 * 1000, "/");
        } else {
            $ralcountry = $_POST['ral_country'];
            $s_c_nane = $_POST['s_c_nane'];
            $city = $_POST['city'];
            //    $ralcurncy=$_POST['ralcurncy'];
            //    $currency_icon=$_POST['currency_icon'];
            //    $base_value=$_POST['base_value'];
            $ralcurncy = 'INR';
            $currency_icon = '₹';
            $misc_mod = new Misc();
            $result = $misc_mod->get_country_currency($ralcountry);
            if ($result) {
                $ralcurncy = $result[0]->code;
                $currency_icon = $result[0]->symbol;
            }

            setcookie("ralcountry", $ralcountry, time() + 7 * 24 * 60 * 60 * 1000, "/");
            // setcookie("ralstate", $country_data['region'], time() + 7 * 24 * 60 * 60 * 1000, "/");
            setcookie("s_c_nane", strtolower($s_c_nane), time() + 7 * 24 * 60 * 60 * 1000, "/");
            setcookie("city", $city, time() + 7 * 24 * 60 * 60 * 1000, "/");
            setcookie("ralcurncy", strtolower($ralcurncy), time() + 7 * 24 * 60 * 60 * 1000, "/");
            // setcookie("ral_currency", strtolower(data_get($country_data, 'currency.currency_code')), time() + 7 * 24 * 60 * 60 * 1000, "/");
            // $_COOKIE['ralcurncy']=strtolower(data_get($country_data, 'currency.currency_code'));
            // $_COOKIE['base_value']=strtolower(data_get($country_data, 'currency.currency_code'));
            setcookie("currency_icon", $currency_icon, time() + 7 * 24 * 60 * 60 * 1000, "/");
            // setcookie("base_value", $country_data->geoplugin_currencySymbol_UTF8, time() + 7 * 24 * 60 * 60 * 1000, "/");
            $currency_data = $this->get_currency_exchange(strtolower($ralcurncy));
            if (!$currency_data['success']) {
                $currency_icon = '₹';
                // $currency_data['rates']=1;
                $currency_data['rates']['INR'] = 1;
                $ralcurncy = 'INR';
                // $country_data->geoplugin_currencyCode='INR';
                // $country_data->geoplugin_currencySymbol_UTF8='₹';
            }
            $exchange_calculation = $currency_data['rates'][strtoupper($ralcurncy)] / $currency_data['rates']['INR'];
            setcookie("base_value", round($exchange_calculation, 3), time() + 7 * 24 * 60 * 60 * 1000, "/");

            //         $format = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
            //    $string = $format->formatCurrency(123456789, 'JPY');
            //    echo get_currency_symbol($string);
        }
    }
    public function get_currency_symbol($string)
    {
        $symbol = '';
        $length = mb_strlen($string, 'utf-8');
        for ($i = 0; $i < $length; $i++) {
            $char = mb_substr($string, $i, 1, 'utf-8');
            if (!ctype_digit($char) && !ctype_punct($char))
                $symbol .= $char;
        }
        return $symbol;
    }

    public function get_ipdata() {
        // PHP code to obtain country, city,
        // continent, etc using IP Address
        //$publicIP = file_get_contents("http://ipecho.net/plain");
        //echo $publicIP; 139.162.78.33
        // Use JSON encoded string and converts
        // it into a PHP variable
        /*$ipdat = @json_decode(file_get_contents(
            "http://www.geoplugin.net/json.gp?ip=" . $ip
        )); */
        // echo '<pre>';
        // print_r($ipdat);die();

        //Added by Furkan
        // try {
        //     $api_key = '25fee643559d4f788d01c0a9b5b0d7db';
        //     $ipdata = @json_decode(file_get_contents(
        //         "https://ipgeolocation.abstractapi.com/v1/?api_key=".$api_key."&ip_address=".$ip
        //     ));
        // } catch(Exception $e) {
        //     $message = $e->getMessage();
        //     var_dump('Exception Message: '. $message);
        // }
        // finally{
        //     $api_key = '2cf6cd0bc25d4846974f7a7cf68c5b49';
        //     $ipdata = @json_decode(file_get_contents(
        //         "https://ipgeolocation.abstractapi.com/v1/?api_key=".$api_key."&ip_address=".$ip
        //     ));
        // }
        // dd($ipdata);
    }

    // public function get_county_city($ip)
    // {
    //     $api_key  = config('app.api_key');
    //     $ip_ad    = ($ip == '127.0.0.1') ? '106.214.61.159' : $ip;
    //     $url      = "https://ipgeolocation.abstractapi.com/v1/?api_key=".$api_key."&ip_address=".$ip_ad;

    //     // $ipdata = [];
    //     if(isset($_COOKIE['ip_data']) && !empty($_COOKIE['ip_data'])) {
    //         echo "<script>console.log('Return the cached data');</script>";
    //         // Return the cached data
    //         $cookie_data = $_COOKIE['ip_data'];
    //         $ipdata = json_decode($cookie_data, true);
    //     } else {
    //         echo "<script>console.log('Inside else');</script>";

    //         // Validate input IP
    //         if(!filter_var($ip_ad, FILTER_VALIDATE_IP)) {
    //             throw new Exception('Invalid IP address!');
    //         }

    //         // Fetch the data from the API
    //         $client   = new \GuzzleHttp\Client();
    //         $response = $client->request('GET', $url, ['verify' => false]);

    //         // Options for setting cookie
    //         $options = array(
    //             'expires'  => time() + (3600 * 3), // set expiration time to 3 hours from now
    //             'path'     => '/',
    //             'secure'   => true, // send cookie only over HTTPS
    //             'httponly' => true, // prevent JavaScript from accessing the cookie
    //             'samesite' => 'Lax' // restrict cookie to same site requests
    //         );

    //         $ipdata = json_decode($response->getBody(), true);
    //         if($ipdata !== null) {
    //             // Set cookies for caching
    //             setcookie('ip_data', json_encode($ipdata), $options);
    //         }
    //     }
    //     return $ipdata;
    // }

    // Encryption function to encrypt passed data for e.g cookie value
    function encrypt($data) {
        // Generate a random encryption key
        $key = random_bytes(32);
        // Generate a random IV (initialization vector)
        $iv = random_bytes(openssl_cipher_iv_length('AES-256-CBC'));
        // Encrypt the data using AES-256-CBC algorithm
        $encrypted_data = openssl_encrypt($data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
        // Combine the IV and encrypted data into a single string
        $result = base64_encode($iv . $encrypted_data);
        // Append the encryption key to the result (it will be needed for decryption)
        $result .= base64_encode($key);
        return $result;
    }

    // Decryption function to decrypt passed data for e.g cookie value
    function decrypt($data) {
        // Extract the encryption key from the end of the input
        $key = base64_decode(substr($data, -44));
        // Extract the IV and encrypted data from the input
        $data = base64_decode(substr($data, 0, -44));
        // Split the IV and encrypted data
        $iv = substr($data, 0, openssl_cipher_iv_length('AES-256-CBC'));
        $encrypted_data = substr($data, openssl_cipher_iv_length('AES-256-CBC'));
        // Decrypt the data using AES-256-CBC algorithm
        $result = openssl_decrypt($encrypted_data, 'AES-256-CBC', $key, OPENSSL_RAW_DATA, $iv);
        return $result;
    }




    public function get_currency_exchange($curr)
    {
        //85fb68cecbbbcab318e7f3e2488eb421
        //be6d09a416eb0541bdbf2e7ea5e44eea
        //e55d3240391ca4fa058686c810537c4b
        //http://data.fixer.io/api/latest?access_key=85fb68cecbbbcab318e7f3e2488eb421&format=1&base=EUR&symbols='.$curr.',INR'
        $cureency_data = file_get_contents('https://data.fixer.io/api/latest');
        return json_decode($cureency_data, true);
    }
    public function get_city()
    {
        $misc_mod = new Misc();
        $result = $misc_mod->get_city($_POST['country']);
        echo json_encode($result);
    }
    public function get_country()
    {
        $misc_mod = new Misc();
        $result = $misc_mod->get_country($_POST['key_up']);
        echo json_encode($result);
    }
    public function mob_available()
    {
        $misc_mod = new Misc();
        //$result = $misc_mod->mobile_number_exsist($_POST['mob_no']);
        $result=$misc_mod->mobile_number_exsist($_POST['dialCode'],$_POST['mob_no']);
        if (count($result) > 0)
            echo true;
        else
            echo false;
    }
    public function mob_available_partner()
    {
        $misc_mod = new Misc();
        $result = $misc_mod->mobile_number_available($_POST['mob_no']);
        if (sizeof($result) > 0 || sizeof($result) == 0)
            echo false;
        else
            echo true;
    }
    public function mob_available_password_set()
    {
        $misc_mod = new Misc();
        // Commented by Furkan
        // $result = $misc_mod->mobile_number_available($_POST['mob_no']);
        $result=$misc_mod->mobile_number_exsist($_POST['dialCode'],$_POST['mob_no']);
        if ($result[0]->password)
            echo true;
        else
            echo false;
    }
    public function login_other()
    {
        $ccode = $_POST['dialCode'];
        $mob=$_POST['mob_num'];
        $pass=$_POST['pass'];

        $misc_mod = new Misc();
        $result=$misc_mod->user_exist($ccode,$mob,$pass);
        if (count($result) > 0) {
            //$users       =   User::where(['status' => 1, 'mob_no' => $mob, 'status' => 1])->first();
            $session_data_ex = [
                'username'      => $result[0]->username,
                'name'          => $result[0]->name,
                'email'         => $result[0]->email,
                'image'         => $result[0]->image,
                'mob_no'        => $result[0]->mob_no,
                'plan'          => $result[0]->plan,
                'member_type'   => $result[0]->member_type,
                'user_status'   => $result[0]->user_status,
                'role'          => 'user'
            ];
            Session::put($session_data_ex);
            $session_data = ['enter_basic_details' => true];
            Session::put($session_data);
            echo true;
        } else {
            echo false;
        }
    }

    public function login_with_otp()
    {
        $mob = $_POST['mob_num'];
        $otp = $_POST['otp_v'];
        $session_otp = $_POST['sess_key'];
        $response = $this->two_factor($session_otp, $otp);
        if ($response['Status'] == 'Success') {
            $users       =   User::where(['status' => 1, 'mob_no' => $mob, 'status' => 1])->first();
            $session_data_ex = [
                'username'      => $users->username,
                'name'          => $users->name,
                'email'         => $users->email,
                'image'         => $users->image,
                'mob_no'        => $users->mob_no,
                'plan'          => $users->plan,
                'member_type'   => $users->member_type,
                'user_status'   => $users->user_status,
                'role'          => 'user'
            ];
            Session::put($session_data_ex);
            $session_data = ['enter_basic_details' => true];
            Session::put($session_data);
            echo true;
        } else {
            echo false;
        }
    }
    public function forget_otp_verify()
    {
        $otp = $_POST['otp_v'];
        $session_otp = $_POST['sess_key'];
        $response = $this->two_factor($session_otp, $otp);
        $status = '';
        if ($response['Status'] == 'Success') {
            $status = true;
        } else {
            $status = false;
        }
        return response();
    }
    public function forget_otp_verified()
    {
        $otp = $_POST['otp_v'];
        $session_otp = $_POST['sess_key'];
        $mob = $_POST['mob_num'];
        $pass = $_POST['n_pass'];
        $response = $this->two_factor($session_otp, $otp);
        if ($response['Status'] == 'Success') {
            $pass_data = ['password' => bcrypt($pass)];
            $users_update       =   User::where(['status' => 1, 'mob_no' => $mob])->limit(1)->update($pass_data);

            $users       =   User::where(['status' => 1, 'mob_no' => $mob])->first();
            $session_data_ex = [
                'username'      => $users->username,
                'name'          => $users->name,
                'email'         => $users->email,
                'image'         => $users->image,
                'mob_no'        => $users->mob_no,
                'plan'          => $users->plan,
                'member_type'   => $users->member_type,
                'user_status'   => $users->user_status,
                'role'          => 'user'
            ];
            Session::put($session_data_ex);
            $session_data = ['enter_basic_details' => true];
            Session::put($session_data);
            echo true;
        } else {
            echo false;
        }
    }
    public function otp_verified()
    {
        $mobile = $_POST['mob_no'];
        $email = $_POST['email'];
        $otp = $_POST['otp_v'];
        $session_otp = $_POST['sess_key'];

        // $response = json_decode($this->two_factor($session_otp, $otp));
        $response = $this->two_factor($session_otp, $otp);
        // echo $response['Status']; exit;
        // var_dump($response); exit;

        // if ($response->Status == 'Success') {
        if ($response['Status'] == 'Success') {
            $users       =   User::where(['status' => 1, 'mob_no' => $mobile, 'status' => 1])->first();
            if ($users) {
                $session_data_ex = [
                    'username'      => $users->username,
                    'name'          => $users->name,
                    'email'         => $users->email,
                    'image'         => $users->image,
                    'mob_no'        => $users->mob_no,
                    'plan'          => $users->plan,
                    'member_type'   => $users->member_type,
                    'user_status'   => $users->user_status,
                    'role'          => 'user'
                ];
                Session::put($session_data_ex);
                $session_data = ['enter_basic_details' => true];
                Session::put($session_data);
                echo true;
            } else {
                $username = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                $ip = $_SERVER['REMOTE_ADDR'];
                $google_ip = $this->get_country_city($ip);
                $user = User::create([
                    'mob_no'        =>  $mobile,
                    'email'         =>  $email,
                    'image'         => '',
                    'provider_id'   => 'mobile',
                    'provider'      => 'mobile',
                    'username'      => $username,
                    'plan'          => 'free',
                    'member_type'   => 'individual',
                    'user_status'   => 1,
                    'short_country_name' => $google_ip['country_code'],
                    'country'       => $google_ip['country'],
                    'city'          => $google_ip['city'],
                ]);
                $session_data_ex = [
                    'name'          => '',
                    'username'      => $username,
                    'mob_no'        =>  $mobile,
                    'email'         =>  $email,
                    'image'         => '',
                    'role'          => 'user',
                    'plan'          => 'free',
                    'member_type'   => 'individual',
                    'user_status'   => 1
                ];
                Session::put($session_data_ex);
                $session_data = ['enter_basic_details' => true];
                Session::put($session_data);
                echo true;
                // Log::info('index-mob-no: '.$this->index('mob_no'));
                // return $this->index('mob_no');
            }
        } else {
            echo false;
        }
    }
    public function two_factor($session_otp, $otp)
    {
        $key = $_ENV['2FKEY'];
        $url = 'https://2factor.in/API/V1/' . $key . "/" . "SMS/VERIFY/" . $session_otp . "/" . $otp;

        $response = Http::get($url);
        $responseBody = json_decode($response->getBody(), TRUE);
        return $responseBody;

        /* $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
            ),
        ));
        $response = curl_exec($curl); */
    }
    public function trek()
    {
        $currency = 'inr';
        $base_val = 1;
        $currency_icon = '&#8377;';
        $prices['trek_price'] = 500;
        return view('trek', [
            'prices' => $prices,
            'currency' => $currency,
            'currency_icon' => $currency_icon,
        ]);
    }
    public function saveUser()
    {
        if (isset($_POST['password']))
            $_POST['password'] = bcrypt($_POST['password']);
        $users_update       =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($_POST);
        $users       =   User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $session_data_ex = [
            'name'          => ucfirst($users->name),
            'email'         => $users->email,
            'image'         => $users->image,
            'mob_no'        => $users->mob_no,
            'plan'          => 'free',
            'type'          => 'individual',
            'role'          => 'user'
        ];
        Session::put($session_data_ex);
        if ($users_update)
            echo true;
        else
            echo false;
    }

    public function saveGstDetails()
    {
        $users_update = User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($_POST);
        $user = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $session_user_data = [
            'name'          => ucfirst($user->name),
            'mob_no'        => $user->mob_no,
            'email'         => $user->email
        ];
        Session::put($session_user_data);
        if ($users_update)
            echo true;
        else
            echo false;

    }
    public function question()
    {
        // $misc_mod=new Misc();
        // $result=$misc_mod->get_question('Female');
        // return view('question', [
        //     'data' => $result
        // ]);
        return view('sign_up_mail');
    }
    public function partner_email()
    {
        $email = $_POST['partner_email'];
        $misc_mod = new Misc();
        $result = $misc_mod->email_id_available($email);
        if (sizeof($result) > 0 || sizeof($result) == 0)
            echo true;
        else
            echo true;
    }
    public function partner_data()
    {
        $misc_mod       = new Misc();
        $mobile                 = $_POST['mob_no'];
        $mobile                 = str_replace(' ', '', $mobile);
        $email                  = $_POST['email'];
        $full_name              = $_POST['full_name'];
        $gender                 = $_POST['gender'];
        $existing               = $_POST['existing'];
        // check if the buddy user already exist as an user
        $user_check_details     = User::where(['status' => 1, 'mob_no' => $mobile])->first();
        $users_partner          = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        Log::info("Users partner: " . json_encode($users_partner));
        $buddy_data = User::where(['status' => 1, 'username' => $users_partner->buddy_username])->first();
        Log::info("buddy_data: " . json_encode($buddy_data));
        $username               = $existing ? $users_partner->buddy_username : str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
        Log::info("Username of buddy: " . json_encode($username));
        $user_update_data       = [
            'buddy_username' => $username,
            'partner_detailed_filed' => 1
        ];
        if ($existing) {
            Log::info("Inside existing");
            $plan_update    = [
                'plan'                      => $users_partner->plan,
                'member_type'               => $users_partner->member_type,
                'total_workday'             => $users_partner->total_workday,
                'plan_id'                   => $users_partner->plan_id,
                'is_subscription'           => $users_partner->is_subscription,
                'total_pause_day'           => $users_partner->total_pause_day,
                'pause_day_availed'         => $users_partner->pause_day_availed,
                'plan_start_date'           => NULL,
                'plan_end_date'             => NULL,
                'questionaire_start_date'   => NULL,
                'question_submit_date'      => NULL,
                'updated_at'                => date('Y-m-d H:i:s'),
                'user_status'               => 2,
                'admin_assign_coach'        => $users_partner->admin_assign_coach,   // added by furkan
                'team'                      => $users_partner->team,
                'head_coach'                => $users_partner->head_coach
            ];
            Log::info("Plan update for existing: " . json_encode($plan_update));
            $previous_plan  = [
                'username'                  => $users_partner->buddy_username,
                'previous_plan'             => $buddy_data->plan . ' ' . $users_partner->member_type,
                'previous_plan_id'          => $buddy_data->plan_id,
                'previous_team'             => $buddy_data->team,
                'previous_head_coach'       => $buddy_data->head_coach,
                'previous_sub_coach'        => $buddy_data->sub_coach,
                'current_plan'              => ucfirst($users_partner->member_type),
                'current_plan_id'           => $users_partner->plan_id,
                'previous_plan_start_date'  => $buddy_data->plan_start_date,
                'previous_plan_end_date'    => $buddy_data->plan_end_date
            ];
            Log::info("previous_plan data for Buddy: " . json_encode($previous_plan));
            $user_update_data = [
                'partner_detailed_filed'    => 1
            ];
            $misc_mod->renewal_data_previous($previous_plan);
            $users_update =   User::where(['status' => 1, 'username' => $users_partner->buddy_username])->limit(1)->update($plan_update);
        } else {
            Log::info("Inside else if not exists");
            $current_date_time = date('Y-m-d H:i:s');
            // Commented by Furkan for fixing bug of When choosing new buddy and after submitting details it doesn't create new user
            // if ($users_partner->buddy_username) {
            //     Log::info("Inside if users_partner->buddy_username");
            //     $buddy_log = [
            //         'username' => Session::get('username'),
            //         'buddy_username' => $users_partner->buddy_username,
            //         'done_by' => Session::get('username'),
            //         'unlink_date' => $current_date_time
            //     ];
            //     $misc_mod->buddy_log_insert($buddy_log);
            //     $buddy_update_data = ['buddy_username' => Null];
            //     $buddy_update = User::where(['status' => 1, 'username' => $users_partner->buddy_username])->limit(1)->update($buddy_update_data);
            // } elseif ($user_check_details) {

            if ($user_check_details) {
                Log::info("Inside user_check_details");
                $user_update_data = [
                    'buddy_username' => $user_check_details->username,
                    'partner_detailed_filed' => 1
                ];
                $username = $user_check_details->username;
                $plan_update_exist = [
                    'plan'                  => $users_partner->plan,
                    'member_type'           => $users_partner->member_type,
                    'total_workday'         => $users_partner->total_workday,
                    'plan_id'               => $users_partner->plan_id,
                    'is_subscription'       => $users_partner->is_subscription,
                    'total_pause_day'       => $users_partner->total_pause_day,
                    'pause_day_availed'     => $users_partner->pause_day_availed,
                    'user_status'           => 2,
                    'referal_code'          => $users_partner->referal_code,
                    'is_buddy'              => 1,
                    'buddy_username'        => Session::get('username'),
                    'partner_detailed_filed'=> 1,
                    'plan_start_date'       => NULL,
                    'plan_end_date'         => NULL,
                    'questionaire_start_date'=> NULL,
                    'question_submit_date'  => NULL,
                    'updated_at'            => date('y-m-d'),
                    'user_status'           => 2,
                    'referal_action'        => $users_partner->referal_action,
                    'team'                  => $users_partner->team,
                    'head_coach'            => $users_partner->head_coach,
                    'password'              => bcrypt('welcome'),
                    'admin_assign_coach'    => $users_partner->admin_assign_coach        // added by furkan
                ];
                Log::info("Plan update for user_check_details: " . json_encode($plan_update_exist));

                if ($user_check_details->buddy_username) {
                    $buddy_log = [
                        'username'          => $user_check_details->username,
                        'buddy_username'    => $user_check_details->buddy_username,
                        'done_by'           => Session::get('username'),
                        'unlink_date'       => $current_date_time
                    ];
                    $misc_mod->buddy_log_insert($buddy_log);
                    $buddy_update_data      = ['buddy_username' => NULL];
                    $buddy_update           =   User::where(['status' => 1, 'username' => $user_check_details->buddy_username])->limit(1)->update($buddy_update_data);
                }
                $users_update               =   User::where(['status' => 1, 'username' => $user_check_details->username])->limit(1)->update($plan_update_exist);
            } else {
                Log::info("Inside Else for totally new partner_data");
                if ($users_partner->buddy_username) {
                    Log::info("Inside if users_partner->buddy_username is changed to totally new user");
                    $buddy_log = [
                        'username' => Session::get('username'),
                        'buddy_username' => $users_partner->buddy_username,
                        'done_by' => Session::get('username'),
                        'unlink_date' => $current_date_time
                    ];
                    $misc_mod->buddy_log_insert($buddy_log);
                    $buddy_update_data = ['buddy_username' => Null];
                    $buddy_update = User::where(['status' => 1, 'username' => $users_partner->buddy_username])->limit(1)->update($buddy_update_data);
                }
                Log::info('team:'.$users_partner->team.' & head_coach:'.$users_partner->head_coach);
                $user = User::create([
                    'mob_no'                 => $mobile,
                    'email'                  => $email,
                    'provider_id'            => Session::get('username'),
                    'provider'               => 'member',
                    'username'               => $username,
                    'plan'                   => $users_partner->plan,
                    'member_type'            => $users_partner->member_type,
                    'total_workday'          => $users_partner->total_workday,
                    'plan_id'                => $users_partner->plan_id,
                    'is_subscription'        => $users_partner->is_subscription,
                    'short_country_name'     => $users_partner->short_country_name,
                    'country'                => $users_partner->country,
                    'city'                   => $users_partner->city,
                    'total_pause_day'        => $users_partner->total_pause_day,
                    'pause_day_availed'      => $users_partner->pause_day_availed,
                    'user_status'            => 2,
                    'referal_code'           => $users_partner->referal_code,
                    'is_buddy'               => 1,
                    'name'                   => $full_name,
                    'buddy_username'         => Session::get('username'),
                    'partner_detailed_filed' => 1,
                    'gender'                 => $gender,
                    'referal_action'         => $users_partner->referal_action,
                    'team'                   => $users_partner->team,
                    'head_coach'             => $users_partner->head_coach,
                    'password'               => bcrypt('welcome')
                ]);
                $user->update(['admin_assign_coach' => $users_partner->admin_assign_coach]);
            }
        }

        // Updating the slots for the respective premium coach if user enrolls in Premium plan
        if($users_partner->admin_assign_coach == 0) {
            Log::info("Updating the slots for the respective premium coach");
            $coach = Coach::where(['first_name' => $users_partner->head_coach, 'team' => $users_partner->team])->first();
            $coachDetail = CoachDetail::where('coach_id','=',$coach->id)->first();
            // Update coach slot to reduce by 1
            $coachController = new CoachController();
            $coachController->update_coach_slots($coachDetail->id);
        }

        $users_update   = User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_update_data);
        $referal_exist  = $misc_mod->referal_buddy(Session::get('username'));
        if ($referal_exist) {
            $referal_data_insert = [
                'username' => $username,
                'code' => $referal_exist[0]->code,
                'code_used_by' => Session::get('username'),
                'no_of_days' => 14
            ];
            $misc_mod->data_referal_insert($referal_data_insert);
        }
        $email_id = $email ? $email : $buddy_data->email;
        Log::info('Email sent to: ' . $email_id);
        $mailData = [
            'to_email' => $email_id,
            'subject' => 'Welcome to Liv Ezy',
            "mobile" => $mobile,
            "password" => 'welcome'
        ];
        $mail = \Illuminate\Support\Facades\Mail::send('partner_login', ['data' => $mailData], function ($message) use ($mailData) {
            $message->to($mailData['to_email']);
            $message->subject($mailData['subject']);
        });
        echo true;
    }

    public function testing()
    {
        $result = Coach::leftJoin('coach_details', 'coach_details.coach_id', '=', 'coach.id')
            ->selectRaw('coach.id, coach.first_name, coach.last_name, coach.mob_number, coach.email_id, coach.role, coach.is_disabled, coach.team, coach.profile_url, coach.coach_whatsapp, coach.gender, coach_details.id as coach_det_id, coach_details.designation, coach_details.coach_tier, coach_details.slots, coach_details.display_order, coach_details.cert_short, coach_details.instagram, coach_details.experience, coach_details.clients_trained, coach_details.about_coach, coach_details.focus_areas, coach_details.img_banner, coach_details.img_profile')
            ->where('coach.is_disabled', '=', 1)
            ->where('coach_details.coach_tier', '<>', 'classic')
            ->inRandomOrder()
            ->get();
        dd($result);
    }

    public function test2()
    {
        //
    }

    public function test3()
    {
        //
    }

    public function general_email()
    {
        die();
        $misc_mod = new Misc();
        //where you find
        $all_user_data = $misc_mod->where_you_find();
        echo 'Total Sign up: ' . sizeof($all_user_data) . '</br>InstaGram: 66<br>Client Referal: 44</br></br>';
        for ($i = 0; $i < sizeof($all_user_data); $i++) {
            echo $all_user_data[$i]->answer . '<br>';
        }
        die();
        // $p_r=$misc_mod->payment_gst();
        // $ar=[];
        // for($i=0;$i<sizeof($p_r);$i++){
        //     $data=[
        //         'Created_Date'=>$p_r[$i]->created_at,
        //         'Amount'=>$p_r[$i]->amount,
        //         'Fee'=>$p_r[$i]->response_from_razor_pay!='Admin'?json_decode($p_r[$i]->response_from_razor_pay)->fee/100:'Custom',
        //         'Tax'=>$p_r[$i]->response_from_razor_pay!='Admin'?json_decode($p_r[$i]->response_from_razor_pay)->tax/100:'Custom',
        //         'Plan'=>$p_r[$i]->plan,
        //         'Country'=>$p_r[$i]->country,
        //         'State'=>$p_r[$i]->state
        //     ];
        //     array_push($ar,$data);
        //     // die();
        // }
        // echo '<pre>';
        // print_r($ar);
        // die();
        $misc_mod_model = $misc_mod;
        $all_user_data = $misc_mod->all_user_data();
        // die();
        // print_r($all_user_data);
        // die();
        // $mailData=[
        //     'to_email'=>'chandan.sinha.660@gmail.com',
        //     'subject'=>'Diwali Offers Are Now Live!',
        //     'name'=>'Chandan',
        //     'body_text'=>'Great news! Our Diwali offers are now live! you can now renew your subscription with us at exciting prices.'
        // ];
        // $mail= \Illuminate\Support\Facades\Mail::send('emails.general', ['data'=>$mailData], function ($message) use($mailData) {
        //     $message->to($mailData['to_email']);
        //     $message->subject($mailData['subject']);
        //     // $message->attach('fitness/images/Sale1.png');
        //     // $message->attach('fitness/images/Sale2.png');
        //     // $message->attach('fitness/images/Sale3.png');

        //     // $message->bcc('admin@livezy.com');
        // });
        die();
        if (sizeof($all_user_data) > 0) {
            for ($i = 0; $i < sizeof($all_user_data); $i++) {
                if (($all_user_data[$i]->email && $all_user_data[$i]->status == 1 && $all_user_data[$i]->plan_end_date >= '2021-10-28') || ($all_user_data[$i]->user_status > 1 && $all_user_data[$i]->user_status > 8)) {
                    $mailData = [
                        'to_email' => $all_user_data[$i]->email,
                        'subject' => 'Offer Ends Today!',
                        'name' => $all_user_data[$i]->name ? $all_user_data[$i]->name : '',
                        'body_text' => ''
                    ];
                    $mail = \Illuminate\Support\Facades\Mail::send('emails.general', ['data' => $mailData], function ($message) use ($mailData) {
                        $message->to($mailData['to_email']);
                        $message->subject($mailData['subject']);
                        // $message->attach('fitness/images/Sale1.png');
                        // $message->attach('fitness/images/Sale2.png');
                        // $message->attach('fitness/images/Sale3.png');
                        //     // $message->bcc('admin@livezy.com');
                    });
                    echo $all_user_data[$i]->email . '<br>';
                    // die();
                }
                // if($all_user_data[$i]->email && $all_user_data[$i]->status==1 && $all_user_data[$i]->plan_end_date>='2021-07-30' && $all_user_data[$i]->plan_end_date<'2021-10-28'){
                //      echo $all_user_data[$i]->email.' renewal expire'.'<br>';
                // $mailData=[
                //     'to_email'=>$all_user_data[$i]->email,
                //     'subject'=>'Diwali Offers Are Now Live!',
                //     'name'=>$all_user_data[$i]->name?$all_user_data[$i]->name:'',
                //     'body_text'=>'Great news! Our Diwali offers are now live! you can now renew your subscription with us at exciting prices.'
                // ];
                // $mail= \Illuminate\Support\Facades\Mail::send('emails.general', ['data'=>$mailData], function ($message) use($mailData) {
                //     $message->to($mailData['to_email']);
                //     $message->subject($mailData['subject']);
                //     // $message->attach('fitness/images/Sale1.png');
                //     // $message->attach('fitness/images/Sale2.png');
                //     // $message->attach('fitness/images/Sale3.png');
                //     // $message->bcc('admin@livezy.com');
                // });
                // }
                // elseif(($all_user_data[$i]->email && $all_user_data[$i]->status==1 && $all_user_data[$i]->plan_end_date>='2021-10-28') || ($all_user_data[$i]->user_status>1 && $all_user_data[$i]->user_status>8)){
                //     echo $all_user_data[$i]->email.' existing member'.'<br>';
                //     $mailData=[
                //         'to_email'=>$all_user_data[$i]->email,
                //         'subject'=>'Diwali Offers Are Now Live!',
                //         'name'=>$all_user_data[$i]->name?$all_user_data[$i]->name:'',
                //         'body_text'=>'Great news! Our Diwali offers are now live! you can now renew your subscription with us at exciting prices.'
                //     ];
                //     $mail= \Illuminate\Support\Facades\Mail::send('emails.general', ['data'=>$mailData], function ($message) use($mailData) {
                //         $message->to($mailData['to_email']);
                //         $message->subject($mailData['subject']);
                //         // $message->attach('fitness/images/Sale1.png');
                //         // $message->attach('fitness/images/Sale2.png');
                //         // $message->attach('fitness/images/Sale3.png');
                //         // $message->bcc('admin@livezy.com');
                //     });
                // }

            }
        }
    }

    public function join_session()
    {
        $sess_id = $_POST['sess_id'];
        $user_id = Session::get('username');
        $misc_mod = new Misc();
        $result = $misc_mod->join_session_update($sess_id, $user_id);
    }

    public function feedback_update_live_sess()
    {
        $sess_id = $_POST['sess_id'];
        $user_id = Session::get('username');
        $misc_mod = new Misc();
        $result = $misc_mod->feedback_session_update($sess_id, $user_id);
        $sess_details = $misc_mod->session_by_id($sess_id);
        $rename_sess = '';
        switch ($sess_details[0]->session_name) {
            case 'HIIT':
                $rename_sess = 'HIIT';
                break;
            case 'SNC':
                $rename_sess = 'DB SNC';
                break;
            case 'Yoga':
                $rename_sess = 'Power Yoga';
                break;
            case 'Dance':
                $rename_sess = 'Dance Fitness';
                break;
        }
        return 'Rate your ' . $rename_sess . ' session with ' . ucfirst($sess_details[0]->coach_name);
    }

    public function feedback_insert()
    {
        $sess_id = $_POST['sess_id'];
        $user_id = Session::get('username');
        $star = $_POST['star'];
        $comment = trim($_POST['comment']);
        $data = [
            'username' => $user_id,
            'star' => $star,
            'comment' => $comment,
            'session_id' => $sess_id
        ];
        $misc_mod = new Misc();
        $result = $misc_mod->feedback_session_insert($data);
    }

    public function feedback_insert_intro()
    {
        $user_id = Session::get('username');
        $star = $_POST['star'];
        $comment = trim($_POST['comment']);
        $data = [
            'username' => $user_id,
            'star' => $star,
            'comment' => $comment
        ];
        $misc_mod = new Misc();
        $user_stauts = [
            'intro_call' => 1,
        ];
        $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_stauts);
        $result = $misc_mod->feedback_intro_call_insert($data);
    }

    public function real_time_insert()
    {
        $misc_mod = new Misc();
        $user_stauts = [
            'real_time_database' => 1,
        ];
        $users_data       =   User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $description = 'Free member bought the ' . $users_data->member_type . ' plan for ' . $users_data->plan;
        $notification_type = 'Sign Up';
        $created_type = 'Super admin';
        $created_by = 5;
        $current_date_notifi = date('Y-m-d H:i:s');
        $data_insert_notification = [
            'description' => $description,
            'notification_type' => $notification_type,
            'team_name' => 'Internal',
            'created_type' => $created_type,
            'created_by' => $created_by,
            'username' => Session::get('username'),
            'created_at' => $current_date_notifi
        ];
        if ($users_data->real_time_database == 0) {
            $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_stauts);
            $result_notification = $misc_mod->notification_data_insert($data_insert_notification);
        }
    }

    public function mobile()
    {
        // Session::flush();
        // return redirect('/');
        $isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
        if (!$isMob) {
            return redirect('/');
        }
        $testimonials = Testimonial::where('status', 1)->where('show_in_homepage', 1)->orderBy('display_order', 'asc')->limit(4)->get();
        if (session()->get('role') == 'user' && session()->has('role')) {
            //return $this->check_mob($mob_no);
            return redirect('/mobile-dashboard');
        }
        $get_data = $this->generic_index();
        $misc_model = new Misc();
        $coach_data = $misc_model->coach_data();
        $coach_assigned = false;
        $username = Session::get('username');
        $get_data = $this->generic_index();
        if($username > 0) {
            $check_for_coach = User::selectRaw('head_coach')->where('username', $username)->get();
            if (!empty($check_for_coach[0]->head_coach)) {
                $coach_assigned = true;
            }
        }
        return view('mobile/index', [
            'testimonials' => $get_data['testimonials'],
            'prices' => $get_data['prices'],
            'membership_details' => $get_data['membership_details'],
            'currency' => $get_data['currency'],
            'currency_icon' => $get_data['currency_icon'],
            'location' => $get_data['location'],
            'coach_data' => $coach_data,
            'coach_assigned' => $coach_assigned
        ]);
    }

    public function future_question_date_select()
    {
        Log::info('future_question_date_select');
        $uid = Session::get('username');
        $question_date = $_POST['start_date'];
        $misc_mod = new Misc();
        $users       =   User::where(['status' => 1, 'username' => Session::get('username')])->first();
        if (isset($_POST['start_date'])) {
            $newDate = date("Y-m-d", strtotime($_POST['start_date']));
            $user_stauts = [
                'questionaire_start_date' => $newDate
            ];
            $f_data = [
                'username' => Session::get('username'),
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ];
            $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_stauts);
            $misc_mod->future_questionaire_insert($f_data);
            if ($users->is_buddy) {
                $buddy_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($user_stauts);
                $f_data = ['username' => $users->buddy_username];
                $misc_mod->future_questionaire_insert($f_data);
            }
            // Whatsapp notification
            $mobile_no = $users->mob_no;
            $name = $users->name;
            $template_name = "online_coaching_start_later_1";
            if ($mobile_no) {
                app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
            }
        }
    }

    public function mobile_dashboard()
    {
        if (session()->get('role') == 'user' && session()->has('role')) {
            $isMob = is_numeric(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), "mobile"));
            if (!$isMob) {
                return redirect('/');
            }
            $user_data = User::where(['status' => 1, 'username' => Session::get('username')])->first();
            if ($user_data == Null) {
                Session::flush();
                return redirect('/');
            }
            $coachDetail = null;
            if($user_data->head_coach != null) {
                $head_coach = Coach::where(['first_name' => $user_data->head_coach, 'team' =>   $user_data->team])->first();
                $coachDetail = CoachDetail::where('coach_id','=',$head_coach->id)->first();
            }

            if($user_data->head_coach == null) {
                $head_coach = null;
            }
            $this->user_timezone();
            //$user_data = User::where(['status' => 1, 'username' => Session::get('username')])->first();
            $coach_assigned = false;
            $username = Session::get('username');
            if($username > 0) {
                $check_for_coach = User::selectRaw('head_coach')->where('username', $username)->get();
                if (!empty($check_for_coach[0]->head_coach)) {
                    $coach_assigned = true;
                }
            }
            $get_data = $this->generic_after_login();
            return view('mobile/mobile-dashboard', [
                'prices' => $get_data['prices'],
                'testimonials' => $get_data['testimonials'],
                'currency' => $get_data['currency'],
                'currency_icon' => $get_data['currency_icon'],
                'location' => $get_data['location'],
                'users' => $get_data['users'],
                'current_pause_plan' => $get_data['current_pause_plan'],
                'pause_plan' => $get_data['pause_plan'],
                'user_workday' => $get_data['user_workday'],
                'whatsapp_no' => $get_data['whatsapp_no'],
                'live_session_data' => $get_data['live_session_data'],
                'liv_sess_date' => $get_data['liv_sess_date'],
                'user_book_live_sess' => $get_data['user_book_live_sess'],
                'answer' => [],
                'plan_current' => $get_data['plan_current'],
                'upcoming_pause' => $get_data['upcoming_pause'],
                'pause_on_data' => $get_data['pause_on_data'],
                'user_package_data' => $get_data['user_package_data'],
                'premium_package_data' => $get_data['premium_package_data'],
                'future_question' => $get_data['future_question'],
                'exsiting_plan_renewal_price' => $get_data['exsiting_plan_renewal_price'],
                'pop_up' => $get_data['pop_up'],
                'coach_data' => $get_data['coach_data'],
                'coachDetail' => $coachDetail,
                'coach_assigned' => $coach_assigned,
                'user_data' => $user_data,
                'existing_coach' => $head_coach
            ]);
        } else {
            return redirect('/mobile');
        }
    }

    public function user_coach_assignment()     // this method works for only premium tiers
    {
        $username = Session::get('username');
        // $coach_assigned = false;
        // if($username > 0) {
        //     $check_for_coach = User::selectRaw('head_coach')->where('username', $username)->get();
            // print_r($check_for_coach[0]->head_coach); exit;
        //     if (!empty($check_for_coach[0]->head_coach)) {
        //         $coach_assigned = true;
        //     }
        // }
        // log::info('boolean result: '.($coach_assigned));

        // if($coach_assigned) {
            // log::info('its false'); exit;
        //     echo "false";
        // } else {
            // log::info('its true'); exit;
            $team               = $_POST['team_name'];
            $head_coach         = $_POST['coach_name'];
            $coach_det_id       = $_POST['coach_det_id'];
            $users_data         = User::where(['status' => 1, 'username' => $username])->first();

            // Updates the payments table with coach name
            $payment_data = Payment::where('mobile',$users_data->mob_no)->latest()->first();
            $payment_data->head_coach = $head_coach;
            $payment_data->name = $users_data->name;
            $payment_data->save();

            $description        = 'User <b>' . $users_data->name . '</b> and User Id <b>' . $users_data->username . '</b> is assigned to ' . $team . ' and head coach ' . $head_coach;
            $notification_type  = 'Sign Up';
            $team_name          = $team;
            $created_type       = 'User';
            $created_by         = $username;
            $created_at         = date('Y-m-d H:i:s');
            $data_insert_notification   = [
                'description' => $description,
                'team_name' => $team,
                'notification_type' => $notification_type,
                'created_type' => $created_type,
                'created_by' => $created_by,
                'username' => $username,
                'created_at' => $created_at
            ];
            $data = [
                'team'               => $team,
                'head_coach'         => $head_coach,
                'admin_assign_coach' => 0,
                'sub_coach'          => null,
                'is_renewed'         => 0
            ];
            $team_condition = true;
            if ($users_data->is_buddy == 1) {
                Log::info('Coach Details: ' . json_encode($data));
                $buddy_username = $users_data->buddy_username;
                log::info('buddy_username - '.$buddy_username);
                // if $buddy_username not available
                $buddy_data     = User::where(['status' => 1, 'username' => $buddy_username])->first();
                log::info('Buddy data: '.json_encode($buddy_data));
                if($buddy_data) {
                    Log::info('Inside if buddy_data true');
                    if ($buddy_data->team) {
                        Log::info('Inside if buddy_data team is true');
                        if ($buddy_data->team != $team || $buddy_data->head_coach != $head_coach) {
                            Log::info('Inside if buddy_data team != team');
                            DB::table('users')->where('id', $buddy_data->id)->update(['team' => $team, 'head_coach' => $head_coach]);

                            $misc_mod2 = new Misc();
                            // $coachController      = new CoachController();
                            // $result_coach_details2 = $coachController->update_coach_slots($coach_det_id);
                            $result_coach_details2   = true;

                            $description2        = 'User <b>' . $buddy_data->name . '</b> and User Id <b>' . $buddy_data->username . '</b> is assigned to ' . $team . ' and head coach ' . $head_coach;
                            $data_insert_notification2   = [
                                'description' => $description2,
                                'team_name' => $team,
                                'notification_type' => $notification_type,
                                'created_type' => $created_type,
                                'created_by' => $created_by,
                                'username' => $buddy_data->username,
                                'created_at' => $created_at
                            ];

                            if($result_coach_details2) {
                                $result_notification    = $misc_mod2->notification_data_insert($data_insert_notification2);
                                $result_user_table      = $misc_mod2->update_team_assign($buddy_data->username, $data);
                                echo true;
                            } else {
                                echo false;
                            }
                        }
                    } else {
                        log::info('Else buddy team not found');
                        DB::table('users')->where('id', $buddy_data->id)->update(['team' => $team, 'head_coach' => $head_coach]);

                        // $misc_mod = new Misc();
                        // $coachController      = new CoachController();
                        // $result_coach_details = $coachController->update_coach_slots($coach_det_id);
                    }
                }
            }
            // dd('exit');
            if ($team_condition) {
                log::info('if team_condition is true.');
                $misc_mod               = new Misc();
                log::info('coach_det_id: '.$coach_det_id);
                // Update coach slot to reduce by 1
                $coachController      = new CoachController();
                $result_coach_details = $coachController->update_coach_slots($coach_det_id);
                if($result_coach_details) {
                    Log::info('result_coach_details - true');
                    $result_notification    = $misc_mod->notification_data_insert($data_insert_notification);
                    $result_user_table      = $misc_mod->update_team_assign($username, $data);
                    echo true;
                } else {
                    echo false;
                }
            } else {
                echo false;
            }
        // }
    }

    public function meet_the_team(Request $request)
    {
        $misc_model = new Misc();
        $coach_data = $misc_model->coach_data();
        $get_data = $this->generic_index();
        // dd($coach_data);
        $coach_assigned = false;
        $username = Session::get('username');
        if($username > 0) {
            $check_for_coach = User::selectRaw('head_coach')->where('username', $username)->get();
            if (!empty($check_for_coach[0]->head_coach)) {
                $coach_assigned = true;
            }
        }

        $gender = $request->gender;
        $tier   = $request->tier;
        if($request->ajax()) {
            if(!empty($request->gender) && !empty($request->tier)) {
                $coach_data = $coach_data->where(['gender' => $request->gender, 'coach_tier' => $request->tier])->get();
                return response()->json(['coach_data'=>$coach_data]);
            }
        }

        return view('meet-the-team', [
            'coach_data' => $coach_data,
            'coach_assigned' => $coach_assigned,
            'prices' => $get_data['prices'],
            'membership_details' => $get_data['membership_details'],
            'currency' => $get_data['currency'],
            'currency_icon' => $get_data['currency_icon'],
            'location' => $get_data['location'],
        ]);
    }

    public function send_email_to_members()
    {
        // Mail for Paid members (with more than 1 days left)
        // $first_mails    = ['sahu4ever@gmail.com','artisan.here@gmail.com'];
        $first_array    = User::select('email')->whereBetween('user_status', [2, 9])->get();
        $first_mails    = array();
        foreach ($first_array as $user) {
            $first_mails[]  = $user['email'];
        }

        // dd($first_mails);
        $mailData = [
            'first_mails'  => $first_mails,
            'emailSubject' => 'New Renewal Pricing Structure'
        ];
        \Illuminate\Support\Facades\Mail::send('emails.notify_new_prices_paid', ['data'=>$mailData],
            function($message) use ($mailData) {
                $message->bcc($mailData['first_mails']);
                $message->subject($mailData['emailSubject']);
                $message->attach('insta_img/livezy-buddy-renewal.png');
                $message->attach('insta_img/livezy-individual-renewal.png');
            }
        );


        // Mail for all members (Paid & Unpaid)
        // $second_mails   = ['artisan.here@gmail.com','sahu4ever@gmail.com'];
        $second_array   = User::select('email')->get();
        $second_mails   = array();
        foreach ($second_array as $user) {
            $second_mails[]  = $user['email'];
        }
        // dd($second_mails);

        $mailData = [
            'second_mails'  => $second_mails,
            'emailSubject' => 'New Pricing Structure'
        ];
        \Illuminate\Support\Facades\Mail::send('emails.notify_new_prices_to_all', ['data'=>$mailData],
            function($message) use ($mailData) {
                $message->bcc($mailData['second_mails']);
                $message->subject($mailData['emailSubject']);
                $message->attach('insta_img/livezy-buddy-new-member.png');
                $message->attach('insta_img/livezy-individual-new-member.png');
            }
        );

    }

    public function get_coach_profile($profile_url)
    {
        $coach_profile      = Coach::leftJoin('coach_details', 'coach_details.coach_id', '=', 'coach.id')
                                ->selectRaw('coach.id,
                                    coach.first_name,
                                    coach.last_name,
                                    coach.mob_number,
                                    coach.email_id,
                                    coach.role,
                                    coach.is_disabled,
                                    coach.team,
                                    coach.profile_url,
                                    coach_details.coach_id,
                                    coach_details.id as coach_det_id,
                                    coach_details.designation,
                                    coach_details.coach_tier,
                                    coach_details.slots,
                                    coach_details.display_order,
                                    coach_details.cert_short,
                                    coach_details.instagram,
                                    coach_details.experience,
                                    coach_details.clients_trained,
                                    coach_details.about_coach,
                                    coach_details.focus_areas,
                                    coach_details.img_banner,
                                    coach_details.img_profile')
                                ->where('coach.profile_url', $profile_url)
                                ->get();

        $transformations    = CoachTransformation::leftJoin('coach', 'coach_transformations.coach_id', '=', 'coach.id')
                                ->selectRaw('coach_transformations.image,
                                            coach_transformations.client_name,
                                            coach_transformations.testimonials')
                                ->where(['coach.profile_url' => $profile_url])
                                // ->where(['coach.is_disabled' => 1, 'coach.profile_url' => $profile_url])
                                ->get();
        // echo sizeof($transformations);
        // dd($transformations);

        $certifications    = CoachCertification::leftJoin('coach', 'coach_certificates.coach_id', '=', 'coach.id')->selectRaw('coach_certificates.cert_image, coach_certificates.cert_name')
                                ->where(['coach.profile_url' => $profile_url])
                                ->get();
        // echo sizeof($certifications);
        // dd($certifications);

        $coach_assigned = false;
        $username = Session::get('username');
        if($username > 0) {
            $check_for_coach = User::selectRaw('head_coach')->where('username', $username)->get();
            // print_r($check_for_coach[0]->head_coach); exit;
            if (!empty($check_for_coach[0]->head_coach)) {
                $coach_assigned = true;
            }
        }
        $get_data = $this->generic_index();
        $users = User::where(['status' => 1, 'username' => $username])->first();
        return view('profile', [
            'coach_profile'      => $coach_profile,
            'transformations'    => $transformations,
            'certifications'     => $certifications,
            'coach_assigned'     => $coach_assigned,
            'prices'             => $get_data['prices'],
            'currency'           => $get_data['currency'],
            'currency_icon'      => $get_data['currency_icon']
        ]);
    }
}

?>
