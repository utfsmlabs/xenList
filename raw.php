<?php include('lib/doctype.php');declare_xml();?>
<!-- Basic view -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
   <head>
      <title>Xen List Raw Data</title>
   </head>
   <body>
      <pre>
<?php
   include('controller/hosts.php');
   include_once('lib/errors.php');

   display_errors();
   print_r($domain);
?>
      </pre>
   </body>
</html>

