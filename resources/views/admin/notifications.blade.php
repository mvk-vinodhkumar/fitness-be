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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css" id="theme-styles">

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chosen-js@1.8.7/chosen.jquery.min.js"></script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-database.js"></script>
    <script src="../login/js/pignose.calendar.full.min.js"></script>
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

    if(Session::get('role-id')==1 || Session::get('team')!='Internal')
    { ?>
        <style>
            .buttons-html5 {
                display: none !important;
            }
        </style>
    <?php
    }
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
                        <?php } else { ?>
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
                            <li id="notification" class="nav-item menu_li active_menu">
                                <a href="/admin-dashboard/notifications" class="t_d_n">
                                    <span class="title menu_li_span">Notifications</span>
                                </a>
                            </li>

                            <li id="transform" class="nav-item menu_li">
                                <a href="/admin-dashboard/transform" class="t_d_n">
                                    <span class="title menu_li_span">Transform</span>
                                </a>
                            </li>
                            <?php if(Session::get('role-id')==2 && Session::get('team')=='Internal') { ?>
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
                    <div class="notification p_d">
                        <div class="col-md-12">
                            <div class="col-md-3 notification_view active_ls" data-id="1" data-value="i_c_n">Important Notification</div>
                            <div class="col-md-3 notification_view" data-id="0" data-value="i_o_n">Archived Notification</div>
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
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <ul class="all_notification" id="listPage">

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

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    var reload = false;

    $(document).ready(function() {

        $('.notification').show();

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

        $('.notification_view').on('click', function() {
            $('.notification_view').removeClass('active_ls');
            $(this).addClass('active_ls');
            var id = $(this).attr('data-value');
            $('.neds_n').css('display', 'none');
            $('#' + id).css('display', 'block');
            general_notification(' ');
        });

        $.ajax({
            url: 'get_notification_data',
            method: 'GET',
            global: true,
            dataType: 'json',
            success: function (response) {

                // Check if the API response contains response
                if (response && response.length > 0) {
                    var notificationList = $('#listPage');

                    // Clear any existing list items
                    notificationList.empty();

                    // Loop through the notifications and append them to the list
                    $.each(response, function (index, notification) {
                        var listItem = '<li class="outer_notification" id="notif_' + notification.id + '" data-id="' + notification.id + '">' +
                            '<div class="col-md-12 notif_style">' +
                            '<div class="out_not_box">' +
                            '<div class="l_s_n header_noti">' +
                            '<span>' + notification.notification_type + '</span>' +
                            '</div>' +
                            '<div class="l_s_n header_noti new_n_s">' +
                            '<span>Marked as Done<input type="checkbox" onclick="ar_notif(\'' + notification.id + '\', this)" name="notify" data-li="' + notification.id + '" class="ar_notif"></span>' +
                            '</div>' +
                            '<hr>' +
                            '<div class="r_s_n">' + notification.created_at + '</div>' +
                            '<div class="l_s_n">' +
                            '<span>Head Coach : ' + notification.head_coach + '</span>' +
                            '</div>' +
                            '<div class="l_s_n">' +
                            '<span>User Id : ' + notification.username + '</span>' +
                            '</div>' +
                            '<div class="l_s_n">' +
                            'Name : ' + notification.name +
                            '</div>' +
                            '<div class="l_s_n">' +
                            notification.mob_no +
                            '</div>' +
                            '<div class="l_s_n">' +
                            notification.description +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</li>';

                        notificationList.append(listItem);
                    });
                } else {
                    // If no notifications are returned by the API, display a message
                    $('#listPage').html('<p style="color:red;">No Notification</p><img class="img-responsive center" src="../fitness/images/error.png">');
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });

        $.ajax({
            url: '/get_notification_archive_data',
            type: 'GET',
            global: true,
            dataType: 'json',
            success: function(data) {
                // Check if the API response contains data
                if (data && data.length > 0) {

                    var notificationArchive = $('#listPage_archive');

                    // Clear any existing list items
                    notificationArchive.empty();

                    // Loop through the data and append them to the list
                    $.each(data, function (index, item) {

                            var listItem = `<li class="outer_notification" id="notif_archive_${item.id}" data-id="${item.id}">
                                    <div class="col-md-12 notif_style">
                                        <div class="out_not_box">
                                            <div class="l_s_n header_noti">
                                                <span>${item.notification_type}</span>
                                            </div>
                                            <hr>
                                            <div class="r_s_n">${item.created_at}</div>
                                            <div class="l_s_n"><span>User Id : ${item.head_coach}</span></div>
                                            <div class="l_s_n"><span>User Id : ${item.username}</span></div>
                                            <div class="l_s_n">Name : ${item.name}</div>
                                            <div class="l_s_n">${item.mob_no}</div>
                                            <div class="l_s_n">${item.description}</div>
                                            <div class="r_s_n" style="margin-bottom:14px;">
                                                Updated at <b>${item.updated_at}</b> Updated By <b>${item.first_name}</b>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            `;
                        notificationArchive.append(listItem);
                    });
                } else {
                    // If no notifications are returned by the API, display a message
                    $('#listPage_archive').html('<p style="color:red;">No Notification</p><img class="img-responsive center" src="../fitness/images/error.png">');
                }
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });

    });

    $("#listPage").JPaging({
        visiblePageSize: 1,
        pageSize: 3
    });

    $("#listPage_archive").Jpaging_archive({
        visiblePageSize: 1,
        pageSize: 3
    });

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
                    url: '/notif_archive',
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
        var url_notif = '/get_archive_notif';
        var notif_data = true;
        if (type_notif == 1) {
            list_li = 'listPage';
            url_notif = '/get-notification';
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
                    $('#' + list_li).append('<p style="color:red;">There are no result for ' + filter_text + ' filter</p><img class="img-responsive center" src="../fitness/images/error.png">');
                }
            }
        })
    }

    $('.container-notifications').on('click', function() {
        $('#notification').click();
    })

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
