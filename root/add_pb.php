<?php 
session_start();
if (!isset($_SESSION['pb'])) {
  header('location:../home');
}
 ?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Tambah pembimbing</title>

    <link href="../lib/bootstrap.min.css" rel="stylesheet">
    <link href="../lib/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <link href="../lib/dashboard.css" rel="stylesheet">
    <script src="../lib/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h3 class="page-header">Tambah Pembimbing</h3>
            <?php 
              if (isset($_GET['st'])) {
                if ($_GET['st']==1) {
                  echo "<div class='alert alert-warning'><strong>Berhasil Ditambahkan.</strong></div>";
                } elseif ($_GET['st']==2) {
                  echo "<div class='alert alert-danger'><strong>Gagal Menambahkan.</strong></div>";
                } elseif ($_GET['st']==3) {
                  echo "<div class='alert alert-danger'><strong>Maaf Email sudah digunakan.</strong></div>";
                } elseif ($_GET['st']==4) {
                  echo "<div class='alert alert-danger'><strong>Kolom tidak boleh kosong.</strong></div>";
                }
              }

             ?>
            <form class="form-horizontal" role="form" style="width:80%" method="post" action="proses.php">
              <div class="form-group">
                <label class="control-label col-sm-2" for="name">Nama Lengkap:</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="email">Email:</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2">Password:</label>
                <div class="col-sm-10"> 
                  <input type="password" class="form-control" name="pwd" placeholder="Enter password" required>
                </div>
              </div>
              <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default" name="add_pbXia1Zasww12Q">Submit</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../lib/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../lib/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../lib/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../lib/ie10-viewport-bug-workaround.js"></script>
  

</body></html>