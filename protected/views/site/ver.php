<style type="text/css">
<!--
.style1 {font-size: 10px}
-->
</style>
<div class="contene" id="contene">
<?php 
  $cedula=$_GET['cedula'];
  $nombre=$_GET['nombre'];
  $apellido=$_GET['apellido'];
  $sede=$_GET['sede'];  
  $documento=$_GET['documento'];
  $fecha_documento =$_GET['fecha_documento'];
  $fecha_ingreso =$_GET['fecha_ingreso'];
  $cargo =$_GET['cargo'];
  $sueldo =$_GET['sueldo'];
  if ($cedula!="" || $nombre="" || $apellido="" || $sede="" || $documento="" || $fecha_documento="" || $fecha_ingreso="" || $cargo="" || $sueldo=""){ ?>
<div class="grupo">
<table width="107" height="15%" border="0" align="center" class='table2'>
    <tr align="left">
        <th width="180" class="style1 label"><em><strong>Fecha de Emision</strong></em></th>
      </tr>

    <tr align="left">
      <th class="label style1"><strong><?php echo strftime("%d-%m-%Y", strtotime($fecha_documento)); ?></strong></th>
      </tr>
    <tr align="left">
        <th width="180" class="style1 label"><em>Cedula</em></th>
      </tr>

    <tr align="left">
      <th class="label style1"><?php echo CHtml::encode($cedula); ?></th>
      </tr>
    <tr align="left">
        <th width="180" class="style1 label"><em>Apellidos</em></th>
    </tr>

    <tr align="left">
      <th class="label style1"><?php echo CHtml::encode($apellido); ?></th>
      </tr>
    <tr align="left">
        <th width="180" class="style1 label"><em>Nombres</em></th>
    </tr>   

    <tr align="left">
      <th class="label style1"><?php echo CHtml::encode($nombre); ?></th>
      </tr>
    <tr align="left">
        <th width="180" class="style1 label"><em>Fecha de Ingreso</em></th>
    </tr>

    <tr align="left">
      <th class="label style1"><?php echo strftime("%d-%m-%Y", strtotime($fecha_ingreso)); ?></th>
      </tr>
    <tr align="left">
        <th width="180" class="style1 label"><em>Cargo</em></th>
    </tr>

    <tr align="left">
      <th class="label style1"><?php echo CHtml::encode($cargo); ?></th>
      </tr>
    <tr align="left">
        <th width="180" class="style1 label"><em>Sede</em></th>
    </tr>

    <tr align="left">
      <th class="label style1"><?php echo CHtml::encode($sede); ?></th>
      </tr>
    <tr align="left">
      <th class="style1 label"><em>Sueldo</em></th>
      </tr>
    <tr align="left">
      <th class="label style1"><?php echo CHtml::encode($sueldo); ?></th>
    </tr>
    <tr align="left">
       <th  class="label style1"><div align="center"><?php echo CHtml::Button('Listo', array ('submit' => Yii::app()->request->baseUrl . '/index.php?r=site/validar'));  ?></div></th>
    </tr>
</table>
</div>
<?php } else {?>
<div class="grupo" align="center">
    <h1 align="center" style="font-size:90%;">DOCUMENTO NO ENCONTRADO <?php echo $cedula ?> </h1>
    <br>No se ha encontrado ningun documento relacionado con los datos indicados.</br>
    <p><br>Si introdujo los datos correctamente y esta viendo este mensaje, es posible que el documento haya expirado.</br></p></div>
  	<div align="center"><?php echo CHtml::Button('Listo', array ('submit' => Yii::app()->request->baseUrl . '/index.php?r=site/validar'));  ?></div>
    <?php } ?>
</div>