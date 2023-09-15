<!-- LivEzy Plus Plans Section Start -->

@if($users->admin_assign_coach == 1)

<section class="ftco-section pricing-section m-plan  new_s" id="member-section">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-12 heading-section ftco-animate text-center fadeInUp ftco-animated">
                <div class="section-title">
                    <p class="c-p" id="csb">Choose Your Subscription</p>
                </div>
                <h3 class="position-relative" style="font-size:2.7rem;font-weight:400; margin-top:20px;">LivEzy Plus</h3>
                <h2 class="mb-2 c-p-s">Individual Coaching Plans</h2>
                <p class="plan-brief-info"> We have carefully devised comprehensive plans to help you on your journey to exceptional health &amp; well being. All programmes provide complete workout plans, diets &amp; customer support. We advise you to select the package that is best suited to your lifestyle and is something you can commit to for the best results.</p>
            </div>
        </div>
    </div>

    <div class="container own-member-main-container individual-coaching-plans" style="margin-bottom: 1rem;">
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">3 Months Coaching</h2>
                <span class="price">
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span class="line-through">{{ str_replace('.00','', moneyFormatIndia($prices['three_months_fixed']))}}/-</span></span>
                </span>
                <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>{{ str_replace('.00','', moneyFormatIndia($prices['three_months_offer']))}}/-</em>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info m-info-test" data-toggle="modal" data-target="#mem-info" data-id="0"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus"  data-plan="0" data-pid="1" data-price="{{$prices['three_months_offer']}}" data-description="3 months individual plan">Buy Now</a>
            </div>
        </div>
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated" style="display: none;">
            <div class="text-center">
                <h2 class="heading">1Rs</h2>
                <span class="price">
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member">
                        <span class="line-through">1Rs/-</span>
                    </span>
                    <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>1Rs/-</em>
                </span>
            <div class="mem-tax">*Inclusive of all taxes</div>
            <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="1"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
            <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-plan="0" data-price="1" data-description="1Rs">Buy Now</a>
        </div>
    </div>
    <div class="own-member-item ftco-animate member-col relative fadeInUp ftco-animated">
        <div class="text-center">
            <div class="trending_tag">POPULAR</div>
                <h2 class="heading">6 Months Coaching</h2>
                <span class="price" >
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span class="line-through">{{ str_replace('.00','', moneyFormatIndia($prices['six_months_fixed']))}}/-</span></span>
                </span>
                <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>{{ str_replace('.00','', moneyFormatIndia($prices['six_months_offer']))}}/-</em>
                <span class="excerpt d-block new_tnc" style="color: #fefefe;" data-plan="plan_GnDs3ZhQQ51ZS6" data-count="6" data-price="{{$prices['six_months_offer']}}" data-description="6 months individual plan">
                    <em class="monthly-price rp_sub dark">Monthly billing available <i class="far fa-caret-square-right"></i></em>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="1"><i class="fas fa-info-circle" style="color: #187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-pid="2" data-plan="0" data-price="{{$prices['six_months_offer']}}" data-description="6 months individual plan">Buy Now</a>
            </div>
        </div>
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">12 Months Coaching</h2>
                <span class="price" >
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span class="line-through">{{ str_replace('.00','', moneyFormatIndia($prices['twelve_months_fixed']))}}/-</span></span>
                </span>
                <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>{{ str_replace('.00','', moneyFormatIndia($prices['twelve_months_offer']))}}/-</em>
                <span class="excerpt d-block new_tnc" data-plan="plan_GnDsk223t8Xttr" data-count="12" data-price="{{$prices['twelve_months_offer']}}" data-description="12 months individual plan">
                    <em class="monthly-price rp_sub dark">Monthly billing available <i class="far fa-caret-square-right"></i></em>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="2"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-pid="3" data-plan="0" data-price="{{$prices['twelve_months_offer']}}" data-description="12 months individual plan">Buy Now</a>
            </div>
        </div>
    </div>
    <div class="container" style="text-align: justify;text-align-last: center;">
        <h2 class="mb-2 cp-head c-p-s">Buddy Coaching Plans</h2>
        <p class="plan-brief-info cmp"> Buddy that train together stay together! Let’s put that to the test! Sign up for our exclusive buddy programme &amp; smash those fitness goals with your partner! This will be a great way to stay motivated and to push each other to achieve the best in your fitness journey. All programmes provide comprehensive workout plans, diets &amp; customer support. We advise you to select the package that is best suited to your lifestyle and is something you can commit to for the best results. So grab your gym buddy and sign up!</p>
    </div>
    <div class="container own-member-main-container buddy-coaching-plans" style="margin-bottom: 0;">
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">3 Months Buddy Coaching</h2>
                <span class="price">
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span class="line-through">{{ str_replace('.00','', moneyFormatIndia($prices['three_months_couple_fixed']))}}/-</span></span>
                </span>
                <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>{{ str_replace('.00','', moneyFormatIndia($prices['three_months_couple_offer']))}}/-</em>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="3"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-toggle="modal" data-target="#term_condition" data-plan="0" data-pid="4"  data-price="{{$prices['three_months_couple_offer']}}" data-description="3 months buddy plan">Buy Now</a>
            </div>
        </div>
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">6 Months Buddy Coaching</h2>
                <span class="price" >
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span class="line-through">{{ str_replace('.00','', moneyFormatIndia($prices['six_months_couple_fixed']))}}/-</span></span>
                </span>
                <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>{{ str_replace('.00','', moneyFormatIndia($prices['six_months_couple_offer']))}}/-</em>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <span class="excerpt d-block new_tnc" data-plan="plan_GnDykwafW4gXSS" data-count="6" data-price="{{$prices['six_months_couple_offer']}}" data-description="6 months buddy package">
                    <em class="monthly-price rp_sub dark">Monthly billing available <i class="far fa-caret-square-right"></i></em>
                </span>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="4"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-toggle="modal" data-target="#term_condition" data-pid="5" data-plan="0"  data-price="{{$prices['six_months_couple_offer']}}" data-description="6 months buddy plan">Buy Now</a>
            </div>
        </div>
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">12 Months Buddy Coaching</h2>
                <span class="price" >
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span class="line-through">{{ str_replace('.00','', moneyFormatIndia($prices['twelve_months_couple_fixed']))}}/-</span></span>
                </span>
                <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>{{ str_replace('.00','', moneyFormatIndia($prices['twelve_months_couple_offer']))}}/-</em>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <span class="excerpt d-block new_tnc" data-plan="plan_GnDyNrNvyl8002" data-count="12" data-price="{{$prices['twelve_months_couple_offer']}}" data-description="12 months buddy package">
                    <em class="monthly-price rp_sub dark">Monthly billing available <i class="far fa-caret-square-right"></i></em>
                </span>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="7"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-toggle="modal" data-target="#term_condition" data-pid="6" data-plan="0" data-price="{{$prices['twelve_months_couple_offer']}}" data-description="12 months buddy plan">Buy Now</a>
            </div>
        </div>
    </div>
    <div class="container" style="text-align: justify;text-align-last: center;">
        <h2 class="mb-2 cp-head c-p-s">Live Workout Sessions</h2>
        <p class="plan-brief-info cmp"> All classes are delivered in the comfort of your home using Zoom Video and you can fit one in around your daily schedule. It’s a great way to stay fit and active and an ideal way of getting friends together remotely to have fun in the name of exercise!</p>
        <p class="plan-brief-info cmp">Each session lasts for a total of 60 minutes with warm up and cool down. The workouts include various strength &amp; conditioning, Mobility training, HIIT, Full-body training, dumbbell workout, Abs &amp; cardio, Muscular endurance exercises, Cardio &amp; Yoga. </p>
    </div>
    <div class="container own-member-main-container" style="margin-bottom: 0;">
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">1 Month Live Workout</h2>
                <span class="price pd-20">
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span class="line-through">3,500/-</span></span>
                    <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>{{ str_replace('.00','', moneyFormatIndia($prices['one_months_live_workout_offer']))}}/-</em>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info2" data-id="6"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-toggle="modal" data-target="#term_condition" data-pid="7" data-plan="0" data-price="{{$prices['one_months_live_workout_offer']}}" data-description="1 month live session">Buy Now</a>
            </div>
        </div>
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">3 Months Live Workout</h2>
                <span class="price pd-20">
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span class="line-through">9,000/-</span></span>
                    <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>{{ str_replace('.00','', moneyFormatIndia($prices['three_months_live_workout_offer']))}}/-</em>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info2" data-id="7"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-toggle="modal" data-target="#term_condition" data-pid="8" data-plan="0" data-price="{{$prices['three_months_live_workout_offer']}}" data-description="3 month live session">Buy Now</a>
            </div>
        </div>
    </div>
</section>
@else
{{-- Plus plans for the Existing Premium Users --}}
<section class="ftco-section pricing-section m-plan  new_s" id="member-section">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-12 heading-section ftco-animate text-center fadeInUp ftco-animated">
                <h3 class="position-relative" style="font-size:2.7rem;font-weight:400; margin-top:20px;">LivEzy Plus</h3>
                <h2 class="mb-2 c-p-s">Individual Coaching Plans</h2>
                <p class="plan-brief-info"> We have carefully devised comprehensive plans to help you on your journey to exceptional health &amp; well being. All programmes provide complete workout plans, diets &amp; customer support. We advise you to select the package that is best suited to your lifestyle and is something you can commit to for the best results.</p>
            </div>
        </div>
    </div>

    <div class="container own-member-main-container individual-coaching-plans" style="margin-bottom: 1rem;">
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">3 Months Coaching</h2>
                <span class="price">
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span>{{ str_replace('.00','', moneyFormatIndia(Config::get('prices.three_months_fixed')))}}/-</span></span>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info m-info-test" data-toggle="modal" data-target="#mem-info" data-id="0"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus"  data-plan="0" data-pid="1" data-price="{{Config::get('prices.three_months_fixed')}}" data-description="3 months individual plan">Buy Now</a>
            </div>
        </div>
        <div class="own-member-item ftco-animate member-col relative fadeInUp ftco-animated">
            <div class="text-center">
                <div class="trending_tag">POPULAR</div>
                <h2 class="heading">6 Months Coaching</h2>
                <span class="price" >
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span>{{ str_replace('.00','', moneyFormatIndia(Config::get('prices.six_months_fixed')))}}/-</span></span>
                </span>
                <span class="excerpt d-block new_tnc" style="color: #fefefe;" data-plan="plan_GnDs3ZhQQ51ZS6" data-count="6" data-price="{{$prices['six_months_offer']}}" data-description="6 months individual plan">
                    <em class="monthly-price rp_sub dark">Monthly billing available <i class="far fa-caret-square-right"></i></em>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="1"><i class="fas fa-info-circle" style="color: #187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-pid="2" data-plan="0" data-price="{{Config::get('prices.six_months_fixed')}}" data-description="6 months individual plan">Buy Now</a>
            </div>
        </div>
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">12 Months Coaching</h2>
                <span class="price" >
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span>{{ str_replace('.00','', moneyFormatIndia(Config::get('prices.twelve_months_fixed')))}}/-</span></span>
                </span>
                <span class="excerpt d-block new_tnc" data-plan="plan_GnDsk223t8Xttr" data-count="12" data-price="{{$prices['twelve_months_offer']}}" data-description="12 months individual plan">
                    <em class="monthly-price rp_sub dark">Monthly billing available <i class="far fa-caret-square-right"></i></em>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="2"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-pid="3" data-plan="0" data-price="{{Config::get('prices.twelve_months_fixed')}}" data-description="12 months individual plan">Buy Now</a>
            </div>
        </div>
    </div>
    <div class="container" style="text-align: justify;text-align-last: center;">
        <h2 class="mb-2 cp-head c-p-s">Buddy Coaching Plans</h2>
        <p class="plan-brief-info cmp"> Buddy that train together stay together! Let’s put that to the test! Sign up for our exclusive buddy programme &amp; smash those fitness goals with your partner! This will be a great way to stay motivated and to push each other to achieve the best in your fitness journey. All programmes provide comprehensive workout plans, diets &amp; customer support. We advise you to select the package that is best suited to your lifestyle and is something you can commit to for the best results. So grab your gym buddy and sign up!</p>
    </div>
    <div class="container own-member-main-container buddy-coaching-plans" style="margin-bottom: 0;">
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">3 Months Buddy Coaching</h2>
                <span class="price">
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span>{{ str_replace('.00','', moneyFormatIndia(Config::get('prices.three_months_couple_fixed')))}}/-</span></span>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="3"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-toggle="modal" data-target="#term_condition" data-plan="0" data-pid="4"  data-price="{{Config::get('prices.three_months_couple_fixed')}}" data-description="3 months buddy plan">Buy Now</a>
            </div>
        </div>
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">6 Months Buddy Coaching</h2>
                <span class="price" >
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span>{{ str_replace('.00','', moneyFormatIndia(Config::get('prices.six_months_couple_fixed')))}}/-</span></span>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <span class="excerpt d-block new_tnc" data-plan="plan_GnDykwafW4gXSS" data-count="6" data-price="{{Config::get('prices.six_months_couple_fixed')}}" data-description="6 months buddy package">
                    <em class="monthly-price rp_sub dark">Monthly billing available <i class="far fa-caret-square-right"></i></em>
                </span>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="4"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-toggle="modal" data-target="#term_condition" data-pid="5" data-plan="0"  data-price="{{Config::get('prices.six_months_couple_fixed')}}" data-description="6 months buddy plan">Buy Now</a>
            </div>
        </div>
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">12 Months Buddy Coaching</h2>
                <span class="price" >
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span>{{ str_replace('.00','', moneyFormatIndia(Config::get('prices.twelve_months_couple_fixed')))}}/-</span></span>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <span class="excerpt d-block new_tnc" data-plan="plan_GnDyNrNvyl8002" data-count="12" data-price="{{Config::get('prices.twelve_months_couple_fixed')}}" data-description="12 months buddy package">
                    <em class="monthly-price rp_sub dark">Monthly billing available <i class="far fa-caret-square-right"></i></em>
                </span>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info" data-id="7"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-toggle="modal" data-target="#term_condition" data-pid="6" data-plan="0" data-price="{{Config::get('prices.twelve_months_couple_fixed')}}" data-description="12 months buddy plan">Buy Now</a>
            </div>
        </div>
    </div>
    <div class="container" style="text-align: justify;text-align-last: center;">
        <h2 class="mb-2 cp-head c-p-s">Live Workout Sessions</h2>
        <p class="plan-brief-info cmp"> All classes are delivered in the comfort of your home using Zoom Video and you can fit one in around your daily schedule. It’s a great way to stay fit and active and an ideal way of getting friends together remotely to have fun in the name of exercise!</p>
        <p class="plan-brief-info cmp">Each session lasts for a total of 60 minutes with warm up and cool down. The workouts include various strength &amp; conditioning, Mobility training, HIIT, Full-body training, dumbbell workout, Abs &amp; cardio, Muscular endurance exercises, Cardio &amp; Yoga. </p>
    </div>
    <div class="container own-member-main-container" style="margin-bottom: 0;">
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">1 Month Live Workout</h2>
                <span class="price pd-20">
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span class="line-through">3,500/-</span></span>
                    <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>{{ str_replace('.00','', moneyFormatIndia(Config::get('prices.one_months_live_workout_offer')))}}/-</em>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info2" data-id="6"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-toggle="modal" data-target="#term_condition" data-pid="7" data-plan="0" data-price="{{Config::get('prices.one_months_live_workout_offer')}}" data-description="1 month live session">Buy Now</a>
            </div>
        </div>
        <div class="own-member-item ftco-animate member-col fadeInUp ftco-animated">
            <div class="text-center">
                <h2 class="heading">3 Months Live Workout</h2>
                <span class="price pd-20">
                    <sup> <?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?> </sup>
                    <span class="number-member"><span class="line-through">9,000/-</span></span>
                    <em class="monthly-price spl-price"><sup style="color: #000;"><?php echo isset($_COOKIE['currency_icon'])?$_COOKIE['currency_icon']:'₹'?></sup>{{ str_replace('.00','', moneyFormatIndia(Config::get('prices.three_months_live_workout_offer')))}}/-</em>
                </span>
                <div class="mem-tax">*Inclusive of all taxes</div>
                <a href="javascript:void(0)" class="more-info" data-toggle="modal" data-target="#mem-info2" data-id="7"><i class="fas fa-info-circle" style="color:#187FDE;margin-right: 3px;"></i>More Info</a>
                <a href="javascript:void(0)" class="btn btn-primary pay__ is_plus" data-toggle="modal" data-target="#term_condition" data-pid="8" data-plan="0" data-price="{{Config::get('prices.three_months_live_workout_offer')}}" data-description="3 month live session">Buy Now</a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- LivEzy Plus Plans Section End  -->
