<?php
function RemoveLogoFromCpanel()
{
	if (file_exists(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon-original.php'))
	{
		chmod(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php',0777);
		chmod(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon-original.php',0777);
		chmod(JPATH_SITE.DS.'administrator'.DS.'templates'.DS.'khepri'.DS.'images'.DS.'header',0777);
		unlink(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php');
		rename(JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon-original.php',JPATH_SITE.DS.'administrator'.DS.'modules'.DS.'mod_quickicon'.DS.'mod_quickicon.php');
		unlink(JPATH_SITE.DS.'administrator'.DS.'templates'.DS.'khepri'.DS.'images'.DS.'header'.DS.'magic-logo.png');
	}
}
RemoveLogoFromCpanel();
?>