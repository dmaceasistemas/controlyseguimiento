<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.
</p>

<p><?php echo CHtml::beginForm(); ?>
  
    <?php echo CHtml::errorSummary($model); ?></p>
<table width="100%" border="0">
  <tr>
    <td width="25%"><span class="simple"><?php echo CHtml::activeLabelEx($model,'desotrsedes'); ?></span></td>
    <td width="75%"><span class="simple"><?php echo CHtml::activeTextField($model,'desotrsedes',array('size'=>60,'maxlength'=>100)); ?></span></td>
  </tr>
  <tr>
    <td><span class="simple"><?php echo CHtml::activeLabelEx($model,'codest'); ?></span></td
                            
    <td><span class="simple"><?php $lugares=Estados::model()->findAll();?>
                             <?php foreach($lugares as $n=>$mod): ?>
                             <?php $datos[$mod->codest]=$mod->desest; ?>
                             <?php endforeach; ?>
                             <?php echo CHtml::activeDropDownList($model,'codest', $datos, array('empty'=>'Seleccione...')); ?>
                             </span></td>
  </tr>
  <tr>
    <td><span class="simple"><?php echo CHtml::activeLabelEx($model,'codsit'); ?></span></td>
    <td><span class="simple"><?php $criteria=new CDbCriteria; ?>
                             <?php $criteria->condition='codsit!=:sitio';  ?>
                             <?php $criteria->params=array(':sitio'=>'001');  ?>
                             <?php $tipos=Lugar::model()->findAll($criteria);?>
                             <?php foreach($tipos as $n=>$mod): ?>
                             <?php $datos2[$mod->codsit]=$mod->desiti; ?>
                             <?php endforeach; ?>
                             <?php echo CHtml::activeDropDownList($model,'codsit', $datos2, array('empty'=>'Seleccione...')); ?>
                             </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><span class="action"><?php echo CHtml::submitButton($update ? 'Guardar' : 'Crear'); ?></span></td>
    </tr>
</table>
<div class="simple"></div>
<div class="simple"></div>

<div class="action"></div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->
