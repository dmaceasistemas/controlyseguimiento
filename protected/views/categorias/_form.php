<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
  <table width="80%" border="0" align="center">
    <tr>
      <td width="60%"><?php echo CHtml::activeLabelEx($model,'str_descripcion'); ?></td>
      <td width="42%"><?php echo CHtml::activeTextField($model,'str_descripcion',array('size'=>60,'maxlength'=>100)); ?></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><?php echo CHtml::submitButton($update ? 'Guardar' : 'Crear'); ?></div></td>
      </tr>
  </table>
  </div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->
