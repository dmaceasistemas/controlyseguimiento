<h2>Detalle Unidad de Produccion <?php echo $model->codotrsedes; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
[<?php echo CHtml::link('Actualizar',array('update','id'=>$model->codotrsedes)); ?>]
[<?php echo CHtml::linkButton('Eliminar',array('submit'=>array('delete','id'=>$model->codotrsedes),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Admin',array('admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('desotrsedes')); ?>
</th>
    <td><?php echo CHtml::encode($model->desotrsedes); ?>
</td>
</tr>
<tr>
	<th class="label">
        <?php $criteria=new CDbCriteria; ?>
        <?php $criteria->condition='codest=:estado';  ?>
        <?php $criteria->params=array(':estado'=>$model->codest);  ?>
        <?php $lugar=Estados::model()->find($criteria);?>
        <?php echo CHtml::encode($model->getAttributeLabel('codest')); ?>
</th>
    <td><?php echo CHtml::encode($lugar->desest); ?>
</td>
</tr>
<tr>
	<th class="label">
        <?php $criteria=new CDbCriteria; ?>
        <?php $criteria->condition='codsit=:sitio';  ?>
        <?php $criteria->params=array(':sitio'=>$model->codsit);  ?>
        <?php $tipo=Lugar::model()->find($criteria);?>
        <?php echo CHtml::encode($model->getAttributeLabel('codsit')); ?>
</th>
    <td><?php echo CHtml::encode($tipo->desiti); ?>
</td>
</tr>
</table>
