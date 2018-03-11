<?php

class ValidadorForm extends CFormModel
{
    public $cedulaTrabajador;
    public $codigoDocumento;
    public $tipoDocumento;
    public $empresa;
    public $nombreValidador;
    public $numeroTelefonico;
    public $verifyCode;

	public function rules()
	{
		return array(
            array('cedulaTrabajador', 'required'),
			array('codigoDocumento', 'required'),            
			array('verifyCode', 'captcha', 'allowEmpty'=>!extension_loaded('gd')),
		);
	}


	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Codigo de Imagen',
			'cedulaTrabajador'=>'C.I',
			'codigoDocumento'=>'Cod. Documento',
			'verifyCode'=>'Cod. Imagen',
		);
	}
}
?>