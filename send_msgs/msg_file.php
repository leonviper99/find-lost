<?php

// THIS IS FOR MESSAGE API
// $phonenumber=
// $delivery=

$number = array();
        array_push($number, $mtn);

        $imploded_phone = implode(",", $number);

        $data = array(
            "sender"=>'Rangisha',
            "recipients"=> "$phonenumber",
            "message"=>$delivery,
        );
        $url = "https://www.intouchsms.co.rw/api/sendsms/.json";
        $data = http_build_query($data);
        $username="m.jules";
        $password="muhayimana1";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_USERPWD,$username.":".$password);
        curl_setopt($ch,CURLOPT_POST,true);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
        $result = curl_exec($ch);
        $httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpcode == 200) {
            
        }                    

// END OF API

?>