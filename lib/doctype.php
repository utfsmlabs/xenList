<?php
   // Avoids servers that interpret "<?" as php tags 

   function declare_xml($version="1.0", $encoding="UTF-8") 
   {
      print('<?xml version="' . $version . '" encoding="' . $encoding .'"?>');
   }
?>
