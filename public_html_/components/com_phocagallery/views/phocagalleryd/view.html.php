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

class PhocaGalleryViewPhocaGalleryd extends JView
{
	function display($tpl = null)
	{
		global $mainframe;
		
		//PLUGIN WINDOW - we get information from plugin
		$get				= '';
		$get['detail']		= JRequest::getVar( 'detail', '', 'get', 'string', JREQUEST_ALLOWRAW );
		$get['buttons']		= JRequest::getVar( 'buttons', '', 'get', 'string', JREQUEST_ALLOWRAW );
		
		$document	= & JFactory::getDocument();		
		//START CSS
		$document->addStyleSheet(JURI::base(true).'/components/com_phocagallery/assets/phocagallery.css');
		
		$params	= &$mainframe->getParams();
		
		//Open window parameters - modal popup box or standard popup window
		$detail_window = 0;
		if ($params->get( 'detail_window' ) != '')
		{
			$detail_window = $params->get( 'detail_window' );
		}
		
		if (isset($get['detail']) && $get['detail'] != '')//Plugin information
		{
			$detail_window = $get['detail'];
		}
		
		//Display Buttons
		$detail_buttons = 1;
		if ($params->get( 'detail_buttons' ) != '')	{$detail_buttons = $params->get( 'detail_buttons' );}
		
		if (isset($get['buttons']) && $get['buttons'] != '')//Plugin information
		{
			$detail_buttons = $get['buttons'];
		}
		
		
		if ($detail_window == 1)//standard popup window
		{
			$detail_window_close 	= 'window.close();';
			$detail_window_reload	= 'window.location.reload(true);';
		}
		else //modal popup window
		{
			$detail_window_close 	= 'window.parent.document.getElementById(\'sbox-window\').close();';
			$detail_window_reload	= 'window.location.reload(true);';
		}
		
		//Display Description in Detail window
		$display_description_detail = 0;
		if ($params->get( 'display_description_detail' ) != '')	{$display_description_detail = $params->get( 'display_description_detail' );}
		
		//Display Description in Detail window - set the height of description text
		$description_detail_height = 16;
		if ($params->get( 'description_detail_height' ) != '')	{$description_detail_height = $params->get( 'description_detail_height' );}

		//Display Description in Detail window - set the font size
		$font_size_desc = 11;
		if ($params->get( 'font_size_desc' ) != '')		{$font_size_desc = $params->get( 'font_size_desc' );}

		//Display Description in Detail window - set the font color
		$font_color_desc = '#333333';
		if ($params->get( 'font_color_desc' ) != '')	{$font_color_desc = $params->get( 'font_color_desc' );}
		
		//Display Description in Detail window - set the font color
		$detail_window_background_color = '#ffffff';
		if ($params->get( 'detail_window_background_color' ) != '')	{$detail_window_background_color = $params->get( 'detail_window_background_color' );}
	
	
		
		
		//NO SCROLLBAR IN DETAIL WINDOW
		echo $document->addCustomTag( "<style type=\"text/css\"> \n" 
			." html,body .contentpane{overflow:hidden;background:".$detail_window_background_color.";} \n" 
			." center, table {background:".$detail_window_background_color.";} \n" 
			." #sbox-window {background-color:#fff100;padding:5px} \n" 
			." </style> \n");
		
		
		// Get image height and width
		$large_image_width		=	640;
		$large_image_height		=	480;
		$front_modal_box_width		=	680;
		$front_modal_box_height		=	560;
		
		if ($params->get( 'large_image_width' ) != '') {
			$large_image_width = $params->get( 'large_image_width' );
		}
		if ($params->get( 'large_image_height' ) != '') {
			$large_image_height = $params->get( 'large_image_height' );
		}
		
		if ($params->get( 'front_modal_box_width' ) != '') {
			$front_modal_box_width = $params->get( 'front_modal_box_width' );
		}
		if ($params->get( 'front_modal_box_height' ) != '') {
			$front_modal_box_height = $params->get( 'front_modal_box_height' );
		}
		
		$slideshow_delay = 3000;
		if ($params->get( 'slideshow_delay' ) != '') {
			$slideshow_delay = $params->get( 'slideshow_delay' );
		}
		$slideshow_pause = 0;
		if ($params->get( 'slideshow_pause' ) != '') {
			$slideshow_pause = $params->get( 'slideshow_pause' );
		}
		$slideshow_random = 0;
		if ($params->get( 'slideshow_random' ) != '') {
			$slideshow_random = $params->get( 'slideshow_random' );
		}
		

		$file =& $this->get('Data');
		
		$this->assignRef( 'slideshowdelay' , $slideshow_delay);
		$this->assignRef( 'slideshowpause' ,$slideshow_pause);
		$this->assignRef( 'slideshowrandom' , $slideshow_random);
		$this->assignRef( 'largewidth' , $large_image_width);
		$this->assignRef( 'largeheight' ,$large_image_height);
		$this->assignRef( 'boxlargewidth' , $front_modal_box_width);
		$this->assignRef( 'boxlargeheight' , $front_modal_box_height);
		$this->assignRef( 'detailwindowclose',	$detail_window_close );
		$this->assignRef( 'detailwindowreload',	$detail_window_reload );
		$this->assignRef( 'displaydescriptiondetail',	$display_description_detail );
		$this->assignRef( 'descriptiondetailheight',	$description_detail_height );
		$this->assignRef( 'fontsizedesc',	$font_size_desc );
		$this->assignRef( 'fontcolordesc',	$font_color_desc );
		$this->assignRef( 'detailbuttons',	$detail_buttons );
		$this->assignRef( 'file',	$file );
		parent::display($tpl);
	}
}
