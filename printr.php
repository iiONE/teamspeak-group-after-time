<?php
require_once("lib/TeamSpeak3/TeamSpeak3.php");
require_once("config/config.php");

//goes into config later
date_default_timezone_set('Europe/Berlin');

//current time
$the_time = date('Y-m-d h:i a');
echo $the_time." </br></br>";

//Super cool print_r function for better display in browser
function print_r2($val){
        echo '<pre>';
        print_r($val);
        echo  '</pre>';
}
//setup connection
$ts3 = TeamSpeak3::factory("serverquery://" . $config["Username"] . ":" . $config["Password"] . "@" . $config["IP"] . ":" . $config["qPort"] . "/?server_port=" . $config["Port"] . "&nickname=" . $config["Nickname"] . "");

//Specify Client using UID, will be automatic later on
$client = $ts3->clientGetByUid("GV1o/OG88OpRoTwTq4HOA3BCEic=");

//fetch first connection of specified client ^ 
$client_created = date('Y-m-d h:i a',$client->client_created);
echo $client_created . "<br>";

//math
$datetime1 = new DateTime($the_time);
$datetime2 = new DateTime($client_created);
$interval = $datetime1->diff($datetime2);
$hours=$interval->format('%h');
$minutes= $interval->format('%i');

echo $minutes . "<br>";
echo $hours;

print_r2($client);
?>
