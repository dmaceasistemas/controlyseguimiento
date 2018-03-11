<?php

class Lugar extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_sitio':
	 * @var string $codsit
	 * @var string $desiti
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
		return 'tbl_sitio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('codsit','length','max'=>3),
			array('desiti','length','max'=>50),
			array('codsit, desiti', 'required'),
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
			'tbl_brigadas' => array(self::HAS_MANY, 'TblBrigada', 'codsit'),
			'tbl_unisats' => array(self::HAS_MANY, 'TblUnisat', 'codsit'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codsit' => 'id',
			'desiti' => 'Descripcion',
		);
	}
}