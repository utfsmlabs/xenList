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

   //Prepares the collected data for showing it to the user.

   include_once('model/details.php');
   include_once('model/custom.php');

   //Merge in data from custom.json:

   //If there were errors this could end up not being an array
   if(is_array($customdata)) 
   foreach($domain as &$d) {
      foreach($d as &$vm) {
         if(isset($vm['name']) && isset($customdata[$vm['name']])) {
            foreach($customdata[$vm['name']] as $key=>$value) {
               $vm[$key] = $value;
            }
         }
      }
   }
?>
