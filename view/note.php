<?php
    if (isset($_SESSION['pb'])) {
        $id_siswa=mysqli_real_escape_string($conn, $_GET['id_siswa']);
		$query = $conn->query("SELECT*FROM detail_user WHERE id_user='$id_siswa'");
	    $get_user=$query->fetch_assoc();
	    $name = $get_user['name_user'];
	    $id_user = $get_user['id_user'];
	    if (isset($_GET['st'])) {
	      if ($_GET['st']==1) {
	        echo "<div class='alert alert-warning'><strong>Berhasil disimpan.</strong></div>";
	      } else {
	        echo "<div class='alert alert-danger'><strong>Gagal menyimpan.</strong></div>";
	      }
	    }
	        if ($conn->query("SELECT*FROM catatan WHERE id_user='$id_user'")->num_rows!==0) {
	            $no=0;
	            $query_month=$conn->query("SELECT*FROM bulan ORDER BY id_bln ASC");
	            while ($get_month=$query_month->fetch_assoc()) {
	              $month=$get_month['nama_bln'];
	              $id_month=$get_month['id_bln'];

	              $query_note=$conn->query("SELECT*FROM catatan NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal WHERE id_user='$id_user' AND id_bln='$id_month' ORDER BY id_cat ASC");
	              $cek = $query_note->num_rows;
	              if ($cek!==0) {
	                echo "<h4 class='sub-header'><strong>Catatan:</strong> $get_user[name_user] - <i>$month</i> </h4>";
	                echo "<div class='table-responsive'>
	                   <table class='table table-striped'>
	                    <thead>
	                       <tr>
	                         <th>No</th>
	                         <th>Hari, Tanggal</th>
	                         <th>Catatan</th>
	                         <th>Status</th>
	                       </tr>
	                    </thead>
	                    <tbody>";
	                  $no=0;
	                  while ($get_note=$query_note->fetch_assoc()) {
	                    $no++;
	                    $date = "$get_note[nama_hri], $get_note[nama_tgl] $get_note[nama_bln] ".date("Y");
	                    $note = nl2br(htmlentities($get_note['isi_cat']));
	                    $status = $get_note['status_cat'];
	                    echo "<tr>
	                        <td>$no</td>
	                        <td>$date</td>
	                        <td width='60%'>$note</td>
	                        <td><strong>$status</strong></td>
	                    </tr>";
	                  }
	                  echo "</table></div>";
	                }
	            }
	            $conn->close();
	        } else {
	            echo "<div class='alert alert-warning'><strong>Tidak ada Cataan untuk ditampilkan.</strong></div>";
	        }
    }elseif (isset($_SESSION['sw'])) {
        echo "<h3 class='sub-header'>Catatanku <button type='button' onclick=\"window.location.href='tambah_catatan';\" class='btn btn-success'>Tambah</button> </h3>";
        $query = $conn->query("SELECT*FROM detail_user WHERE id_user='$_SESSION[id]'");
	    $get_user=$query->fetch_assoc();
	    $name = $get_user['name_user'];
	    $id_user = $get_user['id_user'];
	    if (isset($_GET['st'])) {
	      if ($_GET['st']==1) {
	        echo "<div class='alert alert-warning'><strong>Berhasil disimpan.</strong></div>";
	      } else {
	        echo "<div class='alert alert-danger'><strong>Gagal menyimpan.</strong></div>";
	      }
	    }
	        if ($conn->query("SELECT*FROM catatan WHERE id_user='$id_user'")->num_rows!==0) {
	            $no=0;

	            $query_month=$conn->query("SELECT*FROM bulan ORDER BY id_bln ASC");
	            while ($get_month=$query_month->fetch_assoc()) {
	              $month=$get_month['nama_bln'];
	              $id_month=$get_month['id_bln'];
	              
	              $query_note=$conn -> query("SELECT*FROM catatan NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal WHERE id_user='$id_user' AND id_bln='$id_month' ORDER BY id_cat ASC");
	              
	              $cek = $query_note->num_rows;
	              if ($cek!==0) {
	                echo "<h4 class='sub-header'>Catatan - $month </h4>";
	                echo "<div class='table-responsive'>
	                   <table class='table table-striped'>
	                    <thead>
	                       <tr>
	                         <th>No</th>
	                         <th>Hari, Tanggal</th>
	                         <th>Catatan</th>
	                         <th>Status</th>
	                       </tr>
	                    </thead>
	                    <tbody>";
	                  $no=0;
	                  while ($get_note=$query_note->fetch_assoc()) {
	                    $no++;
	                    $date = "$get_note[nama_hri], $get_note[nama_tgl] $get_note[nama_bln] ".date("Y");
	                    $note = nl2br(htmlentities($get_note['isi_cat']));
	                    $status = $get_note['status_cat'];
	                    echo "<tr>
	                        <td>$no</td>
	                        <td>$date</td>
	                        <td width='60%'>$note</td>
	                        <td><strong>$status</strong></td>
	                    </tr>";
	                  }
	                  echo "</table></div>";
	                }
	            }
	            
	            $conn->close();
	        } else {
	            echo "<div class='alert alert-warning'><strong>Tidak ada Cataan untuk ditampilkan.</strong></div>";
	        }
    }
?>

