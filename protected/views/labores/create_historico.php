<h2>Nueva Labor Historica 2007-2008-2009</h2>

<div class="actionBar">
[<?php echo CHtml::link('Admin',array('historico_admin')); ?>]
</div>

<?php echo $this->renderPartial('_form_historico', array(
	'model'=>$model,
	'update'=>false,
)); ?>
