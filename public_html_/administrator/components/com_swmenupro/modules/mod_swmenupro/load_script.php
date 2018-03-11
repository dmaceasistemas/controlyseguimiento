<?php
/**
* swmenupro v4.5
* http://swonline.biz
* Copyright 2006 Sean White
**/

defined( '_JEXEC' ) or die( 'Restricted access' );

## Loads load_script function
load_script();


/**---------------------------------------------------------------------**/

function load_script() {

$live_site=JURI::base();

echo "<script type = \"text/javaScript\" src=\"".$live_site."/modules/mod_swmenupro/menu_Packed.js\"></script>";
//echo "<script type = \"text/javaScript\" src=\"".$mosConfig_live_site."/modules/mod_swmenupro/menu.js\"></script>";

}
//---------------------------------------------------------------------

?>
