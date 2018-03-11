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
defined('_JEXEC') or die();

jimport( 'joomla.application.component.view');


class PhocaGalleryViewCategory extends JView
{
	function display($tpl = null)
	{
		global $mainframe;
	
		$document	= & JFactory::getDocument();
		$uri 		= & JFactory::getURI();
		
		// Get the parameters of the active menu item
		$menus	= &JSite::getMenu();
		$menu	= $menus->getActive();
		$params	= &$mainframe->getParams();
		
		
		//START CSS
		$document->addStyleSheet(JURI::base(true).'/components/com_phocagallery/assets/phocagallery.css');
		$document->addCustomTag("<!--[if IE]>\n<link rel=\"stylesheet\" href=\"".JURI::base(true)."/components/com_phocagallery/assets/phocagalleryieall.css\" type=\"text/css\" />\n<![endif]-->");
		
		$display_cat_name_title = 1;
		if ($params->get( 'display_cat_name_title' ) != ''){$display_cat_name_title = $params->get( 'display_cat_name_title' );}
		
		$display_cat_name_breadcrumbs = 1;
		if ($params->get( 'display_cat_name_breadcrumbs' ) != ''){$display_cat_name_breadcrumbs = $params->get( 'display_cat_name_breadcrumbs' );}

		
		//Add custom CSS values
		$font_color = '#135cae';
		if ($params->get( 'font_color' ) != ''){$font_color = $params->get( 'font_color' );}
		
		$background_color = '#fcfcfc';
		if ($params->get( 'background_color' ) != ''){$background_color = $params->get( 'background_color' );}
		
		$background_color_hover = '#f5f5f5';
		if ($params->get( 'background_color_hover' ) != ''){$background_color_hover = $params->get( 'background_color_hover' );}
		
		$image_background_color = '#f5f5f5';
		if ($params->get( 'image_background_color' ) != ''){$image_background_color = $params->get( 'image_background_color' );}
		
		$image_background_shadow = 1;
		if ($params->get( 'image_background_shadow' ) != ''){$image_background_shadow = $params->get( 'image_background_shadow' );}
		
		$border_color = '#e8e8e8';
		if ($params->get( 'border_color' ) != '')	{$border_color = $params->get( 'border_color' );}
		
		$border_color_hover = '#135cae';
		if ($params->get( 'border_color_hover' ) != ''){$border_color_hover = $params->get( 'border_color_hover' );}
		
		// Get image height and width
		$medium_image_width			=	100;
		$medium_image_height		=	100;
		$front_modal_box_width		=	680;
		$front_modal_box_height		=	560;
		$front_popup_window_width	=	680;
		$front_popup_window_height	=	560;
		if ($params->get( 'medium_image_width' ) != '') {
			$medium_image_width = $params->get( 'medium_image_width' );
		}
		if ($params->get( 'medium_image_height' ) != '') {
			$medium_image_height = $params->get( 'medium_image_height' );
		}
		if ($params->get( 'front_modal_box_width' ) != '') {
			$front_modal_box_width = $params->get( 'front_modal_box_width' );
		}
		if ($params->get( 'front_modal_box_height' ) != '') {
			$front_modal_box_height = $params->get( 'front_modal_box_height' );
		}
		if ($params->get( 'front_popup_window_width' ) != '') {
			$front_popup_window_width = $params->get( 'front_popup_window_width' );
		}
		if ($params->get( 'front_popup_window_height' ) != '') {
			$front_popup_window_height = $params->get( 'front_popup_window_height' );
		}
		
		if ( $image_background_shadow != 'none' ) {	
			$imageBgCSS = 'background: url(\''.JURI::base(true).'/components/com_phocagallery/assets/images/'.$image_background_shadow.'.'.PhocaGalleryHelper::getFormatIcon().'\') 0 0 no-repeat;';
		} else {
			$imageBgCSS = 'background: '.$image_background_color .';';
		}
			
		$document->addCustomTag( "<style type=\"text/css\">\n"
								." #phocagallery .name {color: $font_color ;}\n"
								." .phocagallery-box-file {background: $background_color ; border:1px solid $border_color ;}\n"
								." .phocagallery-box-file-first { $imageBgCSS }\n"
								." .phocagallery-box-file:hover, .phocagallery-box-file.hover {border:1px solid $border_color_hover ; background: $background_color_hover ;}\n"
								." </style>\n");
		
		
		$document->addCustomTag( "<!--[if IE]>\n<style type=\"text/css\">\n"
								."phocagallery-box-file{
background-color: expression(isNaN(this.js)?(this.js=1,
this.onmouseover=new Function(\"this.className+=' hover';\"),
this.onmouseout=new Function(\"this.className=this.className.replace(' hover','');\")):false););
}"
								." </style>\n<![endif]-->");
		
		
		//END CSS
		
		
		//Display Description in Detail window
		$display_description_detail = 0;
		if ($params->get( 'display_description_detail' ) != '')
		{
			$display_description_detail = $params->get( 'display_description_detail' );
		}
		
		//Display Description in Detail window - set the height of description text
		$description_detail_height = 16;
		if ($params->get( 'description_detail_height' ) != '')
		{
			$description_detail_height = $params->get( 'description_detail_height' );
		}
		
		$category_box_space = 0;
		if ($params->get( 'category_box_space' ) != '')
		{
			$category_box_space = $params->get( 'category_box_space' );
		}
		
		//Open window parameters - modal popup box or standard popup window
		$detail_window = 0;
		if ($params->get( 'detail_window' ) != '')
		{
			$detail_window = $params->get( 'detail_window' );
		}

		JHTML::_('behavior.modal', 'a.modal-button');

		$button = new JObject();
		$button->set('name', 'image');
		
		
		if ($display_description_detail == 1)
		{
			$front_popup_window_height	= $front_popup_window_height + $description_detail_height;
		}
		
		//Display Buttons (height will be smaller)
		$detail_buttons = 1;
		if ($params->get( 'detail_buttons' ) != '')	{$detail_buttons = $params->get( 'detail_buttons' );}
		
		if ($detail_buttons != 1)
		{
			$front_popup_window_height	= $front_popup_window_height - 45;
		}
		
		if ($detail_window == 1)//standard popup window - get this from paramaters
		{
			$button->set('methodname', 'js-button');
			$button->set('options', "window.open(this.href,'win2','width=".$front_popup_window_width.",height=".$front_popup_window_height.",menubar=no,resizable=yes'); return false;");
			
		}
		else //modal popup box
		{
			//Parameters
			$modal_box_overlay_color = '#000000';
			if ($params->get( 'modal_box_overlay_color' ) != ''){$modal_box_overlay_color = $params->get( 'modal_box_overlay_color' );}
			
			$modal_box_overlay_opacity = 0.7;
			if ($params->get( 'modal_box_overlay_opacity' ) != ''){$modal_box_overlay_opacity = $params->get( 'modal_box_overlay_opacity' );}
			
			$modal_box_border_color = '#000000';
			if ($params->get( 'modal_box_border_color' ) != ''){$modal_box_border_color = $params->get( 'modal_box_border_color' );}
			
			$modal_box_border_width = '10';
			if ($params->get( 'modal_box_border_width' ) != ''){$modal_box_border_width = $params->get( 'modal_box_border_width' );}
			
			
			
			$button->set('modal', true);
			$button->set('methodname', 'modal-button');
			$button->set('options', "{handler: 'iframe', size: {x: ".$front_modal_box_width.", y: ".$front_modal_box_height."}, overlayOpacity: ".$modal_box_overlay_opacity."}");
			
			$document->addCustomTag( "<style type=\"text/css\"> \n"  
			." #sbox-window {background-color:".$modal_box_border_color.";padding:".$modal_box_border_width."px} \n"
			." #sbox-overlay {background-color:".$modal_box_overlay_color.";} \n"			
			." </style> \n");
		}

		$folderbutton = new JObject();
		$folderbutton->set('name', 'image');
		$folderbutton->set('options', "");			
				
		// End open window parameters
		

		$category	= $this->get('category');
		$total		= $this->get('total');
		$pagination	= &$this->get('pagination');
		
	
	
		// Pagination and subcategories on other sites
		$display_subcat_page = 0;//Subcategories will be displayed only
								 // on first page if pagination will be used
		if ($params->get( 'display_subcat_page' ) != ''){$display_subcat_page = $params->get( 'display_subcat_page' );}
		
		// On the first site subcategories will be displayed allways
		$get['start']	= JRequest::getVar( 'start', '', 'get', 'string' );
		if ($display_subcat_page == 0 && $get['start'] > 0)
		{
			$display_subcat_page = 0;//in case: second page and param=0
		}
		else
		{
			$display_subcat_page = 1;//in case:first page or param==1
		}
		
	//	$items		= $this->get('data');
		$model		= &$this->getModel();
		$items		= $model->getData($display_subcat_page);

		// Set page title per category
		if ($display_cat_name_title == 1)
		{
			$document->setTitle($params->get( 'page_title') . ' - '. $category->title);
		}
		else
		{
			$document->setTitle( $params->get( 'page_title' ));
		}

		// Breadcrumb display:
		// 0 - only menu link
		// 1 - menu link - category name
		// 2 - only category name
		//
		$this->_addBreadCrumbs($category, isset($menu->query['id']) ? $menu->query['id'] : 0, $display_cat_name_breadcrumbs);
		
		// Define image tag attributes
		if (!empty ($category->image))
		{
			$attribs['align'] = '"'.$category->image_position.'"';
			$attribs['hspace'] = '"6"';

			// Use the static HTML library to build the image tag
			$image = JHTML::_('image', 'images/stories/'.$category->image, JText::_('Phoca gallery'), $attribs);
		}
		
		//Display or hide name, icon detail link
		$display_name = 1;
		if ($params->get( 'display_name' ) != '') {
			$display_name = $params->get( 'display_name' );
		}
		
		
		$display_icon_detail = 1;
		if ($params->get( 'display_icon_detail' ) != '') {
			$display_icon_detail = $params->get( 'display_icon_detail' );
		}
		
		$display_icon_download = 0;
		if ($params->get( 'display_icon_download' ) != '') {
			$display_icon_download = $params->get( 'display_icon_download' );
		}
		
		$display_icon_folder = 0;
		if ($params->get( 'display_icon_folder' ) != '') {
			$display_icon_folder = $params->get( 'display_icon_folder' );
		}
		
		//Fonts
		$font_size_name = 12;
		if ($params->get( 'font_size_name' ) != '') {
			$font_size_name = $params->get( 'font_size_name' );
		}

		$char_length_name = 11;
		if ($params->get( 'char_length_name' ) != '') {
			$char_length_name = $params->get( 'char_length_name' );
		}

        $k = 0;
		for($i = 0; $i <  count($items); $i++)
		{
			$item =& $items[$i];

			if ($item->item_type == "parentfolder")
			{
				   $item->link = JRoute::_('index.php?option=com_phocagallery&view=category&id='. $item->slug );
				   $item->button = &$folderbutton;
				   $item->button->methodname = '';
				   $item->displayicondetail = 0;				   
				   $item->displayicondownload = 0;
				   $item->displayiconfolder = 0;
				   $item->displayname = 0;				   
 			}
 			else if ($item->item_type == "subfolder")
			{			
				$item->link = JRoute::_('index.php?option=com_phocagallery&view=category&id='. $item->slug );
				$item->button = &$folderbutton;
				$item->button->methodname = '';
				$item->displayicondetail = 0;				   
				$item->displayicondownload = 0;
				$item->displayiconfolder = $display_icon_folder;
				$item->displayname = $display_name;
			//	$display_name = 1;

			}
 			else
			{                      
   				$item->link = JRoute::_('index.php?option=com_phocagallery&view=phocagalleryd&catid='.$category->slug.'&id='. $item->slug.'&tmpl=component' );
                $item->button = &$button;
				$item->displayicondetail = $display_icon_detail;
				$item->displayicondownload = $display_icon_download;
				$item->displayiconfolder = 0;
				$item->displayname = $display_name;
   			}
			              
			$item->odd	= $k;
			$item->count	= $i;
			$k = 1 - $k;
		}
		
		$this->assignRef( 'displayname' ,		$display_name);
		$this->assignRef( 'displayicondetail' ,	$display_icon_detail);
		$this->assignRef( 'displayicondownload',$display_icon_download);
		$this->assignRef( 'displayiconfolder' ,	$display_icon_folder);
		$this->assignRef( 'detailwindow' ,		$detail_window);
		$this->assignRef( 'fontsizename' ,		$font_size_name);
		$this->assignRef( 'charlengthname' ,	$char_length_name);
		$this->assignRef( 'displaycatnametitle',$display_cat_name_title);
		$this->assignRef( 'image' ,				$image);
		$this->assignRef( 'imagewidth' ,		$medium_image_width);
		$this->assignRef( 'imageheight' ,		$medium_image_height);
		$this->assignRef( 'displayimageshadow',	$image_background_shadow);
		$this->assignRef( 'params' ,			$params);
		$this->assignRef( 'items' ,				$items);
		$this->assignRef( 'category' ,			$category);
		$this->assignRef( 'pagination', 		$pagination);
		$this->assignRef( 'button',				$button );
		$this->assignRef( 'categoryboxspace',	$category_box_space );
		$this->assign('action',	$uri->toString());
		
		parent::display($tpl);
	}
	
	function _addBreadCrumbs($category, $rootId, $displayStyle)
	{
	    $i = 0;
	    while (isset($category->id))
	    {
			$crumbList[$i++] = $category;
			if ($category->id == $rootId)
			{
				break;
			}

	        $db =& JFactory::getDBO();
	        $query = 'SELECT *' .
	            ' FROM #__phocagallery_categories AS c' .
	            ' WHERE c.id = '.(int) $category->parent_id.
	            ' AND c.published = 1';
	        $db->setQuery($query);
	        $rows = $db->loadObjectList('id');
			if (!empty($rows))
			{
				$category = $rows[$category->parent_id];
			}
			else
			{
				$category = '';
			}
		//	$category = $rows[$category->parent_id];
	    }

	    global $mainframe;
	    $pathway =& $mainframe->getPathway();
		$pathWayItems = $pathway->getPathWay();
		$lastItemIndex = count($pathWayItems) - 1;

	    for ($i--; $i >= 0; $i--)
	    {
			// special handling of the root category
			if ($crumbList[$i]->id == $rootId) 
			{
				switch ($displayStyle) 
				{
					case 0:	// 0 - only menu link
						// do nothing
						break;
					case 1:	// 1 - menu link with category name
						// replace the last item in the breadcrumb (menu link title) with the current value plus the category title
						$pathway->setItemName($lastItemIndex, $pathWayItems[$lastItemIndex]->name . ' - ' . $crumbList[$i]->title);
						break;
					case 2:	// 2 - only category name
						// replace the last item in the breadcrumb (menu link title) with the category title
						$pathway->setItemName($lastItemIndex, $crumbList[$i]->title);
						break;
				}
			} 
			else 
			{
				$pathway->addItem($crumbList[$i]->title, JRoute::_('index.php?option=com_phocagallery&view=category&id='. $crumbList[$i]->id.':'.$crumbList[$i]->alias));
			}
	    }
	}
}
?>
