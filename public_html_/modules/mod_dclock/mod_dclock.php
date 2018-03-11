<?php

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

# module parameter settings
  $width         = $params->def( 'width', '165' );
  $height        = $params->def( 'height', '36' );

$content = "<TABLE width=\"100%\" border=0 cellPadding=0 cellSpacing=0>
<TBODY>
<TR>
<TD><CENTER>
<object classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000' codebase='http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0' width='$width' height='$height' id='dclock' align='middle'>
<param name='movie' value='modules/mod_dclock/dclock.swf?/>
<param name='quality' value='high' />
<param name='menu' value='false' />
<param name='wmode' value='transparent' />
<embed src='modules/mod_dclock/dclock.swf? quality='high' wmode='transparent' menu='false' width='$width' height='$height' name='dclock' align='middle' type='application/x-shockwave-flash' pluginspage='http://www.macromedia.com/go/getflashplayer' />
</object>
</CENTER>
</TD>
</TR>
</TBODY>
</TABLE>";
 
?>