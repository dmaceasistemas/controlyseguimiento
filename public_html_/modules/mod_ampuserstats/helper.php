<?php
/**
* Author: Joommasters.com
*Mail: joommasters@gmail.com
*URL:www.joommasters.com
*This module has been updated from the above version by Amplify - http://www.projectamplify.com
*/	

// no direct access
defined('_JEXEC') or die('Restricted access');

		
		$goDoc =& JFactory::getDocument();
		$goDoc->addStyleSheet( JURI::root().'modules/mod_ampuserstats/tmpl/stylesheet.css' );

class modAmpUserStats
{
	
	function getList()
	{
		global $mainframe;
		
		$database 	=& JFactory::getDBO();
		
		
		$sql = "SELECT * FROM #__users WHERE block=0 Order By registerDate DESC";
		$database->setQuery($sql);
		$rows = $database->loadObjectList();
		$total_num = count($rows);
		$list->total_num = $total_num;
		$list->latest_member = $rows[0]->name;
		
		$sql = "SELECT DISTINCT a.username"
		."\n FROM #__session AS a"
		."\n WHERE a.guest = 0"
		;
		$database->setQuery($sql);
		$rows = $database->loadObjectList();	
		$list->member_online = count($rows);
		
		$today 	= date("Y-m-d");
		$week 	= date('W');
		$month	= date("Y-m");
		$year 	= date("Y");
		$sql = "SELECT registerDate FROM #__users WHERE block=0";
		$database->setQuery($sql);
		$rows = $database->loadObjectList();

		$num_today 		= 0; 
		$num_week 		= 0; 
		$num_month 		= 0; 
		
		for($i=0;$i<count($rows);$i++) {
	
			$registertime = strtotime($rows[$i]->registerDate);
			$week_register = date('W',$registertime);
			
			if(substr($rows[$i]->registerDate,0,7)==$month) {
				$num_month++;
			}
			
			if((substr($rows[$i]->registerDate,0,4)==$year) & ($week == $week_register)) {
				$num_week++;		
			}
			
			if(substr($rows[$i]->registerDate,0,10)==$today) {
				$num_today++;
			}
	
		}
		
		$list->num_today = $num_today;
		$list->num_week = $num_week;
		$list->num_month = $num_month;
		return 	$list;	
	}
}
