<?php

$ch = curl_init();

$url = "https://$key:$secret@api.razorpay.com/v1/subscriptions";

$plan_id=$_GET['plan_id'];
$total_count=$_GET['count'];

$start_at=time()+3600;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_POSTFIELDS, "plan_id=$plan_id&start_at=$start_at&total_count=$total_count&customer_notify=1");
$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$curlresponse = curl_exec($ch); // execute

if (curl_errno($ch))
   echo 'curl error : ' . curl_error($ch);
if (empty($ret)) {
   curl_close($ch); // close cURL handler
    echo print_r($ch);
} else {
    $info = curl_getinfo($ch);
    curl_close($ch); // close cURL handler
    $v = json_decode($curlresponse, 1)['id'];
//    echo $curlresponse;
    echo $v;
}
?>
