<?php
session_start();
require_once "../../php/config.php";
require_once "../../php/functions.php";


$user = new login_registration_class();
$admin_id = $_SESSION['admin_id'];
$admin_name = $_SESSION['admin_name'];

if (!$user->get_admin_session()) {
    header('Location: ../../index.php');
    exit();
}

$stid = $_GET['vr'];
$name = $_GET['vn'];

$pageTitle = "View CGPA";
include "../../includes/headertop_admin.php";
?>

<div class="all_student fix">
    <h3 style="text-align:center;color:#fff;background:#2980b9;padding:10px;">
        CGPA Summary - <?php echo $name . " (" . $stid . ")"; ?>
    </h3>

    <p style="text-align:center;">CGPA calculation module is under construction.</p>

    <p style="text-align:center;">
        <a href="st_result_view.php?vr=<?php echo $stid; ?>&vn=<?php echo $name; ?>">
            <button class="editbtn">Back to Result</button>
        </a>
    </p>
</div>

<?php include "../../includes/footerbottom.php"; ?>
