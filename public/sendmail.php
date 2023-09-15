<?php
$msg = "Following are the details from Website Contact Form\n";


// the message
$msg = $msg. "Full Name: ".$_POST['full_name'] ."\n";
$msg = $msg. "Email: ".$_POST['email']."\n";
$msg = $msg. "Contact : ".$_POST['contact']."\n";
$msg = $msg. "Message : ".$_POST['message']."\n";
$headers = 'From:'.$_POST['email'];
mail('support@livezy.com',"Contact Form details from Website",$msg,$headers);
// echo $main;

echo "Email Sent : \n";
echo "Thankyou for contacting us, we will get back you soon \n";

?>
<a href="/">Go back</a>
