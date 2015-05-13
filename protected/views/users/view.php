<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->username,
);
?>

<style>.table tr th {width: 200px; }</style>
<div class="box">
  	<div class="box-header with-border">
    	<h3 class="box-title">View Users #<?php echo $model->id; ?></h3>
    	<div class="box-tool pull-right">
    		<a href="<?php echo Yii::app()->baseUrl; ?>/users/update/<?php echo $model->id; ?>" class="btn btn-box-tool" title="edit"><i class="fa fa-wrench"></i></a>
    	</div>
	</div>
	<div class="box-body table-responsive no-padding">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions' => array(
		        'class' => 'table'
		    ),
			'attributes'=>array(
				'id',
				'email',
				'username',
				// 'password',
				array(
					'name' 		=> 'level',
					'value' 	=> function($data) {
						$levels = CHtml::listData(Users::model()->getLevel(),'id','title');
						return isset($levels[$data->level]) ? $levels[$data->level] : null;
					}
				),
				array(
					'name' 		=> 'active',
					'type' 		=> 'raw',
					'value' 	=> function($data) {
						$actives = CHtml::listData(Users::model()->getActive(),'id','title');
						if(isset($actives[$data->active])) {
							if($data->active == 1)
								return "<span class='text-green'>{$actives[$data->active]}</span>";
							elseif($data->active == 0)
								return $actives[$data->active];
							else
								return null;
						}
					}
				),
				array(
					'name' => 'Permission',
					'value' => function($data) {
						$permissionList = CHtml::listData($data->permissions, 'id', 'title');
						return implode($permissionList, ', ');
					}
				),
				'last_login',
				'created_at',
				'updated_at',
			),
		)); ?>
	</div>
</div>