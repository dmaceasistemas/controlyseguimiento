<?php
/**
* JForms Form embed plugin
*
* @version		$Id: jforms.php 115 2009-03-24 08:38:51Z dr_drsh $
* @package		Joomla
* @subpackage	JForms
* @copyright	Copyright (C) 2008 Mostafa Muhammad. All rights reserved.
* @license		GNU/GPL
*/

// no direct access

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.utilities.arrayhelper' );
$mainframe->registerEvent( 'onPrepareContent', 'plgContentJForm' );


require_once JPATH_ROOT.DS.'administrator'.DS.'components'.DS.'com_jforms'.DS.'globals.php';
require_once JFORMS_BACKEND_PATH.DS.'helper'.DS.'plugins.php';


require_once JFORMS_FRONTEND_PATH.DS. 'models'.DS.'form.php';
require_once JFORMS_FRONTEND_PATH.DS. 'views'.DS.'form'.DS.'view.html.php';
	
$GLOBALS['JFormGlobals'] = array();
$GLOBALS['JFormGlobals']['JFormsPlugin'] = new JFormsPluginManager();

	
/**
* Plugin that loads module positions within content
*/
function plgContentJForm( &$row, &$params, $page=0 )
{
	global $option;
	
	$db =& JFactory::getDBO();
	
	// simple performance check to determine whether bot should process further
	if ( JString::strpos( $row->text, '{jform=' ) === false ) {
		return true;
	}

	// Get plugin info
	$plugin =& JPluginHelper::getPlugin('content', 'jforms');

 	// expression to search for
 	$regex = '/{jform=(.*?)}/i';

 	$pluginParams = new JParameter( $plugin->params );


	// check whether plugin has been unpublished or running within JForms context
	if ( !$pluginParams->get( 'enabled', 1 ) || $option == 'com_jforms' ){
		$row->text = preg_replace( $regex, '', $row->text );
		return true;
	}
	

 	// find all instances of plugin and put in $matches
	preg_match_all( $regex, $row->text, $matches );

	// Number of plugins
 	$count = count( $matches[0] );

 	// plugin only processes if there are any instances of the plugin in the text
 	if ( $count ) {
 		plgContentEmbedForms( $row, $matches, $count, $regex );
	}
	return true;
}


function plgContentGenerateHTML( $id ){

	if(!defined('JFORMS_PLUGIN_RUNNING'))define('JFORMS_PLUGIN_RUNNING',1);
	$frmReturn = JRequest::getInt( 'frmReturn' );
	if( !$frmReturn ){
		unset($_SESSION['JFormsSession']);
	}
	
	$document =& JFactory::getDocument();
	$model = new FrontendModelForm();
	$form  = $model->getForm( $id );
		
	if( $form == null ){
		return JText::_('Form not found');
	}
	
	//Check premissions
	$user   =& JFactory::getUser();
	$allowedGroups = explode(',', $form->groups);
	if( !in_array( $user->gid, $allowedGroups ) ){
		return JText::_("You're not allowed to view this form, try logging in");
	}
	
	$previousState    = null;
	$hasPreviousState = array_key_exists( 'JFormsSession', $_SESSION ) &&
						array_key_exists( $id, $_SESSION['JFormsSession']['FormState'] );

	if($hasPreviousState){
		$previousState = $_SESSION['JFormsSession']['FormState'][$id];
	}   
	
	//If Profile mode form, Allow only non-guests
	if( !$user->id && $form->type == JFORMS_TYPE_PROFILE ){
		JError::raiseError( 403, JText::_("Access Forbidden") );
	}
	$sortedElements = array();
	foreach( $form->fields as $f ){
		$sortedElements[$f->position] = $f;
	}
	$form->fields = $sortedElements;
		
	//Load previously stored Data from DB
	if( $user->id && $form->type == JFORMS_TYPE_PROFILE ){
		$record = $model->getRecordByUid( $form, $user->id );
		if( count($record) ){
			foreach($form->fields as $f){
				if( array_key_exists( $f->parameters['hash'], $record  ))
					$f->parameters['defaultValue'] = $record[$f->parameters['hash']];
			}
		}
	}

	//Load previous state from last faulty submission
	foreach( $form->fields as $key => $value ){
		//Fix for PHP4 since foreach doesn't return references.
		$f = &$form->fields[$key];
		if( $hasPreviousState && array_key_exists( $f->parameters['hash'], $previousState )){
			$f->validationError = $previousState[$f->parameters['hash']][0];
			$f->defaultValue    = $previousState[$f->parameters['hash']][1];			
		}
	}
	

	$view = new FrontendViewForm(array( 'base_path'=>JFORMS_FRONTEND_PATH));
	$view->setLayout('embedded');
	ob_start();
	$view->display($form);
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}


function plgContentEmbedForms ( &$row, &$matches, $count, $regex ){
 
	//Avoid embedding one form twice in one page
	$embededIds = array();
	
	for ( $i=0; $i < $count; $i++ ){
		$id = intval( $matches[1][$i] );
		if(in_array($id,$embededIds))continue;
		$embededIds[] = $id;
		$formHTML = plgContentGenerateHTML( $id );
		$row->text 	= preg_replace( '{'. $matches[0][$i] .'}', $formHTML, $row->text );
 	}
}
