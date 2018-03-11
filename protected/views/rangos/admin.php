<h2>Control de Rangos</h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('id'); ?></th>
    <th><?php echo $sort->link('str_descripcion'); ?></th>
	<th>Acciones</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->id,array('show','id'=>$model->id)); ?></td>
    <td><?php echo CHtml::encode($model->str_descripcion); ?></td>
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