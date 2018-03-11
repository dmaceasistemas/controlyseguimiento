<ul>
<?php
$visible = (Yii::app()->user->isGuest) ? "none" : "";
?>
<?php
      try{
       $criterio = new CDbCriteria;
       $criterio->condition='int_idsistema=4 and tipousuario=true and int_idgrupo= '. Yii::app()->user->id;       
       $criterio->order='seq_idmodulo ASC';

       $modulosistemaList= PermisosUsuarios::model()->findAll($criterio);
       //print 'Long '.sizeof($modulosistemaList);
        
        
  ?>
  <div id="accordionResizer" style="padding:5px; width:190px; height:450px; display:<?php echo $visible?>;"  class ="menuprincipal">
		
        <div id="accordion" style='display:<?php echo $visible?>;'>
        <script type="text/javascript" class ="menuprincipal">
           $(function(){$("#accordion").accordion({header: "h3", navigation: true, fillSpace: false,collapsible: true ,autoHeight: false,icons: {header: "ui-icon-circle-arrow-e",headerSelected: "ui-icon-circle-arrow-s"
			}});});
        </script>
            <?php            
            $prefix="index.php?r=";
              foreach($modulosistemaList as $n=>$model):
              $criteria = new CDbCriteria;
                $criteria->condition= 'int_idsistema=4 and tipousuario=true and int_idgrupo= '. Yii::app()->user->id.' and seq_idmodulo= '.$model->seq_idmodulo;
       //echo  $criteria->condition;
                $funcionalidades = Funcionalidad::model()->findAll($criteria);
                 
              ?>

                <h3><a href="#"><?php echo $model->nommod; ?></a></h3>
                <div>
                <div id="mainmenu" align="center">
                
                <?php 
                
                foreach($funcionalidades  as $z=>$funcionalidad):                

                ?>
                      <a href="<?php echo $prefix.$funcionalidad->str_comando ?>">
                        <img src="<?php echo $funcionalidad->str_icono?>" BORDER=0 ALT=""/>
                      </a>                      
                 <br></br>
                 <div align="center" style="font-size:11px; font-weight: bold"> <?php echo $funcionalidad->str_nombre ?> </div>
                 <br></br>
                <?php endforeach; ?>
                </div>
                </div>

               <!-- div><a ></a></div>-->
             
            <?php endforeach; } catch(CException $e){ }?>

        <?php
        
        if (sizeof($modulosistemaList)==0) Yii::app()->user->logout();
        ?>

		</div>
        </div>
    </ul>
