<?php

$curl_session = curl_init(); 
curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true); 

curl_setopt($curl_session ,CURLOPT_URL,"ifconfig.me/all.json");
$resultNonvpn = curl_exec($curl_session );

curl_setopt($curl_session, CURLOPT_URL, "https://vpnchecker-vpn.simon-haas.eu/");
$resultVpn = curl_exec($curl_session );

curl_close($curl_session );

$nonvpnIP = json_decode($resultNonvpn)->{'ip_addr'};
$vpnIP = json_decode($resultVpn)->{'ip_addr'};

// $vpnIP = "79.221.63.15";

if ($nonvpnIP && $vpnIP && $nonvpnIP === $vpnIP) {
    echo 'risky';
} else {
    echo 'safe';
}
