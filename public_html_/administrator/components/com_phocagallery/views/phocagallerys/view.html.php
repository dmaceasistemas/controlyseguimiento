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
 
class PhocaGallerysViewPhocaGallerys extends JView
{
	function display($tpl = null)
	{
		global $mainframe;
		$uri		=& JFactory::getURI();
		$document	=& JFactory::getDocument();
		$db		    =& JFactory::getDBO();
		
		$document->addStyleSheet('../administrator/components/com_phocagallery/assets/phocagallery.css');
		$document->addCustomTag("<!--[if IE]>\n<link rel=\"stylesheet\" href=\"../administrator/components/com_phocagallery/assets/phocagalleryieall.css\" type=\"text/css\" />\n<![endif]-->");
		
		$link = 'index.php?option=com_phocagallery&amp;view=phocagalleryd&amp;tmpl=component';
		JHTML::_('behavior.modal', 'a.modal-button');

		// Get width and height from default settings
		$params = JComponentHelper::getParams('com_phocagallery') ;

		$admin_modal_box_width	= 680;
		$admin_modal_box_height	= 520;
		if ($params->get( 'admin_modal_box_width' ) != '') {
			$admin_modal_box_width = $params->get( 'admin_modal_box_width' );
		}
		if ($params->get( 'admin_modal_box_height' ) != '') {
			$admin_modal_box_height = $params->get( 'admin_modal_box_height' );
		}


		$button = new JObject();
		$button->set('modal', true);
		$button->set('link', $link);
		$button->set('text', JText::_('Image'));
		$button->set('name', 'image');
		$button->set('modalname', 'modal-button');
		$button->set('options', "{handler: 'iframe', size: {x: ".$admin_modal_box_width.", y: ".$admin_modal_box_height."}}");

		// Set toolbar items for the page
		JToolBarHelper::title(   JText::_( 'Phoca gallery' ), 'generic.png' );
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::deleteList(  JText::_( 'WARNWANTDELLISTEDITEMS' ), 'remove', 'delete');
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		
		JToolBarHelper::customX('Multiple', 'new.png', '', JText::_( 'Multiple Add' ), false);
		JToolBarHelper::preferences('com_phocagallery', '360');
		JToolBarHelper::help( 'screen.phocagallery', true );

		//Filter
		$context			= 'com_phocagallery.phocagallery.list.';
		
		$filter_state		= $mainframe->getUserStateFromRequest( $context.'filter_state',		'filter_state',		'',				'word' );
		$filter_catid		= $mainframe->getUserStateFromRequest( $context.'filter_catid',		'filter_catid',		0,				'int' );
		$filter_order		= $mainframe->getUserStateFromRequest( $context.'filter_order',		'filter_order',		'a.ordering',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $context.'filter_order_Dir',	'filter_order_Dir',	'',				'word' );
		$search				= $mainframe->getUserStateFromRequest( $context.'search',			'search',			'',				'string' );
		$search				= JString::strtolower( $search );

		// Get data from the model
		$items		= & $this->get( 'Data');
		$total		= & $this->get( 'Total');
		$pagination = & $this->get( 'Pagination' );
		

		// build list of categories
		$javascript 	= 'class="inputbox" size="1" onchange="submitform( );"';
		
		
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
		$lists['catid'] = JHTML::_( 'select.genericlist', $phocagallerys_tree_array, 'filter_catid',  $javascript , 'value', 'text', $filter_catid );
		//-----------------------------------------------------------------------
	
		// state filter
		$lists['state']	= JHTML::_('grid.state',  $filter_state );

		// table ordering
		$lists['order_Dir'] = $filter_order_Dir;
		$lists['order'] = $filter_order;

		// search filter
		$lists['search']= $search;
		
		//Get version (check for update)
		$folder = JPATH_ADMINISTRATOR .DS. 'components'.DS.'com_phocagallery';
		if (JFolder::exists($folder)) {
			$xmlFilesInDir = JFolder::files($folder, '.xml$');
		} else {
			$folder = JPATH_SITE .DS. 'components'.DS.'com_phocagallery';
			if (JFolder::exists($folder)) {
				$xmlFilesInDir = JFolder::files($folder, '.xml$');
			} else {
				$xmlFilesInDir = null;
			}
		}

		$xml_items = '';
		if (count($xmlFilesInDir))
		{
			foreach ($xmlFilesInDir as $xmlfile)
			{
				if ($data = JApplicationHelper::parseXMLInstallFile($folder.DS.$xmlfile)) {
					foreach($data as $key => $value) {
						$xml_items[$key] = $value;
					}
				}
			}
		}

		$this->assignRef('button',		$button);
		$this->assignRef('user',		JFactory::getUser());
		$this->assignRef('lists',		$lists);
		$this->assignRef('items',		$items);
		$this->assignRef('pagination',	$pagination);
		$this->assignRef('version',	$xml_items['version']);
		$this->assignRef('request_url',	$uri->toString());
		
		parent::display($tpl);
	}
}
?>