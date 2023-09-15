<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Fitness Coaching | Liv Ezy</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="At Liv Ezy our 24x7 available online personal trainers provide workout and nutrition plans to smash your goals. Sounds good? Let's get started now!!">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Site verification -->
    <meta name="google-site-verification" content="23gvUaHIsa741iK9nyX7i_-03qHJ6por0F3D6-zAN48" />
    <meta name="google-site-verification" content="wn0UNh2oaWCPEwJTZjv6dLSY5byUyVILPHlrzK3jeR0" />
    <link rel="manifest" href="manifest.json">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    <link rel="icon" type="image/png" href="fitness/images/png2.png">
    <link rel="stylesheet" href="fitness/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="fitness/css/animate.css">
    <link rel="stylesheet" href="fitness/css/owl.carousel.min.css">
    <link rel="stylesheet" href="fitness/css/owl.theme.default.min.css">
    <!-- <link rel="stylesheet" href="fitness/css/magnific-popup.css"> -->
    <link rel="stylesheet" href="fitness/css/aos.css">
    <link rel="stylesheet" href="fitness/css/ionicons.min.css">
    <link rel="stylesheet" href="fitness/css/flaticon.css">
    <link rel="stylesheet" href="fitness/css/icomoon.css">
    <link rel="stylesheet" href="fitness/css/pagination/jqpaginator.css?v=1" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="fitness/css/style.css?v3">
    <link rel="stylesheet" href="fitness/css/custom.css?v3">
    <!-- Google Search Console -->
    <meta name="google-site-verification" content="rZNkol9a0Oai00VUXktATdYl38HtkSPtSqY66WonOZ0" />
    <?php $contact_wa = config('app.contact_whatsapp'); ?>
    <?php if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] != 'localhost:8000') { ?>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':
                    new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5H6RR6T');
    </script>
    <?php } ?>
    <script src="fitness/js/jquery.min.js"></script>
    <script src="fitness/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="fitness/js/popper.min.js"></script>
    <script src="fitness/js/bootstrap.min.js"></script>
    <script src="fitness/js/pagination/jqpaginator.js?v=1"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/css/intlTelInput.css" rel="stylesheet" type="text/css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/js/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/js/intlTelInput.js"></script>

    <!-- diwali css -->
    <link href="https://fonts.googleapis.com/css?family=Cardo:400,400italic|Radley|Tangerine" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lobster+Two:400,400italic' rel='stylesheet' type='text/css'>
    <!-- <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'> -->
    <style>
        span.excerpt.d-block {
        display: none !important;
        }
        .own-member-item .heading {
        font-size: 1.4em;
        }
        /* span.number-member {
        font-size: 36px;
        color: #dab33e;
        } */
        /* .btn.btn-primary {
        background: #141821;
        border: 1px solid #dbb33e !important;
        color: #fff !important;
        } */
        .master_outside_about {
        padding-top: 40px;
        padding-bottom: 40px;
        }
        .btn-info:hover {
        color: #fff !important;
        background-color: #2fd2d1;
        border-color: #2fd2d1;
        }
        .popup_heading {
        font-family: 'Nunito Sans';
        /* font-family:Gill Sans, sans-serif; */
        TEXT-ALIGN: CENTER;
        font-weight: unset;
        color: #000;
        }
        .popup_subheading {
        color: #dab33e !important;
        text-align: center;
        font-weight: 700;
        }
        /* Add some content at the bottom of the video/page */
        .content {
        /* position: absolute; */
        /* position: relative; */
        position: absolute;
        z-index: 1;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        /* background-color: #3333336b; */
        top: 0px;
        left: 0px;
        margin: 0 auto;
        max-width: 720px;
        /* text-align: center; */
        /* margin-top: 24%; */
        /* margin-bottom: 24%; */
        padding-left: 50px;
        /* margin-top: -25%; */
        bottom: -20px;
        ;
        /* background: rgba(0, 0, 0, 0.5); */
        color: #f1f1f1;
        /* width: 40%; */
        /* padding: 20px; */
        /* border-top-right-radius: 6px; */
        /* border-bottom-right-radius: 6px; */
        }
        /* Style the button used to pause/play the video */
        #myBtn {
        width: 140px;
        font-size: 1.2em;
        padding: 8px;
        background: #187FDE;
        color: #fff;
        cursor: pointer;
        outline: none;
        margin-bottom: 22px;
        }
        #myBtn:hover {
        background: #fff;
        color: #187FDE;
        }
        .diwali {
        box-sizing: border-box;
        width: 211%;
        height: 96px;
        overflow: hidden;
        background: linear-gradient(90deg, #B8041E, #E30045);
        position: relative;
        padding: 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        }
        .diwali::before,
        .diwali::after {
        content: '';
        display: block;
        position: absolute;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        left: 80px;
        top: -30px;
        background: linear-gradient(90deg, #F64969, #CB0F2A);
        }
        .diwali::after {
        left: 500px;
        top: 70px;
        background: linear-gradient(90deg, #FD5479, #E2173E);
        }
        .diwali_text {
        position: relative;
        }
        .diwali_text h5 {
        margin: 0;
        padding: 0;
        font-size: 24px;
        color: #fff;
        text-align: center;
        font-family: "Tangerine", serif;
        font-size: 60px;
        text-shadow: 1px 1px 2px #000;
        }
        .diwali_text p {
        margin: 0;
        padding: 0;
        color: #ffdedc;
        }
        .light_warp {
        flex-shrink: 0;
        height: 70px;
        width: 70px;
        border-radius: 50%;
        border: 2px dotted #ffdedc;
        background: #E30045;
        position: relative;
        overflow: hidden;
        }
        .light_warp .light_base {
        height: 60px;
        width: 60px;
        position: absolute;
        left: 5px;
        top: 5px;
        border-radius: 50%;
        background: linear-gradient(90deg, #FF6D69 0, #E2283D 50%, #FF4D68 100%);
        }
        .light_warp .light_base .base_shadow {
        height: 60px;
        width: 60px;
        background: #E30045;
        border-radius: 50%;
        position: absolute;
        left: -20px;
        top: -20px;
        overflow: hidden;
        }
        .light_warp .light_base .base_shadow:nth-child(1)::after {
        left: 4px;
        }
        .light_warp .light_base .base_shadow:nth-child(2) {
        left: 20px;
        }
        .light_warp .light_base .base_shadow:nth-child(2)::after {
        right: 4px;
        }
        .light_warp .light_base .base_shadow::after {
        content: '';
        display: block;
        background: #FFB9B9;
        height: 80px;
        width: 80px;
        border-radius: 50%;
        position: absolute;
        bottom: -72px;
        }
        .light_warp .flame {
        width: 12px;
        height: 12px;
        position: absolute;
        top: 16px;
        left: 28px;
        background: #FFC66B;
        border-radius: 1px 4px;
        box-shadow: 0 0 10px 5px #FFD163;
        transform: rotate(56deg) skewX(30deg);
        }
        .flip-clock {
        /* text-align: center; */
        perspective: 400px;
        margin: 20px auto;
        *,
        *:before,
        *:after {
        box-sizing: border-box;
        }
        }
        .limited {
        font-size: 16px !important;
        color: #716b6b !important;
        }
        .limited_date {
        margin-top: 96px;
        color: white !important;
        text-align: center;
        margin-left: -60px;
        }
        sup {
            font-size: 20px;
        }
        .flip-clock__piece {
        display: inline-block;
        /* margin: 0 5px; */
        }
        .flip-clock__slot {
        font-size: 1vw;
        }
        @halfHeight: 0.72em;
        @borderRadius: 0.15em;
        /* .card {
        display: block;
        width:300px;
        position: relative;
        padding-bottom: @halfHeight;
        font-size: 3vw;
        line-height: 0.95;
        border-color: #f8dd65;
        margin-left: 2px;
        } */
        .card__top,
        .card__bottom,
        .card__back::before,
        .card__back::after {
        display: block;
        height: @halfHeight;
        color: #ccc;
        background: #480586;
        /* #222 */
        padding: 0.25em 0.25em;
        border-radius: @borderRadius @borderRadius 0 0;
        backface-visiblity: hidden;
        transform-style: preserve-3d;
        width: 1.8em;
        transform: translateZ(0);
        border-radius: 12px;
        }
        .card__bottom {
        color: #FFF;
        position: absolute;
        top: 0%;
        left: 0;
        border-top: solid 1px #000;
        background: #393939;
        border-radius: 0 0 @borderRadius @borderRadius;
        pointer-events: none;
        overflow: hidden;
        }
        .card__bottom::after {
        display: block;
        margin-top: -@halfHeight;
        }
        .card__back::before,
        .card__bottom::after {
        content: attr(data-value);
        }
        .card__back {
        position: absolute;
        top: 0;
        height: 100%;
        left: 0%;
        pointer-events: none;
        }
        .card__back::before {
        position: relative;
        z-index: -1;
        overflow: hidden;
        }
        .flip .card__back::before {
        animation: flipTop 0.3s cubic-bezier(.37, .01, .94, .35);
        animation-fill-mode: both;
        transform-origin: center bottom;
        }
        .flip .card__back .card__bottom {
        transform-origin: center top;
        animation-fill-mode: both;
        animation: flipBottom 0.6s cubic-bezier(.15, .45, .28, 1); // 0.3s;
        }
        @keyframes flipTop {
        0% {
        transform: rotateX(0deg);
        z-index: 2;
        }
        0%,
        99% {
        opacity: 0.99;
        }
        100% {
        transform: rotateX(-90deg);
        opacity: 0;
        }
        }
        @keyframes flipBottom {
        0%,
        50% {
        z-index: -1;
        transform: rotateX(90deg);
        opacity: 0;
        }
        51% {
        opacity: 0.99;
        }
        100% {
        opacity: 0.99;
        transform: rotateX(0deg);
        z-index: 5;
        }
        }
        /**
        * Simple fade transition,
        */
        .mfp-fade.mfp-bg {
        opacity: 0;
        -webkit-transition: all 0.15s ease-out;
        -moz-transition: all 0.15s ease-out;
        transition: all 0.15s ease-out;
        }
        .mfp-fade.mfp-bg.mfp-ready {
        opacity: 0.8;
        }
        .mfp-fade.mfp-bg.mfp-removing {
        opacity: 0;
        }
        .mfp-fade.mfp-wrap .mfp-content {
        opacity: 0;
        -webkit-transition: all 0.15s ease-out;
        -moz-transition: all 0.15s ease-out;
        transition: all 0.15s ease-out;
        }
        .mfp-fade.mfp-wrap.mfp-ready .mfp-content {
        opacity: 1;
        }
        .mfp-fade.mfp-wrap.mfp-removing .mfp-content {
        opacity: 0;
        }
        /* .price.pd-20 {
        padding: 10px 0;
        } */
        #page1-div {
        margin-top: -218px;
        }
        .term_modal {
        height: 400px;
        min-height: 400px;
        overflow-y: auto;
        overflow-x: hidden;
        margin-left: 20px;
        }
        #term_condition {
        overflow-y: hidden;
        }
        .tnc_footer {
        /* margin-top:-84px; */
        height: 120px;
        background: #e5e5e5;
        }
        .first_ct {
        margin-top: 28px;
        }
        .first_cts {
        margin-top: 26px;
        }
        .first_ul {
        list-style: decimal;
        }
        .first_p {
        margin: 14px;
        }
        .second_p {
        margin: 14px;
        }
        .tnc_text_error {
        display: none;
        }
        .li_list_head ul {
        list-style: decimal;
        }
        .li_list_heading {
        /* margin-left: -42px; */
        font-weight: 800;
        }
        .li_list_head ul:not(.ul) {
        list-style: upper-alpha;
        }
        /* #home-section{
        height:100vh;
        } */
        /* #services-section{
        margin-bottom:20px;
        margin-top:10px;
        } */
        /* Style the video: 100% width and height to cover the entire window */
        #myVideo {
        /* position: absolute; */
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: 100%;
        top: 52px;
        width: 98vw;
        }
        /* Style the button used to pause/play the video */
        .content_first {
        font-size: 2.4em;
        margin-top: 17%;
        color: #fff;
        }
        .content_second {
        font-size: 1.2em;
        margin-top: 2%;
        width: 38%;
        }
        .content_button {
        border-radius: 20px;
        border: 1px solid #187FDE;
        margin-top: 2%;
        }
        .service_parent {
        padding: 20px;
        }
        .service_image {}
        .service_head {
        text-align: center;
        padding-top: 20px;
        /* padding-bottom: 20px; */
        font-size: 1.2em;
        }
        .service_desc {
        text-align: center;
        /* padding-bottom: 20px; */
        }
        .service_img_res {
        height: 80px;
        display: block;
        margin: auto;
        }
        .testimonial_new {
        background: #fff;
        border-radius: 10px;
        padding: 18px;
        }
        .new_s {
        color: #187fde;
        font-size: 2.8em;
        }
        .contact-section {
        background: #0F2942 !important;
        }
        .testimony-section .owl-dots {
        text-align: center;
        margin-top: 30px;
        margin-bottom: 14px;
        }
        .inst_img {
        height: 32px;
        background: #fff;
        border-radius: 10px;
        vertical-align: bottom;
        margin-right: 8px;
        }
        .insta_hover,
        .insta_hover:hover {
        color: white !important;
        cursor: pointer;
        font-size: 0.8em;
        }
        .new_inst {
        color: #fff;
        text-align: center;
        }
        .insta_hover,
        .insta_hover:hover {
        color: white;
        cursor: pointer;
        }
        .plan-brief-info {
        letter-spacing: 1px;
        }
        .outside_faq {
        box-shadow: 2px 2px 10px rgb(176 176 176 / 25%), -2px -2px 4px rgb(231 231 231 / 25%);
        margin-bottom: 20px;
        margin-top: 20px;
        }
        .collapse_head {
        /* font-family: Open Sans; */
        font-style: normal;
        font-weight: normal;
        font-size: 1em;
        line-height: 19px;
        background: #EFF7FF;
        border: none;
        width: 100%;
        text-align: left;
        color: #000;
        border-radius: 0px;
        padding-top: 16px;
        padding-bottom: 16px;
        }
        .padding_faq {
        padding: 14px;
        }
        .plus_ryt {
        float: right;
        }
        .collapse_sub_head {
        font-size: 0.9em;
        text-align: justify;
        }
        .form-border {
        border-radius: 0px;
        }
        .about_head {
        font-size: 1.5em;
        padding: 14px;
        }
        .outside_about {
        text-align: center;
        }
        .a_l_s {
        height: 80px;
        }
        #services-section {
        background: #EFF7FF;
        }
        .contact-info-item_new {
        border-right: 1px solid #fff;
        margin-bottom: 30px;
        }
        .cp-head {
        font-size: 1.5em;
        }
        .desc_about {
        text-align: justify;
        }
        .contact-section .contact-info p a {
        color: #fff;
        }
        .loggin_div {
        display: flex;
        /* padding: 14px; */
        /* line-height: 56px; */
        /* font-size: 18px; */
        /* font-weight: 700; */
        /* color: #9d9d9d; */
        padding-right: 14px;
        font-size: 18px;
        font-weight: 600;
        margin-top: -12px;
        }
        .location_flag {
        border-radius: 4px;
        /* padding-right: 8px; */
        margin-right: 8px;
        margin-top: -2px;
        }
        .common_login {
        padding-right: 14px;
        cursor: pointer;
        }
        .location {
        color: green;
        cursor: pointer;
        }
        .circle_country {
        display: inline-block;
        padding: 26px;
        cursor: pointer;
        }
        .circle_country_img {
        /* height: 37px;
        width: 60px;
        border: 1px solid #000;
        border-radius: 34px;
        cursor:pointer; */
        }
        .circle_country_img:hover {
        box-shadow: 0 5px 26px -5px rgb(0 180 231 / 82%)
        }
        .active_country {
        box-shadow: 0 5px 26px -5px rgb(0 180 231 / 82%)
        }
        /* .country_l{
        font-size:20px;
        } */
        .popular_country_text {
        /* text-align:center; */
        font-size: 20px;
        }
        .key_up_country {
        outline: auto;
        }
        .country_text {
        display: block;
        text-align: center;
        padding-top: 10px;
        }
        .country_modal-lg {
        /* width:68%; */
        }
        .login1 {
        cursor: pointer;
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
        #pwaa {
        display: none;
        position: fixed;
        bottom: 0;
        width: 100%;
        background: #fff;
        z-index: 9;
        letter-spacing: 2px;
        cursor: pointer;
        }
        .class_download {
        float: right;
        font-size: 20px !important;
        margin-top: 24px;
        margin-right: 12px;
        }
        .intl-tel-input.separate-dial-code .selected-dial-code {
        padding-left: 12px;
        }
    </style>

</head>

<body>

    <style>
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            overflow: hidden;
            z-index: 1;
            margin-top:-1px !important;
        }
        .navbar-nav > .active > a{
            color: #187FDE !important;
            border-bottom: 3px solid #187FDE !important;
        }
        .nav-link{
            font-size: 18px;
            color: rgb(0 0 0) !important;
            font-weight: 600 !important;
        }

        @media only screen and (max-width:640px) {
            .nav-link {
                font-size: 1.1rem !important;
                font-family: Open Sans !important;
                font-style: normal !important;
                height: 40px !important;
                font-weight:500 !important;
            }
        }

        .contact_us{
            top: 65px !important;
          }

          .contact-mobile-main{
            margin-right: 0px;
            margin-left: 0px;
          }

        @media only screen and (max-width:600px){

          .contact-head{
            font-size:2rem !important;
            line-height: 40px !important;
          }

          .contact-mobile{
            padding-right: 0px !important;
            padding-left: 0px !important;
          }

          .contact-mobile-main{
            margin-right: 0px;
            margin-left: 0px;
          }

          .contact-head-mob{
            text-align: center;
            margin-bottom: 30px;
          }

          .navbar-nav > .active > a{
            border-bottom: 0px !important;
          }

          .logo-style {
            left: 70% !important;
            padding-top: 0px !important;
          }
          .first-block{
            margin-top: -10px !important;
          }
          .plan-brief-info.cmp{
            text-align-last: center !important;
            text-align: center !important;
          }
          .cp-head{
            margin-bottom: 20px !important;
          }
          .footer-icon-mob{
            display: flex;
            justify-content: center;
          }
          .explore-wrap{
            padding-bottom: 100px;
          }
          .contact_us{
            top: 0px !important;
          }
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a href="/">
            <img class="own-navbar-img logo-style" src="fitness/images/logo_nav.png" alt="Liv Ezy Logo">
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="/">LivEzy Plus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/meet-the-team">LivEzy Premium</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/live-workouts">Live Workout</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/recipes">Recipes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/aboutus">About Us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/contact-us">Contact</a>
            </li>
          </ul>
        </div>
    </nav>

    <style type="text/css">
        #overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #000;
        filter: alpha(opacity=70);
        -moz-opacity: 0.7;
        -khtml-opacity: 0.7;
        opacity: 0.7;
        z-index: 100;
        display: none;
        }
        .cnt223 a {
        text-decoration: none;
        }
        .popup {
        width: 100%;
        margin: 0 auto;
        display: none;
        position: fixed;
        z-index: 101;
        /*margin-top:74px;*/
        }
        .cnt223 {
        min-width: 782px;
        width: 782px;
        min-height: 150px;
        margin: 100px auto;
        background: #fff;
        position: relative;
        z-index: 103;
        padding: 15px 35px;
        border-radius: 5px;
        box-shadow: 0 2px 5px #000;
        }
        .cnt223 p {
        clear: both;
        color: #555555;
        /* text-align: justify; */
        font-size: 20px;
        font-family: sans-serif;
        }
        .cnt223 p a {
        color: #d91900;
        font-weight: bold;
        }
        .cnt223 .x {
        float: right;
        height: 35px;
        left: 22px;
        position: relative;
        top: -25px;
        width: 34px;
        }
        .cnt223 .x:hover {
        cursor: pointer;
        }
        .cards {
        background: #fff;
        border-radius: 2px;
        display: inline-block;
        height: 126px;
        margin: 1rem;
        position: relative;
        width: 200px;
        border: 1px solid gold;
        border-radius: 6px;
        }
        .months_head {
        font-size: 25px;
        }
        .card-1:hover {
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
        }
        .close_popup {
        margin-top: 4.5%;
        margin-right: 27%;
        border: 1px solid black;
        border-radius: 52px;
        background: black;
        color: white;
        opacity: 1;
        width: 25px;
        font-size: 22px;
        text-align: center;
        }
        /* section{
        opacity:0.1;
        }
        nav{
        opacity:0.1;
        } */
        .bg-position {
        background-position: unset !important;
        }
        @media screen and (max-width: 600px) and (min-width: 300px) {
        .circle_country {
        margin: unset !important;
        /* height:10px!important; */
        }
        .circle_country_img {
        height: 16px;
        }
        .country_text {
        font-family: Open Sans;
        font-style: normal;
        font-weight: 600;
        font-size: 0.8em;
        line-height: 170%;
        text-align: center;
        color: #000000;
        }
        .city_shadow {
        /* font-family: Open Sans; */
        font-style: normal;
        font-weight: normal;
        font-size: 8px;
        line-height: 170%;
        color: #000000;
        cursor: pointer;
        }
        #about-section {
        margin-top: 112%
        }
        .sidenav {
        padding-top: 15px;
        }
        .sidenav a {
        font-size: 18px;
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
        .sidenav .nav-item,
        .sidenav #blog,
        .sidenav #referal_menu {
        list-style: none;
        margin-top: 20px;
        margin-bottom: 20px;
        margin-right: 20px;
        margin-left: 20px;
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
        .sidenav .nav-item.active {
        background: #187fde;
        color: #fff;
        border-radius: 8px;
        }
        .logo {
        text-align: center;
        }
        .sidenav .active a {
        color: #fff !important;
        }
        .plan-brief-info {
        font-size: 15px;
        line-height: 1.7;
        text-align: justify;
        text-align-last: left;
        }
        .loggin_div {
        padding-right: unset;
        }
        .ul_mar_18 {
        margin-top: 18px;
        }
        #u_login {
        padding-right: unset;
        }
        .mar_2 {
        margin-top: -8px;
        border: none;
        color: #000 !important;
        border-color: rgba(0, 0, 0, 0.5) !important;
        cursor: pointer;
        text-transform: uppercase;
        font-size: 16px;
        letter-spacing: .1em;
        background: transparent;
        }
        .mar_2:focus {
        outline: none;
        }
        .content_first {
        font-size: 1.3em;
        margin-top: 22%;
        color: #fff;
        }
        #myVideo {
        position: absolute;
        right: 0;
        bottom: 0;
        min-width: 100%;
        min-height: unset;
        top: 52px;
        width: 98vw;
        }
        .content {
        /* position: absolute; */
        position: relative;
        /* position: relative; */
        z-index: 1;
        min-width: 100%;
        min-height: unset;
        width: auto;
        height: auto;
        /* background-color: #3333336b; */
        top: 300px;
        left: 0px;
        margin: 0 auto;
        max-width: 720px;
        /* text-align: center; */
        /* margin-top: 24%; */
        /* margin-bottom: 24%; */
        padding-left: 32px;
        /* margin-top: -25%; */
        bottom: -20px;
        /* background: rgba(0, 0, 0, 0.5); */
        color: #f1f1f1;
        /* width: 40%; */
        /* padding: 20px; */
        /* border-top-right-radius: 6px; */
        /* border-bottom-right-radius: 6px; */
        }
        .content_second {
        font-size: 0.7em;
        margin-top: 2%;
        width: 88%;
        text-align: justify;
        }
        #myBtn {
        width: 140px;
        font-size: 1em;
        padding: 6px;
        background: #187FDE;
        color: #fff;
        cursor: pointer;
        outline: none;
        margin-bottom: 44px;
        }
        .cards {
        margin-bottom: 1px;
        width: 186px;
        height: 115px;
        }
        .months_head {
        font-size: 22px;
        }
        .text_cts {
        font-size: 17px;
        text-align: left;
        }
        .heading_price {
        font-size: 24px !important;
        margin-top: -12px;
        margin-bottom: -6px !important;
        }
        .diwali {
        width: 100%;
        }
        .tnc_footer {
        height: 140px;
        }
        .first_cts {
        margin-top: -16px;
        }
        .first_ct {
        margin-top: 1px;
        }
        .modal-backdrop {
        opacity: 1 !important;
        background: white;
        }
        .modal-dialog {
        margin: unset !important;
        border: none;
        }
        .term_modal {
        height: 335px;
        min-height: 335px;
        }
        .cnt223 {
        min-width: 340px;
        width: 340px;
        min-height: 150px;
        margin: 100px auto;
        background: #fff;
        position: relative;
        z-index: 103;
        padding: 15px 35px;
        border-radius: 5px;
        box-shadow: 0 2px 5px #000;
        overflow-y: auto;
        height: 540px;
        margin-top: 75px;
        }
        .popup {
        margin-top: unset;
        }
        .close_popup {
        /* margin-top: -78.5%; */
        margin-right: 1%;
        border: 1px solid black;
        border-radius: 52px;
        background: black;
        color: white;
        opacity: 1;
        width: 25px;
        font-size: 22px;
        text-align: center;
        margin-top: 42px;
        }
        .flip-clock__slot {
        font-size: 4vw;
        color: white;
        }
        /* .card {
        display: block;
        position: relative;
        padding-bottom: @halfHeight;
        font-size: 10vw;
        line-height: 0.95;
        } */
        .bg-position {
        background-position: -90px 0 !important;
        }
        .text_c {
        color: white !important;
        }
        .card__top,
        .card__bottom,
        .card__back::before,
        .card__back::after {
        border-radius: 4px;
        }
        .flip-clock__piece {
        margin: 0 5px;
        }
        .text {
        margin-top: 30px !important;
        }
        .popup_heading {
        font-family: 'Nunito Sans';
        font-weight: unset;
        font-size: 32px;
        }
        }
        .logo-style {
        width: 86px;
        position: absolute;
        left: 36px;
        top: 15px;
        }
        .liv_ezy_text {
        position: absolute;
        font-size: 20px;
        left: 98px;
        top: 20px;
        text-transform: capitalize;
        font-weight: 700;
        font-family: sans-serif;
        }
        #location_modal_nav_style {
        position: absolute;
        right: 30px;
        }
        @media only screen and (max-width: 768px) {
        .testimony-wrap .text {
        padding-top: unset;
        }
        #myBtn {
        width: 140px;
        font-size: 1.2em;
        padding: 6px;
        background: #187FDE;
        color: #fff;
        cursor: pointer;
        outline: none;
        margin-bottom: 22px;
        }
        #myBtn:hover {
        background: #fff;
        color: #187FDE;
        }
        #location_modal_nav_style {
        position: unset !important;
        right: unset !important;
        }
        .liv_ezy_text {
        position: absolute;
        font-size: 14px;
        left: 46px;
        top: 12px;
        text-transform: capitalize;
        font-weight: 700;
        font-family: sans-serif;
        color: #000;
        }
        .logo-style {
        /* width: 25px; */
        position: absolute;
        left: 60px;
        top: 6px;
        }
        .content_button {
        margin-top: 0%;
        }
        }
        .heading-section .subheading {
        font-size: 18px;
        font-weight: 700;
        color: #000000 !important;
        margin-bottom: 20px;
        }
        .own-service-icon span {
        color: #187FDE;
        }
        #diet-img {
        margin-top: -20px;
        }
        span.number-member {
        color: #187FDE;
        }
        .btn.btn-primary {
        background: #187FDE;
        border: 1px solid #187FDE !important;
        }
        .btn.btn-primary:hover {
        background: #fff;
        border: 1px solid #187FDE !important;
        color: #000 !important;
        }
        .membership-modal .modal-header {
        background-color: #187FDE;
        }
        .own-member-item {
        border-color: #187FDE;
        }
        #contact_form .contact-info .contact-info-item .ico-wrap {
        color: #187FDE;
        }
        .location_wrap {
        background: #187FDE;
        }
        .price sup {
        color: #187FDE;
        }
        #location-sel-modal .modal-body .btn-submit {
        background: #187FDE;
        }
        section {
        display: none;
        }
        footer {
        display: none;
        }
        .testimony-wrap .name {
        font-weight: 400;
        font-size: 1.5em;
        margin-bottom: 0;
        color: #333333;
        /* margin-top: 23px; */
        /* padding-top: 20px; */
        padding-bottom: 20px;
        text-align: center;
        font-style: normal;
        }
        .testimony-wrap .user-img {
        border-radius: 10px;
        }
        .testimony-wrap p {
        font-size: 1em;
        color: #000;
        line-height: 25px;
        text-align: justify;
        /* font-family: Open Sans; */
        /* font-style: italic; */
        /* font-weight: normal; */
        /* padding-left: 20px;
        padding-right: 20px; */
        padding-top: 10px;
        /* padding-bottom: 20px; */
        margin-bottom: 10px !important;
        }
        .submit-contact-button {
        width: 100px;
        font-size: 1.2em !important;
        /* padding: 10px; */
        background: #187FDE;
        color: #fff !important;
        cursor: pointer !important;
        outline: none !important;
        /* margin-bottom: 22px; */
        border-radius: 20px;
        border: 1px solid #187FDE !important;
        transition: all .3s ease-in-out;
        text-transform: unset !important;
        }
        .submit-contact-button:hover {
        color: #187FDE !important;
        background: #fff !important;
        box-shadow: 0 5px 26px -5px rgba(0, 180, 231, .25);
        }
        .img-whats-app {
        height: 40px;
        }
        #contact_form .contact-info .contact-info-item .ico-wrap {
        color: #fff;
        font-size: 35px;
        text-align: center;
        }
        .contact-info-item_new {
        border-right: 1px solid #fff;
        margin-bottom: 30px;
        }
        .heading-section .subheading {
            /* text-transform: unset; */
        }
    </style>

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
            background-color: #187FDE;
            border-color: #187FDE;
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

        /* .card {
            border: 1px solid #ccc !important;
            border-radius: 2rem !important;
        } */

        .card-body {
            font-size: 0.9rem;
        }

        /* .card-body h5 {
            font-size: 1rem;
            font-weight: 700 !important;
        } */

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
            padding: 0.4rem 1.5rem;
            border-radius: 30px;
            margin-left: 0.5rem;
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

        @media only screen and (max-width: 768px) {
            .coachBox .btn-info {
                margin-top: 1rem;
                margin-left: 0;
            }

            .ftco-explore {
                padding: 0em 0 3em !important;
            }

            .coach-img {
                padding: 2rem;
                margin-bottom: 1rem;
            }

        }
    </style>

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
            background-color: #187FDE;
            border-color: #187FDE;
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

        /* .card {
            border: 1px solid #ccc !important;
            border-radius: 2rem !important;
        } */

        .card-body {
            font-size: 0.9rem;
        }

        .card-img-top {
            width: 85%
        }

        /* .card-body h5 {
            font-size: 1rem;
            font-weight: 700 !important;
        } */

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
            padding: 0.4rem 1.5rem;
            border-radius: 30px;
            margin-left: 0.5rem;
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

        .btn.btn-primary {
            background: #31cdcc;
            border: 1px solid #31cdcc !important;
        }

        .meet-team-view {
            background-color: #181616 !important;
            color: white !important;
        }

        @media only screen and (max-width: 768px) {
            .coachBox .btn-info {
                margin-top: 1rem;
                margin-left: 0;
            }

            .ftco-explore {
                padding: 0em 0 3em !important;
            }

            .coach-img {
                padding: 2rem;
                margin-bottom: 1rem;
            }
        }

        .coach-info-wrapper {
            padding-left: 9rem;
            padding-right: 9rem;
        }
    </style>

    {{-- conatct css started  --}}

    <style>
        .contact-head{
            font-weight: 700;
            line-height: 50px;
            color:white;
        }

        .contact-para{
            color: white;
            padding-top: 7px;
            font-size: 22px;
            line-height: 30px;
        }

        .contact-list{
            border-radius: 5px;
            background: rgba(128,128,128,.1);
            font-size: 16px;
            line-height: 35px;
            color:white;
        }

        .icon-head2{
            margin-right: 10px;
            padding-top: 10px;
        }

        .contact-form-label{
            font-style: oblique;
        }

        .contact-form-input{
            width: 80%;
        }

        .contact-form-phone{
            width: 96% !important;
            padding: 0.375rem 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        .contact-form-label{
            font-style: oblique;
            color:white;
        }

        #emailHelp {
            color:white !important;
        }

        .iti__selected-flag {
            /* margin-left: 10px; */
        }
        .img-whats-app {
            height: 60px;
        }
        .whats-app-div {
            position: fixed;
            bottom: 60px;
            right: 15px;
            z-index: 9999;
            cursor: pointer;
        }
        .close-icon {
            cursor: pointer;
        }

        .whatsapp-icon-div {
            position: fixed;
            bottom: 75px;
            right: 25px;
            z-index: 3;
            cursor: pointer;
        }
        .contact_us {
            top: 75px;
        }
        .faq-section{
            /* top: 20px; */
            bottom: 20px;
        }
    </style>

    <!-- new contact section -->
    <section class="ftco-section ftco-no-pb mb-5 text contact_us contact-section" id="contact-section">
        <div class="d-flex row flex-col contact-mobile-main">
            <div class="text-center mb-3 col-md-12">
                <h1 class="contact-head">Connect with Us</h1>
                <h3 class="contact-para">We're happy to help!</h3>
            </div>
            <div class="d-flex mt-3 justify-content-around flex-wrap">
                <div class="col-md-6 px-5 contact-mobile">
                    <h1 class="contact-head col-md-8 contact-head-mob d-none d-md-block">Coaching that is tailored to your lifestyle and goals.</h1>
                    <h4 class="col-md-10 contact-para d-none d-md-block">We are committed to building a healthier you with</h4>
                    <ul class="contact-list col-md-10 mt-4 px-3 d-none d-md-block">
                        <li class="d-flex"><i class="fa-solid fa-angles-right icon-head2"></i>
                            <p>Dedicated mentors</p>
                        </li>
                        <li class="d-flex"><i class="fa-solid fa-angles-right icon-head2"></i>
                            <p>Sustainable diet plans</p>
                        </li>
                        <li class="d-flex"><i class="fa-solid fa-angles-right icon-head2"></i>
                            <p>Effective workout routines</p>
                        </li>
                        <li class="d-flex"><i class="fa-solid fa-angles-right icon-head2"></i>
                            <p>Interactive live online sessions</p>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h4 class="text-center mt-sm-3" style="color:white !important;">Submit query to learn more about how we can help you with your goals!</h4>
                    <form id="contact_form" method="POST" action="/sendmail" class="ftco-animate">
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="contact-form-label">Your name</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" class="contact-form-input" placeholder="Full Name" name="full_name" required>
                        </div>

                        <div class="form-group mt-3 mb-0">
                            <label for="exampleInputEmail1" class="contact-form-label">Your phone number</label>
                        </div>

                        <div class="row mt-1 form-group d-flex flex-column pl-3">
                            <input type="tel" id="txtPhone" class="txtbox contact-form-phone" style="height:52px !important;" name="contact" required/>
                            <small id="emailHelp" class="form-text text-muted mt-2">Don't type country code here</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="contact-form-label">Your email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email@address.com" class="contact-form-input" name="email" required>
                            <small id="emailHelp" class="form-text text-muted mt-1">We'll never share your email with anyone else.</small>
                        </div>

                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1" class="contact-form-label">Message</label>
                            <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Message Here" class="contact-form-input" rows="3" name="message" required></textarea>
                        </div>

                        <div class="row mt-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-info btn-lg btn-block mb-2 ml-2 mr-2">Submit</button>
                            <small id="emailHelp" class="form-text text-muted text-center mb-5">By proceeding, you agree to allow LivEzy to contact you</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section faq-section" id="faq-section">
        <div class="container">
            <div class="col-md-12 text-center ftco-animate fadeInUp ftco-animated">
                <span class="subheading new_s">FAQs</span>
            </div>
            <h2 style="text-align:center;font-size:1.5em;padding-top:10px;">Why Online Fitness Coaching?</h2>
            <div class="outside_faq" id="myGroup">
                <a data-target="#faq1" aria-expanded="false" aria-controls="faq1" class="btn btn-info collapse_head" style="background:#EFF7FF;" data-toggle="collapse">All you need to know about online coaching.<span class="plus_ryt">+</span></a>
                <div id="faq1" data-parent="#myGroup" class="collapse collapse_sub_head">
                    <div class="padding_faq">
                        In an increasingly rapid world, staying fit becomes a challenge. Frequent traveling, fast-paced lifestyle, time commitments, and work pressure mean the regular gym session might get a miss. However, with the power of smartphones and accessibility, online fitness coaching has become a natural solution to it.The concept is simple - a gym
                        trainer is there only for the 1 hr in the gym and if you are traveling somewhere, not even for that. Online fitness coaches train you remotely and because of that, location is never a problem. Moreover, online fitness coaching comes at a fraction of the cost of hiring a personal trainer and hence is good on the wallet as well. These coaches
                        are certified from ACE, CSCS, and ISSA and have with them a streak of success stories of weight loss, muscle gain, post-pregnancy, etc. Another major reason people tend to swing towards online coaching is the accessibility that comes with it, in the long term. They can provide you with customized workout training plans and nutrition plans so that
                        you can stay on your fitness goals even when you are traveling or are having a party.
                    </div>
                </div>
                <a data-target="#faq2" aria-expanded="false" aria-controls="faq2" class="btn btn-info collapse_head" style="background:#EFF7FF;" data-toggle="collapse">What is online coaching?<span class="plus_ryt">+</span></a>
                <div id="faq2" data-parent="#myGroup" class="collapse collapse_sub_head">
                    <div class="padding_faq">
                        To think of it, the idea of a fitness coach has stayed the same throughout history -- someone who helps you stay fit and achieve your fitness goals. And with the rise in smartphone use, every area of our life has been impacted positively, in the same way, fitness has also improved with the advent of online fitness coaching.
                        Online fitness coaching includes personalized workout plans, nutrition, and diet plans, lifestyle advice, on-demand help through messages and calls. Online personal trainers also help you stay aimed at your fitness goals by pushing and motivating you.
                        Increasingly, online personal trainers today also have their apps and video services so that you have personal access to them and can reach out to them directly.
                    </div>
                </div>
                <a data-target="#faq3" aria-expanded="false" aria-controls="faq3" class="btn btn-info collapse_head" style="background:#EFF7FF;" data-toggle="collapse">Is online fitness coaching worth it?<span class="plus_ryt">+</span></a>
                <div id="faq3" data-parent="#myGroup" class="collapse collapse_sub_head">
                    <div class="padding_faq">
                        The answer to it is very personal and will depend on the individual - if you are someone who can wake up and get to the gym by yourself, follow a diet and a workout program then getting fitness coaching might not provide much value add.
                        However, if you are someone who works the best when pushed and motivated and wants a personalized workout plan tailored according to your goal (can be as simple as reducing weight to as specific as getting that wedding bod!), fitness coaching will help you stay on track and smash that goal.
                        And with the help of online fitness coaching, the once propagated idea that personalized fitness coaching is only the luxury of the rich is being proved false. Online coaching costs a fraction of what personal trainers are hired at and provides the added benefits of accessibility, one-on-one guidance, and nutrition plans.
                    </div>
                </div>
                <a data-target="#faq4" aria-expanded="false" aria-controls="faq4" class="btn btn-info collapse_head" style="background:#EFF7FF;" data-toggle="collapse">What is the difference between and online and in-person coach?<span class="plus_ryt">+</span></a>
                <div id="faq4" data-parent="#myGroup" class="collapse collapse_sub_head">
                    <div class="padding_faq">
                        One of the dilemmas when considering fitness coaching is this: online vs physical trainer. Two biggest differences sway me towards online trainers more: accessibility and cost. Hiring an online trainer is cost-effective and because you don’t need them physically present, you can take their benefit anywhere.
                        The biggest example can be when you are traveling. We all know how all of our routine flies out of the window when we are on the road, both in terms of workout and nutritional coaching. Having an online personal coach with us would help you in those times who can give you specific workouts you can do without equipment and the food that you can consume so that you enjoy your vacation as well as stay on track for your fitness goals.
                        Online coaching also comes with nutrition plans where a dedicated nutritionist will help you chart out your diet plan and work alongside your workout coach to ensure your fitness goals are in sync.
                    </div>
                </div>
                <a data-target="#faq5" aria-expanded="false" aria-controls="faq5" class="btn btn-info collapse_head" style="background:#EFF7FF;" data-toggle="collapse">How to make most of online coaching?<span class="plus_ryt">+</span></a>
                <div id="faq5" data-parent="#myGroup" class="collapse collapse_sub_head">
                    <div class="padding_faq">
                        So you have gotten yourself the membership and are looking forward to building your dream physique. How should you proceed and what to keep in mind?
                        First, follow your personal trainer's advice and stick to the plan. You’ve paid them for a good reason and their expertise is why you’ve trusted them. Moreover, it takes time for a workout routine’s effectiveness to be seen, so patience is your friend here.
                        Also, make sure your form is proper and for that, you can shoot yourself doing 1 rep of the exercise and share it with your trainer. They’ll help you improve your form and this helps prevent injuries.
                        Last but not least, keep in touch with your coach throughout the day and not just during gym time. Share your diet pics, update your weight and BMI metrics so that they can make changes to your workout and nutrition plan if required.
                    </div>
                </div>
                <a data-target="#faq6" aria-expanded="false" aria-controls="faq6" class="btn btn-info collapse_head" style="background:#EFF7FF;" data-toggle="collapse">What to keep in mind while choosing an online fitness trainer?<span class="plus_ryt">+</span></a>
                <div id="faq6" data-parent="#myGroup" class="collapse collapse_sub_head">
                    <div class="padding_faq">
                        Because starting as an online trainer is so easy, there’s a lot of crowds and it becomes very important to choose the right trainer for your needs and the goals that you have in mind.
                        First of all, go through their website and their Instagram profile to see if they live the life that they are advocating, by that I mean do they workout and eat healthily and stay fit themselves? Second, see their success stories and go through their testimonials. If you can find a transformation that matches your goals, you might have found your trainer!
                        I’d also suggest you have a consultation call with the coach before finalizing anyone because it’s very important to see if the coach is the right fit for you or not. You should also ask what is included in the health and fitness coaching plans -- the best ones include personalized workout plans as well as diet and nutritional plans to make sure your fitness goal is achieved.
                        One last tip that I’d give you is to see what is the preferred method to communicate with the trainer. Many trainers are available only through messages and chats while some trainers don't mind audio and video calls as well as daily audio messages. Go with the ones that suit your personality as well.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="whatsapp-icon-div" data-toggle="tooltip" title="Instant Chat on Whatsapp">
        <div class="whats-app-img">
            <img class="img-whats-app" src="{{asset('fitness/images/whatsapp.png')}}">
        </div>
    </div>

    {{-- <div class="whats-app-div" data-toggle="tooltip" title="Instant Chat on whats app">
        <div class="whats-app-img">
            <div class="card p-3" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="arrow d-flex justify-content-end mr-2">
                    <span class="clickable close-icon" data-effect="fadeOut"><i class="fa fa-sort-desc fa-lg p-2"></i></span>
                </div>
                <div class="card-body p-4 support-banner">
                    <span>
                        <h4 class="mb-3 text-center">Get in touch with <br/><strong style="color:red;">our experts</strong></h4>
                        <div class="row d-flex justify-content-center">
                            <button type="button" class="btn btn-success px-5"><i class="fa-brands fa-whatsapp fa-lg"></i> Chat on Whatsapp</button>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- scroll to top -->
    <div id="scroll-top"><span><i class="fas fa-chevron-up"></i></span>
    </div>

    <!-- footer -->
    <footer>
        <div class="bottom-footer mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 copyrights_info">
                        <p>
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> | All rights reserved | <a href="/terms-conditions" target="_blank" class="tnc">Terms &amp; Conditions</a> | <a href="/privacy-policy" target="_blank" class="tnc">Privacy Policy </a>| <a href="/cookies-policy" target="_blank" class="tnc">Cookies Policy</a>
                        </p>
                    </div>
                    <div class="col-md text-right">
                        <p>
                            <a href="https://instagram.com/liv.ezyfit/" target="_blank"><span class="icon-instagram own-inst-icon"></span></a>
                            <a href="https://www.facebook.com/liv.ezyfit/" target="_blank"><span class="icon-facebook own-facebook-icon "></span></a>
                            <a href="https://youtube.com/c/LivEzy" target="_blank"><span class="fab fa-youtube own-yt-icon"></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#007bff" />
        </svg>
    </div>

    <div class="modal fade membership-modal" id="term_condition" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms & Conditions</h5>
                    <button type="button" class="close modal_close3" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body term_modal">
                    <p><b>Interpretation and Definitions</b></p>
                    <hr>
                    <p><b>Interpretation</b></p>
                    <p>The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
                    <p><b>Definitions</b></p>
                    <p>
                        For the purposes of this Terms and Conditions:
                    <ul style="padding-left:60px;">
                        <li><b>Affiliate</b> means an entity that controls, is controlled by or is under common control with a party, where "control" means ownership of 50% or more of the shares, equity interest or other securities entitled to vote for election of directors or other managing authority.</li>
                        <li><b>Company</b> (referred to as either "the Company", "We", "Us" or "Our" in this Agreement) refers to <b>LIV EZY ONLINE FITNESS PRIVATE LIMITED</b> with its office located at 987, 6th cross S T Bed, Koramangala, Bengaluru 560034.</li>
                        <li><b>Terms and Conditions</b> (also referred as "Terms") mean these Terms and Conditions that form the entire agreement between You and the Company regarding the use of the Service.</li>
                        <li><b>Country</b> refers to: India</li>
                        <li><b>Device</b> means any device that can access the Service such as a computer, a cellphone or a digital tablet.</li>
                        <li><b>Service</b> refers to the Website.</li>
                        <li><b>Third-party Social Media Service</b> refers to any website or any social network website through which a User can log in or create an account to use the Service.</li>
                        <li><b>Website</b> refers to Liv Ezy, accessible from https://www.livezy.com/.</li>
                        <li><b>You</b> means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</li>
                    </ul>
                    </p>
                    <p><b>Acknowledgment</b></p>
                    <hr>
                    <p>These are the Terms and Conditions governing the use of this Service and the agreement that operates between You and the Company. These Terms and Conditions set out the rights and obligations of all users regarding the use of the Service.</p>
                    <p>Your access to and use of the Service is conditioned on Your acceptance of and compliance with these Terms and Conditions. These Terms and Conditions apply to all visitors, users and others who access or use the Service.</p>
                    <p>By accessing or using the Service You agree to be bound by these Terms and Conditions. If You disagree with any part of these Terms and Conditions then You may not access the Service.</p>
                    <p>You represent that you are over the age of 18. The Company does not permit those under 18 to use the Service.</p>
                    <p>Your access to and use of the Service is also conditioned on Your acceptance of and compliance with the Privacy Policy of the Company. Our Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your personal information when You use the Application or the Website and tells You about Your privacy rights and how the law protects You. Please read Our Privacy Policy carefully before using Our Service.</p>
                    <p><b>Terms and Conditions</b></p>
                    <p>By subscribing to the online training program or by purchasing any products from us, you agree to be bound by these terms and conditions;</p>
                    <p>The online training program also gives access to purchase e-books, online video courses, tailored fitness programs, diet plans, individually tailored personal plans etc. and by using/purchasing such services, you agree to be bound by these terms and conditions;</p>
                    <ul style="padding-left:60px;list-style: lower-alpha;">
                        <li>You agree that the fee payable by you for the services/purchases will be communicated to you by us, prior to the commencement of the training program/any purchases/sign-ups made by you.</li>
                        <li>
                            License: On any services/purchases, we will grant to you, for your own personal use only, a limited, non-exclusive, non-transferable license to access:
                            <ul style="list-style: disc;">
                                <li>Online training program.</li>
                                <li>Videos on stream only basis.</li>
                                <li>Download e-books.</li>
                                <li>Download personalized fitness plans;</li>
                            </ul>
                        </li>
                        <p>You agree that that you are not permitted to share any of the content licensed under these terms with any other individuals and except for the foregoing limited license, no right, title or interest shall be transferred to you.
                        <p>
                        <li>You agree that we will not be responsible or liable for any personal injury caused to you while using our services/products/ live-workouts etc.</li>
                        <li>You agree that our employees, agents or representatives are not medical professionals and we don’t engage in providing any medical opinions or medical advice.</li>
                        <li>You agree to consult and seek professional medical advice before availing any services/purchases from us.</li>
                        <li>You agree that all the exercise programs, even in healthy individuals carries certain risks and you shall take due care and exercise at your own free will before acting upon any of the content provided by us.</li>
                        <li>You also agree that all information for the nutrition/fitness programs may not be accurate in terms of nutritional values which includes calories, micro-nutrients and macro-nutrients and you will not hold us responsible for any personal injury or injury as such caused as a result of such information.</li>
                        <li>You agree to not regard all information provided by us as a comprehensive health/exercise program and make any judgments or opinions based on information available to you or out of your own free will.</li>
                        <li>You agree that all the services/purchases have been provided to you based out of the information given by you. It is your responsibility to inform us about any health/medical conditions to be taken into consideration before preparation of any training program, diet plans etc. and other services offered by us.</li>
                        <li>You agree that the information set out in our services/products may relate to certain contexts and may not be suitable to other contexts. It is your responsibility to ensure that you refrain from using any information provided by us in a wrong context.</li>
                        <li>You agree that any of the information provided in our services/products will not be applicable to pregnant women and special population. It is your responsibility to intimate us to prepare a special plan in cases of pregnant women and special population.</li>
                        <li>You also agree that any information provided that does not form a part of personal training programs, whether obtained through our website, e-books, video courses, social media (Facebook, Instagram, Twitter etc.) or otherwise, is provided for the purposes of general information only and shall not be regarded as a part of the services/products provided.</li>
                        <li>You also agree that before availing our services/products, you have taken into account all other factors that are not mentioned above that you are or ought to be aware of.</li>
                        <li>You also agree that our program may not achieve the desired results in some circumstances as to the effectiveness of any techniques, diets or programs etc, and in such circumstances we provide no warranties of any kind, express or implied.</li>
                        <li>You agree that if you are a minor, No-Objection Certificate (“NOC”) should be issued by your parents/guardian giving consent for using the programs provided by Liv Ezy. All the clauses mentioned in this agreement will be applicable to the minor in entirety and if any part of this agreement is held unenforceable, the remaining will continue with full force and effect.</li>
                        <li>You agree that it is your responsibility to send in daily meal and weight updates and weekly physique updates to us. We will follow up in a periodic and systematic manner, but will not be held liable for any failure on your part to provide the daily meal and weight updates and weekly physique updates.</li>
                        <li>You also agree that you may change your head-coach if you are not satisfied with the training of the previous coach but cannot claim any refund whatsoever.</li>
                        <li>You agree and have no objection to give access/use your before and after photographs and transformation pictures on our website, social media handles (Facebook, Twitter, Instagram etc.) etc. as a part of our client transformation portfolio.</li>
                        <li>You also agree that it is your duty to keep your camera on during live workouts so that the coach can monitor your movements correctly.</li>
                        <li>You also agree that it is your duty to inform and cancel your live workout session if you don’t wish to attend so that others may avail a slot to attend the session.</li>
                    </ul>
                    <p><b>Eligibility</b></p>
                    <hr>
                    <p>You must be at least at the age of 18 years to enroll with a coach on the Platform. If you are below the age of 18 (“minor”), you may use our services only with the supervision and consent of a parent or guardian. No individual under these age limits may use our services, provide any personal data to Liv Ezy, or otherwise submit personal data through the Services (e.g., a name, address, telephone number, or email address).</p>
                    <p>
                        As a minor if You wish to use our products or Services, such use shall be made available to You by Your legal guardian or parents, who has agreed to these terms of the agreement. In the event a minor utilizes the application/website/services, it is assumed that he/she has obtained the consent of the legal guardian or parents and such use is made available by the legal guardian or parents. The Company will not be responsible for any consequence that arises as a result of misuse of any kind of our website or any of our products or services that may occur by virtue of any person including a minor registering for the Services/products provided. By using the products or services You warrant that all the data provided by You is accurate and complete and that the Minor using the Website has obtained the consent of parent/legal guardian (in case of minors). The Company reserves the right to terminate Your account and / or refuse to provide You with access to the products or Services if it is discovered that You are under the age of 18 (eighteen) years and the consent to use the products or Services is not made by Your parent/legal guardian or any information provided by You is inaccurate. You acknowledge that the Company does not have the responsibility to ensure that You conform to the aforesaid eligibility criteria. It shall be Your sole responsibility to ensure that You meet the required qualification. Any persons under the age of 18 (eighteen) should seek the consent of their parents/legal guardians before providing any Information about themselves or their parents and other family members on the Website.
                    </p>
                    <p><b>Intellectual Property</b></p>
                    <hr>
                    <ul style="padding-left:60px;">
                        <li>By providing any content for distribution (such as before and after photographs) you expressly grant us a worldwide, royalty-free, perpetual, irrevocable license to use, copy, store, perform, display and distribute such content.</li>
                        <li>You agree and grant Liv Ezy a worldwide, royalty-free, perpetual, irrevocable license to use, copy, store, perform, display and distribute any pictures that you share with Liv Ezy, including but not limited to pictures of your body showing the day to day progress that you have made. These pictures include but are not limited to “before” and “after” pictures. “Before” here refers to pictures of your body prior to using the services of Liv Ezy. “After” here refers to pictures of your body during the course of using the services of Liv Ezy and upon completion of using the services of Ral Fitness. You have no-objection to Liv Ezy using your pictures or any other content that you have shared for the purpose of marketing and business-development of Liv Ezy.</li>
                        <li>The format and content our Training Programs and Products are protected by The Indian Copyright Act, 1957 and we reserve all rights in relation to our copyright whether owned or licensed to us and all rights are reserved to any of our registered and unregistered trademarks (whether owned or licensed to us) which appear on any of our Training Programs or Products.</li>
                        <li>The content of any of our Training Programs or Products may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without our express written consent. You may not systematically extract and/or re-utilise parts of the contents of the Training Programs or Products without our express written consent. In particular, you may not utilise any data mining, robots, or similar data gathering and extraction tools to extract (whether once or many times) for re-utilisation of any substantial parts of the Training Programs or Products without our express written consent.</li>
                    </ul>
                    <p><b>No Refund Policy</b></p>
                    <hr>
                    <p>Once paid, registration fees for the membership and other plans are non-refundable. If a registrant desires to transfer his or her training, the registration is transferable to any individual, its affiliates, subsidiaries or successors so long as registrant provides us with a minimum transferable fee within thirty (30) days written or electronic (emailed) notice of the desire to transfer the registration.</p>
                    <p>In order to exercise Your right of transfer, You must inform Us of your decision by means of a clear statement. You can inform us of your decision by:</p>
                    <ul style="padding-left:60px;">
                        <li>By email: support@livezy.com</li>
                    </ul>
                    <p><b>Pause Policy</b></p>
                    <ul style="padding-left:60px;">
                        <li>
                            If a registrant/ client desires to pause his/her training for a short period of time, he/she may do so subject to conditions by giving a notice via email to support@livezy.com, twenty-four (24) hours prior to the commencement of the training and the total number of pause days available for each membership plan are as follows:
                            <ul>
                                <li>If the registrant/ client is subscribed to a three-month membership plan, then the total number of pause days available is seventeen (17) days only.</li>
                                <li>If the registrant/ client is subscribed to a six-month membership plan, then the total number of pause days available is twenty-seven (27) days only.</li>
                                <li>If the registrant/ client is subscribed to a twelve-month membership plan, then the total number of pause days available is fifty-two (52) days only.</li>
                                <li>
                                    If the registrant/ client is subscribed to online live sessions, then the total number of pause days available for:
                                    <ul>
                                        <li>One month is three days.</li>
                                        <li>Three months is ten days.</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>You may pause your membership any number of times within the above-mentioned time limit but the minimum pause period at a single stretch is three (3) days and the maximum pause period at a single stretch is seven (7) days and the minimum number of days required to avail the next pause period should be at least fourteen (14) days after the precedent pause period.</li>
                        <li>If there is any cancellation of the pause period within three days, Liv Ezy reserves the right to deduct the total minimum of pause days (i.e. three (3) days).</li>
                    </ul>
                    <p><b>Links to Other Websites</b></p>
                    <hr>
                    <p>Our Service may contain links to third party websites or services that are not owned or controlled by the Company.</p>
                    <p>The Company has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that the Company shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with the use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>
                    <p>We strongly advise You to read the terms and conditions and privacy policies of any third-party web sites or services that You visit.</p>
                    <p><b>Termination</b></p>
                    <hr>
                    <p>We may terminate or suspend Your access immediately, without prior notice or liability, for any reason whatsoever, including without limitation if You breach these Terms and Conditions. Upon termination, Your right to use the Service will cease immediately.</p>
                    <p><b>Indemnity</b></p>
                    <p>You agree to defend, indemnify, and hold us harmless, including our subsidiaries, affiliates, and all of our respective officers, agents, partners, and employees, from and against any loss, damage, liability, claim, or demand, including reasonable attorneys’ fees and expenses, made by any third party due to or arising out of: your contributions; use of the website/mobile application; breach of these Terms and Conditions; any breach of your representations and warranties set forth in these Terms and Conditions; your violation of the rights of a third party, including but not limited to intellectual property rights; or any overt harmful act toward any other user of the website/mobile application with whom you connected via the website/mobile application. Notwithstanding the foregoing, we reserve the right, at your expense, to assume the exclusive defense and control of any matter for which you are required to indemnify us, and you agree to cooperate, at your expense, with our defense of such claims. We will use reasonable efforts to notify you of any such claim, action, or proceeding, which is subject to this indemnification upon becoming aware of it.</p>
                    <p><b>Limitation of Liability</b></p>
                    <hr>
                    <p>Notwithstanding any damages that You might incur, the entire liability of the Company and any of its suppliers under any provision of this Terms and Your exclusive remedy for all of the foregoing shall be limited to the amount actually paid by You.</p>
                    <p>To the maximum extent permitted by applicable law, in no event shall the Company or its suppliers be liable for any special, incidental, indirect, or consequential damages whatsoever (including, but not limited to, damages for loss of profits, loss of data or other information, for business interruption, for personal injury, loss of privacy arising out of or in any way related to the use of or inability to use the Service, third-party software and/or third-party hardware used with the Service, or otherwise in connection with any provision of this Terms), even if the Company or any supplier has been advised of the possibility of such damages and even if the remedy fails of its essential purpose.</p>
                    <p>Some states do not allow the exclusion of implied warranties or limitation of liability for incidental or consequential damages, which means that some of the above limitations may not apply. In these states, each party's liability will be limited to the greatest extent permitted by law.</p>
                    <p><b>"AS IS" and "AS AVAILABLE" Disclaimer</b></p>
                    <hr>
                    <p>The Service is provided to You "AS IS" and "AS AVAILABLE" and with all faults and defects without warranty of any kind. To the maximum extent permitted under applicable law, the Company, on its own behalf and on</p>
                    <p>behalf of its Affiliates and its and their respective licensors and service providers, expressly disclaims all warranties, whether express, implied, statutory or otherwise, with respect to the Service, including all implied warranties of merchantability, fitness for a particular purpose, title and non-infringement, and warranties that may arise out of course of dealing, course of performance, usage or trade practice. Without limitation to the foregoing, the Company provides no warranty or undertaking, and makes no representation of any kind that the Service will meet Your requirements, achieve any intended results, be compatible or work with any other software, applications, systems or services, operate without interruption, meet any performance or reliability standards or be error free or that any errors or defects can or will be corrected.</p>
                    <p>Without limiting the foregoing, neither the Company nor any of the company's provider makes any representation or warranty of any kind, express or implied: (i) as to the operation or availability of the Service, or the information, content, and materials or products included thereon; (ii) that the Service will be uninterrupted or error-free; (iii) as to the accuracy, reliability, or currency of any information or content provided through the Service; or (iv) that the Service, its servers, the content, or e-mails sent from or on behalf of the Company are free of viruses, scripts, trojan horses, worms, malware, timebombs or other harmful components.</p>
                    <p>Some jurisdictions do not allow the exclusion of certain types of warranties or limitations on applicable statutory rights of a consumer, so some or all of the above exclusions and limitations may not apply to You. But in such a case the exclusions and limitations set forth in this section shall be applied to the greatest extent enforceable under applicable law.</p>
                    <p><b>Other Disclaimer</b></p>
                    <hr>
                    <p>You are solely responsible for creating and implementing your own physical, mental and emotional well-being, decisions, choices, actions and results arising out of or resulting from the use of the Services and Your interactions with the Coach. As such, You agree that the Coach is not and will not be liable or responsible for any actions or inaction, or for any direct or indirect result of any services provided by the Coach. You understand coaching is not therapy and does not substitute for therapy if needed, and does not prevent, cure, or treat any mental disorder or medical disease.</p>
                    <p>You acknowledge that coaching does not involve the diagnosis or treatment of mental disorders as defined by the Indian Psychiatric Society Association and that coaching is not to be used as a substitute for counseling, psychotherapy, psychoanalysis, mental health care, substance abuse treatment, or other professional advice by legal, medical or other qualified professionals and that it is the Your exclusive responsibility to seek such independent professional guidance as needed.</p>
                    <p>If You are currently under the care of a mental health professional, it is recommended that You promptly inform the mental health care provider of the nature and extent of the coaching relationship agreed upon by You and the Coach.</p>
                    <p>You understand that in order to enhance the coaching relationship, You agree to communicate honestly, be open to feedback and assistance and create the time and energy to participate fully in the program.</p>
                    <p><b>Governing Law</b></p>
                    <hr>
                    <p>The laws of the Country, excluding its conflicts of law rules, shall govern this Terms and Your use of the Service. Your use of the Application may also be subject to applicable laws of Bangalore, India.</p>
                    <p><b>Disputes Resolution</b></p>
                    <hr>
                    <p>If any dispute, controversy or claim arises under this Agreement or in relation to any Service or the Liv Ezy Platform, including any question regarding the existence, validity or termination of this Agreement (hereinafter Dispute), the parties shall use all reasonable endeavors to resolve such Dispute amicably. If the parties are unable to resolve the Dispute amicably within 30 days of the notice of such Dispute, Liv Ezy may elect to resolve any Dispute by a binding arbitration in accordance with the provisions of the Indian Arbitration & Conciliation Act, 1996 (hereinafter Act).</p>
                    <p>Such Dispute shall be arbitrated on an individual basis and shall not be consolidated in any arbitration with any claim or controversy of any other party. The Dispute shall be resolved by a sole arbitrator, appointed in accordance with the Act. The seat of the arbitration shall be Bangalore and the language of this arbitration shall be English. Either You or Liv Ezy may seek any interim or preliminary relief from a court of competent jurisdiction in Bangalore necessary to protect the rights or the property belonging to You or Liv Ezy (or any of our agents, suppliers, and subcontractors), pending the completion of arbitration. Any arbitration shall be confidential, and neither You nor Liv Ezy may disclose the existence, content or results of any arbitration, except as may be required by law or for purposes of enforcing the arbitration award. All administrative fees and expenses of arbitration will be divided equally between You and Liv Ezy. In all arbitrations, each party will bear the expense of its own lawyers and preparation. This paragraph shall survive the termination of this Agreement.</p>
                    <p>The Parties agree that any arbitration shall be limited to the Dispute between the Parties individually. </p>
                    <ul style="padding-left:60px;">
                        To the full extent permitted by law,
                        <li>No arbitration shall be joined with any other proceeding;</li>
                        <li>There is no right or authority for any Dispute to be arbitrated on a class-action basis or to utilize class action procedures; and</li>
                        <li>There is no right or authority for any Dispute to be brought in a purported representative capacity on behalf of the general public or any other persons.</li>
                    </ul>
                    <p><b>Exceptions to Arbitration</b></p>
                    <p>The Parties agree that the following Disputes are not subject to the above provisions concerning binding arbitration:</p>
                    <ul style="padding-left:60px;">
                        <li>Any Disputes seeking to enforce or protect, or concerning the validity of, any of the intellectual property rights of a Party;</li>
                        <li>Any Dispute related to, or arising from, allegations of theft, piracy, invasion of privacy, or unauthorized use; and</li>
                        <li>Any claim for injunctive relief. If this provision is found to be illegal or unenforceable, then neither Party will elect to arbitrate any Dispute falling within that portion of this provision found to be illegal or unenforceable and such Dispute shall be decided by a court of competent jurisdiction within the courts listed for jurisdiction above, and the Parties agree to submit to the personal jurisdiction of that court.</li>
                    </ul>
                    <p><b>Severability and Waiver</b></p>
                    <hr>
                    <p><b>Severability</b></p>
                    <p>If any provision of these Terms is held to be unenforceable or invalid, such provision will be changed and interpreted to accomplish the objectives of such provision to the greatest extent possible under applicable law and the remaining provisions will continue in full force and effect.</p>
                    <p><b>Waiver</b></p>
                    <p>Except as provided herein, the failure to exercise a right or to require performance of an obligation under this Terms shall not effect a party's ability to exercise such right or require such performance at any time thereafter nor shall be the waiver of a breach constitute a waiver of any subsequent breach.</p>
                    <p><b>Translation Interpretation</b></p>
                    <hr>
                    <p>These Terms and Conditions may have been translated if We have made them available to You on our Service. You agree that the original English text shall prevail in the case of a dispute.</p>
                    <p><b>Changes to These Terms and Conditions</b></p>
                    <hr>
                    <p>We reserve the right, at Our sole discretion, to modify or replace these Terms at any time. If a revision is material We will make reasonable efforts to provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at Our sole discretion.</p>
                    <p>GST will be added to the price of purchases as deemed required by us and in consonance with the applicable laws in force at the time of transaction. We may change prices at any time. All payments shall be in Indian National Rupees.</p>
                    <p>By continuing to access or use Our Service after those revisions become effective, You agree to be bound by the revised terms. If You do not agree to the new terms, in whole or in part, please stop using the website and the Service.</p>
                    <p><b>Corrections</b></p>
                    <hr>
                    <p>There may be information on the website/mobile application that contains typographical errors, inaccuracies, or omissions, including descriptions, pricing, availability, and various other information. We reserve the right to correct any errors, inaccuracies, or omissions and to change or update the information on the website/mobile application at any time, without prior notice.</p>
                    <p><b>Contact Us</b></p>
                    <hr>
                    <p>If you have any questions about this Privacy Policy, You can contact us:</p>
                    <ul style="padding-left:60px;">
                        <li>By email: support@livezy.com</li>
                    </ul>
                </div>
                <div class="row tnc_footer" style="margin: 0;">
                    <!-- <div class="row_footer_row"> -->
                    <div class="col-md-6 first_ct" style="text-align: left;background: #e5e5e5;font-size: larger;padding: 10px;margin-left: 1;">
                        <input type="checkbox" id="test1" style="margin-right: 10px;"><span id="test1_span">Accept Terms &amp; Conditions</span>
                        <p class="tnc_text_error" style="color:red;font-size: 12px;margin-left: 26px;">Please accept terms &amp; conditions</p>
                    </div>
                    <div class="col-md-6 first_cts" style="text-align: left;background: #e5e5e5;font-size: larger;padding: 10px;margin-left: -1px;">
                        <button id="pay_tnc" class="btn btn-success pay__" style="float: right;width: -webkit-fill-available;">Pay</button>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
    <style>
        .mem-info_modal {
        max-width: 600px !important;
        }
    </style>

    <script src="fitness/js/jquery.easing.1.3.js"></script>
    <script src="fitness/js/jquery.waypoints.min.js"></script>
    <script src="fitness/js/jquery.stellar.min.js"></script>
    <script src="fitness/js/owl.carousel.min.js"></script>
    <script src="fitness/js/aos.js"></script>
    <script src="fitness/js/jquery.animateNumber.min.js"></script>
    <script src="fitness/js/scrollax.min.js"></script>
    <script src="fitness/js/main.js?v1"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Custom Js -->
    <script src="fitness/js/custom.js?v7"></script>
    <style>
        .loader-css {
        position: absolute;
        top: 40%;
        left: 44%;
        }
        .load-img {
        height: 150px;
        }
        @media screen and (max-width: 600px) and (min-width: 300px) {
        .loader-css {
        left: 32%
        }
        }
    </style>
    <div class="loader-css">
        <img class="img-responsive load-img" src="fitness/images/livezygif.gif">
    </div>
    <script>
        $(window).load(function() {
            $('.loader-css').css('display', 'none');
            $('section').css('display', 'block');
            $('footer').css('display', 'block');
            $('.nav-link').removeClass('active');
            $('.nav-link.new_home').addClass('active');
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
        })
    </script>
    <!-- Location selection modal -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
        if (isMobile) {
            var video = document.getElementById('myVideo');
            var sources = video.getElementsByTagName('source');
            sources[0].src = '/insta_img/mob_video.mp4';
            video.load();
        }
        $('.new_tnc').click(function(e) {
            $('#pay_tnc').attr($(this).data())
            if (!$('#test1').is(":checked")) {
                $('#pay_tnc').css('opacity', 0.5)
                //$('#test1_span').css('color','black')
                $('#pay_tnc').css('cursor', 'not-allowed')
            } else {
                $('#pay_tnc').css('opacity', 1)
                //$('#test1_span').css('color','black')
                $('#pay_tnc').css('cursor', 'pointer')
            }
        })
        $('body').on('click', function() {
            if ($('.sidenav').css('width') == '220px')
                document.getElementById("mySidenav").style.width = "0";
        })
        $('.collapse_head').on('click', function() {
            $('.plus_ryt').removeClass('plus_ryt_active')
            if ($($(this)[0].children).html() == '-') {
                $($(this)[0].children).html('+')
            } else {
                $($(this)[0].children).addClass('plus_ryt_active')
                $($(this)[0].children).html('-')
            }
            // if($('.plus_ryt').hasClass('plus_ryt_active')){
            // }
            $('.plus_ryt:not(.plus_ryt_active)').html('+');
        })
        $('#test1').click(function() {
            if (!$('#test1').is(":checked")) {
                $('#pay_tnc').css('opacity', 0.5)
                $('.tnc_text_error').css('display', 'none')
                $('#pay_tnc').css('cursor', 'not-allowed')
            } else {
                $('#pay_tnc').css('opacity', 1)
                $('#pay_tnc').css('cursor', 'pointer')
            }
        })
        //Razor Pay Script new
        //Razor Pay Script old
        // Country and State selection
        $(document).ready(function() {

            var date = new Date();
            var daysToExpire = 7;
            var cookieName = "ralcountry";
            var cookieStateName = "ralstate";
            date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
            $('#countryModal').submit(function(e) {
                e.preventDefault();
                $(this).find('.btn.btn-submit').text("Please wait...").prop('disabled', true);
                var cookieValue = $('#sel_country').val();
                var cookieStateValue = $('#sel_state').val();
                document.cookie = cookieName + "=" + cookieValue + "; path=/; expires=" + date.toGMTString();
                if (cookieValue == 'INDIA') {
                    document.cookie = cookieStateName + "=" + cookieStateValue + "; path=/; expires=" + date.toGMTString();
                } else {
                    var cookieStateValue = '';
                    document.cookie = cookieStateName + "=" + cookieStateValue + "; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC";
                }
                window.location.href = "<?php echo strtok($_SERVER["REQUEST_URI"], ''); ?>";
            })
            $('body').on('change', '#sel_country', function() {
                var val = $(this).val();
                if (val == 'INDIA' || val == '') {
                    $('.state-wrap').find('#sel_state').prop('required', true);
                    $('.state-wrap').fadeIn(200);
                } else {
                    $('.state-wrap').fadeOut(200);
                    $('.state-wrap').find('#sel_state').prop('required', false);
                }
            });

            // for triggering the login popup while coming from the coach profile
            from_coach_profile = localStorage.getItem('from_coach_profile');
            console.log(from_coach_profile);
            if(from_coach_profile > 0) {
                $('#loginModal').modal('toggle');
                // localStorage.removeItem('from_coach_profile');
            }

        });
        console.clear();
        function CountdownTracker(label, value) {
            var el = document.createElement('span');
            el.className = 'flip-clock__piece';
            el.innerHTML = '<b class="flip-clock__card card"><b class="card__top"></b><b class="card__bottom"></b><b class="card__back"><b class="card__bottom"></b></b></b>' +
                '<span class="flip-clock__slot">' + label + '</span>';
            this.el = el;
            var top = el.querySelector('.card__top'),
                bottom = el.querySelector('.card__bottom'),
                back = el.querySelector('.card__back'),
                backBottom = el.querySelector('.card__back .card__bottom');
            this.update = function(val) {
                val = ('0' + val).slice(-2);
                if (val !== this.currentValue) {
                    if (this.currentValue >= 0) {
                        back.setAttribute('data-value', this.currentValue);
                        bottom.setAttribute('data-value', this.currentValue);
                    }
                    this.currentValue = val;
                    top.innerText = this.currentValue;
                    backBottom.setAttribute('data-value', this.currentValue);
                    this.el.classList.remove('flip');
                    void this.el.offsetWidth;
                    this.el.classList.add('flip');
                }
            }
            this.update(value);
        }
        // Calculation adapted from https://www.sitepoint.com/build-javascript-countdown-timer-no-dependencies/
        function getTimeRemaining(endtime) {
            var t = Date.parse(endtime) - Date.parse(new Date());
            return {
                'Total': t,
                'Days': Math.floor(t / (1000 * 60 * 60 * 24)),
                'Hours': Math.floor((t / (1000 * 60 * 60)) % 24),
                'Minutes': Math.floor((t / 1000 / 60) % 60),
                'Seconds': Math.floor((t / 1000) % 60)
            };
        }
        function getTime() {
            var t = new Date();
            return {
                'Total': t,
                'Hours': t.getHours() % 12,
                'Minutes': t.getMinutes(),
                'Seconds': t.getSeconds()
            };
        }
        function Clock(countdown, callback) {
            countdown = countdown ? new Date(Date.parse(countdown)) : false;
            callback = callback || function() {};
            var updateFn = countdown ? getTimeRemaining : getTime;
            this.el = document.createElement('div');
            this.el.className = 'flip-clock';
            var trackers = {},
                t = updateFn(countdown),
                key, timeinterval;
            for (key in t) {
                if (key === 'Total') {
                    continue;
                }
                trackers[key] = new CountdownTracker(key, t[key]);
                this.el.appendChild(trackers[key].el);
            }
            var i = 0;
            function updateClock() {
                timeinterval = requestAnimationFrame(updateClock);
                // throttle so it's not constantly updating the time.
                if (i++ % 10) {
                    return;
                }
                var t = updateFn(countdown);
                if (t.Total < 0) {
                    cancelAnimationFrame(timeinterval);
                    for (key in trackers) {
                        trackers[key].update(0);
                    }
                    callback();
                    return;
                }
                for (key in trackers) {
                    trackers[key].update(t[key]);
                }
            }
            setTimeout(updateClock, 500);
        }
        var deadline = new Date('12-31-2020');
        console.log(deadline)
        var c = new Clock(deadline, function() {
            // console.log('diwali')
        });
        $('.diwali_count_down').html(c.el)
        // document.body.appendChild();12 nov-22nov
        $('.modal_close1').on('click', function() {
            $('#mem-info').hide();
        })
        $('.modal_close2').on('click', function() {
            $('#mem-info2').hide();
        })
    </script>
    <style>
        .f_p_m {
        padding: 0px;
        top: 0px;
        }
        .f_m_c {
        /* border-radius: 8px; */
        /* width: 100vw;
        height: 100vh; */
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
        .key_up_country {
        background: #EBF6FF;
        border-radius: 5px;
        }
        .outside_country_location {
        background: #FFFFFF;
        box-shadow: 2px 2px 10px rgb(193 193 193 / 25%), -2px -2px 4px rgb(245 245 245 / 25%);
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
        margin: 16px;
        }
        .circle_country_img {
        height: 25px;
        border-radius: 6px;
        box-shadow: 2px 2px 10px rgb(193 193 193 / 25%), -2px -2px 4px rgb(245 245 245 / 25%);
        }
        #loginModal .modal-content {
        border: none;
        }
        .login-img {
        width: 24%;
        /* margin-left: 34%; */
        margin-top: 12%;
        }
        .login_text_l {
        font-size: 48px;
        margin-top: 30px;
        font-weight: 600;
        line-height: 1.1;
        margin-bottom: 20px;
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
        margin-top: 0px;
        font-size: 20px;
        }
        .margin-ul {
        margin-top: 50px;
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
        width: 325px;
        border: none;
        outline: none;
        border-bottom: 1px solid #b3a6a6;
        font-size: 20px;
        letter-spacing: 2px;
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
        .modal-dialog:not(.modal-lg) {
        max-width: 400px;
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
        margin-top: -10px !important;
        margin-right: -6px !important;
        font-size: 40px !important;
        z-index: 9;
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
        #loginModal .modal-content {
        border: none;
        }
        .l_c {
        top: 6px;
        /* bottom: 0; */
        position: absolute;
        right: 10px;
        }
    </style>

    <!-- phone script start -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <script type="text/javascript">

        $(function () {
            var code = "+91"; // Assigning value from model.
            $('#txtPhone').val(code);
            $('#txtPhone').intlTelInput({
                autoHideDialCode: true,
                autoPlaceholder: "ON",
                dropdownContainer: document.body,
                formatOnDisplay: true,
                hiddenInput: "full_number",
                initialCountry: "auto",
                nationalMode: true,
                placeholderNumberType: "MOBILE",
                preferredCountries: ['US'],
                separateDialCode: true
            });
            $('#btnSubmit').on('click', function () {
                var code = $("#txtPhone").intlTelInput("getSelectedCountryData").dialCode;
                var phoneNumber = $('#txtPhone').val();
                var name = $("#txtPhone").intlTelInput("getSelectedCountryData").name;
                alert('Country Code : ' + code + '\nPhone Number : ' + phoneNumber + '\nCountry Name : ' + name);
            });
        });

        $(document).ready(function() {

            var whatsapp_no = <?php echo config('app.contact_whatsapp'); ?>;

            $('.whatsapp-icon-div').on('click', function() {
                window.open('https://api.whatsapp.com/send/?phone='+whatsapp_no+'&text=Hey%2C%20I%20would%20like%20to%20know%20more%20about%20the%20online%20fitness%20coaching&app_absent=0', '_blank')
            });

            // $('.whatsapp-icon-div').hide();

            // $('.close-icon').on('click',function() {
            //     $('.card').hide();
            //     $('.close-icon').hide();
            //     $('.whatsapp-icon-div').show();
            // });

            $('#home_').on('click',function() {
                window.location.href="/";
            });

            $('#meet_the_team').on('click', function() {
                window.location.href = '/meet-the-team';
            });

            $('#live_workouts').on('click', function() {
                window.location.href = '/live-workouts';
            });

            $('#recipes_').on('click', function() {
                window.location.href = '/recipes';
            });

            $('#blogs_').on('click', function() {
                window.location.href = '/blogs';
            });

            $('#aboutus').on('click', function() {
                window.location.href = '/aboutus';
            });

            $('#contact_us').on('click', function() {
                window.location.href = '/contact-us';
            });

        });
    </script>

    <!-- phone script ends -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

</body>

</html>
