<?php
/**
 * CDbCacheDependency class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2009 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CDbCacheDependency represents a dependency based on the query result of a SQL statement.
 *
 * If the query result (a scalar) changes, the dependency is considered as changed.
 * To specify the SQL statement, set {@link sql} property.
 * The {@link connectionID} property specifies the ID of a {@link CDbConnection} application
 * component. It is this DB connection that is used to perform the query.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CDbCacheDependency.php 433 2008-12-30 22:59:17Z qiang.xue $
 * @package system.caching.dependencies
 * @since 1.0
 */
class CDbCacheDependency extends CCacheDependency
{
	/**
	 * @var string the ID of a {@link CDbConnection} application component. Defaults to 'db'.
	 */
	public $connectionID='db';
	/**
	 * @var string the SQL statement whose result is used to determine if the dependency has been changed.
	 */
	public $sql;

	private $_db;

	/**
	 * Constructor.
	 * @param string the SQL statement whose result is used to determine if the dependency has been changed.
	 */
	public function __construct($sql=null)
	{
		$this->sql=$sql;
	}

	/**
	 * PHP sleep magic method.
	 * This method ensures that the database instance is set null because it contains resource handles.
	 */
	public function __sleep()
	{
		$this->_db=null;
		return array_keys((array)$this);
	}

	/**
	 * Generates the data needed to determine if dependency has been changed.
	 * This method returns the value of the global state.
	 * @return mixed the data needed to determine if dependency has been changed.
	 */
	protected function generateDependentData()
	{
		if($this->sql!==null)
			return $this->getDbConnection()->createCommand($this->sql)->queryScalar();
		else
			throw new CException(Yii::t('yii','CDbCacheDependency.sql cannot be empty.'));
	}

	/**
	 * @return CDbConnection the DB connection instance
	 * @throws CException if {@link connectionID} does not point to a valid application component.
	 */
	protected function getDbConnection()
	{
		if($this->_db!==null)
			return $this->_db;
		else
		{
			if(($this->_db=Yii::app()->getComponent($this->connectionID)) instanceof CDbConnection)
				return $this->_db;
			else
				throw new CException(Yii::t('yii','CDbHttpSession.connectionID "{id}" is invalid. Please make sure it refers to the ID of a CDbConnection application component.',
					array('{id}'=>$this->connectionID)));
		}
	}
}
