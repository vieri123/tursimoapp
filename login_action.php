<?php
session_start();

$url = "https://script.google.com/macros/s/AKfycbxLw5pwSU05zn-m3S2KhD0MfIpAp0U3ddkg4SImCRmOzFn5hKW_il5vtJOGQfrP_Tmi/exec";
$postData = [
   "action" => "login",
   "email" => $_POST['email'],
   "password" => $_POST['password']
];

$ch = curl_init($url);
curl_setopt_array($ch, [
   CURLOPT_FOLLOWLOCATION => true,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_POSTFIELDS => $postData
]);

$result = curl_exec($ch);
$result = json_decode($result, 1);

if($result['status'] == "success"){
   $_SESSION['user'] = $result['data'];
   header("location: https://dl.orangedox.com/WiN4OsFDX2SWw6inVD");
}else{
   $_SESSION['error'] = $result['message'];
   header("location: https://dl.orangedox.com/WiN4OsFDX2SWw6inVD");
}

