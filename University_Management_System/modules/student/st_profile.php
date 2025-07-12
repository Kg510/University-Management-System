<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";

$user = new login_registration_class();
$stid = $_SESSION['st_id'] ?? null;
$stname = $_SESSION['st_name'] ?? null;

if (!$user->get_student_session()) {
    header('Location: ../login/st_login.php');
    exit();
}

$pageTitle = "Student Profile";
include "../../includes/headertop_admin.php";
?>

<div class="all_student fix">
    <h2 style="text-align:center; background:#2980b9; color:white; padding:10px;">
        Welcome, <?php echo $stname; ?>
    </h2>

    <div style="text-align:center;">
        <p><strong>Student ID:</strong> <?php echo $stid; ?></p>
        <p><strong>Name:</strong> <?php echo $stname; ?></p>
        <!-- You can add more like semester, department, etc. -->
    </div>
</div>

<?php include "../../includes/footerbottom.php"; ?>
