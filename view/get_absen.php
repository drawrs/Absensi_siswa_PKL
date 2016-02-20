<?php
include '../lib/db/dbconfig.php';
$sql = "SELECT*FROM data_absen NATURAL LEFT JOIN bulan NATURAL JOIN hari NATURAL JOIN tanggal NATURAL JOIN detail_user WHERE st_jam_msk='Menunggu' OR st_jam_klr='Menunggu'";
$query = $conn->query($sql);
if ($query->num_rows!==0) {
          echo "<div class='table-responsive'>
                 <table class='table table-striped'>
                  <thead>
                     <tr>
                      <th>No</th>
                      <th>Nama Siswa</th>
                      <th>Keterangan</th>
                      <th>Hari, Tanggal</th>
                      <th>Pukul</th>
                      <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>";
          echo "<form method='post' action='./model/proses.php'>";
          $no=0;
          while ($get_absen=$query->fetch_assoc()) {
            $id_absen = $get_absen['id_absen'];
            $id_user = $get_absen['id_user'];
            $name = $get_absen['name_user'];
            $date = "$get_absen[nama_hri], $get_absen[nama_tgl] $get_absen[nama_bln] ".date("Y");
            if ($get_absen['st_jam_msk']==="Menunggu") {
              $type = "in";
              $status = "Absen masuk";
              $time = $get_absen['jam_msk'];
            }elseif ($get_absen['st_jam_klr']==="Menunggu") {
              $type = "out";
              $status = "Absen keluar";
              $time = $get_absen['jam_klr'];
            }
            $no++; 

              echo  "<tr>
                  <td>
                    <input type='checkbox' name='id_absen[]' value='$id_absen,$type'/> <b>$no</b>
                  </td>
                  <td>$name</td>
                  <td><strong><i>$status</i></strong></td>
                  <td>$date</td>
                  <td>$time</td>
                  <td>
                  <button type='button' class='btn btn-warning' onclick=\"acc_absen('$id_absen','$type')\">Konfirmasi</button>&nbsp;
                  <button type='button' class='btn btn-danger' onclick=\"window.location.href='./model/proses.php?dec_absen=$id_absen&type=$type';\">Tolak</button>
                  </td>
                  </tr>";
          }
          echo "<tr><th colspan='6'>Yang ditandai :
          <button type='submit' class='btn btn-warning' name='acc_absen2'>Konfirmasi</button>&nbsp;
                  <button type='submit' class='btn btn-danger' name='dec_absen2'/>Tolak</button>
           </th></tr>";
          echo "</form></tbody></table></div>";
          $conn->close();
    } else {
        echo "<div class='alert alert-danger'><strong>Tidak ada permintaan Absen.</strong></div>";
    }
 ?>