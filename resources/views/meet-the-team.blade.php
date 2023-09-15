<!DOCTYPE html>
<html lang="en">

<head>
    <title>Online Fitness Coaching | LivEzy Premium</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="At Liv Ezy our 24x7 available online personal trainers provide workout and nutrition plans to smash your goals. Sounds good? Let's get started now!!">
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
    <link rel="stylesheet" href="fitness/css/style.css?v5">
    <link rel="stylesheet" href="fitness/css/lucky.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="fitness/css/custom.css?v9">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Success Stories v2 -->
    <link rel="stylesheet" href="fitness/css/succv2.css?v5">

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.css"
        rel="stylesheet" />
</head>

<body>

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

    <style>
    html {
        scroll-behavior: smooth;
    }

    /* #scroll-top {
            display: block !important;
        } */
    .logo-style {
        width: 86px;
        padding-top: 7px;
        position: absolute;
        left: 36px;
        top: 4px;
    }

    .ftco-explore {
        padding: 3em 0 3em !important;
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
        #location_modal_nav_style {
            position: unset !important;
            right: unset !important;
        }

        .liv_ezy_text {
            position: absolute;
            font-size: 14px;
            left: 46px;
            top: 7px;
            text-transform: capitalize;
            font-weight: 700;
            font-family: sans-serif;
            color: #000;
        }

        .logo-style {
            width: 86px;
            position: absolute;
            left: 36px;
            top: 15px;
        }

        .logo-style {
            /* width: 25px; */
            position: absolute;
            left: 60px;
            top: 6px;
        }

        .ftco-explore {
            margin-top: 70px;
        }
    }

    .heading-section .subheading {
        font-size: 18px;
        font-weight: 700;
        color: #000;
        margin-bottom: 20px;
    }

    .subhead-1 {
        color: #fff !important;
    }

    .own-service-icon span {
        color: #31cdcc;
    }

    #diet-img {
        margin-top: -20px;
    }

    span.number-member {
        color: #31cdcc;
    }

    .btn.btn-primary {
        background: #31cdcc;
        border: 1px solid #31cdcc !important;
    }

    .btn-buy-now {
        background: #31cdcc;
        border: 1px solid #31cdcc !important;
    }

    .btn.btn-primary:hover {
        background: #000;
        border: 1px solid #000 !important;
        color: #fff !important;
    }

    .membership-modal .modal-header {
        background-color: #187FDE;
    }

    .own-member-item {
        border-color: #31cdcc;
    }

    #contact_form .contact-info .contact-info-item .ico-wrap {
        color: #31cdcc;

    }

    .location_wrap {
        background: #31cdcc;
    }

    .bottom-footer p {
        float: left;
    }
    </style>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5H6RR6T" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <style>
    .navbar {
        position: fixed;
        top: 0;
        width: 100%;
        overflow: hidden;
        z-index: 1;
        margin-top: -1px !important;
    }

    .navbar-nav>.active>a {
        color: #187FDE !important;
        border-bottom: 3px solid #187FDE !important;
    }

    .nav-link {
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

    @media only screen and (max-width:600px) {

        .contact-head {
            font-size: 2rem !important;
            line-height: 40px !important;
        }

        .contact-mobile {
            padding-right: 0px !important;
            padding-left: 0px !important;
        }

        .contact-mobile-main {
            margin-right: 0px;
            margin-left: 0px;
        }

        .contact-head-mob {
            text-align: center;
            margin-bottom: 30px;
        }

        .navbar-nav>.active>a {
            border-bottom: 0px !important;
        }

        .logo-style {
            left: 70% !important;
            padding-top: 0px !important;
        }

        .first-block {
            margin-top: -10px !important;
        }

        .plan-brief-info.cmp {
            text-align-last: center !important;
            text-align: center !important;
        }

        .cp-head {
            margin-bottom: 20px !important;
        }

        .footer-icon-mob {
            display: flex;
            justify-content: center;
        }

        .explore-wrap {
            padding-bottom: 100px;
        }
    }
    </style>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item active">
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
                <li class="nav-item">
                    <a class="nav-link" href="/contact-us">Contact</a>
                </li>
            </ul>
        </div>
    </nav>


    <style>
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

        body {
            background: #000;
        }

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


    <div class="explore-wrap">

        <section class="ftco-section ftco-explore full-section">
            <div class="container">
                <div class="row d-flex flex-column pro-card justify-content-center align-items-center enroll-premimum-card" style="margin-top: 50px;">
                    <!-- <div class="d-flex flex-row justify-content-start">
                        <div class="col-md-4">
                            <h3 class="position-relative" style="font-size:2.7rem;font-weight:600;">
                                LivEzy
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-dark ml-1 p-2" style="font-size:1.2rem;background-color: #cf245f;background-image: linear-gradient(to bottom right, #fcd34d, #ef4444, #ec4899)">
                                Pro
                                </span>
                            </h3>
                        </div>
                        <div class="col-md-2">
                            <h3 class="position-relative" style="font-size:2.7rem;font-weight:600;">
                                LivEzy
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-dark ml-1 p-2" style="font-size:1.2rem;background-color: #cf245f;background-image: linear-gradient(to bottom right, #fcd34d, #ef4444, #ec4899)">
                                Pro
                                </span>
                            </h3>
                        </div>

                    </div> -->
                    <div class="d-flex flex-row justify-content-center enroll-card">
                        <div class="col-md-2 d-flex justify-content-end pr-0 enroll-img">
                            <img src="/images/icons/enroll_card.png" alt="" class="pro-img">
                        </div>
                        <div
                            class="col-md-8 d-flex flex-column justify-content-center align-items-left pl-0 pt-3 enroll-text">
                            <h5><strong>Choose Your Fitness Expert</strong></h5>
                            <p>Get a tailored nutrition plan and a workout routine based on your current lifestyle and fitness goals, with regular follow-ups from your preferred coach.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center heading-section ftco-animate" style="margin-top: 40px;">
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
                                    <h5 style="color:white; font-size: 1.25rem;"><span class="badge"
                                            style="background-color:#00ab4e;">Classic</span></h5>
                                    @elseif($coach_data[$g]->coach_tier === 'supreme')
                                    <h5 style="color:white; font-size: 1.25rem;"><span class="badge"
                                            style="background-color:#1a70d1;">Supreme</span></h5>
                                    @elseif($coach_data[$g]->coach_tier === 'exclusive')
                                    <h5 style="color:white; font-size: 1.25rem;"><span class="badge"
                                            style="background-color:#bc4244;">Exclusive</span></h5>
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
                                        if($coach_assigned != 1) {
                                            if($coach_data[$g]->slots > 0) { ?>
                                    <!--a href="/testing/<?php echo $coach_data[$g]->profile_url; ?>" onclick="assign_this_coach(<?php echo $g; ?>)" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Select this Coach" data-toggle="modal" data-target="#packageModal">Enrol</a-->
                                    <a href="javascript:void(0);"
                                        onclick="assign_coach('<?php echo $coach_data[$g]->coach_tier; ?>', <?php echo $g; ?>)"
                                        class="btn btn-info" data-placement="bottom" title="Select this Coach">Enrol</a>
                                    <?php } else { ?>
                                    <a href="javascript:void(0);" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="bottom" title="No slots available"
                                        onclick="popularity('<?php echo $coach_data[$g]->profile_url; ?>')">Enrol</a>
                                    <?php }
                                        } else { ?>
                                    <button class="btn btn-info" style="cursor:not-allowed;" data-toggle="tooltip"
                                        data-placement="bottom"
                                        title="You are already enrolled with a coach.">Enrol</button>
                                    <?php } ?>
                                    <!-- <a href="https://wa.me/{{ $coach_data[$g]->coach_whatsapp }}"><img style="width: 50px;" src="images/whatsapp.png" alt="image" data-toggle="tooltip" data-placement="bottom" title="Whatsapp this Coach"></a> -->
                                    <input type="hidden" id="team_name_<?php echo $g; ?>"
                                        value="<?php echo $coach_data[$g]->team; ?>" />
                                    <input type="hidden" id="coach_name_<?php echo $g; ?>"
                                        value="<?php echo $coach_data[$g]->first_name; ?>" />
                                    <input type="hidden" id="coach_det_id_<?php echo $g; ?>"
                                        value="<?php echo $coach_data[$g]->coach_det_id; ?>" />
                                    <input type="hidden" id="coach_pic_<?php echo $g; ?>"
                                        value="<?php echo $coach_data[$g]->img_profile; ?>" />
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

        <style>
            .contact-section {
                background: #112f4b !important;
            }

            .contact-section .contact-info p a {
                color: #fff;
            }

            .contact-head {
                font-weight: 700;
                line-height: 50px;
                color: white;
            }

            .contact-para {
                color: white;
                padding-top: 7px;
                font-size: 22px;
                line-height: 30px;
            }

            .contact-list {
                border-radius: 5px;
                background: rgba(175, 175, 175, 0.1);
                font-size: 16px;
                line-height: 35px;
                color: white;
            }

            .icon-head2 {
                margin-right: 10px;
                padding-top: 10px;
            }

            .contact-form-label {
                font-style: oblique;
                color: white;
            }

            #emailHelp {
                color: white !important;
            }

            .contact-form-input {
                width: 80%;
            }

            .contact-form-phone {
                width: 97% !important;
                padding: 0.375rem 0.75rem;
                border: 1px solid #ced4da;
                border-radius: 0.375rem;
            }
        </style>
        <!-- new contact section -->
        <section class="ftco-section ftco-no-pb text contact-section" id="contact-section">
            <div class="d-flex row flex-col contact-sm">
                <div class="text-center mb-md-3 col-md-12">
                    <h1 class="contact-head">Connect with Us</h1>
                    <h3 class="contact-para">We're happy to help!</h3>
                </div>
                <div class="d-flex mt-3 justify-content-around flex-wrap">
                    <div class="col-md-6 px-5 mt-4 contact-mobile">
                        <h1 class="contact-head col-md-8 contact-head-mob d-none d-md-block">Coaching that is tailored to your lifestyle
                            and goals.</h1>
                        <h4 class="col-md-10 contact-para d-none d-md-block">We are committed to building a healthier
                            you with</h4>
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
                        <h4 class="text-center mt-sm-3" style="color:white !important;">Submit query to learn more about
                            how we can help you with your goals!</h4>
                        <!-- form -->
                        <form id="contact_form" method="POST" action="/sendmail" class="ftco-animate">
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="contact-form-label">Your name</label>
                                <input type="text" class="form-control" id="exampleInputPassword1"
                                    class="contact-form-input" placeholder="Full Name" name="full_name" required />
                            </div>

                            <div class="form-group mt-3 mb-0">
                                <label for="exampleInputEmail1" class="contact-form-label">Your phone number</label>
                            </div>

                            <div class="row mt-1 form-group d-flex flex-column pl-3">
                                <input type="tel" id="txtPhone" class="txtbox contact-form-phone"
                                    style="height:52px !important;" name="contact" required />
                                <small id="emailHelp" class="form-text text-muted mt-2">Don't type country code
                                    here</small>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="contact-form-label">Your email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="email@address.com"
                                    class="contact-form-input" name="email" required />
                                <small id="emailHelp" class="form-text text-muted mt-1">We'll never share your email
                                    with anyone else.</small>
                            </div>

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="contact-form-label">Message</label>
                                <textarea class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Your Message Here" class="contact-form-input" rows="3" name="message"
                                    required></textarea>
                            </div>

                            <div class="row mt-4 mb-5 d-flex justify-content-center">
                                <button type="submit"
                                    class="btn btn-primary btn-lg btn-block mb-2 ml-2 mr-2">Submit</button>
                                <small id="emailHelp" class="form-text text-muted text-center">By proceeding, you agree
                                    to allow LivEzy to contact you</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <style>
            .contact-sm {
                margin-left: 0px !important;
                margin-right: 0px !important;
            }

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
        </style>

        <!-- Plans modal -->
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="packageModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="">
                        <!-- <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5> -->
                        <button type="button" class="close p-3 modal_close2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
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
                                        <span class="subheading" id="plan_coach_name" style="margin: 0;"></span>
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
                                        <span class="price pd-20">
                                            <sup> <?php echo $currency_icon; ?> </sup>
                                            <span class="number-member"><span id="three_months_fixed"></span>/-</span>
                                            <!-- <span class="number-member"><span class="line-through">{{ str_replace('.00', '', moneyFormatIndia($prices['three_months_fixed'])) }}/-</span></span> -->
                                        </span>
                                        <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['three_months_offer'])) }}/-</em> -->
                                        <div class="mem-tax">*Inclusive of all taxes</div>
                                        <a href="javascript:void(0)" class="more-info m-info-test" data-toggle="modal"
                                            data-target="#mem-info" data-id="0"><i class="fas fa-info-circle"
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
                                        <a href="javascript:void(0)" class="more-info" data-toggle="modal"
                                            data-target="#mem-info" data-id="1"><i class="fas fa-info-circle"
                                                style="color:#187FDE;margin-right: 3px;"></i>More
                                            Info</a>
                                        <!--<input type="checkbox" id="test1" />-->
                                        <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-plan="0"data-price="1" data-description="1Rs"></a>
                                    </div>
                                </div>
                                <!-- two -->
                                <div class="own-member-item ftco-animate member-col relative">
                                    <div class="text-center">
                                        <div class="trending_tag">POPULAR</div>
                                        <h2 class="heading">6 Months Coaching</h2>
                                        <span class="price" style="margin-top:20px;">
                                            <sup> <?php echo $currency_icon; ?> </sup>
                                            <span class="number-member"><span id="six_months_fixed"></span>/-</span>
                                            <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['six_months_offer'])) }}/-</em> -->
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
                                        <a href="javascript:void(0)" style="margin-top:20px;" class="more-info"
                                            data-toggle="modal" data-target="#mem-info" data-id="1"><i
                                                class="fas fa-info-circle"
                                                style="color: #187FDE;margin-right: 3px;"></i>More Info</a>
                                        <!--<input type="checkbox" id="test1" />-->
                                        <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                        <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-6mIndPlan"  data-plan="0" data-price="{{ $prices['six_months_offer'] }}" data-description="6 months individual plan"></a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-pid="2" data-plan="0" id="buy_six_months_fixed" data-description="6 months individual plan">Buy Now</a>
                                    </div>
                                </div>
                                <!-- three -->
                                <div class="own-member-item ftco-animate member-col">
                                    <!-- <div class="block-7"> -->
                                    <div class="text-center">
                                        <h2 class="heading">12 Months Coaching</h2>
                                        <span class="price" style="margin-top:20px;">
                                            <sup> <?php echo $currency_icon; ?> </sup>
                                            <span class="number-member"><span id="twelve_months_fixed"></span>/-</span>
                                            <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['twelve_months_offer'])) }}/-</em> -->
                                        </span>
                                        <!--  add this when subscription enabled -->
                                        <!-- <span class="excerpt d-block new_tnc"
                                            data-plan="{{ $prices['twelve_months_plan_id'] }}" data-count="12"
                                            data-price="{{ $prices['twelve_months_offer'] }}"
                                            data-description="12 months individual plan">
                                            <em class="monthly-price rp_sub dark">Monthly billing available <i
                                                    class="far fa-caret-square-right"></i></em>
                                        </span> -->
                                        <div class="mem-tax">*Inclusive of all taxes</div>
                                        <a href="javascript:void(0)" style="margin-top:20px;" class="more-info"
                                            data-toggle="modal" data-target="#mem-info" data-id="2"><i
                                                class="fas fa-info-circle"
                                                style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                                        <!--<input type="checkbox" id="test1" />-->
                                        <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                        <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-12mIndPlan"  data-plan="0" data-price="{{ $prices['twelve_months_offer'] }}" data-description="12 months individual plan"></a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-pid="3" data-plan="0" id="buy_twelve_months_fixed"
                                        data-description="12 months individual plan">Buy Now</a>
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
                                        <span class="price pd-20">
                                            <sup> <?php echo $currency_icon; ?> </sup>
                                            <span class="number-member"><span id="three_months_couple_fixed"></span>/-</span>
                                            <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['three_months_couple_offer'])) }}/-</em> -->
                                        </span>
                                        <div class="mem-tax">*Inclusive of all taxes</div>
                                        <a href="javascript:void(0)" class="more-info" data-toggle="modal"
                                            data-target="#mem-info" data-id="3"><i class="fas fa-info-circle"
                                                style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                                        <!--<input type="checkbox" id="test1" />-->
                                        <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                        <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-3mCouPlan"  data-plan="0" data-price="{{ $prices['three_months_couple_offer'] }}" data-description="3 months buddy package">Buy Now</a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-plan="0" data-pid="4" id="buy_three_months_couple_fixed" data-description="3 months buddy plan">Buy Now</a>
                                    </div>
                                </div>
                                <div class="own-member-item ftco-animate member-col">
                                    <div class="text-center">
                                        <h2 class="heading">6 Months Buddy Coaching</h2>
                                        <span class="price" style="margin-top:20px;">
                                            <sup> <?php echo $currency_icon; ?> </sup>
                                            <span class="number-member"><span id="six_months_couple_fixed"></span>/-</span>
                                            <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['six_months_couple_offer'])) }}/-</em> -->
                                        </span>
                                        <div class="mem-tax">*Inclusive of all taxes</div>
                                        <!--  add this when subscription enabled -->
                                        <!-- <span class="excerpt d-block new_tnc"
                                            data-plan="{{ $prices['six_months_couple_offer_plan_id'] }}" data-count="6"
                                            data-price="{{ $prices['six_months_couple_offer'] }}"
                                            data-description="6 months buddy package">
                                            <em class="monthly-price rp_sub dark">Monthly billing available <i
                                                    class="far fa-caret-square-right"></i></em>
                                        </span> -->
                                        <a href="javascript:void(0)" style="margin-top:20px;" class="more-info"
                                            data-toggle="modal" data-target="#mem-info" data-id="4"><i
                                                class="fas fa-info-circle"
                                                style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                                        <!--<input type="checkbox" id="test1" />-->
                                        <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                        <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-6mCouPlan"  data-plan="0" data-price="{{ $prices['six_months_couple_offer'] }}" data-description="6 months buddy package">Buy Now</a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-pid="5" data-plan="0" id="buy_six_months_couple_fixed"
                                        data-description="6 months buddy plan">Buy Now</a>
                                    </div>
                                </div>
                                <div class="own-member-item ftco-animate member-col">
                                    <div class="text-center">
                                        <h2 class="heading">12 Months Buddy Coaching</h2>
                                        <span class="price" style="margin-top:20px;">
                                            <sup> <?php echo $currency_icon; ?> </sup>
                                            <span class="number-member"><span id="twelve_months_couple_fixed"></span>/-</span>
                                            <!-- <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo $currency_icon; ?></sup>{{ str_replace('.00', '', moneyFormatIndia($prices['twelve_months_couple_offer'])) }}/-</em> -->
                                        </span>
                                        <div class="mem-tax">*Inclusive of all taxes</div>
                                        <!--  add this when subscription enabled -->
                                        <!-- <span class="excerpt d-block new_tnc"
                                            data-plan="{{ $prices['twelve_months_couple_offer_plan_id'] }}"
                                            data-count="12" data-price="{{ $prices['twelve_months_couple_offer'] }}"
                                            data-description="12 months buddy package">
                                            <em class="monthly-price rp_sub dark">Monthly billing available <i
                                                    class="far fa-caret-square-right"></i></em>
                                        </span> -->
                                        <a href="javascript:void(0)" style="margin-top:20px;" class="more-info"
                                            data-toggle="modal" data-target="#mem-info" data-id="7"><i
                                                class="fas fa-info-circle"
                                                style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                                        <!--<input type="checkbox" id="test1" />-->
                                        <!-- <a class="popup-youtube" style="color: #dab33e;" href="http://127.0.0.1:8000/tnc/tnc.pdf">Terms & Conditions</a> -->
                                        <!-- <a href="javascript:void(0)" class="btn btn-primary new_tnc gt-pay-6mCouPlan"  data-plan="0" data-price="{{ $prices['twelve_months_couple_offer'] }}" data-description="12 months buddy package">Buy Now</a> -->
                                        <a href="javascript:void(0)" class="btn btn-primary pay__ is_premium" data-pid="6" data-plan="0" id="buy_twelve_months_couple_fixed" data-description="12 months buddy plan">Buy Now</a>
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
        <div class="modal fade membership-modal modal-child" id="mem-info" tabindex="-1" role="dialog"
            aria-hidden="true" data-backdrop-limit="1" data-modal-parent="#packageModal">
            <div class="modal-dialog mem-info_modal" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal Title</h5>
                        <button type="button" class="close modal_close1" data-dismiss="modal" aria-label="Close"
                            aria-hidden="true">
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
                                    <p>Feel free to contact us at anytime, there's no such question as a dumb question!
                                    </p>
                                    <span class="imp-info">*Please note that all the programmes are non-refundable
                                        therefore if you pay for coaching be 100% sure to commit and put in the
                                        work.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- filter Modal -->
        <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header p-3">
                        <h3><b>Filters</b></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- fliter starts here -->
                    <div class="card px-4 rounded-0">
                        <div class="card-body">
                            <div class="row d-flex flex-row">
                                <div class="mx-3 mt-3">
                                    <h6> <b>Show only available slots</b> </h6>
                                </div>
                                <div class="custom-control custom-switch mt-2 mx-2 pt-1">
                                    <input type="checkbox" class="custom-control-input" id="slotSwitch"
                                        name="slotSwitch">
                                    <label class="custom-control-label" for="slotSwitch"></label>
                                </div>
                            </div>
                            <hr>

                            <!-- <div class="row d-flex mt-3">
                                <div class="mx-2 mt-1">
                                    <h6> <b> Ratings </b></h6>
                                </div>
                                <div class="mt-1">
                                    <input type="range" class="form-range" min="0" max="5" step="0.5"
                                        id="customRange3" style="width:385px;">
                                </div>
                            </div> -->

                            <!-- <div class="row d-flex flex-row ml-5 pl-2">
                                <h6>1+</h6>
                                <span id="boot-icon" class="bi bi-star mr-5 pl-md-4"
                                    style="font-size: 20px; color: rgb(255, 210, 48);"></span>
                                <h6>2+</h6>
                                <span id="boot-icon" class="bi bi-star mr-5 pl-md-4"
                                    style="font-size: 20px; color: rgb(255, 210, 48);"></span>
                                <h6>3+</h6>
                                <span id="boot-icon" class="bi bi-star mr-5 pl-md-4"
                                    style="font-size: 20px; color: rgb(255, 210, 48);"></span>
                                <h6>4+</h6>
                                <span id="boot-icon" class="bi bi-star mr-5 pl-md-4"
                                    style="font-size: 20px; color: rgb(255, 210, 48);"></span>
                                <h6>5+</h6>
                                <span id="boot-icon" class="bi bi-star"
                                    style="font-size: 20px; color: rgb(255, 210, 48);"></span>
                            </div> -->

                            <div class="row d-flex mt-3">
                                <div class="mx-4 mt-1">
                                    <h6> <b> Gender </b></h6>
                                </div>
                                <div class="mt-0">
                                    <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="row d-flex mt-2 ml-2 mb-2">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary mr-3 rounded px-4">
                                        <input type="radio" name="gender" id="g1" autocomplete="off" value="both">Both
                                    </label>
                                    <label class="btn btn-outline-secondary mr-3 rounded px-4">
                                        <input type="radio" name="gender" id="g2" autocomplete="off" value="male">Male
                                    </label>
                                    <label class="btn btn-outline-secondary mr-3 rounded px-4">
                                        <input type="radio" name="gender" id="g3" autocomplete="off"
                                            value="female">Female
                                    </label>
                                </div>
                            </div>
                            <hr>

                            <!-- Tier start here -->

                            <div class="row d-flex">
                                <div class="mx-4 pt-1">
                                    <h6> <b> Tier </b></h6>
                                </div>
                                <div class="mt-0">
                                    <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="row d-flex mt-2 ml-2 mb-2">
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary mr-3 rounded px-4">
                                        <input type="radio" name="tier" id="t1" autocomplete="off"
                                            value="classic">Classic
                                    </label>
                                    <label class="btn btn-outline-secondary mr-3 rounded px-4">
                                        <input type="radio" name="tier" id="t2" autocomplete="off"
                                            value="supreme">Supreme
                                    </label>
                                    <label class="btn btn-outline-secondary mr-3 rounded px-4">
                                        <input type="radio" name="tier" id="t3" autocomplete="off"
                                            value="exclusive">Exclusive
                                    </label>
                                </div>
                            </div>
                            <hr>

                            <div class="row d-flex mb-3 mx-2 mt-4">
                                <div>
                                    <button type="button" id="btn_apply"
                                        class="btn btn-dark px-4 rounded-pill py-2 ">Apply</button>
                                </div>
                                <div>
                                    <button type="button" id="btn_clear"
                                        class="btn btn-light px-4 rounded-pill py-2 ml-2">Clear All</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer-->
        <footer style="background: #000;">
            <div class="bottom-footer">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-md-3">
                            <p>Powered by <a href="http://six30labs.io/"><span class="own-company-logo">Six 30 Labs</span></a>
                            </p>
                        </div> -->
                        <div class="col-md-10 text-center copyrights_info">
                            <p>Copyright &copy;
                                <script>
                                document.write(new Date().getFullYear());
                                </script> | All rights reserved | <a href="/tnc/tnc.pdf" target="_blank"
                                    class="tnc">Terms &amp; Conditions</a> | <a href="/privacy-policy" target="_blank"
                                    class="tnc">Privacy Policy</a>
                        </div>
                        <div class="col-md text-right footer-icon-mob">
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

    </div>

    <style>
        .no-slots {
            position: fixed;
            bottom: 60px;
            left: 0;
            z-index: 998;
            width: 17%;
            margin-left: 15px;
        }

        .vl {
            border-left: 6px solid red;
            height: 75px;
        }
    </style>
    {{-- <div class="" data-toggle="tooltip" title="No slots available" style="display: none;">
        <div class="card vl" style="border-radius: 8px;">
            <div class="card-body d-flex justify-content-start align-items-center">
                <img class="mr-2" src="/images/icons/remove.png" height=36 width=36/>
                <h5 class="mt-2" style="line-height: 1.3; color: rgba(0, 0, 0, 0.9); font-weight: 400;">No slots available</h5>
            </div>
        </div>
    </div> --}}

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
                            <span class="badge" style="color: red">No slots available!</span>
                        </h2>
                        <p class="pt-2 mx-4">Slots are currently unavailable. Please try next week.</p>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: modalCoupon-->


    <!-- <button class="wa-icon">
        <img src="/fitness/images/whatsapp.png" width="250"/>
    </button> -->

    <!-- scroll to top -->
    <!-- <div id="scroll-top" onclick="topFunction()"><i class="fas fa-chevron-up"></i></span></div> -->
    <!-- <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> -->

    <style>
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
    </style>

    <div class="whatsapp-icon-div" data-toggle="tooltip" title="Instant Chat on Whatsapp">
        <div class="whats-app-img">
            <img class="img-whats-app" src="{{asset('fitness/images/whatsapp.png')}}">
        </div>
    </div>

    {{-- <div class="whats-app-div" data-toggle="tooltip" title="Instant Chat on whats app">
        <div class="whats-app-img">
            <div class="card support-card p-3" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                <div class="arrow d-flex justify-content-end mr-2">
                    <span class="clickable close-icon" data-effect="fadeOut"><i
                            class="fa fa-sort-desc fa-lg"></i></span>
                </div>
                <div class="card-body p-4 support-banner">
                    <span>
                        <h4 class="mb-3 text-center">Get in touch with <br/><strong style="color:red;">our experts</strong></h4>
                        <div class="row d-flex justify-content-center">
                            <button type="button" class="btn btn-success px-5"><i
                                    class="fa-brands fa-whatsapp fa-lg"></i> Chat on Whatsapp</button>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- phone script start -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/css/intlTelInput.css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/16.0.8/js/intlTelInput-jquery.min.js"></script>
    <script type="text/javascript">
    $(function() {
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
        $('#btnSubmit').on('click', function() {
            var code = $("#txtPhone").intlTelInput("getSelectedCountryData").dialCode;
            var phoneNumber = $('#txtPhone').val();
            var name = $("#txtPhone").intlTelInput("getSelectedCountryData").name;
            alert('Country Code : ' + code + '\nPhone Number : ' + phoneNumber + '\nCountry Name : ' +
                name);
        });
    });
    </script>

    <!-- phone script ends -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script> -->

    <script src="fitness/js/jquery.min.js"></script>
    <script src="fitness/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="fitness/js/popper.min.js"></script>
    <script src="fitness/js/bootstrap.min.js"></script>
    <script src="fitness/js/jquery.easing.1.3.js"></script>
    <script src="fitness/js/jquery.waypoints.min.js"></script>
    <script src="fitness/js/jquery.stellar.min.js"></script>
    <script src="fitness/js/owl.carousel.min.js"></script>
    <!-- <script src="fitness/js/jquery.magnific-popup.min.js"></script> -->
    <script src="fitness/js/aos.js"></script>
    <script src="fitness/js/jquery.animateNumber.min.js"></script>
    <script src="fitness/js/scrollax.min.js"></script>
    <script src="fitness/js/main.js"></script>
    <script src="fitness/js/filter.js"></script>
    <!-- Custom Js -->
    <script src="fitness/js/custom.js?v"></script>
</body>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        var whatsapp_no = <?php echo config('app.contact_whatsapp'); ?>; //Sales number before purchase

        $('.whatsapp-icon-div').on('click', function() {
            window.open('https://api.whatsapp.com/send/?phone=' + whatsapp_no +
                '&text=Hey%2C%20I%20would%20like%20to%20know%20more%20about%20the%20online%20fitness%20coaching&app_absent=0',
                '_blank')
        });

        $('.is_premium').on('click', function() {
            removeCookie('admin_assigns_coach');
            setCookie('user_assigns_coach', true,  time() + (3600 * 3));
        });

        // $('.whatsapp-icon-div').hide();

        // $('.close-icon').on('click', function() {
        //     $('.support-card').hide();
        //     $('.close-icon').hide();
        //     $('.whatsapp-icon-div').show();
        // });

        //razorpay and localstorage implementation
        $('.pay__').click(function(e) {
            console.log("Inside pay__ class");
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
            localStorage.setItem("user_plan_pay", JSON.stringify(data_pay));
            window.location.href = "/";
            $('#u_login').click();
        });
        $('#u_login').on('click', function() {
            $('.first_login_mod').css('display', 'block');
            $('.second_mod').css('display', 'none');
            $('.password_mod').css('display', 'none');
        });

        $('.modal_close1').on('click', function() {
            $('#mem-info').hide();
            $('.modal').css('overflow-y', 'auto');
            $('body').css('overflow-y', 'hidden');
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

        $('#contactus').on('click', function() {
            window.location.href = "/aboutus#contact-section";
        });

        $('#btn_clear').on('click', function() {
            $('input[name="slotSwitch"]').prop('checked', false);
            $('input[name="gender"]').prop('checked', false);
            $('input[name="tier"]').prop('checked', false);
        });

        $('#btn_apply').on('click', function() {
            console.log('Inside Filter Apply');
            //var slots  = $('input[name="slotSwitch"]:checked').val();
            var gender = $('input[name="gender"]:checked').val();
            var tier = $('input[name="tier"]:checked').val();
            console.log(gender, tier);
            $.ajax({
                url: '/test2',
                type: 'GET',
                data: {
                    "gender": gender,
                    "tier": tier
                },
                success: function(response) {
                    console.log(response);
                }
            });
            //$('#filterModal').modal('hide');
        });

    });

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

    function popularity(profile_url) {
        $('#no-slots').modal('show');
        // setTimeout(function() { $(".no-slots").hide(); }, 5000);
        $.ajax({
            type: 'GET',
            url: '/popularity/' + profile_url,
            data: {
                profile_url
            }
        }).done(function(msg) {
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

        if (tier === 'classic') {
            var prices = <?php echo json_encode(Config::get('prices.classic')) ?>;
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

            var prices = <?php echo json_encode(Config::get('prices.supreme')) ?>;
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
            document.getElementById("buy_three_months_couple_fixed").setAttribute("data-price", prices
                .three_months_couple_fixed);
            document.getElementById("buy_six_months_couple_fixed").setAttribute("data-price", prices
                .six_months_couple_fixed);
            document.getElementById("buy_twelve_months_couple_fixed").setAttribute("data-price", prices
                .twelve_months_couple_fixed);
        } else {
            var prices = <?php echo json_encode(Config::get('prices.exclusive')) ?>;
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

        var team_name = $('#team_name_' + counter).val();
        var coach_name = $('#coach_name_' + counter).val();
        var coach_det_id = $('#coach_det_id_' + counter).val();
        var coach_pic = $('#coach_pic_' + counter).val();
        var img_profile = coach_pic ? coach_pic : 'no-image.jpeg';

        // set the item in localStorage
        localStorage.setItem('team_name', team_name);
        localStorage.setItem('coach_name', coach_name);
        localStorage.setItem('coach_det_id', coach_det_id);
        localStorage.setItem('from_coach_profile', 1);

        $('#coach_image').attr('src', 'coaches/' + img_profile);
        $('#plan_coach_name').html("Coach - " + coach_name);
        $('#plan_tier').html("Tier - " + tier);
        $('#packageModal').modal('show');

    }
</script>

</html>
