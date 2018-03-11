<?php

class UsuarioEnSistema extends CActiveRecord
{
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function tableName()
	{
		return 'tbl_ares_usuario_sistema';
	}

	
	public function rules()
	{
		return array(
		);
	}

	
	public function relations()
	{
		return array(
		);
	}

	
	public function attributeLabels()
	{
		return array(
			'int_idusuario'=>'Id',
			'int_idsistema'=>'Id Sistema',
			'dtm_ultimo_acceso'=>'Ultimo Acceso',
		);
	}
     public function getDbConnection() {
		return $db=Yii::app()->getDb1();

    }
}