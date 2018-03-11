<?php
/**
* @version $Id: admin.verjaardagen.html.php,v 1.22 2004/09/21 16:36:46 stingrey Exp $
* @package Mambo_4.5.1
* @copyright (C) 2000 - 2004 Miro International Pty Ltd
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
*/

defined( '_VALID_MOS' ) or die( 'Direct Access to this location is not allowed.' );

/**
* @package Mambo_4.5.1
*/
require_once( $mosConfig_absolute_path. "/administrator/components/com_shoutbox/shoutbox.cfg.php");

class HTML_shoutbox {

	function settingsShoutBox() {
		$mode[] = mosHTML::makeOption( '1', "Public" );
		$mode[] = mosHTML::makeOption( '2', "Registered" );
		$format[] = mosHTML::makeOption( '1', "Username" );
		$format[] = mosHTML::makeOption( '2', "Real Name" );
		$lists['mode'] = mosHTML::selectList( $mode, 'shoutbox_mode', 'class="inputbox" size="2"', 'value', 'text', shoutbox_mode );
		$lists['format'] = mosHTML::selectList( $format, 'shoutbox_format', 'class="inputbox" size="2"', 'value', 'text', shoutbox_format );
		?>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" name="adminForm">
		<table cellpadding="4" cellspacing="0" border="0" width="100%" class="adminform">
                <tr><th colspan="3">Shoutbox Settings</th></td>
				<tr>
                        <td align="left" width="165">Shout Mode:</td>
                        <td align="left"> <?php echo $lists['mode']; ?> </td>
                        <td align="left" width="55%">
               			<u>Public</u> - Everyone can post<br />
						<u>Registered</u> - Only Registered User can post. Others can only view.															
						</td>
                </tr>
                <tr>
                        <td align="left" width="165">User Names mode:</td>
                        <td align="left"> <?php echo $lists['format']; ?> </td>
                        <td align="left" width="55%">
               			<u>Username</u> - member's username will be displayed<br />
						<u>Real Name</u> - member's name will be displayed.
						</td>
                </tr>
				<tr>
						<td align="left" width="185">Update Every:</td>
						<td align="left"><input type="text" maxlength="3" name="conf_shoutbox_update_seconds" value="<?php echo stripslashes(shoutbox_update_seconds)/ 1000; ?>" size="2" /> Seconds <br /></td>
						<td align="left">This determines how "live" the shoutbox is. With a bigger number, it will take more time for messages to show up, but also decrease the server load. You may use decimals. This number is used as the base for the first 8 javascript loads. After that, the number gets successively bigger. Adding a new comment or mousing over the shoutbox will reset the interval to the number suplied above. Default: <a href="javascript:void(0)" onclick="javascript:document.adminForm.conf_shoutbox_update_seconds.value='4'">4 Seconds</a></td>
				</tr>
				<tr>
						<td align="left" width="185">Fade from:</td>
						<td align="left">#<input type="text" maxlength="6" name="conf_shoutbox_fade_from" value="<?php echo stripslashes(shoutbox_fade_from); ?>" size="6" /> <span style="background: #<?php echo stripslashes(shoutbox_fade_from); ?>;">&nbsp;</span></td>
						<td align="left">The color that new messages fade in from. Default: <a href="javascript:void(0)" onclick="javascript:document.adminForm.conf_shoutbox_fade_from.value='666666'"><span style="color: #666">666666</span></a></td>
				</tr>
				<tr>
						<td align="left" width="185">Fade to:</td>
						<td align="left">#<input type="text" maxlength="6" name="conf_shoutbox_fade_to" value="<?php echo stripslashes(shoutbox_fade_to); ?>" size="6" /> <span style="background: #<?php echo stripslashes(shoutbox_fade_to); ?>;">&nbsp;</span></td>
						<td align="left">Also used as the background color of the box. Default: <a href="javascript:void(0)" onclick="javascript:document.adminForm.conf_shoutbox_fade_to.value='FFFFFF'">FFFFFF</a> (white)</td>
				</tr>
				<tr>
						<td align="left" width="185">Text color:</td>
						<td align="left">#<input type="text" maxlength="6" name="conf_shoutbox_text_color" value="<?php echo stripslashes(shoutbox_text_color); ?>" size="6" /> <span style="background: #<?php echo stripslashes(shoutbox_text_color); ?>;">&nbsp;</span></td>
						<td align="left">The color of text within the box. Default: <a href="javascript:void(0)" onclick="javascript:document.adminForm.conf_shoutbox_text_color.value='333333'"><span style="color: #333">333333</span></a></td>
				</tr>
				<tr>
						<td align="left" width="185">Name color:</td>
						<td align="left">#<input type="text" maxlength="6" name="conf_shoutbox_name_color" value="<?php echo stripslashes(shoutbox_name_color); ?>" size="6" /> <span style="background: #<?php echo stripslashes(shoutbox_name_color); ?>;">&nbsp;</span></td>
						<td align="left">The color of peoples' names. Default: <a href="javascript:void(0)" onclick="javascript:document.adminForm.conf_shoutbox_name_color.value='0066CC'"><span style="color: #06c">0066CC</span></a></td>
				</tr>
				<tr>
						<td align="left" width="185">Fade Length</td>
						<td align="left"><input type="text" maxlength="3" name="conf_shoutbox_fade_length" value="<?php echo stripslashes(shoutbox_fade_length) / 1000; ?>" size="2" /> Seconds</td>
						<td align="left">The amount of time it takes for the fader to completely blend with the background color. You may use decimals. Default <a href="javascript:void(0)" onclick="javascript:document.adminForm.conf_shoutbox_fade_length.value='1.5'">1.5 seconds</a></td>
				</tr>
					<tr>
							<td align="left" width="185">Use textarea</td>
							<td align="left"><input type="checkbox" name="conf_use_textarea" <?php if(use_textarea == true) { echo 'checked="checked" '; } ?>/></td>
							<td align="left">A textarea is a bigger type of input box. Users will have more room to type their comments, <!--but pressing return won't work for submission-->.</td>
					</tr>
					<tr>
							<td align="left" width="185">Use URL field</td>
							<td align="left"><input type="checkbox" name="conf_use_url" <?php if(use_url == true) { echo 'checked="checked" '; } ?>/></td>
							<td align="left">Check this if you want users to have an option to add their URL when submitting a message. Warning: if you experience spam please turn this option off!</td>
					</tr>
				</table>
				
				

		<input type="hidden" name="option" value="com_shoutbox" />
		<input type="hidden" name="myname" value="Jabba Binks" />
		<input type="hidden" name="task" value="">
		</form>
		<?php
	}

	function showShoutBox( $option, &$rows, &$lists, &$search, &$pageNav ) {
		global $my;
		?>
		<form action="index2.php" method="post" name="adminForm">
		<table class="adminheading">
		<tr>
			<th>
			ShoutBox Manager
			</th>
		  </tr>
		</table>

		<table class="adminlist">
		<tr>
			<th width="20">
			<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
			</th>
			
			<!-- ------------------- -->
			<!-- 1 of 6 Change/Edit your column titles to display -->
			<!-- ------------------- -->
			
			<th class="title" nowrap="nowrap">
			ID			</th>
			<th class="title" nowrap="nowrap">
			Name			</th>
			<th class="title" nowrap="nowrap">
			Text			</th>
			<th class="title" nowrap="nowrap">
			URL			</th>
			<th class="title" nowrap="nowrap">
			Time			</th>
		</tr>
		<?php
		$k = 0;
		for ($i=0, $n=count( $rows ); $i < $n; $i++) {
			$row = &$rows[$i];
			mosMakeHtmlSafe($row);

			?>
			<tr class="<?php echo "row".$k; ?>">
				<td width="20">
				<?php echo mosHTML::idBox( $i, $row->id ); ?>
				</td>
				
				<!-- ------------------- -->
				<!-- 2 of 6 Change the following display values to match your header -->
				<!-- ------------------- -->
				
				<td align="left">
					<?php echo $row->id; ?>
					</a>
				</td>
				<td align="left">
				<?php echo $row->name; ?>
				</td>
				<td align="left">
				<?php echo $row->text; ?>
				</td>
				<td align="left">
				<?php echo $row->url; ?>
				</td>
				<td align="left">
				<?php echo $row->time; ?>
				</td>
			</tr>
			<?php			
			$k = 1 - $k; 
		} 
		?>
		</table>
		<?php echo $pageNav->getListFooter(); ?>
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		</form>
		<?php
	}





/**
* Writes the edit form for new and existing record
*
* A new record is defined when <var>$row</var> is passed with the <var>id</var>
* property set to 0.
* @param mosVerjaardagen The verjaardagen object
* @param array An array of select lists
* @param string The option
*/
	function editShoutBoxItem( &$row, $option ) {
		mosMakeHtmlSafe( $row, ENT_QUOTES, 'description' );
		?>
		<script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;
			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}


			
			/*** ***********************
			/**  5 of 6 Edit for your field validation needs
			/*** *********************** */
			
			if (form.naam.value == ""){
				alert( "Verjaardagen item must have a naam" );
			} else if (form.geboortedatum.value == ""){
				alert( "Verjaardagen item must have a geboortedatum" );
			} else {
				/*
				/** Edit this area to write your edit area back to the database
				/*   */
				submitform( pressbutton );
			}
		}
		</script>
		<table class="adminheading">
		<tr>
			<th>
			<?php echo $row->id ? 'Edit' : 'Add';?> ShoutBox Item
			</th>
		</tr>
		</table>

		<form action="index2.php" method="post" name="adminForm" id="adminForm">

		<!-- ------------------- -->
		<!-- 6 of 6 Change the following input form to capture all your values -->
		<!-- ------------------- -->
		
		<table class="adminform">
		<tr>
			<td width="20%" align="right">
			Name:
			</td>
			<td width="80%">
			<input class="text_area" type="text" name="name" size="30" maxlength="60" value="<?php echo $row->name;?>" />
			</td>
		</tr>
		<tr>
			<td valign="top" align="right">
			Text
			</td>
			<td>
			<textarea name="textarea" class="text_area" name="text" id="text" rows="3" cols="100"><?php echo $row->text; ?></textarea>
			</td>
		</tr>
		<!-- ------------------- -->
		<!-- The following can stay as they are -->
		<!-- ------------------- -->

		<tr>
			<td valign="top" align="right">
			Url
			</td>
			<td>
			<input class="text_area" type="text" name="url" size="30" maxlength="60" value="<?php echo $row->url;?>" />
			</td>
		</tr>
		</table>

		<input type="hidden" name="id" value="<?php echo $row->id; ?>" />
		<input type="hidden" name="option" value="<?php echo $option;?>" />
		<input type="hidden" name="task" value="" />
		</form>
		<?php
	}
}
?>

