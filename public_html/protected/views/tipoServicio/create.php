<h2>Nuevo Tipo de Servicio</h2>

<div class="actionBar">
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>