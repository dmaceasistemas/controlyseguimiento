<?php

/**
* News Master Scroller ( --= NMS =-- ) v1.3.1 
* Created and offered by MamboToys. 
* Release Date: Jan. 27, 2007
* Original Release Date: July 25, 2006
* All rights reserved.
* ********************************************************
* @package Module for Joomla! CMS Software Packages
* @version 1.3.1
* @copyright (C) by MamboToys.com
* @author  Ray Gilman <support@mambotoys.com>
* @link http://www.mambotoys.com/ <MamboToys.com>
* @license http://creativecommons.org/licenses/by-sa/2.0/
* ********************************************************
*/

/**
* News Master Scroller 
* To Do List
* -------------------------------------------------------
* Finish Title CSS functionality
* Add Content CSS functionality
* Add module suffix compatibility
* Add item display capability
* Fix known bugs
* Add addition features
* -*- Finish date display
*/

/**
* Restrict direct access to this file.
* @global _VALID_MOS
* 
*/
defined( '_VALID_MOS' ) or die( ' <a href="http://www.mambotoys.com">--= MamboToys.com =--</a> ' );
    global $database, $my, $mosConfig_offset, $mainframe;

    $g_ID[] = $mainframe->getBlogSectionCount();
    $g_ID[] = $mainframe->getBlogCategoryCount();
    $g_ID[] = $mainframe->getGlobalBlogSectionCount();

    /**
    * setup for copy module compatibility.
    */
    if(!DEFINED('_NMS_')) {

        /**
        * define news scroller's constant.
        */
        define('_NMS_',1);

        /**
        * class mod_nms_.
        */
        class mod_nms_ {
            // mammeters
            var $nms_version                = '1.3.1';      // ** internal **
            var $nms_catsect                = 'cat';        // NMSCatSect
            var $nms_width                  = '100%';       // NMSWidth
            var $nms_height                 = '170px';      // NMSHeight
            var $nms_align                  = 'left';       // NMSAlign
            var $nms_loop                   = 'infinite';   // NMSLoop
            var $nms_behavior               = 'up';         // NMSBehavior
            var $nms_how_search             = 'random';     // NMSHowSearch
            var $nms_how_sort               = 'asc';        // NMSHowSort
            var $nms_debug                  = 'FALSE';      // NMSDeBugON
            var $nms_err_text               = "News Master Scroller is unable to retrieve content from the DB.";
            var $nms_text_cutoff            = '0';          // NMSTextCutoff
            var $nms_line_count             = '2';          // NMSLineCount
            var $nms_line_count_char        = '0';          // NMSLineCountChar
            var $nms_catsect_id             = '1';          // ** related to: NMSUseStatic **
            var $nms_scroll_delay           = '50';         // NMSScrollDelay
            var $nms_scroll_amount          = '2';          // NMSScrollAmount
            var $nms_item_count             = '3';          // NMSItemCount
            var $nms_details_text           = 'Details';    // NMSDetailsText
            var $nms_author_title           = 'Anonymous';  // NMSAuthorTitle
            var $nms_show_creator_link      = '1';          // NMSShowCreatorLink
            var $nms_show_content           = '0';          // NMSShowContent
            var $nms_use_mouseover_links    = '0';          // NMSUseMouseOverLink
            var $nms_section_id             = '0';          // NMSSection
            var $nms_use_linked_titles      = '1';          // NMSUseLinkedTitles
            var $nms_show_titles            = '1';          // NMSShowTitles
            var $nms_use_linked_content     = '0';          // ** no controls **
            var $nms_use_static_content     = 'no';         // NMSUseStatic
            var $nms_show_details_link      = '1';          // NMSUseDetailsLink
            var $nms_err_is_error           = '0';          // ** internal **
            var $nms_items                  = '';           // NMSItems
            var $nms_css_title_color        = '';           // NMSCSSTitle_Color - hex value ( #000000 ) or IE Color Name ( black ) / set to empty string for no modification
            var $nms_css_title_weight       = '600';        // NMSCSSTitle_Weight - 100, 200, 300, ... 900 (normal = 400, bold = 700,  / set to 'none' for no modification )
            var $nms_css_title_size         = '9.5pt';      // NMSCSSTitle_Size - 7pt ... 14.5pt   ( set to 'none' for no modification )
            var $nms_css_title_style        = 'none';       // NMSCSSTitle_Style - italic, oblique  ( set to 'none' for no modification )
            var $nms_show_date              = '0'; 
            var $nms_css_date_color         = '';           // NMSCSSDate_Color - hex value ( #000000 ) or IE Color Name ( black ) / set to empty string for no modification
            var $nms_css_date_weight        = '400';        // NMSCSSDate_Weight - 100, 200, 300, ... 900 (normal = 400, bold = 700,  / set to 'none' for no modification )
            var $nms_css_date_size          = '8pt';        // NMSCSSDate_Size - 7pt ... 14.5pt   ( set to 'none' for no modification )
            var $nms_css_date_style         = 'none';       // NMSCSSDate_Style - italic, oblique  ( set to 'none' for no modification )
            var $nms_showdate_classorcss    = '1';          // 
            //var $nms_date_format            = ''; 

        
            // creator's info. array
            var $nms_creator_details        = array(
                                                'NAME'      => '',
                                                'WINDOW'    => '_blank',
                                                'URL'       => 'http://www.mambotoys.com',
                                                'TOOLTIP'   => ' More Joomla Toys? ',
                                                );


            /**
            * class mod_nms_ constructor.
            */
            function mod_nms_ (&$mammeters,$database,$g_ID) {
                $_str = array();
                $_str1 = '';

                // set user requested mammeters
                mod_nms_::nms_set_mammeter ($mammeters);

                // get the db results - based on mammeter selection
                if($this->nms_items) {
                    $_str = mod_nms_::nms_get_items ($database, $this->nms_item_count, $this->nms_how_search, $this->nms_how_sort );
                } else {
                    $_str = mod_nms_::nms_get_data ($database, $this->nms_item_count, $this->nms_catsect, $this->nms_how_search, $this->nms_catsect_id, $this->nms_how_sort);
                }
                // error
                if($this->nms_err_is_error) { return; }

                // preformat output
                $_str1 = mod_nms_::nms_format_data ($database, $_str, $g_ID, $this->nms_catsect);

                // define output area
                mod_nms_::nms_define_area ($this->nms_width,$this->nms_height);   

                // show preformatted results
                mod_nms_::nms_show_area ($_str1);

                // show debug info, if requested
                mod_nms_::nms_debug_info ($this->nms_debug);

            }   // end constructor function mod_nms_

            /**
            * function nms_define_area.
            */
            function nms_define_area ($width='100%',$height='170px') {
                $this->nms_width    = $width;
                $this->nms_height   = $height;
            }   // end function nms_define_area

            /**
            * function nms_get_data.
            */
            function nms_get_data ($database, $limit=3, $cat_sect='cat', $how='random', $catid=1, $order='asc') {
                global $my, $mosConfig_offset;
                $_str = '';

                // adjust limit variable
                if($limit>0) {
                    $limit = "LIMIT $limit";
                } else { 
                    $limit = '';
                }
                $now = date( "Y-m-d H:i:s", time()+1 ); //$now = date( "Y-m-d H:i:s", time()+$mosConfig_offset*60*60 );
                if($cat_sect=='sect') { // sections
                        // do static page results for sections
                        if($this->nms_use_static_content=='yes') { 
                           $query="SELECT a.id" 
                                ."\n FROM #__content AS a"
                                ."\n WHERE a.state = 1"
                                ."\n AND a.access  <= ". $my->gid .""
                                ."\n AND (a.publish_up = '0000-00-00 00:00:00' OR a.publish_up <= '". $now ."') "
                                ."\n AND (a.publish_down = '0000-00-00 00:00:00' OR a.publish_down >= '". $now ."')"
                                ."\n AND sectionid='". $catid ."' ";
                        } else {
                            // do scrolling results for sections
                            $query="SELECT a.id" 
                             ."\n FROM #__content AS a"
                             ."\n INNER JOIN #__sections AS b ON b.id = a.sectionid"
                             ."\n WHERE a.state = 1"
                             ."\n AND a.access  <= ". $my->gid .""
                             ."\n AND (a.publish_up = '0000-00-00 00:00:00' OR a.publish_up <= '". $now ."') "
                             ."\n AND (a.publish_down = '0000-00-00 00:00:00' OR a.publish_down >= '". $now ."')"
                             ."\n AND sectionid='". $catid ."' ";
                    }
                } else { // default - categories
                    // do static page results for sections
                    if($this->nms_use_static_content=='yes') { 
                        $query="SELECT a.id" 
                            ."\n FROM #__content AS a"
                            ."\n WHERE a.state = 1"
                            ."\n AND a.access  <= ". $my->gid .""
                            ."\n AND (a.publish_up = '0000-00-00 00:00:00' OR a.publish_up <= '". $now ."') "
                            ."\n AND (a.publish_down = '0000-00-00 00:00:00' OR a.publish_down >= '". $now ."')"
                            ."\n AND sectionid='". $catid ."' ";
                    } else {
                        // do scrolling results for sections
                        $query="SELECT a.id" 
                             ."\n FROM #__content AS a"
                             ."\n INNER JOIN #__categories AS b ON b.id = a.catid"
                             ."\n WHERE a.state = 1"
                             ."\n AND a.access  <= ". $my->gid .""
                             ."\n AND (a.publish_up = '0000-00-00 00:00:00' OR a.publish_up <= '". $now ."') "
                             ."\n AND (a.publish_down = '0000-00-00 00:00:00' OR a.publish_down >= '". $now ."')"
                             ."\n AND catid='". $catid ."' ";
                    }
                }
                    // determine type of sorting
                    switch($how) {
                        case 'random': 
                                $query .= "\n ORDER BY RAND() $limit"; // random
                            break;
                        case 'pop': 
                                $query .= "\n ORDER BY a.hits $order $limit"; // popular / least pop.
                            break;
                        case 'new': 
                                $query .= "\n ORDER BY a.created $order $limit";  // newest / oldest
                            break;
                        case 'ordered': 
                        default: 
                                $query .= "\n ORDER BY a.ordering $order $limit"; // ordered
                        break;
                    }

                // query db
                $database->setQuery( $query );
                // load the results into an array
                $rows = $database->loadResultArray();
                // check for results
                if(!$rows) {
                    // echo error message - no data
                    echo $this->nms_err_text;
                    // set exit condition
                    $this->nms_err_is_error = '1';
                } else {
                    // return data
                    return $rows;
                }
            }   // end function nms_get_data


            /**
            * function nms_get_items.
            */
            function nms_get_items ($database, $limit=3, $how='random', $order='asc') {
                global $my, $mosConfig_offset;
                $_str = '';

                // adjust limit variable
                if($limit>0) {
                    $limit = "LIMIT $limit";
                } else {
                    $limit = '';
                }
                $items = explode(',',$this->nms_items);
                $cnt = 0;
                foreach($items as $item) {
                    $item=trim($item);
                    if($cnt==0) {
                        $_str .= " a.id LIKE '$item' ";
                        
                    } else {
                        $_str .= " OR a.id LIKE '$item' ";
                    }
                    $cnt++;
                }
                
                $now = date( "Y-m-d H:i:s", time()+1 );
                if($this->nms_use_static_content=='yes') { 
                   $query="SELECT a.id" 
                        ."\n FROM #__content AS a"
                        ."\n WHERE $_str"
                        ."\n AND a.state = 1"
                        ."\n AND a.access  <= ". $my->gid .""
                        ."\n AND (a.publish_up = '0000-00-00 00:00:00' OR a.publish_up <= '". $now ."') "
                        ."\n AND (a.publish_down = '0000-00-00 00:00:00' OR a.publish_down >= '". $now ."')";
                } else {
                   $query="SELECT a.id" 
                        ."\n FROM #__content AS a"
                        ."\n INNER JOIN #__categories AS b ON b.id = a.catid"
                        ."\n WHERE $_str"
                        ."\n AND a.state = 1"
                        ."\n AND a.access  <= ". $my->gid .""
                        ."\n AND (a.publish_up = '0000-00-00 00:00:00' OR a.publish_up <= '". $now ."') "
                        ."\n AND (a.publish_down = '0000-00-00 00:00:00' OR a.publish_down >= '". $now ."')";
                }
                    // determine type of sorting
                    switch($how) {
                        case 'random': 
                                $query .= "\n ORDER BY RAND() $limit"; // random
                            break;
                        case 'pop': 
                                $query .= "\n ORDER BY a.hits $order $limit"; // popular / least pop.
                            break;
                        case 'new': 
                                $query .= "\n ORDER BY a.created $order $limit";  // newest / oldest
                            break;
                        case 'ordered': 
                        default: 
                                $query .= "\n ORDER BY a.ordering $order $limit"; // ordered
                        break;
                    }

                // query db
                $database->setQuery( $query );
                // load the results into an array
                $rows = $database->loadResultArray();
                // check for results
                if(!$rows) {
                    // echo error message - no data
                    echo $this->nms_err_text;
                    $this->nms_err_is_error = '1';
                } else {
                    // return data
                    return $rows;
                }
            }   // end function nms_get_items


            /**
            * function nms_format_data.
            */
            function nms_format_data ($database, $content, $g_ID, $cat_sect='sect' ) {
                $_str = '';
                $_str_arr = array();
                $cnt = count($content);
                

                // load content
                $row1 = new mosContent ( $database );

                // run through item
                foreach($content as $row) {

                    // load row
                    $row1->load( $row );

                    // strip mos bot tags from sections/categories
                    switch($this->nms_show_content) {
                        case '1': 
                                $_str   = mod_nms_::nms_strip_bot_tags ($row1->fulltext);
                            break;
                        case '2': 
                                $_str   = mod_nms_::nms_strip_bot_tags ($row1->introtext);
                                $_str   .= mod_nms_::nms_strip_bot_tags ($row1->fulltext);
                            break;
                        default: 
                                $_str   = mod_nms_::nms_strip_bot_tags ($row1->introtext);
                            break;
                    }

                    // strip out HTML for left and right scrolling - [TODO - work on solution to keep HTML]
                    if( $this->nms_behavior == 'left' || $this->nms_behavior == 'right' ) {
                        $_str = preg_replace("'<[\/\!]*?[^<>]*?>'is",'',$_str); 
                    }

                    // if requested, cutoff extra characters (not table friendly) see above for todo
                    $_str = mod_nms_::nms_text_cutoff ($_str);
                    // add title and details link
                    $_str = mod_nms_::nms_link_content ($_str, $row1->id, $row1->title, $g_ID, ((!$row1->created_by_alias) ? $this->nms_author_title : $row1->created_by_alias ), $cnt, $this->nms_details_text, $row1->created );
                    // append BRs or HRs (verticle scroll only)
                    $_str = mod_nms_::nms_add_line_char ($_str);
                    // assign results to an array
                    $_str_arr[] = $_str;
                    --$cnt;
                }
                $_str = '';
                // simple convert array to string
                foreach($_str_arr as $str_a) {
                    $_str .= $str_a;
                }

                return trim($_str);
            }   // end function nms_format_data


            /**
            * function nms_strip_bot_tags.
            * Works on any bot that starts with mos, jos or bot
            */
            function nms_strip_bot_tags ($content) {
                $_str = '';
                $_str = preg_replace("#{(mos|jos|bot)*.*?}#is","$_str",$content); 
                return $_str;
            }   // end function nms_strip_bot_tags

            /**
            * function nms_add_line_char.
            * 
            */
            function nms_add_line_char ($content) {
                $_str = '';
                $char_times = (int)$this->nms_line_count;
                $cnt = 0;

                if($char_times>0) {
                    $_str = $content;
                    for($i=0;$i<$char_times;$i++) { 
                        $_str .= mod_nms_::nms_get_line_char ($cnt,$char_times); 
                        $cnt++;
                    }
                } else {
                    return $content; 
                }
                return $_str;
            }   // end function nms_add_line_char

            /**
            * function nms_get_line_char.
            * 
            */
            function nms_get_line_char ($item,$max) {
                switch($this->nms_line_count_char) {
                    case '1': 
                            if( $this->nms_behavior == 'up' || $this->nms_behavior == 'down' ) {
                                return '<HR/>';
                            } else {
                                return '&nbsp; ';
                            }
                            
                        break;
                    default: 
                            if( $this->nms_behavior == 'up' || $this->nms_behavior == 'down' ) {
                                return '<BR/>';
                            } else {
                                return '&nbsp; ';
                            }
                        break;
                }
                return '';
            }   // end function nms_get_line_char

            /**
            * function nms_text_cutoff.
            * not <table> friendly
            */
            function nms_text_cutoff ($content) {
                $tmp_1 = '';
                $tmp_2 = '';
                $cutoff = (int)$this->nms_text_cutoff;

                if($cutoff>0) {
                     if (strlen($content) > $cutoff) {
                        $tmp_1 = @wordwrap($content,$cutoff,"||");
                        $tmp_1 = @explode("||", $tmp_1);
                        $tmp_2 = $tmp_1[0]. ' ';
                        $tmp_2 .= '... ';
                        return $tmp_2;
                    }
                }
                return $content;
            }   // end function nms_text_cutoff

            /**
            * function nms_link_content.
            */
            function nms_link_content ($content, $id, $title, $g_ID, $author, $cnt, $details='Details', $date_time='') {
                global $mainframe;
                $_str = '';
                $tool_tip = '';
                $css_start = 'style="';
                $css_end = '">';

                $item_id = $mainframe->getItemid( $id, 0, 0, $g_ID[0], $g_ID[1], $g_ID[2] );

                $cur_link = "index.php?option=com_content&amp;task=view&amp;id=". $id ."&amp;Itemid=". $item_id;

                //  strip quotes from titles 
                if(preg_match( "/'|\"/", $title )) { $tool_tip=preg_replace("/'|\"/", "", $title);} else { $tool_tip = $title; }   // &(sbquo|#8218);

                // save the current $tool_tip string for use with tool tips in $ttool_tip
                $ttool_tip = $tool_tip;
                
                // css control 
                if( $this->nms_css_title_color !== "" ) {
                    $css_title_color = "color: $this->nms_css_title_color ; ";
                } else {  $css_title_color = '';}
                if( $this->nms_css_title_weight !== "none" ) {
                    $css_title_weight = "font-weight: $this->nms_css_title_weight ; ";
                } else {  $css_title_weight = '';}
                if( $this->nms_css_title_size !== "none" ) {
                    $css_title_size = "font-size: $this->nms_css_title_size ; ";
                } else {  $css_title_size = '';}
                if( $this->nms_css_title_style !== "none" ) {
                    $css_title_style = "font-style: $this->nms_css_title_style ; ";
                } else {  $css_title_style = '';}

                if( $this->nms_show_date == '1' ) {
                    if( $this->nms_css_date_color !== "" ) {
                        $css_date_color = "color: $this->nms_css_date_color ; ";
                    } else {  $css_date_color = '';}
                    if( $this->nms_css_date_weight !== "none" ) {
                        $css_date_weight = "font-weight: $this->nms_css_date_weight ; ";
                    } else {  $css_date_weight = '';}
                    if( $this->nms_css_date_size !== "none" ) {
                        $css_date_size = "font-size: $this->nms_css_date_size ; ";
                    } else {  $css_date_size = '';}
                    if( $this->nms_css_date_style !== "none" ) {
                        $css_date_style = "font-style: $this->nms_css_date_style ; ";
                    } else {  $css_date_style = '';}

                }   

           
                // check for mouseover links
                switch($this->nms_use_mouseover_links) {
                    case '1': // use status bar effects [IE only]
                        if( $this->nms_show_titles == '1' ) {
                           
                            $tool_tip = "<span  $css_start  $css_title_color $css_title_weight $css_title_size $css_title_style $css_end $ttool_tip </span>";
                           
                            if( $this->nms_use_linked_titles == '0' ) { 
                                $_str .= $tool_tip.' ';
                            } else {
                                // create content and title links with status bar mouseover effects
                                $_str .= "<a href=\"". sefRelToAbs($cur_link) ."\" title=\"  $ttool_tip - by $author \" onmouseover=\"self.status='". $ttool_tip ."'; return true;\" onmouseout=\"self.status=' '; return true;\" > $tool_tip </a> ";
                            }
                        }

                        if( $this->nms_show_content != '3' ) {
                            if( $this->nms_show_date == '1' ) {
                                // display date
                                $_str .= '<br />';
                                if( $this->nms_showdate_classorcss == '1' ) {
                                    $_str .= "<span class=\"createdate\"> ". mosFormatDate( $date_time ) ."</span>";
                                } else {
                                    $_str .= '<span '. $css_start . $css_date_color . $css_date_weight . $css_date_size . $css_date_style. $css_end . mosFormatDate( $date_time ) .'</span>';
                                }
                                $_str .= '<br />';
                            }
                            // assign content
                            $_str .= $content;
                        } else { ; }

                        if( $this->nms_show_details_link == '1' ) {
                            // create details links with status bar mouseover effects
                            $_str .= '<a OnMouseOver="self.status=\''. $ttool_tip .'\'; return true;" OnMouseOut="self.status=\' \'; return true;" href="'. sefRelToAbs($cur_link) .'" title=\' '. $ttool_tip .' - by '. $author .' \'> '. $details .'</a> ...';
                        }
                        break;
                    default: // no status bar effects
                        if( $this->nms_show_titles == '1' ) {
                            
                            $tool_tip = '<span '. $css_start . $css_title_color . $css_title_weight . $css_title_size . $css_title_style. $css_end . $ttool_tip .'</span>';
                            
                            if( $this->nms_use_linked_titles == '0' ) { 
                                $_str .= $tool_tip.' ';
                            } else {
                                // create content and title links without status bar mouseover effects
                                $_str .= '<a href="'. sefRelToAbs($cur_link) .'" title=\' '. $ttool_tip .' - by '. $author .' \'>'. $tool_tip .'</a> ';
                            }
                        }

                        if( $this->nms_show_content != '3' ) {
                            if( $this->nms_show_date == '1' ) {
                                // display date
                                $_str .= '<br />';
                                if( $this->nms_showdate_classorcss == '1' ) {
                                    $_str .= "<span class=\"createdate\"> ". mosFormatDate( $date_time ) ."</span>";
                                } else {
                                    $_str .= '<span '. $css_start . $css_date_color . $css_date_weight . $css_date_size . $css_date_style. $css_end . mosFormatDate( $date_time ) .'</span>';
                                }
                                $_str .= '<br />';
                            }
                            // assign content
                            $_str .= $content;
                        } else { ; }

                        if( $this->nms_show_details_link == '1' ) {
                            // create details links without status bar mouseover effects
                            $_str .= '<a href="'. sefRelToAbs($cur_link) .'" title=\' '. $ttool_tip .' - by '. $author .' \'> '. $details .'</a> ...';
                        }
                        break;
                }

                return $_str;
            }   // end function nms_link_content

            /**
            * function nms_show_area.
            * ...this format may conflict with some template designs.
            */
            function nms_show_area ($content) {

                $_str  = '<div align="center" id="nms_outside" style="position: relative; width:'. $this->nms_width .'; height: '. $this->nms_height .';"> '."\n";
                $_str .= '   <div width="100%" id="nms_inside" style="position: absolute auto; overflow: hidden; height: '. $this->nms_height .';"> '."\n";
                $_str .= '      <div width="100%" id="nms_content" style="text-align: '. $this->nms_align .'; position: relative; overflow: hidden; height: '. $this->nms_height .'; "> '."\n";
                $_str .= '        <marquee id="nms_marquee" style="text-align: '. $this->nms_align .'; overflow: hidden; height: '. $this->nms_height .'; " LOOP="'. $this->nms_loop .'" DIRECTION='. $this->nms_behavior .' truespeed scrollamount='. $this->nms_scroll_amount .' scrolldelay='. $this->nms_scroll_delay .' HSPACE=0 VSPACE=0 onmouseover=this.stop() onmouseout=this.start()> '."\n";
                $_str .=            $content;
                $_str .= '        </marquee>'."\n";
                $_str .= '      </div>'."\n";
                $_str .= '   </div>'."\n";
                $_str  .= '</div>'."\n";
                if( $this->nms_show_creator_link == '1' ) {
                    $_str .= ' <div align="center"><a target="_blank" href="'. $this->nms_creator_details['URL'] .'" title=\' '. $this->nms_creator_details['TOOLTIP'] .' \'> '. $this->nms_creator_details['NAME'] .'</a></div> ';
                }
             
                echo $_str;
            }   // end function nms_show_area

            /**
            * function nms_set_mammeter.
            */
            function nms_set_mammeter ($mammeters) {

                $this->nms_debug                = $mammeters->get('NMSDeBugON',$this->nms_debug);
                $this->nms_catsect              = $mammeters->get('NMSCatSect',$this->nms_catsect);
                $this->nms_height               = $mammeters->get('NMSHeight',$this->nms_height);
                $this->nms_width                = $mammeters->get('NMSWidth',$this->nms_width);
                $this->nms_align                = $mammeters->get('NMSAlign',$this->nms_align);
                $this->nms_loop                 = $mammeters->get('NMSLoop',$this->nms_loop);
                $this->nms_behavior             = $mammeters->get('NMSBehavior',$this->nms_behavior);
                $this->nms_how_search           = $mammeters->get('NMSHowSearch',$this->nms_how_search);
                $this->nms_how_sort             = $mammeters->get('NMSHowSort',$this->nms_how_sort);
                $this->nms_text_cutoff          = $mammeters->get('NMSTextCutoff',$this->nms_text_cutoff);
                $this->nms_line_count           = $mammeters->get('NMSLineCount',$this->nms_line_count);
                $this->nms_line_count_char      = $mammeters->get('NMSLineCountChar',$this->nms_line_count_char);
                $this->nms_scroll_delay         = $mammeters->get('NMSScrollDelay',$this->nms_scroll_delay);
                $this->nms_scroll_amount        = $mammeters->get('NMSScrollAmount',$this->nms_scroll_amount);
                $this->nms_item_count           = $mammeters->get('NMSItemCount',$this->nms_item_count);
                $this->nms_details_text         = $mammeters->get('NMSDetailsText',$this->nms_details_text);
                $this->nms_author_title         = $mammeters->get('NMSAuthorTitle',$this->nms_author_title);
                $this->nms_show_creator_link    = $mammeters->get('NMSShowCreatorLink',$this->nms_show_creator_link);
                $this->nms_show_content         = $mammeters->get('NMSShowContent',$this->nms_show_content);
                $this->nms_use_mouseover_links  = $mammeters->get('NMSUseMouseOverLink',$this->nms_use_mouseover_links);
                $this->nms_use_linked_titles    = $mammeters->get('NMSUseLinkedTitles',$this->nms_use_linked_titles);
                $this->nms_show_details_link    = $mammeters->get('NMSUseDetailsLink',$this->nms_show_details_link);
                $this->nms_show_titles          = $mammeters->get('NMSShowTitles',$this->nms_show_titles);
                $this->nms_items                = $mammeters->get('NMSItems',$this->nms_items);
                $this->nms_use_static_content   = $mammeters->get('NMSUseStatic',$this->nms_use_static_content);
                $this->nms_show_date            = $mammeters->get('NMSShowDate',$this->nms_show_date);
                $this->nms_showdate_classorcss  = $mammeters->get('NMSShowDate_ClassOrCSS',$this->nms_showdate_classorcss);

                // CSS CONTROL
                // css title color 
                $this->nms_css_title_color      = $mammeters->get('NMSCSSTitle_Color',$this->nms_css_title_color);
                // css title weight
                $this->nms_css_title_weight     = $mammeters->get('NMSCSSTitle_Weight',$this->nms_css_title_weight);
                // css title size 
                $this->nms_css_title_size       = $mammeters->get('NMSCSSTitle_Size',$this->nms_css_title_size);
                // css title style 
                $this->nms_css_title_style      = $mammeters->get('NMSCSSTitle_Style',$this->nms_css_title_style);
                // css date color 
                $this->nms_css_date_color       = $mammeters->get('NMSCSSDate_Color',$this->nms_css_date_color);
                // css date weight
                $this->nms_css_date_weight      = $mammeters->get('NMSCSSDate_Weight',$this->nms_css_date_weight);
                // css date size 
                $this->nms_css_date_size        = $mammeters->get('NMSCSSDate_Size',$this->nms_css_date_size);
                // css date style 
                $this->nms_css_date_style       = $mammeters->get('NMSCSSDate_Style',$this->nms_css_date_style);

                $this->nms_section_id           = $mammeters->get('NMSSection',$this->nms_catsect_id);

                // special case - check assignment of nms_catsect before setting nms_catsect_id
                if($this->nms_catsect=='sect') {
                    $this->nms_catsect_id       = $mammeters->get('NMSSection',$this->nms_catsect_id);
                } else {
                    $this->nms_catsect_id       = $mammeters->get('NMSCategory',$this->nms_catsect_id);
                }
                // special case - check assignment of nms_use_static_content
                if($this->nms_use_static_content=='yes') {
                    $this->nms_catsect_id       = '0';
                } 

            }   // end function nms_set_mammeter

            /**
            * function nms_mammeter_reset.
            */
            function nms_mammeter_reset ($mammeters) {

            }   // end function nms_mammeter_reset

            /**
            * function nms_debug_info.
            */
            function nms_debug_info ($nms_debug) {
                $_str = null;
                if($nms_debug=='FALSE') {
                        ;
                } else {
                    // setup div and horiz. line for output
                    $_str .= "\n"; 
                    $_str = '<br />';  
                    $_str .= '<div align="center">NMS v'. $this->nms_version .' DEBUG INFO</div>';  
                    $_str .= "\n";
                    $_str .= '<hr align="center" width="98%"/>';  
                    $_str .= "\n";
                    // display header information
                    $_str .= "NMS Debugging On?:  <b>".$this->nms_debug;
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // author title
                    $_str .= "NMS Author Alias:   <b>".$this->nms_author_title;
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // behavior
                    $_str .= "NMS Behavior/Direction:  <b>". strtoupper($this->nms_behavior);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // content - [section or category] 
                    if($this->nms_use_static_content=='yes') {
                        $_str .= "NMS Category/Section: <b>Static";
                    } else {
                        $_str .= "NMS Category/Section: <b>". strtoupper($this->nms_catsect);
                    }
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // content id - [section or category id]
                    if($this->nms_catsect=='sect') {
                        $_str .= "NMS Section ID: <b>". $this->nms_catsect_id;
                        $_str .= '</b><br />';
                        $_str .= "\n";
                    } else {
                        $_str .= "NMS Category ID: <b>". $this->nms_catsect_id;
                        $_str .= '</b><br />';
                        $_str .= "\n";
                    }
                    // show content
                    $_str .= 'NMS Content Showing: <b>'. ( ($this->nms_show_content == '0') ? "Intros" : ( ($this->nms_show_content == '1') ? "Content" : "Intros and Content") );
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // css title color
                    $_str .= 'NMS CSS Title Color: <b>'. (($this->nms_css_title_color == '') ? "No color modifications" : $this->nms_css_title_color);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // css title size
                    $_str .= 'NMS CSS Title Size: <b>'. (($this->nms_css_title_size == 'none') ? "No size modifications" : $this->nms_css_title_size);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // css title style
                    $_str .= 'NMS CSS Title Style: <b>'. (($this->nms_css_title_style == 'none') ? "No style modifications" : $this->nms_css_title_style);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // css title weight
                    $_str .= 'NMS CSS Title Weight: <b>'. (($this->nms_css_title_weight == 'none') ? "No weight modifications" : $this->nms_css_title_weight);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // css date color
                    $_str .= 'NMS CSS Date Color: <b>'. (($this->nms_css_date_color == '') ? "No color modifications" : $this->nms_css_date_color);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // css date size
                    $_str .= 'NMS CSS Date Size: <b>'. (($this->nms_css_date_size == 'none') ? "No size modifications" : $this->nms_css_date_size);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // css date style
                    $_str .= 'NMS CSS Date Style: <b>'. (($this->nms_css_date_style == 'none') ? "No style modifications" : $this->nms_css_date_style);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // css date weight
                    $_str .= 'NMS CSS Date Weight: <b>'. (($this->nms_css_date_weight == 'none') ? "No weight modifications" : $this->nms_css_date_weight);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // details link
                    $_str .= "NMS Details Link Text:   <b>".$this->nms_details_text;
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // error message
                    $_str .= 'NMS Error Text: <b>'. $this->nms_err_text;
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // height
                    $_str .= "NMS Height:  <b>".$this->nms_height;
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // item count 
                    $_str .= "NMS Item Count:   <b>".(($this->nms_item_count!=0) ? $this->nms_item_count : 'All');
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // line count
                    $_str .= 'NMS Line Count: <b>'. strtoupper($this->nms_line_count);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // line character
                    $_str .= 'NMS Line Count Character: <b>'. (($this->nms_line_count_char == '0') ? "&lt;BR/&gt;" : "&lt;HR/&gt;");
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // loop
                    $_str .= "NMS Loop Times:  <b>". strtoupper($this->nms_loop);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // scroll amount
                    $_str .= "NMS Scroll Amount:   <b>".$this->nms_scroll_amount. ' lines at a time';
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // scroll delay
                    $_str .= "NMS Scroll Delay:   <b>".$this->nms_scroll_delay;
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // search on
                    $_str .= "NMS Search On:   <b>".$this->nms_how_search;
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // show creator's link
                    $_str .= 'NMS Show Creator\'s Link: <b>'. (($this->nms_show_creator_link == '1') ? "Yes" : "No");
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // show titles
                    $_str .= "NMS Show Titles:   <b>". (($this->nms_show_titles == '1') ? "Yes" : "No");
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // sort on
                    $_str .= "NMS Sort On:   <b>".$this->nms_how_sort;
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // Text align
                    $_str .= "NMS Text Alignment:  <b>". strtoupper($this->nms_align);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // cutoff
                    $_str .= 'NMS Text Cutoff: <b>'. ($this->nms_text_cutoff == '0' ? 'No cutoff' : strtoupper($this->nms_text_cutoff). ' characters.');
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // use details link 
                    $_str .= "NMS Use Details Link:   <b>". (($this->nms_show_details_link == '1') ? "Yes" : "No");
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // use linked titles 
                    $_str .= "NMS Use Linked Titles:   <b>". (($this->nms_use_linked_titles == '0') ? "No" : "Yes");
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // use mouseover links
                    $_str .= 'NMS Use MouseOver Links: <b>'. (($this->nms_use_mouseover_links == '1') ? "Yes" : "No");
                    $_str .= '</b><br />';  
                    $_str .= "\n"; 
                    // use select items
                    $_str .= "NMS Use Select Items:   <b>". (($this->nms_items == '') ? "Not using select items" : $this->nms_items);
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // width
                    $_str .= "NMS Width:   <b>".$this->nms_width;
                    $_str .= '</b><br />';
                    $_str .= "\n";
                    // end footer
                    $_str .= '<hr align="center" width="98%"/>'; 
                    $_str .= "\n";
                    $_str .= '<div align="center">END NMS DEBUG INFO</div>';  
           
                    $_str .= '<div align="center"><a href="'. $this->nms_creator_details['URL'] .'" target="'. $this->nms_creator_details['WINDOW'] .'">'. $this->nms_creator_details['NAME'] .'</a></div>';  
                    $_str .= "\n"; 
                    echo $_str;
                }
            }   // end function nms_debug_info
        }   // end class mod_nms_

        // load parameters and initialize/call class mod_nms_
        $params =& new mosParameters( $module->params );
        $mod_nms =& new mod_nms_( $params, $database, $g_ID );

    }  // end define _NMS_
    else  // _NMS_ !defined
    {   
        // load parameters and initialize/call class mod_nms_
        $params =& new mosParameters( $module->params );
        $mod_nms =& new mod_nms_( $params, $database, $g_ID );

    } // end defined _NMS_



?>
