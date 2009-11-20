<?php

   /*
    * Copyright 2009 Javier Aravena Claramunt.
    *
    * This file is part of XenList.
    *
    * XenList is free software: you can redistribute it and/or modify
    * it under the terms of the GNU General Public License as published by
    * the Free Software Foundation, either version 3 of the License, or
    * (at your option) any later version.
    *
    * XenList is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU General Public License for more details.
    *
    * You should have received a copy of the GNU General Public License
    * along with XenList.  If not, see <http://www.gnu.org/licenses/>.
    */

   $servers = array('ethan', 'locke');
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


?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
   <head>
      <title>Xen List</title>
   </head>
   <body>
      <pre>
         <?php print_r($domain); ?>
      </pre>
   </body>
</html>
