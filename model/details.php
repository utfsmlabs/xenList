<?php
   /*
   * Copyright 2009,2010 Javier Aravena Claramunt.
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

   // Retrieves the Xen information served by XenStatus and decodes it

   include_once('config.php');

   function retrieve_xen_data(&$servers) {
      $rawdata  = array();
      $domain = array();
      foreach($servers as $key => $server) {
         $rawdata[$server] = "";
         $file = fopen("http://$server:8080/details.json", "r");
         if($file == 0) {
             unset($servers[$key]);
             unset($rawdata[$key]);
         } else {
             while(!feof($file))
                 $rawdata[$server] = $rawdata[$server] . fgets($file, 4096);
             fclose($file);
             $domain[$server] = json_decode($rawdata[$server], true);
         }
      }
      return $domain;
   }
   $domain = retrieve_xen_data($servers);
?>
