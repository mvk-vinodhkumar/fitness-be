<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="manifest" href="manifest.json">
    <meta name="google" content="notranslate">
    <title>Online Fitness Coaching | Livezy</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="PWA">
    <link rel="apple-touch-icon" href="fitness/images/png2.png">
    <link href="fitness/mobile/icon_splash/144x144.png"
        media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="fitness/mobile/icon_splash/144x144.png"
        media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="fitness/mobile/icon_splash/144x144.png"
        media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)"
        rel="apple-touch-startup-image" />
    <link href="fitness/mobile/icon_splash/144x144.png"
        media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)"
        rel="apple-touch-startup-image" />
    <link href="fitness/mobile/icon_splash/144x144.png"
        media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="fitness/mobile/icon_splash/144x144.png"
        media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)"
        rel="apple-touch-startup-image" />
    <link href="fitness/mobile/icon_splash/144x144.png"
        media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="fitness/mobile/icon_splash/144x144.png"
        media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="fitness/mobile/icon_splash/144x144.png"
        media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="fitness/mobile/icon_splash/144x144.png"
        media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <!-- Favicons -->
    <link href="fitness/images/png2.png" rel="icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="fitness/mobile/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="fitness/mobile/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="fitness/mobile/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="fitness/mobile/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="fitness/mobile/assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="fitness/mobile/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="fitness/css/flaticon.css" rel="stylesheet">
    <link href="fitness/css/custom.css?v3" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="fitness/mobile/assets/css/style.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e2ac9cc532.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet"
        type="text/css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <link type="text/css" href="login/css/pignose.calendar.min.css" rel="stylesheet" />
    <link href="fitness/css/pagination/jqpaginator.css?v=1" type="text/css" rel="stylesheet" />
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="fitness/css/lucky.css" rel="stylesheet">

    <script>
        function convertTZ(date, tzString) {
            var date = date.replace(/ /g, "T")
            return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {
                timeZone: tzString
            }));
        }
    </script>
    <script defer src="fitness/js/filter.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/country-states.js') }}"></script>
</head>

<?php
$extend_day = 7;
if ($users->member_type != 'Live Session') {
    $extend_day = 14;
}
if ($pop_up) {
    $extend_day = 15;
    if ($users->member_type != 'Live Session') {
        $extend_day = 30;
    }
}
?>
<?php
function session_name_rechange($sess_name)
{
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
    return $rename_sess;
}
?>
<style>
    html {
        scroll-behavior: smooth !important;
    }

    #scroll-top {
        display: block !important;
    }

    #pwaa {
        display: none;
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #fff;
        z-index: 99999;
        letter-spacing: 2px;
    }

    .class_download {
        float: right;
        font-size: 20px;
        margin-top: 24px;
        margin-right: 12px;
    }

    .logo_img {}

    .liv_ezy_text {
        font-size: 22px;
        margin-left: 10px;
        color: #000 !important;
    }

    span.excerpt.d-block {
        display: none !important;
    }

    .own-member-item .mem-tax {
        /* bottom:6px; */
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 0.6em;
        line-height: 188.2%;
        /* or 15px */
        text-align: center;
        color: #000000;
        /* margin-bottom: 5px; */
    }

    /* .own-member-item{
      width:31%;
    } */
    .header_logo {
        margin-left: 14px;
        margin-top: -6px;
    }

    .mobile-nav-toggle {
        /* padding: 10px; */
        /* padding-left: 11px;
      right:0; */
        left: 50px;
        position: absolute;
        z-index: 5;
        top: 12px;
        display: block !important;
    }

    .img-whats-app {
        height:60px;
        margin-bottom: 30px;
        /* height: 45px; */
    }

    #telNo {
        border: none !important;
    }

    .whats-app-div,
    .support_email {
        position: fixed;
        bottom: 50px;
        right: 20px;
        z-index: 3;
        cursor: pointer;
    }

    .loggin_div {
        display: flex;
        /* padding: 14px; */
        /* line-height: 56px; */
        font-size: 0.9em;
        /* font-weight: 700; */
        color: #9d9d9d;
        /* padding-right: 14px; */
    }

    /* .price.pd-20{
        padding:unset!important;
    } */
    .login1 {
        margin-right: 10px;
        margin-top: 6px;
        cursor: pointer;
    }

    .login2 {
        margin-top: 4px;
    }

    .location_flag {
        margin-right: 6px;
        width: 25px;
        border-radius: 4px;
    }

    .logo_img {
        max-height: 30px !important;
        vertical-align: baseline;
        /* margin-left: 14px; */
    }

    .flag_text {
        font-family: Open Sans;
        font-style: normal;
        /* font-weight: 600; */
        font-size: 1em;
        line-height: 28px;
        margin-right: 10px;
        color: #000000;
    }

    #header {
        height: 50px;
    }

    /* .login1 {
        padding-right: 48px;
    }
    .location {
        color: green;
        cursor: pointer;
    }
    .location_flag {
        padding-right: 10px;
        height: 16px;
    }
    .login2 {
        padding-right: 10px;
    }
    .common_login {
        padding-right: 14px;
        cursor: pointer;
    } */
    @media (min-width: 576px) {
        .modal-dialog:not(.modal-lg) {
            max-width: 400px;
        }
    }

    .form-title {
        margin: -2rem 0rem 2rem;
    }

    .text-center {
        text-align: center !important;
    }

    .btn-round {
        border-radius: 3rem;
    }

    .delimiter {
        padding: 1rem;
    }

    .social-buttons .btn {
        margin: 0 0.5rem 1rem;
        height: 54px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        font-size: 30px;
        line-height: 1px;
    }

    .social-buttons .google {
        color: #d54c3f;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
    }

    .social-buttons .facebook {
        color: #1877f2;
        box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
    }

    .social-buttons .google:hover {
        box-shadow: 0 5px 15px rgba(273, 76, 63, .5);
    }

    .social-buttons .facebook:hover {
        box-shadow: 0 5px 15px rgba(24, 119, 242, .5);
    }

    .signup-section {
        padding: 0.3rem 0rem;
    }

    /* .modal-backdrop {
      opacity: 1 !important;
      background: white;
    }
    .modal-dialog{
      margin:unset!important;
      border:none;
    }  */
    .modal {
        padding: 30px;
        /* top: 55px; */
    }

    #renew_modal_new {
        padding: 0px;
        top: 0px;
    }

    #renew_modal_new .modal-lg {
        max-width: 1000px;
    }

    #renew_modal_new {
        z-index: 9999;
    }

    .membership-modal .modal-body p {
        font-size: 12px;
    }

    .membership-modal .modal-body {
        font-size: 11px;
    }

    .country-list {
        max-height: 150px !important;
    }

    .iti-mobile .intl-tel-input.iti-container {
        top: 320px !important;
    }

    .membership-modal-prog-fea h3 {
        margin-bottom: 4px;
    }

    html,
    body {
        height: unset;
    }

    #header {
        z-index: 4;
    }

    .login-img {
        width: 28%;
        /* margin-left: 34%; */
        margin-top: 16%;
    }

    .login_text_l {
        font-size: 60px;
        margin-top: 30px;
    }

    .login_btn_l {
        color: #fff;
        background-color: #187FDE;
        border-color: #187FDE;
        font-family: 'BrandonTextWeb-Bold';
        font-size: 20px;
    }

    .term_l {
        color: #ff0000b3;
    }

    .social-margin {
        margin-top: 18px;
        margin-bottom: 20px;
    }

    .text-muted-margin {
        margin-top: 48px;
        font-size: 20px;
    }

    .margin-ul {
        margin-top: 56px;
    }

    .li_t_style {
        text-align: justify;
        font-size: 14px;
        list-style: disc;
        margin-right: 30px;
        margin-left: -12px;
        color: #656565;
    }

    .flag-container {
        margin-bottom: 4px;
    }

    #telNo {
        width: 350px;
        border: none;
        outline: none;
        border-bottom: 1px solid #b3a6a6;
        /* font-size: 20px; */
        /* letter-spacing:2px; */
    }

    #userEmail {
        width: 325px;
        border: none;
        outline: none;
        border-bottom: 1px solid #b3a6a6;
        font-size: 20px;
        letter-spacing: 2px;
        padding-top: 14px;
        margin-bottom: 14px;
        display: none;
    }

    #f_n_p_o {
        width: 325px;
        border: none;
        outline: none;
        border-bottom: 1px solid #b3a6a6;
        font-size: 20px;
        letter-spacing: 2px;
        padding-top: 14px;
        margin-bottom: 14px;
    }

    #f_c_p_o {
        width: 325px;
        border: none;
        outline: none;
        border-bottom: 1px solid #b3a6a6;
        font-size: 20px;
        letter-spacing: 2px;
        padding-top: 14px;
        margin-bottom: 14px;
    }

    .first_login_mod {
        /* display:none; */
    }

    /*otp enter css*/
    .containers {
        display: flex;
        flex-flow: column;
        height: 100%;
        align-items: space-around;
        justify-content: center;
    }

    .userInput {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .enter_otp {
        margin: 2px;
        height: 35px;
        width: 50px;
        border: none;
        border-radius: 5px;
        text-align: center;
        font-family: arimo;
        font-size: 1.2rem;
        background: #eef2f3;
        font-size: 20px;
        outline: none;
    }

    .otp_h1 {
        text-align: center;
        font-family: inherit;
        color: #505050;
        font-size: 18px;
    }

    #resend_otp {
        color: #32cfce;
        cursor: pointer;
        /* font-size:18px;    */
    }

    .l_a_m {
        margin-top: 30px;
    }

    .resend_text {
        margin-top: 20px;
        text-align: center;
        margin-bottom: 20px;
    }

    .f_p {
        color: #32cfce;
        cursor: pointer;
    }

    .f_p:hover {
        text-decoration: underline;
    }

    .login_close {
        color: #9c9a9a !important;
        margin-top: -14px !important;
        margin-right: -10px !important;
        font-size: 40px !important;
    }

    .login_close:hover {
        color: #000 !important;
    }

    .intl-tel-input .country-list {
        width: 326px;
    }

    .second_mod {
        transition: all .3s ease-in-out;
        display: none;
    }

    .forget_mode {
        transition: all .3s ease-in-out;
        display: none;
    }

    .password_mod {
        transition: all .3s ease-in-out;
        display: none;
    }

    .password_mod_otp {
        transition: all .3s ease-in-out;
        display: none;
    }

    .l_p_e {
        outline: none;
        border: 0px;
        border-bottom: 1px solid #b1b0b0;
        width: 256px;
        font-size: 20px;
    }

    .otp_cnf {
        outline: none;
        font-size: 20px;
        width: 150px;
        height: 40px;
        margin: 25px auto 0px auto;
        font-family: arimo;
        font-size: 1.1rem;
        border: none;
        border-radius: 5px;
        letter-spacing: 2px;
        cursor: pointer;
        background: #616161;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #32cfce, #32cfce);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #32cfce, #32cfce);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }

    /* width */
    body::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    body::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    body::-webkit-scrollbar-thumb {
        background: #3a3838;
        border-radius: 10px;
    }

    /* width */
    .intl-tel-input .country-list::-webkit-scrollbar {
        width: 4px;
        height: 4px;
    }

    /* Track */
    .intl-tel-input .country-list::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    .intl-tel-input .country-list::-webkit-scrollbar-thumb {
        background: #3a3838;
        border-radius: 10px;
    }

    #otp_login_forget {
        display: none;
    }

    #password_mod_otp {
        display: none;
    }

    .d-flex-mobile {
        display: unset;
    }

    .m-plan {
        /* padding:0px; */
        margin-left: -15px;
        margin-right: -15px;
    }

    /* The side navigation menu */
    .sidenav {
        height: 100%;
        /* 100% Full-height */
        width: 0;
        /* 0 width - change this with JavaScript */
        position: fixed;
        /* Stay in place */
        z-index: 6;
        /* Stay on top */
        top: 0;
        /* Stay at the top */
        left: 0;
        background-color: #fff;
        /* Black*/
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 20px;
        /* Place content 60px from the top padding-top: 60px;*/
        transition: 0.3s;
        /* 0.5 second transition effect to slide in the sidenav */
        white-space: nowrap;
        overflow: auto;
        box-shadow: 2px 2px 10px rgb(94 94 94 / 25%), -2px -2px 4px rgb(255 255 255 / 25%);
    }

    html {
        /* overflow:hidden; */
    }

    .ol_liv {
        display: inline-block;
        margin: 20px;
    }

    .ol_liv_right {
        /* position: absolute; */
        float: right;
    }

    /* The navigation menu links */
    .sidenav a {
        /* padding: 8px 8px 8px 32px; */
        text-decoration: none;
        font-size: 18px;
        color: #000000;
        display: block;
        transition: 0.3s;
        padding-bottom: 4px;
    }

    /* When you mouse over the navigation links, change their color */
    .sidenav a:hover {
        color: #333333;
    }

    /* Position and style the close button (top right corner) */
    .sidenav .closebtn {
        /* position: absolute; */
        /* top: -18px; */
        /* right: 25px; */
        /* font-size: 36px; */
        /* margin-left: 50px; */
        /* left: -22px; */
        position: absolute;
        top: -18px;
        /* right: 25px; */
        /* font-size: 36px; */
        /* margin-left: 50px; */
        /* left: -22px; */
        flex: none;
        order: 0;
        flex-grow: 0;
        margin: 12px 4px;
    }

    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
        transition: margin-left .5s;
        /* padding: 20px; */
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    .logo {
        /* margin-left: 84px; */
        /* margin-top: 24px; */
        /* margin-bottom: 28px; */
        text-align: center;
    }

    .responsive-logo {
        width: 100px;
        /* margin-left: -21px; */
    }

    .responsive-logos {
        /* height: 30px; */
        width: 20px;
        /* background: #000000; */
        /* box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); */
        /* Inside Auto Layout */
        flex: none;
        order: 0;
        flex-grow: 0;
        margin: 0px 12px;
    }

    .nav-item,
    #blog,
    #referal_menu {
        list-style: none;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-right: 15px;
        margin-left: 15px;
    }

    .liv_text {
        display: block;
        margin-top: 10px;
        margin-left: 0px;
        font-size: 20px;
        font-weight: 600;
    }

    .custom_title {
        /* padding-left:20px; */
        width: 57px;
        height: 15px;
        /* left: calc(50% - 57px/2 + 17px); */
        /* top: calc(50% - 15px/2); */
        font-family: Open Sans;
        font-style: normal;
        /* font-weight: 600; */
        font-size: 0.9em;
        line-height: 15px;
        /* color: #000000; */
        /* Inside Auto Layout */
        flex: none;
        order: 1;
        flex-grow: 0;
        vertical-align: middle;
        /* margin: 0px 19px; */
    }

    .plan-brief-info {
        font-family: Open Sans;
        font-style: normal;
        font-weight: normal;
        font-size: 0.9em;
        line-height: 188.2%;
        /* or 19px */
        letter-spacing: 1px;
        text-align: justify;
        color: #000000;
    }

    .logout-btn {
        width: 100px;
        background: #333333;
        box-shadow: -2px -2px 1px rgb(204 204 204 / 25%), 2px 2px 2px rgb(163 163 163 / 25%);
        border-radius: 15px;
        height: 30px;
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 0.9em;
        line-height: 30px;
        color: #FFFFFF;
        cursor: pointer;
        margin-top: 40px;
    }

    .m-50 {
        margin-top: -50px;
    }

    /* .active   {
            background: #187fde ;
            color: #fff;
            border-radius:8px;
        } */
    .active_filter {
        background: #187fde;
        color: #fff !important;
        border-radius: 8px;
    }

    .nav-item.active {
        background: #187fde;
        color: #fff;
        border-radius: 8px;
    }

    .active a {
        color: #fff !important;
    }

    .l_s {
        font-size: 20px;
        font-weight: bold;
        font-family: sans-serif;
    }

    .l_s_t {
        font-weight: 800;
        line-height: 36px;
        font-family: serif;
        letter-spacing: 1px;
        text-align: justify;
        margin-bottom: 20px;
    }

    .live_sess_second {
        background-image: url('fitness/images/background.png');
        background-size: cover;
    }

    .live_sess_block {
        /* box-shadow: 7px 7px 15px rgb(65 65 65 / 25%), -7px -7px 15px rgb(255 255 255 / 50%); */
        box-shadow: 2px 2px 10px rgb(94 94 94 / 25%), -2px -2px 4px rgb(255 255 255 / 25%);
        border-radius: 10px;
        margin-top: 24px;
        padding: 24px;
        border: 1px solid #e5e5e5;
    }

    .liv_img {
        display: inline-block;
        margin-left: 30px;
        /* background-image:url('fitness/images/Pilates-amico.png');
                    background-size: cover;
                    height: 100px; */
    }

    .l_s_i_img {
        height: 100px;
    }

    .inside_live_btn {
        /* display:inline-block;
                    margin-left:50px; */
        margin-top: -12px;
        /* margin-right:120px; */
    }

    .liv_details {
        /* display:inline-block;
                    background: #FFFFFF;
                    box-shadow: 7px 7px 15px rgb(65 65 65 / 25%), -7px -7px 15px rgb(255 255 255 / 50%);
                    border-radius: 10px;
                    padding: 14px;
                    margin-left:34px; */
    }

    .inside_live {
        /* display:inline-block; */
        font-weight: 600;
        text-align: center;
        line-height: 0px;
        /* margin-right: 20px; */
    }

    .book_live_btn {
        display: inline-block;
        background: #187fde;
        border-radius: 10px;
        outline: none;
        border: none;
        /* width: 100px; */
        padding: 12px;
        color: #fff;
        font-weight: 600;
        border: none;
        border-radius: .75em;
        color: #fff;
        box-sizing: border-box;
        position: relative;
        padding: 1em 2em;
        width: 150px;
    }

    .ripple {
        box-sizing: border-box;
        position: relative;
        background: #008000b8;
        border: none;
        border-radius: .75em;
        color: #fff;
        padding: 1em 2em;
    }

    .ripple:before {
        animation: ripple 2s ease-out infinite;
        border: solid 2px green;
        border-radius: 1em;
        bottom: 0;
        box-sizing: border-box;
        content: "";
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
    }

    .ripple:after {
        animation: ripple 2s 1s ease-out infinite;
        border: solid 2px green;
        border-radius: 1em;
        bottom: 0;
        box-sizing: border-box;
        content: "";
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
    }

    @keyframes ripple {
        0% {
            opacity: .25;
        }

        100% {
            border-radius: 2em;
            opacity: 0;
            transform: scale(3);
        }
    }

    .filter_live {
        display: inline-block;
        font-size: 18px;
        /* padding-left: 16px; */
        /* padding-top: 12px; */
        /* margin-left: 60px; */
        padding-bottom: 15px;
        float: right;
    }

    .tz {
        display: inline-block;
        /* font-size:12px; */
    }

    .liv_parent {
        margin-top: 10px;
    }

    .fiter_icon {
        display: inline-block;
        padding-left: 5px;
    }

    .filter_s {
        display: inline-block;
        padding-left: 10px;
    }

    /* .bks_c{
                    background:black;
                } */
    .disable_bks_c {
        background: #778877;
        color: #fff;
    }

    .img_err {
        height: 250px;
        margin-left: 200px;
    }

    .l_d {
        width: 50px;
        height: 50px;
        /* border: 1px solid #12eceb; */
        border-radius: 26px;
        line-height: 52px;
        text-align: center;
        cursor: pointer;
        font-weight: bold;
    }

    .l_d.active {
        /* box-shadow: 0 5px 26px -5px rgb(0 180 231); */
        background: rgb(24 127 222);
        color: #fff;
    }

    .inside_date {
        margin-right: 10px;
        height: 100px;
        width: 64px;
        background: #fff;
        box-shadow: 2px 2px 10px rgb(94 94 94 / 25%), -2px -2px 4px rgb(255 255 255 / 25%);
        border-radius: 10px;
        text-align: -webkit-center;
        margin: 15px;
    }

    .inside_date.active {
        background: #187fde;
    }

    .n_d {
        background: #000;
        border-radius: 8px;
        text-align: center;
        height: 40px;
        width: 40px;
        line-height: 40px;
        margin-left: 5px;
        /* margin-top: 8px; */
        margin: auto;
        margin-top: -1px;
        font-weight: 600;
        color: #fff;
    }

    .n_d.active {
        background: #fff;
        color: #000;
    }

    .top-date {
        display: flex;
    }

    .hr_line {
        margin-right: 20px;
        margin-left: 20px;
        margin-bottom: 30px;
    }

    .slick-slide .slide-content {
        margin: 0 10%;
        padding: 50px 100px;
        background: #fff;
    }

    .slick-list {
        margin: 20px 0px;
    }

    .slick-prev,
    .slick-next {
        position: absolute;
        right: 10%;
        background: #777;
        border: none;
        color: transparent;
        width: 30px;
        height: 30px;
    }

    .slick-prev:before,
    .slick-next:before {
        content: ">";
        color: #fff;
        font-size: 25px;
    }

    .slick-prev {
        left: 10%;
    }

    .slick-prev:before {
        content: "<";
    }

    .slick-dots {
        list-style: none;
        margin: 0 auto;
        text-align: center;
    }

    .slick-dots li {
        display: inline-block;
    }

    .slick-dots li button {
        transition: 0.2s background-color ease-in-out 0s;
        border: none;
        padding: 0;
        color: transparent;
        width: 10px;
        height: 10px;
        background-color: #777;
        margin-right: 10px;
        border-radius: 50%;
    }

    .slick-dots li.slick-active button {
        background-color: #187fde;
    }

    .menus_style {
        box-shadow: 0px 0px 4px rgb(94 94 94 / 25%), 0px 0px 0px rgb(255 255 255 / 25%);
        border-radius: 2px;
        border: none;
        top: 8px !important;
        left: -10px !important;
    }

    .main_dashboard {
        height: 100%;
    }

    .rounded_img {
        border-radius: 50%;
        filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)), drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
        /* padding:12px; */
        margin-top: 24px;
        margin-bottom: 18px;
        box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
        height: 90px;
        width: 90px;
    }

    .rounded_img_onboarding {
        box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
        border-radius: 50%;
        height: 90px;
        width: 90px;
    }

    .login_img_height {
        height: 30px !important;
        width: 30px;
        margin-top: -6px;
    }

    .profile_logo {
        text-align: center;
    }

    .splash {
        position: fixed;
        z-index: 999999;
        display: none;
        width: 100vw;
        height: 100vh;
        text-align: center;
        background: #fff;
    }

    .new_splash {
        height: auto;
        width: 360px;
        margin-top: 10%;
    }

    :focus-visible {
        outline: none;
    }

    .s_m {
        height: 22px;
        vertical-align: sub;
        margin-right: 18px;
        margin-top: 2px;
    }

    .new_al {
        font-size: 1.2em;
        color: #000000;
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        padding-top: 40px;
        /* padding-bottom: 30px; */
    }

    .ndx {
        margin-left: 10px;
        margin-right: 10px;
        text-align: justify
    }

    .heading-section .subheading {
        font-size: 18px;
        font-weight: 600;
        color: #000000;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
</style>

<body data-spy="scroll" data-offset="300" data-aos-easing="slide" data-aos-duration="800" data-aos-delay="0">
    <?php
    setlocale(LC_MONETARY, 'en_IN');
    function moneyFormatIndia($num)
    {
        $explrestunits = '';
        if (strlen($num) > 3) {
            $lastthree = substr($num, strlen($num) - 3, strlen($num));
            $restunits = substr($num, 0, strlen($num) - 3); // extracts the last three digits
            $restunits = strlen($restunits) % 2 == 1 ? '0' . $restunits : $restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
            $expunit = str_split($restunits, 2);
            for ($i = 0; $i < sizeof($expunit); $i++) {
                // creates each of the 2's group and adds a comma to the end
                if ($i == 0) {
                    $explrestunits .= (int) $expunit[$i] . ','; // if is first value , convert into integer
                } else {
                    $explrestunits .= $expunit[$i] . ',';
                }
            }
            $thecash = $explrestunits . $lastthree;
        } else {
            $thecash = $num;
        }
        return $thecash; // writes the final format where $currency is the currency symbol.
    }
    ?>
    <!-- ======= Top Bar ======= -->
    <!-- <div id="topbars" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:support@livezy.com">support@livezy.com</a>
        <i class="icofont-phone"></i> +91-9663488580
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div> -->
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center header_logo">
            <h1 class="logo mr-auto" onclick="$('#dashboard').click()"><a href="#"><img
                        class="img-responsive logo_img mob_lg" src="insta_img/Navbar.png"></a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="fitness/mobile/assets/img/png2.png" alt=""></a>-->
            <nav class="nav-menu d-none d-lg-block">
                <!-- <ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Membership</a></li>
          <li><a href="#testimonial">Testimonial</a></li>
          <li><a href="recipes">Recipes</a></li>
          <li><a href="blog">Blog</a></li> -->
                <!-- <li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
                <!-- <li><a href="#contact">Contact</a></li> -->
                <!-- </ul> -->
            </nav>
            <!-- .nav-menu -->
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
                <li>
                    <div class="loggin_div">
                        <div class="logged-out common_login login1" data-toggle="modal"
                            data-target="#country_modal_city">
                            <!-- <span class="location">●</span>Bangalore -->
                            <span class="location"><img class="location_flag"
                                    src="https://ipdata.co/flags/<?php echo strtolower($users->short_country_name); ?>.png"
                                    alt="Smiley face"></span><span class="flag_text"><?php //echo $users->city;
                                    ?></span>
                        </div>
                        <div class="logged-out common_login login2" id="u_login">
                            <div class="dropdown">
                                <img class="img-responsive rounded_img_onboarding login_img_height dropdown-toggle"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" src="<?php echo Session::get('image') ? Session::get('image') : 'fitness/images/default_image.svg'; ?>" />
                                <div class="dropdown-menu menus_style" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item font_ten_style_menus" id="fcd" data-toggle="modal" data-target="#forget-password" href="#">Change Password</a>
                                    <a class="dropdown-item font_ten_style_menus" id="logout1" href="#">Logout</a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="common_login" id="u_login" data-toggle="modal" data-target="#loginModal">Login</div> -->
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- End Header -->
    <?php
    // if($users->user_status==8 || $users->user_status==1){
    if(($users->user_status > 1 && $users->user_status <= 8) || $users->user_status == 1){
    ?>
    <!-- <div class="document-info" title="Documents">
        <i class="fa fa-file" aria-hidden="true"></i>
    </div> -->
    <div class="whats-app-div" data-toggle="tooltip" title="Instant Chat on Whatsapp">
        <div class="whats-app-img">
            <img class="img-whats-app" src="fitness/images/whatsapp.png">
        </div>
    </div>
    <?php
    }
    if($users->user_status==9){
    ?>
    <div class="support_email">
        <a href="mailto:support@livezy.com"><img src="fitness/images/email.png" style="height:30px;"
                class="img-responsive new_email"></a>
    </div>
    <?php
    }
?>
    <!-- ======= Hero Section ======= -->
    <div class="splash"><img src="fitness/images/livezygif.gif" class="img-responsive new_splash"></div>
    <div id="mySidenav" class="sidenav">
        <div class="">
            <li style="list-style:none;" class="">
                <div class="logo">
                    <img class="img-responsive responsive-logo" src="insta_img/Login_screen.png">
                </div>
                <hr class="hr_line">
            </li>

            @if($users->user_status > 1 && $users->user_status <= 11)
                <li id="dashboard" class="nav-item active" data-img="dashboard">
                    <a href="#" class="">
                        <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/dashboard_black.png"></span>
                        <span class="title custom_title">Dashboard</span>
                    </a>
                </li>
            @endif

            <li id="package_bought" class="nav-item" data-img="package_bought">
                <a href="#">
                    <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/package_bought_black.png"></span>
                    <span class="title custom_title">LivEzy Plus</span>
                </a>
            </li>

            <li id="livezy_premium" class="nav-item" data-img="livezy_premium">
                <a href="#">
                    <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/livezy_premium_black.png"></span>
                    <span class="title custom_title">LivEzy Premium</span>
                </a>
            </li>

            {{-- <li id="livezy_premium_else" class="nav-item" data-img="livezy_premium">
                    <a href="#">
                        <span class="icon"><img class="img-responsive responsive-logos"
                                src="insta_img/dashboard_black/livezy_premium_black.png"></span>
                        <span class="title custom_title">LivEzy Premium</span>
                    </a>
            </li> --}}

            <li id="live_session" class="nav-item" data-img="live_session">
                <a href="#">
                    <span class="icon"><img class="img-responsive responsive-logos"
                            src="insta_img/dashboard_black/live_session_black.png"></span>
                    <span class="title custom_title">Live Session</span>
                </a>
            </li>
            <!-- <li>
                <a href="#">
                    <span class="icon"><i class="fab fa-elementor"></i></span>
                    <span class="title custom_title">Plans</span>
                </a>
            </li> -->
            <li id="profile_d" class="nav-item" data-img="profile">
                <a href="#">
                    <span class="icon"><img class="img-responsive responsive-logos"
                            src="insta_img/dashboard_black/profile_black.png"></span>
                    <span class="title custom_title">Profile</span>
                </a>
            </li>
            <li id="testimonial" class="nav-item" data-img="testimonial">
                <a href="#">
                    <span class="icon"><img class="img-responsive responsive-logos"
                            src="insta_img/dashboard_black/testimonial_black.png"></span>
                    <span class="title custom_title">Testimonial</span>
                </a>
            </li>
            <li id="recipes" class="nav-item" data-img="recipe">
                <a href="#">
                    <span class="icon"><img class="img-responsive responsive-logos"
                            src="insta_img/dashboard_black/recipe_black.png"></span>
                    <span class="title custom_title">Recipes</span>
                </a>
            </li>
            <li id="blog">
                <a target="_blank" href="/blog">
                    <span class="icon"><img class="img-responsive responsive-logos"
                            src="insta_img/dashboard_black/blog_black.png"></span>
                    <span class="title custom_title">Blog</span>
                </a>
            </li>

            @if($users->user_status==8 || $users->user_status==9)
            <li id="referal_menu">
                <a href="#">
                    <span class="icon"><img class="img-responsive responsive-logos"
                            src="insta_img/dashboard_black/invite_black.png"></span>
                    <span class="title custom_title">Invite Friend</span>
                </a>
            </li>
            @endif

            <li id="settingsu" class="nav-item" data-img="setting">
                <a href="#">
                    <span class="icon"><img class="img-responsive responsive-logos"
                            src="insta_img/dashboard_black/setting_black.png"></span>
                    <span class="title custom_title">Settings</span>
                </a>
            </li>
            <li class="nav-item" style="text-align:-webkit-center;" id="logout2">
                <div class="logout-btn">Logout</div>
            </li>
        </div>
    </div>
    <main id="main">
        <style>
            .free-liv {
                background: linear-gradient(98.76deg, #187FDE 7.24%, #187FDE 87%);
                box-shadow: 2px 2px 10px rgba(94, 94, 94, 0.25), -2px -2px 4px rgba(255, 255, 255, 0.25);
                border-radius: 10px;
                color: #fff;
                display: flex;
                /* width:95%; */
                text-align: center;
                /* margin-left: 5.83%;
                margin-right: 5.83%; */
                /* padding-top: 25px;
                padding-bottom: 25px; */
                /* width:318px;
                height:92px; */
                padding: 30px;
                /* padding-left: 40px;
                padding-right: 40px; */
            }

            sup {
                font-size: 20px;
                top: -0.1em !important;
            }

            .btn-free {
                background: #2E2E2E;
                box-shadow: 2px 2px 10px rgba(94, 94, 94, 0.25), -2px -2px 4px rgba(255, 255, 255, 0.25);
                border-radius: 8px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 188.2%;
                /* or 23px */
                text-align: center;
                color: #FFFFFF;
                outline: none;
                width: 110px;
                height: 41px;
                border: none;
            }

            .left_free {
                /* float:left;
                padding: 10px; */
                /* padding-right:80px; */
                margin: auto;
            }

            .left_free_style {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 188.2%;
                /* or 23px */
                /* text-align: center; */
                color: #FFFFFF;
            }

            .right_free {
                /* float:right;
                margin-top: 10px; */
                margin: auto;
            }

            .section-title {
                padding-bottom: 10px;
            }

            .c-p {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 188.2%;
                /* or 23px */
                text-align: center;
                color: #187FDE;
            }

            .c-p-s {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                /* font-size: 18px !important; */
                line-height: 188.2%;
                /* or 34px */
                text-align: center;
                color: #000000;
            }

            .p_d {
                /* margin-top:80px; */
                margin-top: 40px;
                min-height: 88vh !important;
                /* overflow:auto; */
                /* display:none; */
            }

            .span_error {
                display: none;
            }

            .dashboard,
            .live_session {
                padding: 18px;
            }

            .live_session {
                padding-left: 8% !important;
                padding-right: 8% !important;
                padding: 20px;
            }

            .lid {
                display: none;
            }

            .liv_ol_block {
                max-height: 400px;
                overflow-y: auto;
            }

            .header_book_live {
                background: linear-gradient(96.22deg, #18AFDE 5.19%, #187FDE 97.18%);
                margin-top: -12px;
                padding-bottom: 4px;
                padding-top: 4px;
                padding-left: 15px;
                padding-right: 15px;
            }

            .modal-close {
                display: inline-block;
                padding: 10px;
                cursor: pointer;
                color: #fff;
                float: right;
            }

            .m-lb {
                margin-top: 10px;
            }

            .common_book_p {
                /* padding:6px;
                color:#fff;
                font-weight:400;
                font-size:14px;
                text-align:left; */
                text-align: left;
                color: #FFFFFF;
                padding: 6px;
            }

            .p_head {
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 15px;
                line-height: 20px;
                color: #FFFFFF;
            }

            .p_sub_head {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.7em;
                line-height: 16px;
                color: #FFFFFF;
            }

            .p_body {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 11px;
                line-height: 14px;
                letter-spacing: 0.01em;
                color: #FFFFFF;
            }

            .e_f {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 12px;
                line-height: 16px;
                padding-bottom: 0px;
                color: #000000;
            }

            .success_img {
                text-align: center;
                margin-bottom: -8px;
                margin-top: 20px;
            }

            .img_s {
                width: 40px;
            }

            .e_t {
                font-family: Open Sans;
                font-style: normal;
                font-weight: normal;
                font-size: 10px;
                line-height: 14px;
                /* identical to box height */
                color: #000000;
            }

            .swal2-show {
                padding: 0px !important;
            }

            .sec_liv_book {
                text-align: left;
                padding-left: 21px;
                padding-right: 15px;
                margin-top: 12px;
                font-weight: unset;
            }

            .swal2-modal .swal2-styled {
                /* padding:unset!important; */
                margin-bottom: 30px !important;
            }

            .filter_bottom {
                position: fixed;
                bottom: -20px;
                height: 0px;
                transition: 0.3s;
                z-index: 999999;
                box-shadow: 2px 2px 4px rgba(131, 131, 131, 0.25), -2px -2px 4px rgba(158, 158, 158, 0.25);
                background: #fff;
                padding: 10px;
                width: 100%;
                /* margin-left: -19px; */
                -webkit-transition: height, 0.5s linear;
                -moz-transition: height, 0.5s linear;
                -ms-transition: height, 0.5s linear;
                -o-transition: height, 0.5s linear;
                transition: height, 0.5s linear;
            }

            .filter_bottom.open {
                /* height:264px; */
                height: 230px;
                -webkit-transition: height, 0.5s linear;
                -moz-transition: height, 0.5s linear;
                -ms-transition: height, 0.5s linear;
                -o-transition: height, 0.5s linear;
                transition: height, 0.5s linear;
            }

            .notif_filter {
                display: inline-flex;
                border: 1px solid #000000;
                box-sizing: border-box;
                border-radius: 12px;
                padding: 12px;
                /* border-radius: 13px; */
                padding-left: 20px;
                padding-right: 20px;
                margin-left: 10px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: normal;
                font-size: 0.9em;
                line-height: 200%;
                /* height: 63px; */
                /* width: 25px; */
                color: #000000;
                padding-top: 0px;
                padding-bottom: 0px;
            }

            .rest_filter {
                margin-bottom: 10px;
            }

            .error_img {
                width: 200px;
                margin-left: 42%;
                margin-top: 0px;
                /* opacity: 0.7; */
                /* margin: auto; */
                margin-bottom: 20px;
                /* opacity:0.7; */
                /* margin:auto; */
            }

            .err_txt {
                text-align: center;
                color: #000;
            }

            .err_txt_style {
                margin-top: 30px;
                font-weight: 600;
            }

            .p_head_first {
                font-family: 'Open Sans';
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 188.2%;
                /* or 23px */
                margin-top: 18px;
                text-align: center;
                color: #000000;
            }

            section {
                padding: unset;
            }

            .heading {
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold !important;
                font-size: 1.3em !important;
                /* line-height: 188.2%; */
                /* identical to box height, or 34px */
                margin-bottom: 5px !important;
                text-align: center;
                color: #000000;
            }

            span.number-member {
                font-family: Open Sans;
                font-style: normal;
                /* font-weight: 600; */
                font-size: 32px !important;
                line-height: 188.2%;
                text-align: center;
                color: #187FDE;
            }

            em.monthly-price.spl-price {
                font-family: Open Sans;
                font-style: italic;
                font-weight: 600;
                font-size: 28px !important;
                line-height: 188.2%;
                /* identical to box height, or 34px */
                margin-left: 20px;
                text-align: center;
                color: #000000;
            }

            .membership-modal .modal-title {
                font-size: 1em !important;
            }

            a.btn.btn-primary.pay__ {
                font-family: Open Sans;
                font-style: normal;
                font-weight: normal !important;
                font-size: 1em;
                line-height: 1.5;
                /* or 23px */
                margin-top: 4px;
                text-align: center;
                color: #FFFFFF;
                background: #187FDE;
                box-shadow: 2px 2px 10px rgba(94, 94, 94, 0.25), -2px -2px 4px rgba(219, 215, 215, 0.25);
                border-radius: 20px;
            }

            .btn-primary {
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 1em;
                line-height: 188.2%;
                /* or 23px */
                text-align: center;
                color: #FFFFFF;
                /* background: #187FDE; */
                /* box-shadow: 2px 2px 10px rgba(94, 94, 94, 0.25), -2px -2px 4px rgba(219, 215, 215, 0.25); */
                border-radius: 8px;
            }

            .btn.btn-primary {
                background: #31cdcc;
                border: 1px solid #31cdcc !important;
            }

            .btn.btn-primary:hover {
                background: #000;
                border: 1px solid #000 !important;
                color: #fff !important;
            }

            a.more-info {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.8em !important;
                line-height: 188.2%;
                /* identical to box height, or 15px */
                text-align: center;
                color: #187FDE;
                margin-bottom: 5px;
                margin-top: 5px;
            }

            .btn_p {
                text-align: center;
                padding-top: 30px;
                padding-bottom: 15px;
            }

            .complete_p_b {
                background: #2E2E2E;
                box-shadow: 2px 2px 10px rgba(94, 94, 94, 0.25), -2px -2px 4px rgba(255, 255, 255, 0.25);
                border-radius: 15px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 14px;
                /* identical to box height */
                border: none;
                padding: 8px;
                color: #FFFFFF;
                padding-left: 12px;
                padding-right: 12px;
            }

            .recipe_f {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 18px;
                /* identical to box height */
                margin-left: -8px;
                color: #000000;
            }

            .reci_sec,
            .our-coaches {
                /* margin-top:20px; */
                margin-top: 40px;
                margin-bottom: 30px;
            }

            .membership_onboarding {
                vertical-align: top;
                /* margin-left: 30px; */
                margin-bottom: 10px;
            }

            .img_sec {
                padding-right: 15px;
            }

            .first_card {
                background: #FFFFFF;
                box-shadow: 2px 2px 10px rgba(176, 176, 176, 0.25), -2px -2px 4px rgba(231, 231, 231, 0.25);
                border-radius: 10px;
                padding-top: 26px;
                padding-bottom: 18px;
                /* margin-top: 20px; */
                /* margin-top: 60px; */
                margin-top: 30px;
            }

            .pause_ongoing {
                background: #333333;
                box-shadow: -2px -2px 3px rgba(196, 196, 196, 0.25), 2px 2px 5px #B7B7B7;
                border-radius: 10px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 13px;
                line-height: 18px;
                /* identical to box height */
                outline: none;
                border: none;
                width: 52%;
                margin-top: 18px;
                height: 32px;
                color: #FFFFFF;
            }

            .pause_outside {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 18px;
                /* identical to box height */
                margin-top: 40px;
                /*22px*/
                color: #000000;
            }

            .live_sessoin_carousel .slick-dots {
                list-style: none;
                margin: 0 auto;
                text-align: center;
                position: absolute;
                left: 32%;
            }

            .slick-carousel .slick-dots {
                list-style: none;
                margin: 0 auto;
                text-align: center;
                position: absolute;
                left: 29%;
            }

            .pause_outside_info {
                width: 20px;
                height: 20px;
                border-radius: 50%;
                color: #fff;
                background: #000;
                text-align: center;
                font-style: italic;
                display: inline-block;
                margin-left: 4px;
                cursor: pointer;
            }

            .general_white_card {
                background: #FFFFFF;
                box-shadow: 2px 2px 10px rgba(176, 176, 176, 0.25), -2px -2px 4px rgba(231, 231, 231, 0.25);
                border-radius: 10px;
                margin-top: 30px;
                text-align: center;
                padding-top: 18px;
                padding-bottom: 18px;
                /* border: 1px solid #e5e5e58c; */
            }

            .setting_general_white_card {
                background: #F2F3F3;
                border-radius: 5px;
                box-shadow: 2px 2px 10px rgba(176, 176, 176, 0.25), -2px -2px 4px rgba(231, 231, 231, 0.25);
                margin-top: 20px;
                /* text-align:center; */
                padding-top: 18px;
                padding-bottom: 18px;
            }

            .blue_box {
                background: #39B1EA;
                /* box-shadow: 2px 2px 10px rgba(60, 60, 60, 0.25), -4px -4px 4px rgba(220, 220, 220, 0.25); */
                border-radius: 10px;
                /* height:90px; */
                width: 15%;
                margin-right: 4px;
                margin-left: 4px;
                display: inline-flex;
                padding-top: 10px;
                padding-bottom: 10px;
            }

            .inside_blue_box {
                /* padding: 20px; */
                padding-top: 20px;
                padding-bottom: 20px;
                text-align: center;
                width: 100%;
            }

            .pause_h_font {
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 20px;
                color: #FFFFFF;
            }

            .pause_s_h_font {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 28px;
                /* identical to box height */
                text-align: center;
                color: #FFFFFF;
            }

            .m_d {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1.2em;
                line-height: 60px;
                color: #000000;
            }

            .m_d_s_d {
                font-family: Open Sans;
                font-style: normal;
                /* font-weight: 600; */
                font-size: 1em;
                line-height: 0px;
                color: #000000;
            }

            .img_text {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 40px;
                text-align: center;
                color: #000000;
            }

            .font_ten_style {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 188.2%;
                /* or 19px */
                text-align: center;
                color: #000000;
            }

            #p_m_t {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 18px;
                line-height: 25px;
                /* identical to box height */
                margin: auto;
                margin-top: 10px;
                margin-bottom: 10px;
                color: #000000;
            }

            .f_p_m {
                padding: 0px;
                top: 0px;
            }

            .f_m_c {
                /* border-radius: 8px; */
                width: 100vw;
                height: 100vh;
                /* margin-top: -8px; */
                /* margin-left: -8px; */
                margin: -8px;
            }

            .f_close {
                margin-left: 96%;
                margin-top: 1.4%;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                position: absolute;
            }

            .f_p_btn {
                width: 80px;
                height: 36px;
                background: #4A90E2;
                box-shadow: 2px 2px 10px rgba(133, 133, 133, 0.25), -2px -2px 10px rgba(202, 202, 202, 0.25);
                border-radius: 15px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 1em;
                line-height: 18px;
                border: none;
                color: #FFFFFF;
            }

            .fpbn {
                text-align: center;
            }

            .font_ten_style_menus {
                font-family: Open Sans;
                font-style: normal;
                /* font-weight: 600; */
                font-size: 1em;
                /* or 19px */
                color: #000000;
            }

            .start_outside {
                background: #187FDE;
                border-radius: 0px;
                text-align: center;
                width: 100vw;
                margin-top: 20px;
                margin-left: -17px;
                padding-top: 40px;
                padding-bottom: 40px;
            }

            .p_start_outside {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 188.2%;
                /* or 23px */
                text-align: center;
                color: #FFFFFF;
            }

            .p_tracker {
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 10px;
                line-height: 11px;
                /* identical to box height */
                color: #FFFFFF;
            }

            .p_tracker_img {
                /* font-weight: bold; */
                font-size: 20px;
                line-height: 11px;
                /* identical to box height */
                padding-top: 10px;
                margin-top: 10px;
                color: #FFFFFF;
            }

            .p_tracker_img_active {
                font-size: 25px;
            }

            .tracker_box {
                display: inline-block;
                padding: 2px;
                vertical-align: top;
                margin-right: 8px;
                margin-left: 8px;
                /* padding-right: 18px;
                padding-left: 18px; */
            }

            .tracker_progress_bar {
                /* height: 30px; */
                padding-left: 25px;
                padding-right: 25px;
                margin-top: 20px;
                margin-left: 200px;
                margin-right: 200px;
                background: white;
                border-radius: 16px;
            }

            .tracker_progress_bar_inside {
                height: 15px;
                background: #5CE722;
                box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);
                border-radius: 14px;
                /* width:25%; */
                margin-left: -30px;
                margin-right: -30px;
            }

            .profile_outside {
                background: linear-gradient(160.27deg, #187FDE 9.28%, #5BE5F8 72.7%);
                box-shadow: 2px 2px 10px rgba(94, 94, 94, 0.25), -2px -2px 4px rgba(255, 255, 255, 0.25);
                padding-bottom: 20px;
                /* margin-bottom:80px; */
                height:100vh;
            }

            .recipes {
                margin-top: -60px;
            }

            .testimonial {
                margin-top: -40px;
            }

            .r_ifrma {
                width: 100%;
                height: 700px;
                border: none;
                margin-top: 94px;
            }

            .input_box {
                position: relative;
            }

            .icon_profile_form {
                position: absolute;
                left: 10px;
                top: 10px;
                /* right: 8px; */
                width: fit-content;
            }

            .input_css {
                padding-left: 40px;
            }

            .lable_form {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 14px;
                letter-spacing: 0.04em;
                color: #000000;
                /* Inside Auto Layout */
                flex: none;
                order: 0;
                flex-grow: 0;
                margin: 16px 0px;
            }

            .inside_profile .row {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .form_6 {
                width: 50%;
            }

            .form_7 {
                width: 70%;
            }

            .inside_profile {
                background: #FFFFFF;
                box-shadow: 2px 2px 10px rgba(94, 94, 94, 0.25), -2px -2px 4px rgba(255, 255, 255, 0.25);
                border-radius: 5px;
                padding-bottom: 10px;
                padding-top: 10px;
                /* margin-bottom:100px; */
            }

            .general_form_css {
                background: #F2F3F3;
                /* background: #f1f1f1; */
                border-radius: 5px;
                border: none;
            }

            .profile_submit_btn {
                width: 15%;
                height: 2.3rem;
                float: right;
                background: #187FDE;
                box-shadow: -2px -2px 1px rgba(204, 204, 204, 0.25), 2px 2px 2px rgba(163, 163, 163, 0.25);
                border-radius: 15px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 0.9em;
                line-height: 24px;
                text-align: center;
                color: #FFFFFF;
                cursor: pointer;
                outline: none;
                border: none;
            }

            #toast-container>.toast {
                width: 100vw;
                /* width: 100% */
                /* height:60px; */
                /* margin-top:60px; */
            }

            #toast-container>div {
                /* padding:unset; */
                opacity: 1;
                padding: 30px 30px 30px 50px;
            }

            .toast-error .toast-message {
                position: absolute;
                background: #cf3e44;
                width: 88vw;
                top: 0;
                height: 8vh;
                line-height: 60px;
                text-align: center;
            }

            .toast-success .toast-message {
                position: absolute;
                background: #26b470;
                width: 88vw;
                top: 0;
                height: 8vh;
                line-height: 60px;
                text-align: center;
            }

            .profile_d {
                margin-top: 40px;
            }

            .toast-error {
                background-color: #b10008;
            }

            .toast-success {
                background-color: #16a060;
            }

            .error_p {
                font-size: 8px;
                color: red;
                float: right;
                margin-top: 2px;
                margin-right: 2px;
            }

            .error_border {
                border: 1px solid #ff00008c;
            }

            .swal2-modal .swal2-styled {
                background: #187FDE;
                box-shadow: 2px 2px 4px rgb(122 122 122 / 30%), -2px -2px 4px rgb(202 202 202 / 25%);
                border-radius: 20px !important;
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold !important;
                font-size: 12px !important;
                line-height: 18px !important;
                color: #FFFFFF !important;
            }

            .font_recipe {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 16px;
                color: #000000;
            }

            .view_more_recipe {
                background: transparent;
                /* box-shadow: -2px -2px 1px rgb(204 204 204 / 25%), 2px 2px 2px rgb(163 163 163 / 25%); */
                border-radius: 15px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 8px;
                line-height: 12px;
                border: 1px solid #e5e5e5;
                color: #333333;
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 9px;
                line-height: 12px;
                float: right;
                display: inline-block;
                border: 1px solid #e5e5e5;
                border-radius: 8px;
                padding: 6px;
                color: #187FDE;
            }

            .nds_h {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            .r_s {
                float: right;
                margin-top: -28px;
            }

            .ytp {
                width: 100%;
                padding-top: 0px;
            }

            .slide-content {
                background: #FFFFFF;
                box-shadow: 2px 2px 10px rgba(176, 176, 176, 0.25), -2px -2px 4px rgba(231, 231, 231, 0.25);
                border-radius: 10px;
                /* padding:8px; */
            }

            .question_menu {
                display: none;
            }

            .std {
                width: 262px;
            }

            .stp {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 200%;
                /* identical to box height, or 24px */
                text-align: center;
                color: #000000;
                margin-top: 30px;
            }

            .stp_c {
                background: #EBF5FF;
                border-radius: 8px;
                width: fit-content;
                margin: auto;
                padding: 20px;
                margin-top: 20px;
                padding-left: 60px;
                padding-right: 60px;
            }

            .d_f {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 200%;
                /* identical to box height, or 24px */
                text-align: center;
                color: #000000;
            }

            .d_s {
                font-family: Open Sans;
                font-style: normal;
                font-weight: normal;
                font-size: 1em;
                line-height: 200%;
                /* identical to box height, or 24px */
                text-align: center;
                color: #000000;
            }

            .profile_onboarding {
                text-align: center;
            }

            .swal2-modal .swal2-spacer {
                height: 0px !important;
            }

            .dsc {
                width: 120px;
                /* position: absolute; */
            }

            .dsc>svg {
                transform: rotate(270deg);
            }

            .dsc>svg:first-child {
                filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
                /* stroke: #fff; */
            }

            .left_d_b {
                position: absolute;
                left: 50px;
                z-index: 1;
                /* right: -45px; */
                top: 178px;
                /* margin-top: 37px; */
                text-align: center;
            }

            .d_oniut {
                margin-top: 10px;
                display: inline-block;
            }

            .first_o_m {
                /* filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)); */
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 1em;
                line-height: 16px;
                margin-bottom: 8px;
                color: #FFFFFF;
            }

            .second_o_m {
                /* filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)); */
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 14px;
                margin-bottom: 8px;
                margin-top: 12px;
                color: #FFFFFF;
            }

            .third_o_m {
                /* filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25)); */
                font-family: Open Sans;
                font-style: normal;
                /* font-weight: 600; */
                font-size: 0.7em;
                line-height: 6px;
                margin-bottom: 4px;
                color: #FFFFFF;
                margin-top: 14px;
            }

            .legend_c_text {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 22px;
                line-height: 30px;
                color: #FFFFFF;
            }

            .left_b {
                font-family: Open Sans;
                font-style: normal;
                /* font-weight: 600; */
                font-size: 0.7em;
                line-height: 12px;
                margin-top: 12px;
                color: #FFFFFF;
            }

            .second_card {
                background: linear-gradient(138.82deg, #187FDE 20.19%, #187FDE 99.95%);
                box-shadow: 2px 2px 10px rgba(94, 94, 94, 0.25), -2px -2px 4px rgba(255, 255, 255, 0.25);
                border-radius: 10px;
                padding-top: 20px;
                padding-bottom: 22px;
                margin-top: 20px;
                padding-left: 100px;
                padding-right: 100px;
                /* margin-top: 60px; */
            }

            .ongoing_membership {
                display: inline-block;
                margin-left: 8%;
                position: absolute;
                margin-top: 5%;
            }

            .pause_li {
                font-family: Open Sans;
                font-style: normal;
                font-weight: normal;
                font-size: 0.9em;
                line-height: 207%;
                color: #000000;
                list-style: none;
            }

            .pause_ul {
                margin-left: -20px;
                list-style: disc;
            }

            .ui_modal-header {
                background: #187FDE;
                /* border-radius: 10px 10px 0px 0px; */
            }

            .referal_modal-header {
                border-radius: 10px 10px 0px 0px;
                background: #fff;
                display: block;
            }

            .ui_modal-title {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 16px;
                color: #FFFFFF;
                float: left;
                cursor: pointer;
            }

            .referal_modal-title {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 16px;
                color: #000;
                float: right;
            }

            .referal_text {
                font-family: Open Sans;
                font-style: normal;
                /* font-weight: 600; */
                font-size: 1em;
                /* line-height: 16px; */
                text-align: center;
                margin-top: 30px;
                color: #000000;
            }

            .message_copied {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 14px;
                /* identical to box height */
                text-align: center;
                color: #187FDE;
                opacity: 0;
                visibility: hidden;
                -moz-transition: opacity 500ms linear, visibility 0s linear 500ms;
                -o-transition: opacity 500ms linear, visibility 0s linear 500ms;
                -webkit-transition: opacity 500ms linear, visibility 0s linear;
                -webkit-transition-delay: 0s, 500ms;
                transition: opacity 500ms linear, visibility 0s linear 500ms;
            }

            .message_copied_show {
                opacity: 1;
                visibility: visible;
                cursor: pointer;
                -moz-transition: opacity 500ms linear, visibility 0s linear;
                -o-transition: opacity 500ms linear, visibility 0s linear;
                -webkit-transition: opacity 500ms linear, visibility 0s linear;
                transition: opacity 500ms linear, visibility 0s linear;
            }

            .facebook_blue {
                color: #187FDE;
            }

            .whatsapp_green {}

            .copy_blue {}

            .bottom_referal {
                margin-bottom: 20px;
                /* border-top: 1px solid #000; */
                text-align: center;
                padding-top: 20px;
                background: #FFFFFF;
                box-shadow: 0px -2px 4px rgb(208 208 208 / 25%);
                border-radius: 0px 0px 10px 10px;
                position: relative;
            }

            .col_referal {
                display: inline;
                margin: 20px;
            }

            .r_code {
                background: #187FDE;
                border-radius: 10px;
                width: 150px;
                height: 52px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 18px;
                line-height: 48px;
                /* identical to box height */
                margin: auto;
                margin-top: 30px;
                margin-bottom: 30px;
                text-align: center;
                letter-spacing: 0.24em;
                color: #FFFFFF;
            }

            .l_s_i_img_today {
                height: 66px;
            }

            .live_sess_block_today {
                display: flex;
                padding: 20px;
            }

            .inside_live_today {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 16px;
                letter-spacing: 0.01em;
            }

            .liv_details_today {
                text-align: center;
                /* margin-left: 6%;
                margin-right: 6%; */
                margin-left: 6%;
                margin-right: 6%;
            }

            .book_live_btn_today {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 14px;
                letter-spacing: 0.01em;
                color: #FFFFFF;
                border: none;
                outline: none;
                background: #187FDE;
                /* box-shadow: 2px 2px 10px rgb(94 94 94 / 25%), -2px -2px 4px rgb(255 255 255 / 25%); */
                border-radius: 30px;
                padding: 10px;
                padding-left: 15px;
                padding-right: 15px;
            }

            .txt_upcming {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 18px;
                /* identical to box height */
                margin-bottom: 6px;
                color: #000000;
            }

            .timezone_txt {
                font-family: Open Sans;
                font-style: normal;
                font-weight: normal;
                font-size: 0.9em;
                line-height: 20px;
                letter-spacing: 0.05em;
                color: #707070;
            }

            .second_liv_carousel {
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold;
                /* font-size: 9px; */
                /* line-height: 12px; */
                float: right;
                /* display: inline-block; */
                border: 1px solid #e5e5e5;
                border-radius: 8px;
                padding: 6px;
                color: #187FDE;
                width: 140px;
                background: transparent;
                color: #187fde;
                font-size: 1em;
                height: 40px;
                font-weight: 400;
                text-align: center;
            }

            .first_liv_carousel {
                display: inline-block;
            }

            .liv_carousel_outside {
                margin-top: 40px;
                margin-bottom: 30px;
            }

            .new_padding {
                padding-left: 2px;
                padding-right: 2px;
                margin-top: 30px;
            }

            .first_box_upcoming_pause {
                background: linear-gradient(102.65deg, #8398FD 0.46%, #43D2FF 100.9%);
                /* box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25), 0px 4px 4px rgba(255, 255, 255, 0.25); */
                border-radius: 10px;
            }

            .outside_number_pause {
                background: #2F2F2F;
                border-radius: 10px 10px 0px 0px;
                padding: 20px;
                text-align: -webkit-center;
            }

            .outside_date_pause {
                /* padding: 38px; */
                text-align: center;
                padding-top: 20px;
                padding-bottom: 15px;
            }

            .u_p_h_t {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 14px;
                text-align: center;
                color: #FFFFFF;
            }

            .number_pause_days {
                font-family: Open Sans;
                font-style: normal;
                font-weight: bold;
                font-size: 1em;
                line-height: 24px;
                text-align: center;
                width: 24px;
                height: 24px;
                border-radius: 50%;
                color: #000000;
                margin-top: 15px;
                background: #fff;
            }

            .number_date {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 15px;
                line-height: 20px;
                margin-bottom: 10px;
                color: #FFFFFF;
            }

            .letter_date {
                font-family: Open Sans;
                font-style: normal;
                /* font-weight: 600; */
                font-size: 0.9em;
                line-height: 12px;
                color: #FFFFFF;
            }

            .f_date {
                display: inline-block;
                margin: 10px;
            }

            .s_date {
                display: inline-block;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 15px;
                line-height: 20px;
                margin: 10px;
                vertical-align: text-bottom;
                color: #FFFFFF;
            }

            .t_date {
                display: inline-block;
                margin: 10px;
            }

            .upcoming_pause_carousel {
                margin-top: 30px;
                background: #FFFFFF;
                /* box-shadow: 2px 2px 10px rgba(94, 94, 94, 0.25), -2px -2px 4px rgba(255, 255, 255, 0.25); */
                border-radius: 10px;
                /* padding: 1%; */
                /* padding-left: 15; */
                padding-right: 14%;
                padding-left: 14%;
            }

            .first_box_upcoming_pause {
                /* width:50%; */
                margin: 6px;
            }

            .slick-prev {
                left: 4%;
                top: 46%;
            }

            .slick-next {
                top: 46%;
            }

            .slick-prev,
            .slick-next {
                position: absolute;
                right: 4%;
                background: transparent;
                border: none;
                color: transparent;
                width: 30px;
                height: 30px;
            }

            .slick-prev:before,
            .slick-next:before {
                color: #00000066;
                font-size: 30px;
                font-weight: 900;
            }

            .cancel_future_pause {
                background: #333333;
                border: 1px solid #333333;
                box-sizing: border-box;
                border-radius: 10px;
                outline: none;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 13px;
                line-height: 12px;
                /* width: 47px; */
                /* height: 19px; */
                vertical-align: text-bottom;
                color: #FFFFFF;
                padding: 6px 15px 6px 15px;
                margin-top: 10px;
            }

            .f_live_sess {
                display: inline-block;
                /* margin: 14px; */
                /* margin-left: -28px; */
            }

            .s_live_sess {
                display: inline-block;
                margin: 14px;
                vertical-align: top;
                margin-left: 10%;
                margin-right: 0px;
                margin-top: 16px;
            }

            .t_live_sess {
                display: inline-block;
                margin: 14px;
                float: right;
                margin-top: 18px;
                margin-right: 14px;
            }

            .live_sess_block_new {
                text-align: center;
                display: contents;
                background: #FFFFFF;
                /* box-shadow: 2px 2px 10px rgba(94, 94, 94, 0.25), -2px -2px 4px rgba(255, 255, 255, 0.25); */
                box-shadow: 0px 0px 4px rgb(94 94 94 / 25%), 0px 0px 0px rgb(255 255 255 / 25%);
                border-radius: 10px;
                margin: 6px;
            }

            .live_sessoin_carousel {
                /* margin-left: 10px;
                margin-right: 10px; */
            }

            .live_sess_name {
                font-family: Open Sans;
                font-style: normal;
                /* font-weight: 600; */
                font-size: 0.9em;
                line-height: 18px;
                letter-spacing: 0.01em;
                color: #000000;
            }

            .l_s_i_img_today {
                filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
            }

            /* li{
                list-style:none;
            } */
            .list_si {
                font-family: Open Sans;
                font-style: normal;
                font-weight: normal;
                font-size: 11px;
                line-height: 20px;
                /* or 200% */
                list-style: decimal;
                color: #000000;
                margin-left: -25px;
            }

            .in_f_p {
                width: 100%;
                /* border: 2px solid #aaa; */
                border-radius: 4px;
                margin: 8px 0;
                outline: none;
                padding: 8px;
                box-sizing: border-box;
                transition: 0.3s;
                background: #F0F0F0;
                border: 1px solid #ECECEC;
                box-sizing: border-box;
                backdrop-filter: blur(150px);
                /* Note: backdrop-filter has minimal browser support */
                border-radius: 10px;
            }

            .inputWithIcon .in_f_p {
                padding-left: 40px;
            }

            .inputWithIcon {
                position: relative;
            }

            .inputWithIcon i {
                position: absolute;
                left: 0;
                top: 12px;
                padding: 9px 8px;
                color: #000;
                transition: 0.3s;
            }

            .legend_f_p {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 13px;
                line-height: 18px;
                color: #000000;
                margin-bottom: 8px;
            }

            .forget_password_body {
                margin: 14px;
            }

            .first_f_p {
                margin: 30px;
            }

            .key_up_country {
                background: #EBF6FF;
                border-radius: 5px;
            }

            .outside_country_location {
                background: #FFFFFF;
                box-shadow: 2px 2px 10px rgba(193, 193, 193, 0.25), -2px -2px 4px rgba(245, 245, 245, 0.25);
                border-radius: 10px;
                padding: 18px;
                margin-top: 20px;
                max-height: 500px;
                overflow-y: auto;
            }

            .circle_country {
                display: inline-block;
                text-align: center;
                padding: 4px;
                cursor: pointer;
            }

            .circle_country_img {
                height: 18px;
                border-radius: 6px;
                box-shadow: 2px 2px 10px rgba(193, 193, 193, 0.25), -2px -2px 4px rgba(245, 245, 245, 0.25);
            }

            .country_text {
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 10px;
                line-height: 170%;
                text-align: center;
                color: #000000;
            }

            .slick-carousel {
                background: #FFFFFF;
                box-shadow: 2px 2px 10px rgba(193, 193, 193, 0.25), -2px -2px 4px rgba(245, 245, 245, 0.25);
                border-radius: 10px;
            }

            .city_shadow {
                font-family: Open Sans;
                font-style: normal;
                font-weight: normal;
                font-size: 8px;
                line-height: 170%;
                /* or 14px */
                cursor: pointer;
                color: #000000;
            }

            .border_country {
                border: 1px solid #000000;
                border-radius: 8px;
            }

            .t_r {
                text-align: center;
                padding-top: 20px;
            }

            .settingsu {
                margin-top: 40px;
                padding-left:8% !important;
                padding-right:8% !important;
            }

            .general_row {
                margin: 8px;
                margin-top: 0px;
                margin-bottom: 4px;
            }

            /* css button on off */
            .switch {
                position: relative;
                display: inline-block;
                width: 44px;
                height: 18px;
                float: right;
                margin-top: -5px;
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                /* background-color: #ccc; */
                -webkit-transition: .4s;
                transition: .4s;
                background: #FFFFFF;
                box-shadow: inset 1px 1px 5px rgb(0 0 0 / 25%), inset -1px -1px 5px rgb(255 255 255 / 30%);
                border-radius: 8px;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 11px;
                width: 11px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
                background: linear-gradient(180deg, #3AB2EB 0%, #187FDE 100%);
                box-shadow: 1px 1px 4px rgb(0 0 0 / 25%), -1px -1px 4px rgb(255 255 255 / 25%);
            }

            input:checked+.slider {
                background-color: #2b98e46b;
            }

            input:focus+.slider {
                box-shadow: 0 0 1px #2196F3;
            }

            input:checked+.slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 8px;
            }

            .slider.round:before {
                border-radius: 50%;
            }

            .g_r_t {
                font-family: Open Sans;
                font-style: normal;
                /* font-weight: 600; */
                font-size: 0.9em;
                line-height: 14px;
                display: inline-block;
                color: #000000;
            }

            .g_r_b {
                display: inline-block;
                float: right;
                /* margin-top: 12px; */
                margin-top: 6px;
            }

            .toast {
                max-width: unset;
            }

            #toast-container.toast-bottom-full-width>div,
            #toast-container.toast-top-full-width>div {
                width: 100%;
            }

            .swal2-show {
                min-height: unset;
            }

            #referal_code {
                background: #E6F3FF;
                border-radius: 10px;
                background: #E6F3FF;
                border-radius: 10px;
                outline: none;
                border: none;
                width: 80%;
                text-align: center;
                margin: auto;
            }

            .ef_r {
                text-align: center;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 30px;
            }

            .new_1 {
                font-size: 0.8em;
                font-weight: 400;
            }

            .ef_rh {
                text-align: center;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 13px;
                line-height: 18px;
            }

            .swal2-cancel {
                background-color: #333333 !important;
            }

            .renew_cancel_btn {
                background: #333333;
                box-shadow: -2px -2px 1px rgba(204, 204, 204, 0.25), 2px 2px 2px rgba(163, 163, 163, 0.25);
                border-radius: 15px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 15px;
                border: none;
                color: #FFFFFF;
                padding: 8px 16px 8px 16px;
            }

            #renew_continue,
            #renew_coach_button {
                background: #187FDE;
                box-shadow: -2px -2px 1px rgba(204, 204, 204, 0.25), 2px 2px 2px rgba(163, 163, 163, 0.25);
                border-radius: 15px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 0.9em;
                line-height: 15px;
                border: none;
                color: #FFFFFF;
                margin-left: -13%;
                margin-right: 6%;
                margin-top: 6%;
                padding: 8px 16px 8px 16px;
            }

            .renew_checkbox {
                vertical-align: sub;
            }

            .renew_li {
                margin-bottom: 10px;
            }

            .renew_li {
                list-style: none;
            }

            .renew_li.pause_li {
                list-style: none;
            }

            .big_img {
                height: 80px;
                width: 80px;
            }

            .profile_ongoing {
                margin-top: 30px;
                margin-bottom: 30px;
            }

            .profile_ongoing_hr {
                margin-bottom: 30px;
            }

            .v_p {
                font-size: 0.8em;
            }

            .referal_submit {
                display: inline-block;
                box-shadow: -2px -2px 1px rgb(204 204 204 / 25%), 2px 2px 2px rgb(163 163 163 / 25%);
                border-radius: 15px;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 500;
                font-size: 0.9em;
                line-height: 15px;
                color: #FFFFFF;
                padding: 8px 14px 8px 14px;
                margin-right: 10px;
            }

            #r_cancel {
                background: #333333;
            }

            #r_submit {
                background: #187FDE;
            }

            #i_submit {
                background: #187FDE;
            }

            #f_submit {
                background: #187FDE;
            }

            .emotion-style-element {
                font-size: 3em !important;
            }

            .intro_call_comment {
                background: #F4F4F4;
                border-radius: 5px;
                border: none;
            }

            .modal_body_content {
                margin-bottom: 10px;
                margin-top: unset;
            }

            .partner_submit {
                background: #187FDE;
                box-shadow: -2px -2px 1px rgb(204 204 204 / 25%), 2px 2px 2px rgb(163 163 163 / 25%);
                border-radius: 15px;
                border: none;
                font-family: Open Sans;
                font-style: normal;
                font-weight: 600;
                font-size: 1em;
                line-height: 16px;
                color: #FFFFFF;
                padding: 8px 15px 8px 15px;
                margin-top: 20px;
            }

            #partner_modal {
                top: -10px;
                left: -10px;
                width: 106vw;
                padding: unset;
                overflow: hidden;
            }

            #partner_modal .modal-content {
                height: 100vh
            }

            .left_d_b_pause {
                position: absolute;
                left: 53px;
                z-index: 1;
                /* right: -45px; */
                top: 178px;
                /* margin-top: 37px; */
                text-align: center;
                background: url(fitness/images/Pause_icon.png);
                background-size: cover;
                height: 57px;
                width: 45px;
            }

            .img_illus_referal {
                background: url(fitness/images/invite_friend_img.png);
                height: 157px;
                width: auto;
                background-size: cover;
            }

            .v_p_f {
                height: 20px;
            }

            .n_p_n {
                margin-top: 10px;
                font-size: 0.8em;
            }

            .renew_btn {
                float: right;
                background: #333;
                color: #fff;
                padding: 4px;
                padding-left: 18px;
                padding-right: 18px;
                border-radius: 22px;
                cursor: pointer;
                display: none;
                margin-top: 6px;
            }

            .first_box_package {
                text-align: center;
                /* display: contents; */
                background: #FFFFFF;
                /* box-shadow: 2px 2px 10px rgb(94 94 94 / 25%), -2px -2px 4px rgb(255 255 255 / 25%); */
                box-shadow: 0px 0px 4px rgb(94 94 94 / 25%), 0px 0px 0px rgb(255 255 255 / 25%);
                border-radius: 10px;
                margin: 6px;
            }

            .banner_img {
                cursor: pointer;
                display: flex;
            }

            .nd_p {
                width: 99.8%;
            }

            .nerd {
                /* background: #f6f6f6; */
                background: #32cfce29;
            }
            .premium_nerd {
                background: rgb(255 255 255 / 25%);
                box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                backdrop-filter: blur(5.7px);
            }

            .nd_bp {
                width: -webkit-fill-available;
            }

            .t_diwali {
                position: absolute;
                left: 50%;
                right: 8%;
                top: 2.4%;
                font-family: 'open-sans';
                font-weight: 600;
                color: #000;
                text-align: center;
                font-size: 1.2em;
            }

            .avl_btn {
                background: #187FDE;
                padding: 8px;
                padding-right: 30px;
                padding-left: 30px;
                font-family: 'Open Sans';
                width: fit-content;
                margin: auto;
                color: #fff;
                border-radius: 28px;
                font-weight: 400;
            }

            .rm_headeer_new {
                margin-bottom: 8%;
                margin-top: 8%;
            }

            .package_bought {
                /* margin-top: 66px; */
                /* background: #f6f6f6; */
            }

            .warning_renew {
                height: 28px;
                margin-right: 20px;
                margin-left: -20px;
            }

            a.more-info {
                font-size: .82em;
                display: block;
                color: black;
                width: 85px;
                margin: 0 auto;
            }

            span.price {
                padding: 15px 0;
            }

            .coach_request_card {
                width: 100%;
                border-radius: 3px;
                background-color: #eff8f7;
            }
        </style>
        <div class="main_dashboard new_web">
            <?php
            if($users->user_status == 8 && $user_workday['user_plan_left_day'] <= 7 && sizeof($user_package_data)==0 && !$pop_up){
            ?>
                <div class="renew_bar">
                    <div class="renew_desc">
                        <img src="fitness/images/warning_renew.png" class="img-responsive warning_renew" />Your current plan will expire soon. Kindly renew on {{ $users->plan_start_date ? $users->plan_end_date : 'XX/XX/XXXX' }} to continue your fitness journey with us.
                    </div>
                    <div class="renew_btn_sec">
                        <div class="renew_hide">Hide</div>
                        @if($user_workday['user_plan_left_day'] < 1 && $users->user_status == 11)
                            <div class="renew_action" onclick="$('#package_bought').click()">Renew</div>
                        @endif
                    </div>
                </div>
            <?php
            }
            ?>
            <section class="p_d dashboard">
                <div class="container" data-aos="fade-up" style="padding:0px;">
                    <?php
                    if($pop_up){
                        ?>
                        <div class="banner_img" onclick="$('#package_bought').click()">
                            <div class="i_diwali">
                                <img src="fitness/images/diwali_dashboard_desktop.png" class="img-responsive nd_p" />
                            </div>
                            <div class="t_diwali">
                                <p class="rm_headeer_new_date">28<sup>th</sup> Oct - 09<sup>th</sup> Nov, 2021</p>
                                <p class="rm_headeer_new">Hey {{ $users->name }}, this Diwali renew your subscription at
                                    exclusive prices!</p>
                                <div class="avl_btn">Avail Now</div>
                            </div>
                        </div>
                        <?php
                    }

                    // if statuses - 4. questuion_filled, 5. physique_img_sent, 6. Plan_sent, 7.intro_call_complete
                    if($users->user_status > 3 && $users->user_status < 8 && $users->member_type!='Live Session'){
                        ?>
                        <!-- <div style="margin-top:16px;">Your plan soon starting</div> -->
                        <div class="container-fluid start_outside">
                            <div class="tracker_box">
                                <div class="p_tracker">Questionnaire</div>
                                <div class="p_tracker_img p_tracker_img_active"><i class="fa fa-check"
                                        aria-hidden="true"></i></div>
                            </div>
                            <div class="tracker_box">
                                <div class="p_tracker">Physique</div>
                                <div class="p_tracker_img"><i class="fa fa-male" aria-hidden="true"></i></div>
                            </div>
                            <div class="tracker_box">
                                <div class="p_tracker">Customize Plan</div>
                                <div class="p_tracker_img"><i class="fa fa-file" aria-hidden="true"></i></div>
                            </div>
                            <div class="tracker_box">
                                <div class="p_tracker">Intro Call</div>
                                <div class="p_tracker_img"><i class="fa fa-phone" aria-hidden="true"></i></div>
                            </div>
                            <div class="tracker_progress_bar">
                                <?php
                                $progress_width = '0%';
                                if ($users->user_status == 4) {
                                    $progress_width = '14%';
                                } elseif ($users->user_status == 5) {
                                    $progress_width = '41%';
                                } elseif ($users->user_status == 6) {
                                    $progress_width = '72%';
                                } elseif ($users->user_status == 7) {
                                    $progress_width = '111%';
                                }
                                ?>
                                <div class="tracker_progress_bar_inside" style="width:{{ $progress_width }}"></div>
                            </div>
                        </div>
                        <div class="container-fluid first_card">
                            <div class="profile_onboarding">
                                <div class="img_sec tz">
                                    <div class="img_div">
                                        <img class="img-responsive rounded_img_onboarding" src="<?php echo Session::get('image') ? Session::get('image') : 'fitness/images/default_image.svg'; ?>" />
                                    </div>
                                    <div class="img_text">
                                        <?php echo ucfirst($users->name); ?>
                                    </div>
                                </div>
                                <div class="membership_onboarding tz" target="_blank">
                                    <div class="m_d"><?php echo ucfirst($users->plan); ?> Membership</div>
                                    <div class="m_d_s_d"><?php echo ucfirst($users->member_type); ?> Plan</div>
                                    <?php
                                if(($users->user_status==6 || $users->user_status==7) && ($users->member_type!='Live Session')){
                                ?>
                                    <div class="v_m_b">View Plan</div>
                                    <?php
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }

                    // if statuses - 4. questuion_filled, 5. physique_img_sent, 6. Plan_sent, 7.intro_call_complete
                    else if($users->user_status > 3 && $users->user_status < 8 && $users->member_type=='Live Session'){
                        ?>
                        <div class="container-fluid start_outside">
                            <div id="greeting_msg" class="p_start_outside">Welcome to Liv Ezy.</div>
                            <!-- <div  id="greeting_msg_2" class="p_start_outside">Great to have you on board!</div> -->
                            <div class="p_start_outside">Your plan will start on <?php echo $users->questionaire_start_date ? date('d-m-Y', strtotime($users->questionaire_start_date)) : ''; ?></div>
                        </div>
                        <div class="container-fluid first_card">
                            <div class="profile_onboarding">
                                <div class="img_sec tz">
                                    <div class="img_div">
                                        <img class="img-responsive rounded_img_onboarding" src="<?php echo Session::get('image') ? Session::get('image') : 'fitness/images/default_image.svg'; ?>" />
                                    </div>
                                    <div class="img_text">
                                        <?php echo ucfirst($users->name); ?>
                                    </div>
                                </div>
                                <div class="membership_onboarding tz" target="_blank">
                                    <div class="m_d"><?php echo ucfirst($users->plan); ?> Membership</div>
                                    <div class="m_d_s_d"><?php echo ucfirst($users->member_type); ?> Plan</div>
                                    <?php
                                if(($users->user_status==6 || $users->user_status==7) && ($users->member_type!='Live Session')){
                                ?>
                                    <div class="v_m_b">View Plan</div>
                                    <?php
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }

                    // if statuses - 2. plan_purchase
                    else if($users->user_status==2) { ?>
                        <!-- <div style="margin-top:16px;"><a href="#" id="p_s_c" class="btn-calendar">Start Your Plan</a></div> -->
                        <div class="container-fluid start_outside">
                            <div id="greeting_msg" class="p_start_outside">Welcome to Liv Ezy.</div>
                            <div id="greeting_msg_2" class="p_start_outside">Great to have you on board!</div>
                        </div>

                        <?php if(!empty($users->team)) { ?>

                            <?php if(!$users->is_profile_filled) { ?>
                                <div class="container-fluid first_card">
                                <div class="font_ten_style">Complete your profile section to start your</div>
                                <div class="font_ten_style"><?php echo ucfirst($users->plan); ?> membership - <?php echo ucfirst($users->member_type); ?> Plan</div>
                                <div class="btn_p"><button onclick="$('#profile_d').click()" class="complete_p_b">Go to Profile</button></div>
                                </div>
                            <?php } else { ?>
                                <div class="container-fluid first_card">
                                    <div class="font_ten_style"><?php echo ucfirst($users->plan); ?> Membership</div>
                                    <div class="font_ten_style"><?php echo ucfirst($users->member_type); ?> Plan</div>
                                    <?php
                                    if($future_question){
                                    ?>
                                        <div class="btn_p">
                                            <button class="complete_p_b std">Start date chosen <?php echo $users->questionaire_start_date ? date('d-m-Y', strtotime($users->questionaire_start_date)) : ''; ?>
                                            </button>
                                        </div>
                                    <?php
                                    }
                                    else{
                                        if($users->member_type!='Live Session'){?>
                                            <div class="font_ten_style n_p_n">
                                                <b>Please Note:</b> It will take us at least 48 hours to customize your diet & workout plan
                                            </div>
                                        <?php
                                        } ?>
                                        <div class="btn_p">
                                            <button class="complete_p_b std btn-calendar" id="p_s_c">Choose Your Start Date
                                            </button>
                                        </div>
                                    <?php
                                    } ?>
                                </div>
                            <?php }
                        }
                        else if($users->member_type === 'Live Session') { ?>
                            <div class="container-fluid first_card">
                                <div class="font_ten_style"><?php echo ucfirst($users->plan); ?> Membership</div>
                                <div class="font_ten_style"><?php echo ucfirst($users->member_type); ?> Plan</div>
                                <div class="btn_p"><button class="complete_p_b std btn-calendar" id="p_s_c">Choose Your Start Date</button></div>
                            </div>
                        <?php
                        }
                    }

                    // if statuses - 9. pause or 8. plan_start
                    else{
                        if($users->user_status==9){
                            // echo '<style>.pause_btn{margin-left:-20px;}</style><div style="margin-top:8px;"><span id="cancel_pause">Cancel Pause</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i data-toggle="modal" data-target="#pause_info" class="fa fa-info"></i></div>';
                            ?>
                                <div class="profile_ongoing">
                                    <div class="img_sec tz">
                                        <div class="img_div">
                                            <img class="img-responsive rounded_img_onboarding big_img"
                                                src="<?php echo Session::get('image') ? Session::get('image') : 'fitness/images/default_image.svg'; ?>" />
                                        </div>
                                    </div>
                                    <div class="membership_onboarding tz">
                                        <div class="m_d" style="line-height:40px;"><?php echo ucfirst($users->name); ?></div>
                                        <?php
                                        if($users->member_type!='Live Session'){
                                        ?>
                                        <a href="<?php echo $users->plan_doc_link; ?>" target="_blank">
                                            <div class="m_d_s_d"><img src="fitness/images/view_plan.png" class="v_p_f"><span
                                                    class="v_p">View Plan</span></div>
                                        </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <hr class="profile_ongoing_hr">
                                <div class="container-fluid second_card">
                                    <div class="d_oniut">
                                        <div class="left_d_b_pause">
                                        </div>
                                        <div class="dsc" data-bg="#fff"
                                            data-title="{{ $user_workday ? $user_workday['user_plan_left_day'] : 0 }} Days Left"
                                            data-donutty data-radius=40 data-thickness=8 data-circle=true data-padding=0
                                            data-round=true data-color="#5CE722"
                                            data-value="{{ $user_workday ? $user_workday['user_complete_percentage'] : 0 }}">
                                        </div>
                                    </div>
                                    <div class="ongoing_membership">
                                        <div class="d-flex">
                                            <div class="second_o_m mr-2">Coach: <?php echo ucfirst($users->head_coach); ?></div>
                                            @if(isset($coachDetail))
                                                @include('tier_tags',['coachDetail' => $coachDetail])
                                            @endif
                                        </div>
                                        <div class="first_o_m"><?php echo ucfirst($users->plan); ?> Membership</div>
                                        <div class="second_o_m"><?php echo ucfirst($users->member_type); ?> Plan</div>
                                        <div class="third_o_m" style="margin-top:22px;">Start Date:
                                            {{ $users->plan_start_date ? $users->plan_start_date : 'XX/XX/XXXX' }}</div>
                                        <div class="third_o_m">End Date:
                                            {{ $users->plan_start_date ? $users->plan_end_date : 'XX/XX/XXXX' }}</div>
                                    </div>
                                </div>
                                <?php
                                if(sizeof($upcoming_pause)>0){
                                    ?>
                                <div class="container-fluid new_padding">
                                    <div class="pause_outside">
                                        Upcoming Pause
                                    </div>
                                    <div class="upcoming_pause_carousel">
                                        <?php for($u_p=0;$u_p<sizeof($upcoming_pause);$u_p++){?>
                                        <div class="first_box_upcoming_pause">
                                            <div class="outside_number_pause">
                                                <div class="u_p_h_t">
                                                    Pause Days
                                                </div>
                                                <div class="number_pause_days">
                                                    {{ $upcoming_pause[$u_p]->days }}
                                                </div>
                                            </div>
                                            <div class="outside_date_pause">
                                                <div class="f_date">
                                                    <div class="number_date">
                                                        {{ date('d', strtotime($upcoming_pause[$u_p]->start_date)) }}
                                                    </div>
                                                    <div class="letter_date">
                                                        {{ date('M Y', strtotime($upcoming_pause[$u_p]->start_date)) }}
                                                    </div>
                                                </div>
                                                <div class="s_date">
                                                    -
                                                </div>
                                                <div class="t_date">
                                                    <div class="number_date">
                                                        {{ date('d', strtotime($upcoming_pause[$u_p]->end_date)) }}
                                                    </div>
                                                    <div class="letter_date">
                                                        {{ date('M Y', strtotime($upcoming_pause[$u_p]->end_date)) }}
                                                    </div>
                                                </div>
                                                <button class="cancel_future_pause"
                                                    onclick="cancel_pause('{{ $upcoming_pause[$u_p]->id }}','{{ $upcoming_pause[$u_p]->username }}','{{ $upcoming_pause[$u_p]->start_date }}','{{ $upcoming_pause[$u_p]->end_date }}','{{ $upcoming_pause[$u_p]->days }}')">Cancel</button>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="pause_outside">
                                    Pause <div data-toggle="modal" data-target="#pause_info" class="pause_outside_info">i</div>
                                </div>
                                <div class="container-fluid general_white_card">
                                    <div class="blue_box">
                                        <div class="inside_blue_box">
                                            <div class="pause_h_font">
                                                <?php echo $users->total_pause_day; ?>
                                            </div>
                                            <div class="pause_s_h_font">
                                                Available
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blue_box">
                                        <div class="inside_blue_box">
                                            <div class="pause_h_font">
                                                <?php echo $users->pause_day_availed; ?>
                                            </div>
                                            <div class="pause_s_h_font">
                                                Availed
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blue_box">
                                        <div class="inside_blue_box">
                                            <div class="pause_h_font">
                                                <?php echo $users->total_pause_day - $users->pause_day_availed; ?>
                                            </div>
                                            <div class="pause_s_h_font">
                                                Left
                                            </div>
                                        </div>
                                    </div>
                                    <button id="cancel_pause" class="pause_ongoing btn-calendar">Cancel</button>
                                </div>
                                <?php
                        }else if($users->user_status==8){
                            //echo '<style>.pause_btn{margin-left:-20px;}</style><div style="margin-top:17px;"><a href="#" id="r_p_p" class="btn-calendar">Pause</a></div>';
                            ?>
                                <div class="profile_ongoing">
                                    <div class="img_sec tz">
                                        <div class="img_div">
                                            <img class="img-responsive rounded_img_onboarding big_img"
                                                src="<?php echo Session::get('image') ? Session::get('image') : 'fitness/images/default_image.svg'; ?>" />
                                        </div>
                                    </div>
                                    <div class="membership_onboarding tz">
                                        <div class="m_d" style="line-height:40px;"><?php echo ucfirst($users->name); ?></div>
                                        <?php
                                        if($users->member_type!='Live Session'){
                                        ?>
                                        <a href="<?php echo $users->plan_doc_link; ?>" target="_blank">
                                            <div class="m_d_s_d"><img src="fitness/images/view_plan.png" class="v_p_f"> <span
                                                    class="v_p">View Plan</span></div>
                                        </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if($user_workday['user_plan_left_day']<8 && sizeof($user_package_data)==0 && !$pop_up){ ?>
                                            <!-- data-toggle="modal" data-target="#renew_modal_new" -->
                                            <div class="renew_btn" onclick="$('#package_bought').click()">Renew</div>
                                        <?php
                                    }?>
                                </div>
                                <hr class="profile_ongoing_hr">
                                <div class="container-fluid second_card">
                                    <div class="d_oniut">
                                        <div class="left_d_b">
                                            <div class="left_d legend_c_text">
                                                {{ $user_workday ? $user_workday['user_plan_left_day'] : 0 }}
                                            </div>
                                            <div class="left_b d_l">
                                                Days Left
                                            </div>
                                        </div>
                                        <div class="dsc" data-bg="#fff"
                                            data-title="{{ $user_workday ? $user_workday['user_plan_left_day'] : 0 }} Days Left"
                                            data-donutty data-radius=40 data-thickness=8 data-circle=true data-padding=0
                                            data-round=true data-color="#5CE722"
                                            data-value="{{ $user_workday ? $user_workday['user_complete_percentage'] : 0 }}">
                                        </div>
                                    </div>
                                    <div class="ongoing_membership">
                                        <div class="d-flex">
                                            <div class="second_o_m mr-2 mb-3">Coach: <?php echo ucfirst($users->head_coach); ?></div>
                                            @if(isset($coachDetail))
                                                @include('tier_tags',['coachDetail' => $coachDetail])
                                            @endif
                                        </div>
                                        <div class="first_o_m"><?php echo ucfirst($users->plan); ?> Membership</div>
                                        <div class="second_o_m"><?php echo ucfirst($users->member_type); ?> Plan</div>
                                        <div class="third_o_m" style="margin-top:22px;">Start Date:
                                            {{ $users->plan_start_date ? $users->plan_start_date : 'XX/XX/XXXX' }}</div>
                                        <div class="third_o_m">End Date:
                                            {{ $users->plan_start_date ? $users->plan_end_date : 'XX/XX/XXXX' }}</div>
                                    </div>
                                </div>
                                <?php if(sizeof($live_session_data)>0){
                                    $today_book_date = date('Y-m-d');
                                    $loop_date = $live_session_data[0]->start_date;
                                    if($today_book_date==$loop_date){
                                ?>
                                <div class="container-fluid new_padding new_live_sess_hide" style="margin-top:30px;">
                                    <div class="liv_carousel_outside">
                                        <div class="first_liv_carousel">
                                            <div class="txt_upcming">Upcoming Live Sessions</div>
                                            <div class="timezone_txt">Time Zone -
                                                {{ isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata' }}
                                            </div>
                                        </div>
                                        <div onclick="$('#live_session').click()" class="second_liv_carousel">
                                            View More
                                        </div>
                                    </div>
                                    <div class="live_sessoin_carousel">
                                        <?php
                                        $general_date_zone = date('Y-m-d H:i:s');
                                        $general_tz_zone = new DateTime($general_date_zone, new DateTimeZone('Asia/Kolkata'));
                                        $user_time_zone_today=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                        $user_time_zone=$user_time_zone_today;
                                        $general_tz_zone->setTimezone(new DateTimeZone($user_time_zone_today));
                                        for($i=0;$i<sizeof($live_session_data);$i++){
                                            $today_book_date_now = $live_session_data[$i]->start_date;
                                            $date_tz_now = new DateTime($today_book_date_now, new DateTimeZone('Asia/Kolkata'));
                                            $user_time_zone_today=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                            $date_tz_now->setTimezone(new DateTimeZone($user_time_zone_today));
                                            $today_book_date= $general_tz_zone->format('Y-m-d');
                                            // echo $today_book_date.'<br>'.$live_session_data[$i]->start_date;
                                            $loop_date = $date_tz_now->format('Y-m-d');
                                            $day_t_init=' ';
                                            $st='';
                                            if($i==0)
                                                $st='style="display:block;"';
                                            if($i!=0){
                                                $first=$live_session_data[$i-1]->start_date;
                                                $first_tz=new DateTime($first, new DateTimeZone('Asia/Kolkata'));
                                                // $user_time_zone=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                                $first_tz->setTimezone(new DateTimeZone($user_time_zone));
                                                $day_t_init=date('D',strtotime($first_tz->format('Y-m-d')));
                                            }
                                            $second=$live_session_data[$i]->start_date;
                                            $second_tz=new DateTime($second, new DateTimeZone('Asia/Kolkata'));
                                            // $user_time_zone=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                            $second_tz->setTimezone(new DateTimeZone($user_time_zone));
                                            $day_t=date('D',strtotime($second_tz->format('Y-m-d')));
                                            // if($day_t_init!=$day_t){
                                            //     echo '<div class="lid ned" '.$st.' id="liv_'.$day_t.'">';
                                            // }
                                            // if($general_tz_zone->format('Y-m-d')==$date_tz_now->format('Y-m-d')){
                                            if($today_book_date==$loop_date){
                                            ?>
                                        <div class="live_sess_block_new">
                                            <div class="filter_{{ $live_session_data[$i]->session_name }}"
                                                data-session="{{ $live_session_data[$i]->session_name }}">
                                                <div class="f_live_sess">
                                                    <img class="l_s_i_img_today"
                                                        src='fitness/images/{{ $live_session_data[$i]->session_name }}.png'>
                                                </div>
                                                <div class="s_live_sess">
                                                    <div class="live_sess_name">
                                                        {{ session_name_rechange($live_session_data[$i]->session_name) }}
                                                    </div>
                                                    <hr style="margin:2px;">
                                                    <div class="live_sess_name">
                                                        <!-- <script>
                                                            var a = convertTZ('<?php echo $live_session_data[$i]->start_date . ' ' . $live_session_data[$i]->start_time; ?>', '<?php echo isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata'; ?>');
                                                            document.write(moment(a).format('hh:mm A'))
                                                        </script> -->
                                                        <?php
                                                        $date_tz = new DateTime($live_session_data[$i]->start_date . ' ' . $live_session_data[$i]->start_time, new DateTimeZone('Asia/Kolkata'));
                                                        $user_time_zone = isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata';
                                                        $date_tz->setTimezone(new DateTimeZone($user_time_zone));
                                                        echo $date_tz->format('H:i');
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="t_live_sess">
                                                    <?php
                                                        $btn_a=false;
                                                        $is_join='False';
                                                        for($b=0;$b<sizeof($user_book_live_sess);$b++){
                                                            if($live_session_data[$i]->id==$user_book_live_sess[$b]->session_id){
                                                                $btn_a=true;
                                                                if($user_book_live_sess[$b]->is_join==1)
                                                                    $is_join='True';
                                                                break;
                                                            }
                                                        }
                                                        //&& $users->free_live_session!=0
                                                    if($users->user_status==8 || ($users->user_status==1)){
                                                        if($btn_a){
                                                            ?>
                                                    <button data-is_join="{{ $is_join }}" onclick="zoom_start(this)"
                                                        data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                                        data-start_date="{{ $live_session_data[$i]->start_date }}"
                                                        data-start_time="{{ $live_session_data[$i]->start_time }}"
                                                        data-booked="true" data-session="{{ $live_session_data[$i]->id }}"
                                                        data-url="{{ $live_session_data[$i]->session_url }}"
                                                        data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                                        class="book_live_btn_today bks_c {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Cancel</button>
                                                    <?php
                                                        }else{
                                                            if($live_session_data[$i]->total_seat==$live_session_data[$i]->booked_seat){
                                                                ?>
                                                    <button style="background:gray;" title="All Slot Booked"
                                                        data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                                        data-start_date="{{ $live_session_data[$i]->start_date }}"
                                                        data-start_time="{{ $live_session_data[$i]->start_time }}"
                                                        data-booked="false" data-session="{{ $live_session_data[$i]->id }}"
                                                        data-url="{{ $live_session_data[$i]->session_url }}"
                                                        data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                                        class="book_live_btn_today {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Book
                                                        Now</button>
                                                    <?php
                                                            }else{
                                                                ?>
                                                    <button onclick="zoom_start(this)"
                                                        data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                                        data-start_date="{{ $live_session_data[$i]->start_date }}"
                                                        data-start_time="{{ $live_session_data[$i]->start_time }}"
                                                        data-booked="false" data-session="{{ $live_session_data[$i]->id }}"
                                                        data-url="{{ $live_session_data[$i]->session_url }}"
                                                        data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                                        class="book_live_btn_today {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Book
                                                        Now</button>
                                                    <?php
                                                            }
                                                        }
                                                    }else if($users->user_status==9){
                                                        ?>
                                                    <button
                                                        onclick="static_msg('You can not book live sessions if your plan is on pause')"
                                                        data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                                        data-start_date="{{ $live_session_data[$i]->start_date }}"
                                                        data-start_time="{{ $live_session_data[$i]->start_time }}"
                                                        data-booked="false" data-session="{{ $live_session_data[$i]->id }}"
                                                        data-url="{{ $live_session_data[$i]->session_url }}"
                                                        data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                                        class="book_live_btn_today {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Book
                                                        Now</button>
                                                    <?php
                                                    }else if($users->user_status==1 && $users->free_live_session==0){
                                                        ?>
                                                    <button
                                                        onclick="static_msg('You have used all your trial live session, Please subscribe to take benefits of live session')"
                                                        data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                                        data-start_date="{{ $live_session_data[$i]->start_date }}"
                                                        data-start_time="{{ $live_session_data[$i]->start_time }}"
                                                        data-booked="false" data-session="{{ $live_session_data[$i]->id }}"
                                                        data-url="{{ $live_session_data[$i]->session_url }}"
                                                        data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                                        class="book_live_btn_today {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Book
                                                        Now</button>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <?php
                                        //    if($day_t_s!=$day_t || $i==(sizeof($live_session_data)-1)){
                                        //         echo '</div>';
                                        //     }
                                            echo "</div>";
                                            }
                                        }
                                    ?>
                                        </div>
                                    </div>
                                    <?php
                                }
                                }
                                if(sizeof($upcoming_pause)>0){
                                ?>
                                    <div class="container-fluid new_padding">
                                        <div class="pause_outside">
                                            Upcoming Pause
                                        </div>
                                        <div class="upcoming_pause_carousel">
                                            <?php for($u_p=0;$u_p<sizeof($upcoming_pause);$u_p++){?>
                                            <div class="first_box_upcoming_pause">
                                                <div class="outside_number_pause">
                                                    <div class="u_p_h_t">
                                                        Pause Days
                                                    </div>
                                                    <div class="number_pause_days">
                                                        {{ $upcoming_pause[$u_p]->days }}
                                                    </div>
                                                </div>
                                                <div class="outside_date_pause">
                                                    <div class="f_date">
                                                        <div class="number_date">
                                                            {{ date('d', strtotime($upcoming_pause[$u_p]->start_date)) }}
                                                        </div>
                                                        <div class="letter_date">
                                                            {{ date('M Y', strtotime($upcoming_pause[$u_p]->start_date)) }}
                                                        </div>
                                                    </div>
                                                    <div class="s_date">
                                                        -
                                                    </div>
                                                    <div class="t_date">
                                                        <div class="number_date">
                                                            {{ date('d', strtotime($upcoming_pause[$u_p]->end_date)) }}
                                                        </div>
                                                        <div class="letter_date">
                                                            {{ date('M Y', strtotime($upcoming_pause[$u_p]->end_date)) }}
                                                        </div>
                                                    </div>
                                                    <button class="cancel_future_pause"
                                                        onclick="cancel_pause('{{ $upcoming_pause[$u_p]->id }}','{{ $upcoming_pause[$u_p]->username }}','{{ $upcoming_pause[$u_p]->start_date }}','{{ $upcoming_pause[$u_p]->end_date }}','{{ $upcoming_pause[$u_p]->days }}')">Cancel</button>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div class="pause_outside">
                                        Pause <div data-toggle="modal" data-target="#pause_info" class="pause_outside_info">i
                                        </div>
                                    </div>
                                    <div class="container-fluid general_white_card">
                                        <div class="blue_box">
                                            <div class="inside_blue_box">
                                                <div class="pause_h_font">
                                                    <?php echo $users->total_pause_day; ?>
                                                </div>
                                                <div class="pause_s_h_font">
                                                    Available
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blue_box">
                                            <div class="inside_blue_box">
                                                <div class="pause_h_font">
                                                    <?php echo $users->pause_day_availed; ?>
                                                </div>
                                                <div class="pause_s_h_font">
                                                    Availed
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blue_box">
                                            <div class="inside_blue_box">
                                                <div class="pause_h_font">
                                                    <?php echo $users->total_pause_day - $users->pause_day_availed; ?>
                                                </div>
                                                <div class="pause_s_h_font">
                                                    Left
                                                </div>
                                            </div>
                                        </div>
                                        <button id="r_p_p" class="pause_ongoing btn-calendar">Pause</button>
                                    </div>
                                    <?php
                        }else{
                            // echo '<div style="margin-top:16px;">Plan Expired</div>';
                        }
                    }
                    ?>

                    <?php
                    if($users->user_status > 1 && $users->user_status < 10) {
                        if(empty($users->team) && $users->member_type != 'Live Session') {
                            if($users->admin_assign_coach == 1) {  ?>

                                <?php if(!$users->is_profile_filled) { ?>
                                    <div class="container-fluid first_card">
                                    <div class="font_ten_style">Complete your profile section to start your</div>
                                    <div class="font_ten_style"><?php echo ucfirst($users->plan); ?> membership - <?php echo ucfirst($users->member_type); ?> Plan</div>
                                    <div class="btn_p"><button onclick="$('#profile_d').click()" class="complete_p_b">Go to Profile</button></div>
                                    </div>
                                <?php } else { ?>

                                    @if($users->user_status == 2)
                                    <div class="container-fluid first_card">
                                        <div class="font_ten_style"><?php echo ucfirst($users->plan); ?> Membership</div>
                                        <div class="font_ten_style"><?php echo ucfirst($users->member_type); ?> Plan</div>
                                        <div class="btn_p">
                                            <button class="complete_p_b std btn-calendar" id="p_s_c">Choose Your Start Date
                                            </button>
                                        </div>
                                    </div>
                                    @endif

                                <?php
                                }
                            }
                            // else { ?>

                                {{-- <div class="text-center">
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8 text-center mt-3  coach_request_card">
                                            <div class="text-center mb-4 pt-4"><a href="javascript:void(0);" onclick="admin_assign_coach({{ $users->id, 1 }})" class="btn btn-primary" style="padding: 0.3rem 2rem;background-color: #31cecd;border: 1px solid #31cecd; color: #333;font-weight: 600; border-radius: 2rem;">Assign a Coach to me</a>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div> --}}
                            <?php
                            //}
                        }
                        ?>
                                <style>
                                    body .appBuilder-carousel {
                                        margin-bottom: 45px;
                                        margin-top: 16px;
                                        background: #fff;
                                        padding: 20px;
                                        background: #FFFFFF;
                                        box-shadow: 7px 7px 15px rgba(0, 0, 0, 0.25), -7px -7px 15px rgba(255, 255, 255, 0.3);
                                        border-radius: 10px;
                                    }

                                    body .appBuilder-carousel .carousel .carousel-indicators {
                                        /* width: 76%; */
                                    }

                                    body .appBuilder-carousel .carousel .carousel-indicators li {
                                        border: none;
                                        background-color: #98ACB9;
                                        height: 18px;
                                        margin-right: 28px;
                                        width: 18px;
                                    }

                                    body .appBuilder-carousel .carousel .carousel-indicators li.active {
                                        background-color: #50E3C2;
                                    }

                                    body .appBuilder-carousel .carousel .carousel-inner .item h3 {
                                        /* font-weight: 700;
                                        font-size: 25px;
                                        color: #FFFFFF;
                                        letter-spacing: 0.89px;
                                        line-height: 38.41px;
                                        margin-bottom: 50px;
                                        margin-top: 30px;
                                        position: relative; */
                                    }

                                    body .appBuilder-carousel .carousel .carousel-inner .item h3::after {
                                        /* background-color: #FFFFFF;
                                        bottom: -18px;
                                        content: "";
                                        height: 6px;
                                        left: 0;
                                        position: absolute;
                                        width: 158px; */
                                    }

                                    /* body .appBuilder-carousel .carousel .carousel-inner .item h4 {
                                    font-weight: 700;
                                    font-size: 25px;
                                    color: #43EEC5;
                                    letter-spacing: 1.02px;
                                    line-height: 33px;
                                    } */
                                    .i_c_v {
                                        background: unset !important;
                                        border: unset !important;
                                        /* margin:unset!important;
                                        padding:unset!important;
                                        color:#000!important; */
                                        height: 28vh;
                                    }

                                    .v_c_r {
                                        width: 140px;
                                        background: transparent;
                                        color: #187fde;
                                        font-size: 1em;
                                        height: 40px;
                                        font-weight: 400;
                                        border: 1px solid #e5e5e5;
                                    }

                                    .r_t_b {
                                        /* margin-top:20px; */
                                        /* margin-left:20px; */
                                        margin-right: 10px;
                                    }

                                    .r_t {
                                        margin-bottom: 20px;
                                    }

                                    .ytb {
                                        position: absolute;
                                        height: 60px;
                                        top: 38%;
                                        left: 44%;
                                    }

                                    .ytp {
                                        position: absolute;
                                        border-radius: 6px;
                                        height: 222px;
                                    }

                                    .nds {
                                        margin-left: 30px;
                                        font-style: normal;
                                        font-weight: normal;
                                        font-size: 1em;
                                        line-height: 170%;
                                        margin-right: 30px;
                                    }

                                    .nds_h {
                                        margin-top: -10px;
                                        font-size: 1.5em;
                                        margin-left: 30px;
                                        margin-right: 30px;
                                    }

                                    .carousel-indicators {
                                        bottom: -75px !important;
                                    }

                                    .own-member-item .heading {
                                        font-size: 1.4em !important;
                                    }
                                </style>

                                <div class="container-fluid reci_sec">
                                    <div class="recipe_f">Recipes</div>
                                </div>
                                <div class="slick-carousel mb-4" style="margin:6px;">
                                    <div class="item i_c_v">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <a class="popup-youtube"
                                                    href="https://www.youtube.com/watch?v=Oft1wnInKxI?autoplay=1&rel=0&controls=1&showinfo=0&wmode=transparent">
                                                    <img class="img-responsive ytp"
                                                        onmouseover="this.src='fitness/images/recipe_gif/fruit.gif'"
                                                        onmouseout="this.src='fitness/images/recipe_gif/fruit.png'"
                                                        src="fitness/images/recipe_gif/fruit.png" alt="builder app video" />
                                                    <img class="img-responsive ytb"
                                                        src="fitness/images/recipe_gif/youtube_play.png" />
                                                </a>
                                            </div>
                                            <div class="col-md-7">
                                                <p class="r_t">
                                                <h2 class="nds_h">Fruit Parfait!🍉🥭</h2>
                                                </p>
                                                <p class="r_t">
                                                <h4 class="nds">This is delicious for breakfast, snack, even for dessert! It
                                                    looks great in a glass, but can also be made in a bowl. Use your favorite
                                                    fruit and let the flavor explode in your mouth.</h4>
                                                </p>
                                                <p class="r_t_b"><button onclick="$('#recipes').click()"
                                                        class="form-control v_c_r view_more_recipe">View more</button></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item i_c_v">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <a class="popup-youtube"
                                                    href="https://www.youtube.com/watch?v=T9w4cUGNNa4?autoplay=1&rel=0&controls=1&showinfo=0&wmode=transparent">
                                                    <img class="img-responsive ytp"
                                                        onmouseover="this.src='fitness/images/recipe_gif/mango.gif'"
                                                        onmouseout="this.src='fitness/images/recipe_gif/mango.png'"
                                                        src="fitness/images/recipe_gif/mango.png" alt="builder app video" />
                                                    <img class="img-responsive ytb"
                                                        src="fitness/images/recipe_gif/youtube_play.png" />
                                                </a>
                                            </div>
                                            <div class="col-md-7">
                                                <p class="r_t">
                                                <h2 class="nds_h">Mango Yogurt 🥭</h2>
                                                </p>
                                                <p class="r_t">
                                                <h4 class="nds">This is delicious for breakfast, snack, even for dessert! It
                                                    looks great in a glass, but can also be made in a bowl. Use your favorite
                                                    fruit and let the flavor explode in your mouth.</h4>
                                                </p>
                                                <p class="r_t_b"><button onclick="$('#recipes').click()"
                                                        class="form-control v_c_r view_more_recipe">View more</button></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item i_c_v">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <a class="popup-youtube"
                                                    href="https://www.youtube.com/watch?v=mvYoRTtPgsc?autoplay=1&rel=0&controls=1&showinfo=0&wmode=transparent">
                                                    <img class="img-responsive ytp"
                                                        onmouseover="this.src='fitness/images/recipe_gif/ots.gif'"
                                                        onmouseout="this.src='fitness/images/recipe_gif/ots.png'"
                                                        src="fitness/images/recipe_gif/ots.png" alt="builder app video" />
                                                    <img class="img-responsive ytb"
                                                        src="fitness/images/recipe_gif/youtube_play.png" />
                                                </a>
                                            </div>
                                            <div class="col-md-7">
                                                <p class="r_t">
                                                <h2 class="nds_h">Overnight Oats 🥣</h2>
                                                </p>
                                                <p class="r_t">
                                                <h4 class="nds">Overnight oats make for an incredibly versatile breakfast or
                                                    snack. They can be enjoyed warm or cold and prepared days in exclusive with
                                                    minimal prep. Moreover, you can top this tasty meal with an array of
                                                    nutritious ingredients that benefit your health.</h4>
                                                </p>
                                                <p class="r_t_b"><button onclick="$('#recipes').click()"
                                                        class="form-control v_c_r view_more_recipe">View more</button></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item i_c_v">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <a class="popup-youtube"
                                                    href="https://www.youtube.com/watch?v=a1m8wEWKNS4?autoplay=1&rel=0&controls=1&showinfo=0&wmode=transparent">
                                                    <img class="img-responsive ytp"
                                                        onmouseover="this.src='fitness/images/recipe_gif/chocolate.gif'"
                                                        onmouseout="this.src='fitness/images/recipe_gif/chocolate.png'"
                                                        src="fitness/images/recipe_gif/chocolate.png"
                                                        alt="builder app video" />
                                                    <img class="img-responsive ytb"
                                                        src="fitness/images/recipe_gif/youtube_play.png" />
                                                </a>
                                            </div>
                                            <div class="col-md-7">
                                                <p class="r_t">
                                                <h2 class="nds_h">Chocolate Chip Banana Pancakes 🍫🥞🍌</h2>
                                                </p>
                                                <p class="r_t">
                                                <h4 class="nds">Amazing banana chocolate chip pancakes! It’s a great idea to
                                                    use up ripe bananas. These pancakes come out thick, fluffy, they have an
                                                    almost plush texture.</h4>
                                                </p>
                                                <p class="r_t_b"><button onclick="$('#recipes').click()"
                                                        class="form-control v_c_r view_more_recipe">View more</button></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                    }
                    else {
                    ?>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="p_head_first">Welcome to Liv Ezy. <br>We’re thrilled to see you here!</p>
                            </div>
                        </div>
                        <div class="row" id="csb2" style="margin-top:10px;">
                            <div class="col-md-12 free-liv">
                                <?php if($users->user_status==11) { ?>
                                    <div class="right_free">
                                        <?php if($pop_up) { ?>
                                        <button class="btn-free" onclick="$('#package_bought').click()">Renew</button>
                                        <?php } else { ?>
                                            @if($users->admin_assign_coach == 0)
                                            <button class="btn-free renew_click">Renew</button>
                                            @else
                                            <button class="btn-free renew_click_plus">Renew</button>
                                            @endif
                                        <?php } ?>
                                    </div>
                                <?php
                                }
                                else {
                                    $liv_sess_free='No';
                                    if($users->free_live_session==2)
                                        $liv_sess_free='Two';
                                    else if($users->free_live_session==1)
                                        $liv_sess_free='One';
                                        ?>
                                        <style>
                                                    .buddy-coaching-plans .spl-price,
                                                    .individual-coaching-plans .spl-price {
                                                        display: none;
                                                    }

                                                    .buddy-coaching-plans .line-through,
                                                    .individual-coaching-plans .line-through {
                                                        text-decoration: none !important;
                                                    }
                                        </style>
                                        <?php if($liv_sess_free!='No'){ ?>
                                            <div class="left_free">
                                                <div class="left_free_style">
                                                    <div>{{ $liv_sess_free }} free live</div>
                                                    <div>sessions available</div>
                                                </div>
                                            </div>
                                        <?php
                                        } ?>
                                    <div class="right_free">
                                        <?php
                                        if($liv_sess_free=='No'){
                                            ?>
                                            <button class="btn-free" style="width:150px;" onclick="subscribe_more()">Subscribe Now</button>
                                            <?php
                                        }else{
                                        ?>
                                            <button class="btn-free" onclick="$('#live_session').click()">Book Now</button>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                } ?>
                            </div>
                        </div>

                        <hr class="profile_ongoing_hr">

                        <div class="renew_bar_db">
                            <div class="renew_desc">
                                <img src="fitness/images/warning_renew.png" class="img-responsive warning_renew"/>Your {{ $users->admin_assign_coach == 1 ? '' : 'LivEzy Premium' }} {{ $users->plan }} {{ $users->member_type }} plan is expired. Kindly renew to continue your fitness journey with us.
                            </div>
                        </div>

                        <div class="container-fluid second_card">
                            <div class="d_oniut">
                                <div class="left_d_b">
                                    <div class="left_d legend_c_text">
                                        {{ $user_workday ? $user_workday['user_plan_left_day'] : 0 }}
                                    </div>
                                    <div class="left_b d_l">
                                        Days Left
                                    </div>
                                </div>
                                <div class="dsc" data-bg="#fff"
                                    data-title="{{ $user_workday ? $user_workday['user_plan_left_day'] : 0 }} Days Left"
                                    data-donutty data-radius=40 data-thickness=8 data-circle=true data-padding=0
                                    data-round=true data-color="#5CE722"
                                    data-value="{{ $user_workday ? $user_workday['user_complete_percentage'] : 0 }}">
                                </div>
                            </div>
                            <div class="ongoing_membership">
                                <div class="d-flex">
                                    <div class="second_o_m mr-2">
                                        Coach: <?php echo ucfirst($users->head_coach); ?>
                                    </div>
                                    @if(isset($coachDetail))
                                        @include('tier_tags',['coachDetail' => $coachDetail])
                                    @endif
                                </div>
                                <div class="first_o_m"><?php echo ucfirst($users->plan); ?> Membership</div>
                                <div class="second_o_m"><?php echo ucfirst($users->member_type); ?> Plan</div>
                                <div class="third_o_m" style="margin-top:22px;">Start Date:
                                    {{ $users->plan_start_date ? $users->plan_start_date : 'XX/XX/XXXX' }}</div>
                                <div class="third_o_m">End Date:
                                    {{ $users->plan_start_date ? $users->plan_end_date : 'XX/XX/XXXX' }}</div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </section>

            <style>
                @media only screen and (max-width:600px) {
                .contact-sm {
                    margin-left: 0px !important;
                    margin-right: 0px !important;
                }

                #inputSearch {
                    width: 100% !important;
                }

                .enroll-card {
                    flex-direction: column !important;
                }

                .pro-img {
                    width: 50% !important;
                }

                .enroll-img {
                    justify-content: center !important;
                    padding-left: 0px;
                }

                .enroll-text {
                    padding-top: 0px !important;
                    padding-left: 2rem !important;
                    text-align: center;
                }

                .heading-section {
                    margin-bottom: 1rem !important;
                }
                }
                .subhead-1 {
                    color: #fff !important;
                }
                button[aria-controls="tns1"] {
                    width: 20px;
                    height: 20px;
                    border-radius: 50%;
                    background: #404040;
                    margin: 10px 5px;
                    display: none;
                }

                .item-team {
                    padding: 10px 0px 25px 0px;
                    overflow: hidden;
                }

                .item-team img {
                    width: 100px;
                    height: 100px;
                    border-radius: 50%;
                    object-fit: cover;
                }

                .item-team span {
                    position: relative;
                    top: 30px;
                    /* left: -100px; */
                }

                .coach-name {
                    color: #20e0df;
                    font-weight: 600;
                }

                .pro-card {
                    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                    /* padding: 2rem; */
                    width: 100%;
                    margin: auto;
                }

                .pro-img {
                    width: 100%;
                }

                .full-section {
                    background: linear-gradient(69deg, rgb(0 0 0 / 77%), rgb(0 0 0 / 59%)), url("/images/full-section-bg.jpg");
                    background-repeat: no-repeat;
                    background-size: cover;
                }

                /* body {
                    background: #000;
                } */

                .coachBox .card {
                    background: rgb(255 255 255 / 30%);
                    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                    backdrop-filter: blur(5.7px);
                }

                .enroll-premimum-card {
                    background: rgb(255 255 255 / 30%);
                    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
                    backdrop-filter: blur(5.7px);
                    border-radius: 2rem !important;
                    border:1px solid #ccc !important;
                }

                .text-muted {
                    color: #1f1f1f !important;
                }

                .enroll-text h5,
                .enroll-text {
                    color: #fff;
                }

                .card-title{
                    color:#fff;
                    margin-top: 20px;
                }

                .text-muted{
                    color:#fff !important;
                }

                @media only screen and (max-width: 640px) {
                    .coachBox .card {
                        width: 10.5rem;
                        height: 95%;
                    }

                    .coachBox .btn-info {
                        margin-top: 0rem;
                        margin-left: 1rem;
                    }

                    .coach-info-wrapper{
                        padding:0px;
                    }
                }
            </style>

            {{-- <section class="p_d livezy_premium_else">
                <div class="alert alert-danger container my-5" role="alert">
                    <h4 class="alert-heading">Hey, You currently have an active membership :)</h4>
                    <p>You can purchase your membership, once your ongoing program expires</p><hr>
                    <p class="mb-0">You can see LivEzy Premium Coaches once you complete ongoing program.</p>
                </div>
            </section> --}}

            <section class="p_d ftco-section ftco-explore full-section livezy_premium">

                <?php
                if(sizeof($premium_package_data) > 0 ) { ?>
                    <div class="container-fluid new_padding2 premium_nerd">
                        <div class="pause_outside p_c_t" style="color:white;">
                            Purchased Premium Plans
                        </div>
                        <div class="package_carousel">
                            <?php for($p = 0; $p < sizeof($premium_package_data); $p++) { ?>
                            <div class="first_box_package">
                                <div class="row row_p">
                                    <div class="opal">
                                        <div class="boug_1">
                                            <div class="desc">{{ $premium_package_data[$p]->type }}</div>
                                        </div>
                                        <div class="boug_1">
                                            <div class="sub_desc">{{ $premium_package_data[$p]->duration }} Plan</div>
                                        </div>
                                        <div class="row mr-0 ml-0" style="margin-bottom: 10px; font-size: 1rem;">
                                            <span class="mr-1" style="margin-top:1px;"><b>Coach:</b> {{ $premium_package_data[$p]->first_name}}</span>
                                            <span>
                                                @if ($premium_package_data[$p]->coach_tier === 'classic')
                                                    <h5 style="color:white;"><span class="badge" style="background-color:#00ab4e;">Classic</span></h5>
                                                @elseif($premium_package_data[$p]->coach_tier === 'supreme')
                                                    <h5 style="color:white;"><span class="badge" style="background-color:#1a70d1;">Supreme</span></h5>
                                                @elseif($premium_package_data[$p]->coach_tier === 'exclusive')
                                                    <h5 style="color:white;"><span class="badge" style="background-color:#bc4244;">Exclusive</span></h5>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="boug_1">
                                        <button class="activate_package" onclick="activate_package('{{ $premium_package_data[$p]->id }}','{{ $premium_package_data[$p]->plan_id }}','{{ $premium_package_data[$p]->type }} {{ $premium_package_data[$p]->duration }} Plan', 0)" style="margin-top: 25%;">
                                            Activate
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="container mt-5">
                    <div class="row d-flex flex-column pro-card justify-content-center align-items-center enroll-premimum-card">
                        <div class="d-flex flex-row justify-content-center enroll-card">
                            <div class="col-md-2 d-flex justify-content-end pr-0 enroll-img">
                                <img src="/coaches/enroll_logo.png" alt="" class="pro-img">
                            </div>
                            <div class="col-md-8 d-flex flex-column justify-content-center align-items-left pl-0 pt-3 enroll-text">
                                <h5><strong>Choose Your Fitness Expert</strong></h5>
                                <p>Get a tailored nutrition plan and a workout routine based on your current lifestyle and fitness goals, with regular follow-ups from your preferred coach.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center heading-section ftco-animate" style="margin-top: 40px; margin-bottom: 20px;">
                            <span class="subheading subhead-1">Meet our coaches - Please choose your preferred coach</span>
                        </div>
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>


                    <style>
                        /* Dropdown Button */
                        .dropbtn {
                            background-color: #31d0cf;
                            color: #053d3c;
                            padding: 16px 35px;
                            font-size: 16px;
                            border: none;
                            cursor: pointer;
                            font-weight: 600;
                        }

                        /* Dropdown button on hover & focus */
                        .dropbtn:hover,
                        .dropbtn:focus {
                            background-color: #28aaa9;
                        }

                        .dropbtn:focus {
                            outline: none;
                        }

                        /* The search field */
                        #myInput {
                            box-sizing: border-box;
                            background-image: url('searchicon.png');
                            background-position: 14px 12px;
                            background-repeat: no-repeat;
                            font-size: 16px;
                            padding: 14px 60px 12px 60px;
                            border: none;
                            border-bottom: 1px solid #ddd;
                        }

                        /* The search field when it gets focus/clicked on */
                        #myInput:focus {
                            outline: 3px solid #5ad0cf;
                        }

                        /* The container <div> - needed to position the dropdown content */
                        .dropdown {
                            position: relative;
                            display: inline-block;
                        }

                        /* Dropdown Content (Hidden by Default) */
                        .dropdown-content {
                            display: none;
                            position: relative;
                            /*absolute*/
                            background-color: #f6f6f6;
                            min-width: 230px;
                            border: 1px solid #ddd;
                            z-index: 1;
                        }

                        /* Links inside the dropdown */
                        .dropdown-content a {
                            color: black;
                            padding: 5px 16px;
                            text-decoration: none;
                            display: block;
                            border-bottom: 1px solid #a8a5a5;
                        }

                        /* Change color of dropdown links on hover */
                        .dropdown-content a:hover {
                            background-color: #f1f1f1
                        }

                        /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
                        .show {
                            display: block;
                        }

                        .btn-info {
                            color: #fff;
                            background-color: #000;
                            border-color: #000;
                        }

                        .btn-info:hover,
                        .btn-info:focus,
                        .btn-info:active {
                            color: #fff !important;
                            background-color: #000 !important;
                            border-color: #000 !important;
                        }

                        .btn:focus,
                        .btn.focus {
                            outline: 0;
                            -webkit-box-shadow: none !important;
                            box-shadow: none !important;
                        }

                        .btn-primary:not(:disabled):not(.disabled):active,
                        .btn-primary:not(:disabled):not(.disabled).active,
                        .show>.btn-primary.dropdown-toggle {
                            color: #fff;
                            background-color: #31cdcc !important;
                            border-color: 1px solid #31cdcc !important;
                        }

                        .coach-card {
                            border: 1px solid #ccc !important;
                            border-radius: 2rem !important;
                        }

                        .coach-card-body {
                            font-size: 0.9rem;
                        }

                        .coach-card-body h5 {
                            font-size: 1rem;
                            font-weight: 700 !important;
                        }

                        .coach-img {
                            padding: 3rem;
                        }

                        .coachBox .btn-primary {
                            font-weight: normal;
                            padding: 0.4rem 1.5rem;
                            border-radius: 30px;
                        }

                        .coachBox .btn-info {
                            font-weight: normal;
                            padding: 0.6rem 1.7rem;
                            border-radius: 30px;
                            /* margin-left: 0.5rem; */
                            line-height: 1.5;
                        }

                        .coachBox .btn-info-disabled {
                            font-weight: normal;
                            padding: 0.4rem 1.5rem;
                            border-radius: 30px;
                            border: 1px solid #7bb2e5;
                            background-color: #7bb2e5;
                            margin-left: 0.5rem;
                            line-height: 1.5;
                        }

                        .coachBox .btn-info.disabled,
                        .btn-info:disabled {
                            font-weight: normal;
                            padding: 0.4rem 1.5rem;
                            border-radius: 30px;
                            border: 1px solid #60a7e8;
                            background-color: #60a7e8;
                            margin-left: 0.5rem;
                            line-height: 1.5;
                        }

                        .ftco-explore {
                            padding: 3em 0 3em !important;
                        }

                        @media only screen and (max-width: 768px) {
                            .coachBox .btn-info {
                                /* margin-top: 1rem; */
                                margin-left: 0;
                            }

                            .ftco-explore {
                                padding: 0em 0 3em !important;
                            }

                            .coach-img {
                                padding: 2rem;
                                margin-bottom: 1rem;
                            }

                            #filterIcon:hover {
                                cursor: hand;
                            }
                        }
                    </style>

                    <div class="d-flex justify-content-center align-items-center">
                        <div class="">
                            <div class="text-center heading-section ftco-animate ">
                                <div class="position-relative m-auto">
                                    <input type="text" placeholder="Search here..." id="inputSearch">
                                    <i class="fas fa-search icon-search"></i>
                                </div>
                            </div>
                        </div>

                        <div class="ml-3">
                            <i class="fa fa-filter" id="filterIcon" aria-hidden="true" data-toggle="modal"
                                data-target="#filterModal" style="font-size: 25px; color:#fff;"></i>
                        </div>
                    </div>

                    <div class="coach-info-wrapper">
                        <?php
                        // print_r($coach_assigned);
                        if (sizeof($coach_data) > 0) {
                            for ($g = 0; $g < sizeof($coach_data); $g++) {
                                // echo '<pre>'; print_r($coach_data[$g]);
                                $img_profile = $coach_data[$g]->img_profile ? $coach_data[$g]->img_profile : 'no-image.jpeg';
                                ?>
                        <div class="coachBox" style="margin-bottom: 2rem;"
                            id="coach_div_<?php echo $coach_data[$g]->id; ?>">
                            <a href="/profile/<?php echo $coach_data[$g]->profile_url; ?>" style="color: #444444;"
                                target="_blank">
                                <div class="card coach-card">
                                    <input type="hidden" id="tier" name="tier" value="{{ $coach_data[$g]->coach_tier }}" />
                                    <img class="card-img-top rounded-circle coach-img"
                                        src="coaches/<?php echo $img_profile; ?>" alt="Card image cap" data-toggle="tooltip"
                                        data-placement="bottom" title="View Coach Profile">
                                    <div class="card-body coach-card-body text-center"
                                        style="padding: 1rem 1rem 2rem 1rem ;margin-top: -5.4rem;">

                                        @if ($coach_data[$g]->coach_tier === 'classic')
                                            <h5 style="color:white; font-size: 1.25rem;"><span class="badge" style="background-color:#00ab4e;">Classic</span></h5>
                                        @elseif($coach_data[$g]->coach_tier === 'supreme')
                                            <h5 style="color:white; font-size: 1.25rem;"><span class="badge" style="background-color:#1a70d1;">Supreme</span></h5>
                                        @elseif($coach_data[$g]->coach_tier === 'exclusive')
                                            <h5 style="color:white; font-size: 1.25rem;"><span class="badge" style="background-color:#bc4244;">Exclusive</span></h5>
                                        @else
                                            <h5 style="color:white; font-size: 1.25rem;"><span class="badge mt-2" style="background-color:#00d3cd;">LivEzy Plus</span></h5>
                                        @endif

                                        <h5 class="card-title" style="font-weight:500">
                                            <?php echo $coach_data[$g]->first_name . ' ' . $coach_data[$g]->last_name; ?>
                                        </h5>
                                        <span class="card-text text-muted"
                                            style="font-weight: 600"><?php echo $coach_data[$g]->slots; ?> -
                                            slots available</span><br><br>

                                        <!-- <span class="card-text text-muted"
                                            style="font-weight: 600"><?php echo $coach_data[$g]->clients_trained; ?>
                                            People trained</span><br> <br> -->

                                        <!-- <a href="/profile/<?php echo $coach_data[$g]->profile_url; ?>"
                                            class="btn btn-primary" data-toggle="tooltip" data-placement="bottom"
                                            title="View Details">View</a> -->

                                        <?php
                                            // if($coach_assigned != 1) {
                                        if($coach_data[$g]->slots > 0) { ?>
                                            <!--a href="/testing/<?php echo $coach_data[$g]->profile_url; ?>" onclick="assign_this_coach(<?php echo $g; ?>)" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Select this Coach" data-toggle="modal" data-target="#packageModal">Enrol</a-->
                                            <a href="javascript:void(0);" onclick="assign_coach('<?php echo $coach_data[$g]->coach_tier; ?>', <?php echo $g; ?>)" id="enrol_coach_<?php echo $coach_data[$g]->id; ?>" class="btn btn-info" data-placement="bottom" title="Select this Coach">Enrol</a>
                                        <?php
                                        } else { ?>
                                            <a href="javascript:void(0);" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="No slots available" onclick="popularity('<?php echo $coach_data[$g]->profile_url; ?>')">Enrol</a>
                                        <?php }
                                            //} else { ?>
                                        {{-- <button class="btn btn-info" style="cursor:not-allowed;" data-toggle="tooltip" data-placement="bottom" title="You are already enrolled with a coach.">Enrol</button> --}}
                                        <?php // } ?>
                                        <!-- <a href="https://wa.me/{{ $coach_data[$g]->coach_whatsapp }}"><img style="width: 50px;" src="images/whatsapp.png" alt="image" data-toggle="tooltip" data-placement="bottom" title="Whatsapp this Coach"></a> -->
                                        <input type="hidden" id="team_name_<?php echo $g; ?>"
                                            value="<?php echo $coach_data[$g]->team; ?>" />
                                        <input type="hidden" id="coach_name_<?php echo $g; ?>"
                                            value="<?php echo $coach_data[$g]->first_name; ?>" />
                                        <input type="hidden" id="coach_det_id_<?php echo $g; ?>"
                                            value="<?php echo $coach_data[$g]->coach_det_id; ?>" />
                                        <input type="hidden" id="coach_pic_<?php echo $g; ?>" value="<?php echo $coach_data[$g]->img_profile; ?>" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>

            <section class="p_d live_session">
                <div class="liv_parent">
                    <div class="tz">Time Zone-
                        {{ isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata' }}</div>
                    <div class="filter_live">
                        <div class="filter_s">
                            <div class="dropdown">
                                <span class="" type="button">
                                    <div class="filter_s fiter_icon">
                                        <i class="fas fa-sliders-h"></i>
                                    </div>
                                    Filter
                                </span>
                                <!-- <ul class="dropdown-menu">
                                    <li class="notif_filter" data-value=" "><a href="#">All</a></li>
                                    <li class="notif_filter" data-value="HIIT"><a href="#">HIIT</a></li>
                                    <li class="notif_filter" data-value="SNC"><a href="#">SNC</a></li>
                                    <li class="notif_filter" data-value="Dance"><a href="#">Dance</a></li>
                                    <li class="notif_filter" data-value="Yoga"><a href="#">Yoga</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="top-date">
                        <?php
                        $liv_sess_date_tz=[];
                        $general_date_zone = date('Y-m-d H:i:s');
                        $general_tz_zone = new DateTime($general_date_zone, new DateTimeZone('Asia/Kolkata'));
                        $user_time_zone_today=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                        $user_time_zone=$user_time_zone_today;
                        $general_tz_zone->setTimezone(new DateTimeZone($user_time_zone_today));
                            $d_t=0;
                            $unique_date=[];
                            for($d=0;$d<sizeof($live_session_data);$d++){
                                $configure_date_zone1 = $live_session_data[$d]->start_date.' '.$live_session_data[$d]->start_time;
                                $configure_tz_now1 = new DateTime($configure_date_zone1, new DateTimeZone('Asia/Kolkata'));
                                $user_time_zone_today=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                $configure_tz_now1->setTimezone(new DateTimeZone($user_time_zone_today));
                                if($general_tz_zone->format('Y-m-d')<=$configure_tz_now1->format('Y-m-d'))
                                    array_push($unique_date,['start_date'=>$configure_tz_now1->format('Y-m-d')]);
                            }
                            // echo '<pre>';
                            // print_r($unique_date);
                            $liv_sess_date_tz = array_values(array_unique(array_column($unique_date, 'start_date')));
                            for($d=0;$d<sizeof($liv_sess_date_tz);$d++){
                                $day_t=date('D',strtotime($liv_sess_date_tz[$d]));
                                $day_num_t=date('d',strtotime($liv_sess_date_tz[$d]));
                                $cls='';
                                if($d==0){
                                    $cls='active';
                                    $d_t++;
                                }
                                ?>
                                <div class="inside_date {{ $cls }}" data-id="liv_{{ $day_t }}">
                                    <div class="l_d zoom_live_view {{ $cls }}"
                                        data-id="liv_{{ $day_t }}">
                                        {{ substr($day_t, 0, -1) }}
                                    </div>
                                    <div class="n_d {{ $cls }}">
                                        {{ $day_num_t }}
                                    </div>
                                </div>
                                <?php
                                // }
                            }
                    ?>
                    </div>
                    <?php
                    $mks=0;
                    $ltz=0;
                    $d_k=0;
                    $tz_day='';
                    for($i=0;$i<sizeof($live_session_data);$i++){
                        $today_book_date_now = $live_session_data[$i]->start_date.' '.$live_session_data[$i]->start_time;
                                    $date_tz_now = new DateTime($today_book_date_now, new DateTimeZone('Asia/Kolkata'));
                                    $user_time_zone_today=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                    $date_tz_now->setTimezone(new DateTimeZone($user_time_zone_today));
                            // print_r($live_session_data[$i+1]).'<br>';
                            $m_s=$i+1;
                            if($i==sizeof($live_session_data)-1)
                                $m_s=sizeof($live_session_data)-1;
                                    $today_book_date_now_plus = $live_session_data[$m_s]->start_date.' '.$live_session_data[$m_s]->start_time;
                                    $date_tz_now_plus = new DateTime($today_book_date_now_plus, new DateTimeZone('Asia/Kolkata'));
                            //         // $user_time_zone_today=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                    $date_tz_now_plus->setTimezone(new DateTimeZone($user_time_zone_today));
                            $m_s_p=0;
                            if($i!=0)
                                $m_s_p=$i-1;
                                    $today_book_date_now_minus = $live_session_data[$m_s_p]->start_date.' '.$live_session_data[$m_s_p]->start_time;
                                    $date_tz_now_minus = new DateTime($today_book_date_now_minus, new DateTimeZone('Asia/Kolkata'));
                            //         // $user_time_zone_today=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                    $date_tz_now_minus->setTimezone(new DateTimeZone($user_time_zone_today));
                        //  $cd=$liv_sess_date_tz[$d_k];
                        if($general_tz_zone->format('Y-m-d')<=$date_tz_now->format('Y-m-d')){
                                // print_r($live_session_data[$i]);
                            // $today_book_date_now = $live_session_data[$i]->start_date.' '.$live_session_data[$i]->start_time;
                            //             $date_tz_now = new DateTime($today_book_date_now, new DateTimeZone('Asia/Kolkata'));
                            //             $user_time_zone_today=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                            //             $date_tz_now->setTimezone(new DateTimeZone($user_time_zone_today));
                            $today_book_date= $general_tz_zone->format('Y-m-d');
                            $loop_date = $date_tz_now->format('Y-m-d');
                            // echo $today_book_date.'<br>'.$loop_date;
                                // echo $date_tz_now_minus->format('Y-m-d').'<br>';
                                // echo $date_tz_now->format('Y-m-d').'<br>';
                                // echo $date_tz_now_plus->format('Y-m-d').'<br>';
                            $day_t_init=' ';
                            $st='';
                            if($ltz==0)
                                $st='style="display:block;"';
                            if($i!=0){
                                $first=$live_session_data[$i-1]->start_date;
                                $first_tz=new DateTime($first, new DateTimeZone('Asia/Kolkata'));
                                // $user_time_zone=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                $first_tz->setTimezone(new DateTimeZone($user_time_zone));
                                $day_t_init=date('D',strtotime($first_tz->format('Y-m-d')));
                            }
                            $second=$live_session_data[$i]->start_date;
                                $second_tz=new DateTime($second, new DateTimeZone('Asia/Kolkata'));
                                // $user_time_zone=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                $second_tz->setTimezone(new DateTimeZone($user_time_zone));
                            $day_t=date('D',strtotime($second_tz->format('Y-m-d')));
                            $m=0;
                            if($i>=0)
                                $m=$i+1;
                            if($i==(sizeof($live_session_data)-1))
                                $m=$i;
                                $third=$live_session_data[$m]->start_date;
                                $third_tz=new DateTime($third, new DateTimeZone('Asia/Kolkata'));
                                // $user_time_zone=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                $third_tz->setTimezone(new DateTimeZone($user_time_zone));
                            $day_t_s=date('D',strtotime($third_tz->format('Y-m-d')));
                            //  echo gettype($d_k);
                            //  $cd=$liv_sess_date_tz[$d_k];
                            // print_r();
                            $tz_day=date('D',strtotime($liv_sess_date_tz[$d_k]));
                            // echo $ltz;
                            // if(($date_tz->format('Y-m-d')!=$date_tz_now_minus->format('Y-m-d')) || $ltz==0){
                                if($date_tz_now->format('Y-m-d')!=$date_tz_now_minus->format('Y-m-d') || $ltz==0){
                                // $d_k=$d_k++;
                                $ltz++;
                                echo '<div class="lid ned" '.$st.' id="liv_'.$tz_day.'">';
                                // $d_k=$d_k+1;
                                // echo $d_k;
                                if($i!=0){
                                    $mks++;
                                }
                            }
                            $date_tz = new DateTime($live_session_data[$i]->start_date.' '.$live_session_data[$i]->start_time, new DateTimeZone('Asia/Kolkata'));
                                                        $user_time_zone=isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata';
                                                        $date_tz->setTimezone(new DateTimeZone($user_time_zone));
                            // if($general_tz_zone->format('Y-m-d')<=$date_tz->format('Y-m-d')){
                            ?>
                            <div class="live_sess_block filter_{{ $live_session_data[$i]->session_name }}"
                                data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                data-session="{{ $live_session_data[$i]->session_name }}">
                                <!-- <div class="liv_img">
                                    <img class="l_s_i_img" src='fitness/images/{{ $live_session_data[$i]->session_name }}.png'>
                                </div> -->
                                <div class="ol_liv">
                                    <div class="inside_live" style="margin-right: 1px;">
                                        <!-- <script>
                                            var a = convertTZ('<?php echo $live_session_data[$i]->start_date . ' ' . $live_session_data[$i]->start_time; ?>', '<?php echo isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata'; ?>');
                                            document.write(moment(a).format('hh:mm A'))
                                        </script> -->
                                        <?php
                                        echo $date_tz->format('H:i');
                                        ?>
                                        <!-- {{ date('h:i A', strtotime($live_session_data[$i]->start_time)) }} -->
                                    </div>
                                    <hr>
                                    <div class="liv_details">
                                        <div class="inside_live">
                                            {{ session_name_rechange($live_session_data[$i]->session_name) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="ol_liv ol_liv_right">
                                    <div class="inside_live_btn">
                                        <?php
                                            $btn_a=false;
                                            $is_join='False';
                                            for($b=0;$b<sizeof($user_book_live_sess);$b++){
                                                if($live_session_data[$i]->id==$user_book_live_sess[$b]->session_id){
                                                    $btn_a=true;
                                                    if($user_book_live_sess[$b]->is_join==1)
                                                        $is_join='True';
                                                    break;
                                                }
                                            }
                                            //&& $users->free_live_session!=0
                                        if($users->user_status==8 || ($users->user_status==1)){
                                            if($btn_a){
                                                ?>
                                        <button data-is_join="{{ $is_join }}" onclick="zoom_start(this)"
                                            data-start_date="{{ $live_session_data[$i]->start_date }}"
                                            data-start_time="{{ $live_session_data[$i]->start_time }}" data-booked="true"
                                            data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                            data-session="{{ $live_session_data[$i]->id }}"
                                            data-url="{{ $live_session_data[$i]->session_url }}"
                                            data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                            class="book_live_btn bks_c {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Cancel</button>
                                        <?php
                                            }else{
                                                if($live_session_data[$i]->total_seat==$live_session_data[$i]->booked_seat){
                                                    ?>
                                        <button title="All Slot Booked"
                                            data-start_date="{{ $live_session_data[$i]->start_date }}"
                                            data-start_time="{{ $live_session_data[$i]->start_time }}" data-booked="false"
                                            data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                            data-session="{{ $live_session_data[$i]->id }}"
                                            data-url="{{ $live_session_data[$i]->session_url }}"
                                            data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                            class="book_live_btn {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Book
                                            Now</button>
                                        <?php
                                                }else{
                                                    ?>
                                        <button onclick="zoom_start(this)"
                                            data-start_date="{{ $live_session_data[$i]->start_date }}"
                                            data-start_time="{{ $live_session_data[$i]->start_time }}" data-booked="false"
                                            data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                            data-session="{{ $live_session_data[$i]->id }}"
                                            data-url="{{ $live_session_data[$i]->session_url }}"
                                            data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                            class="book_live_btn {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Book
                                            Now</button>
                                        <?php
                                                }
                                            }
                                        }else if($users->user_status==9){
                                            ?>
                                        <button
                                            onclick="static_msg('You can not book live sessions if your plan is on pause')"
                                            data-start_date="{{ $live_session_data[$i]->start_date }}"
                                            data-start_time="{{ $live_session_data[$i]->start_time }}" data-booked="false"
                                            data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                            data-session="{{ $live_session_data[$i]->id }}"
                                            data-url="{{ $live_session_data[$i]->session_url }}"
                                            data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                            class="book_live_btn {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Book
                                            Now</button>
                                        <?php
                                        }else if($users->user_status==1 && $users->free_live_session==0){
                                            ?>
                                        <button
                                            onclick="static_msg('You have used all your trial live session, Please subscribe to take benefits of live session')"
                                            data-start_date="{{ $live_session_data[$i]->start_date }}"
                                            data-start_time="{{ $live_session_data[$i]->start_time }}" data-booked="false"
                                            data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                            data-session="{{ $live_session_data[$i]->id }}"
                                            data-url="{{ $live_session_data[$i]->session_url }}"
                                            data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                            class="book_live_btn {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Book
                                            Now</button>
                                        <?php
                                        }else{
                                            ?>
                                        <button onclick="static_msg('Your plan has not started yet')"
                                            data-start_date="{{ $live_session_data[$i]->start_date }}"
                                            data-start_time="{{ $live_session_data[$i]->start_time }}" data-booked="false"
                                            data-sessionName="{{ $live_session_data[$i]->session_name }}"
                                            data-session="{{ $live_session_data[$i]->id }}"
                                            data-url="{{ $live_session_data[$i]->session_url }}"
                                            data-time="{{ $date_tz->format('Y/m/d H:i:s') }}"
                                            class="book_live_btn {{ $today_book_date == $loop_date ? 'today_date' : ' ' }}">Book
                                            Now</button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                            // }//&& $date_tz_now_plus->format('Y-m-d')!=$date_tz_now->format('Y-m-d')
                            //  echo $date_tz->format('Y-m-d').'<br>';
                            //  echo $date_tz_now_plus->format('Y-m-d').'<br>';
                            // echo $date_tz_now_minus->format('Y-m-d').'<br>';
                            if($date_tz->format('Y-m-d')!=$date_tz_now_plus->format('Y-m-d') || $i==(sizeof($live_session_data)-1)){
                                $d_k++;
                                // echo $general_tz_zone->format('Y-m-d').'<br>'.$date_tz->format('Y-m-d');
                                echo '</div>';
                            }
                        }
                    }
                    ?>
                </div>
            </section>

            <section class="p_d profile_d">
                <div class="container-fluid profile_outside">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_logo">
                                    <img class="img-responsive rounded_img" src="<?php echo Session::get('image') ? Session::get('image') : 'fitness/images/default_image.svg'; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="row inside_profile">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="lable_form">
                                            Full Name
                                        </div>
                                        <div class="input_box">
                                            <span class="fa fa-user icon_profile_form"></span>
                                            <input type="text" class="form-control input_css general_form_css" id="full_name" value="<?php echo ucfirst($users->name); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="lable_form">
                                            Email Address
                                        </div>
                                        <div class="input_box">
                                            <span class="fa fa-envelope icon_profile_form"></span>
                                            <input type="text" <?php echo Session::get('email') ? 'disabled' : ' '; ?> value="<?php echo Session::get('email'); ?>" id="email" class="form-control input_css general_form_css">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="lable_form">
                                            Mobile Number
                                        </div>
                                        <div class="input_box">
                                            <!-- <?php echo $users->dob ? 'disabled' : ' '; ?> <span class="fa fa-user icon_profile_form"></span> -->
                                            <input id="telNo" onkeypress="return isNumberKey(event)"
                                                <?php echo $users->mob_no ? 'disabled' : ' '; ?> name="telNo" type="tel" size="20"
                                                value="<?php echo $users->mob_no; ?>" minlength="13"
                                                class="form-control input_css general_form_css">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="lable_form">
                                            Date of Birth
                                        </div>
                                        <div class="input_box">
                                            <input id="profile_dob" value="<?php echo $users->dob; ?>"
                                                <?php echo $users->dob ? 'disabled' : ' '; ?> type="date"
                                                class="form-control general_form_css">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="lable_form">
                                            Gender
                                        </div>
                                        <div class="input_box">
                                            <span class="fa fa-vcard icon_profile_form"></span>
                                            <select <?php echo $users->gender ? 'disabled' : ' '; ?> id="profile_gender"
                                                class="form-control general_form_css">
                                                <option <?php echo $users->gender ? ' ' : 'selected="true"'; ?> disabled="disabled">Choose Gender
                                                </option>
                                                <option <?php echo $users->gender == 'Male' ? 'selected="true"' : ' '; ?> value="Male">Male</option>
                                                <option <?php echo $users->gender == 'Female' ? 'selected="true"' : ' '; ?> value="Female">Female</option>
                                                <option <?php echo $users->gender == 'Non-Binary' ? 'selected="true"' : ' '; ?> value="Non-Binary">Non-Binary</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form_6">
                                        <div class="lable_form">
                                            Flat No./Street
                                        </div>
                                        <div class="input_box">
                                            <span class="fa fa-map icon_profile_form"></span>
                                            <input type="text" class="form-control input_css general_form_css" id="profile_street" value="<?php echo ucfirst($users->street); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4 form_6">
                                        <div class="lable_form">
                                            City
                                        </div>
                                        <div class="input_box">
                                            <span class="fa fa-city icon_profile_form"></span>
                                            <input type="text" class="form-control input_css general_form_css mb-2" id="city" value="<?php echo $users->city; ?>" placeholder="Enter City" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form_6">
                                        <div class="lable_form">
                                            Pincode
                                        </div>
                                        <div class="input_box">
                                            <span class="fa fa-map-pin icon_profile_form"></span>
                                            <input type="number" class="form-control input_css general_form_css mb-2" id="profile_pincode" value="<?php echo $users->pincode; ?>" placeholder="Enter Pincode" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="lable_form" for="state">
                                            State
                                        </div>
                                        <div class="input_box">
                                            <span class="fa fa-location-arrow icon_profile_form"></span>
                                            <span>
                                                <input type="text" id="profile_state" class="form-control input_css general_form_css mb-2" value="<?php echo  $users->state; ?>">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-3 form_3">
                                        <div class="lable_form">
                                            Country
                                        </div>
                                        <div class="input_box">
                                            <input type="text" disabled id="country" class="form-control general_form_css" value="<?php echo $users->country; ?>">
                                            <div class="user_country"></div>
                                            <input id="s_c_name" type="hidden" value="<?php echo $users->short_country_name; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form_6">
                                        <div class="lable_form">
                                            Weight(kgs)
                                        </div>
                                        <div class="input_box">
                                            <input type="number" id="profile_weight" <?php echo $users->weight ? 'disabled' : ' '; ?>
                                                value="<?php echo $users->weight; ?>" class="form-control general_form_css">
                                        </div>
                                    </div>
                                    <div class="col-md-3 form_6">
                                        <div class="lable_form">
                                            Height(cms)
                                        </div>
                                        <div class="input_box">
                                            <input id="profile_height" <?php echo $users->height ? 'disabled' : ' '; ?>
                                                value="<?php echo $users->height; ?>" type="number"
                                                class="form-control general_form_css">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                </div>
                                <div class="row">
                                    <div class="col-md-6 form_7">
                                        <div class="lable_form">
                                            Password
                                        </div>
                                        <div class="input_box">
                                            <input id="password" <?php echo $users->password ? 'disabled' : ' '; ?>
                                                value="<?php echo $users->password; ?>" type="password"
                                                class="form-control general_form_css">
                                        </div>
                                    </div>
                                    <div class="col-md-6 form_7">
                                        <div class="lable_form">
                                            Confirm Password
                                        </div>
                                        <div class="input_box">
                                            <input id="repassword" <?php echo $users->password ? 'disabled' : ' '; ?>
                                                value="<?php echo $users->password; ?>" type="password"
                                                class="form-control general_form_css">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <button id="save_user" class="profile_submit_btn">
                                            Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="p_d testimonial">
                <iframe class="r_ifrma" src="https://livezy.com/testimonial_story"></iframe>
            </section>

            <section class="p_d recipes">
                <iframe class="r_ifrma" src="https://livezy.com/recipes_login"></iframe>
            </section>

            <section class="p_d settingsu">
                <div class="container-fluid">
                    <div class="pause_outside">
                        Account Settings
                    </div>
                    <div class="setting_general_white_card">
                        <div class="general_row">
                            <div class="g_r_t">
                                Get Notification Via Message
                            </div>
                            <div class="g_r_b">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="general_row">
                            <div class="g_r_t">
                                Get Notification Via Email
                            </div>
                            <div class="g_r_b">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="p_d package_bought livezy_plus">
                <?php
                if(sizeof($user_package_data) > 0 ) {
                ?>
                <div class="container-fluid new_padding2 nerd">
                    <div class="pause_outside p_c_t">
                        Purchased Plans
                    </div>
                    <div class="package_carousel">
                        <?php for($u_p = 0; $u_p < sizeof($user_package_data); $u_p++) { ?>
                        <div class="first_box_package">
                            <div class="row row_p">
                                <div class="opal">
                                    <div class="boug_1">
                                        <div class="desc">{{ $user_package_data[$u_p]->type }} Plan</div>
                                    </div>
                                    <div class="boug_1">
                                        <div class="sub_desc">{{ $user_package_data[$u_p]->duration }}</div>
                                    </div>
                                </div>
                                <div class="boug_1">
                                    <button class="activate_package" onclick="activate_package('{{ $user_package_data[$u_p]->id }}','{{ $user_package_data[$u_p]->plan_id }}','{{ $user_package_data[$u_p]->type }} {{ $user_package_data[$u_p]->duration }} Plan', 1)">
                                        Activate
                                    </button>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
                <?php
                    if($pop_up){
                        ?>
                        <div class="banner_bought_package">
                            <img src="fitness/images/avail_diwali_main_banner.png" class="img-responsive nd_bp" />
                        </div>
                        <?php
                    }
                ?>

                <div id="get-a-coach" class="row justify-content-center p-3"></div>

                @if($users->user_status == 1)
                <div class="row">
                    <div class="col-md-12">
                        <p class="p_head_first">Welcome to Liv Ezy. <br>We’re thrilled to see you here!</p>
                    </div>
                </div>
                <div class="row" id="csb2" style="margin-top:10px; padding-left:15%; padding-right:15%">
                    <div class="col-md-12 free-liv">
                        <?php
                            $liv_sess_free='No';
                            if($users->free_live_session==2)
                                $liv_sess_free='Two';
                            else if($users->free_live_session==1)
                                $liv_sess_free='One';
                        ?>
                                <style>
                                            .buddy-coaching-plans .spl-price,
                                            .individual-coaching-plans .spl-price {
                                                display: none;
                                            }

                                            .buddy-coaching-plans .line-through,
                                            .individual-coaching-plans .line-through {
                                                text-decoration: none !important;
                                            }
                                </style>
                                <?php if($liv_sess_free!='No'){ ?>
                                    <div class="left_free">
                                        <div class="left_free_style">
                                            <div>{{ $liv_sess_free }} free live</div>
                                            <div>sessions available</div>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                            <div class="right_free">
                                <?php
                                if($liv_sess_free=='No'){
                                    ?>
                                    <button class="btn-free" style="width:150px;" onclick="subscribe_more()">Subscribe Now</button>
                                    <?php
                                }else{
                                ?>
                                    <button class="btn-free" onclick="$('#live_session').click()">Book Now</button>
                                    <?php
                                }
                                ?>
                            </div>
                    </div>
                </div>
                @endif

                @include('plus_plans', ['users' => $users ])

            </section>
        </div>

    </main>
    <!-- End #main -->
    </div>
    <!-- Modal -->
    <div id="partner_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <style>
                        .b_sd {
                            padding-bottom: 10px;
                            padding-top: 10px;
                        }

                        .new_partner_data_style {
                            display: none;
                        }

                        .ne_bu {
                            vertical-align: sub;
                            margin-bottom: 10px;
                        }

                        .b_d {
                            font-family: Open Sans;
                            font-style: normal;
                            font-weight: bold;
                            font-size: 1em;
                            line-height: 16px;
                            color: #000000;
                        }
                    </style>
                    <span class="b_d">Buddy Details</span>
                    <hr>
                    <?php
                    $buddy_check = true;
                    if ($users->buddy_username) {
                        $buddy_check = false;
                    }
                    ?>
                    <div class="pause_ul" style="margin-left:0px;">
                        <?php
                    if(!$buddy_check){
                    ?>
                        <li class="pause_li ne_li">
                            <input type="radio" name="renew_plan_buddy" checked value="existing" class="pause-input pause_date ne_bu"> Existing Buddy
                        </li>
                        <li class="pause_li ne_li">
                            <input name="renew_plan_buddy" value="new" class="pause-input pause_date ne_bu" type="radio"> New Buddy
                        </li>
                        <hr>
                        <?php } ?>
                        <div style="padding-left:18px;padding-right:18px;"
                            class="new_partner_data {{ $buddy_check ? '' : 'new_partner_data_style' }}">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="lable_form">
                                        Full Name
                                    </div>
                                    <div class="input_box">
                                        <span class="fa fa-user icon_profile_form"></span>
                                        <input type="text" class="form-control input_css general_form_css"
                                            id="p_d_name_1">
                                        <!-- <span class="error_p">Enter your full name</span> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="lable_form">
                                        Email Address
                                    </div>
                                    <div class="input_box">
                                        <span class="fa fa-envelope icon_profile_form"></span>
                                        <input type="text" id="p_d_email_1"
                                            class="form-control input_css general_form_css">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="lable_form">
                                        Mobile Number
                                    </div>
                                    <div class="input_box">
                                        <!-- <?php echo $users->dob ? 'disabled' : ' '; ?> <span class="fa fa-user icon_profile_form"></span> -->
                                        <input id="telNo_partner" onkeypress="return isNumberKey(event)"
                                            name="telNo" type="tel" size="20" minlength="13"
                                            class="form-control input_css general_form_css">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form_6">
                                    <div class="lable_form">
                                        Gender
                                    </div>
                                    <div class="input_box">
                                        <select id="profile_gender_p" class="form-control general_form_css">
                                            <option disabled="disabled">Choose Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Non-Binary">Non-Binary</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- <li>
                            <i class="fa fa-envelope form-icon"></i>
                            <textarea placeholder="Message" rows="2"></textarea>
                        </li> -->
                        </div>
                    </div>
                    <li class="pause_li ne_li" style="text-align:center;list-style:none;">
                        <button class="pause-input-btn partner_submit">Continue</button>
                    </li>
                </div>
            </div>
        </div>
    </div>

    <div id="country_modal_city" class="modal fade f_p_m" role="dialog">
        <div class="modal-dialog modal-lg country_modal-lg">
            <!-- Modal content-->
            <div class="modal-content f_m_c">
                <div class="f_close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
                <div class="modal-header">
                    <h4 class="modal-title country_l">Change Location</h4>
                </div>
                <div class="modal-body">
                    <p class="popular_country_text">Country</p>
                    <input type="text" autofill="off" placeholder="Search Country" autofocus="on"
                        class="form-control key_up_country">
                    <!-- <div class="other_country">
            </div> -->
                    <div class="outside_country_location">
                        <div class="other_country">
                        </div>
                        <p class="popular_country_text">Popular Country</p>
                        <div class="circle_country" id="in" value="India">
                            <div class="s_img_c"><img class="circle_country_img"
                                    src="https://ipdata.co/flags/in.png" /></div>
                            <div class="t_c"><span class="country_text">India</span></div>
                        </div>
                        <div class="circle_country" id="us" value="United States">
                            <div class="s_img_c"><img class="circle_country_img"
                                    src="https://ipdata.co/flags/us.png" /></div>
                            <div class="t_c"><span class="country_text"> United States</span></div>
                        </div>
                        <div class="circle_country" id="gb" value="United Kingdom">
                            <div class="s_img_c"><img class="circle_country_img"
                                    src="https://ipdata.co/flags/gb.png" /></div>
                            <div class="t_c"><span class="country_text">United Kingdom</span></div>
                        </div>
                        <div class="circle_country" id="nz" value="New Zealand">
                            <div class="s_img_c"><img class="circle_country_img"
                                    src="https://ipdata.co/flags/nz.png" /></div>
                            <div class="t_c"><span class="country_text">New Zealand</span></div>
                        </div>
                        <div class="circle_country" id="ca" value="Canada">
                            <div class="s_img_c"><img class="circle_country_img"
                                    src="https://ipdata.co/flags/ca.png" /></div>
                            <div class="t_c"><span class="country_text">Canada</span></div>
                        </div>
                        <!-- <div class="circle_country" value="China">
                    <img class="circle_country_img" src="https://ipdata.co/flags/cn.png"/>
                    <span class="country_text">China</span>
                </div> -->
                        <div class="circle_country" id="au" value="Australia">
                            <div class="s_img_c"><img class="circle_country_img"
                                    src="https://ipdata.co/flags/au.png" /></div>
                            <div class="t_c"><span class="country_text">Australia</span></div>
                        </div>
                        <hr>
                        <div class="row" id="main_country">
                        </div>
                        <div id="target"></div>
                    </div>
                    <div class="list_of_city_popular_country">
                        <!-- <div class="city">
                    Bangalore
                </div>
                <div class="city">
                    Kolkata
                </div>
                <div class="city">
                    Bombay
                </div> -->
                    </div>
                </div>
                <!-- <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div> -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="success_modal" style="margin-top:-10%;" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button id="success_modal_close" type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="ico-wrap" style="text-align: center;">
                        <img src="fitness/images/check.png" alt="Success Icon">
                    </div>
                    <div>
                        <h4>Payment Successful!</h4>
                        <p class="_info">Thank you for choosing us, Your payment has been processed. Here are the
                            details of this transaction.</p>
                        <table class="payment_info">
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="_label">Amount paid : </span>
                                        <span class="_response res_amt"><strong>₹</strong>16,000/-</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="_label">Reference no : </span>
                                        <span class="_response ref_no">ATPV5604189</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay">
        <!--  -->
    </div>
    <style>
        .lid {
            display: none;
        }

        .user_country {
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            cursor: pointer;
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
    </style>

    <div id="forget-password" class="modal fade f_p_m" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content f_m_c">
                <div class="f_close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></div>
                <div class="modal-header">
                    <!-- <button type="button" style="font-size:38px;" class="close" data-dismiss="modal">&times;</button> -->
                    <h2 class="modal-title" id="p_m_t">Change Your Password</h2>
                </div>
                <div class="modal-body">
                    <div class="forget_password_body">
                        <div class="first_f_p">
                            <div class="legend_f_p">Password</div>
                            <div class="inputWithIcon">
                                <input class="in_f_p" id="f_n_w" type="password" placeholder="Password">
                                <i class="fa fa-key fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="first_f_p">
                            <div class="legend_f_p">Confirm Password</div>
                            <div class="inputWithIcon">
                                <input class="in_f_p" id="c_f_n_w" type="password" placeholder="Password">
                                <i class="fa fa-key fa-lg fa-fw" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="fpbn"><button class="f_p_btn" id="forget_continue">Submit</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if($users->intro_call==0 && $users->user_status==8){
        ?>
        <div id="intro_call_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius:8px;">
                    <div class="modal-body">
                        <div class="sec_liv_book modal_body_content">
                            <p class="e_f t_r ef_rh" style="text-align:center">Rate your intro call with coach
                                {{ $users->head_coach }}</p>
                            <div class="e_f ef_r" id="element_emoji" style="text-align:center">
                                <fieldset class="rating">
                                    <input type="radio" id="star5" name="rating"
                                        class="emotion-style-element_custom" value="5"><label class="full"
                                        for="star5" title="Awesome - 5 stars"></label>
                                    <input type="radio" id="star4half" name="rating"
                                        class="emotion-style-element_custom" value="4.5"><label class="half"
                                        for="star4half" title="Pretty good - 4.5 stars"></label>
                                    <input type="radio" id="star4" name="rating"
                                        class="emotion-style-element_custom" value="4"><label class="full"
                                        for="star4" title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3half" name="rating"
                                        class="emotion-style-element_custom" value="3.5"><label class="half"
                                        for="star3half" title="Meh - 3.5 stars"></label>
                                    <input type="radio" id="star3" name="rating"
                                        class="emotion-style-element_custom" value="3"><label class="full"
                                        for="star3" title="Meh - 3 stars"></label>
                                    <input type="radio" id="star2half" name="rating"
                                        class="emotion-style-element_custom" value="2.5"><label class="half"
                                        for="star2half" title="Kinda bad - 2.5 stars"></label>
                                    <input type="radio" id="star2" name="rating"
                                        class="emotion-style-element_custom" value="2"><label class="full"
                                        for="star2" title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star1half" name="rating"
                                        class="emotion-style-element_custom" value="1.5"><label class="half"
                                        for="star1half" title="Meh - 1.5 stars"></label>
                                    <input type="radio" id="star1" name="rating"
                                        class="emotion-style-element_custom" value="1"><label class="full"
                                        for="star1" title="Sucks big time - 1 star"></label>
                                    <input type="radio" id="starhalf" name="rating"
                                        class="emotion-style-element_custom" value="0.5"><label class="half"
                                        for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                </fieldset>
                            </div>
                            <p class="e_f" style="text-align:center;margin-top:20px;">
                                <textarea max-row="6"class="form-control intro_call_comment" id="intro_call_comment" type="text"
                                    placeholder="(Optional) Any Suggestions"></textarea>
                            </p>
                            <div style="text-align:center;">
                                <!-- <div class="referal_submit" id="r_cancel">Cancel</div> -->
                                <div class="referal_submit" id="i_submit">Submit</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div id="feedback_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius:8px;">
                <div class="modal-body">
                    <div class="sec_liv_book modal_body_content">
                        <p class="e_f t_r ef_rh" id="dynamic_rate" style="text-align:center">RATE YOUR SESSION</p>
                        <div class="e_f ef_r" id="element_emoji_live" style="text-align:center">
                            <fieldset class="rating">
                                <input type="radio" id="star5" name="rating"
                                    class="emotion-style-element_custom" value="5"><label class="full"
                                    for="star5" title="Awesome - 5 stars"></label>
                                <input type="radio" id="star4half" name="rating"
                                    class="emotion-style-element_custom" value="4.5"><label class="half"
                                    for="star4half" title="Pretty good - 4.5 stars"></label>
                                <input type="radio" id="star4" name="rating"
                                    class="emotion-style-element_custom" value="4"><label class="full"
                                    for="star4" title="Pretty good - 4 stars"></label>
                                <input type="radio" id="star3half" name="rating"
                                    class="emotion-style-element_custom" value="3.5"><label class="half"
                                    for="star3half" title="Meh - 3.5 stars"></label>
                                <input type="radio" id="star3" name="rating"
                                    class="emotion-style-element_custom" value="3"><label class="full"
                                    for="star3" title="Meh - 3 stars"></label>
                                <input type="radio" id="star2half" name="rating"
                                    class="emotion-style-element_custom" value="2.5"><label class="half"
                                    for="star2half" title="Kinda bad - 2.5 stars"></label>
                                <input type="radio" id="star2" name="rating"
                                    class="emotion-style-element_custom" value="2"><label class="full"
                                    for="star2" title="Kinda bad - 2 stars"></label>
                                <input type="radio" id="star1half" name="rating"
                                    class="emotion-style-element_custom" value="1.5"><label class="half"
                                    for="star1half" title="Meh - 1.5 stars"></label>
                                <input type="radio" id="star1" name="rating"
                                    class="emotion-style-element_custom" value="1"><label class="full"
                                    for="star1" title="Sucks big time - 1 star"></label>
                                <input type="radio" id="starhalf" name="rating"
                                    class="emotion-style-element_custom" value="0.5"><label class="half"
                                    for="starhalf" title="Sucks big time - 0.5 stars"></label>
                            </fieldset>
                        </div>
                        <p class="e_f" style="text-align:center;margin-top:20px;">
                            <textarea max-row="6"class="form-control intro_call_comment" id="feedback_comment" type="text"
                                placeholder="Give your valuable comment(Optional)"></textarea>
                        </p>
                        <div style="text-align:center;">
                            <!-- <div class="referal_submit" id="r_cancel">Cancel</div> -->
                            <!-- <div class="referal_submit" id="i_submit">Submit</div> -->
                            <li style="text-align:center;list-style:none;">
                                <input type="hidden" id="f_s_id">
                                <!-- <div class="referal_submit" style="background:#333333;" id="f_cancel">Cancel</div> -->
                                <div class="referal_submit" id="f_submit">Submit</div>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--div class="modal fade membership-modal" id="mem-info" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog mem-info_modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal Title</h5>
                    <button type="button" class="close modal_close1" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" style="margin-bottom: 1rem">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="intro-para">Intro Para</p>
                            </div>
                        </div>
                    </div>
                    <div class="membership-modal-prog-fea">
                        <h3>Program features :</h3>
                        <ul>
                            <li>Customized Workout Plan.</li>
                            <li>Customized Diet Plan based on your lifestyle.</li>
                            <li>Real-time meal updates to stay on track!</li>
                            <li>Daily Progress tracking.</li>
                            <li>Dedicated Head Coach to monitor your progress.</li>
                            <li>Daily live online workout sessions.</li>
                            <li>"Pause plan” when needed.</li>
                            <li>Whatsapp/Email support on a daily basis.</li>
                            <li>Available for all timezones.</li>
                        </ul>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <p>Upon enrolling, you can pick your start date.</p>
                                <p class="desc-para">Description Para.</p>
                                <p>Feel free to contact us at anytime, there's no such question as a dumb question!</p>
                                <span class="imp-info">*Please note that all the programmes are non-refundable
                                    therefore if you pay for coaching be 100% sure to commit and put in the work.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </!div-->

    <div id="referal_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="border-radius:8px;">
                <div class="modal-body referal_modal-header">
                    <div class="referal_modal-title" data-dismiss="modal">X</div>
                    <div class="message_copied">Message Copied</div>
                    <div class="img_illus_referal"></div>
                    <div class="referal_text">Invite your friend and both of you can enjoy {{ $extend_day }} days
                        extra on your memberships.</div>
                    <div class="r_code">{{ $users->referal_code }}</div>
                </div>
                <div class="bottom_referal">
                    <div class="col col_referal" onclick="r_pop_close()">
                        <a id="sharewa"
                            href="https://api.whatsapp.com/send?text=Use%20my%20referral%20code%20{{ $users->referal_code }}%20for%20a%20<?php echo $extend_day; ?>%20day%20extension%20on%20your%201st%20LivEzy%20plan%20purchase. https%3A%2F%2Flivezy.com"
                            title="WhatsApp" target="_blank">
                            <img class="img-whats-app whatsapp_green" style="height:26px;"
                                src="fitness/images/whatsapp.png">
                        </a>
                    </div>
                    <div class="col col_referal" onclick="copy(this)"
                        data-code="Your referral code {{ $users->referal_code }}">
                        <i class="far fa-copy copy_blue"></i>
                    </div>
                    <div class="col col_referal" onclick="r_pop_close()">
                        <a id="sharefb"
                            href="https://facebook.com/sharer/sharer.php?u=https%3A%2F%2Flivezy.com&amp;title=Use%20my%20referral%20code%20{{ $users->referal_code }}%20for%20a%20<?php echo $extend_day; ?>%20day%20extension%20on%20your%201st%20LivEzy%20plan%20purchase."
                            title="Facebook" target="_blank">
                            <i class="fab fa-facebook-f facebook_blue"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pause_info" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="border-radius:8px;">
                <div class="modal-header ui_modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                    <div class="modal-title ui_modal-title">Terms & Conditions</div>
                    <div class="ui_modal-title" data-dismiss="modal">X</div>
                </div>
                <div class="modal-body">
                    <ul class="pause_ul">
                        <li class="pause_li">
                            Unlimited pauses - you can pause your membership "n" number of times but within the allowed
                            period.
                        </li>
                        <?php
                    if($users->member_type=='Live Session' && ucfirst($users->plan)=='1 Month'){
                    ?>
                        <li class="pause_li">
                            The minimum pause period is 3 days.
                        </li>
                        <?php
                    }else{
                        ?>
                        <li class="pause_li">
                            The minimum pause period is 3 days and the maximum pause period is 7 days.
                        </li>
                        <li class="pause_li">
                            The minimum number of days between 2 pauses should be at least 14 days.
                        </li>
                        <?php
                    }
                    ?>
                        <li class="pause_li">
                            During the pause, your membership will be on a complete hold and you can only reach us
                            through support@livezy.com.
                        </li>
                        <li class="pause_li">
                            The pause days once used gets added on to your membership.
                        </li>
                        <li class="pause_li">
                            A scheduled pause can be cancelled with no penalty up to 24 hours prior to the start date of
                            the pause.
                        </li>
                        <li class="pause_li">
                            Upon cancelling a scheduled pause within 24 hours of the start date of the pause, a penalty
                            of 3 days will be deducted from your total available pause days.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="renew_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" style="font-size:38px;" class="close" data-dismiss="modal">&times;</button> -->
                    <h2 class="modal-title" id="p_m_t">Renew Your Plan</h2>
                </div>
                <div class="modal-body">
                    <ul class="pause_ul">
                        <li class="pause_li ne_li renew_li">
                            <input type="radio" name="renew_plan" value="existing" checked
                                class="pause-input pause_date renew_checkbox"> Existing Plan: <?php echo ucfirst($users->plan); ?>
                            (<?php echo ucfirst($users->member_type); ?>)
                        </li>
                        <li class="pause_li ne_li renew_li">
                            <input name="renew_plan" value="new" class="pause-input pause_date renew_checkbox"
                                type="radio"> New Plan
                        </li>
                        <li class="pause_li ne_li renew_li" style="text-align:center;list-style:none;">
                            <button class="pause-input-btn" id="renew_continue">Continue</button><button
                                class="pause-input-btn renew_cancel_btn" data-dismiss="modal">Cancel</button>
                        </li>
                        <li class="pause_li ne_li" style="list-style:none;" id="renew_data_cnfrm"
                            style="text-align:center;list-style:none;color:#ff0000b8;">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="coach_confirmation_on_renewal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" style="font-size:38px;" class="close" data-dismiss="modal">&times;</button> -->
                    <h2 class="modal-title" id="p_m_t">Coach Confirmation</h2>
                </div>
                <div class="modal-body">
                    <ul class="pause_ul">
                        <li class="pause_li ne_li renew_li">
                            <input type="radio" name="renew_coach" value="existing" checked
                                class="pause-input pause_date renew_checkbox"> Continue With Same Coach
                        </li>
                        <li class="pause_li ne_li renew_li">
                            <input type="radio" name="renew_coach" value="new"
                                class="pause-input pause_date renew_checkbox"> Get a New Coach

                            <div id="sub_radio_buttons" style="display:none; margin-left: 36px; margin-top: 10px;">
                                <label class="mb-0">
                                    <input type="radio" name="new_coach_type" value="premium" checked> LivEzy Premium
                                </label>
                                <label class="mb-0  ml-2">
                                    <input type="radio" name="new_coach_type" value="plus"> LivEzy Plus
                                </label>
                            </div>
                        </li>
                        <li class="pause_li ne_li renew_li" style="text-align:center;list-style:none;">
                            <button class="pause-input-btn" id="renew_coach_button">Proceed</button>
                            {{-- <button class="pause-input-btn renew_cancel_btn" data-dismiss="modal" >Cancel</button> --}}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for coach confirmation for Plus users -->
    <style>
        .proceed_btn {
            background-color: #187FDE;
            border-radius: 36px;
            border: none;
            color: white;
            padding: 4px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
    <div id="coach_confirmation_on_renewal_plus" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="p_m_t">Coach Confirmation</h2>
                </div>
                <div class="modal-body">
                    <ul class="pause_ul">
                        <li class="pause_li ne_li renew_li">
                            <input type="radio" name="renew_plus_coach" value="existing" checked class="pause-input pause_date renew_checkbox"> Continue with LivEzy Plus
                        </li>
                        <li class="pause_li ne_li renew_li">
                            <input type="radio" name="renew_plus_coach" value="new" class="pause-input pause_date renew_checkbox"> Try LivEzy Premium
                        </li>
                        <li class="pause_li ne_li renew_li" style="text-align:center;list-style:none;padding: 12px; margin-right: 20px;">
                            <button class="pause-input-btn proceed_btn" id="renew_plus_coach_confirmation">Proceed</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <style>
        button.close.n_c_r_p {
            float: right;
            color: #fff;
            opacity: 1;
            font-weight: 100;
            border: 1px solid #fff;
            border-radius: 20px;
            height: 24px;
            width: 24px;
            line-height: 1px;
            margin: 8px;
        }

        .desc_refer {
            padding: 18px;
            background: #3c93e3;
            color: #fff;
            /* margin-top: 1px; */
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        p.r_des {
            text-align: center;
            font-size: 23px;
            font-weight: 600;
            margin-top: 12px;
            margin-bottom: 15px;
            font-family: 'Open Sans';
            text-transform: capitalize;
        }

        p.refer_pop_price {
            color: #fff;
            text-align: center;
            font-size: 30px;
            font-style: italic;
            margin-bottom: 20px;
        }

        span.r_rupee {
            margin-right: 4px;
        }

        .coupon_code_outer {
            width: fit-content;
            margin: auto;
            /* margin-top: -24px; */
            margin-bottom: 8px;
        }

        input.form-control.coupon {
            height: 56px;
            border-radius: 14px;
        }

        p.r_code_error {
            color: green;
            text-align: center;
            padding-left: 34px;
            padding-right: 34px;
            /* margin-top: -12px; */
        }

        .outer_buy_now {
            /* margin-bottom: 24px; */
            /* margin-bottom: 30px; */
            margin-top: 30px;
        }

        .new_buy_now {
            text-align: center;
            background: #187FDE;
            color: #fff;
            height: 40px;
            width: fit-content;
            font-size: 23px;
            padding: 13px 30px;
            margin: auto;
            line-height: 20px;
            border-radius: 22px;
            font-family: 'Open Sans';
            /* font-weight: 600; */
            cursor: pointer;
            height: 48px;
        }
    </style>

    <!-- Referral Modal -->
    <div class="modal fade" id="new_refer_pop_up" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" style="">
            <div class="modal-content" style="border-radius: 14px;">
                <div class="modal-body" style="padding:unset;padding-bottom:25px;">
                    <button type="button" class="close n_c_r_p" data-dismiss="modal" style="">×</button>
                    <div class="desc_refer">
                        <p id="r_des" class="r_des"></p>
                        <p class="refer_pop_price" style="">
                            <span class="r_rupee">₹</span><span id="r_price"></span>/-
                        </p>
                    </div>
                    <div class="coupon_code_outer px-5 py-2">
                        <div class="lable_form d-flex justify-content-center">
                            <strong style="font-size:1.1rem !important;">Billing Address</strong>
                        </div>
                        <div class="row d-flex">
                            <div class="col-md-6">
                                <div class="lable_form">
                                    Full Name<span style="color:red;">*</span>
                                </div>
                                <div class="input_box">
                                    <span class="fa fa-user icon_profile_form"></span>
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="full_name_gst" placeholder="Enter Name" value="<?php echo ucfirst($users->name); ?>" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="lable_form">
                                    Mobile Number<span style="color:red;">*</span>
                                </div>
                                <div class="input_box">
                                    <span class="fa fa-phone-alt icon_profile_form"></span>
                                    <input id="telNo" onkeypress="return isNumberKey(event)"
                                        <?php echo $users->mob_no ? 'disabled' : ' '; ?> name="telNo" type="tel" size="20"value="<?php echo $users->mob_no; ?>" minlength="13" placeholder="Enter Contact"
                                        class="form-control input_css general_form_css" required>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex">
                            <div class="col-md-6">
                                <div class="lable_form">
                                    Flat No./Street<span style="color:red;">*</span>
                                </div>
                                <div class="input_box">
                                    <span class="fa fa-map icon_profile_form"></span>
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="street" value="<?php echo $users->street; ?>" placeholder="Enter Street" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="lable_form">
                                    Pincode
                                </div>
                                <div class="input_box">
                                    <span class="fa fa-map-pin icon_profile_form"></span>
                                    <input type="number" class="form-control input_css general_form_css mb-2" id="pincode" value="<?php echo $users->pincode; ?>" placeholder="Enter Pincode" required>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex">

                        <div class="col-md-4">
                                <div class="lable_form" for="country">
                                    Country<span style="color:red;">*</span>
                                </div>
                                <div class="input_box">
                                    <span class="fa fa-globe icon_profile_form"></span>
                                        <select id="country-list" class="form-control input_css general_form_css mb-2" required>
                                            <option>Select Country</option>
                                        </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="lable_form" for="state">
                                    State<span style="color:red;">*</span>
                                </div>
                                <div class="input_box">
                                    <span class="fa fa-location-arrow icon_profile_form"></span>
                                        <span id="state-code"><input type="text" id="state" class="form-control input_css general_form_css mb-2" required></span>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="lable_form">
                                    City<span style="color:red;">*</span>
                                </div>
                                <div class="input_box">
                                    <span class="fa fa-city icon_profile_form"></span>
                                    <input type="text" class="form-control input_css general_form_css mb-2" id="user_city" value="<?php echo $users->city; ?>" placeholder="Enter City" required>
                                </div>
                            </div>

                        </div>

                        @if($users->user_status == 1)
                        <div class="input-group mt-3">
                            <input type="text" id="referal_code_new" class="form-control coupon" maxlength="6" style="text-transform:uppercase" name="" placeholder="Referal Code"><span class="input-group-append"><button id="r_submit_new" class="btn btn-primary btn-apply coupon">Use Code</button></span>
                        </div>
                        @endif

                    </div>
                    <p class="r_code_error"></p>
                    <div class="outer_buy_now d-flex justify-content-center">
                        <div id="save_gst_details" class="new_buy_now">Buy Now</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="sign_up_referal_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius:8px;">
                <div class="modal-body">
                    <div class="sec_liv_book modal_body_content congo_pop_up">
                        <p class="e_f t_r ef_rh" style="text-align:center;font-size: 1em;">Enter Referal Code</p>
                        <p class="e_f ef_r new_1" style="text-align:center">Get extra days on your membership!</p>
                        <p class="e_f" style="text-align:center"><input maxlength="6"class="form-control"
                                type="text" id="referal_code" placeholder="Enter Referal Code"
                                value="HPLX19"></p>
                        <div style="text-align:center;margin-top: 30px;margin-left:10px;">
                            <div class="referal_submit" id="r_submit">Submit</div>
                            <div class="referal_submit" id="r_cancel">Cancel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Premium Plans modal -->
    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="">
                    <!-- <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5> -->
                    <button type="button" class="close p-3 modal_close2" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <section class="pricing-section ftco-new" id="member-section">
                        <div class="container">
                            <div class="row d-flex justify-content-center align-items-center">
                                <div class="col-md-5">
                                    <img class="card-img-top rounded-circle coach-img" id="coach_image" alt="Card image cap" data-toggle="tooltip" data-placement="bottom">
                                </div>
                                <div class="col-md-5 heading-section ftco-animate" style="text-align: left !important;">
                                    <span class="subheading" id="plan_coach_name" style="margin: 0;"></span><br>
                                    <span class="subheading" id="plan_tier" style="margin: 0;"></span>
                                </div>
                            </div>
                        </div>
                        <h4 class="subheading text-center">Membership Plans</h4>
                        <div class="row d-flex justify-content-center">
                            <h2 class="mb-2 cp-head">Individual Coaching Plans</h2>
                        </div>
                        <div class="container own-member-main-container" style="margin-bottom: 1rem;">
                            <!-- one -->
                            <div class="own-member-item ftco-animate member-col">
                                <div class="text-center">
                                    <h2 class="heading">3 Months Coaching</h2>
                                    <span class="price pd-20" style="margin-top:20px;">
                                        <sup> <?php echo $currency_icon; ?> </sup>
                                        <span class="number-member"><span id="three_months_fixed"></span>/-</span><br>
                                        <!-- <span class="number-member"><span class="line-through">{{ str_replace('.00', '', moneyFormatIndia($prices['three_months_fixed'])) }}/-</span></span> -->
                                        <em class="monthly-price spl-price" id="three_months_actual"></em>
                                    </span>
                                    <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['three_months_offer'])) }}/-</em> -->
                                    <div class="mem-tax">*Inclusive of all taxes</div>
                                        <a href="javascript:void(0)" class="more-info m-info-test" style="margin-top:7px;" data-toggle="modal" data-target="#mem-info" data-id="0"><i class="fas fa-info-circle"
                                        style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                                                            <!--<input type="checkbox" id="test1" />-->
                                                            <!-- <label for="test1"><a href="javascript:void(0)" class="more-info m-info-test"  href="javascript:void(0)">Terms & Conditions</a></label> -->
                                                            <!-- <input type="checkbox" id="test1" />-->
                                                            <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                                            <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-3mIndPlan"  data-plan="0" data-price="{{ $prices['three_months_offer'] }}" data-description="3 months individual plan">Buy Now</a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-plan="0" data-pid="1" id="buy_three_months_fixed" data-description="3 months individual plan">Buy Now</a>
                                </div>
                            </div>
                            <div class="own-member-item ftco-animate member-col" style="display: none;">
                                <div class="text-center">
                                    <h2 class="heading">1Rs</h2>
                                    <span class="price pd-20">
                                        <sup> <?php echo $currency_icon; ?> </sup>
                                        <span class="number-member">
                                            <span class="line-through">1Rs/-</span>
                                        </span>
                                        <em class="monthly-price spl-price">
                                            <sup style="color: #000;"><?php echo $currency_icon; ?></sup>1Rs/-
                                        </em>
                                    </span>
                                    <div class="mem-tax">*Inclusive of all taxes</div>
                                        <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="1"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                                        <!--<input type="checkbox" id="test1" />-->
                                        <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-plan="0" data-price="1" data-description="1Rs"></a>
                                </div>
                            </div>
                            <!-- two -->
                            <div class="own-member-item ftco-animate member-col relative">
                                                        <div class="text-center">
                                                            <div class="trending_tag">POPULAR</div>
                                                            <h2 class="heading">6 Months Coaching</h2>
                                                            <span class="price" style="margin-top:20px;">
                                                                <sup> <?php echo $currency_icon; ?> </sup>
                                                                <span class="number-member"><span id="six_months_fixed"></span>/-</span><br>
                                                                <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['six_months_offer'])) }}/-</em> -->
                                                                <em class="monthly-price spl-price" id="six_months_actual"></em>
                                                            </span>
                                                            <!--  add this when subscription enabled -->
                                                            <!-- <span class="excerpt d-block new_tnc" style="color: #fefefe;"
                                                        data-plan="{{ $prices['six_months_plan_id'] }}" data-count="6"
                                                        data-price="{{ $prices['six_months_offer'] }}"
                                                        data-description="6 months individual plan">
                                                        <em class="monthly-price rp_sub dark">Monthly billing available <i
                                                                class="far fa-caret-square-right"></i></em>
                                                        </span> -->
                                                            <div class="mem-tax">*Inclusive of all taxes</div>
                                                            <a href="javascript:void(0)" style="margin-top:20px;"
                                                                class="more-info" data-toggle="modal"
                                                                data-target="#mem-info" data-id="1"><i
                                                                    class="fas fa-info-circle"
                                                                    style="color: #187FDE;margin-right: 3px;"></i>More
                                                                Info</a>
                                                            <!--<input type="checkbox" id="test1" />-->
                                                            <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                                            <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-6mIndPlan"  data-plan="0" data-price="{{ $prices['six_months_offer'] }}" data-description="6 months individual plan"></a> -->
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-primary pay__ is_premium" data-pid="2"
                                                                data-plan="0" id="buy_six_months_fixed"
                                                                data-description="6 months individual plan">Buy
                                                                Now</a>
                                                        </div>
                            </div>
                            <!-- three -->
                            <div class="own-member-item ftco-animate member-col">
                                <!-- <div class="block-7"> -->
                                <div class="text-center">
                                    <h2 class="heading">12 Months Coaching</h2>
                                    <span class="price" style="margin-top:20px;">
                                        <sup> <?php echo $currency_icon; ?> </sup>
                                        <span class="number-member"><span id="twelve_months_fixed"></span>/-</span><br>
                                        <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['twelve_months_offer'])) }}/-</em> -->
                                        <em class="monthly-price spl-price" id="twelve_months_actual"></em>
                                    </span>
                                    <!--  add this when subscription enabled -->
                                    <!-- <span class="excerpt d-block new_tnc" data-plan="{{ $prices['twelve_months_plan_id'] }}" data-count="12" data-price="{{ $prices['twelve_months_offer'] }}" data-description="12 months individual plan">
                                    <em class="monthly-price rp_sub dark">Monthly billing available<i class="far fa-caret-square-right"></i></em> </span> -->
                                    <div class="mem-tax">*Inclusive of all taxes</div>
                                        <a href="javascript:void(0)" style="margin-top:20px;" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="2"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                                        <!--<input type="checkbox" id="test1" />-->
                                        <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                        <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-12mIndPlan"  data-plan="0" data-price="{{ $prices['twelve_months_offer'] }}" data-description="12 months individual plan"></a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-pid="3" data-plan="0" id="buy_twelve_months_fixed" data-description="12 months individual plan">Buy Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="container" style="text-align: justify;text-align-last: center;">
                            <h2 class="mb-2 cp-head">Buddy Coaching Plans</h2>
                        </div>
                        <div class="container own-member-main-container" style="margin-bottom: 0;">
                            <div class="own-member-item ftco-animate member-col">
                                <div class="text-center">
                                    <h2 class="heading">3 Months Buddy Coaching</h2>
                                    <span class="price pd-20" style="margin-top:20px;">
                                        <sup> <?php echo $currency_icon; ?> </sup>
                                        <span class="number-member"><span id="three_months_couple_fixed"></span>/-</span><br>
                                        <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['three_months_couple_offer'])) }}/-</em> -->
                                        <em class="monthly-price spl-price" id="three_months_bd_actual"></em>
                                    </span>
                                        <div class="mem-tax">*Inclusive of all taxes</div>
                                        <a href="javascript:void(0)" class="more-info" style="margin-top:7px;" data-toggle="modal" data-target="#mem-info" data-id="3"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                                        <!--<input type="checkbox" id="test1" />-->
                                        <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> --> <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-3mCouPlan"  data-plan="0" data-price="{{ $prices['three_months_couple_offer'] }}" data-description="3 months buddy package">Buy Now</a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-plan="0" data-pid="4" id="buy_three_months_couple_fixed" data-description="3 months buddy plan">Buy Now</a>
                                </div>
                            </div>
                            <div class="own-member-item ftco-animate member-col">
                                <div class="text-center">
                                    <h2 class="heading">6 Months Buddy Coaching</h2>
                                    <span class="price" style="margin-top:20px;">
                                        <sup> <?php echo $currency_icon; ?> </sup>
                                        <span class="number-member"><span id="six_months_couple_fixed"></span>/-</span><br>
                                        <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['six_months_couple_offer'])) }}/-</em> -->
                                        <em class="monthly-price spl-price" id="six_months_bd_actual"></em>
                                    </span>
                                    <div class="mem-tax">*Inclusive of all taxes</div>
                                        <!--  add this when subscription enabled -->
                                        <!-- <span class="excerpt d-block new_tnc" data-plan="{{ $prices['six_months_couple_offer_plan_id'] }}" data-count="6" data-price="{{ $prices['six_months_couple_offer'] }}" data-description="6 months buddy package">
                                        <em class="monthly-price rp_sub dark">Monthly billing available <i class="far fa-caret-square-right"></i></em> </span> -->
                                        <a href="javascript:void(0)" style="margin-top:20px;" class="more-info" data-toggle="modal"  data-target="#mem-info" data-id="4"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                                        <!--<input type="checkbox" id="test1" />-->
                                        <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                        <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-6mCouPlan"  data-plan="0" data-price="{{ $prices['six_months_couple_offer'] }}" data-description="6 months buddy package">Buy Now</a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-pid="5" data-plan="0" id="buy_six_months_couple_fixed" data-description="6 months buddy plan">Buy Now</a>
                                </div>
                            </div>
                            <div class="own-member-item ftco-animate member-col">
                                <div class="text-center">
                                                            <h2 class="heading">12 Months Buddy Coaching</h2>
                                                            <span class="price" style="margin-top:20px;">
                                                                <sup> <?php echo $currency_icon; ?> </sup>
                                                                <span class="number-member"><span id="twelve_months_couple_fixed"></span>/-</span><br>
                                                                <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['twelve_months_couple_offer'])) }}/-</em> -->
                                                                <em class="monthly-price spl-price" id="twelve_months_bd_actual"></em>
                                                            </span>
                                                            <div class="mem-tax">*Inclusive of all taxes</div>
                                                            <!--  add this when subscription enabled -->
                                                            <!-- <span class="excerpt d-block new_tnc"
                                                            data-plan=""
                                                            data-count="12" data-price="{{ $prices['twelve_months_couple_offer'] }}"
                                                            data-description="12 months buddy package">
                                                            <em class="monthly-price rp_sub dark">Monthly billing available <i
                                                                class="far fa-caret-square-right"></i></em>
                                                            </span> -->
                                                            <a href="javascript:void(0)" style="margin-top:20px;"
                                                                class="more-info" data-toggle="modal"
                                                                data-target="#mem-info" data-id="7"><i
                                                                    class="fas fa-info-circle"
                                                                    style="color:#187FDE;margin-right: 3px;"></i>More
                                                                Info</a>
                                                            <!--<input type="checkbox" id="test1" />-->
                                                            <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                                            <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-6mCouPlan"  data-plan="0" data-price="{{ $prices['twelve_months_couple_offer'] }}" data-description="12 months buddy package">Buy Now</a> -->
                                                            <a href="javascript:void(0)"
                                                                class="btn btn-primary pay__ is_premium" data-pid="6"
                                                                data-plan="0" id="buy_twelve_months_couple_fixed"
                                                                data-description="12 months buddy plan">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- modal ends here -->

    <!-- Membership More Info modal -->
                            <div class="modal fade membership-modal modal-child" id="mem-info" tabindex="-1"
                                role="dialog" aria-hidden="true" data-backdrop-limit="1"
                                data-modal-parent="#packageModal">
                                <div class="modal-dialog mem-info_modal" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modal Title</h5>
                                            <button type="button" class="close modal_close1" data-dismiss="modal"
                                                aria-label="Close" aria-hidden="true">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid" style="margin-bottom: 1rem">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p class="intro-para">Intro Para</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="membership-modal-prog-fea">
                                                <h3>Program features :</h3>
                                                <ul>
                                                    <li>Customized Workout Plan.</li>
                                                    <li>Customized Diet Plan based on your lifestyle.</li>
                                                    <li>Real-time meal updates to stay on track!</li>
                                                    <li>Daily Progress tracking.</li>
                                                    <li>Dedicated Head Coach to monitor your progress.</li>
                                                    <li>Daily live online workout sessions.</li>
                                                    <li>"Pause plan” when needed.</li>
                                                    <li>Whatsapp/Email support on a daily basis.</li>
                                                    <li>Available for all timezones.</li>
                                                </ul>
                                            </div>
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>Upon enrolling, you can pick your start date.</p>
                                                        <p class="desc-para">Description Para.</p>
                                                        <p>Feel free to contact us at anytime, there's no such question
                                                            as a dumb question!</p>
                                                        <span class="imp-info">*Please note that all the programmes
                                                            are non-refundable therefore if you pay for coaching be 100%
                                                            sure to commit and put in the work.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    <!-- More info modal ends here -->
    <style>
        .pause_modal-header {
            padding: 0px;
            border-radius: 8px;
        }

        .pcs_modal-title {
            font-family: Open Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 1em;
            line-height: 16px;
            color: #fff;
            float: right;
            margin-right: 12px;
            margin-top: 8px;
        }

        .p_c_header {
            background: #187FDE;
            padding: 24px;
            /* border-radius: 12px; */
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .pause_icon_static {
            background: #333333;
            height: 60px;
            width: 60px;
            text-align: center;
            border-radius: 50%;
            margin: auto;
        }

        .pacuse_content_static {
            text-align: center;
            /* margin-top: 20px; */
            margin: 20px;
        }

        .pcs_1 {
            font-family: Open Sans;
            font-style: normal;
            font-weight: bold;
            font-size: 1em;
            line-height: 16px;
            letter-spacing: 0.01em;
            color: #000000;
        }

        .pcs_2 {
            font-family: Open Sans;
            font-style: normal;
            font-weight: bold;
            font-size: 1em;
            line-height: 16px;
            color: #187FDE;
        }

        .pcs_3 {
            font-family: Open Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 0.9em;
            line-height: 14px;
            color: #000000;
        }

        .pcs_4 {
            font-family: Open Sans;
            font-style: normal;
            font-weight: normal;
            font-size: 0.9em;
            line-height: 150%;
            text-align: justify;
            color: #000000;
        }

        @media (min-width: 1040px) {
            #header {
                top: 0px;
            }

            .left_d_b_pause {
                left: 39%;
                position: relative;
                top: 128px;
            }

            .header_logo {
                margin-left: auto;
                margin-top: -16px;
            }

            .ongoing_membership {
                margin-top: 32px;
            }

            .new_web {
                /* padding-left: 8% !important;
                padding-right: 8% !important; */
                opacity: 0;
            }

            .left_d_b {
                left: 0%;
                position: relative;
                top: 116px;
            }

            .legend_c_text {
                font-size: 2em;
            }

            .first_o_m {
                font-size: 1.2em;
                font-weight: 600;
            }

            .second_o_m {
                font-size: 1.2em;
                font-weight: 600;
            }

            .third_o_m {
                margin-top: 22px;
                /* font-size: 1em; */
                font-size: 1em;
                /* font-weight: 300; */
                margin-bottom: 20px;
            }

            .start_outside {
                width: 100%;
                margin-left: unset;
            }

            .tracker_box {
                margin-right: 70px;
                margin-left: 70px;
            }

            .left_b {
                font-size: 1em;
            }

            .dsc {
                width: 200px;
            }

            .f_m_c {
                width: 100%;
                height: 100%;
            }

            .live_sessoin_carousel .slick-dots {
                position: unset;
                left: unset;
            }

            .f_live_sess {
                display: block;
                /* margin: 14px; */
                /* margin-left: -28px; */
                background-image: url();
                width: 66px;
                height: 66px;
                background-size: cover;
                position: absolute;
                margin-left: 18px;
                /* margin-top: 5px; */
            }

            .s_live_sess {
                display: inline-block;
                /* margin: 14px; */
                /* vertical-align: top; */
                margin-left: -3%;
                margin-right: 0px;
                margin-top: 16px;
                /* width: 33%; */
                position: absolute;
            }

            .t_live_sess {
                /* display: inline-block; */
                /* margin: 14px; */
                float: right;
                /* margin-top: 18px; */
                margin-right: 14px;
                margin-top: 18px;
            }

            .circle_country_img {
                height: 25px;
            }

            .country_text {
                font-size: 0.8em;
                font-weight: 400;
            }

            .city_shadow {
                font-size: 0.8em;
            }

            .circle_country {
                margin: 20px;
            }

            .second_card {
                width: 70%;
            }

            .d_oniut {
                margin-top: -46px;
                display: inline-block;
                margin-left: 40px;
            }

            .login1 {
                margin-top: 0px;
            }

            .slick-carousel .slick-dots {
                left: 43%;
            }
        }

        @media (min-width: 702px) {
            .f_m_c {
                width: 100%;
                height: 100%;
            }

            .live_sessoin_carousel .slick-dots {
                position: unset;
                left: unset;
            }
        }

        .f_live_sess {
            display: block;
            /* margin: 14px; */
            /* margin-left: -28px; */
            background-image: url();
            width: 66px;
            height: 66px;
            background-size: cover;
            position: absolute;
            margin-left: 18px;
            /* margin-top: 5px; */
        }

        .s_live_sess {
            display: inline-block;
            /* margin: 14px; */
            /* vertical-align: top; */
            margin-left: -3%;
            margin-right: 0px;
            margin-top: 16px;
            /* width: 33%; */
            position: absolute;
        }

        .t_live_sess {
            /* display: inline-block; */
            /* margin: 14px; */
            float: right;
            /* margin-top: 18px; */
            margin-right: 14px;
            margin-top: 18px;
        }

        .cancel_future_pause {
            display: block;
            margin: auto;
            margin-top: 10px;
        }

        /* #preloader{
        background-image:url('fitness/images/livezygif.gif');
        margin-left:34%;
        margin-top:10%;
        margin-right:30%;
        background-repeat:no-repeat;
        /* background-color:transparent; */
        }

        */ .cross_modal {
            float: right;
            font-weight: 800;
            margin-top: -20px;
        }

        .n_center {
            height: 250px;
            margin: auto;
            display: block;
            /* margin-left: auto; */
            /* margin-right: auto; */
            border-radius: 50%;
            background: #187fde;
            margin-top: 20px;
        }

        .c_tes {
            text-align: center;
            font-size: 1.4em;
            line-height: 50px;
        }

        .s_c_tes {
            text-align: center;
        }

        .emotion-style-element_custom {
            /* display: inline-block;
        font-size: 2em;
        opacity: 0.8;
        cursor:pointer; */
        }

        /* .emotion-style-element_custom:hover{
        font-size: 2.4em;
        opacity: 1;
        } */
        .active_emoji {
            /* font-size: 2.4em;
        opacity: 1;  */
        }

        .referal_submit {
            cursor: pointer;
        }

        .v_m_b {
            font-size: 0.8em;
            border: 1px solid #e5e5e5;
            line-height: unset;
            padding: 6px;
            width: 100px;
            border-radius: 16px;
            color: #187fde;
            margin: auto;
            margin-top: 15%;
            cursor: pointer;
        }

        .notif_filter {
            cursor: pointer;
        }

        button.swal2-confirm.swal2-styled:focus-visible {
            outline: none;
        }

        .mem-info_modal {
            max-width: 600px !important;
        }

        .act_i {
            color: #fff;
            font-size: 30px;
            /* vertical-align: ; */
            margin-top: 10px;
        }

        .act_desc {
            margin-left: 20px;
            margin-right: 20px;
        }

        .act_def {
            display: flex;
            /* margin: 24px; */
            background: #d13c3c;
            padding: 2.5rem;
            margin-top: -12px;
            font-family: 'Open Sans';
            color: #fff;
            text-align: justify;
            padding-top: 24px;
            padding-bottom: 24px;
        }

        .swal2-modal .swal2-close {
            font-size: 24px !important;
            line-height: 18px !important;
        }

        .m_i_d_n {
            display: none !important;
        }

        #renew_modal_new .modal-body {
            max-height: 600px;
            overflow-y: auto;
        }

        .activate_package {
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
            /* box-shadow: 2px 2px 10px rgb(94 94 94 / 25%), -2px -2px 4px rgb(255 255 255 / 25%); */
            border-radius: 30px;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
            margin-top: 12px;
        }

        .row_p {
            /* margin:18px;
                width: max-content;
                margin-left: 0px;
                margin-right: 0px; */
            /* margin: 18px;  */
            width: max-content;
            /* margin-left: 0px; */
            /* margin-right: 0px; */
            margin: auto;
        }

        .rm_headeer {
            display: block;
            color: white;
            background-image: url(fitness/images/avail_diwali_main_banner.png);
            background-size: cover;
            /* height: 128px; */
            height: 160px;
        }

        .d_btn {
            color: #000;
            opacity: 1;
            font-weight: bold;
            font-size: 3em;
            line-height: 10px;
        }

        .rm_headeer_p {
            text-align: center;
        }

        .rm_headeer_p_2 {
            text-align: center;
            color: #ffee55;
        }

        .package_carousel {
            padding: 10px;
            padding-left: 14%;
            padding-right: 14%;
        }

        .slick-track {
            margin:auto !important;
        }
        .p_c_t {
            text-align: center;
            /* margin-top: 4%; */
            font-size: 1.2em;
            /* padding-bottom: 10px; */
            padding-top: 36px;
        }

        .boug_1 {
            margin-left: 14px;
            margin-right: 14px;
            padding-top: 4px;
            padding-bottom: 4px;
        }

        .opal {
            font-size: 1.2em;
        }

        .desc {
            font-weight: 600;
        }

        .bks_c {
            background: black;
        }
    </style>

    <div id="pause_static_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="border-radius:8px;">
                <div class="modal-body pause_modal-header">
                    <div class="pcs_modal-title" data-dismiss="modal">X</div>
                    <div class="p_c_header">
                        <div class="pause_icon_static">
                            <img src="fitness/images/Pause_icon.png" class="img-responsive"
                                style="height: 26px;/* position: absolute; */margin-top: 15px;">
                        </div>
                    </div>
                    <div class="pacuse_content_static">
                        <p class="pcs_1">PAUSED</p>
                        <?php if($pause_on_data){?>
                        <p class="pcs_2">{{ date('d/m/Y', strtotime($pause_on_data[0]->start_date)) }} to
                            {{ date('d/m/Y', strtotime($pause_on_data[0]->end_date)) }}</p>
                        <p class="pcs_3">Your subscription will resume from
                            {{ date('d/m/Y', strtotime($pause_on_data[0]->end_date . ' + 1 days')) }}.</p>
                        <?php
                }
                ?>
                        <p class="pcs_4">Also, we request you to update your weight &amp; physique on whatsapp,
                            before and after this pause period so we can stay on track!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Footer ======= -->
    <!-- <footer id="footer">
        <div class="container py-4">
        <div class="copyright">
            &copy; 2018-<span id="copyright"></span><script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script> <strong><span> Liv Ezy</span></strong>. All Rights Reserved
        </div>
        </div>
    </footer> -->
    <!-- End Footer -->
    <!-- Footer-->

    <style>
     .footer {
        background: #000;
        /* position:absolute; */
        bottom:0;
        width:100%;
        height:60px;
     }

    </style>

    <footer class="footer sticky-bottom">
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 text-center copyrights_info">
                        <p>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> | All rights reserved | <a href="/tnc/tnc.pdf" target="_blank"
                                class="tnc">Terms &amp; Conditions</a> | <a href="/privacy-policy"
                                target="_blank" class="tnc">Privacy Policy</a>
                        </p>
                    </div>
                    <div class="col-md text-right">
                        <p>
                            <a href="https://www.instagram.com/livezy.fitness/" target="_blank"><span
                                    class="icon-instagram own-inst-icon"></span></a>
                            <a href="https://www.facebook.com/liv.ezyfit/" target="_blank"><span
                                    class="icon-facebook own-facebook-icon "></span></a>
                            <a href="https://m.youtube.com/channel/UC2vPcgthvIT9po7RsNEIZbA" target="_blank"><span
                                    class="fab fa-youtube own-yt-icon"></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div id="preloader"></div>

    <!-- <button class="wa-icon">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/1200px-WhatsApp.svg.png" alt="">
  </button> -->

    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" />
    <style>
        .renew_bar {
            background: #d13333;
            /* top: 19px; */
            margin-top: 6%;
            margin-bottom: -3%;
            color: #fff;
            /* height: 12vh; */
            opacity: 1;
            padding: 18px;
            margin-left: 16px;
            margin-right: 16px;
            transition: height 0ms 0ms, opacity 600ms 0ms;
            padding-bottom: 34px;
        }
        .renew_bar_db {
            text-align: center;
            background: #d13333;
            color: #fff;
            opacity: 1;
            padding: 4px;
            margin-left: 16px;
            margin-right: 16px;
            border-radius: 10px;
            transition: height 0ms 0ms, opacity 600ms 0ms;
        }

        .renew_bar_hide {
            overflow: hidden;
            /* Hide the element content, while height = 0 */
            height: 0;
            opacity: 0;
            transition: height 0ms 400ms, opacity 400ms 0ms;
        }

        .renew_desc {
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 0.9em;
            margin-left: 34px;
        }

        .renew_btn_sec {
            float: right;
            /* padding-top: 10px;
            padding-bottom: 10px; */
            margin-top: 0px;
        }

        .renew_hide {
            display: inline-block;
            margin-right: 8px;
            border: 1px solid;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 20px;
            cursor: pointer;
        }

        .renew_action {
            display: inline-block;
            margin-right: 0px;
            /* border: 1px solid; */
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 20px;
            background: #333;
            cursor: pointer;
            padding-top: 2px;
            padding-bottom: 2px;
        }

        #dynamic_rate {
            font-size: 15px;
        }

        /****** Style Star Rating Widget *****/
        .rating {
            border: none;
            /* float: left; */
            display: initial;
        }

        .rating>input {
            display: none;
        }

        .rating>label:before {
            margin: 5px;
            font-size: 2.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
            cursor: pointer;
        }

        .rating>.half:before {
            content: "\f089";
            position: absolute;
        }

        .rating>label {
            color: #ddd;
            float: right;
        }

        /***** CSS Magic to Highlight Stars on Hover *****/
        .rating>input:checked~label,
        /* show gold star when clicked */
        .rating:not(:checked)>label:hover,
        /* hover current star */
        .rating:not(:checked)>label:hover~label {
            color: #FFD700;
        }

        /* hover previous stars in list */
        .rating>input:checked+label:hover,
        /* hover current star when changing rating */
        .rating>input:checked~label:hover,
        .rating>label:hover~input:checked~label,
        /* lighten current selection */
        .rating>input:checked~label:hover~label {
            color: #FFED85;
        }
    </style>

    <!--Modal: modalCoupon-->
    <div class="modal fade top" id="no-slots" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-backdrop="true">
        <div class="modal-dialog modal-frame modal-top modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <div style="float:right;">
                <button type="button" class="close noSlotModal mr-2 mt-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
            <div class="row d-flex justify-content-center align-items-center">
                <h2>
                <span class="badge" style="color:red;">No slots available!</span>
                </h2>
                <p class="pt-2 mx-4 text-center">Slots are currently unavailable. Please try next week.</p>
            </div>
            </div>
        </div>
        <!--/.Content-->
        </div>
    </div>
    <!--Modal: modalCoupon-->

    <div class="modal fade top" id="plan-exist-alert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="true">
        <div class="modal-dialog modal-frame modal-top modal-notify modal-success" role="document">
        <!--Content-->
        <div class="modal-content">
            <div style="float:right;">
                <button type="button" class="close noSlotModal mr-2 mt-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <div class="row d-flex justify-content-center align-items-center">
                    <h3>
                    <span class="badge" style="color:red">You have already Purchased Plan!</span>
                    </h3>
                    <p class="pt-2 mx-4 text-center">You still have an active membership. You can renew once it expires.</p>
                </div>
            </div>
        </div>
        <!--/.Content-->
        </div>
    </div>

    <!-- scroll to top -->
    {{-- <div id="scroll-top" onclick="topFunction()"><i class="fas fa-chevron-up"></i></span></div> --}}

    <script src="fitness/mobile/assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/2.1.11/jquery.mixitup.js"></script>
    <script src="fitness/mobile/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fitness/mobile/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="fitness/mobile/assets/vendor/php-email-form/validate.js"></script>
    <script src="fitness/mobile/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="fitness/mobile/assets/vendor/counterup/counterup.min.js"></script>
    <script src="fitness/mobile/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="fitness/mobile/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="fitness/mobile/assets/vendor/venobox/venobox.min.js"></script>
    <script src="fitness/mobile/assets/vendor/aos/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.css" />
    <!-- Template Main JS File -->
    <script src="fitness/mobile/assets/js/main.js?v=10"></script>
    <script src="fitness/js/custom.js?v7"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/css/intlTelInput.css" rel="stylesheet" type="text/css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/js/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/js/intlTelInput.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script> -->
    <script src="fitness/js/pagination/jqpaginator.js?v=1"></script>
    <link rel="stylesheet" href="fitness/css/pagination/styles.css" type="text/css" />
    <script src="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.min.js"></script>
    <script src="fitness/tracker_src/src/donutty.js"></script>
    <script src="fitness/tracker_src/src/vanilla.js"></script>
    <script src="fitness/mobile/emoji/dist/emotion-ratings.js"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-app.js"></script>
    <!-- TODO: Add SDKs for Firebase products that you want to use
    https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.5.0/firebase-database.js"></script>
    <?php
    $current_date = date('Y-m-d');
    ?>
    <script>
        var buy_pay = JSON.parse(localStorage.getItem("user_plan_pay"))
        var pop_up = localStorage.getItem("pop_up")
        var pop_ones = true;
        if (pop_up) {
            if (localStorage.getItem("pop_up") != '<?php echo $current_date; ?>') {
                localStorage.setItem("pop_up", '<?php echo $current_date; ?>');
                pop_ones = true;
            } else {
                pop_ones = false;
            }
        }
    </script>

    <?php if($users->user_status == 2) { ?>
    <script>
        $(window).on("load", function() {
            from_coach_profile = localStorage.getItem('from_coach_profile');
            if (from_coach_profile == 1) {
                $.ajax({
                    type: 'get',
                    url: '/continue-same-coach/' + <?php echo $users->id; ?>,
                    success: function() {
                        localStorage.removeItem('from_coach_profile');
                    }
                });
            }

        });
    </script>

    <!-- Newly added is_buddy check for preventing the coach confirmation before buddy assignment -->
    <?php if($users->is_renewed == 1) { ?>
    <?php // if($users->is_renewed == 1 && $users->is_buddy == 0) {
    ?>
    <script>
        // from_coach_profile = localStorage.getItem('from_coach_profile');
        // if (from_coach_profile != 1) {
        //     $('#coach_confirmation_on_renewal').modal({
        //         backdrop: 'static',
        //         keyboard: false // to prevent closing with Esc button (if you want this too)
        //     })
        // }
    </script>
    <?php }
    }
    ?>


    <script>
        // For Premium users
        $('#renew_coach_button').on('click', function() {

            var previous_coach_slots  = '<?php if(isset($coachDetail)) { echo $coachDetail->slots; } ?>';
            var previous_coach_tier   = '<?php if(isset($coachDetail)) { echo $coachDetail->coach_tier; } ?>';

            if ($("input[name='renew_coach']:checked").val() == 'existing') {
                console.log('From Continue With Same Coach');
                if(previous_coach_slots > 0) {
                    $.ajax({
                        type: 'get',
                        url: '/continue-same-coach/' + <?php echo $users->id; ?>,
                        success: function() {
                            // If premium user continue with same coach
                            //$('#coach_confirmation_on_renewal').modal('hide');
                            // $('#livezy_premium').click();
                            $('#enrol_coach_<?php if(isset($existing_coach)) { echo $existing_coach->id;} ?>').trigger('click', previous_coach_tier);
                        }
                    });
                } else {
                    //alert('Sorry! No slots available for current coach! Please try next month or Get a new coach!');
                    // var elmnt = document.getElementById("get-a-coach");
                    // elmnt.scrollIntoView();
                    $('#no-slots').modal('show');
                    $('#livezy_premium').click();
                }
            } else {
                console.log('Inside else for Get a New Coach');
                $('#coach_confirmation_on_renewal').modal('hide');
                if ($("input[name='new_coach_type']:checked").val() == 'plus') {
                    $('#package_bought').click();
                } else {
                    console.log('From Get a New Coach - Premium');
                    $('#livezy_premium').click();
                }
                // $('#livezy_premium').click();
                // Check if this is required otherwise it will throw issues
                // $.ajax({
                //     type: 'get',
                //     url: '/reset-existing-coach/' + <?php echo $users->id; ?>,
                //     success: function() {
                //         // var elmnt = document.getElementById("get-a-coach");
                //         // elmnt.scrollIntoView();
                //         $('#livezy_premium').click();
                //     }
                // });
            }
        });

        // For Plus users
        $('#renew_plus_coach_confirmation').on('click', function() {

            if ($("input[name='renew_plus_coach']:checked").val() == 'existing') {
                console.log('From Continue With Same Coach - Plus');
                $('#coach_confirmation_on_renewal_plus').modal('hide');
                $('#package_bought').click();
            } else {
                console.log('From Get a New Coach - Plus');
                $('#coach_confirmation_on_renewal_plus').modal('hide');
                $('#livezy_premium').click();
            }

        });

    </script>


    <?php
// $current_date=date('Y-m-d');
//2021-10-28

if($pop_up){
?>
    <script>
        if (!buy_pay && '<?php echo $users->user_status; ?>' != '3' && pop_ones) {
            $('#renew_modal_new').modal({
                backdrop: 'static',
                keyboard: false // to prevent closing with Esc button (if you want this too)
            })
            localStorage.setItem("pop_up", '<?php echo $current_date; ?>');
        }
    </script>
    <?php
}
?>


    <script>
        toastr.options = {
            "positionClass": "toast-top-full-width",
            "preventDuplicates": true,
            "timeOut": "3000",
        }
        $('.s_m').on('click', function() {
            $('#package_bought').click()
        })

        function subscribe_more() {
            var elmnt = document.getElementById("csb");
            elmnt.scrollIntoView();
        }

        function setCookie(name, value, days) {
            console.log('setCookie for: ' + name);
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            // split the cookie string into an array
            var cookies = document.cookie.split(';');

            // loop through the cookies to find the one with the specified name
            for (var i = 0; i < cookies.length; i++) {
                var cookie = cookies[i].trim();
                // check if the cookie starts with the name we're looking for
                if (cookie.startsWith(name + '=')) {
                // return the value of the cookie
                return cookie.substring(name.length + 1);
                }
            }

            // if the cookie isn't found, return null
            return null;
        }

        function removeCookie(name) {
            // The expires attribute is set to a time in the past (in this case, January 1, 1970) to immediately expire the cookie
            document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        }


        if ('<?php echo $users->user_status; ?>' == '9') {
            $('#pause_static_modal').modal({
                backdrop: 'static',
                keyboard: false // to prevent closing with Esc button (if you want this too)
            })
            $('#pause_static_modal').modal('show');
        }
        if ('<?php echo $users->user_status; ?>' == '2' && '<?php echo $users->real_time_database; ?>' == '0') {
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
            var data_i = <?php echo json_encode($users, true); ?>;
            var sub_d = {}
            sub_d[`/livezy-admin/${data_i.username}`] = data_i;
            firebase.database().ref('/').update(sub_d);
            console.log('username', data_i.username)
            $.ajax({
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                url: '/real_time_insert',
                success: function(response) {}
            })
        }
        $('#f_cancel').on('click', function() {
            localStorage.removeItem('feedback_id');
            $('#feedback_modal').modal('toggle')
        })
        $('.v_m_b').on('click', function() {
            window.open('<?php echo $users->plan_doc_link; ?>', '_blank');
        })
        $('#f_submit').on('click', function() {
            var rating_emoji_intro = $('.emotion-style-element_custom.active_emoji').val()
            if (rating_emoji_intro == undefined) {
                toastr.error('Please Select Emoji');
                return false;
            }
            var s_id = $('#f_s_id').val();
            var feedback_comment = $('#feedback_comment').val();
            let f_data = {
                'sess_id': s_id,
                'star': rating_emoji_intro,
                'comment': feedback_comment
            }
            localStorage.removeItem('feedback_id');
            $.ajax({
                type: 'post',
                data: f_data,
                url: '/feedback_insert',
                success: function(response) {
                    toastr.success('Feedback is submitted');
                    $('#feedback_modal').modal('toggle');
                }
            })
        })
        $('#r_cancel').on('click', function() {
            $.ajax({
                type: 'post',
                url: 'cancel_referal',
                success: function(response) {
                    location.reload();
                }
            })
        })
        $('#r_submit').on('click', function() {
            if ($('#referal_code').val().length != 6) {
                toastr.error('Please Enter Referal Code');
                return false;
            }
            $.ajax({
                type: 'post',
                data: {
                    'r_code': $('#referal_code').val()
                },
                url: '/referal_code_apply',
                success: function(response) {
                    if (response) {
                        toastr.success('Congratulation you got extension in program');
                        let congo_html = `<div class="cross_modal" data-dismiss="modal">X</div>
                                        <img src="fitness/congo.png" class="img-responsive n_center">
                                        <div class="c_tes">Congratulations!</div>
                                        <p class="s_c_tes">${response} days has been added to your membership.</p>`;
                        $('.congo_pop_up').html(congo_html);
                    } else {
                        toastr.error('Invalid Referal Code! Try again.');
                    }
                }
            })
        })
        $('.renew_click_plus').on('click', function() {

            // var elmnt = document.getElementById("get-a-coach");
            // elmnt.scrollIntoView();
            // $('#package_bought').click();

            $('#coach_confirmation_on_renewal_plus').modal('show');

        });

        $('.renew_click').on('click', function() {
            // $('#renew_modal').modal({
            //     backdrop: 'static',
            //     keyboard: false  // to prevent closing with Esc button (if you want this too)
            // })
            //var elmnt = document.getElementById("member-section");
            // var elmnt = document.getElementById("get-a-coach");
            // elmnt.scrollIntoView();
            $('#coach_confirmation_on_renewal').modal('show');
        })
        $("input[name='renew_plan_buddy']").on('change', function() {
            if ($("input[name='renew_plan_buddy']:checked").val() == 'existing') {
                $('.new_partner_data').css('display', 'none');
            } else {
                $('.new_partner_data').css('display', 'block');
            }
        })
        $('#renew_continue').on('click', function() {
            if ($("input[name='renew_plan']:checked").val() == 'existing') {
                var data_pay = {
                    "plan": '<?php echo $users->is_subscription; ?>',
                    "currency": '<?php echo strtoupper($currency); ?>',
                    "price": '<?php echo $exsiting_plan_renewal_price; ?>', //echo $plan_current[0]->price
                    "description": '<?php echo $plan_current[0]->duration; ?>',
                    "count": '<?php echo $plan_current[0]->count_subscription; ?>',
                    "plan_id": '<?php echo $plan_current[0]->id; ?>'
                };
                localStorage.setItem("user_plan_pay", JSON.stringify(data_pay))
                if ('<?php echo $users->user_status; ?>' == '11')
                    setCookie('is_renewal', 1, 1);
                location.reload();
            } else {
                console.log('Inside get a coach (#renew_continue)');
                var elmnt = document.getElementById("get-a-coach");
                elmnt.scrollIntoView();
                $('#renew_modal').modal('toggle');
            }
        });


        if ('<?php echo $users->user_status; ?>' == '4' && '<?php echo $users->member_type; ?>' != 'Live Session') {
            static_msg(
                'Your head coach will reach out to you shortly on WhatsApp requesting full body pictures in order to customize your plan. Also, if you have any blood tests done recently, please share it as it can help us customize your plan better'
                );
        }
        if ('<?php echo $users->user_status; ?>' == '5' && '<?php echo $users->member_type; ?>' != 'Live Session') {
            static_msg(
                'Thank you for sharing your pictures. Your head coach will customize and share your workout and diet plan at the earliest'
                );
        }
        if ('<?php echo $users->user_status; ?>' == '6' && '<?php echo $users->member_type; ?>' != 'Live Session') {
            static_msg(
                'Your plan has been shared! You can access it by selecting the \'view plan\' option on the dashboard. Please go through the same and schedule a call with your head coach through the link provided on WhatsApp. \n Please note, your program will only start after the introduction call.'
                );
        }
        if ('<?php echo $users->user_status; ?>' == '7' && '<?php echo $users->member_type; ?>' != 'Live Session') {
            static_msg('You\'re all set. Looking forward to start this journey with you!');
        }

        function static_msg(msg) {
            let success_temp = `<div class="sec_liv_book">
            <p class="e_f t_r">${msg}
            </p>
            </div>`;
            swal({
                html: success_temp,
                showCancelButton: false,
                confirmButtonText: 'Ok',
                showLoaderOnConfirm: true,
                allowOutsideClick: false
            }).then(function(email) {
                $('#dashboard').click();
            }).catch(swal.noop)
        }
        $('#cancel_pause').on('click', function() {
            let success_temp = `<div class="sec_liv_book">
        <p class="e_f t_r">Are you sure want to cancel your pause?
        </p>
        </div>`;
            if ('<?php echo sizeof($pause_on_data); ?>' != '0') {
                var total_day_availed = '<?php echo date('d/m/Y', strtotime($pause_on_data ? $pause_on_data[0]->start_date . ' + 2 days' : '')); ?>';
                var curr_d = '<?php echo date('d/m/Y'); ?>';
                if (total_day_availed >= curr_d) {
                    success_temp = `<div class="sec_liv_book">
                                <p class="e_f t_r">Since you are violating the terms & conditions of the pause, a penalty of 3 days will be deducted from your total available pause days.</p>
                                <p class="e_f t_r">Are you sure want to cancel your pause?</p>
                            </div>`;
                }
            }
            swal({
                html: success_temp,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                showLoaderOnConfirm: true,
                allowOutsideClick: false
            }).then(function(email) {
                $.ajax({
                    url: 'cancel_pause',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    type: 'post',
                    success: function(data) {
                        toastr.success('Pause Cancelled successfully');
                        window.location.href = '/';
                    }
                })
            }).catch(swal.noop)
        })

        function cancel_pause(id, u_id, s_d, e_d, p_d) {
            let data = {
                'username': u_id,
                'start_date': s_d,
                'end_date': e_d,
                'pause_day': p_d
            }
            var modal_style = `<div class="sec_liv_book">
                                <p class="e_f t_r">Are you sure you want to cancel your upcoming pause?</p>
                            </div>`;
            swal({
                html: modal_style,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
                showLoaderOnConfirm: true,
                allowOutsideClick: false
            }).then(function(email) {
                $.ajax({
                    url: 'cancel_future_pause',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'data': data
                    },
                    type: 'post',
                    success: function(response) {
                        //window.location.href='/';
                        if (response) {
                            toastr.success('Pause Cancelled successfully');
                            let success_temp = `<div class="sec_liv_book">
                                    <p class="e_f t_r">Your pause has been cancelled from ${s_d} to ${e_d}
                                    </p>
                                    </div>`;
                            swal({
                                html: success_temp,
                                showCancelButton: false,
                                confirmButtonText: 'Ok',
                                showLoaderOnConfirm: true,
                                allowOutsideClick: false
                            }).then(function(email) {
                                window.location.href = '/';
                            }).catch(swal.noop)
                        } else {
                            var modal_style = `<div class="sec_liv_book">
                                                        <p class="e_f t_r">${response}</p>
                                                    </div>`;
                            swal({
                                html: modal_style,
                                showCancelButton: false,
                                confirmButtonText: 'Ok',
                                showLoaderOnConfirm: true,
                                allowOutsideClick: false
                            }).then(function(email) {
                                $('.upcoming_pause_carousel').slick('slickGoTo', $(
                                    '.first_box_upcoming_pause').length);
                            }).catch(swal.noop)
                        }
                    }
                })
            }).catch(swal.noop)
        }

        function zoom_start(id) {
            var id = id;
            var sess_id_create = $(id).attr('data-session');
            var sess_name = $(id).attr('data-sessionname');
            var condition_text = $(id).html()
            var rename_sess = '';
            var equipment = 'None';
            switch (sess_name) {
                case 'HIIT':
                    desc =
                        'Involves short bursts of intense exercise alternated with low-intensity recovery periods. Great way to shed weight and improve endurance.';
                    rename_sess = 'HIIT';
                    break;
                case 'SNC':
                    desc =
                        'A training method focused on improving strength & endurance while helping participants build a great physique and all round functional fitness.';
                    rename_sess = 'DB SNC';
                    equipment = 'Dumbbells';
                    break;
                case 'Yoga':
                    desc =
                        'A variety of asanas, meditation and breathing techniques. Helps in managing stress and gaining functional fitness as well. ';
                    rename_sess = 'Power Yoga';
                    break;
                case 'Dance':
                    desc =
                        'A full body aerobic workout, divided into different genres of music which makes the experience fun and very intense ';
                    rename_sess = 'Dance Fitness';
                    break;
            }
            if (condition_text == 'Book Now') {
                var sess_id_create = $(id).attr('data-session');
                var start_date = $(id).attr('data-start_date');
                var start_time = $(id).attr('data-start_time');
                var desc = '';
                let book_html = `<div class="header_book_live">
                <p class="common_book_p p_head m-lb">${rename_sess}</p>
                ${sess_name=='HIIT'?'<p class="common_book_p p_sub_head">High Intensity Interval Training - body workout</p>':''}
                <p class="common_book_p p_body">${desc}</p>
            </div>
            <div class="sec_liv_book">
                <p class="e_f">Equipment Needed</p>
                <p class="e_t">${equipment}</p>
                <p class="e_f">Before joining the session please check the following</p>
                <ul class="list_si" style="list-style: auto;">
                    <li>Keep a water bottle ready.</li>
                    <li>The video should always be turned on so your form  can be corrected.</li>
                    <li>Mute the audio during the workout so the trainer's instructions can be clear.</li>
                    <li>Please join the class on time.</li>
                </ul>
            </div>`;
                swal({
                    html: book_html,
                    showCancelButton: true,
                    confirmButtonText: 'Book Now',
                    showLoaderOnConfirm: true,
                    allowOutsideClick: false
                }).then(function(email) {
                    $.ajax({
                        url: 'session_booking',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'sess_id_create': sess_id_create,
                            'start_date': start_date,
                            'start_time': start_time
                        },
                        type: 'post',
                        success: function(response) {
                            //window.location.href='/';
                            if (response == '1') {
                                // toastr.success('Session Created successfully');
                                var tm_z = convertTZ(start_date + ' ' + start_time,
                                    '<?php echo isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata'; ?>');
                                let success_temp = `<div class="sec_liv_book">
                                        <div class="success_img"><img src="fitness/images/successfull.png" class="img_s"></div>
                                        <p class="e_f t_r" style="text-align:center">${rename_sess} Session Booked</p>
                                        <p class="e_f" style="text-align:center"><b>Please note:</b> You can join up to 5 minutes prior to the start time. Please be patient until the coach admits you into the session.</p>
                                    </div>`;
                                // <p class="e_f" style="text-align:center">${moment(tm_z).format("dddd, MMMM Do, YYYY")}</p>
                                //     <p class="e_f" style="text-align:center">${moment(tm_z).format("LT")}</p>
                                swal({
                                    html: success_temp,
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                }).then(function(email) {
                                    window.location.href = '/';
                                }).catch(swal.noop)
                            } else {
                                //     let success_temp=`<div class="sec_liv_book"><p class="e_f t_r">${response}</p></div> `
                                // swal({
                                //         html: success_temp,
                                //         showCancelButton: false,
                                //         confirmButtonText: 'Ok',
                                //         showLoaderOnConfirm: true,
                                //         allowOutsideClick: false
                                //         }).then(function(email) {
                                //     }).catch(swal.noop)
                                static_msg(response)
                            }
                        }
                    })
                }).catch(swal.noop)
            }
            if (condition_text == 'Cancel') {
                var temp =
                `<div class="sec_liv_book"><p class="e_f t_r">Are you sure you want to cancel session?</p></div>`;
                swal({
                    html: temp,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    showLoaderOnConfirm: true,
                    allowOutsideClick: false
                }).then(function(email) {
                    $.ajax({
                        url: 'cancel_user_live_session',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'sess_id': sess_id_create
                        },
                        type: 'post',
                        success: function(response) {
                            //window.location.href='/';
                            if (response == '1') {
                                // toastr.success('Session cancelled successfully');
                                let success_temp =
                                    `<div class="sec_liv_book"><p class="e_f t_r">Session cancelled successfully</p></div>`;
                                swal({
                                    html: success_temp,
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                }).then(function(email) {
                                    window.location.href = '/';
                                }).catch(swal.noop)
                            } else {
                                swal({
                                    title: 'Internal Error',
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                }).then(function(email) {}).catch(swal.noop)
                            }
                        }
                    })
                }).catch(swal.noop)
            }
            if (condition_text == 'Join Now') {
                var join_html = `<div class="header_book_live" style="text-align:center;">
                <p class="common_book_p p_head m-lb">${rename_sess}</p>
                <p class="common_book_p p_sub_head">Have a great session!</p>
            </div>
            <div class="sec_liv_book">
                <p class="e_f">Before joining the session please check the following</p>
                <ul class="list_si" style="list-style: auto;">
                    <li>Keep a water bottle ready.</li>
                    <li>The video should always be turned on so your form  can be corrected.</li>
                    <li>Mute the audio during the workout so the trainer's instructions can be clear.</li>
                    <li>Please join the class on time.</li>
                </ul>
            </div>`;
                swal({
                    html: join_html,
                    showCancelButton: false,
                    confirmButtonText: 'Join Now',
                    showLoaderOnConfirm: false,
                    allowOutsideClick: false
                }).then(function(email) {
                    $.ajax({
                        url: 'join_session',
                        type: 'post',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'sess_id': sess_id_create
                        },
                        global: true,
                        async: false,
                        success: function(response) {
                            var j_url = $(id).attr('data-url');
                            // var r=`<div onclick="session_end(${sess_id_create})" class="overlay_close" >X</div><div class="iframe-container" >
                        //     <iframe allow="microphone; camera" style="border: 0; height: 100vh; left: 0; position: relative; top: -30px; width: 100%;" src="${j_url}" frameborder="0"></iframe>
                        // </div>`;
                            // $('.overlay').html(r);
                            // $(".overlay").fadeToggle(200);
                            // window.open(
                            //     j_url,
                            //     '_blank' // <- This is what makes it open in a new window.
                            //     );
                            localStorage.setItem("feedback_id", sess_id_create);
                            window.location.assign(j_url)
                            setInterval(function() {
                                $.ajax({
                                    url: 'feedback_update_live_sess',
                                    type: 'post',
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        'sess_id': sess_id_create
                                    },
                                    global: true,
                                    async: false,
                                    success: function(response) {
                                        // $(".overlay").html(' ');
                                        // $(".overlay").fadeToggle(200);
                                        // $(".button a").toggleClass('btn-open').toggleClass('btn-close');
                                        // open = false;
                                        $('#f_s_id').attr('value', sess_id_create)
                                        $('#feedback_modal').modal({
                                            backdrop: 'static',
                                            keyboard: false // to prevent closing with Esc button (if you want this too)
                                        })
                                    }
                                })
                            }, 2700000);
                            // $('.overlay_close').on('click', function(){
                            // });
                        }
                    })
                }).catch(swal.noop)
            }
        }
        var feedback_pop = localStorage.getItem("feedback_id");
        if (feedback_pop) {
            setTimeout(session_end(feedback_pop), 60000);
        }

        function session_end(sess_id_create) {
            $('#dynamic_rate').html('');
            $.ajax({
                url: 'feedback_update_live_sess',
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'sess_id': sess_id_create
                },
                global: true,
                async: false,
                success: function(response) {
                    // $(".overlay").html(' ');
                    // $(".overlay").fadeToggle(200);
                    // $(".button a").toggleClass('btn-open').toggleClass('btn-close');
                    // open = false;
                    $('#dynamic_rate').html(response);
                    $('#f_s_id').attr('value', sess_id_create)
                    $('#feedback_modal').modal({
                        backdrop: 'static',
                        keyboard: false // to prevent closing with Esc button (if you want this too)
                    })
                }
            })
        }

        function copy(that) {
            var inp = document.createElement('input');
            document.body.appendChild(inp)
            inp.value = $(that).data('code')
            inp.select();
            document.execCommand('copy', false);
            inp.remove();
            $('.message_copied').toggleClass('message_copied_show');
            navigator.vibrate(500);
            setTimeout(function() {
                $('.message_copied').toggleClass('message_copied_show');
                $('#referal_modal').modal('toggle');
                toastr.success('Referal code copied')
            }, 1200);
        }

        function r_pop_close() {
            navigator.vibrate(500)
            $('#referal_modal').modal('toggle');
        }

        function vibrate_fun() {
            navigator.vibrate(200);
        }

        function today_live_session_check() {
            var total_l_s_today = $('.today_date');
            for (var i = 0; i < total_l_s_today.length; i++) {
                var time_sess = $(total_l_s_today[i]).attr('data-time');
                var booked_status = $(total_l_s_today[i]).attr('data-booked');
                var sess_check = clockcheck(time_sess, total_l_s_today[i], booked_status);
                console.log(booked_status)
            }
        }

        function clockcheck(d, f, g) {
            setInterval(clockUpdate, 1000, d, f, g);
        }

        function clockUpdate(d, f, booked_status) {
            var date = new Date();
            date = new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {
                timeZone: '<?php echo isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata'; ?>'
            }));
            // $('.digital-clock').css({'color': '#fff', 'text-shadow': '0 0 6px #ff0'});
            function addZero(x) {
                if (x < 10) {
                    return x = '0' + x;
                } else {
                    return x;
                }
            }

            function twelveHour(x) {
                if (x > 12) {
                    return x = x - 12;
                } else if (x == 0) {
                    return x = 12;
                } else {
                    return x;
                }
            }
            var h = addZero(date.getHours());
            var m = addZero(date.getMinutes());
            var s = addZero(date.getSeconds());
            var modify_date = new Date(d);
            //modify_date=new Date((typeof date === "string" ? new Date(modify_date) : modify_date).toLocaleString("en-US", {timeZone: '<?php echo isset($_COOKIE['user_time_zone']) ? $_COOKIE['user_time_zone'] : 'Asia/Kolkata'; ?>'}));
            var today_date = date.getTime() / 1000
            var modify_date_string = modify_date.getTime() / 1000
            var h_modify = addZero(modify_date.getHours());
            var m_modify = addZero(modify_date.getMinutes());
            if ((modify_date_string + 3600) < today_date) {
                // $(f).attr('disabled','disabled');
                if ($(f).attr('data-is_join') == 'True') {
                    $(f).html('Completed'); //Completed
                    $(f).removeClass('bks_c');
                    $(f).addClass('disable_bks_c');
                } else if ($(f).attr('data-is_join') == 'False') {
                    $(f).html('Missed');
                    $(f).removeClass('bks_c');
                    $(f).addClass('disable_bks_c');
                    $(f).css('color', '#878484');
                    $(f).css('background', 'transparent');
                    $(f).parent('div').parent('div').parent('div').css('background', '#f0f0f0');
                    $(f).parent('div').parent('div').parent('div').css('color', '#878484');
                } else {
                    $(f).html('Expired');
                    $(f).css('color', '#878484');
                    $(f).css('background', 'transparent');
                    $(f).parent('div').parent('div').parent('div').css('background', '#f0f0f0');
                    $(f).parent('div').parent('div').parent('div').css('color', '#878484');
                    $(f).parent('div').parent('div').parent('div').addClass('remove_liv')
                    var index_liv_carousel = $('.live_sess_block_new.slick-slide.slick-active').attr('data-slick-index');
                    if ($('.live_sess_block_new').hasClass('remove_liv')) {
                        $('.live_sessoin_carousel').slick('slickRemove', 0);
                    }
                    if ($('.live_sessoin_carousel .live_sess_block_new').length == 0) {
                        $('.new_live_sess_hide').css('display', 'none')
                    }
                    // if(index_liv_carousel)
                    //     $('.live_sessoin_carousel').slick('slickRemove', 0);
                    //  $('.live_sessoin_carousel').slick('slickRemove', index_liv_carousel);
                    // $('.live_sessoin_carousel').slick('refresh');
                    // $('.live_sessoin_carousel').slick({
                    //     arrows: false,
                    //     centerPadding: "0px",
                    //     dots: true,
                    //     slidesToShow: 2,
                    //     infinite: false
                    // });
                }
            }
            if ((modify_date_string + 3600) > today_date && modify_date_string < today_date) {
                //$(f).attr('disabled','disabled');
                // $(f).css('color','#000');
                // $(f).html('Ongoing');//
                // $(f).css('background','transparent');
                // $(f).parent('div').parent('div').parent('div').css('background','#f0f0f0');
                // $(f).parent('div').parent('div').parent('div').css('color','#878484');
                if (booked_status == 'true') {
                    // $(f).addClass('ripple');
                    $(f).css('background', 'green');
                    $(f).css('color', '#fff');
                    $(f).html('Join Now');
                } else {
                    $(f).html('Ongoing');
                    $(f).css('background', 'transparent');
                    $(f).css('color', '#000');
                    $(f).parent('div').parent('div').parent('div').css('background', '#f0f0f0');
                    $(f).parent('div').parent('div').parent('div').css('color', '#878484');
                }
                // $(f).addClass('ripple');
                // $(f).css('background','green');
                // $(f).html('Join Now');
                // $(f).css('background','gray');
            }
            if ((modify_date_string - 300) < today_date && (modify_date_string + 600) > today_date) {
                if (booked_status == 'true') {
                    // $(f).addClass('ripple');
                    $(f).css('background', 'green');
                    $(f).css('color', '#fff');
                    $(f).html('Join Now');
                } else {
                    if (modify_date_string >= today_date) {
                        // $(f).attr('disabled','disabled');
                        // $(f).parent('div').parent('div').parent('div').css('background','#f0f0f0');
                        // $(f).parent('div').parent('div').parent('div').css('color','#878484');
                        $(f).html('Book Now');
                        // $(f).css('background','transparent');
                        $(f).css('background', '#187fde');
                        $(f).css('color', '#fff');
                    }
                }
            }
        }

        function session_name_change(sess_name) {
            var rename_sess = '';
            switch (sess_name) {
                case 'HIIT':
                    rename_sess = 'HIIT';
                    break;
                case 'SNC':
                    rename_sess = 'DB SNC';
                    break;
                case 'Yoga':
                    rename_sess = 'Power Yoga';
                    break;
                case 'Dance':
                    rename_sess = 'Dance Fitness';
                    break;
            }
            return rename_sess;
        }
        $('.notif_filter').on('click', function() {
            $('.notif_filter').removeClass('active_filter');
            $(this).addClass('active_filter');
            var filter_type = $(this).attr('data-value');
            if (filter_type.length > 1) {
                //console.log($('.live_sess_block').parent())
                if ($('#' + $('.zoom_live_view.active').attr('data-id') + ' .img_est').length != 0)
                    $('#' + $('.zoom_live_view.active').attr('data-id') + ' .img_est').remove()
                $('#' + $('.zoom_live_view.active').attr('data-id') + ' .live_sess_block:not(.filter_' +
                    filter_type + ')').css('display', 'none');
                $('#' + $('.zoom_live_view.active').attr('data-id') + ' .filter_' + filter_type).css('display',
                    'block');
                if ($('#' + $('.zoom_live_view.active').attr('data-id') + ' .filter_' + filter_type).length == 0) {
                    $('#' + $('.zoom_live_view.active').attr('data-id')).append(
                        '<div class="img_est"><p class="err_txt err_txt_style">' + session_name_change(
                            filter_type) + '</p><img class="img-responsive error_img" src="fitness/images/' +
                        filter_type +
                        '.png"><p class="err_txt">Uh oh, session unavailable. Let\'s try another one?</p></div>'
                        );
                } else {
                    $('#' + $('.zoom_live_view.active').attr('data-id') + ' .img_est').remove()
                }
            } else {
                $('#' + $('.zoom_live_view.active').attr('data-id') + ' .live_sess_block').css('display', 'block');
                if ($('#' + $('.zoom_live_view.active').attr('data-id') + ' .img_est').length != 0)
                    $('#' + $('.zoom_live_view.active').attr('data-id') + ' .img_est').remove()
            }
            $('.filter_bottom').toggleClass('open');
            // $('.live_sess_block').attr('data-session')
        })
        $('.inside_date').on('click', function() {
            $('.inside_date').removeClass('active');
            $('.n_d').removeClass('active');
            $('.zoom_live_view').removeClass('active');
            $(this).addClass('active');
            $('.inside_date.active div').first().addClass('active')
            $('.inside_date.active div').last().addClass('active')
            var id = $(this).attr('data-id');
            console.log('#liv_' + id)
            $('.ned').css('display', 'none');
            $('#' + id).css('display', 'block');
        })
        $('.filter_live').on('click', function() {
            $('.filter_bottom').toggleClass('open');
        })
        $('.filter_live_close').on('click', function() {
            $('.filter_bottom').toggleClass('open');
        })
        $().ready(function() {
            $('.slick-carousel').slick({
                arrows: false,
                centerPadding: "0px",
                dots: true,
                slidesToShow: 1,
                infinite: false
            });
            $('.live_sessoin_carousel').slick({
                arrows: false,
                centerPadding: "0px",
                dots: true,
                slidesToShow: 2,
                infinite: false
            });
            $('.upcoming_pause_carousel').slick({
                arrows: true,
                centerPadding: "0px",
                dots: false,
                slidesToShow: 1,
                infinite: false
            });
            $('.package_carousel').slick({
                arrows: false,
                centerPadding: "0px",
                dots: true,
                slidesToShow: 2,
                infinite: false
            });
        });
    </script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript">
        $('.popup-youtube, .popup-text').magnificPopup({
            disableOn: 320,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: true
        });
    </script>
    <script>
        if ('<?php echo $users->user_status; ?>' == '1' && '<?php echo $users->is_profile_filled; ?>' != '1') {
            $('.profile_d').css('display', 'block');
            $('#dashboard').removeClass('active');
            $('#profile_d').addClass('active');
        } else {
            if ('<?php echo $users->user_status; ?>' == '3') {
                $.ajax({
                    url: 'question_filled',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    type: 'post',
                    success: function(data) {
                        $('.main_dashboard').html(data.html);
                    }
                })
            } else {
                $('.dashboard').css('display', 'block');
            }
        }
        var country = 'India';
        var iso_data = 'in';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function pagination_formation(data_pass) {
            $('#target').jqpaginator({
                showButtons: true,
                showInput: false,
                showNumbers: true,
                numberMargin: 1,
                itemsPerPage: itemsPerPage,
                data: createData(data_pass),
                //data: dataFunc,
                render: renderer,
            })
        }
        var kc = 1;
        $('.circle_country').on('click', function() {
            if (kc > 1) {
                $('#target').jqpaginator('destroy');
            }
            country = $(this).attr('value');
            iso_data = $(this).attr('id');
            $.ajax({
                url: 'get_city',
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'country': country
                },
                success: function(data) {
                    pagination_formation(JSON.parse(data));
                    kc++;
                }
            })
        })
        /* Set the width of the side navigation to 0 */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
        $('.user_country').on('click', function() {
            $('#country_modal_city').modal();
        })
        $('.key_up_country').on('keyup', function() {
            var keyup_data = $('.key_up_country').val();
            $('.other_country').html(' ');
            if (keyup_data.length > 2) {
                $.ajax({
                    url: 'get_country',
                    type: 'post',
                    data: {
                        'key_up': keyup_data
                    },
                    success: function(data) {
                        var parsed_data = JSON.parse(data);
                        for (var i = 0; i < parsed_data.length; i++) {
                            var template = `<div class="circle_country" id="${parsed_data[i].iso2.toLowerCase()}" value="${parsed_data[i].country}">
                                            <div class="s_img_c"> <img class="circle_country_img" src="https://ipdata.co/flags/${parsed_data[i].iso2.toLowerCase()}.png"/></div>
                                            <div class="t_c"><span class="country_text">${parsed_data[i].country}</span></div>
                                        </div>`;
                            $('.other_country').append(template);
                        }
                        $('.circle_country').on('click', function() {
                            if (kc > 1) {
                                $('#target').jqpaginator('destroy');
                            }
                            country = $(this).attr('value');
                            iso_data = $(this).attr('id');
                            $.ajax({
                                url: 'get_city',
                                type: 'post',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    'country': country
                                },
                                success: function(data) {
                                    pagination_formation(JSON.parse(data));
                                    kc++;
                                }
                            })
                        })
                    }
                })
            }
        })

        function change_country_user(a, b, c) {
            $(this).addClass('border_country');
            $('#country_modal_city').modal('hide');
            a = a.split('_').join(' ');
            b = b.split('_').join(' ');
            c = c.split('_').join(' ');
            $.ajax({
                url: 'change_country',
                type: 'post',
                data: {
                    'country': a,
                    'short_country_name': b,
                    'city': c
                },
                success: function() {
                    location.reload();
                }
            })
        }
        var itemsPerPage = 40;

        function createData(data_pass) {
            var arr = [];
            var i = 0;
            while (i < data_pass.length) {
                arr.push(data_pass[i].city_ascii);
                i++;
            }
            return arr;
        }

        function dataFunc(done, page) {
            var data = [];
            while (data.length < itemsPerPage) {
                var num = Math.floor(Math.random() * 100);
                data.push(num);
            }
            var handler = function() {
                done(data, 100);
            };
            setTimeout(handler, 1000);
        }

        function renderer(data) {
            $('#main_country').empty();
            // <p>Choose your City</p>
            var formate_c = `
                        <div class="col 3c">
                        </div>
                        <div class="col 6c">
                        </div>
                        <div class="col 9c">
                        </div>
                        <div class="col 12c">
                        </div>`;
            $('#main_country').html(formate_c);
            var j = 1;
            // alert(data.length%10)
            $.each(data, function(i, v) {
                var div_c = 3 * j;
                if (i % 10 == 0 && parseInt($(".3c > p").length) >= 9) {
                    console.log(i);
                    console.log(i % 10);
                    j++;
                }
                $('.' + div_c + 'c').append("<p value='" + country + "' onclick=change_country_user(" + "'" +
                    country.split(' ').join('_') + "','" + iso_data.split(' ').join('_') + "','" + v.split(' ')
                    .join('_') + "')" + " class='city_shadow'>" + v + "</p>");
            });
        };

        function clickEvent(first, last) {
            if (first.value.length) {
                document.getElementById(last).focus();
            }
        }

        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode == 13)
                $('#first_s_login').click();
            if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 43)
                return false;
            return true;
        }
        var mobile_check = false;

        function isMobileAvail() {
            var mob = $('#telNo').val();
            if (mob.length > 10) {
                $.ajax({
                    type: "POST",
                    url: "mob_available",
                    data: {
                        'mob_no': mob
                    },
                    dataType: "text",
                    success: function(resultData) {
                        console.log(resultData)
                        if (resultData) {
                            $('#userEmail').css('display', 'none');
                        } else {
                            mobile_check = true;
                            $('#userEmail').css('display', 'block');
                        }
                    }
                });
            }
        }
        var sess_key = '';
        $(document).ready(function() {

            $('#success_modal_close').on('click', function() {
                window.location.href = '/';
            })

            $('input[name="renew_coach"]').change(function() {
                if($("input[name='renew_coach']:checked").val() == 'new') {
                    $('#sub_radio_buttons').css('display', 'block');
                } else {
                    $('#sub_radio_buttons').hide();
                }
            });

            $('#first_s_login').on('click', function() {
                var mob = $('#telNo').val();
                if (mob.length > 10) {
                    $.ajax({
                        type: "POST",
                        url: "mob_available",
                        data: {
                            'mob_no': mob
                        },
                        dataType: "text",
                        success: function(resultData) {
                            if (resultData) {
                                $.ajax({
                                    type: "POST",
                                    url: "mob_available_password_set",
                                    data: {
                                        'mob_no': mob
                                    },
                                    dataType: "text",
                                    success: function(resultData) {
                                        console.log(resultData)
                                        if (resultData) {
                                            $('.password_mod').css('display',
                                                'block');
                                            $('.first_login_mod').css('display',
                                                'none');
                                        } else {
                                            $('.second_mod').css('display',
                                            'block');
                                            $('#send_mob_otp').html($("#telNo")
                                            .val());
                                            $('.first_login_mod').css('display',
                                                'none');
                                            $('#password_mod_otp').css('display',
                                                'block');
                                            $('#otp_login').css('display', 'none');
                                            $.ajax({
                                                type: 'POST',
                                                url: 'otp',
                                                data: {
                                                    'mob_no': mob
                                                },
                                                success: function(
                                                response) {
                                                    var res = JSON
                                                        .parse(
                                                        response);
                                                    sess_key = res
                                                        .Details
                                                    toastr.success(
                                                        'OTP sent to your number'
                                                        )
                                                }
                                            })
                                        }
                                    }
                                });
                            } else {
                                $('#userEmail').css('display', 'block');
                                var email = $('#userEmail').val().length;
                                if (email < 7) {
                                    toastr.success('Please Enter Email Id')
                                    return false;
                                }
                                $.ajax({
                                    type: 'POST',
                                    url: 'otp',
                                    data: {
                                        'mob_no': mob
                                    },
                                    success: function(response) {
                                        var res = JSON.parse(response);
                                        sess_key = res.Details
                                        toastr.success('OTP sent to your number')
                                    }
                                })
                                $('.second_mod').css('display', 'block');
                                $('.first_login_mod').css('display', 'none');
                                $('#send_mob_otp').html($("#telNo").val());
                            }
                        }
                    });
                } else {
                    toastr.error('Please enter valid mobile number')
                }
            })
            $('#password_mod_otp').on('click', function() {
                var otp_code = $('#ist').val() + $('#sec').val() + $('#third').val() + $('#fourth').val() +
                    $('#fifth').val() + $('#sixth').val();
                var mob = $('#telNo').val();
                if (otp_code.length != 6) {
                    toastr.error('Please enter OTP')
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: 'login_with_otp',
                    data: {
                        'otp_v': otp_code,
                        'sess_key': sess_key,
                        'mob_num': mob
                    },
                    success: function(response) {
                        if (response) {
                            toastr.success('Successfully otp verified');
                            window.location.href = '/';
                        } else {
                            toastr.error('Wrong OTP entered')
                        }
                    }
                })
            })
            $('body').on('click', function() {
                document.getElementById("mySidenav").style.width = "0";
            })
            $('.f_p').on('click', function() {
                var mob = $('#telNo').val();
                // $.ajax({
                //         type:'POST',
                //         url:'otp',
                //         data:{'mob_no':mob},
                //         success:function(response){
                //             var res=JSON.parse(response);
                //             sess_key=res.Details
                //             toastr.success('OTP sent to your number')
                //         }
                //     })
                $('.second_mod').css('display', 'block');
                $('.first_login_mod').css('display', 'none');
                $('.password_mod').css('display', 'none');
                $('#send_mob_otp').html($("#telNo").val());
                $('#otp_login').css('display', 'none');
                $('#otp_login_forget').css('display', 'block');
                // var forget_btn=$('#otp_login').html();
                // $('.second_mod button') .remove();
                $.ajax({
                    type: 'POST',
                    url: 'otp',
                    data: {
                        'mob_no': mob
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        sess_key = res.Details
                        toastr.success('OTP sent to your number')
                    }
                })
            })
            $('#forget_password_set').on('click', function() {
                var otp_code = $('#ist').val() + $('#sec').val() + $('#third').val() + $('#fourth').val() +
                    $('#fifth').val() + $('#sixth').val();
                var mob_no = $('#telNo').val();
                var f_pwd = $('#f_n_p_o').val();
                var c_pwd = $('#f_c_p_o').val();
                if (f_pwd.length <= 8 || c_pwd.length <= 8) {
                    toastr.error('Password should be of minimum 8 characters');
                    return false;
                }
                if (f_pwd != c_pwd) {
                    toastr.error('New password and confirm password does not match');
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: 'forget_otp_verified',
                    data: {
                        'otp_v': otp_code,
                        'sess_key': sess_key,
                        'mob_num': mob_no,
                        'n_pass': f_pwd
                    },
                    success: function(response) {
                        if (response) {
                            //
                            toastr.success('Welcome')
                            location.reload();
                        } else {
                            toastr.error('Wrong OTP entered')
                        }
                    }
                })
            })
            $('#resend_otp').on('click', function() {
                var mob = $('#telNo').val();
                $('#ist').val('');
                $('#sec').val('');
                $('#third').val('');
                $('#fourth').val('');
                $('#fifth').val('');
                $('#sixth').val('');
                $.ajax({
                    type: 'POST',
                    url: 'otp',
                    data: {
                        'mob_no': mob
                    },
                    success: function(response) {
                        var res = JSON.parse(response);
                        sess_key = res.Details
                        toastr.success('OTP sent to your number')
                    }
                })
            })
            $('#otp_login').on('click', function() {
                var otp_code = $('#ist').val() + $('#sec').val() + $('#third').val() + $('#fourth').val() +
                    $('#fifth').val() + $('#sixth').val();
                var mob_no = $('#telNo').val();
                var email = $('#userEmail').val();
                $.ajax({
                    type: 'POST',
                    url: 'otp_verified',
                    data: {
                        'otp_v': otp_code,
                        'sess_key': sess_key,
                        'mob_no': mob_no,
                        'email': email
                    },
                    success: function(response) {
                        if (response) {
                            //
                            toastr.success('Welcome')
                            location.reload();
                        } else {
                            toastr.error('Wrong OTP entered')
                        }
                    }
                })
            })
            $('#otp_login_forget').on('click', function() {
                var otp_code = $('#ist').val() + $('#sec').val() + $('#third').val() + $('#fourth').val() +
                    $('#fifth').val() + $('#sixth').val();
                if (otp_code.length != 6) {
                    toastr.error('Please enter OTP')
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: 'forget_otp_verify',
                    data: {
                        'otp_v': otp_code,
                        'sess_key': sess_key
                    },
                    success: function(response) {
                        if (response) {
                            //
                            toastr.success('Successfully otp verified');
                            $('.forget_mode').css('display', 'block');
                            $('.second_mod').css('display', 'none');
                        } else {
                            toastr.error('Wrong OTP entered')
                        }
                    }
                })
            })
            $('#fcd').on('click', function() {
                $('#f_n_w').val('');
                $('#c_f_n_w').val('');
            })
            $('#forget_continue').on('click', function() {
                var f_pwd = $('#f_n_w').val();
                var c_pwd = $('#c_f_n_w').val();
                if (f_pwd.length < 8 || c_pwd.length < 8) {
                    toastr.error('Password should be of minimum 8 characters');
                    return false;
                }
                if (f_pwd != c_pwd) {
                    toastr.error('New password and confirm password does not match');
                    return false;
                }
                $.ajax({
                    url: 'change_paswwd',
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "password": f_pwd
                    },
                    global: true,
                    async: false,
                    success: function(response) {
                        toastr.success('Successfully');
                        $('#f_n_w').val('');
                        $('#c_f_n_w').val('');
                        $('#forget-password').modal('toggle')
                    }
                })
            })
            $('.nav-item').on('click', function() {
                //vibrate_fun()
                var img_name = $('.nav-item.active').attr('data-img');
                var new_img_name = $(this).attr('data-img');
                var img_url = 'insta_img/dashboard_black/' + img_name + '_black.png';
                var new_img_url = 'insta_img/dashboard_white/' + new_img_name + '_white.png';
                $('.nav-item.active a .icon img').attr('src', img_url);
                $('.nav-item').removeClass('active')
                $(this).addClass('active')
                $('.nav-item.active a .icon img').attr('src', new_img_url);
                var id = $(this).attr('id');
                $('.p_d').css('display', 'none');
                $('.' + id).css('display', 'block');
                document.getElementById("mySidenav").style.width = "0";
                localStorage.setItem("reload_window", id);
                if (id == 'live_session' || id == 'dashboard') {
                    today_live_session_check()
                }
            })

            $('#otp_login_with_pwd').on('click', function() {
                var mob_no = $('#telNo').val();
                var pass = $('#mob_password').val();
                $.ajax({
                    url: 'login_other',
                    type: 'post',
                    data: {
                        'mob_num': mob_no,
                        'pass': pass
                    },
                    success: function(response) {
                        if (response)
                            location.reload();
                        else
                            toastr.error('Invalid Mobile number / Password')
                    }
                })
            })
            $('#mob_password').on('keyup', function() {
                if ($('#mob_password').val().length > 0)
                    $('#show_pwd').css('visibility', 'unset')
                else
                    $('#show_pwd').css('visibility', 'hidden')
            })
            $('#show_pwd').on('click', function() {
                if ($('#show_pwd').hasClass('fa-eye')) {
                    $('#show_pwd').removeClass('fa-eye')
                    $('#show_pwd').addClass('fa-eye-slash')
                    $('#mob_password').attr('type', 'text')
                } else if ($('#show_pwd').hasClass('fa-eye-slash')) {
                    $('#show_pwd').removeClass('fa-eye-slash')
                    $('#show_pwd').addClass('fa-eye')
                    $('#mob_password').attr('type', 'password')
                }
            })
            //razorpay and localstorage implementation
            $('.pay__').click(function(e) {
                e.preventDefault();
                var $this = $(this);
                var data_pay = {
                    "plan": $(this).data('plan'),
                    "currency": '<?php echo strtoupper($currency); ?>',
                    "price": $(this).data('price'),
                    "description": $(this).data('description'),
                    "count": $(this).data('count'),
                    "plan_id": $(this).data('pid')
                };
                localStorage.setItem("user_plan_pay", JSON.stringify(data_pay))
                if ('<?php echo $users->user_status; ?>' == '11')
                    setCookie('is_renewal', 1, 1);
                location.reload();
                // window.location.reload();
                // $('#u_login').click();
            });

            // to check if user is plus or into premium setting this cookies
            // using cookie here because we can access it from both client & server side as local storage variables are only accessible from client side.
            $('.is_plus').on('click', function() {
                removeCookie('user_assigns_coach');
                setCookie('admin_assigns_coach', true, 1);
                // If user try to purchase the plus plan after checking any premium coach plan then remove these items which sets while checking premium plan
                localStorage.removeItem('team_name');
                localStorage.removeItem('coach_name');
                localStorage.removeItem('coach_det_id');
                localStorage.removeItem('from_coach_profile');
            });

            $('.is_premium').on('click', function() {
                removeCookie('admin_assigns_coach');
                setCookie('user_assigns_coach', true, 1);
            });

            $('#referal_menu').on('click', function() {
                $('#referal_modal').modal({
                    backdrop: 'static',
                    keyboard: false // to prevent closing with Esc button (if you want this too)
                });
            });
            //    $('.close-pouch').on('click',function(){
            //         $('.pouch-main-container').css('display','none');
            //    })
            $('#profile_dob').on('change', function() {
                var dob = new Date($('#profile_dob').val());
                var today = new Date();
                var user_age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
                if (user_age < 18) {
                    let success_temp =
                        `<div class="sec_liv_book"><p class="e_f t_r">This is to confirm that you have obtained the consent of your legal guardian or parents for the usage of our services.</p></div>`;
                    swal({
                        html: success_temp,
                        showCancelButton: false,
                        confirmButtonText: 'Ok',
                        showLoaderOnConfirm: true,
                        allowOutsideClick: false
                    }).then(function(email) {
                        document.querySelectorAll('.error_p').forEach(e => e.remove());
                    }).catch(swal.noop)
                }
            })
            $('#save_user').on('click', function() {
                if ($('#full_name').val().length < 3) {
                    toastr.error('Please enter full name');
                    $('#full_name').after('<span class="error_p">Enter your full name</span>')
                    $('#full_name').addClass('error_border');
                    return false;
                } else {
                    $('#full_name').removeClass('error_border');
                    document.querySelectorAll('.error_p').forEach(e => e.remove());
                }
                if ($('#telNo').val().length < 9) {
                    toastr.error('Please enter Mobile number');
                    $('#telNo').after('<span class="error_p">Enter mobile number</span>')
                    $('#telNo').addClass('error_border');
                    return false;
                } else {
                    $('#telNo').removeClass('error_border');
                    document.querySelectorAll('.error_p').forEach(e => e.remove());
                }
                if ($('#password').val() != $('#repassword').val()) {
                    toastr.error('Confirm password does not match with password');
                    $('#repassword').addClass('error_border');
                    $('#password').addClass('error_border');
                    return false;
                } else {
                    $('#repassword').removeClass('error_border');
                    $('#password').removeClass('error_border');
                }
                if ($('#password').val().length < 7 && $('#repassword').val().length < 7) {
                    toastr.error('Password should be of minimum 8 characters');
                    $('#repassword').addClass('error_border');
                    $('#password').addClass('error_border');
                    return false;
                } else {
                    $('#repassword').removeClass('error_border');
                    $('#password').removeClass('error_border');
                }
                if ($('#profile_gender').val() == null) {
                    toastr.error('Please choose your gender');
                    $('#profile_gender').after('<span class="error_p">Select gender</span>')
                    $('#profile_gender').addClass('error_border');
                    return false;
                } else {
                    $('#profile_gender').removeClass('error_border');
                    document.querySelectorAll('.error_p').forEach(e => e.remove());
                }
                if ($('#profile_height').val().length < 1) {
                    toastr.error('Please enter your height');
                    $('#profile_height').after('<span class="error_p">Enter height in cms</span>')
                    $('#profile_height').addClass('error_border');
                    return false;
                } else {
                    $('#profile_height').removeClass('error_border');
                    document.querySelectorAll('.error_p').forEach(e => e.remove());
                }
                if ($('#profile_weight').val().length < 1) {
                    toastr.error('Please enter your weight');
                    $('#profile_weight').after('<span class="error_p">Enter weight in kgs</span>')
                    $('#profile_weight').addClass('error_border');
                    return false;
                } else {
                    $('#profile_weight').removeClass('error_border');
                    document.querySelectorAll('.error_p').forEach(e => e.remove());
                }
                if ($('#profile_dob').val().length < 1) {
                    toastr.error('Please enter your date of birth');
                    $('#profile_dob').after('<span class="error_p">Enter date of birth</span>')
                    $('#profile_dob').addClass('error_border');
                    return false;
                } else {
                    $('#profile_dob').removeClass('error_border');
                    document.querySelectorAll('.error_p').forEach(e => e.remove());
                }

                var dialCode = $("#telNo").intlTelInput("getSelectedCountryData").dialCode;
                var telNo    = $('#telNo').val();

                if(telNo[0] === '0') {
                    telNo = telNo.substring(1);
                }

                var mob = '+'+ dialCode + telNo;
                let data = {
                    'email': $('#email').val(),
                    'name': $('#full_name').val(),
                    'mob_no': mob,
                    'password': $('#password').val(),
                    'street': $('#profile_street').val(),
                    'pincode': $('#profile_pincode').val(),
                    'city': $('#city').val(),
                    'state': $('#profile_state').val(),
                    'country': $('#country').val(),
                    'gender': $('#profile_gender').val(),
                    'height': $('#profile_height').val(),
                    'weight': $('#profile_weight').val(),
                    'dob': $('#profile_dob').val(),
                    'is_profile_filled': 1,
                    'short_country_name': $('#s_c_name').val(),
                }
                if ($('#telNo').is(':disabled'))
                    delete data['mob_no'];
                if ($('#password').is(':disabled'))
                    delete data['password'];
                if ($('#telNo').is(':disabled')) {
                    $.ajax({
                        type: 'post',
                        data: data,
                        url: '/saveUser',
                        success: function(response) {
                            toastr.success('Details Saved!');
                            $('#dashboard').click();
                            location.reload();
                        },
                    })
                } else {
                    $.ajax({
                        type: 'post',
                        data: {
                            'mob_no': $('#telNo').val()
                        },
                        url: '/mob_available',
                        success: function(response) {
                            if (!response) {
                                $.ajax({
                                    type: 'post',
                                    data: data,
                                    url: '/saveUser',
                                    success: function(response) {
                                        toastr.success('Details Saved!');
                                        location.reload();
                                        $('#dashboard').click();
                                    },
                                })
                            } else {
                                toastr.error('Mobile number already exist please enter different number');
                            }
                        },
                    })
                }
            });



            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }

            function flagButtonValue() {
                var countryData = $("#telNo").intlTelInput("getSelectedCountryData").dialCode; // get country code
                telNumber = "+" + countryData + $("#telNo")
            .val(); //Whole phone number (with Country code and value of input)
                $("#telNo").val(telNumber);
            }
            $(".country").on('click', function() {
                $("#telNo").val('');
                flagButtonValue();
            })
            $("#telNo").intlTelInput({
                separateDialCode: true,
                initialCountry: "auto", //Function to put as default country the country where the IP is located
                geoIpLookup: function(callback) {
                    var countryCode = '<?php echo isset($_COOKIE['s_c_nane']) ? $_COOKIE['s_c_nane'] : 'in'; ?>';
                    callback(countryCode);
                },
            })
        });

        $('#save_gst_details').on('click', function() {

                console.log('Inside Save GST Details Event');

                var name    = $('#full_name_gst').val();
                var mob_no  = $('#telNo').val();
                var street  = $('#street').val();
                var pincode = $('#pincode').val();
                var city    = $('#user_city').val();
                var state   = $('#state').val();
                var country = $('#country-list').val();

                let data = {
                    'name'      : name,
                  //'mob_no'    : mob_no,  do not update for now
                    'street'    : street,
                    'pincode'   : pincode,
                    'city'      : city,
                    'state'     : state,
                    'country'   : country
                }

                if( name != '' && street != '' && pincode != '' && city != '' && state != '' && country != '' ) {
                    console.log(data);
                    if ($('#telNo').is(':disabled')) {
                        console.log('Inside Save GST Details Ajax');
                        $.ajax({
                            type: 'POST',
                            data: data,
                            url: '/saveGstDetails',
                            success: function(response) {
                                toastr.success('Billing Address Details Saved!');
                                // Payment Processing from here
                                proceed_payment();
                            },
                        });
                    } else {
                        $.ajax({
                            type: 'POST',
                            data: {'mob_no': $('#telNo').val()},
                            url: '/mob_available',
                            success: function(response) {
                                if (!response) {
                                    $.ajax({
                                        type: 'POST',
                                        data: data,
                                        url: '/saveGstDetails',
                                        success: function(response) {
                                            toastr.success('Billing Address Details Saved!');
                                            // Payment Processing from here
                                            proceed_payment();
                                        },
                                    })
                                } else {
                                    toastr.error('Mobile number already exist! Please try different number.');
                                }
                            },

                        });
                    }

                } else {

                    console.log("GST Form input field required!")

                    if (name == '') {
                        toastr.error('Please Enter Full Name');
                    }
                    else if(mob_no.length < 9) {
                        toastr.error('Please Enter Mobile Number');
                    }
                    else if(street == '') {
                        toastr.error('Please Enter Flat/Street');
                    }
                    else if(pincode == '') {
                        toastr.error('Please Enter Pincode');
                    }
                    else if(city == '') {
                        toastr.error('Please Enter City');
                    }
                    else if(state == '') {
                        toastr.error('Please Select State');
                    }
                    else if(country == '') {
                        toastr.error('Please Select Country');
                    }

                }
        });

        function proceed_payment() {

            $('#new_refer_pop_up').modal('hide');
            var user_status = '<?php echo $users->user_status; ?>';
            var coach_det_id = localStorage.getItem('coach_det_id') ? localStorage.getItem('coach_det_id') : null;
            if (data_pay_retrive) {
                $('.free_trial').css('display', 'none');
                if (data_pay_retrive.plan == 0) {
                    console.log('Inside data_pay_retrive');
                    $.ajax({
                        type: 'GET',
                        global: true,
                        async: false,
                        url: '/ajax/generateOrder?currency=' + data_pay_retrive.currency + '&amount=' + parseFloat(data_pay_retrive.price) * parseFloat(100),
                        success: function(data) {
                            console.log("Inside Ajax of generate order" + data)
                            var amount = parseFloat(data.data.amount) / parseFloat(100);
                            var options = {
                                "key": "rzp_test_z0o2WJAmSQOwLW",
                                "order_id": data.data.id,
                                "name": "Liv Ezy",
                                "currency": '<?php echo strtoupper($currency); ?>',
                                "description": data_pay_retrive.description,
                                "prefill": {
                                    "email": "<?php echo Session::get('email'); ?>",
                                    "contact": "<?php echo Session::get('mob_no'); ?>",
                                },
                                "image": "fitness/images/png2.png",
                                "notes": {
                                    "country": '<?php echo isset($users->country) ? $users->country : 'NA'; ?>',
                                    "state": '<?php echo isset($users->state) ? $users->state : 'NA'; ?>',
                                    "fromOrderApi": "YES"
                                },
                                "handler": function(response) {
                                    console.log(response, 'Inside the handler');
                                    $.ajax({
                                        type: 'GET',
                                        global: true,
                                        async: false,
                                        data: response,
                                        url: '/ajax/verifyOrder',
                                        success: function(response1) {
                                            console.log(response1, 'from handler');
                                            $.ajax({
                                                type: 'GET',
                                                global: true,
                                                async: false,
                                                url: '/sendInvoice?desc=' + data_pay_retrive.description + '&member_plan_id=' + data_pay_retrive.plan_id + '&plan_id=' + response1.data + '&coach_det_id=' + coach_det_id,
                                                success: function(data1) {
                                                    console.log("Inside send invoice & success");
                                                    if(user_status == 1 || user_status == 11)
                                                    {
                                                        assign_this_coach();
                                                    }
                                                    $('#packageModal').modal('hide');
                                                },
                                            });
                                            $('.ref_no').html(response1.data);
                                            $('.res_amt').html('<strong><?php echo $currency_icon; ?></strong>' + data_pay_retrive.price + '/-')
                                            $('.res_amt').show();
                                            $('#success_modal').modal({
                                                backdrop: 'static',
                                                keyboard: false
                                            });
                                            localStorage.removeItem('user_plan_pay');
                                            var r_code = $('#referal_code_new').val();
                                            if(r_code !== null) {
                                                $.ajax({
                                                    type: 'post',
                                                    data: { 'r_code': r_code },
                                                    url: '/referal_code_apply',
                                                    success: function(response) {

                                                    }
                                                });
                                            }
                                        },
                                    });
                                },
                                "modal": {
                                    "ondismiss": function() {
                                        localStorage.removeItem('user_plan_pay');
                                    }
                                },
                                "theme": {
                                    "color": "#10edeb"
                                }
                            };
                            var rzp1 = new Razorpay(options);
                            rzp1.on('payment.failed', function(response) {
                                if (response.error) {
                                    $.ajax({
                                        type: 'GET',
                                        global: true,
                                        async: false,
                                        url: '/sendNotification',
                                        success: function(data) {
                                            console.log('Payment failed due to some reason.');
                                        },
                                    });
                                }
                            });
                            rzp1.open();
                        },
                    });
                }
            }
        }

        $(document).ready(function() {

            var user_status = '<?php echo $users->user_status; ?>';
            var team        = '<?php echo $users->team; ?>';
            var head_coach  = '<?php echo $users->head_coach; ?>';

            // Setting prev coach details
            if(team !== null && head_coach !== null ) {

                var previous_coach_det_id = '<?php if(isset($coachDetail)) { echo $coachDetail->id; }?>';
                var previous_coach_slots  = '<?php if(isset($coachDetail)) { echo $coachDetail->slots; } ?>';

                // set the item in localStorage to check condition for same coach & discount
                localStorage.setItem('previous_team_name', team);
                localStorage.setItem('previous_coach_name', head_coach);
                localStorage.setItem('previous_coach_det_id', previous_coach_det_id);
                localStorage.setItem('previous_coach_slots', previous_coach_slots);

            }

            // Validation - if existing plan user buys new plan then alerts & aborts txn
            // var user_plan_pay = JSON.parse(localStorage.getItem("user_plan_pay"));
            // var admin_assign_coach = '<?php //echo $users->admin_assign_coach ?>';

            // if( admin_assign_coach == 0) {

            //     if(user_plan_pay != null && (user_status > '1' && user_status < '11')) {

            //         console.log("INSIDE VALIDATION OF EXISTING MEMBER BUYS NEW PLAN");
            //         $('.razorpay-container').hide();
            //         $('#plan-exist-alert').modal('show');
            //         $('body').css('overflow-y','auto');
            //         localStorage.removeItem('user_plan_pay');
            //     }
            // }

            // Redirecting free user to LivEzy Plus tab
            if( user_status == 1) {
                $('#package_bought').click();
            } else {
                console.log($('#dashboard'));
                $('#dashboard').click();
            }

            var user_id    = '<?php echo $users->id; ?>';
            var is_admin_assign_coach = getCookie('admin_assigns_coach');
            // Checks for Team & Coach null as it will be after purchase of plan then only it updates 1
            if(is_admin_assign_coach && (team == '' && head_coach == '')) {

                console.log('admin assign coach is true');
                // admin_assign_coach(user_id,1);

            }

            var is_user_assign_coach = getCookie('user_assigns_coach');
            if(is_user_assign_coach) {

                console.log('admin assign coach is false');
                // admin_assign_coach(user_id,0);

            }

            var whatsapp_no = <?php echo config('app.contact_whatsapp'); ?>; //Support number after purchase
            var vibrate = navigator.vibrate || navigator.mozVibrate;

            $('.login-text').on('click', function() {
                $('.sign-up-form').css('display', 'block');
            })

            // if('{{ $users->user_status }}'=='8'){
            if (user_status > '1' && user_status <= '8') {
                // var whatsapp_no=<?php // echo $whatsapp_no?$whatsapp_no:'+919663488580';
                ?>;

                var user_msg = '<?php echo $users->head_coach ? 'Hi ' . $users->head_coach . ' ' : 'Hi Coach'; ?>';
                $('.whats-app-div').on('click', function() {
                    window.open('https://api.whatsapp.com/send/?phone=+' + whatsapp_no + '&text=' +
                        user_msg + '&app_absent=0', '_blank')
                })
            }
            if (user_status == '1') {
                $('.whats-app-div').on('click', function() {
                    window.open('https://api.whatsapp.com/send/?phone=+' + whatsapp_no +
                        '&text=Hey%2C+I+would+like+to+know+more+about+the+online+fitness+coaching&app_absent=0',
                        '_blank')
                })
            }
            $('.close_sign_up').on('click', function() {
                $('.sign-up-form').css('display', 'none');
            })
            $('.contact-whatsapp').on('click', function() {
                window.open(
                    'https://api.whatsapp.com/send/?phone=+919916127422&text=Hi+Liv%20+Ezy&app_absent=0',
                    '_blank')
            })
            $('.facebook-login').on('click', function() {
                window.location.href = '/login/facebook';
            })
            $('.google-login').on('click', function() {
                window.location.href = '/login/google';
            })
            $('#logout1, #logout2').on('click', function() {
                localStorage.removeItem('pop_up');
                vibrate_fun();
                $.ajax({
                    url: 'logout',
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    global: true,
                    async: false,
                    success: function(response) {
                        if (response.success) {
                            // perform any necessary actions, such as redirecting to the home page
                            window.location.href = '/';
                        } else {
                            // handle any errors
                            console.log('Logout failed!');
                        }
                    },
                    error: function(xhr, status, error) {
                        // handle any errors
                        console.log('Logout error: ' + error);
                    }
                });
            })
            today_live_session_check()
            if ('<?php echo str_replace("'", '', $users->name); ?>') {
                var now = new Date();
                var hrs = now.getHours();
                var msg = "";
                if (hrs > 0) msg = "Morning' Sunshine!"; // REALLY early
                if (hrs > 6) msg = "Good Morning"; // After 6am
                if (hrs >= 12) msg = "Good Afternoon"; // After 12pm
                if (hrs > 17) msg = "Good Evening"; // After 5pm
                if (hrs > 22) msg = "Go to Bed!"; // After 10pm
                $('#greeting_msg').text(msg + ' <?php echo str_replace("'", '', $users->name); ?>');
                if ('<?php echo $future_question; ?>' == '1') {
                    $('#greeting_msg_2').text('Your onboarding process will start by <?php echo $users->questionaire_start_date ? date('l, dS M Y', strtotime($users->questionaire_start_date . ' - 4 days')) : ''; ?> ')
                } else {
                    $('#greeting_msg_2').text('Lets start your fitness journey!');
                }
            }
        });
    </script>
    <?php // echo '<pre>'; print_r($users);
    ?>
    <script>
        $('.emotion-style-element_custom').on('click', function() {
            $('.emotion-style-element_custom').removeClass('active_emoji')
            $(this).addClass('active_emoji')
        })
        if ('<?php echo $users->intro_call; ?>' == '0' && '<?php echo $users->user_status; ?>' == '8' && '<?php echo $users->member_type; ?>' != 'Live Session') {
            $('#intro_call_modal').modal({
                backdrop: 'static',
                keyboard: false // to prevent closing with Esc button (if you want this too)
            })
            $('#intro_call_modal').modal('toggle');
            $('#i_submit').on('click', function() {
                var rating_emoji_intro = $('.emotion-style-element_custom.active_emoji').val()
                if (rating_emoji_intro == undefined) {
                    toastr.error('Please Select Emoji');
                    return false;
                }
                var feedback_comment = $('.intro_call_comment').val()
                let f_data = {
                    'star': rating_emoji_intro,
                    'comment': feedback_comment
                }
                $.ajax({
                    type: 'post',
                    data: f_data,
                    url: '/feedback_insert_intro',
                    success: function(response) {
                        toastr.success('Feedback is submitted');
                        $('#intro_call_modal').modal('toggle');
                    }
                })
            })
        }
        window.p_mob = false;
        window.p_email = false;
        if ('<?php echo $users->partner_detailed_filed; ?>' == 0 &&
            '<?php echo $users->member_type; ?>' == 'Buddy' &&
            '<?php echo $users->referal_action; ?>' == 0) {

            $('#telNo_partner').val('+91');
            $('#partner_modal').modal({
                backdrop: 'static',
                keyboard: false // to prevent closing with Esc button (if you want this too)
            })
            $('#partner_modal').modal('show');

            $('.partner_submit').on('click', function() {

                if ($("input[name='renew_plan_buddy']:checked").val() == 'existing') {
                    let partner_data = {
                        "full_name": '',
                        "mob_no": '',
                        "email": '',
                        "gender": '',
                        "existing": 1
                    }
                    partner_data_submit(partner_data);
                } else {
                    if (!$('#p_d_name_1').val().length) {
                        toastr.error('Enter buddy full name');
                        return false;
                    }
                    if (!$('#telNo_partner').val().length) {
                        toastr.error('Enter buddy mobile number');
                        return false;
                    }
                    if (!$('#p_d_email_1').val().length) {
                        toastr.error('Enter buddy email');
                        return false;
                    }
                    if ($('#profile_gender_p').val() == null) {
                        toastr.error('Enter partner gender');
                        return false;
                    }
                    mobile_number_available($('#telNo_partner').val());
                    validEmail($('#p_d_email_1').val());
                    let partner_data = {
                        "full_name": $('#p_d_name_1').val(),
                        "mob_no": $('#telNo_partner').val(),
                        "email": $('#p_d_email_1').val(),
                        "gender": $('#profile_gender_p').val(),
                        "existing": 0
                    }
                    if (p_mob && p_email)
                    {
                        partner_data_submit(partner_data);
                    }
                }
            });
        }
        var data_pay_retrive = JSON.parse(localStorage.getItem("user_plan_pay"))
        if (data_pay_retrive) {
            $('#new_refer_pop_up').modal({
                backdrop: 'static',
                keyboard: false // to prevent closing with Esc button (if you want this too)
            })
            $('#r_des').html(data_pay_retrive.description);
            $('#r_price').html(data_pay_retrive.price.toLocaleString('en-IN'));
            $('#new_refer_pop_up').modal('show');
        }
        $('.n_c_r_p').on('click', function() {
            localStorage.removeItem('user_plan_pay');
        });

        $('#r_submit_new').on('click', function() {
            if ($('#referal_code_new').val().length != 6) {
                toastr.error('Please Enter Valid Referal Code');
                return false;
            }
            $.ajax({
                type: 'post',
                data: {
                    'r_code': $('#referal_code_new').val(),
                    'member_type': data_pay_retrive.description
                },
                url: '/referal_code_check',
                success: function(response) {
                    if (response) {
                        toastr.success('Congrats! Referal code applied successfully.');
                        let congo_html =
                            `Congrats! A total of ${response} days will be added to your membership!`;
                        $('.r_code_error').css('color', 'green');
                        $('.r_code_error').html(congo_html);
                        setTimeout(function() {
                            $('.r_code_error').html('');
                        }, 5000); // 5000 milliseconds = 5 seconds
                        localStorage.setItem("extend_day", response);
                    } else {
                        $('.r_code_error').css('color', 'red');
                        $('.r_code_error').html('Invalid Referal Code!');
                        setTimeout(function() {
                            $('.r_code_error').html('');
                        }, 5000); // 5000 milliseconds = 5 seconds
                    }
                }
            })
        })

        function validEmail(e) {
            var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
            var res = String(e).search(filter) != -1;
            if (res) {
                $.ajax({
                    type: 'POST',
                    data: {
                        'partner_email': $('#p_d_email_1').val()
                    },
                    url: '/partner_email',
                    success: function(response) {
                        if (response) {
                            p_email = true;
                            return true;
                        } else {
                            toastr.error('Email id already exist please use different one')
                            return false;
                        }
                    },
                });
            } else {
                toastr.error('Please enter valid email address')
                return false;
            }
        }

        function mobile_number_available(mob_no) {
            $.ajax({
                type: 'post',
                data: {
                    'mob_no': mob_no
                },
                url: '/mob_available_partner',
                success: function(response) {
                    if (response) {
                        toastr.error('Mobile number already exist please enter different number');
                        return false;
                    } else {
                        p_mob = true;
                        return true;
                    }
                },
            })
        }

        function partner_data_submit(partner_data) {
            $.ajax({
                type: 'post',
                data: partner_data,
                url: '/partner_data',
                success: function(response) {
                    if (response) {
                        toastr.success('Buddy details successfully submitted.');
                        var is_renewal = <?php echo $users->is_renewed; ?>;
                        if (is_renewal > 0) {
                            $('#partner_modal').modal('hide');
                            // $('#coach_confirmation_on_renewal').modal({
                            //     backdrop: 'static',
                            //     keyboard: false // to prevent closing with Esc button (if you want this too)
                            // });
                            location.reload();
                        } else {
                            location.reload();
                        }
                    } else {
                        toastr.error('Server Error!');
                    }
                }
            });
        }

        function activate_package(a, b, c, d) {
            if (a) {
                var user_status = '<?php echo $users->user_status; ?>';
                var cancel_btn = true;
                var isConfirmButton = false;
                var confirmButton = 'Ok';
                var cancelButton = 'Close';
                var success_temp = `<div class="act_def">
                                <div ><i style="color:#fff!important;" class="fa fa-info-circle act_i" aria-hidden="true"></i></div>
                                <div class="act_desc">You still have <b>${'<?php echo $user_workday ? $user_workday['user_plan_left_day'] . ' days </b> left in your current plan.' : '</b> an active membership.'; ?>'}  You can activate this plan once you complete ongoing program.</div>
                            </div>`;

                if ( user_status == '11') {
                    cancel_btn = true;
                    confirmButton = 'Yes';
                    cancelButton = 'No';
                    isConfirmButton = true;

                    success_temp = `<div class="act_def">
                                <div ><i style="color:#fff!important;" class="fa fa-info-circle act_i" aria-hidden="true"></i></div>
                                <div class="act_desc">Are you sure you want to activate your ${c}?</div>
                                </div>`;
                }
                swal({
                    html: success_temp,
                    showCancelButton: cancel_btn,
                    confirmButtonText: confirmButton,
                    cancelButtonText: cancelButton,
                    showLoaderOnConfirm: true,
                    allowOutsideClick: true,
                    showCloseButton: true,
                    showConfirmButton: isConfirmButton
                }).then(function(email) {
                    $.ajax({
                        url: 'activate_plan',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            'id': a,
                            'plan_id': b,
                            'admin_assign_coach': d
                        },
                        type: 'post',
                        success: function(data) {
                            toastr.success('Plan Activated Successfully');
                            $('#dashboard').click();
                            window.location.href = '/';
                        }
                    })
                }).catch(swal.noop)
            }
        }

        function flagButtonValue_partner() {
            var countryData = $("#telNo_partner").intlTelInput("getSelectedCountryData").dialCode; // get country code
            telNumber = "+" + countryData + $("#telNo_partner")
            .val(); //Whole phone number (with Country code and value of input)
            $("#telNo_partner").val(telNumber);
        }
        $(".country").on('click', function() {
            $("#telNo_partner").val('');
            flagButtonValue_partner();
        })
        $("#telNo_partner").intlTelInput({
            initialCountry: "auto", //Function to put as default country the country where the IP is located
            geoIpLookup: function(callback) {
                var countryCode = '<?php echo isset($_COOKIE['s_c_nane']) ? $_COOKIE['s_c_nane'] : 'in'; ?>';
                callback(countryCode);
            },
        });

        $('.renew_hide').on('click', function() {
            $('.renew_bar').addClass('renew_bar_hide');
            setTimeout($('.renew_bar').css('display', 'none'), 1000);
            $('.renew_btn').css('display', 'block');
        })
        $('.renew_action').on('click', function() {
            $('.renew_bar').addClass('renew_bar_hide');
            setTimeout($('.renew_bar').css('display', 'none'), 1000);
            $('#package_bought').click();
            $('.renew_btn').css('display', 'block');
        })
    </script>

    <?php
if(true){
?>
    <script>
        $(document).ready(function() {

            // var user_status = '<?php echo $users->user_status; ?>';
            // var coach_det_id = localStorage.getItem('coach_det_id') ? localStorage.getItem('coach_det_id') : null;
            // var data_pay_retrive = JSON.parse(localStorage.getItem("user_plan_pay"));
            // if (data_pay_retrive && user_status != '1') {
            //     // data_pay_retrive.plan is = is_subscription which is mostly 0 only for users
            //     if (data_pay_retrive.plan == 0) {
            //         $.ajax({
            //             type: 'GET',
            //             global: true,
            //             async: false,
            //             url: '/ajax/generateOrder?currency=' + data_pay_retrive.currency + '&amount=' + parseFloat(data_pay_retrive.price) * parseFloat(100),
            //             success: function(data) {
            //                 console.log(data)
            //                 var amount = parseFloat(data.data.amount) / parseFloat(100);
            //                 var options = {
            //                     "key": "rzp_test_z0o2WJAmSQOwLW",
            //                     "order_id": data.data.id,
            //                     "name": "Liv Ezy",
            //                     "currency": '<?php echo strtoupper($currency); ?>',
            //                     "description": data_pay_retrive.description,
            //                     "prefill": {
            //                         "email": "<?php echo Session::get('email'); ?>",
            //                         "contact": "<?php echo Session::get('mob_no'); ?>",
            //                     },
            //                     "image": "fitness/images/png2.png",
            //                     "notes": {
            //                         "country": '<?php echo isset($_COOKIE['ralcountry ']) ? $_COOKIE['ralcountry '] : 'NA '; ?>',
            //                         "state": '<?php echo isset($_COOKIE['ralstate ']) ? $_COOKIE['ralstate '] : 'NA '; ?>',
            //                         "fromOrderApi": "YES"
            //                     },
            //                     "handler": function(response) {
            //                         $.ajax({
            //                             type: 'GET',
            //                             global: true,
            //                             async: false,
            //                             data: response,
            //                             url: '/ajax/verifyOrder',
            //                             success: function(response1) {
            //                                 console.log(response1, 'from HANDLER 2');
            //                                 $.ajax({
            //                                     type: 'GET',
            //                                     global: true,
            //                                     async: false,
            //                                     url: '/sendInvoice?desc=' + data_pay_retrive.description + '&member_plan_id=' + data_pay_retrive.plan_id + '&plan_id=' + response1.data + '&coach_det_id=' + coach_det_id,
            //                                     success: function(data1) {
            //                                         console.log('From Success of Send Invoice Handler2');
            //                                         if(user_status == 11)
            //                                         {
            //                                             assign_this_coach();
            //                                         }
            //                                     },
            //                                 });
            //                                 $('.ref_no').html(response1.data);
            //                                 $('.res_amt').html(
            //                                     '<strong><?php echo $currency_icon; ?></strong>' +
            //                                     data_pay_retrive.price + '/-')
            //                                 $('.res_amt').show();
            //                                 $('#success_modal').modal({
            //                                     backdrop: 'static',
            //                                     keyboard: false
            //                                 });
            //                                 localStorage.removeItem('user_plan_pay');
            //                             },
            //                         });
            //                     },
            //                     "modal": {
            //                         "ondismiss": function() {
            //                             localStorage.removeItem('user_plan_pay');
            //                         }
            //                     },
            //                     "theme": {
            //                         "color": "#10edeb"
            //                     }
            //                 };
            //                 var rzp1 = new Razorpay(options);
            //                 rzp1.on('payment.failed', function(response) {
            //                     if (response.error) {
            //                         $.ajax({
            //                             type: 'GET',
            //                             global: true,
            //                             async: false,
            //                             url: '/sendNotification',
            //                             success: function(data) {
            //                                 console.log('Payment failed due to some reason.');
            //                             },
            //                         });
            //                     }
            //                 });
            //                 rzp1.open();
            //             },
            //         });
            //     } else {
            //         console.log('Inside Subscription Module');
            //         $.ajax({
            //             type: 'GET',
            //             global: true,
            //             async: false,
            //             url: '/createSubscription?plan_id=' + data_pay_retrive.plan + '&count=' +
            //                 data_pay_retrive.count,
            //             success: function(data) {
            //                 var sub = data;
            //                 sub = sub.replace(/(\r\n|\n|\r)/gm, "");
            //                 var options = {
            //                     "key": "rzp_test_z0o2WJAmSQOwLW",
            //                     "subscription_id": sub,
            //                     "name": "Liv Ezy",
            //                     "image": "fitness/images/png2.png",
            //                     "notes": {
            //                         "country": '<?php echo isset($_COOKIE['ralcountry ']) ? $_COOKIE['ralcountry '] : 'NA '; ?>',
            //                         "state": '<?php echo isset($_COOKIE['ralstate ']) ? $_COOKIE['ralstate '] : 'NA '; ?>',
            //                     },
            //                     "prefill": {
            //                         "email": "<?php echo Session::get('email'); ?>",
            //                         "contact": "<?php echo Session::get('mob_no'); ?>",
            //                     },
            //                     "description": "Don't Worry we will refund 5 rupees",
            //                     "handler": function(response) {
            //                         $.ajax({
            //                             type: 'GET',
            //                             global: true,
            //                             async: false,
            //                             url: '/sendSubscriptionInvoice?desc=' +
            //                                 data_pay_retrive.description +
            //                                 '&member_plan_id=' + data_pay_retrive
            //                                 .plan_id + '&plan_id=' + response
            //                                 .razorpay_payment_id + '&subscription_id=' +
            //                                 sub + '&coach_det_id=' + coach_det_id,
            //                             success: function(data) {
            //                                 console.log('From Success of sendSubscriptionInvoice');
            //                                 if(user_status == 11)
            //                                 {
            //                                     assign_this_coach();
            //                                 }
            //                                 localStorage.removeItem('user_plan_pay');
            //                             },
            //                         });
            //                         $('.ref_no').html(response.razorpay_payment_id);
            //                         $('.res_amt').hide();
            //                         $('#success_modal').modal({
            //                             backdrop: 'static',
            //                             keyboard: false
            //                         });
            //                     },
            //                     "modal": {
            //                         "ondismiss": function() {
            //                             localStorage.removeItem('user_plan_pay');
            //                         }
            //                     },
            //                     "theme": {
            //                         "color": "#10edeb"
            //                     }
            //                 };
            //                 var rzp1 = new Razorpay(options);
            //                 rzp1.on('payment.failed', function(response) {
            //                     if (response.error) {
            //                         $.ajax({
            //                             type: 'GET',
            //                             global: true,
            //                             async: false,
            //                             url: '/sendNotification',
            //                             success: function(data) {
            //                                 console.log('Payment failed due to some reason.');
            //                             },
            //                         });
            //                     }
            //                 });
            //                 rzp1.open();
            //             },
            //         });
            //     }
            // }
        })
    </script>
    <?php
}
?>
    <!-- <link rel="stylesheet" type="text/css" href="fitness/mobile/css/addtohomescreen.css">
    <script src="fitness/mobile/js/addtohomescreen.js"></script> -->
    <script type="text/javascript" src="login/js/pignose.calendar.full.min.js"></script>

    <script>
        $(window).on("load", function() {

            // Handler for .load() called.
            //$('body').css('opacity','0');
            $('.splash').css('display', 'block')
            if (localStorage.getItem("reload_window")) {
                // $('.p_d').css('display','none');
                var link = localStorage.getItem("reload_window");
                setTimeout(function() {
                    $('#' + link).click();
                    $('.splash').css('display', 'none');
                    $('.new_web').css('opacity', 1)
                }, 1000);
            } else {
                // $('.p_d').css('display','none');
                $('#dashboard').click();
                $('.splash').css('display', 'none');
                $('.new_web').css('opacity', 1)
            }
        });

        function onSelectHandler(date, context) {
            /**
             * @date is an array which be included dates(clicked date at first index)
             * @context is an object which stored calendar interal data.
             * @context.calendar is a root element reference.
             * @context.calendar is a calendar element reference.
             * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
             * @context.storage.events is all events associated to this date
             */
            var $element = context.element;
            var $calendar = context.calendar;
            var $box = $element.siblings('.box').show();
            var text = 'You selected date ';
            if (date[0] !== null) {
                text += date[0].format('YYYY-MM-DD');
            }
            if (date[0] !== null && date[1] !== null) {
                text += ' ~ ';
            } else if (date[0] === null && date[1] == null) {
                text += 'nothing';
            }
            if (date[1] !== null) {
                text += date[1].format('YYYY-MM-DD');
            }
            $box.text(text);
        }

        function onApplyHandler(date, context) {
            /**
             * @date is an array which be included dates(clicked date at first index)
             * @context is an object which stored calendar interal data.
             * @context.calendar is a root element reference.
             * @context.calendar is a calendar element reference.
             * @context.storage.activeDates is all toggled data, If you use toggle type calendar.
             * @context.storage.events is all events associated to this date
             */
            var c_id = $(context.element).attr('id');
            if (c_id != 'r_p_p') {
                if ('<?php echo $users->is_profile_filled; ?>' == '0') {
                    toastr.error('Please complete your profile section to proceed further');
                    $('#profile_d').click();
                    return false;
                }
                var num_day_res = 0;
                if ('<?php echo $users->member_type; ?>' == 'Live Session')
                    num_day_res = -1;
                if (moment().add(num_day_res, 'days').format('YYYY-MM-DD') == date[0].format('YYYY-MM-DD') && c_id !=
                    'r_p_p') {
                    toastr.error('Please choose your programe start date');
                    return false;
                }
                var buddy_temp_info = '';
                if ('<?php echo $users->member_type; ?>' == 'Buddy') {
                    buddy_temp_info =
                        `<div class="stp" style="font-size:0.6em;">Note: The start date you have chosen will also apply to you buddy.</div>`;
                }
                var start_date = date[0].format('YYYY-MM-DD');
                var d_date = date[0].format("dddd, MMMM Do, YYYY");
                var num_date = date[0].format("Do MMMM, YYYY");
                var num_day = date[0].format("dddd");
                let start_temp = `<div class="stp">
                                Your program will start on
                            </div>
                            <div class="stp_c">
                                <div class="d_f">${num_date}</div>
                                <div class="d_s">${num_day}</div>
                            </div>
                            ${buddy_temp_info}`;
                if ('<?php echo $users->member_type; ?>' == 'Live Session') {
                    swal({
                        html: start_temp,
                        showCancelButton: true,
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No',
                        showLoaderOnConfirm: true,
                        allowOutsideClick: false
                    }).then(function(email) {
                        $.ajax({
                            url: 'question_filled',
                            data: {
                                'start_date': start_date
                            },
                            type: 'post',
                            success: function(data) {
                                location.reload();
                            }
                        })
                    }).catch(swal.noop)
                } else {
                    var cur_d = '<?php echo date('d-m-Y'); ?>';
                    var cur_startDate = moment(cur_d, "DD-MM-YYYY");
                    var endDate = moment(moment(start_date).format('DD-MM-YYYY'), "DD-MM-YYYY");
                    var num_day_ques = parseInt(endDate.diff(cur_startDate, 'days'));
                    $.ajax({
                        url: 'partner_profile_filled',
                        type: 'post',
                        success: function(data) {
                            if (data) {
                                swal({
                                    html: start_temp,
                                    showCancelButton: true,
                                    confirmButtonText: 'Yes',
                                    cancelButtonText: 'No',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                }).then(function(email) {
                                    if (num_day_ques > 4) {
                                        $.ajax({
                                            url: 'future_question_date_select',
                                            data: {
                                                'start_date': start_date
                                            },
                                            type: 'post',
                                            success: function(data) {
                                                location.reload();
                                            }
                                        })
                                    } else {
                                        $.ajax({
                                            url: 'question_filled',
                                            data: {
                                                'start_date': start_date
                                            },
                                            type: 'post',
                                            success: function(data) {
                                                $('.main_dashboard').html(data.html);
                                            }
                                        })
                                    }
                                }).catch(swal.noop)
                            } else {
                                toastr.error(
                                    'Sorry your partner has not completed profile section please contact your partner to complete profile section'
                                    );
                            }
                        }
                    })
                }
            } else {
                var p_s_d = date[0].format('YYYY-MM-DD');
                var p_e_d = date[1].format('YYYY-MM-DD');

                $.ajax({
                    url: 'pause_plan',
                    type: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'pause_start_date': p_s_d,
                        'pause_end_date': p_e_d
                    },
                    global: true,
                    async: false,
                    success: function(response) {
                        if (response) {
                            toastr.success('Pause applied successfully');
                            let success_temp = `<div class="sec_liv_book">
                        <p class="e_f t_r">Your subscription has been paused from ${p_s_d} to ${p_e_d}<br>
                            Your subscription will resume from ${moment(p_e_d).add(1, 'days').format('YYYY-MM-DD')}
                        </p>
                        </div>`;
                            swal({
                                html: success_temp,
                                showCancelButton: false,
                                confirmButtonText: 'Ok',
                                showLoaderOnConfirm: true,
                                allowOutsideClick: false
                            }).then(function(email) {
                                window.location.href = '/';
                            }).catch(swal.noop)
                        } else {
                            var temp_res = `<div class="sec_liv_book">
                            <p class="e_f t_r">${response} </p>
                        </div>`
                            swal({
                                html: temp_res,
                                showCancelButton: false,
                                confirmButtonText: 'Ok',
                                showLoaderOnConfirm: true,
                                allowOutsideClick: false
                            }).then(function(email) {}).catch(swal.noop)
                        }
                    }
                })
            }
            var $element = context.element;
            var $calendar = context.calendar;
            var $box = $element.siblings('.box').show();
            var text = 'You applied date ';
            if (date[0] !== null) {
                text += date[0].format('YYYY-MM-DD');
            }
            console.log('date', text);
            if (date[0] !== null && date[1] !== null) {
                text += ' ~ ';
            } else if (date[0] === null && date[1] == null) {
                text += 'nothing';
            }
            if (date[1] !== null) {
                text += date[1].format('YYYY-MM-DD');
            }
            $box.text(text);
        }
        var num_day_res = 2;
        if ('<?php echo $users->member_type; ?>' == 'Live Session')
            num_day_res = -1;
        var $btn = $('#p_s_c').pignoseCalendar({
            apply: onApplyHandler,
            modal: true, // It means modal will be showed when you click the target button.
            buttons: true,
            minDate: moment().add(num_day_res, 'days'),
            maxDate: moment().add(16, 'days'),
        });
        var $pause_calander = $('#r_p_p').pignoseCalendar({
            apply: onApplyHandler,
            modal: true, // It means modal will be showed when you click the target button.
            buttons: true,
            multiple: true,
            select: onSelectHandler,
            minDate: moment().add(0, 'days')
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            var whatsapp_no = <?php echo config('app.contact_whatsapp'); ?>; //Sales number before purchase
            $('.whats-app-div').on('click', function() {
                window.open('https://api.whatsapp.com/send/?phone=' + whatsapp_no +
                    '&text=Hey%2C+I+would+like+to+know+more+about+the+online+fitness+coaching&app_absent=0',
                    '_blank')
            });

            $('.modal_close1').on('click', function() {
                $('#mem-info').hide();
                $('.modal').css('overflow-y', 'auto');
                //$('body').css('overflow-y', 'hidden');
            });

            $('.modal_close2').on('click', function() {
                $('body').css('overflow-y', 'auto');
            });

            $('.modal-child').on('show.bs.modal', function() {
                var modalParent = $(this).attr('data-modal-parent');
                $(modalParent).css('opacity', 0);
            });

            $('.modal-child').on('hidden.bs.modal', function() {
                var modalParent = $(this).attr('data-modal-parent');
                $(modalParent).css('opacity', 1);
            });

        });

        function popularity(profile_url) {
            $('#no-slots').modal('show');
            $.ajax({
                type: 'GET',
                url: '/popularity/' + profile_url,
                data: { profile_url }
            }).done(function( msg ) {
                //console.log( msg );
            });
        }

        function moneyFormatIndia(num) {
            let explrestunits = '';
            if (num.toString().length > 3) {
                let lastthree = num.toString().substr(num.toString().length - 3, num.toString().length);
                let restunits = num.toString().substr(0, num.toString().length - 3);
                restunits = restunits.length % 2 == 1 ? '0' + restunits : restunits;
                let expunit = restunits.match(/.{1,2}/g);
                for (let i = 0; i < expunit.length; i++) {
                    if (i == 0) {
                        explrestunits += parseInt(expunit[i]) + ',';
                    } else {
                        explrestunits += expunit[i] + ',';
                    }
                }
                let thecash = explrestunits + lastthree;
                return thecash;
            } else {
                return num;
            }
        }

        function assign_coach(tier, counter) {

            var team_name = $('#team_name_' + counter).val();
            var coach_name = $('#coach_name_' + counter).val();
            var coach_det_id = $('#coach_det_id_' + counter).val();
            var coach_pic = $('#coach_pic_' + counter).val();
            var img_profile = coach_pic ? coach_pic : 'no-image.jpeg';

            var user_status = <?php echo $users->user_status; ?>;
            var prev_team_name = localStorage.getItem('previous_team_name');
            var prev_coach_name = localStorage.getItem('previous_coach_name');
            var prev_coach_det_id = localStorage.getItem('previous_coach_det_id');

            if(prev_team_name == team_name && prev_coach_name == coach_name && prev_coach_det_id == coach_det_id) {

                console.log('From Inside Price List With Discount');
                $('#three_months_actual').show();
                $('#six_months_actual').show();
                $('#twelve_months_actual').show();
                $('#three_months_bd_actual').show();
                $('#six_months_bd_actual').show();
                $('#twelve_months_bd_actual').show();

                if (tier === 'classic') {
                    var prices = <?php echo json_encode(Config::get('prices.classic')); ?>;
                    var discount = <?php echo json_encode(Config::get('prices.discount')); ?>;

                    var three_mo_disc = prices.three_months_fixed - (prices.three_months_fixed * discount.classic);
                    var six_mo_disc = prices.six_months_fixed - (prices.six_months_fixed * discount.classic);
                    var twelve_mo_disc = prices.twelve_months_fixed - (prices.twelve_months_fixed * discount.classic);
                    var three_mo_cp_disc = prices.three_months_couple_fixed - (prices.three_months_couple_fixed * discount.classic);
                    var six_mo_cp_disc = prices.six_months_couple_fixed - (prices.six_months_couple_fixed * discount.classic);
                    var twelve_mo_cp_disc = prices.twelve_months_couple_fixed - (prices.twelve_months_couple_fixed * discount.classic);

                    $('#three_months_fixed').html(moneyFormatIndia(three_mo_disc));
                    $('#six_months_fixed').html(moneyFormatIndia(six_mo_disc));
                    $('#twelve_months_fixed').html(moneyFormatIndia(twelve_mo_disc));
                    $('#three_months_couple_fixed').html(moneyFormatIndia(three_mo_cp_disc));
                    $('#six_months_couple_fixed').html(moneyFormatIndia(six_mo_cp_disc));
                    $('#twelve_months_couple_fixed').html(moneyFormatIndia(twelve_mo_cp_disc));

                    // Base prices of the plans in scratched format
                    var curr = `<?php echo $currency_icon; ?><span class="line-through">`;
                    $('#three_months_actual').html(curr + moneyFormatIndia(prices.three_months_fixed) + "/-</span>");
                    $('#six_months_actual').html(curr + moneyFormatIndia(prices.six_months_fixed) + "/-</span>");
                    $('#twelve_months_actual').html(curr + moneyFormatIndia(prices.twelve_months_fixed) + "/-</span>");
                    $('#three_months_bd_actual').html(curr + moneyFormatIndia(prices.three_months_couple_fixed) + "/-</span>");
                    $('#six_months_bd_actual').html(curr + moneyFormatIndia(prices.six_months_couple_fixed) + "/-</span>");
                    $('#twelve_months_bd_actual').html(curr + moneyFormatIndia(prices.twelve_months_couple_fixed) + "/-</span>");

                    // To inject prices in data-price attribute of each card
                    document.getElementById("buy_three_months_fixed").setAttribute("data-price", three_mo_disc);
                    document.getElementById("buy_six_months_fixed").setAttribute("data-price", six_mo_disc);
                    document.getElementById("buy_twelve_months_fixed").setAttribute("data-price", twelve_mo_disc);
                    document.getElementById("buy_three_months_couple_fixed").setAttribute("data-price", three_mo_cp_disc);
                    document.getElementById("buy_six_months_couple_fixed").setAttribute("data-price", six_mo_cp_disc);
                    document.getElementById("buy_twelve_months_couple_fixed").setAttribute("data-price", twelve_mo_cp_disc);

                } else if(tier === 'supreme') {

                    var prices = <?php echo json_encode(Config::get('prices.supreme')); ?>;
                    var discount = <?php echo json_encode(Config::get('prices.discount')); ?>;

                    var three_mo_disc = prices.three_months_fixed - (prices.three_months_fixed * discount.supreme);
                    var six_mo_disc = prices.six_months_fixed - (prices.six_months_fixed * discount.supreme);
                    var twelve_mo_disc = prices.twelve_months_fixed - (prices.twelve_months_fixed * discount.supreme);
                    var three_mo_cp_disc = prices.three_months_couple_fixed - (prices.three_months_couple_fixed * discount.supreme);
                    var six_mo_cp_disc = prices.six_months_couple_fixed - (prices.six_months_couple_fixed * discount.supreme);
                    var twelve_mo_cp_disc = prices.twelve_months_couple_fixed - (prices.twelve_months_couple_fixed * discount.supreme);

                    $('#three_months_fixed').html(moneyFormatIndia(three_mo_disc));
                    $('#six_months_fixed').html(moneyFormatIndia(six_mo_disc));
                    $('#twelve_months_fixed').html(moneyFormatIndia(twelve_mo_disc));
                    $('#three_months_couple_fixed').html(moneyFormatIndia(three_mo_cp_disc));
                    $('#six_months_couple_fixed').html(moneyFormatIndia(six_mo_cp_disc));
                    $('#twelve_months_couple_fixed').html(moneyFormatIndia(twelve_mo_cp_disc));

                    // Base prices of the plans in scratched format
                    var curr = `<?php echo $currency_icon; ?><span class="line-through">`;
                    $('#three_months_actual').html(curr + moneyFormatIndia(prices.three_months_fixed) + "/-</span>");
                    $('#six_months_actual').html(curr + moneyFormatIndia(prices.six_months_fixed) + "/-</span>");
                    $('#twelve_months_actual').html(curr + moneyFormatIndia(prices.twelve_months_fixed) + "/-</span>");
                    $('#three_months_bd_actual').html(curr + moneyFormatIndia(prices.three_months_couple_fixed) + "/-</span>");
                    $('#six_months_bd_actual').html(curr + moneyFormatIndia(prices.six_months_couple_fixed) + "/-</span>");
                    $('#twelve_months_bd_actual').html(curr + moneyFormatIndia(prices.twelve_months_couple_fixed) + "/-</span>");

                    // To inject prices in data-price attribute of each card
                    document.getElementById("buy_three_months_fixed").setAttribute("data-price", three_mo_disc);
                    document.getElementById("buy_six_months_fixed").setAttribute("data-price", six_mo_disc);
                    document.getElementById("buy_twelve_months_fixed").setAttribute("data-price", twelve_mo_disc);
                    document.getElementById("buy_three_months_couple_fixed").setAttribute("data-price", three_mo_cp_disc);
                    document.getElementById("buy_six_months_couple_fixed").setAttribute("data-price", six_mo_cp_disc);
                    document.getElementById("buy_twelve_months_couple_fixed").setAttribute("data-price", twelve_mo_cp_disc);

                } else if(tier === 'exclusive') {

                    var prices = <?php echo json_encode(Config::get('prices.exclusive')); ?>;
                    var discount = <?php echo json_encode(Config::get('prices.discount')); ?>;

                    var three_mo_disc = prices.three_months_fixed - (prices.three_months_fixed * discount.exclusive);
                    var six_mo_disc = prices.six_months_fixed - (prices.six_months_fixed * discount.exclusive);
                    var twelve_mo_disc = prices.twelve_months_fixed - (prices.twelve_months_fixed * discount.exclusive);
                    var three_mo_cp_disc = prices.three_months_couple_fixed - (prices.three_months_couple_fixed * discount.exclusive);
                    var six_mo_cp_disc = prices.six_months_couple_fixed - (prices.six_months_couple_fixed * discount.exclusive);
                    var twelve_mo_cp_disc = prices.twelve_months_couple_fixed - (prices.twelve_months_couple_fixed * discount.exclusive);

                    $('#three_months_fixed').html(moneyFormatIndia(three_mo_disc));
                    $('#six_months_fixed').html(moneyFormatIndia(six_mo_disc));
                    $('#twelve_months_fixed').html(moneyFormatIndia(twelve_mo_disc));
                    $('#three_months_couple_fixed').html(moneyFormatIndia(three_mo_cp_disc));
                    $('#six_months_couple_fixed').html(moneyFormatIndia(six_mo_cp_disc));
                    $('#twelve_months_couple_fixed').html(moneyFormatIndia(twelve_mo_cp_disc));

                    // Base prices of the plans in scratched format
                    var curr = `<?php echo $currency_icon; ?><span class="line-through">`;
                    $('#three_months_actual').html(curr + moneyFormatIndia(prices.three_months_fixed) + "/-</span>");
                    $('#six_months_actual').html(curr + moneyFormatIndia(prices.six_months_fixed) + "/-</span>");
                    $('#twelve_months_actual').html(curr + moneyFormatIndia(prices.twelve_months_fixed) + "/-</span>");
                    $('#three_months_bd_actual').html(curr + moneyFormatIndia(prices.three_months_couple_fixed) + "/-</span>");
                    $('#six_months_bd_actual').html(curr + moneyFormatIndia(prices.six_months_couple_fixed) + "/-</span>");
                    $('#twelve_months_bd_actual').html(curr + moneyFormatIndia(prices.twelve_months_couple_fixed) + "/-</span>");

                    // To inject prices in data-price attribute of each card
                    document.getElementById("buy_three_months_fixed").setAttribute("data-price", three_mo_disc);
                    document.getElementById("buy_six_months_fixed").setAttribute("data-price", six_mo_disc);
                    document.getElementById("buy_twelve_months_fixed").setAttribute("data-price", twelve_mo_disc);
                    document.getElementById("buy_three_months_couple_fixed").setAttribute("data-price", three_mo_cp_disc);
                    document.getElementById("buy_six_months_couple_fixed").setAttribute("data-price", six_mo_cp_disc);
                    document.getElementById("buy_twelve_months_couple_fixed").setAttribute("data-price", twelve_mo_cp_disc);
                }

            }
            else {

                console.log('From Inside Price List without Discount');

                $('#three_months_actual').css('display','none');
                $('#six_months_actual').css('display','none');
                $('#twelve_months_actual').css('display','none');
                $('#three_months_bd_actual').css('display','none');
                $('#six_months_bd_actual').css('display','none');
                $('#twelve_months_bd_actual').css('display','none');

                if (tier === 'classic') {
                    var prices = <?php echo json_encode(Config::get('prices.classic')); ?>;
                    $('#three_months_fixed').html(moneyFormatIndia(prices.three_months_fixed));
                    $('#six_months_fixed').html(moneyFormatIndia(prices.six_months_fixed));
                    $('#twelve_months_fixed').html(moneyFormatIndia(prices.twelve_months_fixed));
                    $('#three_months_couple_fixed').html(moneyFormatIndia(prices.three_months_couple_fixed));
                    $('#six_months_couple_fixed').html(moneyFormatIndia(prices.six_months_couple_fixed));
                    $('#twelve_months_couple_fixed').html(moneyFormatIndia(prices.twelve_months_couple_fixed));

                    // To inject prices in data-price attribute of each card
                    document.getElementById("buy_three_months_fixed").setAttribute("data-price", prices.three_months_fixed);
                    document.getElementById("buy_six_months_fixed").setAttribute("data-price", prices.six_months_fixed);
                    document.getElementById("buy_twelve_months_fixed").setAttribute("data-price", prices.twelve_months_fixed);
                    document.getElementById("buy_three_months_couple_fixed").setAttribute("data-price", prices.three_months_couple_fixed);
                    document.getElementById("buy_six_months_couple_fixed").setAttribute("data-price", prices.six_months_couple_fixed);
                    document.getElementById("buy_twelve_months_couple_fixed").setAttribute("data-price", prices.twelve_months_couple_fixed);

                } else if (tier === 'supreme') {

                    var prices = <?php echo json_encode(Config::get('prices.supreme')); ?>;
                    $('#three_months_fixed').html(moneyFormatIndia(prices.three_months_fixed));
                    $('#six_months_fixed').html(moneyFormatIndia(prices.six_months_fixed));
                    $('#twelve_months_fixed').html(moneyFormatIndia(prices.twelve_months_fixed));
                    $('#three_months_couple_fixed').html(moneyFormatIndia(prices.three_months_couple_fixed));
                    $('#six_months_couple_fixed').html(moneyFormatIndia(prices.six_months_couple_fixed));
                    $('#twelve_months_couple_fixed').html(moneyFormatIndia(prices.twelve_months_couple_fixed));

                    // To inject prices in data-price attribute of each card
                    document.getElementById("buy_three_months_fixed").setAttribute("data-price", prices.three_months_fixed);
                    document.getElementById("buy_six_months_fixed").setAttribute("data-price", prices.six_months_fixed);
                    document.getElementById("buy_twelve_months_fixed").setAttribute("data-price", prices.twelve_months_fixed);
                    document.getElementById("buy_three_months_couple_fixed").setAttribute("data-price", prices.three_months_couple_fixed);
                    document.getElementById("buy_six_months_couple_fixed").setAttribute("data-price", prices.six_months_couple_fixed);
                    document.getElementById("buy_twelve_months_couple_fixed").setAttribute("data-price", prices.twelve_months_couple_fixed);

                } else if (tier === 'exclusive') {

                    var prices = <?php echo json_encode(Config::get('prices.exclusive')); ?>;
                    $('#three_months_fixed').html(moneyFormatIndia(prices.three_months_fixed));
                    $('#six_months_fixed').html(moneyFormatIndia(prices.six_months_fixed));
                    $('#twelve_months_fixed').html(moneyFormatIndia(prices.twelve_months_fixed));
                    $('#three_months_couple_fixed').html(moneyFormatIndia(prices.three_months_couple_fixed));
                    $('#six_months_couple_fixed').html(moneyFormatIndia(prices.six_months_couple_fixed));
                    $('#twelve_months_couple_fixed').html(moneyFormatIndia(prices.twelve_months_couple_fixed));

                    // To inject prices in data-price attribute of each card
                    document.getElementById("buy_three_months_fixed").setAttribute("data-price", prices.three_months_fixed);
                    document.getElementById("buy_six_months_fixed").setAttribute("data-price", prices.six_months_fixed);
                    document.getElementById("buy_twelve_months_fixed").setAttribute("data-price", prices.twelve_months_fixed);
                    document.getElementById("buy_three_months_couple_fixed").setAttribute("data-price", prices.three_months_couple_fixed);
                    document.getElementById("buy_six_months_couple_fixed").setAttribute("data-price", prices.six_months_couple_fixed);
                    document.getElementById("buy_twelve_months_couple_fixed").setAttribute("data-price", prices.twelve_months_couple_fixed);
                }

            }

            // set the item in localStorage
            localStorage.setItem('team_name', team_name);
            localStorage.setItem('coach_name', coach_name);
            localStorage.setItem('coach_det_id', coach_det_id);

            $('#coach_image').attr('src', 'coaches/' + img_profile);
            $('#plan_coach_name').html("Coach - " + coach_name);
            $('#plan_tier').html("Tier - " + tier);
            $('#packageModal').modal('show');
        }

        // function user_coach_assignment(counter) {
        //     var team_name = $('#team_name_' + counter).val();
        //     var coach_name = $('#coach_name_' + counter).val();
        //     var coach_det_id = $('#coach_det_id_' + counter).val();
        //     swal({
        //         html: 'Are you sure you want to be assigned to coach "' + coach_name + '"?',
        //         // title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes',
        //         cancelButtonText: 'No',
        //         showLoaderOnConfirm: true,
        //         allowOutsideClick: false
        //     }).then(function() {
        //         $.ajax({
        //             type: 'post',
        //             url: '/user-coach-assignment',
        //             data: {
        //                 'team_name': team_name,
        //                 'coach_name': coach_name,
        //                 'coach_det_id': coach_det_id
        //             },
        //             success: function(data) {
        //                 if (data) {
        //                     console.log('From user_coach_assignment')
        //                     location.reload();
        //                 } else {
        //                     toastr.error(
        //                         'Sorry! we could not assign the coach for you as the slots are already filled. Kindly contact the management'
        //                         );
        //                 }
        //             }
        //         });
        //     }).catch(swal.noop)
        // }

        function assign_this_coach() {
            console.log('Inside assign_this_coach');
            // $('#sign_up_referal_modal').modal('toggle');
            var team_name    = localStorage.getItem('team_name');
            var coach_name   = localStorage.getItem('coach_name');
            var coach_det_id = localStorage.getItem('coach_det_id');

            if (team_name !== null && coach_name !== null && coach_det_id !== null) {
                $.ajax({
                    type: 'post',
                    url: '/user-coach-assignment',
                    data: {
                        'team_name': team_name,
                        'coach_name': coach_name,
                        'coach_det_id': coach_det_id
                    },
                    success: function(result) {
                        console.log('Inside success of user coach assignment');
                        if (result === 'false') {
                            //toastr.error('Sorry! You are already enrolled with a coach.');
                        }
                        localStorage.removeItem('team_name');
                        localStorage.removeItem('coach_name');
                        localStorage.removeItem('coach_det_id');
                    }
                });
            }
        }

        function admin_assign_coach(user_id, val) {

            var user_status = '<?php echo $users->user_status; ?>';
            if(user_status == 1 || user_status == 11) {
                $.ajax({
                    type: 'get',
                    url: '/admin-assign-coach/' + user_id + '/' + val,
                    success: function() {
                        console.log('Inside Success of the admin assigns coach: ' + val);
                        // if(user_status > 1 && user_status < 11) {
                        //     swal({
                        //         html: 'Please choose your start date and fill in the questionnaire, <br> and we will assign you to the best fit.',
                        //         type: 'success',
                        //         showCancelButton: false,
                        //         confirmButtonText: 'Close',
                        //         allowOutsideClick: false
                        //     }).then(function() {
                        //         location.reload();
                        //     }).catch(swal.noop);
                        // }
                    }
                });
            } else {
                console.log('Inside Else of the admin_assign_coach: ' + val);
            }
        }
    </script>

    <!-- country script start -->

    <script>
        // user country code for selected option
        let user_country_code;
        if('<?php echo $users->country; ?>') {
            user_country_code = '<?php echo $users->country; ?>';
        }
        else {
            user_country_code = 'India';
        }

        (function () {
            // script https://www.html-code-generator.com/html/drop-down/country-region

            // Get the country name and state name from the imported script.
            let country_list = country_and_states['country'];
            let states_list = country_and_states['states'];

            // creating country name drop-down
            let option = '';
            // option += '<option>Select Country</option>';
            for (let country_code in country_list) {
                // set selected option user country
                let selected = (country_code == user_country_code) ? ' selected' : '';
                option += '<option value="' + country_code + '"' + selected + '>' + country_list[country_code] + '</option>';
            }
            document.getElementById('country-list').innerHTML = option;

            // creating states name drop-down
            let text_box = '<input type="text" class="input-text form-control input_css general_form_css mb-2" id="state" value="<?php echo $users->state; ?>" required>';
            let state_code_id = document.getElementById("state-code");

            function create_states_dropdown() {
                // get selected country code
                let country_code = document.getElementById("country-list").value;
                // console.log("Country code:" + country_code);
                let states = states_list[country_code];
                // invalid country code or no states add textbox
                if (!states) {
                    state_code_id.innerHTML = text_box;
                    return;
                }
                let option = '';
                if (states.length > 0) {
                    option = '<select id="state" class="form-control input_css general_form_css mb-2" required>\n<option selected="selected" hidden><?php echo $users->state; ?></option>\n';
                    for (let i = 0; i < states.length; i++) {
                        option += '<option value="' + states[i].name + '">' + states[i].name + '</option>';
                    }
                    option += '</select>';
                } else {
                    // create input textbox if no states
                    option = text_box
                }
                state_code_id.innerHTML = option;
            }

            // country select change event
            const country_select = document.getElementById("country-list");
            country_select.addEventListener('change', create_states_dropdown);

            create_states_dropdown();
        })();
    </script>

    <!-- country script ends -->
</body>
</html>
