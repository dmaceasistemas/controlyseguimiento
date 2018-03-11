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
	var $stopThumbnailsCreating; // display the posibility (link) to disable the thumbnails creating

	function getPathSet()
	{
		$path['orig_abs_ds'] 	= JPATH_ROOT . DS . 'images' . DS . 'phocagallery' . DS ;
		$path['orig_abs'] 		= JPATH_ROOT . DS . 'images' . DS . 'phocagallery' ;
		$path['orig_rel_ds'] 	= '../' . "images/phocagallery/";
		return $path;
	}
		
	function getFileResize($size='all')
	{	
		
		// Get width and height from default settings
		$params = JComponentHelper::getParams('com_phocagallery') ;
		
		$large_image_width		=	640;
		$large_image_height		=	480;
		$medium_image_width		=	100;
		$medium_image_height	=	100;
		$small_image_width		=	50;
		$small_image_height		=	50;
		
		if ($params->get( 'large_image_width' ) != '') {
			$large_image_width = $params->get( 'large_image_width' );
		}
		if ($params->get( 'large_image_height' ) != '') {
			$large_image_height = $params->get( 'large_image_height' );
		}
		if ($params->get( 'medium_image_width' ) != '') {
			$medium_image_width = $params->get( 'medium_image_width' );
		}
		if ($params->get( 'medium_image_height' ) != '') {
			$medium_image_height = $params->get( 'medium_image_height' );
		}
		if ($params->get( 'small_image_width' ) != '') {
			$small_image_width = $params->get( 'small_image_width' );
		}
		if ($params->get( 'small_image_height' ) != '') {
			$small_image_height = $params->get( 'small_image_height' );
		}
		
		/*
		$large_width	= $GLOBALS['size']['largewidth'];
		$large_height	= $GLOBALS['size']['largeheight'];
		$medium_width	= $GLOBALS['size']['mediumwidth'];
		$medium_height	= $GLOBALS['size']['mediumheight'];
		$small_width	= $GLOBALS['size']['smallwidth'];
		$small_height	= $GLOBALS['size']['smallheight'];*/
		
		switch ($size)
		{			
			case 'large':
			$file_resize['width']	=	$large_image_width;
			$file_resize['height']	=	$large_image_height;
			break;
			
			case 'medium':
			$file_resize['width']	=	$medium_image_width;
			$file_resize['height']	=	$medium_image_height;
			break;
			
			case 'small':
			$file_resize['width']	=	$small_image_width;
			$file_resize['height']	=	$small_image_height;
			break;
			
			default:
			case 'all':
			$file_resize['smallwidth']	=	$small_width;
			$file_resize['smallheight']	=	$small_height;
			$file_resize['mediumwidth']	=	$medium_width;
			$file_resize['mediumheight']=	$medium_height;
			$file_resize['largewidth']	=	$large_width;
			$file_resize['largeheight']	=	$large_height;
			break;			
		}
		return $file_resize;
	}
	
	//---------------------------------
	//Main Thumbnail creating function
	//---------------------------------
	//file 		= abc.jpg
	//file_no	= folder/abc.jpg
	//if small, medium, large = 1, create small, medium, large thumbnail
	function getOrCreateThumbnail($orig_path, $file_no, $refresh_url, $small=0, $medium=0,$large=0)
	{
		$onlyThumbnailInfo = 0;
		if ($small == 0 && $medium == 0 && $large == 0) {
			$onlyThumbnailInfo = 1;
		}
		
		$path 				= PhocaGalleryHelper::getPathSet();
		$orig_path_server 	= str_replace(DS, '/', $path['orig_abs'] .'/');
	
	
		$file['name']							= PhocaGalleryHelper::getTitleFromFilenameWithExt($file_no);
		$file['path_with_name']					= str_replace(DS, '/', JPath::clean($orig_path.DS.$file_no));
		$file['path_with_name_relative']		= $path['orig_rel_ds'] . str_replace($orig_path_server, '', $file['path_with_name']);
		$file['path_with_name_relative_no']		= str_replace($orig_path_server, '', $file['path_with_name']);
		
		$file['path_without_name']				= str_replace(DS, '/', JPath::clean($orig_path.DS));
		$file['path_without_name_relative']		= $path['orig_rel_ds'] . str_replace($orig_path_server, '', $file['path_without_name']);
		$file['path_without_name_relative_no']	= str_replace($orig_path_server, '', $file['path_without_name']);
		$file['path_without_name_thumbs'] 		= $file['path_without_name'] .'thumbs';
		$file['path_without_name_no'] 			= str_replace($file['name'], '', $file['path_with_name']);
		$file['path_without_name_thumbs_no'] 	= str_replace($file['name'], '', $file['path_with_name'] .'thumbs');
		
		
		$ext = strtolower(JFile::getExt($file['name']));
		switch ($ext)
		{
			case 'jpg':
			case 'png':
			case 'gif':
			case 'jpeg':

			//Get File thumbnails name
			$thumbnail_file_s 	= PhocaGalleryHelper::getThumbnailName ($file_no, 'small');
			$file['thumb_name_s_no_abs'] = $thumbnail_file_s['abs'];
			$file['thumb_name_s_no_rel'] = $thumbnail_file_s['rel'];
			//$file['thumb_name_s_no']= str_replace($file['name'], 'thumbs/' . $file['thumb_name_s'], $file_no);
			
			$thumbnail_file_m  	= PhocaGalleryHelper::getThumbnailName ($file_no, 'medium');
			$file['thumb_name_m_no_abs'] = $thumbnail_file_m['abs'];
			$file['thumb_name_m_no_rel'] = $thumbnail_file_m['rel'];
			//$file['thumb_name_m_no']= str_replace($file['name'], 'thumbs/' . $file['thumb_name_m'], $file_no);
			
			$thumbnail_file_l	= PhocaGalleryHelper::getThumbnailName ($file_no, 'large');
			$file['thumb_name_l_no_abs'] = $thumbnail_file_l['abs'];
			$file['thumb_name_l_no_rel'] = $thumbnail_file_l['rel'];
			//$file['thumb_name_l_no']= str_replace($file['name'], 'thumbs/' . $file['thumb_name_l'], $file_no);
			

			// We want only information from the pictures
			if ( $onlyThumbnailInfo == 0) {

				//Create thumbnail folder if not exists
				$creatingFolder = "ErrorCreatingFolder";
				$creatingFolder = PhocaGalleryHelper::createFolderThumbnail($file['path_without_name_no'], $file['path_without_name_thumbs_no'] . '/' );
				
				$thumbInfo = $file_no;	
				
				switch ($creatingFolder)
				{
					case 'Success':
					//case 'ThumbnailExists':
					case 'DisabledThumbCreation':
					//case 'OnlyInformation':
					break;
					
					default:
						PhocaGalleryHelper::getProcessPage( $file['name'], $thumbInfo,  $refresh_url, $creatingFolder);exit;
						
					break;	
				}
				
				// Folder must exist
				if (JFolder::exists($file['path_without_name_thumbs_no']))
				{				
					//There are a lot of photos, please create thumbnails
					
					//Small thumbnail
					if ($small == 1) {
						$creatingS = PhocaGalleryHelper::createFileThumbnail($file['path_with_name'], $file['thumb_name_s_no_abs'], 'small');
					} else {
						$creatingS = 'ThumbnailExists';// in case we only need medium or large, because of if clause bellow
					}
					
					//Medium thumbnail
					if ($medium == 1) {
						$creatingM = PhocaGalleryHelper::createFileThumbnail($file['path_with_name'], $file['thumb_name_m_no_abs'], 'medium');
					} else {
						$creatingM = 'ThumbnailExists'; // in case we only need small or large, because of if clause bellow
					}
					
					//Large thumbnail
					if ($large == 1) {
						$creatingL = PhocaGalleryHelper::createFileThumbnail($file['path_with_name'], $file['thumb_name_l_no_abs'], 'large');
					} else {
						$creatingL = 'ThumbnailExists'; // in case we only need small or medium, because of if clause bellow
					}
					
					
					// Error messages for all 3 thumbnails (if the message contains error string, we got error
					// Other strings can be:
					// - ThumbnailExists  - do not display error message nor success page
					// - OnlyInformation - do not display error message nor success page
					// - DisabledThumbCreation - do not display error message nor success page
					
					$creatingSError = false;
					$creatingMError = false;
					$creatingLError = false;
					$creatingSError = preg_match("/Error/i", $creatingS);
					$creatingMError = preg_match("/Error/i", $creatingM);
					$creatingLError = preg_match("/Error/i", $creatingL);
					
					// There is an error while creating thumbnail in m or in s or in l
					if ($creatingSError || $creatingMError || $creatingLError) {
						if ($creatingSError) {
							$creatingError = $creatingS;
						}
						if ($creatingMError) {
							$creatingError = $creatingM;
						}
						if ($creatingLError) {
							$creatingError = $creatingL;// if all or two errors appear, we only display the last error message	
						}								// because the errors in this case is the same
						PhocaGalleryHelper::getProcessPage( $file['name'], $thumbInfo, $refresh_url, $creatingError);exit;
					} else if ($creatingS == 'Success' && $creatingM == 'Success' && $creatingL == 'Success') {
						PhocaGalleryHelper::getProcessPage( $file['name'], $thumbInfo, $refresh_url);exit;
					} else if ($creatingS == 'Success' && $creatingM == 'Success' && $creatingL == 'ThumbnailExists') {
						PhocaGalleryHelper::getProcessPage( $file['name'], $thumbInfo, $refresh_url);exit;
					} else if ($creatingS == 'Success' && $creatingM == 'ThumbnailExists' && $creatingL == 'ThumbnailExists') {
						PhocaGalleryHelper::getProcessPage( $file['name'], $thumbInfo, $refresh_url);exit;
					} else if ($creatingS == 'Success' && $creatingM == 'ThumbnailExists' && $creatingL == 'Success') {
						PhocaGalleryHelper::getProcessPage( $file['name'], $thumbInfo, $refresh_url);exit;
					} else if ($creatingS == 'ThumbnailExists' && $creatingM == 'ThumbnailExists' && $creatingL == 'Success') {
						PhocaGalleryHelper::getProcessPage( $file['name'], $thumbInfo, $refresh_url);exit;
					} else if ($creatingS == 'ThumbnailExists' && $creatingM == 'Success' && $creatingL == 'Success') {
						PhocaGalleryHelper::getProcessPage( $file['name'], $thumbInfo, $refresh_url);exit;
					} else if ($creatingS == 'ThumbnailExists' && $creatingM == 'Success' && $creatingL == 'ThumbnailExists') {
						PhocaGalleryHelper::getProcessPage( $file['name'], $thumbInfo, $refresh_url);exit;
					}

						
					// Old Error handling (not for all thumbs)
					//Refresh the site after creating thumbnails - we can do e.g. 100 thumbanails
				/*	switch ($creating)
					{
						case 'Success':
							PhocaGalleryHelper::getProcessPage( $file['name'], $refresh_url);
						break;
						
						case 'ThumbnailExists':
						case 'DisabledThumbCreation':
						case 'OnlyInformation':
						break;
						
						default:
							PhocaGalleryHelper::getProcessPage( $file['name'], $refresh_url, $creating);
						break;						
					}*/
				}
			}
			break;
		}
		return $file;
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
	
	function createFolderThumbnail($folder_original, $folder_thumbnail)
	{	
		$paramsC = JComponentHelper::getParams('com_phocagallery');
		$enable_thumb_creation = 1;
		if ($paramsC->get( 'enable_thumb_creation' ) != '') {
			$enable_thumb_creation = $paramsC->get( 'enable_thumb_creation' );
		}
		// disable or enable the thumbnail creation
		if ($enable_thumb_creation == 1) {

			if (JFolder::exists($folder_original))
			{
				if (strlen($folder_thumbnail) > 0)
				{
					$folder_thumbnail = JPath::clean($folder_thumbnail);				
					if (!is_dir($folder_thumbnail) && !is_file($folder_thumbnail))
					{
						@JFolder::create($folder_thumbnail, 0777 );
						@JFile::write($folder_thumbnail.DS."index.html", "<html>\n<body bgcolor=\"#FFFFFF\">\n</body>\n</html>");
						// folder was not created
						if (!is_dir($folder_thumbnail)) {
							return "ErrorCreatingFolder";	
						}
					}
				}
			}
			return "Success";
		} else {
			return 'DisabledThumbCreation'; // User have disabled the thumbanil creation e.g. because of error
		}
	}
	
	
	function createFileThumbnail($file_original, $file_thumbnail, $size)
	{	
		
		$paramsC = JComponentHelper::getParams('com_phocagallery');
		$enable_thumb_creation = 1;
		if ($paramsC->get( 'enable_thumb_creation' ) != '') {
			$enable_thumb_creation = $paramsC->get( 'enable_thumb_creation' );
		}
		// disable or enable the thumbnail creation
		if ($enable_thumb_creation == 1) {
		
			$file_original 	= str_replace(DS, '/', JPath::clean($file_original));
			$file_thumbnail = str_replace(DS, '/', JPath::clean($file_thumbnail));	
			$file_resize	= PhocaGalleryHelper::getFileResize($size);
			
			if (JFile::exists($file_original))
			{
				//file doesn't exist, create thumbnail
				if (!JFile::exists($file_thumbnail)) {
					$createdThumb = 'Error4';
					//Don't do thumbnail if the file is smaller (width, height) than the possible thumbnail
					list($width, $height) = GetImageSize($file_original);
					//larger
					if ($width > $file_resize['width'] || $height > $file_resize['height']) {
					
						$createdThumb = PhocaGalleryHelper::imageMagic($file_original, $file_thumbnail, $file_resize['width'] , $file_resize['height']);
						
					} else {
						$createdThumb = PhocaGalleryHelper::imageMagic($file_original, $file_thumbnail, $width , $height);
					}
					return $createdThumb;//thumbnail now created
				} else {
					return 'ThumbnailExists';//thumbnail exists
				}	
			} else {
				return 'ErrorFileOriginalNotExists';
			}
			return 'Error3';
		} else {
			return 'DisabledThumbCreation'; // User have disabled the thumbanil creation e.g. because of error
		}
	}
	
	
	function displayStopThumbnailsCreating()
	{
		// 1 ... link was displayed
		// 0 ... display the link "Stop ThumbnailsCreation
		
		if (!isset($this->stopThumbnailsCreating)) {
			$this->stopThumbnailsCreating = 0;
		}
		
		$uri 		= & JFactory::getURI();
		$positioni = strpos($uri->toString(), "view=phocagalleryi");
						
		if ($positioni === false)//we are in whole window - not in modal box
		{	
			if ($this->stopThumbnailsCreating == 0)
			{
				// Add stop thumbnails creation in case e.g. of Fatal Error which returns 'ImageCreateFromJPEG'
				$stopText = '<div style="text-align:right;padding:10px"><a style="font-family: sans-serif, Arial;font-weight:bold;color:#fc0000;font-size:14px;" href="index.php?option=com_phocagallery&controller=phocagallery&task=disablethumbs">' .JText::_( 'Stop Thumbnails Creation' ).'</a></div>';
				$this->stopThumbnailsCreating = 1;// it was added to the site, don't add the same code (because there are 3 thumnails - small, medium, large)
				return $stopText;
				
			} else {
				return '';
			}
		} else {
			$this->stopThumbnailsCreating = 1;
		}
	}			

	/**
	* need GD library (first PHP line WIN: dl("php_gd.dll"); UNIX: dl("gd.so");
	* www.boutell.com/gd/
	* interval.cz/clanky/php-skript-pro-generovani-galerie-obrazku-2/
	* cz.php.net/imagecopyresampled
	* www.linuxsoft.cz/sw_detail.php?id_item=871
	* www.webtip.cz/art/wt_tech_php/liquid_ir.html
	* php.vrana.cz/zmensovani-obrazku.php
	* diskuse.jakpsatweb.cz/
	*
	* @param string $file_in Vstupni soubor (mel by existovat)
	* @param string $file_out Vystupni soubor, null ho jenom zobrazi (taky kdyz nema pravo se zapsat :)
	* @param int $width Vysledna sirka (maximalni)
	* @param int $height Vysledna vyska (maximalni)
	* @param bool $crop Orez (true, obrazek bude presne tak velky), jinak jenom Resample (udane maximalni rozmery)
	* @param int $type_out IMAGETYPE_type vystupniho obrazku
	* @return bool Chyba kdyz vrati false
	*/
	function imageMagic($file_in, $file_out=null, $width=null, $height=null, $crop=null, $type_out=null)
	{	

		
		$stopText = PhocaGalleryHelper::displayStopThumbnailsCreating();
		echo $stopText;
		$memory = 8;
		$memoryLimitChanged = 0;
		$memory = (int)ini_get( 'memory_limit' );
		if ($memory == 0) {
			$memory = 8;
		}

		if ($file_in !== '' && file_exists($file_in)) {
			
			//array of width, height, IMAGETYPE, "height=x width=x" (string)
	        list($w, $h, $type) = GetImageSize($file_in);
			
			if ($w > 0 && $h > 0) {// we got the info from GetImageSize

		        // size of the image
		        if ($width == null || $width == 0) { // no width added
		            $width = $w;
		        }
				else if ($height == null || $height == 0) { // no height, adding the same as width
		            $height = $width;
		        }
				if ($height == null || $height == 0) { // no height, no width
		            $height = $h;
		        }

		        // miniaturizing
		        if (!$crop) { // new size - nw, nh (new width/height)
		            $scale = (($width / $w) < ($height / $h)) ? ($width / $w) : ($height / $h); // smaller rate
		            $src = array(0,0, $w, $h);
		            $dst = array(0,0, floor($w*$scale), floor($h*$scale));
		        }
		        else { // will be cropped
		            $scale = (($width / $w) > ($height / $h)) ? ($width / $w) : ($height / $h); // greater rate
		            $newW = $width/$scale;    // check the size of in file
		            $newH = $height/$scale;

		            // which side is larger (rounding error)
		            if (($w - $newW) > ($h - $newH)) {
		                $src = array(floor(($w - $newW)/2), 0, floor($newW), $h);
		            }
		            else {
		                $src = array(0, floor(($h - $newH)/2), $w, floor($newH));
		            }

		            $dst = array(0,0, floor($width), floor($height));
		        }
			}

			if ($memory < 50) {
				ini_set('memory_limit', '50M');
				$memoryLimitChanged = 1;
			}
			// Resampling
			// in file
	        switch($type)
	        {
	            case IMAGETYPE_JPEG:
					if (!function_exists('ImageCreateFromJPEG')) {
						return 'ErrorNoJPGFunction';
					}
					$image1 = ImageCreateFromJPEG($file_in);
					break;
	            case IMAGETYPE_PNG :
					if (!function_exists('ImageCreateFromPNG')) {
						return 'ErrorNoPNGFunction';
					}
					$image1 = ImageCreateFromPNG($file_in);
					break;
	            case IMAGETYPE_GIF :
					if (!function_exists('ImageCreateFromGIF')) {
						return 'ErrorNoGIFFunction';
					}
					$image1 = ImageCreateFromGIF($file_in);
					break;
	            case IMAGETYPE_WBMP:
					if (!function_exists('ImageCreateFromWBMP')) {
						return 'ErrorNoWBMPFunction';
					}
					$image1 = ImageCreateFromWBMP($file_in);
					break;
	            default:
					return 'ErrorNotSupportedImage';
					break;
	        }
			
			if ($image1)
	        {
	            // protection against invalid image dimensions
				/*foreach ($dst as $kdst =>$vdst) {
					if ($dst[$kdst] == 0 ) {
					$dst[$kdst] = 1;
					}
				} */
				$image2 = @ImageCreateTruecolor($dst[2], $dst[3]);
				if (!$image2) {
					return 'ErrorNoImageCreateTruecolor';
				}
				ImageCopyResampled($image2, $image1, $dst[0],$dst[1], $src[0],$src[1], $dst[2],$dst[3], $src[2],$src[3]);

	            // display the image
	            if ($file_out == null) {
	                header("Content-type: ". image_type_to_mime_type($type_out));
	            }
				
				// out file
		        if ($type_out == null) {    // no bitmap
		            $type_out = ($type == IMAGETYPE_WBMP) ? IMAGETYPE_PNG : $type;
		        }
				switch($type_out)
				{
		            case IMAGETYPE_JPEG:
						if (!function_exists('ImageJPEG')) {
							return 'ErrorNoJPGFunction';
						}	
						if (!@ImageJPEG($image2, $file_out, 85)) {
							return 'ErrorWriteFile';
						}
						break;
		            case IMAGETYPE_PNG :
						if (!function_exists('ImagePNG')) {
							return 'ErrorNoPNGFunction';
						}
						if (!@ImagePNG($image2, $file_out)) {
							return 'ErrorWriteFile';
						}
						break;
		            case IMAGETYPE_GIF :
						if (!function_exists('ImageGIF')) {
							return 'ErrorNoGIFFunction';
						}
						if (!@ImageGIF($image2, $file_out)) {
							return 'ErrorWriteFile';
						}
						break;
		            default:
						return 'ErrorNotSupportedImage';
						break;
				}
				
				// free memory
				ImageDestroy($image1);
	            		ImageDestroy($image2);
	            
				if ($memoryLimitChanged == 1) {
					$memoryString = $memory . 'M';
					ini_set('memory_limit', $memoryString);
				}
	            return 'Success'; // Success
	        } else {
				return 'Error1';
			}
			if ($memoryLimitChanged == 1) {
				$memoryString = $memory . 'M';
				ini_set('memory_limit', $memoryString);
			}
	    }
		return 'Error2';
	}
	
	/*phocagallery*/
	function deleteFileThumbnail ($filename, $small=0, $medium=0, $large=0)
	{			
		//Get folder variables from Helper
		$path 				= PhocaGalleryHelper::getPathSet();
		$filename_orig_path	= str_replace(DS, '/', JPath::clean($path['orig_abs_ds'] . $filename));
		$filename_orig 		= PhocaGalleryHelper::getTitleFromFilenameWithExt($filename);
		
		
		if ($small == 1)
		{
			$filename_thumbs = PhocaGalleryHelper::getThumbnailName ($filename, 'small');
			//$filename_thumbs = str_replace ($filename_orig, 'thumbs/' . $filename_thumbs, $filename_orig_path);
			if (JFile::exists($filename_thumbs['abs']))
			{
				JFile::delete($filename_thumbs['abs']);
			}
		}
		
		if ($medium == 1)
		{
			$filename_thumbm = PhocaGalleryHelper::getThumbnailName ($filename, 'medium');
			//$filename_thumbm = str_replace ($filename_orig, 'thumbs/' . $filename_thumbm, $filename_orig_path);
			if (JFile::exists($filename_thumbm['abs']))
			{
				JFile::delete($filename_thumbm['abs']);
			}
		}
		
		if ($large == 1)
		{
			$filename_thumbl = PhocaGalleryHelper::getThumbnailName ($filename, 'large');
			//$filename_thumbl = str_replace ($filename_orig, 'thumbs/' . $filename_thumbl, $filename_orig_path);
			if (JFile::exists($filename_thumbl['abs']))
			{
				JFile::delete($filename_thumbl['abs']);
			}
		}
		return true;
	}
	
	
	/*
	 * Clear Thumbs folder - if there are files in the thumbs directory but not original files e.g.:
	 * phoca_thumbs_l_some.jpg exists in thumbs directory but some.jpg doesn't exists - delete it
	 */
	function cleanThumbsFolder()
	{
		//Get folder variables from Helper
		$path = PhocaGalleryHelper::getPathSet();
		
		// Initialize variables
		$orig_path = $path['orig_abs_ds'];
		$orig_path_server = str_replace(DS, '/', $path['orig_abs'] .'/');

		// Get the list of files and folders from the given folder
		$file_list 		= JFolder::files($orig_path, '', true, true);
			
		// Iterate over the files if they exist
		if ($file_list !== false)
		{
			foreach ($file_list as $file)
			{	
				if (is_file($file) && substr($file, 0, 1) != '.' && strtolower($file) !== 'index.html')
				{
					//Clean absolute path
					$file = str_replace(DS, '/', JPath::clean($file));
					
					$positions = strpos($file, "phoca_thumb_s_");//is there small thumbnail
					$positionm = strpos($file, "phoca_thumb_m_");//is there medium thumbnail
					$positionl = strpos($file, "phoca_thumb_l_");//is there large thumbnail
					
					//Clean small thumbnails if original file doesn't exist
					if ($positions === false) {}
					else 
					{
						$filename_thumbs = $file;//only thumbnails will be listed
						$filename_origs	= str_replace ('thumbs/phoca_thumb_s_', '', $file);//get fictive original files 
						
						//There is Thumbfile but not Originalfile - we delete it
						if (JFile::exists($filename_thumbs) && !JFile::exists($filename_origs))
						{
							JFile::delete($filename_thumbs);
						}
					//  Reverse
					//  $filename_thumb = PhocaGalleryHelper::getTitleFromFilenameWithExt($file);
					//	$filename_original = PhocaGalleryHelper::getTitleFromFilenameWithExt($file);	
					//	$filename_thumb = str_replace ($filename_original, 'thumbs/phoca_thumb_m_' . $filename_original, $file); 
					}
					
					//Clean medium thumbnails if original file doesn't exist
					if ($positionm === false) {}
					else 
					{
						$filename_thumbm = $file;//only thumbnails will be listed
						$filename_origm 	= str_replace ('thumbs/phoca_thumb_m_', '', $file);//get fictive original files 
						
						//There is Thumbfile but not Originalfile - we delete it
						if (JFile::exists($filename_thumbm) && !JFile::exists($filename_origm))
						{
							JFile::delete($filename_thumbm);
						}
					}
					
					//Clean large thumbnails if original file doesn't exist
					if ($positionl === false) {}
					else 
					{
						$filename_thumbl = $file;//only thumbnails will be listed
						$filename_origl 	= str_replace ('thumbs/phoca_thumb_l_', '', $file);//get fictive original files 
						
						//There is Thumbfile but not Originalfile - we delete it
						if (JFile::exists($filename_thumbl) && !JFile::exists($filename_origl))
						{
							JFile::delete($filename_thumbl);
						}
					}
				}
			}
		}
	}
	
	/*phocagallerys*/
	function getFileOriginal ($filename)
	{
		$path		= PhocaGalleryHelper::getPathSet();
		$file_original 	= $path['orig_abs_ds'] . $filename;//original file
		return $file_original;
	}
	
	function existsFileOriginal($filename)
	{
		$file_original = PhocaGalleryHelper::getFileOriginal ($filename);
		if (JFile::exists($file_original))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/*phocagallery*/
	
	function getAliasName($clean_filename)
	{
	    if (function_exists('iconv'))
		{
			$filename = $clean_filename;
		    $filename = preg_replace('~[^\\pL0-9_.]+~u', '-', $filename);
		    $filename = trim($filename, "-");
		    $filename = iconv("utf-8", "us-ascii//TRANSLIT", $filename);
		    $filename = strtolower($filename);
		    $filename = preg_replace('~[^-a-z0-9_.]+~', '', $filename);
		    return $filename;
		}
		else
		{
			return $clean_filename;
		}
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
	
	function removeExtension($file_name)
	{
		return substr($file_name, 0, strrpos( $file_name, '.' ));
	}
	
	function wordDelete($string,$length,$end='...')
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
		
		// only CATEGORIES AND SUBCATEGORIES AREA (NOT CATEGORIES AND IMAGES AREA) =========================
		// CATEGORIES VIEW (We must hide the same category and subcategory x parent cat)
		if ($id >0)
		{
			$tree_sub 	= array();
			$id_sub 	= '';
			$subcategories = PhocaGalleryHelper::CategoryTreeSubcategories($phocagallerys, $tree_sub, 0, $id_sub);
			
			// We get information about subcategoris in this form, e.g. 8,10,12 - we change it to array
			foreach ($subcategories as $key0 => $value0)
			{
				$subcategories_array[$key0] = explode( ',', $value0 );
			}
			
			foreach ($tree as $key => $value)
			{
			
				foreach ($phocagallerys as $key2 => $value2)
				{
					//-----------------------------------------------------------------------------------------
					//SYNTAX CHECK ------------------------------------------------------------------
					$syntax_check = 1;// if it is 1 - display category parent
					
					//FIRST SYNTAX CHECK - category cannot be parent to itself
					if ($id == $key) {$syntax_check = 0;}// we cannot add parent category as itself
					
					//SECOND SYNTACH CHECK - category cannot be parent if it is a subcategory of this category
					//                     - and if it is a sub sub (or sub +++) too
					foreach ($subcategories_array as $key3 => $value3)//array of all sub and subsubcategories
					{
						foreach ($value3 as $key4 => $value4)// subcategories are in array
						{
							if ($value4 == $id && $key == $key3){$syntax_check = 0;}
							// $id -> category
							// $value4-> subcatagory or subsubcategory
							// $key -> key of all categories
							// $key3 -> key of all subcategories
							// $key <--> $key3 => relation between category and subcategory
						}

					}
					//---------------------------------------------------------------------------------
				
					// Display category parent
					if ($syntax_check == 1) 
					{
						if ($key == $value2->value)
						{
							$phocagallerys_tree_object = new JObject();
							$phocagallerys_tree_object->text = $value;
							$phocagallerys_tree_object->value = $key;
							$phocagallerys_tree_array[] = $phocagallerys_tree_object;
						}
					}
				}
			}
		}
		//===========================================================================================
		else // $id = 0 // CATEGORIES VIEW (We must hide the same category and subcategory x parent cat)
		{
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
		}
		return $phocagallerys_tree_array;
	}
	
	// Create tree of categories and subcategories - but now wee need only ids [1] => 2,3 ...
	// text is name because of select
	// value is id because of select
	function CategoryTreeSubcategories($data, $tree, $id=0, $id_sub='')
	{		
		foreach ($data as $key)
		{	
			$show_id_sub =  $id_sub . $key->value;	
			if ($key->parentid == $id)
			{	
				$tree[$key->value] = $id_sub;
				$tree = PhocaGalleryHelper::CategoryTreeSubcategories($data, $tree, $key->value, $show_id_sub . "," );	
			}	
		}
		return($tree);
	}
	
	function getProcessPage ( $filename, $thumbInfo, $refresh_url, $errorMsg = '' )
	{
		$countImg 		= (int)JRequest::getVar( 'countimg', 0, 'get', 'INT' );
		$currentImg 	= (int)JRequest::getVar( 'currentimg',0, 'get','INT' );
		if ($currentImg == 0) {
			$currentImg = 1;
		}
		
		$nextImg = $currentImg + 1;
		
		echo '<center><div style="width:70%;border:1px solid #ccc; margin-top:30px;font-family: sans-serif, Arial;font-weight:normal;color:#666;font-size:14px;padding:10px">';
		echo '<span>'. JText::_( 'Creating of thumbnail Please Wait' ) . '</span>';
		
		if ( $errorMsg == '' ) {
			echo '<p>' .JText::_( 'Creating of thumbnail' ) 
			.' <span style="color:#0066cc;">'. $filename . '</span>' 
			.' ... <b style="color:#009900">OK</b><br />'
			.'(<span style="color:#0066cc;">' . $thumbInfo . '</span>)</p>';
		} else {
			echo '<p>' .JText::_( 'Creating of thumbnail' ) 
			.' <span style="color:#0066cc;padding:0;margin:0"> '. $filename . '</span>' 
			.' ... <b style="color:#fc0000">Error</b><br />'
			.'(<span style="color:#0066cc;">' . $thumbInfo . '</span>)</p>';
		}
	
		if ($countImg == 0) {
			// BEGIN ---------------------------------------------------------------------------
			echo '<p>' . JText::_('Rebuilding Process') . '</p>';
			// END -----------------------------------------------------------------------------
		} else {
			// Creating thumbnails info
			$per = 0; // display percents
			if ($countImg > 0) {
				$per = round(($currentImg / $countImg)*100, 0);
			}
			$perCSS = ($per * 400/100) - 400;
			$bgCSS = 'background: url(\''.JURI::base(true).'/components/com_phocagallery/assets/images/process.png\') '.$perCSS.'px 0 repeat-y;';
			
			// BEGIN -----------------------------------------------------------------------
			echo '<p>' . JText::_('Creating'). ': <span style="color:#0066cc">'. $currentImg .'</span> '.JText::_('From'). ' <span style="color:#0066cc">'. $countImg .'</span> '.JText::_('Thumbnail(s)').'</p>';
			
			//echo '<p>'.$per.' &#37;</p>';
			echo '<div style="width:400px;height:20px;font-size:20px;border-top:2px solid #666;border-left:2px solid #666;border-bottom:2px solid #ccc;border-right:2px solid #ccc;'.$bgCSS.'"><span style="font-size:10px;font-weight:bold">'.$per.' &#37;</div>';
			// END -------------------------------------------------------------------------
		}

		if ( $errorMsg != '' ) {
		
			$errorMessage = '';
			switch ($errorMsg) {
				case 'ErrorNotSupportedImage':
				$errorMessage = JText::_('ErrorNotSupportedImage');
				break;
				
				case 'ErrorNoJPGFunction':
				$errorMessage = JText::_('ErrorNoJPGFunction');
				break;
				
				case 'ErrorNoPNGFunction':
				$errorMessage = JText::_('ErrorNoPNGFunction');
				break;
				
				case 'ErrorNoGIFFunction':
				$errorMessage = JText::_('ErrorNoGIFFunction');
				break;
				
				case 'ErrorNoWBMPFunction':
				$errorMessage = JText::_('ErrorNoWBMPFunction');
				break;
				
				case 'ErrorWriteFile':
				$errorMessage = JText::_('ErrorWriteFile');
				break;
				
				case 'ErrorFileOriginalNotExists':
				$errorMessage = JText::_('ErrorFileOriginalNotExists');
				break;

				case 'ErrorCreatingFolder':
				$errorMessage = JText::_('ErrorCreatingFolder');
				break;
				
				case 'ErrorNoImageCreateTruecolor':
				$errorMessage = JText::_('ErrorNoImageCreateTruecolor');
				break;
				
				case 'Error1':
				case 'Error2':
				case 'Error3':
				case 'Error4':
				case 'Error5':
				default:
					$errorMessage = JText::_('ErrorWhileCreatingThumb') . ' ('.$errorMsg.')';
				break;	
			}
			
			$positioni = strpos($refresh_url, "view=phocagalleryi");
						
			if ($positioni === false)//we are in whole window - not in modal box
			{
				echo '<div style="text-align:left;margin: 10px 5px">';
				echo '<table border="0" cellpadding="7"><tr><td>'.JText::_('Error Message').':</td><td><span style="color:#fc0000">'.$errorMessage.'</span></td></tr>';
				
				echo '<tr><td colspan="1" rowspan="4" valign="top" >'.JText::_('What to do now').' :</td>';
				
				echo '<td>&raquo; ' .JText::_( 'PG Solution Begin' ).' <br /><ul><li>'.JText::_( 'PG Solution Image' ).'</li><li>'.JText::_( 'PG Solution GD' ).'</li><li>'.JText::_( 'PG Solution Permission' ).'</li></ul>'.JText::_( 'PG Solution End' ).'<br /> <a href="'.$refresh_url.'&countimg='.$countImg.'&currentimg='.$currentImg .'">' .JText::_( 'Phoca Gallery Back' ).'</a><hr /></td></tr>';
				
				echo '<tr><td>&raquo; ' .JText::_( 'Disable Creating Thumbnails Solution' ).' <br /> <a href="index.php?option=com_phocagallery&controller=phocagallery&task=disablethumbs">' .JText::_( 'Phoca Gallery Back Disable Thumbnails Creating' ).'</a> <br />'.JText::_( 'Enable Thumbnails Creating in Default Settings' ).'<hr /></td></tr>';
				
				echo '<tr><td>&raquo; ' .JText::_( 'Media Manager Solution' ).' <br /> <a href="index.php?option=com_media">' .JText::_( 'Media Manager link' ).'</a></td></tr>';
				
				echo '<tr><td>&raquo; <a href="http://www.phoca.cz/phocagallery/user-manual/" target="_blank">' .JText::_( 'Go to Phoca Gallery User Manual' ).'</a></td></tr>';
				
				echo '</table>';
				echo '</div>';

			}
			else //we are in modal box
			{
				echo '<div style="text-align:left">';
				echo '<table border="0" cellpadding="3"
			cellspacing="3"><tr><td>'.JText::_('Error Message').':</td><td><span style="color:#fc0000">'.$errorMessage.'</span></td></tr>';
				
				echo '<tr><td colspan="1" rowspan="3" valign="top">'.JText::_('What to do now').' :</td>';
				
				echo '<td>&raquo; ' .JText::_( 'PG Solution Begin' ).' <br /><ul><li>'.JText::_( 'PG Solution Image' ).'</li><li>'.JText::_( 'PG Solution GD' ).'</li><li>'.JText::_( 'PG Solution Permission' ).'</li></ul>'.JText::_( 'PG Solution End' ).'<br /> <a href="'.$refresh_url.'&countimg='.$countImg.'&currentimg='.$currentImg .'">' .JText::_( 'Phoca Gallery Back' ).'</a><hr /></td></tr>';
				
				echo '<td>&raquo; ' .JText::_( 'No Solution' ).' <br /> <a href="#" onclick="window.parent.document.getElementById(\'sbox-window\').close();">' .JText::_( 'Phoca Gallery Back' ).'</a></td></tr>';
				
				echo '</table>';
				echo '</div>';
			}
			
			echo '</div></center>';
			exit;
		}
		
			
		if ($countImg ==  $currentImg || $currentImg > $countImg) {
			echo '<meta http-equiv="refresh" content="0;url='.$refresh_url.'" />';
		} else {
			echo '<meta http-equiv="refresh" content="0;url='.$refresh_url.'&countimg='.$countImg.'&currentimg='.$nextImg.'" />';
		}
		
		echo '</div></center>';
		exit;
	}
}
?>