<?php
//readfile("http://ethan:8080");
$rawdata  = array();
$domain = array();
$rawdata['ethan'] = "";
$file = fopen("http://ethan:8080", "r");
while(!feof($file))
$rawdata['ethan'] = $rawdata['ethan'] . fgets($file, 4096);
fclose($file);
$domain['ethan'] = json_decode($rawdata['ethan'], TRUE);

var_dump($domain['ethan']);

?>
