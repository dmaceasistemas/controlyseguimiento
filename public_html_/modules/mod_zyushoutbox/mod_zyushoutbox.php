<?php 
/**
* @package mod_zyushoutbox
* @copyright	Copyright (C) 2008 Nova Zyuras Indonesia Bandung. All rights reserved.
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL, see LICENSE.php
* ZyuShoutbox is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* @important notes:
*	This version was adopted from Ajax Shoutbox 1.2 from http://risperdal.student.utwente.nl.
*	Changes was made to fit in new Joomla 1.5 version. 
*	But, this still need the originally com_shoutbox version installed, 
*	so this is still Legacy i think. 
*/

/**
 * ZyuShoutbox
 *
 * Used to process Ajax searches on a Joomla Content.
 *
 * @author		Nova Zyuras <zyuras@lembahweb.com>
 * @package		mod_zyushoutbox
 * @Joomla ver.	1.5
 * @version     2.0.1 <i have added last dot ver. for Joomla 1.5>
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

// Get Configurations File from Component
require_once (JPATH_SITE
				.DS.'administrator'
				.DS.'components'
				.DS.'com_shoutbox'
				.DS.'shoutbox.cfg.php');

// The number of comments that will be kept alive
$msgToKeep 	= $params->get('messages_del') > 0 ? $params->get('messages_shown') : 10;
$msgShown	= $params->get('messages_shown') > 0 ? $params->get('messages_shown') : 10;

// Register globals - Thanks Karan et Etienne
$jal_lastID    = isset($_GET['jal_lastID']) ? $_GET['jal_lastID'] : "";
$jal_user_name = isset($_POST['n']) ? $_POST['n'] : ""; 
$jal_user_url  = isset($_POST['u']) ? $_POST['u'] : "";
$jal_user_text = isset($_POST['c']) ? $_POST['c'] : "";
$jalGetChat    = isset($_GET['jalGetChat']) ? $_GET['jalGetChat'] : "";
$jalSendChat   = isset($_GET['jalSendChat']) ? $_GET['jalSendChat'] : "";

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');

// Get username if they're login
$name = modZyuShoutboxHelper::getName(shoutbox_format);

// Header definitions
modZyuShoutboxHelper::initForHead();

// Never cache this page
if ($jalGetChat == "yes" || $jalSendChat == "yes") 
{
	header( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
	header( "Last-Modified: ".gmdate( "D, d M Y H:i:s" )."GMT" ); 
	header( "Cache-Control: no-cache, must-revalidate" ); 
	header( "Pragma: no-cache" );
	header( "Content-Type: text/html; charset=UTF-8" );
	
	//if the request does not provide the id of the last know message the id is set to 0
	if (!$jal_lastID) $jal_lastID = 0;
} /* End If */

// Retrieves all messages with an id greater than $jal_lastID
if ($jalGetChat == "yes") 
{ 
	echo modZyuShoutboxHelper::getLastMessage($jal_lastID);
	exit;

} /* End If */

// When user submits and javascript fails
if (isset($_POST['shout_no_js'])) 
{
	if ($_POST['shoutboxname'] != '' && $_POST['chatbarText'] != '') 
	{
		modZyuShoutboxHelper::putMessageData($_POST['shoutboxname'], $_POST['chatbarText'], $_POST['shoutboxurl']);
		
		modZyuShoutboxHelper::jalDeleteOld(); //some database maintenance
    	
    	//setcookie("jalUserName",$_POST['shoutboxname'],time()+60*60*24*30*3,'/');
    	//setcookie("jalUrl",$_POST['shoutboxurl'],time()+60*60*24*30*3,'/');
        //take them right back where they left off
		header('location: '.$_SERVER['HTTP_REFERER']);
	} else echo "You must have a name and a comment";
} /* End If */

// Only if a name and a message have been provides the information is added to the db
if ($jal_user_name != '' && $jal_user_text != '' && $jalSendChat == "yes") 
{
	//adds new data to the database
	modZyuShoutboxHelper::putMessageData($jal_user_name, $jal_user_text, $jal_user_url);

	//some database maintenance 
	modZyuShoutboxHelper::clnOldMessage($msgToKeep); 
	echo 'lolodok odading';
	exit;
} /* End If */ 

require(JModuleHelper::getLayoutPath('mod_zyushoutbox'));

?>