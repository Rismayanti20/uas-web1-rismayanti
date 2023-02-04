<?php
include('../../connection.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <b>Admin</b>LTE
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <a href="../../../index.html">
          <i class="fas fa-arrow-left"></i>
        </a>
        <p class="login-box-msg">Sign in to start your session</p>

        <form action='' method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" name="login" class="btn btn-primary btn-block" value="Sign In" />
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-5 mb-0 text-center">
          don't have a access? <a href="../register/register.php" class="text-center">Register</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>

</body>

</html>

<?php
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? md5($_POST['password']) : '';
$login = isset($_POST['login']) ? $_POST['login'] : '';

if ($login) {
  $sql = mysqli_query($connect, "SELECT * FROM users WHERE username='$username' AND password='$password'");
  $cek = mysqli_num_rows($sql);
  if ($cek > 0) {
    session_start();
    $row = mysqli_fetch_array($sql);
    $_SESSION['session'] = $row['id'];
    header("location: ../../index.php");
    ?>
    <script type="text/javascript">
      alert("Login Berhasil");
    </script>
  <?php
    exit();
  } else {
    ?>
    <script type="text/javascript">
      alert("Login Gagal");
    </script>
  <?php
  }
}
?>