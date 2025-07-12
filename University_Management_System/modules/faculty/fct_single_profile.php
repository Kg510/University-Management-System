<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();
$fid = $_SESSION['f_id'] ?? null;
$fname = $_SESSION['f_name'] ?? null;

if (!$user->get_faculty_session()) {
    header('Location: ../login/faculty_login.php');
    exit();
}

$pageTitle = "Faculty Profile";
include "../../includes/headertop_admin.php";
?>

<div class="all_student fix">
    <h2 style="text-align:center; background:#34495e; color:white; padding:10px;">
        Welcome, <?php echo $fname; ?>
    </h2>

    <div style="text-align:center;">
        <p><strong>Faculty ID:</strong> <?php echo $fid; ?></p>
        <p><strong>Name:</strong> <?php echo $fname; ?></p>
        <!-- Add more fields here if you store them in session or fetch from DB -->
    </div>
</div>

<?php include "../../includes/footerbottom.php"; ?>
