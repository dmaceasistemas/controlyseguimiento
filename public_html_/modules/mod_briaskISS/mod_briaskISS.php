<noscript>
	<div>ImageSlideShow requires Javascript</div>
</noscript>

<?php
/*
 * Created on 4 Mar 2008
 *
 */

 // no direct access
 defined('_JEXEC') or die ('Restricted access');
 ?>
<script type="text/javascript">
	var briask_transDelay=<?php echo $params->get('transDelay', 50); ?>;
	var briask_picInterval=<?php echo $params->get('nextDelay', 15000); ?>;
</script>
<link rel="stylesheet" type="text/css" href="modules/mod_briaskISS/mod_briaskISS.css" />
<script type="text/javascript" src="modules/mod_briaskISS/mod_briaskISS.js"></script>


<!--var preLoader='jw-sir-loading<?php if ($darkbg){echo '-black';} ?>';</script>-->

 <?php
	$picDir = $params->get('Directory', 0);
	$picH = $params->get('pxHeight', 0);
	$picW = $params->get('pxWidth', 0);

	echo '<ul id="briask-iss" style="width:'.$picW.'px;height:'.$picH.'px">';
	if (is_dir($picDir))
	{
		if ($dh = opendir($picDir))
		{
		    while ($file = readdir($dh))
			{
				$uprFile = strtoupper($file);

		         if ($uprFile != '.' && $uprFile != '..')
		         {
					 if (strpos($uprFile, '.GIF',1)||strpos($uprFile, '.JPG',1)||strpos($uprFile, '.PNG',1) ||strpos($uprFile, '.BMP',1))
					 {
						echo '<li><img src="'.$picDir.'/'.$file.'" /></li>';
					 }
		         }
		    }
			closedir($dh);
		}
		else
		{
			echo "<b>Can't open directory</b>";
		}
	}
	else
	{
		echo "<b>Not a directory</b>";
	}
echo '</ul>'
?>
