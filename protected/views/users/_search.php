<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="form-group">
			<?php echo $form->label($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $form->label($model,'username'); ?>
			<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $form->label($model,'level'); ?>
			<?php echo $form->dropDownList($model, 'level', CHtml::listData(Users::model()->getLevel(),'id','title'),array('class'=>'form-control','prompt'=>'--- select level ---')); ?>
		</div>
		<div class="form-group">
			<?php echo $form->label($model,'active'); ?>
			<?php echo $form->dropDownList($model, 'active', CHtml::listData(Users::model()->getActive(),'id','title'),array('class'=>'form-control','prompt'=>'--- select active ---')); ?>
		</div>
		<div class="form-group">
			<?php echo $form->label($model,'last_login'); ?>
			<?php echo $form->textField($model,'last_login',array('class'=>'form-control','data-mask'=>'')); ?>
		</div>
		<div class="form-group">
			<?php echo $form->label($model,'created_at'); ?>
			<?php echo $form->textField($model,'created_at',array('class'=>'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $form->label($model,'updated_at'); ?>
			<?php echo $form->textField($model,'updated_at',array('class'=>'form-control')); ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="form-group">
			<?php echo CHtml::submitButton('Search', array('class'=>'btn btn-primary')); ?>
		</div>
	</div>
</div>

<?php $this->endWidget(); ?>
<script>
$(function(){
	 $("#gridview-Users_last_login").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
	 $("#Users_last_login").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
	 $("#Users_created_at").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
	 $("#Users_updated_at").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
	 $("[data-mask]").inputmask();
});
</script>
</div><!-- search-form -->