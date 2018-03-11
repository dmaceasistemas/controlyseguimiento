<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>

<?php
    $heading = '';
    if ( $this->displaycatnametitle == 1) {
        $heading .= $this->params->get( 'page_title' );
    }
    if ($this->category->title != '') {
        if ($heading != '') {
            $heading .= ' - ';
        }
        $heading .= $this->category->title;
    }
?>
<?php if ( $heading != '') { ?>
    <div class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
        <?php echo $heading; ?>
    </div>
<?php } ?>

<div class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php if ( @$this->image || @$this->category->description ) : ?>
	<div class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<?php
		if ( isset($this->image) ) :  echo $this->image; endif;
		echo $this->category->description;
	?>
	</div>
<?php endif; ?>
</div>

<form action="<?php echo $this->action; ?>" method="post" name="adminForm">


<div id="phocagallery">
	<?php 
	if (!empty($this->items))
	{
		
		foreach($this->items as $key => $value)
		{
			$imageHeight 	= $this->imageheight;
			if ($imageHeight < 100 ) {
				$imageHeight	= 100;
				$boxImageHeight = 100;
			} else {
				$boxImageHeight = $imageHeight;
			}
			
			$imageWidth		= $this->imagewidth;
			if ($imageWidth < 100 ) {
				$imageWidth    = 100;
				$boxImageWidth = 120;
			} else {
				$boxImageWidth = $imageWidth + 20;
			}

			if ($this->displayname == 1) {
				$boxImageHeight = $boxImageHeight + 20;
			}
			
			if ($this->displayicondetail == 1 || $this->displayicondownload == 1 || $this->displayiconfolder == 1) {
				$boxImageHeight = $boxImageHeight + 20;
			}
			
			if ( $this->displayimageshadow != 'none' ) {		
				$boxImageHeight = $boxImageHeight + 18;
				$imageHeight	= $imageHeight + 18;
				$imageWidth 	= $imageWidth + 18;
			}
			
			if ( $this->categoryboxspace > 0 ) {		
				$boxImageHeight = $boxImageHeight + $this->categoryboxspace;
			}
			

		?>
		<div class="phocagallery-box-file" style="height:<?php echo $boxImageHeight; ?>px; width:<?php echo $boxImageWidth; ?>px">
			<center>
				<div class="phocagallery-box-file-first" style="height:<?php echo $imageHeight; ?>px;width:<?php echo $imageWidth; ?>px;">
					<div class="phocagallery-box-file-second">
						<div class="phocagallery-box-file-third">
							<center>
							<a class="<?php echo $value->button->methodname; ?>" title="<?php echo $value->title; ?>" href="<?php echo $value->link; ?>" <?php
							if ($this->detailwindow == 1)
							{
								?>onclick="<?php echo $value->button->options; ?>"<?php
							}
							else
							{
								?>rel="<?php echo $value->button->options; ?>"<?php
							}
							?> ><?php echo JHTML::_( 'image.site', $value->linkthumbnailpath, '', '', '', $value->title ); ?></a>
							</center>
						</div>
					</div>
				</div>
			</center>
			
			<?php
			
			if ($value->displayname == 1)
			{
				?>
				<div class="name" style="font-size:<?php echo $this->fontsizename ?>px"><?php echo PhocaGalleryHelper::wordDelete($value->title, $this->charlengthname, '...');?></div>
				<?php
			}
			?>
			
			
			<?php
			if ($value->displayicondetail == 1 || $value->displayicondownload == 1 || $value->displayiconfolder == 1)
			{
				echo '<div class="detail" style="margin-top:2px">';
				
				if ($value->displayicondetail == 1)
				{
					?>
					<a class="<?php echo $value->button->methodname; ?>" title="<?php echo JText::_('Image Detail');//$value->title; ?>" href="<?php echo $value->link; ?>" <?php
						if ($this->detailwindow == 1)
						{
							echo 'onclick="'. $value->button->options.'"';
						}
						else
						{
							echo 'rel="'. $value->button->options.'"';
						}
						echo ' >';
						echo JHTML::_('image', 'components/com_phocagallery/assets/images/icon-view.'.PhocaGalleryHelper::getFormatIcon(), $value->title);
						echo '</a>';
				}
				
				if ($value->displayiconfolder == 1)
				{
						?>
						<a class="<?php echo $value->button->methodname; ?>" title="<?php echo JText::_('Sub category');//$value->title; ?>" href="<?php echo $value->link; ?>">
						<?php
						echo JHTML::_('image', 'components/com_phocagallery/assets/images/icon-folder-small.'.PhocaGalleryHelper::getFormatIcon(), $value->title);	
						echo '</a>';
				}
				
				if ($value->displayicondownload == 1)
				{
					?>
					<a class="<?php echo $value->button->methodname; ?>" title="<?php echo JText::_('Image Download');//$value->title; ?>" href="<?php echo JRoute::_('index.php?option=com_phocagallery&view=phocagalleryd&catid='.$this->category->slug.'&id='.$value->slug.'&tmpl=component&phocadownload=1'); ?>" <?php
						if ($this->detailwindow == 1)
						{
							echo 'onclick="'. $value->button->options.'"';
						}
						else
						{
							echo 'rel="'. $value->button->options.'"';
						}
						echo ' >';
						echo JHTML::_('image', 'components/com_phocagallery/assets/images/icon-download.'.PhocaGalleryHelper::getFormatIcon(), $value->title);
						echo '</a>';
				
				}
				
				echo '</div>';
				echo '<div style="clear:both"></div>';
			}
			?>
			
		</div>
		<?php
		}
	}
	else
	{
		echo JText::_('There is no image in this category');
	}
		?>
</div>
<div style="clear:both"></div>

<p>&nbsp;</p>

<?php
if (count($this->items))
{
	?>
	<center>
	<?php
	if ($this->params->get('show_pagination_limit'))
	{
		?>
		<span style="margin:0 10px 0 10px">
			<?php
				echo JText::_('Display Num') .'&nbsp;';
				echo $this->pagination->getLimitBox();
			?>
		</span>
		<?php
	}
	
	if ($this->params->get('show_pagination'))
	{
		?>
		<span style="margin:0 10px 0 10px" class="sectiontablefooter<?php echo $this->params->get( 'pageclass_sfx' ); ?>" >
			<?php echo $this->pagination->getPagesLinks();?>
		</span>
		
		<span style="margin:0 10px 0 10px" class="pagecounter">
			<?php echo $this->pagination->getPagesCounter(); ?>
		</span>
		<?php
	}
	?>
	</center>
	<?php
}
?>
</form>