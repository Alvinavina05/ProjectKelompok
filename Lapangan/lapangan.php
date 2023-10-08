<?php
ob_start(); // Mulai output buffering
?>

<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: ../ADMIN/login.php");
    exit(); // Terminate script execution after the redirect
}

?>



<h1 class="text-center text-white">INI HALAMAN Info Lapangan</h1>

<?php
$konten= ob_get_clean();

include '../ADMIN/body.php';

?>