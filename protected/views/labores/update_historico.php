<h2>Actualizar Labor Historico <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create_historico')); ?>]
[<?php echo CHtml::link('Admin',array('historico_admin')); ?>]
</div>

<?php echo $this->renderPartial('_form_historico', array(
	'model'=>$model,
	'update'=>true,
)); ?>
