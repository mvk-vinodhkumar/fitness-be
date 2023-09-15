<head>
    <title>Online Fitness Coaching | Liv Ezy</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="At Liv Ezy our 24x7 available online personal trainers provide workout and nutrition plans to smash your goals. Sounds good? Let's get started now!!">
    <!-- Google Site verification -->
    <meta name="google-site-verification" content="23gvUaHIsa741iK9nyX7i_-03qHJ6por0F3D6-zAN48" />
    <link rel="icon" type="image/png" href="fitness/images/png2.png">
    
    <!-- Google Search Console -->

    <meta name="google-site-verification" content="rZNkol9a0Oai00VUXktATdYl38HtkSPtSqY66WonOZ0" />
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5H6RR6T');</script>
    <link rel="stylesheet" href="fitness/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  

    
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
        color:white;
    }
    .body-back{
        background-image:url(fitness/images/trek.jpg);
        background-size: cover;
        background-position: center;
        height:99.9vh;
        width:99.9vw;
        position:absolute;
    }
    .pay_btn{
        position: relative;
        width: 150px;
        height: 58px;
        background: #007bff;
        color: white;
        outline: none;
        /* left: 364px; */
        top: 14px;
        margin-bottom: 10px;
        float: right;
        border-radius:12px;
    }
    .pop-up-custom{
        position: absolute;
        color: #fff;
        top: 100;
        left: 170;
        border: 1px solid #5252526e;
        padding: 10px;
        border-radius: 6px;
        background: #0e0b0b5e;
        box-shadow: 0 0 12px 6px #0e0b0b5e;
    }
    @media screen and (max-width: 600px) and (min-width: 300px) {
        .pop-up-custom{
            left:unset;
        }   
    }
</style>
<body>


    <div class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container body-back">
            <a class="navbar-brand" href="/">
                <img class="own-navbar-img logo-style" src="fitness/images/png4.png" alt="Liv Ezy Logo">
                <span class="liv_ezy_text">Liv Ezy</span>

            </a>
        </div>
        <div class="pop-up-custom">
            <h1>Let's Trek Together</h1>
            <h3>Location - Makalidurga, Bangalore.</h3>
            <h3>Date - 14th March 2021.</h3>
            <h3>Trek Starting Time - 6AM. </h3>
            <h3>Reporting time - 4AM (Boarding location will be specified one week before the trek)</h3>
            <h3>We can't wait to take you on this awesome adventure!</h3>
            <button class="form-control pay_btn">Pay Now</button>
        </div>
        
    </div>
    <script>
        $('.pay_btn').on('click',function(){
            $.ajax({
                type: 'GET',
                global:true,
                async:false,
                url: '/ajax/generateOrder?inr='+parseFloat(500)*parseFloat(100),
                success: function (data) {
                var amount=parseFloat(50000)/parseFloat(100);
                var options = {
                //  "key": "rzp_test_W5E4Uziwm4qWf1",
                    "key": "rzp_live_YnNSnlZuMEUjHb",
                    "order_id": data.data.id,
                    "name": "RAL Fitness",
                    "currency":'<?php echo strtoupper($currency); ?>',
                    "description": 'Liv Ezy Trek',
                    "image": "fitness/images/logo.png",
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
                                url: '/sendInvoice?plan_id='+response1.data,
                                success: function (data1) {
                                },
                            });
                        }
                    });
                    },
                    "theme": {
                    "color": "#0062cc"
                    }
                };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                },
            });
        })
    </script>

</body>
