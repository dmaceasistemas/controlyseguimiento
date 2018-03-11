<h2>Actualizar Productor<?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>