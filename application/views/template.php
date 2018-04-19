 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>checkin|dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <!-- <link rel="stylesheet" href="<?php echo base_url();?>/assets/dist/css/skins/_all-skins.min.css"> -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/skin-green.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="<?php echo base_url();?>assets/plugins/datatables2/css/buttons.dataTables.min.css">  
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- daterangepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>


<!-- AdminLTE for highchart -->
<script src="<?php echo base_url();?>assets/dist/js/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/highcharts-3d.js"></script>
<script src="<?php echo base_url();?>assets/dist/js/exporting.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables2/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables2/js/jszip.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/plugins/datatables2/js/pdfmake.min.js"></script> -->
<script src="<?php echo base_url();?>assets/plugins/datatables2/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/plugins/datatables2/js/buttons.html5.min.js"></script>


</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>CO</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MCO</b>JAYA</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!--   <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs ">Sign Out<i class="fa fa-angle-down pull-down"></i></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <!--   <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li >
          <a href="<?php echo site_url('Dashboard');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>IPKonter</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url("Konter/kota/CT1"); ?>"><i class="fa fa-circle-o"></i>CT1</a></li>
            <li><a href="<?php echo site_url("Konter/kota/DJB"); ?>"><i class="fa fa-circle-o"></i>DJB</a></li>
            <li><a href="<?php echo site_url("Konter/kota/HLP"); ?>"><i class="fa fa-circle-o"></i>HLP</a></li>
            <li><a href="<?php echo site_url("Konter/kota/CT3"); ?>"><i class="fa fa-circle-o"></i>CT3</a></li>
            <li><a href="<?php echo site_url("Konter/kota/PLM"); ?>"><i class="fa 
              fa-circle-o"></i>PLM</a></li>
              <li><a href="<?php echo site_url("Konter/kota/PNK"); ?>"><i class="fa fa-circle-o"></i>PNK</a></li>
              <li><a href="<?php echo site_url("Konter/kota/PDG"); ?>"><i class="fa fa-circle-o"></i>PDG</a></li>
              <li><a href="<?php echo site_url("Konter/kota/PGK"); ?>"><i class="fa fa-circle-o"></i>PGK</a></li>
              <li><a href="<?php echo site_url("Konter/kota/PKU"); ?>"><i class="fa fa-circle-o"></i>PKU</a></li>
              <li><a href="<?php echo site_url("Konter/kota/BDO"); ?>"><i class="fa fa-circle-o"></i>BDO</a></li>
              <li><a href="<?php echo site_url("Konter/kota/KNO"); ?>"><i class="fa fa-circle-o"></i>KNO</a></li>
              <li><a href="<?php echo site_url("Konter/kota/DTB"); ?>"><i class="fa fa-circle-o"></i>DTB</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-briefcase"></i>
            <span>DKios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url("SelfCheckin/kota/CT1"); ?>"><i class="fa fa-circle-o"></i>CT1</a></li>
            <li><a href="<?php echo site_url("SelfCheckin/kota/DJB"); ?>"><i class="fa fa-circle-o"></i>DJB</a></li>
            <li><a href="<?php echo site_url("SelfCheckin/kota/HLP"); ?>"><i class="fa fa-circle-o"></i>HLP</a></li>
            <li><a href="<?php echo site_url("SelfCheckin/kota/CT3"); ?>"><i class="fa fa-circle-o"></i>CT3</a></li>
            <li><a href="<?php echo site_url("SelfCheckin/kota/PLM"); ?>"><i class="fa 
              fa-circle-o"></i>PLM</a></li>
              <li><a href="<?php echo site_url("SelfCheckin/kota/PNK"); ?>"><i class="fa fa-circle-o"></i>PNK</a></li>
              <li><a href="<?php echo site_url("SelfCheckin/kota/PDG"); ?>"><i class="fa fa-circle-o"></i>PDG</a></li>
              <li><a href="<?php echo site_url("SelfCheckin/kota/PGK"); ?>"><i class="fa fa-circle-o"></i>PGK</a></li>
              <li><a href="<?php echo site_url("SelfCheckin/kota/PKU"); ?>"><i class="fa fa-circle-o"></i>PKU</a></li>
              <li><a href="<?php echo site_url("SelfCheckin/kota/BDO"); ?>"><i class="fa fa-circle-o"></i>BDO</a></li>
              <li><a href="<?php echo site_url("SelfCheckin/kota/KNO"); ?>"><i class="fa fa-circle-o"></i>KNO</a></li>
              <li><a href="<?php echo site_url("SelfCheckin/kota/DTB"); ?>"><i class="fa fa-circle-o"></i>DTB</a></li>

          </ul>
        </li>
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <?php echo $contents; ?>
    
    <!-- .content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="http://mcojaya.com">MCOJAYA</a>.</strong> All rights
    reserved.
  </footer>

  
</div>
<!-- ./wrapper -->


</body>
</html>
