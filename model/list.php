<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$servers = array('ethan', 'locke', 'ben', 'faraday', 'desmond');

$rawdata  = array();
$domain = array();
foreach($servers as $server) {
	$rawdata[$server] = "";
	$file = fopen("http://$server:8080/list.json", "r");
	while(!feof($file))
		$rawdata[$server] = $rawdata[$server] . fgets($file, 4096);
	fclose($file);
	$domain[$server] = json_decode($rawdata[$server]);
}

print_r($domain);
?>
