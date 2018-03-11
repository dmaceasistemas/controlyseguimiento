<?php
/*
 * @package Joomla 1.5
 * @copyright Copyright (C) 2005 Open Source Matters. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 *
 * @component Phoca Gallery
 * @copyright Copyright (C) Jan Pavelka www.phoca.cz
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 */

// Check to ensure this file is included in Joomla!
defined('_JEXEC') or die();
jimport( 'joomla.application.component.view' );

class PhocaGallerysViewPhocaGalleryc extends JView
{

	function display($tpl = null)
	{
		global $mainframe;
		
		if($this->getLayout() == 'form') {
			$this->_displayForm($tpl);
			return;
		}
		
		
		parent::display($tpl);
	}

	function _displayForm($tpl)
	{
		global $mainframe, $option;

		$db		=& JFactory::getDBO();
		$uri 	=& JFactory::getURI();
		$user 	=& JFactory::getUser();
		$model	=& $this->getModel();
		$editor =& JFactory::getEditor();	
		//Data from model
		$phocagallery	=& $this->get('Data');
		
		
		
		$lists 	= array();		
		$isNew	= ($phocagallery->id < 1);

		// fail if checked out not by 'me'
		if ($model->isCheckedOut( $user->get('id') )) {
			
			$msg = JText::sprintf( 'DESCBEINGEDITTED', JText::_( 'Phoca Gallery Categories' ), $phocagallery->title );
			$mainframe->redirect( 'index.php?option='. $option, $msg );
		}

		// Set toolbar items for the page
		$text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
		JToolBarHelper::title(   JText::_( 'Phoca Gallery Categories' ).': <small><small>[ ' . $text.' ]</small></small>' );
		JToolBarHelper::save();
		JToolBarHelper::apply();
		if ($isNew)  {
			JToolBarHelper::cancel();
		} else {
			// for existing items the button is renamed `close`
			JToolBarHelper::cancel( 'cancel', 'Close' );
		}
		JToolBarHelper::help( 'screen.phocagallery', true );

		// Edit or Create?
		if (!$isNew)
		{
			$model->checkout( $user->get('id') );
		}
		else
		{
			// initialise new record
			$phocagallery->published 		= 1;
			$phocagallery->order 			= 0;
			$phocagallery->access			= 0;
		}

		
		
		// build the html select list for ordering
		$query = 'SELECT ordering AS value, title AS text'
			. ' FROM #__phocagallery_categories'
			. ' ORDER BY ordering';
		$lists['ordering'] 			= JHTML::_('list.specificordering',  $phocagallery, $phocagallery->id, $query, false );
		// build the html select list
		$lists['published'] 		= JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $phocagallery->published );
		
		$active =  ( $phocagallery->image_position ? $phocagallery->image_position : 'left' );
		$lists['image_position'] 	= JHTML::_('list.positions',  'image_position', $active, NULL, 0, 0 );
		// Imagelist
		$lists['image'] 			= JHTML::_('list.images',  'image', $phocagallery->image );
		// build the html select list for the group access
		$lists['access'] 			= JHTML::_('list.accesslevel',  $phocagallery );
	
		//------------------------------------------------------------------------
		//build the list of categories
		$query = 'SELECT a.title AS text, a.id AS value, a.parent_id as parentid'
		. ' FROM #__phocagallery_categories AS a'
	//	. ' WHERE a.published = 1'
		. ' ORDER BY a.ordering';
		$db->setQuery( $query );
		$phocagallerys = $db->loadObjectList();

		$tree = array();
		$text = '';
		$tree = PhocaGalleryHelper::CategoryTree($phocagallerys, $tree, 0, $text);
		
		
		$phocagallerys_tree_array = PhocaGalleryHelper::CategoryTreeCreating($phocagallerys, $tree, $phocagallery->id);
		
		array_unshift($phocagallerys_tree_array, JHTML::_('select.option', '0', '- '.JText::_('Select Parent Category').' -', 'value', 'text'));
		
		//list categories
		$lists['parentid'] = JHTML::_( 'select.genericlist', $phocagallerys_tree_array, 'parentid',  '', 'value', 'text', $phocagallery->parent_id);
		
		//-----------------------------------------------------------------------
		
		
		//clean gallery data
		jimport('joomla.filter.output');
		JFilterOutput::objectHTMLSafe( $phocagallery, ENT_QUOTES, 'description' );

		//Params
		#$file 	= JPATH_COMPONENT.DS.'models'.DS.'phocagallery.xml';
		#$params = new JParameter( $phocagallery->params, $file );
			
		$this->assignRef('editor', $editor);
		$this->assignRef('lists', $lists);
		$this->assignRef('phocagallery', $phocagallery);
	
		$this->assignRef('request_url',	$uri->toString());

		parent::display($tpl);
	}
}
?>
