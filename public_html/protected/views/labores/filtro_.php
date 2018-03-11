<style type="text/css">
<!--
.style3 {font-size: 9px; color: #FF0000; }
-->
</style>
<h2>Filtro para Labores</h2>
<div class="actionBar">
[<?php echo CHtml::link('Regresar',array('admin')); ?>]
</div>
<div class="yiiForm">
        <?php echo CHtml::form(CHtml::normalizeUrl(array('admin_1'))); ?>
        <?php echo CHtml::errorSummary($labores); ?>
<table width="70%" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
  </tr>
  <tr>
    <td width="15%"><?php /*$per=Periodos::model()->findAll();  ?>
    <?php $pers=CHtml::listData($per,'id','str_observaciones'); ?>
    <?php echo CHtml::activeLabelEx($labores,'id_periodo'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'id_periodo', $pers, array('empty'=>'Seleccione...')); */?></td>

    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
  </tr> 
  <tr>
    <td><?php $sed=Sedes_ampliada::model()->findAll();  ?>
      <?php $seds=CHtml::listData($sed,'codubifis','desubifis'); ?>
      <?php echo CHtml::activeLabelEx($labores,'id_sede'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'id_sede', $seds, array('empty'=>'Seleccione...')); ?></td>
  </tr>
  <tr>
    <td><?php $serv=Servicios::model()->findAll();  ?>
      <?php $servs=CHtml::listData($serv,'id','str_descripcion'); ?>
      <?php echo CHtml::activeLabelEx($labores,'id_servicio'); ?> </td>
    <td><?php echo CHtml::activeDropDownList($labores,'id_servicio', $servs, array('empty'=>'Seleccione...')); ?></td>
  </tr>
  <tr>
    <td><?php $rub=RubrosAmpliado::model()->findAll();  ?>
      <?php $rubs=CHtml::listData($rub,'seq_idrubro','str_descripcion'); ?>
      <?php echo CHtml::activeLabelEx($labores,'id_rubro'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'id_rubro', $rubs, array('empty'=>'Seleccione...')); ?></td>
  </tr>
  <tr>
    <td><?php $tiprod=Productor::model()->findAll();  ?>
      <?php $tiprods=CHtml::listData($tiprod,'id','str_descripcion'); ?>
      <?php echo CHtml::activeLabelEx($labores,'id_tipoproductor'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'id_tipoproductor', $tiprods, array('empty'=>'Seleccione...')); ?></td>
  </tr>
  <tr>
    <td><?php $rango=Rangos::model()->findAll();  ?>
      <?php $rangos=CHtml::listData($rango,'id','str_descripcion'); ?>
      <?php echo CHtml::activeLabelEx($labores,'id_rangohas'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'id_rangohas', $rangos, array('empty'=>'Seleccione...')); ?></td>
  </tr>
  
      <tr>
      <td align="left" valign="middle"><?php echo CHtml::activeLabelEx($labores,'Desde'); ?></td>
      <td><?php echo CHtml::activeTextField($labores,'dtm_fecha',array("id"=>"date")); ?><span class="style3">(el calendario aparece al hacer click en él.)</span></td>
      <?php $this->widget('application.extensions.calendar.SCalendar',
        array(
        'inputField'=>'date',
        //'skin'=>$skin,
        //'stylesheet'=>$style,
        'ifFormat'=>'%Y-%m-%d',
    ));
    ?>
      </tr>
    <tr>
      <td align="left" valign="middle"><?php echo CHtml::activeLabelEx($labores,'Hasta'); ?></td>
      <td><?php echo CHtml::activeTextField($labores,'str_observaciones',array("id"=>"date1")); ?><span class="style3">(el calendario aparece al hacer click en él.)</span></td>
      <?php $this->widget('application.extensions.calendar.SCalendar',
        array(
        'inputField'=>'date1',
        //'skin'=>$skin,
        //'stylesheet'=>$style,
        'ifFormat'=>'%Y-%m-%d',
    ));
    ?>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><div align="center"><?php echo CHtml::submitButton('Buscar'); ?></div></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div><!-- yiiForm -->