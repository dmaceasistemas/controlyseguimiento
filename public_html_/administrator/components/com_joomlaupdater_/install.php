<?php
function AddLogoToCpanel()
{
	if (!file_exists(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon-original.php'))
	{
		chmod(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon',0777);
		chmod(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php',0777);
		chmod(JPATH_SITE.DS.'administrator'.DS.'templates'.DS.'khepri'.DS.'images'.DS.'header',0777);
		rename(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php',JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon-original.php');
		copy(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_joomlaupdater'.DS.'core'.DS.'mod_quickicon.php',JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php');
		copy(JPATH_SITE.DS.'administrator'.DS.'components'.DS.'com_joomlaupdater'.DS.'core'.DS.'magic-logo.png',JPATH_SITE.DS.'administrator'.DS.'templates'.DS.'khepri'.DS.'images'.DS.'header'.DS.'magic-logo.png');
	}
}
AddLogoToCpanel();
?>