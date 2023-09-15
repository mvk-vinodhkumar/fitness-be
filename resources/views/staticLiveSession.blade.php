<!DOCTYPE html>
<html lang="en">
<head>
  <title>Liv Ezy Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="fitness/images/png2.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://calendly.com/assets/external/widget.css" rel="stylesheet">
					<!-- <div class="calendly-inline-widget" data-url="" style="min-width:320px;height:470px;"></div> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://calendly.com/assets/external/widget.js"></script>

  <style>
    .create_box_live{
        box-shadow: 0px 1px 4px rgb(0 0 0 / 25%);
        border-radius: 10px;
        text-align: -webkit-center;
        /* margin:32px; */
        margin-bottom:20px;
        /* margin-top:20px; */
        cursor:pointer;
    }
    .create_box_live:hover{
        background: aliceblue;
    }
    .active_create{
        background: aliceblue;
    }
    .img-create-text{
        /* margin-bottom:14px; */
        margin-bottom: 20px;
        font-weight: 500;
        margin-top: 10px;
        
    }
    .img-create{
        display:inline-block;
        margin:10px;
    }
    .new_img{
        height:80px;
    }
    .full_img{
        /* height:100vh; */
    }
    .new_s{
        /* display:inline-block; */
        margin-top:10%;
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
        top: 30px;
        z-index: 9;
        left: 70px;
        cursor: pointer;
    }
    .h_t{
        font-size: 1em;
        text-align: center;
        font-weight: 800;
        margin-bottom: 24px;
        line-height: 18px;
    }
    .m_3{
        margin-top:30px;
        margin-bottom:30px
    }
    .p_d_30{
        padding-right: 42px;
        padding-left: 30px;
    }
    .full_img{
        margin-left:60px;
    }
    
@media screen and (max-width: 600px) and (min-width: 300px) {
    .full_img{
        margin-left:unset;
    }
    
    .p_d_30 {
        padding-right: 42px;
        padding-left: 43px;
    }
    .h_t{
        margin-top: -2px;
        padding-bottom: 17px;
        line-height: unset;
    }
}
  </style>
</head>
<div class="overlay">
<!--  -->
</div>
<div class="container-fluid m_3">

    <div class="row">
        <div class="col-md-6">
            <img src="fitness/images/statice_live_sess.png" class="img-responsive full_img">
        </div>

        <div class="col-md-6 p_d_30">
            <div class="row new_s ">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 create_box_live" onclick="zoom_start('calendly.com/liv-ezy/live-workout-sessions')">
                    <div class="img-create">
                        <img src="fitness/images/SNC.png" class="img-responsive new_img" />
                    </div>
                    <div class="img-create">
                        <img src="fitness/images/HIIT.png" class="img-responsive new_img" />
                    </div>
                <h2 class="h_t">Click here to book your HIIT & SNC sessions</h2>
<!--                    
                    <div class="img-create-text">
                        SNC
                    </div> -->
                </div>
                <div class="col-md-3 ">
                    
                </div>

            </div>
            <div class="row new_s ">
                <div class="col-md-3">
                </div>
                <div class="col-md-6 create_box_live" onclick="zoom_start('calendly.com/livezy/yoga_and_dance_fitness')">
                    <div class="img-create">
                        <img src="fitness/images/Dance.png" class="img-responsive new_img" />
                    </div>
                    <div class="img-create">
                        <img src="fitness/images/Yoga.png" class="img-responsive new_img" />
                    </div>
                    <h2 class="h_t">Click here to book your Dance & Yoga sessions</h2>

                </div>
                
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$('.create_box_live').on('click',function(e){
    if($('.create_box_live').hasClass('active_create')){
        $('.create_box_live').removeClass('active_create')
        $(this).addClass('active_create')
    }else{
        $(this).addClass('active_create')
    }
})
function zoom_start(zoom_link){
    var r=`<div class="overlay_close" >X</div><div class="iframe-container" >
        <iframe allow="microphone; camera" style="border: 0; height: 100vh; left: 0; position: relative; top: -30px; width: 100%;" src="https://${zoom_link}" frameborder="0"></iframe>
    </div>`;
    $('.overlay').html(r);
    $(".overlay").fadeToggle(200);
    $('.overlay_close').on('click', function(){
        $(".overlay").html(' ');
        $(".overlay").fadeToggle(200);   
        $(".button a").toggleClass('btn-open').toggleClass('btn-close');
        open = false;
    });
}
</script>