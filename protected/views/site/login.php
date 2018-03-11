<?php $this->pageTitle=Yii::app()->name . ' - Acceder'; ?><h1 align="center">ACCESO A CONTROL Y SEGUIMIENTO</h1>
<p align="center">&nbsp;</p>
<div align="center">
  <p><?php echo CHtml::beginForm(); ?> </p>
  <table width="62%" height="118" border="0" align="center" cellpadding="1" cellspacing="2" >
    <tr align="left">
      <th width="111" class="label">&nbsp;</th>
      <td width="112">&nbsp;</td>
      <td width="364" rowspan="5" align="center"><div align="justify">
          <p><strong>Bienvenido</strong>, Ud. esta intentando accesar al Sistema de Control y Seguimiento de la <strong>Empresa Socialista Pedro Camejo</strong>. </p>
          <p>&nbsp;</p>
          <p>Si a&uacute;n no tiene su <strong>usuario</strong> y/o <strong>clave</strong>, solicitelo a trav&eacute;s de la Unidad de Tecnologia de la Informacion y se le contestara en la brevedad posible.</p>
          <p>&nbsp;</p>
          <p align="center"><strong>webmaster@cvapedrocamejo.gob.ve </strong></p>
      </div></td>
    </tr>
    <tr align="left">
      <th class="label"><div align="right"><?php echo CHtml::activeLabel($form,'Usuario:'); ?></div></th>
      <td><?php echo CHtml::activeTextField($form,'username') ?></td>
    </tr>
    <tr align="left">
      <th class="label"><div align="right"><?php echo CHtml::activeLabel($form,'Clave:'); ?></div></th>
      <td><?php echo CHtml::activePasswordField($form,'password') ?></td>
    </tr>
    <tr align="left">
      <th class="label">&nbsp;</th>
      <td><span class="action"><?php echo CHtml::submitButton('Entrar'); ?></span></td>
    </tr>
    <tr align="left">
      <th colspan="2" class="label">&nbsp;</th>
    </tr>
  </table>
  <p align="left"><?php echo CHtml::errorSummary($form); ?></p>
  <p><?php echo CHtml::endForm(); ?></p>
</div>
<p align="center">&nbsp;</p>
<!-- yiiForm -->
