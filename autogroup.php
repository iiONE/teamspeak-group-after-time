<?php
require_once("lib/TeamSpeak3/TeamSpeak3.php");
require_once("config/config.php");

require_once("../config/config.php");

//goes into config later
date_default_timezone_set($config['timezone']);

//current time
$the_time = date('Y-m-d h:i a');


//Super cool print_r function for better display in browser
function print_r2($val){
        echo '<pre>';
        print_r($val);
        echo  '</pre>';
}
//setup connection
$ts3 = TeamSpeak3::factory("serverquery://" . $config["Username"] . ":" . $config["Password"] . "@" . $config["IP"] . ":" . $config["qPort"] . "/?server_port=" . $config["Port"] . "&nickname=" . $config["Nickname"] . "");

// query clientlist from virtual server
$arr_clientList = $ts3->clientList();

// walk through list of clients
foreach($arr_clientList as $client)
{
	if($client["client_type"] == 1) continue;
	echo $client . " is using " . $client["client_platform"] . "<br />\n";


//fetch first connection of specified client ^ 
$client_created = date('Y-m-d h:i a',$client->client_created);

echo $the_time.' now </br></br>';
echo $client_created . ' client created <br><br>';

$to_time = strtotime($the_time);
$from_time = strtotime($client_created);
echo 'First connect ' . round(abs($to_time - $from_time) / 86400,2). ' days ago';
echo '<br><br><br>';
}

/*
//Only gives difference in 24 hours
//math
$datetime1 = new DateTime($the_time);
$datetime2 = new DateTime($client_created);
$interval = $datetime1->diff($datetime2);
$hours=$interval->format('%h');
$minutes= $interval->format('%i');

echo $minutes . "<br>";
echo $hours;
*/
print_r2($client);
?>
