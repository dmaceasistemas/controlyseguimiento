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

class PhocaGalleryViewCategories extends JView
{
	function display($tpl = null)
	{		
		global $mainframe;
		$db 	=& JFactory::getDBO();
		$model	= &$this->getModel();

		// Load the menu object and parameters
		$params	= &$mainframe->getParams();
		
		//Display or hide image beside the category name - Image size
		$image_categories_size = 0;
		if ($params->get( 'image_categories_size' ) != '') {
			$image_categories_size = $params->get( 'image_categories_size' );
		}
		
		$hide_categories = '';
		if ($params->get( 'hide_categories' ) != '') {
			$hide_categories = $params->get( 'hide_categories' );
		}
		
		// Get thumbnail sizes from params
		$medium_image_width		=	100;
		$medium_image_height	=	100;
		$small_image_width		=	50;
		$small_image_height		=	50;
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

		$medium_image_height	= $medium_image_height + 18;
		$medium_image_width 	= $medium_image_width + 18;
		$small_image_width		= $small_image_width +18;
		$small_image_height		= $small_image_height +18;
		
		switch ($image_categories_size)
		{	
			case 4:
			case 6:			
				$imageBg = 'background: url(\''.JURI::base(true).'/components/com_phocagallery/assets/images/shadow3.'.PhocaGalleryHelper::getFormatIcon().'\') 50% 50% no-repeat;height:'.$small_image_height	.'px;width:'.$small_image_width.'px;';
			break;
			
			case 5:
			case 7:
				$imageBg = 'background: url(\''.JURI::base(true).'/components/com_phocagallery/assets/images/shadow1.'.PhocaGalleryHelper::getFormatIcon().'\') 50% 50% no-repeat;height:'.$medium_image_height	.'px;width:'.$medium_image_width.'px;';
			break;
			
			case 0:
			case 1:
			case 2:
			case 3:
			default:
				$imageBg = '';
			break;
		}
		
		
		// Other params
		$display_subcategories = 1;
		if ($params->get( 'display_subcategories' ) != '') {
			$display_subcategories = $params->get( 'display_subcategories' );
		}

		$display_empty_categories = 0;
		if ($params->get( 'display_empty_categories' ) != '') {
			$display_empty_categories = $params->get( 'display_empty_categories' );
		}
		
		$categories_columns = 1;
		if ($params->get( 'categories_columns' ) != '') {
			$categories_columns = $params->get( 'categories_columns' );
		}

		$categories	= $model->getData($display_subcategories, $display_empty_categories, $hide_categories);
		
/*		//$categories =& $this->get('data'); NOT WORKING UNDER PHP4
		foreach ($categories as $category) {
			$category->link = JRoute::_('index.php?option=com_phocagallery&view=category&id='. $category->slug );
			$file_thumbnail = PhocaGalleryHelper::displayFileOrNoImage($category->filename, $img_cat_size);
			$category->linkthumbnailpath= $file_thumbnail['rel'];
		}
*/	
		
		foreach ($categories as $key => $category) { 
			$categories[$key]->link	= JRoute::_('index.php?option=com_phocagallery&view=category&id='. $category->slug ); 
			$file_thumbnail	= PhocaGalleryHelper::displayFileOrNoImageCategories($category->filename, $image_categories_size); 
			$categories[$key]->linkthumbnailpath	= $file_thumbnail['rel']; 
		}
		
		
		// Define image tag attributes
		if ($params->get('image') != -1) {
			$attribs['align']	= $params->get('image_align');
			$attribs['hspace']	= 6;
			// Use the static HTML library to build the image tag
			$image = JHTML::_('image', 'images/stories/'.$params->get('image'), JText::_('Phoca gallery'), $attribs);
		}
		
		//Display or hide image beside the category name
		$display_image_categories = 1;
		if ($params->get( 'display_image_categories' ) != '') {
			$display_image_categories = $params->get( 'display_image_categories' );
		}

		$this->assignRef('image',					$image);
		$this->assignRef('params',					$params);
		$this->assignRef('categories',				$categories);
		$this->assignRef('displayimagecategories',	$display_image_categories);
		$this->assignRef('imagebackground',			$imageBg);
		$this->assignRef('categoriescolumns',			$categories_columns);

		parent::display($tpl);
	}
}
?>