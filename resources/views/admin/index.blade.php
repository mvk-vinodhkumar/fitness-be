<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liv Ezy Admin</title>
    <!-- For caching purposes -->
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="fitness/images/png2.png">
    <link rel="manifest" href="manifest.json">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

</head>
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .left_login {
        background-image: url(fitness/images/admin_sign.jpeg);
        background-size: 100% 100%;
        height: 100vh;
        /* background: no-repeat; */
        background-repeat: no-repeat;
    }

    .right_login {
        padding: 40px;
        margin-top: 3%;
        margin-bottom: 3%;
    }

    .sign_title {
        padding-left: 10%;
    }

    .login_box {
        padding: 40px;
        margin-left: 10%;
        margin-right: 10%;
        background: url(https://livezy.com/login/css/background_p.png), linear-gradient(102.65deg, rgba(255, 255, 255, 0.5) 0.46%, rgba(255, 255, 255, 0.5) 100.9%);
        box-shadow: 0px 4px 4px rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(70px);
        /* Note: backdrop-filter has minimal browser support */

        border-radius: 20px;
        margin-top: 30px;
    }

    .first_text {
        padding-bottom: 20px;
        padding-top: 20px;
    }

    .second_text {}

    .input_style {
        background: #FFFFFF;
        box-shadow: -3px -3px 4px rgba(255, 255, 255, 0.25), 3px 3px 10px rgba(164, 164, 164, 0.25);
        border-radius: 30px;
    }

    .i_s {
        border: none;
    }

    .l_t {
        font-weight: 600;
    }

    .sbt_btn {
        background: #226AD9;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 50px;
        color: #fff;
        font-family: Overpass;
        font-style: normal;
        /* font-weight: 800;
        font-size: 30px;
        line-height: 46px; */
    }

    .f_p {
        float: right;
        cursor: pointer;
    }

    .l_t_f {
        color: #226AD9;
    }

    .f_p_btn {
        padding-left: 30%;
        padding-right: 30%;
    }

    .second_f_step {
        display: none;
    }
</style>

<body>

    <!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Link</a></li>
      <li><a href="#">Link</a></li>
    </ul>
    <button class="btn btn-danger navbar-btn">Button</button>
  </div>
</nav> -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6 left_login">
                    <!-- <img class="img-responsive" src="fitness/images/admin_sign.jpeg" /> -->
                </div>
                <div class="col-md-6 right_login">
                    <div class="sign_title">
                        <h3>Welcome to Liv Ezy!</h3>
                    </div>
                    <div class="login_box">
                        <div class="first_text">
                            <lable class="l_t">Email Id</lable>
                        </div>
                        <div class="second_text">
                            <div class="input_style"><input id="email" class="form-control i_s" type="email"
                                    value="" placeholder="Enter Email"/></div>
                        </div>
                        <div class="first_text">
                            <lable class="l_t">Password</lable>
                        </div>
                        <div class="second_text">
                            <div class="input_style"><input id="pass" class="form-control i_s" type="password"
                                    value="" placeholder="Enter Password"/></div>
                        </div>
                        <div class="first_text f_p">
                            <lable class="l_t">Forget Password?</lable>
                        </div>
                        <div class="first_text">
                            <button class="form-control i_s sbt_btn nsd" id="#sbt_btn">Login</lable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="forget_password" role="dialog">
        <div class="modal-dialog modal-sm">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Forget Password?</h4>
                </div>
                <div class="modal-body">
                    <div class="first_f_step">
                        <div class="first_text">
                            <lable class="l_t l_t_f">Mobile Number</lable>
                        </div>
                        <div class="second_text">
                            <div class="input_style"><input class="form-control i_s" autofocus type="number" /></div>
                        </div>
                        <div class="first_text f_p_btn">
                            <button class="form-control i_s sbt_btn" id="f_s1">Submit</lable>
                        </div>
                    </div>
                    <div class="second_f_step">
                        <div class="first_text">
                            <lable class="l_t l_t_f">Enter the otp sent on +918797699791</lable>
                        </div>
                        <div class="second_text">
                            <div class="input_style"><input maxlength="6" class="form-control i_s" autofocus
                                    type="number" /></div>
                        </div>
                        <div class="first_text f_p_btn">
                            <button class="form-control i_s sbt_btn">Submit</lable>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
<script>
    $('.f_p').on('click',function(){
    $('.first_f_step').css('display','block');
    $('.second_f_step').css('display','none');
    $('#forget_password').modal({backdrop: 'static', keyboard: false})

})
$('#f_s1').on('click',function(){
    $('.first_f_step').css('display','none');
    $('.second_f_step').css('display','block');

})
$('.nsd').on('click',function(){
    var email=$('#email').val();
    var password=$('#pass').val();
    if(email.length>6 && password.length>3){
        $.ajax({
            type:'post',
                data:{'_token': '{{ csrf_token() }}','username':email,'pass':password},
                url:'admin_login',
                success:function(data){
                    if(data){
                        window.location.href='/admin-dashboard/paid_members';
                    }else{
                        toastr.error('Invalid Email Id/Password');
                    }
                }
            })
    }else{
        toastr.error('Please Enter Valid E-mail/Password.');
    }
    // if((email=='chandan@livezy.com' || email=='ral@livezy.com') && password=="welcome"){
    //     window.location.href='admin-dashboard';
    // }else{
    //     alert('User does not exsist');
    // }

})
$('#pass,#email').keydown(function (e){

    if(e.keyCode == 13){
        $('.nsd').click();
    }
})
</script>
<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>

</html>
