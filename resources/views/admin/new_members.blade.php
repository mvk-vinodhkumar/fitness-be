<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liv Ezy Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="../fitness/images/png2.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.0.1/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="../login/css/pignose.calendar.min.css" />


    <link href="../fitness/css/jquery.btnswitch.css" rel="stylesheet" type="text/css">
    <link href="../css/paid-members.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../fitness/schedule/dist/css/jquery-calendar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css"
        integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css"
        integrity="sha512-jQqzj2vHVxA/yCojT8pVZjKGOe9UmoYvnOuM/2sQ110vxiajBU+4WkyRs1ODMmd4AfntwUEV4J+VfM6DkfjLRg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>


    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"></script>

    <script src="https://cdn.datatables.net/searchbuilder/1.0.1/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>







    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.jquery.min.js"></script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-database.js"></script>
    <script type="text/javascript" src="../login/js/pignose.calendar.full.min.js"></script>
    <script src="../fitness/js/archive_notification.js"></script>

    <script src="../fitness/js/paging.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js">
    </script>


    <script src="../fitness/js/jquery.btnswitch.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/fontawesome.min.js"
        integrity="sha512-KCwrxBJebca0PPOaHELfqGtqkUlFUCuqCnmtydvBSTnJrBirJ55hRG5xcP4R9Rdx9Fz9IF3Yw6Rx40uhuAHR8Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/solid.min.js"
        integrity="sha512-Qc+cBMt/4/KXJ1F6nNQahXIsgPygHM4S2XWChoumV8qkpZ9oO+gBDBEpOxgbkQQ/6DlHx6cUxa5nBhEbuiR8xw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.js"
        integrity="sha512-gRg3MTbqGUwZiqkDRUj7BJOqiYX6tQDAkZVq6zCHfRUxBhoW0kRG4ASllaK31PIe+I+xdaJhLcZXbs2O2r8SRg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../fitness/schedule/dist/js/jquery-calendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>



    <?php

    if(Session::get('role-id')==1 || Session::get('team')!='Internal')
    { ?>
    <style>
        .buttons-html5 {
            display: none !important;
        }
    </style>
    <?php
    }

    function link_expire_live_session($live_session_url,$session_name){
        $class_add='disabled_div';
        if(sizeof($live_session_url)>0){
            for($i=0;$i<sizeof($live_session_url);$i++){
                if($live_session_url[$i]->session_name==$session_name){
                    $user_plan_end_date=strtotime($live_session_url[$i]->created_at)+((60 * 60 * 24)*10);
                    $curr_date=strtotime(date('Y-m-d'));
                    $exsist_diff=$user_plan_end_date-$curr_date;
                    $exsist_diff=round($exsist_diff / (60 * 60 * 24));
                    $class_add='';
                    if($exsist_diff<=0)
                        $class_add='disabled_div';
                    break;
                }
            }
        }else{
            $class_add='disabled_div';
        }
        echo $class_add;
    }
    function link_expire_live_session_msg($live_session_url,$session_name){
        $link_msg='Link Expired';
        if(sizeof($live_session_url)>0){
            for($i=0;$i<sizeof($live_session_url);$i++){
                if($live_session_url[$i]->session_name==$session_name){
                    $user_plan_end_date=strtotime($live_session_url[$i]->created_at)+((60 * 60 * 24)*10);;
                    $curr_date=strtotime(date('Y-m-d'));
                    $exsist_diff=$user_plan_end_date-$curr_date;
                    $exsist_diff=round($exsist_diff / (60 * 60 * 24))-1;
                    $link_msg='Link Expired in '.$exsist_diff.' days';
                    if($exsist_diff<=0)
                        $link_msg='Link Expired';

                    break;
                }
            }
        }
        echo $link_msg;
    }
    function link_expire_live_session_url($live_session_url,$session_name){
        $live_url='';
        if(sizeof($live_session_url)>0){
            for($i=0;$i<sizeof($live_session_url);$i++){
                if($live_session_url[$i]->session_name==$session_name){
                    $live_url=$live_session_url[$i]->live_session_url;
                    break;
                }
            }
        }
        echo $live_url;
    }
    // echo $class_add;die();
    ?>
</head>

<body>
    <div class="overlay">
        <!--  -->
    </div>
    <div class="pre-loader-admin">
        <img class="img-responsive" src="../fitness/images/logo_gif.gif">
    </div>
    <div class="container-fluid parent-admin">
        <div class="row">
            <div class="col-md-12 p_d_n">
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-3">
                                <div class="referal_coach">
                                    Your Voucher Code: <b><span class="coach_voucher"></span></b>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <?php if(Session::get('toggle_btn')) { ?>

                                <div class="outsiode_tog">
                                    Admin
                                    <div id="admin_toggle" style="margin: 0 10px;"></div>
                                    Coach
                                </div>
                                <?php } ?>
                                <div class="container-notifications">
                                    <div class="notifications show-count">
                                    </div>
                                </div>
                                <div class="login" data-toggle="tooltip" title="{{Session::get('first_name')}}">
                                    <div class="login_text">{{Session::get('first_name')[0]}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <div class="col-md-2 left_panel">
                    <center>
                        <img class="img-responsive logo" src="../fitness/images/png2.png" />
                        <div class="logo_text">Liv Ezy</div>
                        <hr>
                        <br>
                    </center>
                    <ul class="p_ul">
                        <?php if(Session::get('role-id')==3){?>
                        <li id="create_live_session" class="nav-item menu_li">
                            <a href="/admin-dashboard/zoom_live_session" class="t_d_n">
                                <span class="title menu_li_span">Zoom Live Session</span>
                            </a>
                        </li>
                        <li id="notification" class="nav-item menu_li">
                            <a href="/admin-dashboard/notifications" class="t_d_n">
                                <span class="title menu_li_span">Notifications</span>
                            </a>
                        </li>
                        <li id="logout" class="nav-item menu_li">
                            <a href="#" class="t_d_n">
                                <span class="title menu_li_span">Logout</span>
                            </a>
                        </li>
                        <?php } else {?>
                        <li id="paid_members" class="nav-item menu_li">
                            <a href="/admin-dashboard/paid_members" class="t_d_n">
                                <span class="title menu_li_span">Paid Members</span>
                            </a>
                        </li>
                        @if(Session::get('role-id') == 2 || Session::get('admin-id') == 7 || Session::get('admin-id') == 36)

                        <li id="new_members" class="nav-item menu_li active_menu">
                            <a href="/admin-dashboard/new_members" class="t_d_n">
                                <span class="title menu_li_span">New Assignments</span>
                            </a>
                        </li>

                        <li id="all_user" class="nav-item menu_li">
                            <a href="/admin-dashboard/all_users" class="t_d_n">
                                <span class="title menu_li_span">All User</span>
                            </a>
                        </li>
                        @endif
                        <li id="live_session" class="nav-item menu_li">
                            <a href="/admin-dashboard/live_session" class="t_d_n">
                                <span class="title menu_li_span">Live Session</span>
                            </a>
                        </li>

                        <li id="create_live_session" class="nav-item menu_li">
                            <a href="/admin-dashboard/zoom_live_session" class="t_d_n">
                                <span class="title menu_li_span">Zoom Live Session</span>
                            </a>
                        </li>
                        <li id="notification" class="nav-item menu_li">
                            <a href="/admin-dashboard/notifications" class="t_d_n">
                                <span class="title menu_li_span">Notifications</span>
                            </a>
                        </li>

                        <li id="transform" class="nav-item menu_li">
                            <a href="/admin-dashboard/transform" class="t_d_n">
                                <span class="title menu_li_span">Transform</span>
                            </a>
                        </li>
                        <?php if(Session::get('role-id')==2 && Session::get('team')=='Internal'){?>
                        <li id="admin_analytics" class="nav-item menu_li">
                            <a href="/admin-dashboard/admin_analytics" class="t_d_n">
                                <span class="title menu_li_span">Analytics</span>
                            </a>
                        </li>
                        <li id="team_details" class="nav-item menu_li">
                            <a href="/admin-dashboard/team_details" class="t_d_n">
                                <span class="title menu_li_span">Team Details</span>
                            </a>
                        </li>
                        <li id="voucher_details" class="nav-item menu_li">
                            <a href="/admin-dashboard/voucher_details" class="t_d_n">
                                <span class="title menu_li_span">Voucher Details</span>
                            </a>
                        </li>
                        <li id="coach_details" class="nav-item menu_li">
                            <a href="/admin-dashboard/coach_details" class="t_d_n">
                                <span class="title menu_li_span">Coach Details</span>
                            </a>
                        </li>
                        <?php }     ?>
                        <li id="logout" class="nav-item menu_li">
                            <a href="#" class="t_d_n">
                                <span class="title menu_li_span">Logout</span>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-10 right_panel">
                    <div class="member_details p_d">

                        <div class="col-md-12">
                            <div class="col-md-2 member_tab_view active_ls" data-value="pmd">
                                New Member Details
                            </div>

                            <div class="col-md-2 member_tab_view" data-value="ldm">
                                Renewed Member Details
                            </div>

                            <?php if(Session::get('role-id')==2 && Session::get('team')=='Internal') {?>

                            {{-- <div class="col-md-2 payment_reports">
                                <span style="color:white;">Payments Report</span>
                            </div>

                             <div class="col-md-3">
                                <select id="select_oper_activity" class="form-control">
                                    <option selected="true" value="default" disabled="disabled">Choose User Operation
                                    </option>
                                    <option value="add_user">Add / Deactivate User</option>
                                    <option value="membership_extension">Membership Extend</option>
                                    <option value="admin_pause">Pause Membership</option>
                                    <option value="change_start_date">Change Start Date</option>
                                </select>
                            </div> --}}
                            <?php } ?>
                        </div>

                        <div class="col-md-12 neds live_cal" id="pmd">
                            <div class="freez_div">
                                <div class="freeze_tex">Column Freeze Upto</div>
                                <select class="form-control freeze" id="freeze" onchange="freeze(this);">
                                    <option value="1">Action</option>
                                    <option value="3">User Id</option>
                                    <option value="4">Name</option>
                                    <option value="5">Email Id</option>
                                    <option value="6">Phone Number</option>
                                    <option value="7">Membership</option>
                                    <option value="8">Status</option>
                                    <option value="9">Team</option>
                                </select>
                            </div>
                            <table id="member_details_data" class="stripe row-border order-column nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Time Stamp</th>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Email Id</th>
                                        <th>Phone Number</th>
                                        <th>Membership</th>
                                        <th>Status</th>
                                        <th>Team</th>
                                        <th>Head Coach</th>
                                        <th>Tier Name</th>
                                        <th>Days Left</th>
                                        <th>Pause Status</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Veg/Non-veg</th>
                                        <th>Buddy Username</th>
                                        <th>Refered By</th>
                                        <th>Refered Type</th>
                                        <th>Service Hour</th>
                                        <th>Country</th>
                                        <th>Plan Start Date</th>
                                        <th>Coach Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12 neds live_cal" id="ldm">
                            <div class="freez_div">
                                <div class="freeze_tex">Column Freeze Upto</div>
                                <select class="form-control freeze" id="freeze" onchange="freeze(this);">
                                    <option value="1">Action</option>
                                    <option value="3">User Id</option>
                                    <option value="4">Name</option>
                                    <option value="5">Email Id</option>
                                    <option value="6">Phone Number</option>
                                    <option value="7">Membership</option>
                                    <option value="8">Status</option>
                                    <option value="9">Team</option>
                                </select>
                            </div>

                            <table id="renewed_members_data" class="stripe row-border order-column nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Time Stamp</th>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Email Id</th>
                                        <th>Phone Number</th>
                                        <th>Membership</th>
                                        <th>Status</th>
                                        <th>Team</th>
                                        <th>Head Coach</th>
                                        <th>Tier Name</th>
                                        <th>Prev Team</th>
                                        <th>Prev Coach</th>
                                        <th>Days Left</th>
                                        <th>Pause Status</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Veg/Non-veg</th>
                                        <th>Buddy Username</th>
                                        <th>Refered By</th>
                                        <th>Refered Type</th>
                                        <th>Service Hour</th>
                                        <th>Country</th>
                                        <th>Plan Start Date</th>
                                        <th>Coach Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="update_plan" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">You are updating the plan of <span id="p_u_t">Chandan Kumar (user id:
                            20345)</span></h4>
                </div>
                <div class="modal-body">
                    <div class="first_f_step">
                        <div class="first_text">
                            <label class="l_t l_t_f">Google Doc Url</label>
                        </div>
                        <div class="second_text">
                            <div class="input_style">
                                <input type="hidden" />
                                <input id="update_g_d" class="form-control i_s ts" autofocus type="text" />
                            </div>
                        </div>
                        <div class="first_text f_p_btn">
                            <button class="form-control i_s sbt_btn doc_btn" id="f_s1">Submit</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="update_status" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">You are updating the status of <span id="s_u_t">Chandan Kumar (user id: 20345)</span></h4>
                </div>
                <div class="modal-body">
                    <div class="first_f_step">
                        <div class="first_text">
                            <label class="l_t l_t_f">Select User Status</label>
                        </div>
                        <div class="second_text">
                            <div class="input_style">
                                <select id="update_status_select" class="form-control i_s ts">
                                    <option value="4">Questionnaire Filled</option>
                                    <option value="5">Physique Image Received</option>
                                    <option value="6">Plan Sent</option>
                                    <option value="7">Intro Call Complete</option>
                                    <option value="8">Plan Start</option>
                                </select>
                            </div>
                        </div>
                        <div class="first_text f_p_btn">
                            <button class="form-control i_s sbt_btn doc_btn" data-user="" id="update_status_btn">Submit
                            </button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="update_team" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">You are updating the team & head coach for <span id="s_u_t_h">Chandan Kumar (user id: 20345)</span></h4>
                </div>
                <div class="modal-body">
                    <div class="first_f_step">

                        <div class="team_assign_count">

                        </div>

                        <div class="first_text">
                            <label class="l_t l_t_f">Select Team:</label>
                        </div>
                        <div class="second_text">
                            <div class="input_style">
                                <select id="update_team_select" class="form-control i_s ts">

                                </select>
                            </div>
                        </div>
                        <div class="first_text">
                            <label class="l_t l_t_f">Select Head Coach:</label>
                        </div>
                        <div class="second_text">
                            <div class="input_style">
                                <select id="update_head_coach_select" class="form-control i_s ts">

                                </select>
                            </div>
                        </div>
                        <div class="first_text" style="display:flex; flex-direction: row; justify-content: left; align-items: baseline">
                            <label class="l_t l_t_f">Selected Coach Tier:</label>
                            <h4 style="color:white; margin-left:5px;" id="selected_coach_tier"></h4>
                        </div>
                        <div class="first_text f_p_btn submit_btn">

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</body>

<script>

    // To display coach tier based on selection of team & coach
    $('#update_head_coach_select').on('change', function () {

        var coach_name = $('#update_head_coach_select').val();
        var team_name = $('#update_team_select').val();

        if(coach_name !== null && team_name !== null) {
            $.ajax({
                url: '/get_coach_tier/' + coach_name + '/' + team_name,
                type: 'GET',
                success:function (response) {
                    if(response == 'classic') {
                        $('#selected_coach_tier').html('<span class="badge mt-2" style="background-color:#00ab4e;">Classic</span>');
                        $('.submit_btn').empty(); // Remove submit button
                    }
                    else if(response == 'supreme') {
                        $('#selected_coach_tier').html('<span class="badge mt-2" style="background-color:#1a70d1;">Supreme</span>');
                        $('.submit_btn').empty(); // Remove submit button
                    }
                    else if(response == 'exclusive') {
                        $('#selected_coach_tier').html('<span class="badge mt-2" style="background-color:#bc4244;">Exclusive</span>');
                        $('.submit_btn').empty(); // Remove submit button
                    }
                    else {
                        $('#selected_coach_tier').html('<span class="badge mt-2" style="background-color:#00d3cd;">LivEzy Plus</span>');
                        $('.submit_btn').html('<button class="form-control i_s sbt_btn doc_btn" id="update_team_btn">Submit</button>');
                    }
                }
            });
        }
    });

    function json2array(json){
    var result = [];
    var keys = Object.keys(json);
    keys.forEach(function(key){
        result.push(json[key]);
    });
    return result;
}

// function update_member_table() {
//     console.log('update_member_table');

//     // Added by Furkan
//     var superdata = '';

//     // Returns all the paid members data
//     $.ajax({
//         type:'GET',
//         global:true,
//         async:false,
//         url: 'get_paid_member_data',
//         success: function(data) {
//             console.log("Success of get_paid_member_data");
//             superdata = data;
//         }
//     });
//     console.log('calling')
//     update_member_table();
//     console.log('called')
// }



// Added by Furkan for Admin Ops on New Paid Members

    function onUser_select() {

        // console.log('Inside On change of user_select');
        var user_id = $('#user_select').val();
        // console.log('Selected user_id: ' + user_id);
        var user_type = document.querySelector('input[name="user_add"]:checked').value;
        // console.log('Selected user_type: ' + user_type);
        if(user_id) {
            $.ajax({
                type:'POST',
                data:{'_token': '{{ csrf_token() }}','username':user_id,'user_type':user_type},
                url:'get_user_data_paid_members',
                success:function(data){
                        $('.adding_user_html').html('');
                    if(data){
                        $('.adding_user_html').html(data);
                    }
                }
            });
        }
    }

    function onUser_select_extend() {

        // console.log('Inside On change of user_select_extend');
        var user_id=$('#user_select_extend').val();
        // console.log('Selected user_id: ' + user_id);
        if(user_id) {
            $.ajax({
                type:'POST',
                data:{'_token': '{{ csrf_token() }}','username':user_id},
                url:'live_user_plan_detail_paid_members',
                success:function(data){
                    $('.extend_user_html').html('');
                    if(data){
                        $('.extend_user_html').html(data);
                    }
                }
            });
        }
    }

    function onUser_select_pause() {

        // console.log('Inside On change of onUser_select_pause');
        var user_id = $('#user_select_pause').val();
        // console.log('Selected user_id: ' + user_id);
        if(user_id) {
            $.ajax({
                type:'post',
                data:{'_token': '{{ csrf_token() }}','username':user_id},
                url:'live_user_data',
                success:function(data){
                    $('.pause_user_html').html('');
                    if(data){
                        $('.pause_user_html').html(data);
                    }
                }
            });
        }

    }

    function onUser_select_csd() {

        // console.log('Inside On change of user_select_change_start_date');
        var user_id = $('#user_select_change_start_date').val();
        // console.log('Selected user_id: ' + user_id);
        if(user_id) {
            $.ajax({
                type:'POST',
                data:{'_token': '{{ csrf_token() }}','username':user_id},
                url:'change_start_date_user',
                success:function(data){
                    // console.log(data);
                    $('.pause_user_html_change_start').html('');
                    if(data){
                        $('.pause_user_html_change_start').html(data);
                    }
                }
            });
        }
    }

    function freeze(a) {

        // console.log('Inside Freeze:' + a.value);
        var a = a.value;
        var super_data = '';

        // Returns all the paid members data
        $.ajax({
            type:'GET',
            global:true,
            async:false,
            url: 'get_new_member_data',
            success: function(data) {
                // console.log("Success of New Member data");
                super_data = data;
            }
        });

        $('#member_details_data').DataTable({
            destroy: true,
            scrollY: 600,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            data:super_data,
            buttons:['searchBuilder'],
            language: {
                searchBuilder: {
                    button: 'Filter Data',
                    title: 'Filter Buddy / Individual Mebership User'
                }
            },
            dom: 'Blfrtip',
            fixedColumns:   {
                leftColumns: a
            },
            order: [[ 1, 'asc' ]]
        });

        var renewed_super_data = '';

        // Returns all the renewed users data
        $.ajax({
            type:'GET',
            global:true,
            async:false,
            url: 'get_renewed_member_data',
            success: function(data) {
                // console.log("Success of get_renewed_member_data");
                renewed_super_data = data;
            }
        });

        $('#renewed_members_data').DataTable({
            destroy: true,
            scrollY: 600,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            data:renewed_super_data,
            buttons:['searchBuilder'],
            language: {
                searchBuilder: {
                    button: 'Filter Data',
                    title: 'Filter Buddy / Individual Mebership User'
                }
            },
            dom: 'Blfrtip',
            fixedColumns:   {
                leftColumns: a
            },
            order: [[ 1, 'asc' ]]
        });
    }

// End by Furkan for Admin Ops on New Paid Members




$(document).ready(function() {

    $('#update_head_coach_select').trigger('change');

    $('.member_tab_view').on('click',function(){
        $('.member_tab_view').removeClass('active_ls');
        $(this).addClass('active_ls');
        var id=$(this).attr('data-value');
        $('.neds').css('display','none');
        $('#'+id).css('display','block');
    });

    // Added by Furkan
    // We need tell the plugin we've updated the options in dropdown and filled them all in from your ajax call. Hence I have used - $('dropdown').trigger("chosen:updated");
    $('#select_oper_activity').on('change', function() {

        var selected_operation = $('#select_oper_activity option:selected').val();
        $('#' + selected_operation).modal('show');
        if(selected_operation == 'change_start_date') {

            // console.log('Op: Change start date - get future date members');
            $.ajax({
                type:'GET',
                url:'get_future_member_data',
                success:function(data) {
                    $('#user_select_change_start_date').html(data);
                    $('#user_select_change_start_date').trigger("chosen:updated");
                }
            });
        }
        else {
            // console.log('Ops: Add user/membership extend/admin pause - get all members');
            $.ajax({
                type:'GET',
                url:'get_all_user_data?operation=' + selected_operation,
                success:function(data) {
                    if(selected_operation == 'add_user') {
                        // console.log('Data append for add_user');
                        $('#user_select').html(data);
                        $('#user_select').trigger("chosen:updated");
                    } else if (selected_operation == 'membership_extension') {
                        // console.log('Data append for membership_extension');
                        $('#user_select_extend').html(data);
                        $('#user_select_extend').trigger("chosen:updated");
                    } else if (selected_operation == 'admin_pause') {
                        // console.log('Data append for admin_pause');
                        $('#user_select_pause').html(data);
                        $('#user_select_pause').trigger("chosen:updated");
                    }
                }
            });
        }

        $("#select_oper_activity").val('default');

    });

    // Get & Set the coach voucher code
    $.ajax({
        type:'GET',
        url: 'get_coach_voucher',
        success: function(data) {
            // console.log("Success of get_coach_voucher");
            $('.coach_voucher').html(data);
        }
    });

    $.ajax({
        type:'GET',
        url: 'get_notifications_count',
        success: function(data) {
            // console.log("Success of get_notifications_count");
            $('.notifications').attr('data-count',data);
        }
    });

    $('.container-notifications').on('click',function(){
        // $('#notification').trigger('click');
        window.location.href = '/admin-dashboard?notification'
    });


    $('.payment_reports').on('click', function() {
        var url = "/admin-dashboard/payment_reports";
        window.open(url, "_blank");
    });

    // window.onload=selectAlldata();
    $('[data-toggle="tooltip"]').tooltip();
    $('.nav-item').on('click',function(e){
        $('.nav-item').removeClass('active_menu');
        $(this).addClass('active_menu');
        var id=$(this).attr('id');
        $('.p_d').css('display','none');
        $('.'+id).css('display','block');
        document.location.hash = ' ';
        history.pushState('data to be passed', 'Admin', `/admin-dashboard?${id}`);

    })
    $("#coach_select").chosen();
    $("#service_hours").chosen();
    $("#whatsapp_number").chosen();
    $("#coach_live").chosen();
    $("#session_live_url").chosen();
    $("#user_select").chosen();
    $("#user_select_pause").chosen();
    $("#user_select_extend").chosen();
    $("#user_select_change_start_date").chosen();


    var r_sd=<?php echo Session::get('role-id')?>;
    if(parseInt(r_sd)==3)
        $('#create_live_session').click();


    //var super_data = <?php //echo json_encode((array_values($paid_member_data)))?>;
    var super_data = '';

    // Returns all the paid members data
    $.ajax({
        type:'GET',
        global:true,
        async:false,
        url: 'get_new_member_data',
        success: function(data) {
            // console.log("Success of get_new_member_data");
            super_data = data;
        }
    });

    var mes = $('#member_details_data').DataTable({
        scrollY: 600,
        buttons: [{
                extend: 'searchBuilder',
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                },
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ],
        language: {
            searchBuilder: {
                button: 'Filter Data',
                title: 'Filter Buddy / Individual Mebership User'
            }
        },
        searchBuilder: {
            columns: [1, 2, 3]
        },
        dom: 'Blfrtip',
        data: super_data,
        deferRender: true,
        bProcessing: true,
        bAutoWidth: true,
        responsive: true,
        scrollX: true,
        scrollCollapse: true,
        paging: true,
        fixedColumns: {
            leftColumns: 2
        },
        createdRow: function(row, data, dataIndex) {
            $(row).attr('id', data[2]);
            // // console.log('data[21]:' + data[21]);
            if (data[21])
                $(row).css('background', '#ff6e6e');
            if (data[11] == 'Yes')
                $(row).css('background', 'antiquewhite');
        },
        columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 1,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 2,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 3,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 4,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 5,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 6,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 7,
                className: 'status_td',
                render: function(data, type, full, meta) {
                    return '<span onclick="status_update(' + full[2] + ',this)" data-userid="' + full[2] + '" data-username="' + full[3] + '" data-member="Individual Buddy" data-values="' + data + '">' + data + '</span>';
                }
            },
            {
                targets: 8,
                className: 'team_assign',
                render: function(data, type, full, meta) {
                    // // console.log('full', full[2], full[3]);
                    if ('<?php echo Session::get('role-id')?>' == '2') {
                        if(full[8] !== null && full[9] !== null, full[10] == 0) {
                            return '<span onclick="warning()" data-userid="' + full[2] + '" data-username="' + full[3] + '" data-values="' + data + '">' + data + '</span>';
                        } else {
                            return '<span onclick="team_assign(' + full[2] + ',this)" data-userid="' + full[2] + '" data-username="' + full[3] + '" data-values="' + data + '">' + data + '</span>';
                        }
                    }
                    else {
                        return data ? data : 'Not Available';
                    }
                }
            },
            {
                targets: 9,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 10,
                render: function(data, type, full, meta) {
                    return data == 1 ? `<span class="badge mt-2 plus">Plus</span>` : `<span class="badge mt-2 premium">Premium</span>`;
                }
            },
            {
                targets: 11,
                render: function(data, type, full, meta) {
                    return parseInt(data ? data : '0') || 0;
                }
            },
            {
                targets: 12,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 13,
                render: function(data, type, full, meta) {
                    return parseInt(data ? data : 'Not Available');
                }
            },
            {
                targets: 14,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 15,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 16,
                render: function(data, type, full, meta) {
                    return data ? data : 'NA';
                }
            },
            {
                targets: 17,
                render: function(data, type, full, meta) {
                    return data ? data : 'NA';
                }
            },
            {
                targets: 18,
                render: function(data, type, full, meta) {
                    return data ? data : 'NA';
                }
            },
            {
                targets: 19,
                render: function(data, type, full, meta) {
                    return data ? data : 'NA';
                }
            },
            {
                targets: 20,
                render: function(data, type, full, meta) {
                    return data ? data : 'NA';
                }
            },
            {
                targets: 21,
                render: function(data, type, full, meta) {
                    return full[23] ? full[23] : 'NA';
                }
            },
            {
                targets: 22,
                render: function(data, type, full, meta) {
                    return full[24] ? full[24] : 'NA';
                }
            }
        ]
    });

    mes.on('buttons-action', function (e, button) {
        if (!$(".dtsp-closePanes")[0]){
            $(mes.searchBuilder.container()).append(
                $('<button style="float:right" class="dtsp-closePanes">Close</button>').click(function(){
                    mes.button().popover(false);
                })
            );
        }
    });

    var renewed_super_data = '';

    // Returns all the renewed users data
    $.ajax({
        type:'GET',
        global:true,
        async:false,
        url: 'get_renewed_member_data',
        success: function(data) {
            // console.log("Success of get_renewed_member_data");
            renewed_super_data = data;
        }
    });

    var renewed_members_data = $('#renewed_members_data').DataTable({
        scrollY: 600,
        buttons: [{
                extend: 'searchBuilder',
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                },
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ],
        language: {
            searchBuilder: {
                button: 'Filter Data',
                title: 'Filter Buddy / Individual Mebership User'
            }
        },
        searchBuilder: {
            columns: [1, 2, 3]
        },
        dom: 'Blfrtip',
        data: renewed_super_data,
        deferRender: true,
        bProcessing: true,
        bAutoWidth: true,
        responsive: true,
        scrollX: true,
        scrollCollapse: true,
        paging: true,
        fixedColumns: {
            leftColumns: 2
        },
        createdRow: function(row, data, dataIndex) {
            $(row).attr('id', data[2]);
            // // console.log('data[21]:' + data[21]);
            if (data[22])
                $(row).css('background', '#ff6e6e');
            if (data[12] == 'Yes')
                $(row).css('background', 'antiquewhite');
        },
        columnDefs: [
            {
                targets: 0,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 1,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 2,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 3,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 4,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 5,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 6,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 7,
                className: 'status_td',
                render: function(data, type, full, meta) {
                    return '<span onclick="status_update(' + full[2] + ',this)" data-userid="' + full[2] + '" data-username="' + full[3] + '" data-member="Individual Buddy" data-values="' + data + '">' + data + '</span>';
                }
            },
            {
                targets: 8,
                className: 'team_assign',
                render: function(data, type, full, meta) {
                    // // console.log('full', full[2], full[3]);
                    if ('<?php echo Session::get('role-id')?>' == '2') {
                        if(full[8] !== null && full[9] !== null, full[10] == 0) {
                            return '<span onclick="warning()" data-userid="' + full[2] + '" data-username="' + full[3] + '" data-values="' + data + '">' + data + '</span>';
                        } else {
                            return '<span onclick="team_assign(' + full[2] + ',this)" data-userid="' + full[2] + '" data-username="' + full[3] + '" data-values="' + data + '">' + data + '</span>';
                        }
                    }
                    else {
                        return data ? data : 'Not Available';
                    }
                }
            },
            {
                targets: 9,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 10,
                render: function(data, type, full, meta) {
                    return data == 1 ? `<span class="badge mt-2 plus">Plus</span>` : `<span class="badge mt-2 premium">Premium</span>`;
                }
            },{
                targets: 11,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 12,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 13,
                render: function(data, type, full, meta) {
                    // // console.log('Days left:'+data);
                    return parseInt(data ? data : '0') || 0;
                }
            },
            {
                targets: 14,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 15,
                render: function(data, type, full, meta) {
                    return parseInt(data ? data : 'Not Available');
                }
            },
            {
                targets: 16,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 17,
                render: function(data, type, full, meta) {
                    return data ? data : 'Not Available';
                }
            },
            {
                targets: 18,
                render: function(data, type, full, meta) {
                    return data ? data : 'NA';
                }
            },
            {
                targets: 19,
                render: function(data, type, full, meta) {
                    return data ? data : 'NA';
                }
            },
            {
                targets: 20,
                render: function(data, type, full, meta) {
                    return data ? data : 'NA';
                }
            },
            {
                targets: 21,
                render: function(data, type, full, meta) {
                    return data ? data : 'NA';
                }
            },
            {
                targets: 22,
                render: function(data, type, full, meta) {
                    return data ? data : 'NA';
                }
            },
            {
                targets: 23,
                render: function(data, type, full, meta) {
                    return full[25] ? full[25] : 'NA';
                }
            },
            {
                targets: 24,
                render: function(data, type, full, meta) {
                    return full[26] ? full[26] : 'NA';
                }
            }
        ]
    });

    renewed_members_data.on('buttons-action', function (e, button) {
        if (!$(".dtsp-closePanes")[0]){
            $(renewed_members_data.searchBuilder.container()).append(
                $('<button style="float:right" class="dtsp-closePanes">Close</button>').click(function(){
                    renewed_members_data.button().popover(false);
                })
            );
        }
    });


    /* var mes_live=$('#live_session_details_data').DataTable( {
        scrollY:        600,
        buttons:[
            {
                extend: 'searchBuilder'
            },
            // {
            //     extend: 'pdfHtml5',
            //     exportOptions: {
            //         columns: [1, 2, 5 ]
            //     }
            // }
        ],
        language: {
            searchBuilder: {
                button: 'Filter Data',
                title: 'Filter Live Session Mebership User'
            }
        },
        dom: 'Blfrtip',
        data:live_super_data,
        deferRender:true,
        bProcessing: true,
        bAutoWidth: false,
        responsive: true,
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        fixedColumns:   {
            leftColumns: 1
        },
        createdRow: function( row, data, dataIndex ) {
            $(row).attr('id', data[2]);
        },
        columnDefs: [

            {
            targets:   0,
            render: function(data,type,full,meta){
                var img_t='Transform.png';
                if(full[14])
                    img_t='transform_active.png';
                var first_tab=`<img class="img-responsive action_icon" src="../fitness/images/${img_t}" data-toggle="tooltip" data-placement="bottom" title="Pin for Transformation" onclick="image_trnansform(this,${full[1]},${full[14]})">`;

                return first_tab;
            }


            },
            {
            targets:   1,
            render: function(data,type,full,meta){
                    return full[0];
                }
            },
            {
            targets:   2,
            render: function(data,type,full,meta){
                    return full[1];

                }
            },
            {
            targets:   3,
            render: function(data,type,full,meta){
                    return full[2];
                }
            },
            {
            targets:   4,
            render: function(data,type,full,meta){
                    return full[3];
                }
            },
            {
            targets:   5,
            render: function(data,type,full,meta){
                    return full[4];
                }
            },
            {
            targets:   6,
            render: function(data,type,full,meta){
                    return full[5];
                }
            },
            {
            targets:   7,
            className: 'status_td',
            render: function(data,type,full,meta){
                    return '<span onclick="status_update('+full[1]+',this)" data-userid="'+full[1]+'" data-member="Live Session" data-username="'+full[3]+'" data-values="'+full[6]+'">'+full[6]+'</span>';
                }
            },
            {
            targets:   8,
            render: function(data,type,full,meta){
                // if('<?php echo Session::get('role-id')?>'=='2')
                //     return '<span onclick="team_assign('+full[2]+',this)" data-username="'+full[3]+'" data-values="'+data+'">'+data+'</span>';
                // else
                //     return data;
                // }
                return 'Live Session';
                }
            },
            {
            targets:   9,
            render: function(data,type,full,meta){
                    // return data;
                    return 'Live Session';

                }
            },
            {
            targets:   10,
            render: function(data,type,full,meta){
                    return full[9];
                }
            },
            {
            targets:   11,
            render: function(data,type,full,meta){
                    return full[10];
                }
            },
            {
            targets:   12,
            render: function(data,type,full,meta){
                    return full[11];
                }
            },
            {
            targets:   13,
            render: function(data,type,full,meta){
                    return full[12];
                }
            },
            {
            targets:   14,
            render: function(data,type,full,meta){
                    return full[13];
                }
            }

        ],
        order: [[ 10, 'desc' ]]
    } );

    console.log('transform_data',transform__data)
    mes_live.on('buttons-action', function (e, button) {
        if (!$(".dtsp-closePanes")[0]){
            $(mes_live.searchBuilder.container()).append(
                $('<button style="float:right" class="dtsp-closePanes">Close</button>').click(function(){
                    mes_live.button().popover(false);
                })
            );
        }
    }); */

    function treatAsUTC(date) {
        var result = new Date(date);
        result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
        return result;
    }

    function daysBetween(startDate, endDate) {
        var millisecondsPerDay = 24 * 60 * 60 * 1000;
        return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
    }

    $('input[type=radio][name=user_add]').change(function() {
        if (this.value == 'exsisting') {
            $('.adding_user_html').html('');
        }
        else if (this.value == 'new') {
            $('.adding_user_html').html('');
        }
    });

    // User - Admin operations commented by Furkan
    // $('#user_select').on('change',function() {

    //     console.log('Inside On change of user select dropdown.');
    //     var user_id   = $('#user_select').val();
    //     console.log('Selected user_id: ' + user_id);
    //     var user_type = document.querySelector('input[name="user_add"]:checked').value;
    //     console.log('Selected user_type: ' + user_type);
    //     if(user_id){
    //         $.ajax({
    //             type:'POST',
    //             data:{'_token': '{{ csrf_token() }}','username':user_id,'user_type':user_type},
    //             url:'get_user_data_paid_members',
    //             success:function(data){
    //                 $('.adding_user_html').html('');
    //                 if(data){
    //                     $('.adding_user_html').html(data);
    //                 }
    //             }
    //         });
    //     }
    // });

    // $('#user_select_change_start_date').on('change',function(){
    //     var user_id=$('#user_select_change_start_date').val();
    //     if(user_id){
    //         $.ajax({
    //             type:'post',
    //             data:{'_token': '{{ csrf_token() }}','username':user_id},
    //             url:'change_start_date_user',
    //             success:function(data){
    //                 console.log(data);
    //                 // $('.pause_user_html').html(data);
    //                 $('.pause_user_html_change_start').html('');
    //                 if(data){
    //                     $('.pause_user_html_change_start').html(data);
    //                 }
    //             }
    //         })
    //     }
    // });

    // $('#user_select_pause').on('change',function(){
    //     var user_id=$('#user_select_pause').val();
    //     if(user_id){
    //         $.ajax({
    //             type:'post',
    //             data:{'_token': '{{ csrf_token() }}','username':user_id},
    //             url:'live_user_data',
    //             success:function(data){
    //                 $('.pause_user_html').html('');
    //                 if(data){
    //                     $('.pause_user_html').html(data);
    //                 }
    //             }
    //         })
    //     }
    // });

    // $('#user_select_extend').on('change',function(){
    //     var user_id=$('#user_select_extend').val();
    //     if(user_id){
    //         $.ajax({
    //             type:'post',
    //             data:{'_token': '{{ csrf_token() }}','username':user_id},
    //             url:'live_user_plan_detail_paid_members',
    //             success:function(data){
    //                 $('.extend_user_html').html('');
    //                 if(data){
    //                     $('.extend_user_html').html(data);
    //                 }
    //             }
    //         });
    //     }
    // });

    function livse_session_freeze(a){
            $('#live_session_details_data').DataTable( {
            destroy:        true,
            scrollY:        600,
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            buttons:['searchBuilder'],
            dom: 'Blfrtip',
            fixedColumns:   {
                leftColumns: a
            },
            order: [[ 1, 'asc' ]]
        } );
    }
    // $('#transform_details_data').DataTable({
    //     scrollY:        600,
    //     bAutoWidth: true,
    //     responsive: true,
    //     scrollX:        true,
    //     scrollCollapse: true,
    //     paging:         true,
    //     order: [[ 1, 'asc' ]]
    // })
    $('.transform').css('display','none');
    $('.all_user').css('display','none');
    $('.live_session').css('display','none');
    $('.transform').css('display','none');
    $('#lsf').css('display','none');
    $('#ldm').css('display','none');
    $('#lsa').css('display','none');

});

function warning() {
    toastr.error("Can't change Premium Team/Coach");
}

function team_assign(id,meta){
    // console.log('team_assign');
    var id=$(meta).attr('data-userid');

    $('#s_u_t_h').html($(meta).attr('data-username')+' (User id: '+id+')');
    $('#update_team').modal({backdrop: 'static', keyboard: false})
    $('#update_team_btn').attr('data-username',id);
    $('#update_team_btn').attr('data-value',$('#update_status_select').val());

    // Get & Set the team assigned users count
    $.ajax({
        type:'GET',
        url: 'get_team_assign_count',
        success: function(data) {
            // console.log("Success of get_team_assign_count");
            $('.team_assign_count').html(data);
        }
    });

    // Get & Set the Team name & Head Coaches of the team selected
    $.ajax({
        type: 'GET',
        url: 'get_team_coach_data',
        success: function(data) {
            // console.log('Inside Success of get_team_coach');
            $('#update_team_select').html(data);

            $.ajax({
                type: 'GET',
                url: 'get_head_coach_data',
                success: function(data) {
                    // console.log('Inside Success of get_head_coach_data');
                    $('#update_head_coach_select').html(data);
                    $('#update_head_coach_select').trigger('change');
                }
            });
        }
    });

}

$('#update_team_btn').on('click',function(){
    var username=$('#update_team_btn').attr('data-username');
    var user_status=$('#update_status_select').val();
    var team=$('#update_team_select').val();
    var head_coach=$('#update_head_coach_select').val();
    // Added by Furkan
    var team_coach_data = '';
    $.ajax({
        type: 'GET',
        url:'get_team_head_coach_details',
        global:true,
        async:false,
        success: function(data) {
            team_coach_data = JSON.parse(data);
        }
    });
    var according_condition = $(team_coach_data).filter(function (i,n) {
        return n.team_name === $('#update_team_select').val();
    });
    var sub_coach = null//according_condition[0].assign_coach.replace(',').replace(head_coach);
    $.ajax({
        type:'post',
        data:{'_token': '{{ csrf_token() }}','username':username,'team':team,'head_coach':head_coach,'sub_coach':sub_coach},
        url:'user_team_assign',
        success:function(data){
            if(data){
                location.reload();
                /*
                var data_i={'team':team,'head_coach':head_coach,'sub_coach':sub_coach};
                var sub_d={}
                sub_d[`/${username}/team`]=team;
                sub_d[`/${username}/head_coach`]=head_coach;
                sub_d[`/${username}/sub_coach`]=sub_coach;

                firebase.database().ref('/livezy-admin').update(sub_d);
                reload=true;
                var count=parseInt($('.show-count').attr('data-count'))+1;
                $('.show-count').attr('data-count',count);
                $('#update_team').modal('toggle');
                toastr.success('Team updated');
                window.location.reload();
                */
            }else{
                Swal.fire({
                    title: 'Team Can not update',
                    text: `Please update same team and head coach of buddy`,
                    icon: 'warning',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok'
                    }).then((result) => {
                        // $('#update_team').modal('toggle');
                })
                return false;
            }
        }
    })
})

window.plan_update_v='';
function plan_update(p,id){

    plan_update_v=p;
    var id=$(plan_update_v).attr('data-userid');
    $('#p_u_t').html(' (User id: '+id+')');
    $('#update_plan').modal({backdrop: 'static', keyboard: false})
    $('#update_g_d').val($(p).attr('data-url'))
    $('#f_s1').attr('data-username',id)

}

$('#update_team_select').on('change',function(){
    // Added by Furkan
    var team_coach_data = '';
    $.ajax({
        type: 'GET',
        url:'get_team_head_coach_details',
        global:true,
        async:false,
        success: function(data) {
            team_coach_data = JSON.parse(data);
        }
    });
    var according_condition = $(team_coach_data).filter(function (i,n) {
        return n.team_name === $('#update_team_select').val();
    });
    var option_data = according_condition[0].assign_coach.split(',');
    $('#update_head_coach_select').html('');
    for(var i = 0; i < option_data.length; i++) {
        $('#update_head_coach_select').append('<option value="'+option_data[i]+'">'+option_data[i]+'</option>');
    }
    $('#update_head_coach_select').trigger('change');
    // End by Furkan
});

$('#f_s1').on('click',function(){
    if($('#update_g_d').val()){
        $(plan_update_v).attr('src','../fitness/images/plan_update_active.png');
        var plan_link=$('#update_g_d').val()
        var b=$('#f_s1').attr('data-username');
        $.ajax({
            type:'post',
            data:{'_token': '{{ csrf_token() }}','username':b,'plan_doc_link':plan_link},
            url:'plan_link_update',
            success:function(data){
                if(data){
                    var data_i=plan_link;
                    var sub_d={}
                    sub_d[`/${b}/plan_doc_link`]=data_i;
                    firebase.database().ref('/livezy-admin').update(sub_d);
                    transform_reload=true;
                    Swal.fire(
                    `Plan link is updated for User id ${b}, next step is to update user status to plan sent`
                    )
                }
            }
        })
        $('#update_plan').modal('toggle')
    }else{
        toastr.error('Enter google doc url');
    }
})

var transform_reload=false;
function image_trnansform(a,b,c)
{
    // // console.log(a)
    Swal.fire({
        title: 'Are you sure?',
        text: `User id ${b} will be ${c?'Unmarked':'Marked'} for transformation`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {
            // console.log($(a).attr('src','fitness/images/transform_active.png'))

            $.ajax({
                type:'post',
                data:{'_token': '{{ csrf_token() }}','username':b,'is_transform':c?0:1},
                url:'transform_update',
                success:function(data){
                    if(data){
                        var data_i=c?0:1;
                        var sub_d={}
                        sub_d[`/${b}/is_transform`]=data_i;
                        firebase.database().ref('/livezy-admin').update(sub_d);
                        transform_reload=true;
                        Swal.fire(
                            `User id ${b} will be ${c?'Unmarked':'Marked'} for transformation`
                        )
                    }
                }
            });
        }
    });
}

function status_update(id,meta){
    $('#update_status_btn').attr('disabled',false);
    var id=$(meta).attr('data-userid');
    $.ajax({
        type:'post',
        data:{'_token': '{{ csrf_token() }}','username':id},
        url:'status_check_assign',
        success:function(data){
            if(data){
                $("#update_status_select option").attr('disabled',false);
                $("#update_status_select option").attr('selected',false);
                $('#update_status_btn').attr('disabled',false);
                var opt_leng=$("#update_status_select option");
                var cond=true;
                for(var i=0; i<opt_leng.length; i++){
                    // console.log($(meta).attr('data-values'));
                    if(opt_leng[i].text == $(meta).attr('data-values')){
                        $(opt_leng[i]).attr('selected', true);
                        $('#update_status_btn').attr('data-prev',$(opt_leng[i]).val());
                        $(opt_leng[i]).attr('disabled', true);
                        cond=false;
                    }else{
                        // console.log('chandan',cond,opt_leng[i])
                        if(cond)
                            $(opt_leng[i]).attr('disabled', true);
                    }
                }
                $('#s_u_t').html($(meta).attr('data-username')+' (User id: '+id+')');
                $('#update_status').modal({backdrop: 'static', keyboard: false})
                $('#update_status_btn').attr('data-username',id);
                $('#update_status_btn').attr('data-value',$('#update_status_select').val());
                $('#update_status_btn').attr('data-member',$(meta).attr('data-member'));
                if($(meta).attr('data-values')=='Plan Start')
                    $('#update_status_btn').attr('disabled',true);
            }else{
                Swal.fire({
                title: 'Status Can not update',
                text: `Since this is buddy plan so user need to be on same status before plan start`,
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok'
                }).then((result) => {

            })
            }
        }
    })
}
function copy(element){
    var $temp = $("<input>");
    $("body").append($temp);
    // console.log($(element).data('code'))
    $('.z_link').html('');
    $('.z_link').html($(element).data('code'));
    $temp.val($(element).data('code')).select();
    document.execCommand("copy");
    $temp.remove();

    // var inp =document.createElement('input');
    // document.body.appendChild(inp)
    // inp.value =$(that).data('code')
    // inp.select();
    // document.execCommand('copy',false);
    // inp.remove();
    toastr.success('Zoom link Showed')


}
$('#update_status_btn').on('click',function(){
    $('#update_status_btn').attr('disabled',true)
    var username=$('#update_status_btn').attr('data-username');
    var prev_value=$('#update_status_btn').attr('data-prev');
    var data_member=$('#update_status_btn').attr('data-member');
    var user_status=$('#update_status_select').val();
    var condition=false;
    if(parseInt(user_status)==8 && parseInt(prev_value)!=7 && data_member!='Live Session'){
        Swal.fire({
            title: 'Status Can not update',
            text: `You have to follow order of status`,
            icon: 'warning',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
            }).then((result) => {

        })
        return false;
    }
    $.ajax({
        type:'post',
        data:{'_token': '{{ csrf_token() }}','username':username,'status':user_status},
        url:'user_status',
        success:function(data){
                if(data){
                    location.reload();
                    /*
                    var data_i=user_status;
                    var sub_d={}
                    sub_d[`/${username}/user_status`]=data_i;
                    firebase.database().ref('/livezy-admin').update(sub_d);
                    reload=true;
                    // console.log(username,user_status);
                    $('#update_status').modal('toggle');
                    if(data_member=='Live Session'){
                        location.reload();
                    }
                    */
                }else{
                    Swal.fire({
                        title: 'Status Can not update',
                        text: `Please update diet plan link`,
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok'
                        }).then((result) => {
                            $('#update_status').modal('toggle');

                    })
                    return false;
                }
            }
        })

})

$(document).ready(function(){
    var current_url=window.location.href;

    if(current_url.indexOf('?')!=-1){
        if(current_url.indexOf('#')!=-1)
            current_url=current_url.slice(0, -1);
        current_url=current_url.split("?").pop();
        $('#'+current_url).click();
    }
})

$(window).on("load", function(){
    $('.pre-loader-admin').css('display','none');
    $('.parent-admin').css('opacity','1');
    $('.parent-admin').css('transition','opacity .40s ease-in-out');
});

var role_based=parseInt('<?php echo Session::get('role-id');?>');
$('#admin_toggle').btnSwitch({
    Theme: 'Android',
    OnValue: 1,
    ToggleState:role_based==1?true:false,
    OnCallback: function(val) {
        toastr.success('Your account is going to logged in as a Coach');
        change_role(val);
    },
    OffValue: 2,
    OffCallback: function (val) {
        toastr.success('Your account is going to logged in as a Super Admin');
        change_role(val);
    }
});

function change_role(role){
    $.ajax({
        type:'post',
            data:{'_token': '{{ csrf_token() }}','role':role},
            url:'switch_admin_role',
            success:function(data){
                if(data)
                    window.location.href='/admin-dashboard/paid_members';
            }
    })
}

$('#logout').on('click',function(){
    $.ajax({
        type:'post',
        data:{'_token': '{{ csrf_token() }}'},
        url:'admin_logout',
        success:function(data){
            if(data){
                toastr.success('Log Out Successfully');
                window.location.href='/admin'
            }
        }
    })
})
</script>
</html>
