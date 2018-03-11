<?php
/**
 * @copyright	Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license		GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<jdoc:include type="head" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/offline.css" type="text/css" />
	<?php if($this->direction == 'rtl') : ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/offline_rtl.css" type="text/css" />
	<?php endif; ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
</head>
<body>
<jdoc:include type="message" />
<p><a href="http://mail.cvapedrocamejo.gob.ve/webmail/src/login.php"><img src="templates/siteground-j15-56/images/header_cinelogo.png" alt="Joomla! Logo" border="0" align="middle" /></a></p>
<div id="frame" class="outline">
  <h1><?php echo "www.".$mainframe->getCfg('sitename').".gob.ve"; ?> </h1>
  <p> <?php echo $mainframe->getCfg('offline_message'); ?> </p>
  <p><a href="http://mail.cvapedrocamejo.gob.ve/webmail/src/login.php"><img src="images/banners/correo4.png" alt="Joomla! Logo" border="0" align="middle" /></a> </p>
  <form action="index.php" method="post" name="login" id="form-login">
    <fieldset class="input">
      <p id="form-login-username">
        <label for="username"></label>
      </p>
    </fieldset>
    <input type="hidden" name="option" value="com_user" />
    <input type="hidden" name="task" value="login" />
    <input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
    <?php echo JHTML::_( 'form.token' ); ?>
  </form>
</div>
<p>&nbsp;</p>
</body>
</html>
