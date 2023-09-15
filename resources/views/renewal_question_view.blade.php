<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
        <title> Liv Ezy - A Community which helps you to achieve your fitness goal</title>
        <link rel="stylesheet" href="fitness/css/profile.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
	<link rel="stylesheet" href="styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <!-- SideBar-Menu CSS -->
    <!-- <link rel="stylesheet" href="login/css/styles.css"> -->

	<!-- Demo CSS -->
	<!-- <link rel="stylesheet" href="login/css/demo.css"> -->
<!--     
    <link rel="stylesheet" href="fitness/css/pricing_css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="fitness/css/pricing_css/table_pricing.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="fitness/css/profile.css" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Saira:wght@200&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/css/intlTelInput.css" rel="stylesheet" type="text/css">
  <link rel="icon" type="image/png" href="fitness/images/png2.png">


    <link rel="stylesheet" href="fitness/css/pagination/jqpaginator.css" type="text/css"/>
    <link rel="stylesheet" href="fitness/css/pagination/styles.css" type="text/css"/>
    <!-- chart css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css" integrity="sha512-C7hOmCgGzihKXzyPU/z4nv97W0d9bv4ALuuEbSf6hm93myico9qa0hv4dODThvCsqQUmKmLcJmlpRmCaApr83g==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.1.9/js/intlTelInput.js"></script>
    <script src="fitness/js/pagination/jqpaginator.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



	<script>
		
	</script>
    <style>
        body{
            background:#fff;
        }
        .ques-all{
            background:#d9f3f3;
        }
        .header-ques{
            background:url('fitness/images/question_banner.png');
            background-size:cover;
            height:218px;
        }
        .all-style{
            /* padding-left:11%; */
            /* padding-right:11%; */
            font-family: sans-serif;
        }
        .title-ques{
            font-size: 1.5em;
            padding-bottom: 40px;
        }
        .heading-quest{
            height: 60px;
            /* width: 80px; 3887fb*/
            background: #000;
            color: #fff;
            font-size: 1.5em;
            width: 355px;
            /* line-height: 54px; */
            border-radius: 8px;
            font-weight: bold;
            padding: 16px;
            box-shadow: 0 3px 6px 0 rgb(0 0 0 / 69%);
            text-align:center;
            margin-top:15px;
        }
        .outer-box-ques{
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            /* box-shadow: 0 3px 6px 0 rgb(0 0 0 / 69%); */
            margin-bottom:20px;
            font-size: 1.5em;
            transition: background-color 200ms cubic-bezier(0.0,0.0,0.2,1);
            background-color: #fff;
            border: 1px solid #dadce0;
            border-radius: 8px;
            margin-bottom: 12px;
            padding: 24px;
            page-break-inside: avoid;
            word-wrap: break-word;

        }
        .ques_desc{
            /* margin-top:-10px; */
            /* margin-top: -10px; */
            font-family: 'Google Sans', Roboto, Helvetica, Arial, sans-serif;
            font-size: 16px;
            font-weight: 500;
            letter-spacing: .1px;
            line-height: 24px;
            color: #202124;
            font-weight: 400!important;
            width: 100%;
            word-break: break-word;
            margin-bottom:20px;
        }
        .in_ques{
            overflow-wrap: break-word;
            /* resize: none; */
            height: 45px;
            border: none;
            border-bottom: 1px solid #000;
            width: -webkit-fill-available;
            margin-top: 28px;
            padding-left: 8px;
            background-color: #fff!important;
            outline: none;
            border: none!important;
            border-bottom: 1px solid #e5e5e5!important;
            line-height: 42px;
        }
        .in_ques:focus{
            outline:none;
        }
        .ques_checkbox{
            bottom: 0;
            height: 20px;
            left: 0;
            right: 0;
            top: 0;
            width: 20px;
        }
        .radio_text{
            
            position: absolute;
            padding-top: 0px;
            padding-left: 8px;
            /* font-size: 0.9em; */
            font-family: 'Google Sans', Roboto, Helvetica, Arial, sans-serif;
            font-size: 14px;
            letter-spacing: .1px;
            line-height: 24px;
            color: #202124;
            font-weight: 400!important;
            /* width: 100%; */
            word-break: break-word;
        }
        sup{
            color:red;
        }
        /* .ques_checkbox:checked:after{
            background-color:red;
        } */
        .ques_checkbox:checked ~ .ques_checkbox::before {
            color: #fff;
            border-color: #7B1FA2;
            background-color: #7B1FA2;
        }
        .ques-all{
            margin-top: 0px!important;
            /* width: 100%!important;*/
            margin-left: 130px!important;
            padding: 30px!important;
            transition: all 0.3s ease;
        }
        .radio_style{
            display:inline-block;
            padding-left:24px;
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
        .responsive-logos{
            height:30px;
        }
        .main_container .container{
            margin-top:-10px;
        }


/* html {
    height: 100%
}

p {
    color: grey
} */

#heading {
    text-transform: uppercase;
    color: #673AB7;
    font-weight: normal
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left;
    /* margin-left:22px;
    margin-right: 22px; */
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    /* margin-bottom: 25px; */
    margin-top: -16px;
    /* width: 100%; */
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #673AB7;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background-color: #fff;
    color:#36cccb;
    font-weight: bold;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background: #36cccb;
    color: white;
    
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #fff;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #36cccb;
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    /* font-family: FontAwesome;
    content: "\f13e"; */
    /* background:url(/insta_img/apple_color.png);
    background-size:cover; */
}
.account_id{
    background-image: url(/insta_img/apple.png);
    /* background-size: contain; */
    width: 50px;
    height: 50px;
    background-color: lightgray;
    margin: 0 auto 10px auto;
    background-position: center center;
    background-size: 18px Auto;
    background-repeat: no-repeat;
    border-radius: 50%;
}
.personal_id{
    background-image: url(/insta_img/running.png);
    /* background-size: contain; */
    width: 50px;
    height: 50px;
    background-color: lightgray;
    margin: 0 auto 10px auto;
    background-position: center center;
    background-size: 18px Auto;
    background-repeat: no-repeat;
    border-radius: 50%;
}
.payment_id{
    background-image: url(/insta_img/cardiogram.png);
    /* background-size: contain; */
    width: 50px;
    height: 50px;
    background-color: lightgray;
    margin: 0 auto 10px auto;
    background-position: center center;
    background-size: 18px Auto;
    background-repeat: no-repeat;
    border-radius: 50%;
}
.confirm_id{
    background-image: url(/insta_img/notebook.png);
    /* background-size: contain; */
    width: 50px;
    height: 50px;
    background-color: lightgray;
    margin: 0 auto 10px auto;
    background-position: center center;
    background-size: 18px Auto;
    background-repeat: no-repeat;
    border-radius: 50%;
}
.active_bck{
    background-color:#60d3d3;
}
.active.personal_id{
    background-color:#60d3d3;
}
.active.payment_id{
    background-color:#60d3d3;
}
.active.confirm_id{
    background-color:#60d3d3;
}
.error_border{
    border: solid 1px red;
}
/* #progressbar #personal:before {
    font-family: FontAwesome;
    content: ""
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: ""
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: ""
} */

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #36cccb
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #36cccb
}

.fit-image {
    /* width: 100%; */
    object-fit: cover;
    height:50px;
}
.header-ques{
            background:url('fitness/images/question_banner.png');
            background-size:cover;
            height:179px;
        }
        .ques-all-new{
            /* background:#d9f3f3; */
            background-image: linear-gradient(
                280deg
                , #d1d4d1, #cdd0cd);
        }
        .main_dashboard{
            background:#fff;
            
        }
        fieldset{
            /* background:#d9f3f3!important; */
            background-image: linear-gradient(
                280deg
                , #d1d4d1, #cdd0cd) !important;
        }
        .question_7{
            display:none;
        }
        .action-button {
            width: 100px;
            background-color: #fff;
            color: #36cccb;
            font-weight: bold;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right;
        }
    </style>
</head>

<body>

    <div class="pop_up_for_all">
        <p class="pop_up_close_btn">X</p>
        <p class="pop_up_heading">Questionarie</p>
        <p class="pop_up_sub_heading"></p>
        <div class="pop_up_body">
            <p class="pop_up_body_text">
                Please fill in the questionnaire if you want to proceed
            </p>
        </div>
        <p class="pop_up_footer"></p>
    </div>
    <div class="container-fluid">
    <div class="row ques-all-new justify-content-center">
        <div class="col-md-10">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <div class="">
                <div class="col-md-12 header-ques">
                    
                </div>
            </div>
            <?php
                    $answer_user=[];
                    $pre_fill=false;
                    if(sizeof($answer)!=0){
                        $answer_user=json_decode($answer[0]->answer,true);
                        $pre_fill=true;
                    }        
            $section=$data[0]->section;
            $c=0;
            for($i=0;$i<sizeof($data);$i++){
                if($i!=0)
                    $section=$data[$i-1]->section;
                $n=$data[$i]->section;
                // print($answer_user[$data[$i]->id]);

               
        ?>
            <?php 
                if($i==0){
                    echo '<fieldset>
                    <div class="form-card">';
                }
                else if($i==10){
                    echo '<fieldset>
                    <div class="form-card">';
                }
                else if($i==20){
                    echo '<fieldset>
                    <div class="form-card">';
                }else if(($i==23 && $gender!='Male') || ($i==22 && $gender=='Male')){
                    echo '<fieldset>
                    <div class="form-card">';
                }

                            ?>
                
                        <div class="row">
                            <div class="col-md-12 all-style question_<?php echo $data[$i]->id;?>">
                            <?php
                                
                                if($section!=$n || $i==0){
                                    $c++;
                                    if($i==10)
                                        $c=2;
                            ?>
                                <div class="heading-quest">
                                    {{$data[$i]->section}}
                                </div>
                            <?php
                                }
                            ?>
                                <div class="outer-box-ques">
                                    <div class="ques-box">
                                       <p class="ques_desc" id="id{{$data[$i]->id}}" data-type="{{$data[$i]->type}}" data-questionRequred="{{$data[$i]->required}}">{{$data[$i]->id.'. '.$data[$i]->question_desc}}<sup>{{$data[$i]->required?'*':''}}</sup></p>
                                    <?php
                                        switch($data[$i]->type){
                                            case 'textarea':
                                    ?>
                                                
                                                    <textarea id="{{$data[$i]->id}}"  data-required="{{$data[$i]->required}}" class="in_ques ques_{{$data[$i]->id.'_'.$data[$i]->required}}" placeholder="Type here">{{$pre_fill?$answer_user[$data[$i]->id]:''}}</textarea>
                                                
                                    <?php
                                            break;
                                            case 'radio':
                                                $opt_value=explode(",",$data[$i]->option);
                                                for($k=0;$k<sizeof($opt_value);$k++){
                                                ?> 
                                                    <p ><input class="ques_checkbox" onclick="handleClick(this);"  value="{{$opt_value[$k]}}" type="radio" name="radio_{{$data[$i]->id}}" {{$pre_fill?$answer_user[$data[$i]->id]==$opt_value[$k]?'checked':'':''}}/> <span class="radio_text">{{$opt_value[$k]}}</span></p>
                                                    
                                                <?php
                                                }
                                            break;
                                            case 'checkbox':
                                                $opt_value=explode(",",$data[$i]->option);
                                                for($k=0;$k<sizeof($opt_value);$k++){
                                                    $checkbox_checked='';
                                                    if($pre_fill && sizeof($answer_user[$data[$i]->id])>0){
                                                        for($p_c=0;$p_c<sizeof($answer_user[$data[$i]->id]);$p_c++){
                                                            if($answer_user[$data[$i]->id][$p_c]==$opt_value[$k])
                                                            $checkbox_checked='checked';

                                                        }
                                                    }
                                                ?> 
                                                    <p><input class="ques_checkbox ques_{{$data[$i]->id.'_'.$data[$i]->required}}"  type="checkbox" value="{{$opt_value[$k]}}" {{$checkbox_checked}} name="checkbox_{{$data[$i]->id}}" /> <span class="radio_text">{{$opt_value[$k]}}</span></p>
                                                    
                                                <?php
                                                }
                                            break;
                                            case 'time':
                                                ?>
                                                <p><input  value="{{$pre_fill?$answer_user[$data[$i]->id]:''}}" id="{{$data[$i]->id}}"  class="ques_checkbox ques_{{$data[$i]->id}}" style="width:fit-content;" type="time" name="time_{{$data[$i]->id}}"/> </span></p>
                                                <?php
                                            break;
                                            default:echo 'extra';
                                    ?>
                                                
                                    <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        //echo 'kumar'.$i;
                        
                        
             
            }
        ?>
        <!-- <button type="button" data-id="'.$i.'" id="question_submit" name="submit" class="action-button" value="Submit"  >Submit</button> -->
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $('.sidebar__inner ul li').on('click',function(){
        $('.pop_up_for_all').css('display','block');
    })
    $('.pop_up_close_btn').on('click',function(){
        $('.pop_up_for_all').css('display','none');
    })
    $(document).ready(function(){
        
        var quest_data=[];
            
        function quest(){
            window.location.href="/";
        }
        $('#question_submit').on('click',function(){
            var total_loop=7;
            var condition=true;
            for(var i=1;i<=total_loop;i++){
                console.log('looping',i);
                console.log($('#id'+i).attr('data-questionRequred'),$('#ques_id'+i).attr('data-type'))
                var data_type=$('#id'+i).attr('data-type');
                var required_ques=$('#id'+i).attr('data-questionRequred');
                // if(parseInt(required_ques)){

                // }
                var id_ques=i;
                var ques_val;
                var each_question={};
                switch(data_type) {
                    case 'textarea':
                        ques_val=$('#'+id_ques).val();
                        break;
                    case 'radio':
                        ques_val=$('input[name="radio_'+id_ques+'"]:checked').val();
                        break;
                    case 'checkbox':
                        var checked_array=[];
                        $('input[name="checkbox_'+id_ques+'"]:checked').each(function() {
                            checked_array.push(this.value)
                        });

                        ques_val=checked_array;
                        break;
                    case 'time':
                        ques_val=$('#'+id_ques).val();
                        break;
                }
                $('.question_'+i+' .outer-box-ques').removeClass('error_border');
                if(parseInt(required_ques)==1){
                    // if(i!=20 || quest_data[20]!='Home Workout'){
                        // console.log('string length',ques_val.length)
                        if(!ques_val){
                            $('.question_'+i+' .outer-box-ques').addClass('error_border');
                            condition=false;
                            toastr.error('Please Fill Required field');
                            return false
                        }
                    // }
                }
                if(i==7){
                    if($('.question_7').css('display')=='block'){
                        console.log('chadnan',ques_val,id_ques)
                        if(ques_val==undefined){
                                $('.question_'+i+' .outer-box-ques').addClass('error_border');
                                condition=false;
                                toastr.error('Please Fill Choose service hour');
                                return false
                            }
                    }
                }
                
               // each_question[id_ques]=ques_val;
               quest_data[id_ques]=ques_val;
                  
            }
            console.log(quest_data);
            if(condition){
                $.ajax({
                    url:'renewal_question_submit',
                    type:'post',
                    data:{"_token": "{{ csrf_token() }}","answer":JSON.stringify(quest_data)},
                    global:true,
                    async:false,
                    success:function(response){
                        setTimeout(
                            function () {
                                quest();
                            },
                            1000
                        );
                    }
                })
            }else{
                //toastr.error('Please Fill Required field');

            }
        })
    

});
function handleClick(myRadio) {
    if(myRadio.value=="No I would like to change my coach")
        $('.question_7').css('display','block');
    if(myRadio.value=="Yes")
        $('.question_7').css('display','none');
}
$("input").prop("disabled", true);
$("textarea").prop("disabled", true);
$("#question_submit").css('display','none');
if('<?php echo $answer_user[6]?>'!="Yes")
    $('.question_7').css('display','block');
// 
</script>
