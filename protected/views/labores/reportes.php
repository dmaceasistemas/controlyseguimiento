<style type="text/css">
<!--
.style3 {font-size: 9px; color: #FF0000; }
-->
</style>
<h2>Reporte de Labores</h2>
<div class="yiiForm">
    <? if(isset($_POST['Labores'])){
            $labores->attributes=$_POST['Labores'];
            //$reporte=$labores->idRep;
        if ( $labores->idRep!='' ){
            if ($labores->idTipoServ !=""){
                $tipoServ=$labores->idTipoServ; 
               }else {
                $tipoServ="%";    
               }
                
            if ($labores->id_sede !=""){
                $sede=$labores->id_sede; 
               }else {
                $sede="%";    
               }
            if ($labores->id_servicio !=""){
                $servicio=$labores->id_servicio;
               }else {
                $servicio="%";    
               }
           if ($labores->id_rubro !=""){
                $rubro=$labores->id_rubro;
               }else {
                $rubro="%";    
               }
            if ($labores->id_tipoproductor !=""){
                $tipoproductor=$labores->id_tipoproductor;
               }else {
                $tipoproductor="%";    
               }
            if ($labores->id_rangohas !=""){
                $rangohas=$labores->id_rangohas;
               }else {
                $rangohas="%";    
               }
            if ($labores->idEje !=""){
                $eje=$labores->idEje;
               }else {
                $eje="%";    
               }
            if ($labores->idLgr !=""){
                $lugar=$labores->idLgr;
               }else {
                $lugar="%";    
               }               
            if ($labores->dtm_fecha !=""){
                $fecha1=$labores->dtm_fecha;
                } else { $fecha1= "2000-01-01";
                }
            if ($labores->str_observaciones !=""){
                $fecha2=$labores->str_observaciones;
                } else { $fecha2=CTimestamp::formatDate('Y-m-d');
                }   
        
            //print("Este es el eje: ".$labores->idRep);
    ?>
<script type='text/javascript'>

window.open('http://172.16.0.16:8080/icaro/seguimiento?reporte=<?print($labores->idRep)?>&sede=<?print($sede)?>&servicio=<?print($servicio)?>&rubro=<?print($rubro)?>&tipoproductor=<?print($tipoproductor)?>&eje=<?print($eje)?>&rangohas=<?print($rangohas)?>&sitio=<?print($lugar)?>&fecha1=<?print($fecha1)?>&fecha2=<?print($fecha2)?>&tipoServ=<?print($tipoServ)?>', false);

</script>
<?    /* ?>
<script type='text/javascript'>
    window.open('http://localhost:8080/icaro/seguimiento?reporte=reportxparams&<?print($labores->idRep)?>&sede=<?print($sede)?>&servicio=<?print($servicio)?>&rubro=<?print($rubro)?>&tipoproductor=<?print($tipoproductor)?>&eje=<?print($eje)?>&rangohas=<?print($rangohas)?>&sitio=<?print($lugar)?>&fecha1=<?print($fecha1)?>&fecha2=<?print($fecha2)?>&tipoServ=<?print($tipoServ)?>', false);
window.open('http://localhost:8080/icaro/seguimiento?reporte=<?print($labores->idRep)?>&sede=<?
print($sede)?>&servicio=<?
print($servicio)?>&rubro=<?
print($rubro)?>&tipoproductor=<?
print($tipoproductor)?>&eje=<?
print($eje)?>&rangohas=<?
print($rangohas)?>&sitio=<?
print($lugar)?>&fecha1=<?
print($fecha1)?>&fecha2=<?
print($fecha2)?>', false);
</script>
window.open('http://172.16.0.250/icaro_reporter/web/seguimiento/<?print($labores->idRep)?>?sede=<?print($sede)?>&servicio=<?print($servicio)?>&rubro=<?print($rubro)?>&tipoproductor=<?print($tipoproductor)?>&eje=<?print($eje)?>&rangohas=<?print($rangohas)?>&sitio=<?print($lugar)?>&fecha1=<?print($fecha1)?>&fecha2=<?print($fecha2)?>&tipoServ=<?print($tipoServ)?>', false);
<?*/ } 
        } ?>
        <?php echo CHtml::form(CHtml::normalizeUrl(array('reportes'))); ?>
        <?php echo CHtml::errorSummary($labores); ?>
<table width="75%" border="0" align="center">
  <tr>
    <td>&nbsp;</td>
    <td width="12%">&nbsp;</td>
  </tr>
  <tr>
    <td width="15%"><?php /*$per=Periodos::model()->findAll();  ?>
    <?php $pers=CHtml::listData($per,'id','str_observaciones'); ?>
    <?php echo CHtml::activeLabelEx($labores,'id_periodo'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'id_periodo', $pers, array('empty'=>'Seleccione...')); */?></td>
  </tr>
    <tr>
      <td><?php $criteria= new CDbCriteria;  ?>
          <?php $criteria->condition='tipo =:tipo';//Rep OR id =:tipRep2 OR id =:tipRep3 OR id =:tipRep4 OR id =:tipRep5'  ?>
          <?php $criteria->params=array(':tipo'=>'0'); //Rep'=>'13',':tipRep2'=>'14', ':tipRep3'=>'15',':tipRep4'=>'12',':tipRep5'=>'16' ?>
          <?php $criteria->order='str_descripcion DESC';  ?>
          <?php $rep=Reportes::model()->findAll($criteria);  ?>
          <?php $reps=CHtml::listData($rep,'str_nombrereporte','str_descripcion'); ?>
          <?php echo CHtml::activeLabelEx($labores,'Tipo de Reporte   '); ?> </td>
      <td><?php echo CHtml::activeDropDownList($labores,'idRep', $reps, array('empty'=>'Seleccione...')); ?></td>
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
      <td><?php $tipoServs=TipoServicio::model()->findAll();  ?>
             <?php $tipoServ=CHtml::listData($tipoServs,'seq_idtiposervicio','str_descriptiposervicio'); ?>
             <?php echo CHtml::activeLabelEx($labores,'idTipoServ'); ?></td>
      <td><?php echo CHtml::activeDropDownList($labores,'idTipoServ', $tipoServ, array('empty'=>'Seleccione...')); ?></td>
    </tr>
    <tr>
    <td><?php $eje=EjesEstrategicos::model()->findAll();  ?>
      <?php $ejes=CHtml::listData($eje,'seq_ideje','str_descripcioneje'); ?>
      <?php echo CHtml::activeLabelEx($labores,'idEje'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'idEje', $ejes, array('empty'=>'Seleccione...')); ?></td>
  </tr>
    <tr>
    <td><?php $lgr=Lugar::model()->findAll();  ?>
      <?php $lgrs=CHtml::listData($lgr,'codsit','desiti'); ?>
      <?php echo CHtml::activeLabelEx($labores,'idLgr'); ?></td>
    <td><?php echo CHtml::activeDropDownList($labores,'idLgr', $lgrs, array('empty'=>'Seleccione...')); ?></td>
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
