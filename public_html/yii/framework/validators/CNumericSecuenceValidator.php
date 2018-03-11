<?php

class CNumericSecuenceValidator extends CValidator{

    protected function validateAttribute($object,$attribute)	{
        $value =  settype($object->$attribute,"array");
        $longitud = strlen($value);        
        $es_secuencia=false;
        //$siguiente = array();
        //$valor = array();
        for($i=0;$i<$longitud;$i++){
            $siguiente = $value[$i+1];
            $valor = $value[$i]+1;
             if ($siguiente!=null || $siguiente!="" ){                   
               if ($siguiente == $valor)                    
                    $es_secuencia = true;
                else{
                    $es_secuencia = false;
                    break;
                }
             }
         }


       /* if($es_secuencia){
            $message=$this->message!==null?$this->message:Yii::t('yii','{attribute} No puede ser una Secuencia Numerica. Evite valores consecutivos como: 1234');
			$this->addError($object,$attribute,$message);
		}*/
    }
}
?>
