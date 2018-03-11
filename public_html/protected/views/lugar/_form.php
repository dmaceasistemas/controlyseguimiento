<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.
</p>

<p><?php echo CHtml::beginForm(); ?>
  
    <?php echo CHtml::errorSummary($model); ?></p>
<table width="100%" border="0">
  <tr>
    <td><span class="simple"><?php echo CHtml::activeLabelEx($model,'desiti'); ?></span></td>
    <td><span class="simple"><?php echo CHtml::activeTextField($model,'desiti',array('size'=>50,'maxlength'=>50)); ?></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><span class="action"><?php echo CHtml::submitButton($update ? 'Guardar' : 'Crear'); ?></span></div></td>
    </tr>
</table>
<div class="action"></div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->