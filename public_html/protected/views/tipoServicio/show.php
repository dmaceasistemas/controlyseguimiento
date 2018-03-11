<h2>Detalle de Tipo de Servicio<?php echo $model->seq_idtiposervicio; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
[<?php echo CHtml::link('Actualizar',array('update','id'=>$model->seq_idtiposervicio)); ?>]
[<?php echo CHtml::linkButton('Eliminar',array('submit'=>array('delete','id'=>$model->seq_idtiposervicio),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('str_descriptiposervicio')); ?>
</th>
    <td><?php echo CHtml::encode($model->str_descriptiposervicio); ?>
</td>
</tr>
</table>
