<?php

class TipoServicio extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_control_seguimiento_tipo_servicio':
	 * @var integer $seq_idtiposervicio
	 * @var string $str_descriptiposervicio
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
		return 'tbl_control_seguimiento_tipo_servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('str_descriptiposervicio','length','max'=>100),
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
			'tbl_categorias' => array(self::HAS_MANY, 'TblCategoria', 'int_idtiposervicio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'seq_idtiposervicio' => 'Id',
			'str_descriptiposervicio' => 'Descripcion',
		);
	}
}