<?php

class PermisosUsuarios extends CActiveRecord
{
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
		return 'viw_modulos_visibles_usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		    'funcionalidades'=>array(self::HAS_MANY, 'funcionalidad', 'int_idmodulo', 'order'=>'??.int_orden ASC' ),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'seq_idmodulo'=>'Id',
			'nommod'=>'Modulo',			
			
		);
	}
	
	public function getDbConnection() {
		return $db=Yii::app()->getDb1();

    }
}