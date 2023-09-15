<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
        <title> Liv Ezy - A Community which helps you to achieve your fitness goal</title>
        <link rel="stylesheet" href="fitness/css/profile.css" rel="stylesheet">
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!-- SideBar-Menu CSS -->
    <!-- <link rel="stylesheet" href="login/css/styles.css"> -->

	<!-- Demo CSS -->
	<!-- <link rel="stylesheet" href="login/css/demo.css"> -->
<!--
    <link rel="stylesheet" href="fitness/css/pricing_css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="fitness/css/pricing_css/table_pricing.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="fitness/css/profile.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@200&display=swap" rel="stylesheet">
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/css/intlTelInput.css" rel="stylesheet" type="text/css">
  <link rel="icon" type="image/png" href="fitness/images/png2.png">


    <link rel="stylesheet" href="fitness/css/pagination/jqpaginator.css" type="text/css"/>
    <link rel="stylesheet" href="fitness/css/pagination/styles.css" type="text/css"/>
    <!-- chart css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/js/intlTelInput.js"></script>
    <script src="fitness/js/pagination/jqpaginator.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script> -->

    <style>
        body{
            background:#fff;
        }
        .ques-all{
            background:#d9f3f3;
        }
        /* .header-ques{
            background:url('fitness/images/question_banner.png');
            background-size:cover;
            height:218px;
        } */
        .header_logo {
            margin-left: 8px!important;
            margin-top: -12px;
        }
        .logo .mr-auto{
            margin-top:-5px;
        }
        .all-style{
            /* padding-left:11%; */
            /* padding-right:11%; */
            font-family: sans-serif;
        }
        .title-ques{
            font-size: 1.5em;
            padding-bottom: 40px;
        }
        .heading-quest{
            height: 60px;
            /* width: 80px; 3887fb*/
            background: #000;
            color: #fff;
            font-size: 1.5em;
            width: 355px;
            /* line-height: 54px; */
            border-radius: 8px;
            font-weight: bold;
            padding: 16px;
            box-shadow: 0 3px 6px 0 rgb(0 0 0 / 69%);
            text-align:center;
            margin-top:15px;
        }
        .outer-box-ques{
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            /* box-shadow: 0 3px 6px 0 rgb(0 0 0 / 69%); */
            margin-bottom:20px;
            font-size: 1.5em;
            transition: background-color 200ms cubic-bezier(0.0,0.0,0.2,1);
            background-color: #fff;
            border: 1px solid #dadce0;
            border-radius: 8px;
            margin-bottom: 12px;
            padding: 24px;
            page-break-inside: avoid;
            word-wrap: break-word;

        }
        .ques_desc{
            /* margin-top:-10px; */
            /* margin-top: -10px; */
            margin-top: -10px;
            /* margin-top: -10px; */
            font-family: Open Sans;
            font-style: normal;
            /* font-weight: 600; */
            font-size: 0.6em;
            /* line-height: 14px; */
            color: #000000;
            margin-bottom: 20px;
        }
        .in_ques{
            overflow-wrap: break-word;
            resize: none;
            /* height: 45px; */
            border: none;
            border-bottom: 1px solid #000;
            width: -webkit-fill-available;
            margin-top: 28px;
            padding-left: 8px;
            background-color: #fff!important;
            outline: none;
            border: none!important;
            border-bottom: 1px solid #e5e5e5!important;
            /* line-height: 42px; */
        }
        .in_ques:focus{
            outline:none;
        }
        .ques_checkbox{
            bottom: 0;
            height: 20px;
            left: 0;
            right: 0;
            top: 0;
            width: 20px;
        }
        .radio_text{

            position: absolute;
            padding-top: 0px;
            padding-left: 8px;
            /* font-size: 0.9em; */
            /* font-family: 'Google Sans', Roboto, Helvetica, Arial, sans-serif; */
            /* font-size: 14px; */
            letter-spacing: .1px;
            /* line-height: 24px; */
            color: #202124;
            /* font-weight: 400!important; */
            /* width: 100%; */
            word-break: break-word;
            font-family: Open Sans;
            font-style: normal;
            /* font-weight: 600; */
            padding-right:18px;
            font-size: 0.6em;
        }
        sup{
            color:red;
        }
        /* .ques_checkbox:checked:after{
            background-color:red;
        } */
        .ques_checkbox:checked ~ .ques_checkbox::before {
            color: #fff;
            border-color: #7B1FA2;
            background-color: #7B1FA2;
        }
        .ques-all{
            margin-top: 0px!important;
            /* width: 100%!important;*/
            margin-left: 130px!important;
            padding: 30px!important;
            transition: all 0.3s ease;
        }
        .radio_style{
            display:inline-block;
            padding-left:24px;
        }
        .pop_up_for_all{
            background: #fff;
            box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
            width: 300px;
            /* height: 500px; */
            position: absolute;
            left: 50%;
            z-index: 9;
            border-radius: 10px;
            top: 20%;
            transition: all 1s ease;
            display:none;
        }
        .pop_up_close_btn{
            float: right;
            padding: 12px;
            cursor:pointer;
        }
        .pop_up_heading{
            font-size: 20px;
            font-family: sans-serif;
            margin-top: 34px;
            text-align: center;
            font-weight: bold;
        }
        .pop_up_body_text{
            font-size:18px;
            font-family: sans-serif;
        }
        .pop_up_body{
            padding: 12px;
            text-align: justify;
        }
        .responsive-logos{
            height:30px;
        }
        .main_container .container{
            margin-top:-10px;
        }


        /* html {
            height: 100%
        }

        p {
            color: grey
        } */

        #heading {
            text-transform: uppercase;
            color: #673AB7;
            font-weight: normal
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 10px
        }

        #msform fieldset {
            /* background: white; */
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .form-card {
            text-align: left;
            /* background: #1f89e0; */
            /* margin-left:22px;
            margin-right: 22px; */
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform input,
        #msform textarea {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            /* margin-bottom: 25px; */
            margin-top: -16px;
            /* width: 100%; */
            box-sizing: border-box;
            /* font-family: montserrat; */
            color: #2C3E50;
            background-color: #ECEFF1;
            /* font-size: 16px; */
            letter-spacing: 1px;
            font-family: Open Sans;
            font-style: normal;
            font-weight: 500;
            font-size: 0.6em;
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #673AB7;
            outline-width: 0
        }
        .head_ques_font{
            font-family: Open Sans;
            font-style: normal;
            font-weight: bold;
            font-size: 1em;
            line-height: 16px;
            color: #FFFFFF;
            margin-top: -20px;
            margin-bottom: 15px;
        }
        .head_ques_sub_font{
            font-family: Open Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 0.8em;
            line-height: 12px;
            /* text-align: center; */
            color: #FFFFFF;
            margin-bottom: 15px;
        }
        #msform .action-button {
            width: 80px;
            height:34px;
            background: #2E2E2E;
            box-shadow: 2px 2px 10px rgba(38, 38, 38, 0.25), -2px -2px 4px rgba(146, 146, 146, 0.25);
            border-radius: 15px;
            font-family: Open Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 188.2%;
            /* identical to box height, or 23px */
            border:none;
            text-align: center;

            color: #FFFFFF;
            /* background-color: #fff;
            color:#36cccb;
            font-weight: bold;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right
            margin-bottom */
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background: #2E2E2E;
            color: white;

        }

        #msform .action-button-previous {
            margin: 10px 18px 10px 14px;
            /* float: right; */
            width: 80px;
            height: 34px;
            background: #2E2E2E;
            box-shadow: 2px 2px 10px rgb(38 38 38 / 25%), -2px -2px 4px rgb(146 146 146 / 25%);
            border-radius: 15px;
            font-family: Open Sans;
            font-style: normal;
            font-weight: 600;
            font-size: 12px;
            line-height: 188.2%;
            border: none;
            text-align: center;
            color: #FFFFFF;
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000
        }

        .card {
            z-index: 0;
            border: none;
            position: relative;
            background:transparent!important;
            top: 26px;
        }

        .fs-title {
            font-size: 25px;
            color: #673AB7;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left
        }

        .purple-text {
            color: #fff;
            font-weight: normal
        }

        .steps {
            font-size: 25px;
            color: gray;
            margin-bottom: 10px;
            font-weight: normal;
            text-align: right
        }

        .fieldlabels {
            color: gray;
            text-align: left
        }

        #progressbar {
            margin-top: 15px;
            overflow: hidden;
            color: lightgrey;
            padding-left:0px;
        }

        #progressbar .active {
            color: #36cccb;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 24%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar #account:before {
            /* font-family: FontAwesome;
            content: "\f13e"; */
            /* background:url(/insta_img/apple_color.png);
            background-size:cover; */
        }
        .account_id{
            background-image: url(/insta_img/color_tracker_1.png);
            /* background-size: contain; */
            width: 32px;
            height: 50px;
            background-color:#1c85df!important;
            margin: 0 auto 10px auto;
            background-position: center center;
            background-size: 32px Auto;
            background-repeat: no-repeat;
            border-radius: 50%;
        }
        .mob_lg{
            margin-top:5px;
        }
        .login2 {
            margin-top: 6px;
        }
        .personal_id{
            background-image: url(/insta_img/white_tracker_2.png);
            /* background-size: contain; */
            width: 32px;
            height: 50px;
            background-color:#1c85df!important;
            margin: 0 auto 10px auto;
            background-position: center center;
            background-size: 32px Auto;
            background-repeat: no-repeat;
            border-radius: 50%;
        }
        .payment_id{
            background-image: url(/insta_img/cardiogram.png);
            /* background-size: contain; */
            width: 32px;
            height: 50px;
            background-color:#1c85df!important;
            margin: 0 auto 10px auto;
            background-position: center center;
            background-size: 32px Auto;
            background-repeat: no-repeat;
            border-radius: 50%;
        }
        .confirm_id{
            background-image: url(/insta_img/notebook.png);
            /* background-size: contain; */
            width: 32px;
            height: 50px;
            background-color:#1c85df!important;
            margin: 0 auto 10px auto;
            background-position: center center;
            background-size: 32px Auto;
            background-repeat: no-repeat;
            border-radius: 50%;
        }
        .active_bck{
            background-color:transparent;
        }
        .active.personal_id{
            background-color:transparent;
        }
        .active.payment_id{
            background-color:transparent;
        }
        .active.confirm_id{
            background-color:transparent;
        }
        .error_border{
            border: solid 1px red;
        }
        /* #progressbar #personal:before {
            font-family: FontAwesome;
            content: ""
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: ""
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: ""
        } */

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar .li_cl:after{
            content: '';
            width: 100%;
            height: 4px;
            background: lightgray;
            position: absolute;
            left: 45%;
            top: 25px;
            z-index: -1;
            /* border-radius:32px; */
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #2ce43f
        }

        .progress {
            height: 20px
        }

        .progress-bar {
            background-color: #36cccb
        }

        .fit-image {
            /* width: 100%; */
            object-fit: cover;
            height:50px;
        }
        /* .header-ques{
                    background:url('fitness/images/question_banner.png');
                    background-size:cover;
                    height:179px;
                } */
                .ques-all-new{
                    /* background:#d9f3f3; */
                    /* background: linear-gradient(
                        180deg
                        , #187FDE 0%, #5BE5F8 100%); */
                }
                .main_dashboard{
                    background: linear-gradient(
        180deg
        , #1c85df 0%, #1c85df 100%);

        }
        fieldset{
            /* background:#d9f3f3!important; */
            /* background: linear-gradient(
                180deg
                , #187FDE 0%, #5BE5F8 100%)!important; */
        }
        .question_20{
            display:none;
        }
        .active_menu{
            background: #2789E3;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            text-align: center;
        }
        .t_d_n{
            text-decoration:none;
            color:#000;
        }
        .t_d_n:hover{
            text-decoration:none;

        }
        .menu_li{
            list-style: none;
            /* color: #000; */
            padding: 12px;
            font-size: 16px;
            text-align: center;

        }
        .menu_li_span{

        }
        .active_menu a{
            color:#fff;
        }
        .p_ul {
            padding-inline-start: 0px;
            margin-top:100px;
        }
        .active{
            background: transparent!important;
        }
    </style>

    <script>
        function convertTZ(date, tzString) {
            var date=date.replace(/ /g,"T")
            return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));
        }
    </script>
</head>

<body>

    <div class="pop_up_for_all">
        <p class="pop_up_close_btn">X</p>
        <p class="pop_up_heading">Questionarie</p>
        <p class="pop_up_sub_heading"></p>
        <div class="pop_up_body">
            <p class="pop_up_body_text">
                Please fill in the questionnaire if you want to proceed
            </p>
        </div>
        <p class="pop_up_footer"></p>
    </div>
    <div class="container-fluid">
    <div class="row ques-all-new justify-content-center">
        <div class="col-md-2 question_menu">
            <ul class="p_ul">
                <li id="create_live_session" class="nav-item menu_li active_menu">
                    <a href="#" class="t_d_n">
                        <span class="title menu_li_span">Brief</span>
                    </a>
                </li>
                <li id="notification" class="nav-item menu_li">
                    <a href="#" class="t_d_n">
                        <span class="title menu_li_span">Renew</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <!-- <div class="">
                <div class="col-md-12 header-ques">

                </div>
            </div> -->
                <form id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="li_cl active" id="account"><div class="account_id active_bck"></div></li>
                        <li class="li_cl" id="personal"><div class="personal_id"></div></li>
                        <li class="li_cl" id="payment"><div class="payment_id"></div></li>
                        <li class="" id="confirm"><div class="confirm_id"></div></li>
                    </ul>
                    <!-- <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>  -->
                    <br> <!-- fieldsets -->

                            <?php

            $section=$data[0]->section;
            $c=0;
            for($i=0;$i<sizeof($data);$i++){
                if($i!=0)
                    $section=$data[$i-1]->section;
                $n=$data[$i]->section;
                // print($answer_user[$data[$i]->id]);


        ?>
        <?php
            if($i==0){
                echo '<fieldset>
                <div class="form-card">';
            }
            else if($i==10){
                echo '<fieldset>
                <div class="form-card">';
            }
            else if($i==20){
                echo '<fieldset>
                <div class="form-card">';
            // }else if(($i==23 && $gender!='Male') || ($i==22 && $gender=='Male')){
            } else if($i==23 || $i==22){
                echo '<fieldset>
                <div class="form-card">';
            }
        ?>


            <div class="row">
                <div class="col-md-12 all-style question_<?php echo $data[$i]->id;?>">
                <?php

                    if($section!=$n || $i==0){
                        $c++;
                        if($i==10)
                            $c=2;
                ?>
                    <div class="head_ques_font">
                        {{$data[$i]->section}}
                    </div>
                    <div class="head_ques_sub_font">
                        Thank you for renewing with us, please fill in these details so we can upgrade your plan accordingly.
                    </div>
                <?php
                    }
                ?>
                    <div class="outer-box-ques">
                        <div class="ques-box">
                            <p class="ques_desc" id="id{{$data[$i]->id}}" data-type="{{$data[$i]->type}}" data-questionRequred="{{$data[$i]->required}}">{{$data[$i]->id.'. '.$data[$i]->question_desc}}<sup>{{$data[$i]->required?'*':''}}</sup></p>
                        <?php
                            switch($data[$i]->type){
                                case 'textarea':
                        ?>

                                        <textarea id="{{$data[$i]->id}}"  data-required="{{$data[$i]->required}}" class="in_ques ques_{{$data[$i]->id.'_'.$data[$i]->required}}" placeholder="Type here"></textarea>

                        <?php
                                break;
                                case 'radio':
                                    $opt_value=explode(",",$data[$i]->option);
                                    for($k=0;$k<sizeof($opt_value);$k++){
                                    ?>
                                        <p><input class="ques_checkbox" onclick="handleClick(this);" value="{{$opt_value[$k]}}" type="radio" name="radio_{{$data[$i]->id}}" />
                                            <span class="radio_text">
                                                <?php echo $opt_value[$k]; ?>
                                            </span>
                                        </p>
                                    <?php
                                    }
                                break;
                                case 'checkbox':
                                    $opt_value=explode(",",$data[$i]->option);
                                    for($k=0;$k<sizeof($opt_value);$k++){

                                    ?>
                                        <p><input class="ques_checkbox ques_{{$data[$i]->id.'_'.$data[$i]->required}}"  type="checkbox" value="{{$opt_value[$k]}}" name="checkbox_{{$data[$i]->id}}" /> <span class="radio_text">{{$opt_value[$k]}}</span></p>

                                    <?php
                                    }
                                break;
                                case 'time':
                                    ?>
                                    <p><input  id="{{$data[$i]->id}}"  class="ques_checkbox ques_{{$data[$i]->id}}" style="width:fit-content;" type="time" name="time_{{$data[$i]->id}}"/> </span></p>
                                    <?php
                                break;
                                default:echo 'extra';
                        ?>

                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            //echo 'kumar'.$i;
            if($i==9){
                echo '</div>
                <button name="next" data-count="2" data-prev="account_id" data-next="personal_id" data-id="'.$i.'" id="first_check" class="next action-button" value="Next" >Next</button>
                </fieldset>';
            }
            else if($i==19){
                echo '</div>
                <button data-count="1" data-prev="account_id" data-next="personal_id" type="button" name="previous" class="previous action-button-previous" value="Previous"  >Previous</button><button type="button" name="next" data-id="'.$i.'" class="next action-button" data-count="3" data-prev="personal_id" data-next="payment_id" id="second_check" value="Next" >Next</button>
                </fieldset>';
            }
            else if(($i==22 && $gender!='Male') || ($i==21 && $gender=='Male')){
                echo '</div>
                <button type="button" data-count="3" name="previous" data-prev="personal_id" data-next="payment_id" class="previous action-button-previous" value="Previous"  >Previous</button><button type="button" name="next" data-id="'.$i.'" class="next action-button" data-count="4" data-prev="payment_id" data-next="confirm_id" id="third_check" value="Next"  >Next</button>
                </fieldset>';
            // }else if(($i==24 && $gender!='Male') || ($i==23 && $gender=='Male')){
            }else if($i==23 || $i==22){
                echo '</div>
                <button type="button" data-count="4" data-prev="payment_id" data-next="confirm_id" name="previous" class="previous action-button-previous" value="Previous"  >Previous</button><button type="button" data-id="'.$i.'" id="question_submit" name="submit" class="next action-button" value="Submit"  >Submit</button>
                </fieldset>';
            }

}
        ?>
        <fieldset style="background:#6f6f6f!important;">
            <div class="form-card">
            <br><br>
                <div class="row justify-content-center">
                    <div class="col-3"> <img src="/insta_img/tick-inside-circle_s.png" class="fit-image"> </div>
                </div>
                <h2 class="purple-text text-center"><strong>Thank You!</strong></h2> <br>

                <div class="row justify-content-center">
                    <div class="col-7 text-center">
                        <h5 class="purple-text text-center">Your Questionaire has been successfully submitted</h5>
                    </div>
                </div>
            </div>
        </fieldset>


                    <!-- <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Personal Information:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 2 - 4</h2>
                                </div>
                            </div> <label class="fieldlabels">First Name: *</label> <input type="text" name="fname" placeholder="First Name" /> <label class="fieldlabels">Last Name: *</label> <input type="text" name="lname" placeholder="Last Name" /> <label class="fieldlabels">Contact No.: *</label> <input type="text" name="phno" placeholder="Contact No." /> <label class="fieldlabels">Alternate Contact No.: *</label> <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                        </div>

                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Image Upload:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 3 - 4</h2>
                                </div>
                            </div> <label class="fieldlabels">Upload Your Photo:</label> <input type="file" name="pic" accept="image/*"> <label class="fieldlabels">Upload Signature Photo:</label> <input type="file" name="pic" accept="image/*">
                        </div> <input type="button" name="next" class="next action-button" value="Submit" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
                    </fieldset>
                    <fieldset>
                        <div class="form-card">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="fs-title">Finish:</h2>
                                </div>
                                <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                </div>
                            </div> <br><br>
                            <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                            <div class="row justify-content-center">
                                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                            </div> <br><br>
                            <div class="row justify-content-center">
                                <div class="col-7 text-center">
                                    <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                </div>
                            </div>
                        </div>
                    </fieldset> -->
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $('.sidebar__inner ul li').on('click',function(){
        $('.pop_up_for_all').css('display','block');
    })
    $('.pop_up_close_btn').on('click',function(){
        $('.pop_up_for_all').css('display','none');
    })
    $(document).ready(function(){

        $('.mobile-nav-toggle').attr('disabled','true');
        // $('.nav-item').on('click',function(e){
        //     $('.nav-item').removeClass('active_menu');
        //     $(this).addClass('active_menu');
        //     var id=$(this).attr('id');
        //     $('.p_d').css('display','none');
        //     $('.'+id).css('display','block');
        //     // document.location.hash = ' ';
        //     // history.pushState('data to be passed', 'Admin', `/admin-dashboard?${id}`);

        // })
        var question_data=[];
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);
        var quest_data=[];
        var condition=true;
        $(".next").click(function(){
            $(window). scrollTop(0)
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            var total_loop=parseInt($(this).attr('data-id'))+1;
            if(total_loop==23) {total_loop=24;}
            else if(total_loop==24) {total_loop=25;}
            for(var i=1;i<=total_loop;i++){
                console.log($('#id'+i).attr('data-questionRequred'),$('#ques_id'+i).attr('data-type'))
                var data_type=$('#id'+i).attr('data-type');
                var required_ques=$('#id'+i).attr('data-questionRequred');
                // if(parseInt(required_ques)){

                // }
                var id_ques=i;
                var ques_val;
                var each_question={};
                switch(data_type) {
                    case 'textarea':
                        ques_val=$('#'+id_ques).val();
                        break;
                    case 'radio':
                        ques_val=$('input[name="radio_'+id_ques+'"]:checked').val();
                        break;
                    case 'checkbox':
                        var checked_array=[];
                        $('input[name="checkbox_'+id_ques+'"]:checked').each(function() {
                            checked_array.push(this.value)
                        });

                        ques_val=checked_array;
                        break;
                    case 'time':
                        ques_val=$('#'+id_ques).val();
                        break;
                }
                $('.question_'+i+' .outer-box-ques').removeClass('error_border');
                if(parseInt(required_ques)==1){
                    // if(i!=20 || quest_data[20]!='Home Workout'){
                        // console.log('string length',ques_val.length)
                        console.log('inside',i);


                        if(!ques_val && i!=24){
                            $('.question_'+i+' .outer-box-ques').addClass('error_border');
                            condition=false;
                            var string=$('#id'+i).text();
                            toastr.error('Please Fill '+string.substring(string.lastIndexOf(". ") + 1).replace('*',''));
                            return false
                        }
                    // }
                }
                if(i==20){
                    if($('.question_20').css('display')=='block'){
                        if(ques_val==undefined){
                                $('.question_'+i+' .outer-box-ques').addClass('error_border');
                                condition=false;
                                var string=$('#id'+i).text();
                                toastr.error('Please Fill '+string.substring(string.lastIndexOf(". ") + 1));
                                return false
                            }
                    }
                }

               // each_question[id_ques]=ques_val;

                quest_data[id_ques]=ques_val;
            }
            //alert();
            //tracker image pop-up
            var image_number_next=parseInt($(this).attr('data-count'));
            var image_number_prev=image_number_next-1;
            var data_id_color=$(this).attr('data-next');
            var data_id_white=$(this).attr('data-prev');
            $('.'+data_id_color).css('background-image','url("/insta_img/color_tracker_'+image_number_next+'.png")');
            $('.'+data_id_white).css('background-image','url("/insta_img/white_tracker_'+image_number_prev+'.png")');

            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            $("#progressbar li div").eq($("fieldset").index(next_fs)).addClass("active_bck");


            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
            step: function(now) {
            // for making fielset appear animation
            opacity = 1 - now;

            current_fs.css({
            'display': 'none',
            'position': 'relative'
            });
            next_fs.css({'opacity': opacity});
            },
            duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function(){

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //tracker image pop-up
        var image_number_next=parseInt($(this).attr('data-count'));
        var image_number_prev=image_number_next+1;
        if(image_number_next==4){
            image_number_next=3;
            image_number_prev=4;
        }
        var data_id_color=$(this).attr('data-next');
        var data_id_white=$(this).attr('data-prev');
        $('.'+data_id_white).css('background-image','url("/insta_img/color_tracker_'+image_number_next+'.png")');
        $('.'+data_id_color).css('background-image','url("/insta_img/white_tracker_'+image_number_prev+'.png")');
        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
        $("#progressbar li div").eq($("fieldset").index(next_fs)).removeClass("active_bck");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
        step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
        'display': 'none',
        'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
        },
        duration: 500
        });
        setProgressBar(--current);
        });

        function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
        .css("width",percent+"%")
        }
        $('#first_check').on('click',function(){
            return false;
        })
        function quest(){
            window.location.href="/";
        }
        $('#question_submit').on('click',function(){
            condition=true;
            if(condition){
                $.ajax({
                    url:'question_submit',
                    type:'post',
                    data:{"_token": "{{ csrf_token() }}","answer":JSON.stringify(quest_data)},
                    global:true,
                    async:false,
                    success:function(response){
                        console.log(quest_data)
                        setTimeout(
                            function () {
                                quest();
                            },
                            1000
                        );
                    }
                })
            }else{
                //toastr.error('Please Fill Required field');

            }
        })


});
$('.ques_22_1').on('click',function(){
    if($(this).val()!='None'){
        $("input[value=None]").prop("checked",false);
    }else{
            $("input[value=Thyroid]").prop("checked",false);
            $("input[value=Diabetics]").prop("checked",false);
        }
})
$('.ques_20_2').on('click',function(){
    if($(this).val()!='None'){
        $("input[value=None]").prop("checked",false);
    }else{
            $("input[value=Dumbells]").prop("checked",false);
            $("input[value=Barbells]").prop("checked",false);
            $('input[value="Resistance Bands"]').prop("checked",false);

        }
})
function handleClick(myRadio) {
    if(myRadio.value=="Home workout")
        $('.question_20').css('display','block');
    if(myRadio.value=="Gym")
        $('.question_20').css('display','none');

    if(myRadio.value=="Vegetarian (Consumes dairy products)"){
        $("input[value=Monday]").prop("checked",false);
        $("input[value=Monday]").prop("disabled",true);

        $("input[value=Tuesday]").prop("checked",false);
        $("input[value=Tuesday]").prop("disabled",true);

        $("input[value=Wednesday]").prop("checked",false);
        $("input[value=Wednesday]").prop("disabled",true);

        $("input[value=Thursday]").prop("checked",false);
        $("input[value=Thursday]").prop("disabled",true);

        $("input[value=Friday]").prop("checked",false);
        $("input[value=Friday]").prop("disabled",true);

        $("input[value=Saturday]").prop("checked",false);
        $("input[value=Saturday]").prop("disabled",true);

        $("input[value=Sunday]").prop("checked",false);
        $("input[value=Sunday]").prop("disabled",true);


    }else{
        $("input[value=Monday]").prop("disabled",false);
        $("input[value=Tuesday]").prop("disabled",false);
        $("input[value=Wednesday]").prop("disabled",false);
        $("input[value=Thursday]").prop("disabled",false);
        $("input[value=Friday]").prop("disabled",false);
        $("input[value=Saturday]").prop("disabled",false);
        $("input[value=Sunday]").prop("disabled",false);

    }
}

</script>
