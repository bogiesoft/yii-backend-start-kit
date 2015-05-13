<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$boxTitle = "Update Users #{$model->id}";

/*$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);*/
?>

<?php $this->renderPartial('_form', array('model'=>$model,'permissions'=>$permissions,'boxTitle'=>$boxTitle)); ?>