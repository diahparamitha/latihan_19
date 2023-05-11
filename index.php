<?php

include "includes/koneksi.php";

require 'fungsi.php';

  if ( isset($_POST["btnTambah"]) ) {
    
      // cek apakah data berhasil di tambah atau tidak
      if (tambah($_POST) > 0) {
        echo "
          <script>
            alert('Yeay! Anda berhasil menambahkan pengguna baru!.');
            document.location.href= 'index.php';
          </script>
        ";
      }else{
        echo "
          <script>
            alert('Yah.. gagal nih.');
            document.location.href= 'index.php';
          </script>
        ";
      }

}

$rows = "SELECT * FROM users";

$result = $koneksi->query($rows);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Data User || Latihan 19</title>
    <style type="text/css">
    	.avatar{
    		width: auto;
    		height: 100px;
    	}
    </style>
  </head>
  <body>
   <div class="container" style="margin-top: 30px; margin-bottom: 30px; padding-top: 5px;">
   	<h3 style="text-align: center;">Data Pengguna</h3>
   	 <form action="tambah.php" method="POST" style="text-align: right;">
          <button type="submit" class="btn btn-primary"> + Pengguna </button>
     </form>
   	 <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Avatar</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Role</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
 <tbody>
  <?php $i = 1; foreach ($result as $data) : ?>
  <tr>
    <th><?= $i++; ?></th>
    <td><img class="avatar" src="<?= $data["avatar"]; ?>" alt="Avatar"></td>
    <td><?= $data["name"]; ?></td>
    <td><?= $data["email"]; ?></td>
    <td><?= $data["phone"]; ?></td>
    <td><?= $data["address"]; ?></td>
    <td><?= $data["role"]; ?></td>
    <td>
      <a href="detail.php?id=<?= $data["id"]; ?>" style="text-decoration: none;"> detail </a> ||
      <a href="update.php?id=<?= $data["id"]; ?>" onclick="return confirm('Yakin datanya mau di ubah?')" style="text-decoration: none;"> edit </a> ||
      <a href="delete.php?id=<?= $data["id"]; ?>" onclick="return confirm('Yakin datanya mau di hapus?')" style="text-decoration: none;"> hapus </a>
    </td>
  </tr>
  <?php endforeach; ?>
</tbody>
</table>
   </div>
   
   
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
  </body>
</html>