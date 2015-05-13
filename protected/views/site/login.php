<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
?>

<div class="login-box">
  	<div class="login-logo">
    	<a href=""><?php echo CHtml::encode(Yii::app()->name); ?></a>
  	</div><!-- /.login-logo -->
  	<div class="login-box-body">
	    <p class="login-box-msg">Sign in to start your session</p>
	    <?php
    	$form=$this->beginWidget('CActiveForm', array(
	        'id'=>'loginForm',
	        'htmlOptions'=>array(
	            // 'class'=>'form-inline',
	        ),
	    ));

	    if($model->hasErrors()):
    		echo '<div class="alert alert-danger">' . $form->errorSummary($model) . '</div>';
	    endif;
	    ?>
	      	<div class="form-group has-feedback">
				<?php echo $form->textField($model,'email',array('id'=>'email','class'=>'form-control','placeholder'=>'Email or Username','autofocus'=>'autofocus')); ?>
	        	<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
	      	</div>
	      	<div class="form-group has-feedback">
				<?php echo $form->passwordField($model,'password',array('id'=>'password','class'=>'form-control','placeholder'=>'Password')); ?>
	        	<span class="glyphicon glyphicon-lock form-control-feedback"></span>
	      	</div>
	      	<div class="row">
	        	<div class="col-xs-8">
		          	<div class="checkbox icheck">
		            	<label>
		              		<?php echo $form->checkBox($model, 'rememberMe', array('value'=>1)); ?> Remember Me
		            	</label>
		          	</div>
		        </div><!-- /.col -->
		        <div class="col-xs-4">
		          	<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
		        </div><!-- /.col -->
	      	</div>
	    <?php $this->endWidget(); ?>
  	</div><!-- /.login-box-body -->
</div><!-- /.login-box -->