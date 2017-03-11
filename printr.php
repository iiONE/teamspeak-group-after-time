<?php
require_once("lib/TeamSpeak3/TeamSpeak3.php");
require_once("config/config.php");
date_default_timezone_set('Europe/Berlin');
$the_time = date('Y-m-d h:i a');
echo $the_time." </br></br>";

function print_r2($val){
        echo '<pre>';
        print_r($val);
        echo  '</pre>';
}

$ts3 = TeamSpeak3::factory("serverquery://" . $config["Username"] . ":" . $config["Password"] . "@" . $config["IP"] . ":" . $config["qPort"] . "/?server_port=" . $config["Port"] . "&nickname=" . $config["Nickname"] . "");

$client = $ts3->clientGetByUid("GV1o/OG88OpRoTwTq4HOA3BCEic=");

$client_created = date('Y-m-d h:i a',$client->client_created);
echo $client_created . "<br>";

$datetime1 = new DateTime($the_time);
$datetime2 = new DateTime($client_created);
$interval = $datetime1->diff($datetime2);
$hours=$interval->format('%h');
$minutes= $interval->format('%i');

echo $minutes . "<br>";
echo $hours;

/*
echo $now . "now<br>";
echo $created . "created<br>";

$diff = $now - $created;

$time = date('Y-m-d h:i:s', $diff);

echo $time;
*/
print_r2($client);
?>