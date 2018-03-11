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

class PhocaGallerysControllerPhocaGallery extends PhocaGallerysController
{
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask( 'add'  , 	'edit' );
		$this->registerTask( 'thumbs'  , 'thumbs' );
		$this->registerTask( 'multiple'  , 'multiple' );
		$this->registerTask( 'install'  , 'install' );
		$this->registerTask( 'upgrade'  , 'upgrade' );
		$this->registerTask( 'disablethumbs' , 'disablethumbs');
	}

	
	
	function install()
	{
		$msg = JText::_( 'Phoca Gallery succesfully installed' );
		$link = 'index.php?option=com_phocagallery';
		$this->setRedirect($link, $msg);
	}
	
	function upgrade()
	{
		$msg = JText::_( 'Phoca Gallery succesfully upgraded' );
		$link = 'index.php?option=com_phocagallery';
		$this->setRedirect($link, $msg);
	}
	
	//if thumbnails are created - show message after creating thumbnails - show that files was saved in database
	function thumbs()
	{
		$msg = JText::_( 'Phoca gallery Saved Multiple' );
		$link = 'index.php?option=com_phocagallery';
		$this->setRedirect($link, $msg);
	}
	
	function disablethumbs()
	{
		
		$model	= &$this->getModel( 'phocagallery' );
		if ($model->disableThumbs()) {
			$msg = JText::_('Phoca Gallery Disabled Thumbs Succes');
		} else {
			$msg = JText::_('Phoca Gallery Disabled Thumbs Error');
		}
		$link = 'index.php?option=com_phocagallery';
		$this->setRedirect($link, $msg);
	}
	
	
	function multiple()
	{
		JRequest::setVar( 'view', 'phocagallerym' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar( 'hidemainmenu', 1 );
		
		parent::display();
		
		// Checkin the Phoca gallery
		//$model = $this->getModel( 'phocagallery' );
		//$model->checkout();
	}
		
	function edit()
	{
		JRequest::setVar( 'view', 'phocagallery' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar( 'hidemainmenu', 1 );

		parent::display();

		// Checkin the Phoca gallery
		$model = $this->getModel( 'phocagallery' );
		$model->checkout();
	}

	function save()
	{
		$post			= JRequest::get('post');
		$cid			= JRequest::getVar( 'cid', array(0), 'post', 'array' );
		$post['id'] 	= (int) $cid[0];

		$model = $this->getModel( 'phocagallery' );

		if ($model->store($post)) {
			$msg = JText::_( 'Phoca gallery Saved' );
		} else {
			$msg = JText::_( 'Error Saving Phoca gallery' );
		}

		// Check the table in so it can be edited.... we are done with it anyway
		$model->checkin();
		$link = 'index.php?option=com_phocagallery';
		$this->setRedirect($link, $msg);
	}

	function remove()
	{
		global $mainframe;

		$cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select an item to delete' ) );
		}

		$model = $this->getModel( 'phocagallery' );
		if(!$model->delete($cid)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
			$msg = JText::_( 'Error Deleting Phoca gallery' );
		}
		else {
			$msg = JText::_( 'Phoca gallery Deleted' );
		}

		$this->setRedirect( 'index.php?option=com_phocagallery', $msg );
	}

	function publish()
	{
		global $mainframe;

		$cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select an item to publish' ) );
		}

		$model = $this->getModel('phocagallery');
		if(!$model->publish($cid, 1)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_phocagallery' );
	}

	function unpublish()
	{
		global $mainframe;

		$cid = JRequest::getVar( 'cid', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);

		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select an item to unpublish' ) );
		}

		$model = $this->getModel('phocagallery');
		if(!$model->publish($cid, 0)) {
			echo "<script> alert('".$model->getError(true)."'); window.history.go(-1); </script>\n";
		}

		$this->setRedirect( 'index.php?option=com_phocagallery' );
	}

	function cancel()
	{
		$model = $this->getModel( 'phocagallery' );
		$model->checkin();

		$this->setRedirect( 'index.php?option=com_phocagallery' );
	}

	function orderup()
	{
		$model = $this->getModel( 'phocagallery' );
		$model->move(-1);

		$this->setRedirect( 'index.php?option=com_phocagallery' );
	}

	function orderdown()
	{
		$model = $this->getModel( 'phocagallery' );
		$model->move(1);

		$this->setRedirect( 'index.php?option=com_phocagallery' );
	}

	function saveorder()
	{
		$cid 	= JRequest::getVar( 'cid', array(), 'post', 'array' );
		$order 	= JRequest::getVar( 'order', array(), 'post', 'array' );
		JArrayHelper::toInteger($cid);
		JArrayHelper::toInteger($order);

		$model = $this->getModel( 'phocagallery' );
		$model->saveorder($cid, $order);

		$msg = 'New ordering saved';
		$this->setRedirect( 'index.php?option=com_phocagallery', $msg );
	}
}
?>
