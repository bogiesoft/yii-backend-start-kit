<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/plugins/font-awesome-4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="<?php echo isset($this->bodyClass) ? $this->bodyClass : 'skin-blue sidebar-mini' ?>">
    <!-- Site wrapper -->
    <div class="wrapper">

      <?php echo $this->renderPartial('/layouts/_header-menu'); ?>

      <!-- Left side column. contains the sidebar -->
      <?php echo $this->renderPartial('/layouts/_main-sidebar'); ?>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->pageTitle; ?>
          </h1>
          <?php if(isset($this->breadcrumbs)):?>
            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links'                => $this->breadcrumbs,
                    'tagName'              => 'ol',
                    'htmlOptions'          => array('class'=>'breadcrumb'),
                    'separator'            => '', // no separator
                    'homeLink'             => '<li>'.CHtml::link('Home', Yii::app()->baseUrl).'</li>',
                    'activeLinkTemplate'   => '<li><a href="{url}">{label}</a></li>',
                    'inactiveLinkTemplate' => '<li class="active">{label}</li>',
                )); ?><!-- breadcrumbs -->
          <?php endif; ?>
          <!-- END Breadcrumb -->
        </section>

        <!-- Main content -->
        <section class="content">

          <?php echo $content; ?>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright © 2014-2015 <a href="<?php echo Yii::app()->baseUrl; ?>"><?php echo Yii::app()->name; ?></a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <script src="<?php echo Yii::app()->baseUrl; ?>/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/plugins/slimScroll/jquery.slimScroll.min.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/plugins/fastclick/fastclick.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/app.min.js"></script>
  </body>
</html>