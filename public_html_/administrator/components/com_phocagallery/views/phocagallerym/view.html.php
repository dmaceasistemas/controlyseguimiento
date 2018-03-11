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

class PhocaGallerysViewPhocaGallerym extends JView
{
	/*form*/
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
		/*form*/
		global $mainframe, $option;

		$uri 			=& JFactory::getURI();
		$phocagallery	=& $this->get('Data');//Data from model
		$lists 			= array();		
		$db		        =& JFactory::getDBO();

		JToolBarHelper::title(   JText::_( 'Phoca gallery' ).': <small><small>[ ' . JText::_( 'Multiple Add' ).' ]</small></small>' );
		JToolBarHelper::save();
		JToolBarHelper::cancel();
		JToolBarHelper::help( 'screen.phocagallery', true );

		$phocagallery->published 	= 1;
		$phocagallery->order 		= 0;
		$phocagallery->catid 		= JRequest::getVar( 'catid', 0, 'post', 'int' );
		$phocagallery->id			= 0;

		// build the html select list for ordering
		$query = 'SELECT ordering AS value, title AS text'
			. ' FROM #__phocagallery'
			. ' WHERE catid = ' . (int) $phocagallery->catid
			. ' ORDER BY ordering';
		
		$lists['ordering'] 			= JHTML::_('list.specificordering',  $phocagallery, $phocagallery->id, $query, false );
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
		
		$phocagallerys_tree_array = PhocaGalleryHelper::CategoryTreeCreating($phocagallerys, $tree, 0);
		
		
		array_unshift($phocagallerys_tree_array, JHTML::_('select.option', '0', '- '.JText::_('Select Category').' -', 'value', 'text'));
		
		//list categories
		$lists['catid'] = JHTML::_( 'select.genericlist', $phocagallerys_tree_array, 'catid',  '', 'value', 'text', $phocagallery->catid);
		//-----------------------------------------------------------------------
	
		// build the html select list
		$lists['published'] 		= JHTML::_('select.booleanlist',  'published', 'class="inputbox"', $phocagallery->published );

		//clean gallery data
		jimport('joomla.filter.output');
		JFilterOutput::objectHTMLSafe( $phocagallery, ENT_QUOTES, 'description' );
		
		
	
		$this->assignRef('lists', $lists);
		$this->assignRef('phocagallery', $phocagallery);
		$this->assignRef('button', $button);
		$this->assignRef('request_url',	$uri->toString());

		//--------------------------------------------------------------------------------------------------------
		/*image manager*/
		JResponse::allowCache(false);// Do not allow cache

		$path 			= PhocaGalleryHelper::getPathSet();
		
		$this->assignRef('path_orig_rel', $path['orig_rel_ds']);
		$this->assignRef('images', $this->get('images'));
		$this->assignRef('folders', $this->get('folders'));
		$this->assignRef('state', $this->get('state'));

		
		parent::display($tpl);
	}
}
?>
