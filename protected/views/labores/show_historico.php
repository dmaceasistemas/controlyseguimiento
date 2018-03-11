<h2>Detalle de Labor Historico <?php echo $model->id; ?></h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create_historico')); ?>]
[<?php echo CHtml::link('Actualizar',array('update_historico','id'=>$model->id)); ?>]
[<?php echo CHtml::linkButton('Eliminar',array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure?')); ?>
]
[<?php echo CHtml::link('Admin',array('historico_admin')); ?>]
</div>

<table class="dataGrid">
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('id_servicio')); ?>
</th>
    <td>
<?php $criteria= new CDbCriteria;  ?>
<?php $criteria->condition='id=:id_servicio';  ?>
<?php $criteria->params=array(':id_servicio'=>$model->id_servicio);  ?>
<?php $serv=Servicios::model()->find($criteria);?>
<?php echo CHtml::encode($serv->str_descripcion); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('id_rubro')); ?>
</th>
    <td>
<?php $criteria= new CDbCriteria;  ?>
<?php $criteria->condition='seq_idrubro=:id_rubro';  ?>
<?php $criteria->params=array(':id_rubro'=>$model->id_rubro);  ?>
<?php $rubs=Rubro::model()->find($criteria);?>
<?php echo CHtml::encode($rubs->str_descripcion); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('id_sede')); ?>
</th>
    <td>
<?php $criteria= new CDbCriteria;  ?>
<?php $criteria->condition='codubifis=:id_sede';  ?>
<?php $criteria->params=array(':id_sede'=>$model->id_sede);  ?>
<?php $seds=Sedes_ampliada::model()->find($criteria);?>
<?php echo CHtml::encode($seds->desubifis); ?>

</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('id_tipoproductor')); ?>
</th>
    <td>
<?php $criteria= new CDbCriteria;  ?>
<?php $criteria->condition='id=:id_tipoproductor';  ?>
<?php $criteria->params=array(':id_tipoproductor'=>$model->id_tipoproductor);  ?>
<?php $prods=Productor::model()->find($criteria);?>
<?php echo CHtml::encode($prods->str_descripcion); ?>

</td>
</tr>

<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('id_rangohas')); ?>
</th>
    <td>
<?php $criteria= new CDbCriteria;  ?>
<?php $criteria->condition='id=:id_rangohas';  ?>
<?php $criteria->params=array(':id_rangohas'=>$model->id_rangohas);  ?>
<?php $rangs=Rangos::model()->find($criteria);?>
<?php echo CHtml::encode($rangs->str_descripcion); ?>

</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dbl_hasfisicas')); ?>
</th>
    <td><?php echo CHtml::encode($model->dbl_hasfisicas); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dbl_haslabor')); ?>
</th>
    <td><?php echo CHtml::encode($model->dbl_haslabor); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('int_prodatendidos')); ?>
</th>
    <td><?php echo CHtml::encode($model->int_prodatendidos); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dtm_fecha')); ?>
</th>
    <td><?php echo CHtml::encode($model->dtm_fecha); ?>
</td>
</tr>
<!--
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dbl_kg')); ?>
</th>
    <td><?php echo CHtml::encode($model->dbl_kg); ?>
</td>
</tr>


<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dbl_v_urbanorural')); ?>
</th>
    <td><?php echo CHtml::encode($model->dbl_v_urbanorural); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dbl_v_agricola')); ?>
</th>
    <td><?php echo CHtml::encode($model->dbl_v_agricola); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dbl_movimiento_tierras')); ?>
</th>
    <td><?php echo CHtml::encode($model->dbl_movimiento_tierras); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dbl_deforestacion')); ?>
</th>
    <td><?php echo CHtml::encode($model->dbl_deforestacion); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dbl_limpiezacanales')); ?>
</th>
    <td><?php echo CHtml::encode($model->dbl_limpiezacanales); ?>
</td>
</tr>
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('dbl_horas_maquinaria')); ?>
</th>
    <td><?php echo CHtml::encode($model->dbl_horas_maquinaria); ?>
</td>
</tr>







<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('id_periodo')); ?>
</th>
    <td>
<?php $criteria= new CDbCriteria;  ?>
<?php $criteria->condition='id=:id_periodo';  ?>
<?php $criteria->params=array(':id_periodo'=>$model->id_periodo);  ?>
<?php $pers=Periodos::model()->find($criteria);?>
<?php echo CHtml::encode($pers->str_observaciones); ?>

</td>
</tr>

-->
<tr>
	<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('str_observaciones')); ?>
</th>
    <td><?php echo CHtml::encode($model->str_observaciones); ?>
</td>
</tr>
</table>
