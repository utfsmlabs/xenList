<?php
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
