<!DOCTYPE html>
<html lang="en">
<head>
  <title>Livezy</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <!-- Load an icon library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/e2ac9cc532.js" crossorigin="anonymous"></script>
</head>
<body>
<style>
.navbar_parent{
    background-color: #e5e5e5;
    border-color: #e5e5e5;
    position: fixed;
    width: 100%;
    z-index: 10;
}
.loggin_div{
    display:flex;
    padding:14px;
}
.common_login{
    padding-right:14px;
    cursor:pointer;
}
.location{
    color:green;
}
.responsive {
    width: auto;
    height: 53px;
    margin-top: -17px;
}
/* Style the video: 100% width and height to cover the entire window */
#myVideo {
  position: absolute;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
  top:52px;
}

/* Add some content at the bottom of the video/page */
.content {
  position: absolute;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 80%;
  padding: 20px;
}

/* Style the button used to pause/play the video */
#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}
.nav-menu:hover{
    background:black;
    color:white;
}
.general-section{
    height:100vh;
    /* width:100vw; */
}
/*contact us */
@import url("https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap");
/* * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
} */

/* Pretty Stuff */
.contact-form-container {
  background: #F4F3F3;
  font-family: "Lato", sans-serif;
}

.contact-us {
  position: relative;
  width: 250px;
  background: #C3E0EC;
  overflow: hidden;
}
.contact-us:before {
  position: absolute;
  content: "";
  bottom: -50px;
  left: -100px;
  height: 250px;
  width: 400px;
  background: #F8B7D8;
  transform: rotate(25deg);
}
.contact-us:after {
  position: absolute;
  content: "";
  bottom: -80px;
  right: -100px;
  height: 270px;
  width: 400px;
  background: #9ED8EB;
  transform: rotate(-25deg);
}

.contact-header {
  color: white;
  position: absolute;
  transform: rotate(-90deg);
  top: 120px;
  left: -40px;
}
.contact-header h1 {
  font-size: 1.5rem;
}

.social-bar {
  position: absolute;
  bottom: 20px;
  left: 75px;
  z-index: 1;
  width: 100px;
}
.social-bar ul {
  list-style-type: none;
}
.social-bar ul li {
  display: inline-block;
  color: white;
  width: 25px;
  height: 25px;
  line-height: 25px;
  text-align: center;
  margin-right: -4px;
  font-size: 1.2rem;
}

.header {
  text-align: center;
  padding: 20px 0;
  color: #444;
}
.header h1 {
  font-weight: normal;
}
.header h2 {
  margin-top: 10px;
  font-weight: 300;
}

.address, .email, .phone {
  text-align: center;
  padding: 20px 0;
  color: #444;
}
.address h3, .email h3, .phone h3 {
  font-size: 1rem;
  font-weight: 300;
}
.address i, .email i, .phone i {
  color: #F8B7D8;
  font-size: 1.7rem;
  margin-bottom: 20px;
}

form {
  position: relative;
  width: 440px;
  margin: 0 auto;
  padding: 20px;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  background: white;
}
form input, form textarea {
  background: white;
  display: block;
  margin: 20px auto;
  width: 100%;
  border: 0;
}
form input {
  height: 40px;
  line-height: 40px;
  outline: 0;
  border-bottom: 1px solid rgba(68, 68, 68, 0.3);
  font-size: 1rem;
  color: rgba(68, 68, 68, 0.8);
}
form textarea {
  border-bottom: 1px solid rgba(68, 68, 68, 0.3);
  resize: none;
  outline: none;
  font-size: 1rem;
  font-family: lato;
  color: rgba(68, 68, 68, 0.8);
}
form button {
  position: absolute;
  display: block;
  height: 40px;
  width: 250px;
  left: 95px;
  border: 0;
  border-radius: 20px;
  bottom: -20px;
  background: #9ED8EB;
  color: white;
  font-size: 1.1rem;
  font-weight: 300;
  outline: none;
}

.contact-form {
  padding-bottom: 40px;
}

/* Layout Stuff */

.contact-form-container {
  width: 800px;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  grid-template-rows: 0.5fr 0.5fr 2fr;
  grid-template-areas: "contact-us header header header" "contact-us address phone email" "contact-us contact-form contact-form contact-form";
  position: absolute;
  margin-top: 14%;
  margin-left: 10%;
}

.contact-us {
  grid-area: contact-us;
}

.header {
  grid-area: header;
}

.address {
  grid-area: address;
}

.phone {
  grid-area: phone;
}

.email {
  grid-area: email;
}

.contact-form {
  grid-area: contact-form;
}
.calendly-custom{
    display:none;
    min-height: 600px;
    height: 600px;
    overflow: auto;
    margin-top: 26%;
}
.calendly-badge-widget {
    position: absolute!important;
    right: 36%!important;
    bottom: -69%!important;
    z-index: 9998!important;
}
</style>
<nav class="navbar navbar-inverse navbar_parent">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img class="img-responsive responsive" src="fitness/images/Livezy-logos.jpeg"></a>
            </div>
        </div>
        <div class="col-md-6">
            <ul class="nav navbar-nav">
                <li class="nav-menu active"><a href="#"><i class="fa fa-fw fa-home"></i> Home</a></li>
                <!-- <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="#">Page 1-1</a></li>
                    <li><a href="#">Page 1-2</a></li>
                    <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li> -->
                <li class="nav-menu"><a href="#"><i class="fa fa-fw fa-server"></i> Services</a></li>
                <li class="nav-menu"><a href="#"><i class="fa fa-fw fa-users"></i> Testimonials</a></li>
                <li class="nav-menu"><a href="#"><i class="fa fa-fw fa-money"></i> Membership</a></li>
                <li class="nav-menu"><a href="#"><i class="fa fa-fw fa-cutlery"></i> Recipes</a></li>
                <li class="nav-menu"><a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a></li>
                <li class="nav-menu"><a href="#"><i class="fa fa-fw fa-rss"></i> Blog</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <ul class="nav navbar-nav navbar-right">
                <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
                <li>
                    <div class="loggin_div">
                        <div class="logged-out common_login">
                        <span class="location">●</span>Bangalore
                        </div>
                        <div class="logged-out common_login">
                            <img src="https://static.cure.fit/assets/images/user-image.svg">
                        </div>
                        <div class="login-text common_login">Login</div>
                    </div>
                    
                </li>
            </ul>
        </div>
    </div>
    
    
    
  </div>
</nav>
  
<div class="container">
  <!-- <h3>Right Aligned Navbar</h3>
  <p>The .navbar-right class is used to right-align navigation bar buttons.</p> -->
  <div class="general-section home">
    <!-- The video -->
    <video autoplay muted loop id="myVideo">
        <source src="https://www.w3schools.com/howto/rain.mp4" type="video/mp4">
    </video>

    <!-- Optional: some overlay text to describe the video -->
    <div class="content">
    <h1>Start Your <b>Fitness</b> Journey Today!</h1>
    <p>Reach your fitness resolutions with the finest Personal coaching</p>
    <!-- Use a button to pause/play the video with JavaScript -->
    <button id="myBtn" onclick="myFunction2()">Join With Us</button>
    </div>
  </div>
  <div class="general-section contact">
    <div class="contact-form-container static-form">
        <div class="contact-us">
            <div class="contact-header">
            <h1>
                &#9135;&#9135;&#9135;&#9135;&nbsp;&nbsp;CONTACT US
            </h1>
            </div>
            <div class="social-bar">
            <ul>
                <li>
                <i class="fab fa-facebook-f"></i>
                </li>
                <li>
                <i class="fab fa-twitter"></i>
                </li>
                <li>
                <i class="fab fa-instagram"></i>
                </li>
                <li>
                <i class="fab fa-dribbble"></i>
                </li>
            </ul>
            </div>
        </div>
        <div class="header">
            <h1>
            Let's Get Started
            </h1>
            <h2>
            Contact us to start your fitness goal! 
            </h2>
        </div>
        <div class="address">
        
            <i class="fas fa-phone-alt"></i>
            <h3>
            +91 8797 699 791
            </h3>
        
        </div>
        
        <div class="email">
            <i class="fas fa-envelope"></i>
            <h3>
            support@ralfitness.com
            </h3>
        </div>
        <div class="contact-form">
            <!-- Calendly badge widget begin -->
<!-- Calendly badge widget begin -->
<link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
<script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript"></script>
<script type="text/javascript">Calendly.initBadgeWidget({ url: 'https://calendly.com/admin-3018/15min?hide_event_type_details=1&hide_gdpr_banner=1', text: 'Tap here to schedule a call with us!', color: '#00a2ff', textColor: '#ffffff', branding: false });</script>
<!-- Calendly badge widget end -->
<!-- Calendly badge widget end -->
        </div>
        
    </div>
    <!-- <div class="calendly-custom">
            <div class="calendly-inline-widget" data-url="https://calendly.com/admin-3018/15min?hide_event_type_details=1" style="min-width:320px;height:630px;"></div>
            <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script>
    </div> -->
    <!-- Calendly inline widget begin -->
    <!-- <div class="calendly-inline-widget" data-url="https://calendly.com/admin-3018/15min?hide_event_type_details=1" style="min-width:320px;height:630px;"></div>
    <script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js"></script> -->
    <!-- Calendly inline widget end -->
  </div>
</div>
<script>
    // Get the video
    var video = document.getElementById("myVideo");

    // Get the button
    var btn = document.getElementById("myBtn");

    // Pause and play the video, and change the button text
    function myFunction() {
    if (video.paused) {
        video.play();
        btn.innerHTML = "Pause";
    } else {
        video.pause();
        btn.innerHTML = "Play";
    }
    }
    $('#contact_button').on('click',function(){
        if($('#name').val().length>3 && $('#mob').val().length>9){
            $('.calendly-custom').css('display','block')
            $('.static-form').css('display','none')
        }
            
    })
</script>
</body>
</html>
