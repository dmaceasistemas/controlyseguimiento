<?php
/**
 * SDB Accordion Menu
 * @version $Id: mod_sbd_rollmenu.php,v 0.8.8 2008-03-03 23:28 deutz Exp $
 * @package sbd_nicertables
 * @copyright Copyright (C) 2007 Simple By Design
 * @license Custom License
 *
 * More Information regarding this module can be found at the following location:
 *
 * http://www.simplebydesign.co.uk/joomla/modules/sbd-accordian-menu.html
 *
 * To view the license:
 *
 * http://www.simplebydesign.co.uk/legal/terms-and-conditions/general-software-licensing.html
 *
 **/


// no direct access
defined( '_VALID_MOS' ) or die( 'Restricted access' );

if (!defined( '_MOS_ROLLMENU_MODULE' )) {
	$GLOBALS['sSBDRollMenudEBUG'] = array();
	/** ensure that functions are declared only once */
	define( '_MOS_ROLLMENU_MODULE', 1 );

	/**
	 * Utility function for writing a menu link
	 */
	function sbdrollGetMenuLink( $mitem, $level=0, &$params, $open=null, $url=0 ) {
		global $Itemid, $mosConfig_live_site, $mainframe;
		global $id, $_VERSION;
		$contentId = $id;
		$txt = '';
		$GLOBALS['sSBDRollMenudEBUG'][$mitem->id]['name'] = $mitem->name;
		if( !isset( $mitem->urldone ) ){
			$mitem->urldone = 0;
		}
		$GLOBALS['sSBDRollMenudEBUG'][$mitem->id]['urldone'] = $mitem->urldone;
		if( $mitem->urldone == 0 ){
			switch ($mitem->type) {
				case 'separator':
				case 'component_item_link':
					break;
				case 'url':
					if ( eregi( 'index.php\?', $mitem->link ) && !eregi( 'http', $mitem->link ) && !eregi( 'https', $mitem->link ) ) {
						if ( !eregi( 'Itemid=', $mitem->link ) ) {
							$mitem->link .= '&Itemid='. $mitem->id;
							$GLOBALS['sSBDRollMenudEBUG'][$mitem->id]['url'] = $mitem->link;
						}
					}
					break;
				case 'content_item_link':
				case 'content_typed':
					// load menu params
					$menuparams = new mosParameters( $mitem->params, $mainframe->getPath( 'menu_xml', $mitem->type ), 'menu' );

					$unique_itemid = $menuparams->get( 'unique_itemid', 1 );

					if ( $unique_itemid && !eregi( 'Itemid=', $mitem->link ) ) {
						$mitem->link .= '&Itemid='. $mitem->id;
						$GLOBALS['sSBDRollMenudEBUG'][$mitem->id]['uniqueitemid'] = $mitem->link;
					} else {
						$temp = split('&task=view&id=', $mitem->link);

						if ( $mitem->type == 'content_typed' ) {
					  if ( !eregi( 'Itemid=', $mitem->link ) ) {
					  	$mitem->link .= '&Itemid='. $mainframe->getItemid($temp[1], 1, 0);
					  	$GLOBALS['sSBDRollMenudEBUG'][$mitem->id]['contenttyped'] = $mitem->link;
					  }
						} else {
					  if ( !eregi( 'Itemid=', $mitem->link ) ) {
					  	$mitem->link .= '&Itemid='. $mainframe->getItemid($temp[1], 0, 1);
					  	$GLOBALS['sSBDRollMenudEBUG'][$mitem->id]['noncontenttyped'] = $mitem->link;
					  }
						}
					}
					break;

				default:
					if ( !eregi( 'Itemid=', $mitem->link ) ) {
	  			$mitem->link .= '&Itemid='. $mitem->id;
	  			$GLOBALS['sSBDRollMenudEBUG'][$mitem->id]['default'] = $mitem->link;
					}
					break;
			}
		}


		// Active Menu highlighting
		$current_itemid = $Itemid;
		if ( !$current_itemid ) {
			$id = '';
		} else if ( $current_itemid == $mitem->id ) {
			$id = 'id="active_roll_menu'. $params->get( 'class_sfx' ) .'"';
		} else if( isset( $open ) && in_array( $mitem->id, $open ) )  {
			$id = 'id="activeparent_roll_menu';
			if( $params->get( 'parentlevel' ) ){
				$id .= '_' . $level;
			}
			$id .= $params->get( 'class_sfx' ) .'"';
		} else {
			$id = '';
		}

		if ( $params->get( 'full_active_id' ) ) {
			// support for `active_menu` of 'Link - Component Item'
			if ( $id == '' && $mitem->type == 'component_item_link' ) {
				parse_str( $mitem->link, $url );
				if ( $url['Itemid'] == $current_itemid ) {
					$id = 'id="active_roll_menu'. $params->get( 'class_sfx' ) .'"';
				}
			}

			// support for `active_menu` of 'Link - Url' if link is relative
			if ( $id == '' && $mitem->type == 'url' && strpos( 'http', $mitem->link ) === false) {
				parse_str( $mitem->link, $url );
				if ( isset( $url['Itemid'] ) ) {
					if ( $url['Itemid'] == $current_itemid ) {
						$id = 'id="active_roll_menu'. $params->get( 'class_sfx' ) .'"';
					}
				}
			}
		}

		// replace & with amp; for xhtml compliance
		if( $mitem->urldone == 0 ){
			$mitem->link = ampReplace( $mitem->link );
			$GLOBALS['sSBDRollMenudEBUG'][$mitem->id]['ampreplace'] = $mitem->link;
			if( $_VERSION->RELEASE == '1.0'){
				// run through SEF convertor
				$mitem->link = sefRelToAbs( $mitem->link );
			}else{
				if (strcasecmp(substr($mitem->link, 0, 4), 'http')) {
					$mitem->link = JRoute::_($mitem->link, true, 0);
				} else {
					//		$mitem->link = $mitem->link;
				}

			}

		}
		$GLOBALS['sSBDRollMenudEBUG'][$mitem->id]['sef'] = $mitem->link;

		$menuclass = 'rollmainlevel';
		if( $params->get( 'menulevel_sfx' ) )
		$menuclass .= '_'.$mitem->id;
		$tempsfx = $params->get( 'class_sfx' );
		if( !empty( $tempsfx  ) )
		$menuclass .= '_' . $params->get( 'class_sfx' );
		if ($level > 0) {
			$menuclass = 'rollsublevel';
			if( $params->get( 'menulevel_sfx' ) )
			$menuclass .= '_'.$mitem->parent;
			if( $params->get( 'level_sfx' ) )
			$menuclass .= '_'.$level;
			if( !empty( $tempsfx ) )
			$menuclass .= '_' . $params->get( 'class_sfx' );

		}

		// replace & with amp; for xhtml compliance
		// remove slashes from excaped characters
		$mitem->name = stripslashes( ampReplace($mitem->name) );
		if( $mitem->link == '#' || $mitem->link == '/' || empty( $mitem->link) || $mitem->link == ''){
			$mitem->browserNav = 3;
		}
		switch ($mitem->browserNav) {
			// cases are slightly different
			case 1:
				// open in a new window
				$txt = '<a href="'. $mitem->link .'" target="_blank" class="'. $menuclass .'" '. $id .'>'. $mitem->name .'</a>';
				break;

			case 2:
				// open in a popup window
				$txt = "<a href=\"#\" onclick=\"javascript: window.open('". $mitem->link ."', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550'); return false\" class=\"$menuclass\" ". $id .">". $mitem->name ."</a>";
				break;

			case 3:
				// don't link it
				$txt = '<span class="'. $menuclass .'" '. $id .'>'. $mitem->name .'</span>';
				break;

			default:
				// open in parent window
				$txt = '<a ';
				if( $params->get( 'use_mouseover' ) == 1  )
				$txt .= "onclick=\"javascript: window.location='" . $mitem->link . "'\" ";
				$txt .= 'href="' . $mitem->link .'" class="'. $menuclass .'" '. $id .'>'. $mitem->name .'</a>';
				break;
		}

		$mitem->urldone = 1;
		if( $url ){
			$txt = $mitem->link;
		}
		$GLOBALS['sSBDRollMenudEBUG'][$mitem->id]['txt'] = $txt;
		return $txt;
	}

	/**
	 * Vertically Indented Menu
	 */
	function sbdrollShowMenu(  &$params ) {
		global $database, $my, $cur_template, $Itemid;
		global $mosConfig_absolute_path, $mosConfig_live_site, $mosConfig_shownoauth;
		global $_VERSION;

		/* If a user has signed in, get their user type */
		$intUserType = 0;
		if($my->gid){
			switch ($my->usertype) {
				case 'Super Administrator':
					$intUserType = 0;
					break;

				case 'Administrator':
					$intUserType = 1;
					break;

				case 'Editor':
					$intUserType = 2;
					break;

				case 'Registered':
					$intUserType = 3;
					break;

				case 'Author':
					$intUserType = 4;
					break;

				case 'Publisher':
					$intUserType = 5;

					break;

				case 'Manager':
					$intUserType = 6;
					break;
			}
		} else {
			/* user isn't logged in so make their usertype 0 */
			$intUserType = 0;
		}

		if( $_VERSION->RELEASE == '1.0' && ( $params->get('joomlaver') == 0 || $params->get('joomlaver') == 1  ) ){
			$and = '';
			if ( !$mosConfig_shownoauth ) {
				$and = "\n AND access <= " . (int) $my->gid;
			}
			$sql = "SELECT m.*"
			. "\n FROM #__menu AS m"
			. "\n WHERE menutype = " . $database->Quote( $params->get( 'menutype' ) )
			. "\n AND published = 1"
			. $and
			. "\n ORDER BY parent, ordering";
			$database->setQuery( $sql );
			$rows = $database->loadObjectList( 'id' );

			// establish the hierarchy of the menu
			$children = array();

			// first pass - collect children
			foreach ($rows as $v ) {

				$pt 	= $v->parent;
				$list 	= @$children[$pt] ? $children[$pt] : array();
				array_push( $list, $v );
				$children[$pt] = $list;
			}

			// second pass - collect 'open' menus
			$open 	= array( $Itemid );
			$count 	= 20; // maximum levels - to prevent runaway loop
			$id 	= $Itemid;

			while (--$count) {
				if (isset($rows[$id]) && $rows[$id]->parent > 0) {
					$id = $rows[$id]->parent;
					$open[] = $id;

				} else {
					break;
				}
			}
		}
		if( $_VERSION->RELEASE == '1.5' && ( $params->get('joomlaver') == 0 || $params->get('joomlaver') == 2  ) ){

			$menu = & JSite::getMenu();
			$user = & JFactory::getUser();
			$rows = $menu->getItems('menutype', $params->get('menutype'));

			// first pass - collect children
			$cacheIndex = array();
			if(is_array($rows) && count($rows)) {
				foreach ($rows as $index => $v) {
					if ($v->access <= $user->get('gid')) {
						$pt = $v->parent;
						$list = @ $children[$pt] ? $children[$pt] : array ();
						array_push($list, $v);
						$children[$pt] = $list;
					}
					$cacheIndex[$v->id] = $index;
				}
			}
			// second pass - collect 'open' menus
			$open = array (
			$Itemid
			);
			$count = 20; // maximum levels - to prevent runaway loop
			$id = $Itemid;

			while (-- $count)
			{
				if (isset($cacheIndex[$id])) {
					$index = $cacheIndex[$id];
					if (isset ($rows[$index]) && $rows[$index]->parent > 0) {
						$id = $rows[$index]->parent;
						$open[] = $id;
					} else {
						break;
					}
				}
			}
			if( $params->get( 'openparentmenu' ) == 1 ){
				echo "<script type=\"text/javascript\">";
				echo	"runOver( 'sbd" . end( $open ) . "' );";
				echo "</script>";
			}
		}
		echo "<dl class=\"accordion-menu\"";

		echo ">";
		sbdrollRecurseMenu( 0, 0, $children, $open, $indents, $params, 0 );
		echo "</dl>";
	}

	/**
	 * Utility function to recursively work through a vertically indented
	 * hierarchial menu
	 */
	function sbdrollRecurseMenu( $id, $level, &$children, &$open, &$indents, &$params, $previousLevel ) {
		$menuCount = 0;
		$lastItemId = 0;
		if (@$children[$id]) {
			$n = min( $level, count( $indents )-1 );

			foreach ($children[$id] as $row) {
				$GLOBALS['sSBDRollMenudEBUG'][$row->id]['rowname'] = $row->name;
				$link = sbdrollGetMenuLink( $row, $level, $params, $open );
				$GLOBALS['sSBDRollMenudEBUG'][$row->id]['retlink'] = $link;
				if( $level == 0 ){
					echo "<dt class=\"";
					if( ( isset( $children[$row->id] ) && is_array( $children[$row->id] ) ) || $params->get( 'noextramenu' ) == 0 ){
						echo "a-m-t";
					}else{
						echo "a-m-t-n";
					}
					echo "\" id=\"sbd".$row->id."\" ";

					if( ( $params->get( 'use_mouseover' ) == 1 || $params->get('top_linkclick' ) == 1 ) && isset( $children[$row->id] ) && is_array( $children[$row->id] ) ){
						echo "onmouseover=\"javascript:void( runOver( 'sbd" . $row->id . "' ) );\"";
					}
					
					if( $params->get('top_linkclick' ) == 0 && !isset( $children[$row->id] ) && !is_array( $children[$row->id] ) && $params->get( 'noextramenu' ) == 1 ){
						$url = sbdrollGetMenuLink( $row, $level, $params, $open, 1 );
						$GLOBALS['sSBDRollMenudEBUG'][$row->id]['returl'] = $url;
						global $mosConfig_live_site;
						$siteURL = $mosConfig_live_site . "/";
						if( $url != $siteURL && $url != "" ){
							$action = "";
							switch( $row->browserNav ){
								case 1:
									$action = "window.open('". $url ."', '', '')";
									break;
								case 2:
									$action = "window.open('". $url ."', '', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=780,height=550')";
									break;
								default:
									$action = "window.location = '" . $url . "'";
									break;
							}

							echo " onclick=\"javascript:void( " . $action . " );\"";
						}
					}
					if( $params->get( 'use_mouseover' ) == 0 && $params->get('top_linkclick' ) == 0 && isset( $children[$row->id] ) && is_array( $children[$row->id] ) ){
						echo "onclick=\"javascript:void( runOver( 'sbd" . $row->id . "' ) );\"";
					}
					if( $params->get( 'use_mouseover' ) == 0 && $params->get('top_linkclick' ) == 0 && !isset( $children[$row->id] ) && !is_array( $children[$row->id] ) && $params->get( 'noextramenu' ) == 0  ){
						echo "onclick=\"javascript:void( runOver( 'sbd" . $row->id . "' ) );\"";
					}

					echo ">";
					$showDiv = 1;
					
					if( $params->get( 'use_mouseover' ) == 1 || $params->get('top_linkclick' ) == 1 ){
						echo $link;
						echo "</dt>";
					}else{
						if( isset( $children[$row->id] ) && is_array( $children[$row->id] ) ){
						}else{
							$showDiv = 0;
						}
						echo $row->name;
						$GLOBALS['sSBDRollMenudEBUG'][$row->id]['dtname'] = $url;
						echo "</dt>";
					}
					if( ( isset( $children[$row->id] ) && is_array( $children[$row->id] ) ) || $params->get( 'noextramenu' ) == 0  ){
						echo '<dd class="a-m-d"><div class="bd"><dl class="rollmenu';
						if( $params->get( 'menulevel_sfx' ) )
						echo '_'.$row->id;
						if( $params->get( 'level_sfx' ) )
						echo '_'.$level;
						echo $params->get( 'class_sfx' ).'">';

						if( $row->link == '#' || $row->link == '/' || empty( $row->link) || $row->link == ''){
							$mitem->browserNav = 3;
						}
						if( $params->get( 'noextramenu' ) == 0 && $row->link != '#' && $row->link != '/' && !empty( $row->link) && $row->link != '' ){
							echo '<dd>' . $link . '</dd>';
						}
						if( $showDiv ){
							//							echo "<dl>";
						}
					}
				}else{
					echo "<dd>" . $link . "</dd>";
					if( isset( $children[$row->id] ) && is_array( $children[$row->id] ) ){
						echo '<dd><dl class="rollmenu';
						if( $params->get( 'menulevel_sfx' ) )
						echo '_'.$row->id;
						if( $params->get( 'level_sfx' ) )
						echo '_'.$level;
						echo $params->get( 'class_sfx' ).'">';
					}
				}

				sbdrollRecurseMenu( $row->id, $level+1, $children, $open, $indents, $params, $row->id );

				if( $level == 0 ){
					$menuCount++;
					$lastItemId = $row->id;
					if( ( $params->get( 'use_mouseover' ) == 0 || $params->get('top_linkclick' ) == 0 ) && isset( $children[$row->id] ) && is_array( $children[$row->id] ) && !$showDiv ){
						echo "</dl>";
					}
					if( ( isset( $children[$row->id] ) && is_array( $children[$row->id] ) ) || $params->get( 'noextramenu' ) == 0  ){
						echo '</dl></div></dd>';
					}
				}elseif( isset( $children[$row->id] ) && $children[$row->id] ){
					echo "</dl></dd>";
				}
			}
		}
		if( $menuCount == 1 && $params->get('opensinglemenu') == 1 ){
			echo "<script type=\"text/javascript\">";
			echo "AccordionMenu.openDtById('sbd" . $lastItemId . "');";
			echo "</script>";
		}
	}

}
$params->def('menutype', 			'mainmenu');
$params->def('class_sfx', 			'');
$params->def('time_delay', 		1500);
$params->def('menu_delay', 		10);
$params->def('use_mouseover',	1);
$params->def('top_linkclick', 1);
$params->def('noextramenu', 0 );
$params->def('openparentmenu', 1 );
$params->def('usecompressedjs', 1 );
$params->def('attemptvalidation', 0 );
$params->def('opensinglemenu', 1 );
$params->def('joomlaver', 0);
$params->def('hidemenunoscript', 0 );
$params->def('noscriptmsg', 'Menu requires javascript' );

global $_VERSION;
global $mosConfig_live_site;

switch( $_VERSION->RELEASE  ){
	case '1.5':
		global $mosConfig_live_site;
		$modDir = $mosConfig_live_site . "/modules/mod_sbd_rollmenu/mod_sbdrollmenu/";
		break;
	default:
		$modDir = $mosConfig_live_site . "/modules/mod_sbdrollmenu/";
}
switch( $params->get('joomlaver') ){
	case 0:
		break;
	case 1:
		$modDir = $mosConfig_live_site . "/modules/mod_sbdrollmenu/";
		break;
	case 2:
		$modDir = $mosConfig_live_site . "/modules/mod_sbd_rollmenu/mod_sbdrollmenu/";
		break;
}

if( !isset($GLOBALS['sSBDRollMenu']) || empty( $GLOBALS['sSBDRollMenu'] ) ){
	global $database, $Itemid;
	echo '<!--required library-->
 <!--Simple By Design: SBD Accordion Menu for Joomla (v0.8.8) - http://www.simplebydesign.co.uk/joomla/modules/sbd-accordian-menu.html-->
 <!--Yahoo! User Interface Library : http://developer.yahoo.com/yui/index.html-->
 <script type="text/javascript" src="'.$modDir.'yahoo_2.0.0-b2.js"></script>
 <script type="text/javascript" src="'.$modDir.'event_2.0.0-b2.js" ></script>
 <script type="text/javascript" src="'.$modDir.'dom_2.0.2-b3.js"></script>
 <script type="text/javascript" src="'.$modDir.'animation_2.0.0-b3.js"></script>';
	if( $params->get( 'usecompressedjs' ) == 1 ){
		echo '<script type="text/javascript" src="'.$modDir.'mod_sbd_roll_compressed.js"></script><!--//required library-->';
	}else{
		echo '<script type="text/javascript" src="'.$modDir.'mod_sbd_rollmenu.js"></script><!--//required library-->';
	}
	if( $params->get('attemptvalidation') == 0 ){
		echo '<style type="text/css" media="screen">@import "'.$modDir.'mod_sbd_rollmenu.css";</style>';
	}


	echo "<script type=\"text/javascript\">function runOver( id ){
		 	  if( runOk == 1 ){
			  	runOk = 0;
					window.setTimeout( 'switchRun()', " . $params->get( 'time_delay' ) . " );
					window.setTimeout( 'AccordionMenu.openDtById(\''+id+'\')'," . $params->get( 'menu_delay' ) . " );
			  }
			}";

	if( $params->get( 'openparentmenu' ) == 1 && $_VERSION->RELEASE =='1.0' && ( $params->get('joomlaver') == 0 || $params->get('joomlaver') == 1 ) ){

		$sql = "SELECT m.*"
		. "\n FROM #__menu AS m"
		. "\n WHERE menutype = " . $database->Quote( $params->get( 'menutype' ) )
		. "\n AND published = 1"
		. "\n ORDER BY parent, ordering";

		$database->setQuery( $sql );
		$rows = $database->loadObjectList( 'id' );

		// first pass - collect children
		foreach ($rows as $v ) {

			$pt 	= $v->parent;
			$list 	= @$children[$pt] ? $children[$pt] : array();
			array_push( $list, $v );
			$children[$pt] = $list;
		}


		// second pass - collect 'open' menus
		$open 	= array( $Itemid );
		$count 	= 20; // maximum levels - to prevent runaway loop
		$id 	= $Itemid;

		while (--$count) {
			if (isset($rows[$id]) && $rows[$id]->parent > 0) {
				$id = $rows[$id]->parent;
				$open[] = $id;

			} else {
				break;
			}
		}
		echo	"runOver( 'sbd" . end( $open ) . "' );";
	}

	echo "			</script>";
}
$GLOBALS['sSBDRollMenu'] = true;
$GLOBALS['sSBDRollMenudEBUG'][0]['version'] = $_VERSION->RELEASE;
$GLOBALS['sSBDRollMenudEBUG'][0]['menutype'] = $params->get('menutype');
$GLOBALS['sSBDRollMenudEBUG'][0]['class_sfx'] = $params->get('class_sfx');
$GLOBALS['sSBDRollMenudEBUG'][0]['time_delay'] = $params->get('time_delay');
$GLOBALS['sSBDRollMenudEBUG'][0]['menu_delay'] = $params->get('menu_delay');
$GLOBALS['sSBDRollMenudEBUG'][0]['use_mouseover'] = $params->get('use_mouseover');
$GLOBALS['sSBDRollMenudEBUG'][0]['top_linkclick'] = $params->get('top_linkclick');
$GLOBALS['sSBDRollMenudEBUG'][0]['noextramenu'] = $params->get('noextramenu');
$GLOBALS['sSBDRollMenudEBUG'][0]['openparentmenu'] = $params->get('openparentmenu');
$GLOBALS['sSBDRollMenudEBUG'][0]['usecompressedjs'] = $params->get('usecompressedjs');
$GLOBALS['sSBDRollMenudEBUG'][0]['attemptvalidation'] = $params->get('attemptvalidation' );
$GLOBALS['sSBDRollMenudEBUG'][0]['opensinglemenu'] = $params->get('opensinglemenu');
$GLOBALS['sSBDRollMenudEBUG'][0]['joomlaver'] = $params->get('joomlaver');
$GLOBALS['sSBDRollMenudEBUG'][0]['hidemenunoscript'] = $params->get('hidemenunoscript');
$GLOBALS['sSBDRollMenudEBUG'][0]['noscriptmsg'] = $params->get('noscriptmsg');

sbdrollShowMenu( $params );

if( isset($_GET['sdbDebug']) && $_GET['sdbDebug'] == 1 ){
	echo "<pre>";
	print_r( $GLOBALS['sSBDRollMenudEBUG'] );
	echo "</pre>";
}

if( $params->get('hidemenunoscript') == 1 ){
	?>
<noscript>
<style type="text/css">
dl.accordion-menu {
	display: none;
}
</style>
	<?php echo $params->get("noscriptmsg"); ?></noscript>
	<?php }  ?>