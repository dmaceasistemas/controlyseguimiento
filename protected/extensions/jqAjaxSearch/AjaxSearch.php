<?php
/*
by Paul
inspired from http://www.ibm.com/developerworks/opensource/library/os-php-jquery-ajax/index.html by Thomas Myer
*/
class AjaxSearch extends CWidget {
	public $action = '';
	public $target = '';
	public $minChar = 1;
	private $id = '';
	
    public function init()
    {
   	
    	if(empty($this->id)){
            $this->id = 'ltjqas'.rand(1, 1000);
        }
        $this->registerClientScript();
        parent::init();
    }

    protected function registerClientScript()
    {
    	$juiBaseUrl=Yii::app()->getAssetManager()->publish(dirname(__FILE__).'/'.'js');
    	
        $cs=Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');
        //$cs->registerCoreScript('jquery.form.js');
        $cs->registerScriptFile($juiBaseUrl.'/jquery.form.js');
    }

    public function run()
    {
    	Yii::app()->clientScript->registerScript('searchEnabler'.$this->id, 
        	'$("#'.$this->target.'").slideUp();$("#search_term'.$this->id.'").keyup(function(e){e.preventDefault(); '.
        	'if($("#search_term'.$this->id.'").val().length >= '.$this->minChar.') '.
        	'$("#searchform'.$this->id.'").ajaxSubmit({ target: "#'.$this->target.'" }); '.
        	'else $("#'.$this->target.'").html("");});',
            CClientScript::POS_READY);
            
        $this->render('view',array('action'=>$this->action, 'target'=>$this->target, 'id'=>$this->id));
    }
   
}