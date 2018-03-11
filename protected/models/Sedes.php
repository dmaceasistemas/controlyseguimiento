<?php

class Sedes extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'viw_sedes':
	 * @var integer $codemp
	 * @var integer $codubifis
	 * @var string $desubifis
	 * @var string $codpai
	 * @var string $codest
	 * @var string $codmun
	 * @var string $codpar
	 * @var string $dirubifis
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
		return 'viw_sedes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('desubifis','length','max'=>100),
			array('codpai','length','max'=>3),
			array('codest','length','max'=>3),
			array('codmun','length','max'=>3),
			array('codpar','length','max'=>3),
			array('dirubifis','length','max'=>200),
			array('codemp, codubifis', 'numerical', 'integerOnly'=>true),
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
			'codemp' => 'Codemp',
			'codubifis' => 'Codubifis',
			'desubifis' => 'Desubifis',
			'codpai' => 'Codpai',
			'codest' => 'Codest',
			'codmun' => 'Codmun',
			'codpar' => 'Codpar',
			'dirubifis' => 'Dirubifis',
		);
	}
}