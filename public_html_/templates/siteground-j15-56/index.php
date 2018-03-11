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

<!--[if lte IE 6]>
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/ie7.css" type="text/css" />
<![endif]-->

</head>
<body class="body_bg">

		<div id="logo">
			<a href="index.php"><?php  //echo $mainframe->getCfg('sitename') ;?></a>
		</div>
		
		<div id="header_bg">
			<div id="header_lbg">
				<div id="header_rbg">
					<div id="header_main">
						<div class="hleft"></div>
						<div class="hright">
						
							<?php /*if($this->countModules('user1') and $this->countModules('user2') and JRequest::getCmd('layout') != 'form') : ?>
								<div>
									<div class="hwr-left">
										<jdoc:include type="modules" name="user1" style="rounded" />
									</div> 
								
									<div class="hwr-right">
										<jdoc:include type="modules" name="user2" style="rounded" />
									</div>
									<div class="clr"></div>
								</div>
							<?php endif;  ?>
							
							<?php  if($this->countModules('user1') and $this->countModules('user2') and JRequest::getCmd('layout') != 'form') : ?>
								<div id="newsflash">
							<?php else: ?>
								<div id="newsflash" style="height: 246px;">
							<?php endif; */ ?>
								<jdoc:include type="modules" name="top" style="rounded" />
								</div>
						</div>
						<div class="clr"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="pill_m">
			<div id="pillmenu">
				<jdoc:include type="modules" name="user3" />
			</div>
		</div>	
		
		<!--center start-->
		<div class="center">
			<div id="wrapper">
				<div id="content">
					<?php if($this->countModules('left') and JRequest::getCmd('layout') != 'form') : ?>
						<div id="leftcolumn">	
							<jdoc:include type="modules" name="left" style="rounded" />
							
						</div>
						<?php endif; ?>
						
						<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
						<div id="maincolumn">
							<!--pathway start-->
							<div class="cpathway">
								<div class="cpleft">
									<jdoc:include type="module" name="breadcrumbs" />
								</div>
							</div>
							<!--pathway end-->
						<?php else: ?>
						<div id="maincolumn_full">
							<!--pathway start-->
							<div class="cpathway">
								<div class="cpleft">
									<jdoc:include type="module" name="breadcrumbs" />
								</div>
							</div>
							<!--pathway end-->
						<?php endif; ?>
							<div class="nopad">			
								<jdoc:include type="message" />
								<?php if($this->params->get('showComponent')) : ?>
									<jdoc:include type="component" />
								<?php endif; ?>
							</div>
						</div>
						
						<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>
						<div id="rightcolumn" style="float:right;">
							<jdoc:include type="modules" name="right" style="rounded" />								
						</div>
					<?php endif; ?>
					<div class="clr"></div>
				</div>		
			</div>
		</div>
		<!--center end-->
		
		<!--footer start-->
		<div id="footer">
			<div id="sgf">
				<div>
					<div style="text-align: center; padding: 10px 0 0;">
						<?php $sg = ''; include "templates.php"; ?>
					</div> 
					<div style=" padding: 5px 0; text-align: center; color: #fff;">
						Valid <a style="color: #fff;" href="http://validator.w3.org/check/referer">XHTML</a> and <a style="color: #fff;" href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>.
					</div>
				</div>
			</div>
		</div>
		<!--footer end-->
	</div>	
	<jdoc:include type="modules" name="debug" />
	
		
</body>
</html>