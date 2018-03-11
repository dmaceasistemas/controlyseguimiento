<h2>View EjesEstrategicos <?php echo $model->seq_ideje; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
[<?php echo CHtml::link('Actualizar',array('update','id'=>$model->seq_ideje)); ?>]
[<?php echo CHtml::linkButton('Eliminar',array('submit'=>array('delete','id'=>$model->seq_ideje),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('str_descripcioneje')); ?>
</th>
    <td><?php echo CHtml::encode($model->str_descripcioneje); ?>
</td>
</tr>
</table>
