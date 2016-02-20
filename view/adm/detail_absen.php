<h3 class='page-header'>Detail Absensi Siswa PKL</h3>
	<div class='table-responsive'>
	<?php 
		if (isset($_GET['id_siswa'])) {
			if ($_GET['id_siswa']!=="") {
				$id_user=$_GET['id_siswa'];
				include './view/detail_absen.php';
			} else {
				header("location:absensi");
			}
		} else {
			$sql = "SELECT*FROM detail_user ORDER BY sklh_user ASC";
			$query = $conn->query($sql);
			if ($query->num_rows!==0) {
				echo "<table class='table table-striped' style='width:50%'>
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Siswa</th>
							<th>Asal Sekolah</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>";
				$no=0;
				while ($get_siswa = $query->fetch_assoc()) {
					$id_siswa = $get_siswa['id_user'];
					$name = $get_siswa['name_user'];
					$school = $get_siswa['sklh_user'];
					$no++;
					echo "<tr>
							<td>$no</td>
							<td>$name</td>
							<td>$school</td>
							<td><a href='absensi&id_siswa=$id_siswa' title='Absensi $name'>Lihat Absensi</a></td>
						</tr>";
				}
				echo "</tbody></table>";
				$conn->close();
			} else {
				echo "<div class='alert alert-danger'><strong>Tidak ada Siswa untuk ditampilkan</strong></div>";
			}
		}
	 ?>
</div>