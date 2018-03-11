<?php

class CambiarClaveForm extends CFormModel
{
	public $nombreusuario;
    public $clave;
    public $reclave;



	public function rules()
	{
		return array(
            array('clave', 'required'),
            array('clave','length', 'min'=>4, 'max'=>50),			
           // array('clave', 'es_secuencia'),
            array('clave', 'type','type'=>'letras_y_numeros'),
            array('reclave', 'required'),
            array('reclave', 'compare', 'compareAttribute'=>'clave'),


		);
	}


	public function attributeLabels()
	{
		return array(
			'nombreusuario'=>'Nombre de Usuario',
            'clave'=>'Clave',
            'reclave'=>'Repetir Clave',
		);
	}
}
?>
