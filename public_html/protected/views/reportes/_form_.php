<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.</p>
<p><?php echo CHtml::beginForm(); ?> <?php echo CHtml::errorSummary($model); ?> </p>
<table width="100%" height="100" border="0">
  <tr>
    <td><span class="simple"><?php echo CHtml::activeLabelEx($model,'str_descripcion'); ?></span></td>
    <td><span class="simple"><?php echo CHtml::activeTextField($model,'str_nombrereporte',array('size'=>60,'maxlength'=>250)); ?></span></td>
  </tr>
  <tr>
    <td><span class="simple"><?php echo CHtml::activeLabelEx($model,'str_nombrereporte'); ?></span></td>
    <td><span class="simple"><?php echo CHtml::activeTextField($model,'str_descripcion',array('size'=>60,'maxlength'=>200)); ?></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><span class="action"><?php echo CHtml::submitButton($update ? 'Guardar' : 'Crear'); ?></span></div></td>
    </tr>
</table>
<div class="simple"></div>
<div class="simple"></div>

<div class="action"></div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->