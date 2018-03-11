<h2>Detalle de Servicios <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
[<?php echo CHtml::link('Actualizar',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Eliminar',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('id_categoria')); ?>
</th>
    <td><?php echo CHtml::encode($model->id_categoria); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('str_descripcion')); ?>
</th>
    <td><?php echo CHtml::encode($model->str_descripcion); ?>
</td>
</tr>
</table>
