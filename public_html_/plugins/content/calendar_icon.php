<?php
/**
* Calendar Icon - show calendar next to article title
* @package calendar_icon
* @author Tomasz Dobrzyński
* @version 1.2.4
* @copyright (C) 2008 by Tomasz Dobrzyński
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
**/

defined( '_JEXEC' ) or die( 'Direct Access to this location is not allowed.' );

jimport( 'joomla.event.plugin' );

class plgContentCalendar_Icon extends JPlugin
{
	function plgContentCalendar_Icon(&$subject)
	{
		parent::__construct($subject);
	
		$this->_plugin = JPluginHelper::getPlugin( 'content', 'calendar_icon' );
		$this->_params = new JParameter( $this->_plugin->params );
	
		global $mainframe;
		$config_style = $this->_params->get( 'style', 'box_milkway.css' );
		if( ($config_style=='box_user_style') || ($config_style=='con_user_style') )
		{
			$config_user_style = $this->_params->get( 'style_user' );
			$mainframe->addCustomHeadTag('<style type="text/css"><!--'.$config_user_style.'--></style>');
		}
		else
			$mainframe->addCustomHeadTag('<link rel=stylesheet href="plugins/content/calendar_icon/'.$config_style.'" type="text/css" media=screen>');
	}

	function _reverse(&$to_reverse)
	{
		if( $to_reverse=='left' )
			return 'right';
		elseif( $to_reverse=='right' )
			return 'left';
	}

	function _code_td_calendar(&$style, &$article_date)
	{
		//reading what language use Joomla! on front-end
		$db = &JFactory::getDBO();
		$query = 'SELECT params FROM #__components WHERE name="Language Manager"';
		$db->setQuery( $query );
		$lang_db = $db->loadObjectList();

		$lang_db_rows = explode("\n", $lang_db[0]->params);
		for($f=0; $f<count($lang_db_rows); $f++)
		{
			$rozbity = explode("=", $lang_db_rows[$f]);
			if($rozbity[0]=="site")
				$jezyk_front = $rozbity[1];
		}

		//if value somehow doesn't exist in database, set default EN ;)
		if(!isset($jezyk_front))
			$jezyk_front = "en-GB";


		/* loading necessary plugin params */
		$config_show_week_day = $this->_params->get( 'show_week_day', '0' );
		$config_show_day = $this->_params->get( 'show_day', '1' );
		$config_show_month = $this->_params->get( 'show_month', '1' );
		$config_show_year = $this->_params->get( 'show_year', '1' );


		/* getting date */
		$fulldate = JHTML::_('date', $article_date, JText::_('DATE_FORMAT_LC2'));
		$miesiac_dec = date('m', strtotime($article_date));

		//deleting double space when numer of day's chars==1 [Thanks Fredrik Angrimer]
		$fulldate = str_replace('  ', ' ', $fulldate);
		$explodedate = explode(' ', $fulldate);

		$day = null;
		$year = null;
		$month = null;
		$week_day = null;


		// EXPLODING DATE
		/* day of week [Monday] */
		for($x=0; $x<=2; $x++)
		{ $week_day .= $explodedate{0}{$x}; }

		/* day [31] */
		$day.= $explodedate{1};

		//adding additional ZERO if length of chars is equal 1 [good for Swedish ;)]
		if(strlen($day)==1)
			$day = '0'.$day;

		/* month [January] */
		for($x=0; $x<=2; $x++)
		{ $month .= $explodedate{2}{$x}; }

		//adding additional char if specific names of months are in french language and need one more char to correct display
		if(($miesiac_dec=="10" && $jezyk_front=="pl-PL") || ($miesiac_dec=="02" && $jezyk_front=="fr-FR") || ($miesiac_dec=="08" && $jezyk_front=="fr-FR") || ($miesiac_dec=="12" && $jezyk_front=="fr-FR"))
			$month .= $explodedate{2}{$x++};

		/* year [1990] */
		$year.= $explodedate{3};



		//initializing var that return code
		$td = null;

		if($style=='box')
			$td .= '<table border="0"><tr><td class="datetime">';

		if($config_show_week_day == 1)
			$td .= '<p class="top">'.$week_day.'</p>';
		else
			$td .= '<p class="top" style="display: none;">'.$week_day.'</p>';
	
		if($config_show_day == 1)
			$td .= '<p class="day">'.$day.'</p>';
		else
			$td .= '<p class="day" style="display: none;">'.$day.'</p>';
	
		if($config_show_month == 1)
			$td .= '<p class="mon">'.$month.'</p>';
		else
			$td .= '<p class="mon" style="display: none;"> '.$month.'</p>';
	
		if($config_show_year == 1)
			$td .= '<p class="year">'.$year.'</p>';
		else
			$td .= '<p class="year" style="display: none;">'.$year.'</p>';

		if($style=='box')
			$td .= '</td></tr></table>';

		return $td;
	}

	function plgContentCalendarCheckSecCatArt(&$row)
	{
		$plugin = &JPluginHelper::getPlugin('content', 'calendar_icon');
		$pluginParams  = new JParameter( $plugin->params );
		$pluginRegistry  = $pluginParams->_registry['_default']['data'];

		$value_sec = 0;
		$value_cat = 0;
		$value_art = 0;

		if ($pluginRegistry->sections !='')
		{
			// Check accepted section	
  			$aAcceptedSectionsArray = array();
  			$aAcceptedSectionsArray = explode( ',', $pluginRegistry->sections );
  			
  			if( in_array($row->sectionid, $aAcceptedSectionsArray) != true )
				$value_sec = '1';

  			unset($aAcceptedSectionsArray);
  		}
	  	
  		// Check accepted category
  		if ($pluginRegistry->categories !='')
		{
  			$aAcceptedCategoryArray = array();
  			$aAcceptedCategoryArray = explode( ',', $pluginRegistry->categories );
  			if( in_array($row->catid, $aAcceptedCategoryArray) != true )
    				$value_cat = '1';

			unset($aAcceptedCategoryArray);
  		}
  			
  			
  		// Check ignored articles
  		if ($pluginRegistry->articles !='')
		{
	  		$aIgnoredArticleArray = array();
  			$aIgnoredArticleArray = explode(',',$pluginRegistry->articles);
  			if( in_array($row->id, $aIgnoredArticleArray) )
				$value_art = '1';

	  		unset($aIgnoredArticleArray);
  		}
  		
  		if( ($value_sec==1) || ($value_cat==1) || ($value_art==1) )
  			return true;
  		else
  			return false; 		
  	}

	function _draw(&$row, &$params)
	{
		if ($this->plgContentCalendarCheckSecCatArt($row) == false)
		{
			/* checking whether calendar box have to be box
			   or contenaire; first three letter of style name
			   indicate about format:
			    * box and others: standard box (e.g. 50x50px)
			    * con:	      container    (e.g. 50x120px)
			*/
			$style_name = $this->_params->get( 'style' );
			$tmp = null;
			for($x=0; $x<=2; $x++)
			{
				$tmp .= $style_name{$x};
			}

			if( $tmp=='con' )
				$style = 'con';
			else
				$style = 'box';

			/* var that gets calendar code and establish its position */
			if($this->_params->get('showing', '0')=='1')
				$data_artykulu = $row->modified;
			else
				$data_artykulu = $row->created;

			$calendar = $this->_code_td_calendar($style, $data_artykulu);
			$config_position = $this->_params->get( 'position', 'left' );
			$reversed = $this->_reverse($config_position);


			/* checking that user wish an orginal dates */
			if( !$this->_params->get( 'orginal_date' , '1' ) )
				$params->set('show_create_date', '0');


			/*checking that has been used "advanced template" */
			$config_templ = $this->_params->get( 'advanced_template', '1' );

			if( $config_templ==0 )
			{
				$send = null;
				$title=0; $author=0; $date=0;
				$meth_top=0; $meth_bot=0;

				/* selecting position: TOP or BOT? */
				if( $params->get('show_title') )
					$title = 1;
				if( $params->get('show_author') )
					$author = 1;
				if( $params->get('show_create_date') )
					$date = 1;

				/* summary; selecting right place */
				if( $title==1 || $author==1 || $date==1 )
					$meth_top = 1;
				else
					$meth_bot = 1;


				$send .= '<table width="100%" border=0><tr valign="top">';
				/* drawing text */
				if( $meth_top==1 )
				{
					/* if position is right, have to be reverse LEFT and RIGHT */
					if( $config_position=='left' )
					{
						if( $style=='box' )
							$send .= '<td>';
						else
							$send .= '<td class="datetime">';

						$send .= $calendar.'</td><td class="spacer_right" style="width:100%;">';

						echo $send; /* building beginning of table */
						$row->text = '</td></tr></table> </td></tr></table> <table width="100%"><tr><td>'.$row->text; /* building end of table */
					}
					else
					{
						$send .= '<td style="width:100%;">';
						echo $send; /* building beginning of table */
						$row->text = '</td></tr></table> </td><td style="width:100%; float: right;" class="datetime">'.$calendar.'</td></tr></table> <table width="100%"><tr><td>'.$row->text; /* building end of table */
					}			
				}
				else
				{
					if($style=='box')
						$row->text = '<div style="float:'.$config_position.'; padding-'.$reversed.':5px;">'.$calendar.'</div>'.$row->text;
					else
						$row->text = '<div style="float:'.$config_position.'; padding-'.$reversed.':5px;"><table><tr><td class="datetime">'.$calendar.'</td></tr></table></div>'.$row->text;
				}
			}
			elseif( $config_templ==1 )
			{
				if($style=='box')
					$row->calendar_icon = '<div style="float:'.$config_position.'; padding-'.$reversed.':5px;">'.$calendar.'</div>';
				else
					$row->calendar_icon = '<div style="float:'.$config_position.'; padding-'.$reversed.':5px;"><table><tr><td class="datetime">'.$calendar.'</td></tr></table></div>';
			}
		}
	}

	function onBeforeDisplayContent(&$row, &$params)
	{
	
		/*
		  sample table with coding indicators; this is standard example
		  when user set up "calendar icon" on left side. when right side
		  will be set, plugin make reverse (RIGHT instead LEFT, and RIGHT
		  instead LEFT).

			+-------------------TABLE_X---------------------------------+
			| ====== +---LEFT----+----------------RIGHT---------------+ |
			|  TOP { |           |                                    | |
			|  TOP { | CALENDAR  |    TITLE_OF_ARTICLE                | |
			|  TOP { |   ICON    |    AUTHOR                          | |
			|  TOP { |           |                                    | |
			| ====== +-----------+------------------------------------+ |
			|  BOT { |                                                | |
			|  BOT { |    CONTENT_OF_ARTICLE (not relevant)           | |
                        |  BOT { |                                                | |
			| ====== +------------------------------------------------+ |
			+-----------------------------------------------------------+

		  Why there are two sections (TOP and BOT)? When plugin see that article
		  hasn't TITLE_OF_ARTICLE, AUTHOR, and DATE (depend on user), plugin will
		  change structure of BOT section, not TOP. If TOP is empty, and calendar
		  icon will be put, next to this icon, will appear "big" white hole.
		  That's why better solution is placing calendar icon in Bottom section
		*/
		
		
		$config_displaying = $this->_params->get( 'displaying' );
		if( $config_displaying==0 )
		{
			//frontpage only
			if( isset($row->author) && (JRequest::getVar('view')=='frontpage') )
				$this->_draw($row, $params);
		}
		elseif( $config_displaying==1 )
		{
			//frontpage + articles
			if( isset($row->author) && ((JRequest::getVar('view')=='frontpage') || (JRequest::getVar('view')=='article')) )
				$this->_draw($row, $params);
		}
		elseif( $config_displaying==2 )
		{
			//everywhere
			if( isset($row->author) )
				$this->_draw($row, $params);
		}
		elseif( $config_displaying==3 )
		{
			//articles only
			if( isset($row->author) && (JRequest::getVar('view')=='article') )
				$this->_draw($row, $params);
		}
		elseif( $config_displaying==4 )
		{
			
			//articles only + blogs
			if( isset($row->author) && ((JRequest::getVar('view')=='article') || (JRequest::getVar('view')=='section') || (JRequest::getVar('view')=='category')) )
			
			$this->_draw($row, $params);
		}
	}
}
?>
