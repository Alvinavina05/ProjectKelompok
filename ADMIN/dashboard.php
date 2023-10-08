<?php 

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit(); // Terminate script execution after the redirect
}

?>



<?php
ob_start();
 // Mulai output buffering
?>




<h1 class="text-center text-white">INI HALAMAN DASHBOARD <?php echo $_SESSION['email']; ?></h1>

<?php
$konten= ob_get_clean();

include '../ADMIN/body.php';

?>