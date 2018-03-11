<?php $this->pageTitle=Yii::app()->name . ' Validar'; ?>
<?php if(Yii::app()->user->hasFlash('validar')): ?>
<div class="confirmation">
   <?php echo Yii::app()->user->getFlash('validar'); ?>
</div>
<?php else: ?>

<div class="yiiForm" >

<div align="left"><?php echo CHtml::beginForm(); ?>
  
</div>
<div class="grupo" style="margin:0px auto; font-size:80%;" align="center">
  <div align="left">
    <table width="1%" height="15%" border="0" align="center" cellpadding="1" cellspacing="2" >
      <tr align="left">
        <th class="label" width="40"><div align="center"><?php echo CHtml::activeLabel($validar,'C.I del Trabajador'); ?></div>
          <div align="center"></div></th>
        </tr>
      
      <tr align="left">
        <th class="label"><?php echo CHtml::activeTextField($validar,'cedulaTrabajador', array('style'=>'width:130px;')); ?></th>
        </tr>
      <tr align="left">
        <th class="label" width="40"><div align="center"><?php echo CHtml::activeLabel($validar,'Tipo de Documento'); ?></div></th>
        </tr>
      
      <tr align="left">
        <th class="label"><?php echo CHtml::activeDropDownList($validar,'tipoDocumento', $tiposDocumento, array('style'=>'width:130px;')) ?></th>
        </tr>
      <tr align="left">
        <th class="label" width="40"><div align="center"><?php echo CHtml::activeLabel($validar,'Cod. del Documento'); ?></div></th>
        </tr>
      
      <?php if(extension_loaded('gd')): ?>
      <tr align="left">
        <th height="20" class="label"><?php echo CHtml::activeTextField($validar,'codigoDocumento', array('style'=>'width:130px;')); ?></th>
        </tr>
      <tr align="left">
        <th width="40" class="label"><div align="center"><?php echo CHtml::activeLabel($validar,'Codigo de Imagen'); ?></div></th>
        </tr>
      <tr align="left">
        <th height="20" class="label"><?php echo CHtml::activeTextField($validar,'verifyCode', array('style'=>'width:130px;')); ?></th>
      </tr>
      <tr align="left">
        <th height="20" class="label"><div align="center">
          <?php $this->widget('CCaptcha'); ?>
        </div></th>
      </tr>
      <tr align="left">
        <th height="20" class="label"><div align="center"><?php echo CHtml::submitButton('Validar'); ?></div></th>
        </tr>
      <?php endif; ?>   
    </table>
  </div>
</div>
<p><?php //echo CHtml::errorSummary($validar); ?> </p>
</div>
<!-- yiiForm -->
<?php endif; ?>