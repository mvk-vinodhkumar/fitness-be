<?php
namespace App\Http\Controllers;

use App\Http\Controllers\CoachController;
use App\Models\BoughtPackage;
use App\Models\BoughtPremiumPlan;
use App\Models\Coach;
use App\Models\CoachDetail;
use App\Models\FutureDateMembers;
use App\Models\MembershipDetails;
use App\Models\PremiumMembershipDetails;
use App\Models\IntroCallFeedback;
use App\Models\MemberExtension;
use App\Models\Misc;
use App\Models\Mail;
use App\Models\PausePlan;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Notification;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Question;
use App\Models\QuestionAnswer;
use App\Models\RenewalQuestion;
use App\Models\RenewalHistory;
use App\Models\RecipesVideo;
use App\Models\VoucherCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Razorpay\Api\Api;
use Log;
use Auth;
use Config;
use DB;
use File;

// $_ENV['2FKEY'] = 'b268a8fb-651f-11eb-8153-0200cd936042';

class UserController extends Controller
{
    public function __construct()
    {
        $this->no_data_message         = 'No Data Found';
        $this->success_message_saved   = 'Data saved successfully';
        $this->success_message_store   = 'Data stored successfully';
        $this->success_message_get     = 'Data retrieved successfully';
        $this->success_message_deleted = 'Document deleted successfully';
        $this->success_message_list    = 'All data listed successfully';
        $this->success_message_status  = 'Status updated successfully';
    }

    public function generateRandomString($length = 6)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public function two_factor($session_otp, $otp)
    {
        $key = $_ENV['2FKEY'];
        $url = 'https://2factor.in/API/V1/' . $key . "/" . "SMS/VERIFY/" . $session_otp . "/" . $otp;

        $response = Http::get($url);
        $responseBody = json_decode($response->getBody(), true);
        return $responseBody;
    }

    public function login_other()
    {
        $dial_code = $_POST['dial_code'];
        $mobile_no = $_POST['mobile_no'];
        $password = $_POST['password'];

        $mobile = '+' . $dial_code . $mobile_no;

        $credentials = [
            'mob_no' => $mobile,
            'password' => $password,
        ];

        // dd(Auth::attempt($credentials));

        if (Auth::attempt($credentials)) {

            $password = bcrypt($_POST['password']);

            $result = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no Like '%" . $mobile_no . "%' AND `status` = 1");
            // dd($result);
            if ($result) {
                $res1 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no Like '%0" . $mobile_no . "%' AND `status` = 1");
                if ($res1) {
                    $mobile = '+' . $dial_code . '0' . $mobile_no;
                    $res2 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no = $mobile AND `status` = 1");
                    if ($res2) {$result = $res2;} else {
                        $mobile = '+' . $dial_code . $mobile_no;
                        $res3 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no = $mobile AND `status` = 1");
                        $result = $res3;
                    }
                } else {
                    $mobile = '+' . $dial_code . $mobile_no;
                    $res4 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no = $mobile AND `status` = 1");
                    $result = $res4;
                }
            }
        }

        if (count($result) > 0) {
            $user = Auth::user();
            $session_data_ex = [
                'id' => $result[0]->id,
                'username' => $result[0]->username,
                'name' => $result[0]->name,
                'email' => $result[0]->email,
                'image' => $result[0]->image,
                'mob_no' => $result[0]->mob_no,
                'plan' => $result[0]->plan,
                'member_type' => $result[0]->member_type,
                'user_status' => $result[0]->user_status,
                'role' => 'user',
                'token' => $user->createToken('MyApp')->accessToken,
            ];
            return response()->json(['message' => $this->success_message_get, 'data' => $session_data_ex, 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'Your Account has been suspended. Please contact your Administrator.', 'status' => 404], 404);
        }
    }

    public function login_with_otp()
    {
        $mob = $_POST['mob_num'];
        $otp = $_POST['otp_v'];
        $session_otp = $_POST['sess_key'];
        $response = $this->two_factor($session_otp, $otp);
        $status = '';
        if ($response['Status'] == 'Success') {
            $users = User::where(['status' => 1, 'mob_no' => $mob, 'status' => 1])->first();
            $session_data_ex = [
                'username'    => $users->username,
                'name'        => $users->name,
                'email'       => $users->email,
                'image'       => $users->image,
                'mob_no'      => $users->mob_no,
                'plan'        => $users->plan,
                'member_type' => $users->member_type,
                'user_status' => $users->user_status,
                'role'        => 'user',
            ];
            Session::put($session_data_ex);
            $session_data = ['enter_basic_details' => true];
            Session::put($session_data);
            $status = true;
        } else {
            $status = false;
        }
        return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);
    }

    public function forget_otp_verify()
    {
        Log::info('Inside forget_otp_verify');
        $otp         = $_POST['otp_v'];
        $session_otp = $_POST['sess_key'];
        $response    = $this->two_factor($session_otp, $otp);
        $status      = '';
        if ($response['Status'] == 'Success') {
            $status = true;
        } else {
            $status = false;
        }
        return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);
    }

    public function forget_otp_verified()
    {
        $otp         = $_POST['otp_v'];
        $session_otp = $_POST['sess_key'];
        $mob         = $_POST['mob_num'];
        $pass        = $_POST['n_pass'];
        $response    = $this->two_factor($session_otp, $otp);
        $status      = '';
        if ($response['Status'] == 'Success') {
            $pass_data    = ['password' => bcrypt($pass)];
            $users_update = User::where(['status' => 1, 'mob_no' => $mob])->limit(1)->update($pass_data);
            $users        = User::where(['status' => 1, 'mob_no' => $mob])->first();
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
            $status = true;
        } else {
            $status = false;
        }
        return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);
    }

    public function otp_verified()
    {
        $mobile      = $_POST['mob_no'];
        $email       = $_POST['email'];
        $otp         = $_POST['otp_v'];
        $session_otp = $_POST['sess_key'];

        // $response = json_decode($this->two_factor($session_otp, $otp));
        $response = $this->two_factor($session_otp, $otp);
        Log::info("Response: " . json_encode($response));
        $status = '';
        if ($response['Status'] == 'Success') {
            $users = User::where(['status' => 1, 'mob_no' => $mobile, 'status' => 1])->first();
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
                $status = true;
            } else {
                $username = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                $ip = $_SERVER['REMOTE_ADDR'];
                $homeController = new HomeController();
                $google_ip = $homeController->get_country_city($ip);
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
                $status = true;
                // Log::info('index-mob-no: '.$this->index('mob_no'));
                // return $this->index('mob_no');
            }
        } else {
            $status = false;
        }
        return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);
    }

    public function mob_available()
    {
        Log::info('mobile_number_exsist: '. $_POST['dialCode'] . $_POST['mob_no']);
        $dialCode = $_POST['dialCode'];
        $mob_no   = $_POST['mob_no'];
        $result = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no Like '%".$mob_no."%' AND `status` = 1");

        if($result) {
            $res1 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no Like '%0".$mob_no."%' AND `status` = 1");
            if($res1) {
                $mobile = '+'.$dialCode.'0'.$mob_no;
                $res2 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no = $mobile AND `status` = 1");
                if($res2) { $result = $res2; }
                else {
                    $mobile = '+'.$dialCode.$mob_no;
                    $res3 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no = $mobile AND `status` = 1");
                    Log::info('Res3: '.json_encode($res3));
                    $result = $res3;
                }
            } else {
                $mobile = '+'.$dialCode.$mob_no;
                $res4 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no = $mobile AND `status` = 1");
                $result = $res4;
            }
        }

        $status = (count($result) > 0) ? true : false;
        return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);

    }

    public function mob_available_password_set()
    {
        $misc_mod = new Misc();
        $result   = $misc_mod->mobile_number_exsist($_POST['dialCode'],$_POST['mob_no']);
        $response = '';
        if (isset($result[0]->password)) {
            $response = true;
        }
        else {
            $response = false;
        }
        return response()->json(['message' => $this->success_message_get, 'response' => $response,'status' => 200], 200);
    }

    public function change_password(Request $request)
    {
        $userId       = Auth::id();
        $new_password = ['password' => bcrypt($_POST['password'])];
        User::where(['status' => 1, 'id' => $userId])->limit(1)->update($new_password);
        return response()->json(['message' => $this->success_message_get, 'status' => 200], 200);
    }

    public function change_password_outside()
    {
        $new_password    = $_POST['password'];
        $mob_no          = $_POST['mob_no'];
        $password_update = [ 'password' => bcrypt($new_password) ];
        User::where(['status' => 1, 'mob_no' => $mob_no])->limit(1)->update($password_update);
        return response()->json(['message' => $this->success_message_get, 'status' => 200], 200);
    }

    public function logout(Request $request)
    {
        // Auth::logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        Session::flush();
        return response()->json(['message' => 'User logged out successfully', 'status' => 200], 200);
    }

    public function get_user_profile()
    {
        $user = Auth::user();
        return response()->json(['message' => $this->success_message_get, 'data' => $user, 'status' => 200], 200);
    }

    public function update_user_profile(Request $request, $user_id)
    {
        // Log::info($request->all()); exit;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mob_no' => 'required',
            'email' => 'required|email|unique:users,email,' . $user_id,
            'dob' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'city' => 'required',
            'weight' => 'required',
            'height' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors(), 'status' => 400], 200);
        }

        $data = User::find($user_id);

        $data->name = $request->name;
        $data->mob_no = $request->mob_no;
        $data->email = $request->email;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->country = $request->country;
        $data->city = $request->city;
        $data->weight = $request->weight;
        $data->height = $request->height;

        if (!empty($request->password)) {
            $data->password = Hash::make($request->password);
        } else {
            $data->password = $data->password;
        }

        $data->save();

        return response()->json(['message' => $this->success_message_get, 'data' => $data, 'status' => 200], 200);
    }

    public function get_currency_exchange($curr)
    {
        $curl = curl_init();

        // Key created by Vivek for testing purpose from https://apilayer.com/marketplace/fixer-api

        $url = 'https://api.apilayer.com/fixer/latest?symbols&base=INR';
        $client = new \GuzzleHttp\Client();
        $response = $client->get($url, [
            'headers' => [
                'Accept' => 'text/plain',
                'apikey' => 'q68QQO7T9vKTVIxECxMoYj4Xoqt4PNLG',
            ],
        ]);

        // $result = json_decode($response->getBody(), true);
        $result = $response->getBody();

        // Write the JSON data to currency.json in the config folder
        $result = File::put(config_path('currency.json'), $result);

        if ($result) {
            Log::info("JSON file created successfully...");
        } else {
            Log::info("Oops! Error creating json file...");
        }
        // return $result;
    }

    public function common_change_country($country, $short_country_name, $city)
    {
        Log::info("---------------------- common_change_country --------------------------");
        $result = DB::select("SELECT * FROM `currency` WHERE country='" . $country . "'");
        $ralcurrency = $result ? $result[0]->code : 'INR';
        $currency_icon = $result ? $result[0]->symbol : '₹';

        // $currency_data = (array) json_decode($this->get_currency_exchange(strtolower($ralcurrency)));
        $currency_data = (array) json_decode(File::get(config_path('currency.json')));
        // dd($currency_data['rates']->INR);

        if (!$currency_data['success']) {
            $currency_icon = '₹';
            $currency_data['rates']->INR = 1;
            $ralcurrency = 'INR';
        }

        setcookie("ralcountry", $country, time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("short_country_name", strtolower($short_country_name), time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("city", $city, time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("ralcurrency", strtolower($ralcurrency), time() + 7 * 24 * 60 * 60 * 1000, "/");
        setcookie("currency_icon", $currency_icon, time() + 7 * 24 * 60 * 60 * 1000, "/");

        // $exchange_calculation = ($currency_data['rates'][strtoupper($ralcurrency)]) / ($currency_data['rates']['INR']);
        $exchange_calculation = ($currency_data['rates']->$ralcurrency) / ($currency_data['rates']->INR);

        setcookie("base_value", round($exchange_calculation, 3), time() + 7 * 24 * 60 * 60 * 1000, "/");
        $_COOKIE['ralcurrency'] = strtolower($ralcurrency);
        $_COOKIE['base_value'] = round($exchange_calculation, 3);
        $_COOKIE['currency_icon'] = $currency_icon;

        return response()->json(['message' => $this->success_message_get,'status' => 200], 200);
    }

    public function change_country()
    {
        Log::info("---------------------- change_country --------------------------");
        $misc_mod = new Misc();
        if(Session::get('username')) {
            $users_update  = User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($_POST);
            $ralcountry    = $_POST['country'];
            $s_c_nane      = $_POST['short_country_name'];
            $city          = $_POST['city'];
            $currency_icon = '₹';
            // $currency_data['rates']=1;
            // $currency_data['rates']['INR']=1;
            $ralcurncy = 'INR';
            $result    = $misc_mod->get_country_currency($ralcountry);
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
                $currency_icon                 = '₹';
                $ralcurncy                     = 'INR';
                $currency_data['rates']['INR'] = 1;
                // $currency_data['rates']     = 1;
                // $country_data->geoplugin_currencyCode='INR';
                // $country_data->geoplugin_currencySymbol_UTF8='₹';
            }
            $exchange_calculation = $currency_data['rates'][strtoupper($ralcurncy)] / $currency_data['rates']['INR'];
            setcookie("base_value", round($exchange_calculation, 3), time() + 7 * 24 * 60 * 60 * 1000, "/");
        } else {
            $ralcountry = $_POST['ral_country'];
            $s_c_nane   = $_POST['s_c_nane'];
            $city       = $_POST['city'];
            //    $ralcurncy=$_POST['ralcurncy'];
            //    $currency_icon=$_POST['currency_icon'];
            //    $base_value=$_POST['base_value'];
            $ralcurncy = 'INR';
            $currency_icon = '₹';
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

            //    $format = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
            //    $string = $format->formatCurrency(123456789, 'JPY');
            //    echo get_currency_symbol($string);
        }
        return response()->json(['message' => $this->success_message_get,'status' => 200], 200);
    }

    public function get_city()
    {
        $misc_mod = new Misc();
        $result   = $misc_mod->get_city($_POST['country']);
        if($result == null) {
            return response()->json(['message' => 'No Data Found.', 'data' => $result,'status' => 200], 200);
        } else {
            return response()->json(['message' => $this->success_message_get, 'data' => $result,'status' => 200], 200);
        }
    }

    public function get_country()
    {
        $misc_mod = new Misc();
        $result   = $misc_mod->get_country($_POST['key_up']);
        if($result == null) {
            return response()->json(['message' => 'No Data Found.', 'data' => $result,'status' => 200], 200);
        } else {
            return response()->json(['message' => $this->success_message_get, 'data' => $result,'status' => 200], 200);
        }
    }

    public function price_data($base_val, $tier, $discount)
    {
        $base_val = isset($_COOKIE['base_value']) ? $_COOKIE['base_value'] : 1;

        $discount_percentage = Config::get('prices.discount.' . $tier);

        if ($discount == 0) {
            $prices['three_months'] = round($base_val * Config::get('prices.' . $tier . '.three_months_fixed'));
            $prices['six_months'] = round($base_val * Config::get('prices.' . $tier . '.six_months_fixed'));
            $prices['twelve_months'] = round($base_val * Config::get('prices.' . $tier . '.twelve_months_fixed'));
            $prices['three_months_couple'] = round($base_val * Config::get('prices.' . $tier . '.three_months_couple_fixed'));
            $prices['six_months_couple'] = round($base_val * Config::get('prices.' . $tier . '.six_months_couple_fixed'));
            $prices['twelve_months_couple'] = round($base_val * Config::get('prices.' . $tier . '.twelve_months_couple_fixed'));
        } else {
            $prices['three_months'] = round($base_val * Config::get('prices.' . $tier . '.three_months_fixed') - (Config::get('prices.' . $tier . '.three_months_fixed') * $discount_percentage));
            $prices['six_months'] = round($base_val * Config::get('prices.' . $tier . '.six_months_fixed') - (Config::get('prices.' . $tier . '.six_months_fixed') * $discount_percentage));
            $prices['twelve_months'] = round($base_val * Config::get('prices.' . $tier . '.twelve_months_fixed') - (Config::get('prices.' . $tier . '.twelve_months_fixed') * $discount_percentage));
            $prices['three_months_couple'] = round($base_val * Config::get('prices.' . $tier . '.three_months_couple_fixed') - (Config::get('prices.' . $tier . '.three_months_couple_fixed') * $discount_percentage));
            $prices['six_months_couple'] = round($base_val * Config::get('prices.' . $tier . '.six_months_couple_fixed') - (Config::get('prices.' . $tier . '.six_months_couple_fixed') * $discount_percentage));
            $prices['twelve_months_couple'] = round($base_val * Config::get('prices.' . $tier . '.twelve_months_couple_fixed') - (Config::get('prices.' . $tier . '.twelve_months_couple_fixed') * $discount_percentage));

            // $prices['three_months'] = round($base_val * Config::get('prices.' . $tier . '.three_months_offer'));
            // $prices['six_months'] = round($base_val * Config::get('prices.' . $tier . '.six_months_offer'));
            // $prices['twelve_months'] = round($base_val * Config::get('prices.' . $tier . '.twelve_months_offer'));
            // $prices['three_months_couple'] = round($base_val * Config::get('prices.' . $tier . '.three_months_couple_offer'));
            // $prices['six_months_couple'] = round($base_val * Config::get('prices.' . $tier . '.six_months_couple_offer'));
            // $prices['twelve_months_couple'] = round($base_val * Config::get('prices.' . $tier . '.twelve_months_couple_offer'));
        }

        $prices['max_renewal_date_expired'] = 1; // This is set to 1, when the client's max_renewal_date is expired or reached

        return response()->json(['message' => ucfirst($tier) . ' Plans ' . $this->success_message_get, 'data' => $prices, 'status' => 200], 200);
    }

    public function testimonials()
    {
        $testimonials = Testimonial::where('status', 1)->where('show_in_homepage', 1)->orderBy('display_order', 'asc')->limit(4)->get();
        return response()->json(['message' => $this->success_message_get, 'data' => $testimonials, 'status' => 200], 200);
    }

    // currently moved to dashboard method below - Vivek
    public function generic_after_login()
    {
        $whatsapp_no = '';

        $user_data = Auth::user();

        $misc_mod = new Misc();
        $future_date_selected = FutureDateMembers::where('username', $user_data->username)->where('status', 1)->get();
        $future_question = false;
        if ($future_date_selected->isNotEmpty()) {
            $future_question = true;
        }

        // $user_package_data = $misc_mod->package_data($user_data->username);
        $user_package_data = BoughtPackage::selectRaw('bought_package.id, bought_package.username, bought_package.plan_id, bought_package.purchase_date, bought_package.activate_date, bought_package.status, membership_details.name, membership_details.type, membership_details.total_member, membership_details.is_subscription, membership_details.price, membership_details.duration, membership_details.pause, membership_details.count_subscription, membership_details.price_type, membership_details.is_active, membership_details.is_live')
            ->leftJoin('membership_details', 'membership_details.id', '=', 'bought_package.plan_id')
            ->where('bought_package.status', 0)
            ->where('bought_package.username', $user_data->username)
            ->get();

        // $premium_package_data = $misc_mod->premium_package_data($user_data->username);
        $premium_package_data = BoughtPremiumPlan::selectRaw('bought_premium_plan.id AS id, bought_premium_plan.username, bought_premium_plan.coach_det_id, bought_premium_plan.plan_id, bought_premium_plan.purchased_at, bought_premium_plan.updated_at, bought_premium_plan.status, coach.first_name, coach.last_name, coach.team, coach_details.coach_tier,
            premium_plan_details.type, premium_plan_details.total_member, premium_plan_details.is_subscription, premium_plan_details.duration, premium_plan_details.pause, premium_plan_details.count_subscription, premium_plan_details.is_active, premium_plan_details.is_live')
            ->leftJoin('premium_plan_details', 'premium_plan_details.id', '=', 'bought_premium_plan.plan_id')
            ->leftJoin('coach_details', 'coach_details.id', '=', 'bought_premium_plan.coach_det_id')
            ->leftJoin('coach', 'coach.id', '=', 'coach_details.coach_id')
            ->where('bought_premium_plan.status', 0)
            ->where('bought_premium_plan.username', $user_data->username)
            ->get();

        $id_p = 0;
        if ($user_data->plan_id < 8) {
            $id_p = 8;
        }

        // $plan_current = $misc_mod->get_plan_details($user_data->plan_id + $id_p);
        $plan_current = MembershipDetails::where('id', ($user_data->plan_id + $id_p))->get();
        if (isset($_COOKIE['short_country_name']) ? $_COOKIE['short_country_name'] : 'in' != $user_data->short_country_name) {
            $res = $this->common_change_country($user_data->country, $user_data->short_country_name, $user_data->city);
        }
        // dd($res);

        $user_data['buddy_pop_up'] = 0;
        if ($user_data->is_buddy) {
            $total_buddy_user = explode(',', $user_data->buddy_username);
            $total_buddy_user_count = count($total_buddy_user);
            $result_plan = MembershipDetails::where('id', $user_data->plan_id)->get();
            $user_data['buddy_pop_up'] = $result_plan[0]->total_member - $total_buddy_user_count;
        }

        $misc_mod_model = new Misc();
        // $live_sessionData = $misc_mod_model->live_session_data_view_user();

        $today = date('Y-m-d');

        // $upcoming_pause = $misc_mod_model->pause_details_today($user_data->username, $user_data->plan_end_date);
        $upcoming_pause = PausePlan::selectRaw('*')
            ->where('status', 1)
            ->where('username', $user_data->username)
            ->get();

        // $res = $misc_mod_model->pause_on_data($user_data->username);
        $pause_on_data_qry = PausePlan::selectRaw('*')->where('status', 2)->where('username', $user_data->username)->get();
        if ($pause_on_data_qry->isNotEmpty()) {
            $pause_on_data = $pause_on_data_qry;
        } else {
            $pause_on_data = [];
        }

        // $get_whats_app = $misc_mod_model->whats_app($user_data->head_coach);
        $get_whats_app = Coach::selectRaw('*')->where('first_name', $user_data->head_coach)->get();
        if ($get_whats_app->isNotEmpty()) {
            $whatsapp_no = $get_whats_app[0]->coach_whatsapp;
        }

        // $freeze_dashboard = $misc_mod_model->is_user_on_pause($user_data->username);
        $freeze_dashboard = PausePlan::selectRaw('*')
            ->where('start_date', '<=', $today)
            ->where('username', $user_data->username)
            ->get();

        // $not_freeze_dashboard = $misc_mod_model->is_user_on_pause_remove($user_data->username);
        $last_day = date('Y-m-d', strtotime(date("Y-m-d") . ' - 1 days'));
        $not_freeze_dashboard = PausePlan::selectRaw('*')
            ->where('status', 2)
            ->where('username', $user_data->username)
            ->where('end_date', '<=', $last_day)
            ->get();

        $pause_plan = 0;

        if (sizeof($freeze_dashboard) >= 1) {
            if ($user_data->user_status == 8) {

                $pause_plan = 1;
                $status = 2;

                $user_status_update_on_pause = [
                    'user_status' => 9,
                ];

                User::where(['status' => 1, 'username' => $user_data->username])->limit(1)->update($user_status_update_on_pause);

                // $up_futur_pause = $misc_mod_model->data_pause_update($user_data->username, $freeze_dashboard[0]->start_date, $freeze_dashboard[0]->end_date, 2, $freeze_dashboard[0]->days);
                $day_availed = $freeze_dashboard[0]->days;
                if ($day_availed == 0) {$day_availed = 1;}

                PausePlan::where('username', $user_data->username)
                    ->where('start_date', $freeze_dashboard[0]->start_date)
                    ->where('end_date', $freeze_dashboard[0]->end_date)
                    ->update(['status' => $status, 'day_availed' => $day_availed, 'cancel_date' => date('Y-m-d')]);

                if ($user_data->is_buddy) {
                    User::where(['status' => 1, 'username' => $user_data->buddy_username])->limit(1)->update($user_status_update_on_pause);
                    // $up_futur_pause = $misc_mod_model->data_pause_update($user_data->buddy_username, $freeze_dashboard[0]->start_date, $freeze_dashboard[0]->end_date, 2, $freeze_dashboard[0]->days);

                    PausePlan::where('username', $user_data->buddy_username)
                        ->where('start_date', $freeze_dashboard[0]->start_date)
                        ->where('end_date', $freeze_dashboard[0]->end_date)
                        ->update(['status' => $status, 'day_availed' => $day_availed, 'cancel_date' => date('Y-m-d')]);
                }
            }
        }

        if (sizeof($not_freeze_dashboard) >= 1) {
            if ($user_data->user_status == 9) {

                $pause_plan = 0;
                $status = 3;

                $user_status_update_on_pause = [
                    'user_status' => 8,
                ];

                User::where(['status' => 1, 'username' => $user_data->username])->limit(1)->update($user_status_update_on_pause);

                // $up_futur_pause = $misc_mod_model->data_pause_update($user_data->username, $not_freeze_dashboard[0]->start_date, $not_freeze_dashboard[0]->end_date, 3, $not_freeze_dashboard[0]->days);

                $day_availed = $not_freeze_dashboard[0]->days;
                if ($day_availed == 0) {$day_availed = 1;}

                PausePlan::where('username', $user_data->username)
                    ->where('start_date', $not_freeze_dashboard[0]->start_date)
                    ->where('end_date', $not_freeze_dashboard[0]->end_date)
                    ->update(['status' => $status, 'day_availed' => $day_availed, 'cancel_date' => date('Y-m-d')]);

                if ($user_data->is_buddy) {
                    User::where(['status' => 1, 'username' => $user_data->buddy_username])->limit(1)->update($user_status_update_on_pause);
                    // $up_futur_pause = $misc_mod_model->data_pause_update($user_data->buddy_username, $not_freeze_dashboard[0]->start_date, $not_freeze_dashboard[0]->end_date, 3, $not_freeze_dashboard[0]->days);
                    PausePlan::where('username', $user_data->buddy_username)
                        ->where('start_date', $freeze_dashboard[0]->start_date)
                        ->where('end_date', $freeze_dashboard[0]->end_date)
                        ->update(['status' => $status, 'day_availed' => $day_availed, 'cancel_date' => date('Y-m-d')]);
                }
            }
        }
        $user_workday = [];
        $misc_mod = new Misc();

        if ($user_data->user_status == 8 || $user_data->user_status == 9) {
            $user_pause_day_availed = $user_data->pause_day_availed;
            $user_plan_end_date = strtotime($user_data->plan_end_date);
            $curr_date = strtotime(date('Y-m-d'));
            $exist_diff = $user_plan_end_date - $curr_date;
            $exist_diff = round($exist_diff / (60 * 60 * 24));
            $user_plan_left_day = $exist_diff; //-$user_pause_day_availed
            $user_plan_total_day = $user_data->total_workday;
            $user_complete_percentage = $user_plan_left_day / $user_plan_total_day;

            $user_workday['user_plan_left_day'] = $user_plan_left_day > 0 ? $user_plan_left_day : 0;
            $user_workday['user_plan_total_day'] = $user_plan_total_day;
            $user_workday['user_complete_percentage'] = $user_complete_percentage > 0 ? $user_complete_percentage * 100 : 0;
            $user_workday['user_complete_day'] = $user_plan_total_day - $user_plan_left_day;
        }

        // $result_plan = $misc_mod_model->get_plan_details($user_data->plan_id);
        $result_plan = MembershipDetails::selectRaw('*')->where('id', $user_data->plan_id)->get();

        $currency = isset($_COOKIE['ralcurrency']) ? $_COOKIE['ralcurrency'] : 'inr';
        $currency_icon = isset($_COOKIE['currency_icon']) ? $_COOKIE['currency_icon'] : '₹';

        $count_existing_plan = $user_data->plan ? explode(' ', $user_data->plan)[0] : 0;

        // $get_plan_price = $misc_mod->get_plan_price($user_data->member_type, $count_existing_plan);
        $get_plan_price = MembershipDetails::selectRaw('*')
            ->where('count_subscription', $user_data->member_type)
            ->where('type', $count_existing_plan)
            ->get();
        // dd($result_plan);
        // exit;

        $existing_plan_renewal_price = 0;
        if (sizeof($get_plan_price) != 0) {
            if (sizeof($get_plan_price) == 1) {
                $existing_plan_renewal_price = $get_plan_price[0]->price; //1
            } else {
                $existing_plan_renewal_price = $get_plan_price[1]->price; //1
            }
        }

        // $session_offer = ['extension' => false];
        // Session::put($session_offer);

        $pop_up = false;
        $current_date = date('Y-m-d');
        // $current_date = '2022-12-30'; // for testing, choose a future date
        $normal_extend_day = '90 days';

        $plan_end_date_renewal = date('Y-m-d', strtotime($user_data->plan_end_date . ' + ' . $normal_extend_day));

        $base_val = 1; // the value will be 1 if there is no input from the frontend.
        $tier = 'plus'; // this plus plan is shown as the basic plan and can be changed acc. to the user's choice

        if ($plan_end_date_renewal >= $current_date && $user_data->user_status > 1) {
            $prices = $this->price_data($base_val, $tier, 0);
        } else {
            $prices = $this->price_data($base_val, $tier, 1);
        }

        $location['country'] = $user_data->country ? $user_data->country : 'in';
        $location['city'] = $user_data->city ? $user_data->city : 'Bangalore';

        $data = [
            'pop_up'                      => $pop_up,
            'prices'                      => $prices,
            'currency'                    => $currency,
            'location'                    => $location,
            'user_data'                   => $user_data,
            'pause_plan'                  => $pause_plan,
            'whatsapp_no'                 => $whatsapp_no,
            'user_workday'                => $user_workday,
            'plan_current'                => $plan_current,
            'currency_icon'               => $currency_icon,
            'pause_on_data'               => $pause_on_data,
            'upcoming_pause'              => $upcoming_pause,
            'future_question'             => $future_question,
            'user_package_data'           => $user_package_data,
            'current_pause_plan'          => $freeze_dashboard,
            'premium_package_data'        => $premium_package_data,
            'existing_plan_renewal_price' => $existing_plan_renewal_price,
        ];
        // dd($data_customize);
        // return response()->json(['message' => $this->success_message_get, 'data' => $data, 'status' => 200], 200);
        return $data;
    }

    public function dashboard()
    {
        $whatsapp_no = '';

        $user_data = Auth::user();

        $misc_mod = new Misc();
        $future_date_selected = FutureDateMembers::where('username', $user_data->username)->where('status', 1)->get();
        $future_question = false;
        if ($future_date_selected->isNotEmpty()) {
            $future_question = true;
        }

        $coach_detail = null;
        if ($user_data->head_coach != null) {
            $head_coach = Coach::where(['first_name' => $user_data->head_coach, 'team' => $user_data->team])->first();
            $coach_detail = CoachDetail::where('coach_id', '=', $head_coach->id)->first();
        } else {
            $head_coach = null;
        }

        $coach_assigned = false;
        $username = Session::get('username');
        if ($username > 0) {
            $check_for_coach = User::selectRaw('head_coach')->where('username', $username)->get();
            // check for the coach assigned and plan not expired
            if (!empty($check_for_coach[0]->head_coach && $user_data->user_status != 11)) {
                $coach_assigned = true;
            }
        }

        // $user_package_data = $misc_mod->package_data($user_data->username);
        $user_package_data = BoughtPackage::selectRaw('bought_package.id, bought_package.username, bought_package.plan_id, bought_package.purchase_date, bought_package.activate_date, bought_package.status, membership_details.name, membership_details.type, membership_details.total_member, membership_details.is_subscription, membership_details.price, membership_details.duration, membership_details.pause, membership_details.count_subscription, membership_details.price_type, membership_details.is_active, membership_details.is_live')
            ->leftJoin('membership_details', 'membership_details.id', '=', 'bought_package.plan_id')
            ->where('bought_package.status', 0)
            ->where('bought_package.username', $user_data->username)
            ->get();

        // $premium_package_data = $misc_mod->premium_package_data($user_data->username);
        $premium_package_data = BoughtPremiumPlan::selectRaw('bought_premium_plan.id AS id, bought_premium_plan.username, bought_premium_plan.coach_det_id, bought_premium_plan.plan_id, bought_premium_plan.purchased_at, bought_premium_plan.updated_at, bought_premium_plan.status, coach.first_name, coach.last_name, coach.team, coach_details.coach_tier,
            premium_plan_details.type, premium_plan_details.total_member, premium_plan_details.is_subscription, premium_plan_details.duration, premium_plan_details.pause, premium_plan_details.count_subscription, premium_plan_details.is_active, premium_plan_details.is_live')
            ->leftJoin('premium_plan_details', 'premium_plan_details.id', '=', 'bought_premium_plan.plan_id')
            ->leftJoin('coach_details', 'coach_details.id', '=', 'bought_premium_plan.coach_det_id')
            ->leftJoin('coach', 'coach.id', '=', 'coach_details.coach_id')
            ->where('bought_premium_plan.status', 0)
            ->where('bought_premium_plan.username', $user_data->username)
            ->get();

        $id_p = 0;
        if ($user_data->plan_id < 8) {
            $id_p = 8;
        }

        // $plan_current = $misc_mod->get_plan_details($user_data->plan_id + $id_p);
        $plan_current = MembershipDetails::where('id', ($user_data->plan_id + $id_p))->get();
        if (isset($_COOKIE['short_country_name']) ? $_COOKIE['short_country_name'] : 'in' != $user_data->short_country_name) {
            $res = $this->common_change_country($user_data->country, $user_data->short_country_name, $user_data->city);
        }
        // dd($res);

        $user_data['buddy_pop_up'] = 0;
        if ($user_data->is_buddy) {
            $total_buddy_user = explode(',', $user_data->buddy_username);
            $total_buddy_user_count = count($total_buddy_user);
            $result_plan = MembershipDetails::where('id', $user_data->plan_id)->get();
            $user_data['buddy_pop_up'] = $result_plan[0]->total_member - $total_buddy_user_count;
        }

        $misc_mod_model = new Misc();
        // $live_sessionData = $misc_mod_model->live_session_data_view_user();

        $today = date('Y-m-d');

        // $upcoming_pause = $misc_mod_model->pause_details_today($user_data->username, $user_data->plan_end_date);
        $upcoming_pause = PausePlan::selectRaw('*')
            ->where('status', 1)
            ->where('username', $user_data->username)
            ->get();

        // $res = $misc_mod_model->pause_on_data($user_data->username);
        $pause_on_data_qry = PausePlan::selectRaw('*')->where('status', 2)->where('username', $user_data->username)->get();
        if ($pause_on_data_qry->isNotEmpty()) {
            $pause_on_data = $pause_on_data_qry;
        } else {
            $pause_on_data = [];
        }

        // $get_whats_app = $misc_mod_model->whats_app($user_data->head_coach);
        $get_whats_app = Coach::selectRaw('*')->where('first_name', $user_data->head_coach)->get();
        if ($get_whats_app->isNotEmpty()) {
            $whatsapp_no = $get_whats_app[0]->coach_whatsapp;
        }

        // $freeze_dashboard = $misc_mod_model->is_user_on_pause($user_data->username);
        $freeze_dashboard = PausePlan::selectRaw('*')
            ->where('start_date', '<=', $today)
            ->where('username', $user_data->username)
            ->get();

        // $not_freeze_dashboard = $misc_mod_model->is_user_on_pause_remove($user_data->username);
        $last_day = date('Y-m-d', strtotime(date("Y-m-d") . ' - 1 days'));
        $not_freeze_dashboard = PausePlan::selectRaw('*')
            ->where('status', 2)
            ->where('username', $user_data->username)
            ->where('end_date', '<=', $last_day)
            ->get();

        $pause_plan = 0;

        if (sizeof($freeze_dashboard) >= 1) {
            if ($user_data->user_status == 8) {

                $pause_plan = 1;
                $status = 2;

                $user_status_update_on_pause = [
                    'user_status' => 9,
                ];

                User::where(['status' => 1, 'username' => $user_data->username])->limit(1)->update($user_status_update_on_pause);

                // $up_futur_pause = $misc_mod_model->data_pause_update($user_data->username, $freeze_dashboard[0]->start_date, $freeze_dashboard[0]->end_date, 2, $freeze_dashboard[0]->days);
                $day_availed = $freeze_dashboard[0]->days;
                if ($day_availed == 0) {$day_availed = 1;}

                PausePlan::where('username', $user_data->username)
                    ->where('start_date', $freeze_dashboard[0]->start_date)
                    ->where('end_date', $freeze_dashboard[0]->end_date)
                    ->update(['status' => $status, 'day_availed' => $day_availed, 'cancel_date' => date('Y-m-d')]);

                if ($user_data->is_buddy) {
                    User::where(['status' => 1, 'username' => $user_data->buddy_username])->limit(1)->update($user_status_update_on_pause);
                    // $up_futur_pause = $misc_mod_model->data_pause_update($user_data->buddy_username, $freeze_dashboard[0]->start_date, $freeze_dashboard[0]->end_date, 2, $freeze_dashboard[0]->days);

                    PausePlan::where('username', $user_data->buddy_username)
                        ->where('start_date', $freeze_dashboard[0]->start_date)
                        ->where('end_date', $freeze_dashboard[0]->end_date)
                        ->update(['status' => $status, 'day_availed' => $day_availed, 'cancel_date' => date('Y-m-d')]);
                }
            }
        }

        if (sizeof($not_freeze_dashboard) >= 1) {
            if ($user_data->user_status == 9) {

                $pause_plan = 0;
                $status = 3;

                $user_status_update_on_pause = [
                    'user_status' => 8,
                ];

                User::where(['status' => 1, 'username' => $user_data->username])->limit(1)->update($user_status_update_on_pause);

                // $up_futur_pause = $misc_mod_model->data_pause_update($user_data->username, $not_freeze_dashboard[0]->start_date, $not_freeze_dashboard[0]->end_date, 3, $not_freeze_dashboard[0]->days);

                $day_availed = $not_freeze_dashboard[0]->days;
                if ($day_availed == 0) {$day_availed = 1;}

                PausePlan::where('username', $user_data->username)
                    ->where('start_date', $not_freeze_dashboard[0]->start_date)
                    ->where('end_date', $not_freeze_dashboard[0]->end_date)
                    ->update(['status' => $status, 'day_availed' => $day_availed, 'cancel_date' => date('Y-m-d')]);

                if ($user_data->is_buddy) {
                    User::where(['status' => 1, 'username' => $user_data->buddy_username])->limit(1)->update($user_status_update_on_pause);
                    // $up_futur_pause = $misc_mod_model->data_pause_update($user_data->buddy_username, $not_freeze_dashboard[0]->start_date, $not_freeze_dashboard[0]->end_date, 3, $not_freeze_dashboard[0]->days);
                    PausePlan::where('username', $user_data->buddy_username)
                        ->where('start_date', $freeze_dashboard[0]->start_date)
                        ->where('end_date', $freeze_dashboard[0]->end_date)
                        ->update(['status' => $status, 'day_availed' => $day_availed, 'cancel_date' => date('Y-m-d')]);
                }
            }
        }
        $user_workday = [];
        $misc_mod = new Misc();

        if ($user_data->user_status == 8 || $user_data->user_status == 9) {
            $user_pause_day_availed = $user_data->pause_day_availed;
            $user_plan_end_date = strtotime($user_data->plan_end_date);
            $curr_date = strtotime(date('Y-m-d'));
            $exist_diff = $user_plan_end_date - $curr_date;
            $exist_diff = round($exist_diff / (60 * 60 * 24));
            $user_plan_left_day = $exist_diff; //-$user_pause_day_availed
            $user_plan_total_day = $user_data->total_workday;
            $user_complete_percentage = $user_plan_left_day / $user_plan_total_day;

            $user_workday['user_plan_left_day'] = $user_plan_left_day > 0 ? $user_plan_left_day : 0;
            $user_workday['user_plan_total_day'] = $user_plan_total_day;
            $user_workday['user_complete_percentage'] = $user_complete_percentage > 0 ? $user_complete_percentage * 100 : 0;
            $user_workday['user_complete_day'] = $user_plan_total_day - $user_plan_left_day;
        }

        // $result_plan = $misc_mod_model->get_plan_details($user_data->plan_id);
        $result_plan = MembershipDetails::selectRaw('*')->where('id', $user_data->plan_id)->get();

        $currency = isset($_COOKIE['ralcurrency']) ? $_COOKIE['ralcurrency'] : 'inr';
        $currency_icon = isset($_COOKIE['currency_icon']) ? $_COOKIE['currency_icon'] : '₹';

        $count_existing_plan = $user_data->plan ? explode(' ', $user_data->plan)[0] : 0;

        // $get_plan_price = $misc_mod->get_plan_price($user_data->member_type, $count_existing_plan);
        $get_plan_price = MembershipDetails::selectRaw('*')
            ->where('count_subscription', $user_data->member_type)
            ->where('type', $count_existing_plan)
            ->get();

        $existing_plan_renewal_price = 0;
        if (sizeof($get_plan_price) != 0) {
            if (sizeof($get_plan_price) == 1) {
                $existing_plan_renewal_price = $get_plan_price[0]->price; //1
            } else {
                $existing_plan_renewal_price = $get_plan_price[1]->price; //1
            }
        }

        $pop_up = false;
        $current_date = date('Y-m-d');
        // $current_date = '2022-12-30'; // for testing, choose a future date
        $normal_extend_day = '90 days';

        $plan_end_date_renewal = date('Y-m-d', strtotime($user_data->plan_end_date . ' + ' . $normal_extend_day));

        $base_val = 1; // the value will be 1 if there is no input from the cookie.
        $tier = isset($coach_detail->coach_tier) ? $coach_detail->coach_tier : 'plus';

        if ($plan_end_date_renewal >= $current_date && $user_data->user_status > 1) {
            $prices = $this->price_data($base_val, $tier, 1);
        } else {
            $prices = $this->price_data($base_val, $tier, 0);
        }

        // Prices without discounts for Authenticated Plus & Premium pages
        $new_plans = [

            'classic'   => [
                'three_months'         => round($base_val * Config::get('prices.classic.three_months_fixed')),
                'six_months'           => round($base_val * Config::get('prices.classic.six_months_fixed')),
                'twelve_months'        => round($base_val * Config::get('prices.classic.twelve_months_fixed')),
                'three_months_couple'  => round($base_val * Config::get('prices.classic.three_months_couple_fixed')),
                'six_months_couple'    => round($base_val * Config::get('prices.classic.six_months_couple_fixed')),
                'twelve_months_couple' => round($base_val * Config::get('prices.classic.twelve_months_couple_fixed'))
            ],

            'supreme'   => [
                'three_months'         => round($base_val * Config::get('prices.supreme.three_months_fixed')),
                'six_months'           => round($base_val * Config::get('prices.supreme.six_months_fixed')),
                'twelve_months'        => round($base_val * Config::get('prices.supreme.twelve_months_fixed')),
                'three_months_couple'  => round($base_val * Config::get('prices.supreme.three_months_couple_fixed')),
                'six_months_couple'    => round($base_val * Config::get('prices.supreme.six_months_couple_fixed')),
                'twelve_months_couple' => round($base_val * Config::get('prices.supreme.twelve_months_couple_fixed'))
            ],

            'exclusive'   => [
                'three_months'         => round($base_val * Config::get('prices.exclusive.three_months_fixed')),
                'six_months'           => round($base_val * Config::get('prices.exclusive.six_months_fixed')),
                'twelve_months'        => round($base_val * Config::get('prices.exclusive.twelve_months_fixed')),
                'three_months_couple'  => round($base_val * Config::get('prices.exclusive.three_months_couple_fixed')),
                'six_months_couple'    => round($base_val * Config::get('prices.exclusive.six_months_couple_fixed')),
                'twelve_months_couple' => round($base_val * Config::get('prices.exclusive.twelve_months_couple_fixed'))
            ],
        ];

        if ($tier !== 'plus') {
            $new_plans['plus'] = [
                'three_months'         => round($base_val * Config::get('prices.plus.three_months_fixed')),
                'six_months'           => round($base_val * Config::get('prices.plus.six_months_fixed')),
                'twelve_months'        => round($base_val * Config::get('prices.plus.twelve_months_fixed')),
                'three_months_couple'  => round($base_val * Config::get('prices.plus.three_months_couple_fixed')),
                'six_months_couple'    => round($base_val * Config::get('prices.plus.six_months_couple_fixed')),
                'twelve_months_couple' => round($base_val * Config::get('prices.plus.twelve_months_couple_fixed'))
            ];
        }

        $location['country'] = $user_data->country ? $user_data->country : 'in';
        $location['city'] = $user_data->city ? $user_data->city : 'Bangalore';

        $data = [
            'current_prices' => $prices,
            'prices' => $new_plans ? $new_plans : null,
            'pop_up' => $pop_up,
            'users' => $user_data,
            'currency' => $currency,
            'location' => $location,
            'pause_plan' => $pause_plan,
            'whatsapp_no' => $whatsapp_no,
            'user_workday' => $user_workday,
            'plan_current' => $plan_current,
            'coach_detail' => $coach_detail,
            'existing_coach' => $head_coach,
            'currency_icon' => $currency_icon,
            'pause_on_data' => $pause_on_data,
            'upcoming_pause' => $upcoming_pause,
            'coach_assigned' => $coach_assigned,
            'future_question' => $future_question,
            'user_package_data' => $user_package_data,
            'current_pause_plan' => $freeze_dashboard,
            'premium_package_data' => $premium_package_data,
            'existing_plan_renewal_price' => $existing_plan_renewal_price,
        ];

        return response()->json(['message' => $this->success_message_get, 'data' => $data, 'status' => 200], 200);
    }

    public function question_filled()
    {
        Log::info('question_filled');
        $homeController = new HomeController();
        $homeController->user_timezone();
        $users = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        // $users = User::where(['status' => 1, 'username' => '99249933'])->first();

        //For live session questionaire condition
        if ($users->member_type == 'Live Session') {

            $misc_mod = new Misc();
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
                $user_details = [
                    'plan_start_date' => $current_date,
                    'plan_end_date' => date('Y-m-d', strtotime($current_date . ' + ' . $user_plan_total_day . ' days')),
                    'user_status' => 8,
                    'total_workday' => $user_plan_total_day
                ];
                $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_details);
                $mailData = array(
                    'to_email' => $users->email,
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
                $user_details = [
                    'user_status'             => 4,
                    'questionaire_start_date' => $newDate,
                ];
                $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_details);
            }
        } else {
            //For individual/buddy questionaire condition
            if (isset($_POST['start_date'])) {
                $newDate = date("Y-m-d", strtotime($_POST['start_date']));
                $user_details = [
                    'user_status'             => 3,
                    'questionaire_start_date' => $newDate,
                ];
                $users_update  =   User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($user_details);
                if ($users->is_buddy) {
                    $buddy_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($user_details);
                }
            }
            if ($users->gender == 'Non-Binary')
                $users->gender = 'Male';
            $result = Question::where('gender', '=', 'All')->orWhere('gender', '=', $users->gender)->get();

            $returnHTML = ['questions' => $result, 'gender' => $users->gender];

            $existing_user = QuestionAnswer::where('username', '=', $users->username)->first();
            if ($existing_user) {
                $result = '';
                if($users->admin_assign_coach == 1)
                {
                    // If LivEzy Plus
                    $result = RenewalQuestion::where('gender', '=', 'All')->orWhere('gender', '=', $users->gender)->get();

                } else {
                    // LivEzy Premium
                    $result = RenewalQuestion::where('id', '<=', 5)->where('gender', '=', 'All')->orWhere('gender', '=', $users->gender)->get();
                }
                $returnHTML = ['questions' => $result, 'gender' => $users->gender];
            }

            return response()->json(['message' => $this->success_message_get, 'data' => $returnHTML, 'status' => 200], 200);
        }
    }

    public function renew_question_view()
    {
        $id        = $_POST['id'];
        $username  = $_POST['username'];
        $user_data = User::where(['status' => 1, 'username' => $username])->first();
        $gender    = $user_data->gender;
        if ($gender == 'Non-Binary')
            $gender = 'Male';
        $result = '';
        if($user_data->admin_assign_coach == 1)
        {
            $result = RenewalQuestion::where('gender', 'All')->orWhere('gender', $gender)->get();
            return $result;
        } else {
            $result = RenewalQuestion::where('id', '<=', 5)->where('gender', 'All')->orWhere('gender', $gender)->get();
            return $result;
        }
        $fill_result = [];
        $answer = QuestionAnswer::where('id', $id)->get();
        if ($answer)
            $fill_result = $answer;
        $returnHTML = ['data' => $result, 'gender' => $gender, 'answer' => $fill_result];

        return response()->json(['message' => $this->success_message_get, 'data' => $returnHTML, 'status' => 200], 200);
    }

    public function future_question_date_select()
    {
        Log::info('future_question_date_select');
        $uid = Session::get('username');
        // $uid = '99249933';
        $question_date = $_POST['start_date'];

        $users = User::where(['status' => 1, 'username' => $uid])->first();
        if (isset($_POST['start_date'])) {
            $newDate = date("Y-m-d", strtotime($_POST['start_date']));
            $user_details = [
                'questionaire_start_date' => $newDate
            ];
            $f_data = [
                'username'   => $uid,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $users_update  =   User::where(['status' => 1, 'username' => $uid])->limit(1)->update($user_details);

            FutureDateMembers::create($f_data);
            if ($users->is_buddy) {
                $buddy_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($user_details);
                $f_data = ['username' => $users->buddy_username];
                FutureDateMembers::create($f_data);
            }

            // Whatsapp notification
            $mobile_no     = $users->mob_no;
            $name          = $users->name;
            $template_name = "online_coaching_start_later_1";
            if ($mobile_no) {
                app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
            }

            return response()->json(['message' => $this->success_message_saved, 'status' => 200], 200);
        }
    }

    public function pause_plan()
    {
        Log::info('pause_plan');
        $users       = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        // $users    = User::where(['status' => 1, 'username' => '99249933'])->first();
        $pause_start = strtotime($_POST['pause_start_date']);
        $pause_end   = strtotime($_POST['pause_end_date']);
        $psd         = $_POST['pause_start_date'];
        $ped         = $_POST['pause_end_date'];
        $datediff    = ($pause_end - $pause_start);
        $datediff    = round($datediff / (60 * 60 * 24)) + 1;
        $balance_pause = $users->total_pause_day - $users->pause_day_availed;
        $pause_data = PausePlan::where('username', $users->username)
                                ->orWhere('username', $users->buddy_username)
                                ->whereIn('status', [1, 3])
                                ->get();
        $exist_diff = 15;
        $pause_status = true;
        if ($pause_data) {
            $p = 0;
            if (sizeof($pause_data) > 0)
                $p = sizeof($pause_data) - 1;
            $exist_pause_end_date = strtotime($pause_data[$p]->cancel_date);
            $exist_pause_start_date = strtotime($pause_data[$p]->start_date);
            $exist_diff = $pause_start - $exist_pause_end_date;
            $exist_diff = round($exist_diff / (60 * 60 * 24));
            if ($exist_diff < 0) {
                $exist_diff = $exist_pause_start_date - $pause_start;
                $exist_diff = round($exist_diff / (60 * 60 * 24));
            }
        }
        if ($pause_end < strtotime($users->plan_end_date)) {
            if ($datediff < 8 && $datediff > 2) {
                if ($exist_diff > 14) {
                    if ($balance_pause >= $datediff) {
                        $pause_plan_update = [
                            'pause_day_availed' => $users->pause_day_availed + $datediff,
                            'plan_end_date'     => date('Y-m-d', strtotime($users->plan_end_date . ' + ' . $datediff . ' days'))
                        ];
                        $users_update = User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($pause_plan_update);
                        $pause_data_insert = [
                            'username'    => $users->username,
                            'start_date'  => $psd,
                            'end_date'    => $ped,
                            'cancel_date' => $ped,
                            'days'        => $datediff,
                            'created_at'  => date('Y-m-d H:i:s'),
                            'updated_at'  => date('Y-m-d H:i:s')
                        ];
                        PausePlan::create($pause_data_insert);
                        if ($users->is_buddy) {
                            $buddy_users_update = User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                            $pause_data_insert_buddy = [
                                'username'    => $users->buddy_username,
                                'start_date'  => $psd,
                                'end_date'    => $ped,
                                'cancel_date' => $ped,
                                'days'        => $datediff,
                                'created_at'  => date('Y-m-d H:i:s'),
                                'updated_at'  => date('Y-m-d H:i:s')
                            ];
                            PausePlan::create($pause_data_insert_buddy);
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
        // echo $pause_status;
        return response()->json(['message' => $this->success_message_get, 'response' => $pause_status, 'status' => 200], 200);
    }

    public function data_pause_update($id,$s_d,$e_d,$s,$exit_diff='Null') {
        Log::info('data_pause_update');
        if($exit_diff == 0)
            $exit_diff = 1;

        PausePlan::where('username', $id)->where('start_date', $s_d)->where('end_date', $e_d)->update(['status' => 0,'day_availed' => $exit_diff, 'cancel_date' => date('Y-m-d')]);

        return true;
    }

    public function cancel_future_pause()
    {
        if($_POST) {
            $users = User::where(['status' => 1, 'username' => Session::get('username')])->first();
            // $users      = User::where(['status' => 1, 'username' => '99249933'])->first();
            $u_id      = $_POST['username'];
            $s_d       = $_POST['start_date'];
            $e_d       = $_POST['end_date'];
            $pause_day = $_POST['pause_day'];
            $u_e       = date('Y-m-d', strtotime('-' . (int)$pause_day . ' day', strtotime($users->plan_end_date)));

            //$upcoming_pause=$misc_mod->pause_details_today($user_data->username,$user_data->plan_end_date);
            $f_e_d = PausePlan::where(['username' => $users->username, 'status' => 1])->get();
            $upcoming_future_con = PausePlan::where(['username' => $users->username, 'status' => 1])->where('end_date', '<=', $f_e_d[sizeof($f_e_d) - 1]->end_date)->orderBy('id', 'desc')->limit(1)->get();
            $e_d_u = $upcoming_future_con[0]->end_date;
            $status = true;
            if($e_d == $e_d_u) {
                $pause_plan_update = [
                    'pause_day_availed' => $users->pause_day_availed - (int)$pause_day,
                    'plan_end_date'     => date('Y-m-d', strtotime('-' . (int)$pause_day . ' day', strtotime($users->plan_end_date)))
                ];
                $this->data_pause_update($u_id, $s_d, $e_d, 0, (int)$pause_day);
                User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($pause_plan_update);

                if($users->is_buddy) {
                    $this->data_pause_update($users->buddy_username, $s_d, $e_d, 0, (int)$pause_day);
                    User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                }
            } else {
                Log::info("Inside else of cancel future pause");
                if (strtotime($e_d_u) >= strtotime($u_e)) {
                    $status = 'You can not cancel this pause as one of your pause upcoming pause days is conflicting with your membership expiration. In order to proceed with this, you will first need to cancel that upcoming pause';
                } else {
                    $pause_plan_update = [
                        'pause_day_availed' => $users->pause_day_availed - (int)$pause_day,
                        'plan_end_date'     => date('Y-m-d', strtotime('-' . (int)$pause_day . ' day', strtotime($users->plan_end_date)))
                    ];

                    $up_futur_pause = $this->data_pause_update($u_id, $s_d, $e_d, 0, (int)$pause_day);;

                    $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($pause_plan_update);
                    if ($users->is_buddy) {
                        $up_futur_pause = $this->data_pause_update($users->buddy_username, $s_d, $e_d, 0, (int)$pause_day);
                        $users_update = User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                    }
                }
            }

            // echo $status;
            return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);
        }
    }

    public function cancel_pause()
    {
        Log::info('cancel_pause');
        // $users = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        //echo date('Y-m-d', strtotime($users->plan_end_date. ' + 90 days'));
        $users = User::where(['status' => 1, 'username' => '99249933'])->first();
        $b_id = $users->buddy_username ? $users->buddy_username : 'Null';
        $pause_data = PausePlan::where('username', $users->username)->orWhere('username', $b_id)->where('status', 2)->get();
        //echo "SELECT * FROM `pause_plan` WHERE (username=$f_id or username=$b_m_id) AND (`status` = 3 or `status`=1)";
        $exsist_pause_start_date = strtotime($pause_data[0]->end_date);
        $curr_date               = strtotime(date('Y-m-d'));
        $exist_diff             = $curr_date - $exsist_pause_start_date;
        $exist_diff             = round($exist_diff / (60 * 60 * 24));
        $pause_data_day          = $pause_data[0]->days;
        $extend_date             = $curr_date - strtotime($pause_data[0]->start_date);
        $extend_date             = round($extend_date / (60 * 60 * 24)) + 1;

        if ($exist_diff <= 3) {
            $pause_data_day = $pause_data_day - 3;
            $pause_plan_update = [
                'pause_day_availed' => $users->pause_day_availed - $pause_data_day,
                'user_status'       => 8,
                'plan_end_date'     => date('Y-m-d', strtotime($users->plan_end_date . ' -' . $extend_date . ' days'))
            ];
            //'plan_end_date'=>date('Y-m-d', strtotime($users->plan_end_date. ' +'.$extend_date.' days'))
            $users_update = User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($pause_plan_update);
            $up_futur_pause = $this->data_pause_update($users->username, $pause_data[0]->start_date, $pause_data[0]->end_date, 3, $exist_diff);

            $d_cal = $pause_data[0]->days + $exist_diff + 1;
            $mailData = [
                'to_email'    => $users->email,
                'subject'     => 'Liv Ezy - Membership Resumed',
                'name'        => $users->name,
                'days'        => $d_cal ? $d_cal : 1,
                'voilation'   => 1,
                'start_from'  => date('d/m/Y', strtotime($pause_data[0]->start_date)),
                'end_to'      => date('d/m/Y', strtotime($pause_data[0]->end_date)),
                'resume_date' => date('d/m/Y', strtotime($pause_data[0]->end_date . ' + 1 days'))
            ];
            $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_cancel', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                $message->subject($mailData['subject']);
                //$message->bcc('admin@livezy.com');
                $message->bcc('artisan.here@gmail.com');
            });
            if ($users->is_buddy) {
                $users_buddy_data = User::where(['status' => 1, 'username' => $users->buddy_username])->first();
                $up_futur_pause = $this->data_pause_update($users->buddy_username, $pause_data[0]->start_date, $pause_data[0]->end_date, 3, $exist_diff);
                $users_update_buddy = User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                $mailData = [
                    'to_email'    => $users_buddy_data->email,
                    'subject'     => 'Liv Ezy - Membership Resumed',
                    'name'        => $users_buddy_data->name,
                    'days'        => $d_cal ? $d_cal : 1,
                    'voilation'   => 1,
                    'start_from'  => date('d/m/Y', strtotime($pause_data[0]->start_date)),
                    'end_to'      => date('d/m/Y', strtotime($pause_data[0]->end_date)),
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
            $pause_data_day = $pause_data_day - $exist_diff;
            $pause_plan_update = [
                'pause_day_availed' => $users->pause_day_availed - $pause_data_day,
                'user_status'       => 8,
                'plan_end_date'     => date('Y-m-d', strtotime($users->plan_end_date . ' -' . $extend_date . ' days'))
            ];
            //'plan_end_date'=>date('Y-m-d', strtotime($users->plan_end_date. ' +'.$extend_date.' days'))
            $users_update = User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($pause_plan_update);
            $up_futur_pause = $this->data_pause_update($users->username, $pause_data[0]->start_date, $pause_data[0]->end_date, 3, $exist_diff);

            $mailData = [
                'to_email'    => $users->email,
                'subject'     => 'Liv Ezy - Membership Resumed',
                'name'        => $users->name,
                'days'        => $pause_data[0]->days,
                'voilation'   => 0,
                'start_from'  => date('d/m/Y', strtotime($pause_data[0]->start_date)),
                'end_to'      => date('d/m/Y', strtotime($pause_data[0]->end_date)),
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
                $up_futur_pause = $this->data_pause_update($users->username, $pause_data[0]->start_date, $pause_data[0]->end_date, 3, $exist_diff);
                $mailData = [
                    'to_email'    => $users_buddy_data->email,
                    'subject'     => 'Liv Ezy - Membership Resumed',
                    'name'        => $users_buddy_data->name,
                    'days'        => $pause_data[0]->days,
                    'voilation'   => 0,
                    'start_from'  => date('d/m/Y', strtotime($pause_data[0]->start_date)),
                    'end_to'      => date('d/m/Y', strtotime($pause_data[0]->end_date)),
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
        // echo true;
        return response()->json(['message' => $this->success_message_get, 'response' => true, 'status' => 200], 200);
    }

    public function save_profile()
    {
        Log::info('Saving profile');
        if (isset($_POST['password']))
            $_POST['password'] = bcrypt($_POST['password']);
        $update_details = User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($_POST);
        $user = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $session_data_ex = [
            'name'          => ucfirst($user->name),
            'email'         => $user->email,
            'image'         => $user->image,
            'mob_no'        => $user->mob_no,
            'plan'          => 'free',
            'type'          => 'individual',
            'role'          => 'user'
        ];
        Session::put($session_data_ex);
        $status = '';
        if ($update_details)
            $status = true;
        else
            $status = false;

        return response()->json(['message' => $this->success_message_saved, 'response' => $status, 'status' => 200], 200);
    }

    public function save_GSTDetails()
    {
        Log::info('Saving GST details');
        $update_details = User::where(['status' => 1, 'username' => '01009483'])->limit(1)->update($_POST);
        $user = User::where(['status' => 1, 'username' => '01009483'])->first();
        $session_user_data = [
            'name'          => ucfirst($user->name),
            'mob_no'        => $user->mob_no,
            'email'         => $user->email
        ];
        Session::put($session_user_data);
        $status = '';
        if ($update_details)
            $status = true;
        else
            $status = false;

        return response()->json(['message' => $this->success_message_saved, 'response' => $status, 'status' => 200], 200);
    }

    public function new_question_ans_submit()
    {
        Log::info('question_submit by ' . Session::get('username'));
        $question_answer = $_POST['answer'];
        $users = User::where(['status' => 1, 'username' => Session::get('username')])->first();

        $quest_plan_update = [
            'user_status'          => 4,
            'eating_habbit'        => json_decode($question_answer, true)[2],
            // 'service_hour'      => json_decode($question_answer, true)[25],
            'question_submit_date' => date('Y-m-d')
        ];

        $quest_data = [
            'username'   => $users->username,
            'answer'     => $question_answer,
            'type'       => 'new',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        QuestionAnswer::where('username', $users->username)->limit(1)->update(['status' => 0, 'updated_at' => date('Y-m-d H:i:s')]);
        QuestionAnswer::create($quest_data);
        User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($quest_plan_update);

        // Whatsapp notification
        $mobile_no     = $users->mob_no;
        $name          = $users->name;
        $template_name = "online_questionnaire_received_1";
        if ($mobile_no) {
            app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
        }

        return response()->json(['message' => $this->success_message_stored, 'response' => true, 'status' => 200], 200);
    }

    public function renewal_question_ans_submit()
    {
        Log::info('renewal_question_submit by ' . Session::get('username'));
        $question_answer = $_POST['answer'];
        $users = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $quest_plan_update = [
            'user_status'          => 4,
            'question_submit_date' => date('Y-m-d')
        ];
        $quest_data = [
            'username'   => $users->username,
            'answer'     => $question_answer,
            'type'       => 'renew',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        QuestionAnswer::where('username', $users->username)->update(['status' => 0, 'updated_at' => date('Y-m-d H:i:s')]);
        QuestionAnswer::create($quest_data);
        User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($quest_plan_update);

        return response()->json(['message' => $this->success_message_stored, 'response' => true, 'status' => 200], 200);
    }

    public function referal_code_check()
    {
        $referal_code = $_POST['r_code'];
        $member_type  = $_POST['member_type'];
        $r_code_exist = User::where(['referal_code' => $referal_code])
                              ->where('user_status', '<', 10)
                              ->where('user_status', '>', 7)
                              ->first();
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
            $result = VoucherCode::where(['status' => 1, 'code' => $referal_code]);
            if ($result) {
                $ad_vc = $result;
                if (strpos($member_type, 'live') === false)
                    $extend_day = 14;
                else
                    $extend_day = 0;
            }
        }
        $result = '';
        if ($extend_day)
            $result = $extend_day;
        else
            $result = false;

        return response()->json(['message' => $this->success_message_get, 'response' => $result, 'status' => 200], 200);
    }

    public function referal_code_apply()  // need to test for buddies update
    {
        // Log::info('Referal_code_apply: '.$_POST['r_code'].' --------- username: '.Session::get('username'));
        $referal_code   = $_POST['r_code'];
        $users          = User::where(['status' => 1, 'username' => '64963392'])->first();
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
            $result = VoucherCode::where(['status' => 1, 'code' => $referal_code])->first();
            if ($result) {
                $ad_vc = $result;
                $admin = true;
            }
        }
        if ($admin) {
            Log::info('Is Coach referal: '.json_encode($ad_vc). ' Username: '.$users->username);
            Log::info('-------------------------------------------------------');
            if ($users->member_type != 'Live Session') {
                $extend_day = 14;
                if (Session::get('extension')) {
                    $extend_day = 30;
                }
                // Get user's bought plan's total workdays
                $plan_workdays = $users->total_workday;
                $referal_data_insert = [
                    'username'     => $ad_vc[0] ? $ad_vc[0]->coach_id : '64963392',
                    // 'username'  => Session::get('username'),
                    'code'         => $referal_code,
                    'code_used_by' => '64963392',
                    'no_of_days'   => $extend_day,
                    'type'         => 'Admin',
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s')
                ];
                $refer_pop_up = [
                    // add the extension of days to the user's total workdays.
                    'total_workday'  => $plan_workdays + $extend_day,
                    'referal_action' => 1,
                    'refered_by'     => $ad_vc[0] ? $ad_vc[0]->coach_id : '64963392',
                    'refered_type'   => 'Admin'
                ];
                MemberExtension::create($referal_data_insert);
                $users_update = User::where(['status' => 1, 'username' => '64963392'])->limit(1)->update($refer_pop_up);
                if ($users->is_buddy) {
                    $referal_data_insert['username'] = $users->buddy_username;
                    MemberExtension::create($referal_data_insert);
                    $users_update = User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($refer_pop_up);
                }
                echo $extend_day;
            } else {
                $extend_day = false;
            }
        }

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
                'username'     => '64963392',
                'code'         => $referal_code,
                'code_used_by' => '64963392',
                'no_of_days'   => $extend_day,
                'created_at'   => date('Y-m-d H:i:s'),
                'updated_at'   => date('Y-m-d H:i:s')
            ];
            if ($r_code_exist->member_type == 'Live Session') {
                $referal_add_expiration_day = [
                    'plan_end_date' => date('Y-m-d', strtotime($r_code_exist->plan_end_date . ' + ' . $extend_day . ' days')),
                    'total_workday' => $refer_plan_total_day + $extend_day
                ];
                $referal_data_insert = [
                    'username'     => '64963392',
                    'code'         => $referal_code,
                    'code_used_by' => '64963392',
                    'no_of_days'   => $extend_day,
                    'created_at'   => date('Y-m-d H:i:s'),
                    'updated_at'   => date('Y-m-d H:i:s')
                ];
            }
            // Get user's bought plan's total workdays
            $plan_workdays = $users->total_workday;
            // $refer_pop_up=['referal_action'=>1];
            $refer_pop_up = [
                // add the extension of days to the user's total workdays.
                'total_workday'  => $plan_workdays + $extend_day,
                'referal_action' => 1,
                'refered_by'     => $r_code_exist->username,
                'refered_type'   => 'User'
            ];
            MemberExtension::create($referal_data_insert);
            $users_update = User::where(['status' => 1, 'username' => '64963392'])->limit(1)->update($refer_pop_up);
            if ($users->is_buddy) {
                $referal_data_insert['username'] = $users->buddy_username;
                MemberExtension::create($referal_data_insert);
                $users_update = User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($refer_pop_up);
            }
            $users_update_refered = User::where(['status' => 1, 'username' => $r_code_exist->username])->limit(1)->update($referal_add_expiration_day);
            $referal_data_insert['username'] = $r_code_exist->username;
            MemberExtension::create($referal_data_insert);

            $misc_mod->total_referal_day_update_status($referal_data_insert['username']);
            if ($r_code_exist->is_buddy) {
                $users_update_refered  =   User::where(['status' => 1, 'username' => $r_code_exist->buddy_username])->limit(1)->update($referal_add_expiration_day);
                $referal_data_insert['username'] = $r_code_exist->buddy_username;
                MemberExtension::create($referal_data_insert);
                $misc_mod->total_referal_day_update_status($referal_data_insert['username']);
            }
            return $extend_day;
        } else {
            $extend_day = false;
        }

        return response()->json(['message' => $this->success_message_get, 'response' => $extend_day, 'status' => 200], 200);
    }

    public function cancel_referal()
    {
        $users = User::where(['status' => 1, 'username' => Session::get('username')])->first();

        $referal_action = [
            'referal_action' => 1
        ];

        User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($referal_action);

        if($users->is_buddy) {
            User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($referal_action);
        }
        $result = true;

        return response()->json(['message' => $this->success_message_saved, 'response' => $result, 'status' => 200], 200);
    }

    public function generateOrder(Request $request)
    {
        $api = new Api('rzp_test_z0o2WJAmSQOwLW', 'pgn6CBqAcMkLm7gBBIHTMgtb');
        $data = $api->order->create(
            array(
                'receipt'         => '123',
                'amount'          => $request['amount'],
                'payment_capture' => 1,
                'currency'        => $request['currency']
            )
        );
        $data  = $data->toArray();
        $order = new Order();
        $order->order_id = $data['id'];
        $order->save();
        return response()->json(['message' => $this->success_message_get, 'data' => $data, 'status' => 200], 200);
    }

    public function verifyOrder(Request $request)
    {
        $api               = new Api('rzp_test_z0o2WJAmSQOwLW', 'pgn6CBqAcMkLm7gBBIHTMgtb');
        $order             = Order::where('order_id', $request->razorpay_order_id)->first();
        $order->payment_id = $request->razorpay_payment_id;
        if($order) {
            try {
                $attributes = array(
                    'razorpay_order_id'   => $request->razorpay_order_id,
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                    'razorpay_signature'  => $request->razorpay_signature
                );
                $data  = $api->utility->verifyPaymentSignature($attributes);
                $order->status = 2;
                $order->save();
                return response()->json(['message' => $this->success_message_get, 'data' => $request->razorpay_payment_id, 'status' => 200 ], 200);
            } catch (\Exception $e) {
                // Handle exception and return failure response
                $error = 'Razorpay Error: ' . $e->getMessage();
                return response()->json([
                    'data'    => null,
                    'status'  => 500,
                    'message' => $error
                ]);
            }
        } else {
            return response()->json([
                'data'    => null,
                'status'  => 404,
                'message' => 'Order not found'
            ]);
        }
    }

    public function user_coach_assignment()     // for premium coach assignments
    {
        $username     = Session::get('username');
        $user_data    = User::where(['status' => 1, 'username' => $username])->first();

        // Premium Coach Details
        $team         = $_POST['team_name'];
        $head_coach   = $_POST['coach_name'];
        $coach_det_id = $_POST['coach_det_id'];

        // Updates the payments table with team & coach name
        $payment_data = Payment::where('mobile', $user_data->mob_no)->latest()->first();
        $payment_data->head_coach = $head_coach . ' (' . $team . ')';
        $payment_data->name       = $user_data->name;
        $payment_data->save();

        $description        = 'User <b>' . $user_data->name . '</b> and User Id <b>' . $user_data->username . '</b> is assigned to ' . $team . ' and head coach ' . $head_coach;
        $notification_type  = 'Sign Up';
        $team_name          = $team;
        $created_type       = 'User';
        $created_by         = $username;
        $created_at         = date('Y-m-d H:i:s');

        // Notification of Primary user
        $data_insert_notification   = [
            'description'       => $description,
            'team_name'         => $team,
            'notification_type' => $notification_type,
            'created_type'      => $created_type,
            'created_by'        => $created_by,
            'username'          => $username,
            'created_at'        => $created_at
        ];
        Notification::insert($data_insert_notification);

        $data = [
            'team'               => $team,
            'head_coach'         => $head_coach,
            'admin_assign_coach' => 0,              // For premium user it should be 0
            'sub_coach'          => null,
            'is_renewed'         => 0
        ];
        User::where('username', $username)->limit(1)->update($data);

        // Update coach slot to reduce by 1
        $coachController = new CoachController();
        $coachController->update_coach_slots($coach_det_id);

        // Processing of Buddy Coach Assignment ...
        if($user_data->is_buddy == 1) {

            $buddy_username = $user_data->buddy_username;
            Log::info('Buddy Username: ' . $buddy_username);
            $buddy_data = User::where(['status' => 1, 'username' => $buddy_username])->first();
            Log::info('Buddy data: '.json_encode($buddy_data));
            if($buddy_data) {
                Log::info('buddy_data is true');
                if ($buddy_data->team) {
                    Log::info('buddy_data team is true');
                    if ($buddy_data->team != $team || $buddy_data->head_coach != $head_coach) {
                        Log::info('buddy_data team != team');
                        User::where('username', $buddy_data->username)->limit(1)->update($data);
                    }
                } else {
                    Log::info('Update buddy team details if not found');
                    User::where('username', $buddy_data->username)->limit(1)->update($data);
                }

                $descriptionB = 'User <b>' . $buddy_data->name . '</b> and User Id <b>' . $buddy_data->username . '</b> is assigned to ' . $team . ' and head coach ' . $head_coach;

                // Notification for Secondary (buddy) user
                $buddy_notification_data   = [
                    'description'       => $descriptionB,
                    'team_name'         => $team,
                    'notification_type' => $notification_type,
                    'created_type'      => $created_type,
                    'created_by'        => $created_by,
                    'username'          => $buddy_data->username,
                    'created_at'        => $created_at
                ];
                Notification::insert($buddy_notification_data);
            }
        }

        return response()->json(['message' => $this->success_message_saved, 'response' => true, 'status' => 200], 200);;
    }

    public function buddy_mob_check()
    {
        $mobile_no = $_POST['mob_no'];
        $result    = User::where(['status' => 1, 'mob_no' => $mobile_no])->get();
        $status    = (count($result) > 0) ? true : false;

        return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);
    }

    public function partner_email()
    {
        $email  = $_POST['partner_email'];
        $result = User::whereIn('user_status', [2,3,4,5,6,7,8,9,10])->where(['email' => $email, 'status' => 1])->get();
        $status = (count($result) > 0) ? true : false;

        return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);
    }

    public function partner_profile_filled()
    {
        Log::info('partner_profile_filled');
        $user_data = User::where(['status' => 1, 'username' => Session::get('username')])->first();

        $status = true;
        if (isset($user_data->is_buddy)) {
            $user_partner_data = User::where(['status' => 1, 'username' => $user_data->buddy_username])->first();
            if ($user_partner_data->is_profile_filled)
                $status = true;
            else
                $status = false;
        } else {
            $status = false;
        }

        return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);
    }

    public function partner_data()
    {
        Log::info('----------- partner_data ----------');
        $mobile    = $_POST['mob_no'];
        $mobile    = str_replace(' ', '', $mobile);
        $email     = $_POST['email'];
        $full_name = $_POST['full_name'];
        $gender    = $_POST['gender'];
        $existing  = $_POST['existing'];

        // check if the buddy user already exist as an user
        $user_check_details = User::where(['status' => 1, 'mob_no' => $mobile])->first();
        $users_partner      = User::where(['status' => 1, 'username' => '00224466'])->first();
        Log::info("Users partner: " . json_encode($users_partner));

        $buddy_data = User::where(['status' => 1, 'username' => $users_partner->buddy_username])->first();
        Log::info("buddy_data: " . json_encode($buddy_data));

        $username = $existing ? $users_partner->buddy_username : str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
        Log::info("Username of buddy: " . json_encode($username));

        $user_update_data = [
            'buddy_username'         => $username,
            'partner_detailed_filed' => 1
        ];

        if($existing) {
            Log::info("Inside existing partner data");
            $plan_update = [
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

            $previous_plan = [
                'username'                  => $users_partner->buddy_username,
                'previous_plan'             => $buddy_data->plan . ' ' . $users_partner->member_type,
                'previous_plan_id'          => $buddy_data->plan_id,
                'previous_team'             => $buddy_data->team,
                'previous_head_coach'       => $buddy_data->head_coach,
                'previous_sub_coach'        => $buddy_data->sub_coach,
                'current_plan'              => ucfirst($users_partner->member_type),
                'current_plan_id'           => $users_partner->plan_id,
                'previous_plan_start_date'  => $buddy_data->plan_start_date,
                'previous_plan_end_date'    => $buddy_data->plan_end_date,
            ];
            Log::info("previous_plan data for Buddy: " . json_encode($previous_plan));
            RenewalHistory::create($previous_plan);
            $user_update_data = [ 'partner_detailed_filed' => 1 ];
            $users_update = User::where(['status' => 1, 'username' => $users_partner->buddy_username])->limit(1)->update($plan_update);
        } else {
            Log::info("Inside else if not existing");
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
                    'buddy_username'         => $user_check_details->username,
                    'partner_detailed_filed' => 1
                ];
                $username = $user_check_details->username;
                $plan_update_exist = [
                    'provider_id'             => '00224466',
                    'provider'                => 'member',
                    'plan'                    => $users_partner->plan,
                    'member_type'             => $users_partner->member_type,
                    'total_workday'           => $users_partner->total_workday,
                    'plan_id'                 => $users_partner->plan_id,
                    'is_subscription'         => $users_partner->is_subscription,
                    'total_pause_day'         => $users_partner->total_pause_day,
                    'pause_day_availed'       => $users_partner->pause_day_availed,
                    'user_status'             => 2,
                    'referal_code'            => $users_partner->referal_code,
                    'is_buddy'                => 1,
                    'buddy_username'          => '00224466',
                    'partner_detailed_filed'  => 1,
                    'plan_start_date'         => NULL,
                    'plan_end_date'           => NULL,
                    'questionaire_start_date' => NULL,
                    'question_submit_date'    => NULL,
                    'updated_at'              => date('y-m-d'),
                    'user_status'             => 2,
                    'referal_action'          => $users_partner->referal_action,
                    'team'                    => $users_partner->team,
                    'head_coach'              => $users_partner->head_coach,
                    'password'                => bcrypt('welcome'),
                    'admin_assign_coach'      => $users_partner->admin_assign_coach   // added by furkan
                ];
                Log::info("Plan update for user_check_details: " . json_encode($plan_update_exist));

                if ($user_check_details->buddy_username) {
                    $buddy_log = [
                        'username'          => $user_check_details->username,
                        'buddy_username'    => $user_check_details->buddy_username,
                        'done_by'           => '00224466',
                        'unlink_date'       => $current_date_time
                    ];
                    DB::table('buddy_log')->insert($buddy_log);
                    $buddy_update_data      = ['buddy_username' => NULL];
                    $buddy_update           = User::where(['status' => 1, 'username' => $user_check_details->buddy_username])->limit(1)->update($buddy_update_data);
                }
                $users_update = User::where(['status' => 1, 'username' => $user_check_details->username])->limit(1)->update($plan_update_exist);
            } else {
                Log::info("Inside Else for totally new partner_data");
                if ($users_partner->buddy_username) {
                    Log::info("Inside if users_partner->buddy_username is changed to totally new user");
                    $buddy_log = [
                        'username'       => '00224466',
                        'buddy_username' => $users_partner->buddy_username,
                        'done_by'        => '00224466',
                        'unlink_date'    => $current_date_time
                    ];
                    DB::table('buddy_log')->insert($buddy_log);
                    $buddy_update_data = ['buddy_username' => Null];
                    $buddy_update = User::where(['status' => 1, 'username' => $users_partner->buddy_username])->limit(1)->update($buddy_update_data);
                }
                Log::info('team:'.$users_partner->team.' & head_coach:'.$users_partner->head_coach);
                $user = User::create([
                    'mob_no'                 => $mobile,
                    'email'                  => $email,
                    'provider_id'            => '00224466',
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
                    'buddy_username'         => '00224466',
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
            $coachController = new CoachController();
            $coachController->update_coach_slots($coachDetail->id);
        }
        User::where(['status' => 1, 'username' => '00224466'])->limit(1)->update($user_update_data);
        $referal_exist  = MemberExtension::where('username', '=', '00224466')->first();
        if ($referal_exist) {
            $referal_data_insert = [
                'username'     => $username,
                'code'         => $referal_exist[0]->code,
                'code_used_by' => '00224466',
                'no_of_days'   => 14
            ];
            MemberExtension::create($referal_data_insert);
        }
        $email_id = $email ? $email : $buddy_data->email;
        Log::info('Email sent to: ' . $email_id);
        $mailData = [
            'to_email' => $email_id,
            'subject'  => 'Welcome to Liv Ezy',
            "mobile"   => $mobile,
            "password" => 'welcome'
        ];
        $mail = \Illuminate\Support\Facades\Mail::send('partner_login', ['data' => $mailData], function ($message) use ($mailData) {
            $message->to($mailData['to_email']);
            $message->subject($mailData['subject']);
        });

        return response()->json(['message' => $this->success_message_get, 'response' => true, 'status' => 200], 200);
    }

    public function activate_plan()
    {
        Log::info('----------- activate_plan ----------');
        $whereCondition = ['status' => 1, 'username' => Session::get('username')];
        $users          = User::where($whereCondition)->first();
        $status         = '';
        $misc_mod       = new Misc();
        $current_date   = date("Y-m-d h:i:s");
        Log::info('User Details Before Activating Plan - admin_assign_coach: '. $users->admin_assign_coach);

        if($users) {
            $plan_id            = $_POST['plan_id'];
            $id                 = $_POST['id'];
            $admin_assign_coach = $_POST['admin_assign_coach'];
            if($admin_assign_coach == 1) {      // For LivEzy Plus
                $plan_id_details = MembershipDetails::where('id', $plan_id)->get();
            } else {                            // For LivEzy Premium
                $plan_id_details = PremiumMembershipDetails::where('id', $plan_id)->get();
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
            RenewalHistory::create($previous_plan);
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
            Log::info('User Details post Activating Plan - admin_assign_coach: '. $user_data->admin_assign_coach);

            // If premium user activates plus plan then coach details set null. where $users->admin_assign_coach checks for admin_assign_coach before plan update and $user_data->admin_assign_coach checks for admin_assign_coach after plan update
            if($users->admin_assign_coach == 0 && $user_data->admin_assign_coach == 1) {
                $team_coach = [
                    'team'                  => NULL,
                    'head_coach'            => NULL,
                    // 'admin_assign_coach' => 1
                ];
                User::where($whereCondition)->limit(1)->update($team_coach);
            }

            $session_data_ex = [
                'member_type'  => $users->member_type,
                'plan'         => $users->plan,
                'plan_id'      => $users->plan_id,
                'user_status'  => $users->user_status
            ];
            Session::put($session_data_ex);

            $whereCondition = ['username' => $users->username, 'id'  => $id];
            if($admin_assign_coach == 1) {
                Log::info("From package_bought_update");
                // 1 - activate plan & 0 - plan yet to be activated
                $updateDetails  = ['status' => 1,'activate_date' => $current_date];
                BoughtPackage::where($whereCondition)->update($updateDetails);
                Log::info('Data updated in package_bought table for username: ' . $users->username);
            } else {
                Log::info("From premium_package_bought_update");
                // 1 - activate plan & 0 - plan yet to be activated
                $updateDetails  = ['status' => 1,'updated_at' => $current_date];
                BoughtPremiumPlan::where($whereCondition)->update($updateDetails);
                Log::info('Data updated in bought_premium_plan table for username: '.$users->username. ' & id: '.$id);
            }

            //to send invoice
            $mailData = array(
                'to_email'     => $users->email,
                'subject'      => 'Liv Ezy - Welcome back!',
                'user_name'    => $users->name ? $users->name : '',
                'plan_details' => $plan_id_details->duration . ' Plan ' . $plan_id_details->type
            );
            $mail = \Illuminate\Support\Facades\Mail::send('emails.renew_bought_plan', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                // $message->bcc('admin@livezy.com');
                $message->bcc('artisan.here@gmail.com');
                $message->subject($mailData['subject']);
            });
            $status = true;
        } else {
            $status = false;
        }
        Log::info('----------- plan activated successfully ----------');
        return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);
    }

    public function sendmail(Request $request)
    {
        $mail          = new Mail;
        $mail->name    = $_POST['full_name'];
        $mail->contact = $_POST['contact'];
        $mail->email   = $_POST['email'];
        $mail->body    = $_POST['message'];
        $mail->save();

        $msg = "Following are the details from Website Contact Form\n";
        // the message
        $msg = $msg . "Full Name: " . $_POST['full_name'] . "\n";
        $msg = $msg . "Email: " . $_POST['email'] . "\n";
        $msg = $msg . "Contact : " . $_POST['contact'] . "\n";
        $msg = $msg . "Message : " . $_POST['message'] . "\n";
        // $headers = 'From:' . $_POST['email'];
        // mail('support@ralfitness.in', "Contact Form details from Website", $msg, $headers);

        $mailData = array(
            //'to_email'   => 'support@livezy.com',
            'to_email'     => 'artisan.here@gmail.com',
            'to_name'      => '',
            'full_name'    => $_POST['full_name'],
            'email'        => $_POST['email'],
            'contact'      => $_POST['contact'],
            'message'      => $_POST['message'],
            'body_content' => $msg,
            'subject'      => 'Contact Form details from Website'
        );

        $mail = \Illuminate\Support\Facades\Mail::send('emails.custom_message', ['data' => $mailData], function ($message) use ($mailData) {
            $message->to($mailData['to_email']);
            $message->subject($mailData['subject']);
        });

        echo "Email Sent : \n";
        echo "Thankyou for contacting us, we will get back you soon \n";

        return response()->json(['message' => 'Mail sent successfully', 'status' => 200], 200);
    }

    public function sendFailedTxnNotification()
    {
        Log::info('-------------- sendFailedTxnNotification -------------');
        $user = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        Log::info('WhatsApp Notification sent to '.$user->username.' on failed transaction');
        $mobile_no      = $user->mob_no;
        $name           = $user->name;
        $template_name  = "failed_payment";
        if ($mobile_no) {
            app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
            return response()->json(['message' => 'Notification sent successfully', 'status' => 200], 200);
        }
    }

    public function feedback_insert()
    {
        $user_id   = Session::get('username');
        $sess_id   = $_POST['sess_id'];
        $star      = $_POST['star'];
        $comment   = trim($_POST['comment']);
        $data      = [
            'username'   => $user_id,
            'session_id' => $sess_id,
            'star'       => $star,
            'comment'    => $comment
        ];

        $result = DB::select("SELECT * FROM `feedback_live_session` WHERE username = $user_id AND session_id = $sess_id");
        $status = '';
        if($result){
            DB::table('feedback_live_session')->insert($data);
            return $status = true;
        } else {
            return $status = false;
        }

        return response()->json(['message' => $this->success_message_get, 'response' => $status, 'status' => 200], 200);
    }

    public function intro_call_feedback()
    {
        Log::info('-------------- intro_call_feedback ------------');
        $username = Session::get('username');
        $star     = $_POST['star'];
        $comment  = trim($_POST['comment']);
        $data     = [
            'username' => $username,
            'star'     => $star,
            'comment'  => $comment
        ];

        User::where(['status' => 1, 'username' => $username])->limit(1)->update(['intro_call' => 1]);
        IntroCallFeedback::create($data);

        return response()->json(['message' => $this->success_message_store, 'status' => 200], 200);
    }

    public function real_time_insert()
    {
        Log::info('-------------- real_time_insert ------------');
        $user_data           = User::where(['status' => 1, 'username' => '82386992'])->first();
        $description         = 'Free member bought the ' . $user_data->member_type . ' plan for ' . $user_data->plan;
        $notification_type   = 'Sign Up';
        $created_type        = 'Super admin';
        $created_by          = 5;
        $current_date_notifi = date('Y-m-d H:i:s');

        $notification_data   = [
            'description'       => $description,
            'notification_type' => $notification_type,
            'team_name'         => 'Internal',
            'created_type'      => $created_type,
            'created_by'        => $created_by,
            'username'          => $user_data->username,
            'created_at'        => $current_date_notifi
        ];

        if ($user_data->real_time_database == 0) {
            User::where(['status' => 1, 'username' => $user_data->username])->limit(1)->update(['real_time_database' => 1]);
            Notification::insert($notification_data);
            return response()->json(['message' => $this->success_message_store, 'status' => 200], 200);
        } else {
            return response()->json(['message' => 'Data already updated!', 'status' => 200], 200);
        }
    }

    public function recipes()
    {
        if (isset($_GET['q']) && $_GET['q'] > 0) {
            $videos = RecipesVideo::where('id', $_GET['q'])->orderBy('id', 'desc')->get();
        } else {
            $videos = RecipesVideo::where('status', 1)->orderBy('id', 'desc')->get();
        }
        return response()->json(['message' => $this->success_message_get , 'data' => $videos, 'status' => 200], 200);
    }

    public function testimonial_story(Request $request)
    {
        $testimonials = Testimonial::where('status', 1)->orderBy('display_order', 'asc')->paginate(9);
        return response()->json(['message' => $this->success_message_get , 'data' => $testimonials, 'status' => 200], 200);
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
}
