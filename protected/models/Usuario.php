<?php

class Usuario extends CActiveRecord
{
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return 'tbl_ares_usuario';
	}


	public function rules(){
		return array(
			array('str_nombreusuario','length','max'=>20),
			array('str_cedula','length','max'=>12, 'min'=>10),
			array('str_contrasena','length','max'=>100),
			array('str_nombre','length','max'=>30),
			array('str_apellido','length','max'=>30),
			array('str_correo','length','max'=>50),
            array('str_correo','numerical'),
			array('str_nombrefoto','length','max'=>30),
			array('str_idsede','length','max'=>4),
			array('str_nombreusuario, str_cedula', 'required'),
			array('int_cant_grupos, int_idsistema', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
     *
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
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