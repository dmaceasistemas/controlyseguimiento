<ul>
<?php
/* Yii::app()->mostrarMensaje("Correcto", "Haz Accedido correctamente","ventana_dialogo");*/
$visible = (Yii::app()->user->isGuest) ? "none" : "";
?>
  <div id="accordionResizer" style="padding:0px; width:190px; height:50px;" >
		<div id="accordion" style='display:<?php echo $visible?>;' >
        <script type="text/javascript" >
                $(function(){$("#accordion").accordion({ header: "h3", fillSpace: false,collapsible: true ,autoHeight: false,icons:{
    			header: 'ui-icon-circle-arrow-e',
   				headerSelected: 'ui-icon-circle-arrow-s'}});});
        </script>
            <?php
            if (!Yii::app()->user->isGuest) {
                $criterio = new CDbCriteria;
                $criterio->condition='int_idsistema=4';
                $criterio->order='str_nombre ASC';
                $modulosistemaList= ModuloSistema::model()->with('funcionalidades')->findAll($criterio);
                $prefix="index.php?r=";
                 foreach($modulosistemaList as $n=>$model): ?>
                 <div>
                    <h3><a href="#"><?php echo $model->str_nombre; ?></a></h3>
                    <div align="center">
                    <?php foreach($model->funcionalidades  as $m=>$funcionalidades): ?>
                          <a href="<?php echo $prefix.$funcionalidades->str_comando ?>">
                            <img src="<?php echo $funcionalidades->str_icono?>" width="36" height="36"/>
                          </a>
                          <div align="center"><?php echo $funcionalidades->str_nombre?></div>
                          <br></br>
                    <?php endforeach; ?>
                    </div>
                 </div>
                <?php endforeach; 
            }
                ?>
		</div>
    </ul>
