<?php
if(defined('_dmConfig')) {
return true;
} else { 
define('_dmConfig',1); 

class dmConfig
{
// Last Edit: jue, 2009-nov-12 23:21
// Edited by: admin_tatianach
var $author_can = '2';
var $days_for_new = '29';
var $default_editor = '-6';
var $default_order = 'name';
var $default_order2 = 'ASC';
var $default_reader = '0';
var $default_viewer = '-1';
var $display_license = '0';
var $dmpath = '/home/webmaste/public_html/dmdocuments';
var $docman_version = '1.4.0 RC3';
var $editor_assign = '2';
var $emailgroups = '0';
var $extensions = 'zip|rar|pdf|txt|doc|ppt';
var $fname_blank = '0';
var $fname_lc = '0';
var $fname_reject = 'index.htm|index.html|index.php';
var $hide_remote = '1';
var $hot = '100';
var $icon_size = '1';
var $icon_theme = 'default';
var $individual_perm = '1';
var $isDown = '0';
var $log = '1';
var $maintainer = '1';
var $maxAllowed = '5242880';
var $methods = array (
  0 => 'http',
  1 => 'link',
  2 => 'transfer',
);
var $overwrite = '0';
var $perpage = '8';
var $process_bots = '0';
var $reader_assign = '3';
var $registered = '2';
var $security_allowed_hosts = 'localhost';
var $security_anti_leech = '0';
var $specialcompat = '0';
var $trimwhitespace = '1';
var $user_all = '0';
var $user_approve = '-3';
var $user_publish = '-3';
var $user_upload = '0';
var $viewtypes = 'html|htm|pdf|doc|txt|jpg|jpeg|gif|png';
}
}