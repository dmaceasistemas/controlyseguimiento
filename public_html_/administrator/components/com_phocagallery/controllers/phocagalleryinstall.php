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

class PhocaGallerysControllerPhocaGalleryinstall extends PhocaGallerysController
{
	function __construct()
	{
		parent::__construct();

		// Register Extra tasks
		$this->registerTask( 'install'  , 'install' );
		$this->registerTask( 'upgrade'  , 'upgrade' );		
	}

	
	
	function install()
	{		
		$db			=& JFactory::getDBO();
		$db_prefix 	= $db->getPrefix();
		
		$msg_sql = '';
		
		
		$query =' DROP TABLE IF EXISTS `'.$db_prefix.'phocagallery`;';
		$db->setQuery( $query );
		if (!$result = $db->query()){$msg_sql .= $db->stderr() . '<br />';}
		
		
		$query=' CREATE TABLE `'.$db_prefix.'phocagallery`('."\n";
		$query.=' `id` int(11) unsigned NOT NULL auto_increment,'."\n";
		$query.=' `catid` int(11) NOT NULL default \'0\','."\n";
		$query.=' `sid` int(11) NOT NULL default \'0\','."\n";
		$query.=' `title` varchar(250) NOT NULL default \'\','."\n";
		$query.='  `alias` varchar(255) NOT NULL default \'\','."\n";
		$query.='  `filename` varchar(250) NOT NULL default \'\','."\n";
		$query.='  `description` text NOT NULL default \'\','."\n";
		$query.='  `date` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.='  `hits` int(11) NOT NULL default \'0\','."\n";
		$query.='  `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.='  `checked_out` int(11) NOT NULL default \'0\','."\n";
		$query.='  `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.='  `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.='  `params` text NOT NULL,'."\n";
		$query.='  PRIMARY KEY  (`id`),'."\n";
		$query.='  KEY `catid` (`catid`,`published`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;'."\n";
		$query.=''."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msg_sql .= $db->stderr() . '<br />';}
		
		$query=' DROP TABLE IF EXISTS `'.$db_prefix.'phocagallery_categories`;'."\n";
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msg_sql .= $db->stderr() . '<br />';}
		
		$query=' CREATE TABLE `'.$db_prefix.'phocagallery_categories` ('."\n";
		$query.='  `id` int(11) NOT NULL auto_increment,'."\n";
		$query.='  `parent_id` int(11) NOT NULL default 0,'."\n";
		$query.='  `title` varchar(255) NOT NULL default \'\','."\n";
		$query.='  `name` varchar(255) NOT NULL default \'\','."\n";
		$query.='  `alias` varchar(255) NOT NULL default \'\','."\n";
		$query.='  `image` varchar(255) NOT NULL default \'\','."\n";
		$query.='  `section` varchar(50) NOT NULL default \'\','."\n";
		$query.='  `image_position` varchar(30) NOT NULL default \'\','."\n";
		$query.='  `description` text NOT NULL,'."\n";
		$query.='  `published` tinyint(1) NOT NULL default \'0\','."\n";
		$query.='  `checked_out` int(11) unsigned NOT NULL default \'0\','."\n";
		$query.='  `checked_out_time` datetime NOT NULL default \'0000-00-00 00:00:00\','."\n";
		$query.='  `editor` varchar(50) default NULL,'."\n";
		$query.='  `ordering` int(11) NOT NULL default \'0\','."\n";
		$query.='  `access` tinyint(3) unsigned NOT NULL default \'0\','."\n";
		$query.='  `count` int(11) NOT NULL default \'0\','."\n";
		$query.='  `params` text NOT NULL,'."\n";
		$query.='  PRIMARY KEY  (`id`),'."\n";
		$query.='  KEY `cat_idx` (`section`,`published`,`access`),'."\n";
		$query.='  KEY `idx_access` (`access`),'."\n";
		$query.='  KEY `idx_checkout` (`checked_out`)'."\n";
		$query.=') TYPE=MyISAM CHARACTER SET `utf8`;';
		
		$db->setQuery( $query );
		if (!$result = $db->query()){$msg_sql .= $db->stderr() . '<br />';}
		
		
		if ($msg_sql !='')
		{
			$msg = JText::_( 'Phoca Gallery not succesfully installed' ) . ': <br />' . $msg_sql;
		}
		else
		{
			$msg = JText::_( 'Phoca Gallery succesfully installed' );
		}
		
		$link = 'index.php?option=com_phocagallery';
		$this->setRedirect($link, $msg);
	}
	
	function upgrade()
	{
		$db			=& JFactory::getDBO();
		$db_prefix 	= $db->getPrefix();
		
		$msg_sql = '';
		
		
		$query =' SELECT * FROM `'.$db_prefix.'phocagallery` LIMIT 1;';
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum())
		{
			$msg_sql .= $db->getErrorMsg(). '<br />';
		}
		
		
		$query=' SELECT * FROM `'.$db_prefix.'phocagallery_categories` LIMIT 1;'."\n";
		
		$db->setQuery( $query );
		$result = $db->loadResult();
		if ($db->getErrorNum())
		{
			$msg_sql .= $db->getErrorMsg(). '<br />';
		}
		
		if ($msg_sql !='')
		{
			$msg = JText::_( 'Phoca Gallery not succesfully upgraded' ) . ': <br />' . $msg_sql;
		}
		else
		{
			$msg = JText::_( 'Phoca Gallery succesfully upgraded' );
		}
	
		$link = 'index.php?option=com_phocagallery';
		$this->setRedirect($link, $msg);
	}
}