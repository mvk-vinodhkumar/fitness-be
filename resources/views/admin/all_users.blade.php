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

                        <li id="new_members" class="nav-item menu_li">
                            <a href="/admin-dashboard/new_members" class="t_d_n">
                                <span class="title menu_li_span">New Assignments</span>
                            </a>
                        </li>

                        <li id="all_user" class="nav-item menu_li active_menu">
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
                        <div class="all_user p_d">
                            <table id="all_user_data" class="stripe row-border order-column nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Start Date</th>
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Email Id</th>
                                        <th>Phone Number</th>
                                        <th>Membership</th>
                                        <th>Status</th>
                                        <th>Team</th>
                                        <th>Head Coach</th>
                                        <th>Days Left</th>
                                        <th>Pause Status</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Veg/Non-veg</th>
                                        <th>Online Coaching</th>
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
</body>

<script>

    function json2array(json){
        var result = [];
        var keys = Object.keys(json);
        keys.forEach(function(key){
            result.push(json[key]);
        });
        return result;
    }

$(document).ready(function() {

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

    var all_member_data = '';

    // Returns all the paid members data
    $.ajax({
        type:'GET',
        global:true,
        async:false,
        url: 'get_all_members_data',
        success: function(data) {
            // console.log("Success of get_all_members_data");
            all_member_data = data;
        }
    });

    var all_u_table = $('#all_user_data').DataTable({
            scrollY: 600,
            buttons: ['searchBuilder'],
            dom: 'Blfrtip',
            data: all_member_data,
            buttons: [{
                    extend: 'searchBuilder',

                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13]
                    },
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ],
            language: {
                searchBuilder: {
                    button: 'Filter Data',
                    title: 'Filter Buddy / Individual , Free or Live Mebership User'
                }
            },
            deferRender: true,
            bProcessing: true,
            bAutoWidth: true,
            responsive: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            fixedColumns: {
                //leftColumns: 1
            },
            createdRow: function(row, data, dataIndex) {
                $(row).attr('id', 'all_' + data[2]);
                if (data[6] == 'Plan Expired')
                    $(row).css('background', '#63616159');
                // console.log('testing',data)
            },
            columnDefs: [

                {
                    targets: 0,
                    render: function(data, type, full, meta) {
                        return data;


                    }
                },
                {
                    targets: 1,
                    render: function(data, type, full, meta) {

                        return data;
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, full, meta) {
                        return data;

                    }
                },
                {
                    targets: 3,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, full, meta) {
                        return data
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, full, meta) {

                        return data;
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    targets: 10,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, full, meta) {
                        return parseInt(data);
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, full, meta) {
                        var online_coaching = 'NA';
                        if (full[15] != 'Live Session' && full[6] != 'Free User') {
                            online_coaching = 'Yes';
                        } else if (full[15] == 'Live Session') {
                            online_coaching = 'No';
                        }
                        return online_coaching;
                    }
                }

            ],
            order: [
                [9, 'desc']
            ]
        });

        all_u_table.on('buttons-action', function(e, button) {
            if (!$(".dtsp-closePanes")[0]) {
                $(all_u_table.searchBuilder.container()).append(
                    $('<button style="float:right" class="dtsp-closePanes">Close</button>').click(function() {
                        all_u_table.button().popover(false);
                    })
                );
            }
        });

    function treatAsUTC(date) {
        var result = new Date(date);
        result.setMinutes(result.getMinutes() - result.getTimezoneOffset());
        return result;
    }

    function daysBetween(startDate, endDate) {
        var millisecondsPerDay = 24 * 60 * 60 * 1000;
        return (treatAsUTC(endDate) - treatAsUTC(startDate)) / millisecondsPerDay;
    }

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
    $('.transform').css('display','none');
    $('.live_session').css('display','none');
    $('.transform').css('display','none');
    $('#lsf').css('display','none');
    $('#ldm').css('display','none');
    $('#lsa').css('display','none');

});

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
