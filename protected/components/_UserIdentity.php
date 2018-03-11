<?php
class UserIdentity extends CUserIdentity
{
    private $_id;
    const   ERROR_USUARIO_INACIVO=3;
    public function authenticate(){
    $record=VistaUsuariosEnSistema::model()->findByAttributes(array('str_nombreusuario'=>$this->username,'int_idsistema'=>'4'));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->str_contrasena!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else if (!$record->bol_estado)
             $this->errorCode=self::ERROR_USUARIO_INACIVO;
        else{
            $cedula = substr($record->str_cedula,2,strlen($record->str_cedula));
            $this->_id=$record->seq_idusuario;
            $this->setState('id',$this->_id);
            $this->setState('nombres', $record->str_nombre);
            $this->setState('apellidos', $record->str_apellido);
            $this->setState('cedula', $cedula);
            $this->setState('codempleado',str_pad($cedula,10,'0',STR_PAD_LEFT));
            $this->setState('unidad', 'No especificado');
            $this->setState('cambiar_clave', $record->bol_cambiar_clave);
            $this->setState('nombre',$record->str_nombreusuario);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }


    public function getId(){
        return $this->_id;
    }
}
