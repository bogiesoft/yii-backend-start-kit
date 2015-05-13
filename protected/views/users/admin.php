<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="box">
  	<div class="box-header with-border">
    	<h3 class="box-title">Manage Users</h3>
	</div>
	<div class="box-body">
		<a class="search-button" href="#" title="click to toggle"><i class="fa fa-search"></i> Advanced Search</a>
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'               	=> 'users-grid',
			'dataProvider'     	=> $model->search(),
			'filter'           	=> $model,
			'enablePagination' 	=> true,
			'itemsCssClass' 	=> 'table table-bordered table-striped dataTable',
			'htmlOptions' 		=> array(
		        'class' => 'table-responsive dataTables_wrapper form-inline'
		    ),
		    'summaryCssClass' 	=> 'dataTables_info',
			'summaryText'     	=> 'Showing {start} to {end} of {count} entries',
			'pagerCssClass'   	=> 'dataTables_paginate paging_bootstrap',
			'template'        	=> '{summary}{items}<div class="row"><div class="col-xs-6">{summary}</div><div class="col-xs-6">{pager}</div></div>',
			'afterAjaxUpdate' 	=> 'function(id, data){$("#gridview-Users_last_login").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"})}',
		    'pager' =>array(
		        'header' 		=> '',
		        'htmlOptions' 	=> array('class'=>'pagination'),
				'firstPageLabel'       => '&lt;&lt;',
				'prevPageLabel'        => '&lt;',
				'nextPageLabel'        => '&gt;',
				'lastPageLabel'        => '&gt;&gt;',
				'selectedPageCssClass' => 'active'
		    ),
			'columns'=>array(
				array(
					'header' => '#',
					'value'  => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		    	),
				'email',
				'username',
				// 'password',
				array(
					'name' 		=> 'level',
					'filter' 	=> CHtml::activeDropDownList($model, 'level', CHtml::listData(Users::model()->getLevel(),'id','title'), array('prompt'=> '--- select level ---')),
					'value' 	=> function($data, $row) {
						$levels = CHtml::listData(Users::model()->getLevel(),'id','title');
						return isset($levels[$data->level]) ? $levels[$data->level] : null;
					}
				),
				array(
					'name' 		=> 'active',
					'type' 		=> 'raw',
					'filter' 	=> CHtml::activeDropDownList($model, 'active', CHtml::listData(Users::model()->getActive(), 'id', 'title'), array('prompt'=>'--- select active ---')),
					'value' 	=> function($data, $row) {
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
					'name' 		=> 'last_login',
					'filter' 	=> CHtml::activeTextField($model, 'last_login', array('id'=>'gridview-Users_last_login'))
				),
				// 'created_at',
				// 'updated_at',

				array(
					'class' 	=> 'CButtonColumn',
		            'template' 	=>
		            '
		            <div class="dropdown text-center">
					  	<button id="dLabel" class="btn bg-orange" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></button>
					  	<ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
						    <li>{view}</li>
						    <li>{update}</li>
						    <li>{delete}</li>
					  	</ul>
					</div>
					',
					'viewButtonImageUrl'   => false,
					'updateButtonImageUrl' => false,
					'deleteButtonImageUrl' => false,
		            'buttons' => array(
		            	'view' => array(
							'label'   => '<i class="fa fa-search"></i> View',
							'options' => array('title'=>'view')
		            	),
		            	'update' => array(
							'label'   => '<i class="fa fa-wrench"></i> Edit',
							'options' => array('title'=>'Edit')
		            	),
		            	'delete' => array(
							'label'   => '<i class="fa fa-trash"></i> Delete',
							'options' => array('title'=>'delete')
		            	),
		            ),
				),
			),
		)); ?>
	</div>
</div>
