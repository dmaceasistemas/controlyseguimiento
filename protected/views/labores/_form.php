<div class="yiiForm">

<p>
Campos con <span class="required">*</span> son requeridos.
</p>

<div align="right"><?php echo CHtml::beginForm(); ?>
</div>
 <td colspan="3" align="left" valign="middle"><?php echo CHtml::errorSummary($model); ?></td>
<div class="simple">
  <p>&nbsp;</p>
  <table width="85%" border="0" align="center">
    <tr>
      <td align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'dtm_fecha'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dtm_fecha',array("id"=>"date")); ?>(el calendario aparece al hacer click en él.)</td>
      <?php $this->widget('application.extensions.calendar.SCalendar',
        array(
        'inputField'=>'date',
        //'skin'=>$skin,
        //'stylesheet'=>$style,
        'ifFormat'=>'%Y-%m-%d',
    ));
    ?>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php $per=Periodos::model()->findAll();  ?>
        <?php $pers=CHtml::listData($per,'id','str_observaciones'); ?>
        <?php echo CHtml::activeLabelEx($model,'id_periodo'); ?></td>
      <td><?php echo CHtml::activeDropDownList($model,'id_periodo', $pers, array('empty'=>'Seleccione...')); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php $sed=Sedes_ampliada::model()->findAll();  ?>
        <?php $seds=CHtml::listData($sed,'codubifis','desubifis'); ?>
        <?php echo CHtml::activeLabelEx($model,'id_sede'); ?></td>
      <td><?php echo CHtml::activeDropDownList($model,'id_sede', $seds, array('empty'=>'Seleccione...')); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php $serv=Servicios::model()->findAll();  ?>
        <?php $servs=CHtml::listData($serv,'id','str_descripcion'); ?>
        <?php echo CHtml::activeLabelEx($model,'id_servicio'); ?></td>
      <td><?php echo CHtml::activeDropDownList($model,'id_servicio', $servs, array('empty'=>'Seleccione...')); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle">        
        <?php $rub=RubrosAmpliado::model()->findAll();  ?>
        <?php $rubs=CHtml::listData($rub,'seq_idrubro', CHtml::encode('str_descripcion')); ?>
        <?php echo CHtml::activeLabelEx($model,'id_rubro'); ?></td>
      <td width="287"><?php echo CHtml::activeDropDownList($model,'id_rubro', $rubs, array('empty'=>'Seleccione...')); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php $tiprod=Productor::model()->findAll();  ?>
        <?php $tiprods=CHtml::listData($tiprod,'id','str_descripcion'); ?>
        <?php echo CHtml::activeLabelEx($model,'id_tipoproductor'); ?></td>
      <td><?php echo CHtml::activeDropDownList($model,'id_tipoproductor', $tiprods, array('empty'=>'Seleccione...')); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php $rango=Rangos::model()->findAll();  ?>
        <?php $rangos=CHtml::listData($rango,'id','str_descripcion'); ?>
        <?php echo CHtml::activeLabelEx($model,'id_rangohas'); ?></td>
      <td><?php echo CHtml::activeDropDownList($model,'id_rangohas', $rangos, array('empty'=>'Seleccione...')); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'dbl_hasfisicas'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dbl_hasfisicas',array('size'=>12,'maxlength'=>12)); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'dbl_haslabor'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dbl_haslabor',array('size'=>12,'maxlength'=>12)); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'int_prodatendidos'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'int_prodatendidos'); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'dbl_kg'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dbl_kg',array('size'=>12,'maxlength'=>12)); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'dbl_v_urbanorural'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dbl_v_urbanorural',array('size'=>12,'maxlength'=>12)); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'dbl_v_agricola'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dbl_v_agricola',array('size'=>12,'maxlength'=>12)); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>  
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'dbl_movimiento_tierras'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dbl_movimiento_tierras',array('size'=>12,'maxlength'=>12)); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr> 
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'dbl_deforestacion'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dbl_deforestacion',array('size'=>12,'maxlength'=>12)); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr> 
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'dbl_limpiezacanales'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dbl_limpiezacanales',array('size'=>12,'maxlength'=>12)); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr> 
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'dbl_horas_maquinaria'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'dbl_horas_maquinaria',array('size'=>12,'maxlength'=>12)); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>     
    <tr>
      <td width="285" align="left" valign="middle"><?php echo CHtml::activeLabelEx($model,'str_observaciones'); ?></td>
      <td><?php echo CHtml::activeTextField($model,'str_observaciones',array('size'=>60,'maxlength'=>100)); ?></td>
      <td width="77" align="left" valign="middle">&nbsp;</td>
    </tr>
    <tr>
      </tr>
  </table>
</div>
<div class="action">
  <div align="center"><?php echo CHtml::submitButton($update ? 'Save' : 'Guardar'); ?>
  </div>
</div>

<?php echo CHtml::endForm(); ?>

</div><!-- yiiForm -->
