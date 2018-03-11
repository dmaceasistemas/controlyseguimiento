<?php
/**
* swmenupro v5
* http://swonline.biz
* Copyright 2006 Sean White
**/

defined( '_JEXEC' ) or die( 'Restricted access' );

## Loads load_script function
load_scriptSlideClick();


/**---------------------------------------------------------------------**/
function load_scriptSlideClick() {
$live_site=JURI::base();	
	echo '<script type="text/javascript" src="'.$live_site.'/modules/mod_swmenupro/prototype.lite.js"></script>';
echo '<script type="text/javascript" src="'.$live_site.'/modules/mod_swmenupro/moo.fx.js"></script>';
echo '<script type="text/javascript" src="'.$live_site.'/modules/mod_swmenupro/moo.fx.pack.js"></script>';
}
//---------------------------------------------------------------------

?>
