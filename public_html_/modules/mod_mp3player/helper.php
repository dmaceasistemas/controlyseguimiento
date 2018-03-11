<?php
/**
* @version 1.3.2 $id Helper.php
* @package Flash Mp3 Player
* @copyright (C) 2008 Daniel Gutierrez Oroncuy
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
*****************************************************************************
* Integracion del script creado por Jeroen Wijering www.jeroenwijering.com	 *
* Módulo Desarrollado por Daniel Gutierrez www.gutierrez.nu					    *
*****************************************************************************
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

class modMp3playerHelper 
{
	//Output Flash Mp3 player
	function getSingle($width,$height,$playlist,$style, $urlFiles)
	{
		$result	=	'
		<script type="text/javascript">
		AC_FL_RunContent( \'width\',\''.$width.'\',\'height\',\''.$height.'\',\'codebase\',\'http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0\',\'src\',\''.$urlFiles.'/mp3/mp3player\',\'flashvars\',\'config='.$urlFiles.$style.'.xml&file='.$urlFiles.$playlist.'.xml\',\'pluginspage\',\'http://www.macromedia.com/go/getflashplayer\',\'movie\',\''.$urlFiles.'/mp3/mp3player\' ); //end AC code
		</script>
			<noscript>
			<object width="'.$width.'" height="'.$height.'" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"  codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" >
			<param name="movie" value="'.$urlFiles.'/mp3/mp3player.swf" />
			<param name="flashvars" value="config='.$urlFiles.$style.'.xml&file='.$urlFiles.$playlist.'.xml" />
			</object>
		</noscript>';

		return $result;
	}
	//Output Image with link Popup
	function getImage($playlist,$style,$urlFiles,$bg_popup,$image)
	{
		$result	=	'
		<div align="center">
		<a href="#" onclick="window.open(\''.$urlFiles.'popup.php?playlist='.$urlFiles.$playlist.'&style='.$urlFiles.$style.'&bg_popup='.$bg_popup.'\',\'\',\'width=215,height=215,location=no,scrollbars=no,menubar=no,resizable=no,toolbar=no,status=no\');return false;" >		
		<br/><img src="modules/mod_mp3player/files/'.$image.'" /></a>
		</div>';

		return $result;
	}
}