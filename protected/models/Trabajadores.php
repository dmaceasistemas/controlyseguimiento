<?php

class Trabajadores extends  CActiveRecord 
{
         public $codperi;
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
		return 'viw_personal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('codper','length','max'=>10),
                        array('codperi','length','max'=>10),
			array('cedper','length','max'=>10),
			array('nomper','length','max'=>60),
			array('apeper','length','max'=>60),
			array('dirper','length','max'=>254),
			array('edocivper','length','max'=>1),
			array('telhabper','length','max'=>15),
			array('telmovper','length','max'=>15),
			array('sexper','length','max'=>1),
            array('codigo_cargo','length','max'=>10),
			array('cargo_per','length','max'=>100),
			array('nivacaper','length','max'=>1),
			array('catper','length','max'=>20),
			array('cajahoper','length','max'=>1),
			array('contraper','length','max'=>1),
			array('tenvivper','length','max'=>40),
			array('cuecajahoper','length','max'=>25),
			array('cuelphper','length','max'=>25),
			array('cuefidper','length','max'=>25),
			array('vacper','length','max'=>1),
			array('cedbenper','length','max'=>8),
			array('estper','length','max'=>1),
			array('fotper','length','max'=>200),
			array('obsper','length','max'=>254),
			array('cauegrper','length','max'=>1),
			array('obsegrper','length','max'=>254),
			array('nacper','length','max'=>1),
            array('sede_per','length','max'=>100),
			array('ubic_fisi','length','max'=>200),
			array('codest','length','max'=>3),
			array('edo_sede','length','max'=>50),
			array('sede','length','max'=>100),
			array('sueintper', 'numerical'),
			array('coreleper','length','max'=>100),
			array('cenmedper','length','max'=>3),
			array('turper','length','max'=>1),
			array('horper','length','max'=>45),
			array('hcmper','length','max'=>1),
			array('tipsanper','length','max'=>10),
			array('codcom','length','max'=>10),
			array('codran','length','max'=>10),
			array('numexpper','length','max'=>20),
			array('codpainac','length','max'=>3),
			array('codestnac','length','max'=>3),
			array('enviorec','length','max'=>1),
			array('talcamper','length','max'=>5),
			array('talpanper','length','max'=>5),
			array('codper, cedper, nomper, apeper, dirper, fecnacper, edocivper, sexper, nivacaper, cajahoper, numhijper, contraper, tipvivper, monpagvivper, fecingadmpubper, fecingper, anoservpreper, estper, nacper', 'required'),
			array('numhijper, anoservpreper', 'numerical', 'integerOnly'=>true),
			array('estaper, pesper, monpagvivper, ingbrumen, porisrper, monpagvivperaux, ingbrumenaux, talzapper', 'numerical'),
		);
	}


	/**
	 * @return array relational rules.
	 */
        public function safeAttributes()
        {
             return array(
                 'codperi','cedper', 'nomper', 'apeper', 'cargo_per', 'sede', 'sueintper', 
                 'fecingper', 'dirper', 'fecnacper', 'telhabper', 'telmovper', 
                 'cargo_per', 'sueintper', 
             );
        }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
    public function relations()
    {
        return array(
            'periodos'=>array(self::HAS_MANY, 'Periodos', 'codper'),

        );
    }
         
	public function attributeLabels()
	{
		return array(
                    'cedper' => 'Cedula',
                    'nomper' => 'Nombre Completo',
                    'apeper'  => 'Apellido',
                    'cargo_per' => 'Cargo',
                    'sede' => 'Sede',
                    'sueintper' => 'Sueldo Integral',
                    'fecingper' =>'Fecha de Ingreso',
                    'dirper' => 'Direccion',
                    'fecnacper' => 'Fecha de Nacimiento',
                    'telhabper' => 'Telefono Fijo',
                    'telmovper' => 'Telefono Movil',
                    'cargo_per' => 'Cargo',          
                    'sueintper' => 'Sueldo Integral',                           
		);
	}
}