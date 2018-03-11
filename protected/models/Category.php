<?php

class Category extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_categoria':
	 * @var integer $id
	 * @var string $str_descripcion
	 * @var integer $int_idtiposervicio
	 */

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
		return 'tbl_categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('str_descripcion','length','max'=>100),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'tbl_servicios' => array(self::HAS_MANY, 'TblServicio', 'id_categoria'),
			'int_idtiposervicio0' => array(self::BELONGS_TO, 'TblControlSeguimientoTipoServicio', 'int_idtiposervicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'str_descripcion' => 'Descripcion',
			'int_idtiposervicio' => 'Tipo de Servicio',
		);
	}
}