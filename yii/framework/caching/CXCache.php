<?php
/**
 * CXCache class file
 *
 * @author Wei Zhuo <weizhuo[at]gmail[dot]com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2009 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CXCache implements a cache application module based on {@link http://xcache.lighttpd.net/ xcache}.
 *
 * To use this application component, the XCache PHP extension must be loaded.
 *
 * See {@link CCache} manual for common cache operations that are supported by CApcCache.
 *
 * @author Wei Zhuo <weizhuo[at]gmail[dot]com>
 * @version $Id: CXCache.php 461 2009-01-04 04:20:08Z qiang.xue $
 * @package system.caching
 * @since 1.0.1
 */
class CXCache extends CCache
{
	/**
	 * Initializes this application component.
	 * This method is required by the {@link IApplicationComponent} interface.
	 * It checks the availability of memcache.
	 * @throws CException if memcache extension is not loaded or is disabled.
	 */
	public function init()
	{
		parent::init();
		if(!function_exists('xcache_isset'))
			throw new CException(Yii::t('yii','CXCache requires PHP XCache extension to be loaded.'));
	}

	/**
	 * Retrieves a value from cache with a specified key.
	 * This is the implementation of the method declared in the parent class.
	 * @param string a unique key identifying the cached value
	 * @return string the value stored in cache, false if the value is not in the cache or expired.
	 */
	protected function getValue($key)
	{
		return xcache_isset($key) ? xcache_get($key) : false;
	}

	/**
	 * Stores a value identified by a key in cache.
	 * This is the implementation of the method declared in the parent class.
	 *
	 * @param string the key identifying the value to be cached
	 * @param string the value to be cached
	 * @param integer the number of seconds in which the cached value will expire. 0 means never expire.
	 * @return boolean true if the value is successfully stored into cache, false otherwise
	 */
	protected function setValue($key,$value,$expire)
	{
		return xcache_set($key,$value,$expire);
	}

	/**
	 * Stores a value identified by a key into cache if the cache does not contain this key.
	 * This is the implementation of the method declared in the parent class.
	 *
	 * @param string the key identifying the value to be cached
	 * @param string the value to be cached
	 * @param integer the number of seconds in which the cached value will expire. 0 means never expire.
	 * @return boolean true if the value is successfully stored into cache, false otherwise
	 */
	protected function addValue($key,$value,$expire)
	{
		return !xcache_isset($key) ? $this->setValue($key,$value,$expire) : false;
	}

	/**
	 * Deletes a value with the specified key from cache
	 * This is the implementation of the method declared in the parent class.
	 * @param string the key of the value to be deleted
	 * @return boolean if no error happens during deletion
	 */
	protected function deleteValue($key)
	{
		return xcache_unset($key);
	}

	/**
	 * Deletes all values from cache.
	 * Be careful of performing this operation if the cache is shared by multiple applications.
	 */
	public function flush()
	{
		return xcache_clear_cache();
	}
}

