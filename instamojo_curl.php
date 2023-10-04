<?php

session_start();
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 
'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE );
curl_setopt( $ch,CURLOPT_HTTPHEADER,
    array("X-Api-Key:test_c6f60279b5307a963ab19acaede",
    "X-Auth-Token:test_c927ff46baaaf11b33abaca7447"));

    $payload= Array(
        'purpose' => 'Payment Request',
        'amount' => '100',
        'phone' => '+918888885959',
        'buyer_name' =>'Karan Lonbaile',
        'email' => 'karan1.indiaactive@gmail.com',
        'redirect_url'=>'http://localhost/wiz_js/view_data.php',
        'send_sms' => true,
        'send_email' => true,
        'allow_repeated_payments' => false
    );

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
    $response=curl_exec($ch);
    curl_close($ch);
    $response=json_decode($response);
  
    $_SESSION['TID']=$response->payment_request->id;

    header('location:'.$response->payment_request->longurl);
    die();
    

?>
