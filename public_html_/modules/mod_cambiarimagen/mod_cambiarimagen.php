<?php
	 // no direct access
	 defined( '_VALID_MOS' ) or die( 'Restricted access' );
	 
	 $cid = intval( mosGetParam( $_REQUEST, 'Itemid', null ) );
	 $default_image = 'images/' . $params->get( 'imagen_default', '' );
	 $imagen = 'images/header_related_' . $cid . '.jpg';
	 
	 if (file_exists($imagen))
		 echo '<a href="index.html" target="_self"><img src="' . $mosConfig_live_site . '/' . $imagen . '" border = "0" /></a>';
	 else
		 echo '<a href="index.html" target="_self"><img src="' . $mosConfig_live_site . '/' . $default_image . '" border = "0" /></a>';
?>