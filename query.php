<?php
 
$ip = $_GET["ipport"];
//$queryport = $_GET["port"];



$socket = @fsockopen("udp://".$ip, $queryport , $errno, $errstr, 1);

stream_set_timeout($socket, 1);
stream_set_blocking($socket, TRUE);
fwrite($socket, "\xFF\xFF\xFF\xFF\x54Source Engine Query\x00");
$response = fread($socket, 4096);
@fclose($socket);

$packet = explode("\x00", substr($response, 6), 5);
$server = array();
$inner = $packet[4];
$servername = $packet[0];
$mapname = $packet[1];
$players = ord(substr($inner, 2, 1));
$maxplayers = ord(substr($inner, 3, 1));
$total = round($total, 2);
			die('"name":"'.$servername.'",  "map name":"'.$mapname.'",  "current players":"'.$players.'",  "max players":"'.$maxplayers.'"');

var_dump( $server );

?>