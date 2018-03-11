<?php
/**
* swmenufree v4.6 for Joomla1.5
* http://swmenupro.com
* Copyright 2007 Sean White
**/

//error_reporting (E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
defined( '_JEXEC' ) or die( 'Restricted access' );


global  $my, $Itemid,$mainframe;

	$absolute_path=JPATH_ROOT;
  $live_site = $mainframe->isAdmin() ? $mainframe->getSiteURL() : JURI::base();
$database = &JFactory::getDBO();
require_once($absolute_path."/modules/mod_swmenufree/styles.php");
require_once($absolute_path."/modules/mod_swmenufree/functions.php");

$do_menu=1;
$template = @$params->get( 'template' ) ? strval( $params->get('template') ) :  "All";
$language = @$params->get( 'language' ) ? strval( $params->get('language') ) :  "All";
$component = @$params->get( 'component' ) ? strval( $params->get('component') ) :  "All";

if($template!=""  && $template!="All"  ){
	if($mainframe->getTemplate()!=$template){$do_menu=0;}
}
if($language!=""  && $language!="All" ){
	if($lang!=$language){$do_menu=0;}
}
if($component!=""  && $component!="All" ){

	if(trim( JRequest::getVar( 'option', '' ) )!=$component){$do_menu=0;}
}

if($do_menu){

$menu = @$params->get( 'menutype' ) ? strval( $params->get('menutype') ) :  "mainmenu";
$id = @$params->get( 'moduleID' )?intval( $params->get('moduleID') ) :  0;
$menustyle = @$params->get( 'menustyle' )? strval( $params->get('menustyle') ) :  "popoutmenu";
$parent_level = @$params->get('parent_level') ? intval( $params->get('parent_level') ) :  0;
$levels = @$params->get('levels') ? intval( $params->get('levels') ) :  25;
$parent_id = @$params->get('parentid') ? intval( $params->get('parentid') ) :  0;
$active_menu = @$params->get('active_menu') ? intval( $params->get('active_menu') ) :  0;
$hybrid = @$params->get('hybrid') ? intval( $params->get('hybrid') ) :  0;
$editor_hack = @$params->get('editor_hack') ? intval( $params->get('editor_hack') ) :  0;
$sub_indicator = @$params->get('sub_indicator') ? intval( $params->get('sub_indicator') ) :  0;
$css_load = @$params->get('cssload') ? $params->get('cssload'): 0 ;
$use_table = @$params->get('tables') ? $params->get('tables'): 0 ;
$cache = @$params->get('cache') ? $params->get('cache'): 0 ;
$cache_time = @$params->get('cache_time') ? $params->get('cache_time'): "1 hour" ;
$selectbox_hack = @$params->get('selectbox_hack') ? intval( $params->get('selectbox_hack') ) :  0;
$show_shadow = @$params->get('show_shadow') ? intval( $params->get('show_shadow') ) :  0;

$my_task = trim( JRequest::getVar( 'task', '' ) );
if(($my_task=="edit" || $my_task=="new") && $editor_hack) {
  $editor_hack=0;
}else{
  $editor_hack=1;	
}


$query = "SELECT * FROM #__swmenufree_config WHERE id = 1";
$database->setQuery( $query );
$result = $database->loadObjectList();
$swmenupro=array();
while (list ($key, $val) = each ($result[0]))
{
    $swmenufree[$key]=$val;
}
$content= "\n<!--swMenuFree4.6J1.5RC3 ".$menustyle." by http://www.swmenupro.com-->\n";   

if($menu && $id && $menustyle){
	if($css_load==2){	
		$content.="<script type=\"text/javascript\">\n";
		$content.="<!--\n";
		$content.="function SWimportStyleSheet(shtName){\n";
		$content.="var link = document.createElement( 'link' );\n";
		$content.="link.setAttribute( 'href', shtName );\n";
		$content.="link.setAttribute( 'type', 'text/css' );\n";
		$content.="link.setAttribute( 'rel', 'stylesheet' );\n";			
		$content.="var head = document.getElementsByTagName('head').item(0);\n";
		$content.="head.appendChild(link);\n";
		$content.="}\n";
		$content.="-->\n";
		$content.="</script>\n";		

		$content.= "<script type='text/javascript'>\n";
		$content.= "<!--\n";
		$content.= "SWimportStyleSheet('".$live_site."/modules/mod_swmenufree/styles/menu.css');\n";
		$content.= "-->\n";
		$content.= "</script>\n";
	}else if($css_load==1){
    	$content.= "<link type='text/css' href='".$live_site."/modules/mod_swmenufree/styles/menu.css' rel='stylesheet' />\n";	
	}

	$ordered=swGetMenu($menu,$id,$hybrid,$cache,$cache_time,$use_table,$parent_id,$levels);
	if (count($ordered)){
    	
 		if ($active_menu){   
 	    	$active_menu=sw_getactive($ordered);
 	    }
 	    $ordered = chain('ID', 'PARENT', 'ORDER', $ordered, $parent_id, $levels); 
 		
	}

	if(count($ordered)){
		if ($menustyle == "mygosumenu" ){$content.= doGosuMenu($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack);}
		if ($menustyle == "transmenu"){$content.= doTransMenu($ordered, $swmenufree, $active_menu, $sub_indicator, $parent_id, $css_load,$selectbox_hack,$show_shadow);}
		
	}
}
$content.="\n<!--End swMenuFree menu module-->\n";

return $content;
}


function doGosuMenu($ordered, $swmenufree, $active_menu, $css_load,$selectbox_hack){
	 $live_site = JURI::base();
	$str="";
	$str.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/DropDownMenuX_Packed.js\"></script>\n";
   	
	if(!$css_load){
		if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")){$swmenufree = fixPadding($swmenufree);}
		$str.= "\n<style type='text/css'>\n";
		$str.= "<!--\n";
		$str.= gosuMenuStyle($swmenufree);
		$str.= "\n-->\n";
		$str.= "</style>\n";
	}
	$str.= GosuMenu($ordered, $swmenufree, $active_menu,$selectbox_hack);
	return $str;
}

function doTransMenu($ordered, $swmenufree, $active_menu,  $sub_indicator, $parent_id, $css_load,$selectbox_hack,$show_shadow){
	 $live_site = JURI::base();
	$str="";
	$str.= "<script type=\"text/javascript\" src=\"".$live_site."/modules/mod_swmenufree/transmenu_Packed.js\"></script>\n";
   	if(!$css_load){
		if ((substr(swmenuGetBrowser(),0,5)!="MSIE6")){$swmenufree = fixPadding($swmenufree);}
		$str.= "\n<style type='text/css'>\n";
		$str.= "<!--\n";
		$str.= transMenuStyle($swmenufree,$show_shadow);
		$str.= "\n-->\n";
		$str.= "</style>\n";
	}
	$str.= transMenu($ordered, $swmenufree, $active_menu,  $sub_indicator, $parent_id,$selectbox_hack);
	return $str;
}

?>



