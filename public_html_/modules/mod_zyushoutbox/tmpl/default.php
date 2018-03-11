<?php 
/**
* @package mod_zyushoutbox
* @copyright	Copyright (C) 2008 Nova Zyuras Indonesia Bandung. All rights reserved.
* @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU/GPL, see LICENSE.php
* ZyuShoutbox is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

$getchaturl 	= JURI::root().'?jalGetChat=yes';
$sendchaturl 	= JURI::root().'?jalSendChat=yes';

?>
<script type="text/javascript">
	
	// Variabel Definitions
	var jal_org_timeout = <?php echo stripslashes(shoutbox_update_seconds); ?>; 
	var jal_timeout 	= jal_org_timeout;
	var GetChaturl 		= "<?php echo $getchaturl; ?>";
	var SendChaturl 	= "<?php echo $sendchaturl; ?>";
	
	var sbFadeLength 	= <?php echo stripslashes(shoutbox_fade_length); ?>;
	var sbFadeFrom		= "<?php echo stripslashes(shoutbox_fade_from); ?>";
	var sbFadeTo 		= "<?php echo stripslashes(shoutbox_fade_to); ?>";
</script>
<?php 
	// if logout and must registered, disable Expresicons
	if	(!($name == 'logout' && shoutbox_mode == 2))
	{
?>
		<script type="text/javascript">
			// Sliding Effect with mootools
			window.addEvent('domready', function(){
				//-vertical
		
				var mySlide = new Fx.Slide('smilies');
				mySlide.hide();


		
				$('toggle').addEvent('click', function(e){
					e = new Event(e);
					mySlide.toggle();
					e.stop();
				});
		

			}); 
		</script>
<?php
	}
?>

<div id="shoutbox">
	<div id="chatoutput">
		<?php
		global $mosConfig_offset;
		
		// For the first time, load last 10 message
		$results = modZyuShoutboxHelper::getdbData('ORDER BY id DESC LIMIT '.$msgShown);
														
		// Loops the messages into a list only works for the first time
		if ($results) 
		{	
			$lastID 	= $results[0]->id;
			$timeSince 	= modZyuShoutboxHelper::jalTimeSince($results[0]->time);
			echo '<div id="lastMessage">'
							.'<span>'.JText::_('JAL_LAST_MESSAGE').':</span> '
								.'<em id="responseTime">'.$timeSince
									.' '.JText::_('JAL_AGO')
								.'</em>'
						.'</div> 
							<ul id="outputList">';

			foreach ($results as $result) 
			{
				// Add links
				$result->text = preg_replace( "`(http|ftp)+(s)?:(//)((\w|\.|\-|_)+)(/)?(\S+)?`i", 
											 "<a href=\"\\0\">&laquo;link&raquo;</a>", $result->text);
				
				$url = (empty($result->url) && $result->url = "http://") 
						? $result->name 
						: '<a href="'.$result->url.'">'.$result->name.'</a>';
				
				$convSmiley	= modZyuShoutboxHelper::sbConvertSmilies(" ".stripslashes($result->text));

				echo '<li><span title="'.$timeSince.'">'.stripslashes($url).' : </span>'
							.$convSmiley
						.'</li>'; 
			}
			echo 		'</ul>';
		} else
			{
				echo 'You need <b>at least one entry</b> in your shoutbox! Just type in a message now and reload, then you should be fine.';
			}

		?>
	</div>
	
	<?php
	
	// if not (logout and must registered)
	if	(!($name == 'logout' && shoutbox_mode == 2)) 
	{
	?>
		<form id="chatForm" name="chatForm" method="post" action="<?php echo JURI::Base();?>">
		<p>
			<?php echo "\n"; ?>
			<label><?php echo JText::_('Username').':'; ?>
			<?php
			echo "\n";
			
			if ($name != 'logout')
			{ 
				// If they were logged in, then print their nickname, hide input box
				$inputType = 'hidden';
			?>
				<em><?php echo ' '.$name; ?></em>
			<?php
			} else
				{
					// Otherwise allow the user to pick their own name, or get it from cookie
					$inputType 	= 'text';
					$name 		= isset($_COOKIE['jalUserName']) ? $_COOKIE['jalUserName'] : '';
				}
			?>
				
			</label>
			<input type="<?php echo $inputType; ?>" name="shoutboxname" id="shoutboxname" value="<?php echo $name; ?>" />

			<?php
			$url = isset($_COOKIE['jalUrl']) ? $_COOKIE['jalUrl'] : 'http://'; 

			if (!use_url) {	echo '<span style="display: none">'; } 
			?>
			<label for="shoutboxurl">Url:</label>
			<input type="text" name="shoutboxurl" id="shoutboxurl" value="<?php echo $url; ?>" />
			<?php 
			if (!use_url) {	echo "</span>";	}

			echo "\n"; 
			?>
					
			<label for="chatbarText"><?php echo JText::_('JAL_MESSAGE'); ?></label>
			<?php 
			if (use_textarea) 
			{ 
			?>
				<textarea rows="4" cols="16" name="chatbarText" id="chatbarText" onkeypress="return pressedEnter(this,event);"></textarea>
			<?php 
			} else 	{ 
			?>
						<input type="text" name="chatbarText" id="chatbarText" onkeypress="return pressedEnter(this,event);"/>
			<?php 
					} 
			$validate = josSpoofValue();
			?>
		</p>

		<a id="toggle" href="#" name="toggle"><?php echo JText::_('JAL_SMILIES'); ?></a>
		<div id="smilies">
			<a href="javascript:void(0);" onclick="insertSmile(' :)', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_smile.gif" align="bottom" alt="Smiley" title="Smiley" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' ;)', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_wink.gif" align="bottom" alt="Wink" title="Wink" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :D', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_biggrin.gif" align="bottom" alt="Biggrin" title="Biggrin" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :(', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_sad.gif" align="bottom" alt="Sad" title="Sad" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :o', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_surprised.gif" align="bottom" alt="Surprised" title="Surprised" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' 8O', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_eek.gif" align="bottom" alt="Eek" title="Eek" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :S', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_confused.gif" align="bottom" alt="Confused" title="Confused" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' 8)', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_cool.gif" align="bottom" alt="Cool" title="Cool" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :x', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_mad.gif" align="bottom" alt="Mad" title="Mad" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :P', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_razz.gif" align="bottom" alt="Tongue" title="Tongue" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :$', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_redface.gif" align="bottom" alt="Redface" title="Redface" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :cry:', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_cry.gif" align="bottom" alt="Cry" title="Cry" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :evil:', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_evil.gif" align="bottom" alt="Evil" title="Evil" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :twisted:', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_twisted.gif" align="bottom" alt="Twisted" title="Twisted" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :roll:', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_rolleyes.gif" align="bottom" alt="Rolleyes" title="Rolleyes" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :!:', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_exclaim.gif" align="bottom" alt="Exclaim" title="Exclaim" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :?:', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_question.gif" align="bottom" alt="Question" title="Question" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :idea:', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_idea.gif" align="bottom" alt="Idea" title="Idea" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :arrow:', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_arrow.gif" align="bottom" alt="Arrow" title="Arrow" border="0" /></a>
			<a href="javascript:void(0);" onclick="insertSmile(' :|', document.forms.chatForm.chatbarText); return false;">
			<img src="components/com_shoutbox/smilies/icon_neutral.gif" align="bottom" alt="Neutral" title="Neutral" border="0" /></a>
		</div>

		<input type="hidden" id="jal_lastID" value="<?php echo $lastID + 1; ?>" name="jal_lastID" />
		<input type="hidden" name="shout_no_js" value="true" />
		<input type="submit" id="submitchat" name="submit" class="button" value="<?php echo 'Shout It!'; ?>" />
		</form>
	<?php 
	} else echo "<p>". JText::_('JAL_REG_ONLY') ."</p>"; 
	?>
</div>