<?php $this->pageTitle=Yii::app()->name . ' Cambiar Clave'; ?>
<?php if ($uso_claveanterior) { ?>
    <div class="grupo" style="margin:0px auto; font-size:95%;" align="center">       
        <p> Su nueva clave debe ser distinta a la anterior</p>
         <p> <a href="index.php?r=usuario/cambiarclave"><img src="images/atras.png" /></a></p>
    </div>


    <?php } else if (!$actualizado){ ?>

<h1 align="center" style="font-size:90%;">CAMBIAR MI CLAVE</h1>
<div class="yiiForm">
<div align="left"><?php echo CHtml::beginForm(); ?>

</div>
<div class="grupo" style="margin:0px auto; font-size:90%;" align="center">
<div style="background:black; color:yellow; font-weight:bold">
        Este cambio afectara el acceso a otros Sistemas al cual usted puede ingresar.
</div>
  <div align="left">
    <table width="100%" border="0" align="center" cellpadding="1" cellspacing="2" >
      <tr align="left">
        <th class="label" width="159"><div align="right"><?php echo CHtml::activeLabel($form,'nombreusuario'); ?> </div></th>
          <td width="10"></td>
          <td width="56"><?php echo CHtml::activeTextField($form,'nombreusuario', array('style'=>'width:150px;', 'readonly'=>'true','value'=>$form->nombreusuario)); ?></td>

        </tr>

      <tr align="left">
        <th class="label" width="159"><div align="right"><?php echo CHtml::activeLabel($form,'clave'); ?></div></th>
          <td></td>
          <td width="56"><?php echo CHtml::activePasswordField($form,'clave', array('style'=>'width:150px;')); ?></td>
        </tr>

        <tr align="left">
        <th class="label" width="159"><div align="right"><?php echo CHtml::activeLabel($form,'reclave'); ?></div></th>
          <td></td>
          <td width="56"><?php echo CHtml::activePasswordField($form,'reclave', array('style'=>'width:150px;')); ?></td>
        </tr>


    </table>
  </div>
        
</div>
<br></br>

        


 <div align="center"><br><?php echo CHtml::submitButton('Cambiar'); ?></br></div>
<?php echo CHtml::endForm(); ?>
<?php echo CHtml::errorSummary($form); ?>


</div><!-- yiiForm -->

<?php } if ($actualizado){//end de actualizado
  ?>
<h2 align="center" style="font-size:90%;">CLAVE CAMBIADA</h2>
<div class="grupo" style="margin:0px auto; font-size:95%;" align="center">

        <br>Se ha cambiado su clave de modo exitoso. Pruebe este cambio reiniciando su Sesion con su Nueva Clave
         <p> <a href="index.php?r=site/logout"><img src="images/reset.png" /></a></p>
        </br>
        <p></p>
        
        
        <div style="background:black; color:yellow; font-weight:bold">
        Este cambio afectara el acceso a otros Sistemas al cual usted puede ingresar.
        <br>Si usted solo tiene acceso a la Intranet, haga caso omiso a este mensaje</br>
</div>
</div>
<?php } ?>
