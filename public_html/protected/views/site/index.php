<br> </br>
<br> </br>
<?php if (Yii::app()->user->isGuest) $this->redirect(Yii::app()->homeUrl."?r=site/login"); else {?>
<?php $this->pageTitle=Yii::app()->name; ?>
<h1>Bienvenido<?php //echo Yii::app()->user->name; ?></h1>
<br> </br>
<br> </br>
<p>Ud ha ingresado al Sistema de <em><?php echo Yii::app()->name; ?></em>. </p>
<p>Haga click sobre las funcionalidades que tiene en el panel izquierdo para usar la aplicacion. </p>
<br> </br>
<br> </br>
<?php } ?>

