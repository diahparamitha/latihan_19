<?php 

// include "includes/koneksi.php";
$koneksi = mysqli_connect("localhost", "root", "", "arkatama_store");

	function query($query) {
		global $koneksi;
		$result = mysqli_query($koneksi, $query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}


	function tambah($data) {
    global $koneksi;

    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $phone = htmlspecialchars($data["phone"]);
    $address = htmlspecialchars($data["address"]);
    $role = htmlspecialchars($data["role"]);
    $password = md5($data["password"]);
    $avatar = $_FILES['avatar'];

    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $avatar = $_FILES['avatar']['name'];
        $lokasi = "avatar/";

        // Upload gambar ke direktori yang telah ditentukan
        move_uploaded_file($_FILES['avatar']['tmp_name'], $lokasi.$avatar);
        $file_gambar = $lokasi.$avatar;
    }

    $query = "INSERT INTO users (name, email, phone, address, role, password, avatar)
              VALUES ('$name', '$email', '$phone', '$address', '$role', '$password', '$file_gambar')";
              
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}



	function hapus($id){
		global $koneksi;
		mysqli_query($koneksi, "DELETE FROM users WHERE id = $id");

		return mysqli_affected_rows($koneksi);
	}

	function update($data){
    global $koneksi;
    $id = $data["id"];
    $name = htmlspecialchars($data["name"]);
    $email = htmlspecialchars($data["email"]);
    $phone = htmlspecialchars($data["phone"]);
    $address = htmlspecialchars($data["address"]);
    $role = htmlspecialchars($data["role"]);
    $password = md5($data["password"]);
    $avatar = $_FILES['avatar'];

    // cek apakah ada file avatar yang diupload
    if ($avatar['error'] === UPLOAD_ERR_OK) {
        $lokasi = "avatar/";
        // hapus avatar lama
        $query = "SELECT avatar FROM users WHERE id = $id";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        unlink($row['avatar']);

        // simpan avatar baru
        $nama_file = $avatar['name'];
        $tmp_file = $avatar['tmp_name'];
        $lokasi_file = $lokasi . $nama_file;
        move_uploaded_file($tmp_file, $lokasi_file);
    } else {
        // gunakan avatar lama
        $query = "SELECT avatar FROM users WHERE id = $id";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);
        $lokasi_file = $row['avatar'];
    }

    $query = "UPDATE users SET 
                name = '$name', 
                email = '$email', 
                phone = '$phone', 
                address = '$address', 
                role = '$role', 
                password = '$password',
                avatar = '$lokasi_file'
            WHERE id = $id";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
	}


?>