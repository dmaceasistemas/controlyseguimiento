<?php

class Estados extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'viw_estado':
	 * @var string $codpai
	 * @var string $codest
	 * @var string $desest
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
		return 'viw_estado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('codpai','length','max'=>3),
			array('codest','length','max'=>3),
			array('desest','length','max'=>50),
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
			'codpai' => 'Codpai',
			'codest' => 'Codest',
			'desest' => 'Desest',
		);
	}
}