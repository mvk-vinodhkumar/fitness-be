<!DOCTYPE html>
<html translate="no">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="manifest" href="/manifest.json">

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


    <script src="{{asset('fitness/mobile/assets/vendor/jquery/jquery.min.js')}}"></script>

    <link href="{{asset('fitness/mobile/icon_splash/144x144.png')}}"
        media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="{{asset('fitness/mobile/icon_splash/144x144.png')}}"
        media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="{{asset('fitness/mobile/icon_splash/144x144.png')}}"
        media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)"
        rel="apple-touch-startup-image" />
    <link href="{{asset('fitness/mobile/icon_splash/144x144.png')}}"
        media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)"
        rel="apple-touch-startup-image" />
    <link href="{{asset('fitness/mobile/icon_splash/144x144.png')}}"
        media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="{{asset('fitness/mobile/icon_splash/144x144.png')}}"
        media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)"
        rel="apple-touch-startup-image" />
    <link href="{{asset('fitness/mobile/icon_splash/144x144.png')}}"
        media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="{{asset('fitness/mobile/icon_splash/144x144.png')}}"
        media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="{{asset('fitness/mobile/icon_splash/144x144.png')}}"
        media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />
    <link href="{{asset('fitness/mobile/icon_splash/144x144.png')}}"
        media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)"
        rel="apple-touch-startup-image" />

    <!-- Favicons -->
    <link href="{{asset('fitness/images/png2.png')}}" rel="icon">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('fitness/mobile/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fitness/mobile/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('fitness/mobile/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('fitness/mobile/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('fitness/mobile/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('fitness/css/flaticon.css')}}" rel="stylesheet">
    <link href="{{asset('fitness/css/lucky.css')}}" rel="stylesheet">
    <link href="{{asset('fitness/css/custom.css?v3')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{asset('fitness/mobile/assets/css/style.css')}}" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/jquery.slick/1.4.1/slick.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e2ac9cc532.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script> --}}
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.js"></script> --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.2/sweetalert2.min.css"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('fitness/css/icomoon.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="fitness/css/custom.css?v9">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- script for the modal 14/nov --}}
    {{-- <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> --}}


    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(window).load(function() {
        $(".carousel .item").each(function() {
            var i = $(this).next();
            i.length || (i = $(this).siblings(":first")),
                i.children(":first-child").clone().appendTo($(this));

            for (var n = 0; n < 4; n++)(i = i.next()).length ||
                (i = $(this).siblings(":first")),
                i.children(":first-child").clone().appendTo($(this))
        })
    });
    </script>

</head>


<style>
.profile-heading {
    color: #000;
    padding: 2rem 2rem 0rem 2rem;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
}

/* .profile-heading h4{
        color: #11EBEB;
    } */
a {
    text-decoration: none !important;
}

.bg-grey {
    background-color: #f6f6f6;
}

.profile-details {
    background-color: #fff;
    color: #000;
    padding: 2rem;
    /* display: flex;
        flex-direction: row; */
    width: 56%;
    margin-left: auto;
    margin-right: auto;
}

.profile-qualification,
.profile-certification {
    color: #fff;
    padding: 2rem 0;
    /* display: flex;
        flex-direction: row; */
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}

.profile-question {
    color: #fff;
    padding: 2rem;
    /* display: flex;
        flex-direction: row; */
    width: 56%;
    margin-left: auto;
    margin-right: auto;
}

.card-block {

    width: 26%;
    padding: 10px;
    border-radius: 9px;
}

.card-inner {
    background-color: white;
    padding: 10px;
    border-radius: 9px;
}

.card-block .image {
    width: 100%;
    height: 250px;
}

.card-block img {
    width: 100%;
    border-radius: 9px;
    height: 100%;
}

.float-message {
    position: fixed;
    bottom: 39px;
    right: 36px;
    color: #ffff;
    background: #272727;
    padding: 0rem;
    border-radius: 9px;
    display: block;
    text-decoration: none;
    z-index: 9999;
}

.message-text {
    background-color: green;
}

.float-img {
    height: 80px;
    border-radius: 20px;
    padding-right: 1rem;
}

button[aria-controls="tns1"] {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #404040;
    margin: 10px 5px;
}

.img-size {
    height: 280px;
}

.img-position {
    position: relative;
    top: -75px;
    left: 50px;
    border: 5px solid #fff;
}

@media only screen and (max-width: 640px) {
    .profile-heading {
        width: 100%;
    }

    .profile-details {
        padding: 2rem;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .profile-qualification,
    .profile-certification {
        background-color: #181616;
        color: #fff;
        padding: 2rem;
        /* display: flex;
        flex-direction: row; */
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .profile-question {
        color: #fff;
        padding: 2rem;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
    }

    .profile-question p {
        font-size: 10px;
    }

    .img-size {
        height: 180px;
    }

    .img-position {
        position: relative;
        top: -75px;
        left: 0px;
        border: 5px solid #fff;
    }

    .mob-adjust {
        position: relative;
        top: -2rem;
    }
}
}
</style>

<?php
if (sizeof($coach_profile) > 0) {
    // print_r($coach_profile[0]->is_disabled);
    $img_profile = $coach_profile[0]->img_profile ? $coach_profile[0]->img_profile : 'no-image.jpeg';
    $img_banner  = $coach_profile[0]->img_banner ? $coach_profile[0]->img_banner : 'no_banner.png';
?>

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

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <img src="../coaches/{{$img_banner}}" class="img-fluid img-size" />
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background-color: #EFF7FF">
        <div class="row">
            <div class="col-md-12 text-center">
                {{-- <div class="text-left">
                    <img style="width: 14%;position: absolute;margin-top: 4rem; margin-left: -1rem;"
                        src="/images/profile-logo.png" alt="logo">
                </div> --}}
                <div class="profile-heading">
                    <div class="col-md-4 text-center">
                        <img class="card-img-top rounded-circle img-position" style="width:50%;"
                            src="../coaches/{{$img_profile}}" alt="Card image cap">
                    </div>
                    <div class="col-md-8 text-left mob-adjust">
                        <div class="d-flex">
                            <h4 class="mr-2">{{$coach_profile[0]->first_name}} {{$coach_profile[0]->last_name}}</h4>
                            @if($coach_profile[0]->coach_tier === 'classic')
                            <h5 style="color:white; font-size: 1.25rem;"><span class="badge"
                                    style="background-color:#808000;">Classic</span></h5>
                            @elseif($coach_profile[0]->coach_tier === 'supreme')
                            <h5 style="color:white; font-size: 1.25rem;"><span class="badge"
                                    style="background-color:#C4A484;">Supreme</span></h5>
                            @elseif($coach_profile[0]->coach_tier === 'exclusive')
                            <h5 style="color:white; font-size: 1.25rem;"><span class="badge"
                                    style="background-color:#D03D56;">Exclusive</span></h5>
                            @endif
                        </div>
                        <div>
                            <span class="card-text">{{$coach_profile[0]->designation}}</span><br>
                            <!-- <span class="card-text"><b>Certifications: </b></span>
                            <span class="card-text"><?php echo $coach_profile[0]->cert_short; ?></span> -->
                            <p><b>Focussed Areas:</b> {{$coach_profile[0]->focus_areas}}</p>
                        </div>
                        <div style="align-items: center; display:flex">{{$coach_profile[0]->coach_whatsapp}}
                            <a href="https://wa.me/{{$coach_profile[0]->coach_whatsapp}}"
                                style="padding: 1em 0.5em; border-radius:50%" class="badge badge-round badge-success"
                                target="_blank"><i class="fab fa-whatsapp mx-2 text-white" aria-hidden="true"
                                    style="font-size:24px; color:#fff"></i></a>

                            <a href="{{$coach_profile[0]->instagram}}" style="padding: 1em 0.5em; border-radius:50%;background: #d6249f; background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);" class="badge badge-round mx-2" target="_blank"><i class="fab fa-instagram mx-2 text-white" style="font-size:24px; color:#fff"></i></a>

                            @if($coach_profile[0]->is_disabled == 1)
                                    {{-- <button class="btn btn-primary mx-2 disabled" style="border-radius: 30px;padding: 0.6rem 3rem;cursor:not-allowed;" data-toggle="tooltip" data-placement="bottom" title="You are already enrolled with a coach.">Enrol</button> --}}
                                @if($coach_profile[0]->slots > 0)
                                    <button class="btn btn-primary mx-2" onclick="assign_coach('<?php echo $coach_profile[0]->coach_tier; ?>')" style="border-radius: 30px;padding: 0.6rem 3rem;" data-placement="bottom" title="Select this Coach" data-toggle="modal" data-target="1">Enrol</button>
                                    <!--a href="/testing/<?php echo $coach_profile[0]->profile_url; ?>" onclick="assign_this_coach()" class="btn btn-primary mx-2" data-toggle="tooltip" data-placement="bottom" title="Select this Coach" style="border-radius: 30px;padding: 0.6rem 3rem;">Enrol</a-->
                                @else
                                    <button class="btn btn-primary mx-2" style="border-radius: 30px;padding: 0.6rem 3rem;" data-toggle="tooltip" data-placement="bottom" title="No slots available" onclick="popularity('<?php echo $coach_profile[0]->profile_url ?>')">Enrol</button>
                                @endif
                            @endif
                            <input type="hidden" id="team_name" value="{{$coach_profile[0]->team}}" />
                            <input type="hidden" id="coach_name" value="{{$coach_profile[0]->first_name}}"/>
                            <input type="hidden" id="coach_det_id" value="{{$coach_profile[0]->coach_det_id}}"/>
                            <input type="hidden" id="coach_pic" value="{{$coach_profile[0]->img_profile}}"/>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="container-fluid mt-3 mb-3">
        <div class="row text-center">
            <div class="col-md-12">
                <img style="width: 10%;" src="/images/profile-logo.png" alt="logo">
            </div>
        </div>
    </div> --}}

    <style>
    .subheading {
        font-size: 25px;
        font-weight: 500;
        color: #000000 !important;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <!-- <div class="text-left">
                    <img src="/insta_img/Navbar.png" alt="logo">
                </div> -->
                <div class="profile-details">
                    <div class="d-flex justify-content-around">
                        <div>
                            <h2 class="text-info">{{$coach_profile[0]->experience}}</h2>
                            <p>Years of Experience</p>
                        </div>
                        <div>
                            <h2 class="text-info">{{$coach_profile[0]->clients_trained}}</h2>
                            <p>Clients Trained</p>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <h4 class="subheading">About Coach</h4>
                        <p>{{$coach_profile[0]->about_coach}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
    .profile-qualification {
        background: #0F2942;
    }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0 text-center">
                <div class="profile-qualification">
                    <div class="text-center text-white">
                        <h4 class="subheading" style="color:#fff !important;">Transformations</h4>
                    </div>
                    <div style="width: 70%; margin: auto;">
                        <div class="my-slider">
                            <?php
                            if (sizeof($transformations) > 0) {
                                for ($g = 0; $g < sizeof($transformations); $g++) {
                                    echo $_SERVER['HTTP_HOST'];
                                ?>
                            <div class="card-block">
                                <div class="card-inner">
                                    <div class="my-4  fs-4 text-center text-dark">
                                        <h4 class="font-weight-light">
                                            <?php echo $transformations[$g]->client_name; ?>
                                        </h4>
                                    </div>
                                    <div class="image" style="height: 400px;">
                                        <img src="../coaches/transformations/<?php echo $transformations[$g]->image; ?>"
                                            alt="">
                                    </div>
                                    <div class="my-4 text-center  text-muted">
                                        <small class="font-weight-light">
                                            <?php echo $transformations[$g]->testimonials; ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <?php }
                            } ?>

                        </div>
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
                    <script>
                    var slider = tns({
                        container: '.my-slider',
                        items: 2,
                        slideBy: 'page',
                        autoplay: false,
                        controls: false,
                        autoplayButtonOutput: false,
                        navPosition: 'bottom',
                        mouseDrag: true,
                        responsive: {
                            340: {
                                items: 1
                            },
                            768: {
                                items: 3,
                            }
                        },

                    });
                    </script>
                </div>

            </div>
        </div>
    </div>



    <style>
    .profile-certification {
        background: white;
    }

    button[aria-controls="tns2"] {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #404040;
        margin: 10px 5px;
    }

    /*setting the properties for title*/
    .title {
        color: #1a1a1a;
        text-align: center;
        margin-bottom: 10px;
    }

    /*setting the properties of
        content within the image*/
    .content {
        position: relative;
        /* width: 90%; */
        /* max-width: 400px; */
        margin: auto;
        overflow: hidden;
    }

    /* rgb(0,0,0) indicates black and
            the fourth parameter is the opacity */
    .content .content-overlay {
        /*setting 0.8 to 1 will turn the overlay opaque*/
        background: rgba(0, 0, 0, 0.8);
        position: absolute;
        height: 99%;
        width: 100%;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        opacity: 0;
        /*transition time and effect*/
        -webkit-transition: all 0.4s ease-in-out 0s;
        /*transition time and effect*/
        -moz-transition: all 0.4s ease-in-out 0s;
        /*transition time and effect*/
        transition: all 0.4s ease-in-out 0s;
    }

    /* setting hover properties */
    .content:hover .content-overlay {
        opacity: 1;
    }

    .content-image {
        width: 100%;
    }

    /*setting image properties*/
    img {
        box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .content-details {
        position: absolute;
        text-align: center;
        padding-left: 1em;
        padding-right: 1em;
        width: 100%;
        top: 50%;
        left: 50%;
        opacity: 0;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        /*transition time and effect*/
        -webkit-transition: all 0.3s ease-in-out 0s;
        /*transition time and effect*/
        -moz-transition: all 0.3s ease-in-out 0s;
        /*transition time and effect*/
        transition: all 0.3s ease-in-out 0s;
    }

    .content:hover .content-details {
        top: 50%;
        left: 50%;
        opacity: 1;
    }

    .content-details .content-title {
        color: #fff !important;
        font-weight: 500;
        letter-spacing: 0.15em;
        margin-bottom: 0.5em;
        text-transform: uppercase;
    }

    .content-details p {
        color: #fff;
        font-size: 0.8em;
    }
    </style>

    @if(sizeof($certifications) > 0)
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 p-0 text-center">
                <div class="profile-certification">
                    <div class="text-center" style="font-size:24px; color:#000; font-family: Segoe">
                        <h4 class="subheading mt-3">Certifications</h4>
                    </div>
                    <div style="width: 80%; margin: auto;">
                        <div class="my-slider2">
                            <?php
                            if (sizeof($certifications) > 0) {
                                for ($g = 0; $g < sizeof($certifications); $g++) {
                                    //echo $_SERVER['HTTP_HOST'];
                                ?>
                            <div class="card-block">
                                <div class="card-inner">
                                    <div class="my-4  fs-4 text-center text-dark">
                                        <h4 class="font-weight-light">
                                            <?php echo $certifications[$g]->cert_name; ?>
                                        </h4>
                                    </div>
                                    <div class="image content" style="height:400px;">
                                        <div class="content-overlay"></div>
                                        <img class="content-image"
                                            src="../coaches/certifications/<?php echo $certifications[$g]->cert_image; ?>"
                                            alt="View Certificate">
                                        <a href="../coaches/certifications/<?php echo $certifications[$g]->cert_image; ?>"
                                            target="_blank">
                                            <div class="content-details">
                                                <h6 class="content-title">View Certificate</h6>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php }
                            } ?>
                        </div>
                    </div>

                    <script>
                    var slider = tns({
                        container: '.my-slider2',
                        items: 2,
                        slideBy: 'page',
                        autoplay: true,
                        controls: false,
                        autoplayButtonOutput: false,
                        navPosition: 'bottom',
                        mouseDrag: true,
                        responsive: {
                            340: {
                                items: 1
                            },
                            768: {
                                items: 2,
                            }
                        },

                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- <div class="float-message">
            <a href="https://wa.me/+917022292711" target="_blank"><img src="/images/message-icon.png" alt="icon" class="float-img"></a>
        </div> -->
    {{-- <button class="wa-icon">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/1200px-WhatsApp.svg.png"
            alt="">
    </button> --}}
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
        height: 60px;
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

    .heading-section .subheading {
        font-size: 18px;
        font-weight: 500;
        color: #000000 !important;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .img-whats-app {
        box-shadow: none;
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

    <div class="no-slots" data-toggle="tooltip" title="No slots available" style="display: none;">
        <div class="card vl" style="border-radius: 8px;">
            <div class="card-body d-flex justify-content-start align-items-center">
                <img class="mr-2" src="/images/icons/remove.png" height=36 width=36 />
                <h5 class="mt-2" style="line-height: 1.3; color: rgba(0, 0, 0, 0.9); font-weight: 400;">No slots available</h5>
            </div>
        </div>
    </div>

    <!-- Premium Plans modal -->
    <!-- Modal -->
    <div class="modal bd-example-modal-lg" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
    <div class="modal show membership-modal modal-child" id="mem-info" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop-limit="1" data-modal-parent="#packageModal">
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
                                <p>Feel free to contact us at anytime, there's no such question as a dumb question!</p>
                                <span class="imp-info">*Please note that all the programmes are non-refundable therefore
                                    if you pay for coaching be 100% sure to commit and put in the work.</span>
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
                            </script> | All rights reserved | <a href="/tnc/tnc.pdf" target="_blank" class="tnc">Terms
                                &amp; Conditions</a> | <a href="/privacy-policy" target="_blank" class="tnc">Privacy
                                Policy</a>
                    </div>
                    <div class="col-md text-right">
                        <p>
                            <a href="https://www.instagram.com/livezy.fitness/" target="_blank"><span class="icon-instagram own-inst-icon"></span></a>
                            <a href="https://www.facebook.com/liv.ezyfit/" target="_blank"><span class="icon-facebook own-facebook-icon "></span></a>
                            <a href="https://m.youtube.com/channel/UC2vPcgthvIT9po7RsNEIZbA" target="_blank"><span class="fab fa-youtube own-yt-icon"></span></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php } ?>

    <script type="text/javascript">
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

        // $('.whatsapp-icon-div').hide();

        // $('.close-icon').on('click', function() {
        //     $('.wa-support').hide();
        //     $('.close-icon').hide();
        //     $('.whatsapp-icon-div').show();
        // });

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

        $('.is_premium').on('click', function() {
            removeCookie('admin_assigns_coach');
            setCookie('user_assigns_coach', true, 1);
        });

    });


    // $(window).on('load', function(){
    //     jQuery.noConflict();
    //     alert('Please wait');
    //     jQuery('#packageModal').modal('show');
    // });

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
        $('.no-slots').show();
        setTimeout(function() {
            $(".no-slots").hide();
        }, 5000);
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

    function assign_coach(tier) {

        var team_name = $('#team_name').val();
        var coach_name = $('#coach_name').val();
        var coach_det_id = $('#coach_det_id').val();
        var coach_pic = $('#coach_pic').val();
        var img_profile = coach_pic ? coach_pic : 'no-image.jpeg';

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
        localStorage.setItem("from_coach_profile", 1);


        $('#coach_image').attr('src', '../coaches/' + img_profile);
        $('#plan_coach_name').html("Coach - " + coach_name);
        $('#plan_tier').html("Tier - " + tier);
        $('#packageModal').modal('show');
    }

    function user_coach_assignment() {
        var team_name = $('#team_name').val();
        var coach_name = $('#coach_name').val();
        var coach_det_id = $('#coach_det_id').val();
        swal({
            html: 'Are you sure you want to be assigned to coach "' + coach_name + '"?',
            // title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            showLoaderOnConfirm: true,
            allowOutsideClick: false
        }).then(function() {
            $.ajax({
                type: 'post',
                url: '/user-coach-assignment',
                data: {
                    'team_name': team_name,
                    'coach_name': coach_name,
                    'coach_det_id': coach_det_id
                },
                success: function(data) {
                    if (data) {
                        console.log('From user_coach_assignment')
                        location.reload();
                    } else {
                        toastr.error(
                            'Sorry! we could not assign the coach for you as the slots are already filled. Kindly contact the management'
                            );
                    }
                }
            });
        }).catch(swal.noop)
    }

    function assign_this_coach() {

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

        var user_status = '<?php if (isset($users)) { echo $users->user_status; } ?>';
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
</body>
</html>
