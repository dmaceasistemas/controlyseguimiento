<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
  <table width="78%" border="0" align="center">
    <tr>
      <td width="16%"><?php echo CHtml::activeLabelEx($model,'str_descripcion'); ?></td>
      <td width="84%"><?php echo CHtml::activeTextField($model,'str_descripcion',array('size'=>50,'maxlength'=>50)); ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><span class="action"><?php echo CHtml::submitButton($update ? 'Guardar' : 'Crear'); ?></span></div></td>
      </tr>
  </table>
  </div>

<div class="action"></div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->