<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liv Ezy Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="fitness/images/png2.png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.3.2/css/fixedColumns.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchbuilder/1.0.1/css/searchBuilder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.0.3/css/dataTables.dateTime.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="login/css/pignose.calendar.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="fitness/css/PagingStyle.css"/> -->
    <link rel="stylesheet" href="fitness/css/jquery.btnswitch.css" type="text/css">
    <link rel="stylesheet" href="fitness/schedule/dist/css/jquery-calendar.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" integrity="sha512-jQqzj2vHVxA/yCojT8pVZjKGOe9UmoYvnOuM/2sQ110vxiajBU+4WkyRs1ODMmd4AfntwUEV4J+VfM6DkfjLRg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

    <!-- TODO: Add SDKs for Firebase products that you want to use https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-database.js"></script>
    <script src="login/js/pignose.calendar.full.min.js"></script>
    <script src="fitness/js/archive_notification.js"></script>

    <script src="fitness/js/paging.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore.js"></script>


    <script src="fitness/js/jquery.btnswitch.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/fontawesome.min.js" integrity="sha512-KCwrxBJebca0PPOaHELfqGtqkUlFUCuqCnmtydvBSTnJrBirJ55hRG5xcP4R9Rdx9Fz9IF3Yw6Rx40uhuAHR8Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/solid.min.js" integrity="sha512-Qc+cBMt/4/KXJ1F6nNQahXIsgPygHM4S2XWChoumV8qkpZ9oO+gBDBEpOxgbkQQ/6DlHx6cUxa5nBhEbuiR8xw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.js" integrity="sha512-gRg3MTbqGUwZiqkDRUj7BJOqiYX6tQDAkZVq6zCHfRUxBhoW0kRG4ASllaK31PIe+I+xdaJhLcZXbs2O2r8SRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="fitness/schedule/dist/js/jquery-calendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <style>
        .badge {
            display: inline-block;
            font-size: 1em;
            font-weight: bold;
            padding-top: 4px;
            padding-bottom: 4px;
            text-align: center;
            border-radius: 20px;
            color: white;
            margin-right: 10px;
            width: 85px; /* or adjust to desired width */
            box-sizing: border-box;
        }

        .badge.plus {
            background-color: #00d3cd;
        }

        .badge.premium {
            background-color: #1a70d1;
        }

        .p_h {
            margin-top: 10px;
            margin-bottom: 6px;
        }

        .parent-admin {
            opacity: 0;
        }

        .pre-loader-admin {
            position: absolute;
            z-index: 4;
            left: 42%;
            top: 35%;
        }

        .disabled_div {
            pointer-events: none;
            opacity: 0.4;
        }

        .navbar-inverse {
            background: #2789E3;
            color: #fff;
            border: none;
            border-radius: unset;
        }

        .login {
            width: 40px;
            height: 40px;
            position: absolute;
            background: #fff;
            color: #000;
            float: right;
            border-radius: 20px;
            left: 91%;
            margin-top: 4px;
        }

        .login_text {
            position: relative;
            line-height: 36px;
            font-size: 24px;
            text-align: center;
        }

        .p_d_n {
            padding: 0px;
            height: 100vh;
        }

        .left_panel {
            background: #FFFFFF;
            box-shadow: 4px 0px 12px rgba(97, 97, 97, 0.25);
            top: -75px;
            height: 110vh;
        }

        .right_panel {}

        .logo {
            height: 70px;
            margin: 30px;
        }

        .logo_text {
            font-size: 28px;
            font-family: sans-serif;
            margin-top: -20px;
            margin-bottom: 40px;
        }

        .p_ul {
            padding-inline-start: 0px;
        }

        .active_menu {
            background: #2789E3;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            text-align: center;
        }

        .t_d_n {
            text-decoration: none;
            color: #000;
        }

        .t_d_n:hover {
            text-decoration: none;

        }

        .menu_li {
            list-style: none;
            /* color: #000; */
            padding: 12px;
            font-size: 16px;
            text-align: center;

        }

        .menu_li_span {}

        .active_menu a {
            color: #fff;
        }

        thead tr {
            background: #2789e1;
            color: #fff;
        }

        .action_icon {
            display: inline-block;
            height: 20px;
            cursor: pointer;
            margin: 4px;
        }

        .freeze {
            width: 300px;
            margin-left: 16px;
        }

        .freez_div {
            display: flex;
            position: absolute;
            left: 30%;
            top: -4px;
            z-index: 2;
        }

        .freeze_tex {
            font-size: 14px;
            font-weight: 700;
            line-height: 32px;
        }

        div.dt-buttons {
            position: absolute;
            /* float: left; */
            left: 15%;
            top: -4px;
        }

        button.dt-button,
        div.dt-button,
        a.dt-button,
        input.dt-button {
            border: none;
            background: #2789e0;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 3px;
            color: #fff;
            font-size: 14px;
        }

        button.dt-button:hover,
        div.dt-button:hover,
        a.dt-button:hover,
        input.dt-button:hover {
            border: none !important;
            background: #fff !important;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 3px;
            color: #2789e0;
            font-size: 14px;
        }

        div.dtsb-searchBuilder button.dtsb-button {
            border: none;
            background: #2789e0;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 3px;
            color: #fff;
            font-size: 14px;
        }

        div.dtsb-searchBuilder button.dtsb-button:hover {
            border: none !important;
            background: #2789e0 !important;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 3px;
            color: #fff;
            font-size: 14px;
        }

        .dtsb-clearGroup,
        .dtsb-logic {
            background: green !important;
            color: #fff;

        }

        .first_text {
            padding-bottom: 20px;
            padding-top: 20px;
        }

        .second_text {}

        .second_text_d {
            width: 60%;
        }

        .input_style {
            background: #FFFFFF;
            box-shadow: -3px -3px 4px rgba(255, 255, 255, 0.25), 3px 3px 10px rgba(164, 164, 164, 0.25);
            border-radius: 30px;
        }

        .i_s {
            border: none;
            background: #e5e5e5;
        }

        .l_t {
            font-weight: 500;
        }

        .sbt_btn {
            background: #226AD9;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 50px;
            color: #fff;
            font-family: Overpass;
            font-style: normal;
            /* font-weight: 800;
            font-size: 30px;
            line-height: 46px; */
        }

        .doc_btn {
            width: 100px;
            /* float: right; */
            margin-left: 42%;
        }

        .t_list_text {
            margin-left: 19%;
            display: initial;
        }

        .t_l_t_c {
            margin-left: 45%;
        }

        .t_list_btn {
            float: right;
            margin-top: -30px;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 10px;
            width: 100px;
            text-align: center;
            height: 34px;
            line-height: 34px;
            background: #000;
            color: #fff;
            cursor: pointer;
        }

        .team_f {
            margin-top: 20px;
        }

        .modal_p {
            padding-left: 30px;
            padding-right: 30px;
        }

        .doc_btn_c {
            width: 100px;
        }

        #coach_select_chosen {
            width: 100% !important;
        }

        #service_hours_chosen {
            width: 100% !important;

        }

        #user_select_chosen {
            width: 100% !important;
        }

        #user_select_pause_chosen {
            width: 100% !important;
        }

        #user_select_change_start_date_chosen {
            width: 100% !important;
        }

        #user_select_extend_chosen {
            width: 100% !important;
        }

        #whatsapp_number_chosen {
            width: 100% !important;
        }

        #coach_live_chosen {
            width: 100% !important;
        }

        #coach_live_update_coach_chosen {
            width: 100% !important;
        }

        #session_live_url_chosen {
            width: 100% !important;
        }

        .chosen-container-multi .chosen-choices {
            background: #e5e5e5;
            padding: 5px;
            border-radius: 4px;
            border-color: #e5e5e5;
        }

        .chosen-container-single .chosen-single {
            background: #e5e5e5;
            padding-top: 9px;
            padding-bottom: 30px;
            border-radius: 4px;
            border-color: #e5e5e5;
        }

        .status_td:not(thead tr) {
            border: 1px solid #e5e5e5;
            background: cadetblue !important;
            cursor: pointer;
            color: #fff !important;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        }

        .team_assign {
            border: 1px solid #e5e5e5 !important;
            background: antiquewhite !important;
            cursor: pointer;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
            color: #000 !important;
        }

        .team_assign_assign {
            display: inline-flex;
            border: 1px solid #e5e5e5;
            padding: 6px;
            background: beige;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 2px;
            margin-right: 14px;
        }

        .voucher_details {
            max-height: 700px;
            overflow-y: auto;
        }

        .notification,
        .team_details,
        .coach_details,
        .voucher_details,
        .admin_analytics,
        .create_live_session,
        .operational_analytics {
            display: none;
        }

        .r_s_n {
            float: right;
            cursor: pointer;
        }

        .l_s_n {
            padding: 2px;
            /* margin-left: 20px; */
            margin-top: 2px;
            margin-bottom: 2px;
        }

        .notif_style {
            box-shadow: 4px 0px 12px rgb(97 97 97 / 25%);
            border-radius: 12px;
            cursor: pointer;
            margin-bottom: 16px;
        }

        .notif_style:hover {
            background: beige;
        }

        .header_noti {
            font-size: 18px;
            font-weight: 500;
            margin-bottom: -8px;
        }

        .out_not_box {
            padding: 10px;
        }

        /*
        .dropdown-menu {
            left:unset;
            right:0;
            z-index:9;
        }

        .dropdown, .dropup{
            position:absolute;
        }
        */
        .r_s_n_f {
            margin-bottom: 10px;
            font-size: 18px;
            letter-spacing: 1px;
            /* margin-top: -25px; */
            /* margin-right: 70px; */
            position: fixed;
            margin-left: 30px;
            margin-top: -40px;
            z-index: 2;
        }

        .create_box_live {
            box-shadow: 0px 1px 4px rgb(0 0 0 / 25%);
            border-radius: 10px;
            text-align: -webkit-center;
            margin: 36px;
            cursor: pointer;
        }

        .create_box_live_dummy {
            box-shadow: 0px 1px 4px rgb(0 0 0 / 25%);
            border-radius: 10px;
            text-align: -webkit-center;
            margin: 36px;
            cursor: pointer;
        }

        .create_box_live:hover {
            background: aliceblue;
        }

        .active_create {
            background: aliceblue;
        }

        .outside_coach {
            margin: 22px;
        }

        .select_coach_box {
            margin-top: 20px;
        }

        .hr_margin {
            margin-left: 36px;
            margin-right: 36px;
        }

        .text_sess {
            margin-bottom: -14px;
        }

        .img-create-text {
            margin-bottom: 14px;
        }

        #calender_create_live {
            text-decoration: none;
            color: #000;
        }

        .date_day {
            font-size: 40px;
            /* width: 20px; */
            position: absolute;
        }

        .date_second {
            position: relative;
            left: 50px;
            top: 9px;
        }

        /* notifucation */
        /* Page Styles */

        .container-notifications {
            position: absolute;
            top: 50%;
            left: 86%;
            margin-right: -50%;
            transform: translate(-50%, -50%);
            text-align: center;
            margin-top: 26px;
            cursor: pointer;
        }



        /* Notifications */

        .notifications {
            /* display: inline-block;
            position: relative;
            padding: 0.6em;
            background: #3498db;
            border-radius: 0.2em;
            font-size: 1.3em;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); */
        }

        .notifications::before,
        .notifications::after {
            color: #fff;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .notifications::before {
            display: block;
            content: "\f0f3";
            font-family: "FontAwesome";
            transform-origin: top center;
        }

        .notifications::after {
            font-family: Arial;
            font-size: 0.7em;
            font-weight: 700;
            position: absolute;
            top: -11px;
            right: -11px;
            padding: 2px 5px;
            line-height: 100%;
            border: 2px #fff solid;
            border-radius: 60px;
            background: #3498db;
            opacity: 0;
            content: attr(data-count);
            opacity: 0;
            transform: scale(0.5);
            transition: transform, opacity;
            transition-duration: 0.3s;
            transition-timing-function: ease-out;
        }

        .notifications.notify::before {
            animation: ring 1.5s ease;
        }

        .notifications.show-count::after {
            transform: scale(1);
            opacity: 1;
        }

        @keyframes ring {
            0% {
                transform: rotate(35deg);
            }

            12.5% {
                transform: rotate(-30deg);
            }

            25% {
                transform: rotate(25deg);
            }

            37.5% {
                transform: rotate(-20deg);
            }

            50% {
                transform: rotate(15deg);
            }

            62.5% {
                transform: rotate(-10deg);
            }

            75% {
                transform: rotate(5deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .outer_notification {
            list-style: none;
        }

        #paging {
            padding: 0 20px 20px 20px;
            font-size: 13px;
            margin-top: 24px;
            text-align: center
        }

        #paging a {
            color: #000;
            background: #e0e0e0;
            padding: 8px 12px;
            margin-right: 5px;
            text-decoration: none;
        }

        #paging a.aktif {
            background: #000 !important;
            color: #fff;
        }

        #paging a:hover {
            border: 1px solid #000;
        }
        .test {
            bor
        }

        #paging_archive {
            padding: 0 20px 20px 20px;
            font-size: 13px;
            margin-top: 24px;
            text-align: center
        }

        #paging_archive a {
            color: #000;
            background: #e0e0e0;
            padding: 8px 12px;
            margin-right: 5px;
            text-decoration: none;
        }

        #paging_archive a.aktif {
            background: #000 !important;
            color: #fff;
        }

        #paging_archive a:hover {
            border: 1px solid #000;
        }



        .hidden {
            display: none;
        }

        .time_style {
            height: 80px;
            font-size: 24px;
        }

        .date_time {
            display: inline-block;
            width: 210px;
            text-align: center;
            height: 80px;
            box-shadow: 0px 1px 4px rgb(0 0 0 / 25%);
            border-radius: 10px;
            margin-left: 20%;
            position: absolute;
        }

        .date_create {
            display: inline-block;
            width: 210px;
            text-align: center;
            height: 80px;
            box-shadow: 0px 1px 4px rgb(0 0 0 / 25%);
            border-radius: 10px;
        }

        .date_day {
            font-size: 40px;
            /* width: 20px; */
            position: absolute;
            left: 76px;
            top: 50px;
        }

        .d_l_s_p {
            padding-left: 40px;
        }

        .date_second {
            position: relative;
            left: 24px;
            top: 20px;
        }

        .outsiode_tog {
            position: absolute;
            left: 58%;
            margin-top: 13px;
            display: flex;
        }

        .tgl-sw-android-checked+.btn-switch {
            background: #fefeff;
        }

        .live_cal {
            /* overflow-y: scroll;
            max-height: 70vh;
            height: 70vh; */
        }

        span.badge.badge-default.calendar-label {
            padding: 7px;
            padding-left: 10px;
            padding-right: 10px;
        }

        .date_livecreate {
            /* margin-left: 22px; */
            margin-top: 36px;
        }

        .da_label {
            margin-bottom: 20px;
        }

        .da_label2 {
            margin-left: 22%;
        }

        #sess_link {
            width: -webkit-fill-available;
            outline: none;
            border: none;
            border-radius: 10px;
            height: 55px;
            padding: 10px;
        }

        #sess_link_custom {
            width: -webkit-fill-available;
            outline: none;
            border: none;
            border-radius: 10px;
            height: 42px;
            padding: 10px;
        }

        .new_img {
            height: 80px;
        }

        .l_c_b_s {

            color: #fff;
            background: #09C7FB;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 10px;
            font-size: 16px;
            /* padding: 6px; */
            cursor: pointer;
            /* padding-left: 10px; */
            /* padding-right: 10px; */
            width: 80px;
            height: 30px;
            line-height: 30px;
            text-align: center;
        }

        .up_li_ur {
            color: #fff;
            background: #09C7FB;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 10px;
            font-size: 16px;
            /* padding: 6px; */
            cursor: pointer;
            /* padding-left: 10px; */
            /* padding-right: 10px; */
            width: 100px;
            height: 42px;
            line-height: 42px;
            text-align: center;
            margin-top: 38px;
        }

        .m-l {
            margin-left: 26px;
        }

        #cls {
            display: none;
        }

        #avf {
            display: none;
        }

        #uls {
            display: none;
        }

        #i_o_n {
            display: none;
        }

        .all_notification {
            margin-top: 20px;
        }

        .all_notification_archive {
            margin-top: 20px;
        }

        .zoom_live_view {
            margin-bottom: 17px;
            background: #31cecd;
            font-size: 18px;
            margin-left: 13px;
            padding: 8px;
            text-align: center;
            float: right;
            box-shadow: 4px 0px 12px rgb(97 97 97 / 25%);
            border-radius: 10px;
            cursor: pointer;
        }

        .analytics_view {
            margin-bottom: 17px;
            background: #31cecd;
            font-size: 18px;
            margin-left: 13px;
            padding: 8px;
            text-align: center;
            float: right;
            box-shadow: 4px 0px 12px rgb(97 97 97 / 25%);
            border-radius: 10px;
            cursor: pointer;
        }

        .notification_view {
            margin-bottom: 17px;
            background: #31cecd;
            font-size: 18px;
            margin-left: 13px;
            padding: 8px;
            text-align: center;
            float: right;
            box-shadow: 4px 0px 12px rgb(97 97 97 / 25%);
            border-radius: 10px;
            cursor: pointer;
        }

        .session_live_view {
            margin-bottom: 17px;
            background: #31cecd;
            font-size: 18px;
            margin-left: 13px;
            padding: 8px;
            text-align: center;
            float: right;
            box-shadow: 4px 0px 12px rgb(97 97 97 / 25%);
            border-radius: 10px;
            cursor: pointer;
        }

        .member_tab_view,
        .add_member_tab_view {
            margin-bottom: 17px;
            background: #31cecd;
            font-size: 18px;
            margin-left: 13px;
            padding: 8px;
            text-align: center;
            float: right;
            box-shadow: 4px 0px 12px rgb(97 97 97 / 25%);
            border-radius: 10px;
            cursor: pointer;
        }

        .payment_reports {
            margin-bottom: 17px;
            background: #2789E3;
            font-size: 18px;
            margin-left: 13px;
            padding: 8px;
            text-align: center;
            float: right;
            box-shadow: 4px 0px 12px rgb(97 97 97 / 25%);
            border-radius: 10px;
            cursor: pointer;
        }

        .active_ls {
            background: green;
            color: #fff;
        }

        .btn_clv {
            margin-bottom: 17px;
            background: green;
            color: #fff;
            font-size: 18px;
            /* margin-left: 13px; */
            padding: 8px;
            text-align: center;
            /* float: right; */
            box-shadow: 4px 0px 12px rgb(97 97 97 / 25%);
            border-radius: 10px;
            cursor: pointer;
            /* position: absolute; */
            margin-top: 68px;
            width: 90px;
        }

        .cl_v {
            text-align: center;
            /* height: 100px; */
            box-shadow: 4px 0px 12px rgb(97 97 97 / 25%);
            border-radius: 10px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            margin-right: 40px;
        }

        .st_t_l {
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 10px;
            width: 200px;
            text-align: center;
            height: 34px;
            line-height: 34px;
            background: #2ed3d2;
            color: #000000c2;
            cursor: pointer;
            margin-left: 8%;
            margin-bottom: 20px;

        }

        .st_t_l_h {
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 10px;
            width: 200px;
            text-align: center;
            height: 34px;
            line-height: 34px;
            background: #2ed3d2;
            color: #000000c2;
            cursor: pointer;
            margin-left: 8%;
            margin-bottom: 20px;
        }

        .h_t_l {
            background: #2789e2;
            color: #fff;
        }

        .st_c_l {
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            border-radius: 10px;
            width: 200px;
            text-align: center;
            height: 34px;
            line-height: 34px;
            background: #000000c2;
            color: #2ed3d2;
            cursor: pointer;
            margin-left: 8%;
            margin-bottom: 20px;
        }

        .st_c_l_active {
            background: #000000c2;
            color: #2ed3d2;
        }

        .st_t_l:hover {
            background: #000000c2;
            color: #2ed3d2;
        }

        .calendar-event {
            margin-top: -8px;
        }

        .new_n_s {
            float: right;
            margin-top: -30px;
            font-size: 15px;
        }

        .ar_notif {
            height: 20px;
            width: 20px;
            margin-left: 20px !important;
            vertical-align: bottom;
            cursor: pointer;

        }

        .l_exp_nt {
            color: red;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            height: 100%;
            width: 100%;
            padding: 50px;
            background: #2789E3;
            overflow: auto;
            z-index: 1050;
        }

        .overlay_close {
            font-size: 26px;
            color: #000;
            position: absolute;
            top: 19px;
            z-index: 9;
            left: 65px;
            cursor: pointer;
        }

        .button {
            display: inline;
            position: absolute;
            right: 50px;
            top: 6px;
            z-index: 999;
            font-size: 30px;
        }

        .button a {
            text-decoration: none;
        }

        .btn-open:after {
            color: #333;
            content: "\f0c9";
            font-family: "FontAwesome";
            transition-property: all .2s linear 0s;
            -moz-transition: all .2s linear 0s;
            -webkit-transition: all .2s linear 0s;
            -o-transition: all .2s linear 0s;
        }

        .btn-open:hover:after {
            color: #34B484;
        }

        .btn-close:after {
            color: #fff;
            content: "\f00d";
            font-family: "FontAwesome";
            transition-property: all .2s linear 0s;
            -moz-transition: all .2s linear 0s;
            -webkit-transition: all .2s linear 0s;
            -o-transition: all .2s linear 0s;
        }

        .btn-close:hover:after {
            color: #34B484;
        }

        #header {
            display: none !important;
        }

        .center {
            margin: auto;
            width: 50%;
            /* border: 3px solid green; */
            padding: 10px;
        }

        .DTFC_LeftBodyLiner {
            padding: 0px !important;
        }

        .calendar-label {
            color: #000 !important;
        }

        .calendar .event-date,
        .calendar .event-name {
            color: #000 !important;

        }

        h4 small {
            display: none !important;
        }

        .referal_coach {
            margin-top: 10px;
            border: 1px solid #fff;
            width: fit-content;
            padding: 4px;
            border-radius: 8px;
        }

        .code {
            display: block;
            width: 100%;
            text-align: center;
            background: #333;
            padding: 10px 10px 10px 10px;
            color: #fff;
        }

        .peel-btn {
            position: absolute;
            top: 0;
            left: 0;
            width: calc(100% - 50px);
            cursor: pointer;
            background: #33b5e5;
            color: #fff;
            padding: 10px 10px 10px 10px;
            transition: all .2s linear;
        }

        .peel-btn:hover,
        .peel-btn:focus {
            background: #00a8e6;
            transition: all .2s linear;
            color: #fff;
        }

        .peel-btn:hover:after {
            border-bottom: 30px solid #2385a9;
            border-right: 30px solid transparent;
            right: -27px;
            transition: all .2s linear;
        }

        .peel-btn:hover:before {
            width: 28px;
            height: 10px;
            background: #00a8e6;
            transition: all .2s linear;
        }

        .peel-btn:before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 100%;
            width: 20px;
            height: 20px;
            background: #33b5e5;
            transition: all .2s linear;
        }

        .peel-btn:after {
            content: '';
            position: absolute;
            top: 0;
            right: -20px;
            border-bottom: 20px solid #2385a9;
            border-right: 20px solid transparent;
            transition: all .2s linear;
        }

        .coupons .coupon1 {
            margin: 35px auto;
            background: white;
            box-shadow: 0 2px 4px 2px rgba(0, 0, 0, 0.1);
            padding: 15px;
        }

        @media (min-width: 768px) {
            .coupons .coupon1 {
                width: 100%;
                max-width: 960px;
                height: 176px;
                margin: 35px auto;
            }

            .coupons .coupon1 .coupons-text {
                float: left;
                width: 50%;
            }

            .coupons .coupon1 .get-codebtn-holder {
                float: left;
                text-align: center;
                width: 30%;
            }
        }

        @media (max-width: 992px) and (min-width:750px) {
            .coupons .coupon1 {
                width: 100%;
                max-width: 960px;
                height: 176px;
                margin: 35px auto;
                float: left;
            }

            .coupons .coupon1 .coupons-text {
                float: left;
                width: 45%;
            }

            .coupons .coupon1 .get-codebtn-holder {
                float: left;
                text-align: center;
                width: 30%;
            }
        }

        @media (max-width: 749px) {
            .coupons .coupon1 .get-codebtn-holder {
                text-align: center;
                margin-top: 10px;
            }

            .cpnbtn {
                color: #ea5656;
                border-radius: 3px;
                margin: 20px auto;

            }
        }

        .coupons .coupon1 .cashback-tile {
            color: #322f2e;
            border: 1px dashed rgba(91, 87, 86, 0.6);
            display: inline-block;
            width: 140px;
            position: relative;
            margin: 20px 23px 20px 20px;
            text-align: center;
            float: left;
            border-radius: 10px;
        }

        .coupons .coupon1 .cashback-tile .tile-content {
            margin-top: 15px;
            line-height: 35px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            height: 75px;
        }

        .coupons .coupon1 .cashback-tile .tile-content .offer-big-font {
            font-size: 26px;
            white-space: nowrap;
            font-weight: 600;
            display: block;
            color: #3AAD58;
            text-overflow: ellipsis;
            overflow-x: hidden;
        }

        .coupons .coupon1 .cashback-tile .tile-content .offer-small-font {
            display: block;
            font-size: 14px;
            font-weight: bold;
            line-height: 30px;
            text-transform: uppercase;
        }

        .coupons .coupon1 .coupons-text h4 {
            color: #4480C5;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 24px;
            font-weight: 500;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        .coupons .coupon1 .coupons-text p {
            font-size: 16px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            margin: 15px 0 0 0;
            padding: 0;
        }

        @media (max-width: 450px) {
            .coupons .coupon1 .cashback-tile {
                color: #322f2e;
                border: 1px dashed rgba(91, 87, 86, 0.6);
                display: inline-block;
                width: 140px;
                position: relative;
                margin: 10px 15px 10px 0px;
                text-align: center;
                float: left;
                border-radius: 10px;
            }

            .coupons .coupon1 .cashback-tile .tile-content .offer-big-font {
                font-size: 20px;
            }

            .coupons .coupon1 .cashback-tile .tile-content .offer-small-font {
                font-size: 14px;
                line-height: 25px;
            }

            .coupons .coupon1 .coupons-text h4 {
                font-size: 20px;
            }
        }

        .cpnbtn {
            position: relative;
            width: 180px;
            height: 45px;
            padding: 0 10px 0 0;
            cursor: pointer;
            text-align: right;
            color: #ea5656;
            border-radius: 3px;
            margin-left: auto;
            margin-top: 20px;
        }

        .row.add_u_s {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .create_user {
            text-align: center;
            font-family: Open Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 1em;
            /* line-height: 8px; */
            letter-spacing: 0.01em;
            color: #FFFFFF;
            border: none;
            outline: none;
            background: #333;
            cursor: pointer;
            /* box-shadow: 2px 2px 10px rgb(94 94 94 / 25%), -2px -2px 4px rgb(255 255 255 / 25%); */
            border-radius: 30px;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
            margin-top: 12px;

        }

        .analy {
            max-height: 600px;
            overflow-y: auto;
        }

        .rwd-table {
            margin: 1em 0;
            /* min-width: 300px; */

            display: inline-flex;
            margin: 12px;

        }

        .rwd-table tr {
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        .rwd-table th {
            display: none;
        }

        .rwd-table td {
            display: block;
        }

        .rwd-table td:first-child {
            padding-top: .5em;
        }

        .rwd-table td:last-child {
            padding-bottom: .5em;
        }

        .rwd-table td:before {
            content: attr(data-th) ": ";
            font-weight: bold;
            width: 6.5em;
            display: inline-block;
        }

        @media (min-width: 480px) {
            .rwd-table td:before {
                display: none;
            }
        }

        .rwd-table th,
        .rwd-table td {
            text-align: left;
        }

        @media (min-width: 480px) {

            .rwd-table th,
            .rwd-table td {
                display: table-cell;
                padding: .25em .5em;
            }

            .rwd-table th:first-child,
            .rwd-table td:first-child {
                padding-left: 0;
            }

            .rwd-table th:last-child,
            .rwd-table td:last-child {
                padding-right: 0;
            }
        }

        .rwd-table {
            background: #34495E;
            color: #fff;
            border-radius: .4em;
            overflow: hidden;
        }

        .rwd-table tr {
            border-color: #46637f;
        }

        .rwd-table th,
        .rwd-table td {
            margin: .5em 1em;
        }

        @media (min-width: 480px) {

            .rwd-table th,
            .rwd-table td {
                padding: 1em !important;
            }
        }

        .rwd-table th,
        .rwd-table td:before {
            color: #dd5;
        }

        #select_oper_activity {
            background: #870d0d;
            color: white;
            /* height: 40px; */
            border-radius: 8px;
            border: none;
        }
    </style>

    <?php
    if (Session::get('role-id') == 1 || Session::get('team') != 'Internal') {
    ?>
        <style>
            .buttons-html5 {
                display: none !important;
            }
        </style>
    <?php
    }

    ?>
    <?php

    function link_expire_live_session($live_session_url, $session_name)
    {
        $class_add = 'disabled_div';
        if (sizeof($live_session_url) > 0) {
            for ($i = 0; $i < sizeof($live_session_url); $i++) {
                if ($live_session_url[$i]->session_name == $session_name) {
                    $user_plan_end_date = strtotime($live_session_url[$i]->created_at) + ((60 * 60 * 24) * 10);
                    $curr_date = strtotime(date('Y-m-d'));
                    $exist_diff = $user_plan_end_date - $curr_date;
                    $exist_diff = round($exist_diff / (60 * 60 * 24));
                    $class_add = '';
                    if ($exist_diff <= 0)
                        $class_add = 'disabled_div';
                    break;
                }
            }
        } else {
            $class_add = 'disabled_div';
        }
        echo $class_add;
    }
    function link_expire_live_session_msg($live_session_url, $session_name)
    {
        $link_msg = 'Link Expired';
        if (sizeof($live_session_url) > 0) {
            for ($i = 0; $i < sizeof($live_session_url); $i++) {
                if ($live_session_url[$i]->session_name == $session_name) {
                    $user_plan_end_date = strtotime($live_session_url[$i]->created_at) + ((60 * 60 * 24) * 10);;
                    $curr_date = strtotime(date('Y-m-d'));
                    $exist_diff = $user_plan_end_date - $curr_date;
                    $exist_diff = round($exist_diff / (60 * 60 * 24)) - 1;
                    $link_msg = 'Link Expired in ' . $exist_diff . ' days';
                    if ($exist_diff <= 0)
                        $link_msg = 'Link Expired';

                    break;
                }
            }
        }
        echo $link_msg;
    }
    function link_expire_live_session_url($live_session_url, $session_name)
    {
        $live_url = '';
        if (sizeof($live_session_url) > 0) {
            for ($i = 0; $i < sizeof($live_session_url); $i++) {
                if ($live_session_url[$i]->session_name == $session_name) {
                    $live_url = $live_session_url[$i]->live_session_url;
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
    <!-- <div class="pre-loader-admin">
        <img class="img-responsive" src="fitness/images/logo_gif.gif">
    </div> -->
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
                                    Your Voucher Code : <b>{{$coach_voucher}}</b>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <?php if (Session::get('toggle_btn')) { ?>
                                    <div class="outsiode_tog">Admin&nbsp;&nbsp;&nbsp;<div id="admin_toggle"></div>&nbsp;&nbsp;&nbsp;Coach</div>
                                <?php
                                }
                                ?>
                                <div class="container-notifications">
                                    <div class="notifications show-count" data-count="{{sizeof($notification)}}"></div>

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
                        <img class="img-responsive logo" src="fitness/images/png2.png" />
                        <div class="logo_text">Liv Ezy</div>
                        <hr>
                        <br>
                    </center>
                    <ul class="p_ul">
                        <?php if (Session::get('role-id') == 3) { ?>
                            <li id="create_live_session" class="nav-item menu_li">
                                <a href="#" class="t_d_n">
                                    <span class="title menu_li_span">Zoom Live Session</span>
                                </a>
                            </li>
                            <li id="notification" class="nav-item menu_li">
                                <a href="#" class="t_d_n">
                                    <span class="title menu_li_span">Notifications</span>
                                </a>
                            </li>
                            <li id="logout" class="nav-item menu_li">
                                <a href="#" class="t_d_n">
                                    <span class="title menu_li_span">Logout</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li id="paid_members" class="nav-item menu_li">
                                <a href="admin-dashboard/paid_members" class="t_d_n">
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
                                <a href="#" class="t_d_n">
                                    <span class="title menu_li_span">All User</span>
                                </a>
                            </li>
                            @endif
                            <li id="live_session" class="nav-item menu_li">
                                <a href="#" class="t_d_n">
                                    <span class="title menu_li_span">Live Session</span>
                                </a>
                            </li>
                            <li id="create_live_session" class="nav-item menu_li">
                                <a href="#" class="t_d_n">
                                    <span class="title menu_li_span">Zoom Live Session</span>
                                </a>
                            </li>
                            <li id="notification" class="nav-item menu_li">
                                <a href="#" class="t_d_n">
                                    <span class="title menu_li_span">Notifications</span>
                                </a>
                            </li>
                            <li id="transform" class="nav-item menu_li">
                                <a href="#" class="t_d_n">
                                    <span class="title menu_li_span">Transform</span>
                                </a>
                            </li>
                            <?php if (Session::get('role-id') == 2 && Session::get('team') == 'Internal') { ?>
                                <li id="admin_analytics" class="nav-item menu_li">
                                    <a href="#" class="t_d_n">
                                        <span class="title menu_li_span">Analytics</span>
                                    </a>
                                </li>
                                <li style="display:none" id="operational_analytics" class="nav-item menu_li">
                                    <a href="#" class="t_d_n">
                                        <span class="title menu_li_span">Operational Activity</span>
                                    </a>
                                </li>
                                <li id="team_details" class="nav-item menu_li">
                                    <a href="#" class="t_d_n">
                                        <span class="title menu_li_span">Team Details</span>
                                    </a>
                                </li>
                                <li id="voucher_details" class="nav-item menu_li">
                                    <a href="#" class="t_d_n">
                                        <span class="title menu_li_span">Voucher Details</span>
                                    </a>
                                </li>
                                <li id="coach_details" class="nav-item menu_li">
                                    <a href="#" class="t_d_n">
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

                            <div class="col-md-2  member_tab_view active_ls" data-value="pmd">Member Details</div>

                            <div class="col-md-2 member_tab_view" data-value="ldm">Renewal Details</div>

                            <?php if (Session::get('role-id') == 2 && Session::get('team') == 'Internal') { ?>
                                <div class="col-md-2 payment_reports" data-value="ldm">
                                    <span style="color:white;">Payments Report</span>
                                </div>

                                <div class="col-md-3">
                                    <select id="select_oper_activity" class="form-control">
                                        <option selected="true" value="default" disabled="disabled">Choose User Operation</option>
                                        <option value="add_user">Add / Deactivate User</option>
                                        <option value="membership_extension">Membership Extend</option>
                                        <option value="admin_pause">Pause Membership</option>admin_dashboard
                                        <option value="change_start_date">Change Start Date</option>

                                    </select>
                                </div>
                                <!-- <div class="col-md-2 add_member_tab_view" data-toggle="modal" data-target="#admin_pause" data-value="admp">Pause Membership</div>
                                <div class="col-md-2 add_member_tab_view" data-toggle="modal" data-target="#membership_extension" data-value="admp">Membership Extend</div>
                                <div class="col-md-3 add_member_tab_view" data-toggle="modal" data-target="#add_user" data-value="adm">Add / Deactivate User</div> -->
                                <!-- <div class="col-md-2 add_member_tab_view" data-toggle="modal" data-target="#membership_extension" data-value="admp">Change Start Date</div> -->


                            <?php } ?>

                        </div>
                        <div class="col-md-12 neds live_cal" id="pmd">
                            <div class="freez_div">
                                <div class="freeze_tex">Column Freeze Upto</div>
                                <select class="form-control freeze" id="freeze">
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
                            <table id="member_details_data" class="stripe row-border order-column nowrap" style="width:100%">
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
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 neds live_cal" id="ldm">
                            <table id="renewal_data" class="stripe row-border order-column nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Current Plan</th>
                                        <th>Previous Plan</th>
                                        <th>Previous Team</th>
                                        <th>Previous Head Coach</th>
                                        <th>Previous Plan Start Date</th>
                                        <!-- <th>Current Plan Start Date</th> -->
                                        <th>Renewal Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (sizeof($renewal_data) > 0) {
                                        for ($f = 0; $f < sizeof($renewal_data); $f++) {
                                    ?>
                                            <tr>
                                                <td>
                                                    {{$renewal_data[$f]->username}}
                                                </td>
                                                <td>
                                                    {{$renewal_data[$f]->current_plan}}
                                                </td>
                                                <td>
                                                    {{$renewal_data[$f]->previous_plan}}
                                                </td>
                                                <td>
                                                    {{$renewal_data[$f]->previous_team}}
                                                </td>
                                                <td>
                                                    {{$renewal_data[$f]->previous_head_coach}}
                                                </td>
                                                <td>
                                                    {{$renewal_data[$f]->previous_plan_start_date}}
                                                </td>
                                                <!-- <td>
                                                        {{$renewal_data[$f]->	cureent_plan_start_date}}
                                                    </td> -->
                                                <td>
                                                    {{$renewal_data[$f]->created_at}}
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
                    <div class="transform p_d">
                        <table id="transform_details_data" class="stripe row-border order-column nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Days Left</th>
                                    <th>User Id</th>
                                    <th>Name</th>
                                    <th>Email Id</th>
                                    <th>Team</th>
                                    <th>Coach</th>
                                    <th>Phone Number</th>
                                    <th>Gender</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <div class="live_session p_d">
                        <div class="col-md-12">
                            <div class="col-md-3  session_live_view active_ls" data-value="lsm">Live Session Member</div>
                            <div class="col-md-3 session_live_view" data-value="lsa">Live Session Analytics</div>

                            <?php if (Session::get('role-id') == 2 || Session::get('team') == 'Internal') { ?>
                                <div class="col-md-3 session_live_view" data-value="lsf">Live Session Feedback</div>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-12 neds live_cal" id="lsm">
                            <div class="freez_div">
                                <div class="freeze_tex">Coloumn Freeze Upto</div>
                                <select class="form-control freeze" id="lives_session_freeze">
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
                            <table id="live_session_details_data" class="stripe row-border order-column nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>&nbsp;&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                        <th>Time Stamp</th>
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
                                        <!-- <th>Plan Start Date</th> -->
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 neds live_cal" id="lsf">
                            <table id="feedback_liv" class="stripe row-border order-column nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Session</th>
                                        <th>Coach id</th>
                                        <th>Coach Name</th>
                                        <th>Session Date</th>
                                        <th>Session Time</th>
                                        <th>Star</th>
                                        <th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (sizeof($live_sess_feedback) > 0) {
                                        for ($f = 0; $f < sizeof($live_sess_feedback); $f++) {
                                    ?>
                                            <tr>
                                                <td>
                                                    {{$live_sess_feedback[$f]->username}}
                                                </td>
                                                <td>
                                                    {{$live_sess_feedback[$f]->session_name}}
                                                </td>
                                                <td>
                                                    {{$live_sess_feedback[$f]->coach_id}}
                                                </td>
                                                <td>
                                                    {{$live_sess_feedback[$f]->coach_name}}
                                                </td>
                                                <td>
                                                    {{$live_sess_feedback[$f]->start_date}}
                                                </td>
                                                <td>
                                                    {{$live_sess_feedback[$f]->start_time}}
                                                </td>
                                                <td>
                                                    {{$live_sess_feedback[$f]->star}}
                                                </td>
                                                <td>
                                                    {{$live_sess_feedback[$f]->comment}}
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 neds live_cal" id="lsa">
                            <?php
                            $total_liv_user = $live_sess_analytics ? sizeof($live_sess_analytics['total_user']) : 0;
                            // echo $total_liv_user;
                            // echo '<pre>';
                            // print_r($live_sess_analytics);
                            ?>
                            <div class="analy">
                                <div class="top_analy">
                                    From: <input type="date" class="analytics_liv" id="from_liv_ana">
                                    To: <input type="date" class="analytics_liv" id="to_liv_ana">

                                </div>
                                <br>
                                <!-- <div class="row">
                                        <div class="col-md-4">
                                            <b>Live Session Overall Rating</b>
                                        </div>
                                        <div class="col-md-2">
                                            <b>Actual</b>
                                        </div>
                                        <div class="col-md-2">
                                            <b>Overall</b>
                                        </div>
                                    </div> -->
                                <div class="over_orga">
                                    <p style="color:red">*Below Stats is from today to past 30 days</p>

                                </div>
                                <!--
                                    <div class="over_orga1">

                                    </div>

                                    <div class="over_orga2">

                                    </div> -->
                            </div>

                        </div>
                    </div>
                    <div class="create_live_session p_d">
                        <div class="col-md-12">
                            <?php if (Session::get('role-id') == 2 && Session::get('team') == 'Internal') { ?>
                                <div class="col-md-2  zoom_live_view active_ls" data-value="vls">View Live Session</div>

                                <div class="col-md-2 zoom_live_view" data-value="cls">Create Live Session</div>
                                <div class="col-md-3 zoom_live_view" data-value="uls">Update Live Session Link</div>

                            <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-12 ned live_cal" id="vls">
                            <div id="calendar"></div>
                        </div>
                        <div class="col-md-12 ned live_cal" id="cls">
                            <!-- <hr class="hr_margin"> -->
                            <div class="hr_margin text_sess">Session</div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-2 create_box_live <?php link_expire_live_session($live_session_url, 'SNC') ?>" data-url="<?php link_expire_live_session_url($live_session_url, 'SNC') ?>" data-value="SNC">
                                        <div class="img-create">
                                            <img src="fitness/images/SNC.png" class="img-responsive new_img" />
                                        </div>

                                        <div class="img-create-text">
                                            SNC
                                            <p class="l_exp_nt"><?php link_expire_live_session_msg($live_session_url, 'SNC') ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-2 create_box_live <?php link_expire_live_session($live_session_url, 'HIIT') ?>" data-url="<?php link_expire_live_session_url($live_session_url, 'HIIT') ?>" data-value="HIIT">
                                        <div class="img-create">
                                            <img src="fitness/images/HIIT.png" class="img-responsive new_img" />
                                        </div>

                                        <div class="img-create-text">
                                            HIIT
                                            <p class="l_exp_nt"><?php link_expire_live_session_msg($live_session_url, 'HIIT') ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-2 create_box_live <?php link_expire_live_session($live_session_url, 'Yoga') ?>" data-url="<?php link_expire_live_session_url($live_session_url, 'Yoga') ?>" data-value="Yoga">
                                        <div class="img-create">
                                            <img src="fitness/images/Yoga.png" class="img-responsive new_img" />
                                        </div>


                                        <div class="img-create-text">
                                            Yoga
                                            <p class="l_exp_nt"><?php link_expire_live_session_msg($live_session_url, 'Yoga') ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-2 create_box_live <?php link_expire_live_session($live_session_url, 'Dance') ?>" data-url="<?php link_expire_live_session_url($live_session_url, 'Dance') ?>" data-value="Dance">
                                        <div class="img-create">
                                            <img src="fitness/images/Dance.png" class="img-responsive new_img" />
                                        </div>


                                        <div class="img-create-text">
                                            Dance
                                            <p class="l_exp_nt"><?php link_expire_live_session_msg($live_session_url, 'Dance') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3 outside_coach">
                                        <div class="assign_coach_create">
                                            Coach Name
                                        </div>
                                        <div class="select_coach_box">
                                            <div class="input_style">
                                                <select id="coach_live" data-placeholder="Select Coach" class="form-control i_s c_t_i chosen-select">
                                                    <option value=""></option>
                                                    <?php
                                                    for ($i = 0; $i < sizeof($coach); $i++) {
                                                        echo '<option value="' . $coach[$i]->id . '"> ' . $coach[$i]->first_name . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12 date_livecreate">
                                    <div class="col-md-4 d_l_s_p">
                                        <div class="da_label">Date</div>
                                        <div class="date_create">
                                            <div><a href="#" id="calender_create_live" class="btn-calendar">
                                                    <div class="date_day">7 </div>
                                                    <div class="date_second">
                                                        <div class="date_month_year">May 2021</div>
                                                        <div class="date_d">Wednesday</div>
                                                    </div>
                                                </a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="da_label da_label2">Time</div>
                                        <div class="date_time">
                                            <input id="cr_t" type="time" class="form-control time_style">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="da_label da_label2">Total Seat</div>
                                        <div class="date_time">
                                            <input id="cr_t_seat" value="25" min="1" max="30" type="number" class="form-control time_style">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6 outside_coach">
                                            <div class="assign_coach_create">
                                                Live Session Link
                                            </div>
                                            <div class="select_coach_box">
                                                <div class="input_style" >
                                                    <input id="sess_link" type="text" class="form-contorl">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-1 outside_coach">
                                        <div class="assign_coach_create" style="margin-top:20px;">
                                            <div id="c_l_s" class="l_c_b_s">Create</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ned live_cal" id="uls">
                            <div class="hr_margin text_sess">Session Link Update</div>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="col-md-2 create_box_live_dummy <?php link_expire_live_session($live_session_url, 'SNC') ?>" data-url="<?php link_expire_live_session_url($live_session_url, 'SNC') ?>" data-value="SNC">
                                        <div class="img-create">
                                            <img src="fitness/images/SNC.png" class="img-responsive new_img" />
                                        </div>

                                        <div class="img-create-text">
                                            SNC
                                            <p class="l_exp_nt"><?php link_expire_live_session_msg($live_session_url, 'SNC') ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-2 create_box_live_dummy <?php link_expire_live_session($live_session_url, 'HIIT') ?>" data-url="<?php link_expire_live_session_url($live_session_url, 'HIIT') ?>" data-value="HIIT">
                                        <div class="img-create">
                                            <img src="fitness/images/HIIT.png" class="img-responsive new_img" />
                                        </div>

                                        <div class="img-create-text">
                                            HIIT
                                            <p class="l_exp_nt"><?php link_expire_live_session_msg($live_session_url, 'HIIT') ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-2 create_box_live_dummy <?php link_expire_live_session($live_session_url, 'Yoga') ?>" data-url="<?php link_expire_live_session_url($live_session_url, 'Yoga') ?>" data-value="Yoga">
                                        <div class="img-create">
                                            <img src="fitness/images/Yoga.png" class="img-responsive new_img" />
                                        </div>


                                        <div class="img-create-text">
                                            Yoga
                                            <p class="l_exp_nt"><?php link_expire_live_session_msg($live_session_url, 'Yoga') ?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-2 create_box_live_dummy <?php link_expire_live_session($live_session_url, 'Dance') ?>" data-url="<?php link_expire_live_session_url($live_session_url, 'Dance') ?>" data-value="Dance">
                                        <div class="img-create">
                                            <img src="fitness/images/Dance.png" class="img-responsive new_img" />
                                        </div>


                                        <div class="img-create-text">
                                            Dance
                                            <p class="l_exp_nt"><?php link_expire_live_session_msg($live_session_url, 'Dance') ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3 m-l">
                                        <div class="assign_coach_create">
                                            Session Url Update
                                        </div>
                                        <div class="select_coach_box">
                                            <div class="input_style">
                                                <select id="session_live_url" data-placeholder="Select Session" class="form-control i_s c_t_i chosen-select">
                                                    <option value=""></option>
                                                    <option value="SNC">SNC</option>
                                                    <option value="HIIT">HIIT</option>
                                                    <option value="Yoga">Yoga</option>
                                                    <option value="Dance">Dance</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                        <div class="assign_coach_create">
                                            Live Session Link
                                        </div>
                                        <div class="select_coach_box">
                                            <div class="input_style">
                                                <input id="sess_link_custom" type="text" class="form-contorl">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="assign_coach_create up_li_ur">
                                            Update
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="notification p_d">
                        <div class="col-md-12">
                            <div class="col-md-3 notification_view" data-id="0" data-value="i_o_n">Archived Notification</div>
                            <div class="col-md-3  notification_view active_ls" data-id="1" data-value="i_c_n">Important Notification</div>
                        </div>

                        <div class="col-md-12 neds_n live_cal" id="i_c_n">

                            <div class="col-md-12">
                                <div class="r_s_n r_s_n_f">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" type="button" data-toggle="dropdown">Filter
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i></span>
                                        <ul class="dropdown-menu">
                                            <li class="notif_filter" data-value=" "><a href="#">All</a></li>
                                            <?php if (Session::get('role-id') == 2 && Session::get('team') == 'Internal') { ?>
                                                <li class="notif_filter" data-value="Sign Up"><a href="#">Activity</a></li>
                                            <?php } ?>
                                            <li class="notif_filter" data-value="Pause"><a href="#">Pause</a></li>
                                            <li class="notif_filter" data-value="Renewal"><a href="#">Renewal</a></li>
                                            <!-- <li class="notif_filter" data-value="2"><a href="#">Archive</a></li> -->
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <ul class="all_notification" id="listPage">
                                <?php
                                if (sizeof($notification) != 0) {
                                    for ($i = 0; $i < sizeof($notification); $i++) {
                                ?>
                                        <li class="outer_notification" id="notif_{{$notification[$i]->id}}" data-id="{{$notification[$i]->id}}">
                                            <div class="col-md-12 notif_style">

                                                <div class="out_not_box">
                                                    <div class="l_s_n header_noti">
                                                        <span>{{$notification[$i]->notification_type}}</span>
                                                    </div>
                                                    <div class="l_s_n header_noti new_n_s">
                                                        <span>Marked as Done<input type="checkbox" onclick="ar_notif('{{$notification[$i]->id}}',this)" name="notify" data-li="{{$notification[$i]->id}}" class="ar_notif"></span>
                                                    </div>
                                                    <hr>
                                                    <div class="r_s_n">
                                                        {{$notification[$i]->created_at}}
                                                    </div>
                                                    <div class="l_s_n">
                                                        <span>Head Coach : {{$notification[$i]->head_coach}}</span>
                                                    </div>
                                                    <div class="l_s_n">
                                                        <span>User Id : {{$notification[$i]->username}}</span>
                                                    </div>


                                                    <div class="l_s_n">
                                                        Name : {{$notification[$i]->name}}
                                                    </div>
                                                    <div class="l_s_n">
                                                        {{$notification[$i]->mob_no}}
                                                    </div>
                                                    <div class="l_s_n">
                                                        <?php echo $notification[$i]->description; ?>
                                                    </div>
                                                </div>


                                            </div>
                                        </li>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <p style="color:red;">No Notification</p><img class="img-responsive center" src="fitness/images/error.png">
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                        <div class="col-md-12 neds_n live_cal" id="i_o_n">

                            <div class="col-md-12">
                                <div class="r_s_n r_s_n_f">
                                    <div class="dropdown">
                                        <span class="dropdown-toggle" type="button" data-toggle="dropdown">Filter
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i></span>
                                        <ul class="dropdown-menu">
                                            <li class="notif_filter" data-value=" "><a href="#">All</a></li>
                                            <?php if (Session::get('role-id') == 2 && Session::get('team') == 'Internal') { ?>
                                                <li class="notif_filter" data-value="Sign Up"><a href="#">Activity</a></li>
                                            <?php } ?>
                                            <li class="notif_filter" data-value="Pause"><a href="#">Pause</a></li>
                                            <li class="notif_filter" data-value="Renewal"><a href="#">Renewal</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="all_notification_archive" id="listPage_archive">
                                <?php
                                for ($i = 0; $i < sizeof($notification_archive); $i++) {
                                ?>
                                    <li class="outer_notification" id="notif_archive_{{$notification_archive[$i]->id}}" data-id="{{$notification_archive[$i]->id}}">
                                        <div class="col-md-12 notif_style">

                                            <div class="out_not_box">
                                                <div class="l_s_n header_noti">
                                                    <span>{{$notification_archive[$i]->notification_type}}</span>
                                                </div>

                                                <hr>
                                                <div class="r_s_n">
                                                    {{$notification_archive[$i]->created_at}}
                                                </div>
                                                <div class="l_s_n">
                                                    <span>User Id : {{$notification_archive[$i]->head_coach}}</span>
                                                </div>
                                                <div class="l_s_n">
                                                    <span>User Id : {{$notification_archive[$i]->username}}</span>
                                                </div>

                                                <div class="l_s_n">
                                                    Name : {{$notification_archive[$i]->name}}
                                                </div>
                                                <div class="l_s_n">
                                                    {{$notification_archive[$i]->mob_no}}
                                                </div>
                                                <div class="l_s_n">
                                                    <?php echo $notification_archive[$i]->description; ?>
                                                </div>
                                                <div class="r_s_n" style="margin-bottom:14px;">
                                                    Updated at <b>{{$notification_archive[$i]->updated_at}}</b> Updated By <b>{{$notification_archive[$i]->first_name}}</b>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                    <div class="operational_analytics p_d">
                        <?php if (Session::get('role-id') == 2 && Session::get('team') == 'Internal') { ?>
                            <div class="col-md-2 add_member_tab_view" data-toggle="modal" data-target="#add_user" data-value="adm">Add / Deactivate User</div>
                            <div class="col-md-2 add_member_tab_view" data-toggle="modal" data-target="#admin_pause" data-value="admp">Pause Membership</div>
                            <div class="col-md-2 add_member_tab_view" data-toggle="modal" data-target="#membership_extension" data-value="admp">Membership Extend</div>
                        <?php } ?>
                    </div>
                    <div class="admin_analytics p_d">
                        <div class="col-md-12">
                            <?php if (Session::get('role-id') == 2 && Session::get('team') == 'Internal') { ?>
                                <div class="col-md-2  analytics_view active_ls" data-value="avo">Operational</div>
                                <div class="col-md-2 analytics_view" data-value="avf">Fianacial</div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 neda live_cal" id="avo">
                            <div class="analy">
                                <div class="top_analy">
                                    From: <input type="date" class="analytics_liv_ret" id="from_liv_avo">
                                    To: <input type="date" class="analytics_liv_ret" id="to_liv_avo">
                                </div>
                                <br>

                                <div class="over_orga_operational">
                                    <p style="color:red">*Below Stats is from today to past 30 days</p>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 neda live_cal" id="avf">
                            <div class="analy">
                                <div class="top_analy">
                                    From: <input type="date" class="finance_liv_ret" id="from_liv_fvo">
                                    To: <input type="date" class="finance_liv_ret" id="to_liv_fvo">
                                </div>
                                <br>

                                <div class="over_orga_finance">
                                    <p style="color:red">*Below Stats is from today to past 30 days</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="team_details p_d">
                        <div class="col-md-12 team_f">
                            <!-- <div class="t_list_text">Team List</div>
                                <div class="t_list_text t_l_t_c">Coach List</div> -->

                            <div class="t_list_btn" onclick="create_team()">Create Team</div>
                            <hr>
                        </div>
                        <div class="row">
                            <div class="col-md-12 team_list">
                                <div class="col-md-3">
                                    <div class="st_t_l_h h_t_l">
                                        Team List
                                    </div>
                                    <div class="team_list_div">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="st_t_l_h h_t_l">
                                        Coach List
                                    </div>
                                    <div class="coach_list_div">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="st_t_l_h h_t_l">
                                        Service Time
                                    </div>
                                    <div class="s_t_c">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="st_t_l_h h_t_l">
                                        Service Whatsapp Number
                                    </div>
                                    <div class="s_w_n">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="voucher_details p_d">

                        <section class="content-block coupons" style="background: #e8f5fa;">
                            <div class="container">
                                <!-- <div class="section-title">
                                        <h1>Web Hosting Coupons & Deals</h1>
                                    </div> -->
                                <?php
                                if (sizeof($voucher_code) != 0) {
                                    for ($v = 0; $v < sizeof($voucher_code); $v++) {
                                ?>
                                    <div class="coupon1">
                                        <div class="cashback-tile">
                                            <div class="tile-content"><span class="offer-big-font" title="">{{$voucher_code[$v]->code}}</span><span class="offer-small-font"> Coach</span></div>
                                        </div>
                                        <div class="coupons-text">
                                            <h4>{{$voucher_code[$v]->member_type}}
                                            </h4>
                                            <p>
                                                {{$voucher_code[$v]->first_name}}
                                            </p>
                                            <p>Validity : {{$voucher_code[$v]->start_date}} To {{$voucher_code[$v]->end_date}}</p>
                                        </div>
                                        <div class="get-codebtn-holder">
                                            <div class="offer-get-code-link cpnbtn">
                                                <span class="code coupon-code" onclick="deactivate_voucher({{$voucher_code[$v]->id}})">Deactivate</span>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                    }
                                }
                                ?>

                            </div>
                        </section>
                    </div>
                    <div class="coach_details p_d" style="height: 625px !important;overflow-y: scroll;padding-top: 10px;">
                        <div class="col-md-12 team_f">
                            <div class="t_list_btn" id="add-coach">Add Coach</div><br>
                        </div>
                        <table id="coach_details_data" class="stripe row-border order-column nowrap dataTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Coach Tier</th>
                                    <th>Slots</th>
                                    <th>Order</th>
                                    <th>Clients</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (sizeof($coach_data) > 0) {
                                    // echo '<pre>'; print_r($coach_data);
                                    $counter = 1;
                                    for ($g = 0; $g < sizeof($coach_data); $g++) {
                                ?>
                                <tr>
                                    <td>{{$counter++}}</td>
                                    <td>{{$coach_data[$g]->first_name}} {{$coach_data[$g]->last_name}}</td>
                                    <td>{{$coach_data[$g]->email_id}}</td>
                                    <td>{{$coach_data[$g]->mob_number}}</td>
                                    <td>{{ucfirst($coach_data[$g]->coach_tier)}}</td>
                                    <td>{{$coach_data[$g]->slots}}</td>
                                    <td>{{$coach_data[$g]->display_order}}</td>
                                    <td>{{$coach_data[$g]->clients_trained}}</td>
                                    <td>
                                        <a href="javascript:void(0);" onclick="view_coach_details({{$coach_data[$g]->id}})" data-toggle="tooltip" data-placement="bottom" title="View Details">
                                            <img class="img-responsive action_icon" src="fitness/images/questionnaire.png">
                                        </a>
                                        <a href="javascript:void(0);" onclick="edit_coach_details({{$coach_data[$g]->id}})" data-toggle="tooltip" data-placement="bottom" title="Edit Details">
                                            <img class="img-responsive action_icon" src="fitness/images/edit-icon.png">
                                        </a>
                                        <a href="javascript:void(0);" onclick="add_transformation_data({{$coach_data[$g]->id}},'{{$coach_data[$g]->first_name}} {{$coach_data[$g]->last_name}}')" data-toggle="tooltip" data-placement="bottom" title="Add transformation images">
                                            <img class="img-responsive action_icon" src="fitness/images/transformation.png">
                                        </a>
                                        <a href="javascript:void(0);" onclick="add_certification_data({{$coach_data[$g]->id}},'{{$coach_data[$g]->first_name}} {{$coach_data[$g]->last_name}}')" data-toggle="tooltip" data-placement="bottom" title="Add certificate images">
                                            <img class="img-responsive action_icon" src="fitness/images/certification.png">
                                        </a>
                                        @if($coach_data[$g]->is_disabled == 1)
                                        <a href="javascript:void(0);" onclick="change_coach_status({{$coach_data[$g]->id}},0)" data-toggle="tooltip" data-placement="bottom" title="Disable this Coach">
                                            <img class="img-responsive action_icon" src="fitness/images/coach-active.png" />
                                        </a>
                                        @else
                                        <a href="javascript:void(0);" onclick="change_coach_status({{$coach_data[$g]->id}},1)" data-toggle="tooltip" data-placement="bottom" title="Enable this Coach">
                                            <img class="img-responsive action_icon" src="fitness/images/coach-inactive.png" />
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="membership_extension" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Extend Membership</span></h4>
                </div>
                <div class="modal-body">
                    <div class="row existing">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-12">

                            <select id="user_select_extend" data-placeholder="Select Username" class="form-control i_s c_t_i chosen-select">
                                <option value=""></option>
                                <?php

                                for ($i = 0; $i < sizeof($all_member_data); $i++) {
                                    if ($all_member_data[$i][9] > 0)
                                        echo '<option value="' . $all_member_data[$i][1] . '"> ' . $all_member_data[$i][1] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="col-md-1"></div> -->

                    </div>
                    <div class="extend_user_html">


                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="change_start_date" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Plan Start Date Change</span></h4>
                </div>
                <div class="modal-body">
                    <div class="row existing">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-12">

                            <select id="user_select_change_start_date" data-placeholder="Select Username" class="form-control i_s c_t_i chosen-select">
                                <option value=""></option>
                                <?php

                                if (sizeof($future_date) != 0) {
                                    for ($i = 0; $i < sizeof($future_date); $i++) {
                                        echo '<option value="' . $future_date[$i]->username . '"> ' . $future_date[$i]->username . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="col-md-1"></div> -->

                    </div>
                    <div class="pause_user_html">


                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="admin_pause" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pause Create/Extension</span></h4>
                </div>
                <div class="modal-body">
                    <div class="row existing">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-12">

                            <select id="user_select_pause" data-placeholder="Select Username" class="form-control i_s c_t_i chosen-select">
                                <option value=""></option>
                                <?php

                                for ($i = 0; $i < sizeof($all_member_data); $i++) {
                                    if ($all_member_data[$i][9] > 0)
                                        echo '<option value="' . $all_member_data[$i][1] . '"> ' . $all_member_data[$i][1] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="col-md-1"></div> -->

                    </div>
                    <div class="pause_user_html">


                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="add_user" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Adding User as a Paid Member</span></h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-6">
                            <input type="radio" name="user_add" value="existing" class="add_main"> Existing User
                        </div>
                        <div class="col-md-6">
                            <input type="radio" name="user_add" value="new" class="add_main"> New User
                        </div>
                    </div>
                    <div class="row existing">
                        <!-- <div class="col-md-1"></div> -->
                        <div class="col-md-12">

                            <select id="user_select" data-placeholder="Select Username" class="form-control i_s c_t_i chosen-select">
                                <option value=""></option>
                                <?php

                                for ($i = 0; $i < sizeof($all_member_data); $i++) {
                                    echo '<option value="' . $all_member_data[$i][1] . '"> ' . $all_member_data[$i][1] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="col-md-1"></div> -->

                    </div>
                    <div class="adding_user_html">

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
                    <h4 class="modal-title">You are updating the plan of <span id="p_u_t">Chandan Kumar (user id: 20345)</span></h4>
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
    <div class="modal fade" id="create_team" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Create Team</h4>
                </div>
                <div class="modal-body">
                    <div class="first_f_step modal_p">
                        <div class="first_text">
                            <label class="l_t l_t_f">Team Name</label>
                        </div>
                        <div class="second_text_d">
                            <div class="input_style">
                                <input id="team_name" class="form-control i_s c_t_i" type="text" />
                            </div>
                        </div>
                        <div class="first_text">
                            <label class="l_t l_t_f">Add Coaches</label>
                        </div>
                        <div class="second_text_d">
                            <div class="input_style">
                                <select id="coach_select" max-length="3" data-placeholder="Select Coach" class="form-control i_s c_t_i chosen-select" multiple>
                                    <option value=""></option>
                                    <?php
                                    for ($i = 0; $i < sizeof($coach); $i++) {
                                        echo '<option value="' . $coach[$i]->first_name . '"> ' . $coach[$i]->first_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="first_text">
                            <label class="l_t l_t_f">Service Hours</label>
                        </div>
                        <div class="second_text_d">
                            <div class="input_style">
                                <select id="service_hours" data-placeholder="Select Service Hour" class="form-control i_s c_t_i chosen-select">
                                    <option value=""></option>
                                    <option value="06:00 am - 11:00am">06:00 am - 11:00am IST</option>
                                    <option value="11:00 am - 05:00pm">11:00 am - 05:00pm IST</option>
                                    <option value="05:00 pm - 15:00pm">05:00 pm - 15:00pm IST</option>
                                </select>
                            </div>
                        </div>
                        <div class="first_text">
                            <label class="l_t l_t_f">Whatsapp Number Assign</label>
                        </div>
                        <div class="second_text_d">
                            <div class="input_style">
                                <select id="whatsapp_number" data-placeholder="Select Whatsapp Number" class="form-control i_s c_t_i chosen-select">
                                    <option value=""></option>
                                    <option value="8797699791">8797699791</option>
                                    <option value="9999999999">9999999999</option>
                                    <option value="8080808080">8080808080</option>
                                </select>
                            </div>
                        </div>
                        <div class="first_text f_p_btn">
                            <button class="form-control i_s sbt_btn doc_btn_c" id="create_team_details">Submit</button>
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
                                    <option value="4">Questionaire Filled</option>
                                    <option value="5">Physique Image Received</option>
                                    <option value="6">Plan Sent</option>
                                    <option value="7">Intro Call Complete</option>
                                    <option value="8">Plan Start</option>
                                </select>
                            </div>
                        </div>
                        <div class="first_text f_p_btn">
                            <button class="form-control i_s sbt_btn doc_btn" data-user="" id="update_status_btn">Submit</button>
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
                        <?php
                        for ($i = 0; $i < sizeof($team_coach); $i++) {
                        ?>
                            <div class="team_assign_assign">
                                {{$team_coach[$i]->head_coach}} : {{$team_coach[$i]->count}}
                            </div>
                        <?php
                        }
                        ?>

                        <div class="first_text">
                            <label class="l_t l_t_f">Select Team:</label>
                        </div>
                        <div class="second_text">
                            <div class="input_style">
                                <select id="update_team_select" class="form-control i_s ts">
                                    <?php
                                    for ($i = 0; $i < sizeof($team_coach_data); $i++) {
                                        echo '<option value="' . $team_coach_data[$i]->team_name . '">' . $team_coach_data[$i]->team_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="first_text">
                            <label class="l_t l_t_f">Select Head Coach:</label>
                        </div>
                        <div class="second_text">
                            <div class="input_style">
                                <select id="update_head_coach_select" class="form-control i_s ts">
                                    <?php
                                    $option_data_coach = explode(",", $team_coach_data[0]->assign_coach);
                                    for ($i = 0; $i < sizeof($option_data_coach); $i++)
                                        echo '<option value="' . $option_data_coach[$i] . '">' . $option_data_coach[$i] . '</option>'
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="first_text" style="display:flex; flex-direction: row; justify-content: left; align-items: baseline">
                            <label class="l_t l_t_f">Selected Coach Tier: </label>
                            <h4 style="color:white; margin-left:5px;" id="selected_coach_tier"></h4>
                        </div>
                        <div class="first_text f_p_btn">
                            <button class="form-control i_s sbt_btn doc_btn" data-user="" id="update_team_btn">Submit</button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="add_coach" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add New Coach</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form role="form" name="add-coach-form" id="add-coach-form" method="POST" action="/add-coach" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                            </div>
                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="email_id">Email address</label>
                                <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Enter email">
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <label for="mobile_no">Mobile Number</label>
                                <input type="text" class="form-control" id="mobile_no" name="mobile_no" placeholder="Mobile Number">
                            </div>
                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <label for="whatsapp_no">Whatsapp Number</label>
                                <input type="text" class="form-control" id="whatsapp_no" name="whatsapp_no" placeholder="Whatsapp Number">
                            </div>
                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation">
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label for="gender" style="width: 100%;">Gender</label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Male"> Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Female"> Female
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="gender" id="gender" value="Other"> Other
                                </label>
                            </div>


                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <label for="role" style="width: 100%;">Role</label>
                                <select class="form-control" id="role" name="role">
                                    <option value="">Select</option>
                                    <option value="1">Coach</option>
                                    <option value="2">Admin</option>
                                    <option value="3">External Coach</option>
                                </select>
                            </div>

                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <label for="coach_tier" style="width: 100%;">Coach Tier</label>
                                <select class="form-control coach_tier" id="coach_tier" name="coach_tier">
                                    @foreach(Config::get('app.coach_tier') as $value => $tier)
                                        <option value="{{ $value }}"> {{ $tier }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3 hide-on-view">
                                <label for="img_profile">Upload Profile Picture</label>
                                <input class="form-control" type="file" id="img_profile" name="img_profile">
                            </div>

                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3 hide-on-view">
                                <label for="img_banner">Upload Banner Image</label>
                                <input class="form-control" type="file" id="img_banner" name="img_banner">
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <label for="slot_count">Total no. of Slots</label>
                                <input type="text" class="form-control" id="slot_count" name="slot_count" placeholder="Enter slot count">
                            </div>
                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <label for="display_order">Display Order</label>
                                <input type="text" class="form-control" id="display_order" name="display_order" placeholder="Display Order">
                            </div>

                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                            <label for="experience">Years of Experience</label>
                                <input type="text" class="form-control" id="experience" name="experience" placeholder="Years of Experience">
                            </div>
                            <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                <label for="clients_trained">Clients Trained</label>
                                <input type="text" class="form-control" id="clients_trained" name="clients_trained" placeholder="Clients Trained">
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="cert_short">Certificates</label>
                                <input type="text" class="form-control" id="cert_short" name="cert_short" placeholder="Certificate Abbreviations">
                            </div>


                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="instagram">Instagram Profile</label>
                                <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram Profile URL">
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="focus_areas">Focus Areas</label>
                                <input type="text" class="form-control" id="focus_areas" name="focus_areas" placeholder="Focus Areas">
                            </div>

                            <div class="clearfix"></div>

                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="about_coach">About Coach</label>
                                <textarea class="form-control" rows="6" id="about_coach" name="about_coach"></textarea>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" name="submit-coach" id="submit-coach" class="btn btn-primary" style="width: 200px;">Submit</button>
                            </div>

                            <input type="hidden" class="form-control" id="coach_id" name="coach_id" value="">

                        </form>
                        <div class="clearfix"></div>
                        <br /><br />
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="add_transformation_data" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Transformations & Testimonials
                        <span style="color: #196867;">(Coach Name: <span id="coachName"></span>)</span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form role="form" name="add-trans-img" id="add-trans-img" method="POST" action="/add-transformation-data" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label>Client Name</label>
                                <input type="text" name="client_name[]">
                            </div>
                            <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label>Image</label>
                                <input type="file" name="files[]">
                            </div>
                            <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                <label>Testimonial</label>
                                <input type="text" name="testimonials[]" style="width: 100%">
                            </div>
                            <div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 25px; text-align:center;">
                                <a style="text-decoration: underline; cursor: pointer;" onclick="add_more_images()">
                                    <img class="img-responsive action_icon" src="fitness/images/add_icon.png">
                                </a>
                            </div>

                            <div id="additional_rows"></div>

                            <div class="clearfix"></div><br><br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" name="add-trans-imgs" id="submit-images" class="btn btn-primary" style="width: 200px;">Submit</button>
                            </div>

                            <input type="hidden" class="form-control" id="coach_img_id" name="coach_img_id" value="">

                        </form>
                        <div class="clearfix"></div>
                        <br />
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="add_certification_data" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Certification
                        <span style="color: #196867;">(Coach Name: <span id="coach_name"></span>)</span></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form role="form" name="add-cert-img" id="add-cert-img" method="POST" action="/add-certification-data" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label>Certificate Name</label>
                                <input type="text" name="cert_name[]">
                            </div>
                            <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                <label>Certificate Image</label>
                                <input type="file" name="files[]">
                            </div>
                            <div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1" style="margin-top: 25px; text-align:center;">
                                <a style="text-decoration: underline; cursor: pointer;" onclick="add_more_images()">
                                    <img class="img-responsive action_icon" src="fitness/images/add_icon.png">
                                </a>
                            </div>

                            <div id="additional_rows"></div>

                            <div class="clearfix"></div><br><br>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button type="submit" name="add-trans-imgs" id="submit-images" class="btn btn-primary" style="width: 200px;">Submit</button>
                            </div>

                            <input type="hidden" class="form-control" id="cert_img_id" name="cert_img_id" value="">

                        </form>
                        <div class="clearfix"></div>
                        <br />
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

        $.ajax({

            url: '/get_coach_tier/' + coach_name + '/' + team_name,
            type: 'GET',
            success:function (response) {

                if(response == 'Classic') {
                    $('#selected_coach_tier').html('<span class="badge mt-2" style="background-color:#00ab4e;">Classic</span>');
                }
                else if(response == 'Supreme') {
                    $('#selected_coach_tier').html('<span class="badge mt-2" style="background-color:#1a70d1;">Supreme</span>');
                }
                else if(response == 'Exclusive') {
                    $('#selected_coach_tier').html('<span class="badge mt-2" style="background-color:#bc4244;">Exclusive</span>');
                }
                else {
                    $('#selected_coach_tier').html('<span class="badge mt-2" style="background-color:#00d3cd;">LivEzy Plus</span>');
                }

            }

        });

    });

    function add_more_images() {
        let r = (Math.random() + 1).toString(36).substring(7);
        $('#additional_rows').append('<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3 '+r+'">'+
                '<label>Client Name</label>'+
                '<input type="text" name="client_name[]">'+
            '</div>'+
            '<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3 '+r+'">'+
                '<label>Image</label>'+
                '<input type="file" name="files[]">'+
            '</div>'+
            '<div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5 '+r+'">'+
                '<label>Testimonial</label>'+
                '<input type="text" name="testimonials[]" style="width: 100%">'+
            '</div>'+
            '<div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1 '+r+'" style="margin-top: 25px; text-align:center;">'+
                '<a style="text-decoration: underline; cursor: pointer;" onclick="delete_row(`'+r+'`)"> <img class="img-responsive action_icon" src="fitness/images/delete_icon.png"> </a>'+
            '</div>');
    }

    function delete_row(r) {
        const boxes = Array.from(document.getElementsByClassName(r));
        console.log(boxes);
        boxes.forEach(box => {
            box.remove();
        });
    }

    /*$(document).ready(function() {
        $(".button a").click(function() {
            $(".overlay").fadeToggle(200);
            $(this).toggleClass('btn-open').toggleClass('btn-close');
        });

        $("#show_records").click(function(e) {
            e.preventDefault();
            var from_date = $('#fromDate').val();
            var to_date   = $('#toDate').val();
            if(from_date && to_date) {
                $.ajax({
                type: "POST",
                url: "view-payments",
                data: { '_token': '{{ csrf_token() }}','fromDate':fromDate,'toDate':toDate},
                success: function(data) {
                    var all_data = JSON.parse(data);
                    console.log(all_data);
                },
                error: function(data) {
                    alert('Error');
                }
            });
            }
        });
    });*/

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var reload = false;
    var firebaseConfig = {
        apiKey: "AIzaSyB1eVGJRFuIEkdBgeRTX0-A0AHiWvewntE",
        authDomain: "livezy-b17f1.firebaseapp.com",
        projectId: "livezy-b17f1",
        databaseURL: "https://livezy-b17f1-default-rtdb.firebaseio.com/",
        storageBucket: "livezy-b17f1.appspot.com",
        messagingSenderId: "322408944231",
        appId: "1:322408944231:web:795e288841aaab27907ac2",
        measurementId: "G-EQ2CXJSSVG"
    };

    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
</script>
<script>
    function json2array(json) {
        var result = [];
        var keys = Object.keys(json);
        keys.forEach(function(key) {
            result.push(json[key]);
        });
        return result;
    }
    $(document).ready(function() {
        // var userData=[];
        // function selectAlldata(){
        //     firebase.database().ref('/').on('value',
        //     function(allrecords){
        //         allrecords.forEach(function(currentRecord){
        //             var n=[1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1];
        //             userData.push(n);
        //             console.log(currentRecord.key)
        //         })
        //     })
        // }

        /* $("select.coach_tier").change(function(){
            var value = $(this).children("option:selected").val();
            alert("Coach Tier: " + value);
        }); */

        $('#update_head_coach_select').trigger('change');

        // window.onload=selectAlldata();
        $('[data-toggle="tooltip"]').tooltip();
        $('.nav-item').on('click', function(e) {
            $('.nav-item').removeClass('active_menu');
            $(this).addClass('active_menu');
            var id = $(this).attr('id');
            $('.p_d').css('display', 'none');
            $('.' + id).css('display', 'block');
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


        var r_sd = <?php echo Session::get('role-id') ?>;
        if (parseInt(r_sd) == 3)
            $('#create_live_session').click();



        var super_data = <?php echo json_encode((array_values($member_data))) ?>;
        var all_member_data = <?php echo json_encode((array_values($all_member_data))) ?>;
        var all_member_data_table = $(all_member_data).filter(function(i, n) {
            return n[15] !== 'Live Session' || n[15] !== 'Live session'
        });
        var transform__data = $(all_member_data).filter(function(i, n) {
            return n[14] === 1
        });
        var live_super_data = $(all_member_data).filter(function(i, n) {
            return (n[15] === 'Live Session' || n[15] === 'Live session') && n[6] !== 'Free User'
        });
        //console.log('all_member_data',all_member_data)
        var mes = $('#member_details_data').DataTable({
            scrollY: 600,
            buttons: [{
                    extend: 'searchBuilder',
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14,15]
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
                // console.log(data[22]);
                if (data[21])
                    $(row).css('background', 'white');
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
                        if ('<?php echo Session::get('role-id') ?>' == '2')
                            return '<span onclick="team_assign(' + full[2] + ',this)" data-userid="' + full[2] + '" data-username="' + full[3] + '" data-values="' + data + '">' + data + '</span>';
                        else
                            return data ? data : 'Not Available';
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
                        return data == 1 ? `<span class="badge mt-2 plus">Plus</span>` :
                        data == 0 ? `<span class="badge mt-2 premium">Premium</span>` :
                        'Null';
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, full, meta) {
                        return parseInt(data ? data : 'Not Available');
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
                        return full[22] ? full[22] : 'NA';
                    }
                }

            ]
        });

        mes.on('buttons-action', function(e, button) {
            if (!$(".dtsp-closePanes")[0]) {
                $(mes.searchBuilder.container()).append(
                    $('<button style="float:right" class="dtsp-closePanes">Close</button>').click(function() {
                        mes.button().popover(false);
                    })
                );
            }
        });


        var mes_live = $('#live_session_details_data').DataTable({
            scrollY: 600,
            buttons: [{
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
            data: live_super_data,
            deferRender: true,
            bProcessing: true,
            bAutoWidth: false,
            responsive: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            fixedColumns: {
                leftColumns: 1
            },
            createdRow: function(row, data, dataIndex) {
                $(row).attr('id', data[2]);
            },
            columnDefs: [

                {
                    targets: 0,
                    render: function(data, type, full, meta) {
                        var img_t = 'Transform.png';
                        if (full[14])
                            img_t = 'transform_active.png';
                        var first_tab = `<img class="img-responsive action_icon" src="fitness/images/${img_t}" data-toggle="tooltip" data-placement="bottom" title="Pin for Transformation" onclick="image_trnansform(this,${full[1]},${full[14]})">`;

                        return first_tab;
                    }


                },
                {
                    targets: 1,
                    render: function(data, type, full, meta) {
                        return full[0];
                    }
                },
                {
                    targets: 2,
                    render: function(data, type, full, meta) {
                        return full[1];

                    }
                },
                {
                    targets: 3,
                    render: function(data, type, full, meta) {
                        return full[2];
                    }
                },
                {
                    targets: 4,
                    render: function(data, type, full, meta) {
                        return full[3];
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, full, meta) {
                        return full[4];
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, full, meta) {
                        return full[5];
                    }
                },
                {
                    targets: 7,
                    className: 'status_td',
                    render: function(data, type, full, meta) {
                        return '<span onclick="status_update(' + full[1] + ',this)" data-userid="' + full[1] + '" data-member="Live Session" data-username="' + full[3] + '" data-values="' + full[6] + '">' + full[6] + '</span>';
                    }
                },
                {
                    targets: 8,
                    render: function(data, type, full, meta) {
                        // if('<?php echo Session::get('role-id') ?>'=='2')
                        //     return '<span onclick="team_assign('+full[2]+',this)" data-username="'+full[3]+'" data-values="'+data+'">'+data+'</span>';
                        // else
                        //     return data;
                        // }
                        return 'Live Session';
                    }
                },
                {
                    targets: 9,
                    render: function(data, type, full, meta) {
                        // return data;
                        return 'Live Session';

                    }
                },
                {
                    targets: 10,
                    render: function(data, type, full, meta) {
                        return full[9];
                    }
                },
                {
                    targets: 11,
                    render: function(data, type, full, meta) {
                        return full[10];
                    }
                },
                {
                    targets: 12,
                    render: function(data, type, full, meta) {
                        return full[11];
                    }
                },
                {
                    targets: 13,
                    render: function(data, type, full, meta) {
                        return full[12];
                    }
                },
                {
                    targets: 14,
                    render: function(data, type, full, meta) {
                        return full[13];
                    }
                }

            ],
            order: [
                [10, 'desc']
            ]
        });
        //console.log('transform_data',transform__data)
        mes_live.on('buttons-action', function(e, button) {
            if (!$(".dtsp-closePanes")[0]) {
                $(mes_live.searchBuilder.container()).append(
                    $('<button style="float:right" class="dtsp-closePanes">Close</button>').click(function() {
                        mes_live.button().popover(false);
                    })
                );
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

        var transform_table = $('#transform_details_data').DataTable({
            scrollY: 600,
            buttons: ['searchBuilder'],
            dom: 'Blfrtip',
            data: transform__data,
            language: {
                searchBuilder: {
                    button: 'Filter Data',
                    title: 'Filter Transform User'
                }
            },
            deferRender: true,
            bProcessing: true,
            bAutoWidth: true,
            responsive: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            createdRow: function(row, data, dataIndex) {
                $(row).attr('id', 'transform_' + data[2]);

            },
            columnDefs: [

                {
                    targets: 0,
                    render: function(data, type, full, meta) {
                        //console.log(full);
                        return full[9];


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
                        var team_t = full[7];
                        if (full[15] == 'Live Session')
                            team_t = 'Live Session';
                        return team_t;
                    }
                },
                {
                    targets: 5,
                    render: function(data, type, full, meta) {
                        var coach_t = full[8];
                        if (full[15] == 'Live Session')
                            coach_t = 'Live Session';
                        return coach_t;
                    }
                },
                {
                    targets: 6,
                    render: function(data, type, full, meta) {
                        return full[4];
                    }
                },
                {
                    targets: 7,
                    render: function(data, type, full, meta) {
                        return full[12];
                    }
                }

            ],
            order: [
                [0, 'desc']
            ]
        });
        transform_table.on('buttons-action', function(e, button) {
            if (!$(".dtsp-closePanes")[0]) {
                $(transform_table.searchBuilder.container()).append(
                    $('<button style="float:right" class="dtsp-closePanes">Close</button>').click(function() {
                        transform_table.button().popover(false);
                    })
                );
            }
        });

        var renewal_data = $('#renewal_data').DataTable({
            scrollY: 600,
            buttons: ['searchBuilder'],
            dom: 'Blfrtip',
            language: {
                searchBuilder: {
                    button: 'Filter Data',
                    title: 'Filter renewal user'
                }
            },

            bAutoWidth: true,
            responsive: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            order: [
                [6, 'desc']
            ]
        });
        renewal_data.on('buttons-action', function(e, button) {
            if (!$(".dtsp-closePanes")[0]) {
                $(renewal_data.searchBuilder.container()).append(
                    $('<button style="float:right" class="dtsp-closePanes">Close</button>').click(function() {
                        renewal_data.button().popover(false);
                    })
                );
            }
        });

        var feedback_liv = $('#feedback_liv').DataTable({
            scrollY: 600,
            buttons: ['searchBuilder'],
            dom: 'Blfrtip',
            buttons: [{
                    extend: 'searchBuilder',

                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 3, 4, 5, 6, 7]
                    },
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ],
            language: {
                searchBuilder: {
                    button: 'Filter Data',
                    title: 'Filter Transform User'
                }
            },

            bAutoWidth: true,
            responsive: true,
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            order: [
                [4, 'desc']
            ]
        });
        feedback_liv.on('buttons-action', function(e, button) {
            if (!$(".dtsp-closePanes")[0]) {
                $(feedback_liv.searchBuilder.container()).append(
                    $('<button style="float:right" class="dtsp-closePanes">Close</button>').click(function() {
                        feedback_liv.button().popover(false);
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
        // firebase.database().ref('/livezy-admin').on('child_add',function(data){
        //     if('<?php echo Session::get('role-id') ?>'=='2'){
        //         reload=true;
        //         var audio = new Audio('fitness/images/notification_sound.wav');
        //         audio.play();
        //         toastr.success('Free member converted into paid member');

        //     }
        // })
        firebase.database().ref('/livezy-admin').on('child_changed',
            function(data) {
                // console.log(data.val().buddy_username);
                var transform_img_f = data.val().is_transform ? 'transform_active.png' : 'Transform.png';
                var plan_img_f = data.val().plan_doc_link ? "plan_update_active.png" : "Palnurl.png";
                var p_u_link = data.val().plan_doc_link ? data.val().plan_doc_link : "";
                var static_action = '<a href="/view-question?user_id=' + data.val().username + '" data-toggle="tooltip"  data-placement="bottom" title="Questionaire View" target="_blank"><img class="img-responsive action_icon" src="fitness/images/questionnaire.png" /></a><img class="img-responsive action_icon q_update" src="fitness/images/' + plan_img_f + '" data-toggle="tooltip" data-placement="bottom" title="Update Plan"  data-url="' + p_u_link + '" data-userid="' + data.val().username + '" onclick="plan_update(this,' + data.val().username + ')"/><img class="img-responsive action_icon" src="fitness/images/' + transform_img_f + '" data-toggle="tooltip" data-placement="bottom" title="Pin for Transformation" onclick="image_trnansform(this,' + data.val().username + ',' + data.val().is_transform + ')"  />';
                var dob = new Date(data.val().dob);
                var today = new Date();
                var user_age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                var act_day = daysBetween(today, data.val().plan_end_date);
                //parseInt(act_day)-parseInt(data.val().pause_day_availed)
                var left_day = parseInt(act_day);
                var pause_status = 'No';
                var user_status_curr = 'Not Defined';
                // switch(expression) {
                //         case x:
                //             // code block
                //             break;
                //         case y:
                //             // code block
                //             break;
                //         default:
                //             // code block
                //     }
                user_status_curr_num = parseInt(data.val().user_status);
                // console.log('statas',data.val().user_status)
                if (user_status_curr_num == 9) {
                    pause_status = 'Yes';
                    user_status_curr = "Pause";
                } else if (user_status_curr_num == 4) {
                    user_status_curr = "Qustionaire Filled";
                } else if (user_status_curr_num == 5) {
                    user_status_curr = "Physique Image Received";
                } else if (user_status_curr_num == 6) {
                    user_status_curr = "Plan Sent";
                } else if (user_status_curr_num == 7) {
                    user_status_curr = "Intro Call Complete";
                } else if (user_status_curr_num == 8) {
                    user_status_curr = "Plan Start";
                }


                var n = [static_action, data.val().question_submit_date, data.val().username, data.val().name, data.val().email, data.val().mob_no, data.val().plan, user_status_curr, data.val().team, data.val().head_coach, left_day, pause_status, user_age, data.val().gender, data.val().eating_habbit, data.val().buddy_username, data.val().refered_by, data.val().refered_type, data.val().service_hour, data.val().country, data.val().questionaire_start_date];
                // console.log('datasuper',n);
                if ($('#' + data.key).length != 0) {
                    if ('<?php echo Session::get('role-id') ?>' == '2' || data.val().head_coach == '<?php echo Session::get('first_name') ?>') {
                        mes.row($('#' + data.key)).data(n).draw();
                        reload = true;

                        toastr.success('New Notification');
                    } else {
                        mes.row($('#' + data.key)).remove().draw();
                        reload = false;
                        toastr.options = {
                            tapToDismiss: false,
                            timeOut: 0,
                            extendedTimeOut: 0,
                            allowHtml: true,
                            preventDuplicates: true,
                            preventOpenDuplicates: true,
                            newestOnTop: true,
                            closeButton: true
                        };
                        var audio = new Audio('fitness/images/notification_sound.wav');
                        audio.play();
                        toastr.error('New Notification : User Id <b>' + data.key + '</b> has been removed by super admin');

                    }
                } else {
                    if (data.val().team == '<?php echo Session::get('team') ?>') {
                        mes.rows.add([n]).draw();
                        reload = true;
                        var audio = new Audio('fitness/images/notification_sound.wav');
                        audio.play();
                        toastr.success('New Notification');
                    }
                }
                // console.log(data.val().buddy_username)

                var count = parseInt($('.show-count').attr('data-count')) + 1;
                $('.show-count').attr('data-count', count);


            })
        // firebase.database().ref('/').on('value',function(snapshot) {
        //     var dataSet = [1,1,1,1,1,1,1,1,1,1,1,1,1,1,snapshot.val().city, snapshot.val().city];
        //     mes.rows.add([dataSet]).draw();
        // })
        $('input[type=radio][name=user_add]').change(function() {
            if (this.value == 'existing') {
                $('.adding_user_html').html('');
            } else if (this.value == 'new') {
                $('.adding_user_html').html('');
            }
        });
        $('#user_select').on('change', function() {
            var user_id = $('#user_select').val();
            var user_type = document.querySelector('input[name="user_add"]:checked').value;
            if (user_id) {
                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'username': user_id,
                        'user_type': user_type
                    },
                    url: 'get_user_data',
                    success: function(data) {
                        $('.adding_user_html').html('');
                        if (data) {
                            $('.adding_user_html').html(data);
                        }
                    }
                })
            }
        })

        $('#user_select_change_start_date').on('change', function() {
            var user_id = $('#user_select_change_start_date').val();
            if (user_id) {
                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'username': user_id
                    },
                    url: 'change_start_date_user',
                    success: function(data) {
                        $('.pause_user_html').html('');
                        if (data) {
                            $('.pause_user_html').html(data);
                        }
                    }
                })
            }
        })
        $('#user_select_pause').on('change', function() {
            var user_id = $('#user_select_pause').val();
            if (user_id) {
                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'username': user_id
                    },
                    url: 'live_user_data',
                    success: function(data) {
                        $('.pause_user_html').html('');
                        if (data) {
                            $('.pause_user_html').html(data);
                        }
                    }
                })
            }
        })
        $('#user_select_extend').on('change', function() {
            var user_id = $('#user_select_extend').val();
            if (user_id) {
                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'username': user_id
                    },
                    url: 'live_user_plan_detail',
                    success: function(data) {
                        $('.extend_user_html').html('');
                        if (data) {
                            $('.extend_user_html').html(data);
                        }
                    }
                })
            }
        })
        $('#freeze').on('change', function() {
            var number = parseInt($('#freeze').val());
            freeze(number);
        })
        $('#lives_session_freeze').on('change', function() {
            var number = parseInt($('#lives_session_freeze').val());
            livse_session_freeze(number);
        })

        function freeze(a) {
            $('#member_details_data').DataTable({
                destroy: true,
                scrollY: 600,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                data: super_data,
                buttons: ['searchBuilder'],
                language: {
                    searchBuilder: {
                        button: 'Filter Data',
                        title: 'Filter Buddy / Individual Mebership User'
                    }
                },
                dom: 'Blfrtip',
                fixedColumns: {
                    leftColumns: a
                },
                order: [
                    [1, 'asc']
                ]
            });
        }

        function livse_session_freeze(a) {
            $('#live_session_details_data').DataTable({
                destroy: true,
                scrollY: 600,
                scrollX: true,
                scrollCollapse: true,
                paging: true,
                buttons: ['searchBuilder'],
                dom: 'Blfrtip',
                fixedColumns: {
                    leftColumns: a
                },
                order: [
                    [1, 'asc']
                ]
            });
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
        $('.transform').css('display', 'none')
        $('.all_user').css('display', 'none')
        $('.live_session').css('display', 'none')
        $('.transform').css('display', 'none')
        $('#lsf').css('display', 'none')
        $('#ldm').css('display', 'none')
        $('#lsa').css('display', 'none')





    });

    window.plan_update_v = '';

    function plan_update(p, id) {

        plan_update_v = p;
        var id = $(plan_update_v).attr('data-userid');
        $('#p_u_t').html(' (User id: ' + id + ')');
        $('#update_plan').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#update_g_d').val($(p).attr('data-url'))
        $('#f_s1').attr('data-username', id)

    }
    $('#update_team_select').on('change', function() {
        var team_coach_data = <?php echo json_encode($team_coach_data) ?>;
        var according_condition = $(team_coach_data).filter(function(i, n) {
            return n.team_name === $('#update_team_select').val()
        });
        var option_data = according_condition[0].assign_coach.split(',');
        $('#update_head_coach_select').html('');
        for (var i = 0; i < option_data.length; i++) {
            $('#update_head_coach_select').append('<option value="' + option_data[i] + '">' + option_data[i] + '</option>')

        }
        $('#update_head_coach_select').trigger('change');
    })
    $('#f_s1').on('click', function() {
        if ($('#update_g_d').val()) {
            $(plan_update_v).attr('src', 'fitness/images/plan_update_active.png');
            var plan_link = $('#update_g_d').val()
            var b = $('#f_s1').attr('data-username');
            $.ajax({
                type: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'username': b,
                    'plan_doc_link': plan_link
                },
                url: 'plan_link_update',
                success: function(data) {
                    if (data) {
                        var data_i = plan_link;
                        var sub_d = {}
                        sub_d[`/${b}/plan_doc_link`] = data_i;
                        firebase.database().ref('/livezy-admin').update(sub_d);
                        transform_reload = true;
                        Swal.fire(
                            `Plan link is updated for User id ${b}, next step is to update user status to plan sent`
                        )
                    }
                }
            })
            $('#update_plan').modal('toggle')
        } else {
            toastr.error('Enter google doc url');
        }
    })
    $('#create_team_details').on('click', function() {
        var team_name = $('#team_name').val();
        var coaches = $('#coach_select').val();
        var service_hour = $('#service_hours').val();
        var whatsapp_no = $('#whatsapp_number').val();

        if (team_name.length != 0 && coaches.length != 0 && service_hour.length != 0 && whatsapp_no.length != 0) {
            let data = {
                'team_name': team_name,
                'assign_coach': coaches.join(),
                'service_hour': service_hour,
                'whatsapp': whatsapp_no
            }
            $.ajax({
                type: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'data': data
                },
                url: 'team_create',
                success: function(data) {
                    if (data) {
                        toastr.success('Team Created Successfully');

                        $('#create_team').modal('toggle');
                    }
                }
            })
        } else {
            toastr.error('Please fill the all required field');
        }
    })
    var transform_reload = false;

    function image_trnansform(a, b, c) {
        // console.log(a)
        Swal.fire({
            title: 'Are you sure?',
            text: `User id ${b} is ${c?'Un marked':'Marked'} for transformation`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, marked it!'
        }).then((result) => {
            if (result.isConfirmed) {
                console.log($(a).attr('src', 'fitness/images/transform_active.png'))

                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'username': b,
                        'is_transform': c ? 0 : 1
                    },
                    url: 'transform_update',
                    success: function(data) {
                        if (data) {
                            var data_i = c ? 0 : 1;
                            var sub_d = {}
                            sub_d[`/${b}/is_transform`] = data_i;
                            firebase.database().ref('/livezy-admin').update(sub_d);
                            transform_reload = true;
                            Swal.fire(
                                `User id ${b} is ${c?'Un marked':'Marked'} for transformation`
                            )
                        }
                    }
                })

            }
        })
    }

    function create_team() {
        $('#create_team').modal({
            backdrop: 'static',
            keyboard: false
        })

    }

    function status_update(id, meta) {
        console.log(meta);
        $('#update_status_btn').attr('disabled', false);
        var id = $(meta).attr('data-userid');
        $.ajax({
            type: 'post',
            data: {
                '_token': '{{ csrf_token() }}',
                'username': id
            },
            url: 'status_check_assign',
            success: function(data) {
                console.log(data);
                if (data) {
                    $("#update_status_select option").attr('disabled', false);
                    $("#update_status_select option").attr('selected', false);
                    $('#update_status_btn').attr('disabled', false);
                    var opt_leng = $("#update_status_select option");
                    var cond = true;
                    for (var i = 0; i < opt_leng.length; i++) {
                        console.log($(meta).attr('data-values'));
                        if (opt_leng[i].text == $(meta).attr('data-values')) {
                            $(opt_leng[i]).attr('selected', true);
                            $('#update_status_btn').attr('data-prev', $(opt_leng[i]).val());
                            $(opt_leng[i]).attr('disabled', true);
                            cond = false;
                        } else {
                            console.log('chandan',cond,opt_leng[i])
                            if (cond) $(opt_leng[i]).attr('disabled', true);
                        }
                    }
                    $('#s_u_t').html($(meta).attr('data-username') + ' (User id: ' + id + ')');
                    $('#update_status').modal({
                        backdrop: 'static',
                        keyboard: false
                    })
                    $('#update_status_btn').attr('data-username', id);
                    $('#update_status_btn').attr('data-value', $('#update_status_select').val());
                    $('#update_status_btn').attr('data-member', $(meta).attr('data-member'));
                    if ($(meta).attr('data-values') == 'Plan Start') $('#update_status_btn').attr('disabled', true);
                } else {
                    Swal.fire({
                        title: 'Status Can not update',
                        text: `Since this is buddy plan so user need to be on same status before plan start`,
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ok'
                    }).then((result) => {})
                }
            }
        })
        // during live production enable for first time
        // console.log('chandan')
        // var super_data=<?php echo $once_data ?>;
        // console.log(super_data)
        // for(var i=0;i<super_data.length;i++)
        //     {   var data_i=super_data[i];
        //         var sub_d={}
        //         sub_d[`/livezy-admin/${super_data[i].username}`]=data_i;
        //         firebase.database().ref('/').update(sub_d);
        //         console.log('username',super_data[i].username)
        //     }
    }

    function copy(element) {
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
    $('#update_status_btn').on('click', function() {
        $('#update_status_btn').attr('disabled', true)
        var username = $('#update_status_btn').attr('data-username');
        var prev_value = $('#update_status_btn').attr('data-prev');
        var data_member = $('#update_status_btn').attr('data-member');
        var user_status = $('#update_status_select').val();
        var condition = false;
        if (parseInt(user_status) == 8 && parseInt(prev_value) != 7 && data_member != 'Live Session') {
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
            type: 'post',
            data: {
                '_token': '{{ csrf_token() }}',
                'username': username,
                'status': user_status
            },
            url: 'user_status',
            success: function(data) {

                if (data) {
                    var data_i = user_status;
                    var sub_d = {}
                    sub_d[`/${username}/user_status`] = data_i;
                    firebase.database().ref('/livezy-admin').update(sub_d);
                    reload = true;
                    // console.log(username,user_status);
                    $('#update_status').modal('toggle');
                    if (data_member == 'Live Session') {
                        location.reload();
                    }
                } else {
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

    function team_assign(id, meta) {
        var id = $(meta).attr('data-userid');

        $('#s_u_t_h').html($(meta).attr('data-username') + ' (User id: ' + id + ')');
        $('#update_team').modal({
            backdrop: 'static',
            keyboard: false
        })
        $('#update_team_btn').attr('data-username', id);
        $('#update_team_btn').attr('data-value', $('#update_status_select').val());
        $('#update_head_coach_select').trigger('change');
    }
    $('#update_team_btn').on('click', function() {
        var username = $('#update_team_btn').attr('data-username');
        var user_status = $('#update_status_select').val();
        var team = $('#update_team_select').val();
        var head_coach = $('#update_head_coach_select').val();
        var team_coach_data = <?php echo json_encode($team_coach_data) ?>;
        var according_condition = $(team_coach_data).filter(function(i, n) {
            return n.team_name === $('#update_team_select').val()
        });
        var sub_coach = null //according_condition[0].assign_coach.replace(',').replace(head_coach);
        $.ajax({
            type: 'post',
            data: {
                '_token': '{{ csrf_token() }}',
                'username': username,
                'team': team,
                'head_coach': head_coach,
                'sub_coach': sub_coach
            },
            url: 'user_team_assign',
            success: function(data) {
                if (data) {
                    var data_i = {
                        'team': team,
                        'head_coach': head_coach,
                        'sub_coach': sub_coach
                    };
                    var sub_d = {}
                    sub_d[`/${username}/team`] = team;
                    sub_d[`/${username}/head_coach`] = head_coach;
                    sub_d[`/${username}/sub_coach`] = sub_coach;

                    firebase.database().ref('/livezy-admin').update(sub_d);
                    reload = true;
                    var count = parseInt($('.show-count').attr('data-count')) + 1;
                    $('.show-count').attr('data-count', count);
                    $('#update_team').modal('toggle');
                    toastr.success('Team updated');
                    window.location.reload();
                } else {
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
    $('.create_box_live').on('click', function(e) {
        if ($('.create_box_live').hasClass('active_create')) {
            $('.create_box_live').removeClass('active_create')
            $(this).addClass('active_create')
        } else {
            $(this).addClass('active_create')
        }
    })
    var today_date = moment().add(0, 'days');
    $('.date_day').html(parseInt(today_date.format("D")) < 9 ? '0' + today_date.format("D") : today_date.format("D"));
    $('.date_month_year').html(today_date.format("MMMM YYYY"));
    $('.date_d').html(today_date.format("dddd"));
    var sess_date = today_date.format('YYYY-MM-DD');

    function onApplyHandler(date, context) {
        var start_date = date[0].format('YYYY-MM-DD');
        var d_date = date[0].format("dddd, MMMM D, YYYY");
        $('.date_day').html(parseInt(date[0].format("D")) < 9 ? '0' + date[0].format("D") : date[0].format("D"));
        $('.date_month_year').html(date[0].format("MMMM YYYY"));
        $('.date_d').html(date[0].format("dddd"));
        sess_date = start_date;
        // console.log('date',d_date)
    }
    // Calendar modal
    var $btn = $('#calender_create_live').pignoseCalendar({
        apply: onApplyHandler,
        modal: true, // It means modal will be showed when you click the target button.
        buttons: true,
        minDate: moment().add(-1, 'days')
    });
    // $(function() {
    // $('#calender_create_live').pignoseCalendar({
    //         format: 'YYYY-MM-DDD' // date format string. (2017-02-02)
    //     });
    // });
    $('.container-notifications').on('click', function() {
        $('#notification').click();
    })

    $('#logout').on('click', function() {
        $.ajax({
            type: 'post',
            data: {
                '_token': '{{ csrf_token() }}'
            },
            url: 'admin_logout',
            success: function(data) {
                if (data) {
                    toastr.success('Log Out Successfully');

                    window.location.href = '/admin'
                }
            }
        })
    })
    $('#notification').on('click', function() {
        if (reload) {
            $.ajax({
                type: 'post',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                url: 'get-notification',
                success: function(data) {
                    if (data) {
                        var result = JSON.parse(data);
                        // console.log(JSON.parse(data))
                        $('.all_notification').html(' ');
                        for (var i = 0; i < result.length; i++) {
                            let append_data = `<li class="outer_notification" id="notif_${result[i].id}" data-id="${result[i].id}">
                                        <div class="col-md-12 notif_style">

                                            <div class="out_not_box">
                                                <div class="l_s_n header_noti">
                                                    <span>${result[i].notification_type}</span>
                                                </div>
                                                <div class="l_s_n header_noti new_n_s">
                                                    <span>Marked as Done<input type="checkbox" onclick="ar_notif(${result[i].id},this)" name="notify" data-li="${result[i].id}" class="ar_notif"></span>
                                                </div>
                                                <hr>
                                                <div class="r_s_n">
                                                    ${result[i].created_at}
                                                </div>
                                                <div class="l_s_n">
                                                    <span>User Id : ${result[i].username}</span>
                                                </div>


                                                <div class="l_s_n">
                                                    Name : ${result[i].name}
                                                </div>
                                                <div class="l_s_n">
                                                    ${result[i].mob_no}
                                                </div>
                                                <div class="l_s_n">
                                                    ${result[i].description}
                                                </div>
                                            </div>


                                        </div>
                                    </li>`;
                            $('.all_notification').append(append_data);

                        }
                        $('.aktif').click(); //solve pagination

                        //toastr.success('New Notification');
                        reload = false;
                    }
                }
            })
        }
    })
    $('#transform').on('click', function() {
        if (transform_reload) {
            $.ajax({
                type: 'post',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                url: 'get-transform',
                success: function(data) {
                    if (data) {
                        var result = JSON.parse(data);
                        // console.log('kumar',result)

                        var transform__data_ajax = $(result).filter(function(i, n) {
                            return n[14] === 1
                        })
                        var transform_table_ajax = $('#transform_details_data').DataTable({
                            destroy: true,
                            scrollY: 600,
                            buttons: ['searchBuilder'],
                            dom: 'Blfrtip',
                            data: transform__data_ajax,
                            deferRender: true,
                            bProcessing: true,
                            bAutoWidth: true,
                            responsive: true,
                            scrollX: true,
                            scrollCollapse: true,
                            paging: true,
                            createdRow: function(row, data, dataIndex) {
                                $(row).attr('id', 'transform_' + data[2]);
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
                                        var team_t = full[7];
                                        if (full[15] == 'Live Session')
                                            team_t = 'Live Session';
                                        return team_t;
                                    }
                                },
                                {
                                    targets: 5,
                                    render: function(data, type, full, meta) {
                                        var team_t = full[7];
                                        if (full[15] == 'Live Session')
                                            team_t = 'Live Session';
                                        return team_t;
                                    }
                                },
                                {
                                    targets: 6,
                                    render: function(data, type, full, meta) {
                                        var coach_t = full[8];
                                        if (full[15] == 'Live session')
                                            coach_t = 'Live Session';
                                        return coach_t;
                                    }
                                },
                                {
                                    targets: 7,
                                    render: function(data, type, full, meta) {
                                        return full[12];
                                    }
                                }

                            ],
                            order: [
                                [1, 'asc']
                            ]
                        });
                        reload = false;
                    }
                }
            })
        }
    })
    $("#listPage").JPaging({
        visiblePageSize: 1,
        pageSize: 3

    });
    $("#listPage_archive").Jpaging_archive({
        visiblePageSize: 1,
        pageSize: 3

    });

    var role_based = parseInt('<?php echo Session::get('role-id'); ?>')
    $('#admin_toggle').btnSwitch({
        Theme: 'Android',
        OnValue: 1,
        ToggleState: role_based == 1 ? true : false,
        OnCallback: function(val) {
            toastr.success('Your account is going to logged in as a coach');
            change_role(val);
        },
        OffValue: 2,
        OffCallback: function(val) {
            toastr.success('Your account is going to logged in as a super admin');
            change_role(val)
        }
    });

    function cancel_live_session(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: `This live session will cancel`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Cancel it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        's_id': id
                    },
                    url: 'cancel_session',
                    success: function(data) {
                        toastr.success('Live Session cancel by  super admin');
                        window.location.href = '/admin-dashboard?create_live_session';
                    }
                })

            } else {
                toastr.success('Live Session Not Cancel');
            }
        })

    }
    var coach_id_s_s = '';
    var coach_name_s_s = '';

    function coachSelect(id) {
        coach_id_s_s = id.value;
        coach_name_s_s = id.options[id.selectedIndex].text;
    }

    function update_live_session(id) {
        if (coach_id_s_s.length == 0) {
            toastr.error('Please select coach to update');
            return false;
        }
        Swal.fire({
            title: 'Are you sure?',
            text: `This live session will update`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Update it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        's_id': id,
                        'coach_id': coach_id_s_s,
                        'coach_name': coach_name_s_s
                    },
                    url: 'update_session',
                    success: function(data) {
                        toastr.success('Live Session updated by  super admin');
                        window.location.href = '/admin-dashboard?create_live_session';
                    }
                })

            } else {
                toastr.success('Live Session Not Cancel');
            }
        })

    }
    var custom_coach_id_s_s = '';
    var custom_coach_name_s_s = '';

    function custom_coachSelect(id) {
        custom_coach_id_s_s = id.value;
        custom_coach_name_s_s = id.options[id.selectedIndex].text;
    }
    // function convertTZ(date, tzString) {
    //     return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));
    // }
    function convertTZ(date, tzString) {
        var date = date.replace(/ /g, "T")
        return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {
            timeZone: tzString
        }));
    }

    function custom_live_session(url, session_name, c_date, c_time, new_date) {
        var create_time_zone_prev = convertTZ(c_date + ' ' + c_time, 'Asia/Kolkata');
        var create_time_zone = moment(create_time_zone_prev);
        if (url == 'false') {
            toastr.error(`Please update link of ${session_name}`);
            return false;
        }
        if (new_date == 'false') {
            toastr.error(`Can not create ${session_name} , you can only create within 7 days time frame of link`);
            return false;
        }
        Swal.fire({
            title: 'Are you sure?',
            text: `${session_name} live session will create for ${custom_coach_name_s_s}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Create it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var admin_id = '<?php echo Session::get('admin-id') ?>';
                var created_by = '<?php echo Session::get('first_name') ?>';
                let data = {
                    'session_name': session_name,
                    'session_url': url,
                    'total_seat': 25,
                    'coach_name': custom_coach_name_s_s,
                    'coach_id': custom_coach_id_s_s,
                    'start_date': create_time_zone.format('YYYY-MM-DD'),
                    'start_time': create_time_zone.format('HH:mm'),
                    'admin_id': admin_id,
                    'created_by': created_by
                }
                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'data': data
                    },
                    url: 'create_live_session',
                    success: function(data) {
                        if (data == 'true') {
                            toastr.success('Live Session created by  super admin');
                            // window.location.href='/admin-dashboard?create_live_session';
                        } else {
                            toastr.error('This session is already created or coach has different session at same time');
                        }

                    }
                })


            } else {
                toastr.success('Live Session Not Created');
            }
        })
    }

    function zoom_start(zoom_link) {
        var r = `<div class="overlay_close" >X</div><div class="iframe-container" >
                <iframe sandbox="allow-forms allow-scripts" allow="microphone; camera" style="border: 0; height: 100vh; left: 0; position: relative; top: -30px; width: 100%;" src="${zoom_link}" frameborder="0"></iframe>
            </div>`;
        $('.overlay').html(r);
        $(".overlay").fadeToggle(200);
        $('.overlay_close').on('click', function() {
            $(".overlay").html(' ');
            $(".overlay").fadeToggle(200);
            $(".button a").toggleClass('btn-open').toggleClass('btn-close');
            open = false;
        });
    }

    function change_role(role) {
        $.ajax({
            type: 'post',
            data: {
                '_token': '{{ csrf_token() }}',
                'role': role
            },
            url: 'switch_admin_role',
            success: function(data) {
                if (data)
                    window.location.href = '/admin-dashboard';
            }
        })
    }

    function create_date_check_live_session_url(live_session_url, session_name, create_date) {
        var live_url = false;
        if (live_session_url.length > 0) {
            for (var l = 0; l < live_session_url.length; l++) {
                if (live_session_url[l].session_name == session_name) {
                    //console.log(live_session_url[l].created_at);

                    var user_plan_end_date = moment(live_session_url[l].created_at).add(10, 'days');
                    //console.log(user_plan_end_date);

                    var today = moment(create_date);
                    var diff_day = user_plan_end_date.diff(today, 'days');
                    //console.log('check',session_name,diff_day,create_date)

                    if (diff_day > 0)
                        live_url = true;
                    break;
                }
            }
        }
        return live_url;
    }
    $('#c_l_s').on('click', function() {
        var session_name = $('.active_create').attr('data-value') ? $('.active_create').attr('data-value') : '';
        var coach_id = $('#coach_live').val();
        var coach_name = $("#coach_live option:selected").text();
        var session_date = sess_date;
        var session_time = $('#cr_t').val();
        var session_link = $('.active_create').attr('data-url') ? $('.active_create').attr('data-url') : '';
        var total_seat = $('#cr_t_seat').val();
        var admin_id = '<?php echo Session::get('admin-id') ?>';
        var created_by = '<?php echo Session::get('first_name') ?>';
        var create_time_zone_prev = convertTZ(session_date + ' ' + session_time, 'Asia/Kolkata');
        var create_time_zone = moment(create_time_zone_prev);


        if (session_name.length > 0 && coach_id.length > 0 && session_date.length > 0 && session_time.length > 0 && session_link.length > 0) {
            let data = {
                'session_name': session_name,
                'session_url': session_link,
                'total_seat': total_seat,
                'coach_name': coach_name,
                'coach_id': coach_id,
                'start_date': create_time_zone.format('YYYY-MM-DD'),
                'start_time': create_time_zone.format('HH:mm'),
                'admin_id': admin_id,
                'created_by': created_by
            }
            var link_exp = create_date_check_live_session_url(<?php echo json_encode($live_session_url) ?>, session_name, session_date);

            if (!link_exp) {
                toastr.error(`Can not create ${session_name} , you can only create within 7 days time frame of link`);
                return false;
            }
            $.ajax({
                type: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'data': data
                },
                url: 'create_live_session',
                success: function(data) {
                    if (data == 'true') {
                        toastr.success('Live Session created by  super admin');
                        window.location.href = '/admin-dashboard?create_live_session';
                    } else {
                        toastr.error('This session is already created or coach has different session at same time');
                    }

                }
            })
        } else {
            toastr.error('Filled the required field')
        }

        // var coach_id
    })
    $('.up_li_ur').on('click', function() {
        var session_name = $('#session_live_url').val();
        var session_url = $('#sess_link_custom').val();
        if (session_name.length > 0 && session_url.length > 0) {
            $.ajax({
                type: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'session_name': session_name,
                    'session_url': session_url
                },
                url: 'session_update_url',
                success: function(data) {
                    toastr.success('URL Updated');
                    if (data)
                        window.location.href = '/admin-dashboard?create_live_session';
                }
            })

        } else {
            toastr.error('Required Session Select and Session Url');
        }
    })
</script>
<script>
    $(document).ready(function() {
        moment.locale('en');
        var now = moment();
        var live_sess_data = <?php echo json_encode($live_session_data) ?>;
        var role_id = <?php echo Session::get('role-id') ?>;


        //console.log('todya',now.format('YYYY-MM-DD'));
        var static_date = now.format('YYYY-MM-DD');
        var session = ['SNC', 'HIIT', 'Yoga']
        var session_time = [{
                'SNC': {
                    'week': {
                        'Mo': ['02:00:00', '06:00:00', '17:00:00', '19:00:00'],
                        'Tu': ['02:00:00', '06:00:00', '17:00:00', '19:00:00'],
                        'We': ['02:00:00', '06:00:00', '17:00:00', '19:00:00'],
                        'Th': ['02:00:00', '06:00:00', '17:00:00', '19:00:00'],
                        'Fr': ['02:00:00', '06:00:00', '17:00:00', '19:00:00'],
                        'Sa': ['02:00:00', '06:00:00', '17:00:00', '19:00:00']
                    }
                }
            },
            {
                'HIIT': {
                    'week': {
                        'Mo': ['07:00:00', '08:00:00', '11:00:00', '18:00:00', '20:00:00', '23:00:00'],
                        'Tu': ['07:00:00', '08:00:00', '11:00:00', '18:00:00', '20:00:00', '23:00:00'],
                        'We': ['07:00:00', '08:00:00', '11:00:00', '18:00:00', '20:00:00', '23:00:00'],
                        'Th': ['07:00:00', '08:00:00', '11:00:00', '18:00:00', '20:00:00', '23:00:00'],
                        'Fr': ['07:00:00', '08:00:00', '11:00:00', '18:00:00', '20:00:00', '23:00:00'],
                        'Sa': ['07:00:00', '08:00:00', '18:00:00', '20:00:00', '23:00:00']
                    }
                }
            },
            {
                'Dance': {
                    'week': {
                        'Mo': ['18:00:00'],
                        'We': ['18:00:00'],
                        'Fr': ['18:00:00']
                    }
                }
            },
            {
                'Yoga': {
                    'week': {
                        'Mo': ['07:00:00', '18:00:00'],
                        'Tu': ['07:00:00', '18:00:00'],
                        'We': ['07:00:00', '18:00:00'],
                        'Th': ['07:00:00', '18:00:00'],
                        'Fr': ['07:00:00', '18:00:00'],
                        'Sa': ['07:00:00', '18:00:00']
                    }
                }
            }

        ]
        //console.log(session_time);
        var static_session = [];
        var events = [];
        var finan_events = [];
        var coach_li = <?php echo json_encode($coach) ?>;
        var live_session_url = <?php echo json_encode($live_session_url) ?>;

        function custom_link_expire_live_session_url(live_session_url, session_name) {
            var live_url = false;
            if (live_session_url.length > 0) {
                for (var l = 0; l < live_session_url.length; l++) {
                    if (live_session_url[l].session_name == session_name) {
                        var user_plan_end_date = moment(live_session_url[l].created_at).add(10, 'days');
                        var today = moment();
                        var diff_day = user_plan_end_date.diff(today, 'days') + 1;
                        if (diff_day > 0)
                            live_url = live_session_url[l].live_session_url;
                        break;
                    }
                }
            }
            return live_url;
        }

        //console.log(live_session_url);
        var c_li = '';
        for (var i = 0; i < coach_li.length; i++) {
            c_li = c_li + `<option value="${coach_li[i].id}">${coach_li[i].first_name}</option>`;
        }
        if (role_id == 2) {
            for (var x = 0; x < 20; x++) {
                var running_date = now.add(x, 'days');
                // var running_date2=now.add(i,'days');
                //console.log(running_date.format('dd'))
                for (var s = 0; s < session.length; s++) {
                    for (var s_t = 0; s_t < session_time.length; s_t++) {
                        //console.log('cccccc',session_time[s_t],session[s]);
                        //if(session_time[s_t].session[s].week)
                        var key_v = session[s];
                        var d_k = running_date.format('dd');
                        if (session_time[s_t][session[s]]) {
                            // console.log(session_time[s_t][session[s]]['week'][d_k])
                            var num_sess = session_time[s_t][session[s]]['week'][d_k];
                            if (num_sess) {
                                //console.log(running_date.format('YYYY-MM-DD'));
                                for (var n = 0; n < num_sess.length; n++) {
                                    var start_time = new Date(running_date.format('YYYY-MM-DD') + ' ' + num_sess[n]);
                                    var ns = convertTZ(running_date.format('YYYY-MM-DD') + ' ' + num_sess[n], '<?php echo isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata' ?>');
                                    start_time = ns.getTime() / 1000;
                                    var end_time = start_time + (1 * 3600);

                                    var url_sess = $(live_session_url).filter(function(i, n) {
                                        return n.session_name === session[s]
                                    });
                                    var update_coach_sess = `<div class="col-md-2 ">
                                                                <div onclick="custom_live_session('${custom_link_expire_live_session_url(live_session_url,session[s])}','${session[s]}','${running_date.format('YYYY-MM-DD')}','${num_sess[n]}','${create_date_check_live_session_url(live_session_url,session[s],running_date.format('YYYY-MM-DD'))}');" style="background:#31cecd" class="img_text_clg btn_clv">Create</div>
                                                            </div>`;
                                    var coach_option = `<div class="col-md-3" style="display:contents;">
                                                        <div class="assign_coach_create">
                                                            Coach Name (Select Coach for create this live session)
                                                        </div>
                                                        <div style="margin-top:20px;margin-bottom:20px">
                                                            <div class="input_style" >
                                                                <select  onchange="custom_coachSelect(this)" data-placeholder="Select Coach" class="form-control i_s c_t_i chosen-select">
                                                                    <option value=""></option>
                                                                    ${c_li}
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>`;
                                    if (role_id != 2) {
                                        coach_option = '';
                                        update_coach_sess = '';
                                    }
                                    //var session_zoom=live_sess_data[l].session_url.replace('/j', '/wc');
                                    let content_style = `<div class="row">
                                                                <div class="col-md-12">
                                                                    <p style="color:red"><b>Note: Make sure zoom link of ${session[s]} live session is active</b></p>
                                                                    ${coach_option}
                                                                    <div class="col-md-2 cl_v">
                                                                        <div class="img_clv">
                                                                            <img src="fitness/images/${session[s]}.png" class="img-responsive new_img">
                                                                        </div>
                                                                        <div class="img_text_clg">
                                                                            ${session[s]}
                                                                        </div>
                                                                    </div>
                                                                    ${update_coach_sess}


                                                                </div>
                                                            </div>`;
                                    var temp_static = {
                                        start: start_time,
                                        end: end_time,
                                        title: session[s] + ' NA',
                                        content: content_style, //live_sess_data[l].session_name+'<img src="fitness/images/'+live_sess_data[l].session_name+'.png" class="img-responsive new_img" />',
                                        category: session[s]
                                    }
                                    static_session.push(temp_static);
                                }
                            }

                        }


                    }
                }
                now = moment();
            }
        }



        for (var l = 0; l < live_sess_data.length; l++) {
            var update_coach_sess = `<div class="col-md-2 ">
                                        <div onclick="update_live_session(${live_sess_data[l].id});" style="background:#31cecd" class="img_text_clg btn_clv">Update</div>
                                    </div>`;
            var cancel_sess = `<div class="col-md-2 ">
                                <div onclick="cancel_live_session(${live_sess_data[l].id});" style="background:red" class="img_text_clg btn_clv">Cancel</div>
                            </div>`;
            var coach_option = `<div class="col-md-3" style="display:contents;">
                                <div class="assign_coach_create">
                                    Coach Name (Select Coach for update this live session)
                                </div>
                                <div style="margin-top:20px;margin-bottom:20px">
                                    <div class="input_style" >
                                        <select id="coach_s_${live_sess_data[l].id}" onchange="coachSelect(this)" data-placeholder="Select Coach" class="form-control i_s c_t_i chosen-select">
                                            <option value=""></option>
                                            ${c_li}
                                        </select>
                                    </div>
                                </div>
                            </div>`;


            var ns = convertTZ(live_sess_data[l].start_date + ' ' + live_sess_data[l].start_time, '<?php echo isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata' ?>');
            var start_time = ns.getTime() / 1000;
            var end_time = start_time + (1 * 3600);
            var session_zoom = live_sess_data[l].session_url.replace('/j', '/j');
            var zoom_link_view = `<a href="#"  onclick="copy(this)" data-code="${session_zoom}"><div class="img_text_clg btn_clv" style="background:blue;width: max-content;">Click to show Zoom</div></a>`;
            if (role_id != 2) {
                coach_option = '';
                update_coach_sess = '';
                cancel_sess = '';
                zoom_link_view = '';
            }
            let content_style = `<div class="row">
                                        <div class="col-md-12">
                                            <div><b>Total Seat :</b> ${live_sess_data[l].total_seat} </div><div style="float: right;margin-top: -20px;"><b>Total Booked Seat :</b> ${live_sess_data[l].booked_seat}</div>
                                            <p style="color:red;margin-top:14px;"><b>Note: Make sure you're logged into support@livezy.com zoom account to start the live session</b></p>
                                            ${coach_option}
                                            <div class="col-md-2 cl_v">
                                                <div class="img_clv">
                                                    <img src="fitness/images/${live_sess_data[l].session_name}.png" class="img-responsive new_img">
                                                </div>
                                                <div class="img_text_clg">
                                                    ${live_sess_data[l].session_name}
                                                </div>
                                            </div>
                                            ${cancel_sess}
                                            ${update_coach_sess}
                                            <div class="col-md-2" onclick="admin_join_session('${live_sess_data[l].id}','${live_sess_data[l].session_name}','${session_zoom}')">
                                                <div class="img_text_clg btn_clv">Join</div>
                                            </div>
                                            <div class="col-md-2 ">
                                            ${zoom_link_view}
                                                <p class="z_link"></p>
                                            </div>

                                        </div>
                                    </div>`;
            let temp = {
                start: start_time,
                end: end_time,
                title: live_sess_data[l].session_name + ' ' + live_sess_data[l].coach_name,
                content: content_style, //live_sess_data[l].session_name+'<img src="fitness/images/'+live_sess_data[l].session_name+'.png" class="img-responsive new_img" />',
                category: live_sess_data[l].session_name
            }


            //$('#coach_live_update_coach').chosen();
            events.push(temp);
        }

        for (var k = 0; k < static_session.length; k++) {
            for (var m = 0; m < events.length; m++) {
                if (static_session[k]['start'] == events[m]['start']) {
                    console.log(static_session[k]['title'].split(' ')[0])
                    if (static_session[k]['title'].split(' ')[0] == events[m]['title'].split(' ')[0]) {
                        static_session.splice(k, 1);
                    }
                }

            }

        }
        var default_view = 'day';
        if (role_id == 2) {
            events = events.concat(static_session)
            default_view = 'week';
        }
        var calendar = $('#calendar').Calendar({
            locale: 'en',
            weekends: false,
            binded: false,
            events: events,
            defaultView: {
                largeScreen: default_view
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,basicWeek,agendaDay,basicDay'
            },
            editable: true,
            now: {
                enable: false,
                refresh: false,
                heightPx: 1,
                style: 'solid',
                color: '#03A9F4'
            },

            weekday: {
                timeline: {
                    intervalMinutes: 60,
                    fromHour: 5,
                    toHour: 23
                }
            }

        }).init();

        /**
         * Listening for events
         */

        $('#calendar').on('Calendar.init', function(event, instance, before, current, after) {
            // console.log('event : Calendar.init');
            // console.log(instance);
            // console.log(before);
            // console.log(current);
            // console.log(after);
        });
        $('#calendar').on('Calendar.daynote-mouseenter', function(event, instance, elem) {
            // console.log('event : Calendar.daynote-mouseenter');
            // console.log(instance);
            // console.log(elem);
        });
        $('#calendar').on('Calendar.daynote-mouseleave', function(event, instance, elem) {
            // console.log('event : Calendar.daynote-mouseleave');
            // console.log(instance);
            // console.log(elem);
        });
        $('#calendar').on('Calendar.event-mouseenter', function(event, instance, elem) {
            event.preventDefault()
            //return false;
            // console.log('event : Calendar.event-mouseenter');
            // console.log(instance);
            // console.log(elem);
        });
        $('#calendar').on('Calendar.event-mouseleave', function(event, instance, elem) {
            return false;
            // console.log('event : Calendar.event-mouseleave');
            // console.log(instance);
            // console.log(elem);
        });
        $('#calendar').on('Calendar.daynote-click', function(event, instance, elem, evt) {
            // console.log('event : Calendar.daynote-click');
            // console.log(instance);
            // console.log(elem);
            // console.log(evt);
            //$(elem).remove();
        });
        $('#calendar').on('Calendar.event-click', function(event, instance, elem, evt) {
            // console.log('event : Calendar.event-click');
            // console.log(instance);
            // console.log(elem);
            // console.log(evt);
        });
        $('.zoom_live_view').on('click', function() {
            $('.zoom_live_view').removeClass('active_ls');
            $(this).addClass('active_ls');
            var id = $(this).attr('data-value');
            $('.ned').css('display', 'none');
            $('#' + id).css('display', 'block');
        })
        $('.analytics_view').on('click', function() {
            $('.analytics_view').removeClass('active_ls');
            $(this).addClass('active_ls');
            var id = $(this).attr('data-value');
            $('.neda').css('display', 'none');
            $('#' + id).css('display', 'block');
        })
        $('.session_live_view').on('click', function() {
            $('.session_live_view').removeClass('active_ls');
            $(this).addClass('active_ls');
            var id = $(this).attr('data-value');
            $('.neds').css('display', 'none');
            $('#' + id).css('display', 'block');
        })
        $('.member_tab_view').on('click', function() {
            $('.member_tab_view').removeClass('active_ls');
            $(this).addClass('active_ls');
            var id = $(this).attr('data-value');
            $('.neds').css('display', 'none');
            $('#' + id).css('display', 'block');
        })
        $('.payment_reports').on('click', function() {
            var url = "/admin-dashboard/payment_reports";
            window.open(url, "_blank");
        })
        $('.notification_view').on('click', function() {
            $('.notification_view').removeClass('active_ls');
            $(this).addClass('active_ls');
            var id = $(this).attr('data-value');
            $('.neds_n').css('display', 'none');
            $('#' + id).css('display', 'block');
            general_notification(' ');

        })

    });
    $('#team_details').on('click', function() {
        var team_coach_data = <?php echo json_encode($team_coach_data) ?>;
        console.log(team_coach_data);

        $('.coach_list_div').html('');
        $('.team_list_div').html('');
        $('.s_t_c').html('');
        $('.s_w_n').html('');
        for (var t = 0; t < team_coach_data.length; t++) {
            var cls = '';
            if (t == 0)
                cls = 'st_c_l_active';
            let team_li = `
                                        <div class="st_t_l ${cls}" onclick="team_view(this)" data-value="${team_coach_data[t].team_name}">${team_coach_data[t].team_name}</div>
                            `;
            $('.team_list_div').append(team_li);


        }
        $('.s_t_c').append(`<div class="st_c_l">${team_coach_data[0].service_hour}</div>`);
        $('.s_w_n').append(`<div class="st_c_l">${team_coach_data[0].whatsapp}</div>`);
        var according_condition = $(team_coach_data).filter(function(i, n) {
            return n.team_name === team_coach_data[0].team_name
        });
        var option_data = according_condition[0].assign_coach.split(',');
        var coach_id = according_condition[0].id;
        for (var i = 0; i < option_data.length; i++) {
            $('.coach_list_div').append('<div onclick="assign_voucher(' + coach_id + ',\'' + option_data[i] + '\')" class="st_c_l">' + option_data[i] + '</div>')

        }
    })

    function keyGen(keyLength) {
        var i, key = "",
            characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        var charactersLength = characters.length;

        for (i = 0; i < keyLength; i++) {
            key += characters.substr(Math.floor((Math.random() * charactersLength) + 1), 1);
        }

        return key;
    }

    function deactivate_voucher(id) {
        Swal.fire({
            title: 'Are you sure to deactivate voucher?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },
                    url: 'deactivate_voucher',
                    success: function(data) {
                        window.location.reload();
                    }
                })

            }
        })
    }

    function admin_join_session(a, b, c) {
        $.ajax({
            type: 'post',
            data: {
                '_token': '{{ csrf_token() }}',
                'sess_id': a,
                'sess_name': b,
                'sess_link': c
            },
            url: 'join_session_admin',
            success: function(data) {
                window.open(c, '_blank');
            }
        })
    }

    function team_view(id) {
        var team_coach_data = <?php echo json_encode($team_coach_data) ?>;

        $('.coach_list_div').html('');
        $('.s_t_c').html('');
        $('.s_w_n').html('');

        $('.st_t_l').removeClass('st_c_l_active');
        $(id).addClass('st_c_l_active');
        var team_val = $(id).attr('data-value');
        var according_condition = $(team_coach_data).filter(function(i, n) {
            return n.team_name === team_val
        });
        var option_data = according_condition[0].assign_coach.split(',');
        $('.s_t_c').append(`<div class="st_c_l">${according_condition[0].service_hour}</div>`);
        $('.s_w_n').append(`<div class="st_c_l">${according_condition[0].whatsapp}</div>`);
        var option_data = according_condition[0].assign_coach.split(',');
        var coach_id = according_condition[0].id
        for (var i = 0; i < option_data.length; i++) {
            $('.coach_list_div').append('<div onclick="assign_voucher(' + coach_id + ',\'' + option_data[i] + '\')" class="st_c_l">' + option_data[i] + '</div>')

        }

    }

    function assign_voucher(team_id, coach_name) {
        var v_code = keyGen(6)
        let data = {
            'team': team_id,
            'coach_name': coach_name,
            'code': v_code
        }
        Swal.fire({
            title: 'You are assigning new voucher code ' + v_code + ' to coach ' + coach_name,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'data': data
                    },
                    url: 'assign_voucher',
                    success: function(data) {
                        //window.location.reload();

                    }
                })

            }
        })
    }

    function ar_notif(a, b) {
        var not_count = parseInt($('.show-count').attr('data-count'));
        var not_id = a;
        $(b).prop('checked', true)
        Swal.fire({
            title: 'Are you sure?',
            text: `This Notification will go in archive folder and treated as a read by you`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, archive it!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'notif_id': not_id
                    },
                    url: 'notif_archive',
                    success: function(data) {
                        if (data) {
                            $('#notif_' + not_id).remove();
                            $('.show-count').attr('data-count', (not_count - 1));
                            $('.aktif').click();
                        }
                    }
                })

            } else {
                $(b).prop('checked', false)
            }
        })


    }

    $('.notif_filter').on('click', function() {
        var filter_type = $(this).attr('data-value');
        general_notification(filter_type);

    })

    function general_notification(filter_type) {
        var filter_text = 'All';
        var paging_li = 'paging_archive';
        if (filter_type.length > 2)
            filter_text = filter_type;
        var type_notif = parseInt($('.notification_view.active_ls').attr('data-id'));
        var list_li = 'listPage_archive';
        var url_notif = 'get_archive_notif';
        var notif_data = true;
        if (type_notif == 1) {
            list_li = 'listPage';
            url_notif = 'get-notification';
            notif_data = false;
            paging_li = 'paging';
        }

        $.ajax({
            type: 'post',
            data: {
                '_token': '{{ csrf_token() }}',
                'filter_type': filter_type
            },
            url: url_notif,
            success: function(data) {
                $('#' + list_li).html(' ');
                if (data) {
                    $('#' + paging_li).remove();



                    var result = JSON.parse(data);
                    for (var i = 0; i < result.length; i++) {
                        if (notif_data) {
                            let append_data = `<li class="outer_notification" data-id="${result[i].id}">
                                        <div class="col-md-12 notif_style">

                                            <div class="out_not_box">
                                                <div class="l_s_n header_noti">
                                                    <span>${result[i].notification_type}</span>
                                                </div>
                                                <hr>
                                                <div class="r_s_n">
                                                    Created at ${result[i].created_at}
                                                </div>
                                                <div class="l_s_n">
                                                    <span>Head Coach : ${result[i].head_coach}</span>
                                                </div>
                                                <div class="l_s_n">
                                                    <span>User Id : ${result[i].username}</span>
                                                </div>


                                                <div class="l_s_n">
                                                    Name : ${result[i].name}
                                                </div>
                                                <div class="l_s_n">
                                                    ${result[i].mob_no}
                                                </div>
                                                <div class="l_s_n">
                                                    ${result[i].description}
                                                </div>
                                                <div class="r_s_n" style="margin-bottom:14px;">
                                                    Updated at <b>${result[i].updated_at}</b> Updated By <b>${result[i].first_name}</b>
                                                </div>
                                            </div>


                                        </div>
                                    </li>`;
                            $('#' + list_li).append(append_data);
                        } else {
                            let append_data = `<li class="outer_notification" id="notif_${result[i].id}" data-id="${result[i].id}">
                                    <div class="col-md-12 notif_style">

                                        <div class="out_not_box">
                                            <div class="l_s_n header_noti">
                                                <span>${result[i].notification_type}</span>
                                            </div>
                                            <div class="l_s_n header_noti new_n_s">
                                                <span>Marked as Done<input type="checkbox" onclick="ar_notif(${result[i].id},this)" name="notify" data-li="${result[i].id}" class="ar_notif"></span>
                                            </div>
                                            <hr>
                                            <div class="r_s_n">
                                                ${result[i].created_at}
                                            </div>
                                            <div class="l_s_n">
                                                    <span>Head Coach : ${result[i].head_coach}</span>
                                                </div>
                                            <div class="l_s_n">
                                                <span>User Id : ${result[i].username}</span>
                                            </div>


                                            <div class="l_s_n">
                                                Name : ${result[i].name}
                                            </div>
                                            <div class="l_s_n">
                                                ${result[i].mob_no}
                                            </div>
                                            <div class="l_s_n">
                                                ${result[i].description}
                                            </div>
                                        </div>


                                    </div>
                                </li>`;
                            $('#' + list_li).append(append_data);
                        }
                    }
                    if (list_li == 'listPage') {
                        $("#listPage").JPaging({
                            visiblePageSize: 1,
                            pageSize: 3

                        });
                    } else {
                        $("#listPage_archive").Jpaging_archive({
                            visiblePageSize: 1,
                            pageSize: 3

                        });
                    }
                    $('.aktif').click(); //solve pagination

                    //toastr.success('New Notification');
                    reload = true;
                } else {
                    $('#' + paging_li).css('display', 'none');
                    $('#' + list_li).append('<p style="color:red;">There are no result for ' + filter_text + ' filter</p><img class="img-responsive center" src="fitness/images/error.png">');
                }
            }
        })
    }
    $(document).ready(function() {
        var current_url = window.location.href;

        if (current_url.indexOf('?') != -1) {
            if (current_url.indexOf('#') != -1)
                current_url = current_url.slice(0, -1);
            current_url = current_url.split("?").pop();
            $('#' + current_url).click();
        }
    })
</script>
<script>
    $(window).on("load", function() {
        $('.pre-loader-admin').css('display', 'none');
        $('.parent-admin').css('opacity', '1');
        $('.parent-admin').css('transition', 'opacity .40s ease-in-out');
    });
</script>

<?php // dd($live_sess_analytics); ?>

<script>


    '<?php $feedback = isset($live_sess_analytics['feedback']) ? $live_sess_analytics['feedback'] : []; ?>';
    var liv_sess_analy = '<?php json_encode(is_array($feedback) ? array_values($feedback) : []); ?>';
    var liv_sess_analytics = JSON.parse(liv_sess_analy);
    var total_liv_sess_analy = '<?php echo json_encode(array_values($live_sess_analytics ? $live_sess_analytics['total_user'] : [])) ?>';
    var total_liv_sess_analytics = JSON.parse(total_liv_sess_analy);
    // console.log(total_liv_sess_analytics)
    var total_live_user = parseInt('<?php echo $total_liv_user; ?>');
    var total_feedback_user = '<?php is_array($feedback) ? sizeof($feedback) : 0; ?>';
    // var filter_liv_data=$(liv_sess_analytics).filter(function (i,n){if (liv_sess_analytics[i].session_name=='SNC') return liv_sess_analytics[i]});
    function live_sess_analytics(liv_sess_analytics, total_liv_sess_analytics, total_live_user, total_feedback_user) {
        var all_sess = _.countBy(liv_sess_analytics, function(liv_sess_analytics) {
            return liv_sess_analytics.session_name;
        });
        var all_sess_coach = _.countBy(liv_sess_analytics, function(liv_sess_analytics) {
            return liv_sess_analytics.coach_name;
        });

        var all_sess_by_coach = _.countBy(total_liv_sess_analytics, function(total_liv_sess_analytics) {
            return total_liv_sess_analytics.coach_name;
        });
        // console.log(all_sess_by_coach)
        var total_sess_count = _.countBy(total_liv_sess_analytics, function(total_liv_sess_analytics) {
            return total_liv_sess_analytics.session_name;
        });
        var lable_overall = Object.keys(total_sess_count);
        var overall_rating = [];
        var over_a_r = 0;
        // var actual_a_r=0;
        for (var k = 0; k < lable_overall.length; k++) {
            var sum_rating = 0;
            var count = 0;
            for (var i = 0; i < liv_sess_analytics.length; i++) {
                if (lable_overall[k] == liv_sess_analytics[i].session_name) {
                    sum_rating = sum_rating + liv_sess_analytics[i].star;
                    // console.log(sum_rating)
                    over_a_r = over_a_r + liv_sess_analytics[i].star;
                    count = count + 1;
                }
            }

            var temp_sess = {
                'sess': lable_overall[k],
                'sess_val': parseFloat(sum_rating / count).toFixed(2),
                'overall': parseFloat(sum_rating / total_sess_count[lable_overall[k]]).toFixed(2)
            };
            overall_rating.push(temp_sess);
        }


        let over_sess_coach = `<table class="rwd-table">
                                <tr>
                                    <th>Live Session</th>
                                    <th>Actual</th>
                                    <th>Overall</th>
                                </tr><tr>
                                    <td data-th="Movie Title">Organization</td>
                                    <td data-th="Year">${(parseInt(over_a_r)/parseInt(total_feedback_user)).toFixed(2)}</td>
                                    <td data-th="Gross">${(parseInt(over_a_r)/parseInt(total_live_user)).toFixed(2)}</td>
                                </tr>
                                </table>`;

        // $('.over_orga').html(first_a1);
        let formate_wise = `<table class="rwd-table">
                                <tr>
                                    <th>Formate Wise</th>
                                    <th>Actual</th>
                                    <th>Overall</th>
                                </tr>
                                `;
        let formate_tr = '';
        // $('.over_orga').append(formate_wise);
        for (var i = 0; i < overall_rating.length; i++) {
            let temp_formate_tr = `<tr>
                                    <td data-th="Movie Title">${overall_rating[i].sess}</td>
                                    <td data-th="Year">${overall_rating[i].sess_val}</td>
                                    <td data-th="Gross">${overall_rating[i].overall}</td>
                                </tr>`;

            formate_tr = formate_tr + temp_formate_tr;
            // $('.over_orga').append(formate_sess);
        }
        let formate_end = '</table>';
        let overall_formate = formate_wise + formate_tr + formate_end;

        let coach_wise = `<table class="rwd-table">
                                <tr>
                                    <th>Coach Wise</th>
                                    <th>Actual</th>
                                    <th>Overall</th>
                                </tr>
                                `;
        let coach_tr = '';
        var coach_lable = Object.keys(all_sess_by_coach);
        var overall_rating_caoch = [];
        for (var k = 0; k < coach_lable.length; k++) {
            var sum_rating = 0;
            var count = 0;
            for (var i = 0; i < liv_sess_analytics.length; i++) {
                if (coach_lable[k] == liv_sess_analytics[i].coach_name) {
                    sum_rating = sum_rating + liv_sess_analytics[i].star;
                    count = count + 1;
                }
            }
            var temp_sess = {
                'sess': coach_lable[k],
                'sess_val': parseFloat(sum_rating / count).toFixed(2),
                'overall': parseFloat(sum_rating / all_sess_by_coach[coach_lable[k]]).toFixed(2)
            };
            overall_rating_caoch.push(temp_sess);
        }
        // console.log(overall_rating_caoch);


        for (var i = 0; i < overall_rating_caoch.length; i++) {
            let temp_coach_tr = `<tr>
                                    <td data-th="Movie Title">${overall_rating_caoch[i].sess}</td>
                                    <td data-th="Year">${overall_rating_caoch[i].sess_val}</td>
                                    <td data-th="Gross">${overall_rating_caoch[i].overall}</td>
                                </tr>`;

            coach_tr = coach_tr + temp_coach_tr;
        }
        let coach_end = '</table>';
        let overall_coach = coach_wise + coach_tr + coach_end;
        $('.over_orga').append(overall_coach);
        $('.over_orga').append(overall_formate);
        $('.over_orga').append(over_sess_coach);
    }
    live_sess_analytics(liv_sess_analytics, total_liv_sess_analytics, total_live_user, total_feedback_user)
    $('.analytics_liv').on('change', function() {
        var from_date = $('#from_liv_ana').val();
        var to_date = $('#to_liv_ana').val();
        if (from_date && to_date) {
            $.ajax({
                type: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'start_date': from_date,
                    'to_date': to_date
                },
                url: 'liv_sess_analytics',
                success: function(data) {
                    $('.over_orga').html('');
                    if (data) {
                        var all_data = JSON.parse(data);
                        console.log(all_data)
                        live_sess_analytics(all_data.feedback, all_data.total_user, all_data.total_user.length, all_data.feedback.length)
                    }
                }
            })
        }

    })

    var coach_oper_ana='<?php echo json_encode(array_values($retension?$retension:[])) ?>';
    var coach_oper_analytics=JSON.parse(coach_oper_ana);
    // console.log(coach_oper_analytics);
    // $('.over_orga').html(first_a1);
    function coach_retension(coach_retension_percent){
        var coach_oper_analytics=coach_retension_percent;
        let formate_wise=`<table class="rwd-table">
                            <tr>
                                <th>Coach Name</th>
                                <th>First Date Assign</th>
                                <th>Last Date Assign</th>
                                <th>Total New Assign</th>
                                <th>Retention Percentage</th>
                            </tr>
                            `;
        let formate_tr='';
        // $('.over_orga').append(formate_wise);
        for(var i=0;i<coach_oper_analytics.length;i++){
            let temp_formate_tr=`<tr>
                                <td data-th="Movie Title">${coach_oper_analytics[i].coach}</td>
                                <td data-th="Year">${coach_oper_analytics[i].first_assign}</td>
                                <td data-th="Gross">${coach_oper_analytics[i].last_assign}</td>
                                <td data-th="Gross">${coach_oper_analytics[i].new_assign}</td>
                                <td data-th="Gross">${coach_oper_analytics[i].rt_p}</td>
                            </tr>`;
            if(coach_oper_analytics[i].coach)
                formate_tr=formate_tr+temp_formate_tr;
            // $('.over_orga').append(formate_sess);
        }
        let formate_end='</table>';
        let overall_formate=formate_wise+formate_tr+formate_end;
        $('.over_orga_operational').append(overall_formate);
    }
    coach_retension(coach_oper_analytics);
    $('.analytics_liv_ret').on('change',function(){
        var from_date=$('#from_liv_avo').val();
        var to_date=$('#to_liv_avo').val();
        if(from_date && to_date){
            $.ajax({
                    type:'post',
                    data:{'_token': '{{ csrf_token() }}','start_date':from_date,'to_date':to_date},
                    url:'coach_retension',
                    success:function(data){
                        $('.over_orga_operational').html('');
                        if(data){
                            var all_data=JSON.parse(data);
                            // console.log(all_data)
                            coach_retension(all_data);
                        }
                    }
                })
        }

    })

    var finance_oper_ana = '<?php echo json_encode(array_values($finance ? $finance : [])) ?>';
    var finance_oper_analytics = JSON.parse(finance_oper_ana);
    // console.log(finance_oper_analytics);
    // $('.over_orga').html(first_a1);
    function finance_retension(finance_retension_percent) {
        var finance_oper_analytics = finance_retension_percent
        let formate_wise = `<table class="rwd-table">
                                <tr>
                                    <th>Package Name</th>
                                    <th>Current Range</th>
                                    <th>Previous Range</th>
                                </tr>
                                `;
        let formate_tr = '';
        // $('.over_orga').append(formate_wise);
        for (var i = 0; i < finance_oper_analytics.length; i++) {
            let temp_formate_tr = `<tr>
                                    <td data-th="Movie Title" style="text-transform: capitalize;">${finance_oper_analytics[i].plan}</td>
                                    <td data-th="Year">${finance_oper_analytics[i].current}</td>
                                    <td data-th="Gross">${finance_oper_analytics[i].previous}</td>
                                </tr>`;
            if (finance_oper_analytics[i].plan)
                formate_tr = formate_tr + temp_formate_tr;
            // $('.over_orga').append(formate_sess);
        }
        let formate_end = '</table>';
        let overall_formate = formate_wise + formate_tr + formate_end;
        $('.over_orga_finance').append(overall_formate);
    }
    finance_retension(finance_oper_analytics);
    $('.finance_liv_ret').on('change', function() {
        var from_date = $('#from_liv_fvo').val();
        var to_date = $('#to_liv_fvo').val();
        if (from_date && to_date) {
            $.ajax({
                type: 'post',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'start_date': from_date,
                    'to_date': to_date
                },
                url: 'financeSale',
                success: function(data) {
                    $('.over_orga_finance').html('');
                    if (data) {
                        var all_data = JSON.parse(data);
                        finance_retension(all_data);
                    }
                }
            })
        }

    })
    // function operatinal_activity_model(oper){
    //     var oper_model='';
    //     switch(oper_model) {
    //         case 'add_delete':
    //             $('#add_user')
    //             break;
    //         case 'SNC':
    //             rename_sess='DB SNC';
    //             break;
    //         case 'Yoga':
    //             rename_sess='Power Yoga';
    //             break;
    //         case 'Dance':
    //             rename_sess='Dance Fitness';
    //             break;
    //     }
    //     return rename_sess;
    // }
    $('#select_oper_activity').on('change', function() {
        var change_val = $('#select_oper_activity').val();
        $('#' + change_val).modal('show');
        $("#select_oper_activity").val('default');
    })
</script>

<script>
    $('#add-coach').on('click', function() {
        $('#add_coach').modal('show');
        $('#add-coach-form').trigger("reset");
        $('.hide-on-view').show();
        $('#add-coach-form :input').prop('disabled', false);
        $('#add_coach').find('.modal-header > h4').text("Add New Coach").end();
        $('#submit-coach').show();
    });

    function view_coach_details(id) {
        $.ajax({
            type    : 'get',
            url     : '/get-coach/'+id,
            success : function(data) {
                // console.log(data[0]); // return false;
                $('#add-coach-form :input').prop('disabled', true);
                $('.hide-on-view').hide();
                $('#add_coach').modal('show');
                $('#add_coach').find('.modal-header > h4').text("View Coach Details").end();
                $('#first_name').val(data[0]['first_name']);
                $('#last_name').val(data[0]['last_name']);
                $('#email_id').val(data[0]['email_id']);
                $('#mobile_no').val(data[0]['mob_number']);
                $('#whatsapp_no').val(data[0]['coach_whatsapp']);
                $('#designation').val(data[0]['designation']);
                $('#coach_tier').val(data[0]['coach_tier']);
                $("#role").val(data[0]['role']);
                $('#password').attr("disabled", "disabled");
                $('#slot_count').val(data[0]['slots']);
                $('#display_order').val(data[0]['display_order']);
                $('#experience').val(data[0]['experience']);
                $('#clients_trained').val(data[0]['clients_trained']);
                $('#cert_short').val(data[0]['cert_short']);
                $('#focus_areas').val(data[0]['focus_areas']);
                $('#instagram').val(data[0]['instagram']);
                $('#about_coach').val(data[0]['about_coach']);
                $('#submit-coach').hide();

                var gender = data[0]['gender'];
                if(gender === 'Male') { $('input:radio[name=gender]')[0].checked = true; }
                if(gender === 'Female') { $('input:radio[name=gender]')[1].checked = true; }
                if(gender === 'Other') { $('input:radio[name=gender]')[1].checked = true; }

            }
        });
    }

    function edit_coach_details(id) {
        $.ajax({
            type    : 'get',
            url     : '/edit-coach/'+id,
            success : function(data) {
                // console.log(data[0]); // return false;
                $('#coach_id').val(id);
                $('.hide-on-view').show();
                $('#submit-coach').show();
                $('#add_coach').modal('show');
                $('#add_coach').find('.modal-header > h4').text("Edit Coach Details").end();
                $('#first_name').val(data[0]['first_name']);
                $('#last_name').val(data[0]['last_name']);
                $('#email_id').val(data[0]['email_id']);
                $('#mobile_no').val(data[0]['mob_number']);
                $('#whatsapp_no').val(data[0]['coach_whatsapp']);
                $('#designation').val(data[0]['designation']);
                $('#coach_tier').val(data[0]['coach_tier']);
                $("#role").val(data[0]['role']);
                $('#password').attr("disabled", "disabled");
                $('#slot_count').val(data[0]['slots']);
                $('#display_order').val(data[0]['display_order']);
                $('#experience').val(data[0]['experience']);
                $('#clients_trained').val(data[0]['clients_trained']);
                $('#cert_short').val(data[0]['cert_short']);
                $('#focus_areas').val(data[0]['focus_areas']);
                $('#instagram').val(data[0]['instagram']);
                $('#about_coach').val(data[0]['about_coach']);

                var gender = data[0]['gender'];
                if(gender === 'Male') { $('input:radio[name=gender]')[0].checked = true; }
                if(gender === 'Female') { $('input:radio[name=gender]')[1].checked = true; }
                if(gender === 'Other') { $('input:radio[name=gender]')[1].checked = true; }

            }
        });
    }

    function change_coach_status(id, status) {
        $.ajax({
            type    : 'get',
            url     : '/change-coach-status/'+id+'/'+status,
            success : function(data) {
                location.reload();
            }
        });
    }

    function add_transformation_data(id,coach_name) {
        $('#add_transformation_data').modal('show');
        $('#coach_img_id').val(id);
        $('#coachName').text(coach_name);
    }

    function add_certification_data(id,coach_name) {
        $('#add_certification_data').modal('show');
        $('#cert_img_id').val(id);
        $('#coach_name').text(coach_name);
    }

</script>
</html>
