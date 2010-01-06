<?php 
   //Prepares the collected data for showing it to the user.

   include_once('model/details.php');
   include_once('model/custom.php');

   //Merge in data from custom.json:

   //If there were errors this could end up not being an array
   if(is_array($customdata)) 
   foreach($domain as $h=>$d) {
      foreach($d as $i=>$vm) {
         if(isset($vm['name']) && isset($customdata[$vm['name']])) {
            foreach($customdata[$vm['name']] as $key=>$value) {
               $domain[$h][$i][$key] = $value;
            }
         }
      }
   }
?>
