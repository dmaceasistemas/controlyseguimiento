<?php
/**
* swmenupro v4.5
* http://swonline.biz
* Copyright 2006 Sean White
**/

defined( '_JEXEC' ) or die( 'Restricted access' );

## Loads load_script function
load_scriptTree();


/**---------------------------------------------------------------------**/

function load_scriptTree() {
$live_site=JURI::base();
	echo "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenupro/dtree_Packed.js\"></script>";
	//echo "<script type=\"text/javascript\" src=\"".$mosConfig_live_site."/modules/mod_swmenupro/dtree.js\"></script>";
}
//---------------------------------------------------------------------

?>
