<?php

class UnidadesProduccion extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'tbl_otras_sedes':
	 * @var string $codotrsedes
	 * @var string $desotrsedes
	 * @var string $codest
	 * @var string $codsit
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
		return 'tbl_otras_sedes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('codotrsedes','length','max'=>4),
			array('desotrsedes','length','max'=>100),
			array('codest','length','max'=>3),
			array('codotrsedes, desotrsedes', 'required'),
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
			'codsit0' => array(self::BELONGS_TO, 'TblSitio', 'codsit'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'codotrsedes' => 'Id',
			'desotrsedes' => 'Descripcion',
			'codest' => 'Estado',
			'codsit' => 'Tipo Unid/Prod',
		);
	}
}