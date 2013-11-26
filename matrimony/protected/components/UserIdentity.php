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
	public function authenticate()
	{
		$user=MatrimonyUser::model()->find('LOWER(EmailID)=?',array(strtolower($this->username)));
		if($user===null)
		$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!$user->validatePassword($this->password))
		$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else if(!($user->Type==="USR")){
			$this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
		}
		else
		{
			$this->_id=$user->pkUserId;
			$this->setState('role', $user->Type);
			$this->username=$user->EmailID;			
			$this->errorCode=self::ERROR_NONE;
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