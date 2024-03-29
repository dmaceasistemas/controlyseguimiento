<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
  <table width="76%" border="0" align="center">
    <tr>
      <td width="29%"><?php $cat=Categorias::model()->findAll();  ?>
        <?php $cats=CHtml::listData($cat,'id','str_descripcion'); ?>
        <?php echo CHtml::activeLabelEx($model,'id_categoria'); ?></td>
      <td width="71%"><?php echo CHtml::activeDropDownList($model,'id_categoria', $cats, array('empty'=>'Seleccione...')); ?>
        <?php //echo CHtml::activeLabelEx($model,'id_categoria'); ?></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'str_descripcion'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'str_descripcion',array('size'=>60,'maxlength'=>100)); ?></td>
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