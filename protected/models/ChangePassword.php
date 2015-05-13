<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ChangePassword extends CFormModel
{
	public $password;
	public $password_repeat;
	public $password_old;

	/**
	 * Declares the validation rules.
	 * The rules state that password and password_repeat are required,
	 * and password_repeat needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// password, password_repeat and password_old are required
			array('password, password_repeat, password_old', 'required'),
			array('password_repeat', 'compare', 'compareAttribute' => 'password', 'message'=>"Password and Confirm Password don't match",'on'=>'changePassword'),
			// password_repeat needs to be authenticated
			array('password_old', 'authenticate'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'password' => 'New Password',
			'password_repeat' => 'Confirm Password',
			'password_old' => 'Old Password',
		);
	}

	/**
	 * Authenticates the password old.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		$user = Users::model()->findByPk(Yii::app()->user->id);
		$password = Users::model()->hashPassword($user->username, $this->password_old);

		if(Users::model()->validatePassword($password, $user->password)) {
			$user->password = Users::model()->hashPassword($user->username, $this->password);
			return $user->save();
		} else {
			$this->addError('password_old',"Old Password don't match in system");
		}
	}
}
