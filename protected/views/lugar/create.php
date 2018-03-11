<h2>New Lugar</h2>

<div class="actionBar">
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<?php echo $this->renderPartial('_form', array(
	'model'=>$model,
	'update'=>false,
)); ?>