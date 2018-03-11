<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.
</p>

<p><?php echo CHtml::beginForm(); ?>
  
    <?php echo CHtml::errorSummary($model); ?></p>
<div class="simple">
  <table width="80%" border="0" align="center">
    <tr>
      <td width="34%"><?php $sed=Sedes_ampliada::model()->findAll();  ?>
        <?php $seds=CHtml::listData($sed,'codubifis','desubifis'); ?>
        <?php echo CHtml::activeLabelEx($model,'int_idsede'); ?></td>
      <td width="66%"><?php echo CHtml::activeDropDownList($model,'int_idsede', $seds, array('empty'=>'Seleccione...')); ?></td>
    </tr>
    <tr>
      <td><?php $eje=EjesEstrategicos::model()->findAll();  ?>
        <?php $ejes=CHtml::listData($eje,'seq_ideje','str_descripcioneje'); ?>
        <?php echo CHtml::activeLabelEx($model,'int_ideje'); ?></td>
      <td><?php echo CHtml::activeDropDownList($model,'int_ideje', $ejes, array('empty'=>'Seleccione...')); ?></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><span class="action"><?php echo CHtml::submitButton($update ? 'Guardar' : 'Crear'); ?></span></div></td>
      </tr>
  </table>
  </div>
<div class="simple"></div>

<div class="action"></div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->