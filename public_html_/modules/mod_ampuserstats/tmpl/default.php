<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php 
if($latest_member) { ?>
<div><?php echo $latest_member_lab; ?> : <span class="userstat"><?php echo $list->latest_member;?></span></div>
<?php } ?>

<?php 
if($total_member) { ?>
<div><?php echo $total_member_lab; ?> : <span class="userstat"><?php echo $list->total_num;?></span></div>
<?php } ?>

<?php 
if($number_member_online) { ?>
<div><?php echo $number_member_online_lab; ?> : <span class="userstat"><?php echo $list->member_online;?></span></div>
<?php } ?>

<?php 
if($number_register_today) { ?>
<div><?php echo $number_register_today_lab; ?> : <span class="userstat"><?php echo $list->num_today;?></span></div>
<?php } ?>

<?php 
if($number_register_thisweek) { ?>
<div><?php echo $number_register_thisweek_lab; ?> : <span class="userstat"><?php echo $list->num_week;?></span></div>
<?php } ?>

<?php 
if($number_register_this_month) { ?>
<div><?php echo $number_register_thismonth_lab; ?> : <span class="userstat"><?php echo $list->num_month;?></span></div>
<?php } ?>

<?php 
if($amplify_credit_link) { ?>
<div class ="ampcredit"><a href="http://www.projectamplify.com" title="Joomla! module by Amplify">Joomla! module by Amplify</a></div>
<?php } ?>



