<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="col-xs-12 col-md-6">
		<div class="box">
			<div class="box-header with-border">
		    	<h3 class="box-title"><?php echo $boxTitle; ?></h3>
			</div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'users-form',
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
						<?php echo $form->labelEx($model,'email', array('class'=>'col-xs-12 col-sm-4 control-label')); ?>
						<div class="col-xs-12 col-sm-8">
							<?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo $form->labelEx($model,'username', array('class'=>'col-xs-12 col-sm-4 control-label')); ?>
						<div class="col-xs-12 col-sm-8">
							<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
						</div>
					</div>

					<?php if($model->isNewRecord): ?>
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
					<?php endif;?>

					<?php if(Yii::app()->user->isAdmin()): ?>
					<div class="form-group">
						<?php echo $form->labelEx($model,'level', array('class'=>'col-xs-12 col-sm-4 control-label')); ?>
						<div class="col-xs-12 col-sm-8">
							<?php echo $form->dropDownList($model,'level',
								CHtml::listData(Users::model()->getLevel(), 'id', 'title'),
								array('class'=>'form-control')
							); ?>
						</div>
					</div>

					<div class="form-group">
						<?php echo $form->labelEx($model,'active', array('class'=>'col-xs-12 col-sm-4 control-label')); ?>
						<div class="col-xs-12 col-sm-8">
							<?php echo $form->dropDownList($model,'active',
								CHtml::listData(Users::model()->getActive(), 'id', 'title'),
								array('class'=>'form-control')
							); ?>
						</div>
					</div>

					<div class="form-group">
						<label class="col-xs-12 col-sm-4 control-label">Permission</label>
						<div class="col-xs-12 col-sm-8">
							<?php
								$userPermission = CHtml::listData(UserPermission::model()->findAll(), 'id', 'title');
								if($model->isNewRecord) {
									echo $form->checkBoxList($permissions,'title',$userPermission,array('labelOptions'=> array('style'=>'font-weight:normal')));
								} else {
									$select_keys = array_keys(CHtml::listData($model->permissions, 'id', 'id'));
									echo CHtml::checkBoxList('UserPermission[title]',$select_keys,$userPermission);
								}
							?>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<div class="box-footer">
					<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'btn btn-primary')); ?>
					<button class="btn btn-default" type="reset">Reset</button>
				</div>

			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>