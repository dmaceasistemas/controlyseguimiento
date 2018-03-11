<?php

class VistaUsuariosEnSistema extends CActiveRecord
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function tableName()
	{
		return 'viw_usuarios_en_sistema';
	}
	
	public function rules()
	{
		return array(
		);
	}

	
	public function relations()
	{
		return array();
	}

	
	public function attributeLabels()
	{
		return array(
			'seq_idusuario'=>'Id',
			'str_nombreusuario'=>'Nombre Usuario',
			'str_cedula'=>'Cedula',
			'str_contrasena'=>'Contrasena',
			'str_nombre'=>'Nombres',
			'str_apellido'=>'Apellidos',
			'str_correo'=>'Correo Electronico',
			'str_nombrefoto'=>'Foto',
			'dtm_fechacreacion'=>'Fecha Creacion',
			'dtm_ultimoacceso'=>'Ultimo Acceso',
			'bol_estado'=>'Estado',
			'str_idsede'=>'Sede',
			'int_cant_grupos'=>'Cantidad Grupos',
			'int_idsistema'=>'Sistema',            
		);
	}
    public function getDbConnection() {
		return $db=Yii::app()->getDb1();

    }
}