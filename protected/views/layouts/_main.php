<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />-->
<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/form.css" />
<!--- Hoja de Estilo de la Aplicacion -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/demo.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/css_intranet/main.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/css_intranet/print.css" media="print"/>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/css/ccs_intranet/js/common.js"></script>
<!--Activacion del Tema del GUI jui-->
<?php
$this->widget('application.extensions.jui.EJqueryUiInclude', array('theme'=>'south-street'));
?>



<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->
<title><?php echo $this->pageTitle; ?></title>

<!--<link href="../../../css/css_intranet/main.css" rel="stylesheet" type="text/css" />-->
</head>

<body id="tipo-b">
    <div id="encabezado" style="margin: 0 0 25px;padding: 0 0 8px;margin:0px 50px;">
        <div id="nombre-aplicacion"><?php  echo CHtml::encode(Yii::app()->name);//if (!Yii::app()->user->isGuest) echo CHtml::linkButton(CHtml::image('images/intranet_pedrocamejo.png','index'));// echo CHtml::encode(Yii::app()->name); ?></div>
            <ul id="menu-horizontal">
            <?php if (!Yii::app()->user->isGuest) {
                $this->widget('application.components.MainMenu',array('items'=>array(
                    array('label'=>'Inicio', 'url'=>array('/site/index')),
                    array('label'=>'Acceder', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>'Salir', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                    ),));

            } ?>
            <?php
            $datos_usuario = (!Yii::app()->user->isGuest) ? '[Usuario: '.Yii::app()->user->name.']':''; //.', Sede: '.Yii::app()->user->sede
            ?>

		<h6 id="usuario"><?php echo $datos_usuario ?></h6>
		</ul>
</div>

<?php $estilo = (Yii::app()->user->isGuest) ? "position:absolute;top:0;width:100px;border-top: 0px solid #999;padding-bottom: 0px; margin:0;" :"";?>
<div id="envolvente-1">
<div id="bar-lat-izq" style=<?php echo $estilo ?> >
<?php if (!Yii::app()->user->isGuest) $this->widget('application.components.MenuPrincipal',array()); ?>
</div>
<div id="mainmenu">

<?php if (!Yii::app()->user->isGuest) { ?>
<div id="header">
<?php } ?>

</div>
</div>	
    <?php $estilo = (Yii::app()->user->isGuest) ? "position:absolute;top:0;right:0px;width:100%;border-top: 0px solid #999;padding-top: 0px;padding-bottom: 0px; margin: 0px 0px; " : "" ?>
    <div id="bar-centro"  style=<?php echo $estilo?> >
      <div class="caja_dialogo">
         <?php echo $content; ?>

      </div>
</div>
</div>
</body>
<script>
$.ui.dialog.defaults.bgiframe = true;
$(function() {$("#dialog").dialog();});
</script>
</html
