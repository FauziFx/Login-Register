<?php  

  require_once 'core/init2.php';

  if ( !Session::exists('username') ) {
    Redirect::to('login');
  }

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <!-- Skin Blue -->
  <link rel="stylesheet" href="assets/css/skins/skin-blue.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="assets/css/sweetalert.css">
  <!-- Favicon -->
  <!-- <link rel="shortcut icon" href="../assets/img/favicon.png"> -->

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <!-- REQUIRED JS SCRIPTS -->
  <!-- jQuery -->
  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/app.min.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="assets/img/avatar.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">
                <?php  
                  $name = $user->get_user( 'username', Session::get('username') );
                  echo $name['name'];
                ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="assets/img/avatar.png" class="img-circle" alt="User Image">
                <p>
                  <?=$name['name']; ?></p>
                  <small><i class="fa fa-circle text-success"></i> Online</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" data-toggle="control-sidebar" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                <form action="" method="post">
                  <input type="submit" name="logout" value="Sign Out" class="btn btn-default btn-flat">
                </form>
                  <?php  
                    if(Input::get('logout')){
                      session_destroy();
                      Redirect::to('login');
                    }
                  ?>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$name['name']; ?></p>
          <!-- Status -->
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li id="dashboard" class="">
          <a href="?p=dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li id="data" class="">
          <a href="">
            <i class="fa fa-database"></i> <span>Data Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=data_siswa"><i class="fa fa-circle-o"></i> Siswa</a></li>
            <li><a href="?p=data_jurusan"><i class="fa fa-circle-o"></i> Jurusan</a></li>
            <li><a href="?p=data_angkatan"><i class="fa fa-circle-o"></i> Angkatan</a></li>
          </ul>
        </li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Comming soon</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Comming soon</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Comming soon</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
  

  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      [ ] dengan <span>❤</span> di Cirebon
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?=date('Y') ?> <a href="https://fauzifx.github.io/">Karya Saya</a>.</strong> 
    All rights reserved.
    <strong> AdminLTE</strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#profil-tab" data-toggle="tab"><i class="fa fa-users"></i></a></li>
      <li><a href="#settings-tab" data-toggle="tab"><i class="fa fa-user-plus"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="profil-tab">
        <h3 class="control-sidebar-heading">&nbsp;<b>Admin</b></h3>
        <ul class="control-sidebar-menu" id="admin-view">
          <?php include 'ajax/ajax-admin-view.php'; ?>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="settings-tab">
        <h3 class="control-sidebar-heading"><b>Tambah Admin</b></h3>
        <small>* wajib diisi!!</small>
        <form method="post" id="form-add-admin">
          <div class="form-group">
            <label for="nama">Nama Lengkap *</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" id="name">
          </div>
          <div class="form-group">
            <label for="user">Username *</label>
            <input type="text" class="form-control" name="user" placeholder="Username" id="user">
          </div>
          <div class="form-group">
            <label for="pass">Password *</label>
            <input type="password" class="form-control" name="pass" placeholder="Password" id="pass">
          </div>
          <div class="form-group">
            <label for="pass">Password Verify *</label>
            <input type="password" class="form-control" name="pass" placeholder="Password" id="pass_verify">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" placeholder="mail@mail.com" id="mail">
          </div>
        </form>

        <button type="button" class="btn btn-primary btn-flat" style="float: left" id="btn-add-admin">
          Tambah
        </button>
        <div id="load-add-admin">&nbsp;&nbsp;&nbsp;Loading...</div>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper --> 

<!-- Modal -->

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Form Ubah Data</h4>
        <img src="assets/img/loading.gif" alt="" id="load-edit-admin" style="height: 45px;">
      </div>
      <div class="modal-body">
        <form method="post" id="form-edit-admin">
          <input type="hidden" id="_id">
          <div class="form-group">
            <label for="">Nama</label>
            <input class="form-control" type="text" id="_name" placeholder="Nama">
          </div>
          <div class="form-group">
            <label for="">Username</label>
            <input class="form-control" type="text" id="_user" placeholder="Username" disabled="">
          </div>
          <div class="form-group">
            <label for="">Password lama</label>
            <input class="form-control" type="password" id="pass_lama" placeholder="Password lama">
          </div>
          <div class="form-group">
            <label for="">Password baru</label>
            <input class="form-control" type="password" id="pass_baru" placeholder="Password baru">
          </div>
          <div class="form-group">
            <label for="">Password baru verifikasi</label>
            <input class="form-control" type="password" id="pass_verif" placeholder="Password baru">
            <small id="wrong-pass">Password Verifikasi salah!</small>
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input class="form-control" type="email" id="_mail" placeholder="Email">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-flat" id="btn-edit-admin">Edit</button>
        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div> <!-- /Edit -->

<!-- Modal Delete -->
<div class="modal fade" id="delete">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Konfirmasi</h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="id_user">
        <div>Apakah anda yakin ingin menghapus data ini?</div>
        <img src="assets/img/loading.gif" alt="" id="load-delete-admin" style="height: 45px;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat" id="btn-delete-admin">Ya</button>
        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div> <!-- /Delete -->
<!-- /Modal -->

<!-- Sweet Alert -->
<script src="assets/js/sweetalert.min.js"></script>
<!-- Ajax -->
<script src="assets/js/ajax-admin.js"></script>

</body>
</html>