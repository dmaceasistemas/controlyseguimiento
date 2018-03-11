<?php
/**
* @package		Joomla
* @subpackage	JoomCoverflow
*/

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class CoverflowViewImagen
{
	function setDisplayToolbar()
	{
		JToolBarHelper::title( JText::_( 'Imagenes' ), 'generic.png' );
		JToolBarHelper::publishList();
		JToolBarHelper::unpublishList();
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
	}

	function display( &$rows, &$pageNav, &$lists )
	{
		CoverflowViewImagen::setDisplayToolbar();
		$user =& JFactory::getUser();
		JHTML::_('behavior.tooltip');
		?>
		<form action="index.php?option=com_joomcoverflow" method="post" name="adminForm">
		<table>
		<tr>
			<td align="left" width="100%">
				<?php echo JText::_( 'Filter' ); ?>:
				<input type="text" name="search" id="search" value="<?php echo $lists['search'];?>" class="text_area" onchange="document.adminForm.submit();" />
				<button onclick="this.form.submit();"><?php echo JText::_( 'Go' ); ?></button>
				<button onclick="document.getElementById('search').value='';this.form.getElementById('filter_catid').value='0';this.form.getElementById('filter_state').value='';this.form.submit();"><?php echo JText::_( 'Filter Reset' ); ?></button>
			</td>
			<td nowrap="nowrap">
				<?php
				echo $lists['state'];
				?>
			</td>
		</tr>
		</table>

		<table class="adminlist">
			<thead>
				<tr>
					<th width="20">
						<?php echo JText::_( 'Num' ); ?>
					</th>
					<th width="20">
						<input type="checkbox" name="toggle" value=""  onclick="checkAll(<?php echo count( $rows ); ?>);" />
					</th>
					<th class="title">
						<?php echo JHTML::_('grid.sort',  'Álbum', 'i.albumName', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th class="title">
						<?php echo JHTML::_('grid.sort',  'Artista', 'i.artist', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th class="title">
						<?php echo JHTML::_('grid.sort',  'Enlace Álbum', 'i.albumLink', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th class="title">
						<?php echo JHTML::_('grid.sort',  'Enlace Artista', 'i.artistLink', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th class="title">
						<?php echo JHTML::_('grid.sort',  'Imagen', 'i.artLocation', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th class="title">
						<?php echo JHTML::_('grid.sort',  'Published', 'i.state', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
					<th class="title">
						<?php echo JHTML::_('grid.sort',  'Order', 'i.ordering', @$lists['order_Dir'], @$lists['order'] ); ?>
						<?php echo JHTML::_('grid.order',  $rows ); ?>
					</th>
					<th class="title">
						<?php echo JHTML::_('grid.sort',  'ID', 'i.id', @$lists['order_Dir'], @$lists['order'] ); ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="17">
						<?php echo $pageNav->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php
			$k = 0;
			for ($i=0, $n=count( $rows ); $i < $n; $i++) {
				$row = &$rows[$i];

				$link		= JRoute::_( 'index.php?option=com_joomcoverflow&c=imagen&task=edit&cid[]='. $row->id );
				
				$row->published = $row->state;
				$published		= JHTML::_('grid.published', $row, $i );
				$checked		= JHTML::_('grid.checkedout', $row, $i );
				
				?>
				<tr class="<?php echo "row$k"; ?>">
					<td align="center">
						<?php echo $pageNav->getRowOffset($i); ?>
					</td>
					<td align="center">
						<?php echo $checked; ?>
					</td>
					<td>
						<a href="<?php echo $link; ?>"><?php echo $row->albumName;?></a>
					</td>
					<td>
						<?php echo $row->artist;?>
					</td>
					<td>
						<?php echo $row->albumLink;?>
					</td>
					<td>
						<?php echo $row->artistLink;?>
					</td>
					<td>
						<?php echo $row->artLocation;?>
					</td>
					<td align="center">
						<?php echo $published;?>
					</td>
					<td class="order">
						<!--<span><?php echo $pageNav->orderUpIcon( $i, true, 'orderup', 'Move Up', true); ?></span>
						<span><?php echo $pageNav->orderDownIcon( $i, $n, true, 'orderdown', 'Move Down', true ); ?></span>-->
						<input type="text" name="order[]" size="5" value="<?php echo $row->ordering;?>" class="text_area" style="text-align: center" />
					</td>
					<td align="center">
						<?php echo $row->id; ?>
					</td>
				</tr>
				<?php
				$k = 1 - $k;
			}
			?>
			</tbody>
		</table>

		<input type="hidden" name="c" value="imagen" />
		<input type="hidden" name="option" value="com_joomcoverflow" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $lists['order']; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $lists['order_Dir']; ?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>
		<?php
	}

	function setViewToolbar()
	{
		$task = JRequest::getVar( 'task', '', 'method', 'string');

		JToolBarHelper::title( $task == 'add' ? JText::_( 'Imagen' ) . ': <small><small>[ '. JText::_( 'New' ) .' ]</small></small>' : JText::_( 'Imagen' ) . ': <small><small>[ '. JText::_( 'Edit' ) .' ]</small></small>', 'generic.png' );
		JToolBarHelper::save( 'save' );
		JToolBarHelper::apply('apply');
		JToolBarHelper::cancel( 'cancel' );
	}

	function edit( &$row, &$lists )
	{
		CoverflowViewImagen::setViewToolbar();
		JRequest::setVar( 'hidemainmenu', 1 );
		JFilterOutput::objectHTMLSafe( $row, ENT_QUOTES, 'custombannercode' );
		$editor =& JFactory::getEditor();
		JHTML::_('behavior.calendar');
		?>
		<script language="javascript" type="text/javascript">
		<!--
		function changeDisplayImage() {
			if (document.adminForm.artLocation.value !='') {
				document.adminForm.imagelib.src='../images/coverflow/' + document.adminForm.artLocation.value;
			} else {
				document.adminForm.imagelib.src='images/blank.png';
			}
		}
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			// do field validation
			if (form.albumName.value == "") {
				alert( "<?php echo JText::_( 'Por favor, introduzca el nombre del album.', true ); ?>" );
			} else if (!getSelectedValue('adminForm','artLocation')) {
				alert( "<?php echo JText::_( 'Por favor, seleccione una imagen.', true ); ?>" );
			} else {
				submitform( pressbutton );
			}
		}
		//-->
		</script>
		<form action="index.php" method="post" name="adminForm">

		<div class="col100">
			<fieldset class="adminform">
				<legend><?php echo JText::_( 'Details' ); ?></legend>

				<table class="admintable">
				<tbody>
					<tr>
						<td width="20%" class="key">
							<label for="albumName"><?php echo JText::_( 'Nombre del álbum' ); ?>:</label>
						</td>
						<td width="80%">
							<input class="inputbox" type="text" name="albumName" id="albumName" size="140" value="<?php echo $row->albumName;?>" />
						</td>
					</tr>
					<tr>
						<td width="20%" class="key">
							<label for="artist"><?php echo JText::_( 'Artista' ); ?>:</label>
						</td>
						<td width="80%">
							<input class="inputbox" type="text" name="artist" id="artist" size="140" value="<?php echo $row->artist;?>" />
						</td>
					</tr>
					<tr>
						<td width="20%" class="key">
							<label for="albumLink"><?php echo JText::_( 'Enlace del álbum' ); ?>:</label>
						</td>
						<td width="80%">
							<input class="inputbox" type="text" name="albumLink" id="albumLink" size="140" value="<?php echo (!empty ($row->albumLink)) ? $row->albumLink : 'http://'; ?>" />
						</td>
					</tr>
					<tr>
						<td width="20%" class="key">
							<label for="artistLink"><?php echo JText::_( 'Enlace del artista' ); ?>:</label>
						</td>
						<td width="80%">
							<input class="inputbox" type="text" name="artistLink" id="artistLink" size="140" value="<?php echo (!empty ($row->artistLink)) ? $row->artistLink : 'http://'; ?>" />
						</td>
					</tr>
					<tr>
						<td width="20%" class="key">
							<label for="artLocation"><?php echo JText::_( 'Imagen' ); ?>:</label>
						</td>
						<td >
							<?php echo $lists['artLocation']; ?>
						</td>
					</tr>
					<tr>
						<td width="20%" class="key">
							<label for="artLocation"> </label>
						</td>
						<td>
							<?php if (eregi("gif|jpg|png", $row->artLocation)) {
								?>
								<img src="../images/coverflow/<?php echo $row->artLocation; ?>" name="imagelib" />
								<?php
							} else {
								?>
								<img src="images/blank.png" name="imagelib" />
								<?php
							} ?>
						</td>
					</tr>
					<tr>
						<td class="key">
							<label for="ordering"><?php echo JText::_( 'Ordering' ); ?>:</label>
						</td>
						<td>
							<input class="inputbox" type="text" name="ordering" id="ordering" size="4" value="<?php echo $row->ordering;?>" />
						</td>
					</tr>
					<tr>
						<td class="key">
							<label for="state"><?php echo JText::_( 'Publicado' ); ?>:</label>
						</td>
						<td>
							<?php echo $lists['state']; ?>
						</td>
					</tr>
				</tbody>
				</table>
			</fieldset>
		</div>
		<div class="clr"></div>

		<input type="hidden" name="c" value="imagen" />
		<input type="hidden" name="option" value="com_joomcoverflow" />
		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="cid" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="task" value="" />
		<?php echo JHTML::_( 'form.token' ); ?>
		</form>
		<?php
	}
}