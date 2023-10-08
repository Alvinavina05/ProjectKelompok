<?php 
$koneksi = mysqli_connect("localhost", "root", "", "si_sela");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $tempat = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $tempat[] = $row;
    }
    return $tempat;
}



//	// C-R-U-D / PENGGUNA  //  //
function hapuspengguna($id){
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pengguna WHERE id_pengguna=$id");
    return mysqli_affected_rows($koneksi);
}


	function ubahpengguna($data){
		global $koneksi;
	
		$id = $data["id_pengguna"];
		$nama = htmlspecialchars($data["nama_pengguna"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$nohp = htmlspecialchars($data["no_tlp"]);
		$jeniskelamin = htmlspecialchars($data["jenis_kelamin"]);
	
		$query = "UPDATE pengguna SET 
					nama_pengguna = '$nama',
					alamat = '$alamat',
					no_tlp = '$nohp',
					jenis_kelamin = '$jeniskelamin'
					WHERE id_pengguna = $id
				";
	
		mysqli_query($koneksi, $query);
	
		return mysqli_affected_rows($koneksi);
	}



	function tambahpengguna($data){
		global $koneksi;
	
		$nama = htmlspecialchars($data["nama_pengguna"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$nohp = htmlspecialchars($data["no_tlp"]);
		$jeniskelamin = htmlspecialchars($data["jenis_kelamin"]);
	
			$query = "INSERT INTO pengguna (`nama_pengguna`, `alamat`, `no_tlp`, `jenis_kelamin`)
					VALUES
					('$nama', '$alamat', $nohp, '$jeniskelamin')";
	
		mysqli_query($koneksi, $query);
	
		return mysqli_affected_rows($koneksi);
	}




?>

