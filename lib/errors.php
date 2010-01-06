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

   /*
    * Handles displaying errors to the user (for cases like hosts not 
    * responding and the like). Always include using include_once if you 
    * don't want to clear the errors array
    */
   $ERRORS = array();

   function error($message)
   {
      global $ERRORS;
      $ERRORS[] = $message;
   }

   function display_errors()
   {
      global $ERRORS;
      foreach($ERRORS as $error) {
         print('<p class="error">' . $error . '</p>');
      }
   }
?>
