<?php
/**
* swmenupro v4.5
* http://swonline.biz
* Copyright 2006 Sean White
**/

defined( '_JEXEC' ) or die( 'Restricted access' );

## Loads load_script function
load_scriptGosu();


/**---------------------------------------------------------------------**/
function load_scriptGosu() {
	$live_site=JURI::base();
   	echo "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/ie5_Packed.js\"></script>\n";
	echo "<script type=\"text/javascript\" src=\"".$live_site."modules/mod_swmenupro/DropDownMenuX_Packed.js\"></script>\n";
	//echo "<script type=\"text/javascript\" src=\"".$mosConfig_live_site."/modules/mod_swmenupro/ie5.js\"></script>\n";
	//echo "<script type=\"text/javascript\" src=\"".$mosConfig_live_site."/modules/mod_swmenupro/DropDownMenuX.js\"></script>\n";

}
//---------------------------------------------------------------------

?>
