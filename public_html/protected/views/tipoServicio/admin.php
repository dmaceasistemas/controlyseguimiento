<h2>Control de Tipo de Servicio</h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('seq_idtiposervicio'); ?></th>
    <th><?php echo $sort->link('str_descriptiposervicio'); ?></th>
	<th>Acciones</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->seq_idtiposervicio,array('show','id'=>$model->seq_idtiposervicio)); ?></td>
    <td><?php echo CHtml::encode($model->str_descriptiposervicio); ?></td>
    <td>
      <?php echo CHtml::link('Actualizar',array('update','id'=>$model->seq_idtiposervicio)); ?>
      <?php echo CHtml::linkButton('Eliminar',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->seq_idtiposervicio),
      	  'confirm'=>"Esta seguro que desea eliminar el item: #{$model->seq_idtiposervicio}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>