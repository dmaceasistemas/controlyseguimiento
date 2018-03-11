<?php

class RubrosAmpliado extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'viw_rubros_ampliados':
	 * @var integer $seq_idrubro
	 * @var integer $int_idrenglon
	 * @var string $str_descripcion
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
		return 'viw_rubros_ampliados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('str_descripcion','length','max'=>100),
			array('seq_idrubro, int_idrenglon', 'numerical', 'integerOnly'=>true),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'seq_idrubro' => 'Seq Idrubro',
			'int_idrenglon' => 'Int Idrenglon',
			'str_descripcion' => 'Str Descripcion',
		);
	}
}