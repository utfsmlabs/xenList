<?php
   // Retrieves the Xen information served by XenStatus and decodes it

   include_once('config.php');

   function retrieve_xen_data($servers) {
      $rawdata  = array();
      $domain = array();
      foreach($servers as $server) {
         $rawdata[$server] = "";
         $file = fopen("http://$server:8080/details.json", "r");
         while(!feof($file))
         $rawdata[$server] = $rawdata[$server] . fgets($file, 4096);
         fclose($file);
         $domain[$server] = json_decode($rawdata[$server], true);
      }
      return $domain;
   }
   $domain = retrieve_xen_data($servers);
?>
