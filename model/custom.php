<?php
   //Reads and decodes the file custom.json, located in the installation root.

   include_once('lib/errors.php');

   function parse_custom_json($file = 'custom.json') {
      if(file_exists($file)) {
         $f = fopen($file,'r');
         $rawdata = "";
         while(!feof($f))
         $rawdata = $rawdata . fgets($f, 4096);
         fclose($f);
         $customdata = json_decode($rawdata, true);
         if($customdata == null)
         error("Couldn't understand custom.json. maybe the file is malformed?");
         return $customdata;
      }
      else {
         error("Couldn't find custom.json");
         return null;
      }
   }
   $customdata = parse_custom_json();
?>
