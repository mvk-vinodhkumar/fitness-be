<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use App\Models\User;
use App\Models\Coach;
use App\Models\CoachDetail;
use Backpack\CRUD\app\Models\Traits\CrudTrait;

use DateTime;
use DateTimeZone;

class Misc extends Model{

    public function get_city($country){
        $result=DB::select("SELECT DISTINCT city_ascii FROM `country_city` WHERE country='".$country."' ORDER BY city_ascii");

        return $result;
    }

    public function get_country($type_key){
        $result=DB::select("SELECT DISTINCT country,iso2 FROM `country_city` WHERE country like '%$type_key%'");

        return $result;
    }

    public function get_country_currency($ralcountry){
        $result=DB::select("SELECT * FROM `currency` WHERE country='".$ralcountry."'");
        return $result;
    }

    public function mobile_number_available($mob_no){
        $result=DB::select("SELECT * FROM `users` WHERE status=1 and mob_no='".$mob_no."' AND `status` = 1");

        return $result;
    }

    public function email_id_available($email){
        $result=DB::select("SELECT * FROM `users` WHERE user_status in (2,3,4,5,6,7,8,9,10) and email='".$email."' AND `status` = 1");

        return $result;
    }

    public function pause_details_today($username,$end_date){
        $current_date=date("Y-m-d");
        $result = DB::select("SELECT * FROM `pause_plan` WHERE `username` = $username  AND `status` = 1");
        return $result;
    }

    public function restrication_future_pause($username,$end_date){
        $result = DB::select("SELECT * FROM `pause_plan` WHERE `username` = $username AND `end_date` <= '$end_date' AND `status` = 1 ORDER BY id DESC LIMIT 1");
        return $result;
    }

    public function is_user_on_pause($username){
        $current_date=date("Y-m-d");
        // $current_date = '2022-06-06';
        $result = DB::select("SELECT * FROM `pause_plan` WHERE `username` = $username AND `start_date` <= '$current_date' AND `status` = 1");
        return $result;
    }

    public function all_user_running_data(){
        $result = DB::select("SELECT * FROM `users` WHERE `user_status` >= 8  AND `user_status` <= 9");
        return $result;
    }

    public function all_user_renewal_data(){
        $current_date=date("Y-m-d");
        $result = DB::select("SELECT * FROM `users` WHERE status=1 and `user_status` = 8  AND `plan_end_date` <= '$current_date'");
        return $result;
    }

    public function all_user_renewal_reminder_data(){
        $current_date=date("Y-m-d",strtotime(' +2 day'));
        $result = DB::select("SELECT * FROM `users` WHERE status=1 and `user_status` = 8  AND `plan_end_date` = '$current_date'");
        return $result;
    }

    public function plan_details($plan_type,$duration){
        $result=DB::select("SELECT * FROM `membership_details` WHERE type='".$plan_type."' and duration='".$duration."' ");

        return $result;
    }

    public function all_user_data(){
        // $current_date=date("Y-m-d");
        $result = DB::select("SELECT * FROM `users` ");
        return $result;
    }

    public function is_user_on_pause_remove($username){
        $current_date=date('Y-m-d',strtotime(date("Y-m-d").' - 1 days'));
        $result = DB::select("SELECT * FROM `pause_plan` WHERE `username` = $username AND `end_date` <= '$current_date' AND `status` = 2");
        return $result;
    }

    public function pause_on_data($username){
        $current_date=date("Y-m-d");
        $result = DB::select("SELECT * FROM `pause_plan` WHERE `username` = $username AND `status` = 2");
        return $result;
    }

    public function user_exist($dialCode, $mob_no, $password){
        // $password=md5($password);
        $password=bcrypt($password);

        //$result=DB::select("SELECT * FROM `users` WHERE mob_no='".$mobile_number."' AND `status` = 1 AND password='".$password."'");

        $result=DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no Like '%".$mob_no."%' AND `status` = 1 AND password='".$password."'");
        if($result) {
            $res1 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no Like '%0".$mob_no."%' AND `status` = 1 AND password='".$password."'");
            if($res1) {
                $mobile = '+'.$dialCode.'0'.$mob_no;
                $res2 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no = $mobile AND `status` = 1 AND password='".$password."'");
                if($res2) { $result = $res2; }
                else {
                    $mobile = '+'.$dialCode.$mob_no;
                    $res3 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no = $mobile AND `status` = 1 AND password='".$password."'");
                    $result = $res3;
                }
            } else {
                $mobile = '+'.$dialCode.$mob_no;
                $res4 = DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no = $mobile AND `status` = 1 AND password='".$password."'");
                $result = $res4;
            }
        }
        return $result;
    }

    public function sso_user_exsit($mobile_number,$password){
        $password=$password;
        $result=DB::select("SELECT * FROM `users` WHERE mob_no='".$mobile_number."' AND `status` = 1 AND username='".$password."'");

        return $result;
    }

    public function get_question($gender){
        $result=DB::select("SELECT * FROM `question` WHERE gender='All' or gender='".$gender."' ");
        return $result;
    }

    public function get_question_renewal($gender, $username){

        $user  = User::where(['status' => 1,'username' => $username])->first();
        if($user->admin_assign_coach == 1)
        {
            $result=DB::select("SELECT * FROM `renewal_question` WHERE gender='All' or gender='".$gender."' ");
            return $result;

        } else {
            $result=DB::select("SELECT * FROM `renewal_question` WHERE id <= 5  AND gender='All' or gender='".$gender."' ");
            return $result;
        }
    }

    public function get_answer($username){
        $result=DB::select("SELECT * FROM `question_answer` WHERE username='".$username."' ");

        return $result;
    }

    public function get_answer_by_id($id){
        $result=DB::select("SELECT * FROM `question_answer` WHERE id='".$id."' ");

        return $result;
    }

    public function last_invoice_id(){
        $result=DB::select("SELECT MAX(Id) as id FROM payments");
        return $result;
    }

    public function get_plan_details($id){
        $result=DB::select("SELECT * FROM `membership_details` WHERE id='".$id."' ");
        return $result;
    }

    public function get_premium_plan_details($id){
        $result=DB::select("SELECT * FROM `premium_plan_details` WHERE id='".$id."' ");
        return $result;
    }

    public function get_plan_price($type,$count){
        $result=DB::select("SELECT * FROM `membership_details` WHERE `count_subscription`='$count' and `type`='".$type."' ");

        return $result;
    }

    public function get_membership_details(){
        $result=DB::select("SELECT * FROM `membership_details` WHERE is_live=1 ");

        return $result;
    }

    public function pause_details($f_id,$b_id){
        $b_m_id=$b_id?$b_id:'Null';
        //echo "SELECT * FROM `pause_plan` WHERE (username=$f_id or username=$b_m_id) AND (`status` = 3 or `status`=1)";
        $result=DB::select("SELECT * FROM `pause_plan` WHERE (username=$f_id or username=$b_m_id) AND (`status` = 1 or `status`=3)");

        return $result;
    }

    public function running_pause_details($f_id,$b_id){
        $b_m_id=$b_id?$b_id:'Null';
        //echo "SELECT * FROM `pause_plan` WHERE (username=$f_id or username=$b_m_id) AND (`status` = 3 or `status`=1)";
        $result=DB::select("SELECT * FROM `pause_plan` WHERE (username=$f_id or username=$b_m_id) AND (`status` = 2)");

        return $result;
    }

    public function package_bought($data){
        DB::table('bought_package')->insert($data);
        log::info('data inserted into package_bought table');
        return true;
    }

    public function premium_package_bought($data){
        DB::table('bought_premium_plan')->insert($data);
        log::info('data inserted into bought_premium_plan table');
        return true;
    }

    public function package_bought_update($uid,$id){
        $current_date=date("Y-m-d h:i:s");
        // DB::table('bought_package')->where('username', $uid)->where('plan_id', $id)
        // ->update(['status' => 0,'activate_date'=>$current_date]);
        // ->update(['status' => 1,'activate_date'=>$current_date]); // status changed from 0 to 1 by Vivek as the activated status is 1 only. (0 is the plan bought status which is yet to be activated)

        // Modified by furkan for checking record id from bought_package table not plan_id which is incorrect way
        $whereCondition = ['username' => $uid, 'id'  => $id];
        $updateDetails  = ['status' => 1,'activate_date' => $current_date]; // 1 - activate plan & 0 - plan yet to be activated
        DB::table('bought_package')->where($whereCondition)->update($updateDetails);
        log::info('data updated in package_bought table for username '.$uid);
        return true;
    }

    public function premium_package_bought_update($uid, $id) {
        $current_date   = date("Y-m-d h:i:s");
        $whereCondition = ['username' => $uid, 'id'  => $id];
        $updateDetails  = ['status' => 1,'updated_at' => $current_date]; // 1 - activate plan & 0 - plan yet to be activated
        DB::table('bought_premium_plan')->where($whereCondition)->update($updateDetails);
        Log::info('Data updated in bought_premium_plan table for username: '.$uid. ' & id: '.$id);
        return true;
    }

    public function update_team_assign($id,$data){
        DB::table('users')
                ->where('username', $id)
                ->update($data);
        return true;
    }

    // Do not change the plan ids in membership_details/premium_plan_details tables as these are passed from blade to the controller

    public function package_data($username){
        // Prev Query Commented by furkan for incorrect id in results
        // $result=DB::select("SELECT * FROM `bought_package` as `b_p`
        // INNER JOIN membership_details ON membership_details.id=b_p.plan_id
        // WHERE b_p.status=0 and username='".$id."' ");
        // status changed from 1 to 0 by Vivek as the plan bought status is 1 only. (1 is the activated status which is yet to be activated)
        $result=DB::select("SELECT b_p.id AS id, b_p.username, b_p.plan_id, b_p.purchase_date, b_p.activate_date, b_p.status,
        md.name, md.type, md.total_member, md.is_subscription, md.price, md.duration, md.pause, md.count_subscription, md.price_type, md.is_active, md.is_live
        FROM bought_package AS b_p
        INNER JOIN membership_details AS md ON md.id = b_p.plan_id
        WHERE b_p.status = 0 and username='".$username."' "); // status changed from 1 to 0 by Vivek as the plan bought status is 1 only. (1 is the activated status which is yet to be activated)
        return $result;
    }

    public function premium_package_data($username){
        $result = DB::select("SELECT b_p.id AS id, b_p.username, b_p.coach_det_id, b_p.plan_id, b_p.purchased_at, b_p.updated_at, b_p.status,
        coach.first_name, coach.last_name, coach.team,
        coach_details.coach_tier,
        premium_plan_details.type, premium_plan_details.total_member, premium_plan_details.is_subscription, premium_plan_details.duration, premium_plan_details.pause, premium_plan_details.count_subscription, premium_plan_details.is_active, premium_plan_details.is_live
        FROM bought_premium_plan AS b_p
        INNER JOIN premium_plan_details ON premium_plan_details.id = b_p.plan_id
        INNER JOIN coach_details ON coach_details.id = b_p.coach_det_id
        INNER JOIN coach ON coach.id = coach_details.coach_id
        WHERE b_p.status = 0 and username = '".$username."' "); // 1 - activated & 0 - yet to be activated
        return $result;
    }

    public function data_pause_insert($data){
        DB::table('pause_plan')->insert($data);
        return true;
    }

    public function total_referal_day_user($id){
        $result=DB::select("SELECT SUM(no_of_days) as total_day FROM `member_extension` WHERE `username`='".$id."' and `status`='1'");
        return $result;
    }

    public function total_referal_day_update_status($id){
        $updateDetails = [
            'status'=> 0,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        DB::table('member_extension')
            ->where('username', $id)
            ->update($updateDetails);
        return true;
    }

    public function data_referal_insert($data){
        DB::table('member_extension')->insert($data);
        return true;
    }

    public function buddy_log_insert($data){
        DB::table('buddy_log')->insert($data);
        return true;
    }

    public function referal_buddy($id){
        $result=DB::select("SELECT * FROM `member_extension` WHERE username='".$id."' ");
        return $result;
    }

    public function not_filled_question(){
        $result=DB::select("SELECT * FROM `users` WHERE user_status=3 AND `status` = 1");

        return $result;
    }

    public function live_session_start(){
        $current_date=date("Y-m-d");
        $result=DB::select("SELECT * FROM `users` WHERE questionaire_start_date='$current_date' AND member_type='Live Session' AND user_status=4 AND `status` = 1");

        return $result;
    }

    public function user_on_pause(){
        $result=DB::select("SELECT * FROM `users` WHERE user_status=9 AND `status` = 1");

        return $result;
    }

    public function data_pause_update($id,$s_d,$e_d,$s,$exit_diff='Null'){
        if($exit_diff==0)
            $exit_diff=1;
        DB::table('pause_plan')
                ->where('username', $id)
                ->where('start_date', $s_d)
                ->where('end_date', $e_d)
                ->update(['status' => $s,'day_availed'=>$exit_diff,'cancel_date'=>date('Y-m-d')]);
        return true;
    }

    public function whats_app($team){
        $result=DB::select("SELECT * FROM `coach` WHERE `first_name` ='$team'");
        return $result;
    }

    public function future_questionaire($username){
        $result = DB::select("SELECT * FROM `future_date_member` WHERE username=$username AND `status` = 1");
        return $result;
    }

    public function future_questionaire_start(){
        $result = DB::select("SELECT * FROM `future_date_member` WHERE `status` = 1");
        return $result;
    }

    public function future_questionaire_update($username){
        $updateDetails = [
            'status'=> 0,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        DB::table('future_date_member')
                ->where('username', $username)
                ->update($updateDetails);
        return true;
    }

    public function future_questionaire_insert($data){
        DB::table('future_date_member')->insert($data);
        return true;
    }

    public function session_cancel_by_id($session_name,$data){
        DB::table('live_session_link')
                ->where('session_name', $session_name)
                ->update(['status' => 0]);
        DB::table('live_session_link')->insert($data);
        return true;
    }

    public function join_session_update($session_id,$user_id){
        $today=date('Y-m-d H:i:s');
        DB::table('booking_live_session')
                ->where('session_id', $session_id)
                ->where('username', $user_id)
                ->update(['is_join' => 1,'updated_at'=>$today]);
    }

    public function feedback_session_update($session_id,$user_id){
        $today=date('Y-m-d H:i:s');

        DB::table('booking_live_session')
                ->where('session_id', $session_id)
                ->where('username', $user_id)
                ->update(['feedback_pop_up' => 1,'updated_at'=>$today]);
    }

    public function notification_data_insert($data){
        DB::table('notification')->insert($data);
        return true;
    }

    public function where_you_find(){
        $result=DB::select("SELECT b_p.answer FROM users as u INNER JOIN question_answer as b_p on u.username COLLATE utf8mb4_unicode_ci =b_p.username WHERE u.created_at BETWEEN '2021-11-01 00:00:00.000000' AND '2021-11-30 23:59:59.999999'");
        return $result;
    }

    public function session_by_id($sess_id){
        $result=DB::select("SELECT * FROM `live_session_zoom` WHERE status=1 and id='$sess_id'");
        return $result;
    }

    public function live_session_booking_data_user($user_id){
        $today=date('Y-m-d');
        $sess_end_date=strtotime($today)+(3600*24*4);
        $sess_end_date=date('Y-m-d',$sess_end_date);
        $result=DB::select("SELECT * FROM `booking_live_session` as `b_k_l` INNER JOIN live_session_zoom ON b_k_l.session_id=live_session_zoom.id WHERE b_k_l.username=$user_id and live_session_zoom.start_date BETWEEN '$today' AND '$sess_end_date' and b_k_l.status=1 and live_session_zoom.status=1 ");
        //print_r($result);die();
        return $result;
    }

    public function feedback_session_insert($data){
        $id=$data['username'];
        $sess_id=$data['session_id'];
        $result=DB::select("SELECT * FROM `feedback_live_session` WHERE username=$id and session_id=$sess_id");
        if(!$result){
            DB::table('feedback_live_session')->insert($data);
            return true;
        }
    }

    public function feedback_intro_call_insert($data){
        DB::table('intro_call_feedback')->insert($data);
        return true;
    }

    public function question_answer_insert($data,$user_id){

        $updateDetails = [
            'status' => 0,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $result=DB::table('question_answer')
                    ->where('username', $user_id)
                    ->update($updateDetails);
        DB::table('question_answer')->insert($data);
        return true;
    }

    public function live_session_data_view_user(){
        // $today_book_date_now = date('Y-m-d');
        //                         $date_tz_now = new DateTime($today_book_date_now, new DateTimeZone('Asia/Kolkata'));
        //                         $user_time_zone_today=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
        //                         $date_tz_now->setTimezone(new DateTimeZone($user_time_zone_today));
        //                         $today= $date_tz_now->format('Y-m-d');
        $today=date('Y-m-d');
        $sess_end_date=strtotime($today)+(3600*24*3);
        $sess_end_date=date('Y-m-d',$sess_end_date);
        $result=DB::select("SELECT * FROM `live_session_zoom` WHERE start_date BETWEEN '$today' AND '$sess_end_date' and status=1  ORDER BY `start_date` ASC,`start_time` ASC");
        //print_r($result);die();
        return $result;
    }

    public function live_session_distinct_date(){
        // $today_book_date_now = date('Y-m-d');
                                // $date_tz_now = new DateTime($today_book_date_now, new DateTimeZone('Asia/Kolkata'));
                                // $user_time_zone_today=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                // $date_tz_now->setTimezone(new DateTimeZone($user_time_zone_today));
                                // $today= $date_tz_now->format('Y-m-d');
        $today=date('Y-m-d');
        $sess_end_date=strtotime($today)+(3600*24*3);
        $sess_end_date=date('Y-m-d',$sess_end_date);
        //echo "SELECT distinct start_date FROM `live_session_zoom` WHERE start_date BETWEEN '$today' AND '$sess_end_date' and status=1";die();
        $result=DB::select("SELECT distinct start_date FROM `live_session_zoom` WHERE start_date BETWEEN '$today' AND '$sess_end_date' and status=1  ORDER BY `start_date` limit 4");
        //print_r($result);die();
        return $result;
    }

    public function temp_table_data(){
        $result=DB::select("SELECT * FROM tem_table");
        return $result;
    }

    public function renewal_data_previous($data){
        log::info(json_encode($data));
        DB::table('renewal_history')->insert($data);
        return true;
    }

    public function admin_code($code){
        $result=DB::select("SELECT * FROM `voucher_code` where status=1 and code='$code'");
        return $result;
    }

    public function mobile_number_exsist($dialCode, $mob_no){
        //$result=DB::select("SELECT * FROM `users` WHERE user_status in (1,2,3,4,5,6,7,8,9,10) and mob_no Like '%".$mob_no."' AND `status` = 1");
        Log::info('mobile_number_exsist: '. $dialCode . $mob_no);
        $result=DB::select("SELECT * FROM `users` WHERE user_status < 11 and mob_no Like '%".$mob_no."%' AND `status` = 1");
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

        return $result;
    }

    public function data_pause_update_admin($data,$id){
        DB::table('pause_plan')
                ->where('id', $id)
                ->update($data);
        return true;
    }

    public function coach_data(){
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
                            coach.gender,
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
                        ->where('coach.is_disabled','=', 1)
                        ->where('coach_details.coach_tier','<>', 'plus')
                    //  ->orderby('coach_details.display_order', 'asc')
                        ->inRandomOrder()
                        ->get();
        return $result;
    }

    public function plus_coach_data(){
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
                            coach.gender,
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
                        ->where('coach.is_disabled','=', 1)
                        ->where('coach_details.coach_tier','=', 'plus')
                        ->inRandomOrder()
                        ->get();
        return $result;
    }

}
?>
