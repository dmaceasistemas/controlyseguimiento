<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
<?php echo CHtml::activeLabelEx($model,'str_descripcioneje'); ?>
<?php echo CHtml::activeTextField($model,'str_descripcioneje',array('size'=>60,'maxlength'=>100)); ?>
</div>

<div class="action">
<?php echo CHtml::submitButton($update ? 'Guardar' : 'Crear'); ?>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->