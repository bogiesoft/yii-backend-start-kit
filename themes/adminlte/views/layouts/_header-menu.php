<header class="main-header">
  <a href="<?php echo Yii::app()->baseUrl; ?>" class="logo"><?php echo CHtml::encode(Yii::app()->name); ?></a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i>
            <span class="hidden-xs"><?php echo Yii::app()->user->name; ?></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo Yii::app()->baseUrl; ?>/users/<?php echo Yii::app()->user->id; ?>">Profile</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo Yii::app()->baseUrl; ?>/users/update/<?php echo Yii::app()->user->id; ?>">Edit Profile</a></li>
            <li><a href="<?php echo Yii::app()->baseUrl; ?>/users/password/<?php echo Yii::app()->user->id; ?>">Change Password</a></li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <a href="<?php echo Yii::app()->baseUrl; ?>/site/signout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>