<h2>Reporte de Labores</h2>
<div class="yiiForm">
    <? if(isset($_POST['Labores']) ){
    $labores->attributes=$_POST['Labores'];    

    if ( $labores->id_servicio!='' ){

    if ( $labores->idEje!='' ){
        $ejeEst=$labores->idEje;
        $criteria= new CDbCriteria;
        $criteria->condition='seq_ideje=:id_eje';
        $criteria->params=array(':id_eje'=>$labores->idEje);
        $ejeEst2=EjesEstrategicos::model()->find($criteria);
        $des_ejeEst=$ejeEst2->str_descripcioneje;
    }else{
        $ejeEst="%";
        $des_ejeEst="Consolidado de Regiones";
    }

    if ( $labores->idSer!='' ){
        $servicio=$labores->idSer;
        $criteria= new CDbCriteria;
        $criteria->condition='id=:id_ser';
        $criteria->params=array(':id_ser'=>$labores->idSer);
        $serv=Category::model()->find($criteria);
        $str_serv=$serv->str_descripcion;
    }else{
        $servicio="%";
        $str_serv="Servicios Mecanizados";
    }

    if ( $labores->strMes!='' ){    
        $mes=$labores->strMes;
    } else {
        $mes="%";    
    }

    ?>
<script type='text/javascript'>
 
window.open('http://172.16.0.16:8080/icaro/seguimiento?reporte=graphic_report&<?php print($labores->id_servicio)
 
    
//window.open('http://localhost:8080/icaro/seguimiento?reporte=<?php print($labores->id_servicio)

    ?>&servicio=<?php print($servicio)
    ?>&ejeEstrategico=<?php print($ejeEst)
    ?>&des_servicio=<?php print($str_serv)
    ?>&des_ejeEst=<?php print($des_ejeEst)
    ?>&mes=<?php print($mes)
?>', false);
</script>
<? }  }?>

        <?php echo CHtml::form(CHtml::normalizeUrl(array('graficos'))); ?>
        <?php echo CHtml::errorSummary($labores); ?>

<table width="80%" border="0" align="center">
  <tr>
    <td width="29%">&nbsp;</td>
    <td width="71%">&nbsp;</td>
  </tr>    
       <tr>
    <td><?php /*$tps=TipoServicio::model()->findAll();  ?>
      <?php $tpss=CHtml::listData($tps,'seq_idtiposervicio','str_descriptiposervicio'); ?>
      <?php echo CHtml::activeLabelEx($labores,'idTps'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'idTps', $tpss, array('empty'=>'Seleccione...')); */?></td>
  </tr>
        <tr>
            <td><?php $criteria= new CDbCriteria;  ?>
                    <?php $criteria->condition='id !=:tipRep AND id !=:tipRep2 AND id !=:tipRep3 AND id !=:tipRep4 AND id !=:tipRep5';  ?>
                            <?php $criteria->params=array(':tipRep'=>'13', ':tipRep2'=>'14',':tipRep3'=>'15',':tipRep4'=>'12',':tipRep5'=>'16');  ?>
                                    <?php $criteria->order='str_descripcion ASC';  ?>
                                            <?php $rep=Reportes::model()->findAll($criteria);  ?>
                                                    <?php $reps=CHtml::listData($rep,'str_nombrereporte','str_descripcion'); ?>
                                                            <?php echo CHtml::activeLabelEx($labores,'Tipo de Reporte   '); ?> </td>
                                                                <td><?php echo CHtml::activeDropDownList($labores,'id_servicio', $reps, array('empty'=>'Seleccione...')); ?></td>
                                                                  </tr>
          <tr>
                    <td colspan="2">&nbsp;</td>
                            </tr>
                                    <tr>
                                              <td colspan="2" bgcolor="#000066"><div align="center"></div></td>
                                                      </tr>
                                                              <tr>
                                                                        <td>&nbsp;</td>
                                                                                  <td>&nbsp;</td>
                                                                                          </tr>
        <tr>
    <td><?php $criteria= new CDbCriteria;  ?>
        <?php $criteria->select='DISTINCT fnc_fecha_letras(dtm_fecha) AS dtm_fecha'; ?>
        <?php //$criteria->condition='int_idtiposervicio=:id_tps';  ?>
        <?php //$criteria->params=array(':id_tps'=>'1');  ?>
        <?php $fecha=Labores::model()->findAll($criteria);  ?>
        <?php $fechas=CHtml::listData($fecha,'dtm_fecha','dtm_fecha'); ?>
        <?php echo CHtml::activeLabelEx($labores,'strMes'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'strMes', $fechas, array('empty'=>'Seleccione...')); ?>  Solo aplica para reporte con (@)</td>
  </tr>
      <tr>
    <td><?php /*$criteria= new CDbCriteria;  ?>
        <?php $criteria->condition='int_idtiposervicio=:id_tps';  ?>
        <?php $criteria->params=array(':id_tps'=>'1'); */ ?>
        <?php $eje=EjesEstrategicos::model()->findAll();//$criteria  ?>
        <?php $ejes=CHtml::listData($eje,'seq_ideje','str_descripcioneje'); ?>
        <?php echo CHtml::activeLabelEx($labores,'idEje'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'idEje', $ejes, array('empty'=>'Seleccione...')); ?>  Solo aplica para reporte con (#,@)</td>
  </tr>   
      <tr>
    <td><?php $criteria= new CDbCriteria;  ?>
        <?php $criteria->condition='int_idtiposervicio=:id_tps';  ?>
        <?php $criteria->params=array(':id_tps'=>'1');  ?>
        <?php $cat=Category::model()->findAll($criteria);  ?>
        <?php $cats=CHtml::listData($cat,'id','str_descripcion'); ?>
        <?php echo CHtml::activeLabelEx($labores,'idSer'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'idSer', $cats, array('empty'=>'Seleccione...')); ?>  Solo aplica para reporte con (*, #)</td>
  </tr>  

      <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><?php echo CHtml::submitButton('Generar reporte ->'); ?></div></td>
    </tr>
</table>
</div><!-- yiiForm -->
