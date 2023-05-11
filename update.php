<?php 
 

	require 'fungsi.php';

	// Ambil data dari url
	$id = $_GET["id"];

	// query data mahasiswa berdasarkan id
	$row = query("SELECT * FROM users WHERE id = $id")[0];

	// cek apakah tombol submit sudah ditekan atau belum
	if ( isset($_POST["btnUpdate"]) ) {
		
			// cek apakah data berhasil di update atau tidak
			if (update($_POST) > 0) {
				echo "
					<script>
						alert('Yeay! Data Anda berhasil di update.');
						document.location.href= 'index.php';
					</script>
				";
			}else{
				echo "
					<script>
						alert('Yah.. gagal di update nih.');
						document.location.href= 'index.php';
					</script>
				";
			}

}
 ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Data User || Latihan 19</title>
  </head>
  <body>
    <div class="container mt-5 mb-5">
    	<div id="wrapper">
    		<h1 style="text-align: center"> Update Data Pengguna </h1>
        	<form action="" method="POST" enctype="multipart/form-data">
        		<input type="hidden" name="id" value="<?= $row["id"]; ?>">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" value="<?= $row["name"]; ?>">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control" id="email" value="<?= $row["email"]; ?>">
            </div>
             <div class="form-group">
              <label for="phone">Phone</label>
              <input type="number" name="phone" class="form-control" id="phone" value="<?= $row["phone"]; ?>">
            </div>
             <div class="form-group">
              <label for="address">Address</label>
              <input type="text" name="address" class="form-control" id="address" value="<?= $row["address"]; ?>">
            </div>
             <div class="form-group">
              <label for="role">Role</label>
              <select class="form-control" id="role" placeholder="Masukkan Tipe Akun" name="role" value="<?= $row["role"]; ?>" required>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
              </select>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control" id="password" value="<?= $row["password"]; ?>" aria-describedby="passwordHelp">
              <small id="passwordHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
            </div>
              <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar" value="<?= $row["avatar"]; ?>">
              </div>

            <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
          
          </form>
      </div>
</div>
</div>

                   
           
        
    
   


      




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>