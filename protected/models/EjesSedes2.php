<?php

class EjesSedes2 extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_control_seguimiento_ejes_sede':
	 * @var integer $seq_idejesede
	 * @var string $int_idsede
	 * @var integer $int_ideje
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
		return 'tbl_control_seguimiento_ejes_sede';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('int_idsede','length','max'=>7),
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
			'int_ideje0' => array(self::BELONGS_TO, 'TblControlSeguimientoEjes', 'int_ideje'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'seq_idejesede' => 'Seq Idejesede',
			'int_idsede' => 'Int Idsede',
			'int_ideje' => 'Int Ideje',
		);
	}
}