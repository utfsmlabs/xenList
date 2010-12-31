=======
XenList
=======
---------------------------
Xen Virtual Machine Locator
---------------------------

XenList, in combination with XenStatus, attemps to answer the question of
'Where in the world did I migrate my machines to?' It does so by asking
each registered host for the list of machines it's running, and then making
a nice table of them.

Setup
=====

1. Install XenStatus in the Xen Host machines
2. Copy the config.example.php file as config.php, and list the Xen Hosts in it

You can also edit custom.json to override or add fields in the details of
each virtual machine.

Precautions
===========

This is intended to be used internally by the admin. It doesn't use any
form of cache in order to always display the correct current status. If you
intend to make it public, do so only through a caching proxy, as each 
refresh of the page triggers request on the xen servers.
