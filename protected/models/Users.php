<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $email
 * @property string $username
 * @property string $password
 * @property integer $level
 * @property integer $active
 * @property string $last_login
 * @property string $created_at
 * @property string $updated_at
 */
class Users extends CActiveRecord
{
	public $password_repeat;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email','email'),
			array('email, username', 'required'),
			array('email, username', 'unique'),
			array('password', 'required', 'on'=>'insert'),
			array('password_repeat', 'compare', 'compareAttribute' => 'password', 'message'=>"Passwords don't match",'on'=>'insert'),
			array('level, active', 'numerical', 'integerOnly'=>true),
			array('email, username, password', 'length', 'max'=>100),
			array('last_login, created_at, updated_at', 'safe'),
			array('updated_at','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'update'),
			array('created_at','default','value'=>new CDbExpression('NOW()'),'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, username, password, level, active, last_login, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/*public function beforeSave()
	{
		$this->password = $this->hashPassword($this->username, $this->password);
		return true;
	}*/

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'permissions'=>array(self::MANY_MANY, 'UserPermission', 'user_has_permission(user_id, user_permission_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'username' => 'Username',
			'password_repeat' => 'Confirm Password',
			'password' => 'Password',
			'level' => 'Level',
			'active' => 'Active',
			'last_login' => 'Last Login',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('level','<> '.WebUser::ADMIN);
		$criteria->compare('active',$this->active);
		$criteria->compare('DATE_FORMAT(last_login, "%Y-%m-%d")',$this->last_login,true);
		$criteria->compare('DATE_FORMAT(created_at, "%Y-%m-%d")',$this->created_at,true);
		$criteria->compare('DATE_FORMAT(updated_at, "%Y-%m-%d")',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function getActive()
	{
		return array(
			array('id'=>0,'title'=>'Inactive'),
			array('id'=>1,'title'=>'Active'),
		);
	}

	public function getLevel()
	{
		return array(
			array('id'=>1,'title'=>'Admin'),
			array('id'=>2,'title'=>'Moderator'),
		);
	}

	public function hashPassword($salt, $password)
	{
		return sha1(md5(trim($salt.$password)));
	}

	public function validatePassword($password, $storePasswrod)
	{
		if($password != $storePasswrod)
			return false;

		return true;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
