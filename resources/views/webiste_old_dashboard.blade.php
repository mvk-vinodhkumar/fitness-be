<?php
// echo '<pre>';
// print_r($users);
// die();
// echo '<pre>';
// print_r(session()->all());
// die();
// if(Session::has('mob_no')){
//     echo 'true';
// }else{
//     echo 'false';
// }
// die();
?>
<?php

setlocale(LC_MONETARY, 'en_IN');

function moneyFormatIndia($num) {

    $explrestunits = "" ;

    if(strlen($num)>3) {

        $lastthree = substr($num, strlen($num)-3, strlen($num));

        $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits

        $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.

        $expunit = str_split($restunits, 2);

        for($i=0; $i<sizeof($expunit); $i++) {

            // creates each of the 2's group and adds a comma to the end

            if($i==0) {

                $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer

            } else {

                $explrestunits .= $expunit[$i].",";

            }

        }

        $thecash = $explrestunits.$lastthree;

    } else {

        $thecash = $num;

    }

    return $thecash; // writes the final format where $currency is the currency symbol.

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title> Liv Ezy - A Community which helps you to achieve your fitness goal</title>
    <link rel="icon" type="image/png" href="fitness/images/png2.png">
    <!-- <link rel="manifest" href="/manifest.json"> -->
        <link rel="stylesheet" href="fitness/css/profile.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.css" />
  
        <!-- datepicker pause start -->
        <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <!-- datepicker pause end -->


	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<!-- jQuery -->
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!-- SideBar-Menu CSS -->
    <link rel="stylesheet" href="login/css/styles.css">

	<!-- Demo CSS -->
	<link rel="stylesheet" href="login/css/demo.css">
    
    <link rel="stylesheet" href="fitness/css/pricing_css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="fitness/css/pricing_css/table_pricing.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="fitness/css/profile.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/css/intlTelInput.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="fitness/css/pagination/jqpaginator.css" type="text/css"/>
    <link rel="stylesheet" href="fitness/css/pagination/styles.css" type="text/css"/>


    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.13.0/themes/prism.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/components/icon.min.css"> -->
    <link rel="stylesheet" type="text/css" href="login/css/pignose.calendar.min.css"/>

    <!-- chart css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/js/intlTelInput.js"></script>
    <script src="fitness/js/pagination/jqpaginator.js"></script>
    <script type="text/javascript" src="login/js/pignose.calendar.full.min.js"></script>



	<script>
		$(document).ready(function(){
			$(".hamburger .hamburger__inner").click(function(){
			  $(".wrapper").toggleClass("active")
			})

			$(".top_navbar .fas").click(function(){
			   $(".profile_dd").toggleClass("active");
			});
		})
        function convertTZ(date, tzString) {
            return new Date((typeof date === "string" ? new Date(date) : date).toLocaleString("en-US", {timeZone: tzString}));   
        }
	</script>
</head>
<body>
<div class="overlay">
            <!--  -->
        </div>
<style>
.lid{
    display:none;
}
 .overlay {
        display:none;
        position:fixed;
        top:0;
        height:100%;
        width:100%;
        padding:50px;
        background:#2789E3;
        overflow:auto;
        z-index:1050;
    }
    .overlay_close{
        font-size: 26px;
        color: #000;
        position: absolute;
        top: 19px;
        z-index: 9;
        left: 65px;
        cursor: pointer;
    }
body{
    background:#fff;
}

.btn:not(:disabled):not(.disabled){
    width:auto;
}
    .table-section{
        padding-top: unset;
        padding-bottom:unset;
    }
    .pay_style{
        display:flex;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity 600ms, visibility 600ms;
            transition: opacity 600ms, visibility 600ms;
    }
    .m_b_p{
        margin-right:10px;
    }
    .p_d{
        display:none;
    }
    /* .live_session{
        display:block;
    } */
    .l_s_i{
        width:100%;
    }
    .main_container .sidebar ul li a:hover{
        text-decoration:none;
    }
    .main_container .sidebar ul li a:hover, .main_container .sidebar ul li a.active {
                background: #2dd1d1;
                color: #fff;
            }
    .top-date{
        display:flex;
        padding-top:38px;
    }
    .b_l_s{
        font-size: 20px;
        font-weight: 800;
        font-family: sans-serif;
        text-align: center;
        padding-top: 30px;
    }
    .l_d{
        width: 50px;
        height: 50px;
        /* border: 1px solid #12eceb; */
        border-radius: 26px;
        line-height: 52px;
        text-align: center;
        color: #fff;
        cursor:pointer;
        background:#000;
        font-weight:bold;
    }
    .l_d.active{
        box-shadow: 0 5px 26px -5px rgb(0 180 231);
        background: #12eceb;
    }
    .l_d:hover{
        box-shadow: 0 5px 26px -5px rgb(0 180 231);
        background: #12eceb;
    }
    .inside_date{
        margin-left:50px;
    }
    .n_d{
        text-align: center;
        line-height: 90px;
        font-weight: bold;
        font-size:16px;
    }
    .hr_d{
        width: 45%;
        margin-left: 80px;
        margin-bottom:20px;
    }
    .slot_d{
        display: flex;
        margin: 20px;
        font-size: 20px;
    }
    .slot_time{
        line-height:52px;
    }
    .slot_book{
        width: 200px;
        height: 48px;
        border: 1px solid #16d0cf;
        text-align: center;
        line-height: 50px;
        margin-left: 50px;
        color: #16d0cf;
        cursor:pointer;
        border-radius:8px;
        font-weight: bold;
    }
    .slot_book:hover{
        color: #16d0cf;
        box-shadow: 0 5px 15px -5px rgb(0 0 0 / 30%);
    }
    .slot_book.inactive{
        background-color: #e6e6e6;
        color: #a7a7a7;
        cursor: not-allowed;
    }
    .top_navbar{
        z-index:9;
        position:absolute;

    }
    
    .fa-user{
        /* color:#fff!important; */
    }
    .paid_container{
        width:29%;/*31*/
        
    }
    .info_p{
        font-family: 'Font Awesome 5 Brands';
        font-size: 20px;
        font-weight: 700;
    }
    .h3_text_c{
        margin-top: 62px;
        margin-bottom: 26px;
    }
    .h3_text_d{
        margin-top: 80px;
        margin-bottom: 14px;
    }
    .pause_contain{
        /* margin: 16px; */

            /* margin: 16px; */
        background: linear-gradient(
    179.34deg
    , #8398FD 0.57%, #43D2FF 105.36%);
        box-shadow: 7px 7px 15px rgb(0 0 0 / 25%), -7px -7px 15px rgb(255 255 255 / 30%);
        border-radius: 20px;
        margin-top: 6%;
        position: relative;
        /* margin-bottom: 27px; */
        padding-bottom: 16px;
        padding-top: 40px;
    }
    .pause_heading {
        position: absolute;
        margin-top: -5%;
        font-size: 20px;
        font-weight: 700;
        margin-left: 20px;
    }

    .common_s {
            /* margin: 20px 10px 20px 10px; */
        color: #fff;
        font-size: 18px;
        line-height: 22px;
        padding-left: 28px;
        padding-right: 28px;
        font-weight:700;
    }
    .date_right{
        float:right;
    }
    .t_v{
        float:right;
    }
    .premium_card{
        /* background-image: url(fitness/images/balck_card-removebg-preview.png); */
        background-image: url(fitness/images/card_background.png);
        color: #fff;
        padding: 18px 18px 1px 18px;
        margin-top: 10px;
        background-size: 100% 100%;
        /* box-shadow: 2px 2px 10px 6px #e0a50047; */
        /* border: 1px solid gold; */
        border-radius:10px;
        font-family: 'Saira', sans-serif;
        /* font-variant-caps: all-petite-caps; */
        position: absolute;
        width: 100%;
        bottom: 2px;
        box-shadow: 7px 7px 15px rgba(0, 0, 0, 0.25), -7px -7px 15px rgba(255, 255, 255, 0.3);
        /* background: linear-gradient(180deg, #4361FF 0%, #43D2FF 100%); */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        font-family: Overpass;
        font-style: normal;
        font-weight: bold;
        font-size: 18px;
        line-height: 28px;

        color: #FFFFFF;

        text-shadow: 0px 4px 4px rgba(65, 65, 65, 0.25);


    }
    .row_t1{
        padding-top: 60px!important;
        padding-bottom: 60px!important;  
    }
    .p_t1{
        text-shadow: 0px 4px 4px rgb(65 65 65 / 25%);
        /* font-family: Overpass; */
        /* font-style: normal; */
        /* font-weight: bold; */
        font-size: 17px;
        padding-bottom: 15px;
        padding-top: 10px;
    }
    .p_t2{
        text-shadow: 0px 4px 4px rgb(65 65 65 / 25%);
        padding-bottom: 15px;
        font-size: 17px;
    }
    .p_t3{
        font-weight: 600;
        font-size: 13px;
        line-height: 21px;
        color: #FFFFFF;
        text-shadow: 0px 4px 4px rgb(65 65 65 / 25%);
        padding-bottom: 15px;
    }
    .premium_card_container{
        background: transparent;
        /* margin: 16px; */
        width:31%;
        
    }
    .common_p_text{
        font-family: 'Saira', sans-serif;
    }
    .name_p{
        text-shadow: 0px 3px 4px rgb(0 0 0 / 75%);
    }
    .item{
        border-radius:10px;
    }
    .plan_name{
        float:right;
        font-weight:800;  
        color:#fff;
        text-shadow: 0px 3px 4px rgb(0 0 0 / 75%);      
    }
    .common_date{
        padding: 0px 1px 2px 30px;
    }
    .end_date{
        /* margin-bottom:60px; */
        text-shadow: 0px 3px 4px rgb(0 0 0 / 75%);
    }
    .start_date{
        /* margin-top:40px; */
        text-shadow: 0px 3px 4px rgb(0 0 0 / 75%);
    }
    .renew_m_p{
        float: right;
        color: #fff;
        font-weight: 800;
        cursor:pointer;
        text-shadow: 0px 3px 4px rgb(0 0 0 / 75%);
        -webkit-transition: color 2s, font-size 2s;
       -moz-transition: color 2s, font-size 2s;
         -o-transition: color 2s, font-size 2s;
            transition: color 2s, font-size 2s;
    }
    .user_info_p{
        padding: 1px 0px 7px 1px;
    }
    .name_p_u{
        font-weight: 800;
        text-shadow: 0px 3px 4px rgb(0 0 0 / 75%);
    }
    .premium{
        float: right;
        border: 1px solid gold;
        border-radius: 25px;
        padding: 4px;
    }
    .premium:after{
        opacity:0.4;
    }
    .g_p{
        margin-top: 30px;
    }
    .renew{
        float: right;
        border: 1px solid #e21c1c;
        padding: 4px;
        margin-top: -8px;
    }
    .renew_m_p:hover{
        font-size:18px;
    }
    .premium_card2{
        margin-top: 10px;
        margin-bottom: 10px;
    }

    /* css button on off */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
        float:right;
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
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        }

        .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        }

        input:checked + .slider {
        background-color: #2dd2d1;
        }

        input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
        border-radius: 34px;
        }

        .slider.round:before {
        border-radius: 50%;
        }
        .s_text{
            display:inline-block;
        }
        .li_s{
            font-weight: 800;
            /* background: black; */
            color: #000;
            padding: 14px;
            /* border-radius: 28px; */
            margin-top: 10px;
            margin-bottom: 10px;
            border-bottom: 1px solid #e5e5e5;
        }
        .pause_btn{
            background: #000;
            color: #fff;
            font-size: 20px;
            text-align: center;
            margin-top: 36px;
            border-radius: 19px;
            height: 38px;
            line-height: 5px;/*50*/
            cursor:pointer;
            padding-left:15px;/*26*/
            width:fit-content;
            font-weight:600;
            padding-right:15px;/*26*/
            /* margin-left: -20px; */


        }
        .pause_info_m{
            position: absolute;
            width: 30px;
            height: 30px;
            background: #000;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            line-height: 30px;
            font-style: italic;
            left: 64%;
            top: 77%;
            cursor:pointer;
            box-shadow: 7px 7px 15px rgb(0 0 0 / 25%), -7px -7px 15px rgb(255 255 255 / 30%);
        }
        .calender_style{
            background: #000;
            border: none;
            font-size: 20px;
            color: #6ab1ff;
        }
        #start_date{
            width: 100px;
            /* visibility: hidden; */
            position: absolute;
            visibility: hidden;
            background: #000;
            outline: none;
            border: none;
            color: #42cbe1;
            padding-top: 25px;
            font-size: 18px;
        }
        .tab_heading{
            font-size:20px;
            font-weight:800;
        }
        .question_menu{
            display:none;
        }


    /* -- import Roboto Font -- */
    @import url("//fonts.googleapis.com/css?family=Roboto400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,cyrillic");
    .material-form-field {
    position: relative;
    max-width: 50em;
    margin: 25px auto;
    width: 50em;
    }
    .material-form-field-input {
    padding: 0.5em 0;
    font-size: 1.5em;
    color: inherit;
    font-family: inherit;
    width: 100%;
    background: transparent;
    border-width: 0 0 1px 0;
    transition: 0.4s ease border-color;
    padding-top:20px;
    }
    .material-form-field-input::-webkit-input-placeholder {
    font-family: "RobotoDraft", "Roboto", "Helvetica Neue, Helvetica, Arial", sans-serif;
    color: transparent;
    }
    .material-form-field-input:focus:valid,
    .material-form-field-input:focus:invalid {
    border-bottom-width: 2px;
    }
    .material-form-field-input:focus:valid {
    border-color: #008000;
    }
    .material-form-field-input:focus:invalid {
    border-color: #f00;
    }
    .material-form-field-input:focus::-webkit-input-placeholder,
    .material-form-field-input:not(:placeholder-shown)::-webkit-input-placeholder,
    .material-form-field-input[value]::-webkit-input-placeholder,
    .material-form-field-input:valid::-webkit-input-placeholder {
    color: transparent;
    }
    .material-form-field-input:not(:-moz-placeholder-shown) + .material-form-field-label {
    transform: translateY(-1.1em);
    }
    .material-form-field-input:not(:-ms-input-placeholder) + .material-form-field-label {
    transform: translateY(-1.1em);
    }
    .material-form-field-input:focus + .material-form-field-label,
    .material-form-field-input:not(:placeholder-shown) + .material-form-field-label,
    .material-form-field-input[value] + .material-form-field-label,
    .material-form-field-input:valid + .material-form-field-label {
    transform: translateY(-1.1em);
    }
    .material-form-field-input + .material-form-field-label {
    transition: 0.4s ease all;
    cursor: pointer;
    transform: translateY(0);
    font-size: 1.5em;
    left: 0;
    top: 0.55em;
    position: absolute;
    color: #fff;
    }
    .material-form-field-input:focus {
    outline: none;
    }
    .material-form + label {
    position: absolute;
    left: 0.5em;
    }
    .pause_btn:hover{
        box-shadow: 0 5px 26px -5px #00b4e77a;
    }
    .hide{
    opacity:0;
    }

    .magic_button3, .magic_button2{
    -webkit-transition: -webkit-transform 3s; /* Safari */
        transition: transform 3s;
    }
    .magic_button1{
    z-index:10;
    -webkit-transition: opacity 3s; /* Safari */
    transition: opacity 3s;
    }

    .animateToRight{
    -webkit-transform: translate(100px); /* Safari */
        transform: translate(100px);
    }
    .animateToLeft{
        -webkit-transform: translate(-100px); /* Safari */
        transform: translate(-100px);
    }
    .magic_button1{
        width:inherit;
    }
    .m_b_p{
        /* background-color: green;
        border: none;
        color: white; */
        padding: 15px 15px;
        /* text-align: center;
        text-decoration: none;
        font-size: 16px; */
        /* position: absolute; */
        /* left: 50%;
        top: 50%; */
        margin-top: -50px;
        margin-left: -161px;
        border: none;
        text-decoration: none;
    }
    .blobs {
        position: relative;
        top: 0;
        left: 160px;
        bottom: 0;
        right: 0;
        /* background: white; */
        width: 180px;
        /* height: 200px; */
        margin: auto;
    }
    #applicationStatus {
        position: relative;
        width: auto;
        height: 160px;
        /* left: 40px;  */
        top:18px;
        
        }

        .applicationStatus li { /* Added this and moved much code to here */
            position: relative;
            text-indent: 30px;
            height: 60px;
            background-color: #44cd4f;
            background-image: linear-gradient(to right,#36cccb, #99cc9d);
            display: inline-block;
            zoom: 1;
            *: ;
            margin-left: 30px;
            /* margin-left: 130px; */
            /* padding: 10px 10px 10px 30px; */
            padding: 0px 40px 10px 180px;/*0px 40px 10px 250px;*/
            color: white;
            font-size: 18px;
            text-align: center;
            line-height: 140px;
            margin-top: 35px;
        }
        .status_text{
            position: absolute;
            top: -40px;
            left: 28px;
            font-size:12px;
        }
        .applicationStatus_complete{
            background-image: linear-gradient(to right,#44cd4f, #44cd4f)!important;

        }

        ul.applicationStatus { /* this is irrelevant with the HTML you gave, but I added the class */
        list-style: none; }

        li.applicationStatus:first-child:after, li.applicationStatusGood:after, li.applicationStatusNoGood:after {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            border-top: 28px solid transparent;
            border-left: 30px solid #928d8d;
            border-bottom: 32px solid transparent;
            margin: 1px 90px 0 10px;
        }
        li.applicationStatus:last-child:before, li.applicationStatusGood:before, li.applicationStatusNoGood:before {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            left: 0;
            border-top: 38px solid transparent;
            border-left: 28px solid #e8e8e8;
            border-bottom: 60px solid transparent;
            margin: -10px 0px 0 0px;
        }

        li.applicationStatus:first-child {
            padding-left: 10px;
            margin-left: 0;
        }
        li.applicationStatus:last-child {
            padding-right: 30px;
        }

        li.applicationStatusGood {
        background-color: #36cccb; }
        li.applicationStatusGood:after {
            border-left: 31px solid #99cc9d; }
            li.applicationStatusGood.applicationStatus_complete:after {
                border-left: 31px solid #44cd4f;
            }
        li.applicationStatusNoGood {
        background-color: #c42c00; }
        li.applicationStatusNoGood:after {
            border-left: 30px solid #c42c00; }
        .magic_button2{
            margin-left: -156px;
        }
        .magic_button3{
            margin-left: -121px;
        }
        .term_modal {
            height: 550px;
            min-height: 550px;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        .tnc_footer{
            /* margin-top:-84px; */
            height: 120px;
            background: #e5e5e5;
        }
        .first_ct{
        margin-top:28px;
        }
        .first_cts{
            margin-top:26px;
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
        .tnc_text_error{
            display:none;
        }
        .li_list_head ul{
            list-style:decimal;
        }
        .li_list_heading{
            /* margin-left: -42px; */
            font-weight: 800;
        }
        .li_list_head ul:not(.ul){
            list-style: upper-alpha;
        }
        #term_condition{
            z-index:9999;
        }
        li.li_list_head {
            list-style: decimal;
            padding-left: 12px;
            margin-left: 10px;
            padding-top: 8px;
            padding-bottom: 8px;
            margin-top: 8px;
            margin-bottom: 8px;
        }
        li.sub_li {
            list-style: lower-roman;
            padding-left: 20px;
            margin-left: 20px;
        }
        .tnc_title{
            text-align: center;
            font-size: 20px;
            line-height: 1px;
            margin-top: 16px;
        }
        .modal_close3{
            margin-top: -15px;
            font-size: 36px;
        }
        /* width */
        .intl-tel-input .country-list::-webkit-scrollbar {
        width: 4px;
        height:4px;
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
        /* #telNo{
            width: 325px;
            border: none;
            outline:none;
            border-bottom: 1px solid #b3a6a6;
            font-size: 20px;
            letter-spacing:2px;
        } */
        .intl-tel-input{
            display:block;
        }
        .location_li{
            color:#000;
            margin-right:28px;
            cursor:pointer;
        }
        .location{
            margin-right:8px;
        }
        #country_modal_city{
            z-index:9999;
        }
        .circle_country{
            display: inline-block;
            padding: 26px;
            cursor:pointer;
        }
        .circle_country_img{
            height: 37px;
            width: 60px;
            border: 1px solid #000;
            border-radius: 34px;
            cursor:pointer;
        }
        .circle_country_img:hover{
            box-shadow: 0 5px 26px -5px rgb(0 180 231 / 82%)
        }
        .active_country{
            box-shadow: 0 5px 26px -5px rgb(0 180 231 / 82%)
        }
        .country_l{
            font-size:20px;
        }
        .popular_country_text{
            /* text-align:center; */
            font-size:20px;
        }
        .key_up_country{
            outline: auto;
        }
        .country_text{
            display: block;
            text-align: center;
            padding-top: 10px;
        }
        .city_shadow{
            text-shadow: 1px 2px 0px #e5e5e5;
            cursor:pointer;
        }
        .free_trial{
            position: fixed;
            color: #fff;
            font-size: 20px;
            top: 60px;
            height: 30px;
            width: 100%;
            text-align: center;
        }
        .buddy_msg{
            position: fixed;
            background: #2dd2d1;
            color: #fff;
            font-size: 20px;
            top: 60px;
            height: 30px;
            width: 100%;
            text-align: center;
            border-radius: 8px;
        }
        .free_trial_text{
            font-family:sans-serif;
            background: #2dd2d1;
            border-radius: 8px;
        }
        .close_free_trial{
            color: #fff;
            float: right;
            /* z-index: 99999; */
            position: relative;
            /* bottom: 6px; */
            cursor: pointer;
        }
        .close_free_trial:hover{
            font-weight:800;
        }
        .day_progree_text{
            text-align:center;
        }
        .legend_r{
            width:20px;
            height:20px;
            display:inline-block;
            background: #FFFFFF;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
        }
        .legend_r_text{
            display:inline-block;
            vertical-align: top;
        }
        .legend_c{
            width:20px;
            height:20px;
            display:inline-block;
            background: #36CCCB;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
        }
        .legend_c_text{
            display:inline-block;
            vertical-align: top;
            line-height:0px;
            font-size:40px;
            margin-left: 30px;
        }
        .d_l {
            margin-top: 6px;
            font-size: 22px;
        }
        .l_r{
            padding: 8px;
        }
        .day_progress{
            width: 62%;
            height: 80%;
            background: white;
            border: 36px solid #36cccb;
            border-radius: 70%;
            /* text-align: center; */
            margin-left: 84px;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
            /* border: 27px solid #FFFFFF; */
            filter: drop-shadow(7px 7px 15px rgba(0, 0, 0, 0.25)), drop-shadow(-7px -7px 15px rgba(255, 255, 255, 0.3));
            transform: matrix(-0.31, 0.95, -0.95, -0.31, 0, 0);`
        }
        #partner_modal{
            margin-top:60px;
        }
        #referal_modal{
            margin-top:60px;
        }
        #feedback_modal{
            margin-top:60px;
        }
        .p_s{
            width:40%;
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
        /* partner modal */
        form.contact-form {
            width: 100%;
            max-width: 380px;
            margin: 10px auto;
            font-size: 15.5px;
            font-family: 'Roboto', 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-weight: 100;
            line-height: 25.079px;
            letter-spacing: -0.5px;
            transition: box-shadow 0.4s ease;
            box-shadow: 0px 2px 10px #eee;
            }
            form.contact-form:hover {
            box-shadow: 0px 4px 14px #ddd, 0px 0px 6px #ffffff;
            }
            form.contact-form span {
            text-align: center;
            display: block;
            color: #333;
            padding: 19.375px 19.375px 7.75px;
            font: inherit;
            font-size: 25.079px;
            }
            form.contact-form ul {
            margin: 0;
            padding: 0;
            list-style: none;
            }
            form.contact-form ul li {
            padding: 0;
            border-bottom: 1px solid #ddd;
            margin: 0;
            text-align: center;
            width: 100%;
            }
            form.contact-form ul li i.form-icon {
            display: inline-block;
            vertical-align: middle;
            width: 2%;
            text-align: center;
            margin: 0 0.5% 0 1%;
            padding: 0;
            font-size: 16.275px;
            color: #aaa!important;
            }
            form.contact-form ul li input[type="text"] {
            width: 90%;
            background: none;
            margin: 0;
            padding: 10.33333385px 2%;
            border: 0;
            border-bottom: 3px solid rgba(0, 0, 0, 0);
            text-align: left;
            font-family: inherit;
            font-size: inherit;
            font-weight: inherit;
            transition: border-bottom 0.35s ease;
            }
            form.contact-form ul li input[type="text"]:focus {
            outline: none;
            border-bottom: 3px solid #36cccb;
            }
            form.contact-form ul li input[type="text"]::-webkit-input-placeholder {
            -webkit-transition: color 0.35s ease;
            transition: color 0.35s ease;
            color: #ccc;
            }
            form.contact-form ul li input[type="text"]:-moz-placeholder {
            -moz-transition: color 0.35s ease;
            transition: color 0.35s ease;
            color: #ccc;
            }
            form.contact-form ul li input[type="text"]::-moz-placeholder {
            -moz-transition: color 0.35s ease;
            transition: color 0.35s ease;
            color: #ccc;
            }
            form.contact-form ul li input[type="text"]:-ms-input-placeholder {
            -ms-transition: color 0.35s ease;
            transition: color 0.35s ease;
            color: #ccc;
            }
            form.contact-form ul li input[type="text"]:focus::-webkit-input-placeholder {
            color: #36cccb;
            }
            form.contact-form ul li input[type="text"]:focus:-moz-placeholder {
            color: #36cccb;
            }
            form.contact-form ul li input[type="text"]:focus::-moz-placeholder {
            color: #36cccb;
            }
            form.contact-form ul li input[type="text"]:focus:-ms-input-placeholder {
            color: #36cccb;
            }
            form.contact-form ul li textarea {
            display: inline-block;
            vertical-align: top;
            width: 88%;
            background: none;
            padding: 10.33333385px 2%;
            resize: none;
            border: 0;
            border-bottom: 3px solid rgba(0, 0, 0, 0);
            text-align: left;
            height: auto;
            min-height: 133px;
            margin: 0;
            font-size: inherit;
            font-weight: inherit;
            font-family: inherit;
            transition: border-bottom 0.35s ease;
            }
            form.contact-form ul li textarea:focus {
            outline: none;
            border-bottom: 3px solid #36cccb;
            }
            form.contact-form ul li textarea::-webkit-scrollbar {
            width: 4px;
            }
            form.contact-form ul li textarea::-webkit-scrollbar-thumb {
            background: #ffffff;
            border-radius: 2px;
            }
            form.contact-form ul li textarea::-webkit-input-placeholder {
            -webkit-transition: color 0.35s ease;
            transition: color 0.35s ease;
            color: #ccc;
            }
            form.contact-form ul li textarea:-moz-placeholder {
            -moz-transition: color 0.35s ease;
            transition: color 0.35s ease;
            color: #ccc;
            }
            form.contact-form ul li textarea::-moz-placeholder {
            -moz-transition: color 0.35s ease;
            transition: color 0.35s ease;
            color: #ccc;
            }
            form.contact-form ul li textarea:-ms-input-placeholder {
            -ms-transition: color 0.35s ease;
            transition: color 0.35s ease;
            color: #ccc;
            }
            form.contact-form ul li textarea:focus::-webkit-input-placeholder {
            color: #36cccb;
            }
            form.contact-form ul li textarea:focus:-moz-placeholder {
            color: #36cccb;
            }
            form.contact-form ul li textarea:focus::-moz-placeholder {
            color: #36cccb;
            }
            form.contact-form ul li textarea:focus:-ms-input-placeholder {
            color: #36cccb;
            }
            form.contact-form ul li input[type="submit"] {
            margin: 15px auto 15px;
            padding: 10.33333385px 19.375px;
            border: 1px solid #d0d0d0;
            display: inline-block;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0);
            font-weight: inherit;
            font-family: inherit;
            font-size: inherit;
            transition: background border 0.35s ease;
            }
            form.contact-form ul li input[type="submit"]:focus {
            outline: none;
            border: 1px solid #36cccb;
            }
            form.contact-form ul li input[type="submit"]:hover {
            background: #eaeaea;
            border: 1px solid #36cccb;
            }
            form.contact-form ul li input[type="submit"]:active {
            background: #d0d0d0;
            }
            .referal_submit{
                outline: none;
                border: none;
                background: #36cccb;
                color: #fff;
                padding: 12px;
                border-radius: 8px;
                margin: 12px;
                cursor:pointer;
                text-align:center;
                display: inline-block;
            }
            #r_cancel{
                background:red;
            }
            .partner_submit{
                outline: none;
                border: none;
                background: #36cccb;
                color: #fff;
                padding: 12px;
                border-radius: 8px;
                margin: 12px;
                cursor:pointer;
                text-align:center;
            }
            .buddy_msg{
                display:none;
            }
            #pause_info{
                margin-top:4%;
            }
            ul.pause_ul{
                padding: 14px;
            }
            li.pause_li {
                list-style: initial;
                text-align: justify;
                margin: 16px;
            }
            #pause_start_modal{
                margin-top:4%;
            }
            #renew_modal{
                margin-top:4%;
            }
            #forget-password{
                margin-top:4%;
            }
            .ne_li{
                list-style:none!important;
                font-size:18px;
            }
            button.pause-input-btn {
                outline: none;
                border: none;
                margin: 10px;
                width: 120px;
                padding: 12px;
                border-radius: 12px;
                background: #36cccb;
                color: #fff;
                margin-top:40px;
            }
            .pause_date{
                float:right;
            }
            .img-whats-app{
                height:30px;
            }
            .whats-app-div{
                position: absolute;
                /* bottom: 80px; */
                /* right: 10px; */
                right: -30px;
                z-index:1;
                cursor:pointer;
                top:-42px;
            }
            .support_email{
                position: absolute;
                /* bottom: 80px; */
                right: 10px;
                z-index:9999;
                cursor:pointer;
            }
            .e_m_s{
                color:#504a4a;
                font-size:20px;
            }
            .document-info{
                position: absolute;
                /* bottom: 80px; */
                /* right: 50px; */
                /* z-index: 9999; */
                cursor: pointer;
                /* top: 2px; */
                font-size: 14px;
                color: #000;
            }
            .in_v{
                display:inline-block;
            }
            .f_ls_connect {
                cursor: pointer;
                /* color: blue; */
            }
            .pause_info_cancel {
                display: inline-block;
                /* background: #000; */
                color: #000;
                padding: 12px;
                border-radius: 10px;
                font-weight: 700;
                /* box-shadow: 7px 7px 15px rgb(0 0 0 / 25%), -7px -7px 15px rgb(255 255 255 / 30%); */
                cursor: pointer;
                border: 1px solid #e5e5e5;
                margin-left: 10px;
                margin-right: 20px;
            }
            .ics{
                height: 20px;
                margin-left: 28px;
            }
            .responsive-logos{
                height:30px;
            }
            .main_container .container{
                margin-top:-10px;
            }
           

</style>

  <div class="modal fade" id="success_modal" style="margin-top:10%;" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button id="success_modal_close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="ico-wrap" style="text-align: center;">
                    <img style="height: 80px;" src="fitness/images/check.png" alt="Success Icon">
                </div>
            <div>
            <h4>Payment Successful!</h4>
            <p class="_info">Thank you for choosing us, Your payment has been processed. Here are the details of this transaction.</p>
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
    <!-- country Modal -->
    <div id="country_modal_city" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg country_modal-lg" >

                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" style="font-size:42px;" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title country_l">Change Location</h4>
                </div>
                <div class="modal-body">
                    <p class="popular_country_text">Country</p>
                    <input type="text" autofill="off" placeholder="Search Country" autofocus="on" class="form-control key_up_country">
                    <div class="other_country">
                    </div>
                    
                    <p class="popular_country_text">Popular Country</p>
                    <div class="circle_country" id="in" value="India">
                        <img class="circle_country_img" src="https://ipdata.co/flags/in.png"/>
                        <span class="country_text">India</span>
                    </div>
                    <div class="circle_country" id="us" value="United States">
                        <img class="circle_country_img" src="https://ipdata.co/flags/us.png"/>
                        <span class="country_text">	United States</span>
                    </div>
                    <div class="circle_country" id="gb" value="United Kingdom">
                        <img class="circle_country_img" src="https://ipdata.co/flags/gb.png"/>
                        <span class="country_text">United Kingdom</span>
                    </div>
                    <div class="circle_country" id="nz" value="New Zealand">
                        <img class="circle_country_img" src="https://ipdata.co/flags/nz.png"/>
                        <span class="country_text">New Zealand</span>
                    </div>
                    <div class="circle_country" id="ca" value="Canada">
                        <img class="circle_country_img" src="https://ipdata.co/flags/ca.png"/>
                        <span class="country_text">Canada</span>
                    </div>
                    <!-- <div class="circle_country" value="China">
                        <img class="circle_country_img" src="https://ipdata.co/flags/cn.png"/>
                        <span class="country_text">China</span>
                    </div> -->
                    <div class="circle_country" id="au" value="Australia">
                        <img class="circle_country_img" src="https://ipdata.co/flags/au.png"/>
                        <span class="country_text">Australia</span>
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
                        <div class="row" id="main">
                            
                        </div>

                        <div id="target"></div>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div> -->
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div id="partner_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                
                <div class="modal-body">
                    <style>
                        .b_sd{
                            padding-bottom: 10px;
                            padding-top: 10px;
                        }
                        .new_partner_data_style{
                            display:none;
                        }
                    </style>
                        <span>Buddy Details</span>
                        <hr>
                        <?php
                        $buddy_check=true;
                            if($users->buddy_username)
                                $buddy_check=false;
                        ?>
                        <ul class="pause_ul">
                            <?php 
                            if(!$buddy_check){
                            ?>
                            <li class="pause_li ne_li">
                                <input type="radio" name="renew_plan_buddy" checked value="exsisting" class="pause-input pause_date"> Exsisting Buddy
                            </li>
                            <li class="pause_li ne_li">
                                <input name="renew_plan_buddy" value="new" class="pause-input pause_date" type="radio"> New Buddy
                            </li>
                            <?php } ?>
                            <div style="padding-left:18px;padding-right:18px;" class="new_partner_data {{$buddy_check?'':'new_partner_data_style'}}">
                                <li>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="b_sd">Name</div>
                                            <input class="form-control" type="text" id="p_d_name_1" placeholder="" />
                                        </div>
                                        <div class="col-md-6">
                                            <div class="b_sd">Phone No</div>
                                            <input id="telNo_partner" class="form-control form-control-alternative"  onkeypress="return isNumberKey(event)" name="telNo" type="tel" size="20" minlength="13" maxlength="14" placeholder="+91 90909 90909" />
                                            <!-- <input class="form-control" type="text" id="p_d_mob_1" placeholder="+919090909090" /> -->

                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="b_sd">Email</div>
                                            <input class="form-control" id="p_d_email_1" type="text" placeholder="" />

                                        </div>
                                    </div>
                                </li>
                                <!-- <li>
                                    <i class="fa fa-university form-icon"></i>
                                    <input type="text" placeholder="Organization/Academic Institution" />
                                </li> -->
                                
                                <hr>
                                
                                <li>
                                    Gender
                                </li>
                                <li>
                                    <input type="radio" title="Male" name="gender_p" value="Male"/> Male
                                </li>
                                <li>
                                    <input type="radio" title="Female" name="gender_p" value="Female"/> Female
                                </li>
                                <li>
                                    <input type="radio" title="Binary" name="gender_p" value="Non-Binary"/> Non-Binary

                                </li>
                                <!-- <li>
                                    <i class="fa fa-envelope form-icon"></i>
                                    <textarea placeholder="Message" rows="2"></textarea>
                                </li> -->
                            </div>
                        </ul>
                        
                        <li class="pause_li ne_li" style="text-align:center;">
                            <button class="pause-input-btn partner_submit">Continue</button>
                        </li>
                </div>
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div id="referal_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                
                <div class="modal-body">
                    <style>
                        .b_sd{
                            padding-bottom: 10px;
                            padding-top: 10px;
                        }
                    </style>
                        <span>Referal</span>
                        <hr>

                        <ul>
                            <li>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="b_sd">Referal Code</div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="b_sd">
                                            <input maxlength="6"class="form-control" type="text" id="referal_code" placeholder="Enter Referal Code" />
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            <!-- <li>
                                <i class="fa fa-university form-icon"></i>
                                <input type="text" placeholder="Organization/Academic Institution" />
                            </li> -->
                            
                            <hr>
                            
                            <!-- <li>
                                <i class="fa fa-envelope form-icon"></i>
                                <textarea placeholder="Message" rows="2"></textarea>
                            </li> -->
                            <li style="text-align:center;">
                                <div class="referal_submit" id="r_cancel">Cancel</div>
                                <div class="referal_submit" id="r_submit">Submit</div>
                            </li>
                        </ul>
                    
                </div>
                </div>

            </div>
        </div>
        
        <div id="feedback_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                
                <div class="modal-body">
                    <style>
                        .b_sd{
                            padding-bottom: 10px;
                            padding-top: 10px;
                        }
                        .rating-option{
                            cursor:pointer;
                        }
                    </style>
                        <span id="general_rate_id">Rate your session</span>
                        <hr>

                        <ul>
                            <li>
                                <div class="row">
                                    
                                    <div class="col-md-12" style="height:100px;">
                                        <div id="app">
                                            <div class="rating-container">
                                            <div class="rating-control">
                                            <div class="rating-option" rating="1" selected-fill="#FFA98D">
                                                <div class="icon">
                                                <svg width="100%" height="100%" viewBox="0 0 50 50">
                                                    <path d="M50,25 C50,38.807 38.807,50 25,50 C11.193,50 0,38.807 0,25 C0,11.193 11.193,0 25,0 C38.807,0 50,11.193 50,25" class="base" fill="#C6CCD0"></path>
                                                    <path d="M25,31.5 C21.3114356,31.5 17.7570324,32.4539319 14.6192568,34.2413572 C13.6622326,34.7865234 13.3246514,36.0093483 13.871382,36.9691187 C14.4181126,37.9288892 15.6393731,38.2637242 16.5991436,37.7169936 C19.1375516,36.2709964 22.0103269,35.5 25,35.5 C27.9896731,35.5 30.8610304,36.2701886 33.4008564,37.7169936 C34.3606269,38.2637242 35.5818874,37.9288892 36.128618,36.9691187 C36.6753486,36.0093483 36.3405137,34.7880878 35.3807432,34.2413572 C32.2429676,32.4539319 28.6885644,31.5 25,31.5 Z" class="mouth" fill="#FFFFFF"></path>
                                                    <path d="M30.6486386,16.8148522 C31.1715727,16.7269287 31.2642212,16.6984863 31.7852173,16.6140137 C32.3062134,16.529541 33.6674194,16.3378906 34.5824585,16.1715729 C35.4974976,16.0052551 35.7145386,15.9660737 36.4964248,15.8741891 C36.6111841,15.9660737 36.7220558,16.0652016 36.8284271,16.1715729 C37.7752853,17.118431 38.1482096,18.4218859 37.9472002,19.6496386 C37.8165905,20.4473941 37.4436661,21.2131881 36.8284271,21.8284271 C35.26633,23.3905243 32.73367,23.3905243 31.1715729,21.8284271 C29.8093655,20.4662198 29.6350541,18.3659485 30.6486386,16.8148522 Z" class="right-eye" fill="#FFFFFF"></path>
                                                    <path d="M18.8284271,21.8284271 C20.1906345,20.4662198 20.3649459,18.3659485 19.3513614,16.8148522 C18.8284273,16.7269287 18.7357788,16.6984863 18.2147827,16.6140137 C17.6937866,16.529541 16.3325806,16.3378906 15.4175415,16.1715729 C14.5025024,16.0052551 14.2854614,15.9660737 13.5035752,15.8741891 C13.3888159,15.9660737 13.2779442,16.0652016 13.1715729,16.1715729 C12.2247147,17.118431 11.8517904,18.4218859 12.0527998,19.6496386 C12.1834095,20.4473941 12.5563339,21.2131881 13.1715729,21.8284271 C14.73367,23.3905243 17.26633,23.3905243 18.8284271,21.8284271 Z" class="left-eye" fill="#FFFFFF"></path>
                                                </svg>
                                                </div>
                                                <div class="label">Terrible</div>
                                                <div class="touch-marker"></div>
                                            </div>
                                            <div class="rating-option" rating="2" selected-fill="#FFC385">
                                                <div class="icon">
                                                <svg width="100%" height="100%" viewBox="0 0 50 50">
                                                    <path d="M50,25 C50,38.807 38.807,50 25,50 C11.193,50 0,38.807 0,25 C0,11.193 11.193,0 25,0 C38.807,0 50,11.193 50,25" class="base" fill="#C6CCD0"></path>
                                                    <path d="M25,31.9996 C21.7296206,31.9996 18.6965022,32.5700242 15.3353795,33.7542598 C14.2935825,34.1213195 13.7466,35.2634236 14.1136598,36.3052205 C14.4807195,37.3470175 15.6228236,37.894 16.6646205,37.5269402 C19.617541,36.4865279 22.2066846,35.9996 25,35.9996 C28.1041177,35.9996 31.5196849,36.5918872 33.0654841,37.4088421 C34.0420572,37.924961 35.2521232,37.5516891 35.7682421,36.5751159 C36.284361,35.5985428 35.9110891,34.3884768 34.9345159,33.8723579 C32.7065288,32.6948667 28.6971052,31.9996 25,31.9996 Z" class="mouth" fill="#FFFFFF"></path>
                                                    <path d="M30.7014384,16.8148522 C30.8501714,16.5872449 31.0244829,16.3714627 31.2243727,16.1715729 C32.054483,15.3414625 33.1586746,14.9524791 34.2456496,15.0046227 C34.8805585,15.7858887 34.945378,15.8599243 35.5310714,16.593811 C36.1167648,17.3276978 36.1439252,17.3549194 36.5988813,17.9093628 C37.0538374,18.4638062 37.2801558,18.7149658 38,19.6496386 C37.8693903,20.4473941 37.496466,21.2131881 36.8812269,21.8284271 C35.3191298,23.3905243 32.7864699,23.3905243 31.2243727,21.8284271 C29.8621654,20.4662198 29.6878539,18.3659485 30.7014384,16.8148522 Z" class="right-eye" fill="#FFFFFF"></path>
                                                    <path d="M18.8284271,21.8284271 C20.1906345,20.4662198 20.3649459,18.3659485 19.3513614,16.8148522 C19.2026284,16.5872449 19.0283169,16.3714627 18.8284271,16.1715729 C17.9983168,15.3414625 16.8941253,14.9524791 15.8071502,15.0046227 C15.1722413,15.7858887 15.1074218,15.8599243 14.5217284,16.593811 C13.9360351,17.3276978 13.9088746,17.3549194 13.4539185,17.9093628 C12.9989624,18.4638062 12.772644,18.7149658 12.0527998,19.6496386 C12.1834095,20.4473941 12.5563339,21.2131881 13.1715729,21.8284271 C14.73367,23.3905243 17.26633,23.3905243 18.8284271,21.8284271 Z" class="left-eye" fill="#FFFFFF"></path>
                                                </svg>
                                                </div>
                                                <div class="label">Bad</div>
                                                <div class="touch-marker"></div>
                                            </div>
                                            <div class="rating-option" rating="3">
                                                <div class="icon">
                                                <svg width="100%" height="100%" viewBox="0 0 50 50">
                                                    <path d="M50,25 C50,38.807 38.807,50 25,50 C11.193,50 0,38.807 0,25 C0,11.193 11.193,0 25,0 C38.807,0 50,11.193 50,25" class="base" fill="#C6CCD0"></path>
                                                    <path d="M25.0172185,32.7464719 C22.4651351,33.192529 19.9789584,33.7240143 17.4783686,34.2837667 C16.4004906,34.5250477 15.7222686,35.5944568 15.9635531,36.6723508 C16.2048377,37.7502449 17.2738374,38.4285417 18.3521373,38.1871663 C20.8031673,37.6385078 23.2056119,37.1473427 25.7416475,36.6803253 C28.2776831,36.2133079 30.8254642,35.7953113 33.3839467,35.4267111 C34.4772031,35.2692059 35.235822,34.2552362 35.0783131,33.1619545 C34.9208042,32.0686729 33.89778,31.3113842 32.8135565,31.4675881 C30.2035476,31.8436117 27.6044107,32.2700339 17.4783686,34.2837667 Z" class="mouth" fill="#FFFFFF"></path>
                                                    <path d="M30.6486386,16.8148522 C30.7973716,16.5872449 30.9716831,16.3714627 31.1715729,16.1715729 C32.0016832,15.3414625 33.1058747,14.9524791 34.1928498,15.0046227 C35.0120523,15.0439209 35.8214759,15.3337764 36.4964248,15.8741891 C36.6111841,15.9660737 36.7220558,16.0652016 36.8284271,16.1715729 C37.7752853,17.118431 38.1482096,18.4218859 37.9472002,19.6496386 C37.8165905,20.4473941 37.4436661,21.2131881 36.8284271,21.8284271 C35.26633,23.3905243 32.73367,23.3905243 31.1715729,21.8284271 C29.8093655,20.4662198 29.6350541,18.3659485 30.6486386,16.8148522 Z" class="right-eye" fill="#FFFFFF"></path>
                                                    <path d="M18.8284271,21.8284271 C20.1906345,20.4662198 20.3649459,18.3659485 19.3513614,16.8148522 C19.2026284,16.5872449 19.0283169,16.3714627 18.8284271,16.1715729 C17.9983168,15.3414625 16.8941253,14.9524791 15.8071502,15.0046227 C14.9879477,15.0439209 14.1785241,15.3337764 13.5035752,15.8741891 C13.3888159,15.9660737 13.2779442,16.0652016 13.1715729,16.1715729 C12.2247147,17.118431 11.8517904,18.4218859 12.0527998,19.6496386 C12.1834095,20.4473941 12.5563339,21.2131881 13.1715729,21.8284271 C14.73367,23.3905243 17.26633,23.3905243 18.8284271,21.8284271 Z" class="left-eye" fill="#FFFFFF"></path>
                                                </svg>
                                                </div>
                                                <div class="label">Okay</div>
                                                <div class="touch-marker"></div>
                                            </div>
                                            <div class="rating-option" rating="4">
                                                <div class="icon">
                                                <svg width="100%" height="100%" viewBox="0 0 50 50">
                                                    <path d="M50,25 C50,38.807 38.807,50 25,50 C11.193,50 0,38.807 0,25 C0,11.193 11.193,0 25,0 C38.807,0 50,11.193 50,25" class="base" fill="#C6CCD0"></path>
                                                    <path d="M25,35 C21.9245658,35 18.973257,34.1840075 16.3838091,32.6582427 C15.4321543,32.0975048 14.2061178,32.4144057 13.64538,33.3660605 C13.0846422,34.3177153 13.401543,35.5437517 14.3531978,36.1044896 C17.5538147,37.9903698 21.2054786,39 25,39 C28.7945214,39 32.4461853,37.9903698 35.6468022,36.1044896 C36.598457,35.5437517 36.9153578,34.3177153 36.35462,33.3660605 C35.7938822,32.4144057 34.5678457,32.0975048 33.6161909,32.6582427 C31.026743,34.1840075 28.0754342,35 25,35 Z" class="mouth" fill="#FFFFFF"></path>
                                                    <path d="M30.6486386,16.8148522 C30.7973716,16.5872449 30.9716831,16.3714627 31.1715729,16.1715729 C32.0016832,15.3414625 33.1058747,14.9524791 34.1928498,15.0046227 C35.0120523,15.0439209 35.8214759,15.3337764 36.4964248,15.8741891 C36.6111841,15.9660737 36.7220558,16.0652016 36.8284271,16.1715729 C37.7752853,17.118431 38.1482096,18.4218859 37.9472002,19.6496386 C37.8165905,20.4473941 37.4436661,21.2131881 36.8284271,21.8284271 C35.26633,23.3905243 32.73367,23.3905243 31.1715729,21.8284271 C29.8093655,20.4662198 29.6350541,18.3659485 30.6486386,16.8148522 Z" class="right-eye" fill="#FFFFFF"></path>
                                                    <path d="M18.8284271,21.8284271 C20.1906345,20.4662198 20.3649459,18.3659485 19.3513614,16.8148522 C19.2026284,16.5872449 19.0283169,16.3714627 18.8284271,16.1715729 C17.9983168,15.3414625 16.8941253,14.9524791 15.8071502,15.0046227 C14.9879477,15.0439209 14.1785241,15.3337764 13.5035752,15.8741891 C13.3888159,15.9660737 13.2779442,16.0652016 13.1715729,16.1715729 C12.2247147,17.118431 11.8517904,18.4218859 12.0527998,19.6496386 C12.1834095,20.4473941 12.5563339,21.2131881 13.1715729,21.8284271 C14.73367,23.3905243 17.26633,23.3905243 18.8284271,21.8284271 Z" class="left-eye" fill="#FFFFFF"></path>
                                                </svg>
                                                </div>
                                                <div class="label">Good</div>
                                                <div class="touch-marker"></div>
                                            </div>
                                            <div class="rating-option" rating="5">
                                                <div class="icon">
                                                <svg width="100%" height="100%" viewBox="0 0 50 50">
                                                    <path d="M50,25 C50,38.807 38.807,50 25,50 C11.193,50 0,38.807 0,25 C0,11.193 11.193,0 25,0 C38.807,0 50,11.193 50,25" class="base" fill="#C6CCD0"></path>
                                                    <path d="M25.0931396,31 C22.3332651,31 16.6788329,31 13.0207,31 C12.1907788,31 11.6218259,31.4198568 11.2822542,32.0005432 C10.9061435,32.6437133 10.8807853,33.4841868 11.3937,34.17 C14.4907,38.314 19.4277,41 24.9997,41 C30.5727,41 35.5097,38.314 38.6067,34.17 C39.0848493,33.5300155 39.0947422,32.7553501 38.7884086,32.1320187 C38.4700938,31.4843077 37.8035583,31 36.9797,31 C34.3254388,31 28.6616205,31 25.0931396,31 Z" class="mouth" fill="#FFFFFF"></path>
                                                    <path d="M30.6486386,16.8148522 C30.7973716,16.5872449 30.9716831,16.3714627 31.1715729,16.1715729 C32.0016832,15.3414625 33.1058747,14.9524791 34.1928498,15.0046227 C35.0120523,15.0439209 35.8214759,15.3337764 36.4964248,15.8741891 C36.6111841,15.9660737 36.7220558,16.0652016 36.8284271,16.1715729 C37.7752853,17.118431 38.1482096,18.4218859 37.9472002,19.6496386 C37.8165905,20.4473941 37.4436661,21.2131881 36.8284271,21.8284271 C35.26633,23.3905243 32.73367,23.3905243 31.1715729,21.8284271 C29.8093655,20.4662198 29.6350541,18.3659485 30.6486386,16.8148522 Z" class="right-eye" fill="#FFFFFF"></path>
                                                    <path d="M18.8284271,21.8284271 C20.1906345,20.4662198 20.3649459,18.3659485 19.3513614,16.8148522 C19.2026284,16.5872449 19.0283169,16.3714627 18.8284271,16.1715729 C17.9983168,15.3414625 16.8941253,14.9524791 15.8071502,15.0046227 C14.9879477,15.0439209 14.1785241,15.3337764 13.5035752,15.8741891 C13.3888159,15.9660737 13.2779442,16.0652016 13.1715729,16.1715729 C12.2247147,17.118431 11.8517904,18.4218859 12.0527998,19.6496386 C12.1834095,20.4473941 12.5563339,21.2131881 13.1715729,21.8284271 C14.73367,23.3905243 17.26633,23.3905243 18.8284271,21.8284271 Z" class="left-eye" fill="#FFFFFF"></path>
                                                </svg>
                                                </div>
                                                <div class="label">Great</div>
                                                <div class="touch-marker"></div>
                                            </div>
                                            <div class="current-rating">
                                                <div class="svg-wrapper"></div>
                                                <div class="touch-marker"></div>
                                            </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <p>Give your valuable comment(Optional)</p>
                                        <textarea id="feedback_comment" class="form-control" rows="4" placeholder="Message"></textarea>
                                        
                                    </div>
                                </div>
                            </li>
                            
                            <!-- <li>
                                <i class="fa fa-university form-icon"></i>
                                <input type="text" placeholder="Organization/Academic Institution" />
                            </li> -->
                            
                            <hr>
                            
                            <!-- <li>
                                <i class="fa fa-envelope form-icon"></i>
                                <textarea placeholder="Message" rows="2"></textarea>
                            </li> -->
                            <li style="text-align:center;">
                                <input type="hidden" id="f_s_id">
                                <div class="referal_submit" style="background:red;" id="f_cancel">Cancel</div>
                                <div class="referal_submit" id="f_submit">Submit</div>
                            </li>
                        </ul>
                    
                </div>
                </div>

            </div>
        </div>
        <!-- Modal -->
        <div id="pause_info" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="border-radius:20px;">
                    <div class="modal-header">
                        <button type="button" style="font-size:38px;" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title">Terms & Conditions</h2>
                    </div>
                    <div class="modal-body">
                        <ul class="pause_ul">
                            <li class="pause_li">
                                Unlimited pauses - you can pause your membership "n" number of times but within the allowed period.
                            </li>
                            <li class="pause_li">
                                The minimum pause period is 3 days and the maximum pause period is 7 days.
                            </li>
                            <li class="pause_li">
                                The minimum number of days between 2 pauses should be at least 14 days.
                            </li>
                            <li class="pause_li">
                                During the pause, your membership will be on a complete hold and you can only reach us through support@livezy.com.
                            </li>
                            <li class="pause_li">
                                The pause days once used gets added on to your membership.
                            </li>
                            <li class="pause_li">
                            If pause is canceled within 3 days, Your program will continue. however all 3 days of pause will be considered
                            </li>
                        </ul>
                    </div>
                
                </div>

            </div>
        </div>
        <div id="pause_start_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="border-radius:20px;">
                    <div class="modal-header">
                        <button type="button" style="font-size:38px;" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title" id="p_m_t">Pause Your Plan</h2>
                    </div>
                    <div class="modal-body">
                        <ul class="pause_ul">
                            <li class="pause_li ne_li">
                                Pause From: <input id="pause_s_date" class="pause-input pause_date" type="date">
                            </li>
                            <li class="pause_li ne_li">
                                Pause To: <input id="pause_e_date" class="pause-input pause_date" type="date">
                            </li>
                            <li class="pause_li ne_li" style="text-align:center;">
                                <button class="pause-input-btn" id="pause_continue">Continue</button><button class="pause-input-btn" data-dismiss="modal" style="background:red;">Cancel</button>
                            </li>
                            <li class="pause_li ne_li" id="pause_data_cnfrm" style="text-align:center;color:#ff0000b8;">
                                
                            </li>
                        </ul>
                    </div>
                
                </div>

            </div>
        </div>
        <div id="renew_modal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="border-radius:20px;">
                    <div class="modal-header">
                        <button type="button" style="font-size:38px;" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title" id="p_m_t">Renew Your Plan</h2>
                    </div>
                    <div class="modal-body">
                        <ul class="pause_ul">
                            <li class="pause_li ne_li">
                                <input type="radio" name="renew_plan" value="exsisting" checked class="pause-input pause_date"> Exsisting Plan: <?php echo ucfirst($users->plan);?> (<?php echo ucfirst($users->member_type);?>)
                            </li>
                            <li class="pause_li ne_li">
                                <input name="renew_plan" value="new" class="pause-input pause_date" type="radio"> New Plan
                            </li>
                            <li class="pause_li ne_li" style="text-align:center;">
                                <button class="pause-input-btn" id="renew_continue">Continue</button><button class="pause-input-btn" data-dismiss="modal" style="background:red;">Cancel</button>
                            </li>
                            <li class="pause_li ne_li" id="renew_data_cnfrm" style="text-align:center;color:#ff0000b8;">
                                
                            </li>
                        </ul>
                    </div>
                
                </div>

            </div>
        </div>
        <div id="forget-password" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content" style="border-radius:20px;">
                    <div class="modal-header">
                        <button type="button" style="font-size:38px;" class="close" data-dismiss="modal">&times;</button>
                        <h2 class="modal-title" id="p_m_t">Change Your Password</h2>
                    </div>
                    <div class="modal-body">
                        <ul class="pause_ul">
                            <li class="pause_li ne_li">
                                New Password: <input id="f_n_w" class="pause-input pause_date" type="password">
                            </li>
                            <li class="pause_li ne_li">
                                Confirm Password: <input id="c_f_n_w" class="pause-input pause_date" type="password">
                            </li>
                            <li class="pause_li ne_li" style="text-align:center;">
                                <button class="pause-input-btn" id="forget_continue">Continue</button><button class="pause-input-btn" data-dismiss="modal" style="background:red;">Cancel</button>
                            </li>
                            <li class="pause_li ne_li" id="forget_data_cnfrm" style="text-align:center;color:#ff0000b8;">
                                
                            </li>
                        </ul>
                    </div>
                
                </div>

            </div>
        </div>       
  <div class="main_container">
      <div class="sidebar">
          <div class="sidebar__inner">
            <!-- <div class="profile">
              <div class="img">
                <img src="<?php echo Session::get('image')?>" alt="profile_pic">
              </div>
              <div class="profile_info">
                 <p>Welcome</p>
                 <p class="profile_name"><?php echo Session::get('name');?></p>
              </div>
            </div> -->
            <ul>
              <li  class="nav-item">
               <div class="logo">
                    <img class="img-responsive responsive-logo" src="fitness/images/png2.png">
                </div>
              </li>
              <li id="dashboard" class="nav-item">
                <a href="#" class="active">
                  <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/dashboard_black.png"></span>
                  <span class="title">Dashboard</span>
                </a>
              </li>
              <li id="live_session" class="nav-item">
                <a href="#">
                  <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/live_session_black.png"></span>
                  <span class="title">Live Session</span>
                </a>
              </li>
              <!-- <li>
                <a href="#">
                  <span class="icon"><i class="fab fa-elementor"></i></span>
                  <span class="title">Plans</span>
                </a>
              </li> -->
              <li id="profile_d" class="nav-item">
                <a href="#">
                  <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/profile_black.png"></span>
                  <span class="title">Profile</span>
                </a>
              </li>
              <li id="testimonial" class="nav-item">
                <a href="#">
                  <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/testimonial_black.png"></span>
                  <span class="title">Testimonial</span>
                </a>
              </li>
              <li id="recipes" class="nav-item">
                <a href="#">
                  <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/recipe_black.png"></span>
                  <span class="title">Recipes</span>
                </a>
              </li>
              <li id="blog" >
                <a target="_blank" href="/blog">
                  <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/blog_black.png"></span>
                  <span class="title">Blog</span>
                </a>
              </li>
              <?php if($users->user_status==8 || $users->user_status==9){?>
              <li id="referal_menu" >
                <a href="#">
                  <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/blog_black.png"></span>
                  <span class="title">Invite Friend</span>
                </a>
              </li>
              <?php
               }
              ?>
              <li id="settingsu" class="nav-item">
                <a href="#">
                  <span class="icon"><img class="img-responsive responsive-logos" src="insta_img/dashboard_black/setting_black.png"></span>
                  <span class="title">Settings</span>
                </a>
              </li>
            </ul>
          </div>
      </div>
      <style>
      .pouch-main-container{
          display:none;
      }
        .pouch-main-container {
  background: #EAEAEA;
  width: 430px;
  height: auto;
  margin: 0px auto;
  position: fixed;
    top: 90px;
    left: 550px;
    z-index: 9;
    border: 1px solid #37cccb;
}
.pouch-main-container .fixedHeader {
  width: 100%;
  height: 70px;
  background: #37cccb;
  box-shadow: 0px 5px 3px 0px rgba(0, 0, 0, 0.2);
}
.pouch-main-container .pouchLogo {
  position: relative;
  height: 30px;
  width: 30px;
  border-radius: 100%;
  background-color: white;
  float: left;
  bottom: -20px;
  left: 25px;
}
.pouch-main-container .pouchHeaderOverlay {
  position: relative;
  width: 100px;
  height: 70px;
  background: pink;
  float: right;
}
.pouch-main-container .pouchHeaderOverlay .pouchHeadOverShadow {
  width: 90px;
  border-bottom: 70px solid #37cccb;
  border-right: none;
  border-left: 120px solid #37cccb;
  float: right;
}
.pouch-main-container #extensionCloseButton {
  position: relative;
  width: 15px;
  height: 15px;
  float: right;
  top: -43px;
  right: 25px;
  cursor: pointer;
}
.pouch-main-container .referalProgramPopup {
  position: relative;
  height: 90px;
  background: #eaeaea;
  margin: 10px auto;
  border: 3px solid rgba(219, 219, 219, 0.8);
  z-index: 999;
}
.pouch-main-container .referalProgramPopup .closeReferal {
  float: left;
  width: 15%;
  background-color: rgba(219, 219, 219, 0.8);
  height: 100%;
}
.pouch-main-container .referalProgramPopup .closeReferal #referalCloseIcon {
  width: 30px;
  height: 90px;
  margin-left: 25%;
  cursor: pointer;
}
.pouch-main-container .referalProgramPopup .joinReferalTittle {
  position: relative;
  text-align: center;
  color: #636363;
  font-size: 13px;
  letter-spacing: 0.8px;
  top: 10px;
}
.pouch-main-container .referalProgramPopup #email-referal {
  color: #636363;
  margin: 15px auto;
  text-align: center;
  font-size: 13px;
  letter-spacing: 0.8px;
}
.pouch-main-container .referalProgramPopup #email-referal input {
  position: relative;
  border-bottom: 1px solid #636363;
  border-top: none;
  border-left: none;
  border-right: none;
  background: #eaeaea;
  opacity: 0.7;
  width: 60%;
}
.pouch-main-container .referalProgramPopup #email-referal input:focus {
  background: #37cccb;
  color: white;
  outline: none;
  border-bottom: none;
  padding: 3px;
}
.pouch-main-container #dealCount {
  text-align: center;
  line-height: 0.4;
  margin: 30px auto 40px;
}
.pouch-main-container #dealCount .dealFounded {
  color: #1A2355;
  font-size: 20px;
  letter-spacing: 0.4px;
}
.pouch-main-container #dealCount .dealMerchant {
  font-size: 22px;
  font-weight: bold;
  /* font-style: italic; */
  letter-spacing: 1.2px;
  color: #37cccb;
  margin-top:10px;
}
.pouch-main-container .deal-container {
  background: white;
  width: 415px;
  height: 90px;
  margin: 10px auto;
  border: 0.3px solid rgba(149, 152, 154, 0.3);
}
.pouch-main-container .deal-container .deal-top-row {
  position: relative;
  width: 100%;
  height: 70%;
  border-bottom: 0.3px solid rgba(149, 152, 154, 0.3);
}
.pouch-main-container .deal-container .deal-top-row .deal-description {
  position: relative;
  float: left;
  margin-top: 5px;
  width: 80%;
  height: 100%;
  box-sizing: border-box;
  padding: 8px;
}
.pouch-main-container .deal-container .deal-top-row .deal-description p {
  font-size: 11px;
  color: #1A2355;
  margin-left: 5px;
}
.pouch-main-container .deal-container .deal-top-row .padlock {
  position: relative;
  cursor: pointer;
  float: right;
  margin-right: 5px;
  padding: 10px;
  height: 100%;
  transition: all 200ms ease-in-out;
}
.pouch-main-container .deal-container .deal-top-row .padlock:hover {
  transform: scale(0.98);
}
.pouch-main-container .deal-container .deal-bottom-row {
  position: relative;
  width: 100%;
  height: 30%;
  list-style: none;
  display: inline-flex;
  align-content: space-between;
  text-align: center;
  padding: 0;
}
.pouch-main-container .deal-container .deal-bottom-row li {
  width: calc(100% / 3);
  margin: 0 auto;
}
.pouch-main-container .deal-container .deal-bottom-row .deal-bottom-expires {
  font-size: 10px;
  text-align: center;
  margin: 0px 0px 0px 10px;
}
.pouch-main-container .footersss {
  height: 30px;
  background: white;
  display: table;
  width: 100%;
  table-layout: fixed;
  cursor: pointer;
}
.pouch-main-container .footersss .home-tab {
  height: 30px;
  display: table-cell;
  text-align: center;
  border-right: 0.5px solid #eaeaea;
}
.pouch-main-container .footersss .link-tab {
  height: 30px;
  display: table-cell;
  text-align: center;
  border-right: 0.5px solid #eaeaea;
}
.pouch-main-container .footersss .social-tab {
  height: 30px;
  display: table-cell;
  text-align: center;
}
body.dragging,
body.dragging .rating-option {
  cursor: -webkit-grabbing !important;
  cursor: grabbing !important;
  -webkit-font-smoothing: antialiased;
}
.rating-container {
  position: absolute;
  top: 65%; 
  left: 50%; 
  transform: translate(-50%, -50%);
  font-size: 14px;
  font-weight: 500;
  margin-top: -5px;
  margin-bottom: 20px;
  color: #6E787C;
  width: 300px;
  font-family: -apple-system,"Helvetica Neue",Helvetica,Arial,sans-serif;
}

.touch-marker {
    position: absolute;
    width: 37px;
    height: 37px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05), 0 4px 6px rgba(0, 0, 0, 0.06);
    -webkit-transform: scale(2);
    transform: scale(2);
    opacity: 0;
    transition-property: -webkit-transform, opacity;
    transition-property: transform, opacity;
    transition-duration: .25s;
    transition-timing-function: cubic-bezier(.215, .61, .355, 1);
    pointer-events: none;
    will-change: transform
}

.show-touch .touch-marker {
    -webkit-transform: none;
    transform: none;
    opacity: 1
}

.rating-control {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-justify-content: space-between;
    -ms-flex-pack: justify;
    justify-content: space-between;
    position: relative;
    width: 100%;
    max-width: 300px;
    padding-bottom: 9px
}

.rating-control::before {
    content: "";
    position: absolute;
    width: 80%;
    height: 2px;
    top: 50%;
    margin-top: -13px;
    left: 10%;
    background-color: #E9ECEE
}

.rating-control .current-rating {
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
    position: absolute;
    width: 20%;
    height: 55px;
    top: 0;
    left: 0;
    will-change: transform;
    cursor: -webkit-grab;
    cursor: grab
    opacity 0
    transition opacity 0.4875s cubic-bezier(.215, .61, .355, 1)
}

.rating-control .current-rating:active {
    cursor: -webkit-grabbing;
    cursor: grabbing
}

.rating-control .current-rating .svg-wrapper {
    position: relative;
    width: 37px;
    height: 37px;
    border-radius: 50%;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.08);
    pointer-events: none
}

.rating-control .current-rating .svg-wrapper svg {
    position: absolute;
    width: 36px;
    height: 36px;
    top: 0;
    left: 0;
    will-change: transform
}

@media (-webkit-min-device-pixel-ratio:2),
(min-device-pixel-ratio:2),
(min-resolution:2dppx) {
    .rating-control .current-rating .svg-wrapper svg {
        -webkit-transform: translate(.5px, .5px);
        transform: translate(.5px, .5px)
    }
}

.rating-control .current-rating .touch-marker {
    bottom: -10px;
    left: 50%;
    margin-left: -5px
}

.rating-control .rating-option 
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    position: relative;
    -webkit-flex: 1;
    -ms-flex: 1;
    flex: 1;
    margin-top: 9px;
    cursor: pointer;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0)

.rating-control .rating-option
  animation fadein 0.75s cubic-bezier(0.25, 0.25, 0.25, 1.25) both 
  for num in (1..5)
    &:nth-child({num})
      animation-delay num * (.02s)

.rating-control .current-rating 
  opacity 1


@keyframes fadein
  0% 
    opacity 0
    transform translateX(50%) scale(0) rotateZ(-60deg)
  100%
    opacity 1
    transform translateX(0) scale(1) rotateZ(0deg)

.rating-control .rating-option:active .icon svg .base,
.rating-control .rating-option.active .icon svg .base {
    fill: #8B959A
}

.rating-control .rating-option:active .label,
.rating-control .rating-option.active .label {
    color: #313B3F !important
}

.rating-control .rating-option .icon {
    width: 36px;
    height: 36px;
    will-change: transform;
    pointer-events: none
}

.rating-control .rating-option .icon svg {
    display: block
}

.rating-control .rating-option .icon svg .base {
    transition: fill .1s ease-in-out
}

.rating-control .rating-option .label {
    font-size: 12px;
    font-weight: 500;
    color: #ABB2B6;
    margin-top: 8px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    pointer-events: none;
    will-change: transform;
    transition: color .1s ease-in-out
}

.rating-control .rating-option .label.no-transition {
    transition: none
}

.rating-control .rating-option .touch-marker {
    bottom: 15px;
    left: 50%;
    margin-left: -18px
}

      </style>
      <div class="pouch-main-container">  
                <!-- pouch-head-all -->
                <div class="fixedHeader">
                    <div class="pouchLogo"></div>
                    <div class="pouchHeaderOverlay"><span class="pouchHeadOverShadow"></span><div class="close-pouch"><svg version="1.1" id="extensionCloseButton" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="144.458px" height="144.413px" viewBox="0 0 144.458 144.413" enable-background="new 0 0 144.458 144.413"
                    xml:space="preserve">
                <path fill="#F9F7F7" d="M1.756,134.012l61.768-61.853L1.756,10.222c-2.312-2.331-2.312-6.09,0-8.421
                    c2.431-2.347,6.285-2.347,8.716,0L72.24,63.528L134.008,1.76c2.431-2.347,6.285-2.347,8.716,0c2.312,2.331,2.312,6.09,0,8.421
                    L80.956,72.16l61.768,61.853c2.312,2.331,2.312,6.09,0,8.421c-1.114,1.14-2.618,1.817-4.211,1.895
                    c-1.678-0.026-3.279-0.706-4.463-1.895L72.24,80.581l-61.768,61.937c-1.114,1.14-2.618,1.817-4.211,1.895
                    c-1.678-0.026-3.279-0.706-4.463-1.895c-2.36-2.309-2.401-6.095-0.092-8.455C1.723,134.046,1.739,134.029,1.756,134.012z"/>
                </svg></div></div> 
                </div>
                <!-- pouch-head-all -->
                
                
                <!-- referal program pop up -->
                
                <!-- deals-found-for-merchant -->
                <div id="dealCount">
                    <p class="dealFounded">Your referl code</p>
                    <p style="margin-top:30px;" class="dealMerchant">{{$users->referal_code}}</p>
                </div>
                
                <!-- deals-found-for-merchant -->
                
                <!-- deal-container -->
                <div class="deal-container"> 
                    <div class="deal-top-row">
                    <div class="deal-description">
                        <p>Refer your friend to get 15 days exclusive extension in your membership as well as your friend will get</p>
                    </div>
                    <div class="padlock">
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="35px" height="35px" viewBox="64 20.196 276 371.804" enable-background="new 64 20.196 276 371.804"
                    xml:space="preserve">
                <path fill="#F9B800" d="M292,149.432v-36.384c0-51.28-42.72-92.852-94-92.852s-94,41.572-94,92.852v43.808
                    C79.28,181.796,64,216.108,64,254c0,76.216,61.784,138,138,138s138-61.784,138-138C340,212.184,321.376,174.744,292,149.432z
                    M228,308h-56l14.832-50.856C175.736,252.12,168,240.972,168,228c0-17.672,14.328-32,32-32s32,14.328,32,32
                    c0,12.972-7.736,24.116-18.832,29.14L228,308z M260,134.708C248,124,228,116,202,116c-25.556,0-49.476,4.9-70,17.008V128
                    c0-48.72,20-76,68-76s60,31.28,60,80V134.708z"/>
                </svg>

                    </div>
                    </div>
                <!--     <ul class="deal-bottom-row">
                    <li class="deal-bottom-expires">Expires on : 07 Jan 2017</li>
                    <li class="deal-bottom-info">c</li>
                    <li class="deal-bottom-share">c</li>
                    </ul> -->
                </div>
                <!-- deal-container -->
                
                <!-- footer -->
                <div class="footersss">
                    <div class="home-tab">
                    <svg version="1.1"
                    id="Layer_1" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:cc="http://creativecommons.org/ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="20px" height="20px"
                    viewBox="0 0 328 344" enable-background="new 0 0 328 344" xml:space="preserve">
                <g transform="translate(0,-952.36218)">
                    <path fill="#95989A" d="M162.625,953.096l-160,120.006c-1.012,0.746-1.635,1.993-1.625,3.25v216.01c0,2.094,1.906,4,4,4h108
                        c2.094,0,4-1.906,4-4v-60c0-26.662,21.339-48.002,48-48.002s48,21.34,48,48.002v60c0,2.094,1.906,4,4,4h108c2.094,0,4-1.906,4-4
                        v-216.01c0-1.257-0.613-2.504-1.625-3.25l-160-120.006C165.418,951.805,163.486,952.486,162.625,953.096L162.625,953.096z
                        M165,961.221l156,117.005v210.135H221v-56c0-30.956-25.045-56.003-56-56.003s-56,25.046-56,56.003v56H9v-210.135L165,961.221z"/>
                </g>
                </svg>
                    </div>
                    <div class="link-tab">
                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                <svg version="1.1"
                    id="Layer_1" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:cc="http://creativecommons.org/ns#" xmlns:svg="http://www.w3.org/2000/svg" xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="30px"
                    height="30px" viewBox="23.911 114.962 352.228 169.97" enable-background="new 23.911 114.962 352.228 169.97"
                    xml:space="preserve">
                <g transform="translate(0,-952.36218)">
                    <path fill="#95989A" d="M358.727,1135.737c-10.764-10.764-25.624-17.501-42.073-17.501H272.99c-2.196-0.236-4.169,1.353-4.405,3.55
                        c-0.236,2.196,1.353,4.169,3.55,4.405c0.284,0.031,0.571,0.03,0.856,0l43.575,0.088c28.603-0.001,51.531,22.927,51.53,51.53
                        c0,28.602-22.84,51.442-51.442,51.442l-103.149,0.088c-28.602,0-51.53-22.928-51.53-51.53c0.001-28.603,22.927-51.53,51.53-51.53
                        h4.066c2.221-0.025,4.002-1.845,3.978-4.066c-0.023-2.221-1.845-4.001-4.066-3.978l-3.977,0.088
                        c-32.897,0.001-59.485,26.589-59.485,59.485c0,32.896,26.589,59.486,59.485,59.485h103.061
                        c32.897,0.001,59.574-26.677,59.574-59.574C376.139,1161.273,369.491,1146.501,358.727,1135.737z M228.619,1084.826
                        c-10.764-10.764-25.624-17.501-42.073-17.501l-103.149,0.088c-32.897-0.001-59.486,26.589-59.485,59.485
                        c-0.001,32.897,26.589,59.486,59.485,59.485h43.664c2.196,0.236,4.169-1.354,4.405-3.55c0.236-2.196-1.353-4.169-3.55-4.405
                        c-0.284-0.031-0.571-0.031-0.856,0l-43.575-0.088c-28.603,0.001-51.531-22.927-51.53-51.531c0-28.602,22.84-51.442,51.442-51.442
                        h103.061c28.603-0.001,51.53,22.928,51.53,51.531c-0.001,28.603-22.839,51.441-51.442,51.442h-4.066
                        c-2.222,0.011-4.013,1.821-4.001,4.042c0.011,2.222,1.821,4.013,4.043,4.001c0.016,0,0.031,0,0.047-0.001h3.889
                        c32.896,0,59.573-26.677,59.574-59.574C246.031,1110.362,239.383,1095.59,228.619,1084.826z"/>
                </g>
                </svg>

                    </div>
                    <div class="social-tab">
                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    width="20px" height="20px" viewBox="0 0 235.156 235.156" enable-background="new 0 0 235.156 235.156"
                    xml:space="preserve">
                <g>
                    <g>
                        <path fill="#95989A" d="M167.44,120.448c13.234-13.173,20.678-30.935,20.678-49.907C188.118,31.645,156.474,0,117.578,0
                            s-70.54,31.645-70.54,70.541c0,18.973,7.444,36.734,20.678,49.907C24.545,134.728,0,167.564,0,211.654v23.502h235.156v-23.502
                            C235.157,167.564,210.611,134.728,167.44,120.448z M225.782,225.781H9.376v-14.127c0-21.95,6.463-40.577,19.208-55.362
                            c11.77-13.653,28.982-23.759,49.776-29.222l9.17-2.409l-7.481-5.823c-15.02-11.689-23.634-29.293-23.634-48.297
                            c0-33.727,27.438-61.166,61.165-61.166s61.165,27.439,61.165,61.166c0,19.004-8.614,36.607-23.634,48.297l-7.481,5.823l9.17,2.409
                            c20.794,5.464,38.005,15.569,49.776,29.222c12.745,14.785,19.208,33.412,19.208,55.362v14.127H225.782z"/>
                    </g>
                </g>
                </svg>

                    </div>
                </div>
                <!-- footer -->
                </div>
      <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="top_navbar">
                            
                            <div class="menu">
                                <!-- <div class="logo">
                                    <img class="img-responsive responsive-logo" src="fitness/images/png4.png">
                                </div> -->
                                <div class="right_menu">
                                    <ul>
                                        <li class="location_li" data-toggle="modal" data-target="#country_modal_city">
                                            <!-- <span class="location">●</span>Bangalore -->
                                            <span class="location" data-toggle="modal" data-target="#country_modal_city"><img class="location_flag" src="https://ipdata.co/flags/<?php echo strtolower($users->short_country_name);?>.png" alt="Smiley face"></span><?php echo $users->city;?>
                                        </li>
                                        <li><i class="fas fa-user"></i>
                                            <div class="profile_dd">
                                                <div class="dd_item">Profile</div>
                                                <div class="dd_item" id="fcd" data-toggle="modal" data-target="#forget-password">Change Password</div>
                                                <div class="dd_item" id="logout">Logout</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="container main_dashboard">
         <div class="p_d dashboard">
            <div class="">
            <?php 
            if($users->user_status==8 || $users->user_status==9){
             ?>
             <div class="profile">
              <div class="img" style="display:inline-block;">
                <img style="border-radius:50%;" src="<?php echo Session::get('image')?>" alt="profile_pic">
              </div>
              <div class="profile_info_das" style="display:inline-block;">
                 <p class="profile_name_das"style="font-size: 21px;margin-left: 30px;"><?php echo Session::get('name');?></p>
                 <?php
                if($users->user_status==8 || $users->user_status==9){
                
                ?>
                <a href="https://docs.google.com/document/d/1RGgTsk_WgUsqeDt9zBoJigdbvLZhwr61PDz-CsAS35Q/edit?ts=606eaa67" target="_blank">
                    <div class="document-info" title="Documents">
                        <div class="info-icon-document in_v">
                            <img class="img-responsive ics" src="/insta_img/google-docs.png">
                        </div>
                        <div class="view_text in_v">
                            View Plan
                        </div>
                    </div>
                </a>
                <?php
                }
                ?> 
              </div>
              <?php
              if(sizeof($upcoming_pause)>0){
              ?>
              <hr>
              <p style="margin-left: 22px;">Upcoming Pause Details</p>
                 <p>
                 <?php
                    for($u_p=0;$u_p<sizeof($upcoming_pause);$u_p++){
                        ?>
                            <div class="pause_info_cancel" onclick="cancel_pause('{{$upcoming_pause[$u_p]->id}}','{{$upcoming_pause[$u_p]->username}}','{{$upcoming_pause[$u_p]->start_date}}','{{$upcoming_pause[$u_p]->end_date}}','{{$upcoming_pause[$u_p]->days}}')">From: {{$upcoming_pause[$u_p]->start_date}} - To: {{$upcoming_pause[$u_p]->end_date}}</div>
                        <?php
                    }
                 ?>
                    
                 </p>
             <?php } ?>
            </div>
            <hr>
             <?php   
            }else{?>
                <div class="tab_heading">Dashboard</div>
            <?php
                }
            ?>
            </div>
            <div class="modal fade membership-modal" id="term_condition" tabindex="-1" role="dialog" aria-hidden="true">

                    <div class="modal-dialog modal-lg" role="document">

                        <div class="modal-content">

                            <div class="modal-header">

                                <h5 class="modal-title tnc_title">Terms & Conditions</h5>

                                <button type="button" class="close modal_close3" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>

                                </button>

                            </div>

                            <div class="modal-body term_modal">

                                <p class="first_p">

                                    These Terms and Conditions govern your use of our fitness program and 

                                    your relationship with Liv Ezy (“we”, “us” or “Liv Ezy”). Please 

                                    read these terms carefully as they affect your rights and liabilities under 

                                    the law.

                                </p>

                                <p class="first_p">

                                    If you do not agree to these Terms of Use, please do not register as a 

                                    member, use the Website, or purchase any of our Products or Services. 

                                </p>

                                <p class="second_p">

                                    Liv Ezy, its employees, agents or representatives is not engaged in 

                                    rendering medical advice. Liv Ezy, its employees, agents or representatives 

                                    do not hold themselves out as qualified to do so.

                                </p>

                                <p class="second_p">

                                    We strongly recommend that you seek professional medical advice before embarking on any diet or exercise program.  

                                </p>

                                <ul class="first_ul">

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading"> Introduction</span>

                                            <li>

                                                This Training Program provides an online personal training service  through which you can purchase fitness e-books, online video courses 

                                                and tailored fitness and diet programs.

                                            </li>

                                            <li>

                                                These terms will apply to all users (“​you​”) of the Training Program and  all purchasers of Products.

                                            </li>

                                            <li>

                                                By using the Training Program or by purchasing any Products from us,  you agree to be bound by these Terms and Conditions. 

                                            </li>



                                        </ul>

                                    </li>

                                    <li class="li_list_head" style="font-weight:800">

                                        Please note that these Terms and Conditions may be amended from time to time. Notification of any changes will be made by us posting new terms onto 

                                        our Website. In continuing to use the Training Program you confirm that you 

                                        accept the new Terms and Conditions in full at the time you use the Program.  

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">Our Products</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    We will offer through Liv Ezy the following products.

                                                    <li class="sub_li">e-books</li>

                                                    <li class="sub_li">videos</li>

                                                    <li class="sub_li">training guides</li>

                                                    <li class="sub_li">online coaching</li>

                                                    <li class="sub_li">meal plans</li>

                                                    <li class="sub_li">individually tailored personal plans (each a “Personal Plan”).</li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">Fees</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        The fees payable in respect of the products and services will be clearly  communicated to you prior to the commencement of the Training 

                                                        Program. 

                                                    </li>

                                                    <li class="sub_li">nce you sign up and pay the requisite fees for the program, cancellation             

                                                    of the subscription is not allowed. However, the subscription may be           

                                                    transferred to any other individual of your choice with a minimal fine             

                                                    applicable within the first 30 calendar days from the date of the start of the                 

                                                    subscription. This transfer will not be permitted after the expiry of the first 30               

                                                    calendar days from the date of the start of the subscription.  

                                                    </li>

                                                    <li class="sub_li">There will be no refund on any of the subscription plans under any  circumstances.</li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">How to contact us</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        We are Liv Ezy , a Privat Limited , registered  in India and our registered office is at 186 B, 4​th ​Cross, S.T. Bed, Koramangala,Bangalore-560034.  

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">Registration</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        When you register as a member we will ask that you provide certain 

                                                        personal information including but not limited to your name, email address, 

                                                        postal address, and your payment details. Any personal information you 

                                                        provide to us will be handled in accordance with our Privacy and Data 

                                                        Protection Policy which can be shared with you upon request.  

                                                        

                                                    </li>

                                                    <li>

                                                        You agree that all personal information that you supply to us will be  accurate, complete and kept up to date at all times. We may use the 

                                                        information provided to us to contact you.  

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">Licence</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        On your purchase of the relevant Product, we will grant to you, for your  own personal use only, a limited, non-exclusive, non-transferable 

                                                        license to access our training program and (as the case may be):  

                                                        <li>

                                                            <ul style="list-style: lower-roman;">

                                                                <li class="sub_li">

                                                                    access video on a streaming only basis; 

                                                                </li>

                                                                <li class="sub_li">

                                                                    access and download e-books; 

                                                                </li>

                                                                <li class="sub_li">access and download personalised fitness plans; </li>

                                                            </ul>

                                                        </li>

                                                    </li>

                                                    <li>

                                                        You are not permitted to share any of the content licensed under these  terms with any other individuals.  

                                                    </li>

                                                    <li>

                                                        Except for the foregoing limited license, no right, title or interest shall be 

                                                        transferred to you

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">Availability</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        lthough we aim to offer you the best service possible, we make no               

                                                        promise that the Training Program will meet your requirements. We          

                                                        cannot guarantee that the Training Program will be fault-free. 

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">Availability</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        Liv Ezy will have no liability for any personal injury which is caused  to you as a result of your use of the Training Program.  

                                                    </li>

                                                    <li class="sub_li">

                                                        Liv Ezy, its employees, agents or representatives is not engaged in  rendering medical advice. Liv Ezy, its employees, agents or 

                                                        representatives do not hold itself as qualified to do so.  

                                                    </li>

                                                    <li class="sub_li">

                                                        We strongly recommend that you seek professional medical advice  before embarking on any diet or exercise program. 

                                                    </li>

                                                    <li class="sub_li">

                                                    Any exercise program, even in healthy individuals, carries risk. You  have a responsibility to exercise you own personal judgment, as well as  

                                                        any other considerations, before acting on any of the content provided 

                                                        by us.  

                                                    </li>

                                                    <li class="sub_li">

                                                        The information that is provided by Liv Ezy for the nutrition  

                                                        program/fitness program may not be accurate in terms of nutritional 

                                                        values which includes calories, macronutrients and micronutrients and 

                                                        the customer will not hold Liv Ezy responsible for any personal injury 

                                                        caused as a result of such information.  

                                                    </li>

                                                    <li class="sub_li">

                                                        Where we provide you with a Training Program, the information  

                                                        contained therein should not be regarded as or relied upon as being a 

                                                        comprehensive health or exercise program. Accordingly any actions that 

                                                        you take in relation to a personal plan should not be pursued regardless 

                                                        or to the exclusion of other information, opinions or judgments that are 

                                                        available to you. 

                                                    </li>

                                                    <li class="sub_li">

                                                        Any Training Program will have been prepared on the basis of  

                                                        information provided by you. You are responsible for the accuracy of any 

                                                        information that you provide to us. You are responsible for informing us of 

                                                        any health issues or medical conditions when asking us to prepare a 

                                                        Training Program.

                                                    </li>

                                                    <li class="sub_li">

                                                        Before taking any action in relation to a 

                                                        Training Program, you must  take into account any other factors apart from the Training Program of 

                                                        which you are or ought to be aware.  

                                                    </li>

                                                </ul>

                                            </li>

                                            <li>

                                                For example, we always recommend that you seek professional medical advice before 

                                                embarking on any exercise program. Your decisions to engage in any exercise 

                                                program should take into account any medical or other professional advice that is 

                                                available to you as well as using your own personal judgment as to what activity is 

                                                safe for you to engage in.  

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul> <span class="li_list_heading">The information set out in any Training Program may relate to certain 

                                            contexts and may not be suitable in other contexts. It is your responsibility to 

                                            ensure that you do not use the information we provide in the wrong context.<br>

                                            For example, where a program was tailored for a woman who was not pregnant,                

                                            this would not be appropriate for her to use after becoming pregnant.</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        You are responsible for informing us of any health issues and  

                                                        pre-existing medical conditions when you ask us to prepare a Training 

                                                        Program  

                                                    </li>

                                                    <li class="sub_li">

                                                        Any information that we provide that does not form part of the Personal  Training Program, whether obtained through our website, e-book, video 

                                                        course, social media (such as Facebook, Instagram or Twitter) or 

                                                        otherwise, is provided for the purposes of general information only.    

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">Expected Results</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        While we believe that for most people, following our programs 

                                                        and  methods will lead to desired results. All exercise programs depend on 

                                                        the individual. Result will be affected by the effort and commitment of 

                                                        the individual, however in some circumstances even where an individual 

                                                        follows our program may not achieve the desired results. We therefore 

                                                        provide no warranties of any kind, express or implied, as to:

                                                        <li>

                                                            <ul style="list-style: lower-roman;">

                                                                <li class="sub_li">

                                                                    the effectiveness of any techniques, diets or programs that we  deliver; 

                                                                </li>

                                                                <li class="sub_li">

                                                                    the results that you may achieve as a result of following our  programs.  

                                                                </li>

                                                            </ul>

                                                        </li>  

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">Data Protection Policy</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        We request that all personal information that you provide is accurate,  current and complete. 

                                                    </li>

                                                    <li class="sub_li">

                                                        All notices sent to you will be sent to the email address provided with  

                                                        your registration details (as updated by you). By accepting these terms 

                                                        you give your consent to receive communications from us by email and 

                                                        you agree that all agreements, notices, disclosures and other 

                                                        communications that we provide to you by email satisfy any legal 

                                                        requirement that such communications be in writing.  

                                                    </li>

                                                    <li class="sub_li">

                                                        Any personal information that you provide to us will be handled in  

                                                        accordance with our Privacy and Data Protection Policy which can be 

                                                        provided to you upon request.  

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">Intellectual Property</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        By providing any content for distribution (such as before and after 

                                                        photographs) you expressly grant us a worldwide, royalty-free, perpetual, 

                                                        irrevocable license to use, copy, store, perform, display and distribute such 

                                                        content.  

                                                    </li>

                                                    <li class="sub_li">

                                                        You agree and grant Liv Ezy a worldwide, royalty-free, perpetual, 

                                                        irrevocable license to use, copy, store, perform, display and distribute any 

                                                        pictures that you share with Liv Ezy, including but not limited to pictures 

                                                        of your body showing the day to day progress that you have made. These 

                                                        pictures include but are not limited to “before” and “after” pictures. “Before” 

                                                        here refers to pictures of your body prior to using the services of Liv Ezy. 

                                                        “After” here refers to pictures of your body during the course of using the 

                                                        services of Liv Ezy and upon completion of using the services of Ral 

                                                        Fitness. You have no-objection to Liv Ezy using your pictures or any 

                                                        other content that you have shared for the purpose of marketing and 

                                                        business-development of Liv Ezy.

                                                    </li>

                                                    <li class="sub_li">

                                                        The format and content our Training Programs and Products are  protected by 

                                                        The Indian Copyright Act and we reserve all rights in 

                                                        relation to our copyright whether owned or licensed to us and all rights 

                                                        are reserved to any of our registered and unregistered trademarks 

                                                        (whether owned or licensed to us) which appear on any of our Training 

                                                        Programs or Products.  

                                                    </li>

                                                    <li class="sub_li">

                                                        This contents of any of our Training Programs or Products may not be  

                                                        reproduced, duplicated, copied, sold, resold, visited, or otherwise 

                                                        exploited for any commercial purpose without our express written 

                                                        consent. You may not systematically extract and/or re-utilise parts of the 

                                                        contents of the Training Programs or Products without our express written 

                                                        consent. In particular, you may not utilise any data mining, robots, or 

                                                        similar data gathering and extraction tools to extract (whether once or 

                                                        many times) for re-utilisation of any substantial parts of the Training 

                                                        Programs or Products without our express written consent.  

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">International Use</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                    You shall comply with all foreign and local laws and regulations which 

                                                        apply to your use of our Training Programs or Products in whatever country 

                                                        you are physically located, including without limitation, consumer law, 

                                                        export control laws and regulations. 

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">General</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                        These conditions are governed by and construed in accordance with  

                                                        the laws of the Union of India and the State of Karnataka. You agree, as 

                                                        we do, to submit to the jurisdiction of the courts in Bangalore, India.    

                                                    </li>

                                                    <li class="sub_li">

                                                        If you breach these Terms and Conditions and we decide to take no  

                                                        action or neglect to do so, then we will still be entitled to take action 

                                                        and enforce our rights and remedies for any other breach. 

                                                    </li>

                                                    <li class="sub_li">

                                                        We will not be responsible for any breach of these Terms and  Conditions caused by circumstances beyond our reasonable control.  

                                                    </li>

                                                    <li class="sub_li">

                                                        We may make changes to the format of the Training Program or  Products at any time without notice.

                                                    </li>

                                                    <li class="sub_li">

                                                        The pictures of your physique updates sent by you to Liv Ezy with 

                                                        respect to the progress that you have made after signing up for the program, 

                                                        should be taken in the same outfit/clothing. If the picture sent by is a picture 

                                                        that is taken of your reflection in the mirror, then every picture taken should 

                                                        be of the same distance from the mirror.  

                                                    </li>

                                                    <li class="sub_li">

                                                        If you are a minor, then a No-Objection Certificate (“NOC”) should be  i

                                                        ssued by your parents/guardian giving consent for using the programs 

                                                        provided by Liv Ezy. A minor can enroll in a program provided by Ral 

                                                        Fitness only once the NOC is provided. All the above-mentioned clauses 

                                                        which are mentioned in the above mentioned “Terms and Conditions” will 

                                                        apply for the minor too in entirety.  

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                    <li class="li_list_head">

                                        <ul><span class="li_list_heading">Updates and Follow-Up</span>

                                            <li>

                                                <ul style="list-style: lower-roman;">

                                                    <li class="sub_li">

                                                    YIt is your duty to send in daily meal and weight updates and weekly 

                                                    physique updates to Liv Ezy. Liv Ezy will follow up with you            

                                                    regarding the same, but will not be held liable for any failure on your part to

                                                    provide the daily meal and weight updates and weekly physique updates. 

                                                    </li>

                                                </ul>

                                            </li>

                                        </ul>

                                    </li>

                                </ul>

                            </div>

                            <div class="row tnc_footer" style="margin: 0;">

                                <!-- <div class="row_footer_row"> -->

                                    <div class="col-md-6 first_ct" style="text-align: left;background: #e5e5e5;font-size: larger;padding: 10px;margin-left: 1;">

                                        <input type="checkbox" id="test1" style="margin-right: 10px;"><span id="test1_span">Accept Terms &amp; Conditions</span>

                                        <p class="tnc_text_error" style="color:red;font-size: 12px;margin-left: 26px;">Please accept terms &amp; conditions</p>

                                    </div>

                                    <div class="col-md-6 first_cts" style="text-align: left;background: #e5e5e5;font-size: larger;padding: 10px;margin-left: 1;">

                                        <button id="pay_tnc" class="btn btn-success pay__" style="float: right;width: -webkit-fill-available;">Pay</button>

                                    </div>

                                <!-- </div> -->

                            </div>

                        </div>

                    </div>

            </div>
            
            <?php
                if($users->user_status==1){
            ?>
            <header class="intro">
                <h1> Welcome to Liv Ezy Community </h1>
                <p> We are excited to onboard you</p>
                <p> So please choose your plan and proceed</p>
                <div class="action">
                    <a href="#" title="Back to Plan" class="btn back">Back to Subscription Plan</a>
                    <a href="#" title="Liv Ezy" class="btn github">Use our app</a>
                </div>
            </header>
            <?php }
            if($users->user_status>3 && $users->user_status<8 && $users->member_type!='Live Session'){
            ?>
            <div class="item">
            <center>
                <div class="sixteen columns"> 
                    <div id="applicationStatus">
                        <ul class="applicationStatus">
                            
                            <li class="applicationStatusGood applicationStatus_complete">
                                <div class="status_text">
                                    Questionaire Submitted
                                </div>
                            </li>
                            <li class="applicationStatusGood <?php echo $users->user_status>=5?'applicationStatus_complete':' '?>">
                                <div class="status_text">
                                    Physique Uploaded
                                </div>
                            </li>
                            <li class="applicationStatusGood <?php echo $users->user_status>=6?'applicationStatus_complete':' '?>">
                                <div class="status_text">
                                    Plan Sent
                                </div>
                            </li>
                            <li class="applicationStatusGood <?php echo $users->user_status>=7?'applicationStatus_complete':' '?>">
                                <div class="status_text">
                                    Introduction call
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                </center>
            </div>
            <?php
            }
            if($users->user_status!=1){
            ?>
            <div class="row item row_t1">
                <div class="col-md-3 premium_card_container">
                    <!-- <div class="day_progree_text"> -->
                        <!-- <div class="l_r">
                            <div class="legend_r"></div>
                            <div class="legend_r_text">
                                Days Completed
                            </div>
                        </div> -->
                        <!-- <div class="l_r">
                            <div class="legend_c"></div>
                            <div class="legend_c_text">
                                Days Left
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="day_progress"></div> -->
                    <!-- <link rel="stylesheet" href="./test.css" /> -->
                    <script src="fitness/tracker_src/src/donutty.js"></script>
                    <script src="fitness/tracker_src/src/vanilla.js"></script>
                    <style>
                        .dsc{
                            width: 255px;
                            position: absolute;
                        }
                        .dsc>svg{
                            
                            transform: rotate(270deg);
                        }
                        .dsc>svg:first-child{
                            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
                            /* stroke: #fff; */
                        }
                        .left_d_b{
                            position: relative;
                            left: 74px;
                            z-index: 1;
                            right: -45px;
                            top: 150px;
                        }
                        .d_oniut{
                            margin-top:-60px;
                        }
                        .btn-calendar{
                            text-decoration: none;
                            color: #fff;
                        }
                        .btn-calendar:hover{
                            text-decoration: none;
                            color: #fff;
                        }
                        .main_container .sidebar{
                            z-index:1;
                        }
                        .pignose-calendar .pignose-calendar-unit.pignose-calendar-unit-range a{
                            background-color:#31cde54a;
                        }
                    </style>
                    <div class="d_oniut">
                            <div class="left_d_b">
                                <div class="left_d legend_c_text">
                                    {{$user_workday?$user_workday['user_plan_left_day']:0}}
                                </div>
                                <div class="left_b d_l">
                                    Days Left
                                </div>
                            </div>
                            <div class="dsc" data-bg="#fff" data-title="{{$user_workday?$user_workday['user_plan_left_day']:0}} Days Left" data-donutty data-radius=40 data-thickness=6 data-circle=true data-padding=4 data-round=true data-color="#45bbff" data-value="{{$user_workday?$user_workday['user_complete_percentage']:0}}">
                            </div>
                    </div>
                    <!-- <div class="wrapper">
                        <div class="row pb-5">
                            <div class="">
                                <div class="counter" data-cp-percentage="{{$user_workday?$user_workday['user_complete_percentage']:0}}" data-cp-days-comp="{{$user_workday?$user_workday['user_complete_day']:0}}" data-cp-days-left="{{$user_workday?$user_workday['user_plan_left_day']:0}}" data-cp-color="#ddd">
                                </div>
                                
                            </div>
                        </div>
                    </div> -->
                    <!-- <style>

                        .counter {
                            display: inline-flex;
                            cursor:pointer;
                            width:240px;
                            height:240px;
                            max-width:100%;
                            position:relative;
                            justify-content:center;
                            align-items:center;
                            font-size: calc(1em + 1vmin);
                            transition: height .2s ease-in-out;
                            /* background: #fff; */
                            border-radius:50%;
                            box-shadow:0px 1px 10px 2px rgba(0,0,0,0.2);
                            margin:1em 0;
                            margin-left:20px;/*86*/
                        }
                        .percentage {
                        position:absolute;
                        text-align:center;
                        top:50%;
                        left:0;
                        right:0;
                        vertical-align:middle;
                        transform:translate3d(0,-50%,0);
                        }


                    </style>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {

                            var circleProgress = (function(selector) {
                            var wrapper = document.querySelectorAll(selector);
                            Array.prototype.forEach.call(wrapper, function(wrapper, i) {
                                var wrapperWidth,
                                wrapperHeight,
                                percent,
                                innerHTML,
                                context,
                                lineWidth,
                                centerX,
                                centerY,
                                radius,
                                newPercent,
                                speed,
                                from,
                                to,
                                duration,
                                start,
                                strokeStyle,
                                text,
                                inside_track;

                                var getValues = function() {
                                wrapperWidth = parseInt(window.getComputedStyle(wrapper).width);
                                wrapperHeight = wrapperWidth;
                                percent = wrapper.getAttribute('data-cp-percentage');
                                var day_complete = wrapper.getAttribute('data-cp-days-comp');
                                var day_left = wrapper.getAttribute('data-cp-days-left');
                                
                                inside_track=`<div class="day_progree_text">
                                                    <div class="l_r">
                                                        
                                                        <div class="legend_c_text">
                                                            ${day_left} 
                                                        </div>
                                                        <div class="d_l">
                                                            Days left
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>`;
                                innerHTML = '<span class="percentage"><strong>' + inside_track + '</strong> %</span><canvas class="circleProgressCanvas" width="' + (wrapperWidth * 2) + '" height="' + wrapperHeight * 2 + '"></canvas>';
                                wrapper.innerHTML = innerHTML;
                                text = wrapper.querySelector(".percentage");
                                canvas = wrapper.querySelector(".circleProgressCanvas");
                                wrapper.style.height = canvas.style.width = canvas.style.height = wrapperWidth + "px";
                                context = canvas.getContext('2d');
                                centerX = canvas.width / 2;
                                centerY = canvas.height / 2;
                                newPercent = 0;
                                speed = 1;
                                from = 0;
                                to = percent;
                                duration = 1000;
                                lineWidth = 50;
                                radius = canvas.width / 2 - lineWidth;
                                strokeStyle = wrapper.getAttribute('data-cp-color');
                                start = new Date().getTime();
                                };

                                function animate() {
                                requestAnimationFrame(animate);
                                var time = new Date().getTime() - start;
                                if (time <= duration) {
                                    var x = easeInOutQuart(time, from, to - from, duration);
                                    newPercent = x;
                                    text.innerHTML = inside_track;
                                    drawArc();
                                }
                                }

                                function drawArc() {
                                var circleStart = 1.5 * Math.PI;
                                var circleEnd = circleStart + (newPercent / 50) * Math.PI;
                                context.clearRect(0, 0, canvas.width, canvas.height);
                                context.beginPath();
                                context.arc(centerX, centerY, radius, circleStart, 4 * Math.PI, false);
                                context.lineWidth = lineWidth;
                                context.strokeStyle = "#36CCCB";
                                context.stroke();
                                context.beginPath();
                                context.arc(centerX, centerY, radius, circleStart, circleEnd, false);
                                context.lineWidth = lineWidth;
                                context.strokeStyle = strokeStyle;
                                context.stroke();

                                }
                                var update = function() {
                                getValues();
                                animate();
                                }
                                update();

                                
                                wrapper.addEventListener("click", function() {
                                update();
                                });

                                var resizeTimer;
                                window.addEventListener("resize", function() {
                                clearTimeout(resizeTimer);
                                resizeTimer = setTimeout(function() {
                                    clearTimeout(resizeTimer);
                                    start = new Date().getTime();
                                    update();
                                }, 250);
                                });
                            });

                            //
                            // http://easings.net/#easeInOutQuart
                            //  t: current time
                            //  b: beginning value
                            //  c: change in value
                            //  d: duration
                            //
                            function easeInOutQuart(t, b, c, d) {
                                if ((t /= d / 2) < 1) return c / 2 * t * t * t * t + b;
                                return -c / 2 * ((t -= 2) * t * t * t - 2) + b;
                            }

                            });

                            circleProgress('.counter');

                            // Gibt eine Zufallszahl zwischen min (inklusive) und max (exklusive) zurück
                            function getRandom(min, max) {
                            return Math.random() * (max - min) + min;
                            }
                            });
                    </script> -->
                </div>
                <div class="col-md-3 paid_container" >
                    <!-- <p class="common_s calender_right">Choose your start date<input class="date_right" type="date"></p> -->
                    <!-- <div class="pause_btn">
                        Pause Your Plan
                    </div> -->
                    <div class="pause_heading">Pause Plan</div>
                    <div class="pause_contain">
                        <p class="common_s">Pause days available <span class="t_v"><?php echo $users->total_pause_day;?></span></p>
                        <p class="common_s">Pause days availed <span class="t_v"><?php echo $users->pause_day_availed;?></span></p>
                        <p class="common_s">Pause days left <span class="t_v"><?php echo $users->total_pause_day-$users->pause_day_availed;?></span></p>
                        <div class="pause_btn input-group date reload_element center">
                            <?php 
                            if($users->user_status>3 && $users->user_status<8){
                            ?>
                            
                                <div style="margin-top:16px;">Your plan soon starting</div>
                            <?php }else if($users->user_status==2){?>
                                <div style="margin-top:16px;"><a href="#" id="p_s_c" class="btn-calendar">Start Your Plan</a></div>
                                
                            <?php
                            }else{
                                if($users->user_status==9){
                                    echo '<style>.pause_btn{margin-left:-20px;}</style><div style="margin-top:8px;"><span id="cancel_pause">Cancel Pause</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i data-toggle="modal" data-target="#pause_info" class="fa fa-info"></i></div>';

                                }else if($users->user_status==8){
                                    echo '<style>.pause_btn{margin-left:-20px;}</style><div style="margin-top:17px;"><a href="#" id="r_p_p" class="btn-calendar">Pause</a></div>';
                            
                                }else{
                                    echo '<div style="margin-top:16px;">Plan Expired</div>';
                                }
                            }
                            ?>
                            <script type="text/javascript">
                                // $(function() {
                                //     $('a.calendar-start').pignoseCalendar({
                                //         format: 'YYYY-MM-DD' // date format string. (2017-02-02)
                                //     });
                                // });
                            </script>
                            <script type="text/javascript">
                                //<![CDATA[
                                $(function () {

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
                                        }
                                        else if (date[0] === null && date[1] == null) {
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
                                        var c_id=$(context.element).attr('id');
                                        if(c_id!='r_p_p'){
                                            if('<?php echo $users->is_profile_filled;?>'=='0'){
                                                toastr.error('Please complete your profile section to proceed further');
                                                $('#profile_d').click();
                                                return false;
                                            }
                                            if(moment().add(0, 'days').format('YYYY-MM-DD')==date[0].format('YYYY-MM-DD') && c_id!='r_p_p'){
                                                toastr.error('Please choose your programe start date');
                                                return false;
                                            }
                                            var start_date=date[0].format('YYYY-MM-DD');
                                            var d_date=date[0].format("dddd, MMMM Do, YYYY");
                                            if('<?php echo $users->member_type;?>'=='Live Session'){
                                                swal({
                                                    title: 'Are you sure want to start your plan at '+d_date,
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Yes',
                                                    showLoaderOnConfirm: true,
                                                    allowOutsideClick: false
                                                    }).then(function(email) {
                                                        $.ajax({
                                                            url:'question_filled',
                                                            data:{'start_date':start_date},
                                                            type:'post',
                                                            success:function(data){
                                                                location.reload();

                                                            }
                                                        })
                                                }).catch(swal.noop)
                                            }
                                            else{
                                                    $.ajax({
                                                    url:'partner_profile_filled',
                                                    type:'post',
                                                    success:function(data){
                                                        if(data){
                                                            swal({
                                                                title: 'Are you sure want to start your plan '+d_date,
                                                                showCancelButton: true,
                                                                confirmButtonText: 'Yes',
                                                                showLoaderOnConfirm: true,
                                                                allowOutsideClick: false
                                                                }).then(function(email) {
                                                                    $.ajax({
                                                                        url:'question_filled',
                                                                        data:{'start_date':start_date},
                                                                        type:'post',
                                                                        success:function(data){
                                                                            $('.main_dashboard').html(data.html);

                                                                        }
                                                                    })
                                                                }).catch(swal.noop)
                                                        }else{
                                                            toastr.error('Sorry your partner has not completed profile section please contact your partner to complete profile section');

                                                        }
                                                    }
                                                })
                                            }
                                        }else{
                                            var p_s_d=date[0].format('YYYY-MM-DD');
                                            var p_e_d=date[1].format('YYYY-MM-DD');

                                            
                                            $.ajax({
                                                url:'pause_plan',
                                                type:'post',
                                                data:{"_token": "{{ csrf_token() }}",'pause_start_date':p_s_d,'pause_end_date':p_e_d},
                                                global:true,
                                                async:false,
                                                success:function(response){
                                                    if(response=='1'){
                                                        toastr.success('Pause applied successfully');
                                                        let success_temp=`<li>
                                                        <p>Your subscription has been paused from ${p_s_d} to ${p_e_d}<br>
                                                            Your subscription will resume from ${moment(p_e_d).add(1, 'days').format('YYYY-MM-DD')}
                                                        </p>
                                                        </li>`;
                                                        swal({
                                                            title: success_temp,
                                                            showCancelButton: false,
                                                            confirmButtonText: 'Ok',
                                                            showLoaderOnConfirm: true,
                                                            allowOutsideClick: false
                                                            }).then(function(email) {
                                                                window.location.href='/';
                                                        }).catch(swal.noop)
                                                        
                                                    }else{
                                                        swal({
                                                            title: response,
                                                            showCancelButton: false,
                                                            confirmButtonText: 'Ok',
                                                            showLoaderOnConfirm: true,
                                                            allowOutsideClick: false
                                                            }).then(function(email) {
                                                                
                                                        }).catch(swal.noop)
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
                                        console.log('date',text);
                                        if (date[0] !== null && date[1] !== null) {
                                            text += ' ~ ';
                                        }
                                        else if (date[0] === null && date[1] == null) {
                                            text += 'nothing';
                                        }

                                        if (date[1] !== null) {
                                            text += date[1].format('YYYY-MM-DD');
                                        }

                                        $box.text(text);
                                    }

                                    // Default Calendar
                                    $('.calendar-start').pignoseCalendar({
                                        select: onSelectHandler
                                    });

                                    // Input Calendar
                                    $('.input-calendar').pignoseCalendar({
                                        apply: onApplyHandler,
                                        buttons: true, // It means you can give bottom button controller to the modal which be opened when you click.
                                    });

                                    // Calendar modal
                                    var $btn = $('#p_s_c').pignoseCalendar({
                                        apply: onApplyHandler,
                                        modal: true, // It means modal will be showed when you click the target button.
                                        buttons: true,
                                        minDate:moment().add(0, 'days')
                                    });

                                    var $pause_calander=$('#r_p_p').pignoseCalendar({
                                        apply: onApplyHandler,
                                        modal: true, // It means modal will be showed when you click the target button.
                                        buttons: true,
                                        multiple: true,
                                        select:onSelectHandler,
                                        minDate:moment().add(0, 'days')
                                    });
                                    // Color theme type Calendar
                                    $('.calendar-dark').pignoseCalendar({
                                        theme: 'dark', // light, dark, blue
                                        select: onSelectHandler
                                    });

                                    // Blue theme type Calendar
                                    $('.calendar-blue').pignoseCalendar({
                                        theme: 'blue', // light, dark, blue
                                        select: onSelectHandler
                                    });

                                    // Schedule Calendar
                                    $('.calendar-schedules').pignoseCalendar({
                                        scheduleOptions: {
                                            colors: {
                                                holiday: '#2fabb7',
                                                seminar: '#5c6270',
                                                meetup: '#ef8080'
                                            }
                                        },
                                        schedules: [{
                                            name: 'holiday',
                                            date: '2017-08-08'
                                        }, {
                                            name: 'holiday',
                                            date: '2017-09-16'
                                        }, {
                                            name: 'holiday',
                                            date: '2017-10-01',
                                        }, {
                                            name: 'holiday',
                                            date: '2017-10-05'
                                        }, {
                                            name: 'holiday',
                                            date: '2017-10-18',
                                        }, {
                                            name: 'seminar',
                                            date: '2017-11-14'
                                        }, {
                                            name: 'seminar',
                                            date: '2017-12-01',
                                        }, {
                                            name: 'meetup',
                                            date: '2018-01-16'
                                        }, {
                                            name: 'meetup',
                                            date: '2018-02-01',
                                        }, {
                                            name: 'meetup',
                                            date: '2018-02-18'
                                        }, {
                                            name: 'meetup',
                                            date: '2018-03-04',
                                        }, {
                                            name: 'meetup',
                                            date: '2018-04-01'
                                        }, {
                                            name: 'meetup',
                                            date: '2018-04-19',
                                        }],
                                        select: function (date, context) {
                                            var message = `You selected ${(date[0] === null ? 'null' : date[0].format('YYYY-MM-DD'))}.
                                                            <br />
                                                            <br />
                                                            <strong>Events for this date</strong>
                                                            <br />
                                                            <br />
                                                            <div class="schedules-date"></div>`;
                                            var $target = context.calendar.parent().next().show().html(message);

                                            for (var idx in context.storage.schedules) {
                                                var schedule = context.storage.schedules[idx];
                                                if (typeof schedule !== 'object') {
                                                    continue;
                                                }
                                                $target.find('.schedules-date').append('<span class="ui label default">' + schedule.name + '</span>');
                                            }
                                        }
                                    });

                                    // Multiple picker type Calendar
                                    $('.multi-select-calendar').pignoseCalendar({
                                        multiple: true,
                                        select: onSelectHandler
                                    });

                                    // Toggle type Calendar
                                    $('.toggle-calendar').pignoseCalendar({
                                        toggle: true,
                                        select: function (date, context) {
                                            var message = `You selected ${(date[0] === null ? 'null' : date[0].format('YYYY-MM-DD'))}.
                                                            <br />
                                                            <br />
                                                            <strong>Events for this date</strong>
                                                            <br />
                                                            <br />
                                                            <div class="active-dates"></div>`;
                                            var $target = context.calendar.parent().next().show().html(message);

                                            for (var idx in context.storage.activeDates) {
                                                var date = context.storage.activeDates[idx];
                                                if (typeof date !== '<span class="ui label"><i class="fas fa-code"></i>string</span>') {
                                                    continue;
                                                }
                                                $target.find('.active-dates').append('<span class="ui label default">' + date + '</span>');
                                            }
                                        }
                                    });

                                    // Disabled date settings.
                                    (function () {
                                        // IIFE Closure
                                        var times = 30;
                                        var disabledDates = [];
                                        for (var i = 0; i < times; /* Do not increase index */) {
                                            var year = moment().year();
                                            var month = 0;
                                            var day = parseInt(Math.random() * 364 + 1);
                                            var date = moment().year(year).month(month).date(day).format('YYYY-MM-DD');
                                            if ($.inArray(date, disabledDates) === -1) {
                                                disabledDates.push(date);
                                                i++;
                                            }
                                        }

                                        disabledDates.sort();

                                        var $dates = $('.disabled-dates-calendar').siblings('.guide').find('.guide-dates');
                                        for (var idx in disabledDates) {
                                            $dates.append('<span>' + disabledDates[idx] + '</span>');
                                        }

                                        $('.disabled-dates-calendar').pignoseCalendar({
                                            select: onSelectHandler,
                                            disabledDates: disabledDates
                                        });
                                    }());

                                    // Disabled Weekdays Calendar.
                                    $('.disabled-weekdays-calendar').pignoseCalendar({
                                        select: onSelectHandler,
                                        disabledWeekdays: [0, 6]
                                    });

                                    // Disabled Range Calendar.
                                    var minDate = moment().set('dates', Math.min(moment().day(), 2 + 1)).format('YYYY-MM-DD');
                                    var maxDate = moment().set('dates', Math.max(moment().day(), 24 + 1)).format('YYYY-MM-DD');
                                    $('.disabled-range-calendar').pignoseCalendar({
                                        select: onSelectHandler,
                                        minDate: minDate,
                                        maxDate: maxDate
                                    });

                                    // Multiple Week Select
                                    $('.pick-weeks-calendar').pignoseCalendar({
                                        pickWeeks: true,
                                        multiple: true,
                                        select: onSelectHandler
                                    });

                                    // Disabled Ranges Calendar.
                                    $('.disabled-ranges-calendar').pignoseCalendar({
                                        select: onSelectHandler,
                                        disabledRanges: [
                                            ['2016-10-05', '2016-10-21'],
                                            ['2016-11-01', '2016-11-07'],
                                            ['2016-11-19', '2016-11-21'],
                                            ['2016-12-05', '2016-12-08'],
                                            ['2016-12-17', '2016-12-18'],
                                            ['2016-12-29', '2016-12-30'],
                                            ['2017-01-10', '2017-01-20'],
                                            ['2017-02-10', '2017-04-11'],
                                            ['2017-07-04', '2017-07-09'],
                                            ['2017-12-01', '2017-12-25'],
                                            ['2018-02-10', '2018-02-26'],
                                            ['2018-05-10', '2018-09-17'],
                                        ]
                                    });

                                    // I18N Calendar
                                    $('.language-calendar').each(function () {
                                        var $this = $(this);
                                        var lang = $this.data('lang');
                                        $this.pignoseCalendar({
                                            lang: lang
                                        });
                                    });

                                });
                                //]]>
                            </script>
                        </div>
                        <?php
                
                if($users->user_status==8 || $users->user_status==9){
                
                ?>
                        <div class="pause_info_m">
                         <i data-toggle="modal" data-target="#pause_info" class="info_p">i</i>
                        </div>
                        <?php
                }
                        ?>
                    </div>
                </div>
                <div class="col-md-3 premium_card_container" style="margin-left: 75px;">
                <?php
                
                if($users->user_status==8){
                
                ?>
                <!-- <div class="document-info" title="Documents">
                    <i class="fa fa-file" aria-hidden="true"></i>
                </div> -->
                <div class="whats-app-div" data-toggle="tooltip" title="Instant Chat on whats app">
                
                    <div class="whats-app-img">
                        <img class="img-whats-app" src="fitness/images/whatsapp.png">
                    </div>
                </div>   
                <?php
                }
                if($users->user_status==9){
                ?> 
                    <div class="support_email">
                        <a href="mailto:support@livezy.com"><i class="fa fa-envelope e_m_s"></i></a>
                    </div>
                <?php
                }
                ?>
                <div class="pause_heading" style="margin-top: -4%;">Membership</div>
                    <div class="premium_card">
                        <!-- <p class="first_pc">
                            <span class="common_p_text name_p">Premium</span>
                            <span class="common_p_text plan_name"><?php echo ucfirst($users->plan);?> Membership</span>
                        </p>
                        <p class="common_date common_p_text start_date">Start Date: <span class="common_p_text">{{$users->plan_start_date?$users->plan_start_date:'XX/XX/XXXX'}}</span></p>
                        <p class="common_date common_p_text end_date">End Date: <span class="common_p_text">{{$users->plan_start_date?$users->plan_end_date:'XX/XX/XXXX'}}</span></p> -->
                        <p class="p_t1"><?php echo ucfirst($users->plan);?> Membership</p>
                        <p class="p_t2"><?php echo ucfirst($users->member_type);?> Plan</p>
                        <p class="p_t3">Start Date: {{$users->plan_start_date?$users->plan_start_date:'XX/XX/XXXX'}}  &nbsp;&nbsp;&nbsp;End Date: {{$users->plan_start_date?$users->plan_end_date:'XX/XX/XXXX'}}</p>

                        <p class="user_info_p">
                            <!-- <span class="common_p_text name_p_u">Liv Ezy</span> -->
                            <?php
                            if($users->user_status==11){
                            ?>
                            <span class="common_p_text renew_m_p" data-toggle="modal" data-target="#renew_modal">Renew</span>
                            <?php
                            }
                            ?>
                        </p>
                        <!-- <p class="g_p2">Gold Membership <span class="premium">Premium</sapn></p>
                        <p class="g_p">Start Date : 18 Aug 2020</p>
                        <p class="g_p">End Date : 20 Feb 2021 <span class="renew">Renew</span></p> -->
                    </div>
                    <!-- <div class="premium_card premium_card2">
                        <p class="g_p_n">Target Goal</span></p>
                    </div> -->
                    
                </div>
            </div>
            <?php
            }
            ?>
            <div class="item">
            <?php 
            if($users->user_status>1 && $users->user_status<10){
                ?>
                <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css" rel="stylesheet"> -->
                <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
                <!-- <link rel="stylesheet" type="text/css" href="http://design.paralel.co.id/32_video_sliders/style.css"> -->
	<style>
            
        body .appBuilder-carousel {
            margin-bottom: 45px;
            margin-top: 16px;
            background:#fff;
            padding:20px;
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
        .i_c_v{
            background: unset!important;
            border: unset!important;
            /* margin:unset!important;
            padding:unset!important;
            color:#000!important; */
        }
        .v_c_r{
            width: 140px;
            background: #2dd1d0;
            color: #fff;
            font-size: 20px;
            height: 40px;
            font-weight: 700;
            border: none;
        }
        .r_t_b{

            margin-top:20px;
            /* margin-left:20px; */
        }
        .r_t{
            margin-bottom:20px;
        }
        .ytb{
            position: relative;
            height: 60px;
            top: 34%;
            left: 38%;
        }
        .ytp{
            position:absolute;
            border-radius:6px;
            height: 230px;
        }
        .nds{
            /* margin-left:20px; */
            font-style: normal;
            font-weight: normal;
            font-size: 18px;
            line-height: 170%;
        }
        .nds_h {
            margin-top: -20px;
        }
        .carousel-indicators{
            bottom:-75px!important;
        }
        
    </style>
        <div class="tab_heading">
            Recipes
        </div>
               
        <div class="appBuilder-carousel">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item i_c_v active">
                <div class="row">
                    <div class="col-md-5">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=Oft1wnInKxI?autoplay=1&rel=0&controls=1&showinfo=0&wmode=transparent">
                                    <img  class="img-responsive ytp" onmouseover="this.src='fitness/images/recipe_gif/fruit.gif'" onmouseout="this.src='fitness/images/recipe_gif/fruit.png'" src="fitness/images/recipe_gif/fruit.png" alt="builder app video" />    
                                    <img class="img-responsive ytb" src="fitness/images/recipe_gif/youtube_play.png" />              

                        </a>

                    </div>
                    <div class="col-md-7">
                        <p class="r_t"><h2 class="nds_h">Fruit Parfait!🍉🥭</h2></p>
                        <p class="r_t"><h4 class="nds">This is delicious for breakfast, snack, even for dessert! It looks great in a glass, but can also be made in a bowl. Use your favorite fruit and let the flavor explode in your mouth.</h4></p>
                        <p class="r_t_b"><button onclick="$('#recipes').click()" class="form-control v_c_r view_more_recipe">View more</button></p>
                    </div>
                </div>
            </div>
            
            <div class="item i_c_v">
                <div class="row">
                    <div class="col-md-5">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=T9w4cUGNNa4?autoplay=1&rel=0&controls=1&showinfo=0&wmode=transparent">
                                    <img  class="img-responsive ytp" onmouseover="this.src='fitness/images/recipe_gif/mango.gif'" onmouseout="this.src='fitness/images/recipe_gif/mango.png'" src="fitness/images/recipe_gif/mango.png" alt="builder app video" />    
                                    <img class="img-responsive ytb" src="fitness/images/recipe_gif/youtube_play.png" />              

                        </a>
                    </div>
                    <div class="col-md-7">
                        <p class="r_t"><h2 class="nds_h">Mango Yogurt 🥭</h2></p>
                        <p class="r_t"><h4 class="nds">This is delicious for breakfast, snack, even for dessert! It looks great in a glass, but can also be made in a bowl. Use your favorite fruit and let the flavor explode in your mouth.</h4></p>
                        <p class="r_t_b"><button onclick="$('#recipes').click()" class="form-control v_c_r view_more_recipe">View more</button></p>
                    </div>
                </div>
            </div>
            
            <div class="item i_c_v">
                <div class="row">
                    <div class="col-md-5">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=mvYoRTtPgsc?autoplay=1&rel=0&controls=1&showinfo=0&wmode=transparent">
                                    <img  class="img-responsive ytp" onmouseover="this.src='fitness/images/recipe_gif/ots.gif'" onmouseout="this.src='fitness/images/recipe_gif/ots.png'" src="fitness/images/recipe_gif/ots.png" alt="builder app video" />    
                                    <img class="img-responsive ytb" src="fitness/images/recipe_gif/youtube_play.png" />              

                        </a>
                    </div>
                    <div class="col-md-7">
                        <p class="r_t"><h2 class="nds_h">Overnight Oats 🥣</h2></p>
                        <p class="r_t"><h4 class="nds">Overnight oats make for an incredibly versatile breakfast or snack. They can be enjoyed warm or cold and prepared days in advance with minimal prep. Moreover, you can top this tasty meal with an array of nutritious ingredients that benefit your health.</h4></p>
                        <p class="r_t_b"><button onclick="$('#recipes').click()" class="form-control v_c_r view_more_recipe">View more</button></p>
                    </div>
                </div>
            </div>
            <div class="item i_c_v">
                <div class="row">
                    <div class="col-md-5">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=a1m8wEWKNS4?autoplay=1&rel=0&controls=1&showinfo=0&wmode=transparent">
                                    <img  class="img-responsive ytp" onmouseover="this.src='fitness/images/recipe_gif/chocolate.gif'" onmouseout="this.src='fitness/images/recipe_gif/chocolate.png'" src="fitness/images/recipe_gif/chocolate.png" alt="builder app video" />    
                                    <img class="img-responsive ytb" src="fitness/images/recipe_gif/youtube_play.png" />              

                        </a>
                    </div>
                    <div class="col-md-7">
                        <p class="r_t"><h2 class="nds_h">Chocolate Chip Banana Pancakes 🍫🥞🍌</h2></p>
                        <p class="r_t"><h4 class="nds">Amazing banana chocolate chip pancakes! It’s a great idea to use up ripe bananas. These pancakes come out thick, fluffy, they have an almost plush texture.</h4></p>
                        <p class="r_t_b"><button onclick="$('#recipes').click()" class="form-control v_c_r view_more_recipe">View more</button></p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>


                <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

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
                <?php
            }else{
            ?>
                <div id="section-tab-two" class="table-section table-section--two">
                    <h3 style="color:#21b2b1;">Choose Your Subscription</h3>
                    <h1>Individual Plan</h1>
                    <div class="table-two">
                <div class="table-two__header">
                <div class="table-two__header-part">Choose your plan</div>
                <div class="table-two__header-part">Features</div>
                <div class="table-two__header-part">Prices</div>
                </div>
                <div class="table-two__body">
                    <div class="table-two__cell table-two__cell--green">
                        <div class="table-two__cell-header table-two__cell-header--green">
                        <div class="table-two__cell-title table-two__cell-title--green">Silver</div>
                        <!-- <div class="table-two__cell-subtitle table-two__cell-subtitle--green">Monthly plan</div> -->
                        </div>
                        <div class="table-two__cell-body table-two__cell-body--grey-bg">
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Personalized Diet Plans</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Customized Workout Programs</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Updates & Checkups<!--<span class="table-two__cell-list-item--yes">yes</span>--></div>
                            </div>
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Live Workout Sessions</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">3 Months</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">17 Pause Days</div>
                            </div>
                        </div>
                        <div class="table-two__cell-footer table-two__cell-footer--green">
                        <div class="table-two__cell-price"><?php echo $_COOKIE['currency_icon']?> {{ str_replace('.00','', moneyFormatIndia($prices['three_months_offer']))}}</div>
                        <button class="table-two__cell-button table-two__cell-button--green pay__" data-plan="0" data-pid="1" data-price="{{$prices['three_months_offer']}}" data-description="3 months plan">Pay Now</button>
                        </div>
                    </div>
                    <div class="table-two__cell table-two__cell--cyan">
                        <div class="table-two__cell-header table-two__cell-header--cyan">
                        <div class="table-two__cell-title table-two__cell-title--cyan">Gold</div>
                        <!-- <div class="table-two__cell-subtitle table-two__cell-subtitle--cyan">Monthly plan</div> -->
                        </div>
                        <div class="table-two__cell-body">
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Personalized Diet Plans</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Customized Workout Programs</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Updates & Checkups<!--<span class="table-two__cell-list-item--yes">yes</span>--></div>
                            </div>
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Live Workout Sessions</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">6 Months</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">27 Pause Days</div>
                            </div>
                        </div>
                        <div class="table-two__cell-footer table-two__cell-footer--grey-bg table-two__cell-footer--cyan">
                        <div class="table-two__cell-price"><?php echo $_COOKIE['currency_icon']?>{{ str_replace('.00','', moneyFormatIndia($prices['six_months_offer']))}}</div>
                        <div class="blobs">
                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button2 pay__" data-pid="2" data-plan="plan_Dagz4KViTUZxqS" data-count="6" data-price="{{$prices['six_months_offer']}}" data-description="6 months plan">Monthly Billing</button>

                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button3 pay__" data-pid="2" data-plan="0" data-price="{{$prices['six_months_offer']}}" data-description="6 months plan">Pay now</button>
                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button1">Pay now</button>
                        </div>
                        </div>
                    </div>
                    <div class="table-two__cell table-two__cell--orange">
                        <div class="table-two__cell-header table-two__cell-header--orange">
                        <div class="table-two__cell-title table-two__cell-title--orange">Platinum</div>
                        <!-- <div class="table-two__cell-subtitle table-two__cell-subtitle--orange">Monthly plan</div> -->
                        </div>
                        <div class="table-two__cell-body table-two__cell-body--grey-bg">
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Personalized Diet Plans</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Customized Workout Programs</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Updates & Checkups<!--<span class="table-two__cell-list-item--yes">yes</span>--></div>
                            </div>
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Live Workout Sessions</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">12 Months</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">52 Pause Days</div>
                            </div>
                        </div>
                        <div class="table-two__cell-footer table-two__cell-footer--orange">
                        <div class="table-two__cell-price"><?php echo $_COOKIE['currency_icon']?>{{ str_replace('.00','', moneyFormatIndia($prices['twelve_months_offer']))}}</div>
                        <div class="blobs">
                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button2 pay__" data-pid="3" data-plan="plan_Dagz4KViTUZxqS" data-count="12" data-price="{{$prices['twelve_months_offer']}}" data-description="12 months plan">Monthly Billing</button>

                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button3 pay__" data-pid="3" data-plan="0" data-price="{{$prices['twelve_months_offer']}}" data-description="12 months plan">Pay now</button>
                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button1">Pay now</button>
                        </div>
                        </div>
                    </div>
                
                </div>
            </div>
            <h1>Buddy Plan</h1>
            <div class="table-two">
                <div class="table-two__header">
                <div class="table-two__header-part">Choose your plan</div>
                <div class="table-two__header-part">Features</div>
                <div class="table-two__header-part">Prices</div>
                </div>
                <div class="table-two__body">
                    <div class="table-two__cell table-two__cell--green">
                        <div class="table-two__cell-header table-two__cell-header--green">
                        <div class="table-two__cell-title table-two__cell-title--green">Silver</div>
                        <!-- <div class="table-two__cell-subtitle table-two__cell-subtitle--green">Monthly plan</div> -->
                        </div>
                        <div class="table-two__cell-body table-two__cell-body--grey-bg">
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Personalized Diet Plans</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Customized Workout Programs</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Updates & Checkups<!--<span class="table-two__cell-list-item--yes">yes</span>--></div>
                            </div>
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Live Workout Sessions</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">3 Months</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">17 Pause Days</div>
                            </div>
                        </div>
                        <div class="table-two__cell-footer table-two__cell-footer--green">
                        <div class="table-two__cell-price"><?php echo $_COOKIE['currency_icon']?>{{ str_replace('.00','', moneyFormatIndia($prices['three_months_couple_offer']))}}</div>
                        <!-- <button class="table-two__cell-button table-two__cell-button--green " data-toggle="modal" data-target="#loginModal">Sign Up</button> -->
                        <button class="table-two__cell-button table-two__cell-button--green pay__" data-plan="0" data-pid="4"  data-price="{{$prices['three_months_couple_offer']}}" data-description="3 months buddy plan">Pay Now</button>
                        </div>
                    </div>
                    <div class="table-two__cell table-two__cell--cyan">
                        <div class="table-two__cell-header table-two__cell-header--cyan">
                        <div class="table-two__cell-title table-two__cell-title--cyan">Gold</div>
                        <!-- <div class="table-two__cell-subtitle table-two__cell-subtitle--cyan">Monthly plan</div> -->
                        </div>
                        <div class="table-two__cell-body">
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Personalized Diet Plans</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Customized Workout Programs</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Updates & Checkups<!--<span class="table-two__cell-list-item--yes">yes</span>--></div>
                            </div>
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Live Workout Sessions</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">6 Months</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">27 Pause Days</div>
                            </div>
                        </div>
                        <div class="table-two__cell-footer table-two__cell-footer--grey-bg table-two__cell-footer--cyan">
                        <div class="table-two__cell-price"><?php echo $_COOKIE['currency_icon']?>{{ str_replace('.00','', moneyFormatIndia($prices['six_months_couple_offer']))}}</div>
                        <!-- <button class="table-two__cell-button table-two__cell-button--cyan " data-toggle="modal" data-target="#loginModal">Sign Up</button> -->
                        <div class="blobs">
                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button2 pay__" data-pid="5" data-plan="plan_DahSnlHNhOxa1H" data-count="6" data-price="{{$prices['six_months_couple_offer']}}" data-description="6 months buddy plan">Monthly Billing</button>

                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button3 pay__" data-pid="5" data-plan="0"  data-price="{{$prices['six_months_couple_offer']}}" data-description="6 months buddy plan">Pay now</button>
                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button1">Pay now</button>
                        </div>
                        </div>
                    </div>
                    <div class="table-two__cell table-two__cell--orange">
                        <div class="table-two__cell-header table-two__cell-header--orange">
                        <div class="table-two__cell-title table-two__cell-title--orange">Platinum</div>
                        <!-- <div class="table-two__cell-subtitle table-two__cell-subtitle--orange">Monthly plan</div> -->
                        </div>
                        <div class="table-two__cell-body table-two__cell-body--grey-bg">
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Personalized Diet Plans</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Customized Workout Programs</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Updates & Checkups<!--<span class="table-two__cell-list-item--yes">yes</span>--></div>
                            </div>
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Live Workout Sessions</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">12 Months</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">52 Pause Days</div>
                            </div>
                        </div>
                        <div class="table-two__cell-footer table-two__cell-footer--orange">
                        <div class="table-two__cell-price"><?php echo $_COOKIE['currency_icon']?>{{ str_replace('.00','', moneyFormatIndia($prices['twelve_months_couple_offer']))}}</div>
                        <div class="blobs">
                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button2 pay__" data-pid="6" data-plan="plan_DahSnlHNhOxa1H" data-count="12" data-price="{{$prices['twelve_months_couple_offer']}}" data-description="12 months buddy plan">Monthly Billing</button>

                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button3 pay__" data-pid="6" data-plan="0" data-price="{{$prices['twelve_months_couple_offer']}}" data-description="12 months buddy plan">Pay now</button>
                            <button class="table-two__cell-button table-two__cell-button--green login-text m_b_p magic_button1">Pay now</button>
                        </div>
                        </div>
                    </div>
                <!-- <div class="table-two__cell table-two__cell--red">
                    <div class="table-two__cell-header table-two__cell-header--red">
                    <div class="table-two__cell-title table-two__cell-title--red">Proffesional</div>
                    <div class="table-two__cell-subtitle table-two__cell-subtitle--red">Monthly plan</div>
                    </div>
                    <div class="table-two__cell-body">
                    <div class="table-two__cell-list">
                        <div class="table-two__cell-list-item table-two__cell-list-item--red">First</div>
                        <div class="table-two__cell-list-item table-two__cell-list-item--red">Second</div>
                        <div class="table-two__cell-list-item table-two__cell-list-item--red">Third<span class="table-two__cell-list-item--yes">yes</span></div>
                    </div>
                    <div class="table-two__cell-list">
                        <div class="table-two__cell-list-item table-two__cell-list-item--inactive">Fourth</div>
                        <div class="table-two__cell-list-item table-two__cell-list-item--inactive">Sixth</div>
                        <div class="table-two__cell-list-item table-two__cell-list-item--inactive">Seventh</div>
                    </div>
                    </div>
                    <div class="table-two__cell-footer table-two__cell-footer--red table-two__cell-footer--grey-bg">
                    <div class="table-two__cell-price">$299.99</div>
                    <button class="table-two__cell-button table-two__cell-button--red">Sign Up</button>
                    </div>
                </div> -->
                <!--.table-two__cell Premium-->
                <!--.table-two__cell Professional-->
                <!--.table-two__cell Unlimited-->
                </div>
            </div>
            <h1>Live Workout Sessions</h1>
            <div class="table-two">
                <div class="table-two__header">
                <div class="table-two__header-part">Choose your plan</div>
                <div class="table-two__header-part">Features</div>
                <div class="table-two__header-part">Prices</div>
                </div>
                <div class="table-two__body">
                    <div class="table-two__cell table-two__cell--green">
                        <div class="table-two__cell-header table-two__cell-header--green">
                        <div class="table-two__cell-title table-two__cell-title--green">Silver</div>
                        <!-- <div class="table-two__cell-subtitle table-two__cell-subtitle--green">Monthly plan</div> -->
                        </div>
                        <div class="table-two__cell-body table-two__cell-body--grey-bg">
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Personalized Diet Plans</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Customized Workout Programs</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Updates & Checkups<!--<span class="table-two__cell-list-item--yes">yes</span>--></div>
                            </div>
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Live Workout Sessions</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">1 Month</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">17 Pause Days</div>
                            </div>
                        </div>
                        <div class="table-two__cell-footer table-two__cell-footer--green">
                        <div class="table-two__cell-price"><?php echo $_COOKIE['currency_icon']?>{{ str_replace('.00','', moneyFormatIndia($prices['one_months_live_workout_offer']))}}</div>
                        <button class="table-two__cell-button table-two__cell-button--green pay__" data-pid="7" data-plan="0" data-price="{{$prices['one_months_live_workout_offer']}}" data-description="1 month live session">Pay Now</button>
                        </div>
                    </div>
                    <!-- <div class="table-two__cell table-two__cell--cyan">
                        <div class="table-two__cell-header table-two__cell-header--cyan">
                        <div class="table-two__cell-title table-two__cell-title--cyan">Gold</div>
                        </div>
                        <div class="table-two__cell-body">
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Personalized Diet Plans</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Customized Workout Programs</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Updates & Checkups</div>
                            </div>
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Live Workout Sessions</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">6 Months</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">27 Pause Days</div>
                            </div>
                        </div>
                        <div class="table-two__cell-footer table-two__cell-footer--grey-bg table-two__cell-footer--cyan">
                        <div class="table-two__cell-price"><?php echo $_COOKIE['currency_icon']?>17,990</div>
                        <button class="table-two__cell-button table-two__cell-button--cyan " data-toggle="modal" data-target="#loginModal">Sign Up</button>
                        </div>
                    </div> -->
                    <div class="table-two__cell table-two__cell--orange">
                        <div class="table-two__cell-header table-two__cell-header--orange">
                        <div class="table-two__cell-title table-two__cell-title--orange">Platinum</div>
                        <!-- <div class="table-two__cell-subtitle table-two__cell-subtitle--orange">Monthly plan</div> -->
                        </div>
                        <div class="table-two__cell-body table-two__cell-body--grey-bg">
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Personalized Diet Plans</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Customized Workout Programs</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Updates & Checkups<!--<span class="table-two__cell-list-item--yes">yes</span>--></div>
                            </div>
                            <div class="table-two__cell-list">
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">Live Workout Sessions</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">3 Months</div>
                                <div class="table-two__cell-list-item table-two__cell-list-item--green">52 Pause Days</div>
                            </div>
                        </div>
                        <div class="table-two__cell-footer table-two__cell-footer--orange">
                        <div class="table-two__cell-price"><?php echo $_COOKIE['currency_icon']?>{{ str_replace('.00','', moneyFormatIndia($prices['three_months_live_workout_offer']))}}</div>
                        <button class="table-two__cell-button table-two__cell-button--green pay__" data-pid="8" data-plan="0" data-price="{{$prices['three_months_live_workout_offer']}}" data-description="3 month live session">Pay Now</button>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            <?php }?>
            </div>
            <!-- <div class="item">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab a nesciunt doloribus. Explicabo minus cumque, molestiae tempore repellendus iusto enim maiores pariatur officiis perferendis excepturi, ut dolore laborum eligendi laudantium placeat aspernatur! Quos dolorum unde officiis labore est animi excepturi neque, provident, inventore nobis expedita facilis aspernatur, nihil in atque?
            </div>
            <div class="item">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab a nesciunt doloribus. Explicabo minus cumque, molestiae tempore repellendus iusto enim maiores pariatur officiis perferendis excepturi, ut dolore laborum eligendi laudantium placeat aspernatur! Quos dolorum unde officiis labore est animi excepturi neque, provident, inventore nobis expedita facilis aspernatur, nihil in atque?
            </div> -->
        </div>
        <div class="p_d live_session">
            <div class="item">
                <div class="tab_heading">Live Session</div>
            </div>
            <!-- <header class="intro">
                <h1> Welcome to live session in Liv Ezy Community </h1>
                <p> We are excited to onboard you</p>
                <p> So please choose your plan and proceed</p>
                
	        </header> -->
            <style>
                .l_s{
                    font-size: 20px;
                    font-weight: bold;
                    font-family: sans-serif;
                }
                .l_s_t{
                    font-weight: 800;
                    line-height: 36px;
                    font-family: serif;
                    letter-spacing: 1px;
                    text-align: justify;
                    margin-bottom:20px;
                }
                .live_sess_second{
                    background-image:url('fitness/images/background.png');
                    background-size: cover;
                }
                .live_sess_block{
                    border-top: 1px solid #0000004f;
                    padding-top: 10px;
                    margin-bottom: 10px;
                }
                .liv_img{
                    display: inline-block;
                    margin-left:30px;
                    /* background-image:url('fitness/images/Pilates-amico.png');
                    background-size: cover;
                    height: 100px; */
                }
                .l_s_i_img{
                    height: 100px;
                }
                .inside_live_btn{
                    display:inline-block;
                    margin-left:50px;
                }
                .liv_details{
                    display:inline-block;
                    background: #FFFFFF;
                    box-shadow: 7px 7px 15px rgb(65 65 65 / 25%), -7px -7px 15px rgb(255 255 255 / 50%);
                    border-radius: 10px;
                    padding: 14px;
                    margin-left:34px;
                }
                .inside_live{
                    display:inline-block;
                    font-weight: 700;
                    margin-right: 20px;
                }
                .book_live_btn{
                    display:inline-block;
                    background: linear-gradient( 
                    107.03deg
                    , #43D2FF 4.56%, #0DB4E2 92.44%);
                        box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
                        backdrop-filter: blur(40px);
                        border-radius: 10px;
                        outline: none;
                        border: none;
                        /* width: 100px; */
                        padding: 12px;
                        color: #fff;
                        font-weight: 900;
                        border:none;
                        border-radius:.75em;
                        color:#fff;
                        box-sizing:border-box;
                        position:relative;  
                        padding:1em 2em;
                }
                .ripple{
                    box-sizing:border-box;
                    position:relative;   
                    background:#008000b8;
                    border:none;
                    border-radius:.75em;
                    color:#fff;
                    padding:1em 2em;
                }

                .ripple:before {
                    animation:ripple 2s ease-out infinite;
                    border:solid 2px green;
                    border-radius:1em;
                    bottom:0;
                    box-sizing:border-box;
                    content:"";
                    left:0;
                    position:absolute;
                    right:0;
                    top:0;
                }

                .ripple:after {
                    animation:ripple 2s 1s ease-out infinite;
                    border:solid 2px green;
                    border-radius:1em;
                    bottom:0;
                    box-sizing:border-box;
                    content:"";
                    left:0;
                    position:absolute;
                    right:0;
                    top:0;
                }

                @keyframes ripple {
                    0% {
                    opacity:.25;
                    }
                    100% {
                    border-radius:2em;
                    opacity:0;
                    transform:scale(3);
                    }
                }
                .filter_live{
                    display: inline-block;
                    font-size: 22px;
                    padding-left: 16px;
                    padding-top: 12px;
                    margin-left: 60px;
                }
                .fiter_icon{
                    display:inline-block;
                    padding-left:5px;
                }
                .filter_s{
                    display:inline-block;
                    padding-left:10px;
                }
                .bks_c{
                    background:black;
                }
                .disable_bks_c{
                    background: green;
                    color: #000000a6;
                }
                .img_err{
                    height: 250px;
                    margin-left: 200px;
                }
            </style>
            <div class="item">
                <div class="row">
                    <div class="col-md-5">
                        <img class="l_s_i" src='fitness/images/Online_Personal_Trainer-pana.png'>
                        <div class="live_sess_intro">
                            <p class="l_s">Live session</p>
                            <p class="l_s_t">All classes are delivered in the comfort of your home using Zoom Video and you can fit one in around your daily schedule each session lasts for a total of 60 minutes with warm up and cool down. The workouts include various Strength, HIIT, Full-body training, Abs, Cardio & Yoga.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-7 live_sess_second">
                        <p class="b_l_s">Book Your Live Session</p>
                        <div class="top-date">
                        <?php 
                            for($d=0;$d<sizeof($liv_sess_date);$d++){
                                $day_t=date('D',strtotime($liv_sess_date[$d]->start_date));
                                $day_num_t=date('d',strtotime($liv_sess_date[$d]->start_date));
                                $cls='';
                                if($d==0)
                                    $cls='active';

                        ?>
                                <div class="inside_date">
                                    <div class="l_d zoom_live_view {{$cls}}" data-id="liv_{{$day_t}}">
                                        {{substr($day_t,0,-1)}}
                                    </div>
                                    <div class="n_d">
                                       {{$day_num_t}}
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                            <div class="filter_live">
                                
                                <div class="filter_s">
                                    <div class="dropdown">
                                            <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                                                <div class="filter_s fiter_icon">
                                                    <i class="fas fa-sliders-h"></i>
                                                </div>
                                                Filter 
                                            </span>
                                            <ul class="dropdown-menu">
                                                <li class="notif_filter" data-value=" "><a href="#">All</a></li>
                                                
                                                <li class="notif_filter" data-value="HIIT"><a href="#">HIIT</a></li>
                                                <li class="notif_filter" data-value="SNC"><a href="#">SNC</a></li>
                                                <li class="notif_filter" data-value="Dance"><a href="#">Dance</a></li>
                                                <li class="notif_filter" data-value="Yoga"><a href="#">Yoga</a></li>
                                            </ul>
                                        </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <p style="color:red">Currently your timezone is in {{isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata'}}</p>

                        <?php
                            //print_r($live_session_data);
                            for($i=0;$i<sizeof($live_session_data);$i++){
                                $today_book_date = date('Y-m-d');
                                $loop_date = $live_session_data[$i]->start_date;
                                $day_t_init=' ';
                                $st='';
                                if($i==0)
                                    $st='style="display:block;"';
                                if($i!=0)
                                    $day_t_init=date('D',strtotime($live_session_data[$i-1]->start_date));
                                $day_t=date('D',strtotime($live_session_data[$i]->start_date));
                                $m=0;
                                if($i>=0)
                                    $m=$i+1;
                                if($i==(sizeof($live_session_data)-1))
                                    $m=$i;
                                $day_t_s=date('D',strtotime($live_session_data[$m]->start_date));
                                if($day_t_init!=$day_t){
                                    echo '<div class="lid ned" '.$st.' id="liv_'.$day_t.'">';
                                }
                                ?>
                                <div class="live_sess_block filter_{{$live_session_data[$i]->session_name}}" data-session="{{$live_session_data[$i]->session_name}}">
                                    <div class="liv_img">
                                        <img class="l_s_i_img" src='fitness/images/{{$live_session_data[$i]->session_name}}.png'>
                                    </div>
                                    <div class="liv_details">
                                        <div class="inside_live">
                                        {{$live_session_data[$i]->session_name}}
                                        </div>
                                        <div class="inside_live">
                                        
                                        </div>
                                        <div class="inside_live" style="margin-right: 1px;">
                                            <script>var a=convertTZ('<?php echo $live_session_data[$i]->start_date.' '.$live_session_data[$i]->start_time?>','<?php echo isset($_COOKIE['user_time_zone'])?$_COOKIE['user_time_zone']:'Asia/Kolkata'?>');
                                                document.write(moment(a).format('hh:mm A'))
                                            </script>
                                            <!-- {{date('h:i A',strtotime($live_session_data[$i]->start_time))}} -->
                                        </div>
                                        
                                    </div>
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
                                        if($users->user_status==8 || ($users->user_status==1 && $users->free_live_session!=0)){
                                            if($btn_a){
                                                ?>
                                                        <button data-is_join="{{$is_join}}" onclick="zoom_start(this)" data-start_date="{{$live_session_data[$i]->start_date}}" data-start_time="{{$live_session_data[$i]->start_time}}" data-booked="true" data-session="{{$live_session_data[$i]->id}}" data-url="{{$live_session_data[$i]->session_url}}" data-time="{{date('Y/m/d H:i:s',strtotime($live_session_data[$i]->start_date.''.$live_session_data[$i]->start_time))}}" class="book_live_btn bks_c {{$today_book_date==$loop_date?'today_date':' '}}">Cancel</button>
                                                
                                                <?php
                                            }else{
                                                if($live_session_data[$i]->total_seat==$live_session_data[$i]->booked_seat){
                                                    ?>
                                                        <button style="background:gray;" title="All Slot Booked" data-start_date="{{$live_session_data[$i]->start_date}}" data-start_time="{{$live_session_data[$i]->start_time}}" data-booked="false" data-session="{{$live_session_data[$i]->id}}" data-url="{{$live_session_data[$i]->session_url}}" data-time="{{date('Y/m/d H:i:s',strtotime($live_session_data[$i]->start_date.''.$live_session_data[$i]->start_time))}}" class="book_live_btn {{$today_book_date==$loop_date?'today_date':' '}}">Book Now</button>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <button onclick="zoom_start(this)" data-start_date="{{$live_session_data[$i]->start_date}}" data-start_time="{{$live_session_data[$i]->start_time}}" data-booked="false" data-session="{{$live_session_data[$i]->id}}" data-url="{{$live_session_data[$i]->session_url}}" data-time="{{date('Y/m/d H:i:s',strtotime($live_session_data[$i]->start_date.''.$live_session_data[$i]->start_time))}}" class="book_live_btn {{$today_book_date==$loop_date?'today_date':' '}}">Book Now</button>
                                                    
                                                    <?php
                                                }
                                               
                                            }
                                        }else if($users->user_status==9){
                                            ?>
                                                <button onclick="static_msg('You can not book live session if you are plans is pause')" data-start_date="{{$live_session_data[$i]->start_date}}" data-start_time="{{$live_session_data[$i]->start_time}}" data-booked="false" data-session="{{$live_session_data[$i]->id}}" data-url="{{$live_session_data[$i]->session_url}}" data-time="{{date('Y/m/d H:i:s',strtotime($live_session_data[$i]->start_date.''.$live_session_data[$i]->start_time))}}" class="book_live_btn {{$today_book_date==$loop_date?'today_date':' '}}">Book Now</button>
                                            <?php

                                        }else if($users->user_status==1 && $users->free_live_session==0){
                                            ?>
                                                <button onclick="static_msg('You have used all your trial live session, Please subscribe to take benefits of live session')" data-start_date="{{$live_session_data[$i]->start_date}}" data-start_time="{{$live_session_data[$i]->start_time}}" data-booked="false" data-session="{{$live_session_data[$i]->id}}" data-url="{{$live_session_data[$i]->session_url}}" data-time="{{date('Y/m/d H:i:s',strtotime($live_session_data[$i]->start_date.''.$live_session_data[$i]->start_time))}}" class="book_live_btn {{$today_book_date==$loop_date?'today_date':' '}}">Book Now</button>
                                            
                                            <?php
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                                
                                <?php
                               if($day_t_s!=$day_t || $i==(sizeof($live_session_data)-1)){
                                    echo '</div>';
                                } 
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
            <script>
                function today_live_session_check(){
                    var total_l_s_today=$('.today_date');
                    console.log(total_l_s_today)
                    for(var i=0;i<total_l_s_today.length;i++){
                        var time_sess=$(total_l_s_today[i]).attr('data-time');
                        var booked_status=$(total_l_s_today[i]).attr('data-booked');
                        var sess_check=clockcheck(time_sess,total_l_s_today[i],booked_status);
                        console.log(booked_status)
                    }
                    
                }
                function clockcheck(d,f,g){
                    setInterval(clockUpdate, 1000, d,f,g);
                }

                function clockUpdate(d,f,booked_status) {
                    var date = new Date();
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
                    var today_date=date.getTime()/1000
                    var modify_date_string=modify_date.getTime()/1000
                    var h_modify = addZero(modify_date.getHours());
                    var m_modify = addZero(modify_date.getMinutes());

                    if((modify_date_string+3600)<today_date){
                        $(f).attr('disabled','disabled');
                        if($(f).attr('data-is_join')=='True'){
                            $(f).html('Completed');
                            $(f).removeClass('bks_c');
                            $(f).addClass('disable_bks_c');

                            
                        }else if($(f).attr('data-is_join')=='False'){
                            $(f).html('Missed');
                            $(f).removeClass('bks_c');
                            $(f).addClass('disable_bks_c');
                            $(f).css('background','red');
                        }else{
                            $(f).html('Session Expired');
                            $(f).css('background','gray');

                        }
                    }
                    if((modify_date_string+3600)>today_date && modify_date_string<today_date){
                        
                            $(f).attr('disabled','disabled');
                            $(f).html('Session ongoing');
                            $(f).css('background','gray');
                        
                        
                    }
                    if((modify_date_string-480)<today_date && (modify_date_string+480)>today_date){
                            if(booked_status=='true'){
                                $(f).addClass('ripple');
                                $(f).css('background','green');
                                $(f).html('Join Now');
                            }else{
                                if(modify_date_string>=today_date){
                                    $(f).attr('disabled','disabled');
                                    $(f).html('Session ongoing');
                                    $(f).css('background','green');
                                $(f).html('Join Now');
                                }
                                
                            }
                            
                        }
                    
                }
                $('.notif_filter').on('click',function(){
                    var filter_type=$(this).attr('data-value');
                    if(filter_type.length>1){
                        //console.log($('.live_sess_block').parent())
                            if($('#'+$('.zoom_live_view.active').attr('data-id')+' .img_est').length!=0)
                                $('#'+$('.zoom_live_view.active').attr('data-id')+' .img_est').remove()
                            $('#'+$('.zoom_live_view.active').attr('data-id')+' .live_sess_block:not(.filter_'+filter_type+')').css('display','none');
                            $('#'+$('.zoom_live_view.active').attr('data-id')+' .filter_'+filter_type).css('display','block');
                            if($('#'+$('.zoom_live_view.active').attr('data-id')+' .filter_'+filter_type).length==0){
                                $('#'+$('.zoom_live_view.active').attr('data-id')).append('<div class="img_est"><p style="color:red;">There is no result for '+filter_type+' fitness</p><img class="img-responsive img_err" src="fitness/images/error.png"></div>');
                            }else{
                                    $('#'+$('.zoom_live_view.active').attr('data-id')+' .img_est').remove()
                            }
                    }else{
                        $('#'+$('.zoom_live_view.active').attr('data-id')+' .live_sess_block').css('display','block');
                        if($('#'+$('.zoom_live_view.active').attr('data-id')+' .img_est').length!=0)
                            $('#'+$('.zoom_live_view.active').attr('data-id')+' .img_est').remove()
                    }
                    // $('.live_sess_block').attr('data-session')
                })
            </script>
            <!-- <div class="item">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab a nesciunt doloribus. Explicabo minus cumque, molestiae tempore repellendus iusto enim maiores pariatur officiis perferendis excepturi, ut dolore laborum eligendi laudantium placeat aspernatur! Quos dolorum unde officiis labore est animi excepturi neque, provident, inventore nobis expedita facilis aspernatur, nihil in atque?
            </div> -->
       </div>
        <div class="p_d profile_d">
            <!-- <div class="item">
                <div class="tab_heading">Profile</div>
            </div> -->
            <style>
                .heading-small{
                    font-size: 1rem;
                }
                .profile_pg{
                    min-height: 236px;
                    background-image: url(insta_img/profile_banner.png);
                    background-size: cover;
                    margin-bottom: 93px;
                    border-radius: 10px;
                }
                .card-profile{
                    background: #e8e8e8;
                }
                .str{
                    background: radial-gradient(#e8e8e8, #e8e8e8);
                }
                a.btn {
                    text-decoration: none;
                    color: #666;
                    /* border: 2px solid #666; */
                    padding: 10px 15px;
                    display: inline-block;
                    margin-left: 5px;
                    background: #09C7FB;
                    box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
                    border-radius: 20px;
                    color: #fff;
                    width: 70px;
                    height: 35px;
                    line-height: 14px;
                    border:unset;
                }
            </style>
            <div class="main-content">
                <div class="row">
                    <div class="col-md-12 profile_pg">
                    </div>
                </div>
                <!-- <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 178px; background-image: url(insta_img/profile_banner.png); background-size: cover;"> -->
                <!-- Mask -->
                    <!-- <span class="mask bg-gradient-default opacity-8"></span> -->
                    <!-- Header container -->
                    <!-- <div class="container-fluid d-flex align-items-center">
                        <div class="row">
                            <div class="col-lg-7 col-md-10">
                                <h1 class="display-2 text-white">Hello <?php echo Session::get('name');?></h1> -->
                                <!-- <p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and post your fitness goals</p> -->
                                <!-- <a href="#!" class="btn btn-info">Edit profile</a> -->
                            <!-- </div>
                        </div>
                    </div>
                </div> -->
                <!-- Page content -->
                <div class="container-fluid mt--7">
                <div class="row">
                <div class="col-xl-4 mb-xl-0">
                        <div class="card card-profile shadow">
                            <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2 h3_text_d">
                                <div class="card-profile-image">
                                <a href="#">
                                    <img src="<?php echo Session::get('image')?Session::get('image'):'https://demos.creative-tim.com/argon-dashboard/assets/img/theme/team-4.jpg'?>" class="rounded-circle">
                                </a>
                                </div>
                            </div>
                            </div>
                            <!-- <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
                                <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                            </div>
                            </div> -->
                            <div class="card-body pt-0 pt-md-4">
                            <!-- <div class="row">
                                <div class="col">
                                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                        <div>
                                        <span class="heading">00</span>
                                        <span class="description">Like</span>
                                        </div>
                                        <div>
                                        <span class="heading">00</span>
                                        <span class="description">Photos</span>
                                        </div>
                                        <div>
                                        <span class="heading">00</span>
                                        <span class="description">Comments</span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="text-center">
                                <h3 class="h3_text_c">
                                <?php echo Session::get('name');?><span class="font-weight-light"></span>
                                </h3>
                                <!-- <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>Bangalore, India
                                </div>
                                <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>Fitness Manager 
                                </div>
                                <div>
                                <i class="ni education_hat mr-2"></i>University of Computer Science
                                </div>
                                <hr class="my-4">
                                <p>Test — description will come here long or short</p> -->
                                <!-- <a href="#">Show more</a> -->
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1">
                        <div class="card bg-secondary shadow str">
                            <div class="card-header bg-white border-0 str">
                            <div class="row align-items-center">
                                <div class="col-8">
                                <h3 class="mb-0">My account</h3>
                                </div>
                                <!-- <div class="col-4 text-right">
                                    <a href="#!" id="save_user" class="btn btn-sm">Save</a>
                                </div> -->
                            </div>
                            </div>
                            <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" disabled value="<?php echo Session::get('username');?>">
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Email address</label>
                                        <input type="email" <?php echo Session::get('email')?'disabled':' ';?> value="<?php echo Session::get('email');?>" id="email" class="form-control form-control-alternative" placeholder="Email">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-first-name">Full name</label>
                                        <input type="text" id="full_name" class="form-control form-control-alternative" placeholder="First name" value="<?php echo Session::get('name');?>">
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Mobile Number</label>
                                        <input id="telNo" class="form-control form-control-alternative" <?php echo $users->mob_no?'disabled':' ';?> onkeypress="return isNumberKey(event)" name="telNo" type="tel" size="20" value="<?php echo $users->mob_no;?>" minlength="13" maxlength="14" placeholder="+91 90909 90909" />
                                        <!-- <input type="text" id="input-last-name"  placeholder="Last name" value="Kumar"> -->
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-first-name">Gender</label>
                                        <select <?php echo $users->gender?'disabled':' '?> id="profile_gender" class="form-control form-control-alternative">
                                            <option <?php echo $users->gender?' ':'selected="true"'?> disabled="disabled">Choose Gender</option>  
                                            <option <?php echo $users->gender=='Male'?'selected="true"':' '?> value="Male">Male</option>
                                            <option <?php echo $users->gender=='Female'?'selected="true"':' '?> value="Female">Female</option>
                                            <option <?php echo $users->gender=='Non-Binary'?'selected="true"':' '?> value="Non-Binary">Non-Binary</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Height(in Cms)</label>
                                        <input id="profile_height" class="form-control form-control-alternative" <?php echo $users->height?'disabled':' ';?>  type="number" size="20" value="<?php echo $users->height;?>"  placeholder="170" />
                                        <!-- <input type="text" id="input-last-name"  placeholder="Last name" value="Kumar"> -->
                                    </div>
                                    </div>
                                    <div class="col-lg-3">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="input-last-name">Body Weight(in Kgs)</label>
                                        <input id="profile_weight" class="form-control form-control-alternative" <?php echo $users->weight?'disabled':' ';?>  type="number" size="20" value="<?php echo $users->weight;?>"  placeholder="70" />
                                        <!-- <input type="text" id="input-last-name"  placeholder="Last name" value="Kumar"> -->
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-last-name">Date of Birth</label>
                                            <input id="profile_dob" class="form-control form-control-alternative" <?php echo $users->dob?'disabled':' ';?>  type="date" size="20" value="<?php echo $users->dob;?>"  placeholder="d/m/y" />
                                            <!-- <input type="text" id="input-last-name"  placeholder="Last name" value="Kumar"> -->
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <hr class="my-4">
                                <!-- Password -->
                                <h6 class="heading-small text-muted mb-4">Password</h6>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-city">Password</label>
                                            <input type="password" id="password" class="form-control form-control-alternative" <?php echo $users->password?"disabled":" ";?> value="<?php echo $users->password;?>" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-country">Confirm Password</label>
                                            <input type="password" id="repassword" class="form-control form-control-alternative" <?php echo $users->password?"disabled":" ";?> value="<?php echo $users->password;?>" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-address">Address</label>
                                            <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="Friends Colony, Kormangla, Bangalore" type="text">
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-city">City</label>
                                            <input type="text" id="city" disabled class="form-control form-control-alternative" placeholder="City" value="<?php echo $users->city;?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group focused">
                                            <label class="form-control-label" for="input-country">Country</label>
                                            <input type="text" id="country" disabled class="form-control form-control-alternative" placeholder="Country" value="<?php echo $users->country;?>">
                                            <input id="s_c_name" type="hidden" value="<?php echo $users->short_country_name;?>">
                                        </div>
                                    </div>
                                    
                                </div>
                                </div>
                                <hr class="my-4">
                                <!-- Description -->
                                <!-- <h6 class="heading-small text-muted mb-4">About me</h6> -->
                                <div class="pl-lg-4">
                                    <!-- <div class="form-group focused">
                                        <label>About Me</label>
                                        <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful Dashboard only for you so keep posting your content.</textarea>
                                    </div> text-right-->
                                    <div class="col-12 ">
                                        <a href="#!" id="save_user" class="btn btn-sm">Save</a>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                </div>
            </div>

        </div>
        <div class="p_d settingsu">
            <div class="item">
                <div class="tab_heading">Settings</div>
            </div>
            <div class="item">
                <ul>
                    <li class="li_s">
                        <div class="s_text">Auto Renewal</div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="li_s">
                        <div class="s_text">Make Profile Public</div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="li_s">
                        <div class="s_text">Get Notification Via Message</div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="li_s">
                        <div class="s_text">Get Notification Via Email</div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </li>
                    <li class="li_s">
                        <div class="s_text">Fitness Subscription Newslater</div>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p_d testimonial">
            <iframe class="r_ifrma" src="https://dev.livezy.com/testimonial_story"></iframe>

        </div>
        <div class="p_d recipes">
            <iframe class="r_ifrma" src="https://dev.livezy.com/recipes_login"></iframe>
        <style>
            .recipes{
                margin-top:-60px;
            }
            .testimonial{
                margin-top:-40px;
            }
            .r_ifrma{
                width:100%;
                height:800px;
                border:none;
            }
            .site-navbar-target{
                display:none;
            }
           
        </style>
        </div>
    </div>
 
</div>
	
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function static_msg(msg){
    toastr.success(msg);
    let success_temp=`<li>
    <p>${msg}
    </p>
    </li>`;
    swal({
        title: success_temp,
        showCancelButton: false,
        confirmButtonText: 'Ok',
        showLoaderOnConfirm: true,
        allowOutsideClick: false
        }).then(function(email) {
            $('#dashboard').click();
    }).catch(swal.noop)
}
function zoom_start(id){
    var id=id;
    var sess_id_create=$(id).attr('data-session');
    var condition_text=$(id).html()
    if(condition_text=='Book Now'){
        var sess_id_create=$(id).attr('data-session');
        var start_date=$(id).attr('data-start_date');
        var start_time=$(id).attr('data-start_time');
        swal({
                title: 'Are you sure want to book session?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                showLoaderOnConfirm: true,
                allowOutsideClick: false
                }).then(function(email) {
                    $.ajax({
                        url:'session_booking',
                        data:{"_token": "{{ csrf_token() }}",'sess_id_create':sess_id_create,'start_date':start_date,'start_time':start_time},
                        type:'post',
                        success:function(response){
                            //window.location.href='/';
                            if(response=='1'){
                                toastr.success('Session Created successfully');
                                let success_temp=`<li>
                                <p>Session Created successfully
                                </p>
                                </li>`;
                                swal({
                                    title: success_temp,
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                    }).then(function(email) {
                                        window.location.href='/';
                                }).catch(swal.noop)
                                
                            }else{
                            swal({
                                    title: response,
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                    }).then(function(email) {
                                        
                                }).catch(swal.noop)
                            }

                        }
                    })
                }).catch(swal.noop)
    }
    if(condition_text=='Cancel'){
        swal({
                title: 'Are you sure want to cancel session?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                showLoaderOnConfirm: true,
                allowOutsideClick: false
                }).then(function(email) {
                    $.ajax({
                        url:'cancel_user_live_session',
                        data:{"_token": "{{ csrf_token() }}",'sess_id':sess_id_create},
                        type:'post',
                        success:function(response){
                            //window.location.href='/';
                            if(response=='1'){
                                toastr.success('Session cancelled successfully');
                                let success_temp=`<li>
                                <p>Session cancelled successfully
                                </p>
                                </li>`;
                                swal({
                                    title: success_temp,
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                    }).then(function(email) {
                                        window.location.href='/';
                                }).catch(swal.noop)
                                
                            }else{
                            swal({
                                    title: 'Internal Error',
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                    }).then(function(email) {
                                        
                                }).catch(swal.noop)
                            }

                        }
                    })
                }).catch(swal.noop)
    }
    if(condition_text=='Join Now'){
        $.ajax({
            url:'join_session',
            type:'post',
            data:{"_token": "{{ csrf_token() }}",'sess_id':sess_id_create},
            global:true,
            async:false,
            success:function(response){
                var j_url=$(id).attr('data-url');
                var r=`<div onclick="session_end(${sess_id_create})" class="overlay_close" >X</div><div class="iframe-container" >
                    <iframe allow="microphone; camera" style="border: 0; height: 100vh; left: 0; position: relative; top: -30px; width: 100%;" src="${j_url}" frameborder="0"></iframe>
                </div>`;
                $('.overlay').html(r);
                $(".overlay").fadeToggle(200);
                // $('.overlay_close').on('click', function(){
                    
                // });
            }
        })
        
    }
    
}
function session_end(sess_id_create){
    $.ajax({
            url:'feedback_update_live_sess',
            type:'post',
            data:{"_token": "{{ csrf_token() }}",'sess_id':sess_id_create},
            global:true,
            async:false,
            success:function(response){
                $(".overlay").html(' ');
                $(".overlay").fadeToggle(200);   
                $(".button a").toggleClass('btn-open').toggleClass('btn-close');
                open = false;
                $('#f_s_id').attr('value',sess_id_create)
                $('#feedback_modal').modal({
                    backdrop: 'static',
                    keyboard: false  // to prevent closing with Esc button (if you want this too)
                })
            }
        })
    
}
$('#logout').on('click',function(){
        $.ajax({
            url:'logout',
            type:'post',
            data:{"_token": "{{ csrf_token() }}"},
            global:true,
            async:false,
            success:function(response){
                window.location.href='/';
            }
        })
    })
    $('.zoom_live_view').on('click',function(){
        $('.zoom_live_view').removeClass('active');
        $(this).addClass('active');
        var id=$(this).attr('data-id');
        //console.log('#liv_'+id)
        $('.ned').css('display','none');
        $('#'+id).css('display','block');
    })
    $('#forget_continue').on('click',function(){
        var f_pwd=$('#f_n_w').val();
        var c_pwd=$('#c_f_n_w').val();
        if(f_pwd.length<8 || c_pwd.length<8){
            toastr.error('Please enter new password and confirm password to continue');
            return false;
        }
        if(f_pwd!=c_pwd){
            toastr.error('New password and confirm password does not match');
            return false;
        }
        $.ajax({
            url:'change_paswwd',
            type:'post',
            data:{"_token": "{{ csrf_token() }}","password":f_pwd},
            global:true,
            async:false,
            success:function(response){
                window.location.href='/';
            }
        })
    })
    $('#fcd').on('click',function(){
        $(".profile_dd").removeClass("active");
    })
    $('#referal_menu').on('click',function(){
        $('.pouch-main-container').css('display','block');
    })
    $('.close-pouch').on('click',function(){
        $('.pouch-main-container').css('display','none');
    })
    function cancel_pause(id,u_id,s_d,e_d,p_d){
        let data={
            'username':u_id,
            'start_date':s_d,
            'end_date':e_d,
            'pause_day':p_d
        }
        swal({
                title: 'Are you sure want to cancel your future pause?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                showLoaderOnConfirm: true,
                allowOutsideClick: false
                }).then(function(email) {
                    $.ajax({
                        url:'cancel_future_pause',
                        data:{"_token": "{{ csrf_token() }}",'data':data},
                        type:'post',
                        success:function(response){
                            //window.location.href='/';
                            if(response=='1'){
                                toastr.success('Pause Cancelled successfully');
                                let success_temp=`<li>
                                <p>Your pause has been cancelled from ${s_d} to ${e_d}
                                </p>
                                </li>`;
                                swal({
                                    title: success_temp,
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                    }).then(function(email) {
                                        window.location.href='/';
                                }).catch(swal.noop)
                                
                            }else{
                            swal({
                                    title: response,
                                    showCancelButton: false,
                                    confirmButtonText: 'Ok',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                    }).then(function(email) {
                                        
                                }).catch(swal.noop)
                            }

                        }
                    })
                }).catch(swal.noop)
    }
</script>
    <!-- <footer class="credit">Author: <a href="https://www.youtube.com/c/CodingMarket" rel="nofollow" target="_blank"> Coding Market </a> - Distributed By: <a title="Awesome web design code & scripts" href="https://www.codehim.com?source=demo-page" target="_blank">CodeHim</a></footer> -->
<script>
    var country='India';
    var iso_data='in';

    function pagination_formation(data_pass){
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
        var kc=1;
        $('.circle_country').on('click',function(){
            if(kc>1){
                $('#target').jqpaginator('destroy');
            }
            country=$(this).attr('value');
            iso_data=$(this).attr('id');
            $.ajax({
                url:'get_city',
                type:'post',
                data:{'country':country},
                success:function(data){
                    pagination_formation(JSON.parse(data));
                    kc++;
                }
            })
        })
        
        $('.key_up_country').on('keyup',function(){
            var keyup_data=$('.key_up_country').val();
            $('.other_country').html(' ');
            if(keyup_data.length>2){
                
                $.ajax({
                    url:'get_country',
                    type:'post',
                    data:{'key_up':keyup_data},
                    success:function(data){
                        var parsed_data=JSON.parse(data);
                        for(var i=0;i<parsed_data.length;i++){
                            var template=`<div class="circle_country" id="${parsed_data[i].iso2.toLowerCase()}" value="${parsed_data[i].country}">
                                            <img class="circle_country_img" src="https://ipdata.co/flags/${parsed_data[i].iso2.toLowerCase()}.png"/>
                                            <span class="country_text">${parsed_data[i].country}</span>
                                        </div>`;
                            $('.other_country').append(template);
                        }
                        $('.circle_country').on('click',function(){
                            if(kc>1){
                                $('#target').jqpaginator('destroy');
                            }
                            country=$(this).attr('value');
                            iso_data=$(this).attr('id');
                            $.ajax({
                                url:'get_city',
                                type:'post',
                                data:{'country':country},
                                success:function(data){
                                    pagination_formation(JSON.parse(data));
                                    kc++;
                                }
                            })
                        })

                    }
                })
            }
        })
        function change_country_user(a,b,c){
            a=a.split('_').join(' ');
            b=b.split('_').join(' ');
            c=c.split('_').join(' ');
            $.ajax({
                url:'change_country',
                type:'post',
                data:{'country':a,'short_country_name':b,'city':c},
                success:function(){
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
            $('#main').empty();
            var formate_c=`
                        <div class="col-md-3 3c">
                        </div>
                        <div class="col-md-3 6c">
                        </div>
                        <div class="col-md-3 9c">
                        </div>
                        <div class="col-md-3 12c">
                        </div>`;
            $('#main').html(formate_c);
            var j=1;
                // alert(data.length%10)
            $.each(data, function(i, v) {
                var div_c=3*j;
                if(i%10==0 && parseInt($(".3c > p").length)>=9){
                    console.log(i);
                    console.log(i%10);
                    j++;
                }
                
                
                $('.'+div_c+'c').append("<p value='"+country+"' onclick=change_country_user("+"'"+country.split(' ').join('_')+"','"+iso_data.split(' ').join('_')+"','"+v.split(' ').join('_')+"')"+" class='city_shadow'>" + v + "</p>");
            });
        };
    $('#pause_continue').on('click',function(){
        if($('#pause_s_date').val().length<1){
            toastr.error('Select Pause Start Date');
            return false;
        }
        if($('#pause_e_date').val().length<1){
            toastr.error('Select Pause End Date');
            return false;
        }
        $.ajax({
            url:'pause_plan',
            type:'post',
            data:{"_token": "{{ csrf_token() }}",'pause_start_date':$('#pause_s_date').val(),'pause_end_date':$('#pause_e_date').val()},
            global:true,
            async:false,
            success:function(response){
                if(response=='1'){
                    toastr.success('Pause applied successfully');
                    $('#p_m_t').html('Paused');
                    let success_temp=`<li>
                    <p style="font-size:14px;">Your subscription has been paused from ${$('#pause_s_date').val()} to ${$('#pause_e_date').val()}<br>
                        Your subscription will resume from ${$('#pause_e_date').val()}
                    </p>
                    </li>`;
                    $('.pause_ul').html(success_temp);
                    window.location.href='/';
                }else{
                    $('#pause_data_cnfrm').html(response);
                }
            }
        })
    })
      
    $('#cancel_pause').on('click',function(){
        swal({
                title: 'Are you sure want to cancel your pause?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                showLoaderOnConfirm: true,
                allowOutsideClick: false
                }).then(function(email) {
                    $.ajax({
                        url:'cancel_pause',
                        data:{"_token": "{{ csrf_token() }}"},
                        type:'post',
                        success:function(data){
                            toastr.success('Pause Cancelled successfully');
                            window.location.href='/';

                        }
                    })
                }).catch(swal.noop)
    })
    if('{{$users->user_status}}'=='8'){
        var whatsapp_no=<?php echo $whatsapp_no?$whatsapp_no:'+91879098766';?>;
        $('.whats-app-div').on('click',function(){
            window.open('https://api.whatsapp.com/send/?phone=+91'+whatsapp_no+'&text=&app_absent=0','_blank')
        })
    }

    $(function(){
		$('.magic_button1').on('click',function(){
            console.log(this);
			$(this).prev().prev().addClass('animateToRight');
            $(this).prev().addClass('animateToLeft');
            $(this).addClass('hide');
		});
	});
    
    $('.pause_btn').on('click',function(e){
        e.preventDefault();
        this.classList.toggle('opened');
    })
    $("input[name='renew_plan_buddy']").on('change',function(){
        if($("input[name='renew_plan_buddy']:checked").val()=='exsisting'){
            $('.new_partner_data').css('display','none');
            
        }else{
            $('.new_partner_data').css('display','block');
        }
    })
    $('#renew_continue').on('click',function(){
        if($("input[name='renew_plan']:checked").val()=='exsisting'){
            var data_pay={
                  "plan":'<?php echo $plan_current[0]->is_subscription?>',
                  "currency":'<?php echo strtoupper($currency); ?>',
                  "price":'<?php echo $plan_current[0]->price?>',
                  "description":'<?php echo $plan_current[0]->duration?>',
                  "count":'<?php echo $plan_current[0]->count_subscription?>',
                  "plan_id":'<?php echo $plan_current[0]->id?>'
              };
              
            localStorage.setItem("user_plan_pay", JSON.stringify(data_pay))
            if('<?php echo $users->user_status?>'=='11')
                setCookie('is_renewal',1,1);
            location.reload();

        }else{
            var elmnt = document.getElementById("section-tab-two");
            elmnt.scrollIntoView();
            $('#renew_modal').modal('toggle');
        }
    })
    $(document).ready(function(){	
        // clock functoion for booking live session
        //clockUpdate();

        


        // start program date picker
        if('<?php echo $users->user_status;?>'!='3')	{
            $(function () {
                $('#datetimepicker').datetimepicker({
                    format:'DD-MM-YYYY',
                    locale: 'en'
                });
                // var cont = 0;
                // $('.reload_element').on("dp.show",function(e){
                    
                //     return true;
                // });
                var count=0;
                
                
                $("#datetimepicker").on("dp.change", function() {
                    if(count!=0){
                        //$('.main_dashboard').html(' ');
                        var start_date=$('#start_date').val();
                        if('<?php echo $users->is_profile_filled;?>'=='0'){
                            toastr.error('Please complete your profile section to proceed further');
                            $('#profile_d').click();
                            $('#start_date').val(' ')
                            return false;
                        }
                        if('<?php echo $users->member_type;?>'=='Live Session'){
                            swal({
                                    title: 'Are you sure want to start your plan at '+start_date,
                                    showCancelButton: true,
                                    confirmButtonText: 'Yes',
                                    showLoaderOnConfirm: true,
                                    allowOutsideClick: false
                                    }).then(function(email) {
                                        $.ajax({
                                            url:'question_filled',
                                            data:{'start_date':start_date},
                                            type:'post',
                                            success:function(data){
                                                location.reload();

                                            }
                                        })
                                    }).catch(swal.noop)
                        }
                        else{
                                $.ajax({
                                url:'partner_profile_filled',
                                type:'post',
                                success:function(data){
                                    if(data){
                                        swal({
                                            title: 'Are you sure want to start your plan '+start_date,
                                            showCancelButton: true,
                                            confirmButtonText: 'Yes',
                                            showLoaderOnConfirm: true,
                                            allowOutsideClick: false
                                            }).then(function(email) {
                                                $.ajax({
                                                    url:'question_filled',
                                                    data:{'start_date':start_date},
                                                    type:'post',
                                                    success:function(data){
                                                        $('.main_dashboard').html(data.html);

                                                    }
                                                })
                                            }).catch(swal.noop)
                                    }else{
                                        toastr.error('Sorry your partner has not completed profile section please contact your partner to complete profile section');

                                    }
                                }
                            })
                        }
                        
                        
                    }
                    count++;
                });
                
            });
        }
    });
    $(document).ready(function(){
        
        // var mob_check=
        if('<?php echo $users->is_buddy;?>'=='1' && '<?php echo $users->user_status;?>'=='7'){
            $('.buddy_msg').css('display','block');
        }
        if('<?php echo $users->referal_action;?>'=='0' && '<?php echo $users->user_status;?>'=='2'){
            $('#referal_modal').modal({
                backdrop: 'static',
                keyboard: false  // to prevent closing with Esc button (if you want this too)
            })
            $('#referal_modal').modal('show');
        }
        $('#f_cancel').on('click',function(){
            $('#feedback_modal').modal('toggle')
        })
        var rating_emoji=0
        $('.rating-option').on('click',function(){
            rating_emoji=$(this).attr('rating');
        })
        $('#f_submit').on('click',function(){
            if(rating_emoji==0){
                toastr.error('Please Select Emoji');
                return false;
            }
            var s_id=$('#f_s_id').val();
            var feedback_comment=$('#feedback_comment').val();

            let f_data={
                'sess_id':s_id,
                'star':3,
                'comment':feedback_comment
            }
            $.ajax({
                    type:'post',
                    data:f_data,
                    url:'/feedback_insert',
                    success:function(response){
                        toastr.success('Congratulation your valuable feedback is submitted');
                        $('#feedback_modal').modal('toggle');

                    }
                })
        })
        $('#r_cancel').on('click',function(){
            $.ajax({
                    type:'post',
                    url:'cancel_referal',
                    success:function(response){
                        location.reload();

                    }
                })
        })
        $('#r_submit').on('click',function(){
            if($('#referal_code').val().length!=6){
                toastr.error('Please Enter Referal Code');
                return false;
            }
            $.ajax({
                    type:'post',
                    data:{'r_code':$('#referal_code').val()},
                    url:'/referal_code_apply',
                    success:function(response){
                        if(response){
                            toastr.success('Congratulation you got extension in programe');
                            location.reload();
                        }else{
                            toastr.error('Enter code is invalid');
                        }

                    }
                })
        })
        window.p_mob=false;
        window.p_email=false;
        if('<?php echo $users->partner_detailed_filed;?>'=='0' && '<?php echo $users->member_type;?>'=='Buddy' && '<?php echo $users->referal_action;?>'=='1'){
            $('#partner_modal').modal({
                backdrop: 'static',
                keyboard: false  // to prevent closing with Esc button (if you want this too)
            })
            $('#partner_modal').modal('show');
            $('.partner_submit').on('click',function(){
                if($("input[name='renew_plan_buddy']:checked").val()=='exsisting'){
                    let partner_data={
                        "full_name":'',
                        "mob_no":'',
                        "email":'',
                        "gender":'',
                        "exsisting":1
                    }
                    partner_data_submit(partner_data);
                }else{
                    if(!$('#p_d_name_1').val().length){
                        toastr.error('Enter buddy full name');
                        return false;
                    }
                    if(!$('#telNo_partner').val().length){
                        toastr.error('Enter buddy mobile number');
                        return false;
                    }
                    if(!$('#p_d_email_1').val().length){
                        toastr.error('Enter buddy email');
                        return false;
                    }
                    if(!$('input[name=gender_p]:checked').length){
                        toastr.error('Enter partner gender');
                        return false;
                    }
                    mobile_number_available($('#telNo_partner').val());
                    validEmail($('#p_d_email_1').val())
                    let partner_data={
                        "full_name":$('#p_d_name_1').val(),
                        "mob_no":$('#telNo_partner').val(),
                        "email":$('#p_d_email_1').val(),
                        "gender":$('input[name=gender_p]:checked').val(),
                        "exsisting":0
                    }
                    if(p_mob && p_email)
                        partner_data_submit(partner_data);
                }
                
                
            })
        }
        function partner_data_submit(partner_data){
            $.ajax({
                    type:'post',
                    data:partner_data,
                    url:'/partner_data',
                    success:function(response){
                        if(response){
                            toastr.success('Buddy details successfully submitted.');
                            location.reload();
                        }
                        else
                            toastr.error('Server Error!');

                    }
                })
        }
        if('<?php echo $users->user_status;?>'=='1' && '<?php echo $users->is_profile_filled;?>'!='1'){
            $('.profile_d').css('display','block');
            $('#dashboard a').removeClass('active');
            $('#profile_d').find('a').addClass('active');
        }else{
                if('<?php echo $users->user_status;?>'=='3'){
                $.ajax({
                        url:'question_filled',
                        type:'post',
                        success:function(data){
                            $('.main_dashboard').html(data.html);

                        }
                    })
            }else{
                $('.dashboard').css('display','block');  
            }
                      
        }
        
        $('#save_user').on('click', function(){
            if($('#full_name').val().length<3){
                toastr.error('Please enter full name');
                return false;
            }
            if($('#telNo').val().length<12){
                toastr.error('Please enter Mobile number');
                return false;
            }
            if($('#password').val()!=$('#repassword').val()){
                toastr.error('Confirm password does not match with password');
                return false;
            }
            if($('#password').val().length<7 && $('#repassword').val().length<7){
                toastr.error('Enter password and confirm password minimum 8 character');
                return false;
            }
            
            
            if($('#profile_gender').val()==null){
                toastr.error('Please choose your gender');
                return false;
            }
            if($('#profile_height').val().length<1){
                toastr.error('Please enter your height');
                return false;
            }
            if($('#profile_weight').val().length<1){
                toastr.error('Please enter your weight');
                return false;
            }
            if($('#profile_dob').val().length<1){
                toastr.error('Please enter your date of birth');
                return false;
            }
            let data={
                'email':$('#email').val(),
                'name':$('#full_name').val(),
                'mob_no':$('#telNo').val(),
                'password':$('#password').val(),
                'city':$('#city').val(),
                'country':$('#country').val(),
                'gender':$('#profile_gender').val(),
                'height':$('#profile_height').val(),
                'weight':$('#profile_weight').val(),
                'dob':$('#profile_dob').val(),
                'is_profile_filled':1,
                'short_country_name':$('#s_c_name').val()
            }
            if($('#telNo').is(':disabled'))
                delete data['mob_no'];
            if($('#password').is(':disabled'))
                delete data['password'];

                
            if($('#telNo').is(':disabled')){
                $.ajax({
                        type:'post',
                        data:data,
                        url:'/saveUser',
                        success:function(response){
                            toastr.success('Save');
                            location.reload();
                            //$('#dashboard').click()
                            
                        },
                    })
            }else{
                    $.ajax({
                    type:'post',
                    data:{'mob_no':$('#telNo').val()},
                    url:'/mob_available',
                    success:function(response){
                        if(!response){
                            $.ajax({
                                type:'post',
                                data:data,
                                url:'/saveUser',
                                success:function(response){
                                    toastr.success('Save');
                                    location.reload();
                                    //$('#dashboard').click()
                                    
                                },
                            })
                        }else{
                            toastr.error('Mobile number already exsist please enter different number');
                        }
                        
                    },
                })
            }
            
        })
    })
    function mobile_number_available(mob_no){
        $.ajax({
                    type:'post',
                    data:{'mob_no':mob_no},
                    url:'/mob_available',
                    success:function(response){
                        if(response){
                            toastr.error('Mobile number already exsist please enter different number');
                            return false;
                        }else{
                            p_mob=true;
                            return true;
                        }
                        
                    },
                })
    }
    $('.pay_t').on('click',function(){
        $('.pay_style').css('visibility','visible');
        $('.pay_style').css('opacity','1');
        $('.pay_t').css('opacity','0');
        $('.pay_t').css('visibility','hidden');

    })
    $('.nav-item').on('click',function(e){
        $('.nav-item a').removeClass('active');
        $(this).find('a').addClass('active');
        var id=$(this).attr('id');
        $('.p_d').css('display','none');
        $('.'+id).css('display','block');
        if(id=='live_session')
            today_live_session_check()

    })
    function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    function flagButtonValue(){
        var countryData = $("#telNo").intlTelInput("getSelectedCountryData").dialCode; // get country code
        telNumber = "+" + countryData + $("#telNo").val();					//Whole phone number (with Country code and value of input)
        $("#telNo").val(telNumber);
    }
    $(".country").on('click',function(){
        $("#telNo").val('');
        flagButtonValue();
    })

    $("#telNo").intlTelInput({
    initialCountry: "auto",				//Function to put as default country the country where the IP is located
    geoIpLookup: function(callback) {
        
        var countryCode ='<?php echo $_COOKIE['s_c_nane']?>';
        callback(countryCode);

        
    },
    });
    $('#p_d_email_1').focusout(function(){
        var email=$('#p_d_email_1').val();
        validEmail(email)
    })
    function validEmail(e) {
        var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
        var res= String(e).search (filter) != -1;
        if(res){
            $.ajax({
                    type: 'POST',
                    data:{'partner_email':$('#p_d_email_1').val()},
                    url: '/partner_email',
                    success: function (response) {
                        if(response){
                            p_email=true;
                            return true;
                        }
                        else{
                            toastr.error('Email id already exsist please use different one')
                            return false;
                        }
                    },
                });
        }
        else{
            toastr.error('Please enter valid email address')
            return false;
        }
    }
    function flagButtonValue_partner(){
        var countryData = $("#telNo_partner").intlTelInput("getSelectedCountryData").dialCode; // get country code
        telNumber = "+" + countryData + $("#telNo_partner").val();					//Whole phone number (with Country code and value of input)
        $("#telNo_partner").val(telNumber);
    }
    $(".country").on('click',function(){
        $("#telNo_partner").val('');
        flagButtonValue_partner();
    })

    $("#telNo_partner").intlTelInput({
    initialCountry: "auto",				//Function to put as default country the country where the IP is located
    geoIpLookup: function(callback) {
        
        var countryCode ='<?php echo $_COOKIE['s_c_nane']?>';
        callback(countryCode);

        
    },
    });
   
    if(!"<?php echo $users->mob_no?>" && '<?php echo $users->user_status;?>'!='3'){
        setTimeout(
        function () {
            flagButtonValue();
        },
        1000
    );
    }
    if("<?php echo $users->is_buddy?>"){
        setTimeout(
        function () {
            flagButtonValue_partner();
        },
        1000
    );
    }
    
    //+91
</script>
<!-- Chart js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<?php
if($users->user_status==1 || $users->user_status==11){
?>
<script>
$(document).ready(function(){
              var data_pay_retrive=JSON.parse(localStorage.getItem("user_plan_pay"))

              if(data_pay_retrive){
                  $('.free_trial').css('display','none');
                if (data_pay_retrive.plan==0) {
                $.ajax({
                    type: 'GET',
                    global:true,
                    async:false,
                    url: '/ajax/generateOrder?currency='+data_pay_retrive.currency+'&amount='+parseFloat(data_pay_retrive.price)*parseFloat(100),

                    success: function (data) {
                        console.log(data)
                      var amount=parseFloat(data.data.amount)/parseFloat(100);
                      var options = {
                      //  "key": "rzp_live_YnNSnlZuMEUjHb",
                         "key": "rzp_live_YnNSnlZuMEUjHb",
                        "order_id": data.data.id,
                        "name": "Liv Ezy",
                        "currency":'<?php echo strtoupper($currency); ?>',
                        "description": data_pay_retrive.description,
                        
                        "prefill":{
                            "email":"<?php echo Session::get('email')?>",
                            "contact":"<?php echo Session::get('mob_no')?>",
                        },
                        "image": "fitness/images/logo.png",
                        "notes": {
                            "country": '<?php echo isset($_COOKIE['ralcountry'])?$_COOKIE['ralcountry']:'NA'; ?>',
                            "state": '<?php echo isset($_COOKIE['ralstate'])?$_COOKIE['ralstate']:'NA'; ?>',
                            "fromOrderApi":"YES"
                          },
                        "handler": function (response){
                          $.ajax({
                              type: 'GET',
                              global:true,
                              async:false,
                              data:response,
                              url: '/ajax/verifyOrder',
                              success: function (response1) {
                                console.log(response1 ,'from HNADELE');
                                  $.ajax({
                                      type: 'GET',
                                      global:true,
                                      async:false,
                                      url: '/sendInvoice?desc='+data_pay_retrive.description+'&member_plan_id='+data_pay_retrive.plan_id+'&plan_id='+response1.data,
                                      success: function (data1) {
                                      },
                                  });

                                $('.ref_no').html(response1.data);
                                $('.res_amt').html('<strong><?php echo $currency_icon ?></strong>'+data_pay_retrive.price+'/-')
                                $('.res_amt').show();

                                $('#success_modal').modal({
                                    backdrop: 'static',
                                    keyboard: false
                                })
                                localStorage.removeItem('user_plan_pay');

                              },

                          });

                        },
                        "modal": {
                            "ondismiss": function(){
                                localStorage.removeItem('user_plan_pay');

                            }
                        },
                        "theme": {
                          "color": "#0062cc"
                        }
                      };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    },
                });


              }else{
                $.ajax({
                    type: 'GET',
                    global:true,
                    async:false,
                    url: '/createSubscription?plan_id='+data_pay_retrive.plan+'&count='+data_pay_retrive.count,
                    success: function (data) {
                        var sub=data;
                        sub=sub.replace(/(\r\n|\n|\r)/gm, "");
                        var options = {
                            "key": "rzp_live_YnNSnlZuMEUjHb",
                            "subscription_id":sub,
                            "name": "RAL Fitness",
                            "image": "fitness/images/logo.png",
                            "notes": {
                                "country": '<?php echo isset($_COOKIE['ralcountry'])?$_COOKIE['ralcountry']:'NA'; ?>',
                                "state": '<?php echo isset($_COOKIE['ralstate'])?$_COOKIE['ralstate']:'NA'; ?>',
                              },
                            "prefill":{
                                "email":"<?php echo Session::get('email')?>",
                                "contact":"<?php echo Session::get('mob_no')?>",
                            },
                            "description": "Don't Worry we will refund 5 ruppess",
                            "handler": function (response){
                                $.ajax({
                                    type: 'GET',
                                    global:true,
                                    async:false,
                                    url: '/sendSubscriptionInvoice?desc='+data_pay_retrive.description+'&member_plan_id='+data_pay_retrive.plan_id+'&plan_id='+response.razorpay_payment_id+'&subscription_id='+sub,
                                    success: function (data) {
                                        localStorage.removeItem('user_plan_pay');

                                    },
                                });

                                $('.ref_no').html(response.razorpay_payment_id);
                                $('.res_amt').hide();
                                $('#success_modal').modal({
                                    backdrop: 'static',
                                    keyboard: false
                                });
                                

                            },
                            "modal": {
                                "ondismiss": function(){
                                    localStorage.removeItem('user_plan_pay');
                                }
                            },
                            "theme": {
                                "color": "#0062cc"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.open();
                    },
                });
              }
              }
    })
</script>
<?php
}
?>
<script>
function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
$(document).ready(function(){
        $('#success_modal_close').on('click',function(){
            window.location.href='/';
        })
        //Razor Pay Script new
        $('.pay__').click(function (e) {
              e.preventDefault();
            
              var $this = $(this);
              var data_pay={
                  "plan":$(this).data('plan'),
                  "currency":'<?php echo strtoupper($currency); ?>',
                  "price":$(this).data('price'),
                  "description":$(this).data('description'),
                  "count":$(this).data('count'),
                  "plan_id":$(this).data('pid')
              };
              
            localStorage.setItem("user_plan_pay", JSON.stringify(data_pay))
            if('<?php echo $users->user_status?>'=='11')
                setCookie('is_renewal',1,1);
            location.reload();


          });
        $('.new_tnc').click(function (e) {

        $('#pay_tnc').attr($(this).data())
        if(!$('#test1').is(":checked")){

            $('#pay_tnc').css('opacity',0.5)

            //$('#test1_span').css('color','black')

            $('#pay_tnc').css('cursor','not-allowed')

        }else{

            $('#pay_tnc').css('opacity',1)

            //$('#test1_span').css('color','black')

            $('#pay_tnc').css('cursor','pointer')

        }

        })

        $('#test1').click(function(){

        if(!$('#test1').is(":checked")){

            $('#pay_tnc').css('opacity',0.5)

            $('.tnc_text_error').css('display','none')

            $('#pay_tnc').css('cursor','not-allowed')

        }else{

            $('#pay_tnc').css('opacity',1)

            $('#pay_tnc').css('cursor','pointer')
        }

        })

        // $('.pay__').click(function (e) {

        // e.preventDefault();

        // var $this = $(this);
        // console.log($(this).attr('plan'))

        // if(!$('#test1').is(":checked")){

        //     $('#pay_tnc').css('opacity',0.5)

        //     $('#pay_tnc').css('cursor','not-allowed')

        //     $('.tnc_text_error').css('display','block')

        //     toastr.error('Please accept Terms and Conditions')

        //     return false;

        // }else{

        //     $('#pay_tnc').css('opacity',1)

        //     $('#pay_tnc').css('cursor','pointer')

        //     $('.tnc_text_error').css('display','none')

        //     $('#term_condition').modal('hide')

        // }

        // if ($(this).attr('plan')==0) {

        //     $.ajax({

        //         type: 'GET',

        //         global:true,

        //         async:false,

        //         url: '/ajax/generateOrder?currency=<?php echo strtoupper($currency); ?>&amount='+parseFloat($(this).attr('price'))*parseFloat(100),

        //         success: function (data) {



        //             var amount=parseFloat(data.data.amount)/parseFloat(100);

        //             var options = {

        //             //  "key": "rzp_test_W5E4Uziwm4qWf1",

        //             "key": "rzp_live_YnNSnlZuMEUjHb",

        //             "order_id": data.data.id,

        //             "name": "Liv Ezy",

        //             "currency":'<?php echo strtoupper($currency); ?>',

        //             "description": $(this).data('description'),

        //             "image": "fitness/images/png2.png",

        //             "handler": function (response){

        //                 $.ajax({

        //                     type: 'GET',

        //                     global:true,

        //                     async:false,

        //                     data:response,

        //                     url: '/ajax/verifyOrder',

        //                     success: function (response1) {

        //                     console.log(response1 ,'from HNADELE');

        //                         $.ajax({

        //                             type: 'GET',

        //                             global:true,

        //                             async:false,

        //                             url: '/sendInvoice?plan_id='+response1.data,

        //                             success: function (data1) {

        //                             },

        //                         });



        //                     $('.ref_no').html(response1.data);

        //                     $('.res_amt').html('<strong><?php echo $currency_icon ?></strong>'+$($this).attr('price')+'/-')

        //                     $('.res_amt').show();



        //                     $('#success_modal').modal({

        //                         backdrop: 'static',

        //                         keyboard: false

        //                     })

        //                     },



        //                 });



        //             },

        //             "theme": {

        //                 "color": "#0062cc"

        //             }

        //             };

        //             var rzp1 = new Razorpay(options);

        //             rzp1.open();

        //         },

        //     });

        // }else{
        //     var total_cycle=$(this).attr('count');
        //     $.ajax({
        //         type: 'GET',
        //         global:true,
        //         async:false,
        //         url: '/createPlan?currency=<?php echo strtoupper($currency); ?>&amount='+parseFloat($(this).attr('price'))*parseFloat(100)+'&count='+$(this).attr('count')+'&desc='+$(this).attr('desc'),
        //         success:function (response_plan){
        //             $.ajax({

        //                 type: 'GET',

        //                 global:true,

        //                 async:false,

        //                 url: '/createSubscription?plan_id='+response_plan.data+'&count='+total_cycle,

        //                 success: function (data) {

        //                     var sub=data;

        //                     sub=sub.replace(/(\r\n|\n|\r)/gm, "");

        //                     var options = {

        //                         "key": "rzp_live_YnNSnlZuMEUjHb",

        //                         "subscription_id":sub,

        //                         "name": "Liv Ezy",

        //                         "image": "fitness/images/png2.png",

        //                         "handler": function (response){

        //                             $.ajax({

        //                                 type: 'GET',

        //                                 global:true,

        //                                 async:false,

        //                                 url: '/sendSubscriptionInvoice?plan_id='+response.razorpay_payment_id+'&subscription_id='+sub,

        //                                 success: function (data) {

        //                                 },

        //                             });



        //                             $('.ref_no').html(response.razorpay_payment_id);

        //                             $('.res_amt').hide();

        //                             $('#success_modal').modal({

        //                                 backdrop: 'static',

        //                                 keyboard: false

        //                             });

        //                         },

        //                         "theme": {

        //                             "color": "#0062cc"

        //                         }

        //                     };

        //                     var rzp1 = new Razorpay(options);

        //                     rzp1.open();

        //                 },

        //                 });
        //         }
        //     })
            

        // }
        // })
})

        // uncomment
        // var ctx = document.getElementById('myChart').getContext('2d');
        // var myChart = new Chart(ctx, {
        //                 type: 'doughnut',
        //                 data: {
        //                     labels: ["Available", "Pause"],
        //                     datasets: [
        //                     {
        //                         data: [10, 5],
        //                         backgroundColor: [
        //                             "#1ce2e1",
        //                             "#000"
        //                         ],
        //                         hoverBackgroundColor: [
        //                             "#1ce2e1",
        //                             "#000"
        //                         ]
        //                     }]
        //                 },
        //                 options: {
        //                     animation:{
        //                         animateScale:true
        //                     }
        //                 }
        //             });
</script>
<div class="container buddy_msg">
    <div class="row">
            <div class="col-md-12 free_trial_text">
                Your partner has not completed the onboarding process!
                
            </div>
    </div>
</div>
<?php
if($users->user_status==1){
?>
<div class="container free_trial">
    <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10 free_trial_text">
                You have two <span class="f_ls_connect">free live session....</span>Hurry Avail it!!!!!!!!!!!!
                <span class="close_free_trial">X</span>
            </div>
    </div>
</div>
<script>
    
    $('.view_more_recipe').on('click',function(){
        $('#recipes').click()
    })
    $('.close_free_trial').on('click',function(){
        $('.free_trial').html(' ');
        $('.free_trial').css('display','none');
    })
    $('.f_ls_connect').on('click',function(){
        $('#live_session').click()
    })
    
</script>
<?php
}
?>
<script src="https://unpkg.com/vue"></script>

<script>
    $('#feedback_modal').css('visibility','hidden')
    $('#feedback_modal').modal('toggle')

    new Vue({
    el: '#app',
    data: {
        message: ''
    },
    mounted: function () {
        var RatingControl = function(element) {
        var self = this;
        self.containerElement = element;
        self.selectedRatingElement = self.containerElement.querySelector(".current-rating");
        self.selectedRatingSVGContainer = self.selectedRatingElement.querySelector(".svg-wrapper");
        self.ratingElements = [].slice.call(self.containerElement.querySelectorAll(".rating-option")).map(function(element) {
        return {
            container: element,
            icon: element.querySelector(".icon"),
            label: element.querySelector(".label"),
            selectedFill: self.hexToRGB(element.getAttribute("selected-fill") || "#FFD885")
        };
        });

        self.selectedRating;
        self.sliderPosition = 0;
        self.facePaths = [];
        self.labelColor = self.hexToRGB("#ABB2B6");
        self.labelSelectedColor = self.hexToRGB("#313B3F");
        self.dragging = false;
        self.handleDragOffset = 0;
        self.ratingTouchStartPosition = {x:0, y:0};
        self.onRatingChange = function() {};
        self.easings = {
        easeInOutCubic: function(t, b, c, d) {
            if ((t/=d/2) < 1) return c/2*t*t*t + b;
            return c/2*((t-=2)*t*t + 2) + b;
        },
        easeInOutQuad: function(t, b, c, d) {
            if ((t/=d/2) < 1) return c/2*t*t + b;
            return -c/2 * ((--t)*(t-2) - 1) + b;
        },
        linear: function (t, b, c, d) {
            return c*t/d + b;
        }
        };

        self.onHandleDrag = self.onHandleDrag.bind(this);
        self.onHandleRelease = self.onHandleRelease.bind(this);

        self.ratingElements.forEach(function(element) {
        // Copy face path data from HTML
        var paths = {};
        [].forEach.call(element.icon.querySelectorAll("path:not(.base)"), function(path) {
            var pathStr = path.getAttribute("d");
            paths[path.getAttribute("class")] = self.splitString(pathStr);
        });
        self.facePaths.push(paths);
        // On rating selected
        element.container.addEventListener("ontouchend" in document ? "touchend" : "click", function(e) {
            if ("ontouchend" in document) {
            var ratingTouchCurrentPosition = {x: e.pageX, y: e.pageY};
            var dragDistance = Math.sqrt(Math.pow(ratingTouchCurrentPosition.x - self.ratingTouchStartPosition.x, 2) + Math.pow(ratingTouchCurrentPosition.y - self.ratingTouchStartPosition.y, 2));
            if (dragDistance > 10) {
                return;
            }
            }
            var newRating = element.container.getAttribute("rating") - 1;
            self.setRating(newRating, {fireChange: true});
        });
        });

        if ("ontouchend" in document) {
        document.body.addEventListener("touchstart", function(e) {
            if (e.target.classList.contains("rating-option")) {
            self.ratingTouchStartPosition = {x: e.touches[0].pageX, y: e.touches[0].pageY};
            }
        });
        self.selectedRatingElement.addEventListener("touchstart", function(e) {
            self.dragging = true;
            self.handleDragOffset = e.touches[0].pageX - self.selectedRatingElement.getBoundingClientRect().left;
            self.setLabelTransitionEnabled(false);
        });
        self.selectedRatingElement.addEventListener("touchmove", self.onHandleDrag);
        self.selectedRatingElement.addEventListener("touchend", self.onHandleRelease);
        } else {
        document.body.addEventListener("mousedown", function(e) {
            if (e.target == self.selectedRatingElement) {
            e.preventDefault();
            self.dragging = true;
            self.handleDragOffset = e.offsetX;
            self.setLabelTransitionEnabled(false);
            document.body.classList.add("dragging");
            document.body.addEventListener("mousemove", self.onHandleDrag);
            }
        });
        document.body.addEventListener("mouseup", function(e) {
            if (self.dragging) {
            document.body.classList.remove("dragging");
            document.body.removeEventListener("mousemove", self.onHandleDrag);
            self.onHandleRelease(e);
            }
        });
        }

        self.setRating(3, {duration: 0});
    }

    RatingControl.prototype = {
        setRating: function(rating, options) {
        var self = this;
        var options = options || {};
        var startTime;
        var fireChange = options.fireChange || false;
        var onComplete = options.onComplete || function() {};
        var easing = options.easing || self.easings.easeInOutCubic;
        var duration = options.duration == undefined ? 550 : options.duration;
        var startXPosition = self.sliderPosition;
        var endXPosition = rating * self.selectedRatingElement.offsetWidth;

        if (duration > 0) {
            var anim = function(timestamp) {
            startTime = startTime || timestamp;
            var elapsed = timestamp - startTime;
            var progress = easing(elapsed, startXPosition, endXPosition - startXPosition, duration);
            self.setSliderPosition(progress);
            if (elapsed < duration) {
                requestAnimationFrame(anim);
            } else {
                self.setSliderPosition(endXPosition);
                self.setLabelTransitionEnabled(true);
                if (self.onRatingChange && self.selectedRating != rating && fireChange) {
                self.onRatingChange(rating);
                }
                onComplete();
                self.selectedRating = rating;
            }
            };

            self.setLabelTransitionEnabled(false);
            requestAnimationFrame(anim);
        } else {
            self.setSliderPosition(endXPosition);
            if (self.onRatingChange && self.selectedRating != rating && fireChange) {
            self.onRatingChange(rating);
            }
            onComplete();
            self.selectedRating = rating;
        }
        },

        setSliderPosition: function(position) {
        var self = this;
        self.sliderPosition = Math.min(Math.max(0, position), self.containerElement.offsetWidth - self.selectedRatingElement.offsetWidth);
        var stepProgress = self.sliderPosition / self.containerElement.offsetWidth * self.ratingElements.length;
        var relativeStepProgress = stepProgress - Math.floor(stepProgress);
        var currentStep = Math.round(stepProgress);
        var startStep = Math.floor(stepProgress);
        var endStep = Math.ceil(stepProgress);
        // Move handle
        self.selectedRatingElement.style.transform = "translateX(" + (self.sliderPosition / self.selectedRatingElement.offsetWidth * 100) + "%)";
        // Set face
        var startPaths = self.facePaths[startStep];
        var endPaths = self.facePaths[endStep];
        var interpolatedPaths = {};
        for (var featurePath in startPaths) {
            if (startPaths.hasOwnProperty(featurePath)) {
                var startPath = startPaths[featurePath];
                var endPath = endPaths[featurePath];
                var interpolatedPoints = self.interpolatedArray(startPath.digits, endPath.digits, relativeStepProgress);
                var interpolatedPath = self.recomposeString(interpolatedPoints, startPath.nondigits);
                interpolatedPaths[featurePath] = interpolatedPath;
            }
        }
        var interpolatedFill = self.interpolatedColor(self.ratingElements[startStep]["selectedFill"], self.ratingElements[endStep]["selectedFill"], relativeStepProgress);
        self.selectedRatingSVGContainer.innerHTML = '<svg width="55px" height="55px" viewBox="0 0 50 50"><path d="M50,25 C50,38.807 38.807,50 25,50 C11.193,50 0,38.807 0,25 C0,11.193 11.193,0 25,0 C38.807,0 50,11.193 50,25" class="base" fill="' + interpolatedFill + '"></path><path d="' + interpolatedPaths["mouth"] + '" class="mouth" fill="#655F52"></path><path d="' + interpolatedPaths["right-eye"] + '" class="right-eye" fill="#655F52"></path><path d="' + interpolatedPaths["left-eye"] + '" class="left-eye" fill="#655F52"></path></svg>';
        // Update marker icon/label
        self.ratingElements.forEach(function(element, index) {
            var adjustedProgress = 1;
            if (index == currentStep) {
            adjustedProgress = 1 - Math.abs((stepProgress - Math.floor(stepProgress) - 0.5) * 2);
            }
            element.icon.style.transform = "scale(" + adjustedProgress + ")";
            element.label.style.transform = "translateY(" + self.interpolatedValue(9, 0, adjustedProgress) + "px)";
            element.label.style.color = self.interpolatedColor(self.labelSelectedColor, self.labelColor, adjustedProgress);
        });
        },

        onHandleDrag: function(e) {
        var self = this;
        e.preventDefault();
        if (e.touches) {
            e = e.touches[0];
        }
        var offset = self.selectedRatingElement.offsetWidth / 2 - self.handleDragOffset;
        var xPos = e.clientX - self.containerElement.getBoundingClientRect().left;
        self.setSliderPosition(xPos - self.selectedRatingElement.offsetWidth / 2 + offset);
        },

        onHandleRelease: function(e) {
        var self = this;
        self.dragging = false;
        self.setLabelTransitionEnabled(true);
        var rating = Math.round(self.sliderPosition / self.containerElement.offsetWidth * self.ratingElements.length);
        self.setRating(rating, {duration: 200, fireChange: true});
        },

        setLabelTransitionEnabled: function(enabled) {
        var self = this;
        self.ratingElements.forEach(function(element) {
            if (enabled) {
            element.label.classList.remove("no-transition");
            } else {
            element.label.classList.add("no-transition");
            }
        });
        },

        interpolatedValue: function(startValue, endValue, progress) {
        return (endValue - startValue) * progress + startValue;
        },

        interpolatedArray: function(startArray, endArray, progress) {
        return startArray.map(function(startValue, index) {
            return (endArray[index] - startValue) * progress + startValue;
        });
        },

        interpolatedColor: function(startColor, endColor, progress) {
        var self = this;
        var interpolatedRGB = self.interpolatedArray(startColor, endColor, progress).map(function(channel) {
            return Math.round(channel);
        });
        return "rgba(" + interpolatedRGB[0] + "," + interpolatedRGB[1] + "," + interpolatedRGB[2] + ",1)";
        },

        easeInQuint: function(t, b, c, d) {
        return c*(t/=d)*t*t + b;
        },

        hexToRGB: function(hex) {
        // Expand shorthand form to full form
        var shorthandRegex = /^#?([a-f\d])([a-f\d])([a-f\d])$/i;
        hex = hex.replace(shorthandRegex, function(m, r, g, b) {
            return r + r + g + g + b + b;
        });
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? [
            parseInt(result[1], 16),
            parseInt(result[2], 16),
            parseInt(result[3], 16)
        ] : null;
        },

        splitString: function(value) {
        var re = /-?\d*\.?\d+/g;
        var toStr = function toStr(val) {
            return typeof val == "string" ? val : String(val);
        };
        return {
            digits: toStr(value).match(re).map(Number),
            nondigits: toStr(value).split(re)
        };
        },

        recomposeString: function(digits, nondigits) {
        return nondigits.reduce(function (a, b, i) {
            return a + digits[i - 1] + b;
        });
        },

        simulateRatingTap(rating, delay, complete) {
        var self = this;
        var ratingElement = self.ratingElements[rating];
        setTimeout(function() {
            ratingElement.container.classList.add("show-touch");
            setTimeout(function() {
            ratingElement.container.classList.remove("show-touch");
            self.setRating(rating, {
                onComplete: function() {
                if (complete) {
                    complete();
                }
                }
            });
            }, 250);
        }, delay || 0);
        },

        simulateRatingDrag(rating, delay, complete) {
        var self = this;
        setTimeout(function() {
            self.selectedRatingElement.classList.add("show-touch");
            setTimeout(function() {
            self.setRating(rating, {
                duration: 3000,
                easing: self.easings.easeInOutQuad,
                onComplete: function() {
                self.selectedRatingElement.classList.remove("show-touch");
                if (complete) {
                    complete();
                }
                }
            });
            }, 250);
        }, delay || 0);
        }
    }


    document.querySelector(".rating-container").classList.add("clip-marker");
    var ratingControl = new RatingControl(document.querySelector(".rating-control"));
    }
    })
    $('#feedback_modal').modal('toggle')
    $('#feedback_modal').css('visibility','unset')

</script>
</body>
</html>