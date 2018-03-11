<?php

class UsuarioController extends CController{

    public function accessRules(){
		return array(
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('cambiarclave'),
				'users'=>array('@'),
			),
		);
	}

   public function actionCambiarClave(){
		$form=new CambiarClaveForm;
        $form->nombreusuario = Yii::app()->user->nombre;
        $actualizado = false;
        $uso_claveanterior = false;
		if(isset($_POST['CambiarClaveForm'])){
			$form->attributes=$_POST['CambiarClaveForm'];
            if($form->validate()){
                $usuario = Usuario::model()->findByAttributes(array('str_nombreusuario'=>$form->nombreusuario));                
                if ($usuario->str_contrasena != md5($form->clave)){
                    $usuario->str_contrasena = md5($form->clave);
                    $usuario->bol_cambiar_clave = false;
                    $usuario->update();
                    $actualizado=true;
                }else{
                   $uso_claveanterior =true;
                }
            }
		}
		$this->render('cambiarclave',array('form'=>$form,'actualizado'=>$actualizado,'uso_claveanterior'=>$uso_claveanterior));
	}
}
?>
