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
jimport('joomla.application.component.model');

class PhocaGallerysModelPhocaGalleryc extends JModel
{
	function __construct()
	{
		parent::__construct();

		$array = JRequest::getVar('cid',  0, '', 'array');
		$this->setId((int)$array[0]);
	}

	function setId($id)
	{
		// Set id and wipe data
		$this->_id		= $id;
		$this->_data	= null;
	}

	function &getData()
	{
		if ($this->_loadData())
		{
			$user = &JFactory::getUser();
			
	/*		// Check to see if the category is published
			if (!$this->_data->cat_pub) {
				JError::raiseError( 404, JText::_("Resource Not Found") );
				return;
			}
			
			// Check whether category access level allows access
			if ($this->_data->cat_access > $user->get('aid', 0)) {
				JError::raiseError( 403, JText::_('ALERTNOTAUTH') );
				return;
			}*/
		}
		else
		{
			$this->_initData();
		}
		return $this->_data;
	}
	
	function isCheckedOut( $uid=0 )
	{
		if ($this->_loadData())
		{
			if ($uid) {
				return ($this->_data->checked_out && $this->_data->checked_out != $uid);
			} else {
				return $this->_data->checked_out;
			}
		}
	}

	function checkin()
	{
		if ($this->_id)
		{
			$phocagallery = & $this->getTable();
			if(! $phocagallery->checkin($this->_id)) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}
		return false;
	}

	function checkout($uid = null)
	{
		if ($this->_id)
		{
			// Make sure we have a user id to checkout the article with
			if (is_null($uid)) {
				$user	=& JFactory::getUser();
				$uid	= $user->get('id');
			}
			// Lets get to it and checkout the thing...
			$phocagallery = & $this->getTable();
			if(!$phocagallery->checkout($uid, $this->_id)) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
			return true;
		}
		return false;
	}
	
	function store($data)
	{
		$row =& $this->getTable();
		// Bind the form fields to the table
		if (!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// if new item, order last in appropriate group
		if (!$row->id) {
			$where = 'parent_id = ' . (int) $row->parent_id ;
			//$where = '';
			$row->ordering = $row->getNextOrder( $where );
		}

		// Make sure the table is valid
		if (!$row->check()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		// Store the table to the database
		if (!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		return $row->id;
	}
	
	function accessmenu($id, $access)
	{
		global $mainframe;
		$row =& $this->getTable();
		$row->id = $id;
		$row->access = $access;

		if ( !$row->check() ) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		if ( !$row->store() ) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
	}

	function delete($cid = array())
	{
		global $mainframe;
		$db =& JFactory::getDBO();
		
		$result = false;
		if (count( $cid ))
		{
			JArrayHelper::toInteger($cid);
			$cids = implode( ',', $cid );
			
			// FIRST - if there are subcategories ---------------------------------------------------	
			$query = 'SELECT c.id, c.name, c.title, COUNT( s.parent_id ) AS numcat'
			. ' FROM #__phocagallery_categories AS c'
			. ' LEFT JOIN #__phocagallery_categories AS s ON s.parent_id = c.id'
			. ' WHERE c.id IN ( '.$cids.' )'
			. ' GROUP BY c.id'
			;
			$db->setQuery( $query );
				
			
			if (!($rows2 = $db->loadObjectList())) {
				JError::raiseError( 500, $db->stderr('Load Data Problem') );
				return false;
			}

			// Add new CID without categories which have subcategories (we don't delete categories with subcat)
			$err_cat = array();
			$cid 	 = array();
			foreach ($rows2 as $row) {
				if ($row->numcat == 0) {
					$cid[] = (int) $row->id;
				} else {
					$err_cat[] = $row->title;
				}
			}
			
			
			// End subcategories ----------------------------------------------------------------------
			
			// Images with new cid
			if (count( $cid ))
			{
				JArrayHelper::toInteger($cid);
				$cids = implode( ',', $cid );
			}

			// Select id's from phocagallery tables. If the category has some images, don't delete it
			$query = 'SELECT c.id, c.name, c.title, COUNT( s.catid ) AS numcat'
			. ' FROM #__phocagallery_categories AS c'
			. ' LEFT JOIN #__phocagallery AS s ON s.catid = c.id'
			. ' WHERE c.id IN ( '.$cids.' )'
			. ' GROUP BY c.id'
			;
		
			$db->setQuery( $query );

			if (!($rows = $db->loadObjectList())) {
				JError::raiseError( 500, $db->stderr('Load Data Problem') );
				return false;
			}
			
			$err_img = array();
			$cid 	 = array();
			foreach ($rows as $row) {
				if ($row->numcat == 0) {
					$cid[] = (int) $row->id;
				} else {
					$err_img[] = $row->title;
				}
			}

			
			if (count( $cid )) {
				$cids = implode( ',', $cid );
				$query = 'DELETE FROM #__phocagallery_categories'
				. ' WHERE id IN ( '.$cids.' )'
				;
				$db->setQuery( $query );
				if (!$db->query()) {
					$this->setError($this->_db->getErrorMsg());
					return false;
				}
			}

			// There are some images in the category - don't delete it
			$msg = '';
			if (count( $err_cat ) || count( $err_img ))
			{
				if (count( $err_cat ))
				{
					$cids_cat = implode( ", ", $err_cat );
					$msg .= JText::sprintf( 'WARNNOTREMOVEDRECORDS PHOCA GALLERY CAT', $cids_cat );
				}
				
				if (count( $err_img ))
				{
					$cids_img = implode( ", ", $err_img );
					$msg .= JText::sprintf( 'WARNNOTREMOVEDRECORDS PHOCA GALLERY', $cids_img );
				}
					
					
					$link = 'index.php?option=com_phocagallery&view=phocagallerycs';
					$mainframe->redirect($link, $msg);
			}
		}
		return true;
	}

	function publish($cid = array(), $publish = 1)
	{
		$user 	=& JFactory::getUser();

		if (count( $cid ))
		{
			JArrayHelper::toInteger($cid);
			$cids = implode( ',', $cid );

			$query = 'UPDATE #__phocagallery_categories'
				. ' SET published = '.(int) $publish
				. ' WHERE id IN ( '.$cids.' )'
				. ' AND ( checked_out = 0 OR ( checked_out = '.(int) $user->get('id').' ) )'
			;
			$this->_db->setQuery( $query );
			if (!$this->_db->query()) {
				$this->setError($this->_db->getErrorMsg());
				return false;
			}
		}
		return true;
	}

	function move($direction)
	{
		$row =& $this->getTable();
		if (!$row->load($this->_id)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}

		if (!$row->move( $direction, ' parent_id = '.(int) $row->parent_id.' AND published >= 0 ' )) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		return true;
	}
	
	


	function saveorder($cid = array(), $order)
	{
		$row =& $this->getTable();
		$groupings = array();

		//$catid is null
		// update ordering values
		for( $i=0; $i < count($cid); $i++ )
		{
			$row->load( (int) $cid[$i] );
			// track categories
			$groupings[] = $row->parent_id;

			if ($row->ordering != $order[$i])
			{
				$row->ordering = $order[$i];
				if (!$row->store()) {
					$this->setError($this->_db->getErrorMsg());
					return false;
				}
			}
		}

		// execute updateOrder for each parent group
		$groupings = array_unique( $groupings );
		foreach ($groupings as $group){
			$row->reorder('parent_id = '.(int) $group);
		}
		return true;
	}
	
	function _loadData()
	{
		if (empty($this->_data))
		{		
			$query = 'SELECT p.* '.	
					' FROM #__phocagallery_categories AS p' .
					' WHERE p.id = '.(int) $this->_id;
			$this->_db->setQuery($query);
			$this->_data = $this->_db->loadObject();
			return (boolean) $this->_data;
		}
		return true;
	}
	
	
	function _initData()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
			$phocagallery = new stdClass();
			$phocagallery->id				= 0;
			$phocagallery->parent_id		= 0;
			$phocagallery->title			= null;
			$phocagallery->name			= null;
			$phocagallery->alias			= null;
			$phocagallery->image			= null;
			$phocagallery->section        = null;
			$phocagallery->image_position	= null;
			$phocagallery->description	= null;
			$phocagallery->published			= 0;
			$phocagallery->checked_out		= 0;
			$phocagallery->checked_out_time	= 0;
			$phocagallery->editor				= null;
			$phocagallery->ordering			= 0;
			$phocagallery->access				= 0;
			$phocagallery->count				= 0;
			$phocagallery->params				= null;
			$this->_data					= $phocagallery;
			return (boolean) $this->_data;
		}
		return true;
	}
}
?>