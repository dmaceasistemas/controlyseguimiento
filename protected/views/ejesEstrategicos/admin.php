<h2>Control de Ejes Estrategicos</h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('seq_ideje'); ?></th>
    <th><?php echo $sort->link('str_descripcioneje'); ?></th>
	<th>Acciones</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->seq_ideje,array('show','id'=>$model->seq_ideje)); ?></td>
    <td><?php echo CHtml::encode($model->str_descripcioneje); ?></td>
    <td>
      <?php echo CHtml::link('Actualizar',array('update','id'=>$model->seq_ideje)); ?>
      <?php echo CHtml::linkButton('Eliminar',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->seq_ideje),
      	  'confirm'=>"Esta seguro que desea eliminar el item: #{$model->seq_ideje}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>