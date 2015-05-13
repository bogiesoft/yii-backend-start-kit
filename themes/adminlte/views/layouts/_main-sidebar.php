<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <?php
      $this->widget('zii.widgets.CMenu',array(
        // 'linkLabelWrapper' => 'span',
        'htmlOptions' => array('class'=>'sidebar-menu'),
        'encodeLabel' => false,
        'submenuHtmlOptions' => array('class' => 'treeview-menu'),
        'items'=>array(
          array('label'=>'MAIN NAVIGATION', 'itemOptions' => array('class' => 'header')),
          array('label'=>'Item', 'url'=>'javascript::;'),
          array('label'=>'Item', 'url'=>'javascript::;'),
          array('label'=>'<span>User</span> <i class="fa fa-angle-left pull-right"></i>', 'url'=>array('#'),'active'=>$this->id=='users'?true:false,'visible'=>Yii::app()->user->isAdmin(),
            'itemOptions'=>
              array('class'=>'treeview'),
              'items'=> array(
                array('label' => 'Manage', 'url' => array('/users'), 'active'=>$this->action->id=='index'?true:false),
                array('label' => 'Create', 'url' => array('/users/create'), 'active'=>$this->action->id=='create'?true:false),
              )
          ),
        ),
      ));
    ?>
  </section>
  <!-- /.sidebar -->
</aside>