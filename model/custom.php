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
