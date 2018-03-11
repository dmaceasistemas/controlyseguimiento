<?php
// no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if ( $this->params->def( 'show_page_title', 1 ) ) : ?>
	<div class="componentheading<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
		<?php echo $this->params->get('page_title'); ?>
	</div>
<?php endif; ?>



<div class="contentpane<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
<?php if ( ($this->params->def('image', -1) != -1) || $this->params->def('show_comp_description', 1) ) : ?>
	<div class="contentdescription<?php echo $this->params->get( 'pageclass_sfx' ); ?>">
	<?php
		if ( isset($this->image) ) :  echo $this->image . '<div style="clear:both"></div>';  endif;
		echo $this->params->get('comp_description');
	?>
	</div>
<?php endif; ?>
</div>

<?php
$columns 			= (int)$this->categoriescolumns;
$countCategories 	= count($this->categories);
$begin				= array();
$end				= array();
$begin[0]			= 0;// first
$begin[1]			= ceil ($countCategories / $columns);
$end[0]				= $begin[1] -1;
for ( $j = 2; $j < $columns; $j++ )
{
	$begin[$j]	= $begin[1] * $j;
	$end[$j-1]	= $begin[$j] - 1;
}
$end[$j-1]		= $countCategories - 1;// last
$endFloat		= $countCategories - 1;


if ($this->displayimagecategories == 1)
{	
	for ($i = 0; $i < $countCategories; $i++)
	{
		if ( $columns == 1 ) {
			echo '<table>';
		} else {
			$float = 0;
			foreach ($begin as $k => $v)
			{
				if ($i == $v) {
					$float = 1;
				}
			}
			if ($float == 1) {		
				echo '<div style="position:relative;float:left;margin:10px;"><table>';
			}
		}

		echo '<tr>';		
		echo '<td align="center" valign="middle" style="'.$this->imagebackground.'"><a href="'.$this->categories[$i]->link.'">'.JHTML::_( 'image.site', $this->categories[$i]->linkthumbnailpath, '', '', '', $this->categories[$i]->title, 'style="border:0"' ).'</a></td>';
		echo '<td><a href="'.$this->categories[$i]->link.'" class="category'.$this->params->get( 'pageclass_sfx' ).'">'.$this->categories[$i]->title.'</a>&nbsp;';
		
		if ($this->categories[$i]->numlinks > 0) {echo '<span class="small">('.$this->categories[$i]->numlinks.')</span>';}
		
		echo '</td>';
		echo '</tr>';
		
		if ( $columns == 1 ) {
			echo '</table>';
		} else {
			if ($i == $endFloat) {
				echo '</table></div><div style="clear:both"></div>';
			} else {
				$float = 0;
				foreach ($end as $k => $v)
				{
					if ($i == $v) {
						$float = 1;
					}
				}
				if ($float == 1) {		
					echo '</table></div>';
				}
			}
		}
	}
}
else
{
	for ($i = 0; $i < $countCategories; $i++)
	{
		if ( $columns == 1 ) {
			echo '<ul>';
		} else {
			$float = 0;
			foreach ($begin as $k => $v)
			{
				if ($i == $v) {
					$float = 1;
				}
			}
			if ($float == 1) {		
				echo '<div style="position:relative;float:left;margin:10px"><ul>';
			}
		}
		
		echo '<li><a href="'.$this->categories[$i]->link.'" class="category'.$this->params->get( 'pageclass_sfx' ).'">'.$this->categories[$i]->title.'</a>&nbsp;';
		
		if ($this->categories[$i]->numlinks > 0) {echo '<span class="small">('.$this->categories[$i]->numlinks.')</span>';}
		
		echo '</li>';
		
		if ( $columns == 1 ) {
			echo '</ul>';
		} else {
			if ($i == $endFloat) {
				echo '</ul></div><div style="clear:both"></div>';
			} else {
				$float = 0;
				foreach ($end as $k => $v)
				{
					if ($i == $v) {
						$float = 1;
					}
				}
				if ($float == 1) {		
					echo '</ul></div>';
				}
			}
		}
	}
}
?>