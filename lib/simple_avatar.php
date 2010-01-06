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

   //Simple avatar lib. It searches for an image with the name provided.
   //Fallbacks to use identicon.

   function avatar_url($name, $size='64')
   {
      //size is only used in the fallback
      $extensions = array('png', 'gif', 'bmp', 'jpg');
      foreach($extensions as $ext) {
         if(file_exists("avatar/$name.$ext"))
         return htmlentities("avatar/$name.$ext");
      }
      $hash = hash('md4', $name); //We use md4 for speed
      return htmlentities("lib/identicon.php?hash=$hash&size=$size");
   }

   function avatar($name, $size='64') 
   {
      print('<img src="' . avatar_url($name, $size) . 
      '" alt="' . $name . '" class="avatar"/>');
   }
?>
