<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl; ?>/plugins/font-awesome-4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <!-- Site wrapper -->
    <div class="wrapper">
      <?php echo $content; ?>
    </div>

    <script src="<?php echo Yii::app()->baseUrl; ?>/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="<?php echo Yii::app()->baseUrl; ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>