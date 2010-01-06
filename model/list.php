<?php
   include_once('config.php');

   $rawdata  = array();
   $domain = array();
   foreach($servers as $server) {
      $rawdata[$server] = "";
      $file = fopen("http://$server:8080/list.json", "r");
      while(!feof($file))
      $rawdata[$server] = $rawdata[$server] . fgets($file, 4096);
      fclose($file);
      $domain[$server] = json_decode($rawdata[$server],true);
   }
?>
