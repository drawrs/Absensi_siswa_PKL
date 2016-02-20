<?php
include "../lib/db/conn.php";
if(isset($_GET['id_user'])) {
    $id_user = $_GET['id_user'];

    $query = "SELECT*FROM user WHERE id_user = '$id_user'";

    $hasil = $conn->query($query);

    $cetak=$hasil->fetch_assoc();

    extract($cetak);

    $hasil->free();
    $conn->close();
}
else {
    echo "<script>window.location=(\"daftar_user.php\");</script>";
}
?>
<html>
<head>
    <style type="text/css">
        body {
            font-family:"Arial";
        }
    </style>
    <title>Edit user</title>
</head>
<body>
<div style="background-color: #eee; padding: 20px;">
    <h1>Kode panda</h1>
    <p>Introduce PHP MySQLi</p>
</div>
<h1>Edit user</h1>
<p><a href="daftar_user.php">Lihat user</a> </p>
<p>
<table>
    <form action="../model/p_edit.php?id_user=<?php echo $id_user; ?>" method="post" enctype="multipart/form-data">
        <tr>
            <td>Username</td>
            <td><input type="text" maxlength="12" name="username" required></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type="password" value="<?php echo $username; ?>" maxlength="12" name="password" required></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input type="text" value="<?php echo $nama_lengkap; ?>" name="nama_lengkap" required></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><input type="file" name="foto" required></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Simpan"></td>
        </tr>
    </form>
</table>
</p>
</body>
</html>