<?php

class Funcionalidad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'viw_accesos_visibles_usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			/*array('str_nombre','length','max'=>30),
			array('str_comando','length','max'=>80),
			array('str_icono','length','max'=>60),
			array('str_masaccmax','length','max'=>16),
			array('int_orden', 'numerical', 'integerOnly'=>true),*/
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
  /*          'modulo'=>array(self::BELONGS_TO, 'moduloSistema', 'int_idmodulo'),
            'permisos'=>array(self::BELONGS_TO, 'PermisosUsuarios', 'int_idmodulo'),*/

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'seq_idfuncionalidad'=>'Seq Idfuncionalidad',
			'str_nombre'=>'Str Nombre',
			'seq_idmodulo'=>'Int Idmodulo',
			'str_comando'=>'Str Comando',
			'str_icono'=>'Str Icono',
			'bol_estado'=>'Bol Estado',
			'str_masaccmax'=>'Str Masaccmax',
			'int_orden'=>'Int Orden',
		);
	}

    public function getDbConnection() {
		return $db=Yii::app()->getDb1();

    }
}
