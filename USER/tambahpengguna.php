
<?php
ob_start();
?>


<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../ADMIN/login.php");
    exit(); // Terminate script execution after the redirect
}

require '../KONEKSI/koneksi.php';


// ambil data 
if( isset($_POST["submit"]) ) {
		
  // hubungkan metod dan jika data > 0 / maka terisi succes paham!!
  if (tambahpengguna ($_POST) > 0 ) {
    echo "
    <script>
        alert('data berhasil ditambahkan');
        document.location.href = 'pengguna.php';
    </script>
    ";
  }else {
    echo "
      <script>
        alert('data gagal ditambahkan');
        document.location.href = 'tambahpengguna.php';
      </script>
    ";
  }		
}


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
			<h5 class="m-0 text-white">Tambah Data Pengguna</h5>
		</div>
        
		<div class="card-body bg-secondary">
			<div class="form mt-3 row">
                
				<!-- <div class="form-group col-sm-6">
					<label for="formGroupExampleInput2">ID Pengguna</label>
					<input  type="text" class=" mt-1 mb-3 form-control" name="id_pengguna" placeholder="Masukkan Pengguna" id="id_pengguna" readonly>
                </div> -->

				<div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Nama Pengguna</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="nama_pengguna" placeholder="Masukkan Nama Pengguna" id="nama_pengguna" >
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">Alamat</label>
					<input required type="text" class="mt-1 mb-3 form-control"  name="alamat" placeholder="Masukkan Alamat" id="alamat">
                </div>

                <div class="form-group col-sm-6">
					<label for="formGroupExampleInput">No. Telp</label>
					<input required type="text" class="mt-1 mb-3 form-control" name="no_tlp" placeholder="Masukkan Nomor Hp" id="no_tlp">
                </div>

				<div class="form-group col-sm-6">
                <label for="formGroupExampleInput2 text-dark">Jenis Kelamin</label>
                <select required name="jenis_kelamin" id="jenis_kelamin" class="form-select mt-1 mb-3" aria-label="Default select example">
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
                </select>
                </div>

				<div class="dasd mt-2 mb-2">
					<br>
					<button type="submit" name="submit" class="btn dasd btn-success">Tambah Data</button>
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