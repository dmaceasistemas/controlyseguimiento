<?php
/**
* @package mod_zyushoutbox
* @copyright	Copyright (C) 2008 Nova Zyuras Indonesia Bandung. All rights reserved.
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL, see LICENSE.php
* ZyuShoutbox is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

class modZyuShoutboxHelper
{
	// Username Mode or Real Name, if they're log in
	function getName($kind)
	{
		$user = & JFactory::getUser();
		if (!$user->get('guest')) 
		{
			return ($kind == 2) ? $user->get('name') : $user->get('username'); 
		} else return 'logout';
	}

	// This was added to make header definition ...
	function initForHead()  
	{
		global $mainframe;

		// ADD MOOTOOLS frame work for default
		JHTML::_('behavior.mootools');

		// Add Default Css Style 
		$addtohead='';
		$addtohead='<link rel="stylesheet" href="'.JURI::Base()
					.'modules/mod_zyushoutbox/css/shoutbox_def.css' 
					.'" type="text/css" />'; 
		
		// javascript
		$addtohead.='<script type="text/javascript" language="javascript" src="'.JURI::Base()
					.'modules/mod_zyushoutbox/js/shoutbox.js' 
					.'"></script>';
		$addtohead.='<script type="text/javascript" language="javascript" src="'.JURI::Base()
					.'modules/mod_zyushoutbox/js/smilie.js' 
					.'"></script>';
		
		$mainframe->addCustomHeadTag($addtohead);
	} /* End Function :: initForHead */

	/*	/////////////////////////////////////////////////
		//	Standard Database Maintenance functions	   //		
		/////////////////////////////////////////////////
	*/
	// Get data from database, All or by Key plus specific rule, order by Key
	// return	: object
	function getdbData($byKey = '') 
	{
		$db		=& JFactory::getDBO();
		$query	= 'SELECT * FROM #__liveshoutbox ';

		// Only retrieve by spesific rule
		if ($byKey) {$query .=  ' '.$byKey;}
 
		$db->setQuery($query);
		$results = $db->loadObjectList();
		if ($db->getErrorNum()) {JError::raiseWarning(500, $db->stderr());} 

		return $results;

	} /* End Function :: getdbData */

	// Add data to database spesific function
	// return	: none
	function adddbData($time, $name, $text, $url, $isEscaped = false) 
	{
		$fields = '(time,name,text,url)';
		$db		=& JFactory::getDBO();
		$query	= 'INSERT INTO #__liveshoutbox '.$fields;
		$values = ' VALUES ';
		
		// Escaped string
		if ($isEscaped)
		{
			$values .= "('".$time."','"
							.$db->getEscaped($name)."','"
							.$db->getEscaped($text)."','"
							.$db->getEscaped($url)."')";

		} else 
			{
				$values .= "('".$time."','"
							.$name."','"
							.$text."','"
							.$url."')";
			}
		$query .= $values;

		$db->Execute($query);
		if ($db->getErrorNum()) {JError::raiseWarning(500, $db->stderr());}

	} /* End Function :: getdbData */

	// delete data from database by spesific Key rules (spesific function)
	// return	: none
	function deldbData($byKey) 
	{
		$db		=& JFactory::getDBO();
		$query	= 'DELETE FROM #__liveshoutbox '.$byKey;
		$db->Execute($query);
		if ($db->getErrorNum()) {JError::raiseWarning(500, $db->stderr());}

	} /* End Function :: deldbData */

	// Where the shoutbox receives information (changed by Zyuras)
	function getLastMessage ($jal_lastID) 
	{
		// Retrieve only last message from DB
		$byKey = 'WHERE id >'.$jal_lastID.' ORDER BY id DESC';
		$results = modZyuShoutboxHelper::getdbData($byKey);

		$lastmessage = '';

		if (count($results)) 
		{
			foreach ($results as $result)  
			{
				$id   = $result->id;
				$time = $result->time;
				$name = $result->name;
				$text = $result->text;
				$url  = $result->url;

				// append the new id's to the beginning of $loop
				// --- is being used to separate the fields in the output
				$lastmessage = $id.'---'
								.stripslashes($name).'---'
								.$text.'---'
								.modZyuShoutboxHelper::jalTimeSince($time)." "
								.JText::_('JAL_AGO')."---"
								.stripslashes($url)."---" 
								.$lastmessage; 
			} /* End For */
		} /* End If */

		// if there's no new data, send one byte. Fixes a bug where safari gives up w/ no data
		if (empty($lastmessage)) { echo "0"; }

    	return $lastmessage;

	} /* End Function */
	
	// Teuing jang naon, sigana mah keur ngasupkeun data ka ... 
	// nya naon deui mun lain database belll...
	function putMessageData ($usrName, $usrText, $usrUrl) 
	{
		$pos = strpos($usrText, "[url");
		if(is_int($pos)) {
			return;
		}

		if(!use_url && strlen($usrUrl) > 8){
			return;
		}
		
		//the message is cut of after 500 letters
		$usrName = strip_tags($usrName);
		$usrName = substr(trim($usrName), 0, 11);
	
		$usrText = strip_tags($usrText);
		$usrText = substr($usrText, 0, 500); 
		
		// CENSORS .. default is off. To turn it on, uncomment the line below. Add new lines with new censors as needed.	
		//$jal_user_text = str_replace("fuck", "****", $jal_user_text);
			
		//$jal_user_text = jal_special_chars(trim($jal_user_text));
		$usrName = (empty($usrName)) ? "Anonymous" : modZyuShoutboxHelper::jalSpecialChars($usrName);
		$usrUrl = ($usrUrl == "http://") ? "" : modZyuShoutboxHelper::jalSpecialChars($usrUrl);

		modZyuShoutboxHelper::adddbData( time(), $usrName, $usrText, $usrUrl, true );

	} /* End Functions */

	// Maintains the database by deleting past comments
	function clnOldMessage($limit) 
	{
		$results = modZyuShoutboxHelper::getdbData('ORDER BY id');		
		
		// if more than limit delete old message ...
		if (count($results) > $limit)
		{	
			$id = $results[0]->id;
			modZyuShoutboxHelper::deldbData('WHERE id <= '.$id);
		} 
		
	} /* End Functions */

	/*	//////////////////////////////////////////////////////////////
		//	END OF >> Standard Database Maintenance functions	   //		
		/////////////////////////////////////////////////////////////
	*/

	
	// Works out the time since the entry post, takes a an argument in unix time (seconds)
	function jalTimeSince($original) {
    	// array of time period chunks
    	$chunks = array(
        				array(60 * 60 * 24 * 365 , JText::_('JAL_YEAR') , JText::_('JAL_YEARS')),
        				array(60 * 60 * 24 * 30 , JText::_('JAL_MONTH') , JText::_('JAL_MONTHS')),
        				array(60 * 60 * 24 * 7, JText::_('JAL_WEEK') , JText::_('JAL_WEEKS')),
        				array(60 * 60 * 24 , JText::_('JAL_DAY') , JText::_('JAL_DAYS')),
        				array(60 * 60 , JText::_('JAL_HOUR') , JText::_('JAL_HOURS')),
       					array(60 , JText::_('JAL_MINUTE') , JText::_('JAL_MINUTES')),
    					);

    	// Shaves a second, eliminates a bug where $time and $original match.
		$original 	= $original - 10; 
    	$today 		= time(); /* Current unix time  */
    	$since 		= $today - $original;
    
    	// $j saves performing the count function each time around the loop
    	for ($i = 0, $j = count($chunks); $i < $j; $i++) 
		{
        	$seconds 	= $chunks[$i][0];
        	$name 		= $chunks[$i][1];
			$names 		= $chunks[$i][2];
        
        	// finding the biggest chunk (if the chunk fits, break)
        	if (($count = floor($since / $seconds)) != 0) 
			{
            	break;
        	} /* End If */
    	} /* End For */

    	$print = ($count == 1) ? '1 '.$name : "$count {$names}";
    
    	if ($i + 1 < $j) 
		{
        	// now getting the second item
        	$seconds2 	= $chunks[$i + 1][0];
        	$name2 		= $chunks[$i + 1][1];
			$names2 	= $chunks[$i + 1][2];
        
        	// add second item if it's greater than 0
        	if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0) 
			{
            	$print .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$names2}";
        	} /* End If */
    	} /* End If */
		return $print;
	} /* End Function */
	
	// Convert smilies
	function sbConvertSmilies ($text) 
	{
		if (!isset($wpsmiliestrans)) 
		{
			$wpsmiliestrans = array (
										' :)'		=> 'icon_smile.gif',
										' :D'		=> 'icon_biggrin.gif',
										' :-D'		=> 'icon_biggrin.gif',
										':grin:'	=> 'icon_biggrin.gif',
										' :)'		=> 'icon_smile.gif',
										' :-)'		=> 'icon_smile.gif',
										':smile:'	=> 'icon_smile.gif',
										' :('		=> 'icon_sad.gif',
										' :-('		=> 'icon_sad.gif',
										':sad:'		=> 'icon_sad.gif',
										' :o'		=> 'icon_surprised.gif',
										' :-o'		=> 'icon_surprised.gif',
										':eek:'		=> 'icon_eek.gif',
										' 8O'		=> 'icon_eek.gif',
										' 8-O'		=> 'icon_eek.gif',
										':shock:'	=> 'icon_eek.gif',
										' :S'		=> 'icon_confused.gif',
										' :-?'		=> 'icon_confused.gif',
										' :???:'	=> 'icon_confused.gif',
										' 8)'		=> 'icon_cool.gif',
										' 8-)'		=> 'icon_cool.gif',
										':cool:'	=> 'icon_cool.gif',
										':lol:'		=> 'icon_lol.gif',
										' :x'		=> 'icon_mad.gif',
										' :-x'		=> 'icon_mad.gif',
										':mad:'		=> 'icon_mad.gif',
										' :P'		=> 'icon_razz.gif',
										' :-P'		=> 'icon_razz.gif',
										':razz:'	=> 'icon_razz.gif',
										':$'		=> 'icon_redface.gif',
										':cry:'		=> 'icon_cry.gif',
										':evil:'	=> 'icon_evil.gif',
										':twisted:'	=> 'icon_twisted.gif',
										':roll:'	=> 'icon_rolleyes.gif',
										':wink:'	=> 'icon_wink.gif',
										' ;)'		=> 'icon_wink.gif',
										' ;-)'		=> 'icon_wink.gif',
										':!:'		=> 'icon_exclaim.gif',
										':?:'		=> 'icon_question.gif',
										':idea:'	=> 'icon_idea.gif',
										':arrow:'	=> 'icon_arrow.gif',
										' :|'		=> 'icon_neutral.gif',
										' :-|'		=> 'icon_neutral.gif',
										':neutral:'	=> 'icon_neutral.gif',
										':mrgreen:'	=> 'icon_mrgreen.gif',
								); /* End Array */
		} /* End If */

		// sorts the smilies' array
		if (!function_exists('smiliescmp')) 
		{
			// >> TODO:: Strange!! Eximine!!
			function smiliescmp ($a, $b) 
			{
				if (strlen($a) == strlen($b)) {return strcmp($a, $b);}
				return (strlen($a) > strlen($b)) ? -1 : 1;
			} /* End Functions */
		}
		
		uksort($wpsmiliestrans, 'smiliescmp');

		// generates smilies' search & replace arrays
		foreach ($wpsmiliestrans as $smiley=>$img) 
		{
			$wp_smiliessearch[] = $smiley;
			$smiley_masked = htmlspecialchars( trim($smiley) , ENT_QUOTES);
			$wp_smiliesreplace[] = " <img src='components/com_shoutbox/smilies/$img' alt='$smiley_masked' class='wp-smiley' /> ";
		} /* End For */
    
		$output = '';
	
		//setting smilies aan of uit
		if (true) 
		{ 
			// HTML loop taken from texturize function, could possible be consolidated
			$textarr = preg_split("/(<.*>)/U", $text, -1, PREG_SPLIT_DELIM_CAPTURE); // capture the tags as well as in between
			$stop = count($textarr);// loop stuff
			for ($i = 0; $i < $stop; $i++) 
			{
				$content = $textarr[$i];
				if ((strlen($content) > 0) && ('<' != $content{0})) 
				{ 
					// If it's not a tag
					$content = str_replace($wp_smiliessearch, $wp_smiliesreplace, $content);
				}
				$output .= $content;
			}
		} else 
			{
				// return default text.
				$output = $text;
			}
		
		return $output;
	} /* End Functions */
	
	// Why doesn't htmlentities() figure this one out? who knows
	function jalSpecialChars ($schar) 
	{
  		$schar = htmlspecialchars( $schar, ENT_COMPAT , JText::_('JAL_ISO') );
  
  		if ( strtolower ( JText::_('JAL_ISO') ) != 'utf-8' )
  		
		//$schar = utf8_decode ( $schar );
  		return str_replace("---","&minus;-&minus;",$schar);
	} /* End Function */

	
} /* End Class */
