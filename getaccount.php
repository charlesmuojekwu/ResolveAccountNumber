<?php

/// PAYSTACK SECRET KEY
$key='';

// GET BANK CODE
 $bank=$_GET['bankCode']; 

// GET ACCOUNT NUMBER
 $accnum=$_GET['accNum'];


  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/bank/resolve?account_number=$accnum&bank_code=$bank",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer $key",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);
  
  curl_close($curl);
  
// DECODE JSON RESPONSE 
$obj = json_decode($response);


  // return account name if status is TRUE
  if($obj-> status==true){
        echo $obj-> data->account_name;
    }else{
        echo 'failed';
    }
  

?>
