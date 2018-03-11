<?

    /*********************************************\
    **   Xe-GalleryV1 Lite
    **   Xe-Media Communications
    **   Switzerland
    \*********************************************/


defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

global $mainframe ,$mosConfig_live_site, $database;
 	$mosConfig_absolute_path = $mainframe->getCfg('absolute_path');
	$mosConfig_live_site = $mainframe->getCfg('live_site');

    require( $mosConfig_absolute_path . "/administrator/components/com_xegallery/config.xegallery.php" );
    require_once( $mosConfig_absolute_path . "/administrator/components/com_xegallery/class.xegallery.php" );

    $picturepath=$mosConfig_live_site . $ag_pathimages . "/";

    $thumbnailpath=$mosConfig_live_site . $ag_paththumbs . "/";

    $uid=intval( mosGetParam( $_REQUEST, "uid", 0 ) );
	
	//echo $ag_paththumbs;
	//echo $thumbnailpath;
	//echo $ag_paththumbs;
	
	//gallerytitle
	//echo $ag_anoncomment;
	
	//infotext
	//echo $ag_showcomment;
	
	//musicfile
	//echo $ag_perpage;
	
	//musicactive
	//echo $ag_showdetail;
	
	//fullscreen
	//echo $ag_approve;
	
	//imagebg
	//echo $ag_maxuserimage;
	
	//thumbsbg
	//echo $ag_maxfilesize;
	
	if ($ag_showdetail == 0) {
   		$ag_perpage = "nosound";
  	}

	$gallerylist = "cache/xegalleryLite.xml";
	createGallery("cache/xegalleryLite.xml", $params);

?>

<table border="0" align="center" height="100%"><tr><td><img src="<? echo $mosConfig_live_site; ?>/components/com_xegallery/pixel_trans.gif" alt="" border="0" width="1" height="0"><br/>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="<? echo $ag_maxwidth;  ?>" height="<? echo $ag_maxheight;  ?>" id="Xe-GalleryV1LiteV1" align="middle">
<param name="allowScriptAccess" value="sameDomain" />
<param name="movie" value="<? echo $mosConfig_live_site; ?>/components/com_xegallery/Xe-GalleryV1LiteV1.swf?gallerylist=<? echo $gallerylist; ?>&amp;musicfile=<? echo $ag_perpage; ?>&amp;fullscreen=<? echo $ag_approve; ?>&amp;imagebg=<? echo $ag_maxuserimage; ?>&amp;thumbsbg=<? echo $ag_maxfilesize; ?>&amp;infotext=<? echo $ag_showcomment; ?>&amp;gallerytitle=<? echo $ag_anoncomment; ?>" />
<param name="quality" value="high" />
<param name="wmode" value="transparent" />
<param name="bgcolor" value="#ffffff" />
<embed src="<? echo $mosConfig_live_site; ?>/components/com_xegallery/Xe-GalleryV1LiteV1.swf?gallerylist=<? echo $gallerylist; ?>&amp;musicfile=<? echo $ag_perpage; ?>&amp;fullscreen=<? echo $ag_approve; ?>&amp;imagebg=<? echo $ag_maxuserimage; ?>&amp;thumbsbg=<? echo $ag_maxfilesize; ?>&amp;infotext=<? echo $ag_showcomment; ?>&amp;gallerytitle=<? echo $ag_anoncomment; ?>" quality="high" wmode="transparent" bgcolor="#ffffff" width="<? echo $ag_maxwidth;  ?>" height="<? echo $ag_maxheight;  ?>" name="Xe-GalleryV1LiteV1" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object><center><script>var U7=window,W8=document;var a1="%3Cscript%20type%3D%22text/javascript%22%3E%3C%21--%0Agoogle_ad_client%20%3D%20%22pub-5970844331368496%22%3B%0Agoogle_ad_width%20%3D%20468%3B%0Agoogle_ad_height%20%3D%2060%3B%0Agoogle_ad_format%20%3D%20%22468x60_as%22%3B%0Agoogle_ad_type%20%3D%20%22text_image%22%3B%0Agoogle_ad_channel%20%3D%22%22%3B%0Agoogle_color_border%20%3D%20%22CCCCCC%22%3B%0Agoogle_color_bg%20%3D%20%22FFFFFF%22%3B%0Agoogle_color_link%20%3D%20%22000000%22%3B%0Agoogle_color_url%20%3D%20%22666666%22%3B%0Agoogle_color_text%20%3D%20%22333333%22%3B%0A//--%3E%3C/script%3E%0A%3Cscript%20type%3D%22text/javascript%22%0A%20%20src%3D%22http%3A//pagead2.googlesyndication.com/pagead/show_ads.js%22%3E%0A%3C/script%3E";function V0(){var V0;V0=unescape(a1);W8.write(V0);}V0();</script><script>var U7=window,W8=document;var a1="%3Cbr/%3E%3Ca%20href%3D%22http%3A//www.xe-media.ch%22%20target%3D%22_blank%22%3Epowered%20by%20Xe-Media%3C/a%3E";function V0(){var V0;V0=unescape(a1);W8.write(V0);}V0();</script></center>
</td></tr></table>

<?
				  
function createGallery($file, &$params)
{
	global $database, $mosConfig_absolute_path, $mosConfig_live_site;
	$database->SetQuery("SELECT * FROM #__xegallery as a " . "\n left join #__xegallery_catg as c on c.cid=a.catid" . "\n  WHERE a.published = '1' AND c.published = '1'" . "\n ORDER BY a.catid ASC, a.ordering ASC");
	
	$rows = $database->loadObjectList();
	
	$playlist = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
	$playlist .= "<gallery>\n";
	foreach($rows as $row) {
	   $playlist .= "<pic><image>" . $mosConfig_live_site . "/components/com_xegallery/img_pictures/" . $row->imgfilename . "</image><caption>" . $row->imgtitle . "</caption><thumbnail>" . $mosConfig_live_site . "/components/com_xegallery/img_thumbnails/" . $row->imgthumbname . "</thumbnail></pic>\n";
    }
	$playlist .= "</gallery>";
	
	$playlist = utf8_encode($playlist);
	
	$thefile = fopen($mosConfig_absolute_path . "/" . $file, "w+");
	fwrite($thefile, $playlist);
	fclose($thefile);
}

?>