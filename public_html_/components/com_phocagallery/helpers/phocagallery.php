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
jimport( 'joomla.filesystem.folder' ); 
jimport( 'joomla.filesystem.file' );

 class PhocaGalleryHelper
{

	function getPathSet()
	{
		$path['orig_abs_ds'] 	= JPATH_ROOT . DS . 'images' . DS . 'phocagallery' . DS ;
		$path['orig_abs'] 		= JPATH_ROOT . DS . 'images' . DS . 'phocagallery' ;
		$path['orig_rel_ds'] 	= './' . "images/phocagallery/";
		$path['admin_image'] 	= './' . "administrator/components/com_phocagallery/assets/images/";
		$path['front_image'] 	= './' . "components/com_phocagallery/assets/images/";
		return $path;
	}

	function getFormatIconComponent()
	{
		$iconFormat = 'gif';
		$paramsC = JComponentHelper::getParams('com_phocagallery') ;
		
		if ($paramsC->get( 'icon_format' ) != '') {
			$iconFormat = $paramsC->get( 'icon_format' );
		}
		return $iconFormat;
	}
	
	function getFormatIcon ()
	{
		global $mainframe;
		$iconFormat = 'gif';
		$params	= &$mainframe->getParams();
		
		if ($params->get( 'icon_format' ) != '') {
			$iconFormat = $params->get( 'icon_format' );
		}
		return $iconFormat;
	}
	
	function getDisplayIconRandomImage ()
	{
		global $mainframe;
		$displayIconRandomImage = 0;
		$params	= &$mainframe->getParams();
		
		if ($params->get( 'display_icon_random_image' ) != '') {
			$displayIconRandomImage = $params->get( 'display_icon_random_image' );
		}
		return $displayIconRandomImage;
	}
	
	function getImageBackgroundShadow ()
	{
		global $mainframe;
		$imageBackgroundShadow = 'none';
		$params	= &$mainframe->getParams();
		
		if ($params->get( 'image_background_shadow' ) != '') {
			$imageBackgroundShadow = $params->get( 'image_background_shadow' );
		}
		return $imageBackgroundShadow;
	}
		
	//Get thumbnailname
	function getThumbnailName ($filename, $size)
	{
		$path 					= PhocaGalleryHelper::getPathSet();
		$filename_orig_path_abs	= str_replace(DS, '/', JPath::clean($path['orig_abs_ds'] . $filename));
		$filename_orig_path_rel	= str_replace(DS, '/', JPath::clean($path['orig_rel_ds'] . $filename));
		$filename_orig 			= PhocaGalleryHelper::getTitleFromFilenameWithExt($filename);
		
		
		switch ($size)
		{
			case 'large':
			$filename_thumbl 			= 'phoca_thumb_l_'. $filename_orig;
			$thumbnail_name['abs']		= str_replace ($filename_orig, 'thumbs/' . $filename_thumbl, $filename_orig_path_abs);
			$thumbnail_name['rel']		= str_replace ($filename_orig, 'thumbs/' . $filename_thumbl, $filename_orig_path_rel);
			break;
			
			case 'medium':
			$filename_thumbm 			= 'phoca_thumb_m_'. $filename_orig;
			$thumbnail_name['abs']		= str_replace ($filename_orig, 'thumbs/' . $filename_thumbm, $filename_orig_path_abs);
			$thumbnail_name['rel']		= str_replace ($filename_orig, 'thumbs/' . $filename_thumbm, $filename_orig_path_rel);
			break;
			
			default:
			case 'small':
			$filename_thumbs 			= 'phoca_thumb_s_'. $filename_orig;
			$thumbnail_name['abs']		= str_replace ($filename_orig, 'thumbs/' . $filename_thumbs, $filename_orig_path_abs);
			$thumbnail_name['rel']		= str_replace ($filename_orig, 'thumbs/' . $filename_thumbs, $filename_orig_path_rel);
			
			break;	
		}
		return $thumbnail_name;
	}	
		
	
	function getTitleFromFilenameWithoutExt (&$filename)
	{
		$folder_array		= explode('/', $filename);//Explode the filename (folder and file name)
		$count_array		= count($folder_array);//Count this array
		$last_array_value 	= $count_array - 1;//The last array value is (Count array - 1)	
		
		return PhocaGalleryHelper::removeExtension($folder_array[$last_array_value]);
	}
	
	function getTitleFromFilenameWithExt (&$filename)
	{
		$folder_array		= explode('/', $filename);//Explode the filename (folder and file name)
		$count_array		= count($folder_array);//Count this array
		$last_array_value 	= $count_array - 1;//The last array value is (Count array - 1)	
		
		return $folder_array[$last_array_value];
	}
	
	
	/*
	* string original file
	* string size of thumbnailfile
	*/
	function displayFileOrNoImage ($filename, $size)
	{
		$path 			= PhocaGalleryHelper::getPathSet();
		$file_thumbnail = PhocaGalleryHelper::getThumbnailName($filename, $size);
		
		//Thumbnail_file doesn't exists
		if (!JFile::exists($file_thumbnail['abs']))
		{
			switch ($size)
			{
				case 'large':
				$file_thumbnail['rel']	= $path['front_image'] . 'phoca_thumb_l_no_image.' . PhocaGalleryHelper::getFormatIcon();
				break;
				
				case 'medium':
				$file_thumbnail['rel']	= $path['front_image'] . 'phoca_thumb_m_no_image.' . PhocaGalleryHelper::getFormatIcon();
				break;
				
				default:
				case 'small':
				$file_thumbnail['rel']	= $path['front_image'] . 'phoca_thumb_s_no_image.'  . PhocaGalleryHelper::getFormatIcon();
				break;	
			}
		}	
		return $file_thumbnail;	
	}
	
	/*
	* string original file
	* string size of thumbnailfile
	*/
	function displayFileOrNoImageCategories ($filename, $image_categories_size)
	{
		$path = PhocaGalleryHelper::getPathSet();		
		switch ($image_categories_size)
		{	
			// user wants to display only icon folder (parameters) medium
			case 3:
			$file_thumbnail = PhocaGalleryHelper::getThumbnailName($filename, 'medium');
			$file_thumbnail['rel']	= $path['front_image'] . 'icon-folder-medium-images-categories.' . PhocaGalleryHelper::getFormatIcon();
			break;
			
			case 7:
			$file_thumbnail = PhocaGalleryHelper::getThumbnailName($filename, 'medium');
			$file_thumbnail['rel']	= $path['front_image'] . 'icon-folder-medium-images-shadow.' . PhocaGalleryHelper::getFormatIcon();
			break;
			
			// user wants to display only icon folder (parameters) small
			case 2:
			$file_thumbnail = PhocaGalleryHelper::getThumbnailName($filename, 'small');
			$file_thumbnail['rel']	= $path['front_image'] . 'icon-folder-small-images-categories.' . PhocaGalleryHelper::getFormatIcon();
			break;
			
			case 6:
			$file_thumbnail = PhocaGalleryHelper::getThumbnailName($filename, 'small');
			$file_thumbnail['rel']	= $path['front_image'] . 'icon-folder-small-images-shadow.' . PhocaGalleryHelper::getFormatIcon();
			break;
			
			// standard medium image next to category in categories view
			// if the file doesn't exist, it will be displayed folder icon
			case 1:
			$file_thumbnail = PhocaGalleryHelper::getThumbnailName($filename, 'medium');
			if (!JFile::exists($file_thumbnail['abs']))
			{
				$file_thumbnail['rel']	= $path['front_image'] . 'icon-folder-medium-images-categories.' . PhocaGalleryHelper::getFormatIcon();
			}
			break;
			
			case 5:
			$file_thumbnail = PhocaGalleryHelper::getThumbnailName($filename, 'medium');
			if (!JFile::exists($file_thumbnail['abs']))
			{
				$file_thumbnail['rel']	= $path['front_image'] . 'icon-folder-medium-images-shadow.' . PhocaGalleryHelper::getFormatIcon();
			}
			break;
			
			// standard small image next to category in categories view
			// if the file doesn't exist, it will be displayed folder icon
			case 0:
			$file_thumbnail = PhocaGalleryHelper::getThumbnailName($filename, 'small');
			if (!JFile::exists($file_thumbnail['abs']))
			{
				$file_thumbnail['rel']	= $path['front_image'] . 'icon-folder-small-images-categories.' . PhocaGalleryHelper::getFormatIcon();
			}
			break;
			
			case 4:
			default:
			$file_thumbnail = PhocaGalleryHelper::getThumbnailName($filename, 'small');
			if (!JFile::exists($file_thumbnail['abs']))
			{
				$file_thumbnail['rel']	= $path['front_image'] . 'icon-folder-small-images-shadow.' . PhocaGalleryHelper::getFormatIcon();
			}
			break;
		}
		
		return $file_thumbnail;	
	}
	
	/*
	* Displaying image categories instead of small thumbnail
	* string original file
	* string size of thumbnailfile
	*/
	function displayThumbOrFolder ($filename, $size)
	{
		$path 			= PhocaGalleryHelper::getPathSet();
		$file_thumbnail = PhocaGalleryHelper::getThumbnailName($filename, $size);
		$displayIconRandomImage	= PhocaGalleryHelper::getDisplayIconRandomImage();
		$imageBackgroundShadow	= PhocaGalleryHelper::getImageBackgroundShadow();
		
		//Thumbnail_file doesn't exists or user wants to display folder icon
		if (!JFile::exists($file_thumbnail['abs']) || 
		    $displayIconRandomImage != 1) {
			if ( $imageBackgroundShadow != 'none') {
				$file_thumbnail['rel']	= $path['front_image'] . 'icon-folder-medium-images-shadow.' . PhocaGalleryHelper::getFormatIcon();
			} else {
				$file_thumbnail['rel']	= $path['front_image'] . 'icon-folder-medium-images.' . PhocaGalleryHelper::getFormatIcon();
			}
		}	
		return $file_thumbnail;	
	}
	
	
	/*
	* Returns path to folder icon 
	*/
	function displayBackFolder ($size)
	{
		global $mainframe;
		$path 					= PhocaGalleryHelper::getPathSet();
		$thumbnail_name['abs'] 	= '';
		
		// Load the menu object and parameters
		$params	= &$mainframe->getParams();
		
		if ( $params->get( 'image_background_shadow' ) != 'none' ) {
			$file_thumbnail['rel']	= $path['front_image'] . 'icon-up-images-shadow.' . PhocaGalleryHelper::getFormatIcon();
		} else {
			$file_thumbnail['rel']	= $path['front_image'] . 'icon-up-images.' . PhocaGalleryHelper::getFormatIcon();
		}
		return $file_thumbnail;	
	}
	
   /*
	* Get the next button in Gallery - in opened window
	*/
	function getGalleryNext ($catid, $id) 
	{
		//$path = PhocaGalleryHelper::getPathSet();
		
		//Get the ordering of selected id
		$query = "SELECT ordering as ordering FROM #__phocagallery WHERE id=$id";
		$this->_db->setQuery($query);
		$ordering = $this->_db->loadObject();
		
		//Get the catid of selected id
	//	$query = "SELECT catid as catid FROM #__phocagallery WHERE id=$id";
	//	$this->_db->setQuery($query);
	//	$catid = $this->_db->loadObject();
		
		//Select all ids from db_gallery - we search for next_id (!!! next_id can be id without file
		//in the server. If the next id has no file in the server we must go from next_id to next next_id
		$query = "SELECT id as id FROM #__phocagallery WHERE catid = " . (int) $catid . " AND published=1";
		$this->_db->setQuery($query);
		$next_all = $this->_db->loadObjectList();
			
		$next_ordering = (int) $ordering->ordering + 1;//ordering of next_id
		$next_end = 0;//If we find next_id and this next_id has file on the server we must not find next next_id
		$next = JHTML::_('image', 'components/com_phocagallery/assets/images/icon-next-grey.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Next image' ));//non-active button will be displayed
		
		foreach ($next_all as $key => $value)
		{
			$query = "SELECT id as id, filename as filename FROM #__phocagallery WHERE ordering = ". (int) $next_ordering." AND catid = " . (int) $catid . " AND published=1";
			$this->_db->setQuery($query);
			$next_arrow = $this->_db->loadObject();
			
			if (isset($next_arrow) && $next_end == 0)
			{
				if ($next_arrow->id && $next_ordering > 0)
				{
					$next = '<a href="'.JRoute::_('index.php?option=com_phocagallery&view=phocagalleryd&catid='. (int) $catid . '&id='.$next_arrow->id.'&tmpl=component').'"'
						    .' title="'.JText::_( 'Next image' ).'" id="next" onclick="disableBackAndNext()" >'
							. JHTML::_('image', 'components/com_phocagallery/assets/images/icon-next.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Next image' )).'</a>';
					$next_end = 1;
				}
				else
				{
					$next = JHTML::_('image', 'components/com_phocagallery/assets/images/icon-next-grey.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Next image' ));
					$next_end = 1;
				}
			}
			else
			{
				$next_ordering++;// we have next_id but this next id has no file on the server we must find next next_id
			}
		}
		return $next;
	}
	
   /*
	* Get the prev button in Gallery - in openwindow
	*/
	function getGalleryPrevious ($catid, $id) 
	{
		$slideshow=0;
		//$path = PhocaGalleryHelper::getPathSet();
		
		//Get the ordering of selected id
		$query = "SELECT ordering as ordering FROM #__phocagallery WHERE id=$id";
		$this->_db->setQuery($query);
		$ordering = $this->_db->loadObject();
		
		//Get the catid of selected id
	//	$query = "SELECT catid as catid FROM #__phocagallery WHERE id=$id";
	//	$this->_db->setQuery($query);
	//	$catid = $this->_db->loadObject();
		
		//Select all ids from db_gallery - we search for next_id (!!! next_id can be id without file
		//in the server. If the next id has no file in the server we must go from next_id to next next_id
		$query = "SELECT id as id FROM #__phocagallery WHERE catid = " . (int) $catid . " AND published=1";
		$this->_db->setQuery($query);
		$prev_all = $this->_db->loadObjectList();
			
		$prev_ordering = (int) $ordering->ordering - 1;//ordering of next_id
		$prev_end = 0;//If we find next_id and this next_id has file on the server we must not find next next_id
		$prev = JHTML::_('image', 'components/com_phocagallery/assets/images/icon-prev-grey.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Previous image' ));//non-active button will be displayed
		
		foreach ($prev_all as $key => $value)
		{
			$query = "SELECT id as id, filename as filename FROM #__phocagallery WHERE ordering = ". (int) $prev_ordering." AND catid = " . (int) $catid . " AND published=1";;
			$this->_db->setQuery($query);
			$prev_arrow = $this->_db->loadObject();
			
			if (isset($prev_arrow) && $prev_end == 0)
			{
				if ($prev_arrow->id && $prev_ordering > 0)
				{
					$prev = '<a href="'.JRoute::_('index.php?option=com_phocagallery&view=phocagalleryd&catid='. (int) $catid. '&id='.$prev_arrow->id.'&tmpl=component').'"'
						    .' title="'.JText::_( 'Previous image' ).'" >'
							.JHTML::_('image', 'components/com_phocagallery/assets/images/icon-prev.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Previous image' )).'</a>';
					$prev_end = 1;
				}
				else
				{
					$prev = JHTML::_('image', 'components/com_phocagallery/assets/images/icon-prev-grey.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Previous image' ));
					$prev_end = 1;
				}

			}
			else
			{
				$prev_ordering--;// we have next_id but this next id has no file on the server we must find next next_id
			}
		}
		return $prev;
	}
	
   /*
	* Get Slideshow  - 1. data for javascript, 2. data for displaying buttons
	*/
	function getGalleryJsSlideshow($catid, $id, $slideshow=0)
	{
		$path = PhocaGalleryHelper::getPathSet();
		
		// 1. GET DATA FOR JAVASCRIPT
		$js_slideshow_data['files'] = '';
		
		//Get the catid of selected id
	//	$query = "SELECT catid as catid FROM #__phocagallery WHERE id=$id";
	//	$this->_db->setQuery($query);
	//	$catid = $this->_db->loadObject();
		
		//Get filename of all photos
		$query = "SELECT filename as filename FROM #__phocagallery WHERE catid=".(int) $catid." AND published=1 ORDER BY catid, ordering";
		$this->_db->setQuery($query);
		$filename_all = $this->_db->loadObjectList();
		
		if (isset($filename_all))
		{
			$j = 0;
			foreach ($filename_all as $key => $value)
			{
				$file_thumbnail = PhocaGalleryHelper::getThumbnailName ($value->filename, 'large');
				
				if (is_file($file_thumbnail['abs']))
				{
					//$file_name = JURI::base(true).'/' . "images/phocagallery/thumbs/phoca_thumb_l_" . $value->filename;	
					
					
					$js_slideshow_data['files'] .= 'fadeimages['.$j.']=["'. JURI::base(true). str_replace('./', '/', $file_thumbnail['rel']).'", "", ""];'; 
					
				}
				else
				{
					$file_thumbnail = JURI::base(true).'/' . "components/com_phocagallery/assets/images/phoca_thumb_l_no_image." . PhocaGalleryHelper::getFormatIcon();
					$js_slideshow_data['files'] .= 'fadeimages['.$j.']=["'.$file_thumbnail.'", "", ""];';
				}
				$j++;
			}
		}
	
		// 2. GET DATA FOR DISPLAYING SLIDESHOW BUTTONS
		//We can display slideshow option if there is more than one foto
		//But in database there can be more photos - more rows but if file is in db but it doesn't exist, we don't count it
		//$foto_count = SQLQuery::selectOne($mdb2, "SELECT COUNT(*) FROM $db_gallery WHERE siteid=$id");
		$foto_count = 0;//how many photos there are (but only photos they have file on the server saved	
		if (isset($filename_all))
		{
			foreach ($filename_all as $key => $value)
			{
				//if (is_file($folder['originalabs'] . $value->filename))
				//{
					$foto_count++;
				//}
			}
		}
		
		if ($foto_count > 1)//there are two or more photos, show pause and play icons
		{
			if ($slideshow==1)//Data from GET['slideshow']
			{
				
				$js_slideshow_data['icons'] = '<a href="'.JRoute::_('index.php?option=com_phocagallery&view=phocagalleryd&catid='.$catid.'&id='.$id.'&tmpl=component&phocaslideshow=0').'" title="'.JText::_( 'Stop slideshow' ).'" >'
				.JHTML::_('image', 'components/com_phocagallery/assets/images/icon-stop.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Stop slideshow' )).'</a>'
				.'</td><td>'//.'&nbsp;'
				.JHTML::_('image', 'components/com_phocagallery/assets/images/icon-play-grey.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Start slideshow' ));
			}
			else
			{
				$js_slideshow_data['icons'] = JHTML::_('image', 'components/com_phocagallery/assets/images/icon-stop-grey.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Stop slideshow' ))
				.'</td><td>'//.'&nbsp;'
				.'<a href="'.JRoute::_('index.php?option=com_phocagallery&view=phocagalleryd&catid='.$catid.'&id='.$id.'&tmpl=component&phocaslideshow=1').'" title="'.JText::_( 'Start slideshow' ).'">'
				. JHTML::_('image', 'components/com_phocagallery/assets/images/icon-play.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Start slideshow' )).'</a>';
			}
		}
		else
		{
			$js_slideshow_data['icons'] = '';
		}
		return $js_slideshow_data;//files (javascript) and icons (buttons)		
	}
	
	function getGalleryReload($catid, $id)
	{
		$reload =  '<a href="'.JRoute::_('index.php?option=com_phocagallery&view=phocagalleryd&catid='.$catid.'&id='.$id.'&tmpl=component').'" onclick="%onclickreload%" title="'.JText::_( 'Refresh' ).'" >'.JHTML::_('image', 'components/com_phocagallery/assets/images/icon-reload.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Refresh' )).'</a>';
		
		//there must be ?tmpl=component# instead of # - because if user use SEF - tmpl=component is not in
		//$reload =  '<a href="?tmpl=component#" onclick="%onclickreload%" title="'.JText::_( 'Refresh' ).'" >'.JHTML::_('image', 'components/com_phocagallery/assets/images/icon-reload.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Refresh' )).'</a>';
		
		//$reload =  '<a href="#" onclick="%onclickreload%" title="'.JText::_( 'Refresh' ).'" >'.JHTML::_('image', 'components/com_phocagallery/assets/images/icon-reload.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Refresh' )).'</a>';
	
		return $reload;
	}
	
	function getGalleryClose($catid, $id)
	{
		$close =  '<a href="'.JRoute::_('index.php?option=com_phocagallery&view=phocagalleryd&catid='.$catid.'&id='.$id.'&tmpl=component').'" onclick="%onclickclose%" title="'.JText::_( 'Close window').'" >'. JHTML::_('image', 'components/com_phocagallery/assets/images/icon-exit.' . PhocaGalleryHelper::getFormatIcon(), JText::_( 'Close window' )).'</a>';
		
		return $close;
	}
	
	function getGalleryCloseText($catid, $id)
	{
		$close =  '<a style="text-decoration:underline" href="'.JRoute::_('index.php?option=com_phocagallery&view=phocagalleryd&catid='.$catid.'&id='.$id.'&tmpl=component').'" onclick="%onclickclose%" title="'.JText::_( 'Close window').'" >'. JText::_( 'Close window' ).'</a>';
		
		return $close;
	}
	
	
	function wordDelete($string,$length,$end)
	{
		if (JString::strlen($string) < $length || JString::strlen($string) == $length)
		{
			return $string;
		}
		else
		{
			return JString::substr($string, 0, $length) . $end;
		}
	}
	
	function getImageSizePhoca($filename)
	{
		$path 					= PhocaGalleryHelper::getPathSet();
		$filename_orig_path_abs	= str_replace(DS, '/', JPath::clean($path['orig_abs_ds'] . $filename));
		
		
		if (!JFile::exists($filename_orig_path_abs))
		{
			
			$filename_orig_path_abs	= $path['front_image'] . 'phoca_thumb_l_no_image.' . PhocaGalleryHelper::getFormatIcon();
		}
			
		return getimagesize($filename_orig_path_abs);
	}
	function getFileSizePhoca($filename)
	{
		$path 					= PhocaGalleryHelper::getPathSet();
		$filename_orig_path_abs	= str_replace(DS, '/', JPath::clean($path['orig_abs_ds'] . $filename));
		
		if (!JFile::exists($filename_orig_path_abs))
		{
			
			$filename_orig_path_abs	= $path['front_image'] . 'phoca_thumb_l_no_image.' . PhocaGalleryHelper::getFormatIcon();
		}
		
		return PhocaGalleryHelper::getFileSizeReadable(filesize($filename_orig_path_abs));
	}
	
	function getFileSizeReadable ($size, $retstring = null)//http://aidanlister.com/repos/v/function.size_readable.php
	{
        $sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        if ($retstring === null) { $retstring = '%01.2f %s'; }
        $lastsizestring = end($sizes);
        foreach ($sizes as $sizestring) {
                if ($size < 1024) { break; }
                if ($sizestring != $lastsizestring) { $size /= 1024; }
        }
        if ($sizestring == $sizes[0]) { $retstring = '%01d %s'; } // Bytes aren't normally fractional
        return sprintf($retstring, $size, $sizestring);
	}
	
	
	// Create tree of categories and subcategories - we need strings e.g. (first, first >> second, ...)
	// text is name because of select
	// value is id because of select
	function CategoryTree($data, $tree, $id=0, $text='')
	{		
		
		foreach ($data as $key)
		{	
			$show_text =  $text . $key->text;	
			if ($key->parentid == $id)
			{	
				$tree[$key->value] = $show_text;
				$tree = PhocaGalleryHelper::CategoryTree($data, $tree, $key->value, $show_text . " &raquo; " );	
			}	
		}
		return($tree);
	}
	
	// Rename subcategorie e.g. 1 first, 2 second (subcategory of 1) ==> 1 first, 2 first >> second
	// text is name because of select
	// value is id because of select
	function CategoryTreeCreating($phocagallerys, $tree, $id=0)
	{
		
		$phocagallerys_tree_array = array();
		$phocagallerys_tree_object = new JObject();
		

		foreach ($tree as $key => $value)
		{
			foreach ($phocagallerys as $key2 => $value2)
			{
				// Display category parent
				if ($key == $value2->value)
				{
					$phocagallerys_tree_object = new JObject();
					$phocagallerys_tree_object->text = $value;
					$phocagallerys_tree_object->value = $key;
					$phocagallerys_tree_array[] = $phocagallerys_tree_object;
				}
			}
		}

		return $phocagallerys_tree_array;
	}
}
?>