<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;

    public function authenticate()
    {
        $user = Usuario::model()->findByAttributes(array('email'=>$this->username));

        if($user===null) {
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        } else if(!(md5($user->senha) === md5($this->password))) {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id=$user->id;
            $this->username=$user->email;
            $this->setState('email', $user->email);

            $this->errorCode=self::ERROR_NONE;
        }
        return $this->errorCode==self::ERROR_NONE;
    }

    public function getId()
    {
        return $this->_id;
    }
}