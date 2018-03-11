<?php

class ModuloSistema extends CActiveRecord
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
		return 'tbl_ares_modulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('str_nombre','length','max'=>30),
			array('str_icono','length','max'=>30),
			array('str_nombre', 'required'),
			array('int_idsistema', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * @return array relational rules.	 */


    public function relations()
	{
		return array(
            'funcionalidades'=>array(self::HAS_MANY, 'Funcionalidad', 'int_idmodulo','order'=>'??.int_orden ASC'
            ),

		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'seq_idmodulo'=>'Seq Idmodulo',
			'str_nombre'=>'Str Nombre',
			'str_icono'=>'Str Icono',
			'int_idsistema'=>'Int Idsistema',
			'bol_estado'=>'Bol Estado',
		);
	}
    public function getDbConnection() {
        return Yii::app()->getDb1();
    }

    public function __toString() {
        return $this->getAttribute('seq_idmodulo')."-".$this->getAttribute('str_nombre');
    }
}