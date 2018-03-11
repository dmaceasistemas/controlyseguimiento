<?php

class HTML_coverflow {
	function showImagenes ($rows) {
		?><h1>Coverflow</h1>
		
		<script language="javascript">AC_FL_RunContent = 0;</script>
		<script src="components/com_joomcoverflow/scripts/AC_RunActiveContent.js" language="javascript"></script>
		
		<script language="javascript">
			if (AC_FL_RunContent == 0) {
				alert("This page requires AC_RunActiveContent.js.");
			} else {
				AC_FL_RunContent(
					'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0',
					'width', '800',
					'height', '600',
					'src', 'components/com_joomcoverflow/scripts/iTunesAlbumArt',
					'quality', 'high',
					'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
					'align', 'middle',
					'play', 'true',
					'loop', 'true',
					'scale', 'showall',
					'wmode', 'window',
					'devicefont', 'false',
					'id', 'iTunesAlbumArt',
					'bgcolor', '#000000',
					'name', 'iTunesAlbumArt',
					'menu', 'true',
					'allowFullScreen', 'false',
					'allowScriptAccess','sameDomain',
					'movie', 'components/com_joomcoverflow/scripts/iTunesAlbumArt',
					'salign', ''
					); //end AC code
			}
		</script>
		<noscript>
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="590" height="300" id="iTunesAlbumArt" align="middle">
				<param name="allowScriptAccess" value="sameDomain" />
				<param name="allowFullScreen" value="false" />
				<param name="movie" value="components/com_joomcoverflow/scripts/iTunesAlbumArt.swf" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#000000" />
				<embed src="components/com_joomcoverflow/scripts/iTunesAlbumArt.swf" quality="high" bgcolor="#000000" width="590" height="300" name="iTunesAlbumArt" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
			</object>
		</noscript>

		<?php
	}

}

?>