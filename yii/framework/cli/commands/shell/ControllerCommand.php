<?php
/**
 * ControllerCommand class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2009 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 * @version $Id: ControllerCommand.php 930 2009-04-11 02:28:31Z qiang.xue@gmail.com $
 */

/**
 * ControllerCommand generates a controller class.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: ControllerCommand.php 930 2009-04-11 02:28:31Z qiang.xue@gmail.com $
 * @package system.cli.commands.shell
 * @since 1.0
 */
class ControllerCommand extends CConsoleCommand
{
	/**
	 * @var string the template file for the controller class.
	 * Defaults to null, meaning using 'framework/cli/views/shell/controller/controller.php'.
	 */
	public $templateFile;

	public function getHelp()
	{
		return <<<EOD
USAGE
  controller <controller-ID> [action-ID] ...

DESCRIPTION
  This command generates a controller and views associated with
  the specified actions.

PARAMETERS
 * controller-ID: required, controller ID, e.g., 'post'.
   If the controller should be located under a subdirectory,
   please specify the controller ID as 'path/to/ControllerID',
   e.g., 'admin/user'.

   If the controller belongs to a module, please specify
   the controller ID as 'ModuleID/ControllerID' or
   'ModuleID/path/to/Controller' (assuming the controller is
   under a subdirectory of that module).

 * action-ID: optional, action ID. You may supply one or several
   action IDs. A default 'index' action will always be generated.

EXAMPLES
 * Generates the 'post' controller:
        controller post

 * Generates the 'post' controller with additional actions 'contact'
   and 'about':
        controller post contact about

 * Generates the 'post' controller which should be located under
   the 'admin' subdirectory of the base controller path:
        controller admin/post

 * Generates the 'post' controller which should belong to
   the 'admin' module:
        controller admin/post

NOTE: in the last two examples, the commands are the same, but
the generated controller file is located under different directories.
Yii is able to detect whether 'admin' refers to a module or a subdirectory.

EOD;
	}

	/**
	 * Execute the action.
	 * @param array command line parameters specific for this command
	 */
	public function run($args)
	{
		if(!isset($args[0]))
		{
			echo "Error: controller name is required.\n";
			echo $this->getHelp();
			return;
		}

		$module=Yii::app();
		$controllerID=$args[0];
		if(($pos=strrpos($controllerID,'/'))===false)
		{
			$controllerClass=ucfirst($controllerID).'Controller';
			$controllerFile=$module->controllerPath.DIRECTORY_SEPARATOR.$controllerClass.'.php';
			$controllerID[0]=strtolower($controllerID[0]);
		}
		else
		{
			$last=substr($controllerID,$pos+1);
			$last[0]=strtolower($last);
			$pos2=strpos($controllerID,'/');
			$first=substr($controllerID,0,$pos2);
			$middle=$pos===$pos2?'':substr($controllerID,$pos2+1,$pos-$pos2);

			$controllerClass=ucfirst($last).'Controller';
			$controllerFile=($middle===''?'':$middle.'/').$controllerClass.'.php';
			$controllerID=$middle===''?$last:$middle.'/'.$last;
			if(($m=Yii::app()->getModule($first))!==null)
				$module=$m;
			else
			{
				$controllerFile=$first.'/'.$controllerClass;
				$controllerID=$first.'/'.$controllerID;
			}

			$controllerFile=$module->controllerPath.DIRECTORY_SEPARATOR.str_replace('/',DIRECTORY_SEPARATOR,$controllerFile);
		}

		$args[]='index';
		$actions=array_unique(array_splice($args,1));

		$templateFile=$this->templateFile===null?YII_PATH.'/cli/views/shell/controller/controller.php':$this->templateFile;

		$list=array(
			basename($controllerFile)=>array(
				'source'=>$templateFile,
				'target'=>$controllerFile,
				'callback'=>array($this,'generateController'),
				'params'=>array($controllerClass, $actions),
			),
		);

		$viewPath=$module->viewPath.DIRECTORY_SEPARATOR.str_replace('/',DIRECTORY_SEPARATOR,$controllerID);
		foreach($actions as $name)
		{
			$list[$name.'.php']=array(
				'source'=>YII_PATH.'/cli/views/shell/controller/view.php',
				'target'=>$viewPath.DIRECTORY_SEPARATOR.$name.'.php',
			);
		}

		$this->copyFiles($list);

		if($module instanceof CWebModule)
			$moduleID=$module->id.'/';
		else
			$moduleID='';

		echo <<<EOD

Controller '{$controllerID}' has been created in the following file:
    $controllerFile

You may access it in the browser using the following URL:
    http://hostname/path/to/index.php?r={$moduleID}{$controllerID}

EOD;
	}

	public function generateController($source,$params)
	{
		list($className,$actions)=$params;
		$content=file_get_contents($source);
		$actionTemplate=<<<EOD

	public function action{Name}()
	{
		\$this->render('{View}');
	}

EOD;
		$actionCode='';
		foreach($actions as $name)
			$actionCode.=strtr($actionTemplate,array('{Name}'=>ucfirst($name),'{View}'=>$name));
		return strtr($content,array(
			'{ClassName}'=>$className,
			'{Actions}'=>$actionCode));
	}
}