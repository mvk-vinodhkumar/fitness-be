<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Zoom;
use Illuminate\Support\Facades\Http;
use Razorpay\Api\Api;

use Config;
use DateTime;
use DateTimeZone;
use Exception;

// Controllers Used:
use App\Http\Controllers\HomeController;

// Models Used:
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\RecipesVideo;
use App\Models\SubscriptionCapture;
use App\Testimonial;
use App\Models\Mail;
use App\Models\Order;
use App\Models\Coach;
use App\Models\CoachDetail;
use App\Models\CoachTransformation;
use App\Models\CoachCertification;
use App\Models\User;
use App\Models\Notification;
use App\Models\AdminMemberExtension;
use App\Models\MemberExtension;
use App\Models\MembershipDetails;
use App\Models\RenewalHistory;
use App\Models\TeamCoach;
use App\Models\PausePlan;


class AdminController extends Controller
{
    public function admin_question_view()
    {
        Log::info("admin_question_view");
        if (Session::get('role') == 'admin') {
            $user_id = $_GET['user_id'];
            $user_data = User::where(['status' => 1, 'username' => $user_id])->first();
            if ($user_data) {
                $gender = $user_data->gender;
                if ($gender == 'Non-Binary') {
                    $gender = 'Male';
                }
                $result = DB::table('question')->where('gender', 'All')->orWhere('gender', $gender)->get();
                $fill_result = [];
                $answer = DB::table('question_answer')->where('username',$user_id)->get();
                if ($answer) {
                    $fill_result = $answer;
                }
                if (sizeof($fill_result) != 0) {
                    return view('admin_question', [
                        'data' => $result,
                        'gender' => $gender,
                        'answer' => $fill_result,
                        'user_data' => $user_data
                    ]);
                } else {
                    echo $user_id . ' not filled questionaire till now';
                }
            } else {
                echo $user_id . ' not exsist';
            }
        } else {
            echo 'You are not authorize to access this page';
        }
    }

    public function admin_cus_notification($user_data, $start_date, $end_date)
    {
        Log::info("admin_cus_notification");
        $description = 'Pause active for ' . $user_data->name . ' from ' . date('d/m/Y', strtotime($start_date)) . ' to ' . date('d/m/Y', strtotime($end_date));
        $notification_type = 'Pause';
        $created_type = 'Super admin';
        $created_by = 5;
        $data = [
            'description'       => $description,
            'notification_type' => $notification_type,
            'team_name'         => $user_data->team,
            'created_type'      => $created_type,
            'created_by'        => $created_by,
            'username'          => $user_data->username,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s')
        ];
        $notification = new Notification($data);
        $notification->save();
    }

    public function check_session_admin()
    {
        Log::info("check_session_admin");
        //checking only for admin and it is reusable function
        if (Session::get('role') == 'admin' && Session::has('role')) {
            if (!isset($_COOKIE['admin_iden'])) {
                $this->admin_logout();
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function membership_extend()
    {
        Log::info("membership_extend");
        $username = $_POST['username'];
        $days_add = (int)$_POST['no_days'];
        $comment  = $_POST['comment'];
        if ($days_add) {
            $users = User::where(['status' => 1, 'username' => $username])->first();
            $extend_membership = [
                'plan_end_date' => date('Y-m-d', strtotime($users->plan_end_date . ' + ' . $days_add . ' days')),
                'total_workday' => $users->total_workday + $days_add
            ];
            $insert_membership_extension = [
                'previous_end_date' => $users->plan_end_date,
                'end_date'          => date('Y-m-d', strtotime($users->plan_end_date . ' + ' . $days_add . ' days')),
                'username'          => $username,
                'days'              => $days_add,
                'comments'          => $comment,
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s')
            ];
            $users_update  =   User::where(['status' => 1, 'username' => $username])->limit(1)->update($extend_membership);
            $membership_extend_admin =  new AdminMemberExtension($insert_membership_extension);
            $membership_extend_admin->save();
            if ($users->is_buddy) {
                $insert_membership_extension['username'] = $users->buddy_username;
                $users_buddy_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($extend_membership);
                $membership_extend_admin =  new AdminMemberExtension($insert_membership_extension);
                $membership_extend_admin->save();
            }
            return 'Membership Extended for ' . $days_add . ' days';
        } else {
            return 'Enter the day greater than 1';
        }
    }

    public function pause_details_user($username){
        Log::info("pause_details_user");
        $current_date  = date("Y-m-d");
        $future_pause  = PausePlan::where('username', $username)->where('status', 1)->get()->toArray();
        $current_pause = PausePlan::where('username', $username)->whereIn('status', [2, 3])->orderBy('id', 'DESC')->first();
        $result=[
            'future_pause'=>$future_pause,
            'current_pause'=>$current_pause
        ];
        return $result;
    }

    public function pause_user_admin()
    {
        Log::info("pause_user_admin");
        $username = $_POST['username'];
        $pause_id = (int)$_POST['pauseId'];
        $is_email = isset($_POST['is_email']) ? $_POST['is_email'] : 0;
        $pause_start = strtotime($_POST['pause_start_date']);
        $pause_end = strtotime($_POST['pause_end_date']);
        $psd = $_POST['pause_start_date'];
        $ped = $_POST['pause_end_date'];
        $current_date = date('Y-m-d');
        $current_datestr = strtotime($current_date);
        if ($pause_start >= $pause_end) {
            return 'Pause date is  not corect';
        } else {
            $datediff = ($pause_end - $pause_start);
            $datediff = round($datediff / (60 * 60 * 24)) + 1;
            $users    = User::where(['status' => 1, 'username' => $username])->first();
            if ($pause_id) {
                $datediff_existing = ($pause_end - $current_datestr);
                $datediff_existing = round($datediff_existing / (60 * 60 * 24)) + 1;
                $pause_plan_update = [
                    'pause_day_availed' => ($users->pause_day_availed + $datediff_existing) > $users->total_pause_day ? $users->total_pause_day : $users->pause_day_availed + $datediff_existing,
                    'plan_end_date' => date('Y-m-d', strtotime($users->plan_end_date . ' + ' . $datediff . ' days'))
                ];
                $update_pause = [
                    'end_date'      => $ped,
                    'cancel_date'   => $ped,
                    'days'          => $datediff,
                    'created_admin' => 1
                ];
                $users_update = User::where(['status' => 1, 'username' => $username])->limit(1)->update($pause_plan_update);
                PausePlan::where('username', $pause_id)->update($update_pause);
                if ($users->email && $is_email) {
                    $mailData = [
                        'to_email'    => $users->email,
                        'subject'     => 'Liv Ezy - Membership Pause Extended',
                        'name'        => $users->name,
                        'days'        => $datediff_existing,
                        'voilation'   => 0,
                        'start_from'  => date('d/m/Y', strtotime($psd)),
                        'end_to'      => date('d/m/Y', strtotime($ped)),
                        'resume_date' => date('d/m/Y', strtotime($ped . ' + 1 days'))
                    ];
                    $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_extend', ['data' => $mailData], function ($message) use ($mailData) {
                        $message->to($mailData['to_email']);
                        $message->subject($mailData['subject']);
                        //$message->bcc('admin@livezy.com');
                        $message->bcc('artisan.here@gmail.com');
                    });
                }
                $this->admin_cus_notification($users, $psd, $ped);
                if ($users->is_buddy) {
                    $this->pause_details_user($users->buddy_username);
                    $pause_id = $pause_details['current_pause'][0]['id'];
                    $buddy_users_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                    $pause_data_update['username'] = $users->buddy_username;
                    $user_data       =   User::where(['status' => 1, 'username' => $users->buddy_username])->first();
                    PausePlan::where('username', $users->buddy_username)->update($pause_data_insert);
                    $this->admin_cus_notification($user_data, $psd, $ped);
                    if ($user_data->email && $is_email) {
                        $mailData = [
                            'to_email' => $user_data->email,
                            'subject' => 'Liv Ezy - Membership Pause Extended',
                            'name' => $user_data->name,
                            'days' => $datediff_existing,
                            'voilation' => 0,
                            'start_from' => date('d/m/Y', strtotime($psd)),
                            'end_to' => date('d/m/Y', strtotime($ped)),
                            'resume_date' => date('d/m/Y', strtotime($ped . ' + 1 days'))
                        ];
                        $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_extend', ['data' => $mailData], function ($message) use ($mailData) {
                            $message->to($mailData['to_email']);
                            $message->subject($mailData['subject']);
                            //$message->bcc('admin@livezy.com');
                            $message->bcc('artisan.here@gmail.com');
                        });
                    }
                }
                return 'Pause extended';
            } else {
                $day_check = $users->pause_day_availed + $datediff;
                $pause_plan_update = [
                    'pause_day_availed' => $day_check > $users->total_pause_day ? $users->total_pause_day : $users->pause_day_availed + $datediff,
                    'plan_end_date'     => date('Y-m-d', strtotime($users->plan_end_date . ' + ' . $datediff . ' days'))
                ];
                $pause_data_insert = [
                    'username'      => $username,
                    'start_date'    => $psd,
                    'end_date'      => $ped,
                    'cancel_date'   => $ped,
                    'days'          => $datediff,
                    'created_admin' => 1,
                    'status'        => 1,
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                ];
                if ($current_date == $psd) {
                    $pause_plan_update['user_status'] = 9;
                    $pause_data_insert['status']      = 2;
                }
                $users_update = User::where(['status' => 1, 'username' => $username])->limit(1)->update($pause_plan_update);
                PausePlan::insert($pause_data_insert);
                $this->admin_cus_notification($users, $psd, $ped);
                if ($users->email && $is_email) {
                    $mailData = [
                        'to_email'    => $users->email,
                        'subject'     => 'Liv Ezy - Membership Paused',
                        'name'        => $users->name,
                        'days'        => $datediff,
                        'voilation'   => 0,
                        'start_from'  => date('d/m/Y', strtotime($psd)),
                        'end_to'      => date('d/m/Y', strtotime($ped)),
                        'resume_date' => date('d/m/Y', strtotime($ped . ' + 1 days'))
                    ];
                    $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_email', ['data' => $mailData], function ($message) use ($mailData) {
                        $message->to($mailData['to_email']);
                        $message->subject($mailData['subject']);
                        //$message->bcc('admin@livezy.com');
                        $message->bcc('artisan.here@gmail.com');
                    });
                }
                if ($users->is_buddy) {
                    $buddy_users_update  =   User::where(['status' => 1, 'username' => $users->buddy_username])->limit(1)->update($pause_plan_update);
                    $pause_data_insert['username'] = $users->buddy_username;
                    $user_data = User::where(['status' => 1, 'username' => $users->buddy_username])->first();
                    PausePlan::insert($pause_data_insert);
                    $this->admin_cus_notification($user_data, $psd, $ped);
                    if ($user_data->email && $is_email) {
                        $mailData = [
                            'to_email'    => $user_data->email,
                            'subject'     => 'Liv Ezy - Membership Paused',
                            'name'        => $user_data->name,
                            'days'        => $datediff,
                            'voilation'   => 0,
                            'start_from'  => date('d/m/Y', strtotime($psd)),
                            'end_to'      => date('d/m/Y', strtotime($ped)),
                            'resume_date' => date('d/m/Y', strtotime($ped . ' + 1 days'))
                        ];
                        $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_email', ['data' => $mailData], function ($message) use ($mailData) {
                            $message->to($mailData['to_email']);
                            $message->subject($mailData['subject']);
                            //$message->bcc('admin@livezy.com');
                            $message->bcc('artisan.here@gmail.com');
                        });
                    }
                }
                return 'Pause Created';
            }
        }
    }

    public function uploadS3()
    {
        foreach (Testimonial::all() as $key => $value) {
            try {
                $e = explode(".", $value->image_url);
                $e = $e[count($e) - 1];
                $key = 'testimonial/' . str_replace(' ', '', $value['name']) . '/' . time() . '.' . $e;
                $s3 = Storage::disk('s3');
                $s3->put($key, file_get_contents(str_replace('/images', 'images', $value->image_url)));
                $value->image_url = Storage::disk('s3')->url($key);
                $value->save();
            } catch (\Exception $e) {
                // Handle the exception
                Log::error('Error occurred while saving testimonial: ' . $exception->getMessage());
            }
        }
    }

    public function get_user_data()
    {
        Log::info('get_user_data');
        $type_user = $_POST['user_type'];
        $username = $_POST['username'];
        if ($type_user) {
            $users       =   User::where(['status' => 1, 'username' => $username])->first();
            if ($type_user == 'existing') {
                if ($users->user_status > 1) {
                    $html_user = '<div class="row add_u_s">
                    <div class="col-md-12">
                        <div style="margin-bottom: 10px;">Existing Plan Details</div>
                        <div class="col-md-4">User Name: ' . ucfirst($users->name) . '</div>
                        <div class="col-md-4">Plan Type: ' . ucfirst($users->member_type) . '</div>
                        <div class="col-md-4">Plan Duration: ' . ucfirst($users->plan) . '</div>
                    </div>
                    </div>
                    <div class="row add_u_s">
                        <div class="col-md-12">
                            <div style="margin-bottom: 10px;">Choose Renewal Plan & Fill Details</div>
                            <!-- <div class="col-md-4">Plan Name: Live Session</div> -->
                            <div class="col-md-6">
                                <select id="user_select_plan" data-placeholder="Select Plan type" class="form-control i_s c_t_i chosen-select" >
                                    <option value="Individual">Individual</option>
                                    <option value="Buddy">Buddy</option>
                                    <option value="Live Session">Live Session</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select id="user_select_duration" data-placeholder="Select Plan type" class="form-control i_s c_t_i chosen-select" >
                                    <option value="1 Month">1 Month</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="12 Months">12 Months</option>
                                </select>
                            </div>
                            <div class="col-md-12" style="margin-top:18px; padding:0px;">
                                <div class="col-md-6">
                                    <input type="text" name="plan_amount" id="plan_amount" class="form-control" placeholder="Plan Amount">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="new_user_email" id="new_user_email" class="form-control" value="'.($users->email).'" placeholder="User E-mail">
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top:18px; padding:0px;">
                                <div class="col-md-6">
                                    <input type="text" name="new_user_mob" id="new_user_mob" class="form-control" value="'.($users->mob_no).'" placeholder="User Mobile">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="street" name="street" value="'.($users->street).'" placeholder="Enter Street">
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top:18px; padding:0px;">
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="city" name="city" value="'.($users->city).'" placeholder="Enter City">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="pincode" name="pincode" value="'.($users->pincode).'" placeholder="Enter Pincode">
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top:18px; padding:0px;">
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="state" name="state" value="'.($users->state).'" placeholder="Enter State">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="country" name="country" value="'.($users->country).'" placeholder="Enter Country">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="row add_u_s">
                        <div class="col-md-4">
                            <input style="margin-top:12px;margin-left: 16px;" type="checkbox" name="deactivate_usere" value="1" class="add_main"> Deactivate User
                        </div>
                        <div class="col-md-12">
                            <div style="float:right;margin-top:-30px;background:#8d0f0f; margin-right:13px;" class="col-md-3 create_user" onclick="deactivate_user_fun()">
                                    Deactivate
                            </div>
                        </div>
                    </div>


                    <div class="row add_u_s">
                        <div class="col-md-12">
                            <input style="margin-left: 16px;" type="checkbox" name="send_email" value="1" class="add_main"> Send email to user
                        </div>
                    </div>

                    <div class="row add_u_s">
                        <div class="col-md-12">
                            <input style="margin-left: 16px;" type="checkbox" name="is_livezy_plus" value="1" id="is_livezy_plus" class="add_main"> Is User LivEzy Plus
                        </div>
                    </div>
                    <div class="row add_u_s">
                        <div style="color:red;" class="col-md-12 error_create">

                        </div>
                    </div>
                    <div class="row add_u_s" style="margin-left: 42%;">
                        <button class="col-md-3 create_user" id="admin_create_existing_user" onclick="create_user()">
                                Create
                        </button>
                    </div>
                    <script>
                        function create_user()
                        {
                            var username=$("#user_select").val();
                            var user_type=$(\'input[name="user_add"]:checked\').val();
                            var duration=$("#user_select_duration").val();
                            var plan_type=$("#user_select_plan").val();
                            var is_email=$(\'input[name="send_email"]:checked\').val();
                            var amount = $("#plan_amount").val();
                            var email  = $("#new_user_email").val();
                            var mobile = $("#new_user_mob").val();
                            var street = $("#street").val();
                            var city   = $("#city").val();
                            var pincode = $("#pincode").val();
                            var state   = $("#state").val();
                            var country = $("#country").val();
                            var is_plus = $(\'input[name="is_livezy_plus"]:checked\').val();

                            let data = {
                                "username":username,
                                "user_type":user_type,
                                "plan_type":plan_type,
                                "plan":duration,
                                "amount":amount,
                                "email":email,
                                "mobile":mobile,
                                "street":street,
                                "city":city,
                                "pincode":pincode,
                                "state":state,
                                "country":country,
                                "is_email":is_email,
                                "is_plus" : is_plus
                            };

                            if(plan_type && duration && user_type && username && amount && email && mobile && street && city && pincode && state && country) {
                                console.log(data);
                                $("#admin_create_existing_user").prop("disabled", true);
                                $("#admin_create_existing_user").attr("title", "Please Wait! User is being created.");
                                $.ajax({
                                    type:"POST",
                                    data:data,
                                    url:"create_user_admin",
                                    success:function(data){
                                        if(data){
                                            if(data=="User Updated"){
                                                window.location.href="/admin";
                                            }
                                            $(".error_create").html(data);
                                        }
                                    }
                                });
                            }else{
                                toastr.error("Please fill all required fields.");
                            }
                        }
                        function deactivate_user_fun(){
                            var username=$("#user_select").val();
                            var is_deactivate=$(\'input[name="deactivate_usere"]:checked\').val();
                            if(is_deactivate){
                                $.ajax({
                                    type:"post",
                                    data:{"username":username},
                                    url:"deactivate_user",
                                    success:function(data){
                                        if(data){
                                            if(data=="User Updated"){
                                                window.location.href="/admin";
                                            }
                                            $(".error_create").html(data);
                                        }
                                    }
                                })
                            }else{
                                $(".error_create").html("Please Select Deactivate checkbox");
                            }
                        }
                    </script>
                ';
                    return $html_user;
                } else {
                    return '<p style="color:red;margin-top:20px;">This user is new, please select an existing user</p>';
                }
            } else {
                if ($users->user_status == 1) {
                    $html_user = '
                    <div class="row add_u_s">
                        <div class="col-md-12">
                            <div style="margin-bottom:20px">Choose Plan Details for <b>' . ucfirst($users->name) . '</b></div>
                            <!-- <div class="col-md-4">Plan Name: Live Session</div> -->
                            <div class="col-md-6">
                                <select id="user_select_plan" data-placeholder="Select Plan type" class="form-control i_s c_t_i chosen-select" >
                                    <option value="Individual">Individual</option>
                                    <option value="Buddy">Buddy</option>
                                    <option value="Live Session">Live Session</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <select id="user_select_duration" data-placeholder="Select Plan type" class="form-control i_s c_t_i chosen-select" >
                                    <option value="1 Month">1 Month</option>
                                    <option value="3 Months">3 Months</option>
                                    <option value="6 Months">6 Months</option>
                                    <option value="12 Months">12 Months</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:18px;">
                            <div class="col-md-6">
                                <input type="text" name="plan_amount" id="plan_amount" class="form-control" placeholder="Plan Amount">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="new_user_email" id="new_user_email" class="form-control" value="'.($users->email).'" placeholder="User E-mail">
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:18px;">
                            <div class="col-md-6">
                                <input type="text" name="new_user_mob" id="new_user_mob" class="form-control" value="'.($users->mob_no).'" placeholder="User Mobile">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control input_css general_form_css mb-2" id="street" name="street" value="'.($users->street).'" placeholder="Enter Street">
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:18px;">
                            <div class="col-md-6">
                                <input type="text" class="form-control input_css general_form_css mb-2" id="city" name="city" value="'.($users->city).'" placeholder="Enter City">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control input_css general_form_css mb-2" id="pincode" name="pincode" value="'.($users->pincode).'" placeholder="Enter Pincode">
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top:18px;">
                            <div class="col-md-6">
                                <input type="text" class="form-control input_css general_form_css mb-2" id="state" name="state" value="'.($users->state).'" placeholder="Enter State">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control input_css general_form_css mb-2" id="country" name="country" value="'.($users->country).'" placeholder="Enter Country">
                            </div>
                        </div>

                    </div>
                    <div class="row add_u_s">
                        <div class="col-md-4"><input style="margin-top:12px;margin-left: 16px;" type="checkbox" name="deactivate_usere" value="1" class="add_main"> Deactivate User
                        </div>
                        <div class="col-md-12">
                            <div style="float:right;margin-top:-30px;background:#8d0f0f;margin-right:13px;" class="col-md-3 create_user" onclick="deactivate_user_fun()">
                                    Deactivate
                            </div>
                        </div>
                    </div>

                    <div class="row add_u_s">
                        <div class="col-md-12">
                            <input style="margin-left: 16px;" type="checkbox" name="send_email" value="1" class="add_main"> Send Invoice to User
                        </div>
                    </div>

                    <div class="row add_u_s">
                        <div class="col-md-12">
                            <input style="margin-left: 16px;" type="checkbox" name="is_livezy_plus" value="1" id="is_livezy_plus" class="add_main"> Is User LivEzy Plus
                        </div>
                    </div>
                    <div class="row add_u_s">
                        <div style="color:red;" class="col-md-12 error_create">

                        </div>
                    </div>
                    <div class="row add_u_s" style="margin-left: 42%;">
                        <button class="col-md-3 create_user" id="admin_create_new_user" onclick="create_user()">Create</button>
                    </div>
                    <script>
                        function create_user() {

                            var username=$("#user_select").val();
                            var user_type=$(\'input[name="user_add"]:checked\').val();
                            var duration=$("#user_select_duration").val();
                            var plan_type=$("#user_select_plan").val();
                            var is_email=$(\'input[name="send_email"]:checked\').val();
                            var amount = $("#plan_amount").val();
                            var email  = $("#new_user_email").val();
                            var mobile = $("#new_user_mob").val();
                            var street = $("#street").val();
                            var city   = $("#city").val();
                            var pincode = $("#pincode").val();
                            var state   = $("#state").val();
                            var country = $("#country").val();
                            var is_plus = $(\'input[name="is_livezy_plus"]:checked\').val();

                            let data = {
                                "username":username,
                                "user_type":user_type,
                                "plan_type":plan_type,
                                "plan":duration,
                                "amount":amount,
                                "email":email,
                                "mobile":mobile,
                                "street":street,
                                "city":city,
                                "pincode":pincode,
                                "state":state,
                                "country":country,
                                "is_email":is_email,
                                "is_plus" : is_plus
                            };

                            if(plan_type && duration && user_type && username && amount && email && mobile && street && city && pincode && state && country) {
                                console.log(data);
                                $("#admin_create_new_user").prop("disabled", true);
                                $("#admin_create_new_user").attr("title", "Please Wait! User is being created.");
                                $.ajax({
                                    type:"POST",
                                    data:data,
                                    url:"create_user_admin",
                                    success:function(data){
                                        if(data){
                                            if(data=="User Updated"){
                                                window.location.href="/admin";
                                            }
                                            $(".error_create").html(data);
                                        }
                                    }
                                });
                            }else{
                                toastr.error("Please fill all required fields.");
                            }
                        }
                        function deactivate_user_fun(){
                            var username=$("#user_select").val();
                            var is_deactivate=$(\'input[name="deactivate_usere"]:checked\').val();
                            if(is_deactivate){
                                $.ajax({
                                    type:"post",
                                    data:{"username":username},
                                    url:"deactivate_user",
                                    success:function(data){
                                        if(data){
                                            if(data=="User Updated"){
                                                window.location.href="/admin";
                                            }
                                            $(".error_create").html(data);
                                        }
                                    }
                                })
                            }else{
                                $(".error_create").html("Please Select Deactivate checkbox");
                            }
                        }
                    </script>
                ';
                    return $html_user;
                } else {
                    return '<p style="color:red;margin-top:20px;">This user is existing, please select a new user</p>';
                }
            }
        }
    }

    public function deactivate_user()
    {
        $username = $_POST['username'];
        $status_update = ['status' => 0];
        if (Session::get('role') == 'admin') {
            $users       =   User::where(['username' => $username])->first();
            if ($users->status == 1) {
                User::where(['status' => 1, 'username' => $username])->limit(1)->update($status_update);
                return 'User Deactivated';
            } else {
                return 'User already Deactivated';
            }
        } else {
            return '<p style="color:red;margin-top:20px;">User does not exist</p>';
        }
    }

    public function generateRandomString($length = 6)
    {
        return substr(str_shuffle(str_repeat($x = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
    }

    public function create_user_admin()
    {
        Log::info('create_user_admin');
        $type_user = $_POST['user_type'];
        $username = $_POST['username'];
        $is_plus_user = isset($_POST['is_plus']) ? 1 : 0;
        // $is_buddy=$_POST['is_buddy'];
        $is_email = isset($_POST['is_email']) ? $_POST['is_email'] : 0;
        $plan_type = $_POST['plan_type'];
        $plan = $_POST['plan'];
        // $total_member=1;
        // if($is_buddy)
        //     $total_member=2;
        $result_plan = MembershipDetails::where('type', $plan_type)->where('duration', $plan)->get()->toArray();
        log::info($result_plan);
        if ($result_plan) {
            if (sizeof($result_plan) != 0) {
                $p_id = str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT);
                $payment_id = 'admin' . $p_id;
                $users       =   User::where(['status' => 1, 'username' => $username])->first();
                $membership_status = 1;
                if ($users->user_status == 11) {
                    $membership_status = 2;
                } elseif ($users->user_status >= 2 && $users->user_status < 11) {
                    $membership_status = 3;
                }

                $gst_state     = $users->state == 'Karnataka' ? true : false;
                $plan_amount   = $_POST['amount'];
                $t_payment     = $plan_amount/1.18;
                $gst_tax       = ($t_payment*18)/100;
                $product_price = round($t_payment);
                $cgst          = $gst_tax/2;
                $c_s_gst       = '-';
                $gst           = '-';
                if($gst_state){
                    $c_s_gst = round($gst_tax/2);
                }else{
                    $gst = round($gst_tax);
                }

                $result_ind = Payment::max('Id');
                $inv_no     = $result_ind + 1;
                $inv_no     = 'LE/'.$inv_no.'/';
                if(date('m') < 04)
                    $inv_no=$inv_no.''.(date('y')-1).'-'.date('y');
                else
                    $inv_no=$inv_no.''.date('y').'-'.''.(date('y')+1);

                $created_by = '';
                if(Session::get("first_name") && Session::get("team")) {
                    $created_by = 'Admin - ' . Session::get("first_name") . '(' . Session::get("team") . ')';
                }

                $payment = array(
                    'invoice'                 => $payment_id. '.pdf',
                    'invoice_no'              => $inv_no,
                    'created_at'              => date('Y-m-d H:i:s'),
                    'updated_at'              => date('Y-m-d H:i:s'),
                    'razor_pay_id'            => $payment_id,
                    'currency_type'           => 'INR',
                    'head_coach'              => $users->head_coach ? $users->head_coach : 'NA',
                    'taxable_amount'          => round($t_payment),
                    'amount'                  => $_POST['amount'] ? $_POST['amount'] : 'default',
                    'cgst'                    => $c_s_gst == 0 ? '-' : $c_s_gst,
                    'sgst'                    => $c_s_gst == 0 ? '-' :$c_s_gst,
                    'igst'                    => $gst == 0 ? '-' : $gst,
                    'plan'                    => 'default_desc',
                    'name'                    => $users->name ? $users->name : '',
                    'mobile'                  => $_POST['mobile'],
                    'email'                   => $_POST['email'],
                    'street'                  => $_POST['street'],
                    'city'                    => $_POST['city'],
                    'pincode'                 => $_POST['pincode'],
                    'state'                   => $_POST['state'],
                    'country'                 => $_POST['country'],
                    'membership_status'       => $membership_status,
                    'status'                  => 'CONFIRMED',
                    'response_from_razor_pay' => $created_by ? $created_by : 'Admin'
                );
                if ($type_user == 'new') {
                    //new user
                    // $payment['amount'] = $result_plan[0]->price;
                    $p = 'plan';
                    if ($result_plan[0]['type'] == 'Live Session') {
                        $p = "";
                    }
                    $payment['plan'] = $result_plan[0]['duration'] . ' ' . $result_plan[0]['type'] . ' ' . $p;
                    $payment['plan'] = strtolower($payment['plan']);
                    $payment_id = Payment::create($payment);
                    $payment_id->token = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 30);
                    $payment_id->save();
                    $plan_id_details = MembershipDetails::where('id', $result_plan[0]['id'])->get();
                    $plan_id_details = $plan_id_details[0];

                    $plan_update = [
                        'member_type'        => ucfirst($plan_id_details->type),
                        'email'              => $users->email,
                        'plan'               => ucfirst($plan_id_details->duration),
                        'plan_id'            => $plan_id_details->id,
                        'is_subscription'    => 0,
                        'is_buddy'           => ucfirst($plan_id_details->type) == 'Buddy' ? 1 : 0,
                        'total_pause_day'    => $plan_id_details->pause,
                        'pause_day_availed'  => 0,
                        'total_workday'      => $plan_id_details->count_subscription * 30,
                        'referal_code'       => $this->generateRandomString(),
                        'user_status'        => 2,
                        'street'             => $users->street ? $users->street : $_POST['street'],
                        'city'               => $users->city ? $users->city : $_POST['city'],
                        'pincode'            => $users->pincode ? $users->pincode : $_POST['pincode'],
                        'state'              => $users->state ? $users->state : $_POST['state'],
                        'country'            => $users->country ? $users->country : $_POST['country'],
                        'admin_assign_coach' => $is_plus_user
                    ];
                    $users_update       =   User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($plan_update);
                } else {
                    //renew user
                    Log::info('renew user plan');
                    // $payment['amount'] = $result_plan[1]->price;
                    $p = 'plan';
                    if ($result_plan[1]['type'] == 'Live Session') {
                        $p = "";
                    }
                    $payment['plan'] = $result_plan[0]['duration'] . ' ' . $result_plan[0]['type'] . ' ' . $p;
                    $payment['plan'] = strtolower($payment['plan']);
                    $payment_id = Payment::create($payment);
                    $payment_id->token = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 30);
                    $payment_id->save();
                    $plan_id_details = MembershipDetails::where('id', $result_plan[0]['id'])->get();
                    $plan_id_details = $plan_id_details[0];
                    $plan_update = [
                        'member_type'             => ucfirst($plan_id_details->type),
                        'plan'                    => ucfirst($plan_id_details->duration),
                        'plan_id'                 => $plan_id_details->id,
                        'is_subscription'         => 0,
                        'is_buddy'                => ucfirst($plan_id_details->type) == 'Buddy' ? 1 : 0,
                        'total_pause_day'         => $plan_id_details->pause,
                        'partner_detailed_filed'  => 0,
                        'pause_day_availed'       => 0,
                        'plan_start_date'         => NULL,
                        'plan_end_date'           => NULL,
                        'questionaire_start_date' => NULL,
                        'question_submit_date'    => NULL,
                        'updated_at'              => date('y-m-d'),
                        'total_workday'           => $plan_id_details->count_subscription * 30,
                        'user_status'             => 2,
                        'street'                  => $users->street ? $users->street : $_POST['street'],
                        'city'                    => $users->city ? $users->city : $_POST['city'],
                        'pincode'                 => $users->pincode ? $users->pincode : $_POST['pincode'],
                        'state'                   => $users->state ? $users->state : $_POST['state'],
                        'country'                 => $users->country ? $users->country : $_POST['country'],
                        'admin_assign_coach'      => $is_plus_user
                    ];
                    $previous_plan = [
                        'username'                 => $users->username,
                        'previous_plan'            => $users->plan . ' ' . $users->member_type,
                        'previous_plan_id'         => $users->plan_id,
                        'previous_team'            => $users->team,
                        'previous_head_coach'      => $users->head_coach,
                        'previous_sub_coach'       => $users->sub_coach,
                        'current_plan'             => $plan_id_details->duration . ' ' . ucfirst($plan_id_details->type),
                        'current_plan_id'          => $plan_id_details->id,
                        'previous_plan_start_date' => $users->plan_start_date
                    ];
                    RenewalHistory::insert($previous_plan);
                    $users_update = User::where(['status' => 1, 'username' => $users->username])->limit(1)->update($plan_update);
                    // Currently on hold by Pavan as they don't need to send message while updating the user from the Admin Dashboard.
                    // Whatsapp notification
                    // $mobile_no = $users->mob_no;
                    // $template_name = "renewal";
                    // if($mobile_no) {
                    //     app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($mobile_no, $template_name);
                    // }
                }
                if ($users->email && $is_email) {
                    Log::info('renew user plan');
                    //to send invoice'
                    $pdf = \App::make('dompdf.wrapper');
                    $pdf->loadHTML($this->convert_customer_data_to_html($payment, $inv_no, $plan, $gst_state));
                    $pdf_invoice = $pdf->stream();
                    file_put_contents('invoices/' . $payment['razor_pay_id'] . '.pdf', $pdf_invoice);
                    //to send invoice
                    $mailData = array(
                        'to_email'     => $users->email,
                        'subject'      => 'Liv Ezy - Thank You For Choosing Us!',
                        'url'          => 'https://livezy.com/e/' . $payment_id->token,
                        'pay'          => $payment['razor_pay_id'] . '.pdf',
                        'user_name'    => $users->name ? $users->name : '',
                        'plan_details' => $plan_id_details->duration . ' Plan ' . $plan_id_details->type
                    );
                    $mail = \Illuminate\Support\Facades\Mail::send('emails.invoice', ['data' => $mailData], function ($message) use ($mailData) {
                        $message->to($mailData['to_email']);
                        //$message->bcc('pay@livezy.com');
                        $message->subject($mailData['subject']);
                        $message->attach('invoices/' . $mailData['pay']);
                    });
                }
            }
            return 'User Updated';
        } else {
            return '<p style="color:red;margin-top:20px;">Plan selected is invalid</p>';
        }
    }

    public function plan_update_temp()
    {
        Log::info('plan_update_temp');
        //         $body_text='Username - +918797699791';
        //         $sub_text='Password - welcome';
        //         $user_details=[
        //             'email'=>'chandan@livezy.com',//$plan_data[$i]->email,
        //             'user_name'=>'Chandan',//$plan_data[$i]->name,
        //             'body_text'=>$body_text
        //         ];
        //         $mailData=array(
        //             'to_email'=>$user_details['email'],
        //             'user_cred'=>'+918797699791',//$plan_data[$i]->mob_no,
        //             'password'=>'dskjhfjkhdskfhk',//$plan_data[$i]->password,
        //             'subject'=>'IMPORTANT - Liv Ezy - Login Credentials',
        //             'username'=>$user_details['user_name'],
        //             'sub_text'=>$sub_text,
        //             'body'=>$user_details['body_text'],
        //         );
        //         $mail= \Illuminate\Support\Facades\Mail::send('emails.on_time_welcome', ['data'=>$mailData], function ($message) use($mailData) {
        //             $message->to($mailData['to_email']);
        //             $message->subject($mailData['subject']);
        //             $message->bcc('admin@livezy.com');
        //             $message->setPriority(\Swift_Message::PRIORITY_HIGH);
        //             // $message->attach('insta_img/.pdf');
        //         });
        //         die();
        $plan_data = DB::select("SELECT * FROM tem_table");
        for ($i = 0; $i < sizeof($plan_data); $i++) {
            $users       =   User::where(['status' => 1, 'username' => $plan_data[$i]->username])->first();
            $user_stauts = [
                'plan_doc_link' => $plan_data[$i]->plan_doc
            ];
            $users_update  =   User::where(['status' => 1, 'username' => $plan_data[$i]->username])->limit(1)->update($user_stauts);
            echo $plan_data[$i]->username . '<br>';
        }
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

    public function admin_dashboard()
    {
        Log::info('admin_dashboard');
        if ($this->check_session_admin()) {
            return redirect('/admin-dashboard');
        } else {
            return view('admin.index');
        }
    }

    public function admin_login()
    {
        Log::info('admin_login');
        $email = $_POST['username'];
        $pass = md5($_POST['pass']);
        $result = Coach::where('email_id', $email)->where('password', $pass)->where('status', 1)->get()->toArray();
        if (count($result) > 0) {
            setcookie("admin_iden", 'admin', time() + 7 * 24 * 60 * 60 * 1000, "/");
            $name = $result[0]['first_name'];
            $team_detail_by_name = DB::select("SELECT * FROM `team_coach` WHERE `assign_coach` LIKE '%$name%'");
            $session_data_ex = [
                'admin-id'   => $result[0]['id'],
                'team'       => $team_detail_by_name[0]->team_name,
                'role-id'    => $result[0]['role'],
                'first_name' => $result[0]['first_name'],
                'toggle_btn' => $result[0]['role'] == 2 ? true : false,
                'role'       => 'admin'
            ];
            Session::put($session_data_ex);
            echo true;
        } else {
            echo false;
        }
    }

    public function coach_live_session($data)
    {
        Log::info('coach_live_session');
        $id           = $data['coach_id'];
        $sess_id      = $data['session_id'];
        $current_date = date("Y-m-d H:i:s");
        $result=DB::select("SELECT * FROM `coach_matrix_live_session` WHERE coach_id=$id and session_id=$sess_id");
        if(!$result){
            DB::table('coach_matrix_live_session')->insert($data);
        }
        else{
            DB::table('coach_matrix_live_session')
                ->where('coach_id', $id)
                ->where('session_id', $sess_id)
                ->update(['updated_time' => $current_date]);
        }
        return true;
    }

    public function join_session_admin()
    {
        Log::info('join_session_admin');
        $current_date = date("Y-m-d H:i:s");
        $sess_name    = $_POST['sess_name'];
        $sess_id      = $_POST['sess_id'];
        $link_join    = $_POST['sess_link'];
        $data = [
            'coach_id'     => Session::get('admin-id'),
            'coach_name'   => Session::get('first_name'),
            'session_name' => $sess_name,
            'session_id'   => $sess_id,
            'link_join'    => $link_join,
            'join_time'    => $current_date,
            'updated_time' => $current_date
        ];
        $result = $this->coach_live_session($data);
        echo 'true';
    }

    public function switch_admin_role()
    {
        Log::info("switch_admin_role");
        $role = $_POST['role'];
        $status = false;
        if (Session::get('role') == 'admin' && Session::get('toggle_btn')) {
            if ($role == 2) {
                $session_data_ex = [
                    'role-id'   => 2,
                ];
                Session::put($session_data_ex);
                $status = true;
            } else if ($role == 1) {
                $session_data_ex = [
                    'role-id'   => 1,
                ];
                Session::put($session_data_ex);
                $status = true;
            }
        }
        echo $status;
    }

    public function all_member_data()
    {
        Log::info("all_member_data");
        $result = DB::select("SELECT * FROM `users` WHERE  status=1 Order By user_status ASC,plan_start_date ASC");
        Log::info("SELECT * FROM `users` WHERE  status=1 Order By user_status ASC,plan_start_date ASC");
        // $result = User::where('status', 1)->orderBy('user_status', 'asc')->orderBy('plan_start_date', 'asc')->get()->toArray();

        $data=[];
        for($i = 0; $i < sizeof($result); $i++){
            $user_status=$result[$i]->user_status;
            switch ($user_status) {
                case 1:
                    $user_status='Free User';
                    break;
                case 2:
                    $user_status='Bought Plan';
                    break;
                case 3:
                    $user_status='Questionaire Start Date Chosen';
                    break;
                case 4:
                    $user_status='Questionaire Filled';
                  break;
                case 5:
                    $user_status='Physique Image Received';
                  break;
                case 6:
                    $user_status='Plan Sent';
                  break;
                case 7:
                    $user_status='Intro Call Complete';
                  break;
                case 8:
                    $user_status='Plan Start';
                  break;
                case 9:
                    $user_status='Pause';
                  break;
                case 10:
                    $user_status='Waiting For Buddy';
                    break;
                default:
                    $user_status='Plan Expired';
              }
                $today=date('Y-m-d H:i:s');
                $alert=false;
                if($today>$result[$i]->questionaire_start_date && $result[$i]->questionaire_start_date>$result[$i]->question_submit_date && $result[$i]->user_status<=7)
                    $alert=true;
                $user_age = $result[$i]->dob?(date('Y') - date('Y',strtotime($result[$i]->dob))):'Age Not mention';
                $user_pause_day_availed=$result[$i]->pause_day_availed;
                $user_plan_end_date=strtotime($result[$i]->plan_end_date);
                $curr_date=strtotime(date('Y-m-d'));
                $exsist_diff=$user_plan_end_date-$curr_date;
                $exsist_diff=round($exsist_diff / (60 * 60 * 24));
                //$exsist_diff-$user_pause_day_availed-1
                $user_plan_left_day=$exsist_diff;
                if($result[$i]->user_status<=7)
                    $user_plan_left_day=0;
                $buddy_username='NA';
                if($result[$i]->is_buddy)
                    $buddy_username=$result[$i]->buddy_username;
                $temp_data=[
                    $result[$i]->plan_start_date?$result[$i]->plan_start_date:'Not Available',
                    $result[$i]->username,
                    $result[$i]->name?$result[$i]->name:'Not filled',
                    $result[$i]->email?$result[$i]->email:'No email',
                    $result[$i]->mob_no?$result[$i]->mob_no:'No mob',
                    ucfirst($result[$i]->plan.' '.$result[$i]->member_type),
                    $user_status,
                    $result[$i]->team?$result[$i]->team:'Null',
                    $result[$i]->head_coach?$result[$i]->head_coach:'Null',
                    $user_plan_left_day,
                    $result[$i]->user_status==9?'Yes':'No',
                    $user_age,
                    $result[$i]->gender?$result[$i]->gender:'Null',
                    $result[$i]->eating_habbit?$result[$i]->eating_habbit:'Not defined',
                    $result[$i]->is_transform,
                    ucfirst($result[$i]->member_type),
                    $buddy_username,
                    $alert
                ];
            array_push($data,$temp_data);
        }
        return $data;
    }

    public function paid_member_data($team)
    {
        Log::info('team from member_data: '.$team);
        $result=DB::select("SELECT * FROM `users` WHERE $team user_status > 3 AND `team` IS  NOT NULL and member_type != 'Live Session' and plan_id Not IN (7,8,15,16) AND `status` = 1 Order By user_status ASC,question_submit_date DESC");
        $data=[];
        $today=date('Y-m-d');
        for($i=0;$i<sizeof($result);$i++){
            $alert=false;
            $tr_img=$result[$i]->is_transform?"transform_active.png":"Transform.png";
            $p_u_img=$result[$i]->plan_doc_link?"plan_update_active.png":"Palnurl.png";
            $p_u_link=$result[$i]->plan_doc_link?$result[$i]->plan_doc_link:"";
            if($result[$i]->question_submit_date){
                //&& ($result[$i]->questionaire_start_date>$result[$i]->question_submit_date)
                if(($today>date('Y-m-d',strtotime($result[$i]->question_submit_date.' +2 days')))  && ($result[$i]->user_status<=7))
                    $alert=true;
            }

            $static_action='<a href="/view-question?user_id='.$result[$i]->username.'" data-toggle="tooltip" data-placement="bottom" title="Questionaire View" target="_blank"><img class="img-responsive action_icon" src="../fitness/images/questionnaire.png" /></a><img class="img-responsive action_icon q_update" src="../fitness/images/'.$p_u_img.'" data-toggle="tooltip" data-placement="bottom" title="Update Plan"  data-url="'.$p_u_link.'" data-userid="'.$result[$i]->username.'" onclick="plan_update(this,'.$result[$i]->username.')"/><img class="img-responsive action_icon" src="../fitness/images/'.$tr_img.'" data-toggle="tooltip" data-placement="bottom" title="Pin for Transformation" onclick="image_trnansform(this,'.$result[$i]->username.','.$result[$i]->is_transform.')" />';
            $user_status=$result[$i]->user_status;
            switch ($user_status) {
                case 2:
                    $user_status='Paid';
                  break;
                case 3:
                    $user_status='Questionnaire Start Date Selected';
                  break;
                case 4:
                    $user_status='Questionnaire Filled';
                  break;
                case 5:
                    $user_status='Physique Image Received';
                  break;
                case 6:
                    $user_status='Plan Sent';
                  break;
                case 7:
                    $user_status='Intro Call Complete';
                  break;
                case 8:
                    $user_status='Plan Start';
                  break;
                case 9:
                    $user_status='Pause';
                  break;
                case 10:
                    $user_status='Waiting For Buddy';
                    break;
                default:
                    $user_status='Plan Expired';
              }
                $user_age = (date('Y') - date('Y',strtotime($result[$i]->dob)));
                $user_pause_day_availed=$result[$i]->pause_day_availed;
                $user_plan_end_date=strtotime($result[$i]->plan_end_date);
                $curr_date=strtotime(date('Y-m-d'));
                $exsist_diff=$user_plan_end_date-$curr_date;
                $exsist_diff=round($exsist_diff / (60 * 60 * 24));
                //$exsist_diff-$user_pause_day_availed-1
                $user_plan_left_day=$exsist_diff;
                if($result[$i]->user_status<=7)
                    $user_plan_left_day=0;
                $buddy_username='NA';
                if($result[$i]->is_buddy)
                    $buddy_username=$result[$i]->buddy_username;
                $temp_data=[
                            $static_action,
                            $result[$i]->question_submit_date?$result[$i]->question_submit_date:'Not Available',
                            $result[$i]->username,
                            $result[$i]->name?$result[$i]->name:'Not filled',
                            $result[$i]->email?$result[$i]->email:'No email',
                            $result[$i]->mob_no?$result[$i]->mob_no:'No mob',
                            $result[$i]->plan.' '.$result[$i]->member_type,
                            $user_status,
                            $result[$i]->team?$result[$i]->team:'Not Assigned',
                            $result[$i]->head_coach?$result[$i]->head_coach:'Not Assigned',
                            // $result[$i]->team && $result[$i]->head_coach ? ($result[$i]->admin_assign_coach == 1 ? 1 : 0) : 'Null',
                            $result[$i]->admin_assign_coach == 1 ? 1 : 0,$user_plan_left_day,
                            $result[$i]->user_status==9?'Yes':'No',
                            $user_age,
                            $result[$i]->gender?$result[$i]->gender:'Null',
                            $result[$i]->eating_habbit,
                            $buddy_username,
                            $result[$i]->refered_by,
                            $result[$i]->refered_type,
                            $result[$i]->service_hour,
                            $result[$i]->country,
                            $result[$i]->is_transform,
                            $alert,
                            $result[$i]->questionaire_start_date?$result[$i]->questionaire_start_date:'Not Available',
                        ];
            array_push($data,$temp_data);
        }
        return $data;
    }

    public function new_member_data($team)
    {
        Log::info('team from new_member_data: '.$team);
        $result = DB::select("SELECT * FROM `users` WHERE $team `user_status` = 4
            AND `member_type` != 'Live Session'
            AND `username` NOT IN (SELECT `username` FROM `renewal_history`)
            AND `plan_id` NOT IN (7,8,15,16)
            AND ((`team` IS NULL) OR (`team` IS NOT NULL AND `head_coach` IS NOT NULL AND `admin_assign_coach` = 0 AND `flag` = 0))
            AND `status` = 1
        ORDER BY `user_status` ASC, `question_submit_date` DESC");

        $data=[];
        $today=date('Y-m-d');
        for($i=0;$i<sizeof($result);$i++){
            $alert=false;
            $tr_img=$result[$i]->is_transform?"transform_active.png":"Transform.png";
            $p_u_img=$result[$i]->plan_doc_link?"plan_update_active.png":"Palnurl.png";
            $p_u_link=$result[$i]->plan_doc_link?$result[$i]->plan_doc_link:"";
            if($result[$i]->question_submit_date){
                //&& ($result[$i]->questionaire_start_date>$result[$i]->question_submit_date)
                if(($today>date('Y-m-d',strtotime($result[$i]->question_submit_date.' +2 days')))  && ($result[$i]->user_status<=7))
                    $alert=true;
            }

            $static_action='<a href="/view-question?user_id='.$result[$i]->username.'" data-toggle="tooltip" data-placement="bottom" title="Questionaire View" target="_blank"><img class="img-responsive action_icon" src="../fitness/images/questionnaire.png" /></a><img class="img-responsive action_icon q_update" src="../fitness/images/'.$p_u_img.'" data-toggle="tooltip" data-placement="bottom" title="Update Plan"  data-url="'.$p_u_link.'" data-userid="'.$result[$i]->username.'" onclick="plan_update(this,'.$result[$i]->username.')"/><img class="img-responsive action_icon" src="../fitness/images/'.$tr_img.'" data-toggle="tooltip" data-placement="bottom" title="Pin for Transformation" onclick="image_trnansform(this,'.$result[$i]->username.','.$result[$i]->is_transform.')" />';
            $user_status=$result[$i]->user_status;

            $coach_assigned = $result[$i]->admin_assign_coach == 0 ? 'Confirm <a href="/coach_assigned?username='.$result[$i]->username.'" data-toggle="tooltip" data-placement="bottom" title="Coach Assigned"><img class="img-responsive action_icon" src="../fitness/images/check.png"/></a>' : 'N/A' ;

            switch ($user_status) {
                case 2:
                    $user_status='Paid';
                  break;
                case 3:
                    $user_status='Questionnaire Start Date Selected';
                  break;
                case 4:
                    $user_status='Questionnaire Filled';
                  break;
                case 5:
                    $user_status='Physique Image Received';
                  break;
                case 6:
                    $user_status='Plan Sent';
                  break;
                case 7:
                    $user_status='Intro Call Complete';
                  break;
                case 8:
                    $user_status='Plan Start';
                  break;
                case 9:
                    $user_status='Pause';
                  break;
                case 10:
                    $user_status='Waiting For Buddy';
                    break;
                default:
                    $user_status='Plan Expired';
              }
                $user_age = (date('Y') - date('Y',strtotime($result[$i]->dob)));
                $user_pause_day_availed=$result[$i]->pause_day_availed;
                $user_plan_end_date=strtotime($result[$i]->plan_end_date);
                $curr_date=strtotime(date('Y-m-d'));
                $exsist_diff=$user_plan_end_date-$curr_date;
                $exsist_diff=round($exsist_diff / (60 * 60 * 24));
                //$exsist_diff-$user_pause_day_availed-1
                $user_plan_left_day=$exsist_diff;
                if($result[$i]->user_status<=7)
                    $user_plan_left_day=0;
                $buddy_username='NA';
                if($result[$i]->is_buddy)
                    $buddy_username=$result[$i]->buddy_username;
                $temp_data=[
                            $static_action,
                            $result[$i]->question_submit_date?$result[$i]->question_submit_date:'Not Available',
                            $result[$i]->username,
                            $result[$i]->name?$result[$i]->name:'Not filled',
                            $result[$i]->email?$result[$i]->email:'No email',
                            $result[$i]->mob_no?$result[$i]->mob_no:'No mob',
                            $result[$i]->plan.' '.$result[$i]->member_type,
                            $user_status,
                            $result[$i]->team?$result[$i]->team:'Not Assigned',
                            $result[$i]->head_coach?$result[$i]->head_coach:'Not Assigned',
                            // $result[$i]->team && $result[$i]->head_coach ? ($result[$i]->admin_assign_coach == 1 ? 1 : 0) : 'Null',
                            $result[$i]->admin_assign_coach == 1 ? 1 : 0,
                            $user_plan_left_day,
                            $result[$i]->user_status==9?'Yes':'No',
                            $user_age,
                            $result[$i]->gender?$result[$i]->gender:'Null',
                            $result[$i]->eating_habbit,
                            $buddy_username,
                            $result[$i]->refered_by,
                            $result[$i]->refered_type,
                            $result[$i]->service_hour,
                            $result[$i]->country,
                            $result[$i]->is_transform,
                            $alert,
                            $result[$i]->questionaire_start_date?$result[$i]->questionaire_start_date:'Not Available',
                            $coach_assigned
                        ];
            array_push($data,$temp_data);
        }
        return $data;
    }

    public function renewed_member_data($team)
    {
        Log::info('team from renewed_member_data: '.$team);
        $result = DB::select("SELECT u.*, rh.`previous_team`, rh.`previous_head_coach`
            FROM `users` u
            JOIN `renewal_history` rh ON u.`username` = rh.`username`
            WHERE $team u.`user_status` = 4
            AND u.`member_type` != 'Live Session'
            AND u.`username` IN (SELECT `username` FROM `renewal_history`)
            AND u.`plan_id` NOT IN (7, 8, 15, 16)
            AND u.`status` = 1
            AND ((u.`admin_assign_coach` = 0 AND u.`flag` = 0) OR u.`admin_assign_coach` = 1)
            ORDER BY u.`user_status` ASC, u.`question_submit_date` DESC
        ");
        $data=[];
        $today=date('Y-m-d');
        for($i = 0; $i < sizeof($result); $i++){
            $alert=false;
            $tr_img=$result[$i]->is_transform?"transform_active.png":"Transform.png";
            $p_u_img=$result[$i]->plan_doc_link?"plan_update_active.png":"Palnurl.png";
            $p_u_link=$result[$i]->plan_doc_link?$result[$i]->plan_doc_link:"";
            if($result[$i]->question_submit_date){
                //&& ($result[$i]->questionaire_start_date>$result[$i]->question_submit_date)
                if(($today>date('Y-m-d',strtotime($result[$i]->question_submit_date.' +2 days')))  && ($result[$i]->user_status<=7))
                    $alert=true;
            }

            $static_action='<a href="/view-question?user_id='.$result[$i]->username.'" data-toggle="tooltip" data-placement="bottom" title="Questionaire View" target="_blank"><img class="img-responsive action_icon" src="../fitness/images/questionnaire.png" /></a><img class="img-responsive action_icon q_update" src="../fitness/images/'.$p_u_img.'" data-toggle="tooltip" data-placement="bottom" title="Update Plan"  data-url="'.$p_u_link.'" data-userid="'.$result[$i]->username.'" onclick="plan_update(this,'.$result[$i]->username.')"/><img class="img-responsive action_icon" src="../fitness/images/'.$tr_img.'" data-toggle="tooltip" data-placement="bottom" title="Pin for Transformation" onclick="image_trnansform(this,'.$result[$i]->username.','.$result[$i]->is_transform.')" />';
            $user_status=$result[$i]->user_status;

            $coach_assigned = $result[$i]->admin_assign_coach == 0 ? 'Confirm <a href="/coach_assigned?username='.$result[$i]->username.'" data-toggle="tooltip" data-placement="bottom" title="Coach Assigned"><img class="img-responsive action_icon" src="../fitness/images/check.png"/></a>' : 'N/A' ;

            switch ($user_status) {
                case 2:
                    $user_status='Paid';
                  break;
                case 3:
                    $user_status='Questionnaire Start Date Selected';
                  break;
                case 4:
                    $user_status='Questionnaire Filled';
                  break;
                case 5:
                    $user_status='Physique Image Received';
                  break;
                case 6:
                    $user_status='Plan Sent';
                  break;
                case 7:
                    $user_status='Intro Call Complete';
                  break;
                case 8:
                    $user_status='Plan Start';
                  break;
                case 9:
                    $user_status='Pause';
                  break;
                case 10:
                    $user_status='Waiting For Buddy';
                    break;
                default:
                    $user_status='Plan Expired';
              }
                $user_age = (date('Y') - date('Y',strtotime($result[$i]->dob)));
                $user_pause_day_availed=$result[$i]->pause_day_availed;
                $user_plan_end_date=strtotime($result[$i]->plan_end_date);
                $curr_date=strtotime(date('Y-m-d'));
                $exsist_diff=$user_plan_end_date-$curr_date;
                $exsist_diff=round($exsist_diff / (60 * 60 * 24));
                //$exsist_diff-$user_pause_day_availed-1
                $user_plan_left_day=$exsist_diff;
                if($result[$i]->user_status<=7)
                    $user_plan_left_day=0;
                $buddy_username='NA';
                if($result[$i]->is_buddy)
                    $buddy_username=$result[$i]->buddy_username;
                $temp_data=[
                            $static_action,
                            $result[$i]->question_submit_date?$result[$i]->question_submit_date:'Not Available',
                            $result[$i]->username,
                            $result[$i]->name?$result[$i]->name:'Not filled',
                            $result[$i]->email?$result[$i]->email:'No email',
                            $result[$i]->mob_no?$result[$i]->mob_no:'No mob',
                            $result[$i]->plan.' '.$result[$i]->member_type,
                            $user_status,
                            $result[$i]->team?$result[$i]->team:'Not Assigned',
                            $result[$i]->head_coach?$result[$i]->head_coach:'Not Assigned',
                            $result[$i]->admin_assign_coach == 1 ? 1 : 0,
                            $result[$i]->previous_team,
                            $result[$i]->previous_head_coach,
                            $user_plan_left_day,
                            $result[$i]->user_status==9?'Yes':'No',
                            $user_age,
                            $result[$i]->gender?$result[$i]->gender:'Null',
                            $result[$i]->eating_habbit,
                            $buddy_username,
                            $result[$i]->refered_by,
                            $result[$i]->refered_type,
                            $result[$i]->service_hour,
                            $result[$i]->country,
                            $result[$i]->is_transform,
                            $alert,
                            $result[$i]->questionaire_start_date?$result[$i]->questionaire_start_date:'Not Available',
                            $coach_assigned
                        ];
            array_push($data,$temp_data);
        }
        return $data;
    }

    public function change_start_date()
    {
        $result = DB::select("SELECT f_d.username,users.name,users.questionaire_start_date FROM users INNER JOIN future_date_member as f_d ON users.username=f_d.username where users.user_status=2 AND f_d.status=1");
        return $result;
    }

    public function team_coach()
    {
        $result = DB::select("SELECT * FROM `team_coach` WHERE status=1");
        // $result = TeamCoach::where('status', 1)->get()->toArray();
        return $result;
    }

    public function coach_referal_code($code)
    {
        $result = DB::select("SELECT * FROM `voucher_code` where status=1 and coach_id='$code'");
        return $result;
    }

    public function team_assign_count()
    {
        $result = DB::select("SELECT head_coach,COUNT(*) as count FROM users WHERE (user_status=8 or user_status=9) and head_coach is not null GROUP BY head_coach ORDER BY head_coach");

        // $result = User::select('head_coach', DB::raw('COUNT(*) as count'))->whereIn('user_status', [8, 9])->whereNotNull('head_coach')->groupBy('head_coach')->orderBy('head_coach')->get();

        return $result;
    }

    public function get_notification_count($team)
    {
        Log::info('get_notification_count: '.$team);
        if($team) {
            $result = DB::select("SELECT COUNT(*) as count FROM `notification` as `notification` INNER JOIN users ON notification.username=users.username WHERE $team notification.status = 1");
        } else {
            $result = DB::select("SELECT COUNT(*) as count FROM `notification` WHERE status = 1");
        }
        $count = $result[0]->count;
        return $count;
    }

    public function coach_exist_by_id($id){
        $result = DB::select("SELECT * FROM `coach` WHERE status=1 and id='".$id."'");
        // $result = Coach::where('status', 1)->where('id', $id)->get()->toArray();
        return $result;
    }

    public function admin_logout()
    {
        Session::flush();
        echo true;
    }

    public function get_c_id($coach_name)
    {
        $result = DB::select("SELECT * FROM `coach` WHERE status=1 and first_name='$coach_name'");
        // $result = Coach::where('status', 1)->where('first_name', $coach_name)->get()->toArray();
        return $result;
    }

    public function deactivate_voucher_by_coach_id($id)
    {
        DB::table('voucher_code')->where('coach_id', $id)->update(['status' => 0]);
        return true;
    }

    public function create_voucher($data)
    {
        DB::table('voucher_code')->insert($data);
        return true;
    }

    public function deactivate_voucher_code($id)
    {
        DB::table('voucher_code')->where('id', $id)->update(['status' => 0]);
        return true;
    }

    public function live_sess_feedback_dynamic($s_d,$e_d)
    {
        //ORDER BY `live_session_zoom.start_date` ASC
        //echo "SELECT * FROM `feedback_live_session` as `f_l_s` INNER JOIN live_session_zoom ON f_l_s.session_id=live_session_zoom.id INNER JOIN booking_live_session as b_l_s on b_l_s.session_id=live_session_zoom.id WHERE live_session_zoom.status=1 and b_l_s.is_join=1 and live_session_zoom.start_date BETWEEN '$e_d' and '$s_d' ORDER BY live_session_zoom.start_date DESC";
        $result=DB::select("SELECT f_l_s.star,live_session_zoom.session_name,live_session_zoom.coach_name FROM `feedback_live_session` as `f_l_s` INNER JOIN live_session_zoom ON f_l_s.session_id=live_session_zoom.id WHERE live_session_zoom.status=1 and live_session_zoom.start_date BETWEEN '$e_d' and '$s_d' ORDER BY live_session_zoom.start_date DESC");
        $total_user=DB::select("SELECT * FROM `booking_live_session` as `b_k_l` INNER JOIN live_session_zoom ON b_k_l.session_id=live_session_zoom.id WHERE live_session_zoom.start_date BETWEEN '$e_d' AND '$s_d' and b_k_l.status=1 and b_k_l.is_join=1 and live_session_zoom.status=1");
        $final_result=[
            'feedback'   => $result ? $result : [],
            'total_user' => $total_user
        ];
        //print_r($result);die();
        return $final_result;
    }

    public function update_user_status($id,$u_status)
    {
        // DB::table('users')->where('username', $id)->update($u_status);
        User::where('username', $id)->update($u_status);
        return true;
    }

    public function total_referal_day_user($id)
    {
        $result=DB::select("SELECT SUM(no_of_days) as total_day FROM `member_extension` WHERE `username`='".$id."' and `status`='1'");
        return $result;
    }

    public function update_transform_status($id,$status)
    {
        // DB::table('users')->where('username', $id)->update(['is_transform' => $status]);
        User::where('username', $id)->update(['is_transform' => $status]);
        return true;
    }

    public function archive_notifaction($id,$admin_id)
    {
        $current_date=date("Y-m-d h:i:s");
        // DB::table('notification')->where('id', $id)->update(['status' => 0,'updated_at'=>$current_date,'updated_by'=>$admin_id]);
        Notification::where('id', $id)->update(['status' => 0,'updated_at' => $current_date,'updated_by' => $admin_id]);
        return true;
    }

    public function live_session_data_insert($data)
    {
        $sess_name=$data['session_name'];
        $coach_id=$data['coach_id'];
        $start_date=$data['start_date'];
        $start_time=$data['start_time'];
        $time_hrs=strtotime($data['start_time'])- 3540;
        $time_hrs= date('H:i',$time_hrs);
        //echo $time_hrs.'<br>';
        //echo $start_time.'<br>';
        //echo "SELECT * FROM live_session_zoom WHERE session_name='$sess_name' and coach_id=$coach_id and start_date='$start_date' and start_time BETWEEN '$time_hrs' AND '$start_time' and status=0";
        //$end_date_time=$data['start_date'].' '.$time_hrs;
        $result_check=DB::select("SELECT * FROM live_session_zoom WHERE coach_id=$coach_id and start_date='$start_date' and start_time BETWEEN '$time_hrs' AND '$start_time' and status=1");
        if(sizeof($result_check)>0){
            return false;
        }else{
            DB::table('live_session_zoom')->insert($data);
            return true;
        }

    }

    public function team_coach_data_insert($data)
    {
        // print_r($data['team_name']); exit;
        // DB::table('team_coach')->insert($data);
        TeamCoach::insert($data);
        // DB::table('coach')->where('first_name', $data['assign_coach'])->update(['team' => $data['team_name']]);
        Coach::where('first_name', $data['assign_coach'])->update(['team' => $data['team_name']]);
        return true;
    }

    public function update_team_assign($id,$data){
        User::where('username', $id)->update($data);
        return true;
    }

    public function total_referal_day_update_status($id){
        // DB::table('member_extension')->where('username', $id)->update(['status' => 0]);
        MemberExtension::where('username', $id)->update(['status' => 0]);
        return true;
    }

    public function getNotification($team,$filter_type='')
    {
        // dd($team);
        $result=DB::select("SELECT notification.id,notification.username,notification.notification_type,
                            notification.created_at,notification.description,users.name,users.mob_no,users.head_coach
                            FROM `notification` as `notification`
                            INNER JOIN users ON notification.username=users.username
                            WHERE $filter_type $team notification.status=1
                            Order By notification.created_at DESC");
        return $result;
    }

    public function get_notification_archive($team,$filter_type='')
    {
        // dd($team);
        $result=DB::select("SELECT notification.id,notification.username,notification.notification_type,
                            notification.created_at,notification.description,users.name,users.head_coach,
                            users.mob_no,notification.updated_at,coach.first_name
                            FROM `notification` as `notification`
                            INNER JOIN users ON notification.username=users.username
                            INNER JOIN coach as `coach` ON notification.updated_by=coach.id
                            WHERE $filter_type $team notification.status=0
                            Order By notification.updated_at DESC limit 100");
        return $result;
    }

    public function live_session_url_insert_update($session_name,$data)
    {
        DB::table('live_session_link')->where('session_name', $session_name)->update(['status' => 0]);
        DB::table('live_session_link')->insert($data);
        DB::table('live_session_zoom')->where('session_name', $session_name)->where('start_date','>=',date('Y-m-d'))->update(['session_url' => $data['live_session_url']]);
        return true;
    }

    public function live_session_cancel($session_id)
    {
        DB::table('live_session_zoom')->where('id', $session_id)->update(['status' => 0]);
        return true;
    }

    public function live_session_update_coach($session_id,$data)
    {
        DB::table('live_session_zoom')->where('id', $session_id)->update($data);
        return true;
    }

    public function live_session_zoom_user($sess_id)
    {
        $result=DB::select("SELECT * FROM `live_session_zoom` WHERE status=1 and id='$sess_id'");
        return $result;
    }

    public function book_live_session_data_insert($data)
    {
        $sess_id=$data['session_name'];
        $user_id=$data['username'];
        $start_date=$data['start_date'];
        $start_time=$data['start_time'];
        $time_hrs=strtotime($data['start_time'])- 3540;
        $time_hrs= date('H:i',$time_hrs);
        $modify_data=[
                        'username'=>$user_id,
                        'session_id'=>$sess_id
                    ];

        $result_seat=DB::select("SELECT * FROM `live_session_zoom` WHERE start_date='$start_date' and start_time='$start_time' and id='$sess_id' and status=1");
        if($result_seat[0]->booked_seat<$result_seat[0]->total_seat){
            $result_check=DB::select("SELECT * FROM booking_live_session as `b_k_l` INNER JOIN live_session_zoom ON b_k_l.session_id=live_session_zoom.id WHERE b_k_l.username=$user_id and live_session_zoom.start_date='$start_date' and live_session_zoom.start_time BETWEEN '$time_hrs' AND '$start_time' and live_session_zoom.status=1 and b_k_l.status=1");
            if(sizeof($result_check)>0){
                echo '<b>Booking Conflict</b><br><p style="font-size:12px;line-height:16px;font-family:Open Sans;font-style:normal;color:#000;text-align:center;">You have one other booking at this timeslot</p>';
            }else{
                DB::table('live_session_zoom')
                    ->where('id', $sess_id)
                    ->update(['booked_seat' => $result_seat[0]->booked_seat+1]);
                DB::table('booking_live_session')->insert($modify_data);
                echo true;
            }
        }else{
            echo 'All seat booked';
        }
    }

    public function cancel_live_session_user($sess_id,$user_id)
    {
        $result=DB::select("SELECT * FROM `live_session_zoom` WHERE status=1 and id='$sess_id'");
        $result2=DB::table('live_session_zoom')->where('id', $sess_id)->update(['booked_seat' => $result[0]->booked_seat-1]);
        if($result2){
            $result3=DB::table('booking_live_session')
                ->where('session_id', $sess_id)
                ->where('username', $user_id)
                ->update(['status' => 0]);
            if($result3)
                echo true;
        }

    }

    public function coach_data_admin()
    {
        $result = Coach::leftJoin('coach_details', 'coach_details.coach_id', '=', 'coach.id')
                        ->selectRaw('coach.id,
                            coach.first_name,
                            coach.last_name,
                            coach.mob_number,
                            coach.email_id,
                            coach.role,
                            coach.is_disabled,
                            coach.team,
                            coach.profile_url,
                            coach.coach_whatsapp,
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
                    //  ->orderby('coach_details.display_order', 'asc')
                        ->inRandomOrder()
                        ->get();
        return $result;
    }

    public function renewal_data(){
        $result=DB::select("SELECT * FROM `renewal_history`");
        return $result;
    }

    public function voucher_data(){
        $result=DB::select("SELECT voucher_code.id,voucher_code.member_type,voucher_code.code,voucher_code.start_date,voucher_code.end_date,coach.first_name FROM `voucher_code` as voucher_code INNER JOIN coach ON voucher_code.coach_id=coach.id where voucher_code.status=1 and coach.status=1");
        return $result;
    }

    public function live_sess_feedback()
    {
        //ORDER BY `live_session_zoom.start_date` ASC
        $result=DB::select("SELECT * FROM `feedback_live_session` as `f_l_s` INNER JOIN live_session_zoom ON f_l_s.session_id=live_session_zoom.id WHERE live_session_zoom.status=1 ORDER BY live_session_zoom.start_date DESC Limit 1000");
        //print_r($result);die();
        return $result;
    }

    public function live_session_data_view($query)
    {
        $result=DB::select("SELECT * FROM `live_session_zoom` WHERE status=1 $query");
        return $result;
    }

    public function coach()
    {
        $result=DB::select("SELECT * FROM `coach` WHERE status=1");
        return $result;
    }

    public function once_data($team)
    {
        $result=DB::select("SELECT * FROM `users` WHERE $team user_status>3 AND `status` = 1");
        return json_encode($result,true);
    }

    public function live_session_url()
    {
        $result=DB::select("SELECT * FROM `live_session_link` WHERE status=1");
        return $result;
    }

    public function member_data($team)
    {
        $result=DB::select("SELECT * FROM `users` WHERE $team user_status>3 and member_type!='Live Session' and plan_id Not IN (7,8,15,16) AND `status` = 1 Order By user_status ASC,question_submit_date DESC");
        $data=[];
        $today=date('Y-m-d');
        for($i=0;$i<sizeof($result);$i++){
            $alert=false;
            $tr_img=$result[$i]->is_transform?"transform_active.png":"Transform.png";
            $p_u_img=$result[$i]->plan_doc_link?"plan_update_active.png":"Palnurl.png";
            $p_u_link=$result[$i]->plan_doc_link?$result[$i]->plan_doc_link:"";
            if($result[$i]->question_submit_date){
                //&& ($result[$i]->questionaire_start_date>$result[$i]->question_submit_date)
                if(($today>date('Y-m-d',strtotime($result[$i]->question_submit_date.' +2 days')))  && ($result[$i]->user_status<=7))
                    $alert=true;
            }

            $static_action='<a href="/view-question?user_id='.$result[$i]->username.'" data-toggle="tooltip" data-placement="bottom" title="Questionaire View" target="_blank"><img class="img-responsive action_icon" src="fitness/images/questionnaire.png" /></a><img class="img-responsive action_icon q_update" src="fitness/images/'.$p_u_img.'" data-toggle="tooltip" data-placement="bottom" title="Update Plan"  data-url="'.$p_u_link.'" data-userid="'.$result[$i]->username.'" onclick="plan_update(this,'.$result[$i]->username.')"/><img class="img-responsive action_icon" src="fitness/images/'.$tr_img.'" data-toggle="tooltip" data-placement="bottom" title="Pin for Transformation" onclick="image_trnansform(this,'.$result[$i]->username.','.$result[$i]->is_transform.')" />';
            $user_status=$result[$i]->user_status;
            switch ($user_status) {
                case 2:
                    $user_status='Paid';
                  break;
                case 3:
                    $user_status='Questionaire Start Date Selected';
                  break;
                case 4:
                    $user_status='Questionaire Filled';
                  break;
                case 5:
                    $user_status='Physique Image Received';
                  break;
                case 6:
                    $user_status='Plan Sent';
                  break;
                case 7:
                    $user_status='Intro Call Complete';
                  break;
                case 8:
                    $user_status='Plan Start';
                  break;
                case 9:
                    $user_status='Pause';
                  break;
                case 10:
                    $user_status='Waiting For Buddy';
                    break;
                default:
                    $user_status='Plan Expired';
              }
                $user_age = (date('Y') - date('Y',strtotime($result[$i]->dob)));
                $user_pause_day_availed=$result[$i]->pause_day_availed;
                $user_plan_end_date=strtotime($result[$i]->plan_end_date);
                $curr_date=strtotime(date('Y-m-d'));
                $exsist_diff=$user_plan_end_date-$curr_date;
                $exsist_diff=round($exsist_diff / (60 * 60 * 24));
                //$exsist_diff-$user_pause_day_availed-1
                $user_plan_left_day=$exsist_diff;
                if($result[$i]->user_status<=7)
                    $user_plan_left_day=0;
                $buddy_username='NA';
                if($result[$i]->is_buddy)
                    $buddy_username=$result[$i]->buddy_username;
                $temp_data=[
                    $static_action,
                    $result[$i]->question_submit_date?$result[$i]->question_submit_date:'Not Available',
                    $result[$i]->username,
                    $result[$i]->name?$result[$i]->name:'Not filled',
                    $result[$i]->email?$result[$i]->email:'No email',
                    $result[$i]->mob_no?$result[$i]->mob_no:'No mob',
                    $result[$i]->plan.' '.$result[$i]->member_type,$user_status,
                    $result[$i]->team?$result[$i]->team:'Null',
                    $result[$i]->head_coach?$result[$i]->head_coach:'Null',
                    $result[$i]->team && $result[$i]->head_coach ? ($result[$i]->admin_assign_coach == 1 ? 1 : 0) : 'Null', $user_plan_left_day,
                    $result[$i]->user_status==9?'Yes':'No',$user_age,
                    $result[$i]->gender?$result[$i]->gender:'Null',
                    $result[$i]->eating_habbit,$buddy_username,
                    $result[$i]->refered_by,
                    $result[$i]->refered_type,
                    $result[$i]->service_hour,
                    $result[$i]->country,
                    $result[$i]->is_transform,$alert,
                    $result[$i]->questionaire_start_date?$result[$i]->questionaire_start_date:'Not Available',
                ];
            array_push($data,$temp_data);
        }
        return $data;
    }

    /*---------------------------- Analytics --------------------------------*/
    public function retention_user($from,$to)
    {
        // echo "SELECT u.username,u.head_coach FROM `users` as u WHERE (u.member_type!='Live Session' and u.plan_start_date<='$from' and u.plan_end_date >= '$from' AND u.status = 1) UNION SELECT r_h.username,r_h.previous_head_coach FROM `renewal_history` as `r_h` WHERE (r_h.previous_plan NOT LIKE 'Live Session' and r_h.previous_plan_end_date >= '$from')";
        // echo '<br>';
        // echo '<br>';
        // echo "SELECT u.username,u.head_coach FROM `users` as u WHERE (u.member_type!='Live Session'  and u.plan_end_date >= '$to' AND u.status = 1) UNION SELECT r_h.username,r_h.previous_head_coach FROM `renewal_history` as `r_h` WHERE (r_h.previous_plan NOT LIKE 'Live Session' and r_h.previous_plan_end_date >= '$to')";
        // echo '<br>';
        // echo '<br>';
        // echo "SELECT u.head_coach  FROM users as u WHERE (u.member_type!='Live Session' and u.plan_start_date<='$from' and u.plan_end_date >= '$from' AND u.status = 1)  UNION ALL SELECT r_h.previous_head_coach FROM renewal_history as r_h WHERE (r_h.previous_plan NOT LIKE 'Live Session' and r_h.previous_plan_end_date >= '$from')";
        // echo '<br>';
        // echo '<br>';
        // echo "SELECT u.head_coach  FROM users as u WHERE (u.member_type!='Live Session'  and u.plan_end_date >= '$to' AND u.status = 1)  UNION ALL SELECT r_h.previous_head_coach FROM renewal_history as r_h WHERE (r_h.previous_plan NOT LIKE 'Live Session' and r_h.previous_plan_end_date >= '$to')";
        // dd($from.'---'.$to);

        $as_first_date=DB::select("SELECT u.username,u.head_coach FROM `users` as u WHERE (u.member_type!='Live Session' and u.plan_start_date<='$from' and u.plan_end_date >= '$from' AND u.status = 1) UNION SELECT r_h.username,r_h.previous_head_coach FROM `renewal_history` as `r_h` WHERE (r_h.previous_plan NOT LIKE 'Live Session' and r_h.previous_plan_end_date >= '$from')");

        $as_second_date=DB::select("SELECT u.username,u.head_coach FROM `users` as u WHERE (u.member_type!='Live Session'  and u.plan_end_date >= '$to' AND u.status = 1) UNION SELECT r_h.username,r_h.previous_head_coach FROM `renewal_history` as `r_h` WHERE (r_h.previous_plan NOT LIKE 'Live Session' and r_h.previous_plan_end_date >= '$to')");

        $as_first_date_count=DB::select("SELECT u.head_coach  FROM users as u WHERE (u.member_type!='Live Session' and u.plan_start_date<='$from' and u.plan_end_date >= '$from' AND u.status = 1)  UNION ALL SELECT r_h.previous_head_coach FROM renewal_history as r_h WHERE (r_h.previous_plan NOT LIKE 'Live Session' and r_h.previous_plan_end_date >= '$from')");

        $as_second_date_count=DB::select("SELECT u.head_coach  FROM users as u WHERE (u.member_type!='Live Session'  and u.plan_end_date >= '$to' AND u.status = 1)  UNION ALL SELECT r_h.previous_head_coach FROM renewal_history as r_h WHERE (r_h.previous_plan NOT LIKE 'Live Session' and r_h.previous_plan_end_date >= '$to')");

        $result=[
            'from_data'=>json_decode(json_encode($as_first_date), true),
            'to_data'=>json_decode(json_encode($as_second_date), true),
            'from_data_count'=>json_decode(json_encode($as_first_date_count), true),
            'to_data_count'=>json_decode(json_encode($as_second_date_count), true),
        ];
        // dd($result);
        return $result;
    }

    public function coach_analytics($current_date, $one_month)
    {
        $all_coach_data_first = [];
        $all_coach_data_last = [];
        $all_coach_data_new = [];
        $result_modify = $this->retention_user($one_month, $current_date);
        // dd(json_decode(json_encode($result_modify)));
        // $result_modify=$result;//json_decode(json_encode($result), true);
        $start_data = $result_modify['from_data'];
        $end_data = $result_modify['to_data'];
        $start_data_from_count = $result_modify['from_data_count'];
        $start_data_to_count = $result_modify['to_data_count'];
        $mod_array__first_count = [];
        $mod_array__last_count = [];
        $new_assign_strcture = [];
        for ($i = 0; $i < sizeof($start_data_from_count); $i++) {
            array_push($mod_array__first_count, strval($start_data_from_count[$i]['head_coach']));
        }
        for ($i = 0; $i < sizeof($start_data_to_count); $i++) {
            array_push($mod_array__last_count, strval($start_data_to_count[$i]['head_coach']));
        }
        $coach_count_first = array_count_values($mod_array__first_count);
        $coach_count_last = array_count_values($mod_array__last_count);
        // dd($end_data);
        $coach_new_assign = [];
        for ($k = 0; $k < sizeof($end_data); $k++) {
            $condition_check = true;
            for ($n = 0; $n < sizeof($start_data); $n++) {
                if ($end_data[$k]['username'] == $start_data[$n]['username'] && $end_data[$k]['head_coach'] == $start_data[$n]['head_coach']) {
                    // echo $end_data[$k]['head_coach'].'<br>';
                    $condition_check = false;
                }
            }
            if ($condition_check) {
                array_push($coach_new_assign, strval($end_data[$k]['head_coach']));
            }
        }
        $coach_retension = [];
        $coach_count_assign = array_count_values($coach_new_assign);
        $all_coach = array_keys($coach_count_last);
        $overall_livezy = [
            'coach' => 'Liv Ezy',
            'rt_p' => 0,
            'first_assign' => 0,
            'last_assign' => 0,
            'new_assign' => 0
        ];
        for ($c = 0; $c < sizeof($all_coach); $c++) {
            $x = isset($coach_count_first[$all_coach[$c]]) ? $coach_count_first[$all_coach[$c]] : 0;
            $y = isset($coach_count_last[$all_coach[$c]]) ? $coach_count_last[$all_coach[$c]] : 0;
            $z = isset($coach_count_assign[$all_coach[$c]]) ? $coach_count_assign[$all_coach[$c]] : 0;
            $retension = 0;
            if ($x) {
                $retension = (($y - $z) / $x) * 100;
            }
            $temp = [
                'coach' => $all_coach[$c],
                'rt_p' => round($retension, 2),
                'first_assign' => $x,
                'last_assign' => $y,
                'new_assign' => $z
            ];
            $overall_livezy['rt_p'] = $overall_livezy['rt_p'] + round($retension, 2);
            $overall_livezy['first_assign'] = $overall_livezy['first_assign'] + $x;
            $overall_livezy['last_assign'] = $overall_livezy['last_assign'] + $y;
            $overall_livezy['new_assign'] = $overall_livezy['new_assign'] + $z;
            array_push($coach_retension, $temp);
        }
        // dd($coach_retension);
        $overall_livezy['rt_p'] = round($overall_livezy['rt_p'] / sizeof($coach_retension), 2);
        // $overall_livezy['rt_p'] = round($overall_livezy['rt_p'] / 1, 2);
        array_push($coach_retension, $overall_livezy);
        return $coach_retension;
    }

    public function finance_data($from,$to,$from_prev,$end_prev)
    {
        $current_data=DB::select("SELECT plan,COUNT(plan) as plan_count FROM `payments` WHERE `created_at` BETWEEN '$from' AND '$to' GROUP BY plan ORDER by plan_count");
        $previous_data=DB::select("SELECT plan,COUNT(plan) as plan_count FROM `payments` WHERE `created_at` BETWEEN '$from_prev' AND '$end_prev' GROUP BY plan ORDER by plan_count");
        //echo "SELECT plan,COUNT(plan) as plan_count FROM `payments` WHERE `created_at` BETWEEN '$from_prev' AND '$end_prev' GROUP BY plan ORDER by plan_count";
        //echo "SELECT plan,COUNT(plan) as plan_count FROM `payments` WHERE `created_at` BETWEEN '$from' AND '$to' GROUP BY plan ORDER by plan_count";
        //echo "SELECT plan,COUNT(plan) as plan_count FROM `payments` WHERE `created_at` BETWEEN '$from_prev' AND '$end_prev' GROUP BY plan ORDER by plan_count";
        $result=[
            'current_month'=>json_decode(json_encode($current_data), true),
            'previous_month'=>json_decode(json_encode($previous_data), true)
        ];
        return $result;
    }

    public function finance_analytics($current_date, $one_month)
    {
        // $current_date=date('Y-m-d');
        // $one_month=date('Y-m-d',strtotime($current_date.' - 30 days'));
        $exsist_diff = strtotime($one_month) - strtotime($current_date);
        $exsist_diff = round($exsist_diff / (60 * 60 * 24));
        $exsist_diff_next = $exsist_diff - 1;
        $prev_month_start = date('Y-m-d', strtotime($current_date . ' ' . $exsist_diff_next . ' days'));
        $prev_month_end = date('Y-m-d', strtotime($prev_month_start . ' ' . $exsist_diff . ' days'));
        $result_modify = $this->finance_data($one_month, $current_date, $prev_month_end, $prev_month_start);
        //print_r($result_modify);
        $all_plan = [
            ['plan' => '3 months individual plan', 'current' => 0, 'previous' => 0],
            ['plan' => '6 months individual plan', 'current' => 0, 'previous' => 0],
            ['plan' => '12 months individual plan', 'current' => 0, 'previous' => 0],
            ['plan' => '3 months buddy plan', 'current' => 0, 'previous' => 0],
            ['plan' => '6 months buddy plan', 'current' => 0, 'previous' => 0],
            ['plan' => '12 months buddy plan', 'current' => 0, 'previous' => 0],
            ['plan' => '1 month live session', 'current' => 0, 'previous' => 0],
            ['plan' => '3 month live session', 'current' => 0, 'previous' => 0],
            ['plan' => 'Total', 'current' => 0, 'previous' => 0]
        ];
        $finalResult = [];
        $previous_data = $result_modify['previous_month'];
        $current_data = $result_modify['current_month'];
        for ($i = 0; $i < sizeof($all_plan); $i++) {
            for ($c = 0; $c < sizeof($current_data); $c++) {
                if ($current_data[$c]['plan'] == $all_plan[$i]['plan']) {
                    $all_plan[$i]['current'] = $current_data[$c]['plan_count'];
                    $all_plan[8]['current'] = $current_data[$c]['plan_count'] + $all_plan[8]['current'];
                }
            }
            for ($p = 0; $p < sizeof($previous_data); $p++) {
                if ($previous_data[$p]['plan'] == $all_plan[$i]['plan']) {
                    $all_plan[$i]['previous'] = $previous_data[$p]['plan_count'];
                    $all_plan[8]['previous'] = $previous_data[$p]['plan_count'] + $all_plan[8]['previous'];
                }
            }
        }
        return $all_plan;
    }

    /*------------------------ Admin Dashboard Methods ---------------------*/

    public function get_renewal_data()
    {
        Log::info("get_renewal_data");
        if ($this->check_session_admin()) {
            Log::info("inside check_session_admin");
            $renewal_data = RenewalHistory::get()->toArray();
            return array_values($renewal_data);
        }
    }

    public function get_all_user_data()
    {
        Log::info("get_all_user_data");
        $operation = $_GET['operation'];
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $html_data = '<option value=""></option>';
            $all_member_data = $this->all_member_data();
            // If Selected operation add_user or add_payment
            if($operation == 'add_user' || $operation == 'add_payment') {
                for($i=0; $i < sizeof($all_member_data); $i++) {
                    $html_data .= '<option value="'.$all_member_data[$i][1].'"> '.$all_member_data[$i][1].'</option>';
                }
            } else {  // If selected operation is membership_extension & admin_pause
                for($i=0; $i < sizeof($all_member_data); $i++){
                    if($all_member_data[$i][9] > 0) {  // if user_plan_left_day > 0
                        $html_data .= '<option value="'.$all_member_data[$i][1].'"> '.$all_member_data[$i][1].'</option>';
                    }
                }
            }
            echo $html_data;
        }
    }

    public function get_liveses_feedback_data()
    {
        Log::info("get_liveses_feedback_data");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $live_sess_feedback = $this->live_sess_feedback();
            return array_values($live_sess_feedback);
        }
    }

    public function get_paid_member_data()
    {
        Log::info("get_paid_member_data");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $team = Session::get("role-id") == 1 || Session::get("role-id") == 3 ? "head_coach='" . Session::get("first_name") . "' and" : "team='" . Session::get("team") . "' and";

            Log::info("team from paid_members: " . $team);

            if ( Session::get("team") == "Internal" && Session::get("role-id") == 2 ) {
                $team = "";
            }
            $paid_member_data = $this->paid_member_data($team);
            return array_values($paid_member_data);
        }
    }

    public function get_new_member_data()
    {
        Log::info("get_new_member_data");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $team = Session::get("role-id") == 1 || Session::get("role-id") == 3 ? "head_coach='" . Session::get("first_name") . "' and" : "team='" . Session::get("team") . "' and";

            if ( Session::get("team") == "Internal" && Session::get("role-id") == 2 ) {
                $team = "";
            }
            Log::info("team from get_new_member_data: " . $team);
            $paid_member_data = $this->new_member_data($team);
            // Log::info('Data:' . json_encode(array_values($paid_member_data)));
            return array_values($paid_member_data);
        }
    }

    public function get_all_members_data()
    {
        Log::info("get_all_members_data");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $all_member_data = $this->all_member_data();
            // Log::info('Data:' . json_encode(array_values($all_member_data)));
            return array_values($all_member_data);
        }
    }

    public function get_renewed_member_data()
    {
        Log::info("get_renewed_member_data");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $team = Session::get("role-id") == 1 || Session::get("role-id") == 3 ? "head_coach='" . Session::get("first_name") . "' AND" : "team='" . Session::get("team") . "' AND";

            if ( Session::get("team") == "Internal" && Session::get("role-id") == 2 ) {
                $team = "";
            }
            Log::info("team from get_renewed_member_data: " . $team);
            $paid_member_data = $this->renewed_member_data($team);
            return array_values($paid_member_data);
        }

    }

    public function get_future_member_data()
    {
        Log::info("get_future_member_data");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $html_data = '<option value=""></option>';
            $future_date = $this->change_start_date();
            if(sizeof($future_date) != 0) {
                for($i=0; $i < sizeof($future_date); $i++){
                    $html_data .= '<option value="'.$future_date[$i]->username.'">'.$future_date[$i]->username.'</option>';
                }
            }
            echo $html_data;
        }
    }

    public function get_team_coach_data()
    {
        Log::info("get_team_coach_data");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $html_data = '';
            $team_coach_data = $this->team_coach();
            for($i = 0; $i < sizeof($team_coach_data); $i++)
            {
                $html_data .= '<option value="'.$team_coach_data[$i]->team_name.'">'.$team_coach_data[$i]->team_name.'</option>';
            }
            echo $html_data;
        }
    }

    public function get_coach_firstName()
    {
        Log::info("get_coach_firstName");
        if ($this->check_session_admin()) {
            Log::info("Inside get_coach_firstName");
            $html_data = '<option value=""></option>';
            $coach = $this->coach();
            for ($i = 0; $i < sizeof($coach); $i++) {
                $html_data .= '<option value="' . $coach[$i]->first_name . '"> ' . $coach[$i]->first_name . '</option>';
            }
            echo $html_data;
        }
    }

    public function get_head_coach_data()
    {
        Log::info("get_head_coach_data");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $html_data = '';
            $team_coach_data = $this->team_coach();
            $option_data_coach = explode(",",$team_coach_data[0]->assign_coach);
            for($i = 0; $i < sizeof($option_data_coach); $i++) {
                $html_data .= '<option value="'.$option_data_coach[$i].'">'.$option_data_coach[$i].'</option>';
            }
            echo $html_data;
        }
    }

    public function get_team_head_coach_details()
    {
        Log::info("get_team_head_coach_details");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $team_coach_data = $this->team_coach();
            echo json_encode($team_coach_data);
        }
    }

    public function get_coach_voucher()
    {
        Log::info("get_coach_voucher");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $team = Session::get("role-id") == 1 || Session::get("role-id") == 3 ? "head_coach='" . Session::get("first_name") . "' and" : "team='" . Session::get("team") . "' and";
            Log::info("team from paid_members: " . $team);

            $team2 = Session::get("role-id") == 1 || Session::get("role-id") == 3 ? "notification.notification_type!='Sign Up' and users.head_coach='" . Session::get("first_name") . "' and" : "team='" . Session::get("team") . "' and";

            $coach_id = Session::get("role-id") == 1 || Session::get("role-id") == 3 ? "and coach_id=" . Session::get("admin-id") : " ";
            if ( Session::get("team") == "Internal" && Session::get("role-id") == 2 ) {
                $team = "";
                $team2 = "";
            }

            $coach_code = $this->coach_referal_code(Session::get('admin-id'));
            $coach_voucher = "Not Available";
            if($coach_code)
            {
                $coach_voucher=$coach_code[0]->code;
            }

            echo $coach_voucher;
        }
    }

    public function get_team_assign_count()
    {
        Log::info("get_team_assign_count");
        if ($this->check_session_admin()) {
            Log::info("Inside check_session_admin");
            $html_data = '';
            $team_coach = $this->team_assign_count();
            for($i = 0; $i < sizeof($team_coach); $i++)
            {
                $html_data .= '<div class="team_assign_assign">'.$team_coach[$i]->head_coach . ': ' . $team_coach[$i]->count.'</div>';
            }

            echo $html_data;
        }
    }

    public function get_notifications_count()
    {
        Log::info("get_notifications_count");

        $team = Session::get("role-id") == 1 || Session::get("role-id") == 3 ? "notification.notification_type!='Sign Up' and users.head_coach='" . Session::get("first_name") . "' and" : "team='" . Session::get("team") . "' and";

        if ( Session::get("team") == "Internal" && Session::get("role-id") == 2 ) {
            $team = "";
        }

        $total_notification = $this->get_notification_count($team);
        echo $total_notification;

    }

    public function paid_members()
    {
        Log::info("paid_members");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }
        return view("admin.paid_members");
    }

    public function new_members()
    {
        Log::info("new_members");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }
        return view("admin.new_members");
    }

    public function all_users()
    {
        Log::info("all_users");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }
        return view("admin.all_users");
    }

    public function live_session()
    {
        Log::info("live_session");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }

        $current_date = date('Y-m-d H:i:s');
        $one_month    = date('Y-m-d', strtotime($current_date . ' - 30 days'));
        $coach_id     = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "and coach_id=" . Session::get('admin-id') : ' ';

        $coach               = $this->coach();
        $live_url            = $this->live_session_url();
        $all_member_data     = $this->all_member_data();
        $live_session_data   = $this->live_session_data_view($coach_id);
        $live_sess_feedback  = $this->live_sess_feedback();
        $live_sess_analytics = $this->live_sess_feedback_dynamic($current_date, $one_month);

        return view("admin.live_session", [
            'coach'               => $coach,
            'live_session_url'    => $live_url,
            'all_member_data'     => $all_member_data,
            'live_session_data'   => $live_session_data,
            'live_sess_feedback'  => $live_sess_feedback,
            'live_sess_analytics' => $live_sess_analytics
        ]);
    }

    public function zoom_live_session()
    {
        Log::info("zoom_live_session");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }

        $coach_id = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "and coach_id=" . Session::get('admin-id') : ' ';

        $live_session_data = $this->live_session_data_view($coach_id);
        $live_url          = $this->live_session_url();
        $coach             = $this->coach();

        return view("admin.zoom_live_session", [
            'live_session_url'  => $live_url,
            'coach'             => $coach,
            'live_session_data' => $live_session_data
        ]);
    }

    public function notifications()
    {
        Log::info("notifications");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }
        return view("admin.notifications");
    }

    public function transform()
    {
        Log::info("transform");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }
        return view("admin.transform");
    }

    public function admin_analytics()
    {
        Log::info("admin_analytics");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }

        $current_date = date('Y-m-d H:i:s');
        $one_month    = date('Y-m-d', strtotime($current_date . ' - 30 days'));
        $retension    = $this->coach_analytics($current_date, $one_month);
        $finance      = $this->finance_analytics($current_date, $one_month);

        return view("admin.analytics", [
            'retension' => $retension,
            'finance'   => $finance
        ]);
    }

    public function team_details() {
        Log::info("team_details");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }
        return view('admin.team_details');
    }

    public function voucher_details() {
        Log::info("voucher_details");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }
        $voucher_code = $this->voucher_data();

        return view('admin.voucher_details', [
            'voucher_code'    => $voucher_code
        ]);
    }

    public function coach_details()
    {
        Log::info("coach_details");
        $admin_exsist = $this->coach_exist_by_id(Session::get("admin-id"));
        if (!$admin_exsist) {
            $this->admin_logout();
        }
        return view("admin.coach_details");
    }

    public function coach_exsit_by_id($id){
        $result=DB::select("SELECT * FROM `coach` WHERE status=1 and id='".$id."'");

        return $result;
    }

    public function admin()
    {
        if ($this->check_session_admin()) {

            $current_date = date('Y-m-d H:i:s');
            $admin_exsist = $this->coach_exsit_by_id(Session::get('admin-id'));
            if (!$admin_exsist) {
                $this->admin_logout();
            }
            $homeController = new HomeController();
            $homeController->user_timezone();
            $one_month = date('Y-m-d', strtotime($current_date . ' - 30 days'));

            $team = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "head_coach='" . Session::get('first_name') . "' and" : "team='" . Session::get('team') . "' and";

            $team2 = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "notification.notification_type!='Sign Up' and users.head_coach='" . Session::get('first_name') . "' and" : "team='" . Session::get('team') . "' and";

            $coach_id = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "and coach_id=" . Session::get('admin-id') : ' ';

            if (Session::get('team') == 'Internal' && Session::get('role-id') == 2) {
                $team = '';
                $team2 = '';
            }

            $member_data          = $this->member_data($team);
            $all_member_data      = $this->all_member_data();
            $live_url             = $this->live_session_url();
            $once_data            = $this->once_data($team);
            $coach                = $this->coach();
            $team_coach           = $this->team_assign_count();
            $coach_team_data      = $this->team_coach();
            $notification         = $this->get_notification($team2);
            $notification_archive = $this->get_notification_archive($team2);
            $live_session_data    = $this->live_session_data_view($coach_id);
            $live_sess_feedback   = $this->live_sess_feedback();
            $live_sess_analytics  = $this->live_sess_feedback_dynamic($current_date, $one_month);
            $retension            = $this->coach_analytics($current_date, $one_month);
            $finance              = $this->finance_analytics($current_date, $one_month);
            $renewal_data         = $this->renewal_data();
            $voucher_code         = $this->voucher_data();
            $coach_code           = $this->coach_referal_code(Session::get('admin-id'));
            $coach_voucher        = 'Not Available';
            $future_date          = $this->change_start_date();
            $coach_data           = $this->coach_data_admin();

            if ($coach_code) {
                $coach_voucher = $coach_code[0]->code;
            }

            return view('admin.dashboard', [
                'member_data'          => $member_data,
                'coach'                => $coach,
                'team_coach'           => $team_coach,
                'team_coach_data'      => $coach_team_data,
                'notification'         => $notification,
                'once_data'            => $once_data,
                'live_session_data'    => $live_session_data,
                'live_session_url'     => $live_url,
                'notification_archive' => $notification_archive,
                'live_sess_feedback'   => $live_sess_feedback,
                'all_member_data'      => $all_member_data,
                'renewal_data'         => $renewal_data,
                'voucher_code'         => $voucher_code,
                'coach_voucher'        => $coach_voucher,
                'live_sess_analytics'  => $live_sess_analytics,
                'retension'            => $retension,
                'finance'              => $finance,
                'future_date'          => $future_date,
                'coach_data'           => $coach_data
            ]);
        } else {
            return redirect('/admin');
        }
    }

    public function assign_voucher()
    {
        $data = $_POST['data'];
        $c_id = $data['coach_name'];
        $current_date = date('Y-m-d');
        $get_coach_id = $this->get_c_id($c_id);
        if ($get_coach_id) {
            $coach_id = $get_coach_id[0]->id;
            $v_code = $data['code'];
            $start_date = $current_date;
            $end_date = date('Y-m-d', strtotime($current_date . ' + 180 days'));
            $ext_day = 14;
            $type = 'Coach';
            $member_type = 'Buddy,Individual';
            $insert_data = [
                'code' => $v_code,
                'coach_id' => $coach_id,
                'extension_day' => $ext_day,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'member_type' => $member_type
            ];
            $deactivate = $this->deactivate_voucher_by_coach_id($coach_id);
            $create_vc = $this->create_voucher($insert_data);
            print_r($insert_data);
            echo 'true';
        }
    }

    public function deactivate_voucher()
    {
        $id = $_POST['id'];
        $deactivate = $this->deactivate_voucher_code($id);
    }

    public function liv_sess_analytics()
    {
        $from = $_POST['start_date'];
        $to = $_POST['to_date'];
        $result = $this->live_sess_feedback_dynamic($to, $from);
        echo json_encode($result);
    }

    public function coach_analytics_retension()
    {
        $from = $_POST['start_date'];
        $to = $_POST['to_date'];
        $result = $this->coach_analytics($to, $from);
        echo json_encode($result);
    }

    public function popularity($profile_url)
    {
        $coach = Coach::where('profile_url', $profile_url)->first();
        CoachDetail::where('coach_id', $coach->id)->increment('popularity');
        return redirect()->back();
    }

    public function financeSale()
    {
        $from = $_POST['start_date'];
        $to = $_POST['to_date'];
        $result = $this->finance_analytics($to, $from);
        echo json_encode($result);
    }

    public function status_check_assign()
    {
        $username = $_POST['username'];
        $users_data       =   User::where(['status' => 1, 'username' => $username])->first();
        if ($users_data->is_buddy) {
            $user_status = $users_data->user_status;
            $users_data_buddy       =   User::where(['status' => 1, 'username' => $users_data->buddy_username])->first();
            if ($user_status == 7) {
                if ($users_data_buddy->user_status < 7)
                    echo false;
                else
                    echo true;
            } else {
                echo true;
            }
        } else {
            echo true;
        }
    }

    public function plan_link_update()
    {
        $username = $_POST['username'];
        $plan_link = $_POST['plan_doc_link'];
        $users_data = User::where(['status' => 1, 'username' => $username])->first();
        $u_status = ['plan_doc_link' => $plan_link];
        $description = 'Plan Link Updated';
        $notification_type = 'Sign Up';
        $team_name = Session::get('team');
        $created_type = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "Admin" : 'Super admin';
        $created_by = Session::get('admin-id');
        $current_date_notifi = date('Y-m-d H:i:s');
        $data_insert_notification = [
            'description' => $description,
            'notification_type' => $notification_type,
            'team_name' => $users_data->team,
            'created_type' => $created_type,
            'created_by' => $created_by,
            'username' => $username,
            'created_at' => $current_date_notifi
        ];
        Notification::insert($data_insert_notification);
        $result = $this->update_user_status($username, $u_status);
        if ($result)
            echo true;
        else
            echo false;
    }

    public function coach_assigned()
    {
        Log::info('From coach_assigned, Username: '.$_GET['username']);
        $username = $_GET['username'];
        $data = [ 'flag' => 1 ];
        User::where(['status' => 1, 'username' => $username])->limit(1)->update($data);
        return redirect()->back();
    }

    public function user_status_update_admin()
    {
        $username = $_POST['username'];
        $status = $_POST['status'];
        $users_data       =   User::where(['status' => 1, 'username' => $username])->first();
        $user_status = $users_data->user_status;
        switch ($user_status) {
            case 4:
                $user_status = 'Questionaire Filled';
                break;
            case 5:
                $user_status = 'Physique Image Received';
                break;
            case 6:
                $user_status = 'Plan Sent';
                break;
            case 7:
                $user_status = 'Intro Call Complete';
                break;
            case 8:
                $user_status = 'Plan Start';
                break;
            case 9:
                $user_status = 'Pause';
                break;
            default:
                $user_status = 'Invalid';
        }
        $update_status = $status;
        switch ($update_status) {
            case 4:
                $update_status = 'Questionaire Filled';
                break;
            case 5:
                $update_status = 'Physique Image Received';
                break;
            case 6:
                $update_status = 'Plan Sent';
                break;
            case 7:
                $update_status = 'Intro Call Complete';
                break;
            case 8:
                $update_status = 'Plan Start';
                break;
            case 9:
                $update_status = 'Pause';
                break;
            default:
                $update_status = 'Invalid';
        }
        $description = 'Status change from <b>' . $user_status . '</b> to <b>' . $update_status . '</b>';
        $notification_type = 'Sign Up';
        $team_name = Session::get('team');
        $created_type = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "Admin" : 'Super admin';
        $created_by = Session::get('admin-id');
        $current_date_notifi = date('Y-m-d H:i:s');
        $data_insert_notification = [
            'description'       => $description,
            'notification_type' => $notification_type,
            'team_name'         => $users_data->team,
            'created_type'      => $created_type,
            'created_by'        => $created_by,
            'username'          => $username,
            'created_at'        => $current_date_notifi
        ];
        $u_status = ['user_status' => $status];
        $result = false;
        if ($status == 8) {
            $referal_day = $this->total_referal_day_user($username);
            $user_plan_total_day = $users_data->total_workday;
            if (sizeof($referal_day)) {
                $user_plan_total_day = $user_plan_total_day + $referal_day[0]->total_day;
                $this->total_referal_day_update_status($username);
            }
            $current_date = date('Y-m-d');
            $u_status = [
                'plan_start_date' => $current_date,
                'plan_end_date' => date('Y-m-d', strtotime($current_date . ' + ' . $user_plan_total_day . ' days')),
                'user_status' => 8,
                'total_workday' => $user_plan_total_day
            ];
            // $result  =   User::where(['status'=>1,'username' => Session::get('username')])->limit(1)->update($plan_start);
            $mailData = array(
                'to_email'  => $users_data->email,
                'subject'   => 'Liv Ezy - Your membership is now active',
                'username'  => $users_data->name,
                'body'      => 'Your Liv Ezy membership is now active. You\'ve joined thousands of others who are discovering the value that fitness adds to their lifestyles.',
                'sub_text'  => 'Here\'s to the beginning of something special.',
                'user_cred' => $users_data->mob_no,
                'password'  => $users_data->username
            );
            $mail = \Illuminate\Support\Facades\Mail::send('emails.custom_email', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                $message->subject($mailData['subject']);
                //$message->bcc('admin@livezy.com');
                $message->bcc('artisan.here@gmail.com');
                // $message->setPriority(\Swift_Message::PRIORITY_HIGH);
            });
        }
        if ($status == 6) {
            $p_condition = $users_data->plan_doc_link ? true : false;
            if ($p_condition && $users_data->member_type != 'Live Session') {
                $result = true;
            } else {
                if ($users_data->member_type == 'Live Session')
                    $result = true;
            }
        } else {
            $result = true;
        }
        if ($result) {
            Notification::insert($data_insert_notification);
            $result = $this->update_user_status($username, $u_status);
            echo true;
        } else {
            echo false;
        }
    }

    public function transform_status()
    {
        $username = $_POST['username'];
        $status = $_POST['is_transform'];
        $result = $this->update_transform_status($username, $status);
        if ($result)
            echo true;
        else
            echo false;
    }

    public function get_transform()
    {
        $result = $this->all_member_data();
        if ($result)
            echo json_encode($result);
        else
            echo false;
    }

    public function notif_archive()
    {
        $id = $_POST['notif_id'];
        $admin_id = Session::get('admin-id');
        $result = $this->archive_notifaction($id, $admin_id);
        if ($result)
            echo true;
        else
            echo false;
    }

    public function create_live_session()
    {
        if (Session::get('admin-id')) {
            $data = $_POST['data'];
            $result = $this->live_session_data_insert($data);
            if ($result)
                echo 'true';
            else
                echo 'false';
        } else {
            echo 'false';
        }
    }

    public function team_create()
    {
        $data = $_POST['data'];
        $result = $this->team_coach_data_insert($data);
        if ($result)
            echo true;
        else
            echo false;
    }

    public function user_team_assign()
    {
        $username           = $_POST['username'];
        $team               = $_POST['team'];
        $head_coach         = $_POST['head_coach'];
        $sub_coach          = $_POST['sub_coach'];
        $users_data         = User::where(['status' => 1, 'username' => $username])->first();
        $description        = 'User <b>' . $users_data->name . '</b> and User Id <b>' . $users_data->username . '</b> is assigned to ' . $team . ' and head coach ' . $head_coach;
        $notification_type  = 'Sign Up';
        $team_name          = Session::get('team');
        $created_type       = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "Admin" : 'Super admin';
        $created_by             = Session::get('admin-id');
        $current_date_notifi    = date('Y-m-d H:i:s');
        $data_insert_notification   = [
            'description'       => $description,
            'team_name'         => $team,
            'notification_type' => $notification_type,
            'created_type'      => $created_type,
            'created_by'        => $created_by,
            'username'          => $username,
            'created_at'        => $current_date_notifi
        ];
        $data = [
            'team'       => $team,
            'head_coach' => $head_coach,
            'sub_coach'  => null //$sub_coach
        ];
        $team_condition = true;
        if ($users_data->is_buddy) {
            Log::info("Is buddy true & team: ".$team." head_coach: ".$head_coach);
            $buddy_username = $users_data->buddy_username;
            $buddy_data     = User::where(['status' => 1, 'username' => $buddy_username])->first();
            Log::info("Buddy Details.: ".json_encode($buddy_data));
            if ($buddy_data->team) {
                Log::info("Buddy Team is true, buddy team: ".$buddy_data->team);
                if ($buddy_data->team != $team || $buddy_data->head_coach != $head_coach) {
                    $team_condition = true; //false for checking buddy condition
                }
            }
        }
        if ($team_condition) {
            Log::info("team_condition is: ".$team_condition);
            Notification::insert($data_insert_notification);
            $result = $this->update_team_assign($username, $data);
            // Should write code here for buddy - coach assignment along with data_insert_notification but currently they want as manual
            echo true;
        } else {
            echo true;
        }
    }

    public function get_notification()
    {
        $team = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "notification.notification_type!='Sign Up' and users.head_coach='" . Session::get('first_name') . "' and" : ' ';

        $filter_type = isset($_POST['filter_type']) ? $_POST['filter_type'] : '';
        $filter_type_cond = '';
        if (strlen($filter_type) > 2)
            $filter_type_cond = "notification.notification_type='" . $filter_type . "' and";
        $result = $this->getNotification($team, $filter_type_cond);
        if ($result)
            echo json_encode($result);
        else
            echo false;
    }

    public function get_archive_notif()
    {
        $team = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "notification.notification_type!='Sign Up' and users.head_coach='" . Session::get('first_name') . "' and" : ' ';
        $filter_type = $_POST['filter_type'];
        $filter_type_cond = '';
        if (strlen($filter_type) > 2)
            $filter_type_cond = "notification.notification_type='" . $filter_type . "' and";
        $result = $this->get_notification_archive($team, $filter_type_cond);
        if ($result)
            echo json_encode($result);
        else
            echo false;
    }

    public function session_update_url()
    {
        $session_name = $_POST['session_name'];
        $live_session_url = $_POST['session_url'];
        $created_by = Session::get('admin-id');
        $sess_data = [
            'session_name' => $session_name,
            'live_session_url' => $live_session_url,
            'created_by' => $created_by
        ];
        $result = $this->live_session_url_insert_update($session_name, $sess_data);
        if ($result)
            echo true;
        else
            echo false;
    }

    public function cancel_session()
    {
        $session_id = $_POST['s_id'];
        $result = $this->live_session_cancel($session_id);
        if ($result)
            echo true;
        else
            echo false;
    }

    public function update_session()
    {
        $session_id = $_POST['s_id'];
        $coach_id   = $_POST['coach_id'];
        $coach_name = $_POST['coach_name'];
        $w_data = [
            'coach_id' => $coach_id,
            'coach_name' => $coach_name
        ];
        $result = $this->live_session_update_coach($session_id, $w_data);
        if ($result)
            echo true;
        else
            echo false;
    }

    public function session_booking()
    {
        $session_id = $_POST['sess_id_create'];
        $user_id = Session::get('username');
        $start_date = $_POST['start_date'];
        $start_time = $_POST['start_time'];
        $status = 1;
        $data = [
            'session_name' => $session_id,
            'username' => $user_id,
            'start_date' => $start_date,
            'start_time' => $start_time
        ];
        $user_data = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $session_data = $this->live_session_zoom_user($session_id);
        $user_data_update = ['free_live_session' => $user_data->free_live_session - 1];
        $sess_name = $session_data[0]->session_name;
        $date_time_zone = new DateTime($start_date . ' ' . $start_time, new DateTimeZone('Asia/Kolkata'));
        $date_time_zone->setTimezone(new DateTimeZone(isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata'));
        $timeZone_Start_time = $date_time_zone->format('h:ia');
        $timeZone_Start_date = $date_time_zone->format('d-m-Y');
        $rename_sess = '';
        switch ($sess_name) {
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
        $body_text = 'Your ' . $rename_sess . ' session at ' . $timeZone_Start_time . ' on ' . $timeZone_Start_date . ' is scheduled.';
        $user_details = [
            'email'     => $user_data->email,
            'user_name' => $user_data->name,
            'body_text' => $body_text
        ];
        $mailData = array(
            'to_email'        => $user_details['email'],
            'subject'         => 'Liv Ezy - Session Booked, ' . $rename_sess . ' ' . $timeZone_Start_time,
            'username'        => $user_details['user_name'],
            'session_details' => $user_details['body_text'],
            'session_data'    => $session_data,
            'rename_sess'     => $rename_sess,
            'start_date'      => $date_time_zone->format('Y-m-d') . 'T' . $date_time_zone->format('H:i') . ':00',
            't_n' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT),
            't_t' => str_pad(mt_rand(1, 99999999), 8, '0', STR_PAD_LEFT)
        );
        if ($user_data->user_status == 1 && $user_data->free_live_session != 0) {
            $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_data_update);
            $result = $this->book_live_session_data_insert($data);
            $mail = \Illuminate\Support\Facades\Mail::send('emails.session_book', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                $message->subject($mailData['subject']);
                //$message->bcc('admin@livezy.com');
                $message->bcc('artisan.here@gmail.com');
                // $message->setPriority(\Swift_Message::PRIORITY_HIGH);
            });
        }
        if ($user_data->user_status == 1 && $user_data->free_live_session == 0) {
            echo 'You have no more free trials, please subscribe for more';
        }
        if ($user_data->user_status == 8) {
            // $users_update  =   User::where(['status'=>1,'username' => Session::get('username')])->limit(1)->update($user_data_update);
            $result = $this->book_live_session_data_insert($data);
            $mail = \Illuminate\Support\Facades\Mail::send('emails.session_book', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                $message->subject($mailData['subject']);
                //$message->bcc('admin@livezy.com');
                $message->bcc('artisan.here@gmail.com');
                // $message->setPriority(\Swift_Message::PRIORITY_HIGH);
            });
        }
    }

    public function cancel_user_live_session()
    {
        $session_id = $_POST['sess_id'];
        $user_id = Session::get('username');
        $user_data = User::where(['status' => 1, 'username' => Session::get('username')])->first();
        $user_data_update = ['free_live_session' => $user_data->free_live_session + 1];
        $session_data = $this->live_session_zoom_user($session_id);
        $sess_name = $session_data[0]->session_name;
        $date_time_zone = new DateTime($session_data[0]->start_date . ' ' . $session_data[0]->start_time, new DateTimeZone('Asia/Kolkata'));
        $date_time_zone->setTimezone(new DateTimeZone($_COOKIE['user_time_zone']));
        $timeZone_Start_time = $date_time_zone->format('h:ia');
        $timeZone_Start_date = $date_time_zone->format('d-m-Y');
        $rename_sess = '';
        switch ($sess_name) {
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
        $body_text = 'Your ' . $session_data[0]->session_name . ' session at ' . $timeZone_Start_time . ' on ' . $timeZone_Start_date . ' is cancelled.';
        $user_details = [
            'email' => $user_data->email,
            'user_name' => $user_data->name,
            'body_text' => $body_text
        ];
        $mailData = array(
            'to_email' => $user_details['email'],
            'subject' => 'Liv Ezy - Session Cancelled, ' . $rename_sess . ' ' . $timeZone_Start_time,
            'username' => $user_details['user_name'],
            'session_details' => $user_details['body_text'],
        );
        if ($user_data->user_status == 1 && $user_data->free_live_session >= 0) {
            $users_update  =   User::where(['status' => 1, 'username' => Session::get('username')])->limit(1)->update($user_data_update);

            $result = $this->cancel_live_session_user($session_id, $user_id);
            $mail = \Illuminate\Support\Facades\Mail::send('emails.cancel_session', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                $message->subject($mailData['subject']);
                //$message->bcc('admin@livezy.com');
                $message->bcc('artisan.here@gmail.com');
                // $message->setPriority(\Swift_Message::PRIORITY_HIGH);
            });
        }
        if ($user_data->user_status == 8) {
            // $users_update  =   User::where(['status'=>1,'username' => Session::get('username')])->limit(1)->update($user_data_update);
            $result = $this->cancel_live_session_user($session_id, $user_id);
            $mail = \Illuminate\Support\Facades\Mail::send('emails.cancel_session', ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['to_email']);
                $message->subject($mailData['subject']);
                //$message->bcc('admin@livezy.com');
                $message->bcc('artisan.here@gmail.com');
                // $message->setPriority(\Swift_Message::PRIORITY_HIGH);
            });
        }
    }

    //   operation side manual work to automated one
    public function change_start_date_user()
    {
        Log::info('change_start_date_user');
        $username = $_POST['username'];
        $users       =   User::where(['status' => 1, 'username' => $username])->first();
        $current_date = date('Y-m-d');
        $html_content = '<div class="user_info" style="margin-top:14px;">
                        <div class="row">
                            <div class="col-md-6 u_details"><b>Name: </b>' . $users->name . '</div>
                            <div class="col-md-6 u_details"><b>Membership: </b>' . $users->plan . ' ' . $users->member_type . ' Plan</div>
                        </div>
                </div>
                <hr>
                <div class="user_info">
                <b>Plan Start Date: </b>' . date('D d, M Y', strtotime($users->questionaire_start_date)) . '
                </div>
                <hr>
                <div class="user_info">
                <div class="p_h">Plan Start New Date</div>
                    <div class="top_analy">
                        <input type="date" min="' . $current_date . '" class="analytics_liv_ret" id="plan_date">
                    </div>
                </div>
                <div class="row add_u_s">
                        <div class="col-md-12">
                            <input disabled type="checkbox" name="send_email_extend" value="1" class="add_main"> Send email to user
                        </div>
                    </div>
                    <div class="row add_u_s">
                        <div style="color:red;" class="col-md-12 error_create_memm">

                        </div>
                    </div>
                    <div class="row add_u_s" style="margin-left: 42%;">
                        <div class="col-md-3 create_user" onclick="change_start_date()">
                                Change
                        </div>
                    </div>
                    <script>
                        function change_start_date(){
                            var username="' . strval($username) . '";
                            var plan_date=$("#plan_date").val();
                            if(plan_date){
                                $.ajax({
                                    type:"post",
                                    data:{"plan_date":plan_date,"username":username,},
                                    url:"plan_start_date_change",
                                    success:function(data){
                                        if(data){
                                            if(data=="User Updated"){
                                                window.location.href="/admin";
                                            }
                                            $(".error_create_memm").html(data);
                                        }
                                    }
                                })
                            }else{
                                toastr.error("Please fill all required field")
                            }
                        }
                    </script>';
        return $html_content;
    }

    public function plan_start_date_change()
    {
        Log::info('plan_start_date_change');
        $username   = $_POST['username'];
        $plan_date  = $_POST['plan_date'];
        $plan_start = [
            'username'                => $username,
            'questionaire_start_date' => $plan_date
        ];
        $users          =   User::where(['status' => 1, 'username' => $username])->first();
        $users_update   =   User::where(['status' => 1, 'username' => $username])->limit(1)->update($plan_start);
        if ($users->is_buddy) {
            $plan_start = [
                'username' => $users->buddy_username,
                'questionaire_start_date' => $plan_date
            ];
            $users_update  =   User::where(['status' => 1, 'username' => $username])->limit(1)->update($plan_start);
        }
        return 'Plan start date change to ' . $plan_date;
    }

    public function live_user_plan_detail()
    {
        $username = $_POST['username'];
        $users       =   User::where(['status' => 1, 'username' => $username])->first();
        $current_date = date('Y-m-d');
        $exsist_diff = strtotime($users->plan_end_date) - strtotime($current_date);
        $day = round($exsist_diff / (60 * 60 * 24));
        $html_content = '<div class="user_info">
                        <div class="row">
                            <div class="col-md-4 u_details"><b>Name: </b>' . $users->name . '</div>
                            <div class="col-md-4 u_details"><b>Membership: </b>' . $users->plan . ' ' . $users->member_type . ' Plan</div>
                            <div class="col-md-4 u_details"><b>Days Left: </b> ' . $day . ' Day(s)</div>
                        </div>
                </div>
                <hr>
                <div class="user_info">
                <b>Plan End: </b>' . date('D d, M Y', strtotime($users->plan_end_date)) . '
                </div>
                <hr>
                <div class="user_info">
                <div class="p_h">Enter number of days to extend membership</div>
                    <div class="top_analy">
                        Number of Days Add*: <input id="extend_day" type="number" onkeypress="return event.charCode >= 48" min="1" >
                        <br>Comment*: <textarea style="margin-top:10px;" id="member_ext_comment" name="w3review" rows="4" cols="50"></textarea>
                    </div>
                </div>
                <div class="row add_u_s">
                        <div class="col-md-12">
                            <input disabled type="checkbox" name="send_email_extend" value="1" class="add_main"> Send email to user
                        </div>
                    </div>
                    <div class="row add_u_s">
                        <div style="color:red;" class="col-md-12 error_create_memm">

                        </div>
                    </div>
                    <div class="row add_u_s" style="margin-left: 42%;">
                        <div class="col-md-3 create_user" onclick="membership_extend()">
                                Create
                        </div>
                    </div>
                    <script>
                        function membership_extend(){
                            var username="' . strval($username) . '";
                            var no_days=$("#extend_day").val();
                            var comment=$("#member_ext_comment").val();
                            var is_email=$(\'input[name="send_email_pause"]:checked\').val();
                            if((parseInt(no_days) && comment) || (no_days && comment)){
                                $.ajax({
                                    type:"post",
                                    data:{"no_days":no_days,"username":username,"is_email":is_email,"comment":comment},
                                    url:"membership_extend",
                                    success:function(data){
                                        if(data){
                                            if(data=="User Updated"){
                                                window.location.href="/admin";
                                            }
                                            $(".error_create_memm").html(data);
                                        }
                                    }
                                })
                            }else{
                                toastr.error("Please fill all required field")
                            }
                        }
                    </script>';
        return $html_content;
    }

    public function live_user_data()
    {
        $username = $_POST['username'];
        $users       =   User::where(['status' => 1, 'username' => $username])->first();
        $pause_details = $this->pause_details_user($username);
        $result = '';
        $day = (int)$users->total_pause_day - (int)$users->pause_day_availed;
        $current_date = date('Y-m-d');
        $future_pause = '';
        $current_pause = '';
        if (isset($pause_details['future_pause'])) {
            $future_pause = '<div class="p_h">Future Pause</div>';
            for ($i = 0; $i < sizeof($pause_details['future_pause']); $i++) {
                $temp = '<div class="row">
                        <div class="col-md-4 u_details"><b>From: </b>' . $pause_details['future_pause'][$i]['start_date'] . '</div>
                        <div class="col-md-4 u_details"><b>To: </b>' . $pause_details['future_pause'][$i]['end_date'] . '</div>
                        <div class="col-md-4 u_details"><b>Day Avail: </b> ' . $pause_details['future_pause'][$i]['days'] . ' Day(s)</div>
                    </div>';
                $future_pause = $future_pause . ' ' . $temp;
            }
        }
        if (isset($pause_details['current_pause'])) {
            $current_pause = '<div class="p_h">Current/Recent Pause</div>';
            for ($i = 0; $i < sizeof($pause_details['current_pause']); $i++) {
                $temp_c = '<div class="row">
                        <div class="col-md-4 u_details"><b>From: </b>' . $pause_details['current_pause'][$i]['start_date'] . '</div>
                        <div class="col-md-4 u_details"><b>To: </b>' . $pause_details['current_pause'][$i]['end_date'] . '</div>
                        <div class="col-md-4 u_details"><b>Day Avail: </b> ' . $pause_details['current_pause'][$i]['days'] . ' Day(s)</div>
                    </div>';
                $current_pause = $current_pause . ' ' . $temp_c;
            }
        }
        $minDate = $current_date;
        $pause_id = 0;
        $from_date = 'From: <input type="date" min="' . $minDate . '" class="analytics_liv_ret" id="from_pause">';
        if ($pause_details['current_pause'] ? $pause_details['current_pause'][0]['end_date'] >= $current_date : false) {
            if ($pause_details['current_pause'][0]['status'] == 2) {
                $from_date = '<input type="hidden" id="from_pause" value="' . $pause_details['current_pause'][0]['start_date'] . '"><b style="color:red;">Pause From: ' . $pause_details['current_pause'][0]['start_date'] . '</b> &nbsp;';
                $minDate = $pause_details['current_pause'][0]['end_date'];
                $pause_id = $pause_details['current_pause'][0]['id'];
            }
        }
        $html_content = '<div class="user_info">
                        <div class="row">
                            <div class="col-md-4 u_details"><b>Name: </b>' . $users->name . '</div>
                            <div class="col-md-4 u_details"><b>Membership: </b>' . $users->plan . ' ' . $users->member_type . ' Plan</div>
                            <div class="col-md-4 u_details"><b>Pause Left: </b> ' . $day . ' Day(s)</div>
                        </div>
                </div>
                <div class="user_info">
                    ' . $future_pause . '
                </div>
                <hr>
                <div class="user_info">
                    ' . $current_pause . '
                </div>
                <hr>
                <div class="user_info">
                <div class="p_h">Select date to pause user</div>
                    <div class="top_analy">
                        ' . $from_date . '
                        To: <input type="date" min="' . $minDate . '" class="analytics_liv_ret" id="to_pause">
                    </div>
                </div>
                <div class="row add_u_s">
                        <div class="col-md-12">
                            <input type="checkbox" name="send_email_pause" value="1" class="add_main"> Send email to user
                        </div>
                    </div>
                    <div class="row add_u_s">
                        <div style="color:red;" class="col-md-12 error_create">

                        </div>
                    </div>
                    <div class="row add_u_s" style="margin-left: 42%;">
                        <div class="col-md-3 create_user" onclick="create_pause()">
                                Create
                        </div>
                    </div>
                    <script>
                        function create_pause(){
                            var pauseId=' . $pause_id . ';
                            var username="' . strval($username) . '";
                            var pause_start_date=$("#from_pause").val();
                            var pause_end_date=$("#to_pause").val();
                            var is_email=$(\'input[name="send_email_pause"]:checked\').val();
                            if((parseInt(pauseId) && pause_end_date) || (pause_start_date && pause_end_date)){
                                $.ajax({
                                    type:"post",
                                    data:{"pauseId":pauseId,"username":username,"pause_start_date":pause_start_date,"pause_end_date":pause_end_date,"is_email":is_email},
                                    url:"pause_user_admin",
                                    success:function(data){
                                        if(data){
                                            if(data=="User Updated"){
                                                window.location.href="/admin";
                                            }
                                            $(".error_create").html(data);
                                        }
                                    }
                                })
                            }else{
                                toastr.error("Please fill all required field")
                            }
                        }
                    </script>';
        return $html_content;
    }

    public function add_coach()
    {
        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        // exit;

        $coach_id               = $_POST['coach_id'];
        if($coach_id > 0) {
            $data1              = Coach::find($coach_id);
        } else {
            $data1              = new Coach();
        }
        $data1->first_name      = $_POST['first_name'];
        $data1->last_name       = $_POST['last_name'];
        $data1->profile_url     = strtolower($_POST['first_name'].$_POST['last_name']);
        $data1->mob_number      = $_POST['mobile_no'];
        $data1->coach_whatsapp  = $_POST['whatsapp_no'];
        $data1->email_id        = $_POST['email_id'];
        if(!empty($_POST['password'])) {
            $data1->password    = md5($_POST['password']);
        }
        $data1->gender          = $_POST['gender'];
        $data1->coach_whatsapp  = $_POST['whatsapp_no'];
        $data1->role            = $_POST['role'];
        $data1->is_assign       = 1;
        $data1->status          = 1;
        $data1->save();

        if($coach_id > 0) {
            $coach_details      = CoachDetail::where("coach_id", $coach_id)->selectRaw('id, img_profile, img_banner')->get();
            $data2              = CoachDetail::find($coach_details[0]->id);
            $data2->coach_id    = $coach_id;
        } else {
            $data2 = new CoachDetail();
            $data2->coach_id    = $data1->id;
        }

        $data2->designation     = $_POST['designation'];
        if(!empty($_POST['coach_tier'])) {
            $data2->coach_tier  = $_POST['coach_tier'];
        }
        $data2->slots           = $_POST['slot_count'];
        $data2->display_order   = $_POST['display_order'];
        $data2->cert_short      = $_POST['cert_short'];
        $data2->instagram       = $_POST['instagram'];
        $data2->experience      = $_POST['experience'];
        $data2->clients_trained = $_POST['clients_trained'];
        $data2->about_coach     = $_POST['about_coach'];
        $data2->focus_areas     = $_POST['focus_areas'];
        $data2->img_profile     = '';
        $data2->img_banner      = '';

        if($_FILES['img_profile']['size'] > 0) {
            $file_name          = $_FILES['img_profile']['name'];
            $file_tmp           = $_FILES['img_profile']['tmp_name'];
            if (is_uploaded_file($file_tmp)) {
                $file_name          = preg_replace('/\s+/', '_', $file_name);
                $file_name_exp      = explode('.', $file_name);
                $file_name          = $file_name_exp[0].'_'.time().'.'.$file_name_exp[1];

                move_uploaded_file($file_tmp, public_path().'/coaches/'.$file_name);
                $data2->img_profile = $file_name;
            } else {
                $data2->img_profile = $coach_details[0]->img_profile;
            }
        }

        if($_FILES['img_banner']['size'] > 0) {
            $file_name              = $_FILES['img_banner']['name'];
            $file_tmp               = $_FILES['img_banner']['tmp_name'];
            if (is_uploaded_file($file_tmp)) {
                $file_name          = preg_replace('/\s+/', '_', $file_name);
                $file_name_exp      = explode('.', $file_name);
                $file_name          = $file_name_exp[0].'_'.time().'.'.$file_name_exp[1];

                move_uploaded_file($file_tmp, public_path().'/coaches/'.$file_name);
                $data2->img_banner  = $file_name;
            } else {
                $data2->img_banner  = $coach_details[0]->img_banner;
            }
        }
        $data2->save();
        return redirect('/admin-dashboard/coach_details');
    }

    public function get_coach($coach_id)
    {
        $result = Coach::leftJoin('coach_details', 'coach_details.coach_id', '=', 'coach.id')
                        ->selectRaw('coach.id,coach.first_name,coach.last_name,coach.mob_number,
                            coach.email_id,coach.role,coach.gender,coach.coach_whatsapp,coach_details.*')
                        ->where('coach.id', $coach_id)
                        ->get();
        return $result;
    }

    // To get coach tier based on selection of team & coach name
    public function get_coach_tier($coach_name, $team_name)
    {

        $coach        = Coach::where('first_name', $coach_name)->where('team', $team_name)->first();
        $coach_detail = CoachDetail::where('coach_id', $coach->id)->first();
        $result       = $coach_detail->coach_tier;
        return $result;

    }

    public function edit_coach($coach_id)
    {
        $result = Coach::leftJoin('coach_details', 'coach_details.coach_id', '=', 'coach.id')
                        ->selectRaw('coach.id,coach.first_name,coach.last_name,coach.mob_number,
                            coach.email_id,coach.role,coach.gender,coach.coach_whatsapp,coach_details.*')
                        ->where('coach.id', $coach_id)
                        ->get();
        return $result;
    }

    public function add_transformation_data()
    {
        // echo '<pre>';
        // print_r($_POST);
        // print_r($_FILES);
        // exit;

        $coach_id = $_POST['coach_img_id'];

        // File upload configuration
        $targetDir = public_path().'/coaches/transformations/';
        $allowTypes = array('jpg','png','jpeg','gif');
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';

        $fileNames = array_filter($_FILES['files']['name']);

        if(!empty($fileNames)){
            foreach($_FILES['files']['name'] as $key=>$val){
                $fileName           = basename($_FILES['files']['name'][$key]);
                $file_tmp           = $_FILES['files']['tmp_name'];
                $targetFilePath     = $targetDir . $fileName;

                $file_name          = preg_replace('/\s+/', '_', $fileName);
                $file_name_exp      = explode('.', $file_name);
                $file_name          = $file_name_exp[0].'_'.time().'.'.$file_name_exp[1];
                $targetFilePath     = $targetDir . $file_name;

                $client_name        = $_POST['client_name'][$key];
                $testimonials       = $_POST['testimonials'][$key];

                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                        $data=array("coach_id"=>$coach_id,
                                    "image"=>$file_name,
                                    "client_name"=>$client_name,
                                    "testimonials"=>$testimonials);
                        DB::table('coach_transformations')->insert($data);
                    }
                }
            }
        }

        return redirect('/admin-dashboard/coach_details');
    }

    public function add_certification_data() {

        $coach_id = $_POST['cert_img_id'];

        // File upload configuration
        $targetDir = public_path().'/coaches/certifications/';
        $allowTypes = array('jpg','png','jpeg','gif');
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';

        $fileNames = array_filter($_FILES['files']['name']);

        if(!empty($fileNames)){
            foreach($_FILES['files']['name'] as $key=>$val){
                $fileName           = basename($_FILES['files']['name'][$key]);
                $file_tmp           = $_FILES['files']['tmp_name'];
                $targetFilePath     = $targetDir . $fileName;

                $file_name          = preg_replace('/\s+/', '_', $fileName);
                $file_name_exp      = explode('.', $file_name);
                $file_name          = $file_name_exp[0].'_'.time().'.'.$file_name_exp[1];
                $targetFilePath     = $targetDir . $file_name;

                $cert_name        = $_POST['cert_name'][$key];

                // Check whether file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){
                        $data=array("coach_id"=>$coach_id,
                                    "cert_name"=>$cert_name,
                                    "cert_image"=>$file_name);
                        DB::table('coach_certificates')->insert($data);
                    }
                }
            }
        }

        return redirect('/admin-dashboard/coach_details');

    }

    public function change_coach_status($coach_id, $status)
    {
        $data               = Coach::find($coach_id);
        $data->is_disabled  = $status;
        $data->save();
        return 'success';
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
            'coach_profile' => $coach_profile,
            'transformations' => $transformations,
            'certifications' => $certifications,
            'coach_assigned' => $coach_assigned,
            'testimonials' => $get_data['testimonials'],
            'prices' => $get_data['prices'],
            'membership_details' => $get_data['membership_details'],
            'currency' => $get_data['currency'],
            'currency_icon' => $get_data['currency_icon'],
            'location' => $get_data['location'],
            'users' => $users
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

    public function admin_assign_coach($user_id, $val)
    {
        User::where('id', $user_id)->update(['admin_assign_coach' => $val]);
    }

    public function reset_existing_coach($user_id)
    {
        User::where('id', $user_id)->update(['team' => null, 'head_coach' => null, 'is_renewed' => 0, 'admin_assign_coach' => 0]);
    }

    public function continue_same_coach($user_id)
    {
        User::where('id', $user_id)->update(['is_renewed' => 0]);
    }

    /*Duplicated methods for new page - Paid Members*/

    public function get_user_data_paid_members()
    {
         Log::info("get_user_data_paid_members");
         $type_user = $_POST["user_type"];
         $username = $_POST["username"];

         if($type_user){
             $users       =   User::where(['status'=>1,'username' => $username])->first();
             if($type_user=='exsisting'){
                 if($users->user_status > 1){

                     $html_user='<div class="row add_u_s">
                     <div class="col-md-12">
                         <div>Exsisting Plan Details</div>
                         <div class="col-md-4">User Name: '.ucfirst($users->name).'</div>
                         <div class="col-md-4">Plan Type: '.ucfirst($users->member_type).'</div>
                         <div class="col-md-4">Plan Duration: '.ucfirst($users->plan).'</div>
                     </div>

                     </div>
                     <div class="row add_u_s">
                         <div class="col-md-12">
                             <div>Choose Renewal Plan Details</div>
                             <!-- <div class="col-md-4">Plan Name: Live Session</div> -->
                             <div class="col-md-6">
                                 <select id="user_select_plan" data-placeholder="Select Plan type" class="form-control i_s c_t_i chosen-select" >
                                     <option value="Individual">Individual</option>
                                     <option value="Buddy">Buddy</option>
                                     <option value="Live Session">Live Session</option>

                                 </select>
                             </div>
                             <div class="col-md-6">
                                 <select id="user_select_duration" data-placeholder="Select Plan type" class="form-control i_s c_t_i chosen-select" >
                                     <option value="">Select One</option>
                                     <option value="3 Months">3 Months</option>
                                     <option value="6 Months">6 Months</option>
                                     <option value="12 Months">12 Months</option>
                                 </select>
                             </div>
                             <div class="col-md-12" style="margin-top:18px; padding:0px;">
                                <div class="col-md-6">
                                    <input type="text" name="plan_amount" id="plan_amount" class="form-control" placeholder="Plan Amount">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="new_user_email" id="new_user_email" class="form-control" value="'.($users->email).'" placeholder="User E-mail">
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top:18px; padding:0px;">
                                <div class="col-md-6">
                                    <input type="text" name="new_user_mob" id="new_user_mob" class="form-control" value="'.($users->mob_no).'" placeholder="User Mobile">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="street" name="street" value="'.($users->street).'" placeholder="Enter Street">
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top:18px; padding:0px;">
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="city" name="city" value="'.($users->city).'" placeholder="Enter City">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="pincode" name="pincode" value="'.($users->pincode).'" placeholder="Enter Pincode">
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top:18px; padding:0px;">
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="state" name="state" value="'.($users->state).'" placeholder="Enter State">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="country" name="country" value="'.($users->country).'" placeholder="Enter Country">
                                </div>
                            </div>
                         </div>
                     </div>


                     <div class="row add_u_s">
                         <div class="col-md-4"><input style="margin-top:12px;" type="checkbox" name="deactivate_usere" value="1" class="add_main"> Deactivate User</div>
                         <div class="col-md-12">
                             <div style="float:right;margin-top:-30px;background:#8d0f0f" class="col-md-3 create_user" onclick="deactivate_user_fun()">
                                     Deactivate
                             </div>
                         </div>
                     </div>

                     <div class="row add_u_s">
                         <div class="col-md-12">
                             <input type="checkbox" name="send_email" value="1" class="add_main"> Send Invoice to User
                         </div>
                     </div>
                     <div class="row add_u_s">
                        <div class="col-md-12">
                            <input style="margin-left: 16px;" type="checkbox" name="is_livezy_plus" value="1" id="is_livezy_plus" class="add_main"> Is User LivEzy Plus
                        </div>
                    </div>
                     <div class="row add_u_s">
                         <div style="color:red;" class="col-md-12 error_create">

                         </div>
                     </div>
                     <div class="row add_u_s" style="margin-left: 42%;">
                         <button class="col-md-3 create_user" id="admin_create_existing_user" onclick="create_user()">
                                 Create
                         </button>
                     </div>
                     <script>
                         function create_user(){
                            var username=$("#user_select").val();
                            var user_type=$(\'input[name="user_add"]:checked\').val();
                            var duration=$("#user_select_duration").val();
                            var plan_type=$("#user_select_plan").val();
                            var is_email=$(\'input[name="send_email"]:checked\').val();
                            var amount = $("#plan_amount").val();
                            var email  = $("#new_user_email").val();
                            var mobile = $("#new_user_mob").val();
                            var street = $("#street").val();
                            var city   = $("#city").val();
                            var pincode = $("#pincode").val();
                            var state   = $("#state").val();
                            var country = $("#country").val();
                            var is_plus = $(\'input[name="is_livezy_plus"]:checked\').val();

                            let data = {
                                "username":username,
                                "user_type":user_type,
                                "plan_type":plan_type,
                                "plan":duration,
                                "amount":amount,
                                "email":email,
                                "mobile":mobile,
                                "street":street,
                                "city":city,
                                "pincode":pincode,
                                "state":state,
                                "country":country,
                                "is_email":is_email,
                                "is_plus":is_plus
                            };

                            if(plan_type && duration && user_type && username && amount && email && mobile && street && city && pincode && state && country) {

                                 $("#admin_create_existing_user").prop("disabled", true);
                                 $("#admin_create_existing_user").attr("title", "Please Wait! User is being created.");
                                 $.ajax({
                                     type:"POST",
                                     data:data,
                                     url:"create_user_admin",
                                     success:function(data){
                                         if(data){
                                             if(data=="User Updated"){
                                                 window.location.href="/admin-dashboard/paid_members";
                                             }
                                             $(".error_create").html(data);
                                         }
                                     }
                                 })
                             }else{
                                 toastr.error("Please fill all required field")
                             }
                         }
                         function deactivate_user_fun(){
                             var username=$("#user_select").val();
                             var is_deactivate=$(\'input[name="deactivate_usere"]:checked\').val();
                             if(is_deactivate){
                                 $.ajax({
                                     type:"post",
                                     data:{"username":username},
                                     url:"deactivate_user",
                                     success:function(data){
                                         if(data){
                                             if(data=="User Updated"){
                                                 window.location.href="/admin-dashboard/paid_members";
                                             }
                                             $(".error_create").html(data);
                                         }
                                     }
                                 })
                             }else{
                                 $(".error_create").html("Please Select Deactivate checkbox");
                             }

                         }
                     </script>
                 ';
                 return $html_user;
                 }else{
                     return '<p style="color:red;margin-top:20px;">This user is new, please select new user</p>';
                 }
             }else{
                 if($users->user_status == 1){
                     $html_user='
                     <div class="row add_u_s">
                         <div class="col-md-12">
                             <div style="margin-bottom:20px">Choose Plan Details for '.ucfirst($users->name).'</div>
                             <!-- <div class="col-md-4">Plan Name: Live Session</div> -->
                             <div class="col-md-6">
                                 <select id="user_select_plan" data-placeholder="Select Plan type" class="form-control i_s c_t_i chosen-select" >
                                     <option value="Individual">Individual</option>
                                     <option value="Buddy">Buddy</option>
                                     <option value="Live Session">Live Session</option>
                                 </select>
                             </div>
                             <div class="col-md-6">
                                 <select id="user_select_duration" data-placeholder="Select Plan type" class="form-control i_s c_t_i chosen-select" >
                                     <option value="">Select One</option>
                                     <option value="3 Months">3 Months</option>
                                     <option value="6 Months">6 Months</option>
                                     <option value="12 Months">12 Months</option>

                                 </select>
                             </div>
                             <div class="col-md-12" style="margin-top:18px;">
                                <div class="col-md-6">
                                    <input type="text" name="plan_amount" id="plan_amount" class="form-control" placeholder="Plan Amount">
                                </div>
                                <div class="col-md-6">
                                    <input type="email" name="new_user_email" id="new_user_email" class="form-control" value="'.($users->email).'" placeholder="User E-mail">
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top:18px;">
                                <div class="col-md-6">
                                    <input type="text" name="new_user_mob" id="new_user_mob" class="form-control" value="'.($users->mob_no).'" placeholder="User Mobile">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="street" name="street" value="'.($users->street).'" placeholder="Enter Street">
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top:18px;">
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="city" name="city" value="'.($users->city).'" placeholder="Enter City">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="pincode" name="pincode" value="'.($users->pincode).'" placeholder="Enter Pincode">
                                </div>
                            </div>

                            <div class="col-md-12" style="margin-top:18px;">
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="state" name="state" value="'.($users->state).'" placeholder="Enter State">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="country" name="country" value="'.($users->country).'" placeholder="Enter Country">
                                </div>
                            </div>
                         </div>

                     </div>
                     <div class="row add_u_s">
                         <div class="col-md-4"><input style="margin-top:12px;" type="checkbox" name="deactivate_usere" value="1" class="add_main"> Deactivate User</div>
                         <div class="col-md-12">
                             <div style="float:right;margin-top:-30px;background:#8d0f0f" class="col-md-3 create_user" onclick="deactivate_user_fun()">
                                     Deactivate
                             </div>
                         </div>
                     </div>


                     <div class="row add_u_s">
                         <div class="col-md-12">
                             <input type="checkbox" name="send_email" value="1" class="add_main"> Send Invoice to User
                         </div>
                     </div>

                     <div class="row add_u_s">
                        <div class="col-md-12">
                            <input style="margin-left: 16px;" type="checkbox" name="is_livezy_plus" value="1" id="is_livezy_plus" class="add_main"> Is User LivEzy Plus
                        </div>
                    </div>

                     <div class="row add_u_s">
                         <div style="color:red;" class="col-md-12 error_create">

                         </div>
                     </div>
                     <div class="row add_u_s" style="margin-left: 42%;">
                         <button class="col-md-3 create_user" id="admin_create_new_user" onclick="create_user()">
                                 Create
                         </button>
                     </div>
                     <script>
                         function create_user(){
                            var username=$("#user_select").val();
                            var user_type=$(\'input[name="user_add"]:checked\').val();
                            var duration=$("#user_select_duration").val();
                            var plan_type=$("#user_select_plan").val();
                            var is_email=$(\'input[name="send_email"]:checked\').val();
                            var amount = $("#plan_amount").val();
                            var email  = $("#new_user_email").val();
                            var mobile = $("#new_user_mob").val();
                            var street = $("#street").val();
                            var city   = $("#city").val();
                            var pincode = $("#pincode").val();
                            var state   = $("#state").val();
                            var country = $("#country").val();
                            var is_plus = $(\'input[name="is_livezy_plus"]:checked\').val();

                            let data = {
                                "username":username,
                                "user_type":user_type,
                                "plan_type":plan_type,
                                "plan":duration,
                                "amount":amount,
                                "email":email,
                                "mobile":mobile,
                                "street":street,
                                "city":city,
                                "pincode":pincode,
                                "state":state,
                                "country":country,
                                "is_email":is_email,
                                "is_plus":is_plus
                            };

                            if(plan_type && duration && user_type && username && amount && email && mobile && street && city && pincode && state && country)
                            {
                                 $("#admin_create_new_user").prop("disabled", true);
                                 $("#admin_create_new_user").attr("title", "Please Wait! User is being created.");
                                 $.ajax({
                                     type:"POST",
                                     data:data,
                                     url:"create_user_admin",
                                     success:function(data){
                                         if(data){
                                             if(data=="User Updated"){
                                                 window.location.href="/admin-dashboard/paid_members";
                                             }
                                             $(".error_create").html(data);
                                         }
                                     }
                                 })
                             }else{
                                 toastr.error("Please fill all required field")
                             }
                         }
                         function deactivate_user_fun(){
                             var username=$("#user_select").val();
                             var is_deactivate=$(\'input[name="deactivate_usere"]:checked\').val();
                             if(is_deactivate){
                                 $.ajax({
                                     type:"post",
                                     data:{"username":username},
                                     url:"deactivate_user",
                                     success:function(data){
                                         if(data){
                                             if(data=="User Updated"){
                                                 window.location.href="/admin-dashboard/paid_members";
                                             }
                                             $(".error_create").html(data);
                                         }
                                     }
                                 })
                             }else{
                                 $(".error_create").html("Please Select Deactivate checkbox");
                             }

                         }
                     </script>
                 ';
                 return $html_user;
                 }else{
                     return '<p style="color:red;margin-top:20px;">This user is exsisting, please select exsisting user</p>';
                 }
             }

         }
    }

    public function get_users_data_for_payment()
    {
        Log::info("get_users_data_for_payment");
        $username = $_POST["username"];
        $users    = User::where(['status'=>1,'username' => $username])->first();
        $user_status = $users->user_status;
        switch ($user_status) {
            case 1:
                $user_status = 'Signed Up';
            break;
            case 2:
                $user_status = 'Plan Purchased';
            break;
            case 3:
                $user_status = 'Start Date Choosen';
            break;
            case 4:
                $user_status='Qustionaire Filled';
            break;
            case 5:
                $user_status='Physique Image Received';
            break;
            case 6:
                $user_status='Plan Sent';
            break;
            case 7:
                $user_status='Intro Call Completed';
            break;
            case 8:
                $user_status='Plan Started';
            break;
            case 9:
                $user_status='On Pause';
            break;
            case 11:
                $user_status='Plan Expired';
            break;
            default:
                $user_status='Invalid';
        }

        $html_user =
        '<div class="row add_u_s">
            <div class="col-md-12">
                <div style="margin-bottom: 10px; margin-left: 15px;font-weight: 700;font-size: 1.6rem;">User Details:</div>
                <div class="col-md-4">Name: '.ucfirst($users->name).'</div>
                <div class="col-md-4">Plan: '.$users->plan.' '.ucfirst($users->member_type).'</div>
                <div class="col-md-4">Status: '.$user_status.'</div>
            </div>
        </div>

        <div class="row add_u_s">
            <div class="col-md-12">
                <div style="margin-left: 17px;font-weight: 700;font-size: 1.6rem;">Payment Details:</div>
                <div class="col-md-12" style="margin-top:18px; padding:0px;">
                    <div class="col-md-6">
                        <input type="text" name="diff_amount" id="diff_amount" class="form-control" placeholder="Difference Amount">
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="new_user_email" id="new_user_email" class="form-control" value="'.($users->email).'" placeholder="User E-mail">
                    </div>
                </div>

                <div class="col-md-12" style="margin-top:18px; padding:0px;">
                    <div class="col-md-6">
                        <input type="text" name="new_user_mob" id="new_user_mob" class="form-control" value="'.($users->mob_no).'" placeholder="User Mobile">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control input_css general_form_css mb-2" id="street" name="street" value="'.($users->street).'" placeholder="Enter Street">
                    </div>
                </div>

                <div class="col-md-12" style="margin-top:18px; padding:0px;">
                    <div class="col-md-6">
                        <input type="text" class="form-control input_css general_form_css mb-2" id="city" name="city" value="'.($users->city).'" placeholder="Enter City">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control input_css general_form_css mb-2" id="pincode" name="pincode" value="'.($users->pincode).'" placeholder="Enter Pincode">
                    </div>
                </div>

                <div class="col-md-12" style="margin-top:18px; padding:0px;">
                    <div class="col-md-6">
                        <input type="text" class="form-control input_css general_form_css mb-2" id="state" name="state" value="'.($users->state).'" placeholder="Enter State">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control input_css general_form_css mb-2" id="country" name="country" value="'.($users->country).'" placeholder="Enter Country">
                    </div>
                </div>
            </div>
        </div>

        <div class="row add_u_s">
            <div class="col-md-12">
                <input type="checkbox" name="send_email" value="true" class="add_main" style="margin-left: 16px;"><span style="font-weight:700 !important;font-size: 1.5rem !important;"> Send Invoice to User</span>
            </div>
        </div>
        <div class="row add_u_s">
            <div style="color:red; margin-left: 16px;" class="col-md-12 error_create">

            </div>
        </div>
        <div class="row add_u_s" style="margin-left: 42%;">
            <button class="col-md-3 create_payment btn btn-primary" id="admin_create_payment" onclick="create_payment()">
                Create
            </button>
        </div>

        <script>

                function create_payment() {

                    var username= $("#user_select_payment").val();
                    var is_email= $(\'input[name="send_email"]:checked\').val() ? $(\'input[name="send_email"]:checked\').val() : false;
                    var amount  = $("#diff_amount").val();
                    var mobile  = $("#new_user_mob").val();
                    var email   = $("#new_user_email").val();
                    var street  = $("#street").val();
                    var city    = $("#city").val();
                    var pincode = $("#pincode").val();
                    var state   = $("#state").val();
                    var country = $("#country").val();

                    let data = {
                        "username":username,
                        "is_email":is_email,
                        "amount":amount,
                        "mobile":mobile,
                        "email":email,
                        "street":street,
                        "city":city,
                        "pincode":pincode,
                        "state":state,
                        "country":country
                    };

                    console.log(data);

                    if(username && amount && email && mobile && street && city && pincode && state && country) {
                        $("#admin_create_payment").prop("disabled", true);
                        $("#admin_create_payment").attr("title", "Please Wait! Payment is being added.");
                        $.ajax({
                            type:"POST",
                            data: data,
                            url:"create_payment_admin",
                            success:function(response){
                                if(response){
                                    if(response.status === "success"){
                                        $("#admin_create_payment").attr("title", "This record is added to reports already!");
                                        const url = "/admin-dashboard/payment_reports";
                                        window.open(url, "_blank", "noopener,noreferrer");
                                    }
                                    $(".error_create").html(response.message);
                                }
                            }
                        })
                    }else{
                        toastr.error("Please fill all the input fields!");
                    }
                }

        </script>';

        return $html_user;
    }

    public function create_payment_admin()
    {
        Log::info('--------------------------create_payment_admin--------------------------');
        Log::info('Payment Details: ' . json_encode($_POST));
        $username = $_POST['username'];
        $is_email = $_POST['is_email'];

        $p_id = str_pad(mt_rand( 1, 99999999), 8, '0', STR_PAD_LEFT);
        $payment_id = 'admin'.$p_id;

        $users = User::where(['status' => 1, 'username' => $username])->first();

        $membership_status = 1;
        if($users->user_status == 11){
            $membership_status = 2;
        }elseif($users->user_status >= 2 && $users->user_status < 11) {
            // $membership_status = 3;
            $membership_status = 4; // diff. paid
        }

        $gst_state     = $_POST['state'] == 'Karnataka' ? true : false;
        $plan_amount   = $_POST['amount'];
        $t_payment     = $plan_amount/1.18;
        $gst_tax       = ($t_payment*18)/100;
        $product_price = round($t_payment);
        $cgst          = $gst_tax/2;
        $c_s_gst       = '-';
        $gst           = '-';

        if($gst_state){
            $c_s_gst = round($gst_tax/2);
        }else{
            $gst = round($gst_tax);
        }

        $result_ind = Payment::max('Id');
        $inv_no     = $result_ind + 1;
        $inv_no     = 'LE/'.$inv_no.'/';
        if(date('m') < 04) {
            $inv_no=$inv_no.''.(date('y')-1).'-'.date('y');
        }
        else {
            $inv_no=$inv_no.''.date('y').'-'.''.(date('y')+1);
        }

        $payment = array(
            'invoice'                 => $payment_id. '.pdf',
            'invoice_no'              => $inv_no,
            'created_at'              => date('Y-m-d H:i:s'),
            'updated_at'              => date('Y-m-d H:i:s'),
            'razor_pay_id'            => $payment_id,
            'currency_type'           => 'INR',
            'taxable_amount'          => round($t_payment),
            'amount'                  => $_POST['amount'],
            'cgst'                    => $c_s_gst == 0 ? '-' : $c_s_gst,
            'sgst'                    => $c_s_gst == 0 ? '-' :$c_s_gst,
            'igst'                    => $gst == 0 ? '-' : $gst,
            'plan'                    => $users->plan .' '. $users->member_type . ' Plan',
            'name'                    => $users->name ? $users->name : '',
            'mobile'                  => $_POST['mobile'],
            'email'                   => $_POST['email'],
            'street'                  => $_POST['street'],
            'city'                    => $_POST['city'],
            'pincode'                 => $_POST['pincode'],
            'state'                   => $_POST['state'],
            'country'                 => $_POST['country'],
            'membership_status'       => $membership_status,
            'status'                  => 'CONFIRMED',
            'response_from_razor_pay' => 'Admin'
        );

        $payment_id = Payment::create($payment);
        $payment_id->token=substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 30);
        $payment_id->save();

        $pdf = \App::make('dompdf.wrapper');
        $plan = $payment['plan'];
        $pdf->loadHTML($this->convert_customer_data_to_html($payment,$inv_no,$plan,$gst_state));
        $pdf_invoice = $pdf->stream();
        file_put_contents('invoices/'.$payment['razor_pay_id'].'.pdf',$pdf_invoice);

        if($payment['email'] && $is_email) {

            //to send invoice
            $mailData=array(
                'to_email'     => $payment['email'],
                'subject'      => 'Liv Ezy - Thank You For Choosing Us!',
                'url'          => 'https://livezy.com/e/'.$payment_id->token,
                'pay'          => $payment['razor_pay_id'].'.pdf',
                'user_name'    => $users->name ? $users->name : '',
                'plan_details' => $payment['plan']
            );
            $mail= \Illuminate\Support\Facades\Mail::send('emails.invoice',['data'=>$mailData], function ($message) use($mailData) {
                $message->to($mailData['to_email']);
                // $message->bcc('pay@livezy.com');
                $message->subject($mailData['subject']);
                $message->attach('invoices/'.$mailData['pay']);
            });
        }

        return response()->json(['status' => 'success', 'message' => 'Payment record created!'], 200);
    }

    public function get_retension_data()
    {
        Log::info("get_retension_data");
        if ($this->check_session_admin()) {
            Log::info("Inside get_retension_data");
            $current_date = date('Y-m-d H:i:s');
            $one_month    = date('Y-m-d', strtotime($current_date . ' - 30 days'));
            $retension    = $this->coach_analytics($current_date, $one_month);
            return array_values($retension);
        }
    }

    public function get_finance_data()
    {
        Log::info("get_finance_data");
        if ($this->check_session_admin()) {
            Log::info("Inside get_finance_data");
            $current_date = date('Y-m-d H:i:s');
            $one_month    = date('Y-m-d', strtotime($current_date . ' - 30 days'));
            $finance      = $this->finance_analytics($current_date, $one_month);
            return array_values($finance);
        }
    }

    public function get_coach_details_data()
    {
        Log::info("get_coach_details_data");
        if ($this->check_session_admin()) {
            Log::info("Inside get_coach_details_data");
            $coach_data = $this->coach_data_admin();
            return $coach_data;
        }
    }

    public function get_notification_data()
    {
        Log::info("get_notification_data");
        if ($this->check_session_admin()) {
            Log::info("Inside get_notification_data");
            $team = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "notification.notification_type!='Sign Up' and users.head_coach='" . Session::get('first_name') . "' and" : "team='" . Session::get('team') . "' and";
            if (Session::get('team') == 'Internal' && Session::get('role-id') == 2) {
                $team = '';
            }
            $notification = $this->getNotification($team);
            return $notification;
        }
    }

    public function get_notification_archive_data()
    {
        Log::info("get_notification_archive_data");
        if ($this->check_session_admin()) {
            Log::info("Inside get_notification_archive_data");
            $team = Session::get('role-id') == 1 || Session::get('role-id') == 3 ? "notification.notification_type!='Sign Up' and users.head_coach='" . Session::get('first_name') . "' and" : "team='" . Session::get('team') . "' and";
            if (Session::get('team') == 'Internal' && Session::get('role-id') == 2) {
                $team = '';
            }
            $notification_archive = $this->get_notification_archive($team);
            return $notification_archive;
        }
    }

    public function live_user_plan_detail_paid_members()
    {
         Log::info("live_user_plan_detail_paid_members");
         $username = $_POST["username"];
         $users = User::where(["status" => 1, "username" => $username])->first();
         $current_date = date("Y-m-d");
         $exsist_diff =
             strtotime($users->plan_end_date) - strtotime($current_date);
         $day = round($exsist_diff / (60 * 60 * 24));
         $html_content =
             '<div class="user_info">
                         <div class="row">
                             <div class="col-md-4 u_details"><b>Name: </b>' .
             $users->name .
             '</div>
                             <div class="col-md-4 u_details"><b>Membership: </b>' .
             $users->plan .
             " " .
             $users->member_type .
             ' Plan</div>
                             <div class="col-md-4 u_details"><b>Days Left: </b> ' .
             $day .
             ' Day(s)</div>
                         </div>
                 </div>
                 <hr>
                 <div class="user_info">
                 <b>Plan End: </b>' .
             date("D d, M Y", strtotime($users->plan_end_date)) .
             '
                 </div>
                 <hr>
                 <div class="user_info">
                 <div class="p_h">Enter number of days to extend membership</div>
                     <div class="top_analy">
                         Number of Days Add*: <input id="extend_day" type="number" onkeypress="return event.charCode >= 48" min="1" >
                         <br>Comment*: <textarea style="margin-top:10px;" id="member_ext_comment" name="w3review" rows="4" cols="50"></textarea>
                     </div>
                 </div>
                 <div class="row add_u_s">
                         <div class="col-md-12">
                             <input disabled type="checkbox" name="send_email_extend" value="1" class="add_main"> Send email to user
                         </div>
                     </div>
                     <div class="row add_u_s">
                         <div style="color:red;" class="col-md-12 error_create_memm">

                         </div>
                     </div>
                     <div class="row add_u_s" style="margin-left: 42%;">
                         <div class="col-md-3 create_user" onclick="membership_extend_paid_members()">
                                 Create
                         </div>
                     </div>
                     <script>
                         function membership_extend_paid_members(){
                             var username="' . strval($username) . '";
                             var no_days=$("#extend_day").val();
                             var comment=$("#member_ext_comment").val();
                             var is_email=$(\'input[name="send_email_pause"]:checked\').val();
                             if((parseInt(no_days) && comment) || (no_days && comment)){
                                 $.ajax({
                                     type:"post",
                                     data:{"no_days":no_days,"username":username,"is_email":is_email,"comment":comment},
                                     url:"membership_extend_paid_members",
                                     success:function(data){
                                         if(data){
                                             if(data=="User Updated"){
                                                 window.location.href="/admin-dashboard/paid_members";
                                             }
                                             $(".error_create_memm").html(data);
                                         }
                                     }
                                 })
                             }else{
                                 toastr.error("Please fill all required field")
                             }
                         }
                     </script>';
         return $html_content;
    }

    public function send_intro_message()
    {
        // Whatsapp notification
        // $mobile_nos = ['+919946206206','+916282952623'];
        // $name = 'Vivek';
        // Enabling below line will fetch all the mobile nos from the DB and send messages to all the members.
        $user_data = User::select('name', 'mob_no')->whereNotNull('plan_id')->get();
        // dd($mobile_nos); exit;
        $template_name = "user_support_intro_1";
        foreach ($user_data as $user) {
            // Log::debug($user['name']); Log::debug($user['mob_no']);
            $name = $user['name'];
            $mobile_no = $user['mob_no'];
            app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
        }
    }

    public function saveCurrencyValues()
    {
        $url = 'http://data.fixer.io/api/latest?access_key=af85c7f24c73808d26e6982469459d44&format=1';
        $result = file_get_contents($url);
        $result = json_decode($result, 1);
        $eur = 1;
        $inr = $result['rates']['INR'];
        $usd = $result['rates']['USD'];
        $aud = $result['rates']['AUD'];
        //cal
        $c_euro_inr = (1 / $inr);
        $c_usd = $usd * $c_euro_inr;
        $c_aud = $aud * $c_euro_inr;
        $data = CurrencyValues::insert([
            'date' => date('Y-m-d'),
            'inr' => 1,
            'usd' => $c_usd,
            'aud' => $c_aud,
            'api_data' => json_encode($result)
        ]);
    }

    public function invoiceView($token = null)
    {
        $invoice = Payment::where('token', $token)->first();
        if ($invoice['currency_type'] == 'INR') {
            $amounts = array(
                'amount_minus_18' => round($invoice['amount'] - 0.18 * ($invoice['amount'])),
                'amount_minus_9'  => round(0.09 * ($invoice['amount'])),
                'amount_total'    => $invoice['amount']
            );
        } else {
            $amounts = array(
                'amount_minus_18' => $invoice['amount'],
                'amount_minus_9'  => 0,
                'amount_total'    => $invoice['amount']
            );
        }
        return view('invoice')->with([
            'invoice' => $invoice,
            'amounts' => $amounts,
        ]);
    }

    public function subscriptionView($token = null)
    {

        $invoice = SubscriptionCapture::where('token', $token)->first();
        if ($invoice['currency_type'] == 'INR') {
            $amounts = array(
                'amount_minus_18' => round($invoice['amount'] - 0.18 * ($invoice['amount'])),
                'amount_minus_9' => round(0.09 * ($invoice['amount'])),
                'amount_total' => $invoice['amount']
            );
        } else {
            $amounts = array(
                'amount_minus_18' => $invoice['amount'],
                'amount_minus_9' => 0,
                'amount_total' => $invoice['amount']
            );
        }
        return view('subscriptions')->with([
            'invoice' => $invoice,
            'amounts' => $amounts,
        ]);
    }

    public function excel_read_question()
    {
        $inputFileName  =   'insta_img/question.xlsx';
        $spreadsheet = IOFactory::load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
        foreach ($sheetData as $rows => $k) {
            $num = $rows;
            foreach ($k as $key => $value) {
                $excel = new Excel;
                $excel->cell_number = $num;
                $excel->cell_letter = $key;
                $excel->cell_value = $value;
                $excel->save();
            }
        }
    }

    public function test_pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $payment = [
            'email' => 'chandan.sinha660@gmail.com',
            'mobile' => '+918797699791',
            'razor_pay_id' => 'asda5sadjbsdf',
            'amount' => 10000
        ];
        $des_plan = '3 Months Buddy Plan';
        $inv_no = 'LE/443/20-21';
        $pdf->loadHTML($this->convert_customer_data_to_html_test($payment, $inv_no, $des_plan));
        $pdf_invoice = $pdf->stream();
        file_put_contents('insta_img/' . $payment['razor_pay_id'] . '.pdf', $pdf_invoice);
        //to send invoice
        $mailData = array(
            'to_email' => $payment['email'],
            //            'to_email'=>'girish@six30labs.io',
            'subject' => 'Liv Ezy - Thank You For Choosing Us!',
            'url' => 'https://livezy.com/e/' . $payment['razor_pay_id'],
            'pay' => $payment['razor_pay_id'],
        );
        $mail = \Illuminate\Support\Facades\Mail::send('emails.invoice', ['data' => $mailData], function ($message) use ($mailData) {
            $message->to($mailData['to_email']);
            $message->subject($mailData['subject']);
            $message->attach('insta_img/' . $mailData['pay'] . '.pdf');
        });
        if ($mail)
            unlink('insta_img/' . $payment['razor_pay_id'] . '.pdf');
        // $pdf->loadHTML($this->convert_customer_data_to_html_test($payment,$inv_no,$des_plan));
        // return $pdf->stream();
        // echo $this->convert_customer_data_to_html_test($payment,$inv_no,$des_plan);
        // $pdf->loadHTML($this->convert_customer_data_to_html_test($payment,$inv_no,$des_plan));
        // $pdf_invoice=$pdf->stream();
        // file_put_contents('insta_img/'.$payment['razor_pay_id'].'.pdf',$pdf_invoice);
    }

    public function convert_customer_data_to_html_test($payment, $inv_no, $des_plan)
    {
        $output = '<style>
        .mktEditable{
            font-family: Overpass;
        font-style: normal;
        font-weight: normal;
        font-size: 15px;
        line-height: 23px;
        text-align: center;
        letter-spacing: 0.01em;
        /* margin-left: 70px; */
            margin-top: -40px;
        color: #000000;
        }
        @media only screen and (max-width: 600px) {
                .main {
                    width: 320px !important;
                }

                .top-image {
                    width: 100% !important;
                }
                .inside-footer {
                    width: 320px !important;
                }
                table[class="contenttable"] {
                    width: 320px !important;
                    text-align: left !important;
                }
                td[class="force-col"] {
                    display: block !important;
                }
                 td[class="rm-col"] {
                    display: none !important;
                }
                .mt {
                    margin-top: 15px !important;
                }
                *[class].width300 {width: 255px !important;}
                *[class].block {display:block !important;}
                *[class].blockcol {display:none !important;}
                .emailButton{
                    width: 100% !important;
                }

                .emailButton a {
                    display:block !important;
                    font-size:18px !important;
                }

            }
        </style>
          <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">

        <table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 14px;line-height: 26px;">
                <tr>
                    <td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">
                        <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                            <tr>
                                <td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;background-color: #fff;">
                                    <a href="https://www.livezy.com"><img class="top-image" src="https://livezy.com/fitness/images/invoice_header.png" style="line-height: 1;width: 100%;" alt="Liv Ezy"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="mktEditable" id="main_title">
                                    LIV EZY ONLINE FITNESS PVT LTD.<br>
                                    Siri Shambhavi, #2346, 3rd Floor, 17th Cross Rd, 1st Sector, HSR Layout, Bengaluru, Karnataka 560102<br>
                                    '.$contact_wa.'<br>
                                    PAN: AAECL4972F<br>
                                    GST: 29AAECL4972F1Z8
                                </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 21px;">
                                    <hr size="1" color="#eeeff0">
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
                                    <table style="width:100%;font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;border-collapse: separate;border-spacing: 0 1em;">



                                        <tr>
                                            <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">
                                                Bill Details:
                                            </td>
                                            <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">

                                            </td>
                                            <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">
                                                Invoice No:' . $inv_no . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">
                                                Email Id: ' . $payment['email'] . '
                                            </td>
                                            <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">

                                            </td>
                                            <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">
                                                Invoice Date.: ' . date('d/m/y') . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 0px;">
                                                Contact No: ' . $payment['mobile'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">

                                            </td>
                                            <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">

                                            </td>
                                            <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">

                                            </td>
                                        </tr>
                                        <tr style="background:#e5e5e5">

                                            <td class="text" style="text-align:Left;border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">
                                                SL.
                                            </td>
                                            <td class="text" style="text-align:left;border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">
                                                Service Description
                                            </td>
                                            <td class="text" style="text-align:center;border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">
                                                Amount(INR)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                1.
                                            </td>
                                            <td>
                                            ' . ucwords($des_plan) . '
                                            </td>
                                            <td style="text-align:center;">
                                                ' . $payment['amount'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 24px;">
                                             &nbsp;<br>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 21px;">
                                                <hr size="1" color="#eeeff0">
                                            </td>
                                            <td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 21px;">
                                                <hr size="1" color="#eeeff0">
                                            </td>
                                            <td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 21px;">
                                                <hr size="1" color="#eeeff0">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>
                                                Sub Total
                                            </td>
                                            <td style="text-align:center;">
                                            ' . $payment['amount'] . '
                                            </td>
                                        </tr>
                                        <tr style="background:#e5e5e5">
                                            <td>
                                            <td>
                                                Total
                                            </td>
                                            <td style="text-align:center;">
                                            ' . $payment['amount'] . '
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 24px;">
                                             &nbsp;<br>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td valign="top" align="center" style=border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 14px;line-height: 26px;">
                                    <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                                        <img style="width:100%" src="https://livezy.com/fitness/images/invoice_footer.png"/>
                                    </table>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
            </table>
          </body>';
        return $output;
    }

    public function admin_test()
    {
        //
    }

}
