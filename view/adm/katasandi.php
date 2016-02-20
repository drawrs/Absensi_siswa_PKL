<h3 class='page-header'>Ganti katasandi</h3>
<div class="col-md-6">
<?php 
if (isset($_GET['st'])) {
        if ($_GET['st']==1) {
            echo "<div class='alert alert-warning'><strong>Berhasil Disimpan.</strong></div>";
        } elseif ($_GET['st']==2) {
            echo "<div class='alert alert-danger'><strong>Gagal Menyimpan.</strong></div>";
        } elseif ($_GET['st']==3) {
            echo "<div class='alert alert-success'><strong>Katasandi lama salah.</strong></div>";
        } elseif ($_GET['st']==4) {
            echo "<div class='alert alert-danger'><strong>Kolom tidak boleh kosong.</strong></div>";
        } elseif ($_GET['st']==5) {
            echo "<div class='alert alert-danger'><strong>Konfirmasi katasandi tidaksama.</strong></div>";
        }
    }
$id = mysqli_real_escape_string($conn, $_GET['id']);
if ($id == $_SESSION['id']) {
  $sql_gu = "SELECT*FROM detail_pb NATURAL LEFT JOIN user WHERE id_user='$id'";
} else {
  $sql_gu = "SELECT*FROM detail_user NATURAL LEFT JOIN user WHERE id_user='$id'";
}
$query = $conn->query($sql_gu);
if ($get_u = $query->fetch_assoc()) {
    extract($get_u);
    ?>
    <!-- Horizontal Form -->
<div class="box box-info">
<br />
<!-- form start -->
<form class="form-horizontal" method="post" action="./model/proses.php">
<input type="hidden" value="<?php echo $id; ?>" name="id">
  <div class="box-body">
      <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Pengguna</label>
          <div class="col-sm-10">
            <strong class="form-control"><?php echo "$name_user - $email_user"; ?></strong>
          </div>
        </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Katasandi baru</label>
      <div class="col-sm-10">
        <input type="password" name="new-pwd" class="form-control" id="masuk" placeholder="*************" required>
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Ulangi katasandi</label>
      <div class="col-sm-10">
        <input type="password" name="new-pwd-cek" class="form-control" id="masuk_lagi" placeholder="*************" required>
      </div>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" name="change-pwd" class="btn btn-info pull-right">Ubah</button>
  </div><!-- /.box-footer -->
</form>
<?php 
if ($id !== $_SESSION['id']) {
  echo '<br /><a href="./siswa&id_siswa="'.$id.'">Kembali ke profil Siswa</a>
';
}
 ?>
</div><!-- /.box -->
<?php
} else {
    echo "<div class='alert alert-danger'><strong>User tidak ditemukan.</strong></div>";
}
 ?>

<script src="./lib/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#masuk_lagi').keyup(function(){
            var passpertama=$('#masuk').val();
            var passkedua=$('#masuk_lagi').val();
            if($('#masuk').val() != $('#masuk_lagi').val()){
                $('#masuk_lagi').css('background','#F2DEDE');
                $('#masuk').css('background','#F2DEDE');
            } else if(passpertama == passkedua){
                $('#masuk_lagi').css('background','#FCF8E3');
                $('#masuk').css('background','#FCF8E3');
            }
        });             
    }); 
</script>