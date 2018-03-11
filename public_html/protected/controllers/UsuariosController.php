<?php

class UsuariosController extends CController
{
	const PAGE_SIZE=30;

	/**
	 * @var string specifies the default action to be 'list'.
	 */
	public $defaultAction='list';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_usuarios;

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
				'actions'=>array('list','show'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Shows a particular usuarios.
	 */
	public function actionShow()
	{
		$this->render('show',array('usuarios'=>$this->loadUsuarios()));
	}

	/**
	 * Creates a new usuarios.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionCreate()
	{
		$usuarios=new Usuarios;
		if(isset($_POST['Usuarios']))
		{
			$usuarios->attributes=$_POST['Usuarios'];
			if($usuarios->save())
				$this->redirect(array('show','id'=>$usuarios->seq_idusuario));
		}
		$this->render('create',array('usuarios'=>$usuarios));
	}

	/**
	 * Updates a particular usuarios.
	 * If update is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUpdate()
	{
		$usuarios=$this->loadUsuarios();
		if(isset($_POST['Usuarios']))
		{
			$usuarios->attributes=$_POST['Usuarios'];
			if($usuarios->save())
				$this->redirect(array('show','id'=>$usuarios->seq_idusuario));
		}
		$this->render('update',array('usuarios'=>$usuarios));
	}

	/**
	 * Deletes a particular usuarios.
	 * If deletion is successful, the browser will be redirected to the 'list' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadUsuarios()->delete();
			$this->redirect(array('list'));
		}
		else
			throw new CHttpException(500,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all usuarioss.
	 */
	public function actionList()
	{
		$criteria=new CDbCriteria;

		$pages=new CPagination(Usuarios::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$usuariosList=Usuarios::model()->findAll($criteria);

		$this->render('list',array(
			'usuariosList'=>$usuariosList,
			'pages'=>$pages,
		));
	}

	/**
	 * Manages all usuarioss.
	 */
	public function actionAdmin()
	{
		$this->processAdminCommand();

		$criteria=new CDbCriteria;

		$pages=new CPagination(Usuarios::model()->count($criteria));
		$pages->pageSize=self::PAGE_SIZE;
		$pages->applyLimit($criteria);

		$sort=new CSort('Usuarios');
		$sort->applyOrder($criteria);

		$usuariosList=Usuarios::model()->findAll($criteria);

		$this->render('admin',array(
			'usuariosList'=>$usuariosList,
			'pages'=>$pages,
			'sort'=>$sort,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUsuarios($id=null)
	{
		if($this->_usuarios===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_usuarios=Usuarios::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_usuarios===null)
				throw new CHttpException(500,'The requested usuarios does not exist.');
		}
		return $this->_usuarios;
	}

	/**
	 * Executes any command triggered on the admin page.
	 */
	protected function processAdminCommand()
	{
		if(isset($_POST['command'], $_POST['id']) && $_POST['command']==='delete')
		{
			$this->loadUsuarios($_POST['id'])->delete();
			// reload the current page to avoid duplicated delete actions
			$this->refresh();
		}
	}

    
}
