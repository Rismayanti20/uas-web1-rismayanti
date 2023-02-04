<?php 
include('../../connection.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
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

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <b>Admin</b>LTE
    </div>

    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>

        <form role="form" method="POST" enctype="multipart/form-data">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-tag"></span>
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
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-center">
            <!-- /.col -->
            <div class="col-4">
              <input type="submit" class="btn btn-primary btn-block" name="post_data" value="Submit">
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-5 mb-0 text-center">
          already have account? <a href="../login/login.php" class="text-center">Login</a>
        </p>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>

<?php
if (isset($_POST['post_data'])) {
  $namaLengkap = $_POST['nama'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $repassword = md5($_POST['repassword']);

  if ($password == $repassword) {
    $postData = mysqli_query($connect, "INSERT INTO users (nama, username, password) VALUES ('$namaLengkap', '$username', '$password')");

    if ($postData) {
      ?>
      <script type="text/javascript">
        alert("Tambah data berhasil");
        window.location.href = "../login/login.php";
      </script>
    <?php
    }
  } else {
    ?>
    <script type="text/javascript">
      alert("Password tidak sama");
    </script>
  <?php
  }
}
?>