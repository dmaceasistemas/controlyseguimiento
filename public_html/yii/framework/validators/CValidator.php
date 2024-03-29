<?php
/**
 * CValidator class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2009 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

/**
 * CValidator is the base class for all validators.
 *
 * Child classes must implement the {@link validateAttribute} method.
 *
 * The following properties are defined in CValidator:
 * <ul>
 * <li>{@link attributes}: array, list of attributes to be validated;</li>
 * <li>{@link message}: string, the customized error message. The message
 *   may contain placeholders that will be replaced with the actual content.
 *   For example, the "{attribute}" placeholder will be replaced with the label
 *   of the problematic attribute. Different validators may define additional
 *   placeholders.</li>
 * <li>{@link on}: string, in which scenario should the validator be in effect.
 *   This is used to match the 'on' parameter supplied when calling {@link CModel::validate}.</li>
 * </ul>
 *
 * When using {@link createValidator} to create a validator, the following aliases
 * are recognized as the corresponding built-in validator classes:
 * <ul>
 * <li>required: {@link CRequiredValidator}</li>
 * <li>filter: {@link CFilterValidator}</li>
 * <li>match: {@link CRegularExpressionValidator}</li>
 * <li>email: {@link CEmailValidator}</li>
 * <li>url: {@link CUrlValidator}</li>
 * <li>unique: {@link CUniqueValidator}</li>
 * <li>compare: {@link CCompareValidator}</li>
 * <li>length: {@link CStringValidator}</li>
 * <li>in: {@link CRangeValidator}</li>
 * <li>numerical: {@link CNumberValidator}</li>
 * <li>captcha: {@link CCaptchaValidator}</li>
 * <li>type: {@link CTypeValidator}</li>
 * <li>file: {@link CFileValidator}</li>
 * <li>default: {@link CDefaultValueValidator}</li>
 * <li>exist: {@link CExistValidator}</li>
 * </ul>
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: CValidator.php 911 2009-04-03 16:05:18Z qiang.xue $
 * @package system.validators
 * @since 1.0
 */
abstract class CValidator extends CComponent
{
	/**
	 * @var array list of built-in validators (name=>class)
	 */
	public static $builtInValidators=array(
		'required'=>'CRequiredValidator',
		'filter'=>'CFilterValidator',
		'match'=>'CRegularExpressionValidator',
		'email'=>'CEmailValidator',
		'url'=>'CUrlValidator',
		'unique'=>'CUniqueValidator',
		'compare'=>'CCompareValidator',
		'length'=>'CStringValidator',
		'in'=>'CRangeValidator',
		'numerical'=>'CNumberValidator',
		'captcha'=>'CCaptchaValidator',
		'type'=>'CTypeValidator',
		'file'=>'CFileValidator',
		'default'=>'CDefaultValueValidator',
		'exist'=>'CExistValidator',
        'es_secuencia'=>'CNumericSecuenceValidator',
	);

	/**
	 * @var array list of attributes to be validated.
	 */
	public $attributes;
	/**
	 * @var string the user-defined error message. Different validators may define various
	 * placeholders in the message that are to be replaced with actual values. All validators
	 * recognize "{attribute}" placeholder, which will be replaced with the label of the attribute.
	 */
	public $message;
	/**
	 * @var array list of scenarios that the validator should be applied.
	 * Each array value refers to a scenario name with the same name as its array key.
	 */
	public $on;

	/**
	 * Validates a single attribute.
	 * This method should be overriden by child classes.
	 * @param CModel the data object being validated
	 * @param string the name of the attribute to be validated.
	 */
	abstract protected function validateAttribute($object,$attribute);


	/**
	 * Creates a validator object.
	 * @param string the name or class of the validator
	 * @param CModel the data object being validated that may contain the inline validation method
	 * @param mixed list of attributes to be validated. This can be either an array of
	 * the attribute names or a string of comma-separated attribute names.
	 * @param array initial values to be applied to the validator properties
	 */
	public static function createValidator($name,$object,$attributes,$params)
	{
		if(is_string($attributes))
			$attributes=preg_split('/[\s,]+/',$attributes,-1,PREG_SPLIT_NO_EMPTY);

		if(isset($params['on']))
		{
			if(is_array($params['on']))
				$on=$params['on'];
			else
				$on=preg_split('/[\s,]+/',$params['on'],-1,PREG_SPLIT_NO_EMPTY);
		}
		else
			$on=array();

		if(method_exists($object,$name))
		{
			$validator=new CInlineValidator;
			$validator->attributes=$attributes;
			$validator->method=$name;
			$validator->params=$params;
		}
		else
		{
			$params['attributes']=$attributes;
			if(isset(self::$builtInValidators[$name]))
				$className=Yii::import(self::$builtInValidators[$name],true);
			else
				$className=Yii::import($name,true);
			$validator=new $className;
			foreach($params as $name=>$value)
				$validator->$name=$value;
		}

		$validator->on=empty($on) ? array() : array_combine($on,$on);

		return $validator;
	}

	/**
	 * Validates the specified object.
	 * @param CModel the data object being validated
	 * @param array the list of attributes to be validated. Defaults to null,
	 * meaning every attribute listed in {@link attributes} will be validated.
	 */
	public function validate($object,$attributes=null)
	{
		if(is_array($attributes))
			$attributes=array_intersect($this->attributes,$attributes);
		else
			$attributes=$this->attributes;
		foreach($attributes as $attribute)
			$this->validateAttribute($object,$attribute);
	}

	/**
	 * Returns a value indicating whether the validator applies to the specified scenario.
	 * A validator applies to a scenario as long as any of the following conditions is met:
	 * <ul>
	 * <li>the validator's "on" property is empty</li>
	 * <li>the validator's "on" property contains the specified scenario</li>
	 * </ul>
	 * @param string scenario name
	 * @return boolean whether the validator applies to the specified scenario.
	 * @since 1.0.2
	 */
	public function applyTo($scenario)
	{
		return empty($this->on) || isset($this->on[$scenario]);
	}

	/**
	 * Adds an error about the specified attribute to the active record.
	 * This is a helper method that performs message selection and internationalization.
	 * @param CModel the data object being validated
	 * @param string the attribute being validated
	 * @param string the error message
	 * @param array values for the placeholders in the error message
	 */
	protected function addError($object,$attribute,$message,$params=array())
	{
		$params['{attribute}']=$object->getAttributeLabel($attribute);
		$object->addError($attribute,strtr($message,$params));
	}
}

