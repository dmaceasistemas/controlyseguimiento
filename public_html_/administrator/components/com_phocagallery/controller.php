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

jimport('joomla.application.component.controller');

// Submenu view
$view	= JRequest::getVar( 'view', '', '', 'string', JREQUEST_ALLOWRAW );
if ($view == 'phocagallerycs')
{
	JSubMenuHelper::addEntry(JText::_('Gallery'), 'index.php?option=com_phocagallery');
	JSubMenuHelper::addEntry(JText::_('Categories'), 'index.php?option=com_phocagallery&view=phocagallerycs', true );
	JSubMenuHelper::addEntry(JText::_('Themes'), 'index.php?option=com_phocagallery&view=phocagalleryt');
}
if ($view == 'phocagalleryt')
{
	JSubMenuHelper::addEntry(JText::_('Gallery'), 'index.php?option=com_phocagallery');
	JSubMenuHelper::addEntry(JText::_('Categories'), 'index.php?option=com_phocagallery&view=phocagallerycs' );
	JSubMenuHelper::addEntry(JText::_('Themes'), 'index.php?option=com_phocagallery&view=phocagalleryt', true );
}

class PhocaGallerysController extends JController
{
	function display()
	{
		parent::display();
	}
}
?>
