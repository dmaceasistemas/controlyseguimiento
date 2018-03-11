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

class PhocagalleryModelCategory extends JModel
{

	var $_id = null;
	var $_data = null;
	var $_subcategories = null;
	var $_total = null;
	var $_category = null;

	function __construct()
	{
		global $mainframe;

		parent::__construct();

		$config = JFactory::getConfig();		
		
		// Get the pagination request variables
		$this->setState('limit', $mainframe->getUserStateFromRequest('com_phocagallery.limit', 'limit', $config->getValue('config.list_limit'), 'int'));
		$this->setState('limitstart', JRequest::getVar('limitstart', 0, '', 'int'));

		// In case limit has been changed, adjust limitstart accordingly
		$this->setState('limitstart', ($this->getState('limit') != 0 ? (floor($this->getState('limitstart') / $this->getState('limit')) * $this->getState('limit')) : 0));

		// Get the filter request variables
		$this->setState('filter_order', JRequest::getCmd('filter_order', 'ordering'));
		$this->setState('filter_order_dir', JRequest::getCmd('filter_order_Dir', 'ASC'));

		$id = JRequest::getVar('id', 0, '', 'int');
		$this->setId((int)$id);

	}

	function setId($id)
	{
		// Set category ID and wipe data
		$this->_id			= $id;
		$this->_category	= null;
	}
	  
	function getData($display_subcat_page=0)
	{
	  // Lets load the content if it doesn't already exist
	  if (empty($this->_data))
		{ 
		   $count = 0 ;

		   // Super folders 
		   $parentcategory = $this->_getParentCategory();
		       
		   if ( $parentcategory )
		   {
			   $this->_data[$count] = $parentcategory ;
			   $item =& $this->_data[$count];
			   $item->slug = $item->id.':'.$item->alias;
			   $item->item_type = "parentfolder";
			   $file_thumbnail = PhocaGalleryHelper::displayBackFolder('medium');
			   $item->linkthumbnailpath  = $file_thumbnail['rel'];
			   $count++;
		   }	  
		  
			// Sub folders
			if ($display_subcat_page == 1)//display subcategories on every page
			{
				$query = $this->_buildSubCategoriesQuery();
				$this->_subcategories = $this->_getList($query);
				$total = count($this->_subcategories);
			   
				for($i = 0; $i < $total; $i++)
				{
				    $this->_data[$count] = $this->_subcategories[$i];
				    $item =& $this->_data[$count] ;
				    $item->slug = $item->id.':'.$item->alias;
				    $item->item_type = "subfolder";
				    $random = $this->_getRandomImageRecursive($item->id);
				    $file_thumbnail = PhocaGalleryHelper::displayThumbOrFolder($random->filename, 'medium');
				    $item->linkthumbnailpath  = $file_thumbnail['rel'];
				    $count++;
				}
			}
		  
			// Images
			$query = $this->_buildQuery();

			$images = $this->_getList($query, $this->getState('limitstart'), $this->getState('limit'));

			$total = count($images);
			for($i = 0; $i < $total; $i++)
			{
			    $this->_data[$count] = $images[$i] ;
			    $item =& $this->_data[$count];
			    $item->slug = $item->id.':'.$item->alias;
			    $item->item_type = "image";
			    // Get file thumbnail or No Image
			    $file_thumbnail    = PhocaGalleryHelper::displayFileOrNoImage($item->filename, 'medium');
			    $item->linkthumbnailpath  = $file_thumbnail['rel'];
			    $count++;
			}
	   
		}
		return $this->_data;
	 }

	function getTotal()
	{
		if (empty($this->_total))
		{
			$query = $this->_buildQuery();
			$this->_total = $this->_getListCount($query);
		}
		return $this->_total;
	}

	function getPagination()
	{
		if (empty($this->_pagination))
		{
			jimport('joomla.html.pagination');
			$this->_pagination = new JPagination( $this->getTotal(), $this->getState('limitstart'), $this->getState('limit') );
		}
		return $this->_pagination;
	}

	function getCategory()
	{
		// Load the Category data
		if ($this->_loadCategory())
		{
			// Initialize some variables
			$user = &JFactory::getUser();

			// Make sure the category is published
			if (!$this->_category->published) {
				JError::raiseError(404, JText::_("Resource Not Found"));
				return false;
			}
			// check whether category access level allows access
			if ($this->_category->access > $user->get('aid', 0)) {
				JError::raiseError(403, JText::_("ALERTNOTAUTH"));
				return false;
			}
		}
		return $this->_category;
	}

	function _loadCategory()
	{
		if (empty($this->_category))
		{
			// current category info
			$query = 'SELECT c.*,' .
				' CASE WHEN CHAR_LENGTH(c.alias) THEN CONCAT_WS(\':\', c.id, c.alias) ELSE c.id END as slug '.
				' FROM #__phocagallery_categories AS c' .
				' WHERE c.id = '. (int) $this->_id;
			$this->_db->setQuery($query, 0, 1);
			$this->_category = $this->_db->loadObject();
		}
		return true;
	}

	function _buildQuery()
	{
		// We need to get a list of all phocagallery in the given category
		$query = 'SELECT *' .
			' FROM #__phocagallery' .
			' WHERE catid = '.(int) $this->_id.
			' AND published = 1' .
			' ORDER BY ordering';

		return $query;
	}
	
	function _buildSubCategoriesQuery()
	{
		// We need to get a list of all phocagallery in the given category
		$query = 'SELECT *' .
			' FROM #__phocagallery_categories AS c' .
			' WHERE c.parent_id = '.(int) $this->_id.
			' AND c.published = 1' .
			' AND c.id <> '.(int) $this->_id.
	/*		' AND (SELECT COUNT(*)' .
        ' FROM #__phocagallery as g' . 
        ' WHERE g.catid = c.id' .
        ' AND published = 1) > 0'.*/
			' ORDER BY ordering';

		return $query;
	}
/*	
	function _getRandomImage($categoryid)
	{
		// We need to get a list of all phocagallery in the given category
		$query = 'SELECT *' .
			' FROM #__phocagallery' .
			' WHERE catid = '.(int) $categoryid.
			' AND published = 1'.
			' ORDER BY RAND()';      
        $images = $this->_getList($query, 0, 1);
		
		if (count($images) == 0)
		{
			$image->filename = "";
			return $image;
		}
		else
		{
			return $images[0] ;
		}
	}
*/

	function _getRandomImageRecursive($categoryid)
    {
        // We need to get a list of all phocagallery in the given category
        $query = 'SELECT id, filename' .
            ' FROM #__phocagallery' .
            ' WHERE catid = '.(int) $categoryid.
            ' AND published = 1'.
            ' ORDER BY RAND()';     
        $images = $this->_getList($query, 0, 1);
       
        if (count($images) == 0)
        {
            $image->filename = "";
            $subCategories = $this->_getRandomCategory($categoryid);
            foreach ($subCategories as $subCategory)
            {
                $image = $this->_getRandomImageRecursive($subCategory->id);
                if ($image->filename != "")
                {
                    break;
                }
            }
        }
        else
        {
            $image = $images[0] ;
        }

        return $image;
    }
	
	  function _getRandomCategory($parentid)
    {
        $query = 'SELECT id' .
            ' FROM #__phocagallery_categories AS c' .
            ' WHERE c.parent_id = '.(int) $parentid.
            ' AND c.published = 1' .
            ' ORDER BY RAND()';

        return $this->_getList($query);
    }
	
	function _getParentCategory()
	{
		$query = 'SELECT *' .
			' FROM #__phocagallery_categories' .
			' WHERE id = '.(int) $this->_category->parent_id.
			' AND published = 1' .
			' AND id <> '.(int) $this->_category->id.
			' ORDER BY ordering';
		$this->_db->setQuery($query, 0, 1);
		$parent_category = $this->_db->loadObject();
			
		return $parent_category ;
	}
}
?>