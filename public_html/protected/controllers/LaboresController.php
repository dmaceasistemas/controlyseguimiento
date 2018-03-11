<?php

class LaboresController extends CController
{
	const PAGE_SIZE= 35;

	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='list';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('list','show', 'reportes', 'graficos','create','update','admin','delete','filtro','admin_1'),
				'users'=>array('*'),
			),
			/*array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),*/
		);
	}

	/**
	 * Shows a particular model.
	 */
	public function actionShow()
	{
		$this->render('show',array('model'=>$this->loadLabores()));
	}
         
        /**
	 * Crea reportes.
	 */ 
        public function actionReportes()
	{
		$labores=new Labores;

		$this->render('reportes',array('labores'=>$labores));
	}
         
        /**
	 * Crea reportes.
	 */ 
        public function actionGraficos()
	{
		$labores=new Labores;

		$this->render('graficos',array('labores'=>$labores));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$model=new Labores;
		if(isset($_POST['Labores']))
		{
			$model->attributes=$_POST['Labores'];
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
		}
		$this->render('create',array('model'=>$model));
	}
         
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadLabores();
		if(isset($_POST['Labores']))
		{
			$model->attributes=$_POST['Labores'];
			if($model->save())
				$this->redirect(array('show','id'=>$model->id));
		}
		$this->render('update',array('model'=>$model));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'list' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{   
    
                        $this->loadLabores()->delete();
                        $this->redirect(array('list'));
     
		} else 
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
        

	/**
	 * Lists all models.
	 */
	public function actionList()
	{
		$criteria=new CDbCriteria;

		$pages=new CPagination(Labores::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$models=Labores::model()->findAll($criteria);

		$this->render('list',array(
			'models'=>$models,
			'pages'=>$pages,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->processAdminCommand();

		$criteria=new CDbCriteria;
                 
                /** ---------------                 */

                 
                /** ---------------                 */
		$pages=new CPagination(Labores::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Labores');
		$sort->applyOrder($criteria);

		$models=Labores::model()->findAll($criteria);

		$this->render('admin',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}
         
                  
         /**
	 * Filtro.
	 */ 

         	public function actionFiltro()
	{
		$labores=new Labores;
                if(isset($_POST['Labores']))
                    {
			$labores->attributes=$_POST['Labores'];
                         
                         if ($labores->id_sede!=""){
                                $sede=$labores->id_sede; 
                               }else {
                                $sede="%";    
                               }
                               if ($labores->id_servicio !=""){
                                $servicio=$labores->id_servicio;
                               }else {
                                $servicio="%";    
                               }
                           if ($labores->id_rubro !=""){
                                $rubro=$labores->id_rubro;
                               }else {
                                $rubro="%";    
                               }
                            if ($labores->id_tipoproductor !=""){
                                $tipoproductor=$labores->id_tipoproductor;
                               }else {
                                $tipoproductor="%";    
                               }
                            if ($labores->id_rangohas !=""){
                                $rangohas=$labores->id_rangohas;
                               }else {
                                $rangohas="%";    
                               }             
                            if ($labores->dtm_fecha !=""){
                                $fecha1=$labores->dtm_fecha;
                                } else { $fecha1= "2000-01-01";
                                }
                            if ($labores->str_observaciones !=""){
                                $fecha2=$labores->str_observaciones;
                                } else { $fecha2=CTimestamp::formatDate('Y-m-d');
                                }  
                         
                         $this->redirect(array('admin_1',
                             'sede'=>$sede,
                             'servicio'=>$servicio,
                             'rubro'=>$rubro,
                             'tipoproductor'=>$tipoproductor,
                             'rangohas'=>$rangohas,
                             'fecha1'=>$fecha1,
                             'fecha2'=>$fecha2,
                             ));
                         
                         //$this->redirect('admin_1');
                     }
		$this->render('filtro',array('labores'=>$labores));
	}
         
	public function actionAdmin_1()
	{
		$this->processAdminCommand();
                 
		$criteria=new CDbCriteria;
                 
                /** --------------- -------------- */
                //$labores->attributes=$_POST['Labores'];
                $sede=$_GET['sede'];
                $servicio=$_GET['servicio'];
                $rubro=$_GET['rubro'];
                $tipoproductor=$_GET['tipoproductor'];
                $rangohas=$_GET['rangohas'];
                $fecha1=$_GET['fecha1'];
                $fecha2=$_GET['fecha2'];
                                
                $criteria->condition='CAST(id_sede AS VARCHAR) LIKE :sede 
                                      AND CAST(id_servicio AS VARCHAR) LIKE :servicio
                                      AND CAST(id_rubro AS VARCHAR) LIKE :rubro
                                      AND CAST(id_tipoproductor AS VARCHAR) LIKE :tipoproductor
                                      AND CAST(id_rangohas AS VARCHAR) LIKE :rangohas
                                      AND (dtm_fecha BETWEEN :fecha1::date AND :fecha2::date)
                                    ';
                $criteria->params=array(':sede'=>$sede,
                                        ':servicio'=>$servicio,
                                        ':rubro'=>$rubro,
                                        ':tipoproductor'=>$tipoproductor,
                                        ':rangohas'=>$rangohas,
                                        ':fecha1'=>$fecha1,
                                        ':fecha2'=>$fecha2,
                                        );
                $pages=new CPagination(Labores::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Labores');
		$sort->applyOrder($criteria);

		$models=Labores::model()->findAll($criteria);

		$this->render('admin_1',array(
			'models'=>$models,
			'pages'=>$pages,
			'sort'=>$sort,
		));                                
                //  }
                  
                  
                /** ---------------                 */

	}         

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadLabores($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=Labores::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Executes any command triggered on the admin page.
	 */
	protected function processAdminCommand()
	{
		if(isset($_POST['command'], $_POST['id']) && $_POST['command']==='delete')
		{
			$this->loadLabores($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}
}
