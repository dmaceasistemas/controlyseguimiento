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

class PhocaGalleryModelPhocaGalleryd extends JModel
{

	function __construct()
	{
		parent::__construct();
		
		$id = JRequest::getVar('id', 0, '', 'int');
		$this->setId((int)$id);
	
		$slideshow = JRequest::getVar('phocaslideshow', 0, '', 'int');
		$this->setSlideshow((int)$slideshow);
		
		$download = JRequest::getVar('phocadownload', 0, '', 'int');
		$this->setDownload((int)$download);
		
	}
	
	function setId($id)
	{
		// Set id and wipe data
		$this->_id			= $id;
		$this->_data		= null;
		//$this->_category	= null;
	}
	
	function setSlideshow($slideshow)
	{
		// Set id and wipe data
		$this->_slideshow	= $slideshow;
		$this->_data		= null;
	}
	
	function setDownload($download)
	{
		// Set id and wipe data
		$this->_download	= $download;
		$this->_data		= null;
	}

	
	function &getData()
	{
		// Load the Phoca gallery data
		if (!$this->_loadData())
		{
			$this->_initData();
		}
		return $this->_data;
	}
	
	function _loadData()
	{
		global $mainframe;
		
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
			$query = 'SELECT p.*' .
					' FROM #__phocagallery AS p' .
					' WHERE p.id = '.(int) $this->_id;
			$this->_db->setQuery($query);
			$items = $this->_db->loadObject();
		
			
			//Select category
			if (!$this->_loadCategory())
			{
				$this->_loadCategory();
			}
			
			//Slugs - possible
			//$items->slugid 		= (int) $items->id . "-" . $items->alias;
			//$items->slugcatid	= $this->_category->slug;
			
			
			//Javascript Slideshow buttons
			$reload_button		= PhocaGalleryHelper::getGalleryReload((int) $this->_category->id, (int) $this->_id);
			$close_button		= PhocaGalleryHelper::getGalleryClose((int) $this->_category->id, (int) $this->_id);
			$close_text			= PhocaGalleryHelper::getGalleryCloseText((int) $this->_category->id, (int) $this->_id);
			$next_button		= PhocaGalleryHelper::getGalleryNext((int) $this->_category->id, (int) $this->_id);
			$prev_button		= PhocaGalleryHelper::getGalleryPrevious((int) $this->_category->id, (int) $this->_id);
			$js_slideshow_data	= PhocaGalleryHelper::getGalleryJsSlideshow((int) $this->_category->id, (int) $this->_id, (int) $this->_slideshow);
			
			// Get file thumbnail or No Image
			$file_name_no			= $items->filename;
			$file_name				= PhocaGalleryHelper::getTitleFromFilenameWithExt($items->filename);
			$image_size				= PhocaGalleryHelper::getImageSizePhoca($items->filename);
			$file_size				= PhocaGalleryHelper::getFileSizePhoca($items->filename);
			
			$file_thumbnail 		= PhocaGalleryHelper::displayFileOrNoImage($items->filename, 'large');
			$link_thumbnail_path	= $file_thumbnail['rel'];
			
			//Image description
			$description			= $items->description;
			
			
			
			
			$file = new JObject();
			//slideshow
			$file->set('closebutton', $close_button);
			$file->set('reloadbutton', $reload_button);
			$file->set('nextbutton', $next_button);
			$file->set('prevbutton', $prev_button);
			$file->set('slideshowbutton', $js_slideshow_data['icons']);
			$file->set('slideshowfiles', $js_slideshow_data['files']);
			$file->set('slideshow', $this->_slideshow);
			//download
			$file->set('closetext', $close_text);
			$file->set('filenameno', $file_name_no);
			$file->set('filename', $file_name);
			$file->set('download', $this->_download);
			$file->set('filesize', $file_size);
			$file->set('imagesize', $image_size[0] . ' x '.$image_size[1]);
			//all
			$file->set('linkthumbnailpath', $link_thumbnail_path);
			//description
			$file->set('description', $description);
		
			if (isset($file))
			{
				$this->_data = $file;
			}
			else
			{
				$this->_data = '';
			}
			return (boolean) $this->_data;	
		}
		return true;
	}

	function _loadCategory()
	{
		if (empty($this->_category))
		{
			$query = 'SELECT c.*, '
			.' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(\':\', c.id, c.alias) ELSE c.id END as slug'
			.' FROM #__phocagallery_categories AS c'
			.' LEFT JOIN #__phocagallery AS a ON a.catid = c.id'
			.' WHERE a.id = '. (int) $this->_id;
			$this->_db->setQuery($query);
			$this->_category = $this->_db->loadObject();
		}
		return true;
	}
	
	
	function _initData()
	{
		// Lets load the content if it doesn't already exist
		if (empty($this->_data))
		{
			$this->_data	= '';
			return (boolean) $this->_data;
		}
		return true;
	}
	
}
?>
