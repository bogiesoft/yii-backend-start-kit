<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$boxTitle = "Create Users";
// die(var_dump($model->scenario));
?>

<?php $this->renderPartial('_form', array('model'=>$model,'permissions'=>$permissions,'boxTitle'=>$boxTitle)); ?>