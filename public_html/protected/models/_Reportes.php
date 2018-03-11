<?php

class Reportes extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_tiporeporte':
	 * @var integer $id
	 * @var string $str_descripcion
	 * @var string $str_nombrereporte
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
		return 'tbl_tiporeporte';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('str_descripcion','length','max'=>200),
			array('str_nombrereporte','length','max'=>250),
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
			'str_descripcion' => 'Descripcion :',
			'str_nombrereporte' => 'Clase :',
		);
	}
}