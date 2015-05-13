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
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$username = strtolower($this->username);

		$user = Users::model()->find(new CDbCriteria(array(
			'condition' => 'username LIKE :username OR email LIKE :email AND active = :active',
			'params' => array(':username' => $username, ':email' => $username, ':active' => 1)
		)));
		$hashPassword = Users::model()->hashPassword($user->username, $this->password);
		if($user === null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if(!(Users::model()->validatePassword($hashPassword, $user->password)))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else {
			$this->_id = $user->id;
			$this->username = $user->username;
			$this->errorCode=self::ERROR_NONE;

			Yii::app()->session['user'] = $user->username;
			Yii::app()->session['level']= $user->level;
		}

		return $this->errorCode;
	}

	public function getId()
    {
        return $this->_id;
    }
}