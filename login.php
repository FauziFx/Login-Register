<?php  
require_once 'core/init2.php';

if ( Session::exists('username') ) {
  Redirect::to('index');
}

if( Input::get('submit') ){
  if( Token::check(Input::get('token')) ){
    if($user->cek_nama(Input::get('username'))){
      if($user->login_user( Input::get('username'), Input::get('password') )){
        Session::set('username', Input::get('username'));
        Redirect::to('index');
      }else{
        echo "<script>alert('Password Salah!!')</script>";
      }
    } else {
      echo "<script>alert('Username belum terdaftar!!')</script>";
    }
  }// End Token
}// End input


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
  <!-- Sweet alert -->
  <link rel="stylesheet" href="assets/css/sweetalert.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries
  WARNING: Respond.js doesn't work if you view the page via file://
  [if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif] -->

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
 <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <form action="" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required="required" autofocus="">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
          <input type="submit" name="submit" class="btn btn-primary btn-block btl-flat" value="Sign In" id="submit">
        </div>
        <!-- /.col -->
     </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Sweet alert -->
<script src="assets/js/sweetalert.min.js"></script>
</body>
</html>
