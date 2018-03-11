<h2>Detalle de Periodo <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
[<?php echo CHtml::link('Actualizar',array('update','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Eliminar',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dtm_fechadesde')); ?>
</th>
    <td><?php echo CHtml::encode($model->dtm_fechadesde); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dtm_fechahasta')); ?>
</th>
    <td><?php echo CHtml::encode($model->dtm_fechahasta); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('str_observaciones')); ?>
</th>
    <td><?php echo CHtml::encode($model->str_observaciones); ?>
</td>
</tr>
</table>
