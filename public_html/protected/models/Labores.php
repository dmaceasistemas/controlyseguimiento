<?php

class Labores extends CActiveRecord
{       public $idEje;
        public $idTps;
        public $idCat;
        public $idSer;
        public $strMes;
        public $idRep;
        public $idLgr;
        public $idTipoServ;        
        public $prod_aux;        
        //public $fecha1;
	/**
	 * The followings are the available columns in table 'tbl_labores':
	 * @var integer $id
	 * @var integer $id_servicio
	 * @var integer $id_rubro
	 * @var integer $id_sede
	 * @var integer $id_tipoproductor
	 * @var integer $id_rangohas
	 * @var string $dbl_hasfisicas
	 * @var string $dbl_haslabor
	 * @var integer $int_prodatendidos
	 * @var string $dtm_fecha
	 * @var string $dbl_kg
	 * @var integer $id_periodo
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
		return 'tbl_labores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
                        array('idEje', 'numerical', 'integerOnly'=>true),
                        array('idRep', 'numerical', 'integerOnly'=>true),
                        array('idTps', 'numerical', 'integerOnly'=>true),
                        array('idCat', 'numerical', 'integerOnly'=>true),
                        array('idSer', 'numerical', 'integerOnly'=>true),
			array('idLgr', 'numerical', 'integerOnly'=>true),
                        array('idTipoServ', 'numerical', 'integerOnly'=>true),                     
                        array('dbl_hasfisicas','length','max'=>12),
			array('dbl_haslabor','length','max'=>12),
			array('dbl_kg','length','max'=>12),
			array('str_observaciones','length','max'=>50),
                        array('prod_aux','length','max'=>250),
                        array('strMes','length','max'=>50),
			array('id_servicio, id_rubro, id_sede, id_tipoproductor, id_rangohas, int_prodatendidos, id_periodo', 'numerical', 'integerOnly'=>true),
			array('dbl_hasfisicas, dbl_haslabor, dbl_kg, dbl_v_urbanorural, dbl_v_agricola, dbl_movimiento_tierras, dbl_deforestacion, dbl_limpiezacanales, dbl_horas_maquinaria', 'numerical'),
                        array('id_servicio, dbl_hasfisicas, dbl_haslabor, dtm_fecha, dbl_kg, id_rubro, id_sede, id_tipoproductor, id_rangohas, int_prodatendidos, id_periodo, dbl_v_urbanorural, dbl_v_agricola, dbl_movimiento_tierras, dbl_deforestacion, dbl_limpiezacanales, dbl_horas_maquinaria','required'),
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

          public function safeAttributes()  
             {  
                 return array(  
                'id',
		'id_servicio',
		'id_rubro',
		'id_sede',
		'id_tipoproductor',
		'id_rangohas',
		'dbl_hasfisicas',
		'dbl_haslabor',
		'int_prodatendidos',
		'dtm_fecha',
		'dbl_kg',
		'id_periodo',
		'str_observaciones',
                'dbl_v_urbanorural',
                'dbl_v_agricola',
                'dbl_movimiento_tierras',
                'dbl_deforestacion',
                'dbl_limpiezacanales',
                'dbl_horas_maquinaria',
                'idEje',
                'idTps',
                'idCat',
                'idSer',
                'strMes',
                'idRep',
                'idLgr',
                'idTipoServ',
                'prod_aux',
                 );
             }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'id_servicio' => 'Servicio ',
			'id_rubro' => 'Rubro ',
			'id_sede' => 'Sede ',
			'id_tipoproductor' => 'Tipo de Productor ',
			'id_rangohas' => 'Rango Hectareas ',
			'dbl_hasfisicas' => 'Hectareas Fisicas ',
			'dbl_haslabor' => 'Hectareas Labor: ',
			'int_prodatendidos' => 'Productores Atendidos ',
			'dtm_fecha' => 'Fecha ',
			'dbl_kg' => 'Kilogramos',
			'id_periodo' => 'Periodo ',
			'str_observaciones' => 'Observaciones ',
                        'dbl_v_urbanorural'=> 'Vialidad Urbana',
                        'dbl_v_agricola'=> 'Vialidad Agricola',
                        'dbl_movimiento_tierras'=> 'Movimiento de Tierras',
                        'dbl_deforestacion' => 'Deforestacion',
                        'dbl_limpiezacanales' => 'Limpieza de Canales',
                        'dbl_horas_maquinaria' => 'Horas Maquinaria ',
                        'idEje'=>'Eje Estrategico',
                        'idTps'=>'Tipo de Servicio',
                        'idCat'=>'Categoria de Servicio',
                        'idSer'=>'Servicio',
                        'strMes'=>'Mes',
                        'idRep'=>'Tipo de Reporte',
                        'idLgr'=>'Tipo de Lugar',
                        'prod_aux'=>'Tipo de Productor',
                        'idTipoServ'=>'Tipo de Servicio',                            
		);
	}
    /*     
         // Returns list of searchable fileds for DataFilter widget
    public function getDataFilterSearchFields($filterName)
    {
        switch ($filterName) {
            case 'userFieldsSearch': //filter name
                return array(
                    'df_users.id'=>'User ID', //field name => display name
                    'df_users.name'=>'Name',
                    'df_users.username'=>'Username',
                );
        }
    }
 
    // Applies search criteria enterd using DataFilter widget
    public function applyDataSearchCriteria(&$criteria, $filterName, $searchField, $searchValue)
    {
        if($filterName == 'userFieldsSearch') {
            $localCriteria = new CDbCriteria;
            $localCriteria->condition = ' '.$searchField.' LIKE "%'.$searchValue.'%" ';
            //$localCriteria->condition = ' '.$searchField.' LIKE "%:searchValue%" ';
            //$localCriteria->params = array(':searchValue'=>$searchValue); //"'%1%'" //".$searchValue."
            $criteria->mergeWith($localCriteria);
        }
    }
 
    // Returns options for DataFilter widget
    public function getDataFilterOptions($filterName)
    {
        switch ($filterName) {
            case 'id':  //filter name
            case 'groupFilter2':
                // data from database
                $groups = Group::model()->findAll();
                return CHtml::listData($groups, 'id', 'name');
            case 'id_sede':
            case 'countryFilter2':
                $countries = Country::model()->findAll();
                return CHtml::listData($countries, 'id', 'name');
            case 'id_servicio':
                $criteria = new CDbCriteria;
                $country = Yii::app()->request->getParam('countryFilter');
                // city filter depends from country filter
                if (isset($country) && !empty($country)) {
                    $criteria->condition = ' countries_id = :country';
                    $criteria->params = array(':country'=>$country);
                }
                $cities = City::model()->findAll($criteria);
                return CHtml::listData($cities, 'id', 'name');
           case 'activeDropFilter':
                // static data (not from database)
                $options = array(
                    array('id'=>'', 'name'=>'All'),
                    array('id'=>0, 'name'=>'Not active'),
                    array('id'=>1, 'name'=>'Active'),
                );
                return CHtml::listData($options, 'id', 'name');
        }
    }
 
    // Applies filter criteria enterd using DataFilter widget
    public function applyDataFilterCriteria(&$criteria, $filterName, $filterValue)
    {
        if($filterName == 'id' || $filterName == 'groupFilter2') {
            $localCriteria = new CDbCriteria;
            CDataFilter::setCondition('user_groups_id', $filterValue, $localCriteria);
            $criteria->mergeWith($localCriteria);
        }
 
        if($filterName == 'id_sede' || $filterName == 'countryFilter2') {
            $localCriteria = new CDbCriteria;
            //'null' value is a spectial option for coutryFilter
            if ($filterValue != 'null') {
                $localCriteria->select = 'df_users.*';
                $localCriteria->join =
                    'INNER JOIN `df_cities` cities
                    ON (`df_users`.`cities_id`=cities.`id`)
                    AND (cities.countries_id = :countryID) ';
                $localCriteria->params = array(':countryID'=>$filterValue);
                //$localCriteria->group = ' df_users.id ';
            } else {
                $localCriteria->condition = ' cities_id is null ';
            }
            $criteria->mergeWith($localCriteria);
        }
 
        if($filterName == 'id_servicio') {
            $localCriteria = new CDbCriteria;
            CDataFilter::setCondition('cities_id', $filterValue, $localCriteria);
            $criteria->mergeWith($localCriteria);
        }
 
        if($filterName == 'activeFilter') {
            if ($filterValue !== 'active') return;
            $localCriteria = new CDbCriteria;
            CDataFilter::setCondition('is_active', 1, $localCriteria);
            $criteria->mergeWith($localCriteria);
        }
 
        if($filterName == 'activeDropFilter') {
            $localCriteria = new CDbCriteria;
            CDataFilter::setCondition('is_active', $filterValue, $localCriteria);
            $criteria->mergeWith($localCriteria);
        }*/

}