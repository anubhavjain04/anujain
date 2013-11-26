<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;

	/**
	 * Authenticates a user.
	 * @return boolean whether authentication succeeds.
	 */
	public $user;
	
	public function authenticate()
	{
		$user=User::model()->find('LOWER(UserId)=?',array(strtolower($this->username)));
		if($user===null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
			unset(Yii::app()->session['currentUser']);
		}
		else if(!$user->validatePassword($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
			unset(Yii::app()->session['currentUser']);
		}
		else if(!($user->Type==="USR") || !(trim($user->Status)==1)){
			$this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
			unset(Yii::app()->session['currentUser']);
		}
		else
		{
			$this->_id=$user->pkLoginId;
			$this->username=$user->UserId;
			$this->errorCode=self::ERROR_NONE;
			Yii::app()->session['currentUser'] = $user;
		}
		return $this->errorCode==self::ERROR_NONE;
	}

	/**
	 * @return integer the ID of the user record
	 */
	public function getId()
	{
		return $this->_id;
	}
	
	
}