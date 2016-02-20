<h3 class='page-header'>Catatan Kegiatan Siswa PKL</h3>
	<div class='table-responsive'>
	<?php 
		if (isset($_GET['id_siswa'])) {
			if ($_GET['id_siswa']!=="") {
				$id_user=$_GET['id_siswa'];
				include './view/note.php';
			} else {
				header("location:catatan");
			}
		} else {
			$sql = "SELECT*FROM detail_user ORDER BY sklh_user ASC";
			if ($conn->query($sql)->num_rows!==0) {
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
				$query_siswa = $conn->query($sql);
				$no=0;
				while ($get_siswa = $query_siswa->fetch_assoc()) {
					$id_siswa = $get_siswa['id_user'];
					$name = $get_siswa['name_user'];
					$school = $get_siswa['sklh_user'];
					$no++;
					echo "<tr>
							<td>$no</td>
							<td>$name</td>
							<td>$school</td>
							<td><a href='catatan&id_siswa=$id_siswa' title='Catatan $name'>Lihat Catatan</a></td>
						</tr>";
				}
				$conn->close();
				echo "</tbody></table>";
			} else {
				echo "<div class='alert alert-danger'><strong>Tidak ada Siswa untuk ditampilkan</strong></div>";
			}
		}
	 ?>
</div>