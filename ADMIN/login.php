<?php

include '../koneksi/koneksi.php';
session_start();
 
if (isset($_SESSION['nama'])) {
    header("Location: dashboard.php");
    exit();
}
 
if (isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($koneksi, $_POST['user']);
    $pass = $_POST['pass']; // Hash the input password using SHA-256
 
    $sql = "SELECT * FROM akun WHERE username='$user' AND pass='$pass'"; // Sesuaikan nama kolom dengan struktur tabel Anda
    $result = mysqli_query($koneksi, $sql);

    if (!$koneksi) {
        die("Koneksi database gagal: " . mysqli_connect_error());
    }
 
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username']; 
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['email'] = $row['email']; 
        $_SESSION['kode_lv'] = $row['kode_lv']; 
        header("Location: dashboard.php");
        exit();
    } else {
        $login_error = "Email atau password Anda salah. Silakan coba lagi!";
    }
}





?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../ASET/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../ASET/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../ASET/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../ASET/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative bg-white  d-flex p-0">



        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100  align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="#" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Si-Sela</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <form action="" method="POST">
                        <div class="form-floating mb-3">
                            <input type="text" name="user" class="form-control" id="user" placeholder="Masukkan Username">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="pass" class="form-control" id="pass" placeholder="Masukkan Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <!-- <div class="form-check">
                                <input type="checkbox" value="" checked class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div> -->
                            <a href="#">Forgot Password</a>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Login</button>
                        </form>
                        <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p>
                    </div>
                    
                </div>
               
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../ASET/lib/chart/chart.min.js"></script>
    <script src="../ASET/lib/easing/easing.min.js"></script>
    <script src="../ASET/lib/waypoints/waypoints.min.js"></script>
    <script src="../ASET/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../ASET/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../ASET/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../ASET/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../ASET/js/main.js"></script>
</body>

</html>