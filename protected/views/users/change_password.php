<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	Yii::app()->user->id=>array('view','id'=>Yii::app()->user->id),
	'Change Password',
);
?>
<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="box">
			<div class="box-header with-border">
		    	<h3 class="box-title">Change Password</h3>
			</div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'change-password-form',
				'htmlOptions' => array('class'=>'form-horizontal'),
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation'=>false,
			)); ?>
				<div class="box-body">
					<?php
					if($model->hasErrors()):
			    		echo '<div class="alert alert-danger">' . $form->errorSummary($model) . '</div>';
				    endif;
				    if(Yii::app()->user->hasFlash('error')):
				    	echo '<div class="alert alert-danger">' . Yii::app()->user->getFlash('error') . '</div>';
				   	endif;
				    ?>

					<div class="form-group">
						<?php echo $form->labelEx($model,'password', array('class'=>'col-xs-12 col-sm-4 control-label')); ?>
						<div class="col-xs-12 col-sm-8">
							<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model,'password_repeat', array('class'=>'col-xs-12 col-sm-4 control-label')); ?>
						<div class="col-xs-12 col-sm-8">
							<?php echo $form->passwordField($model,'password_repeat',array('class'=>'form-control')); ?>
						</div>
					</div>
					<div class="form-group">
						<?php echo $form->labelEx($model,'password_old', array('class'=>'col-xs-12 col-sm-4 control-label')); ?>
						<div class="col-xs-12 col-sm-8">
							<?php echo $form->passwordField($model,'password_old',array('class'=>'form-control')); ?>
						</div>
					</div>
				</div>

				<div class="box-footer">
					<?php echo CHtml::submitButton('Save', array('class'=>'btn btn-primary')); ?>
					<button class="btn btn-default" type="reset">Reset</button>
				</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>