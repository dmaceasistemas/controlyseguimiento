<h2>Control de Unidades de Produccion</h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('codotrsedes'); ?></th>
    <th><?php echo $sort->link('desotrsedes'); ?></th>
    <th><?php echo $sort->link('codsit'); ?></th>
    <th><?php echo $sort->link('codest'); ?></th>

	<th>Acciones</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->codotrsedes,array('show','id'=>$model->codotrsedes)); ?></td>
    <td><?php echo CHtml::encode($model->desotrsedes); ?></td>
        <?php $criteria=new CDbCriteria; ?>
        <?php $criteria->condition='codsit=:sitio';  ?>
        <?php $criteria->params=array(':sitio'=>$model->codsit);  ?>
        <?php $tipo=Lugar::model()->find($criteria);?>
    <td><?php echo CHtml::encode($tipo->desiti); ?></td>
        <?php $criteria=new CDbCriteria; ?>
        <?php $criteria->condition='codest=:estado';  ?>
        <?php $criteria->params=array(':estado'=>$model->codest);  ?>
        <?php $lugar=Estados::model()->find($criteria);?>
    <td><?php echo CHtml::encode($lugar->desest); ?></td>
    <td>
      <?php echo CHtml::link('Actualizar',array('update','id'=>$model->codotrsedes)); ?>
      <?php echo CHtml::linkButton('Eliminar',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->codotrsedes),
      	  'confirm'=>"Desea eliminar el item #{$model->codotrsedes}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>