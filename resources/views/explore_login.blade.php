<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Fitness Coaching | Liv Ezy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="At Liv Ezy our 24x7 available online personal trainers provide workout and nutrition plans to smash your goals. Sounds good? Let's get started now!!">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">
    <!-- <link rel="icon" type="image/png" href="fitness/images/png2.png"> -->
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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="fitness/css/custom.css?v9">

    <!-- Success Stories v2 -->
    <link rel="stylesheet" href="fitness/css/succv2.css?v5">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5H6RR6T');</script>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<style>
    .logo-style{
      width: 48px;
      position: absolute;
      left: 36px;
      top: 4px;
    }
    .liv_ezy_text{
        position: absolute;
        font-size: 20px;
        left: 98px;
        top: 20px;
        text-transform: capitalize;
        font-weight:700;
        font-family: sans-serif;
    }
    #location_modal_nav_style{
        position:absolute;
        right:30px;
    }
    @media only screen and (max-width: 768px) {
      #location_modal_nav_style{
          position:unset!important;
          right:unset!important;
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
          width: 25px;
          position: absolute;
          left: 12px;
          top: 6px;
      }
    }
    .ftco-navbar-light.scrolled .navbar-brand span{
        color:#31cdcc;
    }
    .ftco-navbar-light .navbar-nav > .nav-item .nav-link.active{
        color:#31cdcc!important;
    }
    .ftco-navbar-light .navbar-nav > .nav-item > .nav-link{
        font-size:18px;
        font-weight:600;
    }
    .ftco-navbar-light .navbar-nav > .nav-item > .nav-link span:before{
        background:#31cdcc!important;
    }
    .heading-section .subheading{
        font-size:18px;
        font-weight:700;
        color:#31cdcc;
        margin-bottom: 20px;
    }
    .own-service-icon span{
        color:#31cdcc;
    }
    #diet-img{
        margin-top:-20px;
    }
    span.number-member{
        color:#31cdcc;
    }
    .btn.btn-primary{
        background:#31cdcc;
        border:1px solid #31cdcc!important;
    }
    .btn.btn-primary:hover{
        background:#fff;
        border:1px solid #31cdcc!important;
        color:#000!important;
    }
    .membership-modal .modal-header{
        background-color:#31cdcc;
    }
    .own-member-item{
        border-color:#31cdcc;
    }
    #contact_form .contact-info .contact-info-item .ico-wrap{
        color:#31cdcc;

    }
    .location_wrap{
        background:#31cdcc;
    }
    .bottom-footer p{
      float:left;
    }
    .ftco-explore {
        padding: 3em;
    }
  </style>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5H6RR6T"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

  

    <div class="explore-wrap">
        <section class="ftco-section ftco-explore">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        
                        <h2 class="mb-4">RECIPES</h2>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-7 ftco-animate">
                        <form action="?qq">
                            <div class="search-wrap">
                                <div class="search-box-wrap">
                                    <div>
                                        <i class="fas fa-search"></i>
                                        <input autocomplete="off" type="text" name="recipe_search" class="form-control" placeholder="Search for a dish name...">
                                        <ul class="suggestions-list" style="display: none;">

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </form>

                          <div class="radio-btns-wrap">
                            @if(!isset($_GET['q'])&&!isset($_GET['recipe_search']))
                              <div class="radio-btn">
                                  <input type="radio" name="food" value="all" id="f-all" class="filter" checked="checked">
                                  <label for="f-all"><span></span>All</label>
                              </div>

                              <div class="radio-btn">
                                  <input type="radio" name="food" value="veg" id="f-veg" class="filter">
                                  <label for="f-veg"><span></span>Veg</label>
                              </div>

                              <div class="radio-btn">
                                  <input type="radio" name="food" value="nonVeg" id="f-nonVeg" class="filter">
                                  <label for="f-nonVeg"><span></span>Non-Veg</label>
                              </div>
                              @else
                                  <div class="all_recipes">
                                        <a href="https://livezy.com/recipes_login"> <i class="fas fa-chevron-left"></i> All recipes</a>
                                  </div>
                              @endif
                          </div>
                    </div>

                    <div class="col-md-12 rvw-parent">
                        <div class="recipes-video-wrap ftco-animate">
                          <?php
                              $check=[];
                          ?>
                          @if(isset($_GET['recipe_search']))
                            <div class="no-vid-data veg">
                              <div class="img-wrap">
                                <img src="/fitness/images/no-data.png" alt="icon">
                              </div>
                              <span>No recipe videos found!</span>
                            </div>
                          @else
                            @foreach($videos as $video)
                              <?php
                                $check[$video->category]=1;
                              ?>
                              <div class="video-item all @if($video->category==2) nonVeg @else veg @endif" data-toggle="modal" data-target="#recipes-modal" data-link="{{$video->video_url}}" title="{{$video->title}}">
                                  <div class="v-image" style="background-image: url({{$video->thumbnail}});">
                                      <div class="overlay">
                                          <i class="fas fa-play"></i>
                                      </div>
                                  </div>
                                  <h3 title="{{$video->title}}">{{$video->title}}</h3>
                              </div>
                            @endforeach

                            @if(!isset($_GET['q']))
                              <?php if (count($check)): ?>
                                <?php if (!isset($check[2])): ?>
                                  <div class="no-vid-data nonVeg">
                                    <div class="img-wrap">
                                      <img src="/fitness/images/no-data.png" alt="icon">
                                    </div>
                                    <span>No recipe videos found!</span>
                                  </div>
                                <?php elseif(!isset($check[1])): ?>
                                  <div class="no-vid-data veg">
                                    <div class="img-wrap">
                                      <img src="/fitness/images/no-data.png" alt="icon">
                                    </div>
                                    <span>No recipe videos found!</span>
                                  </div>
                                <?php endif; ?>
                              <?php else: ?>
                                <div class="no-vid-data all veg non-veg">
                                    <div class="img-wrap">
                                        <img src="/fitness/images/no-data.png" alt="icon">
                                    </div>
                                    <span>No recipe videos found!</span>
                                </div>
                              <?php endif; ?>
                            @endif
                          @endif

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        
    </div>

    <!-- scroll to top -->
    <div id="scroll-top"><i class="fas fa-chevron-up"></i></span>
    </div>

    <!-- youtube modal - Recipe -->
    <div id="recipes-modal" class="recipe-modal modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
              </button>

              <div class="embed_div embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="border: 0;"></iframe>
              </div>
          </div>
      </div>
    </div>

    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
          <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
          <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#007bff" />
      </svg>
    </div>


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
    <!-- Custom Js -->
    <script src="fitness/js/custom.js?v"></script>
    <script>
        $('body').on('click','.suggestions',function () {
            window.location.href='/recipes_login?q='+$(this).data('id')
        })
    </script>
</body>
