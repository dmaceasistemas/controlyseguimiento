<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php JHTML::_('behavior.tooltip'); ?>



<form enctype="multipart/form-data" action="index.php" method="post" name="adminForm">

	<?php   if ($this->ftp) : ?>
		<?php  echo $this->loadTemplate('ftp'); ?>
	<?php  endif; ?>

	<table class="adminform" border="0">
	<?php if ($this->themename !='') {
	?>
		<tr>
			<td colspan="3"><?php echo JText::_( 'Current Theme' ); ?> : <?php echo $this->themename; ?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
	<?php
	}
	?>
	<tr>
		<td width="5"><input type="checkbox" name="theme_component" value=""  /></td>
		<td colspan="2"><?php echo JText::_( 'Apply to Component' ); ?></td>
	</tr>
	<tr>
		<td width="5"><input type="checkbox" name="theme_categories" value="" /></td>
		<td colspan="2"><?php echo JText::_( 'Apply to Categories' ); ?></td>
	</tr>
	<tr>
		<td width="5"><input type="checkbox" name="theme_category" value="" /></td>
		<td colspan="2"><?php echo JText::_( 'Apply to Category' ); ?></td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td colspan="2"><b><?php echo JText::_( 'Upload Theme Package File' ); ?></b></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td width="120">
			<label for="install_package"><?php echo JText::_( 'Package File' ); ?>:</label>
		</td>
		<td>
			<input class="input_box" id="install_package" name="install_package" type="file" size="57" />
			<input class="button" type="button" value="<?php echo JText::_( 'Upload File' ); ?> &amp; <?php echo JText::_( 'Install' ); ?>" onclick="submitbutton()" />
		</td>
	</tr>
	<tr>
		<td colspan="3">&nbsp;</td>
	</tr>
	</table>

<div style="margin:0;margin-top:10px;padding-left:50px;padding-top:8px;background: url('components/com_phocagallery/assets/images/update.png') 0 0 no-repeat;height:40px;width:250px;"><a style="text-decoration:underline;font-size:16px;font-weight:bold;color:#fff;" href="http://www.phoca.cz/themes/" target="_blank"><?php echo JText::_('New Theme Download'); ?></a></div>
	
<input type="hidden" name="type" value="" />
<input type="hidden" name="task" value="themeinstall" />
<input type="hidden" name="option" value="com_phocagallery" />
<input type="hidden" name="controller" value="phocagalleryt" />
<?php echo JHTML::_( 'form.token' ); ?>
</form>


