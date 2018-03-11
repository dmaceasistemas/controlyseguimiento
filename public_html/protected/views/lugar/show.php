<h2>View Lugar <?php echo $model->codsit; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
[<?php echo CHtml::link('Actualizar',array('update','id'=>$model->codsit)); ?>]
[<?php echo CHtml::linkButton('Eliminar',array('submit'=>array('delete','id'=>$model->codsit),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('desiti')); ?>
</th>
    <td><?php echo CHtml::encode($model->desiti); ?>
</td>
</tr>
</table>
