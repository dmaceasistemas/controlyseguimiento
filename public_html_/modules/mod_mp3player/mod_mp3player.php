<?php
/**
* @version 1.3.2
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

// Include the mp3player functions only once
require_once (dirname(__FILE__).DS.'helper.php');

$width 		= 	$params->get( 'width', 300 );
$height		= 	$params->get( 'height', 200 );
$playlist	= 	$params->get( 'playlist' );
$style		= 	$params->get( 'style' );
//Advanced Parameters
$show		=	$params->get( 'show' );
$bg_popup	=	$params->get( 'bg_popup');
$image		=	$params->get( 'image' );
//Path Files
$URL 		= 	JURI::base();
$urlFiles	= 	$URL.'modules/mod_mp3player/files/';

switch($show)
{
	case '1': $OutPut = modMp3playerHelper::getSingle($width,$height,$playlist,$style,$urlFiles);break;
	case '2': $OutPut = modMp3playerHelper::getImage($playlist,$style,$urlFiles,$bg_popup,$image);break;
	case '3': 
	{
		$OutPut = modMp3playerHelper::getSingle($width,$height,$playlist,$style,$urlFiles).
		modMp3playerHelper::getImage($playlist,$style,$urlFiles,$bg_popup,$image);
	}
	break;
	default: $OutPut = 'Configure el módulo';break;
}

require(JModuleHelper::getLayoutPath('mod_mp3player'));
?>
