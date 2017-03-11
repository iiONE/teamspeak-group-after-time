<?php

$config = array(); //Creates Config Array
$config["Username"] = "Query Login"; //Query Login 
$config["Password"] = "querypassword"; //Query Password 
$config["IP"] = "213.202.206.203"; //Server IP/Domain
$config["Port"] = "10150"; //Server Port
$config["qPort"] = "10011"; // Query Port, Default 10011
$config["Nickname"] = rawurlencode("Bot".rand(1,99)); // Convertes Botname to a URI friendly Format

?>
