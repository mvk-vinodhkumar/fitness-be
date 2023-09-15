

                                <div class="container-fluid our-coaches d-flex justify-content-center">
                                    <div class="recipe_f" style="font-size: 1.2rem;">Our Coaches</div>
                                </div>

                                <style>
                                    /* Dropdown Button */
                                    .dropbtn {
                                        background-color: #ffc107;
                                        color: #534006;
                                        padding: 16px 35px;
                                        font-size: 16px;
                                        border: none;
                                        cursor: pointer;
                                        font-weight: 600;
                                        /* border-radius: 10px; */
                                    }
                                    /* Dropdown button on hover & focus */
                                    .dropbtn:hover, .dropbtn:focus {
                                        background-color: #ffd75d;
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
                                    #myInput:focus {outline: 3px solid #ffc107;}

                                    /* The container <div> - needed to position the dropdown content */
                                    .dropdown {
                                        position: relative;
                                        display: inline-block;
                                    }
                                    /* Dropdown Content (Hidden by Default) */
                                    .dropdown-content {
                                        display: none;
                                        position: relative; /*absolute*/
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
                                    .dropdown-content a:hover {background-color: #f1f1f1}

                                    /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
                                    .show {display:block;}
                                    .card {
                                        border-radius: 2rem !important;
                                        border: 1px solid #ccc !important;
                                    }
                                    .btn-info {
                                        color: #fff;
                                        background-color: #187FDE;
                                        border-color: #187FDE;
                                    }

                                    .btn-info:hover, .btn-info:focus, .btn-info:active {
                                        color: #fff !important;
                                        background-color: #000 !important;
                                        border-color: #000 !important;
                                    }
                                    .btn:focus, .btn.focus {
                                        outline: 0;
                                        -webkit-box-shadow: none !important;
                                        box-shadow: none !important;
                                    }
                                    .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active, .show > .btn-primary.dropdown-toggle {
                                        color: #fff;
                                        background-color: #31cdcc !important;
                                        border-color: 1px solid #31cdcc !important;
                                    }
                                    .card-body {
                                        font-size: 0.9rem;
                                    }
                                    .card-body h5 {
                                        font-size: 1rem;
                                        font-weight: 700 !important;
                                    }
                                </style>

                                <div class="row justify-content-center">
                                    <div class="col-md-8 text-center heading-section ftco-animate" style="margin: 0 0 40px 0;">
                                        <div class="position-relative col-lg-6 m-auto">
                                            <input type="text" placeholder="Search here..." id="inputSearch">
                                            <i class="fas fa-search icon-search"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="coach_card" style="margin:6px;">
                                    <div class="row d-flex justify-content-around">

                                        <?php
                                        if (sizeof($coach_data) > 0) {
                                            for ($g = 0; $g < sizeof($coach_data); $g++) {
                                                // echo '<pre>'; print_r($coach_data[$g]);
                                                $img_profile = $coach_data[$g]->img_profile ? $coach_data[$g]->img_profile : 'no-image.jpeg';
                                        ?>
                                        <div class="coachBox" style="margin-bottom: 2rem;" id="coach_div_<?php echo $coach_data[$g]->id; ?>">
                                            <a href="/profile/{{$coach_data[$g]->profile_url}}" style="color: #444444;" target="_blank">
                                                <div class="card">
                                                    <img class="card-img-top rounded-circle" style="padding: 3rem;"
                                                    src="coaches/{{$img_profile}}" alt="Card image cap" data-toggle="tooltip" data-placement="bottom" title="View Coach Profile">
                                                    <div class="card-body text-center" style="padding: 1rem ;margin-top: -3rem;">
                                                        <h5 class="card-title" style="font-weight:500">{{$coach_data[$g]->first_name}} {{$coach_data[$g]->last_name}}</h5>
                                                        <span class="card-text">Certifications</span> <br>
                                                        <span class="card-text">{{$coach_data[$g]->cert_short}}</span> <br>
                                                        <span class="card-text text-muted" style="font-weight: 600">{{$coach_data[$g]->slots}} - slots available</span><br> <br>

                                                        @if(Session::get('email'))
                                                            <a href="/profile/{{$coach_data[$g]->profile_url}}" class="btn btn-primary" style="font-weight:normal;padding: 0.4rem 1.5rem;border-radius: 30px;" data-toggle="tooltip" data-placement="bottom" title="View Details">View</a>
                                                        @else
                                                            <a href="/profile/{{$coach_data[$g]->profile_url}}" class="btn btn-primary" style="font-weight:normal;padding: 0.4rem 1.5rem;border-radius: 30px;" data-toggle="tooltip" data-placement="bottom" title="View Details" target="_blank">View</a>
                                                        @endif

                                                        @if($coach_data[$g]->slots > 0)
                                                        <a href="javascript:void(0);" onclick="user_coach_assignment({{$g}})" class="btn btn-info" style="font-weight:normal;padding: 0.4rem 1.5rem;border-radius: 30px;margin-left: 0.5rem;line-height: 1.5;" data-toggle="tooltip" data-placement="bottom" title="Select this Coach">Enrol</a>
                                                        @else
                                                        <a href="javascript:void(0);" class="btn btn-info" style="font-weight:normal;padding: 0.4rem 1.5rem;border-radius: 30px;border: 1px solid #7bb2e5;background-color: #7bb2e5;margin-left: 0.5rem;line-height: 1.5;" data-toggle="tooltip" data-placement="bottom" title="No slots available">Enrol</a>
                                                        @endif
                                                        <!-- <a href="https://wa.me/{{$coach_data[$g]->coach_whatsapp}}"><img style="width: 50px;" src="images/whatsapp.png" alt="image" data-toggle="tooltip" data-placement="bottom" title="Whatsapp this Coach"></a> -->
                                                        <input type="hidden" id="team_name_{{$g}}" value="{{$coach_data[$g]->team}}" />
                                                        <input type="hidden" id="coach_name_{{$g}}"  value="{{$coach_data[$g]->first_name}}" />
                                                        <input type="hidden" id="coach_det_id_{{$g}}"  value="{{$coach_data[$g]->coach_det_id}}" />
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




                                @if($users->user_status === 1 || $users->user_status === 11 )
