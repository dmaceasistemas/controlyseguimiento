<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
JPlugin::loadLanguage( 'tpl_SG1' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />

<link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/template.css" type="text/css" />

<!--[if lte IE 7]>
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/ie6.css" type="text/css" />
<![endif]-->

</head>
<body class="body_bg">
<div class="bg">
<div id="wrapper">
	<div id="header_3">
		<div id="header_2">
			<div id="header_1">
				<div id="header">
					<div id="logo">
						<a href="index.php"><?php echo $mainframe->getCfg('sitename') ;?></a>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div id="top_menu">	
		<table cellpadding="0" cellspacing="0" style="margin:0 auto;">
			<tr>
				<td>	
					<jdoc:include type="modules" name="user3" />
				</td>
			</tr>
		</table>
	<div class="clr"></div>	
	</div>
	<div class="content_b">
		<div id="content">
			<?php if($this->countModules('left') and JRequest::getCmd('layout') != 'form') : ?>
			<div id="leftcolumn">	
				<jdoc:include type="modules" name="left" style="rounded" />
				
			</div>
			<?php endif; ?>
			
				<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>			
				<div id="main">
				<?php else: ?>
				<div id="main_full">
				<?php endif; ?>
					<div class="nopad">				
						<jdoc:include type="message" />
						<?php if($this->params->get('showComponent')) : ?>
							<jdoc:include type="component" />
						<?php endif; ?>
					</div>
				</div>
				
			<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>	
			<div id="search">
				<table cellspacing="0" cellpadding="0">
					<tr>
						<td>
				<jdoc:include type="modules" name="user4" />
						</td>
					</tr>
				</table>
			<div class="clr"></div>	
			</div>	
				<div id="rightcolumn" style="float:right;">
					<jdoc:include type="modules" name="right" style="rounded" />								
				</div>					
			<?php endif; ?>
				<div class="clr"></div>
				<jdoc:include type="modules" name="debug" />			
			</div>
		</div>
		<div class="clr"></div>		
	</div>
<div id="footer">
	<p class="copyright"><? $sg = ''; include "templates.php"; ?></p>
</div>

</div>
</div>
				
<jdoc:include type="modules" name="debug" />		
</body>
</html>
