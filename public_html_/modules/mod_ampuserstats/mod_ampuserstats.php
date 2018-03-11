<?php
/**
* Author: Joommasters.com
*Mail: joommasters@gmail.com
*URL:www.joommasters.com
*This module has been updated from the above version by Amplify - http://www.projectamplify.com
*/	

// no direct access
defined('_JEXEC') or die('Restricted access');

require_once (dirname(__FILE__).DS.'helper.php');

$latest_member							= $params->get( 'latest_member', 1 ) ;
$total_member							= $params->get( 'total_member', 1 ) ;
$number_member_online					= $params->get( 'number_member_online', 1 ) ;
$number_register_today					= $params->get( 'number_register_today', 1 ) ;
$number_register_thisweek				= $params->get( 'number_register_thisweek', 1 ) ;
$number_register_this_month				= $params->get( 'number_register_this_month', 1 ) ;

$latest_member_lab						= $params->get( 'latest_member_label', '' );
$total_member_lab						= $params->get( 'total_member_label', '' );
$number_member_online_lab				= $params->get( 'number_member_online_label', '' );
$number_register_today_lab				= $params->get( 'number_register_today_label', '' );
$number_register_thisweek_lab			= $params->get( 'number_register_thisweek_label', '' );
$number_register_thismonth_lab			= $params->get( 'number_register_thismonth_label', '' );
$amplify_credit_link					= $params->get( 'amplify_credit', '' );

$moduleclass_sfx = $params->get('moduleclass_sfx', '');
$list = modAmpUserStats::getList();
$path = JModuleHelper::getLayoutPath('mod_ampuserstats', 'default');

if (file_exists($path)) {
	require($path);
}
