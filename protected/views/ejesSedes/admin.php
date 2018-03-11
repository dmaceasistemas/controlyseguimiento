<h2>Control de Eje Estrategico x Sede</h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('seq_idejesede'); ?></th>
    <th><?php echo $sort->link('int_idsede'); ?></th>
    <th><?php echo $sort->link('int_ideje'); ?></th>
	<th>Acciones</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->seq_idejesede,array('show','id'=>$model->seq_idejesede)); ?></td>
    <td><?php $criteria= new CDbCriteria;  ?>
        <?php $criteria->condition='codubifis=:id_sede';  ?>
        <?php $criteria->params=array(':id_sede'=>$model->int_idsede);?>
        <?php $sed=Sedes_ampliada::model()->find($criteria);?>
        <?php echo CHtml::encode($sed->desubifis); ?></td>
        
    <td><?php $criteria= new CDbCriteria;  ?>
        <?php $criteria->condition='seq_ideje=:id_eje';  ?>
        <?php $criteria->params=array(':id_eje'=>$model->int_ideje);?>
        <?php $eje=EjesEstrategicos::model()->find($criteria);?>
        <?php echo CHtml::encode($eje->str_descripcioneje); ?></td>
    
    <td>
      <?php echo CHtml::link('Actualizar',array('update','id'=>$model->seq_idejesede)); ?>
      <?php echo CHtml::linkButton('Eliminar',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->seq_idejesede),
      	  'confirm'=>"Esta seguro que desea eliminar el item: #{$model->seq_idejesede}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>
