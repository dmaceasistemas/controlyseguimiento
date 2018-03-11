<?php

class Periodos extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_periodo':
	 * @var integer $id
	 * @var string $dtm_fechedesde
	 * @var string $dtm_fechahasta
	 * @var string $str_observaciones
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
		return 'tbl_periodo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('str_observaciones','length','max'=>100),
			array('dtm_fechadesde , dtm_fechahasta , str_observaciones','required'),                     
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
			'id' => 'Id',
			'dtm_fechadesde' => 'Desde',
			'dtm_fechahasta' => 'Hasta',
			'str_observaciones' => 'Descripcion',
		);
	}
}