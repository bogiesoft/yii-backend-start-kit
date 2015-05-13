<?php

// this file must be stored in:
// protected/components/WebUser.php

class WebUser extends CWebUser {

  	// Store model to not repeat query.
  	private $_model;
    const ADMIN = 1;
    const MODERATOR = 2;

    public function afterLogin($cookie) {
      if(parent::beforeLogout()) {
        $user = $this->loadUser(Yii::app()->user->id);
        $user->last_login=date('Y-m-d H:i:s');
        $user->saveAttributes(array('last_login'));
        return true;
      } else {
        return false;
      }
    }

  	// This is a function that checks the field 'role'
  	// in the User model to be equal to 1, that means it's admin
  	// access it by Yii::app()->user->isAdmin()
  	public function isAdmin(){

    	$user = $this->loadUser(Yii::app()->user->id);
    	return intval($user->level) == self::ADMIN;
  	}

    public function isModerator()
    {
      $user = $this->loadUser(Yii::app()->user->id);
      if($user->level == self::ADMIN)
        return true;
      return intval($user->level) == self::MODERATOR;
    }

    public function canAccess($level)
    {
      if(!Yii::app()->user->isGuest)
      {
        $user = $this->loadUser(Yii::app()->user->id);
        if($user->level == self::ADMIN)
          return true;
        else if(is_integer($level))
          return (intval($user->level) == $level) ? true : false;
        else if(is_array($level))
          return (in_array($user->level, $level)) ? true : false;
      }
      else
        return false;
    }

    public function canPermission($permission)
    {
      $user = $this->loadUser(Yii::app()->user->id);
      if($user->level == self::ADMIN)
        return true;

      $permissions = CHtml::listData($user->permissions,'id','title');
      return in_array($permission, $permissions);
    }


    public function selfOnly($user_id)
    {
      if(!$this->isAdmin() && $this->id != $user_id)
        return false;

      return true;
    }

  	// Load user model.
  	protected function loadUser($id=null)
    {
        if($this->_model===null)
        {
            if($id!==null)
              $this->_model=Users::model()->findByPk($id);
        }
        return $this->_model;
    }


}
?>