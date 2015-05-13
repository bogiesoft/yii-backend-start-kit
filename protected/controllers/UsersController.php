<?php

class UsersController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(),
				'users'=>array('*'),
			),*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('password','update','view'),
				'users'=>array('@')
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index', 'admin', 'create', 'delete'),
				'expression'=>'$user->isAdmin()'
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;
		$permissions = new UserPermission;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes       =$_POST['Users'];
			$permissions->attributes =$_POST['UserPermission'];
			$permissionArray 		 = array();

			if($model->validate())
			{
				$model->password = $model->hashPassword($model->username, $model->password);

				if($model->save(false)) {
					// save user has permission
					foreach($permissions->title as $permission => $permissionValue) {
						array_push($permissionArray, array('user_id'=>$model->id, 'user_permission_id'=>$permissionValue));
					}
					if(count($permissionArray) > 0) {
						$builder = Yii::app()->db->schema->commandBuilder;
						$commandUserHasPermission = $builder->createMultipleInsertCommand('user_has_permission', $permissionArray);
						$commandUserHasPermission->execute();
					}
					$this->redirect(array('view','id'=>$model->id));
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'permissions'=>$permissions
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if(!Yii::app()->user->selfOnly($id))
			throw new CHttpException(403,'You are not authorized to perform this action.');

		$model=$this->loadModel($id);
		$permissions = new UserPermission;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes       =$_POST['Users'];
			$permissions->attributes =isset($_POST['UserPermission']) ? $_POST['UserPermission'] : null;
			$permissionArray         = array();

			if($model->save())
			{
				if(isset($permissions->title))
				{
					// delete all user has permission
					$userHasPermissions = UserHasPermission::model()->deleteAll('user_id = :user_id',array('user_id' => $id));
					// save user has permission
					foreach ($permissions->title as $permission => $permissionValue) {
						array_push($permissionArray, array('user_id'=>$model->id, 'user_permission_id'=>$permissionValue));
					}
					if(count($permissionArray) > 0) {
						$builder = Yii::app()->db->schema->commandBuilder;
						$commandUserHasPermission = $builder->createMultipleInsertCommand('user_has_permission', $permissionArray);
						$commandUserHasPermission->execute();
					}
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'permissions'=>$permissions
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		$userHasPermissions = UserHasPermission::model()->deleteAll('user_id = :user_id',array('user_id' => $id));

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$jqueryPath = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('system.web.js.source'));
		Yii::app()->clientScript->registerScriptFile($jqueryPath.'/jquery.ba-bbq.min.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/input-mask/jquery.inputmask.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/input-mask/jquery.inputmask.date.extensions.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/assets/plugins/input-mask/jquery.inputmask.extensions.js',CClientScript::POS_END);
		Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/assets/plugins/datatables/dataTables.bootstrap.css');

		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionPassword($id)
	{
		if(!Yii::app()->user->selfOnly($id))
			throw new CHttpException(403,'You are not authorized to perform this action.');

		$model = new ChangePassword('changePassword');
		// collect user input data
		if(isset($_POST['ChangePassword']))
		{
			$model->attributes=$_POST['ChangePassword'];
			// validate user input and redirect to the previous page if valid
			if($model->validate()){
				$this->redirect(Yii::app()->user->returnUrl);
			}
		}

		$this->render('change_password',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
