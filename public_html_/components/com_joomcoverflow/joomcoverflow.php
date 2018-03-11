<?php
/**
 * @package		Joomla
 * @subpackage	JoomCoverflow
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.helper');
require_once( JApplicationHelper::getPath( 'html' ) );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.$option.DS.'tables');

/*$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'components'.DS.$option.DS.'joomcoverflow.css');*/

switch($task){
	default:    
		showCoverflow();
		break;
}

function showCoverflow() {
	HTML_coverflow::showImagenes($rows);
}

?>