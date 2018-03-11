<h2>DATOS FILTRADOS :: Control de Labores</h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
[<?php echo CHtml::link('Filtrar Datos',array('filtro')); ?>]
</div>
<div class="actionBar">
<?php /* $this->widget('CDataFilterWidget',array('filters'=>$filters,
       'ajaxMode'=>true, 'updateSelector'=>'#updateData'));*/
?>
</div>
<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('id_servicio'); ?></th>
    <th><?php echo $sort->link('id_rubro'); ?></th>
    <th><?php echo $sort->link('id_sede'); ?></th>
        <?php /*echo $sort->link('dbl_hasfisicas'); ?></th>
        <th><?php echo $sort->link('dbl_haslabor'); ?></th>
        <th><?php echo $sort->link('dbl_kg'); */ ?>
    
    
        <?php /*echo $sort->link('dbl_v_urbanorural'); ?></th>
    <th><?php echo $sort->link('dbl_v_agricola'); ?></th>
    <th><?php echo $sort->link('dbl_movimiento_tierras'); ?></th>
    <th><?php echo $sort->link('dbl_deforestacion'); ?></th>
    <th><?php echo $sort->link('dbl_limpiezacanales'); ?></th>
    <th><?php echo $sort->link('dbl_horas_maquinaria'); */?>
    
    <th><?php echo $sort->link('id_periodo'); ?></th>

	<th>Acciones</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php $criteria= new CDbCriteria;  ?>
        <?php $criteria->condition='id=:id_servicio';  ?>
        <?php $criteria->params=array(':id_servicio'=>$model->id_servicio);  ?>
        <?php $serv=Servicios::model()->find($criteria);?>
        <?php echo CHtml::encode($serv->str_descripcion); ?></td>
    <td><?php $criteria= new CDbCriteria;  ?>
        <?php $criteria->condition='seq_idrubro=:id_rubro';  ?>
        <?php $criteria->params=array(':id_rubro'=>$model->id_rubro);  ?>
        <?php $rubro=RubrosAmpliado::model()->find($criteria);?>
        <?php echo CHtml::encode($rubro->str_descripcion);?></td>
    <td><?php $criteria= new CDbCriteria;  ?>
        <?php $criteria->condition='codubifis=:id_sede';  ?>
        <?php $criteria->params=array(':id_sede'=>$model->id_sede);  ?>
        <?php $seds=Sedes_ampliada::model()->find($criteria);?>
        <?php echo CHtml::encode($seds->desubifis); ?></td>
        <?php /*echo CHtml::encode($model->dbl_hasfisicas); ?></td>
    <td><?php echo CHtml::encode($model->dbl_haslabor); */ ?>
        <?php /*echo CHtml::encode($model->dbl_kg); ?></td>
    
    <td><?php /*echo CHtml::encode($model->dbl_v_urbanorural); ?></td>
    <td><?php echo CHtml::encode($model->dbl_v_agricola); ?></td>
    <td><?php echo CHtml::encode($model->dbl_movimiento_tierras); ?></td>
    <td><?php echo CHtml::encode($model->dbl_deforestacion); ?></td>
    <td><?php echo CHtml::encode($model->dbl_limpiezacanales); ?></td>
    <td><?php echo CHtml::encode($model->dbl_horas_maquinaria); */ ?>
    
    <td><?php $criteria= new CDbCriteria;  ?>
        <?php $criteria->condition='id=:id_periodo';  ?>
        <?php $criteria->params=array(':id_periodo'=>$model->id_periodo);  ?>
        <?php $pers=Periodos::model()->find($criteria);?>
        <?php echo CHtml::encode($pers->str_observaciones); ?></td>

    <td>
      <?php echo CHtml::link('Actualizar',array('update','id'=>$model->id)); ?>
      <?php echo CHtml::linkButton('Eliminar',array(
           'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->id),
      	  'confirm'=>"Esta seguro que desea eliminar el item: #{$model->id}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>