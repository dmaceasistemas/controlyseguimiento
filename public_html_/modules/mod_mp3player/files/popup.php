<?php 
/**
* @version 1.3.2 $id PopUp.php
* @package Flash Mp3 Player
* @copyright (C) 2008 Daniel Gutierrez Oroncuy
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*****************************************************************************
* Integracion del script creado por Jeroen Wijering www.jeroenwijering.com	 *
* Módulo Desarrollado por Daniel Gutierrez www.gutierrez.nu					    *
*****************************************************************************
*/

$bg_popup		=	$_GET[ 'bg_popup' ];
$playlist		= 	$_GET[ 'playlist' ];
$style			=	$_GET[ 'style' ];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>M&uacute;sica en Linea</title>
<script src="AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body bgcolor="#<?php echo $bg_popup;?>">

<script type="text/javascript">
AC_FL_RunContent( 'width','200','height','200','codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0','src','mp3/mp3player','flashvars','config=<?php echo $style;?>.xml&file=<?php echo $playlist;?>.xml','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','mp3/mp3player' ); //end AC code
</script><noscript>
<object width="200" height="200" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"  codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" >
  <param name="movie" value="../files/mp3/mp3player.swf" />
  <param name="flashvars" value="config=<?php echo $style;?>.xml&file=<?php echo $playlist;?>.xml" />  
</object></noscript>

</body>
</html>