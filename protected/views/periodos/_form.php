<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.
</p>

<?php echo CHtml::beginForm(); ?>

<?php echo CHtml::errorSummary($model); ?>

<div class="simple">
  <table width="100%" border="0">
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'dtm_fechadesde'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dtm_fechadesde',array("id"=>"date1")); ?>(el calendario aparece al hacer click en él.)
        <?php $this->widget('application.extensions.calendar.SCalendar',
        array(
        'inputField'=>'date1',
        //'skin'=>$skin,
        //'stylesheet'=>$style,
        'ifFormat'=>'%Y-%m-%d',
    ));
    ?></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'dtm_fechahasta'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dtm_fechahasta',array("id"=>"date2")); ?>(el calendario aparece al hacer click en él.)
      <?php $this->widget('application.extensions.calendar.SCalendar',
        array(
        'inputField'=>'date2',
        //'skin'=>$skin,
        //'stylesheet'=>$style,
        'ifFormat'=>'%Y-%m-%d',
    ));
    ?></td>
    </tr>
    <tr>
      <td><?php echo CHtml::activeLabelEx($model,'str_observaciones'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'str_observaciones',array('size'=>60,'maxlength'=>100)); ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><div align="center"><span class="action"><?php echo CHtml::submitButton($update ? 'Guardar' : 'Crear'); ?></span></div></td>
      </tr>
  </table>
  </div>
<div class="simple"></div>
<div class="simple"></div>

<div class="action"></div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->