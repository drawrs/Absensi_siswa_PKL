<?php
	if (isset($_SESSION['sw'])) {
		$sql = "SELECT*FROM detail_user WHERE id_user='$_SESSION[id]'";
	    $query = $conn->query($sql);
		$get_user=$query->fetch_assoc();
		$name = $get_user['name_user'];
		$id_user = $get_user['id_user'];

		echo "<h1 class='page-header'>Welcome, $name</h1>";
		
			if ($conn->query("SELECT*FROM data_absen WHERE id_user='$id_user'")->num_rows!==0) {
				$no=0;
			 	$query_month=$conn->query("SELECT*FROM bulan ORDER BY id_bln ASC");
			 	while ($get_month=$query_month->fetch_assoc()) {
			      $month=$get_month['nama_bln'];
			      $id_month=$get_month['id_bln'];
			      
			      $query_absen=$conn->query("SELECT*FROM data_absen NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal WHERE id_bln='$id_month' AND id_user='$id_user'");
			      
			      $cek = $query_absen->num_rows;
			      if ($cek!==0) {
			        echo "<h3 class='sub-header'>Absensiku - $month </h3>";
			        echo "<div class='table-responsive'>
			           <table class='table table-striped'>
			            <thead>
			               <tr>
			                <th>No</th>
			                <th>Hari, Tanggal</th>
			                <th>Jam Masuk</th>
			                <th>Status</th>
			                <th>Jam Keluar</th>
			                <th>Status</th>
			               </tr>
			            </thead>
			            <tbody>";
			          $no=0;
			          while ($get_absen=$query_absen->fetch_assoc()) {
			            $no++;
			            $date = "$get_absen[nama_hri], $get_absen[nama_tgl] $get_absen[nama_bln] ".date("Y");
			            $time_in = "$get_absen[jam_msk]";
			             if ($get_absen['jam_klr']==="") {
			             	$time_out = "<strong>Belum Absen</strong>";
			             } else {
			             	$time_out = "$get_absen[jam_klr]";
			             }
			            $st_in = "$get_absen[st_jam_msk]";
			            $st_out = "$get_absen[st_jam_klr]";
			            echo "<tr>
			                <td>$no</td>
			                <td>$date</td>
			                <td>$time_in</td>
			                <td>$st_in</td>
			                <td>$time_out</td>
			                <td>$st_out</td>
			              </tr>";
			          }
			          echo "</table></div>";
			      	}
				}
			$conn->close();
			} else {
				echo "<div class='alert alert-warning'><strong>Tidak ada Absensi untuk ditampilkan.</strong></div>";
			}
	} else {
	    $id_siswa = mysqli_real_escape_string($conn, $_GET['id_siswa']);
		$query = $conn->query("SELECT*FROM detail_user WHERE id_user='$id_siswa'");
		$get_user=$query->fetch_assoc();
		$name = $get_user['name_user'];
		$id_user = $get_user['id_user'];
			if ($conn->query("SELECT*FROM data_absen WHERE id_user='$id_user'")->num_rows!==0) {
				$no=0;
			 	$query_month=$conn->query("SELECT*FROM bulan ORDER BY id_bln ASC");
			 	while ($get_month=$query_month->fetch_assoc()) {
			      $month = $get_month['nama_bln'];
			      $year = date("Y");
			      $id_month=$get_month['id_bln'];
			      
			      $query_absen=$conn->query("SELECT*FROM data_absen NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal WHERE id_bln='$id_month' AND id_user='$id_user'");
			      
			      $cek = $query_absen->num_rows;
			      if ($cek!==0) {
			        echo "<h4 class='sub-header'><strong>Absensi:</strong> $name<br><strong>Bulan:</strong> $month $year </h4>";
			        echo "<div class='table-responsive'>
			           <table class='table table-striped'>
			            <thead>
			               <tr>
			                <th>No</th>
			                <th>Hari, Tanggal</th>
			                <th>Jam Masuk</th>
			                <th>Status</th>
			                <th>Jam Keluar</th>
			                <th>Status</th>
			               </tr>
			            </thead>
			            <tbody>";
			          $no=0;
			          while ($get_absen=$query_absen->fetch_assoc()) {
			            $no++;
			            $date = "$get_absen[nama_hri], $get_absen[nama_tgl] $get_absen[nama_bln] ".date("Y");
			            $time_in = "$get_absen[jam_msk]";
			             if ($get_absen['jam_klr']==="") {
			             	$time_out = "<strong>Belum Absen</strong>";
			             } else {
			             	$time_out = "$get_absen[jam_klr]";
			             }
			            $st_in = "$get_absen[st_jam_msk]";
			            $st_out = "$get_absen[st_jam_klr]";
			            echo "<tr>
			                <td>$no</td>
			                <td>$date</td>
			                <td>$time_in</td>
			                <td><strong>$st_in</strong></td>
			                <td>$time_out</td>
			                <td><strong>$st_out</strong></td>
			              </tr>";
			          }
			          echo "</table></div>";
			      	}
				}
				$conn->close();
			} else {
				echo "<div class='alert alert-warning'><strong>Tidak ada Absensi untuk ditampilkan.</strong></div>";
			}
	}
?>