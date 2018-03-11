<?php
/**
* swmenupro v4.5
* http://swonline.biz
* Copyright 2006 Sean White
**/

defined( '_JEXEC' ) or die( 'Restricted access' );

## Loads load_script function
load_scriptClick();


/**---------------------------------------------------------------------**/
function load_scriptClick() {
$live_site=JURI::base();
	echo "<script type=\"text/javascript\" src=\"".$live_site."modules/mod_swmenupro/ClickShowHideMenu_Packed.js\"></script>";
	//echo "<script type=\"text/javascript\" src=\"".$mosConfig_live_site."/modules/mod_swmenupro/ClickShowHideMenu.js\"></script>";

}
//---------------------------------------------------------------------

?>
