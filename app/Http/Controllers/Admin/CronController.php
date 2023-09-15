<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

// Models
use App\Models\User;
use App\Models\Notification;
use App\Models\MemberExtension;
use App\Models\FutureDateMembers;
use App\Models\PausePlan;

use File;


class CronController extends Controller
{
    public function cron_for_question_alert()
    {
        Log::info("------------- Start of cron_for_question_alert --------------");

        // Below query returns the users who have not filled questionnaire
        $user_data = User::where(['user_status' => 3, 'status' => 1])->get()->toArray();
        if (sizeof($user_data) > 0) {
            for ($i = 0; $i < sizeof($user_data); $i++)
            {
                $databse_date = date('d/m/Y', strtotime($user_data[$i]->questionaire_start_date . ' - 2 days'));
                $curr_date = date('d/m/Y');
                if ($databse_date <= $curr_date) {

                    $body_text = 'We have noticed that you still haven’t filled in the questionnaire. To complete this step please use the link below to navigate to your dashboard, once completed we can start the onboarding process.';

                    $mailData = array(
                        'to_email'  => $user_data[$i]->email,
                        'user_cred' => $user_data[$i]->mob_no,
                        'password'  => $user_data[$i]->username,
                        'subject'   => 'IMPORTANT - Liv Ezy Questionnaire Reminder',
                        'name'      => $user_data[$i]->name,
                        'body'      => $body_text,
                    );

                    $mail = \Illuminate\Support\Facades\Mail::send('emails.custom_email', ['data' => $mailData], function ($message) use ($mailData) {
                        $message->to($mailData['to_email']);
                        $message->subject($mailData['subject']);
                        // $message->bcc('admin@livezy.com');
                        // $message->setPriority(\Swift_Message::PRIORITY_HIGH);
                    });
                }
            }
        }

        Log::info("------------- End of cron_for_question_alert --------------");
    }

    public function cron_live_session()
    {
        Log::info('--------------------- Start of cron_live_session ----------------------');

        $current_date = date("Y-m-d");
        $all_user = User::where(['questionaire_start_date' => $current_date, 'member_type' => 'Live Session', 'user_status' => 4, 'status' => 1])->get()->toArray();

        if (sizeof($all_user) != 0) {
            for ($i = 0; $i < sizeof($all_user); $i++)
            {
                $username = $all_user[$i]->username;
                $referal_day = MemberExtension::where('username', $username)->where('status', '1')->sum('no_of_days');
                $user_plan_total_day = $all_user[$i]->total_workday;
                if (sizeof($referal_day)) {
                    $user_plan_total_day = $user_plan_total_day + $referal_day[0]->total_day;
                    MemberExtension::where('username', $username)->update(['status' => 0]);
                }

                $plan_data = [
                    'plan_start_date' => $current_date,
                    'plan_end_date'   => date('Y-m-d', strtotime($current_date . ' + ' . $user_plan_total_day . ' days')),
                    'user_status'     => 8,
                    'total_workday'   => $user_plan_total_day
                ];
                $users_update = User::where(['status' => 1, 'username' => $username])->limit(1)->update($plan_data);
                $mailData = array(
                    'to_email'  => $all_user[$i]->email,
                    'subject'   => 'Liv Ezy - Your membership is now active',
                    'username'  => $all_user[$i]->name,
                    'body'      => 'Your Liv Ezy membership is now active. You\'ve joined thousands of others   who are discovering the value that fitness adds to their lifestyles.',
                    'sub_text'  => 'Here\'s to the beginning of something special.',
                    'user_cred' => $all_user[$i]->mob_no,
                    'password'  => $all_user[$i]->username
                );
                $mail = \Illuminate\Support\Facades\Mail::send('emails.custom_email', ['data' => $mailData], function ($message) use ($mailData) {
                    $message->to($mailData['to_email']);
                    $message->subject($mailData['subject']);
                    //$message->bcc('admin@livezy.com');
                    $message->bcc('artisan.here@gmail.com');
                    $message->setPriority(\Swift_Message::PRIORITY_HIGH);
                });
                // Whatsapp notification
                $mobile_no = $all_user[$i]->mob_no;
                $name = $all_user[$i]->name;
                $template_name = "online_livesessions_onboarding_1";
                if ($mobile_no) {
                    app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
                }
            }
        }
    }

    public function cron_questionaire_start()
    {
        Log::info('--------------------- Start of cron_questionaire_start ----------------------');
        $all_user = FutureDateMembers::where('status', '1')->get()->toArray();
        if (sizeof($all_user) != 0) {
            // echo '<pre>'; print_r($all_user); exit;
            for ($i = 0; $i < sizeof($all_user); $i++) {
                $users = User::where(['status' => 1, 'username' => $all_user[$i]['username']])->first();
                $databse_date = date('d/m/Y', strtotime($users->questionaire_start_date . ' - 4 days'));
                $curr_date = date('d/m/Y');
                // echo $users->mob_no.' =====> '.$databse_date.' =====> '.$curr_date.'<br>';
                // exit;
                if ($databse_date == $curr_date) {
                    // dd('Hi am here');
                    $user_status = [
                        'user_status' => 3
                    ];
                    $body_text = 'We are ready to get started!';
                    $p = 'Please fill in the questionnaire that\'s available on your dashboard in order to proceed. You can also access the questionnaire using the link below. Once filled, your head coach will reach out to you on how to proceed';
                    $user_details = [
                        'email'     => $users->email,
                        'user_name' => $users->name,
                        'body_text' => $body_text,
                        'sub_text'  => $p
                    ];
                    $mailData = array(
                        'to_email'  => $user_details['email'],
                        'subject'   => 'Liv Ezy - Let\'s get started!',
                        'username'  => $user_details['user_name'],
                        'body'      => $user_details['body_text'],
                        'sub_text'  => $user_details['sub_text'],
                        'user_cred' => $users->mob_no,
                        'password'  => $users->username
                    );
                    $mail = \Illuminate\Support\Facades\Mail::send('emails.custom_email', ['data' => $mailData], function ($message) use ($mailData) {
                        $message->to($mailData['to_email']);
                        $message->subject($mailData['subject']);
                        // $message->bcc('admin@livezy.com');
                        // $message->setPriority(\Swift_Message::PRIORITY_HIGH);
                    });
                    // Whatsapp notification
                    $mobile_no = $users->mob_no;
                    $name = $users->name;
                    $template_name = "online_coaching_onboarding_1";
                    if ($mobile_no) {
                        app('App\Http\Controllers\NotificationController')->sendWhatsAppNotification($name, $mobile_no, $template_name);
                    }
                    $user_id = $all_user[$i]['username'];

                    // For Buddy user condition, one user can fill questionnaire if the other person submits his questionnaire without checking the questionnaire start date from user table. After Both filling the questionnaire user status will update to 4 for both users. In some case if this cron runs it will update that user's user status with 3 and we have to restrict it from updating. so if the user_statu is already updated as 4 then this cron won't update the users status further.
                    if($users->user_status != 4) {
                        Log::info('From cron_questionaire_start if user_status != 4');
                        $users_update = User::where(['status'=>1,'username' => $user_id])->limit(1)->update($user_status);
                    }
                    FutureDateMembers::where('username', $user_id)->update([ 'status'=> 0, 'updated_at' => date('Y-m-d H:i:s')]);
                    // if($users->is_buddy){
                    //     $user_buddy_data=User::where(['status'=>1,'username' => $users->is_buddy])->first();
                    //     $buddy_update  =   User::where(['status'=>1,'username' => $users->buddy_username])->limit(1)->update($user_status);
                    //     $f_data=$users->buddy_username;
                    //     $misc_mod->future_questionaire_update($f_data);
                    //     $mail= \Illuminate\Support\Facades\Mail::send('emails.custom_email', ['data'=>$mailData], function ($message) use($mailData) {
                    //         $message->to($user_buddy_data->email);
                    //         $message->subject($mailData['subject']);
                    //         $message->bcc('admin@livezy.com');
                    //         $message->setPriority(\Swift_Message::PRIORITY_HIGH);
                    //     });
                    // }
                }
            }
        }
        Log::info('--------------------- End of cron_questionaire_start ----------------------');
    }

    public function cron_pause_start_cancel()
    {
        Log::info('--------------------- Start of cron_pause_start_cancel ----------------------');
        $current_date = date("Y-m-d");
        $all_user_data = User::whereBetween('user_status', [8, 9])->get()->toArray();
        if (sizeof($all_user_data) > 0) {
            for ($i = 0; $i < sizeof($all_user_data); $i++) {
                $user_data = User::where(['status' => 1, 'username' => $all_user_data[$i]['username']])->first();
                // echo '<pre>'; print_r($all_user_data); exit;
                //check today pause
                $user_id = $user_data ? $user_data->username : '0000000';
                $freeze_dashboard = PausePlan::where('username', $user_id)->where('start_date', '<=', $current_date)->where('status', 1)->get()->toArray();
                echo '<pre>'; print_r($freeze_dashboard); exit;
                $pause_on_data = [];
                //pause detail user if pause
                $res = PausePlan::where('username', $user_id)->where('status', 2)->get()->toArray();
                if ($res) {
                    $pause_on_data = $res;
                }
                $query_date = date('Y-m-d',strtotime(date("Y-m-d").' - 1 days'));
                $not_freeze_dashboard = PausePlan::where('username', $user_id)->where('end_date', '<=', $query_date)->where('status', 2)->get()->toArray();

                $pause_plan = 0;
                if (sizeof($freeze_dashboard) >= 1) {
                    if ($user_data->user_status == 8) {

                        $pause_plan = 1;
                        $user_status_update_on_pause = [
                            'user_status' => 9
                        ];

                        $users_update  =   User::where(['status' => 1, 'username' => $all_user_data[$i]['username']])->limit(1)->update($user_status_update_on_pause);

                        if ($freeze_dashboard[0]->days == 0) {
                            $freeze_dashboard[0]->days = 1;
                        }
                        $up_futur_pause = PausePlan::where('username', $all_user_data[$i]['username'])->where('start_date', $freeze_dashboard[0]->start_date)->where('end_date', $freeze_dashboard[0]->end_date)->update(['status' => 2,'day_availed' => $freeze_dashboard[0]->days,'cancel_date' => date('Y-m-d')]);

                        $mailData = [
                            'to_email' => $user_data->email,
                            'subject' => 'Liv Ezy - Membership Paused',
                            'name' => $user_data->name,
                            'days' => $freeze_dashboard[0]->days,
                            'voilation' => 0,
                            'start_from' => date('d/m/Y', strtotime($freeze_dashboard[0]->start_date)),
                            'end_to' => date('d/m/Y', strtotime($freeze_dashboard[0]->end_date)),
                            'resume_date' => date('d/m/Y', strtotime($freeze_dashboard[0]->end_date . ' + 1 days'))
                        ];
                        $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_email', ['data' => $mailData], function ($message) use ($mailData) {
                            $message->to($mailData['to_email']);
                            $message->subject($mailData['subject']);
                            //$message->bcc('admin@livezy.com');
                            $message->bcc('artisan.here@gmail.com');
                        });
                        // if($user_data->is_buddy){
                        //     $users_update_buddy  =   User::where(['status'=>1,'username' => $user_data->buddy_username])->limit(1)->update($user_status_update_on_pause);
                        //     $up_futur_pause=$misc_mod_model->data_pause_update($user_data->buddy_username,$freeze_dashboard[0]->start_date,$freeze_dashboard[0]->end_date,2,$freeze_dashboard[0]->days);
                        //     $mailData=[
                        //         'to_email'=>$users_update_buddy->email,
                        //         'subject'=>'Liv Ezy - Membership Paused',
                        //         'name'=>$users_update_buddy->name,
                        //         'days'=>$freeze_dashboard[0]->days,
                        //         'voilation'=>0,
                        //         'start_from'=>date('d/m/Y',strtotime($freeze_dashboard[0]->start_date)),
                        //         'end_to'=>date('d/m/Y',strtotime($freeze_dashboard[0]->end_date)),
                        //         'resume_date'=>date('d/m/Y',strtotime($freeze_dashboard[0]->end_date.' + 1 days'))
                        //     ];
                        //     $mail= \Illuminate\Support\Facades\Mail::send('emails.pause_email', ['data'=>$mailData], function ($message) use($mailData) {
                        //         $message->to($mailData['to_email']);
                        //         $message->subject($mailData['subject']);
                        //         $message->bcc('admin@livezy.com');
                        //     });
                        // }
                        $description = 'Pause active for ' . $user_data->name . ' from ' . date('d/m/Y', strtotime($freeze_dashboard[0]->start_date)) . ' to ' . date('d/m/Y', strtotime($freeze_dashboard[0]->end_date));
                        $notification_type = 'Pause';
                        $created_type = 'Super admin';
                        $created_by = 5;
                        $current_date_notifi = date('Y-m-d H:i:s');
                        $data_insert_notification = [
                            'description' => $description,
                            'notification_type' => $notification_type,
                            'team_name' => $user_data->team,
                            'created_type' => $created_type,
                            'created_by' => $created_by,
                            'username' => $user_data->username,
                            'created_at' => $current_date_notifi
                        ];
                        $notification = new Notification($data_insert_notification);
                        $notification->save();
                    }
                }
                if (sizeof($not_freeze_dashboard) >= 1) {
                    if ($user_data->user_status == 9) {

                        $pause_plan = 0;
                        $user_status_update_on_pause = [
                            'user_status' => 8
                        ];

                        $users_update = User::where(['status' => 1, 'username' => $all_user_data[$i]['username']])->limit(1)->update($user_status_update_on_pause);

                        if ($not_freeze_dashboard[0]->days == 0) {
                            $not_freeze_dashboard[0]->days = 1;
                        }
                        $up_futur_pause = PausePlan::where('username', $all_user_data[$i]['username'])->where('start_date', $not_freeze_dashboard[0]->start_date)->where('end_date', $not_freeze_dashboard[0]->end_date)->update(['status' => 2,'day_availed' => $not_freeze_dashboard[0]->days,'cancel_date' => date('Y-m-d')]);

                        $mailData = [
                            'to_email'    => $user_data->email,
                            'subject'     => 'Liv Ezy - Membership Resumed',
                            'name'        => $user_data->name,
                            'voilation'   => 0,
                            'days'        => $not_freeze_dashboard[0]->days,
                            'start_from'  => date('d/m/Y', strtotime($not_freeze_dashboard[0]->start_date)),
                            'end_to'      => date('d/m/Y', strtotime($not_freeze_dashboard[0]->end_date)),
                            'resume_date' => date('d/m/Y', strtotime($not_freeze_dashboard[0]->end_date . ' + 1 days'))
                        ];
                        $mail = \Illuminate\Support\Facades\Mail::send('emails.pause_cancel', ['data' => $mailData], function ($message) use ($mailData) {
                            $message->to($mailData['to_email']);
                            $message->subject($mailData['subject']);
                            //$message->bcc('admin@livezy.com');
                            $message->bcc('artisan.here@gmail.com');
                        });
                        $description = 'Pause resumed for ' . $user_data->name . ' from ' . date('d/m/Y', strtotime($not_freeze_dashboard[0]->start_date)) . ' to ' . date('d/m/Y', strtotime($not_freeze_dashboard[0]->end_date));
                        $notification_type = 'Pause';
                        $created_type = 'Super admin';
                        $created_by = 5;
                        $current_date_notifi = date('Y-m-d H:i:s');
                        $data_insert_notification = [
                            'description' => $description,
                            'notification_type' => $notification_type,
                            'team_name' => $user_data->team,
                            'created_type' => $created_type,
                            'created_by' => $created_by,
                            'username' => $user_data->username,
                            'created_at' => $current_date_notifi
                        ];
                        $notification = new Notification($data_insert_notification);
                        $notification->save();
                        // if($user_data->is_buddy){
                        //     $users_update_buddy  =   User::where(['status'=>1,'username' => $user_data->buddy_username])->limit(1)->update($user_status_update_on_pause);
                        //     $up_futur_pause=$misc_mod_model->data_pause_update($user_data->buddy_username,$not_freeze_dashboard[0]->start_date,$not_freeze_dashboard[0]->end_date,3,$not_freeze_dashboard[0]->days);
                        //     $mailData=[
                        //         'to_email'=>$users_update_buddy->email,
                        //         'subject'=>'Liv Ezy - Membership Resumed',
                        //         'name'=>$users_update_buddy->name,
                        //         'voilation'=>0,
                        //         'days'=>$not_freeze_dashboard[0]->days,
                        //         'start_from'=>date('d/m/Y',strtotime($not_freeze_dashboard[0]->start_date)),
                        //         'end_to'=>date('d/m/Y',strtotime($not_freeze_dashboard[0]->end_date)),
                        //         'resume_date'=>date('d/m/Y',strtotime($not_freeze_dashboard[0]->end_date.' + 1 days'))
                        //     ];
                        //     $mail= \Illuminate\Support\Facades\Mail::send('emails.pause_cancel', ['data'=>$mailData], function ($message) use($mailData) {
                        //         $message->to($mailData['to_email']);
                        //         $message->subject($mailData['subject']);
                        //         $message->bcc('admin@livezy.com');
                        //     });
                        // }
                    }
                }
            }
        }
        Log::info('--------------------- End of cron_pause_start_cancel ----------------------');
    }

    public function cron_renewal()
    {
        Log::info('--------------------- Start of cron_renewal ----------------------');
        $current_date = date("Y-m-d");
        $all_user_data = User::where('user_status', 8)->where('plan_end_date' <= $current_date)->where('status', 1)->get()->toArray();

        // echo '<pre>';
        // dd($all_user_data);

        if (sizeof($all_user_data) > 0) {
            for ($i = 0; $i < sizeof($all_user_data); $i++) {
                $user_status_update_renewal = [
                    'user_status' => 11
                ];
                $whereCondition = ['status' => 1, 'username' => $all_user_data[$i]->username];
                $users_update  =   User::where($whereCondition)->limit(1)->update($user_status_update_renewal);

                $user_data = User::where($whereCondition)->first();
                // Retained slots for the respective coach if user's membership is expired regardless of plus OR premium tiers
                // if($user_data->admin_assign_coach == 0) {
                Log::info("Slot retained from the username: ".$user_data->username);
                $coach = Coach::where(['first_name' => $user_data->head_coach, 'team' =>$user_data->team])->first();
                $coachDetail = CoachDetail::where('coach_id','=',$coach->id)->first();
                $coach_det_id = $coachDetail->id;
                Log::info("Updating retained slots for Coach ID: " . $coach_det_id);
                $slot_count = CoachDetail::where('id', $coach_det_id)->value('slots');
                if (!is_null($slot_count)) {
                    $new_count = $slot_count + 1;
                    if ($new_count >= 0) {
                        CoachDetail::where('id', $coach_det_id)->update(['slots' => $new_count]);
                    }
                }
                // }

                $description = 'Plan expired for ' . $all_user_data[$i]->name;
                $notification_type = 'Renewal';
                $created_type = 'Super admin';
                $created_by = 5;
                $current_date_notifi = date('Y-m-d H:i:s');
                $data_insert_notification = [
                    'description'       => $description,
                    'notification_type' => $notification_type,
                    'team_name'         => $all_user_data[$i]->team,
                    'created_type'      => $created_type,
                    'created_by'        => $created_by,
                    'username'          => $all_user_data[$i]->username,
                    'created_at'        => $current_date_notifi
                ];
                $notification = new Notification($data_insert_notification);
                $notification->save();

                $mailData = [
                    'to_email'    => $all_user_data[$i]->email,
                    'subject'     => 'Liv Ezy - Your Subscription Has Expired',
                    'name'        => $all_user_data[$i]->name,
                    'user_cred'   => $all_user_data[$i]->mob_no,
                    'password'    => $all_user_data[$i]->username,
                    'member_plan' => $all_user_data[$i]->plan . ' ' . $all_user_data[$i]->member_type . ' Membership'
                ];

                $mail = \Illuminate\Support\Facades\Mail::send('emails.renewal_email', ['data' => $mailData], function ($message) use ($mailData) {
                    $message->to($mailData['to_email']);
                    $message->subject($mailData['subject']);
                    //$message->bcc('admin@livezy.com');
                    $message->bcc('artisan.here@gmail.com'); // For testing purpose only
                });
            }
        }
        Log::info('--------------------- End of cron_renewal ----------------------');
    }

    public function cron_renewal_reminder()
    {
        Log::info('--------------------- Start of cron_renewal_reminder ----------------------');
        $current_date = date("Y-m-d",strtotime(' +2 day'));
        $all_user_data = User::where('user_status',8)->where('plan_end_date', $current_date)->where('status', 1)->get()->toArray();

        if (sizeof($all_user_data) > 0) {
            for ($i = 0; $i < sizeof($all_user_data); $i++) {
                $description = 'Plan expiry reminder for ' . $all_user_data[$i]->name;
                $notification_type = 'Reminder';
                $created_type = 'Super admin';
                $created_by = 5;
                $current_date_notifi = date('Y-m-d H:i:s');
                $data_insert_notification = [
                    'description'       => $description,
                    'notification_type' => $notification_type,
                    'team_name'         => $all_user_data[$i]->team,
                    'created_type'      => $created_type,
                    'created_by'        => $created_by,
                    'username'          => $all_user_data[$i]->username,
                    'created_at'        => $current_date_notifi
                ];
                $notification = new Notification($data_insert_notification);
                $notification->save();
                $mailData = [
                    'to_email'      => $all_user_data[$i]->email,
                    'subject'       => 'Liv Ezy - Your Current Subscription Will Expire In Two Days, Kindly Renew On '.$all_user_data[$i]->plan_end_date,
                    'name'          => $all_user_data[$i]->name,
                    'plan_end_date' => $all_user_data[$i]->plan_end_date,
                    'user_cred'     => $all_user_data[$i]->mob_no,
                    'password'      => $all_user_data[$i]->username,
                    'member_plan'   => $all_user_data[$i]->plan . ' ' . $all_user_data[$i]->member_type . ' Membership'
                ];

                $mail = \Illuminate\Support\Facades\Mail::send('emails.renewal_reminder', ['data' => $mailData], function ($message) use ($mailData) {
                    $message->to($mailData['to_email']);
                    $message->subject($mailData['subject']);
                    //$message->bcc('admin@livezy.com');
                    $message->bcc('artisan.here@gmail.com'); // For testing purpose only
                });
            }
        }
        Log::info('--------------------- End of cron_renewal_reminder ----------------------');
    }

    public function cron_currency()
    {
        Log::info('--------------------- Start of cron_currency ----------------------');

        $curl = curl_init();

        // API (test/free): https://apilayer.com/marketplace/fixer-api

        $url = 'https://api.apilayer.com/fixer/latest?symbols&base=INR';
        $client = new \GuzzleHttp\Client();
        $response = $client->get($url, [
            'headers' => [
                'Accept' => 'text/plain',
                'apikey' => 'q68QQO7T9vKTVIxECxMoYj4Xoqt4PNLG',
            ],
        ]);

        $result = $response->getBody();

        // Update the JSON data to currency.json in the config folder
        $result = File::put(config_path('currency.json'), $result);

        if ($result) {
            Log::info("JSON file updated successfully...");
        } else {
            Log::info("Oops! Error updating json file...");
        }
        // return $result;

        Log::info('--------------------- End of cron_currency ----------------------');
    }
}
