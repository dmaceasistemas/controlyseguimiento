<h2>Managing Lugar</h2>

<div class="actionBar">
[<?php echo CHtml::link('Nuevo',array('create')); ?>]
</div>

<table class="dataGrid">
  <thead>
  <tr>
    <th><?php echo $sort->link('codsit'); ?></th>
    <th><?php echo $sort->link('desiti'); ?></th>
	<th>Actions</th>
  </tr>
  </thead>
  <tbody>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->codsit,array('show','id'=>$model->codsit)); ?></td>
    <td><?php echo CHtml::encode($model->desiti); ?></td>
    <td>
      <?php echo CHtml::link('Actualizar',array('update','id'=>$model->codsit)); ?>
      <?php echo CHtml::linkButton('Eliminar',array(
      	  'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->codsit),
      	  'confirm'=>"Desea eliminar el item #{$model->codsit}?")); ?>
	</td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>