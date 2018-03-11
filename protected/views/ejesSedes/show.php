<h2>Detalle de Eje Estrategico x Sede<?php echo $model->seq_idejesede; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
[<?php echo CHtml::link('Actualizar',array('update','id'=>$model->seq_idejesede)); ?>]
[<?php echo CHtml::linkButton('Eliminar',array('submit'=>array('delete','id'=>$model->seq_idejesede),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('int_ideje')); ?>
</th>
    <td><?php $criteria= new CDbCriteria;  ?>
        <?php $criteria->condition='seq_ideje=:id_eje';  ?>
        <?php $criteria->params=array(':id_eje'=>$model->int_ideje);?>
        <?php $eje=EjesEstrategicos::model()->find($criteria);?>
        <?php echo CHtml::encode($eje->str_descripcioneje); ?>
</td>
</tr><tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('int_idsede')); ?>
</th>
    <td><?php $criteria= new CDbCriteria;  ?>
        <?php $criteria->condition='codubifis=:id_sede';  ?>
        <?php $criteria->params=array(':id_sede'=>$model->int_idsede);?>
        <?php $sed=Sedes::model()->find($criteria);?>
  
</td>
</tr>

</table>
