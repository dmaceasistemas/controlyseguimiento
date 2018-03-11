<?php

/**
* @version		$Id: mod_tcimageslider.php 1.00 2008-08-29$
* @package		Joomla
* @copyright	Copyright (C) 2008 Tobacamp. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*
* mod_tcimageslider is a free extension for Joomla 1.5. It displays images based on default Joomla! banner component (com_banners).
* Note: This module is ported from Conveyor Belt Slideshow (from dynamicdrive.com).
*
* @author 		Tobacamp-Dani Gunawan <tobacamp@gmail.com>
*
* More templates and extensions at http://tobacamp.com.
*
* Enjoy it!
*/

defined('_JEXEC') or die('Restricted access');

$modulename = 'mod_tcimageslider';
$js = 'modules/' . $modulename . '/js/tcimageslider.js';
$no_image = 'modules/' . $modulename . '/images/no_category.gif';

$catid = $params->get('catid', 0);
$order = $params->get('order', 'ordering');
$sort = $params->get('sort', 'ASC');
$sliderwidth = $params->get('sliderwidth', 300);
$sliderheight = $params->get('sliderheight', 150);
$slidespeed = $params->get('slidespeed', 1);
$slidebgcolor = $params->get('bgcolor', '');
$numofgap = $params->get('imagegap', 0);
$slideshowgap = $params->get('slideshowgap', 0);

$imagegap = '';
for ($i=0;$i<$numofgap;$i++) {
	$imagegap .= '&nbsp;';
}

// get image
$db =& JFactory::getDBO();
$query = "SELECT imageurl, clickurl  FROM #__banner WHERE catid = '$catid' AND showbanner = '1' ORDER BY $order $sort";
$db->setQuery( $query );
$rows = $db->loadObjectList();
	
?>

<script type="text/javascript">
var sliderwidth="<?php echo $sliderwidth; ?>px"
var sliderheight="<?php echo $sliderheight; ?>px"
var slidespeed=<?php echo $slidespeed; ?>

var slidebgcolor="#<?php echo $slidebgcolor; ?>"
var imagegap="<?php echo $imagegap; ?>"
var slideshowgap=<?php echo $slideshowgap; ?>

var leftrightslide=new Array()
var finalslide=''

<?php
	if (count($rows) > 0) {
		$i = 0;
		foreach ($rows as $row) {
			$imageurl = $no_image;
			if ($row->imageurl != '') {
				$imageurl = 'images/banners/' . $row->imageurl;
			}
?>

	leftrightslide[<?php echo $i; ?>]='<a href="<?php echo $row->clickurl; ?>"><img src="<?php echo $imageurl; ?>" /></a>'

<?php 
			$i++;
		}
	} else {
?>
		leftrightslide[0] = '<a href="#"><img src="<?php echo $no_image; ?>" /></a>'
		leftrightslide[1] = '<a href="#"><img src="<?php echo $no_image; ?>" /></a>'
<?php
	}
?>
</script>

<script type="text/javascript" src="<?php echo JURI::base() . $js; ?>">
</script>