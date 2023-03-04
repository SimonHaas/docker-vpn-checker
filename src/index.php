<?php


if ($_SERVER['REQUEST_URI'] === '/index.php/IP') {
    echo getIP();
    die();
}

if (str_starts_with($_SERVER['REQUEST_URI'], '/index.php/check')) {
    $IP_FROM_PEER = getIPFromPeer($_GET['peer']);
    $MY_IP = getIP();

    if ($MY_IP && $IP_FROM_PEER && $MY_IP !== $IP_FROM_PEER) {
        echo 'safe';
    } else {
        echo 'risky';
    }
    die();
}

function getIP()
{
    $curl_session = curl_init();
    curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($curl_session, CURLOPT_URL, 'ifconfig.me/all.json');
    $result = curl_exec($curl_session );
    curl_close($curl_session );

    return json_decode($result)->{'ip_addr'};
}

function getIPFromPeer(string $peer)
{
    $curl_session = curl_init();
    curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($curl_session, CURLOPT_URL, $peer);
    $result = curl_exec($curl_session );
    curl_close($curl_session );

    return $result;
}
