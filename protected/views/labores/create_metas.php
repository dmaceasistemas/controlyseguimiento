<h2>Metas por Sedes</h2>

<div class="actionBar">
[<?php echo CHtml::link('Admin',array('admin_metas')); ?>]
</div>

<?php echo $this->renderPartial('_form_metas', array(
	'model'=>$model,
	'update'=>false,
)); ?>
