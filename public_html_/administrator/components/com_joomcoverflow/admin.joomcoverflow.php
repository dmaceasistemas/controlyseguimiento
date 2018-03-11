<?php
/**
 * @package		Joomla
 * @subpackage	JoomCoverflow
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Make sure the user is authorized to view this page
$user = & JFactory::getUser();
/*if (!$user->authorize( 'com_clubalpino', 'manage' )) {
	$mainframe->redirect( 'index.php', JText::_('ALERTNOTAUTH') );
}*/

// Set the table directory
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_joomcoverflow'.DS.'tables');

$controllerName = JRequest::getCmd( 'c', 'imagen' );

if ($controllerName == 'imagen') {			
	JSubMenuHelper::addEntry(JText::_('Imágenes'), 'index.php?option=com_joomcoverflow&c=imagen');
} else {		
	JSubMenuHelper::addEntry(JText::_('Imágenes'), 'index.php?option=com_joomcoverflow&c=imagen');
}

switch ($controllerName)
{
	default:
		$controllerName = 'imagen';
		// allow fall through

	case 'imagen' :
		// Temporary interceptor
		$task = JRequest::getCmd('task');
 
		require_once( JPATH_COMPONENT.DS.'controllers'.DS.$controllerName.'.php' );
		$controllerName = 'CoverflowController'.$controllerName;

		// Create the controller
		$controller = new $controllerName();

		// Perform the Request task
		$controller->execute( JRequest::getCmd('task') );

		// Redirect if set by the controller
		$controller->redirect();
		break;
}

?>