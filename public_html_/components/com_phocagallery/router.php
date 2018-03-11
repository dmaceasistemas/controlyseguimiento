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
 
function PhocaGalleryBuildRoute(&$query)
{
	$segments = array();

	if(isset($query['view'])) 
	{
		if(!isset($query['Itemid'])) {
			$segments[] = $query['view'];
		} 
		
		unset($query['view']);
	};
	
	if(isset($query['catid']))
	{
		$segments[] = $query['catid'];
		unset($query['catid']);
	};

	if(isset($query['id']))
	{
		$segments[] = $query['id'];
		unset($query['id']);
	};

	return $segments;
}

function PhocaGalleryParseRoute($segments)
{
	$vars = array();

	//Get the active menu item
	$menu =& JSite::getMenu();
	$item =& $menu->getActive();

	// Count route segments
	$count = count($segments);
	
	//Standard routing for articles
	if(!isset($item)) 
	{
		if($count == 3 )
		{
			$vars['view']  = $segments[$count - 3];
		}
		else
		{
			$vars['view'] = 'category';
		}
		$vars['id']    = $segments[$count - 1];
	}
	else
	{
		//Handle View and Identifier
		switch($item->query['view'])
		{
			case 'categories' :
			{
				if($count == 1) {
					$vars['view'] = 'category';
				}

				if($count == 2) {
					$vars['view'] = 'phocagalleryd';
				}

				$vars['id'] = $segments[$count-1];

			} break;

			case 'category'   :
			{
				$vars['id']   = $segments[$count-1];
				
				if($count == 1) {
					$vars['view'] = 'category';
				}

				if($count == 2) {
					$vars['view'] = 'phocagalleryd';
				}

			} break;
		}
	}

	return $vars;
}
?>