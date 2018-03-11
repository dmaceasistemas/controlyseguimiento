<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
  <table width="660" height="117" border="0" align="center">

    <tr>
      <td width="150"><?php echo CHtml::activeLabelEx($model,'str_descriptiposervicio'); ?></td>
      <td width="500"><?php echo CHtml::activeTextField($model,'str_descriptiposervicio',array('size'=>60,'maxlength'=>100)); ?></td>
    </tr>
    <tr>
      <td height="23">&nbsp;</td>
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