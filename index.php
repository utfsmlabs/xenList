<?php 
   //for measuring the time in generate the page
   $starttime = explode(' ', microtime());
   $starttime = $starttime[1] + $starttime[0];
   include('lib/doctype.php');          //Avoids nasty php setting
   include('controller/hosts.php');     //Data controller
   include_once('lib/errors.php');      //Allow us to display errors
   include('lib/simple_avatar.php');    //Let us show images besides the server names.
   declare_xml();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" >
   <head>
      <title>Xen List</title>
      <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/combo?2.8.0r4/build/reset-fonts/reset-fonts.css"/>
      <link rel="stylesheet" type="text/css" href="style/index.css"/>
   </head>
   <body>
      <div id="page-head">
         <h1>Xen List</h1>
         <p class="subtitle">List of Xen Domains in the cluster</p>
      </div>
      <?php
         display_errors();
      ?>
      <table id="domU-table">
         <tr>
            <?php foreach($domain as $dom0=>$domUs):?>
            <th><?php print($dom0);?></th>
            <?php endforeach;?>
         </tr>
         <tr>
            <?php foreach($domain as $dom0=>$domUs):?>
            <td>
               <ul>
                  <?php foreach($domUs as $domU):?>
                  <li class="domu domu-<?php print($domU['name']);?>">
                  <div class="domu-header">
                     <?php 
                        if($domU['name']!='Domain-0')
                        avatar($domU['name']);
                        else
                        avatar($dom0);
                     ?>
                     <h2><?php 
                           if(isset($domU['uri']))
                           print('<a href="' . htmlentities($domU['uri']) . 
                              '" title ="' . $domU['name'] .
                              '">' . $domU['name'] . '</a>');
                           else
                           print(htmlentities($domU['name']));
                        ?></h2>
                     <p class="status"><?php 
                        print($domU['state'] . ' ' . $domU['memory']);
                     ?> MiB</p>
                  </div>
                  <dl class="moreinfo">
                     <?php foreach($domU as $key => $value):?>
                     <dt><?php print(htmlentities($key));?></dt>
                     <dd><?php print(htmlentities($value));?></dd>
                     <?php endforeach;?>
                  </dl>
                  <a href="#" title="Show more details" class="showmoreinfo">more...</a>
                  </li>
                  <?php endforeach;?>
               </ul>
            </td>
         <?php endforeach;?>
         </tr>
      </table>
      <div id="footer">
         <p>
         <?php
            $mtime = explode(' ', microtime());
            $totaltime = $mtime[0] + $mtime[1] - $starttime;
            printf('Page loaded in %.3f seconds.', $totaltime);
         ?>
         </p>
         <p>
         This page has been brought to you by 
         <a href="http://bitbucket.org/Phrodo_00/xenlist/" title="XenList">XenList</a>
         and <a href="http://bitbucket.org/Phrodo_00/xenstatus/" title="XenStatus">
            XenStatus.</a>
         </p>
      </div>
   </body>
</html>

