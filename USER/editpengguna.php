<?php

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../ADMIN/login.php");
    exit(); // Terminate script execution after the redirect
}



require '../KONEKSI/koneksi.php';
$id = $_GET["id"];

$swa = query("SELECT * FROM pengguna WHERE id_pengguna = $id")[0];

if (isset($_POST["submit"])) {
  $jenis_kelamin_lama = $swa["jenis_kelamin"]; // Simpan jenis kelamin sebelumnya

  if ($_POST['jenis_kelamin'] != $jenis_kelamin_lama) {
      // Jenis kelamin telah berubah, maka lakukan update
      if (ubahpengguna($_POST) > 0) {
          echo "
          <script>
              alert('Data berhasil diubah');
              document.location.href = 'pengguna.php';
          </script>
          ";
      } else {
          echo "
          <script>
              alert('Data gagal diubah');
              document.location.href = 'pengguna.php';
          </script>
          ";
      }
  } else {
      // Jenis kelamin tidak berubah, tidak perlu melakukan update
      echo "
      <script>
      alert('Data berhasil diubah');
          document.location.href = 'pengguna.php';
      </script>
      ";
  }
}

?>



<?php
ob_start();
?>

<style>
  .form-control{
    border-radius:7px;
  }
  .ff{
    float:left;
  }
  .btn{
    border-radius:5px;

  }
  .dasd{
    float:right;
  }
  .card{
    border:none;
    border-radius:15px;
  }


  </style>

<form action="" method="POST" enctype="multipart/form-data">
	<div class=" card bg-secondary rounded mt-3 mb-3">
		<div class="card-header py-3 bg-light">
			<h5 class="m-0 text-white">Edit Data Pengguna</h5>
		</div>
        
     

		<div class="card-body bg-secondary">
			<div class="form mt-3 row">
                
				<div class="form-group col-sm-6">
					<label for="formGroupExampleInput2">ID Pengguna</label>
					<input  type="text" class=" mt-1 mb-3 form-control" name="id_pengguna" value="<?= $swa["id_pengguna"] ?>" id="id_pengguna" readonly>
                </div>

				<div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Nama Pengguna</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="nama_pengguna" value="<?= $swa["nama_pengguna"] ?>" id="nama_pengguna" >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Alamat</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="alamat" value="<?= $swa["alamat"] ?>" id="alamat">
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">No. Telp</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="no_tlp" value="<?= $swa["no_tlp"] ?>" id="no_tlp">
                </div>

                <div class="form-group col-sm-6">
    <label for="formGroupExampleInput2 text-dark">Jenis Kelamin</label>
    <select required name="jenis_kelamin" id="jenis_kelamin" class="form-select mt-1 mb-3" aria-label="Default select example">
        <option selected value="<?= $swa["jenis_kelamin"] ?>"><?= $swa["jenis_kelamin"] ?></option>
        <option value="Laki - Laki">Laki - Laki</option>
        <option value="Perempuan">Perempuan</option>
    </select>
</div>


				<div class="dasd mt-2 mb-2">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-success">Edit Data</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="dasd">
<button type="submit" name="submit" class=" mb-5 mt-4 btn dasd btn-danger"><a class="text-white" href="pengguna.php">Kembali</a> </button>
</div>

<br>
<br>
<br>




<?php
$konten= ob_get_clean();

include '../ADMIN/body.php';

?>


