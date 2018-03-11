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

jimport( 'joomla.application.component.view');

class PhocaGallerysViewPhocaGalleryd extends JView
{
	function display($tpl = null)
	{
		global $mainframe;

		$file =& $this->get('Data');
		$this->assignRef('file', $file);

		parent::display($tpl);
	}
}
