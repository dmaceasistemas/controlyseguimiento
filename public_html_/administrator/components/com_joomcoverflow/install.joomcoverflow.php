<?php
/**
* @package		Joomla
* @subpackage	JoomCoverflow
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

global $mainframe;

function com_install() {
	global $database, $mainframe, $mosConfig_absolute_path;

	if (is_writable($mainframe->getCfg("absolute_path")."/images" ))
	{
		//ok now it is installed, just copy the images directory, and apply 0777
		dircopy($mainframe->getCfg("absolute_path") . "/components/com_joomcoverflow/images", $mainframe->getCfg("absolute_path") . "/images/coverflow", true);
	}
	else {
	?>
	<div style="border: 1px solid #FF6666; background: #FFCC99; padding: 10px; text-align: left; margin: 10px 0;">
		<img src='images/publish_x.png' align='absmiddle'>Error al crear la carpeta images/coverflow. Debes crear manualmente la carpeta y darle permisos de escritura.<br />	
	</div>
	<?php
	}
}	

function dircopy($srcdir, $dstdir, $verbose = true) {
	$num = 0;

	if (!is_dir($dstdir)) {
		mkdir ($dstdir);
		echo chmod ($dstdir, 0777);
	}

	if ($curdir = opendir($srcdir)) {
		while ($file = readdir($curdir)) {
			if ($file != '.' && $file != '..') {
				$srcfile = $srcdir . '/' . $file;
				$dstfile = $dstdir . '/' . $file;

				if (is_file($srcfile)) {
					if (is_file($dstfile)) {
						$ow = filemtime($srcfile) - filemtime($dstfile);
					}
					else {
						$ow = 1;
					}

					if ($ow > 0) {
						if ($verbose) {
							//$tmpstr = _FB_COPY_FILE;
							//$tmpstr = str_replace('%src%', $srcfile, $tmpstr);
							//$tmpstr = str_replace('%dst%', $dstfile, $tmpstr);
							//echo "<li class=\"fbscslist\">".$tmpstr;
						}

						if (copy($srcfile, $dstfile)) {
							touch($dstfile, filemtime($srcfile));
							$num++;

							if ($verbose) {
								//echo _FB_COPY_OK." </li>";
							}
						}
						else {
							//echo "<li class=\"fbscslisterror\">"._FB_DIRCOPERR . " '$srcfile' " . _FB_DIRCOPERR1."</li>";
						}
					}
				}
				else if (is_dir($srcfile)) {
					$num += dircopy($srcfile, $dstfile, $verbose);
				}
			}
		}

		closedir ($curdir);
	}

	return $num;
}
?>