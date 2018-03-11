<?php
class MenuPrincipal extends CWidget{
    public function run() {
        if (!Yii::app()->user->cambiar_clave)
        $this->render('dibujaMenu');
    }

}

?>
