<h2>Actualizar Metas <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create_metas')); ?>]
[<?php echo CHtml::link('Admin',array('admin_metas')); ?>]
</div>

<?php echo $this->renderPartial('_form_metas', array(
	'model'=>$model,
	'update'=>true,
)); ?>
