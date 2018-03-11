<h2>Actualizar Eje Estrategico x Sede<?php echo $model->seq_idejesede; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>true,
)); ?>